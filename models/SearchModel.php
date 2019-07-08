<?php

class SearchModel extends AbstractModel {
	
	function getResults($query) {			
		$search_item = $query;
		$results = array();
		$counter = 0;
	
		$statement = $this->getDatabase()->PDO->prepare("SELECT id, Name, Description, Price FROM products WHERE Name LIKE '%" . $search_item .  "%' OR description LIKE '%" . $search_item ."%'" );
		if ($statement->execute()) {
			$count = $statement->rowCount();
			if ($count > 0) {
				while ($result = $statement->fetch()) {
					$id = $result['id'];
					$name  = $result['Name'];
					$description  = $result['Description'];
					$price  = $result['Price'];
					
					$product = [
						"id" => $id,
						"name" => $name,
						"description" => $description,
						"price" => $price
					];
					
					array_push($results, $product);
					$counter++;
				}
			}
		}
		
		return $results;
	}
	
}
?>