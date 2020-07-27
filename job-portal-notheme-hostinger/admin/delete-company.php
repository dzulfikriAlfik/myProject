<?php 
session_start();
require_once("../db.php");

if( empty($_SESSION['id_admin']) ) {
  header("Location: index.php");
  exit();
}

// condition when user clicked register button
if(isset($_POST)) {

  $sql = "DELETE FROM company WHERE id_company = '$_GET[id]'";

  // create connection
  if($conn->query($sql) === TRUE) {
    $sql1 = "DELETE FROM job_post WHERE id_company = '$_GET[id]'";
    if($conn->query($sql1)) {
    }

    $_SESSION['companyDeleteSuccess'] = true;
    header("Location: company.php");
    exit();
  } else {
    echo "Error" . $sql . "<br>" . $conn->error;

  }

  $conn->close();

} else {
  header("Location: dashboard.php");
  exit();
}