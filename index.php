<?php 
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
	require __DIR__.'/loaders/globalLoader.php';

	// On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
	$api = ApiController::getInstance();

	// Redirige l'utilisateur vers la page de login si son access token n'est pas bon
	require __DIR__.'/loaders/security.php';

	// Vérifie si toutes les permissions demandées sont acceptées par l'utilisateur
	require __DIR__.'/loaders/permissions.php';

	// On envoi une requette de type GET qui permet de récupérer les informations de l'utilisateur
	$userInfos = $api->getRequest('/me?fields=id,email, last_name, first_name, birthday, gender, devices, currency, locale');

	// On stock la reponse dans un tableau
	$vars = array(
		'user' => $userInfos
	);

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

      $response = MyController::$fb->get('/me/albums?fields=name');
      $albums = $response->getDecodedBody();
      $images = array();
      $albumsNames = array();
      $count = 0;

      foreach($albums['data'] as $key => $album) {

          $response = MyController::$fb->get('/'.$album['id'].'/photos?fields=picture');
          $photos = $response->getDecodedBody();

          //echo '<div id="albums">';

          $albumsNames[] = $album['name'];

          foreach ($photos['data'] as $key => $photo) {
              $images[] = $photo['picture'];
          }

          $imagesToLoad[$count] = $images;
          $images = array('');

          //echo '<form method="post" action="publication.php"><input type="file" name="upload"></form>';

          //echo '<div style="clear:both;"></div></div><br/><br/>';

          $count++;
      }

      $vars = array(
          'images' => $imagesToLoad,
          'albums' => $albumsNames
      );

      MyController::loadTemplate('participate.tpl', $vars);
  }
  else {
    // On charge le template index.tpl avec les variables du tableau précédent
    MyController::loadTemplate('index.tpl', $vars);
  }
?>

