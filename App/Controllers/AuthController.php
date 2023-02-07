<?php 
	namespace App\Controllers;

	use PF\Controller\Action;
	use App\Models\Admin;

	class AuthController extends Action{

		public function authenticate() {

			$admin = Admin::getAdmin($_POST['login'],$_POST['password']);

			if($admin){

				session_start();
				$_SESSION['user'] = $admin['NOME'];
				$_SESSION['user_id'] = $admin['COD_ADM'];
				$_SESSION['autenticado'] = 'SIM';
				header('Location: /home');
			}else{

				header('Location: /login?login=erro');
			}
		}

		public function logout() {
			
			session_start();
			session_destroy();
			header('Location: /home');
		}
	}

?>
