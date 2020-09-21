<?php
include('include/connect.php');
$submit	= isset($_POST['submit']) ? $_POST['submit'] : "";

if ($submit) {
	$nama		=$_POST['nama'];
	$email		=$_POST['email'];
	$jk		=$_POST['jk'];
	$komentar	=$_POST['komentar'];
	

	if ($nama==""||$email==""||$jk==""||$komentar=="") {
		echo "<script>alert('Masukkan seluruh isian dengan benar !');</script>";
	} else {
		$oke=mysql_query("INSERT INTO buku_tamu VALUES (0,'$nama','$email','$jk','$komentar')") or die (mysql_error());
		if ($oke) { 
			echo "<script>alert('Terimakasih sudah mengisi buku tamu ya,  !!'); </script>";
		} else { 
			echo "<script>alert('Gagal'); </script>";
		}
	}
}
?>