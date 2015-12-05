<?php
$error = "";
$log = "";
if(empty($_COOKIE['user'])) toErrorPage();
if(empty($_COOKIE['userType']) || $_COOKIE['userType'] != 'normal') toErrorPage();

if($_FILES['personalHistoryFile']['size'] == 0) toErrorPage();

require_once('../controller/UserController.php');
require_once('../controller/DataController.php');
$userController = new UserController();
$dataController = new DataController();

$uid = $userController->getUser($_COOKIE['user'])->uid;

$xmlDoc = new DOMDocument();
$xmlDoc->load($_FILES['personalHistoryFile']['tmp_name']);
$elements = $xmlDoc->documentElement;

if(sizeof($elements) == 0) {
	echo ($error = $error."<p>cant read as xml</p>\n");
	exit;
}

$times = array();
$sportsTimes = array();
$restTimes = array();
$avgHeartRates = array();
$avgBloodPressures = array();
foreach ($elements->childNodes as $element) {
	if($element->nodeName == 'data') {
		$year = ""; $month = ""; $day = ""; $hour = "";
		foreach ($element->childNodes as $attr) {
			switch ($attr->nodeName) {
				case 'year': $year = $attr->nodeValue; break;
				case 'month': $month = $attr->nodeValue; break;
				case 'day': $day = $attr->nodeValue; break;
				case 'hour': $hour = $attr->nodeValue; break;
				case 'sportsTime': $sportsTimes[] = $attr->nodeValue; break;
				case 'restTime': $restTimes[] = $attr->nodeValue; break;
				case 'avgHeartRate': $avgHeartRates[] = $attr->nodeValue; break;
				case 'avgBloodPressure': $avgBloodPressures[] = $attr->nodeValue; break;
				default: 
					if($attr->nodeName != '#text') {
						$error = $error."<p>xml error</p>\n";
						break 3;
					}
					else break;
			}
		}
		$times[] = mktime($hour, null, null, $month, $day, $year);
	}
	else if($element->nodeName != '#text') {
		$error = $error."<p>xml error</p>\n";
		break;
	}
}

if($error == "") {
	if($dataController->addDatas($uid, $times, $sportsTimes, $restTimes, $avgHeartRates, $avgBloodPressures))
		$log = "add success";
	else
		$log = "add fail";
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalHistory.php");
}
else
	echo $error;

$userController->close();
$dataController->close();


function toErrorPage() {
	header('refresh:0;url=/Personal-health-management-system/view/error.php');
	exit;
}


?>