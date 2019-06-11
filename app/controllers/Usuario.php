<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('User');
use \blitz\app\models\User as User;

class Usuario extends \blitz\vendor\core\Controller {
	public function actionhome() {
		if ($this->sessionGet('usuario-logado')) {
			$User = new User();
			$User->id = $this->sessionGet('usuario-logado');
			// var_dump($User);
			// exit;

			$this->outputPage('index::home', ['user' => $User->getUser()]);
		} else {
			$this->outputPage('index::cadastro');
			$this->redirect('/');
		}
	}
}
