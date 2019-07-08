<?php

class ProductCreateController extends AbstractController {
	private $view = "product/create.php";
	private $data;
	private $action;
	
	function __construct($action = "") {
		$this->action = $action;
	}
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		if($this->action == "create") {
			if(isset($_POST['description'])) {
				$name = $_POST['name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$imageURL = $_POST['imageURL'];
				$pharmacyId = $_POST['pharmacyId'];
				$productModel = new ProductModel();
				if($productModel->addProduct($name, $description, $price, $pharmacyId, $imageURL)) {
					$this->data['information'] = "Added product $name";
				} else {
					$this->data['information'] = "Failed to add product $name";
				}
			}
		}
		return "home";
	}
	
	
	function getData() {
		return $this->data;
	}
}

?>