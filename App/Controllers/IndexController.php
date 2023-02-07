<?php
	namespace App\Controllers;

	use PF\Controller\Action;
	use PF\Model\Container;

	class IndexController extends Action{

		public function login(){
			$this->render('login','none');
		}

		public function index(){
			$this->render('index','none');
		}
	}

?>