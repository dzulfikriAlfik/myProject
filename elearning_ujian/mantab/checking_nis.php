<?php
include "configurasi/koneksi.php";

$sql = mysql_query("SELECT * FROM siswa
                   WHERE nis = '$_POST[nis]'");
$ketemu = mysql_num_rows($sql);

echo $ketemu;
?>
