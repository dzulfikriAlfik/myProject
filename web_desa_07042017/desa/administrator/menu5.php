<?php
$cek=umenu_akses("?module=sekilasinfo",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=sekilasinfo'><b>Telpon Penting</b></a></li>";
}

$cek=umenu_akses("?module=alamat",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=alamat'><b>Alamat Kontak</b></a></li>";}

$cek=umenu_akses("?module=hubungi",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=hubungi'><b>Pesan Masuk</b></a></li>";
}

$cek=umenu_akses("?module=penduduk",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=penduduk'><b>Data Penduduk</b></a></li>";
}


?>
