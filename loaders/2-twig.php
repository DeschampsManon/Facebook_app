<?php 
	require_once __DIR__.'/../vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem('Views'); // Dossier contenant les templates
    MyController::$twig = new Twig_Environment($loader, array(
      'cache' => false
    ));
?>