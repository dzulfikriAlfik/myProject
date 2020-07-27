<?php 

session_start();

require_once("../db.php");

$sql = " UPDATE apply_job_post SET status='1' WHERE id_jobpost='$_GET[id_jobpost]' AND id_user='$_GET[id_user]' ";

if( $conn->query($sql) === TRUE ) {

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

	header("Location: view-job-application.php");
	exit();

} else {
	echo "Error!";
}

$conn->close();

}