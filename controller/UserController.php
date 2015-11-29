<?php
require_once('DbController.php');
class UserController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}


	public function checkUser(DbController $connection, var $userName, var $password) {
		
	}

	public function getUser(DbController $dbController, var $uid) {

	}

	public function close() {
		$this->dbController->close();
	}
}





?>