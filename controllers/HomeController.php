<?php

/**
 *  The main index controller
 */
class HomeController extends AbstractController {
	
	/**
	 *  If the user is not logged in we show the login-required view
	 *  otherwise display the index view
	 */
	function getView() {	
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "index.php";
	}
	
	/**
	 *  Gets all the products from the pharmacy the user
	 *  is registerd to and passes it to the view.
	 */
	function getData() {		
		if(isset($_SESSION['pharmacyId'])) {
			$productModel = new ProductModel();
			$content = $productModel->grabAll($_SESSION['pharmacyId']);
			$data['products'] = $content;
			$data['counter'] = sizeof($content);
			return $data;
		}
	}
	
}

?>