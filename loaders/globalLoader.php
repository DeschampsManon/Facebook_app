<?php 

<<<<<<< HEAD
	$dir = __DIR__.'/loaders';
	$files = scandir($dir);

	foreach ($files as $key => $file) {
		if($file == '.' || $file == '..'){
=======
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
>>>>>>> e40aab5feea2cba4275523bc60f087a8c6ffcdb4
			unset($files[$key]);
		}
	}	

	foreach ($files as $key => $file) {
<<<<<<< HEAD
		require __DIR__.'/loaders/'.$file;
	}
	
=======
		require __DIR__.'/'.$file;
	}

>>>>>>> e40aab5feea2cba4275523bc60f087a8c6ffcdb4
?>