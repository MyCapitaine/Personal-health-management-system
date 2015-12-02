<?php 
	$partName = 'PersonalActivities';
	require('../view/part/head.inc'); 
	require('../controller/UserController.php');
	$userController = new UserController();
	$user = $userController->getUser($_COOKIE['user']);

?>
	
	<body>
		<h1><a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>PersonalMsg</h1>	
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>created activities</h2>
		<form id="updateActivity" name="updateActivity" method="post" action="/Personal-health-management-system/postReciver/updateActivity.php">
			<input type="text" style="display:none" id="creatorUid" name="creatorUid" value=<?php echo $user->uid; ?> />
			<ul>
<?php

?>
			</ul>
		</form>
		<h2>participanted activities</h2>
		<form id="leaveActivity" name="leaveActivity" method="post" action="/Personal-health-management-system/postReciver/leaveActivity.php">
			<input type="text" style="display:none" id="creatorUid" name="creatorUid" value=<?php echo $user->uid; ?> />
			<ul>
<?php

?>
			</ul>
		</form>
		<h2>join an activity</h2>
		<form id="joinActivity" name="joinActivity" method="post" action="/Personal-health-management-system/postReciver/joinActivity.php">
			<input type="text" style="display:none" id="creatorUid" name="creatorUid" value=<?php echo $user->uid; ?> />
			<p>
				activity name
				<input type="text" id="joinActivityName" name="joinActivityName" />
			</p>
			<p>
				<input type="submit" name="joinActivitySubmit" id="joinActivitySubmit" value="提交" />
				<input type="button" name="joinActivityIgnore" id="joinActivityIgnore" value="放弃" onclick="" />
			</p>
		</form>
		<h2>create an activity</h2>
		<form id="createActivity" name="createActivity" method="post" action="/Personal-health-management-system/postReciver/createActivity.php">
			<input type="text" style="display:none" id="creatorUid" name="creatorUid" value=<?php echo $user->uid; ?> />
			<p>
				activity name
				<input type="text" id="createActivityName" name="createActivityName" />
			</p>
			<p>
				activity inner
				<input type="text" id="createActivityInner" name="createActivityInner" />
			</p>
			<p>
				<input type="submit" name="createActivitySubmit" id="createActivitySubmit" value="提交" />
				<input type="button" name="createActivityIgnore" id="createActivityIgnore" value="放弃" onclick="" />
			</p>
		</form>
	</body>
	
</html>