<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$namajob = mysqli_real_escape_string($koneksi, $_POST['namajob']);
	$bidangjob = mysqli_real_escape_string($koneksi, $_POST['bidangjob']);
	$gajiminimal = mysqli_real_escape_string($koneksi, $_POST['gajiminimal']);
	$gajimaksimal = mysqli_real_escape_string($koneksi, $_POST['gajimaksimal']);
	$kotajob = mysqli_real_escape_string($koneksi, $_POST['kotajob']);
	$desjob = mysqli_real_escape_string($koneksi, $_POST['desjob']);
	$syarat = mysqli_real_escape_string($koneksi, $_POST['syarat']);
	$emailcompany = mysqli_real_escape_string($koneksi, $_POST['emailcompany']);

	$sql = "INSERT INTO job(id_company, namajob, bidangjob, gajiminimal, gajimaksimal, kotajob, desjob,  syarat, emailcompany) VALUES ('$_SESSION[id_company]', '$namajob', '$bidangjob', '$gajiminimal', '$gajimaksimal', '$kotajob', '$desjob', '$syarat', '$emailcompany')";

	if($koneksi->query($sql)===TRUE) {
		$_SESSION['jobPostSuccess'] = true;
		header("Location: lowongan-perusahaan.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $koneksi->error;
	}

	$koneksi->close();

} else {
	header("Location: lowongan-perusahaan.php");
	exit();
}