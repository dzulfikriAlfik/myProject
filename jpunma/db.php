<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jpunma";

// membuat koneksi	
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if($koneksi->connect_error) {
	die("Connection Failed: " . $koneksi->connect_error);
}