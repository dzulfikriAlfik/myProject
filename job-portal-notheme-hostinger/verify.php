<?php 
session_start();
require_once("db.php");

// condition when user clicked register button
if(isset($_GET)) {

	// escapes special charachter string
	$hash = mysqli_real_escape_string($conn, $_GET['token']);
	$email = mysqli_real_escape_string($conn, $_GET['email']);

	$sql = "SELECT * FROM users WHERE email='$email' AND hash='$hash' ";

	$result = $conn->query($sql);

	if( $result->num_rows > 0 ) {

		$row = $result->fetch_assoc();

		if( $row['active'] == '1' ) {
			$_SESSION['userActivated'] = "You Have Already Activated";
			header("Location: login.php");
			exit();
		} else {
			$sql1 = "UPDATE users SET active='1' WHERE email='$email' AND hash='$hash' ";
			if( $conn->query($sql1) ) {
				$_SESSION['userActivated'] = "Your Account Is Now Active. You Can Login";
				header("Location: login.php");
				exit();
			}
		}

	} else {
		echo'Token Mismatch !';
	}

}