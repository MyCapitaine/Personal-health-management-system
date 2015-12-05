<?php 
	$partName = 'login';
	require('../view/part/head.inc'); 
?>
		<script src="../lib/md5.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="loginPost" name="loginPost" method="post" action="/Personal-health-management-system/postReciver/login.php">
			<p>
				username
				<input type="text" name="loginName" id="loginName" />
			</p>
			<p>
				password
				<input type="password" style="display:none" name="loginPassword" id="loginPassword" />
				<input type="password" name="inputPassword", id="inputPassword">
			</p>
			<p>
				<input type="submit" name="loginSubmit" id="loginSubmit" value="login" onclick="hidPassword();"  />
			</p>
		</form>

	</body>
</html>