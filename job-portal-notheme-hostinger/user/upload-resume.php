<?php 

session_start();

if( empty($_SESSION['id_user']) ) {
	header("Location: ../index.php");
	exit();
}

require_once("../db.php");

if( isset($_POST) ) {

	$uploadOk = true;

	$folder_dir = "../uploads/resume/";

	$base = basename($_FILES['resume']['name']);

	$resumeFileType = pathinfo($base, PATHINFO_EXTENSION);

	$file = uniqid() . "." . $resumeFileType;

	$filename = $folder_dir .$file;

	if( file_exists($_FILES['resume']['tmp_name']) ) {

		if( $resumeFileType == "pdf" || $resumeFileType == "docx") {

			if( $_FILES['resume']['size'] < 500000 ) {

				move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
			
			} else {
				$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
				$uploadOk = false;
			}
		
		} else {
			$_SESSION['uploadError'] = "Wrong Format. Only PDF and DOCX Allowed";
			$uploadOk = false;
		}
	
	} else {
		$_SESSION['uploadError'] = "Something went Wrong. File not Uploaded. Try Again !";
		$uploadOk = false;
	}

	if( $uploadOk == false ) {
		header("Location: resume-upload.php");
		exit();
	}

	$sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]' ";
	$result = $conn->query($sql);
	if( $result->num_rows > 0 ) {
		$row = $result->fetch_assoc();
		if( $row['resume'] != "" ) {
			unlink("../uploads/resume/".$row['resume']);

		}
	}

	$sql = "UPDATE users SET resume='$file' WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql)) {
		header("Location: resume.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}