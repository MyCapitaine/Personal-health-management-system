<?php 
	$partName = 'login';
	require('../view/part/head.inc'); 
?>

	<body>
		<form id="loginPost" name="loginPost" method="post" action="/Personal-health-management-system/postReciver/login.php">
			<p>
				username
				<input type="text" name="loginName" id="loginName" />
			</p>
			<p>
				password
				<input type="password" name="loginPassword" id="loginPassword" />
			</p>
			<p>
				<input type="submit" name="loginSubmit" id="loginSubmit" value="login"  />
			</p>
		</form>

	</body>
</html>