<?php 
	namespace App\Models;

	use PF\Model\Model;
	use App\Connection;

	class Admin extends Model {

		private $id;
		private $name;
		private $login;
		private $password;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public static function getAdmin($login, $password){
			$db = Connection::getDb();

			$query = 'select * from TB_ADMINISTRADOR where login = ? and senha = ?';
			$stmt = $db->prepare($query);
			$stmt->bindValue(1, $login);
			$stmt->bindValue(2, $password);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}
	}
?>