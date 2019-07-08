<?php

/**
 *  The login controller for the login page
 *  and login action.
 */
class LoginController extends AbstractController {
	private $view = "login/index.php";
	private $data;
	private $action;

	/**
	 * Constructs the LoginController
	 * @param action - The action this controller is for. 
	 *								 For the default login page, leave empty/null
	 *								 For the login action: it must be 'login' without quotes.
	 */
	function __construct($action = "") {
		$this->action = $action;
	}
	
	/**
	 *  If the user is already logged in, we show the home view.
	 *  If the user is not already logged in, we grab the form data
	 *  from the login page and pass to the LoginModel for authentication.
	 *  If the user authenticates successfully, we show the home page
	 *  otherwise show the login page with a login error.
	 */
	function getView() {
		if($this->getSession()->isLoggedIn()) {
			return "home";
		}
		if($this->action == "login") {
			if(isset($_POST['username'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$loginModel = new LoginModel();
				if($loginModel->login($username, $password)) {
					$this->view = "home";
				} else {
					$this->data['error'] = "Invalid username and or password";
					$this->view = "login/index.php";
				}
 			}
		} else {			
			$this->view = "login/index.php";
		}
		return $this->view;
	}
	
	/**
	 *  Passes data to view.
	 *  For this controller, data is error messages from login which is
	 *  done in the getView() function.
	 */
	function getData() {
		return $this->data;
	}
	
}

?>