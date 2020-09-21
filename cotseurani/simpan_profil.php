<?php
include "koneksi.php";
$no_daftar=$_POST['no_daftar'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$t_lahir=$_POST['t_lahir'];
$tanggal=$_POST['tanggal'];
$alamat=$_POST['alamat'];
$username=$_POST['username'];
$password=$_POST['password'];
$hp=$_POST['hp'];
$email=$_POST['email'];

if (empty($nik))
{	
	die("Isikan NIK!");
} 
elseif(empty($nama))
{
	die("Isikan Nama!");
}
else //bisa tambahkan pengecekan yang lain jika perlu
{
	//proses upload photo jika ada
	if (!empty($_FILES["photo"]["tmp_name"]))
	{
		$namafolder="photo/"; //tempat menyimpan file
		$jenis_gambar=$_FILES['photo']['type'];
		if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
		{           
			$photo = $namafolder . basename($_FILES['photo']['name']);       
			if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) 
			{
			   die("Gambar gagal dikirim");
			}
			//Hapus photo yang lama jika ada
			$res = mysql_query("select photo from registrasi where no_daftar='$no_daftar' LIMIT 1");
			$d=mysql_fetch_object($res);
			if (strlen($d->photo)>3)
			{
				if (file_exists($d->photo)) unlink($d->photo);
			}				
mysql_query("UPDATE registrasi SET photo='$photo' WHERE no_daftar='$no_daftar' LIMIT 1");
		} 
		else { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); }
	} //end if cek file upload
		$myqry="UPDATE registrasi SET nik='$nik',nama='$nama',".
			"jk='$jk',t_lahir='$t_lahir',tanggal='$tanggal',alamat='$alamat',username='$username',password='$password',hp='$hp' ,email='$email' WHERE no_daftar='$no_daftar' LIMIT 1";
	mysql_query($myqry) or die(mysql_error());
	header("location:indexuser.php?page=profil_saya");
	exit;
}		
?>