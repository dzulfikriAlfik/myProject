<?php
if($_POST){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("simdes",$conn); 
	//menyimpan ke table product
	$sql = "insert into kelahiran (no_suratlahir,no_kk,anak, tgl_lahir) values ('{$_POST['no_suratlahir']}','{$_POST['no_kk']}','{$_POST['anak']}','{$_POST['tgl_lahir']}')";
	mysql_query($sql) or die('Gagal menyimpan Data ');
	?>
		<script language="javascript">alert("Data berhasil Disimpan...!");</script>
		<script> document.location.href='index.php'; </script>
		<?
}
