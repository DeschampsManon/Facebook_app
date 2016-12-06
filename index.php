<?php 
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	

	// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
	require __DIR__.'/loaders/globalLoader.php';

	// Redirige l'utilisateur vers la page de login si son access token n'est pas bon
	require __DIR__.'/loaders/security.php';

	//echo 'long access token : '. $_SESSION['fb_access_token'] . '<br><br>';

	// On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
	$api = ApiController::getInstance();

	// On envoi une requette de type GET qui permet de récupérer les informations de l'utilisateur
	$user = $api->getRequest('/me?fields=id,last_name, first_name, birthday, gender, devices, currency, locale');

	// On stock la reponse dans un tableau
	$vars = array(
		'user' => $user
	);

	// on check les permissions
	// SCRIPT à INCLUDE ( BIEN SEPARER LES SCOPE DANS UN AUTRE FICHIER INCLUDE AVEC LE GLOBAL LOADER ) !!!

	// La liste des permissions demandées
	$scope = ['email', 'user_birthday'];
	// On redemande les permissions via la fonction checkPermissions de MyController en envoyant les permissions demandées
	$api->checkPermissions($scope);

	// ***********************

  $action = '';
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }
 
  if ($action === 'home') {
    // On charge le template home.tpl 
    MyController::loadTemplate('home.tpl', array());
  }
  else if ($action === 'gallery'){
    // On charge le template gallery.tpl 
    MyController::loadTemplate('gallery.tpl', array());
  }
  else if ($action === 'participate'){
    // On charge le template participate.tpl 
    MyController::loadTemplate('participate.tpl', array());
  }
  else {
    // On charge le template index.tpl avec les variables du tableau précédent
    MyController::loadTemplate('index.tpl', $vars);
  }
?>



