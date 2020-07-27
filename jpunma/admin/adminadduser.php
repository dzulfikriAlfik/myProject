<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT username FROM admin WHERE username='$username'";
	$result = $koneksi->query($sql);

	if($result->num_rows == 0) {

		$sql = "INSERT INTO admin(nama, username, password) VALUES ('$nama', '$username', '$password')";

		if($koneksi->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: adminadd.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: adminadd.php");
		exit();
	}

	$koneksi->close();

} else {
	header("Location: adminadd.php");
	exit();
}