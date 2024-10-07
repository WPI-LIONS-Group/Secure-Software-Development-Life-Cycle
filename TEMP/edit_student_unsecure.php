<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: unauthorized.php");
	exit;
}

// Optionally check for user level if needed
if (isset($_SESSION['userLevel']) && $_SESSION['userLevel'] !== 'teacher') {
	header("Location: unauthorized.php"); // Redirect to an unauthorized access page
	exit;
}

include('connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Vulnerable to SQL Injection
// Get the student ID from the query string without sanitization
$studentId = $_GET['id'];

// Vulnerable SQL query without prepared statements
$query = "SELECT id, firstname, lastname, address, city, state, zip, phone, math, english, history, science FROM student1 WHERE id='$studentId'";
$result = $conn->query($query);

// Fetch the student details from the database
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get the updated data from the form without sanitization
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$math = $_POST['math'];
	$english = $_POST['english'];
	$history = $_POST['history'];
	$science = $_POST['science'];

	// Vulnerable SQL query without prepared statements
	$updateQuery = "UPDATE student1 SET firstname='$firstname', lastname='$lastname', address='$address', city='$city', state='$state', zip='$zip', phone='$phone', math='$math', english='$english', history='$history', science='$science' WHERE id='$studentId'";

	if ($conn->query($updateQuery) === TRUE) {
		// Vulnerable to XSS by echoing unsanitized user input
		echo "<p>Successfully Added. <br><a href='https://cayennekevin.com/Newcybersecurity/teacherview.php'>Click Here to Continue</a></p>";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Edit Student</title>
</head>

<body>
	<h2>Edit Student</h2>
	<form method="post">
		<!-- Vulnerable to XSS by displaying unsanitized user input -->
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" value="<?php echo ($student['firstname']); ?>"><br>
		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" value="<?php echo ($student['lastname']); ?>"><br>
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" value="<?php echo ($student['address']); ?>"><br>
		<label for="city">City:</label>
		<input type="text" id="city" name="city" value="<?php echo ($student['city']); ?>"><br>
		<label for="state">State:</label>
		<input type="text" id="state" name="state" value="<?php echo ($student['state']); ?>"><br>
		<label for="zip">Zip:</label>
		<input type="text" id="zip" name="zip" value="<?php echo ($student['zip']); ?>"><br>
		<label for="phone">Phone:</label>
		<input type="text" id="phone" name="phone" value="<?php echo ($student['phone']); ?>"><br>
		<label for="math">Math:</label>
		<input type="number" id="math" name="math" value="<?php echo ($student['math']); ?>"><br>
		<label for="english">English:</label>
		<input type="number" id="english" name="english" value="<?php echo ($student['english']); ?>"><br>
		<label for="history">History:</label>
		<input type="number" id="history" name="history" value="<?php echo ($student['history']); ?>"><br>
		<label for="science">Science:</label>
		<input type="number" id="science" name="science" value="<?php echo ($student['science']); ?>"><br>
		<input type="submit" value="Update">
	</form>

</body>

</html>

<?php
$conn->close();
?>