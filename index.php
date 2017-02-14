<?php

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

          $counter = 0;
          foreach($onlyThreePictures as $picture) {
              if($picture == "") {
                    unset($onlyThreePictures[$counter]);
              }

              $counter++;
          }

          $count = 0;
          foreach($onlyThreePictures as $picture) {
              $user = UsersController::selectUserById($picture['id_user']);
              $onlyThreePictures[$count]['id_user'] = $user['name'].' '.$user['first_name'];
              $count++;
          }


          $front = MyController::loadFrontOffice();

          $instance = new CompetitionController();
          $competition = $instance->getCompetitionById($_SESSION['id_concours']);

          MyController::loadTemplate('home.tpl', array(
              'admin' => $_SESSION['admin'],
              'pictures' => $onlyThreePictures,
              'front' => $front,
              'competition' => $competition
          ));
      }
      else if ($action === 'gallery'){
          // On charge le template gallery.tpl
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

              $user = UsersController::selectUserById($vars['user']['id']);

              if($user['participation'] == 0) {

                  $generatedId = rand(1, 10000) . '' . rand(1, 10000) . '' . rand(1, 10000);
                  $generatedLink = 'http://fb.digital-rooster.fr/' . $generatedId;

                  $pic = array(
                      'id_photo' => $generatedId,
                      'link_photo' => $_POST['link_photo'],
                      'link_like' => 'http://facebook.fr/'.$_POST['id_image'],
                      'id_user' => $vars['user']['id'],
                      'id_concours' => $_SESSION['id_concours']
                  );

                  $instance = new PicturesController();
                  $instance->addPicture($pic);

                  UsersController::setParticipation($vars['user']['id']);

                  $data = array(
                      'message' => 'Je participe au concours pardon maman ! Rejoignez moi !',
                      'link' => 'http://fb.digital-rooster.fr'
                  );

                  $api->postRequest('/me/feed', $data);

              }
                  // On charge le template participate.tpl
                  $instance = new CompetitionController();
                  $competition = $instance->getCompetitionById($_SESSION['id_concours']);



              MyController::loadTemplate('wait.tpl', array(
                  'end' => $competition['end_date']
              ));

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

                          $images[] = array(
                              'source' => $photo['source'],
                              'id_photo' => $photo['id']
                          );
                      }

                      $imagesToLoad[$count] = $images;
                      $images = array('');

                      $count++;
                  }

                  $upload = '';
                  $message = '';


                  if(isset($_GET['upload'])) {

                      if ($_GET['upload'] == "Ok") {
                          $upload = 'oui';
                          $message = "Votre photo a été ajoutée à l'album Concours photo pardon maman, vous
                      pouvez désormais la séléctionner pour participer au concours";
                      } else if($_GET['upload'] == "Nok"){
                          $upload = 'non';
                          $message = "Une erreur est survenue lors de l'envoi de votre photo, veuillez recommencer";
                      } else if($_GET['upload'] == "type"){
                          $upload = 'non';
                          $message = "Le type d'image n'est pas accepté ! Les fichiers valides sont : jpg, png, gif";
                      }

                  }

                  $vars = array(
                      'images' => $imagesToLoad,
                      'albums' => $albumsNames,
                      'upload' => $upload,
                      'message' => $message
                  );

                  // On charge le template participate.tpl
                  MyController::loadTemplate('participate.tpl', $vars);

              }else{

                  $instance = new CompetitionController();
                  $competition = $instance->getCompetitionById($_SESSION['id_concours']);

                  MyController::loadTemplate('wait.tpl', array(
                      'end' => $competition['end_date']
                  ));
              }

          }


      }else if($action === 'cgu') {
          $front = MyController::loadFrontOffice();
          MyController::loadTemplate('cgu.tpl', array(
              'front' => $front
          ));
      }

      else {
          // On charge le template index.tpl avec les variables du tableau précédent
          MyController::loadTemplate('index.tpl', $vars);
      }
  }

}else{
    MyController::loadTemplate('none.tpl', array());
}

?>