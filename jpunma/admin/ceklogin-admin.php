<?php
session_start();
require_once("../db.php");

//If user clicked login button 
if (isset($_POST)) {

	//Escape Special Characters in String
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = $koneksi->query($sql);

	if ($result->num_rows > 0) {
		//output data
		while ($row = $result->fetch_assoc()) {
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['id_admin'] = $row['id_admin'];
			header("Location: index.php");
			exit();
		}
	} else {
		$_SESSION['loginError'] = $koneksi->error;
		header("Location: login_admin.php");
		exit();
	}

	$koneksi->close();
} else {
	//redirect them back to login page
	header("Location: login_admin.php");
	exit();
}
