<?php

	namespace App\Controllers;

	use PF\Controller\Action;
	use PF\Model\Container;

	class AppController extends Action{

		public function home() {

			session_start();

			date_default_timezone_set ("America/Sao_Paulo");

			$currentDay = false;
			$weekDay = strftime("%A", strtotime(date("Y-m-d")));
			
			$hour = date("H") ;
			$hour .= ':00';

			if(isset($_POST['data']) && isset($_POST['hora'])){
				$weekDay = strftime("%A", strtotime($_POST['data'])) ;
				$hour = $_POST['hora'];
				$hour .= ':00';
			}

			if($weekDay == strftime("%A", strtotime(date("Y-m-d")))){
				$currentDay = true;
			}

			switch ($weekDay) {
				case 'Monday':
					$weekDay = 2;
					$weekName = 'Segunda';
					break;

				case 'Tuesday':
					$weekDay = 3;
					$weekName = 'Terca';
				 	break;

				case 'Wednesday':
					$weekDay = 4;
					$weekName = 'Quarta';
					break;

				case 'Thursday':
					$weekDay = 5;
					$weekName = 'Quinta';
					break;

				case 'Friday':
					$weekDay = 6;
					$weekName = 'Sexta';
					break;

				case 'Saturday':
					$weekDay = 7;
					$weekName = 'Sabado';
				 	break;

				case 'Sunday':
					$weekDay = 1;
					$weekName = 'Domingo';
					break;
			}

			$this->view->currentDay = $currentDay;
			$this->view->weekDay = ucfirst(strtolower($weekName));

			$prog = Container::getModel('Prog');
			$this->view->prog = $prog->searchProg($weekDay,$hour);

			$this->render('home');
		}

		//shows pagged the TV programmation for the logged admin
		public function showProgs() {

			$this->validateAuth();

			//if page is not setted, it gets page 1
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			
			//gets programmation by day
			$prog = Container::getModel('Prog');
			$this->view->progList = $prog->getProgsPerDay($page);
			$this->view->totalPages = 7;
			$this->view->activePage = $page;

			$this->render('prog_list');
		}

		//receives the action from the programmation list and redirects to destination page with setted fields
		//edit page works with a dinamic object $this->view->prog that is used in a single form
		//for edit action, $this->view->prog receives an object by the id.
		//for save action, $this->view->prog is setted with an empty prog object
		public function redirectAction(){

			$this->validateAuth();

			$action = $_GET['action'];

			$prog = Container::getModel('Prog');

			//for edit action, it gets the programmation Id and sets the form action 
			if($action == 'edit'){

				$id = $_GET['id'];

				if($prog->getProgById($id)){

					$this->loadFieldValues();
					$this->view->prog = $prog->getProgById($id);
					$this->view->formAction = $action;
					$this->render('prog_edit');
				}else{

					header('Location: /progs');
				}

			//for save action, it instantiates an empty object for loading in input values
			}elseif($action == 'save'){

				$this->loadFieldValues();
				$this->view->prog = $prog;
				$this->view->prog->__set('id','');
				$this->view->prog->__set('name','');
				$this->view->prog->__set('day','');
				$this->view->prog->__set('start','');
				$this->view->prog->__set('end','');
				$this->view->formAction = $action;
				$this->render('prog_edit');
			}else{

				header('Location: /progs');
			}
		}

		//validates input fields and saves/updates the programmation 
		public function editProg(){

			$this->validateAuth();

			//define a possible errors array
			$errors = array();

			//instance Programation
			$prog = Container::getModel('Prog');

			//set programation attributes
			if($_GET['action'] == 'edit'){
				$prog->__set('id', $_POST['id']);
			}elseif($_GET['action'] == 'save'){
				$prog->__set('id','');
			}
			$prog->__set('name', $_POST['name']);
			$prog->__set('day', $_POST['day']);
			$prog->__set('start', $_POST['start']);
			$prog->__set('end', $_POST['end']);

			//test validation of the required fields
			if($this->validateFields($fields, $errors)){

				if($_GET['action'] == 'edit'){

					$prog = $prog->update();
					//reload form data
					header('Location: /redirectAction?action=edit&id='.$prog->id.'&msg=success');
				}elseif($_GET['action'] == 'save'){

					$id = $prog->save();
					//reload form data
					header('Location: /redirectAction?action=edit&id='.$id.'&msg=success');
				}else{

					header('Location: /progs');
				}
			}elseif($_GET['action'] == 'save'){
				
				//recover programmation data and loads array errors
				$this->view->prog = $prog;
				$this->view->formAction = $_GET['action'];
				$this->loadFieldValues();
				$this->view->errors = $errors;

				$this->render('prog_edit');
			}else{

				header('Location: /progs');
			}
		}

		public function deleteProg(){

			$this->validateAuth();

			$prog = Container::getModel('Prog');

			$prog->__set('id', $_POST['id']);
			$prog->delete();

			header('Location: /progs?success=true');
		}

		//loads field values
		public function loadFieldValues(){

			$this->view->dias = array('DOMINGO','SEGUNDA','TERÇA','QUARTA','QUINTA','SEXTA','SÁBADO');
		}

		//validates invalid or empty required input values
		public function validateFields(&$fields, &$errors){

			$flag = true;

			//set required input fields
			$requiredFields = array(
				'name' => 'Nome',
				'day' => 'Dia de exibição',
				'start' => 'Início',
				'end' => 'Fim'
			);

			foreach($requiredFields as $index => $field){

				if($_POST[$index] == false || $_POST[$index] == NULL){

					array_push($errors,"Campo <strong>".$field."</strong> inválido ou vazio!");
					$flag = false;
				}
			}

			if($flag){

				if(strlen($_POST["start"]) <= 2){
					$_POST["start"] .= ':00';
				}

				if(strlen($_POST["end"]) <= 2){
					$_POST["end"] .= ':00';
				}

				if(strlen($_POST["start"]) > 8 || strlen($_POST["start"]) > 8){
					$flag = false;
				}
			}

			return $flag;
		}

		public function validateAuth() {

			session_start();

			if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || !isset($_SESSION['autenticado']) ||  $_SESSION['autenticado'] == 'NAO'){
				header('Location: /home?erro=true');
			}
		}
		
	}

?>