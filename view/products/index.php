<?php	
	if(isset($_GET['productId'])) {
		$forum = new ProductModel();
		$content = $forum->getProduct($_GET['productId'], $_SESSION['pharmacyId']);
		$productId = $content['productId'];
		$productName = $content['productName'];
		$productDescription = $content['productDescription'];
		$productPrice = $content['productPrice'];
		$productImageURL = $content['imageURL'];
		
		echo "	
			<div class='content-container'>
				<strong><h1>$productName</h1></strong><br>
				$productDescription <br>
				£$productPrice<br>
				<img src='$productImageURL' alt='' width='200' height='200'><br><br>
				<a href='$BASE/products/amend/?productId=$productId'>Amend Product</a>
			</div>
		";
		
	} else {
		echo "No product Id specified.";
	}
?>
