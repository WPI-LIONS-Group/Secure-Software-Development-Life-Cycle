<?php
    // Variables about the database & connection
    $server = "database"; // The server name is database since docker-compose uses the service name as the hostname
    $databaseUser = "ServiceUser";
    $databasePassword = "password123";
    $database = "SSDLC";

    // Create new connection
    $conn = new mysqli($server, $databaseUser, $databasePassword, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>