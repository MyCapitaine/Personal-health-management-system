<?php
$error = "";
$log = "";
$uid = $_POST['joinerUid'];
$name = "";

checkName();

if($error == "") {
	require_once('../controller/ActivityController.php');
	$activityController = new ActivityController();
	if($activityController->joinActivity($uid, $name))
		$log = "join success";
	else 
		$log = "join fail";
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalActivities.php");
}
else 
	echo $error;



function checkName() {
	global $name, $error;
	if(!empty($_POST['joinActivityName'])) {
		$name = test_input($_POST['joinActivityName']);
	}
	else 
		$error = $error."<p>JOIN ACTIVITY NAME CANT BE BLANK</p>\n";
}


function test_input($input) {
	return $input;
}




?>