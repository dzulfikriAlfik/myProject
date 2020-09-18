<?php
require_once '../_config/config.php';
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

$die = mysqli_error($con);

// jalankan fungsi tambah
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    $cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' ") or die(mysqli_error($con));
    if (mysqli_num_rows($cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas Pasien sudah terdapat di Database');window.location='add.php'</script>";
        exit();
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', '$identitas', '$nama', '$jk', '$alamat', '$no_telp')") or die($die);
        // jika berhasil redirect
        echo "<script>window.location='data.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    // jalankan fungsi edit
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    $cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' AND id_pasien != '$id' ") or die($die);

    if (mysqli_num_rows($cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas Pasien sudah terdapat di Database ! Tidak ada data yang diubah');window.location='edit.php?id=$id'</script>";
        exit();
    } else {
        $query = "UPDATE tb_pasien SET nomor_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jk', alamat = '$alamat', no_telp = '$no_telp' WHERE id_pasien = '$id' ";
        mysqli_query($con, $query) or die($die);
        // jika berhasil redirect
        echo "<script>window.location='data.php';</script>";
    }
} else if (isset($_POST['import'])) {
    // Script Upload File
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir . $file_name;
    move_uploaded_file($sumber, $target_file);

    // baca file import excel
    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    // memasukan hasil import excel kedalam database
    $sql = "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";
    for ($i = 3; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $no_id = $all_data[$i]['A'];
        $nama = $all_data[$i]['B'];
        $jk = $all_data[$i]['C'];
        $alamat = $all_data[$i]['D'];
        $telp = $all_data[$i]['E'];
        $sql .= " ('$uuid', '$no_id', '$nama', '$jk', '$alamat', '$telp'),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die($die);

    // unlink supaya ketika user import, file nya tidak bertambah terus (dihapus setelah dibaca)
    unlink($target_file);

    // redirect ketika berhasil import excel ke database
    echo "<script>window.location='data.php'</script>";
}
