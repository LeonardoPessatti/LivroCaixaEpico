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
				$this->nome, $this->cnpj]);

			$id = $this->getConn()
				->select('LAST_INSERT_ID() as id')
				->from('empresa')
				->execute()
				->fetchCollection($this);

			// var_dump($id);
			// exit;
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

	public function infos() {
		return $this->getConn()
			->select('id, title, content')
			->from('post')
			->where('id = ?', [$this->id])
			->execute()
			->fetchInto($this);
	}
}
