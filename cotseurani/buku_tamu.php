<form name="form1" method="post" action="simpan_tamu.php">
  <p>&nbsp;</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="17%">Nama</td>
      <td width="5%">:</td>
      <td width="78%"><label for="textfield"></label>
      <input name="nama" type="text" id="nama" size="50" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input name="email" type="text" id="email" size="50" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><label for="select"></label>
        <select name="jk" size="1" id="jk">
          <option value="LK" selected="selected">LK</option>
          <option value="PR">PR</option>
         
      </select>      </td>
    </tr>
    <tr>
      <td>Komentar</td>
      <td>:</td>
      <td><label for="textarea"></label>
      <textarea name="komentar" cols="50" rows="5" id="komentar"></textarea></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
        <input type="submit" name="submit" value="Kirim" />
      </div></td>
    </tr>
  </table>
  </form>
  <hr>
</body>
</html>

<?php
include "include/connect.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
$hasil=mysql_query("select * from buku_tamu order by id_tamu");

?>

<div align="center"> 
<p><!-- tabel rata tengah -->
    <!-- membuat tabel untuk menampilkan data -->
  </p>
  <table width="513" border="1">
    <tr bgcolor="#33FF33"> <!-- <tr> = table rows -->
      <th width="84" scope="col">Nama </th> <!-- <th> = table header -->
      <th width="146" scope="col">Email </th>
          <th width="70" scope="col">JK</th>
      <th width="140" scope="col">Komentar</th>
      
    </tr>
<?php //perulangan untuk menampilkan data dalam beberapa baris
$warna = "";
while ($baris = mysql_fetch_array($hasil)){
include "/include/warna_tabel.php";
//<tr> = table rows
echo "
<tr bgcolor=$warna>
<td>$baris[nama]</td>
<td>$baris[email]</td>
<td>$baris[jk]</td>
<td>$baris[komentar]</td>
</td>

" ?>
  <?php
}
?>	
</table>