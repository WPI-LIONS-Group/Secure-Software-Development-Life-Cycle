<!DOCTYPE html>
<html>

<head>
	<title>Signup Form</title>
</head>

<body>
	<h2>Signup Form</h2>
	<form method="post" action="signup.php">
		<label for="userID">User ID:</label>
		<input type="text" id="userID" name="userID" required><br>

		<label for="userPW">Password:</label>
		<input type="password" id="userPW" name="userPW" required><br>

		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" required><br>

		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" required><br>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required><br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" required><br>

		<label for="state">State:</label>
		<input type="text" id="state" name="state" required><br>

		<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip" required><br>

		<label for="phone">Phone Number:</label>
		<input type="text" id="phone" name="phone" required><br>

		<input type="hidden" id="userLevel" name="userLevel" value="student">

		<input type="submit" value="Submit">
	</form>
</body>

</html>