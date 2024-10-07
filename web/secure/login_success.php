<?php
// Start the session
session_start();

// Include the connection.php file that contains the connection php code
include("connection.php");

// Connect to server and select database.
mysql_connect("$server", "$databaseUser", "$databasePassword") or die("cannot connect");
mysql_select_db("ssdlc") or die("cannot select DB");

// Variables from the session
$username = mysql_real_escape_string($_SESSION['username']);
$password = mysql_real_escape_string($_SESSION['password']);

// Constructed SQL Query String
$sql = "SELECT userLevel FROM Authenticate WHERE userID='$username'";

// Execute the query using the last opened connection from the connection.php file
$result = mysql_query($sql);

// Handle the result
if (mysql_num_rows($result) == 1) {
	// Fetch the result
	$row = mysql_fetch_assoc($result);
	// Check the userLevel
	switch ($row['userLevel']) {
			// Redirect to the teacher_view.php page
		case 'teacher':
			// Register the session variables
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['userLevel'] = 'teacher';
			// Redirect to the teacher_view.php page
			header('location:teacher_view.php');
			break;
			// Redirect to the student_view.php page
		case 'student':
			// Register the session variables
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['userLevel'] = 'student';
			// Redirect to the student_view.php page    
			header('location:student_view.php');
			break;
			// Redirect to the failed.php page
		default:
			header('location:failed.php');
			break;
	}
} else {
	// Redirect to the failed.php page
	header('location:failed.php');
}
