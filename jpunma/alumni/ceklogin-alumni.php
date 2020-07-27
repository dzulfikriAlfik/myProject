<?php
session_start();
require_once("../db.php");

//If user clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT * FROM alumni WHERE npm='$npm' AND password='$password'";
	$result = $koneksi->query($sql);

	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {
			$_SESSION['nama'] = $row['namadepan'] . " " . $row['namabelakang'];
			$_SESSION['npm'] = $row['npm'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['alamat'] = $row['alamat'];
			$_SESSION['kota'] = $row['kota'];
			$_SESSION['provinsi'] = $row['provinsi'];
			$_SESSION['tanggallahir'] = $row['tanggallahir'];
			$_SESSION['id_user'] = $row['id_user'];
			header("Location: index.php");
			exit();
		}
 	} else {
 		$_SESSION['loginError'] = $koneksi->error;
 		header("Location: login_alumni.php");
		exit();
 	}

 	$koneksi->close();

} else {
	//redirect them back to login page
	header("Location: login_alumni.php");
	exit();
}