<?php
$error = "";
$log = "";
$info = "";
$oldPassword = "";
$newPassword = "";

$userName = $_POST['userName'];
$info = test_input($_POST['personal_management_infomation']);
$oldPassword = test_input($_POST['personal_management_oldPassword']);
$newPassword = test_input($_POST['personal_management_newPassword']);

if(empty($info) && empty($newPassword)) $error = $error."NO CHANGE";

if($error == "") {
	require_once("../controller/UserController.php");
	$controller = new UserController();
	if($newPassword == "") {
		if($controller->updateUser(null, $userName, null, null, $info))
			$log = "update success";
		else 
			$log = "update fail";
	}

	else {
		if($controller->checkUser($userName, $oldPassword) != null &&
			$controller->updateUser(null, $userName, $newPassword, null, ($info == "" ? null : $info)))
			$log = "update success";
		else 
			$log = "update fail";
	}
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalManagement.php");
}
else
	echo $error;


function test_input($input) {
	return $input;
}


?>