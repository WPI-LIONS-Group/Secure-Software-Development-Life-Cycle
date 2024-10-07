<?php
// Start the session
session_start();

// Include the connection.php file that contains the connection php code
include("connection.php");

// Connect to server and select database.
mysql_connect("$server", "$databaseUser", "$databasePassword") or die("cannot connect");
mysql_select_db("ssdlc") or die("cannot select DB");

// Variables from the previous page coming from the POST method
$username = mysql_real_escape_string($_POST['myusername']);
$password = mysql_real_escape_string($_POST['mypassword']);
$userLevel = mysql_real_escape_string($_POST['mylevel']);

// Constructed SQL Query String
$sql = "SELECT * FROM Authenticate WHERE userID='$username' AND userPW='$password' AND userLevel='$userLevel'";

// Execute the query using the last opened connection from the connection.php file
$result = mysql_query($sql);

// Handle the result
if (mysql_num_rows($result) == 1) {
	// Register the session variables
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['userLevel'] = $userLevel;
	// Redirect to the login_success.php page
	header('location: login_success.php');
} else {
	// Redirect to the failed.php page
	header('location:failed.php');
}
