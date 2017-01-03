<?php  
	class MyController {

		public static $bdd;
		public static $fb;
		public static $twig;
		protected static $instance;

		public function __construct() {

		}

		// On instancie selon la classe appelée
		public static function getInstance($construct = null) {
			self::$instance = null;
			$class = get_called_class();
			
				if ($class::$instance == null) {
					if($construct != null) {
						$class::$instance = new $class($construct);
					}else{
						$class::$instance = new $class();
					}	
				}
			
			return $class::$instance;
		}


		public static function loadTemplate($file, $variables) {
			echo self::$twig->render($file, $variables);
		}

		public static function error($message) {
			echo '<div id="msg-error">' . $message . '</div>';
		}

		public function checkPermissions($scope) {

			// On fixe une variable error à 0
			$error = 0;
			// On demande les permissions de l'utilisateur sur notre application
			$permissions = ApiController::getRequest('/me/permissions');

			/* Pour chaques permissions correspondante à nos permissions demandées,
			// on check si celle-ci est refusée ou non.
			*/
			foreach($permissions['data'] as $permission) {
				if(in_array($permission['permission'], $scope)) {
					if($permission['status'] == "declined") {
						$error = 1;
						$declinedPermissions[] = $permission['permission'];
					}
				}
			}

			// Si une des permissions est refusée alors on redemande à l'utilisateur de l'accepter
			if($error) {
				
				$helper = MyController::$fb->getRedirectLoginHelper();
				$loginUrl = $helper->getLoginUrl('http://fb.digital-rooster.fr/login-callback.php', $scope); 

				// On redemande à l'utilisateur de l'accepter une fois
				if($_SESSION['retryScope'] == 0) {
					$_SESSION['retryScope'] = 1;
					header('Location: '.$loginUrl.'&auth_type=rerequest');
				}else{
					
					// Si il a refusé une deuxième fois, on lui explique pourquoi les permissions sont importantes pour nous
					// et lui laissons la possibilitée de changer d'avis.
					
					if(count($declinedPermissions) > 1) {
						MyController::error("Attention, vous n'avez pas accepté les permissions " . implode(', ', $declinedPermissions) . ",
						celles-ci sont nécéssaires pour pouvoir profiter de toutes les fonctionnalitées de l'application,
						vous pouvez <a href='" . $loginUrl . "&auth_type=rerequest'>cliquer ici</a> si vous changez d'avis.");
					}else{
						MyController::error("Attention, vous n'avez pas accepté la permission " . implode("", $declinedPermissions) . ",
						celle-ci est nécéssaire pour pouvoir profiter de toutes les fonctionnalitées de l'application,
						vous pouvez <a href='" . $loginUrl . "&auth_type=rerequest'>cliquer ici</a> si vous changez d'avis.");	
					}

				}
				
			}
		}

	}