<?php
session_start(); // Start the session

include('connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directly using user inputs without any sanitization
    $userID = $_POST['user'];
    $userPW = $_POST['pass'];
    $userLevel = $_POST['level'];

    // Vulnerable SQL query
    $query = "SELECT * FROM Authenticate WHERE userID='$userID' AND userPW='$userPW' AND userLevel='$userLevel'";
    //echo "SQL Query: " . $query . "<br>"; // Output the query for debugging (not recommended in production)
	// Debugging: Show the query being executed (for testing purposes only)
    //echo "Debugging: $query<br>";

    // Execute the vulnerable query
    $result = $conn->query($query);
    
    // Check the number of rows returned
    $count = $result->num_rows;

    if ($count == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $userID;

        // Redirect based on user level
        if ($userLevel == 'teacher') {
            header("Location: https://cayennekevin.com/Newcybersecurity/teacherview.php");
        } elseif ($userLevel == 'student') {
            header("Location: https://cayennekevin.com/Newcybersecurity/studentview.php");
        }
        exit;
    } else {
        echo 'Username or password is incorrect. Did you select the proper access level?';
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
