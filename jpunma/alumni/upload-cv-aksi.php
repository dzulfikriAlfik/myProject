<?php 

session_start();

if(empty($_SESSION['id_user'])) {
	header("Location: login_alumni.php");
	exit();
}

require_once("../db.php");

if(isset($_POST)) {

	$uploadOk = true;

	$folder_dir = "../upload/cv/";

	$base = basename($_FILES['cv']['name']);

	$cvFileType = pathinfo($base, PATHINFO_EXTENSION);  

	$file = uniqid() . "." . $cvFileType;

	$filename = $folder_dir .$file;

	if(file_exists($_FILES['cv']['tmp_name']))  {

		if($cvFileType == "pdf")  {  //tipe yg bisa diupload pdf

			if($_FILES['cv']['size'] < 500000)  {  // Max 5MB

				move_uploaded_file($_FILES["cv"]["tmp_name"], $filename);
			
			} else {
				$_SESSION['uploadError'] = "File terlalu besar. Maximal 5MB";
				$uploadOk = false;
			}
		} else {
			$_SESSION['uploadError'] = "Format Salah ! silahkan upload format PDF";
			$uploadOk = false;
		}
	} else {
			$_SESSION['uploadError'] = "Terjadi Error ! silahkan coba lagi";
			$uploadOk = false;
		}

		if($uploadOk == false) {
			header("Location: upload-cv.php");
			exit();
		}

		$sql = "SELECT * FROM alumni WHERE id_user='$_SESSION[id_user]' ";
		$result = $koneksi->query($sql);
		if($result->num_rows > 0)  {
			$row = $result->fetch_assoc();
			if($row['cv'] != "") {
				unlink("../upload/cv/" .$row['cv']);
			}
		}

		$sql = "UPDATE alumni SET cv='$file' WHERE id_user='$_SESSION[id_user]' ";
		if($koneksi->query($sql)) {
			header("Location: lamarlowongan.php");
			exit();
		} else {
			echo "Error : " . $sql . "<br>" . $koneksi->error;
		}

		$koneksi->close();
}