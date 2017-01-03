<?php  
	class ApiController extends MyController {
		private $apiModel;

		public function __construct() {
			$this->apiModel = new ApiModel();
		}

		public function getRequest($param, $accessToken = null) {
			$response = $this->apiModel->getRequest($param, $accessToken);
			return $response;
		}

        public function postRequest($param, $data) {
            $response = $this->apiModel->postRequest($param, $data);
            return $response;
        }
	}
?>