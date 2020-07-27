<?php 

session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: login_alumni.php");
  exit();
}

require_once("../db.php");

if(isset($_FILES)) {

  $uploadOk = true;

  $folder_dir = "../upload/foto/";

  $base = basename($_FILES['foto']['name']);

  $fotoFileType = pathinfo($base, PATHINFO_EXTENSION);  

  $file = uniqid() . "." . $fotoFileType;

  $filename = $folder_dir .$file;

  if(file_exists($_FILES['foto']['tmp_name']))  {

    if($fotoFileType == "jpg")  {  //tipe yg bisa diupload jpg

      if($_FILES['foto']['size'] < 500000)  {  // Max 5MB

        move_uploaded_file($_FILES["foto"]["tmp_name"], $filename);
      
      } else {
        $_SESSION['uploadError'] = "File terlalu besar. Maximal 5MB";
        $uploadOk = false;
      }
    } else {
      $_SESSION['uploadError'] = "Format Salah ! silahkan upload format jpg";
      $uploadOk = false;
    }
  } else {
      $_SESSION['uploadError'] = "Terjadi Error ! silahkan coba lagi";
      $uploadOk = false;
    }

    if($uploadOk == false) {
      header("Location: uploadfoto.php");
      exit();
    }

    $sql = "SELECT * FROM alumni WHERE id_user='$_SESSION[id_user]' ";
    $result = $koneksi->query($sql);
    if($result->num_rows > 0)  {
      $row = $result->fetch_assoc();
      if($row['foto'] != "") {
        unlink("../upload/foto/" .$row['foto']);
      }
    }

    $sql = "UPDATE alumni SET foto='$file' WHERE id_user='$_SESSION[id_user]' ";
    if($koneksi->query($sql)) {
      header("Location: index.php");
      exit();
    } else {
      echo "Error : " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}