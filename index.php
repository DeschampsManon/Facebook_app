<?php

    //TODO desactiver les notices
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

	// Check concours

    require __DIR__.'/loaders/competition.php';
    // INDISPENSABLE POUR l'UPLOAD DE PHOTO VERS LA GALERIE

	// On envoi une requette de type GET qui permet de récupérer les informations de l'utilisateur
	$userInfos = $api->getRequest('/me?fields=id,email, last_name, first_name, birthday, gender, devices, currency, locale');

	// On stock la reponse dans un tableau
	$vars = array(
		'user' => $userInfos
	);
	// ***********************

if($_SESSION['COMPETITION'] == 1) {

  $action = '';
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }

  if(isset($_GET['id']) && $_GET['id'] != "") {
      $instance = new PicturesController();
      $picture = $instance->getPicture($_GET['id']);

      // TODO-me voir pour le bouton de partage qui ne marche pas
      // TODO-me Le retirer de la page galery

      MyController::loadTemplate('photo.tpl', array(
          'picture' => $picture
      ));
  }else{
      if ($action === 'home') {
          // On charge le template home.tpl

          $instance = new PicturesController();
          $pictures = $instance->getAllPictures();

          $onlyThreePictures[] = $pictures[0];
          $onlyThreePictures[] = $pictures[1];
          $onlyThreePictures[] = $pictures[2];

          $count = 0;
          foreach($onlyThreePictures as $picture) {
              $user = UsersController::selectUserById($picture['id_user']);
              $onlyThreePictures[$count]['id_user'] = $user['name'].' '.$user['first_name'];
              $count++;
          }

          $front = MyController::loadFrontOffice();

          MyController::loadTemplate('home.tpl', array(
              'admin' => $_SESSION['admin'],
              'pictures' => $onlyThreePictures,
              'front' => $front
          ));
      }
      else if ($action === 'gallery'){
          // On charge le template gallery.tpl
          // TODO envoyer le nom des auteurs avec les photos
          $instance = new PicturesController();
          $pictures = $instance->getAllPictures();

          $count = 0;
          foreach($pictures as $picture) {
              $user = UsersController::selectUserById($picture['id_user']);
              $pictures[$count]['id_user'] = $user['name'].' '.$user['first_name'];
              $count++;
          }

          MyController::loadTemplate('gallery.tpl', array(
              'pictures' => $pictures
          ));
      }
      else if ($action === 'participate'){

          if($_SERVER['REQUEST_METHOD'] == 'POST') {

              $generatedId = rand(1,10000).''.rand(1,10000).''.rand(1,10000);
              $generatedLink = 'http//fb.digital-rooster.fr/'.$generatedId;

              $pic = array(
                  'id_photo' => $generatedId,
                  'link_photo' => $_POST['link_photo'],
                  'link_like' => $generatedLink,
                  'id_user' => $vars['user']['id'],
                  'id_concours' => 1 // TODO Mettre variable de session id concours a la place
              );

              $instance = new PicturesController();
              $instance->addPicture($pic);

              UsersController::setParticipation($vars['user']['id']);

              // On charge le template participate.tpl
              MyController::loadTemplate('participate.tpl', $vars);

          }else {

              $user = UsersController::selectUserById($vars['user']['id']);

              if($user['participation'] != 1) {

                  $response = MyController::$fb->get('/me/albums?fields=name');
                  $albums = $response->getDecodedBody();
                  $images = array();
                  $albumsNames = array();
                  $count = 0;

                  foreach ($albums['data'] as $key => $album) {

                      $response = MyController::$fb->get('/' . $album['id'] . '/photos?fields=source');
                      $photos = $response->getDecodedBody();

                      $albumsNames[] = $album['name'];

                      foreach ($photos['data'] as $key => $photo) {

                          $images[] = $photo['source'];
                      }

                      $imagesToLoad[$count] = $images;
                      $images = array('');

                      $count++;
                  }

                  $vars = array(
                      'images' => $imagesToLoad,
                      'albums' => $albumsNames,
                  );

                  // On charge le template participate.tpl
                  MyController::loadTemplate('participate.tpl', $vars);

              }else{
                  echo 'VOUS AVEZ DEJA PARTICIPÉ';
              }

          }


      }
      else {
          // On charge le template index.tpl avec les variables du tableau précédent
          MyController::loadTemplate('index.tpl', $vars);
      }
  }

}else{
    // TODO Faire une page pour ça
    echo "Pas de concours activé";
}

?>