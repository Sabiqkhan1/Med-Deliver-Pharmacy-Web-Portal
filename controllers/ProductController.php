<?php

class ProductController extends AbstractController {
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "products/index.php";
	}
	
	function getData() {
	}
}

?>