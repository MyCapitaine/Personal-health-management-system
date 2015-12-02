<?php
require_once('DbController.php');
class ActivityController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function joinActivity($uid, $activityName) {
		$command1 = "select * from ACTIVITIES where activityName='".$activityName."';";
		$activity = $this->dbController->query($command1)->fetchArray();
		if(!$activity) return false;
		$aid = $activity['AID'];
		$command2 = "insert into ACTORS values(".$aid.",".$uid.");";
		return $this->dbController->exec($command2);
	}

	public function addActivity($creatorUid, $activityName, $inner) {
		$command = "insert into ACTIVITIES values(null, ".$creatorUid.",'".$activityName."','".$inner."',".time().",'acting');";
		return $this->dbController->exec($command) && $this->joinActivity($creatorUid, $activityName);
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