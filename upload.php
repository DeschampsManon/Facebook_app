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


if (isset($_FILES['file'])){

	$name = $_FILES['file']['name'];
	$temp_name = $_FILES['file']['tmp_name'];
	
	$uploaddir = 'uploads/';
	$uploadfile = $uploaddir . basename($name);


		if(move_uploaded_file($temp_name, $uploadfile)){

			$path = $uploadfile;

			$data = ['message' => 'TEST upload Application facebook',
	 		 'source' => MyController::$fb->fileToUpload($path),
	  		// Or you can provide a remote file location
	  		//'source' => $fb->fileToUpload('https://example.com/photo.jpg'),
			];

			$api = ApiController::getInstance();

				try {
					$photos = $api->postRequest('/me/photos', $data);
				} 	catch(Facebook\Exceptions\FacebookSDKException $e) {

		  				echo 'Error: ' . $e->getMessage();
		  				exit;
					}

			header("Location:index.php?action=participate&upload=Ok");
}
	 	else {
			header("Location:index.php?action=participate&upload=Nok");
		}
} 
		

?>