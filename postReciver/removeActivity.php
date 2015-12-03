<?php
$error = "";
$log = "";
$removeUid = $_POST['removeUid'];
$name = "";

checkName();

if($error == "") {
	require_once('../controller/ActivityController.php');
	$activityController = new ActivityController();
	if($activityController->removeActivity($removeUid, $name))
		$log = "remove success";
	else 
		$log = "remove fail";
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalActivities.php");
}
else 
	echo $error;


function test_input($input) {
	return $input;
}

function checkName() {
	global $name, $error;
	if(!empty($_POST['removeActivityName'])) {
		$name = test_input($_POST['removeActivityName']);
	}
	else 
		$error = $error."<p>REMOVE ACTIVITY NAME CANT BE BLANK</p>\n";
}

?>