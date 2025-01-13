<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Personal Organizer</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script> <!-- Import jQuery -->
	<script type="text/javascript" src="js/script.js"></script> <!-- Import JS that centers the page Dynamically using jQuery -->
	<link rel="stylesheet" media="screen" type="text/css" href="css/style.css" /> <!-- Import CSS -->
</head>

<body>
	<center>
		<div id="main">
			<div id="login">
				<form method="post" action="check_login.php">
					<p class="field">
						<input name="myusername" type="text" id="myusername" placeholder="Username" />
					</p>
					<p class="field">
						<input name="mypassword" type="password" id="mypassword" placeholder="Password" />
					</p>
					<p class="submit">
						<button name="submit" type="submit" class="myButton">Login</button>
					</p>
					<div>
					</div>
				</form>
			</div>
			<div id="signup">
				<form method="post" action="registration.php">
					<p class="submit">
						<button name="submit" type="submit" class="myButton">Sign Up</button>
					</p>
				</form>
			</div>
		</div>
	</center>
</body>

</html>