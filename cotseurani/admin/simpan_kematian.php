<?php
if($_POST){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("simdes",$conn); 
	//menyimpan ke table product
	$sql = "insert into kematian (no_suratkematian,no_kk,tgl_meninggal,jam_meninggal,tempat_meninggal,sebab_meninggal) values ('{$_POST['no_suratkematian']}','{$_POST['no_kk']}','{$_POST['tgl_meninggal']}','{$_POST['jam_meninggal']}','{$_POST['tempat_meninggal']}','{$_POST['sebab_meninggal']}')";
	mysql_query($sql) or die('Gagal menyimpan Data ');
	?>
		<script language="javascript">alert("Data berhasil Disimpan...!");</script>
		<script> document.location.href='index.php'; </script>
		<?
}
