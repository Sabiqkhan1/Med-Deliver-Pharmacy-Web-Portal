<center class="content-container">
	<div class='title'>Register</div>
	
	<?php
		
		$data = $_SESSION['data'];
				
		if(isset($data['error'])) {
			echo "<br><strong>" . $data['error'] . "</strong><br><br>";
		}
	
	?>
	
	<form action="<?= $BASE ?>/register/performRegister" method="POST">
		<input type="text" name="username" placeholder="username"><br>
		<input type="password" name="password" placeholder="password"><br>
		<input type="text" name="pharmacyId" placeholder="pharmacy Id"><br>
		<br><button type="submit">Signup Now</button>
		<a href="<?= $BASE ?>/login" class="button">Already have an account?</a>
	</form>
	
</center>