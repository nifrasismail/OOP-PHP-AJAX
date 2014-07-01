<?php
	include("functions.php");
	$username = $_GET['uname'];
	$password = $_GET['pword'];
	
	$obj = new functions($username,$password);
	echo $obj->check_login();
?>