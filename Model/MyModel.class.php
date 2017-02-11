<?php 
	class MyModel {

		public function __construct() {
			
		}

		public function loadFrontConfig() {
		    $request = MyController::$bdd->prepare('SELECT * FROM frontoffice');
		    $request->execute(array());
		    $result = $request->fetch(PDO::FETCH_ASSOC);

		    return $result;
        }

	}
?>