<?php 
session_start();
require_once("../db.php");

if( empty($_SESSION['id_admin']) ) {
  header("Location: index.php");
  exit();
}

// condition when user clicked register button
if(isset($_POST)) {

  $sql = "DELETE FROM users WHERE id_user = '$_GET[id]'";

  // create connection
  if($conn->query($sql) === TRUE) {
    $_SESSION['usersDeleteSuccess'] = true;
    header("Location: user.php");
    exit();
  } else {
    echo "Error" . $sql . "<br>" . $conn->error;

  }

  $conn->close();

} else {
  header("Location: dashboard.php");
  exit();
}