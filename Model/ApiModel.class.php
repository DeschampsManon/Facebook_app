<?php  
	class ApiModel extends MyModel {
		private $request;

		public function __construct() {

		}

		public function getRequest($param) {
			$this->request = MyController::$fb->get($param);
			$response = $this->request->getDecodedBody();
			return $response;
		}
	}

?>