<?php
session_start();
require_once("../db.php");

// ketika user klik button update
if(isset($_POST)) {

	// escape special char
	$namadepan = mysqli_real_escape_string($koneksi, $_POST['namadepan']);
	$namabelakang = mysqli_real_escape_string($koneksi, $_POST['namabelakang']);
	$tanggallahir = mysqli_real_escape_string($koneksi, $_POST['tanggallahir']);
	$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
	$kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
	$provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$nomorkontak = mysqli_real_escape_string($koneksi, $_POST['nomorkontak']);
	$jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
	$tahunmasuk = mysqli_real_escape_string($koneksi, $_POST['tahunmasuk']);
	$tahunlulus = mysqli_real_escape_string($koneksi, $_POST['tahunlulus']);

	// update query
	if($result->num_rows == 0) {
	$sql = "UPDATE alumni SET namadepan='$namadepan', namabelakang='$namabelakang', tanggallahir='$tanggallahir', alamat='$alamat', kota='$kota', provinsi='$provinsi', email='$email', nomorkontak='$nomorkontak', jurusan='$jurusan', tahunmasuk='$tahunmasuk', tahunlulus='$tahunlulus' WHERE id_user='$_SESSION[id_user]'";

	if($koneksi->query($sql)===TRUE) {
			$_SESSION['updateCompleted'] = true;
			header("Location: profile-alumni.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['updateError'] = true;
		header("Location: profile-alumni.php");
		exit();
	}

	$koneksi->close();

} else {
	header("Location: profile-alumni.php");
	exit();
}