<?php 
session_start();
if( empty($_SESSION['id_admin']) ) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

// condition when user clicked register button
if(isset($_POST)) {

$sql = "UPDATE company SET active='0' WHERE id_company = '$_GET[id]'";

  if($conn->query($sql)) {

  $_SESSION['companyRejectSuccess'] = true;
  header("Location: dashboard.php");
  exit();

  } else {
    echo "Error";

    $conn->close();

  }
}