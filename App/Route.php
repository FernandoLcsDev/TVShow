<?php
	namespace App;

	use PF\Init\Bootstrap;

	class Route extends Bootstrap {

		public function initRoutes() {

			$this->routes['login'] = array(
				'index' => '/login',
				'controller' => 'indexController',
				'action' => 'login'
			);

			$this->routes['home'] = array(
				'index' => '/home',
				'controller' => 'appController',
				'action' => 'home'
			);

			$this->routes['index'] = array(
				'index' => '/',
				'controller' => 'indexController',
				'action' => 'index'
			);

			$this->routes['authenticate'] = array(
				'index' => '/authenticate',
				'controller' => 'authController',
				'action' => 'authenticate'
			);

			$this->routes['logout'] = array(
				'index' => '/logout',
				'controller' => 'authController',
				'action' => 'logout'
			);

			$this->routes['progs'] = array(
				'index' => '/progs',
				'controller' => 'appController',
				'action' => 'showProgs'
			);

			$this->routes['redirectAction'] = array(
				'index' => '/redirectAction',
				'controller' => 'appController',
				'action' => 'redirectAction'
			);

			$this->routes['saveProg'] = array(
				'index' => '/saveProg',
				'controller' => 'appController',
				'action' => 'saveProg'
			);

			$this->routes['editProg'] = array(
				'index' => '/editProg',
				'controller' => 'appController',
				'action' => 'editProg'
			);

			$this->routes['deleteProg'] = array(
				'index' => '/deleteProg',
				'controller' => 'appController',
				'action' => 'deleteProg'
			);

			$this->__set('routes', $this->routes);
		}

	}


?>