<?php
require_once('DbController.php');
class QuestionController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function makeQuestion() {

	}

	public function posterGetQuestions() {

	}

	public function reciverGetQuestions() {
		
	}

	public function checkQuestion() {
		
	}

	public function close() {
		$this->dbController->close();
	}
}





?>