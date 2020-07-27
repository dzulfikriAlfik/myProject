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
<form id="form1" name="form1" method="post" action="simpan_daftar.php">
  <p>&nbsp;</p>
  <table width="410" align="center" cellpadding="4" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#009900"><div align="center"><strong><span class="merah"> <span class="style60">FORM PENDAFTARAN </span><br />
        <?php 
			  
			  
			  if(isset($_GET['status'])){
				  $status = $_GET['status'];
				  }
			   else{
				   $status = "";
				   }
			  
			  echo "$status";
			  
			  
			  ?>
      </span></strong></div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">NIK</td>
      <td bgcolor="#FFFFFF"><input name="nik" type="text" id="nik" size="35" maxlength="30" /></td>
    </tr>
    <tr>
      <td width="184" bgcolor="#FFFFFF">Nama</td>
      <td width="298" bgcolor="#FFFFFF"><input name="nama" type="text" id="nama" size="35" maxlength="30" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Jenis Kelamin </td>
      <td bgcolor="#FFFFFF"><input type="radio" name="jk" value="Perempuan" />
        Laki-Laki
          <input type="radio" name="jk" value="Laki-Laki" />
        Perempuan</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Username</td>
      <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" size="20" maxlength="15" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Password</td>
      <td bgcolor="#FFFFFF"><input name="password" type="text" id="password" size="20" maxlength="15" /></td>
    </tr>
    <tr>
      <td height="32" valign="top" bgcolor="#009900">&nbsp;</td>
      <td valign="top" bgcolor="#009900"><label>
        <input type="submit" name="Submit2" value="Daftar" />
        <input type="reset" name="Submit3" value="Ulang" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>