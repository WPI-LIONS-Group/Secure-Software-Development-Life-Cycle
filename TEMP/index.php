<?php

    session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <title>Personal Organizer</title>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" media="screen" type="text/css" href="chrome.css" />

</head>
<body>
    <center>
        <div id = "main">
            <div id = "login">
              <form method = "post" action="check_login.php">
                <p class = "field">
                    <input name = "myusername" type = "text" id = "myusername" placeholder = "Username"/>
                </p>
                <p class = "field">
                    <input name = "mypassword" type = "password" id = "mypassword" placeholder = "Password"/>
                </p>
                <p class = "submit">
                    <button name="submit" type="submit" class = "myButton">Login</button>
                </p>
                <div>
                </div>
            </form>
        </div>
        <div id = "signup">
            <form method = "post" action = "registration.php">
                <p class = "field">
                    <input name = "email" type = "text" id = "email" placeholder = "Email"/>
                </p>
                <p class = "field">
                    <input name = "user" type = "text" id = "user" placeholder = "Username"/>
                </p>
                <p class = "field">
                    <input name = "pass" type = "password" id = "pass" placeholder = "Password"/>
                </p>
                <p class = "field">
                    <input name = "confirmPass" type = "password" id = "confirmPass" placeholder = "Confirm Password"/>
                </p>
                <p class = "submit">
                    <button name="submit" type="submit" class = "myButton">Sign Up</button>
                </p>
            </form>
        </div>
    </div>
    <div class="clearer"></div>
</center>
</body>
</html>