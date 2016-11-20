<?php 
	$controllerDir = __DIR__.'/../Controller';
	$modelDir = __DIR__.'/../Model';

	$controllerFiles = scandir($controllerDir);
	$modelFiles = scandir($modelDir);

	foreach ($controllerFiles as $key => $file) {
		if($file == '.' || $file == '..'){
			unset($controllerFiles[$key]);
		}
	}

	foreach ($modelFiles as $key => $file) {
		if($file == '.' || $file == '..'){
			unset($modelFiles[$key]);
		}
	}

	foreach ($controllerFiles as $key => $file) {
		require __DIR__.'/../Controller/'.$file;
	}

	foreach ($modelFiles as $key => $file) {
		require __DIR__.'/../Model/'.$file;
	}
?>

