<?php
if($_POST){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("kua",$conn); 
	//menyimpan ke table product
	$sql = "insert into daftar (no_daftar, nik_pria, nama_pria, nik_wanita, nama_wanita, tgl_daftar, tgl_nikah) values ('{$_POST['no_daftar']}','{$_POST['nik_pria']}','{$_POST['nama_pria']}','{$_POST['nik_wanita']}','{$_POST['nama_wanita']}','{$_POST['tgl_daftar']}','{$_POST['tgl_nikah']}')";
	mysql_query($sql) or die('Gagal menyimpan Data Daftar');
	?>
		<script language="javascript">alert("Data berhasil Disimpan...!");</script>
		<script> document.location.href='index.php?page=lihat_daftar'; </script>
		<?
}