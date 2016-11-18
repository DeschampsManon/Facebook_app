<?php  
	if(!isset($_SESSION['fb_access_token'])) {
		header('Location: login.php');
	}
?>