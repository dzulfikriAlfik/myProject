<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	$sql = "DELETE FROM job WHERE id_job='$_GET[id]' AND id_company='$_SESSION[id_company]'";

	if($koneksi->query($sql)===TRUE) {
		$_SESSION['jobPostDeletedSuccess'] = true;
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