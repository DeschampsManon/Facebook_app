<?php  
	class MyController {

		public static $bdd;
		public static $fb;
		public static $twig;

		public function __construct() {

		}

		public static function loadTemplate($variables) {
			echo self::$twig->render('login.tpl', $variables );
		}

	}
?>