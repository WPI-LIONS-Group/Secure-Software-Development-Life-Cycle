<?php
    // Include the connection.php file that contains the connection php code
    include("connection.php");

    // Variables from the previous page comming from the POST method
    $username = mysql_real_escape_string($_POST['myusername']);
    $password = mysql_real_escape_string($_POST['mypassword']);

    // Constructed SQL Query String
    $sql = "SELECT * FROM Authenticate WHERE userID='$username' and userPW='$password'";

    // Execute the query using the last opened connection from the connection.php file
    $result = mysql_query($sql);

    // Handle the result
    if (mysql_num_rows($result) == 1) {
        // Start the session
        session_start();
        // Register the session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // Redirect to the login_success.php page
        header('location: login_success.php');
    } else {
        // Redirect to the failed.php page
        header('location:failed.php');
    }
?>