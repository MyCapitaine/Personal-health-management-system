<?php
require_once('DbController.php');
class DataController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function addData() {

	}

	public function getDatas() {

	}


	public function close() {
		$this->dbController->close();
	}
}





?>