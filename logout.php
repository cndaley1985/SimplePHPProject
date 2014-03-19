<?php
	session_name("Courtney" . sha1($_SERVER['REMOTE_ADDR']));
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: index.php");
?>