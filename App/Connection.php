<?php
	namespace App;

	class Connection {

		public static function getDb(){
			try{
				$conn = new \PDO(
					"mysql:host=localhost;dbname=tvshow;charset=utf8",
					"root",
					"root"
				);

				return $conn;

			}catch(\PDOException $e) {
				echo $e;
			}
		}

	}

?>