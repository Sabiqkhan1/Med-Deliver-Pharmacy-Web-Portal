<?php

class MembersController extends AbstractController {
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "members/index.php";
	}
	
	function getData() {
	}
}

?>