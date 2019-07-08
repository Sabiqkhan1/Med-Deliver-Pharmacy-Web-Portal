<?php

class ProductAmendController extends AbstractController {
	private $view = "products/amend.php";
	private $data;
	private $action;

	function __construct($action = "") {
		$this->action = $action;
	}
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
				
		if($this->action == "amend") {
			if(isset($_POST['id'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$imageURL = $_POST['imageURL'];
				$pharmacyId = $_POST['pharmacyId'];
				$productModel = new ProductModel();
				if($productModel->amendProduct($id, $name, $description, $price, $pharmacyId, $imageURL)) {
					$this->data['information'] = "Successfully amended product.";
				} else {
					$this->data['information'] = "Failed to amended product, please try again later.";
				}
				
				$this->data['id'] = $id;
				$this->data['name'] = $name;
				$this->data['description'] = $description;
				$this->data['price'] = $price;
				$this->data['imageURL'] = $imageURL;
			}
		}		
		return $this->view;
	}
	
	
	function getData() {
		if(isset($_GET['productId'])) {
			$productModel = new ProductModel();
			$content = $productModel->getProduct($_GET['productId'], $_SESSION['pharmacyId']);
			$productName = $content['productName'];
			$productDescription = $content['productDescription'];
			$productPrice = $content['productPrice'];
			$productImg = $content['imageURL'];
			$this->data['id'] = $_GET['productId'];
			$this->data['name'] = $productName;
			$this->data['description'] = $productDescription;
			$this->data['price'] = $productPrice;
			$this->data['imageURL'] = $productImg;
		}
		
		return $this->data;
	}
}

?>