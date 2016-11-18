<?php  
	session_start();
	if(!isset($_SESSION['fb_access_token'])) {
		echo '<meta http-equiv="refresh" content="0; url=/../login.php">';
	}
?>