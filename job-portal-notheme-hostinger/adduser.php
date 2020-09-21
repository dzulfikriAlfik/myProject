<?php 
session_start();
require_once("db.php");

// condition when user clicked register button
if(isset($_POST)) {

	// escapes special charachter string
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// encryption password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT email FROM users WHERE email='$email' ";

	$result = $conn->query($sql);

	if( $result->num_rows == 0 ) {
 
		$hash = md5(uniqid());

		$sql = "INSERT INTO users(firstname, lastname, email, password, hash) VALUES ('$firstname', '$lastname', '$email', '$password', '$hash')";

		// create connection
		if($conn->query($sql) === TRUE) {

			// Send Email
			// $to = $email;
			// $subject = "Job Portal - Confirm Your Email Address";
			// $message = '

			echo '
			<html>
			<head>
				<title>Confirm Your Email</title>
				<style>
					body {
						text-align: center;
						margin: 100px;
					}
					a {
						padding: 20px;
						background-color: lightgreen;
						border: 1px solid lightgreen;
						text-decoration: none;
					}
					a:hover {
						padding: 21px;
						background-color: #eaeaea;
						border: 1px solid lightgreen;
						text-decoration: none;
						color: red;

					}
				</style>
			<body>

				<h2>Click Link To Confirm</h2>
				<a href="verify.php?token='.$hash.'&email='.$email.' ">Verify Email</a>
			
			</body>
			</html>

			';

			// $headers[] = 'MIME-VERSION: 1.0';
			// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			// $headers[] = 'To: '.$to;
			// $headers[] = 'From: mail@jobportal-alfik.xyz';

			// $result = mail($to, $subject, $message, implode("\r\n", $headers));

			// if( $result === TRUE ) {

			// 	$_SESSION['registerCompleted'] = true;
			// 	header("Location: login.php");
			// 	exit();

			// }

			// $_SESSION['registerCompleted'] = true;
			// header("Location: login.php");
			// exit();
		} else {
			echo "Error" . $sql . "<br>" . $conn->error;

		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: register.php");
		exit();	
	}

	$conn->close();

} else {
	header("Location: register.php");
	exit();
}

