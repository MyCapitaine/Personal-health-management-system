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
	$users = $userController->getUsers();
	foreach($users as $user) {
		echo "		<li>uid:".$user->uid."; userName:".$user->userName."; userType:".$user->type."</li>\n";
	}
	$userController->close();
?>
	</ul>
	<form id="manager_post" name="manager_post" method="post" action="../postReciver/ManagerOperation.php">
		<p>
			<label>
				<input type="radio" name="manager_operation" value="delete" id="manager_operation_delete" />
				delete
			</label>
			<br />
			<label>
				<input type="radio" name="manager_operation" value="add" id="manager_operation_add" />
				add
			</label>
			<br />
			<label>
				<input type="radio" name="manager_operation" value="update" id="manager_operation_update" />
				update
			</label>
		</p>
		<p>
			name
			<input type="text" name="manager_operate_name" id="manager_operate_name" />
		</p>
		<p>
			password
			<input type="text" name="manager_operate_password" id="manager_operate_password" />
		</p>
		<p>
			type
			<input type="text" name="manager_operate_type" id="manager_operate_type" />
		</p>
		<p>
			<input type="submit" name="manager_operate_post" id="manager_operate_post" value="提交" />
		</p>
	</form>


</body>
</html>
