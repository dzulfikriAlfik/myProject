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
.style71 {
	font-weight: bold;
	font-size: 24px;
	background-color: #000;
	font-family: Verdana, Geneva, sans-serif;
}
.style72 {font-size: 16px}
#kartu {
	background-color: #CCC;
	border: thin solid #060;
}
</style>
<form name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;</p>
    <table width="396" border="0" id="kartu">
      <tr>
        <td colspan="2" bgcolor="#CCFF00"><div align="center">
          <h3><strong>KARTU PENDAFTARAN</strong></h3>
        </div></td>
      </tr>
      <tr>
        <td width="163" height="36">NO Daftar</td>
        <td width="223"> <h1><?php echo $buff['no_daftar']; ?> </h1></td>
      </tr>
      <tr>
        <td height="39">Nama</td>
        <td><?php echo $buff['nama']; ?></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#CCFF00">Terima Kasih Sudah Menggunakan Layanan Kami...</td>
      </tr>
    </table>
    <p><INPUT TYPE="button" onClick="window.print()">
    &nbsp;Print</p>
  </div>
</form>
<?php
}
?>	