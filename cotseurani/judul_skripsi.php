<style type="text/css">
#tt {
	background-image: url(admin/images/green-flowers-background-.jpg);
}
</style>
<div align="center">
  <p>KUMPULAN JUDUL SKRIPSI DAN TUGAS AKHIR</span></p>
  <p>FAKULTAS ILMU KOMPUTER - ALMUSLIM<br />
        ================================================</p>
  <table width="478" border="0">
    <tr>
      <td width="472" align="center"><table width="475" align="left" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="style64">
        <tr bgcolor="#408080">
          <th width="25" bgcolor="#006600"><div align="center" class="style88 style20"><span class="style1">No </span></div></th>
          <td width="321" bgcolor="#006600"><div align="center" class="style88 style20"><span class="style1">Judul Skripsi </span></div></td>
          <td width="111" bgcolor="#006600"><div align="center"><strong><span class="style1 style20">Di Susun </span></strong></div>
            <div align="center" class="style89 style20"></div></td>
          <?php
	  
require_once('config.php');
$query1="select * from daftar order by judul_skripsi desc LIMIT 13; ";


if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM  daftar 
	where judul_skripsi like '%$qcari%'
	or judul_skripsi like '%$qcari%'
	or program_studi like '%$qcari%'
	or nim like '%$qcari%'
	or wisuda_angkatan like '%$qcari%'
	or tahun_masuk like '%$qcari%'
	or nama like '%$qcari%'";
}

$result=mysql_query($query1) or die(mysql_error());
$no=1; //penomoran 
while($buff=mysql_fetch_object($result)){
?>
        </tr>
        <tr>
          <td height="25" valign="top" bgcolor="#CCCCCC"><span class="style90"> <?php echo $no?></span></td>
          <td valign="top" bgcolor="#CCCCCC"><div align="justify"><span class="style90"> <?php echo $buff -> judul_skripsi;?></span></div></td>
          <td valign="top" bgcolor="#CCCCCC"><a href="#=<?php echo $buff -> nim;?>" style="text-decoration:none">
            <div align="center" class="style99" title=" Lihat Profil { <?php echo $buff -> nama;?> }">
            <div align="left" class="style101"><?php echo $buff -> nama;?></div></td>
          <?php
$no++;
}?>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
      
<div align="center">
  </form>
</div>
<p align="center"><br />
  <br />
  