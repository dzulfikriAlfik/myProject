<?php  
session_start();
require_once("db.php");

// when user clicked login button
if(isset($_POST)) {

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// encrypt password
$password = base64_encode( strrev(md5($password)) );

$sql = "SELECT id_company, companyname, email, active FROM company WHERE email='$email' AND password='$password' ";

$result = $conn->query($sql);

	if( $result->num_rows > 0 ) {
		// output data
		while($row = $result->fetch_assoc()) {

			if( $row['active'] == '2' ) {
				$_SESSION['companyLoginError'] = "Your Account is Still Pending Approval.";
				header("Location: company-login.php");
				exit();
			} else if( $row['active'] == '0' ) {
					$_SESSION['companyLoginError'] = "Your Account is Rejected. Please Contact For More Info";
					header("Location: company-login.php");
					exit(); 
				} else if( $row['active'] == '1' ) {
					$_SESSION['name'] = $row['companyname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id_company'] = $row['id_company'];
					$_SESSION['companyLogged'] = true;
					header("Location: company/dashboard.php");
					exit();
				}

		} 

	} else {
		$_SESSION['LoginError'] = $conn->error;
		header("Location: company-login.php");
		exit();
	}

	$conn->close();

} else {
	header("Location: company-login.php");
	exit();
}