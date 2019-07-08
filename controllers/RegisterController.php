<?php

class RegisterController extends AbstractController {
	private $view = "register/index.php";
	private $data;
	private $action;

	function __construct($action = "") {
		$this->action = $action;
	}
	
	
	function getView() {
		if($this->getSession()->isLoggedIn()) {
			return "home";
		}		
		if($this->action == "register") {
			if(isset($_POST['username'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$pharmacyId = $_POST['pharmacyId'];
				$registerModel = new RegisterModel();
				$status = $registerModel->register($username, $password, $pharmacyId);		
				if($status == 1) {
					$data['error'] = "Username must be between 3-12 characters and contain only numbers and letters.";
				} else if ($status == 2) {
					$data['error'] = "An internal server error occured. Please try again later.";
				}	else if ($status == 3) {
					$data['error'] = "$username is already in use, please try a different name.";
				} else if ($status == 0) {
					$data['error'] = "Successfully registered, $username";
				}			
				$this->data = $data;
			}
		}
		return "register/index.php";		
	}
	
	function getData() {
		return $this->data;
	}
}

?>