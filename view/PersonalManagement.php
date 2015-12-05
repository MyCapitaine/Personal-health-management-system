<?php 
	$pageType = 'normal';
	require('../view/part/checkCookie.inc'); 
?>
<?php 
	$partName = 'PersonalManagement';
	require('../view/part/head.inc'); 
?>
		<script src="../lib/md5.js" type="text/javascript"></script>
	</head>
	<body>
		<h1>
			<a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>
			PersonalManagement
		</h1>
<?php
	require("../view/part/welcome.inc");
?>
		<p>
			personal information : 
<?php
		require_once("../controller/UserController.php");
		$controller = new UserController();
		echo $controller->getUser($_COOKIE['user'])->info;
		$controller->close();
?>
		</p>
		<form id="personal_management_post" name="personal_management_post" method="post" action="/Personal-health-management-system/postReciver/PersonalManagementOperation.php">
			<input type="password" style="display:none" name="userName" id="userName" value='<?php echo $_COOKIE['user'] ?>' />
			<p>
				infomation
				<input type="text" name="personal_management_infomation" id="personal_management_infomation" />
			</p>
			<p>
				old password	
				<input type="password" style="display:none" name="personal_management_oldPassword" id="personal_management_oldPassword" />
				<input type="password" name="input_oldPassword" id="input_oldPassword" />
			</p>
			<p>
				new password
				<input type="password" name="personal_management_newPassword" id="personal_management_newPassword" />
			</p>
			<p>
				<input type="submit" name="personal_management_update" id="personal_management_update" value="提交" onclick="hidPassword();" />
				<input type="button" name="personal_management_ignore" id="personal_management_ignore" value="放弃" onclick="ignoreInput();" />
			</p>
		</form>
	</body>
</html>
