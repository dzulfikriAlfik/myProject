<?php 
session_start();
require_once("db.php");

// condition when user clicked register button
if(isset($_POST)) {

	// escapes special charachter string
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$sql = "SELECT email FROM users WHERE email='$email' ";

	$result = $conn->query($sql);

	if( $result->num_rows > 0 ) {

		$newPass = rand(1000000, 9999999);

		// encryption password
		$password = base64_encode(strrev(md5($newPass)));

		$sql = "UPDATE users SET password='$password' WHERE email='$email' ";

		// create connection
		if($conn->query($sql) === TRUE) {

			// Send Email
			// $to = $email;
			// $subject = "Job Portal - Password Reset";
			// $message = '

			// <html>
			// <head>
			// 	<title>Your Password Has Been Reset</title>
			// <body>

			// 	<p>Your New Password Is - '.$newPass.'</p>
			
			// </body>
			// </html>

			// ';

			// $headers[] = 'MIME-VERSION: 1.0';
			// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			// $headers[] = 'To: '.$to;
			// $headers[] = 'From: mail@jobportal-alfik.xyz';

			// $result = mail($to, $subject, $message, implode("\r\n", $headers));

			// if( $result === TRUE ) {

			// 	$_SESSION['passwordChanged'] = true;
			// 	header("Location: forgot-password.php");
			// 	exit();

			// }

			$_SESSION['passwordChanged'] = true;
			header("Location: forgot-password.php");
			exit();

		} else {
			echo "Error" . $sql . "<br>" . $conn->error;

		}
	} else {
		$_SESSION['emailNotFoundError'] = true;
		header("Location: forgot-password.php");
		exit();	
	}

	$conn->close();

} else {
	header("Location: register.php");
	exit();
}

