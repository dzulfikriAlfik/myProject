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

$module=$_GET[module];
$act=$_GET[act];

// Update cara pembelian
if ($module=='alamat' AND $act=='update'){
  mysql_query("UPDATE mod_alamat SET alamat = '$_POST[alamat]'
                            WHERE id_alamat     = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
	}
    
  }


?>
