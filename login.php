<?php 
	
	require __DIR__.'/loaders/bdd.php';
	require __DIR__.'/loaders/dependencies.php';
	require __DIR__.'/loaders/twig.php';
	require __DIR__.'/loaders/fb.php';
	

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

?>