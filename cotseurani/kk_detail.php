<style type="text/css">
body {
	background-image: url(image/438369.jpg);
}
</style>
<h2 align="center">Detail Data Kepala Keluarga</h2>
<?php 
include "include/connect.php";
$oke=mysql_query("select * from  keluarga where id_keluarga=$_GET[id_keluarga]") ;
$data=mysql_fetch_array($oke);
echo "
<table border='2' bgcolor='#6FF' align='center'>
<tr>
	
	<td>ID</td>
	<td>: $data[id_keluarga]</td>
</tr>
<tr>
	<td>Kepala Keluarga</td>
	<td>: $data[kepala_keluarga]</td>
</tr>
<tr>
	<td>Alamat</td>
	<td>: $data[alamat]</td>
</tr>
<tr>
	<td>Dusun</td>
	<td>: $data[dusun]</td>
</tr>
<tr>
	<td>RT</td>
	<td>: $data[rt]</td>
</tr>
<tr>
	<td>RW</td>
	<td>: $data[rw]</td>
</tr>
<tr>
	<td>Penghasilan/Bln</td>
	<td>: $data[ekonomi]</td>
</tr>
</table>
";

?>
</table>
<center><input type="button" onClick="window.close()" value="Tutup"></center>
