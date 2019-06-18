<?php

namespace blitz\app\models;

/**
 * Post model
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class User extends \blitz\vendor\core\ModelDatabase {
	public function cadastro() {
		// $this->cnpj = '1234u5';
		$repeat = $this->getConn()
			->select('id')
			->from('empresa')
			->where('cnpj = ?', [$this->cnpj])
			->execute()
			->fetchCollection($this);

		if (!isset($repeat[0])) {
			$this->getConn()
			->executeQuery('INSERT INTO empresa (nome, cnpj)VALUES(?,?)', [
				$this->emp_nome, $this->cnpj]);

			$id = $this->getConn()
				->select('LAST_INSERT_ID() as id')
				->from('empresa')
				->execute()
				->fetchCollection($this);

			$this->getConn()
				->executeQuery('INSERT INTO usuario (nome, cpf, login, email, senha, empresa_id)VALUES(?,?,?,?,?,?)', [
					$this->nome, $this->cpf, $this->email, $this->email, $this->senha, $id[0]->id]);

			$id = $this->getConn()
					->select('LAST_INSERT_ID() as id')
					->from('usuario')
					->execute()
					->fetchCollection($this);

			return $id[0]->id;
		}

		return false;
	}

	public function login() {
		$user = $this->getConn()
				->select('id')
				->from('usuario')
				->where('login = ?', [$this->login])
				->where('senha = ?', [$this->senha])
				->execute()
				->fetchCollection($this);

		// var_dump($user[0]->id);
		// exit;
		return $user[0]->id;
	}

	public function getUser() {
		$user = $this->getConn()
				->select('a.*, b.nome as empresa, b.cnpj')
				->from('usuario a')
				->join('join empresa b on a.empresa_id=b.id ')
				->where('a.id = ?', [$this->id])
				->execute()
				->fetchCollection($this);

		$user[0]->clientes = $this->getConn()
				->select('id,nome')
				->from('cliente')
				->where('empresa_id = ?', [$user[0]->empresa_id])
				->execute()
				->fetchCollection($this);

		$user[0]->categorias = $this->getConn()
				->select('id,nome, obs')
				->from('categoria')
				->where('empresa_id = ?', [$user[0]->empresa_id])
				->execute()
				->fetchCollection($this);
		// var_dump($user[0]->categorias);
		// exit;

		return $user[0];
	}
}
