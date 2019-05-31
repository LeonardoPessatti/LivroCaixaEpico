<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('User');
use \blitz\app\models\User as User;

class Index extends \blitz\vendor\core\Controller {
	public function actionIndex() {
		// $this->log('Mais um acesso bem sucedido ʘ‿ʘ','views.txt');
		// $User = new User();
		// $User->log('Novo User feito :D', 'Users.csv');
		$this->inputStart($_POST);

		$this->inputAddValidation([
			'nome' => 'required',
			'cpf' => 'required',
			'email' => 'required',
			'senha' => 'required',
			'emp_nome' => 'required',
			'cnpj' => 'required'
		]);

		$this->inputAddFilter([
			'nome' => 'trim|sanitize_string',
			'cpf' => 'trim|sanitize_string',
			'email' => 'trim|sanitize_string',
			'senha' => 'trim|sanitize_string',
			'emp_nome' => 'trim|sanitize_string',
			'cnpj' => 'trim|sanitize_string'
		]);

		$data = $this->getInputData();
		if (!is_null($data)) {
			$User = new User();

			$User->nome = $data['nome'];
			$User->cpf = $data['cpf'];
			$User->email = $data['email'];
			$User->senha = $data['senha'];
			$User->emp_nome = $data['emp_nome'];
			$User->cnpj = $data['cnpj'];

			$cadastrado = $User->cadastro();

			if ($cadastrado != false) {
				$this->outputPage('index::home');
			} else {
				$this->outputPage('index::cadastro', ['erro' => 1]);
			}
		}

		$this->outputPage('index::cadastro');
	}

	public function actionUsers() {
		$User = new User();

		$this->outputPage('index::Users', [
			'list' => $User->list()
		]);
	}

	public function actionUser($id) {
		$User = new User();

		$User->id = $id;

		$this->outputPage('index::User', [
			'infos' => $User->infos()
		]);
	}
}
