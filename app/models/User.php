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
		// var_dump($repeat);
		// exit;
		if (!isset($repeat[0]->id)) {
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
		// var_dump($user[0]->clientes);
		// exit;

		return $user[0];
	}

	public function getMov() {
		$mov = $this->getConn()
		->select('a.*, b.nome as user, d.nome as cat, d.obs as cat_desc, e.nome as cli ')
		->from('movimentacao a')
		->join('join usuario b on a.usuario_id = b.id ')
		->join('join empresa c on b.empresa_id = c.id ')
		->join('join categoria d on a.categoria_id = d.id ')
		->join('join cliente e on a.cliente_id = e.id ')
		->where('b.empresa_id = ?', [$this->empresa_id])
		->execute()
		->fetchCollection($this);

		return $mov;
	}

	public function novoCliente() {
		$this->getConn()
			->executeQuery('INSERT INTO cliente (nome, empresa_id)VALUES(?,?)', [
				$this->nome, $this->empresa_id]);

		$id = $this->getConn()
				->select('LAST_INSERT_ID() as id')
				->from('cliente')
				->execute()
				->fetchCollection($this);

		return $id[0]->id;
	}

	public function novaCategoria() {
		$this->getConn()
			->executeQuery('INSERT INTO categoria (nome, obs, empresa_id)VALUES(?,?,?)', [
				$this->nome, $this->desc, $this->empresa_id]);

		$id = $this->getConn()
				->select('LAST_INSERT_ID() as id')
				->from('categoria')
				->execute()
				->fetchCollection($this);

		return $id[0]->id;
	}

	public function novaMovimentacao() {
		$this->getConn()
			->executeQuery('INSERT INTO movimentacao (valor, descricao, data, is_saida, cliente_id, categoria_id, usuario_id)VALUES(?,?,now(),?,?,?,?)', [
				$this->valor, $this->desc, $this->is_saida, $this->cli, $this->cat, $this->usuario_id]);

		$id = $this->getConn()
				->select('LAST_INSERT_ID() as id')
				->from('movimentacao')
				->execute()
				->fetchCollection($this);
		// var_dump($id);
		// exit;

		return $id[0]->id;
	}

	public function saldo() {
		$saida = $this->getConn()
				->select('sum(valor) as valor')
				->from('movimentacao a')
				->join('join usuario b on a.usuario_id = b.id')
				->where('empresa_id = ?', [$this->empresa_id])
				->where('is_saida = 1')
				->execute()
				->fetchCollection($this);

		$entrada = $this->getConn()
				->select('sum(valor) as valor')
				->from('movimentacao a')
				->join('join usuario b on a.usuario_id = b.id')
				->where('empresa_id = ?', [$this->empresa_id])
				->where('is_saida = 0')
				->execute()
				->fetchInto($this);

		$saldo->saida = $saida[0]->valor;
		$saldo->entrada = $entrada->valor;
		// var_dump($saida);
		// var_dump($entrada);
		// exit;

		return $saldo;
	}
}
