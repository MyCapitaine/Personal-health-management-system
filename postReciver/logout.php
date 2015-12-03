<?php
	setcookie('user', $_COOKIE['user'], time() - 3600, "/", "");
	setcookie('userType', $_COOKIE['userType'], time() - 3600, "/", "");
	header("refresh:0;url=/Personal-health-management-system/view/login.php");
?>