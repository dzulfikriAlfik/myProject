<?php
include "../include/connect.php"; //sambung ke mysql

$kode_pasien = $_GET[kodepasien];//menyimpan kode pasien

$hasil = mysql_query("SELECT * FROM pasien WHERE kode_pasien = '$kode_pasien'");//mengambil data pasien

//mengambil nama dokter yang menangani pasien
$hasil2 = mysql_query("SELECT nama_dokter FROM dokter WHERE kode_dokter IN (SELECT kode_dokter FROM tgl_masuk WHERE kode_pasien='$kode_pasien')");

//mengambil nama suster perawat
$hasil3 = mysql_query("SELECT nama_suster FROM suster WHERE kode_dokter IN (SELECT kode_dokter FROM tgl_masuk WHERE kode_pasien='$kode_pasien')");

//mengambil tanggal masuk
$hasil4 = mysql_query("SELECT tgl_masuk FROM tgl_masuk WHERE kode_pasien='$kode_pasien'");

//mengambil rincian ruangan
$hasil5 = mysql_query("SELECT * FROM ruangan WHERE kode_pasien='$kode_pasien'");

//mengambil data pembayaran
$hasil7 = mysql_query("SELECT jmlh_pembayaran,lama_rawat FROM pembayaran WHERE kode_pembayaran='$kode_pasien'");

//mengambil tanggal keluar
$hasil6 = mysql_query("SELECT tgl_keluar FROM tgl_keluar WHERE kode_pasien='$kode_pasien'");

//memecah ke dalam array dari tabel pasien
$pasien = mysql_fetch_array($hasil);

//memecah ke dalam array dari tabel tgl_masuk
$tgl_masuk = mysql_fetch_array($hasil4);

//memecah ke dalam array dari tabel ruangan
$ruangan = mysql_fetch_array($hasil5);
?>
<h2 align="center"><u>Rincian Data Pasien</u> </h2>
<table width="532" border="0" align="center">
  <tr>
    <td width="157"><span class="style10">Kode Pasien </span></td>
    <td width="15">:</td>
    <td width="353"><?php echo $pasien[kode_pasien]?></td>
  </tr>
  <tr>
    <td><span class="style10">Nama Pasien </span></td>
    <td>:</td>
    <td><?php echo $pasien[nama_pasien] ?></td>
  </tr>
  <tr>
    <td><span class="style10">Tanggal Lahir </span></td>
    <td>:</td>
    <td><?php echo $pasien[tanggal_lahir] ?></td>
  </tr>
  <tr>
    <td>Tempat Lahir </td>
    <td>:</td>
    <td><?php echo $pasien[tempat_lahir] ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $pasien[jenis_kelamin] ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $pasien[alamat_pasien] ?></td>
  </tr>
  <tr>
    <td>Usia</td>
    <td>:</td>
    <td><?php echo $pasien[usia] ?></td>
  </tr>
  
  <tr>
    <td>Penyakit yang Diderita </td>
    <td>:</td>
    <td><?php echo $pasien[penyakit_diderita] ?></td>
  </tr>
  <tr>
    <td>Tanggal Masuk</td>
    <td>:</td>
    <td><?php echo $tgl_masuk[tgl_masuk] ?></td>
  </tr>
  <tr>
    <td>Ruangan</td>
    <td>:</td>
    <td><?php echo "No. $ruangan[kode_ruangan]   $ruangan[nama_ruangan] ($ruangan[jenis_ruangan]) Ranjang $ruangan[no_ranjang]"; ?></td>
  </tr>
  <tr>
    <td><p>Dokter yang Menangani </p>    </td>
    <td>:</td>
    <td><?php $dokter = mysql_fetch_array($hasil2); echo "$dokter[nama_dokter] ";?></td>
  </tr>
  <tr>
    <td>Perawat</td>
    <td>:</td>
    <td><?php $suster = mysql_fetch_array($hasil3); echo $suster[nama_suster]; ?></td>
  </tr>
  <tr>
    <td>Tanggal Keluar </td>
    <td>:</td>
    <td><?php $tgl_keluar = mysql_fetch_array($hasil6); echo $tgl_keluar[tgl_keluar] ?></td>
  </tr>
  <tr>
    <td>Lama Rawat Inap </td>
    <td>:</td>
    <td><?php $pembayaran=mysql_fetch_array($hasil7);echo $pembayaran[lama_rawat];?>  Hari    </td>
  </tr>
  <tr>
    <td>Jumlah  Pembayaran </td>
    <td>:</td>
    <td><?php echo $pembayaran[jmlh_pembayaran]?></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
    </div></td>
  </tr>
</table>
