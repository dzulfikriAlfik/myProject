<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
<head>
<title>Menampilkan Data dengan PHP, MySQL dan DataTables</title>
<link rel="stylesheet" href="jquery/jquery.dataTables.css">
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
	width:550px;
	height: auto;
	padding: 10px;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);
	margin-top: 0;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
}
</style>
</head>
<body>
<div id="konten">
<table width="515" id="contoh">
	<thead>
		<tr>
			<th width="20" bgcolor="#CCCCCC">No</th>
		    <th width="61" bgcolor="#CCCCCC">No Daftar</th>
            <th width="56" bgcolor="#CCCCCC">NIK Pria</th>
            <th width="52" bgcolor="#CCCCCC">Nama Pria</th>
            <th width="62" bgcolor="#CCCCCC">NIK Wanita</th>
            <th width="60" bgcolor="#CCCCCC">Nama Wanita</th>
            <th width="81" bgcolor="#CCCCCC">Tanggal Daftar</th>
            <th width="87" bgcolor="#CCCCCC">Tanggal Nikah</th>
           		   
		</tr>
	</thead>

	<tbody>
	<?php
	$no = 1;
	$query = mysql_query("SELECT * FROM daftar ORDER BY nik_pria ASC");
	while($data = mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>$no";
		echo "<td>$data[no_daftar]</td>";
		echo "<td>$data[nik_pria]</td>";
		echo "<td>$data[nama_pria]</td>";
		echo "<td>$data[nik_wanita]</td>";
		echo "<td>$data[nama_wanita]</td>";
		echo "<td>$data[tgl_daftar]</td>";
		echo "<td>$data[tgl_nikah]</td>";
	
		echo "</tr>";
		$no++;
	}
	?>
	</tbody>
</table>
</div>

<script src="jquery/jquery-1.11.2.min.js"></script><!-- -->
<script src="jquery/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
</body>
</html>