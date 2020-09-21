<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 
  echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
  
  }
  else{
  
//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_alamat/aksi_alamat.php";
switch($_GET[act]){
  // Tampil Alamat
  default:
    $sql  = mysql_query("SELECT * FROM mod_alamat WHERE id_alamat ");
    $r    = mysql_fetch_array($sql);

	
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>ALAMAT KONTAK</h1>
   </div>
   <div class='block-content'>				
	
   <form method=POST action=$aksi?module=alamat&act=update>
   <input type=hidden name=id value=$r[id_alamat]>
  
   <br/><textarea id='loko' name='alamat' style='width: 98%; height: 250px;'>$r[alamat]</textarea><br/><br/>
        
      <div class=block-actions> 
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
    break;  
}
//kurawal akhir hak akses module
} else {
	echo akses_salah();
}
}
?>
