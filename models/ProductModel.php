<?php

class ProductModel extends AbstractModel {
	
	function addProduct($name, $description, $price, $pharmacyId, $imageURL) {
		$statement = $this->getDatabase()->PDO->prepare("INSERT INTO products (Name, Description, Price, pharmacyID, imageURL) VALUES (:name, :description, :price, :pharmacyId, :imageURL)");
		$statement->bindParam(":name", $name);
		$statement->bindParam(":description", $description);
		$statement->bindParam(":pharmacyId", $pharmacyId);
		$statement->bindParam(":price", $price);
		$statement->bindParam(":imageURL", $imageURL);
		return $statement->execute();
	}
	
	function amendProduct($id, $name, $description, $price, $pharmacyId, $imageURL) {
		$statement = $this->getDatabase()->PDO->prepare("UPDATE products SET Name=:name, Description=:description, Price=:price, imageURL=:imageURL WHERE id=:id AND pharmacyID=:pharmacyId");
		$statement->bindParam(":id", $id);
		$statement->bindParam(":name", $name);
		$statement->bindParam(":description", $description);
		$statement->bindParam(":price", $price);
		$statement->bindParam(":pharmacyId", $pharmacyId);
		$statement->bindParam(":imageURL", $imageURL);		
		return $statement->execute();
	}
	
	function deleteProduct($id, $pharmacyId) {
		$productId = nl2br(htmlspecialchars($id, ENT_QUOTES));
		$statement = $this->getDatabase()->PDO->prepare("DELETE FROM products WHERE id=:productId AND pharmacyID=:pharmacyId");
		$statement->bindParam(":productId", $productId);
		$statement->bindParam(":pharmacyId", $pharmacyId);
		return $statement->execute();
	}
	
  function getProduct($productId, $pharmacyId) {
		$productsStatement = $this->getDatabase()->PDO->prepare("SELECT * FROM products WHERE id=:id AND pharmacyID=:pharmacyId");
		$productsStatement->bindParam(":id", $productId);
		$productsStatement->bindParam(":pharmacyId", $pharmacyId);
		
		if ($productsStatement->execute()) {
			$productsResult = $productsStatement->fetch();
			$productId = $productsResult['id'];
      $productName = $productsResult['Name'];
      $productDescription = $productsResult['Description'];
      $productPrice = $productsResult['Price'];
      $imageURL = $productsResult['imageURL'];
		
			$myarr = [
				"productId" => $productId,
        "productName" => $productName,
        "productDescription" => $productDescription,
        "productPrice" => $productPrice, 
				"imageURL" => $imageURL
      ];
		}
		return $myarr;
	}	
	
  function grabAll($pharmacyId) {
    $productsStatement = $this->getDatabase()->PDO->prepare("SELECT * FROM products WHERE pharmacyID=$pharmacyId");
    if ($productsStatement->execute()) {
			$counter = 0;
			$everything = array();
	  
      while ($productsResult = $productsStatement->fetch()) {
        $productId = $productsResult['id'];
        $productName = $productsResult['Name'];
        $productDescription = $productsResult['Description'];
        $productPrice = $productsResult['Price'];
        $imageURL = $productsResult['imageURL'];
        $myarr = [
					"productId" => $productId,
          "productName" => $productName,
          "productDescription" => $productDescription,
          "productPrice" => $productPrice, 
          "imageURL" => $imageURL, 
        ];           
        array_push($everything, $myarr);
				$counter++;
			}
			$_SESSION['counter'] = $counter;      
      return $everything;
    }
  }
}
?>