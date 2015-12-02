<?php
require_once('DbController.php');
class ActivityController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function joinActivity($activityName, $uid) {

	}

	public function addActivity($activityName, $creatorUid) {

	}

	public function updateActivity() {

	}

	public function removeActivity() {

	}

	public function getActivityList() {
		
	}

	public function close() {
		$this->dbController->close();
	}
}





?>