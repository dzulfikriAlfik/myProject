<?php
include("config.php");
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tahun_masuk = $_POST['tahun_masuk'];
$program_studi = $_POST['program_studi'];
$wisuda_angkatan = $_POST['wisuda_angkatan'];
$tanggal_lulus = $_POST['tanggal_lulus'];
$ipk = $_POST['ipk'];
$predikat = $_POST['predikat'];
$judul_skripsi = $_POST['judul_skripsi'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$pekerjaan = $_POST['pekerjaan'];
$tempat_tinggal = $_POST['tempat_tinggal'];
$password = $_POST['password'];
$username = $_POST['username'];

$cekdata = mysql_query("SELECT * FROM daftar WHERE nim = '$nim'");
if(mysql_num_rows($cekdata) <> 0) {
		?>
		<script language="javascript">alert("Nim Sudah Terdaftar");</script>
		<script> document.location.href='input_alumni.php'; </script>
		<?
} else {
if(!$nim || !$nama || !$jenis_kelamin || !$tempat_lahir || !$tanggal_lahir) {
		?>
		<script language="javascript">alert("Form Tidak Boleh Kosong...!");</script>
		<script> document.location.href='input_alumni.php'; </script>
		<?
} else {
$simpan = mysql_query("INSERT INTO daftar(nim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin,tahun_masuk,program_studi,wisuda_angkatan,tanggal_lulus,ipk,predikat,judul_skripsi,email,no_hp,pekerjaan,tempat_tinggal,password,username )

VALUES('$nim','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$tahun_masuk','$program_studi','$wisuda_angkatan','$tanggal_lulus','$ipk','$predikat','$judul_skripsi','$email','$no_hp','$pekerjaan','$tempat_tinggal','$password','$photo')");
if($simpan) {
		?>
		<script language="javascript">alert("Data Telah Tersimpan");</script>
		<script> document.location.href='alumni.php'; </script>
		<?
} else {
echo "Proses Gagal!";
}
}
}

?>