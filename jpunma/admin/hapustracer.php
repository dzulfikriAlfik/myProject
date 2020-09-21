<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	$sql = "DELETE FROM kuesioner WHERE id_label='$_GET[id]'";

	if($koneksi->query($sql)===TRUE) {
		$_SESSION['tracerDeletedSuccess'] = true;
		header("Location: tracerstudy.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $koneksi->error;
	}

	$koneksi->close();

} else {
	header("Location: tracerstudy.php");
	exit();
}