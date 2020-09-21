<?php
include "koneksi.php";

$userid = $_POST['userid'];
$berita = htmlspecialchars($_POST['berita']);

if(strlen($berita)>2){
    $masuk = mysql_query("INSERT INTO tabel_berita VALUES(null,$userid,NOW(),'$berita')");
        if($masuk){
        echo "berhasil";
    }else{
        echo "gagal";
    }
}else{
    echo "harus lebih dari 3 karakter";
}
?>
