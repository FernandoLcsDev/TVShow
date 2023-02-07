<?php
	namespace App\Models;

	use PF\Model\Model;
	use App\Connection;

	class Prog extends Model{

		private $id;
		private $name;
		private $day;
		private $start;
		private $end;

		public function __get($attribute){
			return $this->$attribute;
		}

		public function __set($attribute, $value){
			$this->$attribute = $value;
		}

		public function save(){

			$query = "
					insert into TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
					values (?,?,?,?)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->name);
			$stmt->bindValue(2, $this->day);
			$stmt->bindValue(3, $this->start);
			$stmt->bindValue(4, $this->end);
			$stmt->execute();

			return $this->db->lastInsertId();
		}

		public function update(){

			$query = "
					update TB_PROGRAMA
					set NOME_PROG = ?, DIA_PROG = ?, HR_INICIO = ?,HR_FIM = ?
					where COD_PROG = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->name);
			$stmt->bindValue(2, $this->day);
			$stmt->bindValue(3, $this->start);
			$stmt->bindValue(4, $this->end);
			$stmt->bindValue(5, $this->id);
			$stmt->execute();

			return $this;
		}

		public function delete(){

			$query = "
				delete
				from TB_PROGRAMA
				where COD_PROG = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get('id'));
			$stmt->execute();

			return true;
		}

		public function searchProg($week, $hour){

			$db = Connection::getDb();

			$query = "
					select NOME_PROG as name, HR_INICIO as start, HR_FIM as end
					from TB_PROGRAMA 
					where DIA_PROG = ? and HR_INICIO >= ? limit 10";
			$stmt = $db->prepare($query);
			$stmt->bindValue(1, $week);
			$stmt->bindValue(2, $hour);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_OBJ);
		}

		public function getProgsPerDay($day){

			$db = Connection::getDb();

			$query = "select * from TB_PROGRAMA where DIA_PROG = ? order by HR_INICIO asc";
			$stmt = $db->prepare($query);
			$stmt->bindValue(1, $day);
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_OBJ);
		}

		public function getProgById($id){

			$db = Connection::getDb();

			$query = "
					select COD_PROG as id, NOME_PROG as name, DIA_PROG as day, HR_INICIO as start, HR_FIM as end
					from TB_PROGRAMA 
					where COD_PROG = ?";
			$stmt = $db->prepare($query);
			$stmt->bindValue(1, $id);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_OBJ);
		}
	}

?>