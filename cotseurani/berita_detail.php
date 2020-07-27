<?php 
include "include/db.php";
$oke=mysql_query("select id,judul,isi,author,gambar,DATE_FORMAT(tanggal,'%d-%m-%Y') as tanggal from berita where id=$_GET[id]") ;
while($data=mysql_fetch_array($oke)) { 
print "<p><h3 align='center'><u>$data[judul]</h3></u></p>";
print "<p align='justify'><img align='left' src='$data[gambar]' alt='Maaf, Gambar tidak tersedia' border='2' width='175' height='125'>$data[isi]</p><hr>";
print "<p align='left'>Written by : <b><i>$data[author]</i></b> at $data[tanggal]</p>";
} ?>
<center><input type="button" onClick="window.close()" value="Tutup"></center>