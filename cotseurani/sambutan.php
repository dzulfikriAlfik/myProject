<head>
<title>Untitled Document</title>
<style type="text/css">
<!--
.style5 {color: #660066}
-->
</style>
</head>

<body>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24%" class="style5">
<?php
include "koneksi.php";
$oke=mysql_query("select * from sambutan") ;
while($data=mysql_fetch_array($oke)) { 
print "<img src='$data[foto]' width=150 height=150></td>
    <td width='7%' class='style5'>&nbsp;</td>
    <td width='63%' class='style5'><div align='center'><u>$data[nama]</u><br>$data[jabatan]</div></td>
    <td width='6%' class='style5'>&nbsp;</td>
  </tr>" ; 
print "<tr>
    <td colspan='4' class='style5'><p align='left'>$data[isi]</p>
    </td>
  </tr>" ; } ?>
</table>
</body>
</html>
