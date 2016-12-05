<?php  
	// On stock la connexion PDO à la base de donnée dans une variable statique
	MyController::$bdd = new PDO('mysql:host=localhost;dbname=facebook', 'root', 'root');
?>