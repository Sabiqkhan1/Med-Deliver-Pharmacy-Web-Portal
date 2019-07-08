<?php
	$loggedIn = false;
	
	if(isset($_SESSION['userId'])) {
		$userId = $_SESSION['userId'];
		$sessionModel = new SessionModel();
		$user = $sessionModel->getUser($userId);
		$username_ = $user['username'];
		$loggedIn = true;
	}
	
	$pageContents = "";
	
	if(isset($_SESSION['pageContents'])) {
		$content = $_SESSION['pageContents'];
	} else {
		echo "No content to show.";
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Med-Deliver</title>
    <link rel="stylesheet" href="<?= $BASE_ASSETS ?>/view/assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?= $BASE_ASSETS ?>/view/assets/css/style.css">
		<script src="<?= $BASE_ASSETS ?>/view/assets/js/jquery-3.3.1.js"></script>
		<script src="<?= $BASE_ASSETS ?>/view/assets/js/bootstrap.js"></script>
  </head>
  <body id="top">	 
    <header>		
			<!-- Navigation Bar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="<?= $BASE ?>">Med-Deliver</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php
						if($loggedIn) {
							echo "<form class='form-inline my-2 my-lg-0' action='$BASE/search' method='GET'>
								<input class='form-control mr-sm-2' type='search' name='name' placeholder='Search' aria-label='Search'>
								<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
							</form>";
							
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color: white;'>You are logged in as <strong>$username_</strong></span> &nbsp;&nbsp;<a href='$BASE/logout'><button class='btn btn-outline-secondary my-2 my-sm-0'>Logout</button></a>";
							
						}
						?>
					</div>
				</div>
			</nav>
			<!-- Navigation Bar End -->
			
			<!-- Logo -->
				<center>
					<br><img src="<?= $BASE_ASSETS ?>/view/assets/images/logo.png" alt="logo" width="380" height="120">
				</center>
			<!-- Logo End -->
		</header>
    <main>
      <div class="container main">
			
				<!-- Page Content -->
        <div class="c">
					<?php
						include $content;
					?>
				</div>
				<!-- Page Content End -->

      </div>
    </main>
    <footer>
      <div class="container">
        &copy; 2019 - All Rights Reserved.
        <span class="right"><a href="#top">Back to top</a></span>
      </div>
    </footer>
  </body>
</html>