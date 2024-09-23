<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Prevent unauthorized access by redirecting non-logged-in users
    header("Location: unauthorized.php");
    exit;
}

// Validate user level to ensure only teachers can access this page
if (isset($_SESSION['userLevel']) && $_SESSION['userLevel'] !== 'teacher') {
    header("Location: unauthorized.php");
    exit;
}

include('connection.php');

// Create a secure connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection to ensure it is established securely
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Secure the student ID by using a prepared statement
$studentId = $_GET['id'];
$stmt = $conn->prepare("SELECT id, firstname, lastname, address, city, state, zip, phone, math, english, history, science FROM student1 WHERE id=?");
$stmt->bind_param("i", $studentId);  // Binding parameter to avoid SQL Injection
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();  // Fetch the student details securely

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs to prevent XSS and ensure data integrity
    $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8');
    $state = htmlspecialchars($_POST['state'], ENT_QUOTES, 'UTF-8');
    $zip = htmlspecialchars($_POST['zip'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $math = (int)$_POST['math'];  // Ensure numeric inputs are treated as integers
    $english = (int)$_POST['english'];
    $history = (int)$_POST['history'];
    $science = (int)$_POST['science'];

    // Use a prepared statement to update the student details securely
    $updateStmt = $conn->prepare("UPDATE student1 SET firstname=?, lastname=?, address=?, city=?, state=?, zip=?, phone=?, math=?, english=?, history=?, science=? WHERE id=?");
    $updateStmt->bind_param("ssssssssiiii", $firstname, $lastname, $address, $city, $state, $zip, $phone, $math, $english, $history, $science, $studentId);

    if ($updateStmt->execute()) {
        echo "<p>Successfully Added. <br><a href='https://cayennekevin.com/Newcybersecurity/teacherview.php'>Click Here to Continue</a></p>";
    } else {
        echo "Error updating record: " . $updateStmt->error;
    }

    $updateStmt->close();  // Close the prepared statement to free up resources
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post">
        <!-- Display sanitized student data to prevent XSS -->
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($student['firstname'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($student['lastname'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($student['address'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($student['city'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($student['state'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="zip">Zip:</label>
        <input type="text" id="zip" name="zip" value="<?php echo htmlspecialchars($student['zip'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($student['phone'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="math">Math:</label>
        <input type="number" id="math" name="math" value="<?php echo htmlspecialchars($student['math'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="english">English:</label>
        <input type="number" id="english" name="english" value="<?php echo htmlspecialchars($student['english'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="history">History:</label>
        <input type="number" id="history" name="history" value="<?php echo htmlspecialchars($student['history'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <label for="science">Science:</label>
        <input type="number" id="science" name="science" value="<?php echo htmlspecialchars($student['science'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <input type="submit" value="Update">
    </form>

</body>
</html>

<?php
$conn->close();  // Close the database connection securely
?>
