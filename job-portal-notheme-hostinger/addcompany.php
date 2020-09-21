<?php 
session_start();
require_once("db.php");

// condition when user clicked register button
if(isset($_POST)) {

	// escapes special charachter string
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$headofficecity = mysqli_real_escape_string($conn, $_POST['headofficecity']);
	$provinsi = mysqli_real_escape_string($conn, $_POST['provinsi']);
	$kota = mysqli_real_escape_string($conn, $_POST['kota']);
	$kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$companytype = mysqli_real_escape_string($conn, $_POST['companytype']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// encryption password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT email FROM company WHERE email='$email' ";

	$result = $conn->query($sql);

	if( $result->num_rows == 0 ) {

		$sql1 = "INSERT INTO company
		(companyname, 
		headofficecity, 
		provinsi, 
		kota, 
		kecamatan, 
		contactno, 
		website, 
		companytype, 
		email, 
		password) 
		VALUES 
		('$companyname', 
		'$headofficecity', 
		'$provinsi', 
		'$kota', 
		'$kecamatan', 
		'$contactno', 
		'$website',
		'$companytype',
		'$email',
		'$password') ";

		// create connection
		if($conn->query($sql1) === TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();
		} else {
			echo "Error" . $sql1 . "<br>" . $conn->error;

		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: company-register.php");
		exit();	
	}

	$conn->close();

} else {
	header("Location: company-register.php");
	exit();
}