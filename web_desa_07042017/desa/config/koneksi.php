<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

$server =  "localhost";
$username = "root";
$password = "";
$database = "db_desa";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("");
mysql_select_db($database) or die("");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Rizalvalidasi;

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

?>
