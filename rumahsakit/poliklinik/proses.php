<?php
require_once '../_config/config.php';
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// jalankan fungsi tambah
if (isset($_POST['add'])) {

    $total = $_POST['total'];

    for ($i = 1; $i <= $total; $i++) {
        // Jalankan library package UUID
        $uuid = Uuid::uuid4()->toString();
        // definisi variable dari name
        $nama_poli = trim(mysqli_real_escape_string($con, $_POST['nama-' . $i]));
        $gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-' . $i]));
        // script sql
        $die = mysqli_error($con);
        $sql = mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli, gedung) VALUES ('$uuid', '$nama_poli', '$gedung')") or die($die);
    }

    // pengkondisian script sql
    if ($sql) {
        // jika berhasil redirect
        echo "<script>alert('" . $total . " data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('" . $total . " data gagal ditambahkan'); window.location='generate.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    // jalankan fungsi edit
    for ($i = 0; $i < count($_POST['id']); $i++) {
        // definisi variable dari name
        $id = $_POST['id'][$i];
        $nama_poli = $_POST['nama'][$i];
        $gedung = $_POST['gedung'][$i];;
        // script sql
        $die = mysqli_error($con);
        mysqli_query($con, "UPDATE tb_poliklinik SET nama_poli = '$nama_poli', gedung = '$gedung' WHERE id_poli = '$id' ") or die($die);
    }
    echo "<script>alert('Data berhasil diubah'); window.location='data.php';</script>";
}
