<?php

	$data = $_SESSION['data'];
	$deleted = $data['deleted'];

  if ($deleted) {   
    echo "Deleted product"; 
  } else {
    echo "Could not delete product."; 
    print_r($PDO->errorInfo());
  }
?>