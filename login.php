<?php 


	// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
	require __DIR__.'/loaders/globalLoader.php';
	$_SESSION['retryScope'] = 0;

	$helper = MyController::$fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl('http://fb.digital-rooster.fr/login-callback.php', $scopes);

	$vars = array(
		'loginUrl' => $loginUrl
	);

	MyController::loadTemplate('login.tpl', $vars);
?>