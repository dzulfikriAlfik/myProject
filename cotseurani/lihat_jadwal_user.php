<?php
	if (!isset($_SESSION)) {
    session_start();
}
	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
		?>
<script type="text/javascript">
alert("Anda Harus Login Dulu...!!!");
window.location='index.php';
		</script>
		<?php
	}else{
	include "koneksi.php";
?>
<?php

 $sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("kua") or die ("Gagal membuka database.");

$username=$_SESSION['username'];
$query = "select * from registrasi where username='$username'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
?>
<!DOCTYPE html>
<html>
<head>
<title>Menampilkan Data dengan PHP, MySQL dan DataTables</title>
<link rel="stylesheet" href="jquery/jquery.dataTables.css">
<style>
table {
margin: 0 auto;
border-collapse: collapse;
}

tbody {
color: #000;
}

table td {
padding: 5px 10px;
border: 1px solid #e0e0e0;
}

table tr {
font: normal 14px Tahoma, Geneva, sans-serif;
}

#konten {
	width:800px;
	height:auto;
	padding:10px;
	margin:0 auto;	
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
</style>
</head>
<body>
<script src="jquery/jquery-1.11.2.min.js"></script><!-- -->
<script src="jquery/jquery.dataTables.js"></script>
<?php
include "koneksi.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
$hasil=mysql_query("select * from jadwal order by no_daftar");

?>
<form name="form1" method="post" action="">
  <div align="center">
    <table width="487" height="29" id="contoh">
      <thead>
        <tr>
          <th bgcolor="#CCCCCC">No Daftar</th>
          <th bgcolor="#CCCCCC">Hari</th>
          <th bgcolor="#CCCCCC">Pukul</th>
        </tr>
      
        <tr>
          <th width="123" bgcolor="#CCCCCC"><?php echo $buff['no_daftar']; ?></th>
          <th width="109" bgcolor="#CCCCCC"><?php echo $buff['hari']; ?></th>
          <th width="239" bgcolor="#CCCCCC"><?php echo $buff['pukul']; ?></th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
      
    </table>
  </div>
</form>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
</body>
<?php
}
?>	
</html>