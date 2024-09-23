<?php
session_start(); // Start the session

include('connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Normally, you should sanitize the inputs to prevent SQL injection
    // $userID = mysqli_real_escape_string($conn, $_POST['user']);
    // $userPW = mysqli_real_escape_string($conn, $_POST['pass']);
    // $userLevel = mysqli_real_escape_string($conn, $_POST['level']);

    // For the purpose of this assignment, inputs are taken directly without sanitation
    $userID = $_POST['user'];
    $userPW = $_POST['pass'];
    $userLevel = $_POST['level'];

    // Prepare and bind (commented out for educational purposes)
    // $stmt = $conn->prepare("SELECT * FROM Authenticate WHERE userID=? AND userPW=? AND userLevel=?");
    // $stmt->bind_param("sss", $userID, $userPW, $userLevel);

    // Execute the statement
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $count = $result->num_rows;

    // Simulated query without prepared statement (NOT RECOMMENDED FOR PRODUCTION)
    $query = "SELECT * FROM Authenticate WHERE userID='$userID' AND userPW='$userPW' AND userLevel='$userLevel'";
	echo $query;
    $result = $conn->query($query);
	//echo $result;
    $count = $result->num_rows;

    if ($count == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $userID;

        if ($userLevel == 'teacher') {
            header("Location: https://cayennekevin.com/Newcybersecurity/teacherview.php");
        } elseif ($userLevel == 'student') {
            header("Location: https://cayennekevin.com/Newcybersecurity/studentview.php");
        }
        exit;
    } else {
        echo 'Username or password is incorrect. Did you select the proper access level?';
    }

    // Close the statement and connection (commented out since prepared statement is not used)
    // $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
