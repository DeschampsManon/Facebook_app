<?php 
	session_start();

	$dir = __DIR__.'/';
	$files = scandir($dir);
	$noLoad = array(
		'.',
		'..',
		basename(__FILE__),
		'security.php'
	);
	foreach ($files as $key => $file) {
		if(in_array($file, $noLoad)) {
			unset($files[$key]);
		}
	}	
	foreach ($files as $key => $file) {
		require __DIR__.'/'.$file;
	}
?>