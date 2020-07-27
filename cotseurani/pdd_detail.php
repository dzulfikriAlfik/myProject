<style type="text/css">
body {
	background-image: url(image/438369.jpg);
}
</style>
<h2 align="center">Detail Data Penduduk</h2>
<?php 
include "include/connect.php";
$oke=mysql_query("select * from warga where no_ktp=$_GET[no_ktp]") ;
$data=mysql_fetch_array($oke);
echo "
<table border='2' bgcolor='#6FF' align='center'>
<tr>
	
	<td>No.KTP</td>
	<td>: $data[no_ktp]</td>
</tr>
<tr>
	<td>Nama</td>
	<td>: $data[nama]</td>
</tr>
<tr>
	<td>Jenis kelamin</td>
	<td>: $data[j_kel]</td>
</tr>
<tr>
	<td>T_Lahir</td>
	<td>: $data[t_lahir]</td>
</tr>
<tr>
	<td>Tgl Lahir</td>
	<td>: $data[tgl_lahir]</td>
</tr>
<tr>
	<td>Agama</td>
	<td>: $data[agama]</td>
</tr><tr>
	<td>Gol. Darah</td>
	<td>: $data[gol_darah]</td>
</tr><tr>
	<td>WN</td>
	<td>: $data[w_negara]</td>
</tr>
</tr><tr>
	<td>Pendidikan</td>
	<td>: $data[pendidikan]</td>
</tr>
</tr><tr>
	<td>Pekerjaan</td>
	<td>: $data[pekerjaan]</td>
</tr>
</tr><tr>
	<td>Status Nikah</td>
	<td>: $data[s_nikah]</td>
</tr>
</tr><tr>
	<td>Status</td>
	<td>: $data[status]</td>
</tr>
</table>
";

?>
</table>
<center><input type="button" onClick="window.close()" value="Tutup"></center>
