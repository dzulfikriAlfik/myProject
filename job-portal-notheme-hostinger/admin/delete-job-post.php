<?php 
session_start();
require_once("../db.php");

if( empty($_SESSION['id_admin']) ) {
  header("Location: index.php");
  exit();
}

// condition when user clicked register button
if(isset($_POST)) {

  $sql = "DELETE FROM job_post WHERE id_jobpost = '$_GET[id]'";

  // create connection
  if($conn->query($sql) === TRUE) {
    $sql1 = "DELETE FROM apply_job_post WHERE id_jobpost = '$_GET[id]'";
    if($conn->query($sql1)) {
    }
    $_SESSION['jobPostDeleteSuccess'] = true;
    header("Location: job-posts.php");
    exit();
  } else {
    echo "Error" . $sql . "<br>" . $conn->error;

  }

  $conn->close();

} else {
  header("Location: dashboard.php");
  exit();
}