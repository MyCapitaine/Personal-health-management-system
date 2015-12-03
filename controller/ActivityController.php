<?php
require_once('DbController.php');
class ActivityController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}

	public function joinActivity($uid, $activityName) {
		$command1 = "select * from ACTIVITIES where activityName='$activityName';";
		$activity = $this->dbController->query($command1)->fetchArray();
		if(!$activity) return false;
		$aid = $activity['AID'];

		$command2 = "select * from ACTORS where uid=$uid and AID=$aid;";
		if($this->dbController->query($command2)->fetchArray()) return false;

		$command3 = "insert into ACTORS values(".$aid.",".$uid.");";
		return $this->dbController->exec($command3);
	}

	public function leaveActivity($uid, $activityName) {
		$command1 = "select * from ACTIVITIES where activityName='$activityName';";
		$activity = $this->dbController->query($command1)->fetchArray();
		if(!$activity || $activity['creatorUid'] == $uid) return false;

		$command2 = "delete from ACTORS where uid=$uid and AID=".$activity['AID'].";";
		return $this->dbController->exec($command2);
	}



	public function addActivity($creatorUid, $activityName, $inner) {
		$command = "insert into ACTIVITIES values(null, $creatorUid, '$activityName', '$inner',".time().",'acting');";
		return $this->dbController->exec($command) && $this->joinActivity($creatorUid, $activityName);
	}

	public function updateActivity($creatorUid, $activityId, $activityName, $inner) {
		$condition = "";
		$set = "";
		if($activityId == null) {
			$condition = "activityName='$activityName' and creatorUid=$creatorUid";
			$set = "inner='$inner'";
		}
		else {
			$condition = "activityId=$activityId and creatorUid=$creatorUid";
			$set = "activityName='$activityName', inner='$inner'";
		}
		$command = "update ACTIVITIES set $set where $condition";
		return $this->dbController->exec($command);

	}

	public function removeActivity($uid, $activityName) {
		$command1 = "select * from ACTIVITIES where activityName='$activityName';";
		echo $command1;
		$result = $this->dbController->query($command1)->fetchArray();
		if(!$result) return false;
		$aid = $result['AID'];
		$command2 = "delete from ACTIVITIES where AID=$aid and creatorUid=$uid;";
		$command2 = $command2."delete from ACTORS where AID=$aid;";
		return  $this->dbController->exec($command2);
	}

	public function getActivityById($aid) {
		$command1 = "select * from ACTIVITIES where AID=$aid;";
		$a = $this->dbController->query($command1)->fetchArray();
		if(!$a) return null;
		$activity = new Activities();
		$activity->aid = $a['AID'];
		$activity->creatorUid = $a['creatorUid'];
		$activity->activityName = $a['activityName'];
		$activity->inner = $a['inner'];
		$activity->time = $a['time'];
		$activity->status = $a['status'];
		$activity->joinersIdList = array();

		$command2 = "select * from ACTORS where AID=$aid;";
		$result = $this->dbController->query($command2);
		while($row = $result->fetchArray())
			$activity->joinersIdList[] = $row['uid'];
		return $activity;
	}

	public function getJoinedActivities($uid) {
		$command1 = "select * from ACTORS where uid=$uid;";
		$result1 = $this->dbController->query($command1);
		$joinedActivities = array();
		while($row = $result1->fetchArray()) {
			$activity = $this->getActivityById($row['AID']);
			if($activity) $joinedActivities[] = $activity;
		}
		return $joinedActivities;
	}

	public function close() {
		$this->dbController->close();
	}
}





?>