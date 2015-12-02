<?php 
	$partName = 'Doctor';
	require('../view/part/head.inc'); 
	require_once('../controller/AdviceController.php');
	require_once('../controller/UserController.php');
	require_once('../controller/QuestionController.php');
	$userController = new UserController();
	$user = $userController->getUser($_COOKIE['user']);

	$adviceController = new AdviceController();
	$postedAdvices = $adviceController->posterGetAdvices($user->uid);
	$adviceController->close();

	$questionController = new QuestionController();
	$recivedQuestions = $questionController->reciverGetQuestions($user->uid);
	$questionController->close();
?>

	<body>
		<h1>DoctorPage</h1>	
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>unread questions</h2>
		<form>
			<ul>
<?php
	foreach ($recivedQuestions as $question) {
		if($question->recived == 0) 
			echo "			<li><b>".$userController->getUserById($question->posterId)->userName." : ".$question->inner."</b></li>\n";
	}
?>
			</ul>
		</form>
		<h2>history questions</h2>
		<ul>
<?php
	foreach ($recivedQuestions as $question) {
		if($question->recived == 1) 
			echo "			<li><b>".$userController->getUserById($question->posterId)->userName." : ".$question->inner."</b></li>\n";
	}
?>
		</ul>
		<h2>history advices</h2>
		<ul>
<?php
	foreach ($postedAdvices as $advice) {
			echo "			<li>TO ".$userController->getUserById($advice->reciverId)->userName." : ".$advice->inner."</li>\n";
	}
?>
		</ul>
		
		<h2>post advice</h2>
		<form id="postAdvice" name="postAdvice" method="post" action="/Personal-health-management-system/postReciver/postAdvice.php">
			<input type="password" style="display:none" value="<?php echo $user->uid ?>" name="advicePosterId" id="advicePosterId" />
			<p>
				to username
				<input type="text" name="adviceReciverName" id="adviceReciverName" />
			</p>
			<p>
				advice
				<input type="text" name="adviceInfo" id="adviceInfo"/>
			</p>
			<p>
				<input type="submit" name="advicePost" id="advicePost" value="发送" />
				<input type="button" name="adviceIgnore" id="adviceIgnore" value="取消" onclick="ignoreInput();" />	 
			</p>
		</form>
	</body>
</html>


<?php
	$userController->close();
?>