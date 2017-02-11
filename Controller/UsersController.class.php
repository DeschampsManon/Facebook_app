<?php  
	class UsersController extends MyController {

		private $UsersModel;

		public function __construct($user) {

			$this->UsersModel = new UsersModel();
			$accounts = ApiController::getInstance()->getRequest('/app/roles', '325674481145757|2_coNBtFEJH6uQenqtAHJCLBcaY');


			foreach ($accounts['data'] as $key => $account) {
				if($account['role'] == 'administrators') {
					$administrators[] = $account['user'];
				}
			}

			if(in_array($user['id'], $administrators)) {
				$_SESSION['admin'] = 1;
			}else{
				$_SESSION['admin'] = 0;
			}

		}

		public function addUser($user) {
			$this->UsersModel->addUser($user);
		}

		public static function selectUserById($id) {
		    $result = new UsersModel();
		    $user = $result->selectUserById($id);

		    return $user;
        }

        public static function setParticipation($id) {
            $result = new UsersModel();
            $result->setParticipation($id);
        }

	}
?>