<?php 
session_start();
include_once('config.php');

$email     = mysqli_real_escape_string($conn, $_POST['email']);
$password  = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)) {
   // check email and password matched to database
   $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ");
   if (mysqli_num_rows($query) > 0) { //if users credential matched
      $row = mysqli_fetch_assoc($query);
      $_SESSION['unique_id'] = $row['unique_id'];
      $update_status = mysqli_query($conn, "UPDATE users SET status = 'Active now' WHERE unique_id = '{$row['unique_id']}' ");
      echo "success";
   } else {
      echo "Email or Password incorrect!";
   }
} else {
   echo "All input field are required";
}