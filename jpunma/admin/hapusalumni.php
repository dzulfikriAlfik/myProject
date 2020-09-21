<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	$sql = "DELETE FROM alumni WHERE id_user='$_GET[id]'";

	if($koneksi->query($sql)===TRUE) {
		$_SESSION['alumniDeletedSuccess'] = true;
		header("Location: alumnidata.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $koneksi->error;
	}

	$koneksi->close();

} else {
	header("Location: alumnidata.php");
	exit();
}