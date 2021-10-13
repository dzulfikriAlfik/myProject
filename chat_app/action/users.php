<?php 
session_start();
include_once('config.php');
$outgoing_id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id != '{$outgoing_id}'");
$output = "";

if(mysqli_num_rows($query) == 0) {
   $output .= "No users are available to chat";
} else if (mysqli_num_rows($query) > 0) {
   include('data.php');
}
echo $output;


?>