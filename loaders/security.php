<?php  
	if(!isset($_SESSION['fb_access_token'])) {
		header('Location: login.php');
	}else{
		MyController::$fb->setDefaultAccessToken($_SESSION['fb_access_token']);

		try {
			$userInfos = $api->getRequest('/me');
			$accessTokenValidity = true;
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			$accessTokenValidity = false;
		}

		if(!$accessTokenValidity) {
			unset($_SESSION['fb_access_token']);
			header('Location: login.php');
		}
	}
?>