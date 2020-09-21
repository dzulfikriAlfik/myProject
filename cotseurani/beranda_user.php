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

<style type="text/css">
.style71 {font-weight: bold; font-size: 16px;}
.style72 {font-size: 16px}
</style>
<form name="form1" method="post" action="">
  <div align="center">
    <p>Selamat Datang......</p>
    <p><br />
      <span class="style71"><?php echo $buff['nama']; ?></span><span class="style72"><br />
      <strong> ( <?php echo $buff['nik']; ?></strong> ) </span></p>
    <table width="396" border="0">
      <tr>
        <td width="163">Nik</td>
        <td width="223"><?php echo $buff['nik']; ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><?php echo $buff['nama']; ?></td>
      </tr>
      <tr>
        <td>JK</td>
        <td><?php echo $buff['jk']; ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td><?php echo $buff['t_lahir']; ?></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td><?php echo $buff['tanggal']; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?php echo $buff['alamat']; ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo $buff['username']; ?></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><?php echo $buff['password']; ?></td>
      </tr>
      <tr>
        <td>HP</td>
        <td><?php echo $buff['hp']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $buff['email']; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
<?php
}
?>	