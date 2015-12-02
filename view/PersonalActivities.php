<?php 
	$partName = 'PersonalActivities';
	require('../view/part/head.inc'); 
	require('../controller/UserController.php');
	require('../controller/ActivityController.php');
	$userController = new UserController();
	$user = $userController->getUser($_COOKIE['user']);
	$userController->close();

	$activityController = new ActivityController();
	$joinedActivities = $activityController->getJoinedActivities($user->uid);
	$activityController->close();
?>
	
	<body>
		<h1><a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>PersonalMsg</h1>	
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>created activities</h2>
		<form id="updateActivity" name="updateActivity" method="post" action="/Personal-health-management-system/postReciver/updateActivity.php">
			<input type="text" style="display:none" id="operatorUid" name="operatorUid" value=<?php echo $user->uid; ?> />
			<ul>
<?php
	foreach ($joinedActivities as $activity) {
		if($activity->creatorUid == $user->uid) {
			echo "				<li>\n";
			echo "					name:".$activity->activityName."<br/>\n";
			echo "					inner:".$activity->inner."<br/>\n";
			echo "				</li>\n";
		}
	}
?>
			</ul>
		</form>
		<h2>participanted activities</h2>
		<form id="leaveActivity" name="leaveActivity" method="post" action="/Personal-health-management-system/postReciver/leaveActivity.php">
			<input type="text" style="display:none" id="leaveUid" name="leaveUid" value=<?php echo $user->uid; ?> />
			<ul>
<?php
	foreach ($joinedActivities as $activity) {
		echo "				<li>";
		echo "					name:".$activity->activityName."<br/>\n";
		echo "					inner:".$activity->inner."<br/>\n";
		echo "				</li>\n";
	}

?>
			</ul>
		</form>
		<h2>join an activity</h2>
		<form id="joinActivity" name="joinActivity" method="post" action="/Personal-health-management-system/postReciver/joinActivity.php">
			<input type="text" style="display:none" id="joinerUid" name="joinerUid" value=<?php echo $user->uid; ?> />
			<p>
				activity name
				<input type="text" id="joinActivityName" name="joinActivityName" />
			</p>
			<p>
				<input type="submit" name="joinActivitySubmit" id="joinActivitySubmit" value="提交" />
				<input type="button" name="joinActivityIgnore" id="joinActivityIgnore" value="放弃" onclick="ignoreJoin();" />
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
				<input type="button" name="createActivityIgnore" id="createActivityIgnore" value="放弃" onclick="ignoreCreate();" />
			</p>
		</form>
	</body>
	
</html>