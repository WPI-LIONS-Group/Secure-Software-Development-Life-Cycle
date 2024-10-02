<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data directly from POST (no validation or sanitization)
    $userID = $_POST['userID'];
    $userPW = $_POST['userPW']; // Storing passwords in plain text (insecure practice)
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $userLevel = $_POST['userLevel']; // Hidden field for user level, set to "student"

    // Check if the userID already exists in student1 table
    $checkUserQuery = "SELECT * FROM student1 WHERE userID='$userID'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        echo "Error: User ID already exists. Please choose a different User ID.";
    } else {
        // Insert into student1 table
        $sql_student = "INSERT INTO student1 (userID, userPW, firstname, lastname, address, city, state, zip, phone) 
                        VALUES ('$userID', '$userPW', '$firstname', '$lastname', '$address', '$city', '$state', '$zip', '$phone')";

        // Insert into Authenticate table
        $sql_auth = "INSERT INTO Authenticate (userID, userPW, userLevel) 
                     VALUES ('$userID', '$userPW', '$userLevel')";

        // Execute both queries
        if ($conn->query($sql_student) === TRUE && $conn->query($sql_auth) === TRUE) {
            // Redirect to login page if successful
            header("Location: index.html");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>