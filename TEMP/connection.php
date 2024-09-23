<?php
// connection.php should start with <?php with no whitespace before it
$servername = "db-service";
$username = "serviceuser"; // your username
$database = "databaseHackProject"; // your database
$password = "password123"; // your password
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
