<?php 
	$partName = 'Manager';
	require('../view/part/head.inc'); 
?>
	

    <body>
        <h1>ManagerPage</h1>
<?php
    require("../view/part/welcome.inc");
?>
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
        <form id="manager_post" name="manager_post" method="post" action="/Personal-health-management-system/postReciver/ManagerOperation.php">
            <p>
                <label>
                    <input type="radio" name="manager_operation" value="delete" id="manager_operation_delete" onClick="clickDelete()" />
                    delete
                </label>
                <br />
                <label>
                    <input type="radio" name="manager_operation" value="add" id="manager_operation_add" onClick="clickAdd();" />
                    add
                </label>
                <br />
                <label>
                    <input type="radio" name="manager_operation" value="update" id="manager_operation_update" onClick="clickUpdate();" />
                    update
                </label>
            </p>
            <p id="managerNameField">
                name
                <input type="text" name="manager_operate_name" id="manager_operate_name" />
            </p>
            <p id="managerPasswordField">
                password
                <input type="text" name="manager_operate_password" id="manager_operate_password" />
            </p>
            <p id="managerTypeField">
                type
                <input type="text" name="manager_operate_type" id="manager_operate_type" />
            </p>
            <p id="managerSubmitField">
                <input type="submit" name="manager_operate_post" id="manager_operate_post" value="提交" />
            </p>
        </form>
    
    
    </body>
</html>
