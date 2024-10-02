<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }

    include('connection.php');

    // Create connection
    $conn = new mysqli($server, $databaseUser, $databasePassword, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname, address, city, state, zip, phone, math, science, history, english FROM student1";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Data</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Student Data</h2>
        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th><th>Math</th><th>Science</th><th>History</th><th>English</th><th>Action</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["firstname"] . "</td>
                            <td>" . $row["lastname"] . "</td>
                            <td>" . $row["address"] . "</td>
                            <td>" . $row["city"] . "</td>
                            <td>" . $row["state"] . "</td>
                            <td>" . $row["zip"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td>" . $row["math"] . "</td>
                            <td>" . $row["science"] . "</td>
                            <td>" . $row["history"] . "</td>
                            <td>" . $row["english"] . "</td>
                            <td><a href='edit_student.php?id=" . $row["id"] . "'>Edit</a> <a href='edit_student_unsecure.php?id=" . $row["id"] . "'>Edit(un)</a></td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </body>
</html>