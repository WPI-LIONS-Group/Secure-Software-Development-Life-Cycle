<html>  
<head>  
    <title>PHP login system</title>  
    
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>  
<body>  
	<h1>You need to be logged in to access this page.</h1>
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "login.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
				<input type = "password" id ="pass" name  = "pass" /></p>

            <p>Are you a student or a teacher?</p>  
		<p>     
               <input type="radio" name="level" value="student" checked>Student<br>
          <input type="radio" name="level" value="teacher">
               Teacher 
          </p>
		<p><a href="signup.php">Click here if new student</a> (Ed)</p>
		<p><a href="signup3.php">Click here if new student</a>(Marina)</p>
		<p><a href="signup4.php">Click here if new student</a>(Tabitha)</p>
		<p><a href="signup2.php">Click here if new student</a>(Brandyn)</p>
			<p><a href="signup_secure.php">Click here for new student </a> (Secure)</p>	
		  <input type =  "submit" id = "btn" value = "Login" />  </p>
      </form>  
    </div>  

    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
				var lv=document.f1.level.value;
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  