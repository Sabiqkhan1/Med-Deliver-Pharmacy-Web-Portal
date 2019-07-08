<div class="title" style="color: white;">Search</div>

<?php

	$data = $_SESSION['data'];
	$results = $data['results'];
	$counter = $data['counter'];
	
	foreach($results as $result) {
		$thread_id = $result['id'];
    $thread_title  = $result['name'];
    $description  = $result['description'];
		$price  = $result['price'];
		
    echo "<div class='content-container'>Title: <a href='$BASE/products/?productId=$thread_id'>$thread_title</a><br>";
    echo "Descripton: $description<br>";
		echo "Price: £$price</div><br><br>";
	}
	
?>
        