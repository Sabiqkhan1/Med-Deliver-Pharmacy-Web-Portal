<?php

class ProductDeleteController extends AbstractController {
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "products/delete.php";
	}
	
	
	function getData() {
		$productId = nl2br(htmlspecialchars($_GET["productId"], ENT_QUOTES));
		$productModel = new ProductModel();
		$data['deleted'] = $productModel->deleteProduct($productId, $_SESSION['pharmacyId']);
		return $data;
	}
}

?>