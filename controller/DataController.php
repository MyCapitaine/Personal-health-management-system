<?php
require_once('DbController.php');
class DataController {
	private $dbController;
	public function __construct() {
		$this->dbController = new DbController();
	}
	
	public function addData($uid, $time, $sportsTime, $restTime, $avgHeartRate, $avgBloodPressure) {
		$command = "insert into DATAS values($uid, $time, $sportsTime, $restTime, $avgHeartRate, $avgBloodPressure);";
		return $this->dbController->exec($command);
	}

	public function getDatas($uid, $timeStart, $timeEnd) {
		$condition = "";
		if($timeStart != null) $condition = "time>$timeStart";
		if($timeEnd != null) {
			if($condition != "") $condition = $condition." and time<$timeEnd";
			else $condition = "time<$timeEnd";
		}
		$command = "select * from DATAS where uid=$uid and $condition;";
		$result = $this->dbController->query($command);
		$datas = array();
		while($row = $result->fetchArray) {
			$data = new Datas();
			$data->uid = $row['uid'];
			$data->time = $row['time'];
			$data->sportsTime = $row['sportsTime'];
			$data->restTime = $row['restTime'];
			$data->avgHeartRate = $row['avgHeartRate'];
			$data->avgBloodPressure = $row['avgBloodPressure'];
			$Datas[] = $data;
		}
		return $datas;

	}

	public function getData($uid, $time) {
		$command = "select * from DATAS where uid=$uid and time=$time;";
		$result = $this->dbController->query($command)->fetchArray();
		if(!$result) return null;
		$data = new Datas();
		$data->uid = $result['uid'];
		$data->time = $result['time'];
		$data->sportsTime = $result['sportsTime'];
		$data->restTime = $result['restTime'];
		$data->avgHeartRate = $result['avgHeartRate'];
		$data->avgBloodPressure = $result['avgBloodPressure'];
		return $data;
	}

	public function removeData($uid, $time) {
		$command = "delete from DATAS where uid=$uid and time=$time;";
		return $this->dbController->exec($command);
	}


	public function close() {
		$this->dbController->close();
	}
}





?>