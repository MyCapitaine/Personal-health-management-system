<?php
$error = "";
$log = "";
$leaveUid = $_POST['leaveUid'];
$name = "";

checkName();

if($error == "") {
	require_once('../controller/ActivityController.php');
	$activityController = new ActivityController();
	if($activityController->leaveActivity($leaveUid, $name))
		$log = "leave success";
	else 
		$log = "leave fail";
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalActivities.php");
	
}
else 
	echo $error;

function checkName() {
	global $name, $error;
	if(!empty($_POST['leaveActivityName'])) {
		$name = test_input($_POST['leaveActivityName']);
	}
	else 
		$error = $error."<p>LEAVE ACTIVITY NAME CANT BE BLANK</p>\n";
}

function test_input($input) {
	return $input;
}

?>