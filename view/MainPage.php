<?php 
	$pageType = 'normal';
	require('../view/part/checkCookie.inc'); 
?>
<?php 
	$partName = 'MainPage';
	require('../view/part/head.inc'); 
?>
	<body>
		<h1>MainPage</h1>
<?php 
	require('../view/part/welcome.inc');
?>
		<p><a href="/Personal-health-management-system/view/PersonalManagement.php">PersonalManagement</a></p>
		<p><a href="/Personal-health-management-system/view/PersonalMsg.php">PersonalMsg</a></p>
		<p><a href="/Personal-health-management-system/view/PersonalHistory.php">PersonalHistory</a></p>
		<p><a href="/Personal-health-management-system/view/PersonalActivities.php">PersonalActivities</a></p>
    
	</body>
    
</html>