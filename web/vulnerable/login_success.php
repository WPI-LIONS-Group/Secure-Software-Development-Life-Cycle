<?php
// Start the session
session_start();

switch ($_SESSION['userLevel']) {
	case 'teacher':
		// Register the session variables
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $_SESSION['username'];
		$_SESSION['password'] = $_SESSION['password'];
		$_SESSION['userLevel'] = 'teacher';
		// Redirect to the teacher_view.php page
		header('location:teacher_view.php');
		break;
	case 'student':
		// Register the session variables
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $_SESSION['username'];
		$_SESSION['password'] = $_SESSION['password'];
		$_SESSION['userLevel'] = 'student';
		// Redirect to the student_view.php page    
		header('location:student_view.php');
		break;
		// Redirect to the failed.php page
	default:
		header('location:failed.php');
		break;
}
