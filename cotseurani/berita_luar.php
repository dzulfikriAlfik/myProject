
		<?php
	
	include "koneksi.php";
?>

<style type="text/css">
<!--
.style22 {	color: #FFFFFF;
	font-size: 16px;
	font-family: Georgia, Times, serif;
	font-weight: bold;
}
.style29 {color: #FFFFFF;
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
}
.style52 {color: #FFFFFF}
body {
	background-color: #008000;
}
.style57 {color: #FFFF00}
.style58 {
	font-size: 12px;
	font-family: Tahoma, "Times New Roman";
}
.style60 {color: #FFFFFF; font-size: 14px; }
-->
</style>
<?php

$tgl=("yy/mm/dd");  //ngambil tanggal dari sistem
?>

<style type="text/css">
<!--
.merah {font-weight: bold;
	color: #F00;
}
.style61 {font-size: 12px}
.style62 {
	font-size: 14px;
	font-weight: bold;
}
.style30 {	font-family: Tahoma, "Times New Roman";
	font-size: 16px;
	font-weight: bold;
}
.style35 {color: #FFFFFF; font-family: "Courier New", Courier, monospace; font-size: 18px; font-weight: bold; }
.style36 {	font-family: Tahoma, "Times New Roman";
	font-weight: bold;
	color: #FFFFFF;
	font-size: 16px;
}
.style48 {font-size: 16px; font-weight: bold; color: #FFFFFF;}
.style53 {font-family: Tahoma, "Times New Roman"}
.style54 {font-size: 16px}
.style55 {font-family: "Courier New", Courier, monospace; }
.style56 {font-family: Tahoma, "Times New Roman"; font-size: 16px; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="./Gambar/bireuen.jpg" type="image/x-png">
<title>DPRK BIREUEN</title><form id="form1" name="form1" method="post" action="simpan_tamu.php">
  <table width="990" height="510" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFFFF" celpading="3" celspacing="1" >
    <tr bgcolor="#FFFFFF">
      <td height="139" colspan="3" valign="top" bordercolor="#F0F0F0" bgcolor="#408080"><div align="right" class="style57">
        <div align="center">
          <div align="right" class="style57">
            <div align="center">
              <? include "header.php";?>
            </div>
          </div>
          <div align="right"></div>
        </div>
      </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="26" colspan="3" bgcolor="#408080"><span class="style22">
        <? include "menu_luar1.php";?>
      </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="180" height="291" valign="top" bgcolor="#408080"><table width="169" align="center" cellpadding="4" cellspacing="1" bordercolor="#408080" bgcolor="#000000" celpading="2" celspacing="1" >
        <tr bgcolor="#FFFFFF">
          <td width="157" valign="top" bgcolor="#408080"><label></label>
              <div align="center" class="style52"><strong>Pimpinan Daerah </strong></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="130" valign="top" bgcolor="#408080"><label><img src="Gambar/bup_2.jpg" width="169" height="144" border="5" /> </label></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><div align="center" class="style52">BIREUEN</div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><div align="center"><span class="style52">
              <? include "link_weblokal.php";?>
          </span></div></td>
        </tr>
      </table></td>
      <td width="611" align="left" valign="top" bgcolor="#FFFFFF"><p align="center"><br />
          <?php

$sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("riki") or die ("Gagal membuka database.");
?>BERITA DPRK BIREUEN </p>
          <table width="550" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFFFF">
            <tr bgcolor="#FFFFFF">
            
            </tr>
            <?php
$query = "select * from berita order by jdl_brt limit 10";
$result = mysql_query($query, $sambung);
//$no = 0;
while ($buff = mysql_fetch_array($result)){
//$no++;
?>
            <tr>
             <td bgcolor="#FFFFFF"><div align="justify" class="style61 style62"><?php echo $buff['jdl_brt']; ?></div></td>
            </tr>
			<tr>
              <td bgcolor="#FFFFFF"><div align="justify" class="style61"><?php echo $buff['isi_brt']; ?></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="style61">Update : <em><?php echo $buff['tgl_brt']; ?></em><br />
              =============================================================================</span></td>
            </tr>
            <?php
}
mysql_close($sambung);
?>
        </table>
      <p>&nbsp;</p></td>
      <td width="169" valign="top" bgcolor="#408080"><table width="169" align="center" cellpadding="4" cellspacing="1" bordercolor="#408080" bgcolor="#000000" celpading="2" celspacing="1" >
        <tr bgcolor="#FFFFFF">
          <td width="157" valign="bottom" bgcolor="#408080"><div align="center" class="style36">Login Pengirim </div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><span class="style35 style53 style54"><span class="style54 style55"><span class="style55">Username
            <label></label>
            </span></span></span> <span class="style30">
            <label></label>
            </span> <span class="style30">
            <label></label>
            </span> <span class="style56"><strong>
            <label></label>
            </strong>
            <label><br />
            <input name="username" type="text" id="username" size="17" maxlength="10" />
            </label>
          </span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><span class="style35 style53 style54"><span class="style54 style55"><span class="style55">Password</span></span></span><span class="style56"><br />
                <input name="password" type="password" id="password" size="17" maxlength="15" />
          </span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><input type="submit" name="Submit" value="Login" />
            <a href="daftar.php" class="style48" style="text-decoration:none">Daftar</a></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="27" valign="top" bgcolor="#408080"><div align="center"><span class="style52">
              <? include "link_nasional.php";?>
          </span></div></td>
        </tr>
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <th height="47" colspan="3" valign="top" bgcolor="#408080"><div align="center" class="style29">CopyRight@Riki Ikhwanul Hakim 2013<br />

        Bireuen <br />
      </div></th>
    </tr>
  </table>
</form>
