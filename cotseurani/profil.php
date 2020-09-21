<?php
include "koneksi.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
$hasil=mysql_query("select * from profil order by id_profil");

?>

<div align="center"> 
  <p><!-- membuat tabel untuk menampilkan data -->  </p>
  <table width="520" border="0">
    <tr bgcolor="#33FF33">
      <th width="514" colspan="5" bgcolor="#FFFFFF" scope="col"><div align="left">Profil / Sejarah Singkat Desa Cot Seurani</div></th>
    </tr>
    <?php //perulangan untuk menampilkan data dalam beberapa baris
$warna = "";
while ($baris = mysql_fetch_array($hasil)){
include "include/warna_tabel.php";
//<tr> = table rows
echo "
<tr bgcolor=$warna>
<td>$baris[isi_profil]</td>
" ?>
</tr>
<?php
}
?>	
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
