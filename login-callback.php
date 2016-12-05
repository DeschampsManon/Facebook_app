<?php 
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
	require __DIR__.'/loaders/globalLoader.php';

	$helper = MyController::$fb->getRedirectLoginHelper();


	// On demande un token pour acceder à l'API facebook
	$accessToken = $helper->getAccessToken();

	if(isset($accessToken)) {
	
		/* Si le token d'acces à bien été récupéré on echange celui-ci avec
		// un token d'acces d'une durée de 60 jours, alors que le premier 
		// n'avait une durée que de 2 heures.
		*/

		// On utilise OAuth2Client
		$oAuth2Client = MyController::$fb->getOAuth2Client();

		// On echange notre token contre un token d'acces d'une durée de 60 jours environs
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

		// On stock le token d'acces dans une variable session
		$_SESSION['fb_access_token'] = (string) $longLivedAccessToken;
		
		// On redirige l'utilisateur vers l'index de l'application
		header('Location: index.php');
	}
?>