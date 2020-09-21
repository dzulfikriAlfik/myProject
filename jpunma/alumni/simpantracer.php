<?php
session_start();
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	foreach ($_POST as $name => $val) {
		$$name = mysqli_real_escape_string($koneksi, $val);
		# code...
	}

		$sql = "INSERT INTO kuesioner(id_user, dp_nama, dp_npm, dp_jk, dp_jurusan, dp_tahunmasuk, dp_tahunlulus, dp_alamat, dp_kota, dp_provinsi, dp_kodepos, dp_tanggallahir, dp_kontak, dp_email, b1, b2, alasanb2, b3, alasanb3, b4, b5, b6, b7, b8, b9, b10, b11, b12, b13, c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, c13, c14, c15, c16, c17, c18, c19, c20, c21, c22, c23, c24, c25, c26, d1, d2, d4, d5, d6, d7, d8, d9, d10, d11, d12, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13, e14) 
			VALUES 
			('$_SESSION[id_user]', '$dp_nama', '$dp_npm', '$dp_jk', '$dp_jurusan', '$dp_tahunmasuk', '$dp_tahunlulus', '$dp_alamat', '$dp_kota', '$dp_provinsi', '$dp_kodepos', '$dp_tanggallahir', '$dp_kontak', '$dp_email', '$b1', '$b2', '$alasanb2', '$b3', '$alasanb3', '$b4', '$b5', '$b6', '$b7', '$b8', '$b9', '$b10', '$b11', '$b12', '$b13', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7', '$c8', '$c9', '$c10', '$c11', '$c12', '$c13', '$c14', '$c15', '$c16', '$c17', '$c18', '$c19', '$c20', '$c21', '$c22', '$c23', '$c24', '$c25', '$c26', '$d1', '$d2', '$d4', '$d5', '$d6', '$d7', '$d8', '$d9', '$d10', '$d11', '$d12', '$d14', '$d15', '$d16', '$d17', '$d18', '$d19', '$d20', '$d21', '$d22', '$d23', '$d24', '$d25', '$e2', '$e3', '$e4', '$e5', '$e6', '$e7', '$e8', '$e9', '$e10', '$e11', '$e12', '$e13', '$e14')";

	if($koneksi->query($sql)===TRUE) {
		$_SESSION['savetracerSuccess1'] = true;
		header("Location: index.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $koneksi->error;
	}

	$koneksi->close();

} else {
	header("Location: index.php");
	exit();
}