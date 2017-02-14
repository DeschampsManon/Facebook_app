<?php

ini_set('display_errors','on');
error_reporting(E_ALL);

// On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
require __DIR__.'/../loaders/globalLoader.php';

// On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
$api = ApiController::getInstance();

// Redirige l'utilisateur vers la page de login si son access token n'est pas bon
require __DIR__.'/../loaders/security.php';

// On check si l'utilistateur est bien administrateur
if($_SESSION['admin'] == 0 || !isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

// Vérifie si toutes les permissions demandées sont acceptées par l'utilisateur
require __DIR__.'/../loaders/permissions.php';


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

if($action === '') {

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $_SESSION['ERR'] = "";
        $_SESSION['MESSAGE'] = "";

        if($_POST['action'] == 'competition') {
            $competition = array(
                'name' => $_POST['name'],
                'starting_date' => $_POST['starting_date'],
                'end_date' => $_POST['end_date'],
                'reward' => $_POST['reward'],
                'text_reward' => $_POST['text_reward']
            );

            $instance = new CompetitionController();
            $instance->createCompetition($competition);
        }else if($_POST['action'] == 'front') {

            $front = array(
                'background-color' => $_POST['background'],
                'cgu' => $_POST['cgu']
            );


            $_SESSION['MESSAGE'] = "Les modifications ont été prises en compte";
            MyController::updateFrontOffice($front);
        }

    }

    $err = (isset($_SESSION['ERR'])) ? $_SESSION['ERR'] : "";
    $message = (isset($_SESSION['MESSAGE'])) ? $_SESSION['MESSAGE'] : "";

    $frontloaded = MyController::loadFrontOffice();
    MyController::loadTemplate('admin.tpl', array(
        'front' => $frontloaded,
        'erreur' => $err,
        'message' => $message
    ));
}else if($action === 'livedit') {

    $front = MyController::loadFrontOffice();

    MyController::loadTemplate('livedit.tpl', array(
        'front' => $front
    ));
}

?>