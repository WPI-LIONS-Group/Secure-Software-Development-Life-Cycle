<?php
include('connection.php');  

$userID = $_POST['user'];  
$userPW = $_POST['pass'];
$userLevel = $_POST['level'];

// SQL query (no SQL injection prevention for your request)
$sql = "SELECT * FROM Authenticate WHERE userID='" . $_POST["user"] . "' AND userPW='" . $_POST["pass"] . "' AND userLevel='" . $_POST["level"] . "';";   

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
          
if ($count == 1 AND $_POST["level"]=='teacher') {
    // Redirect to teacherview.php using JavaScript
    echo '<script type="text/javascript">';
    echo 'window.location.href = "https://cayennekevin.com/Newcybersecurity/teacherview.php";';
    echo '</script>';
} else {
    // Output the error message
    echo '<h1><center>Login unsuccessful</center></h1>';
}

// Close the connection
mysqli_close($conn);
?>
