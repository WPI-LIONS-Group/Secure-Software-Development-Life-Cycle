<?php
include('connection2.php');

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

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="post" action="signup.php">
        <label for="userID">User ID:</label>
        <input type="text" id="userID" name="userID" required><br>

        <label for="userPW">Password:</label>
        <input type="password" id="userPW" name="userPW" required><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br>

        <label for="zip">Zip:</label>
        <input type="text" id="zip" name="zip" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <!-- Hidden field for user level -->
        <input type="hidden" id="userLevel" name="userLevel" value="student"><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>
