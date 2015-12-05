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

	require_once('../controller/DataController.php');
	$dataController = new DataController();
	$datas = $dataController->getDatas($user->uid, null, null);
	$dataController->close();
?>
		<script src="../lib/Chart.js-master/Chart.js" type="text/javascript"></script>
	</head>
	<body>
		<h1>
			<a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>
			PersonalHistoryData
		</h1>
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>history data</h2>
		<canvas id='personalHistoryChart' width='800' height='400'></canvas>
		<p><a id='detailDatasChain' target=_blank href="/Personal-health-management-system/userDatas/<?php echo $user->uid ?>">detail datas</a></p>
<script type="text/javascript">
<?php 
	$labels = "[";
	$sportsTime = "[";
	$restTime = "[";
	$avgHeartRate = "[";
	$avgBloodPressure = "[";
	for($index = 0; $index < 50; $index ++) {
		if(empty($data = $datas[$index])) break;
		$labels = $labels.'"'.date("Y-m-d-H", $data->time).'",';
		$sportsTime = $sportsTime.$data->sportsTime.',';
		$restTime = $restTime.$data->restTime.',';
		$avgHeartRate = $avgHeartRate.$data->avgHeartRate.',';
		$avgBloodPressure = $avgBloodPressure.$data->avgBloodPressure.',';
	}
	$labels = rtrim($labels, ",")."]";
	$sportsTime = rtrim($sportsTime, ",")."]";
	$restTime = rtrim($restTime, ",")."]";
	$avgHeartRate = rtrim($avgHeartRate, ",")."]";
	$avgBloodPressure = rtrim($avgBloodPressure, ",")."]";
?>
	var data = {
		labels : <?php echo $labels ?>,
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.25)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $sportsTime ?>
			},
			{
				fillColor : "rgba(151,187,205,0.25)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $restTime ?>
			},
			{
				fillColor : "rgba(50,80,100,0.25)",
				strokeColor : "rgba(50,80,100,1)",
				pointColor : "rgba(50,80,100,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $avgHeartRate ?>
			},
			{
				fillColor : "rgba(80,30,90,0.25)",
				strokeColor : "rgba(80,30,90,1)",
				pointColor : "rgba(80,30,90,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $avgBloodPressure ?>
			}
		]
	}
	var chart = new Chart(document.getElementById("personalHistoryChart").getContext("2d"));
	chart.Line(data);
<?php
	if(sizeof($datas) < 5) {
		echo "	document.getElementById('personalHistoryChart').style.display='none';\n";
		echo "	document.getElementById('detailDatasChain').style.display='none';\n";
	}
?>
</script>
<?php
	if(sizeof($datas) < 5) {
		echo "		<p> data too less to show</p>\n";
	}
?>
		<h2>upload xml datas</h2>
		<form method="post" enctype="multipart/form-data" action="/Personal-health-management-system/postReciver/personalHistoryFile.php">
			<p><input type="file" name="personalHistoryFile" /></p>
			<p><input type="submit" /></p>
		</form>
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
