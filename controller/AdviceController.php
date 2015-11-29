<?php
require_once('DbController.php');
class AdviceController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function makeAdvice() {

	}

	public function posterGetAdvices() {

	}

	public function reciverGetAdvices() {

	}

	public function checkAdvice() {

	}
	

	public function close() {
		$this->dbController->close();
	}
}





?>