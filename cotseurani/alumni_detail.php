<h2 align="center">Detail Data Alumni</h2>
<table align="center" border="8" >
<tr><td>
<table bgcolor="#FFCCFF" width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
<?php 
include "include/db.php";
$oke=mysql_query("select * from alumni where nis=$_GET[nis]") ;
while($data=mysql_fetch_array($oke)) { 
print "<tr>
<td class='style5'><img border='1' width='100' height='125' src='$data[foto]'><td>&nbsp;&nbsp;</td>
</td><td valign='top'>NIS<br> Nama<br> Jurusan<br> Email<br> Kegiatan Sekarang<br> Pesan-Kesan</td>
<td valign='top'> : <br> : <br> : <br> : <br> : <br> : </td>
<td valign='top'>$data[nis]<br>
$data[nama]<br>
$data[jurusan]<br>
$data[email]<br>
$data[kegiatan]<br>
$data[komentar]
</td></tr>";
}
?>
</table></td></tr></table>
<center><input type="button" onClick="window.close()" value="Tutup"></center>