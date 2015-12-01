<?php

//error infomation
$error = "";
//operation success or fail
$log = "";
$name = ""; $password = ""; $type = ""; 
checkName();
//check operation
if(empty($_POST["manager_operation"])) {
	$error = $error."<p>CHOOSE A OPERATION</p>\n";
}
else if($_POST["manager_operation"] == "add") {
	checkPassword();
	checkType();

	if($error == "") {
		require_once('../controller/UserController.php');
		$controller = new UserController();
		if($controller->addUser($name, $password, $type)) {
			$log = "add succussed";
		}
		else $log = "add fail";
		$controller->close();
		header("refresh:0;url=../view/Manager.php");

	}

}	
else if($_POST["manager_operation"] == "delete") {
	if($error == "") {
		require_once('../controller/UserController.php');
		$controller = new UserController();
		if($controller->removeUser($name)) {
			$log = "delete succussed";
		}
		else $log = "delete fail";
		$controller->close();
		header("refresh:0;url=../view/Manager.php");
	}
}
else if($_POST["manager_operation"] == "update") {
	checkType();
	if($error == "") {
		require_once('../controller/UserController.php');
		$controller = new UserController();
		if($controller->updateUser(null, $name, null, $type, null)) {
			$log = "update succussed";
		}
		else $log = "update fail";
		$controller->close();
		// header("refresh:0;url=../view/Manager.php");
	}
}

if($error != "") echo $error;


function test_input($input) {
	global $error;
	//can make error info
	return $input;
}

function checkName() {
	global $error, $name;
	if(!empty($_POST["manager_operate_name"])) {
		$name = test_input($_POST["manager_operate_name"]);
	}
	else $error = $error."<p>NAME EMPTY ERROR</p>\n";
}

function checkPassword() {
	global $error, $password;
	if(!empty($_POST["manager_operate_password"])) {
		$password = test_input($_POST["manager_operate_password"]);
	}
	else $error = $error."<p>PASSWORD EMPTY ERROR</p>\n";
}

function checkType() {
	global $error, $type;
	if(!empty($_POST["manager_operate_type"])) {
		$type = test_input($_POST["manager_operate_type"]);
		if($type != "manager" && $type != "coach" && $type != "doctor" && $type != "normal")
			$error = $error."<p>TYPE SHOULD BE 'manager'|'coach'|'doctor'|'normal'</p>\n";
	}
	else $error = $error."<p>TYPE EMPTY ERROR</p>\n";
}

?>