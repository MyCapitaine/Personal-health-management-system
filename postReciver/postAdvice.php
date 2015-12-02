<?php
$error = "";
$log = "";
$posterId = $_POST['advicePosterId'];
$reciverName = "";
$advice = "";

checkReciverName();
checkAdvice();

if($error == "") {
	require_once('../controller/AdviceController.php');
	require_once('../controller/UserController.php');
	$userController = new UserController();
	$reciver = $userController->getUser($reciverName);
	$type = $userController->getUserById($posterId)->type;
	$userController->close();
	if($reciver == null) $log = "RECIVER NOT FOUND";
	else {
		$adviceController = new AdviceController();
		if($adviceController->makeAdvice($posterId, $reciver->uid, $advice))
			$log = "post success";
		else 
			$log = "post fail";
		$adviceController->close();
	}
	echo $log;
	$url = "/Personal-health-management-system/view/";
	switch($type){
		case 'coach':
			$url = $url."Coach.php";
			break;
		case 'doctor':
			$url = $url."Doctor.php";
			break;
		default:
			break;
	}
	header("refresh:0.3;url=".$url);
}
else 
	echo $error;



function checkReciverName() {
	global $error, $reciverName;
	if(!empty($_POST['adviceReciverName'])) {
		$reciverName = test_input($_POST['adviceReciverName']);
	}
	else $error = $error."<p>RECIVER NAME CANT BE BLANK</p>\n";
}

function checkAdvice() {
	global $error, $advice;
	if(!empty($_POST['adviceInfo'])) {
		$advice = test_input($_POST['adviceInfo']);
	}
	else $error = $error."<p>QUESTION CANT BE BLANK</p>\n";

}

function test_input($input) {
	return $input;
}

?>