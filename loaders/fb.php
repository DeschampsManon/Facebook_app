<?php 
	// On stock la variable fb (api facebook) dans une variable statique
	MyController::$fb = new Facebook\Facebook([
	  'app_id' => '325674481145757',
	  'app_secret' => '',
	  'default_graph_version' => 'v2.8',
	]);

?>