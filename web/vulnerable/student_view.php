<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: login.php");
	exit;
}

include('connection.php');

$userID = $_SESSION['username'];
$stmt = $conn->prepare("SELECT id, firstname, lastname, address, city, state, zip, phone FROM student1 WHERE userID=?");
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Student View</title>
		<style>
			table {
				width: 100%;
				border-collapse: collapse;
			}

			table,
			th,
			td {
				border: 1px solid black;
			}

			th,
			td {
				padding: 10px;
				text-align: left;
			}

			th {
				background-color: #f2f2f2;
			}
		</style>
	</head>

	<body>
		<h2>Student Details</h2>
		<table>
			<tr>
				<th>ID</th>
				<td><?php echo htmlspecialchars($row['id']); ?></td>
			</tr>
			<tr>
				<th>First Name</th>
				<td><?php echo htmlspecialchars($row['firstname']); ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo htmlspecialchars($row['lastname']); ?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo htmlspecialchars($row['address']); ?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo htmlspecialchars($row['city']); ?></td>
			</tr>
			<tr>
				<th>State</th>
				<td><?php echo htmlspecialchars($row['state']); ?></td>
			</tr>
			<tr>
				<th>Zip</th>
				<td><?php echo htmlspecialchars($row['zip']); ?></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?php echo htmlspecialchars($row['phone']); ?></td>
			</tr>
		</table>
	</body>

	</html>

<?php
} else {
	echo "No record found for the logged-in user.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>