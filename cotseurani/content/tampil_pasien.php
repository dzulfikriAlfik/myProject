<?php
include "../include/connect.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
$hasil=mysql_query("select * from pasien order by kode_pasien");

?>

<div align="center"> <!-- tabel rata tengah -->
  <h2><u>Data Pasien Rumah Sakit</u></h2>
<!-- membuat tabel untuk menampilkan data -->
  <table width="978" border="1">
    <tr> <!-- <tr> = table rows -->
      <th width="48" scope="col">Kode Pasien </th> <!-- <th> = table header -->
      <th width="147" scope="col">Nama Pasien </th>
      <th width="102" scope="col">Tanggal Lahir </th>
      <th width="96" scope="col">Tempat Lahir </th>
      <th width="69" scope="col">Jenis Kelamin </th>
      <th width="105" scope="col">Alamat Pasien </th>
      <th width="30" scope="col">Usia</th>
      <th width="160" scope="col">Jenis Penyakit</th>
      <th width="74" scope="col">Rincian</th>
    </tr>
<?php //perulangan untuk menampilkan data dalam beberapa baris
while ($baris = mysql_fetch_array($hasil)){
//<tr> = table rows
echo "
<tr>
<td>$baris[kode_pasien]</td>
<td>$baris[nama_pasien]</td>
<td>$baris[tanggal_lahir]</td>
<td>$baris[tempat_lahir]</td>
<td>$baris[jenis_kelamin]</td>
<td>$baris[alamat_pasien]</td>
<td>$baris[usia]</td>
<td>$baris[penyakit_diderita]</td>
<td><a href=rincian_pasien.php?kodepasien=$baris[kode_pasien]>Lihat Rincian</a></td>
</tr>
";
}

?>	
  </table>
</div>