<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.merah {font-weight: bold;
	color: #F00;
}
.style72 {font-size: 12px; font-family: "Comic Sans MS"; }
.style78 {color: #999999}
.style83 {	font-family: "Comic Sans MS";
	font-size: 24px;
	font-weight: bold;
}
.style60 {font-size: 18px; font-weight: bold; color: #FFFFFF; }
.style61 {	color: #FFFFFF;
	font-size: 12px;
}
.style63 {	font-size: 12px;
	font-weight: bold;
}
.style64 {color: #0000FF}
</style>
</head>

<body>
<?php
include "koneksi.php";//sambungkan ke mysql

//query untuk menampilkan kode pasien terakhir

//mengambil nilai kode  tertinggi dari tabel pasien
$hasil = mysql_query("SELECT MAX(no_daftar) AS no_daftar FROM registrasi");

$maks = mysql_fetch_array($hasil); //memecah hasil ke dalam array

$no_daftar = $maks['no_daftar']+1; //no_daftar ditambah 1 agar no_daftar baru terinput otomatis


?>
<form id="form1" name="form1" method="post" action="simpan_registrasi.php">
  <table width="410" align="center" cellpadding="4" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#009900"><div align="center"><strong><span class="merah"> <span class="style60">FORM PENDAFTARAN </span>
      </span></strong></div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">No Daftar</td>
      <td bgcolor="#FFFFFF"><input name="no_daftar" type="text" id="no_daftar" value="<?php echo $no_daftar ?>" size="20" maxlength="16" /></td>
    </tr>
    <tr>
      <td width="184" bgcolor="#FFFFFF">NIK</td>
      <td width="298" bgcolor="#FFFFFF"><label>
        <input name="nik" type="text" id="nik" size="35" maxlength="16" />
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Nama</td>
      <td bgcolor="#FFFFFF"><input name="nama" type="text" id="nama" size="35" maxlength="30" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Jenis Kelamin</td>
      <td bgcolor="#FFFFFF"><select name="jk" id="jk">
        <option value="LK" selected="selected">LK</option>
        <option value="PR">PR</option>
        <?php //masukkan nama dokter ke dalam daftar
	  while($dokter = mysql_fetch_array($hasil)){
	  echo "<option>$dokter[nama_dokter]</option>";
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Username</td>
      <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" size="20" maxlength="15" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Password</td>
      <td bgcolor="#FFFFFF"><input name="password" type="password" id="password" size="20" maxlength="15" /></td>
    </tr>
    <tr>
      <td height="40" valign="top" bgcolor="#009900">&nbsp;</td>
      <td valign="top" bgcolor="#009900"><label></label>
        <table width="280" bgcolor="#408080">
          <tr bordercolor="#408080" bgcolor="#408080">
            <td width="55" bgcolor="#009900"><input type="submit" name="Submit2" value="Daftar" /></td>
            <td width="50" bgcolor="#009900"><input type="reset" name="Submit3" value="Ulang" /></td>
            <td width="159" bgcolor="#009900">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>