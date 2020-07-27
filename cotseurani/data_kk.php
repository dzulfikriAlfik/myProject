<?php
include "include/connect.php";
$qry=mysql_query("SELECT * FROM keluarga") ;
echo "<table border=1 width=100% ><tr bgcolor='#FFCC99' align='center'><td>No</td><td>ID</td><td>Kepala_Keluarga</td><td>Alamat</td><td>Dusun</td><td>Detail</td></tr>";
$no=0;
while($data=mysql_fetch_array($qry)) { 
$no++;
echo "<tr><td>$no</td><td>$data[0]</td><td>$data[1]</td><td>$data[5]</td><td>$data[3]</td><td><a href='' onclick=\"window_baru('kk_detail.php?id_keluarga=$data[id_keluarga]','Data KK Lengkap','resizable=yes,width=500,height=300,scrolling=yes')\">Detail</a></td></tr>";
}
echo "</table>";
?>