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
					<p class="field">
						<select name="mylevel" id="mylevel">
							<option value="" disabled selected>Select User Level</option>
							<option value="teacher">Teacher</option>
							<option value="student">Student</option>
						</select>
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
					<p class="field">
						<input name="email" type="text" id="email" placeholder="Email" />
					</p>
					<p class="field">
						<input name="user" type="text" id="user" placeholder="Username" />
					</p>
					<p class="field">
						<input name="pass" type="password" id="pass" placeholder="Password" />
					</p>
					<p class="field">
						<input name="confirmPass" type="password" id="confirmPass" placeholder="Confirm Password" />
					</p>
					<p class="submit">
						<button name="submit" type="submit" class="myButton">Sign Up</button>
					</p>
				</form>
			</div>
		</div>
	</center>
</body>

</html>