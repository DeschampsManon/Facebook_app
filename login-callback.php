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
		MyController::$fb->setDefaultAccessToken($_SESSION['fb_access_token']);
		
		// On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
		$api = ApiController::getInstance();

		// On envoi une requette de type GET qui permet de récupérer les informations de l'utilisateur
		$userInfos = $api->getRequest('/me?fields=id,email, last_name, first_name, birthday, gender, devices, currency, locale');

		// On ajoute l'utilisateur dans la base de donnée
		$user = UsersController::getInstance($userInfos);
		$user->addUser($userInfos);

		// On redirige l'utilisateur vers l'index de l'application
		header('Location: index.php');
	}
?>