<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");

$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE apply_job_post SET status='1' WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {

	$sql1 = "SELECT * FROM job_post WHERE id_jobpost = '$_GET[id_jobpost]' ";

	$result1 = $conn->query($sql1);

	if( $result1->num_rows > 0 ) {
		while( $row = $result1->fetch_assoc() ) {

			// Send Email
			$to = $_GET['email'];

			$subject = "Job Portal - Application Rejected";
			$message = '

			<html>
			<head>
				<title>Job Portal - Application Rejected</title>
			<body>

				<p>Sorry to inform you but your application for ' .$row["jobtitle"]. ' has been rejected !</p>
			
			</body>
			</html>

			';

			$headers[] = 'MIME-VERSION: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';
			$headers[] = 'To: '.$to;
			$headers[] = 'From: mail@jobportal-alfik.xyz';

			$result = mail($to, $subject, $message, implode("\r\n", $headers));

			if( $result === TRUE ) {

				header("Location: view-job-application.php");
				exit();

				}

	}

	header("Location: job-applications.php");
	exit();
}

?>