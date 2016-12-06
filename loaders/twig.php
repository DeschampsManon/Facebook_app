<?php 
	
	require_once __DIR__.'/../vendor/twig/twig/lib/Twig/Autoloader.php';
	require_once __DIR__.'/../vendor/twig/extensions/lib/Twig/Extensions/Autoloader.php';
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem('Views'); // Dossier contenant les templates
    MyController::$twig = new Twig_Environment($loader, array(
      'cache' => false
    ));

    Twig_Extensions_Autoloader::autoload('Twig_Extensions_Extension_Date');
	MyController::$twig->addExtension(new Twig_Extensions_Extension_Date());
?>