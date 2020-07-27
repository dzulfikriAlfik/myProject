<?php    
  $nama=trim(anti_injection($_POST[nama]));
  $email=trim(anti_injection($_POST[emailr]));
  $subjek=trim(anti_injection($_POST[subjek]));
  $pesan=trim(anti_injection($_POST[pesan]));
  
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

if(empty($nama)) {
			echo '<center>Anda belum mengisikan NAMA<br/></center>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo '<center>Anda belum mengisikan EMAIL<br/></center>';
			$err = TRUE;
		}
		if(empty($subjek)) {
			echo '<center>Anda belum mengisikan SUBJEK<br/></center>';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo '<center>Anda belum mengisikan PESAN<br/></center>';
			$err = TRUE;
		}
		if(empty($_POST['kode'])) {
			echo '<center>Anda belum mengisikan Kode<br/></center>';
			$err = TRUE;
		}
		if($err) {
			echo'<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b><br/>';
		} elseif(!$err) {
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$nama',
                               '$email',
                               '$subjek',
                               '$pesan',
                               '$tgl_sekarang')");
 
 
  echo "<p><img src=$f[folder]/images/terimakasih.jpg   border=0></p>";
  
   echo "<script>window.alert('Sukses Mengirimkan Pesan, Terima kasih.');
				window.location='hubungi-kami.html'</script>";
   }
  
  else{
  echo "<center><span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></center>";}}
  else{
  echo "<center><span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></center>";}}         
  ?>