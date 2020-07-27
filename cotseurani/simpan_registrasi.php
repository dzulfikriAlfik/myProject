<?php
$no_daftar			= $_POST['no_daftar'];
$nik				= $_POST['nik'];
$nama				= $_POST['nama'];
$jk 				= $_POST['jk'];
$username 	        = $_POST['username'];
$password 	        = $_POST['password'];

include("koneksi.php");

//Seleksi field2 yang kosong
if (empty($nik) || 
	empty($nama) ||
		empty($username) || 
	empty($password))
	{
		header("location:daftar.php?status=Maaf,,, Semua Field Harus Diisi Lengkap.");
	}
else{
//cek username yang sama
$query = mysql_fetch_array(mysql_query("SELECT nik FROM registrasi WHERE nik='$nik'"));

if($query){
	header("location:daftar.php?status=Maaf,,,Nik Telah Digunakan");
	}
	
else{

$simpan = mysql_query("INSERT INTO registrasi(no_daftar,nik, nama,jk, username, password )
VALUES('$no_daftar','$nik','$nama','$jk','$username','$password')");
if($simpan) {
		?>
		<script language="javascript">alert("Pendaftaran Sukses");</script>
		<script> document.location.href='index.php'; </script>
		<?
} else {
echo "Proses Gagal!";
}
}
}

?>