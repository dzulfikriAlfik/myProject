<?php
	session_start();
	if(empty($_SESSION[username]) and empty($_SESSION[password])){
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
mysql_select_db("riki") or die ("Gagal membuka database.");
$nik = $_GET['nik'];
$nik=$_SESSION['nik'];
$query = "select * from pengirim where nik='$nik'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
?>

<style type="text/css">
<!--
body {
	background-color: #008000;
}
a:visited {
	color: #FFFFFF;
	text-decoration: underline;
}
a:hover {
	color: #00FF00;
	text-decoration: none;
}
a:active {
	text-decoration: underline;
}
a:link {
	text-decoration: underline;
}
a {
	font-size: 12px;
}
.style20 {color: #FFFFFF}
.style22 {
	color: #FFFFFF;
	font-size: 16px;
	font-family: Georgia, Times, serif;
	font-weight: bold;
}
.style28 {
	font-size: 14px;
	color: #0000FF;
}
.style29 {
	color: #FFFFFF;
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
}
.style44 {font-size: 16px; font-family: Georgia, Times, serif; color: #FFFF00;}
.style45 {	font-family: "Comic Sans MS";
	font-size: 14px;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="./IMAGE/logo_bar.png" type="image/x-png">
<title>DPRK BIREUEN</title>
		<style type="text/css">
<!--
.style46 {
	font-size: 18px;
	font-weight: bold;
}
.style57 {color: #0000FF}
.style58 {color: #000000}
.style60 {
	font-size: 14px;
	font-style: italic;
}
.style61 {color: #FFFF00}
.style74 {color: #FFFFFF; font-size: 12px;}
.style62 {	font-size: 12px;
	font-family: Tahoma, "Times New Roman";
}
.style63 {color: #FFFFFF; font-size: 14px; }
-->
        </style>
		
        <form id="form1" name="form1" method="post" action="">
          <table width="990" height="439" align="center" cellpadding="4" cellspacing="1" bordercolor="#008040" bgcolor="#FFFFFF" celpading="3" celspacing="1" >
            <tr bgcolor="#FFFFFF">
              <td height="136" colspan="3" valign="top" bgcolor="#408080"><div align="right" class="style61">
                <div align="center">
                  <? include "header.php";?>
                </div>
              </div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td height="29" colspan="3" bgcolor="#408080"><div align="center"><span class="style22">
                <? include "menudalam.php";?>
              </span></div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td width="180" height="226" valign="top" bgcolor="#408080"><table width="169" align="center" cellpadding="4" cellspacing="1" bordercolor="#408080" bgcolor="#000000" celpading="2" celspacing="1" >
                <tr bgcolor="#FFFFFF">
                  <td width="157" valign="top" bgcolor="#408080"><label></label>
                      <div align="center" class="style20"><strong>Pimpinan Daerah </strong></div></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="130" valign="top" bgcolor="#408080"><label><img src="Gambar/bup_2.jpg" width="169" height="144" border="5" /> </label></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="27" valign="top" bgcolor="#408080"><div align="center" class="style20">BIREUEN</div></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="27" valign="top" bgcolor="#408080"><div align="center" class="style20">
                      <? include "link_weblokal.php";?>
                  </div></td>
                </tr>
              </table></td>
              <td width="608" valign="top" bgcolor="#FFFFFF"><table width="100%" align="center">
                  <tr>
                    <td width="100%" height="209" valign="top"><p align="center">
    <?
	include "config.php";
	$download=mysql_query("select * from proposal  where nik=$nik");
	$cek=mysql_num_rows($download);
	if($cek){
		?>
    <br />
    DAFTAR PROPOSAL SAYA
                    </p>
                      <table width="592" align="center" cellpadding="1" cellspacing="0" bordercolor="#EFEFEF" class="datatable">
                          <?
		while($row=mysql_fetch_array($download)){
			?>
                          <tr>
                            <td width="607" height="28" bgcolor="#FFFFFF"><div align="justify">
                              <label>
                                <span class="style46">
                                <?=$row['nama'];?>
                                </span></label>
                            </div>
                                <div align="justify"></div></td>
                          </tr>
                          <tr>
                            <td height="28" bgcolor="#FFFFFF"><div align="justify">
                                <?=$row['ket'];?>
                            </div>
                                <div align="justify"></div></td>
                          </tr>
                          <tr>
                            <td height="56" valign="top" bgcolor="#FFFFFF"><p><a href="./upload/<?=$row['Filename'];?>" target="_blank" style="text-decoration:none" class="style28">
                              <?=$row['Filename'];?>
                            </a><br />
                            <span class="style57"><span class="style58">Dikirim Pada Tanggal</span></span><span class="style60">
                            
                            <?=$row['tanggal'];?>
                            </span><br />
                              =================================================================</p>                              </td>
                          </tr>
                          <?
		}
		?>
                      </table>
                      <?
		
	}else{
		echo "<font color=red><center><b>Belum Ada Data!!</b><center</font>";
	}
	
	
	?>
                    <p></p></td>
                  </tr>
              </table>
              <div align="center"></div></td>
              <td width="172" valign="top" bgcolor="#408080"><table width="180" align="center" cellpadding="4" cellspacing="1" bordercolor="#408080" bgcolor="#000000" celpading="2" celspacing="1" >
                <tr bgcolor="#FFFFFF">
                  <td width="173" valign="bottom" bgcolor="#408080"><div align="center" class="style20"><strong>Anda Login<br />
                            <strong><span class="style74"><?php echo $buff['nama']; ?></span></strong></strong><br />
                  </div></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="27" valign="top" bgcolor="#408080">&nbsp;</td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="27" valign="top" bgcolor="#408080"><div align="center" class="style20">
                      <? include "link_nasional.php";?>
                  </div></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td width="173" height="27" valign="top" bgcolor="#408080"><div align="center" class="style20">Your Ip Address: <br />
                          <?php
		   $my_ipaddress=$_SERVER['REMOTE_ADDR'];echo $my_ipaddress;
		  ?>
                          <br />
                          <?php #Rumus Untuk Mengetahui Bowser Yang Kita Gunakan#
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
$ua=getBrowser();
echo "Your Browser : ".$ua['name']." ".$ua['version'];
	?>
                  </div></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td height="27" valign="top" bgcolor="#408080">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            
            <tr bgcolor="#FFFFFF">
              <th height="46" colspan="3" valign="top" bgcolor="#408080"><div align="center" class="style29"><span class="style74">CopyRight@Riki Ikhwanul Hakim 2013<br />
			  Bireuen</span></div></th>
                    <?php
}
?>
            </tr>
          </table>
        </form>
		