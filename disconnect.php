<?php  
	session_start();
	unset($_SESSION['fb_access_token']);
	unset($_SESSION['retryScope']);

	header('Location: login.php');
?>