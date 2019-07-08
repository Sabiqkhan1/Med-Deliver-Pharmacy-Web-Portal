<?php

class LogoutController extends AbstractController {
	
	function getView() {
		$logoutModel = new LogoutModel();
		$logoutModel->logout();
		return "logout/index.php";
	}
	
	
	function getData() {
		
	}
}

?>