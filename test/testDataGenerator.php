<?php
require_once('../controller/DbController.php');

$db = new DbController();
$uid = 3;
$command = "BEGIN TRANSACTION;";
$command = $command."delete from DATAS where uid=$uid;";
for($year = 2015, $month = 1, $day = 1, $hour = 1; $day < 500;) {
	$time = mktime($hour, null, null, $month, $day, $year);
	$sportsTime = rand(0, 60);
	$restTime = rand(0, 60 - $sportsTime);
	$avgHeartRate = rand(60.0, 100.0);
	$avgBloodPressure = rand(100.0, 130.0);
	$command = $command."insert into DATAS values($uid, $time, $sportsTime, $restTime, $avgHeartRate, $avgBloodPressure);";

	if(++ $hour >= 24) {
		$hour = 1;
		$day ++;
	}
}
$command = $command."COMMIT TRANSACTION;";
$db->exec($command);


$db->close();

?>