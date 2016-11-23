<?php

require __DIR__.'/controller/MyController.php';
require __DIR__.'/controller/HomeController.php';
require __DIR__.'/controller/GaleryController.php';
require __DIR__.'/controller/ParticipateController.php';

$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action === 'home') {
    HomeController::getInstance()->index();
}
else if ($action === 'galery'){
	GaleryController::getInstance()->index();
}
else if ($action === 'participate'){
	ParticipateController::getInstance()->index();
}
else {
    HomeController::getInstance()->index();   
}

?>