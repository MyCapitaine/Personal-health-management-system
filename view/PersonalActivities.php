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
		<ul>
<?php
	foreach ($joinedActivities as $activity) {
		if($activity->creatorUid == $user->uid) {
			echo "			<li>\n";
			echo "				<form method='post' action='/Personal-health-management-system/postReciver/removeActivity.php'>\n";
			echo "					<input type='text' style='display:none' name='removeUid' value='$user->uid' />\n";
			echo "					name:<input type='text' class='removeActivityName' readonly='true' name='removeActivityName' value='$activity->activityName' />\n";
			echo "					<input type='submit' value='delete' name='removeActivitySubmit' /><br/>\n";
			echo "					inner:".$activity->inner."\n";
			echo "				</form>\n";
			echo "			</li>\n";
		}
	}
?>
		</ul>
		<h2>update activities</h2>
		<form id="updateActivity" name="updateActivity" method="post" action="/Personal-health-management-system/postReciver/updateActivity.php">
			<input type="text" style="display:none" id="updateUid" name="updateUid" value=<?php echo $user->uid; ?> />
			<p>
				activity name
				<input type="text" id="updateActivityName" name="updateActivityName" />
			</p>
			<p>
				activity inner
				<input type="text" id="updateActivityInner" name="updateActivityInner" />
			</p>
			<p>
				<input type="submit" name="updateActivitySubmit" id="updateActivitySubmit" value="提交" />
				<input type="button" name="updateActivityIgnore" id="updateActivityIgnore" value="放弃" onclick="ignoreUpdate();" />
			</p>
		</form>


		<h2>participanted activities</h2>
		<ul>
<?php
	foreach ($joinedActivities as $activity) {
		echo "			<li>";
		echo "				<form method='post' action='/Personal-health-management-system/postReciver/leaveActivity.php'>\n";
		echo "					<input type='text' style='display:none' name='leaveUid' value='$user->uid' />\n";
		echo "					name:<input type='text' class='leaveActivityName' readonly='true' name='leaveActivityName' value='$activity->activityName' />\n";
		echo "					<input type='submit' value='leave' name='leaveActivitySubmit' /><br/>\n";
		echo "					inner:".$activity->inner."\n";
		echo "				</form>\n";
		echo "			</li>\n";
	}
?>
		</ul>
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