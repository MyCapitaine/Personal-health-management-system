<?php 
	$pageType = 'normal';
	require('../view/part/checkCookie.inc'); 
?>
<?php 
	$partName = 'PersonalMsg';
	require('../view/part/head.inc'); 
	require_once('../controller/AdviceController.php');
	require_once('../controller/UserController.php');
	require_once('../controller/QuestionController.php');
	$userController = new UserController();
	$user = $userController->getUser($_COOKIE['user']);

	$adviceController = new AdviceController();
	$recivedAdvices = $adviceController->reciverGetAdvices($user->uid);
	$adviceController->close();

	$questionController = new QuestionController();
	$postedQuestions = $questionController->posterGetQuestions($user->uid);
	$questionController->close();
?>

	<body>
		<h1><a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>PersonalMsg</h1>		
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>unread advices</h2>
		<form>
			<ul>
<?php
	foreach ($recivedAdvices as $advice) {
		if($advice->recived == 0) 
			echo "				<li><b>".$userController->getUserById($advice->posterId)->userName." : ".$advice->inner."</b></li>\n";
	}
?>
			</ul>
		</form>
		<h2>history advices</h2>
	   	<ul>
<?php
	foreach ($recivedAdvices as $advice) {
		if($advice->recived == 1) 
			echo "			  <li>".$userController->getUserById($advice->posterId)->userName." : ".$advice->inner."</li>\n";
	}
?>
		</ul>
		<h2>history questions</h2>
		<ul>
<?php
	foreach ($postedQuestions as $question) {
			echo "			  <li>TO ".$userController->getUserById($question->reciverId)->userName." : ".$question->inner."</li>\n";
	}
?>
		</ul>
		<h2>post question</h2>
		<form id="personalPost" name="personalPost" method="post" action="/Personal-health-management-system/postReciver/postQuestion.php">
			<input type="text" style="display:none" value="<?php echo $user->uid ?>" name="personalQuestionPosterId" id="personalQuestionPosterId" />
			<p>
				coach/doctor name
				<input type="text" name="personalQuestionReciverName" id="personalQuestionReciverName" />
			</p>
			<p>
				question
				<input type="text" name="personalQuestion" id="personalQuestion" />
			</p>
			<p>
				<input type="submit" name="personalQuestionPost" id="personalQuestionPost" value="发送" />
				<input type="button" name="personalQuestionIgnore" id="personalQuestionIgnore" value="取消" onclick="ignoreInput();" />
			</p>
		</form>
	</body>
</html>

<?php
	$userController->close();
?>