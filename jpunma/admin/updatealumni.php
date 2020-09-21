<?php
session_start();
require_once("../db.php");

// ketika user klik button update
if(isset($_POST)) {

	// escape special char
	$namadepan = mysqli_real_escape_string($koneksi, $_POST['namadepan']);
	$namabelakang = mysqli_real_escape_string($koneksi, $_POST['namabelakang']);
	$npm = mysqli_real_escape_string($koneksi, $_POST['npm']);

	// update query
	if($result->num_rows == 0) {
	$sql = "UPDATE alumni SET namadepan='$namadepan', namabelakang='$namabelakang', npm='$npm' WHERE id_user='$_GET[id]'";

	if($koneksi->query($sql)===TRUE) {
			$_SESSION['updateCompleted'] = true;
			header("Location: viewalumni.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['updateError'] = true;
		header("Location: viewalumni.php");
		exit();
	}

	$koneksi->close();

} else {
	header("Location: viewalumni.php");
	exit();
}