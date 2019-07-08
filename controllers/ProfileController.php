<?php

class ProfileController extends AbstractController {
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "profile/index.php";
	}
	
	function getData() {
		$userId = isset($_GET['id']) ? $_GET['id'] : $_SESSION["userId"];
		
		$userModel = new UserModel();
		$user = $userModel->getUser($userId);
		
		$data['username'] = $user['username'];
		return $data;
	}
}

?>