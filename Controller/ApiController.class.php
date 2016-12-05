<?php  
	class ApiController extends MyController {
		private $apiModel;

		public function __construct() {
			$this->apiModel = new ApiModel();
		}

		public function getRequest($param) {
			$response = $this->apiModel->getRequest($param);
			return $response;
		}
	}
?>