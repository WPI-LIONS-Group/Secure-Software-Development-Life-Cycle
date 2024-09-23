<?php      
include('connection.php');  

$userID = $_POST['user'];  
$userPW = $_POST['pass'];
$userLevel = $_POST['level'];

// to prevent from mysqli injection (commented out as per your request)
// $userID = stripcslashes($userID);  
// $userPW = stripcslashes($userPW);  
// $userID = mysqli_real_escape_string($conn, $userID);  
// $userPWd = mysqli_real_escape_string($conn, $userPW);  

$sql = "SELECT * FROM Authenticate WHERE userID='" . $_POST["user"] . "' AND userPW='" . $_POST["pass"] . "' AND userLevel='" . $_POST["level"] . "';";   

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
          
if ($count == 1) {
    // Redirect to teacherview.php
    header('Location: https://cayennekevin.com/Newcybersecurity/teacherview.php');
    exit; // Ensure script termination after the redirection
} else {
    // Output the error message
    echo '<h1><center>Login unsuccessful</center></h1>';
}

// Close the connection
mysqli_close($conn);
?>