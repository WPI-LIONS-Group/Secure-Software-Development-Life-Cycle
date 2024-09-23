<?php
    // Include the connection.php file that contains the connection php code
    include("connection.php");

    // Variables from the session
    $username = mysql_real_escape_string($_SESSION['username']);

    // Constructed SQL Query String
    $sql = "SELECT userLevel FROM Authenticate WHERE userID='$username' and userPW='$password'";

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
                // Start the session
                start_session();
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
                // Start the session
                start_session();
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
?>