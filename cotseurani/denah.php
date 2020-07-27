<div align="center">KUMPULAN JUDUL SKRIPSI DAN TUGAS AKHIR</span> <br />
        <span class="style98">FAKULTAS ILMU KOMPUTER</span></span><span class="style98"><br />
          <strong>( FIKOM ) </strong></span><br />
          <span class="style64">Ketik Judul Skripsi Pencarian Anda Dibawah Ini</span> </span><br />
        <input name="qcari" type="text" class="style45" size="60" placeholder="Cari Judul Skripsi Disini....." />
        <input name="Submit" type='submit' class="style45" value='Cari' />
        <a href='judul_skripsi.php' class="style45" style="text-decoration:none"  >ALL </a><br />
        <br />
        ================================================================ </div>
      
  <table width="734" align="left" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="style64">
    <tr bgcolor="#408080">
      <th width="47"><div align="center" class="style88 style20"><span class="style1">No </span> </div></th>
      <td width="486"><div align="center" class="style88 style20"><span class="style1">Judul Skripsi </span></div></td>
      <td width="183"><div align="center" class="style89 style20"><strong><span class="style1 style20">Di Susun oleh </span></strong></div>
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
      <td height="31" valign="top" bgcolor="#CCCCCC"><span class="style90"> <?php echo $no?></span></td>
      <td valign="top" bgcolor="#CCCCCC"><div align="justify"><span class="style90"> <?php echo $buff -> judul_skripsi;?> </span></div></td>
      <td valign="top" bgcolor="#CCCCCC"><table width="138" border="0">
          <tr>
            <td width="11">&nbsp;</td>
            <td width="117"><span class="style90"><a href="tampil_profil.php?nim=<?php echo $buff -> nim;?>" style="text-decoration:none">
              <div align="center" class="style99" title=" Lihat Profil { <?php echo $buff -> nama;?> }">
              <div align="left" class="style101"><?php echo $buff -> nama;?></div></td>
        </tr>
      </table></td>
      <?php
$no++;
}?>
    </tr>
  </table>
      
  </form>
      
<p align="center"><br />
  <br />
  