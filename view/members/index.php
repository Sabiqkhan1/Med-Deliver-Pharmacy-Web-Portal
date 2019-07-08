<div class="title">Members</div>
 <?php
	$statement = $PDO->prepare("SELECT * FROM users");
  if ($statement->execute()) {
		while ($result = $statement->fetch()) {
			$userId = $result['id'];
			echo "<a href='$BASE/profile/?id=$userId'>" . $result['username'] . "<a/><br>";
		}
  } 
?>