<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
<head>



</head>
<body>
<form name="form1" method="post" action="">
  <div align="center">
    <table width="420">
      <thead>
        <tr>
          <th width="20" height="19" bgcolor="#FFFF00">No</th>
          <th width="137" bgcolor="#FFFF00">No. Surat Kelahiran</th>
          <th width="75" bgcolor="#FFFF00">No. KK</th>
          <th width="108" bgcolor="#FFFF00">anak</th>
          <th width="46" bgcolor="#FFFF00">tgl_lahir</th>
        </tr>
      </thead>
      <tbody>
        <?php
	$no = 1;
	$query = mysql_query("SELECT * FROM kelahiran ORDER BY no_suratlahir ASC");
	while($data = mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>$no";
		echo "<td>$data[no_suratlahir]</td>";
		echo "<td>$data[no_kk]</td>";
		echo "<td>$data[anak]</td>";
		echo "<td>$data[tgl_lahir]</td>";
	
	
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