<?php 
	$partName = 'PersonalManagement';
	require('./part/head.inc'); 
?>

	<body>
		<h1>
			<a href="#">MainPage></a>
			PersonalManagement
		</h1>
		<p>welcome，username</p>
		<form id="personal_manage_post" name="personal_manage_post" method="post" action="../postReciver/PersonalManagementOperation.php">
			<p>
				<input type="hidden" name="userName" id="userName" value="userNamed" />
			</p>
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
