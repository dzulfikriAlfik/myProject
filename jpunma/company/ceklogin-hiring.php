<?php
session_start();
require_once("../db.php");

//If user clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT id_company, namacompany, posisi, email, password FROM company WHERE email='$email' AND password='$password'";
	$result = $koneksi->query($sql);

	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {
			$_SESSION['id_company'] = $row['id_company'];
			$_SESSION['namacompany'] = $row['namacompany'];
			$_SESSION['namahired'] = $row['namahired'];
			$_SESSION['posisi'] = $row['posisi'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];
			header("Location: index-perusahaan.php");
			exit();
		}
 	} else {
 		$_SESSION['loginError'] = $koneksi->error;
 		header("Location: login_hiring.php");
		exit();
 	}

 	$koneksi->close();

} else {
	//redirect them back to login page
	header("Location: login_hiring.php");
	exit();
}