<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

    $sql = "SELECT * FROM job WHERE id_job='$_GET[id]'";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0) 
    {
     	$row = $result->fetch_assoc();
     	$id_company = $row['id_company']; 
    }

    $sql1 = "SELECT * FROM lamar_kerja WHERE id_user='$_SESSION[id_user]' AND id_job='$row[id_job]' ";
    $result1 = $koneksi->query($sql1);
    if($result1->num_rows == 0 ) {
    	$sql = "INSERT INTO lamar_kerja(id_job, id_company, id_user) VALUES ('$_GET[id]', '$id_company', '$_SESSION[id_user]')";

		if($koneksi->query($sql)===TRUE) {
			$_SESSION['lamarJobSuccess'] = true;
			header("Location: index-jp-alumni.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}

		$koneksi->close();
    }	else {
		header("Location: index-jp-alumni.php");
		exit();
	}
	

} else {
	header("Location: index-jp-alumni.php");
	exit();
}