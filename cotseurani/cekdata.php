<?php
include "koneksi.php";
$a = $_GET['akhir'];

$berita = mysql_query("SELECT * FROM tabel_berita,tabel_user
WHERE tabel_user.nomor=tabel_berita.user_nomor
AND tabel_berita.nomor>$a");

while($b = mysql_fetch_array($berita)){
    echo $b[0]."||";
    echo "<img src='".$b['photo']."' align=left><b><a href=#>".$b['nama']."</a></b> ";
    echo "<font size=1>".$b['waktu']."</font><br>".$b['berita']."<br>\n";
}
?>
