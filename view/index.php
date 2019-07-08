<?php
		$data = $_SESSION['data'];
		if(isset($data['information'])) {
			echo $data['information'];
		}
?>

<div class="container">
  <div class="row">
    <div class="col-7 products content-container">
      <div class="">
				<strong class="title">Products</strong>

				<ul>

				<?php
					$products = $data['products'];		
					foreach($products as $product) {
						$productId = $product['productId'];
						$productName = $product['productName'];
						$productDescription = $product['productDescription'];
						$productPrice = $product['productPrice'];
						$imageURL = $product['imageURL'];
						echo "<li onclick=location.href='$BASE/products/?productId=$productId'>
						
						<table>
							<thead>
								<tr>
									<th scope='col-7'></th>
									<th scope='col-4'></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>$productName</strong><hr>$productDescription</td>
									<td><img src='$imageURL' width='100' heigh='100'></td>
								</tr>
							</tbody>	
						</table>
						</li>";
					}
				?>

				</ul>
					<strong>Total Number of Products:</strong> <?php echo $data['counter'] ; ?>
			</div>
    </div>
		
		<div class="col"></div>
		
    <div class="col-4 insert content-container">

				<strong class="title">Insert a New Product</strong>
				
				<form action="<?= $BASE ?>/product/insert" method="POST">
					<input type="hidden" name="pharmacyId" value="<?= $_SESSION["pharmacyId"] ?>"></input><br>

					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="Enter Product Name" name="name">
					</div>
					
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" placeholder="Enter Product Description" name="description">
					</div>
					
					<div class="form-group">
						<label>Price</label>
						<input type="double" class="form-control" placeholder="Enter Product Price" name="price">
					</div>
					
					<div class="form-group">
						<label>URL to product image</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Image URL" name="imageURL">
						<small id="emailHelp" class="form-text text-muted">This needs to be an absolute URL</small>
					</div>
					
					<button type="submit" class="btn btn-primary">Add Product</button>
				</form>

    </div>
  </div>
</div>
