<style type="text/css">
#tt {
	background-image: url(admin/images/green-flowers-background-.jpg);
}
</style>
<div align="center">
  <p>DAFTAR JADWAL SELEKSI PRA NIKAH<br />
        ================================================</p>
  <table width="505" border="0">
    <tr>
      <td width="619" align="center"><table width="499" border="1" align="left" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC" class="style64">
        <tr bgcolor="#408080">
          <th width="24" bgcolor="#009900"><div align="center" class="style88 style20"><span class="style1">No </span></div></th>
          <td width="213" bgcolor="#009900"><div align="center" class="style88 style20">NIK</div></td>
          <td width="63" bgcolor="#009900">Nama</td>
          <td width="70" bgcolor="#009900">Hari</td>
          <td width="91" bgcolor="#009900">Petugas Selesksi</td>
          <td width="91" bgcolor="#009900">Tanggal Seleksi</td>
          <td width="91" bgcolor="#009900">Jumlah Nilai</td>
          <?php
	  
require_once('koneksi.php');
$query1="select * from seleksi order by nik desc LIMIT 10; ";


if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM  seleksi 
	where nik like '%$qcari%'
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
           <td valign="top" bgcolor="#CCCCCC"><div align="justify"><span class="style90"> <?php echo $buff -> nik;?></span></div></td>
          <td valign="top" bgcolor="#CCCCCC"><div align="justify"><span class="style90"> <?php echo $buff -> nama;?></span></div></td>
          <td valign="top" bgcolor="#CCCCCC"><span class="style90"><?php echo $buff -> hari;?></span></td>
          <td valign="top" bgcolor="#CCCCCC"><span class="style90"><?php echo $buff -> seleksi;?></span></td>
          <td valign="top" bgcolor="#CCCCCC"><span class="style90"><?php echo $buff -> tanggal;?></span></td>
          <td valign="top" bgcolor="#CCCCCC"><span class="style90"><?php echo $buff -> jumlah_nilai;?></span></td>
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
  