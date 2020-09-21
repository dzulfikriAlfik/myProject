<table border="1" width="100%">
<tr bgcolor="#FFCC99" align="center">
<td>No</td><td>Tahun lulus</td><td >Nama</td><td >Jurusan</td><td>Detail</td>
</tr> 
<?php
include "include/db.php";
$oke=mysql_query("SELECT * FROM alumni ORDER BY nama ASC") ;
$no=0;
while($data=mysql_fetch_array($oke)) { 
$no++;
print "
<tr>
<td>$no</td><td>$data[thn_lulus]</td>
<td>$data[nama]</td>
<td>$data[jurusan]</td>
<td><a href='' onclick=\"window_baru('alumni_detail.php?nis=$data[nis]','Data Alumni Lengkap','resizable=yes,width=500,height=250,scrolling=yes')\">Detail</a></td>
</tr>"; }
?>
</table>