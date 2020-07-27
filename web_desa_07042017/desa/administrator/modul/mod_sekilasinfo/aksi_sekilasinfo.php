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
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sekilas info
if ($module=='sekilasinfo' AND $act=='hapus'){
  mysql_query("DELETE FROM no_penting WHERE id_no_penting='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sekilas info
elseif ($module=='sekilasinfo' AND $act=='input'){
    mysql_query("INSERT INTO no_penting(nama_instansi,
                                    no_telpon) 
                            VALUES('".addslashes($_POST[a])."',
                                   '$_POST[b]')");
  header('location:../../media.php?module='.$module);
}

// Update sekilas info
elseif ($module=='sekilasinfo' AND $act=='update'){
    mysql_query("UPDATE no_penting SET nama_instansi = '$_POST[a]', no_telpon = '$_POST[b]'
                             WHERE id_no_penting = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
