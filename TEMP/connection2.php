<?php
// connection.php should start with <?php with no whitespace before it
$servername = "localhost";
$username = "Brandyn"; // your username
$database = "cayennekevin_Student2"; // your database
$password = "2726396Cyber!"; // your password
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
