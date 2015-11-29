<?php 
	$partName = 'Manager';
	require('./part/head.inc'); 
?>
	

<body>
	<h1>ManagerPage</h1>
	<ul>
<?php
	require_once("../controller/UserController.php");
	$userController = new UserController();
	$userController->close();
?>
		<li>username1</li>
		<li>username2</li>
		<li>username3</li>
		<li>username4</li>
		<li>username5</li>
		<li>username6</li>
		<li>username7</li>
		<li>username8</li>
		<li>username9</li>
		<li>username10</li>
	</ul>
	<form id="form1" name="form1" method="post" action="">
		<p>
			<label>
				<input type="radio" name="manager_operation" value="delete" id="manager_operation_0" />
				delete
			</label>
			<br />
			<label>
				<input type="radio" name="manager_operation" value="add" id="manager_operation_1" />
				add
			</label>
			<br />
			<label for="manager_operate_name"></label>
			name
			<input type="text" name="manager_operate_name" id="manager_operate_name" />
		</p>
		<p>
			password
			<label for="manager_operate_password"></label>
			<input type="text" name="manager_operate_password" id="manager_operate_password" />
		</p>
		<p>
			<input type="submit" name="manager_operate_post" id="manager_operate_post" value="提交" />
		</p>
	</form>


</body>
</html>
