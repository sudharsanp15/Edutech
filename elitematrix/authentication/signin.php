<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<!-- <link rel="stylesheet" href="fonts/linearicons/style.css"> -->
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="signin.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">		
	</head>

	<body>		

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form action="../backend/login.php" method="POST">
					<h3>Login</h3>
					<?php
						if (isset($_GET['error']) && $_GET['error'] == '1') {
							echo '<div style="color: red;"><h4>Invalid email or password!</h4></div>';
						}
					?>
					<div class="form-holder">
						<span><i class="fa fa-regular fa-envelope"></i></span>
						<input type="email" name="email" class="form-control" placeholder="Mail" required>
					</div>
					<div class="form-holder">
						<span><i class="fa fa-solid fa-lock"></i></span>
						<input type="password" name="password" class="form-control" placeholder="Password" required		>
					</div>
					<p><a href="signup.php">Create an account</a></p>
					<button>
						<span>Sign in</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
		<!-- <script src="js/main.js"></script> -->
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>