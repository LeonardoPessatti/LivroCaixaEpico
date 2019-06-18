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

			$User->id = $User->login();
			$login = $User->getUser();

			if ($login != false) {
				$this->sessionSet('usuario-logado', $login);
				// $this->sessionSet('usuario-logado', $login->id);
				// $this->sessionSet('empresa-logada', $login->empresa_id);
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

			$User->id = $User->cadastro();
			// var_dump($User->cadastro());
			// var_dump($User->getUser());
			// exit;
			if ($User->id != false) {
				$this->sessionSet('usuario-logado', $User->getUser());

				$this->redirect('usuario/home');
			} else {
				$this->outputPage('index::cadastro', ['erro' => 1]);
			}
		} else {
			$this->outputPage('index::cadastro');
		}
	}

	public function actionCliente() {
		$this->inputStart($_POST);
		$data = $this->getInputData();
		$User = new User();
		if (!empty($data['nome'])) {
			$User->nome = $data['nome'];
			$User->empresa_id = $this->sessionGet('usuario-logado')->empresa_id;
			$status = $User->novoCliente();
			if (!is_int($status)) {
				$status->erro = 1;
			}
		} else {
			$status->erro = 0;
		}
		$this->outputJson($status);
	}

	public function actionCategoria() {
		$this->inputStart($_POST);
		$data = $this->getInputData();
		$User = new User();
		if (!empty($data['nome'])) {
			$User->nome = $data['nome'];
			$User->desc = $data['desc'];
			$User->empresa_id = $this->sessionGet('usuario-logado')->empresa_id;
			$status = $User->novaCategoria();
			if (!is_int($status)) {
				$status->erro = 1;
			}
		} else {
			$status->erro = 0;
		}
		$this->outputJson($status);
	}

	public function actionMovimentacao() {
		$this->inputStart($_POST);
		$data = $this->getInputData();
		$User = new User();
		// $this->outputJson($data);

		if (!empty($data['valor'])) {
			$User->valor = $data['valor'];
			$User->desc = $data['desc'];
			$User->is_saida = $data['is_saida'] == 'true' ? 1 : 0;
			$User->cli = $data['cli'];
			$User->cat = $data['cat'];
			$User->usuario_id = $this->sessionGet('usuario-logado')->id;
			// var_dump($User);
			$status = $User->novaMovimentacao();
			if (!is_int($status)) {
				$status->erro = 1;
			}
		} else {
			$status->erro = 0;
		}
		$this->outputJson($status);
	}

	public function actionhome() {
		if ($this->sessionGet('usuario-logado')) {
			$User = new User();
			$User->empresa_id = $this->sessionGet('usuario-logado')->empresa_id;

			$this->outputPage('index::home', ['user' => $this->sessionGet('usuario-logado'), 'movs' => $User->getMov()]);
		} else {
			// $this->outputPage('index::cadastro');
			$this->redirect('');
		}
	}

	public function actionEfetuaLogoff() {
		$this->sessionDestroy();
		$this->redirect('');
	}
}
