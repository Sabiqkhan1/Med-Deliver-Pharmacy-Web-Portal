<center class="content-container">
	<div class='title'>Login</div>
	
	<?php
	
		$data = $_SESSION['data'];
		if(isset($data['error'])) {
			echo "<br><strong>" . $data['error'] . "</strong><br><br>";
		}
	
	?>
	
	<form action="<?= $BASE ?>/login/performLogin" method="POST">
		<input type="text" name="username" placeholder="username"><br>
		<input type="password" name="password" placeholder="password"><br>
		<button type="submit">Login</button>
		<a href="<?= $BASE ?>/register" class="button">No account?</a>
	</form>
</center>
