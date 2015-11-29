<?php
require_once('DbController.php');
class UserController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function checkUser($userName, $password) {
		
	}

	public function getUser($uid) {

	}

	public function addUser() {

	}

	public function updateUser() {

	}

	public function removeUser() {
		
	}

	public function close() {
		$this->dbController->close();
	}
}





?>