<?php
// connection.php should start with <?php with no whitespace before it
$servername = "localhost";
$username = "Marina"; // your username
$database = "cayennekevin_Student3"; // your database
$password = "Pass627462"; // your password
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
