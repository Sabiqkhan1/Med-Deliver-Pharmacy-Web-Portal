<?php
	$data = $_SESSION['data'];
	$productId = $data['id'];
	$productName = $data['name'];
	$productDescription = $data['description'];
	$productPrice = $data['price'];
	$productImg = $data['imageURL'];
	
	if(isset($data['information'])) {
		echo $data['information'] . "<br><br>";
	}
	
	echo "<strong style='color: white;'>Amending <h1>$productName</h1></strong><br>";
 ?>
		<div class="content-container">
				<form action="<?= $BASE ?>/products/performAmend" method="POST">
					<input type="hidden" name="id" value="<?= $_GET['productId'] ?>"></input>
					<input type="hidden" name="pharmacyId" value="<?= $_SESSION['pharmacyId'] ?>"></input>
					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="<?= $productName ?>" name="name">
					</div>
					
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" placeholder="<?= $productDescription ?>" name="description">
					</div>
					
					<div class="form-group">
						<label>Price</label>
						<input type="double" class="form-control" placeholder="<?= $productPrice ?>" name="price">
					</div>
					
					<div class="form-group">
						<label>URL to product image</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?= $productImg ?>" name="imageURL">
						<small id="emailHelp" class="form-text text-muted">This needs to be an absolute URL</small>
					</div>
					
					<button type="submit" class="btn btn-primary">Add Product</button>
					<a href="<?= $BASE ?>/products/delete/?productId=<?= $_GET['productId'] ?>" class="btn btn-danger"><strong>Delete Product</strong></a>
				</form>
			</div>
<br>

 
    
    