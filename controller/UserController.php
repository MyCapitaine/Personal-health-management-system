<?php
require_once('DbController.php');
class UserController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function checkUser($userName, $password) {
		$command = "select * from USERS where userName = '".$userName."';";
		$result = $this->dbController->query($command);
		$row = $result->fetchArray();
		if($row && md5(md5($row['password'])) == $password) {
			$user = new Users();
			$user->info = $row['info'];
			$user->uid = $row['uid'];
			$user->type = $row['type'];
			$user->userName = $row['userName'];
			return $user;
		} 
		else return null;
	}

	public function getUsers() {
		$command = "select * from USERS;";
		$result = $this->dbController->query($command);
		$users = array();
		while($row = $result->fetchArray()) {
			$user = new Users();
			$user->uid = $row['uid'];
			$user->type = $row['type'];
			$user->info = $row['info'];
			$user->userName = $row['userName'];
			$user->password = $row['password'];
			$users[] = $user;
		}
		return $users;

	}

	public function getUser($userName) {
		$command = "select * from USERS where userName = '".$userName."';";
		$result = $this->dbController->query($command);
		$row = $result->fetchArray();
		if($row) {
			$user = new Users();
			$user->uid = $row['uid'];
			$user->type = $row['type'];
			$user->info = $row['info'];
			$user->userName = $row['userName'];
			return $user;
		}
		else return null;
	}

	public function getUserById($uid) {
		$command = "select * from USERS where uid = '".$uid."';";
		$result = $this->dbController->query($command);
		$row = $result->fetchArray();
		if($row) {
			$user = new Users();
			$user->uid = $row['uid'];
			$user->type = $row['type'];
			$user->info = $row['info'];
			$user->userName = $row['userName'];
			return $user;
		}
		else return null;
	}

	public function addUser($userName, $password, $type) {
		$command = "insert into USERS values(NULL,'".$type."','".$userName."','".$password."','');";
		return $this->dbController->exec($command);
	}

	public function updateUser($uid, $userName, $password, $type, $info) {
		$condition = "";
		$inner = "";
		if($uid == null) {
			$condition = "userName = '".$userName."'";
		}
		else {
			$condition = "$uid = '".$uid."'";
			if($userName != null) $inner = ",userName = '".$userName."'";
		}
		if($password != null) {
			if($inner != "") $inner = $inner.",";
			$inner = $inner."password = '".$password."'";
		}
		if($type != null) {
			if($inner != "") $inner = $inner.",";
			$inner = $inner."type = '".$type."'";
		}
		if($info != null) {
			if($inner != "") $inner = $inner.",";
			$inner = $inner."info = '".$info."'";
		}
		$command = "update USERS set ".$inner." where ".$condition.";";
		return $this->dbController->exec($command);
	}

	public function removeUser($userName) {
		$command = "delete from USERS where userName = '".$userName."';";
		return $this->dbController->exec($command);
	}


	public function close() {
		$this->dbController->close();
	}
}





?>