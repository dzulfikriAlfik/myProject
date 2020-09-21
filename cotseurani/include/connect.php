
<?php 


$host="localhost"; //deklarasi variabel
$user="root"; 
$password=""; 
$database="simdes"; 

//sambungkan ke database
$koneksi=mysql_connect($host,$user,$password); 

//memilih database yang akan dipakai
mysql_select_db($database,$koneksi); 

if($koneksi){  //cek koneksi 
//echo "berhasil koneksi"; 
}else{ 
 echo "koneksi ke database mysql gagal"; 
} 

?>
