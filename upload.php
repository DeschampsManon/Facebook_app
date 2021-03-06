<?php


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
	$type = $_FILES['file']['type'];
    $array = explode('.', $_FILES['file']['name']);
    $extension = strtolower(end($array));

    $validExtension = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');

    if(in_array($type, $validExtension)) {

        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . 'i' . rand(1, 99999) . rand(1, 99999) . '.' . $extension;


        if (move_uploaded_file($temp_name, $uploadfile)) {

            $path = $uploadfile;

            $data = ['message' => 'Voici ma photo pour le concours Pardon Maman, Rejoignez le concours : https://www.facebook.com/Concours-photo-pardon-maman-Community-1926870424202660/',
                'source' => MyController::$fb->fileToUpload($path),
            ];

            $api = ApiController::getInstance();

            try {
                $photos = $api->postRequest('/me/photos', $data);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {

                echo 'Error: ' . $e->getMessage();
                exit;
            }

            // On supprime le fichier
            unlink($uploadfile);
            header("Location:index.php?action=participate&upload=Ok");
        } else {
            header("Location:index.php?action=participate&upload=Nok");
        }

    }else{
        header("Location: index.php?action=participate&upload=type");
    }
} 
		

?>