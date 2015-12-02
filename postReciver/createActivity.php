<?php
$error = "";
$log = "";
$creatorUid = $_POST['creatorUid'];
$name = "";
$inner = "";

checkName();
checkInner();

if($error == "") {
	require_once('../controller/ActivityController.php');
	$activityController = new ActivityController();
	if($activityController->addActivity($creatorUid, $name, $inner))
		$log = "create success";
	else 
		$log = "create fail";
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalActivities.php");
}
else 
	echo $error;



function checkName() {
	global $name, $error;
	if(!empty($_POST['createActivityName'])) {
		$name = test_input($_POST['createActivityName']);
	}
	else 
		$error = $error."<p>CREATE ACTIVITY NAME CANT BE BLANK</p>\n";
}

function checkInner() {
	global $inner, $error;
	if(!empty($_POST['createActivityInner'])) {
		$inner = test_input($_POST['createActivityInner']);
	}
	else 
		$error = $error."<p>CREATE ACTIVITY INNER CANT BE BLANK</p>\n";
}


function test_input($input) {
	return $input;
}


?>