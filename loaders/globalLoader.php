<?php 

	$dir = __DIR__.'/loaders';
	$files = scandir($dir);

	foreach ($files as $key => $file) {
		if($file == '.' || $file == '..'){
			unset($files[$key]);
		}
	}	

	foreach ($files as $key => $file) {
		require __DIR__.'/loaders/'.$file;
	}
	
?>