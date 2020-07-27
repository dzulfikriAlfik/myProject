<?php 

session_start();

if(empty($_SESSION['id_company'])) {
  header("Location: login_hiring.php");
  exit();
}

require_once("../db.php");

$sql = "UPDATE lamar_kerja SET status='2' WHERE id_job='$_GET[id_job]' AND id_user='$_GET[id_user]' ";

if($koneksi->query($sql) === TRUE) {

	$sql1 = "SELECT * FROM job WHERE id_job='$_GET[id_job]' ";
	$result1 = $koneksi->query($sql1);

	if($result1->num_rows > 0) {
		while($row = $result1->fetch_assoc())
		{
		header("Location: view-lamar-kerja.php");
		exit();
	}
	}
} else {
	echo "Error!";
}

$koneksi->close();