<?php
$error = "";
$log = "";
$sportsTime = "";
$restTime = "";
$avgHeartRate = "";
$avgBloodPressure = "";

if(empty($_COOKIE['user']))
	toErrorPage();
if(empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] != 'POST' && $_SERVER['REQUEST_METHOD'] != 'GET')
	toErrorPage();
$date = array_reverse(explode('/', $_SERVER['REQUEST_URI']));
$hour = $date[0];
$day = $date[1];
$month = $date[2];
$year = $date[3];
$uid = $date[4];

$time = mktime($hour, 0, 0, $month, $day, $year);

checkUser();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	checkSportsTime();
	checkRestTime();
	checkAvgHeartRate();
	checkAvgBloodPressure();
}

if($error == "") {
	require_once("../controller/DataController.php");
	$dataController = new DataController();
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($dataController->addData($uid, $time, $sportsTime, $restTime, $avgHeartRate, $avgBloodPressure))
			$log = "add success";
		else 
			$log = "add fail";
		echo $log;
		header('refresh:0.3;url=/Personal-health-management-system/view/PersonalHistory.php');
	}
	else {
		$data = $dataController->getData($uid, $time);
		if($data != null) {
			echo "<p>".date("Y-m-d-h", $data->time)."</p>\n";
			echo "<p>sportsTime : $data->sportsTime</p>\n";
			echo "<p>restTime : $data->restTime</p>\n";
			echo "<p>avgHeartRate : $data->avgHeartRate</p>\n";
			echo "<p>avgBloodPressure : $data->avgBloodPressure</p>\n";
		}
		else
			echo "<h1>NULL DATA</h1>\n";

	}

	$dataController->close();
}
else
	echo $error;



function toErrorPage() {
	header('refresh:0;url=/Personal-health-management-system/view/error.php');
}

function test_input($input) {
	return $input;
}

function checkSportsTime() {
	global $sportsTime, $error;
	if(!empty($_POST['dataSportsTime'])) {
		$sportsTime = test_input($_POST['dataSportsTime']);
	}
	else 
		$error = $error."<p>SPORTS TIME CANT BE BLANK</p>\n";
}

function checkRestTime() {
	global $restTime, $error;
	if(!empty($_POST['dataRestTime'])) {
		$restTime = test_input($_POST['dataRestTime']);
	}
	else 
		$error = $error."<p>REST TIME CANT BE BLANK</p>\n";
}

function checkAvgHeartRate() {
	global $avgHeartRate, $error;
	if(!empty($_POST['dataAvgHeartRate'])) {
		$avgHeartRate = test_input($_POST['dataAvgHeartRate']);
	}
	else 
		$error = $error."<p>AVG HEART RATE CANT BE BLANK</p>\n";
}

function checkAvgBloodPressure() {
	global $avgBloodPressure, $error;
	if(!empty($_POST['dataAvgBloodPressure'])) {
		$avgBloodPressure = test_input($_POST['dataAvgBloodPressure']);
	}
	else 
		$error = $error."<p>AVG BLOOD PRESSURE CANT BE BLANK</p>\n";
}

function checkUser() {
	global $uid;
	require_once('../controller/UserController.php');
	$userController = new UserController();
	$result = $userController->checkUidAndName($uid, $_COOKIE['user']);
	$userController->close();
	if(!$result) toErrorPage();
}


?>