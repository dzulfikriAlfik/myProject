<?php
include("koneksi.php");
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$t_lahir = $_POST['t_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$pkrjn = $_POST['pkrjn'];
$almt = $_POST['almt'];
$hp = $_POST['hp'];
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysql_query("update pengirim set 
nama='$nama',
jk='$jk',
t_lahir='$t_lahir',
tgl_lahir='$tgl_lahir',
pkrjn='$pkrjn',
almt='$almt',
hp='$hp',
username='$username',
password='$password'
where nik='$nik'");

		?>
		<script language="javascript">alert("Data Berhasil Di Edit");</script>
		<script> document.location.href='profil.php'; </script>
		<?

