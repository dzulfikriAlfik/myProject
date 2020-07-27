<?php
session_start();
include "../config/koneksi.php";


$username = anti_injection($_POST['username']);
$data     = anti_injection(md5($_POST['password']));
$pass=hash("sha512",$data);
  
// pastikan username dan password adalah berupa huruf atau angka.
$kode =strip_tags($_POST['kode']);
if($kode!=$_SESSION['captcha_session']){
echo "<script>window.alert('Kode yang Anda masukkan tidak cocok.');
				window.location='javascript:history.go(-1)'</script>";			
}elseif (!ctype_alnum($username) OR !ctype_alnum($pass)){
echo "<script>window.alert('Sekarang loginnya tidak bisa di injeksi lho.');
				window.location='javascript:history.go(-1)'</script>";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['upload_image_file_manager'] = true;
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[email] 	  = $r[email];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[sessid]       = $r[id_session];
  $_SESSION[leveluser]    = $r[level];

  header('location:media.php?module=home');
}
else{

   echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>LOGIN GAGAL</h1>
  
  <p><span class style=\"font-size:14px; color:#727272;\">Username atau Password anda tidak sesuai.<br>
  Atau akun anda sedang diblokir.</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";

}
}
?>