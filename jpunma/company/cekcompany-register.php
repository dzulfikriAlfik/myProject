<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$namacompany = mysqli_real_escape_string($koneksi, $_POST['namacompany']);
	$namahired = mysqli_real_escape_string($koneksi, $_POST['namahired']);
	$posisi = mysqli_real_escape_string($koneksi, $_POST['posisi']);
	$nomortelepon = mysqli_real_escape_string($koneksi, $_POST['nomortelepon']);
	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
	$provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
	$kota = mysqli_real_escape_string($koneksi, $_POST['kota']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $koneksi->query($sql);

	if($result->num_rows == 0) {

		$sql = "INSERT INTO company(namacompany, namahired, posisi, nomortelepon, email, password, alamat, provinsi, kota) 
				VALUES 
				('$namacompany', '$namahired', '$posisi', '$nomortelepon', '$email', '$password', '$alamat', '$provinsi', '$kota')";

		if($koneksi->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: login_hiring.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: companyregister.php");
		exit();
	}

	$koneksi->close();

} else {
	header("Location: companyregister.php");
	exit();
}