<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
<head>



</head>
<body>
<form name="form1" method="post" action="">
  <div align="center">
    <table width="547">
      <thead>
        <tr>
          <th width="20" height="19" bgcolor="#FFFF00">No</th>
          <th width="137" bgcolor="#FFFF00">No. Surat kematian</th>
          <th width="75" bgcolor="#FFFF00">No. KK</th>
          <th width="108" bgcolor="#FFFF00">Tgl. Meninggal</th>
          <th width="46" bgcolor="#FFFF00">Jam</th>
          <th width="76" bgcolor="#FFFF00">Tempat</th>
          <th width="53" bgcolor="#FFFF00">Sebab</th>
        </tr>
      </thead>
      <tbody>
        <?php
	$no = 1;
	$query = mysql_query("SELECT * FROM kematian ORDER BY no_suratkematian ASC");
	while($data = mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>$no";
		echo "<td>$data[no_suratkematian]</td>";
		echo "<td>$data[no_kk]</td>";
		echo "<td>$data[tgl_meninggal]</td>";
		echo "<td>$data[jam_meninggal]</td>";
		echo "<td>$data[tempat_meninggal]</td>";
		echo "<td>$data[sebab_meninggal]</td>";
	
		echo "</tr>";
		$no++;
	}
	?>
      </tbody>
    </table>
  </div>
  <p>&nbsp;</p>
</form>

</body>
</html>