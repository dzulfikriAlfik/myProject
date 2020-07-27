<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
<title>Menampilkan Data dengan PHP, MySQL dan DataTables</title>
<link rel="stylesheet" href="jquery.dataTables.css">
<style>
table {
margin: 0 auto;
border-collapse: collapse;
}

tbody {
color: #000;
}

table td {
padding: 5px 10px;
border: 1px solid #e0e0e0;
}

table tr {
font: normal 14px Tahoma, Geneva, sans-serif;
}

#konten {
	width:800px;
	height:auto;
	padding:10px;
	margin:0 auto;	
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
</style>
</head>
<body>
<div id="konten">
<table id="contoh">
	<thead>
		<tr>
			<th bgcolor="#CCCCCC">No</th>
		    <th bgcolor="#CCCCCC">Nama Pasien</th>
            <th bgcolor="#CCCCCC">Tanggal lahir</th>
           		    <th bgcolor="#CCCCCC">Tempat Lahir</th>
                               <th bgcolor="#CCCCCC">Jenis kelamin</th>
		    <th bgcolor="#CCCCCC">Alamat Pasien</th>
		    <th bgcolor="#CCCCCC">Usia</th>
          <th bgcolor="#CCCCCC">Penyakit Diderita</th>
		</tr>
	</thead>

	<tbody>
	<?php
	$no = 1;
	$query = mysql_query("SELECT * FROM pasien ORDER BY nama_pasien ASC");
	while($data = mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>$no";
		echo "<td>$data[nama_pasien]</td>";
		echo "<td>$data[tanggal_lahir]</td>";
		echo "<td>$data[tempat_lahir]</td>";
		echo "<td>$data[jenis_kelamin]</td>";
		echo "<td>$data[alamat_pasien]</td>";
		echo "<td>$data[usia]</td>";
		echo "<td>$data[penyakit_diderita]</td>";
	
		echo "</tr>";
		$no++;
	}
	?>
	</tbody>
</table>
</div>

<script src="jquery-1.11.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
</body>
</html>