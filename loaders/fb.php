<?php 
	// On stock la variable fb (api facebook) dans une variable statique
	MyController::$fb = new Facebook\Facebook([
	  'app_id' => '325674481145757',
	  'app_secret' => 'b07143c0ac82e515af99ca29cd3b1c55',
	  'default_graph_version' => 'v2.8',
	]);

?>