<?php 
	$partName = 'PersonalManagement';
	require('./part/head.inc'); 
?>

<body>
<h1><label></label>
<a href="#">MainPage&gt;</a>PersonalManagement</h1>
<p>你好，username</p>
<form id="form1" name="form1" method="post" action="">
	<p>邮箱 
		<label for="textfield"></label>
		<input type="text" name="textfield" id="textfield" />
	</p>
	<p>原密码	
		<input type="text" name="textfield2" id="textfield2" />
	</p>
	<p>新密码
		<input type="text" name="textfield3" id="textfield3" />
	</p>
	<p>
		<label for="Personal_Management_update"></label>
		<input type="submit" name="personal_management_update" id="personal_management_update" value="提交" />
		<input type="submit" name="personal_management_ignore" id="personal_management_ignore" value="放弃" />
	</p>
</form>
</body>
</html>
