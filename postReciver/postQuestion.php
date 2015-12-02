<?php
$error = "";
$log = "";
$posterId = $_POST['personalQuestionPosterId'];
$reciverName = "";
$question = "";

checkReciverName();
checkQuestion();

if($error == "") {
	require_once('../controller/QuestionController.php');
	require_once('../controller/UserController.php');
	$userController = new UserController();
	$reciver = $userController->getUser($reciverName);
	$userController->close();
	if($reciver == null) $log = "RECIVER NOT FOUND";
	else {
		$questionController = new QuestionController();
		if($questionController->makeQuestion($posterId, $reciver->uid, $question))
			$log = "post success";
		else 
			$log = "post fail";
		$questionController->close();
	}
	echo $log;
	header("refresh:0.3;url=/Personal-health-management-system/view/PersonalMsg.php");
}
else 
	echo $error;



function checkReciverName() {
	global $error, $reciverName;
	if(!empty($_POST['personalQuestionReciverName'])) {
		$reciverName = test_input($_POST['personalQuestionReciverName']);
	}
	else $error = $error."<p>RECIVER NAME CANT BE BLANK</p>\n";
}

function checkQuestion() {
	global $error, $question;
	if(!empty($_POST['personalQuestion'])) {
		$question = test_input($_POST['personalQuestion']);
	}
	else $error = $error."<p>QUESTION CANT BE BLANK</p>\n";

}

function test_input($input) {
	return $input;
}

?>