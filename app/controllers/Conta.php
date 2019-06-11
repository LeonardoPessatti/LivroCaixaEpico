<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('User');
use \blitz\app\models\User as User;

class Conta extends \blitz\vendor\core\Controller {
	public function actionIndex() {
		// $this->log('Mais um acesso bem sucedido ʘ‿ʘ','views.txt');
		// $User = new User();
		// $User->log('Novo User feito :D', 'Users.csv');
		$this->inputStart($_POST);

		// $this->inputAddValidation([
		// 	'login' => 'required',
		// 	'senha' => 'required',

		// 	'nome' => 'required',
		// 	'cpf' => 'required',
		// 	'email' => 'required',
		// 	'novo_senha' => 'required',
		// 	'emp_nome' => 'required',
		// 	'cnpj' => 'required'
		// ]);

		$this->inputAddFilter([
			'login' => 'trim|sanitize_string',
			'senha' => 'trim|sanitize_string',

			'nome' => 'trim|sanitize_string',
			'cpf' => 'trim|sanitize_string',
			'email' => 'trim|sanitize_string',
			'novo_senha' => 'trim|sanitize_string',
			'emp_nome' => 'trim|sanitize_string',
			'cnpj' => 'trim|sanitize_string'
		]);

		$data = $this->getInputData();
		// if (!is_null($data)) {
		// var_dump('cu');
		// exit;
		$User = new User();

		if (!empty($data['login'])) {
			$User->login = $data['login'];
			$User->senha = $data['senha'];

			// var_dump($data);
			// exit;
			$login = $User->login();

			if ($login != false) {
				$this->sessionSet('usuario-logado', $login);
				// $this->sessionSet('privacy', $login->isadmin);
				$this->redirect('usuario/home');
			} else {
				$this->outputPage('index::cadastro', ['erro' => 2]);
			}
		} elseif (!empty($data['cpf'])) {
			$User->nome = $data['nome'];
			$User->cpf = $data['cpf'];
			$User->email = $data['email'];
			$User->senha = $data['novo_senha'];
			$User->emp_nome = $data['emp_nome'];
			$User->cnpj = $data['cnpj'];

			$cadastrado = $User->cadastro();

			if ($cadastrado != false) {
				// $this->sessionSet('usuario-logado', $cadastrado);

				$this->redirect('usuario/home');
			} else {
				$this->outputPage('index::cadastro', ['erro' => 1]);
			}
		} else {
			$this->outputPage('index::cadastro');
		}
	}

	public function actionhome() {
		if ($this->sessionGet('usuario-logado')) {
			$this->outputPage('index::home');
		} else {
			$this->outputPage('index::cadastro');
			$this->redirect('/');
		}
	}

	public function actionvalidalogin() {
		if ($this->sessionHas('usuario-logado') == false) {
			$this->redirect('home');
		}
	}

	public function actionEfetuaLogoff() {
		$this->sessionDestroy();
		$this->redirect('');
	}
}