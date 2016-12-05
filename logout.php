<?php  
	session_start();
	// On supprime le token
	unset($_SESSION['fb_access_token']);
	// On redirige l'utilisateur vers la page de connexion
	header('Location: login.php');
?>