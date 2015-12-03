<?php
	if($_COOKIE['userType'] != $pageType)
		header("refresh:0;url=/Personal-health-management-system/view/error.php");
?>