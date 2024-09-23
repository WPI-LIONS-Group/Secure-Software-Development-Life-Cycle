<?php
session_start(); // Start the session

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = mysqli_real_escape_string($conn, $_POST['user']);
    $userPW = mysqli_real_escape_string($conn, $_POST['pass']);
    $userLevel = mysqli_real_escape_string($conn, $_POST['level']);

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM Authenticate WHERE userID=? AND userPW=? AND userLevel=?");
    $stmt->bind_param("sss", $userID, $userPW, $userLevel);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count == 1 && $userLevel == 'teacher') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $userID;
        header("Location: https://cayennekevin.com/Newcybersecurity/teacherview.php");
        exit;
    } elseif ($count == 1 && $userLevel == 'student') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $userID;
        header("Location: https://cayennekevin.com/Newcybersecurity/studentview.php");
        exit;
    } else {
        echo 'Username or password is incorrect. Did you select the proper access level?';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>