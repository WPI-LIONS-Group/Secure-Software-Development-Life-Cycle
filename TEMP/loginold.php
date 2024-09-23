<?php      
    include('connection.php');  
    $userID = $_POST['user'];  
    $userPW = $_POST['pass'];
	$userLevel=$_POST['level'];
      
        //to prevent from mysqli injection  
        //$userID = stripcslashes($userID);  
        //$userPW = stripcslashes($userPW);  
        //$userID = mysqli_real_escape_string($con, $userID);  
        //$userPWd = mysqli_real_escape_string($con, $userPW);  
      
        $sql = "SELECT * FROM Authenticate WHERE userID='"
    . $_POST["user"] . "' AND
    userPW='" . $_POST["pass"] . "' AND
    userLevel='" . $_POST["level"] . "' ;   
	  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
			echo "<script>  Object.assign(document.createElement('a'), {target: '_blank', href: 'https://cayennekevin.com/Newcybersecurity/teacherview.php'}.click() </script>";
	
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  