<?php
session_start();
require_once("../db.php");

//If user clicked register button
if (isset($_POST)) {

	//Escape Special Characters In String First
	foreach ($_POST as $name => $value) {
		$$name = mysqli_real_escape_string($koneksi, $value);
	}

	if ($result->num_rows == 0) {

		$sql = "UPDATE kuesioner SET 
	dp_nama='$dp_nama',
	dp_npm='$dp_npm', 
	dp_jk='$dp_jk', 
	dp_jurusan='$dp_jurusan', 
	dp_tahunmasuk='$dp_tahunmasuk', 
	dp_tahunlulus='$dp_tahunlulus', 
	dp_alamat='$dp_alamat', 
	dp_kota='$dp_kota', 
	dp_provinsi='$dp_provinsi', 
	dp_kodepos='$dp_kodepos', 
	dp_tanggallahir='$dp_tanggallahir', 
	dp_kontak='$dp_kontak', 
	dp_email='$dp_email', 
	b1='$b1', 
	b2='$b2', 
	alasanb2='$alasanb2', 
	b3='$b3', 
	alasanb3='$alasanb3', 
	b4='$b4', 
	b5='$b5', 
	b6='$b6', 
	b7='$b7', 
	b8='$b8', 
	b9='$b9', 
	b10='$b10', 
	b11='$b11', 
	b12='$b12', 
	b13='$b13', 
	c1='$c1', 
	c2='$c2', 
	c3='$c3', 
	c4='$c4', 
	c5='$c5', 
	c6='$c6', 
	c7='$c7', 
	c8='$c8',
	c9='$c9', 
	c10='$c10', 
	c11='$c11', 
	c12='$c12', 
	c13='$c13', 
	c14='$c14', 
	c15='$c15', 
	c16='$c16', 
	c17='$c17', 
	c18='$c18', 
	c19='$c19', 
	c20='$c20', 
	c21='$c21', 
	c22='$c22', 
	c23='$c23', 
	c24='$c24', 
	c25='$c25', 
	c26='$c26',
	d1='$d1', 
	d2='$d2', 
	d4='$d4', 
	d5='$d5', 
	d6='$d6', 
	d7='$d7', 
	d8='$d8', 
	d9='$d9', 
	d10='$d10', 
	d11='$d11', 
	d12='$d12',  
	d14='$d14', 
	d15='$d15', 
	d16='$d16', 
	d17='$d17', 
	d18='$d18', 
	d19='$d19', 
	d20='$d20', 
	d21='$d21', 
	d22='$d22', 
	d23='$d23', 
	d24='$d24', 
	d25='$d25', 
	e2='$e2', 
	e3='$e3', 
	e4='$e4', 
	e5='$e5', 
	e6='$e6', 
	e7='$e7', 
	e8='$e8', 
	e9='$e9', 
	e10='$e10', 
	e11='$e11', 
	e12='$e12', 
	e13='$e13', 
	e14='$e14'
	WHERE id_user='$_SESSION[id_user]'
	";

		if ($koneksi->query($sql) === TRUE) {
			$_SESSION['savetracerSuccess1'] = true;
			header("Location: viewtracer.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $koneksi->error;
		}
	} else {
		$_SESSION['savetracerError1'] = true;
		header("Location: viewtracer.php");
		exit();
	}

	$koneksi->close();
} else {
	header("Location: index.php");
	exit();
}
