<?php 
session_start();
include_once('config.php');
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = "";

$query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id != $outgoing_id AND (first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%') ");
if(mysqli_num_rows($query) > 0) {
   include('data.php');
} else {
   $output .= "No user found related to your search term";
}

echo $output;

?>