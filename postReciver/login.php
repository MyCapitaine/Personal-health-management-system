<?php

$name = ""; $password = "";
$error = "";

checkName();
checkPassword();

if($error == "") {
	require_once('../controller/UserController.php');
	$userController = new UserController();
	$user = $userController->checkUser($name, $password);
	$userController->close();
	if($user == null) {
		echo "<p>LOGIN FAIL</p>\n";
	}
	else {
		$url = "";
		switch ($user->type) {
			case 'manager':
				$url = "/Personal-health-management-system/view/Manager.php";
				break;
			case 'coach':
				$url = "/Personal-health-management-system/view/Coach.php";
				break;
			case 'doctor':
				$url = "/Personal-health-management-system/view/Doctor.php";
				break;
			case 'normal':
				$url = "/Personal-health-management-system/view/MainPage.php";
				break;
			default:
				break;

		}
		setcookie("user", $user->userName, time() + 3600, $url, "");
		header("refresh:0;url=".$url);
		
	}

}
else {
	echo $error;
}


function test_input($input) {
	return $input;
}

function checkName() {
	global $name, $error;
	if(!empty($_POST['loginName']))
		$name = test_input($_POST['loginName']);
	else $error = $error."<p>LOGIN NAME CANT BE BLANK</p>\n";
}

function checkPassword() {
	global $password, $error;
	if(!empty($_POST['loginPassword']))
		$password = test_input($_POST['loginPassword']);
	else $error = $error."<p>LOGIN PASSWORD CANT BE BLANK</p>\n";
}

?>