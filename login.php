<?php 
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	require __DIR__.'/loaders/globalLoader.php';
	

	$helper = MyController::$fb->getRedirectLoginHelper();
	$permissions = ['email', 'user_birthday'];
	$loginUrl = $helper->getLoginUrl('http://fb.digital-rooster.fr/login-callback.php', $permissions);

	$vars = array(
		'loginUrl' => $loginUrl
	);

	MyController::loadTemplate('login.tpl', $vars);
?>