<?php
if($_POST){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("simdes",$conn); 
	//menyimpan ke table product
	$sql = "insert into inventaris (jns_inventaris,nm_inventaris) values ('{$_POST['jns_inventaris']}','{$_POST['nm_inventaris']}')";
	mysql_query($sql) or die('Gagal menyimpan Data ');
	?>
		<script language="javascript">alert("Data berhasil Disimpan...!");</script>
		<script> document.location.href='index.php'; </script>
		<?
}
