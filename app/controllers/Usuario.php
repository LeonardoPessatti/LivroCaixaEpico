<?php

namespace blitz\app\controllers;

\blitz\vendor\core\Model::import('User');
use \blitz\app\models\User as User;

class Usuario extends \blitz\vendor\core\Controller {
	public function actionvalidalogin() {
		if ($this->sessionHas('usuario-logado') == false) {
			$this->redirect('home');
		} else {
			$User = new User();
			$User->id = $this->sessionGet('usuario-logado')->id;
			$this->sessionSet('usuario-logado', $User->getUser());
		}
	}
}
