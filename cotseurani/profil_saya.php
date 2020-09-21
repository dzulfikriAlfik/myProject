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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Entry Mahasiswa</title>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<form action="simpan_profil.php" method="post" enctype="multipart/form-data" name="FMHS">
  <table width="452" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#669900">
    <tr>
      <td height="28" align="center" bgcolor="#009900"><strong><font color="#FFFFFF">Update Profil Saya</font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="452" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td>No. Pendaftaran </td>
            <td>&nbsp;</td>
            <td><input type="text" name="no_daftar" value="<?php echo $buff['no_daftar']; ?>" readonly/></td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>&nbsp;</td>
            <td><input type="text" name="nik" value="<?php echo $buff['nik']; ?>" readonly/></td>
          </tr>
          <tr>
            <td width="132">Nama</td>
            <td width="8">&nbsp;</td>
            <td width="282"><input type="text" name="nama" value="<?php echo $buff['nama']; ?>" readonly/></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>&nbsp;</td>
            <td><select name="jk" id="jk">
              <option value="LK">LK</option>
              <option value="PR">PR</option>
              <?php //masukkan nama dokter ke dalam daftar
	  while($dokter = mysql_fetch_array($hasil)){
	  echo "<option>$dokter[nama_dokter]</option>";
	  }
	  ?>
            </select></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td>&nbsp;</td>
            <td><input name="t_lahir" type="text" id="t_lahir" value="<?php echo $buff['t_lahir']; ?>" size="30" maxlength="30"></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>&nbsp;</td>
            <td><input type="text" name="tanggal" value="<?php echo $buff['tanggal']; ?>" id="tanggal" /></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="30" rows="5"  id="alamat" value="<?php echo $buff['alamat']; ?>" > </textarea></td>
          </tr>
          <tr>
            <td colspan="3"><strong><em>Kontak</em></strong></td>
          </tr>
          <tr>
            <td>Username</td>
            <td>&nbsp;</td>
            <td><input name="username" type="text" id="username" value="<?php echo $buff['username']; ?>" readonly/></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>&nbsp;</td>
            <td><input name="password" type="text" id="password" value="<?php echo $buff['password']; ?>"size="30" maxlength="30"></td>
          </tr>
          <tr>
            <td>No HP</td>
            <td>&nbsp;</td>
            <td><input name="hp" type="text" id="hp" value="<?php echo $buff['hp']; ?>" size="30" maxlength="30"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>&nbsp;</td>
            <td><input name="email" type="text" id="email" value="<?php echo $buff['email']; ?>" size="20" maxlength="30"> 
              * Jika Ada</td>
          </tr>
          <tr>
            <td>Photo</td>
            <td>&nbsp;</td>
            <td><input type="file" name="photo" value="<?php echo $buff['photo']; ?>" id="photo"></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input name="fok" type="submit" id="fok" value="Update">
              <input name="fulang" type="reset" id="fulang" value="Ulangi">
              <input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<div align="center"></div>
</body>
<?php
}
?>	
</html>
