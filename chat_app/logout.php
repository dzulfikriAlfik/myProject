<?php 
session_start();
require_once('action/config.php');

if(isset($_SESSION['unique_id'])) {
   $user_id = $_SESSION['unique_id'];
   $query = mysqli_query($conn, "UPDATE users SET status = 'Offline now' WHERE unique_id = '{$user_id}' ");
   if($query) {
      session_unset();
      session_destroy();
      $_SESSION['unique_id'] = "";
      header("Location: login.php");
   }
} else {
   header("Location: login.php");
}

?>