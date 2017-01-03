<?php  
	class ApiModel extends MyModel {
		private $request;

		public function __construct() {

		}

		public function getRequest($param, $accessToken = null) {
			$this->request = MyController::$fb->get($param, $accessToken);
			$response = $this->request->getDecodedBody();
			return $response;
		}

        public function postRequest($param, $data) {
            $this->request = MyController::$fb->post($param, $data);
        }

	}
?>