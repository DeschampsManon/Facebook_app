<?php 
	$controllerDir = __DIR__.'/../Controller';
	$modelDir = __DIR__.'/../Model';

	$controllerFiles = scandir($controllerDir);
	$modelFiles = scandir($modelDir);

	foreach ($controllerFiles as $key => $file) {
		if($file == '.' || $file == '..' || $file == 'MyController.class.php'){
			unset($controllerFiles[$key]);
		}
	}

	foreach ($modelFiles as $key => $file) {
		if($file == '.' || $file == '..' || $file == 'MyModel.class.php'){
			unset($modelFiles[$key]);
		}
	}

	require __DIR__.'/../Controller/MyController.class.php';
	require __DIR__.'/../Model/MyModel.class.php';

	foreach ($controllerFiles as $key => $file) {
		require __DIR__.'/../Controller/'.$file;
	}

	foreach ($modelFiles as $key => $file) {
		require __DIR__.'/../Model/'.$file;
	}
?>