<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$namadepan = mysqli_real_escape_string($koneksi, $_POST['namadepan']);
	$namabelakang = mysqli_real_escape_string($koneksi, $_POST['namabelakang']);
	$npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT npm FROM alumni WHERE npm='$npm'";
	$result = $koneksi->query($sql);

	if($result->num_rows == 0) {

		$sql = "INSERT INTO alumni(namadepan, namabelakang, npm, password) 
				VALUES 
				('$namadepan', '$namabelakang', '$npm', '$password')";

		if($koneksi->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: alumniadd.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: alumniadd.php");
		exit();
	}

	$koneksi->close();

} else {
	header("Location: alumniadd.php");
	exit();
}