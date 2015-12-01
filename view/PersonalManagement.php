<?php 
	$partName = 'PersonalManagement';
	require('../view/part/head.inc'); 
?>

	<body>
		<h1>
			<a href="/Personal-health-management-system/view/MainPage.php">MainPage></a>
			PersonalManagement
		</h1>
<?php
	require("../view/part/welcome.inc");
?>
		<form id="personal_manage_post" name="personal_manage_post" method="post" action="/Personal-health-management-system/postReciver/PersonalManagementOperation.php">
			<p>
				infomation
				<input type="text" name="infomation" id="infomation" />
			</p>
			<p>
				old password	
				<input type="password" name="oldPassword" id="oldPassword" />
			</p>
			<p>
				new password
				<input type="password" name="newPassword" id="newPassword" />
			</p>
			<p>
				<input type="submit" name="personal_management_update" id="personal_management_update" value="提交" />
				<input type="submit" name="personal_management_ignore" id="personal_management_ignore" value="放弃" />
			</p>
		</form>
	</body>
</html>
