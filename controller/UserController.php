<?php
require_once('DbController.php');
class UserController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function checkUser($userName, $password) {
		// 
	}

	public function getUsers() {
		$command = "select * from USERS;";
		$result = $this->dbController->query($command);
		$users = array();
		while($row = $result->fetchArray()) {
			$user = new Users();
			$user->uid = $row['uid'];
			$user->type = $row['type'];
			$user->userName = $row['userName'];
			$user->password = $row['password'];
			$users[] = $user;
		}
		return $users;

	}

	public function getUser($userName) {
		// $command = "select * from USERS where userName = ".$userName.";";


	}

	public function addUser($userName, $password, $type) {
		$command = "insert into USERS values(NULL,'".$type."','".$userName."','".$password."','');";
		return $this->dbController->exec($command);
	}

	public function updateUser($uid, $userName, $password, $type, $info) {
		if($uid == null) {

		}
		else {
			
		}
		// 
	}

	public function removeUser($userName) {
		$command = "delete from USERS where userName = ".$userName.";";
		return $this->dbController->exec($command);
	}


	public function close() {
		$this->dbController->close();
	}
}





?>