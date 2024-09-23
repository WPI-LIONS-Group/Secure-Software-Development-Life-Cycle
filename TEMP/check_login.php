<?php

include("connection.php");
$tbl_name = "Authenticate"; // Table name 
$host="db-service"; // Host name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("databaseHackProject") or die("cannot select DB");

// username and password sent from form 
$myusername = $_POST['myusername']; 
$mypassword = $_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM Authenticate WHERE userID='$myusername' and userPW='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
  $_SESSION['session_name'] = 'myusername';
	$_SESSION['session_name'] = 'mypassword';
	header('location: login_success.php');
}
else {

	header('location:failed.php');
}

?>