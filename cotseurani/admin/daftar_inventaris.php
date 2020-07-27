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
        
          <th width="75" bgcolor="#FFFF00">Jenis Inventaris</th>
          <th width="108" bgcolor="#FFFF00">Nama Inventaris</th>
        
        </tr>
      </thead>
      <tbody>
        <?php
	$no = 1;
	$query = mysql_query("SELECT * FROM inventaris ORDER BY id ASC");
	while($data = mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>$no";
		
		echo "<td>$data[jns_inventaris]</td>";
		echo "<td>$data[nm_inventaris]</td>";
	
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