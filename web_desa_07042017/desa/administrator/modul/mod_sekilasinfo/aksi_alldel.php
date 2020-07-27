<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
include "../../../config/koneksi.php";


$cek=$_POST[cek];
$jumlah=count($cek);

  for($i=0;$i<$jumlah;$i++){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM sekilasinfo WHERE id_sekilas='$cek[$i]'"));
   if ($data[gambar]!=''){       
     mysql_query("DELETE FROM sekilasinfo WHERE id_sekilas='$cek[$i]'");
     unlink("../../../foto_info/$data[gambar]");   
     unlink("../../../foto_info/kecil_$data[gambar]");  
      }
      else{ 
           mysql_query("DELETE FROM sekilasinfo WHERE id_sekilas='$cek[$i]'");
       }
     header('location:../../media.php?module=sekilasinfo');
	 }
}
?>