<?php 
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
	require __DIR__.'/loaders/globalLoader.php';
	$_SESSION['retryScope'] = 0;

	$helper = MyController::$fb->getRedirectLoginHelper();
	$permissions = ['email', 'user_birthday'];
	$loginUrl = $helper->getLoginUrl('http://fb.digital-rooster.fr/login-callback.php', $permissions);

	$vars = array(
		'loginUrl' => $loginUrl
	);

	MyController::loadTemplate('login.tpl', $vars);
?>