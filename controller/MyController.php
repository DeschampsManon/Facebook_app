<?php
	class MyController {
		protected static $instance;
		public static $bdd;
		public static $fb;
		public static $twig;

		private function __construct() {}

		public static function getInstance() {
			$class = get_called_class();
			if ($class::$instance == null) {
				$class::$instance = new $class();
			}
			return $class::$instance;
		}

		// public static function loadTemplate($variables) {
		// 	echo self::$twig->render('login.tpl', $variables );
	 	//}
	}

?>