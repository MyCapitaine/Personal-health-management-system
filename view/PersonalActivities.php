<?php 
	$partName = 'PersonalActivities';
	require('../view/part/head.inc'); 
?>
	
	<body>
		<h1><a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>PersonalMsg</h1>	
<?php 
	require('../view/part/welcome.inc');
?>
		<h2>created activities</h2>
		<form id="updateActivity" name="updateActivity" method="post" action="/Personal-health-management-system/postReciver/updateActivity.php">
			<ul>

			</ul>
		</form>
		<h2>participanted activities</h2>
		<form id="leaveActivity" name="leaveActivity" method="post" action="/Personal-health-management-system/postReciver/leaveActivity.php">
			<ul>

			</ul>
		</form>
		<h2>join an activity</h2>
		<form id="joinActivity" name="joinActivity" method="post" action="/Personal-health-management-system/postReciver/joinActivity.php">
			<ul>

			</ul>
		</form>
		<h2>create an activity</h2>
		<form id="createActivity" name="createActivity" method="post" action="/Personal-health-management-system/postReciver/createActivity.php">
			<ul>

			</ul>
		</form>
	</body>
	
</html>