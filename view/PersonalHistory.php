<?php 
	$pageType = 'normal';
	require('../view/part/checkCookie.inc'); 
?>
<?php 
	$partName = 'PersonalHistory';
 	require('../view/part/head.inc'); 
	require_once('../controller/UserController.php');
	$userController = new UserController();
	$user = $userController->getUser($_COOKIE['user']);
	$userController->close();
?>

	<body>
		<h1>
			<a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>
			PersonalHistoryData
		</h1>
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>history data</h2>
		<p>some graph</p>
		<p>and some table</p>
		<h2>add data</h2>
		<form id='personalDataAdd' method='post' action=''>
			<input type="text" style="display:none" name="personalDataAddUid" id='personalDataAddUid' value=<?php echo $user->uid ?> />
			<p>
				year<input name='dataYear' id='dataYear' type='text' maxlength=4 size=6 />
				month<input name='dataMonth' id='dataMonth' type='text' maxlength=2 size=3 />
				day<input name='dataDay' id='dataDay' type='text' maxlength=2 size=3 />
				hour<input name='dataHour' id='dataHour' type='text' maxlength=2 size=3 />
			</p>
			<p>sportsTime<input name='dataSportsTime' id='dataSportsTime' type='text' /></p>
			<p>restTime<input name='dataRestTime' id='dataRestTime' type='text' /></p>
			<p>avgHeartRate<input name='dataAvgHeartRate' id='dataAvgHeartRate' type='text' /></p>
			<p>avgBloodPressure<input name='dataAvgBloodPressure' id='dataAvgBloodPressure' type='text' /></p>
			<p>
				<input type="submit" name="personalDataAddSubmit" id="personalDataAddSubmit" value="提交" onclick="makeFormAction();" />
				<input type="button" name="personalDataAddIgnore" id="personalDataAddIgnore" value="放弃" onclick="ignoreInput();" />
			</p>



		</form>
	</body>
</html>
