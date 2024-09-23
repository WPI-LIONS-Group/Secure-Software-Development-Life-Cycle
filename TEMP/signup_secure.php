<?php
include('connection2.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize user input
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $userPW = password_hash($_POST['userPW'], PASSWORD_BCRYPT); // Hash the password securely
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Server-side logic to set user role
    $userLevel = 'student'; // Assign 'student' role by default or based on business logic

    // Check if the userID already exists in student1 table
    $stmt = $conn->prepare("SELECT * FROM student1 WHERE userID=?");
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: User ID already exists. Please choose a different User ID.";
    } else {
        // Insert into student1 table using prepared statements
        $stmt = $conn->prepare("INSERT INTO student1 (userID, userPW, firstname, lastname, address, city, state, zip, phone) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $userID, $userPW, $firstname, $lastname, $address, $city, $state, $zip, $phone);

        // Insert into Authenticate table using prepared statements
        $stmt_auth = $conn->prepare("INSERT INTO Authenticate (userID, userPW, userLevel) 
                                     VALUES (?, ?, ?)");
        $stmt_auth->bind_param("sss", $userID, $userPW, $userLevel);

        // Execute both queries
        if ($stmt->execute() && $stmt_auth->execute()) {
            // Redirect to login page if successful
            header("Location: index.html");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the connection
    $stmt->close();
    $stmt_auth->close();
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

        <input type="submit" value="Signup">
    </form>
</body>
</html>
