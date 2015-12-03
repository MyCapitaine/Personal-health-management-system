<?php
$error = "";
$log = "";
$creatorUid = $_POST['updateUid'];
$name = "";
$inner = "";

checkName();
checkInner();

if($error == "") {
	require_once('../controller/ActivityController.php');
	$activityController = new ActivityController();
	$activityController->updateActivity($creatorUid, null, $name, $inner);
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalActivities.php");

}
else 
	echo $error;


function checkName() {
	global $name, $error;
	if(!empty($_POST['updateActivityName'])) {
		$name = test_input($_POST['updateActivityName']);
	}
	else 
		$error = $error."<p>UPDATE ACTIVITY NAME CANT BE BLANK</p>\n";
}

function checkInner() {
	global $inner, $error;
	if(!empty($_POST['updateActivityInner'])) {
		$inner = test_input($_POST['updateActivityInner']);
	}
	else 
		$error = $error."<p>UPDATE ACTIVITY INNER CANT BE BLANK</p>\n";
}


function test_input($input) {
	return $input;
}




?>