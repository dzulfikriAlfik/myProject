<?php
session_start();
if (empty($_SESSION['id_user'])) {
  header("Location: login_alumni.php");
  exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../css/images/unma.jpg" type="image/ico">

  <title>JP-Unma | Job Portal Universitas Majalengka </title>
  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/form-elements.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  <!-- bootstrap-daterangepicker -->
  <link href="../css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="../css/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <style>
    #ta {
      width: 850px;
      min-height: 100px;
      max-height: 100px;
      resize: none;
      overflow: auto;

    }

    #ta1 {
      width: 850px;
      min-height: 300px;
      max-height: 300px;
      resize: none;
      overflow: auto;

    }
  </style>
</head>

<body class="container-fluid">
  <div class="row well">
    <div class="container well" style="background-color: white">
      <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
        <form role="form" method="post" class="f1" action="simpantraceredit.php">

          <h1><b>Tracer Study Alumni Universitas Majalengka</b></h1>
          <p><b>Mohon untuk mengisi form ini dengan sebenar-benarnya</b></p>
          <div id="clear" style="display:block;height:50px;clear:both;"></div>
          <div class="f1-steps">
            <div class="f1-progress">
              <div class="f1-progress-line" data-now-value="100" data-number-of-steps="4" style="width: 16.66%;"></div>
            </div>
            <div class="f1-step active">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>Step 1 | Data Pribadi</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-university"></i></div>
              <p>Step 2 | Riwayat Pendidikan</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-briefcase"></i></div>
              <p>Step 3 | Riwayat Pekerjaan Terakhir/Sekarang</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-retweet"></i></div>
              <p>Step 4 | Relevansi Pendidikan Dengan Pekerjaan</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-tags"></i></div>
              <p>Step 5 | Penguasaan Kompetensi</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-check-square-o"></i></div>
              <p>Final Step | Komptetensi Diperlukan dan Saran untuk Universitas</p>
            </div>
          </div>

          <div id="clear" style="display:block;height:50px;clear:both;"></div>
          <?php

          $sql = "SELECT * FROM kuesioner WHERE id_label='$_GET[id]' AND id_user='$_SESSION[id_user]'";
          $result = $koneksi->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>

              <!-- ------------------------------------------------------SETUP PRIBADI------------------------------------------------------------------->
              <!-- Setup Data Pribadi-->
              <fieldset>
                <!-- nama -->
                <div class="form-group">
                  <label for="dp_nama"><b>1. Nama Lengkap</b></label>
                  <input type="text" name="dp_nama" placeholder="Nama Lengkap" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['nama']; ?>" readonly="readonly">
                </div>
                <!-- tanggalahir -->
                <div class="form-group">
                  <label for="dp_tanggallahir"><b>2. Tanggal Lahir</b></label>
                  <div class='input-group date' id='myDatepicker3'>
                    <input type="text" name="dp_tanggallahir" placeholder="Tanggal Lahir" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $_SESSION['tanggallahir']; ?>" readonly="readonly">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- npm -->
                <div class="form-group">
                  <label for="dp_npm"><b>3. NPM</b></label>
                  <input type="text" name="dp_npm" placeholder="NPM" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['npm']; ?>" readonly="readonly">
                </div>
                <!-- jenis kelamin -->
                <div class="form-group" required="required">
                  <label for="dp_jk"><b>4. Jenis Kelamin</b></label>
                  <p>
                    <input type="radio" class="flat" name="dp_jk" id="dp_jk" value="Laki-laki" <?php if ($row['dp_jk'] == 'Laki-laki') { echo 'checked'; } ?>>&nbsp;Laki-laki
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" class="flat" name="dp_jk" id="dp_jk" value="Perempuan" <?php if ($row['dp_jk'] == 'Perempuan') {echo 'checked'; } ?>>&nbsp;Perempuan
                  </p>
                </div>
                <!-- jurusan -->
                <div class="form-group">
                  <label for="dp_jurusan"><b>5. Program Studi</b></label>
                  <select type="option" name="dp_jurusan" class="form-control" id="f1-first-name" placeholder="<?php echo $row['dp_jurusan']; ?>">
                    <option>
                      <?php if ($row['dp_jurusan'] == 'Ilmu Administrasi Negara') {
                            echo 'Ilmu Administrasi Negara';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Ilmu Komunikasi') {
                            echo 'Ilmu Komunikasi';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Hubungan Internasional') {
                            echo 'Hubungan Internasional';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Bahasa dan Sastra Indonesia') {
                            echo 'Pendidikan Bahasa dan Sastra Indonesia';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Jasmani, Kesehatan dan Rekreasi') {
                            echo 'Pendidikan Jasmani, Kesehatan dan Rekreasi';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Bahasa Inggris') {
                            echo 'Pendidikan Bahasa Inggris';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Manajemen') {
                            echo 'Manajemen';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Akuntansi') {
                            echo 'Akuntansi';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Agroteknologi') {
                            echo 'Agroteknologi';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Agribisnis') {
                            echo 'Agribisnis';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Peternakan') {
                            echo 'Peternakan';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Agama Islam') {
                            echo 'Pendidikan Agama Islam';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Hukum Ekonomi Syariah') {
                            echo 'Hukum Ekonomi Syariah';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Guru Raudlatul Athfal') {
                            echo 'Pendidikan Guru Raudlatul Athfal';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Informatika') {
                            echo 'Informatika';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Teknik Sipil') {
                            echo 'Teknik Sipil';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Teknik Mesin') {
                            echo 'Teknik Mesin';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Teknik Industri') {
                            echo 'Teknik Industri';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Ilmu Hukum') {
                            echo 'Ilmu Hukum';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Guru Sekolah Dasar') {
                            echo 'Pendidikan Guru Sekolah Dasar';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Matematika') {
                            echo 'Pendidikan Matematika';
                          } ?>
                      <?php if ($row['dp_jurusan'] == 'Pendidikan Biologi') {
                            echo 'Pendidikan Biologi';
                          } ?>
                    </option>
                    <!-- FISIP -->
                    <optgroup label="Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)">
                      <option name="dp_jurusan" value="Ilmu Administrasi Negara">Ilmu Administrasi Negara</option>
                      <option name="dp_jurusan" value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                      <option name="dp_jurusan" value="Hubungan Internasional">Hubungan Internasional</option>
                    </optgroup>
                    <!-- FKIP -->
                    <optgroup label="Fakultas Keguruan dan Ilmu Pendidikan (FKIP)">
                      <option name="dp_jurusan" value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                      <option name="dp_jurusan" value="Pendidikan Jasmani, Kesehatan dan Rekreasi">Pendidikan Jasmani, Kesehatan dan Rekreasi</option>
                      <option name="dp_jurusan" value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                    </optgroup>
                    <!-- FEKON -->
                    <optgroup label="Fakultas Ekonomi (FEKON)">
                      <option name="dp_jurusan" value="Manajemen">Manajemen</option>
                      <option name="dp_jurusan" value="Akuntansi">Akuntansi</option>
                    </optgroup>
                    <!-- FAPERTA -->
                    <optgroup label="Fakultas Pertanian (FAPERTA)">
                      <option name="dp_jurusan" value="Agroteknologi">Agroteknologi</option>
                      <option name="dp_jurusan" value="Agribisnis">Agribisnis</option>
                      <option name="dp_jurusan" value="Peternakan">Peternakan</option>
                    </optgroup>
                    <!-- FAI -->
                    <optgroup label="Fakultas Agama Islam (FAI)">
                      <option name="dp_jurusan" value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                      <option name="dp_jurusan" value="Hukum Ekonomi Syari'ah">Hukum Ekonomi Syari'ah</option>
                      <option name="dp_jurusan" value="Pendidikan Guru Raudlatul Athfal">Pendidikan Guru Raudlatul Athfal</option>
                    </optgroup>
                    <!-- FT -->
                    <optgroup label="Fakultas Teknik (FT)">
                      <option name="dp_jurusan" value="Informatika">Informatika</option>
                      <option name="dp_jurusan" value="Teknik Sipil">Teknik Sipil</option>
                      <option name="dp_jurusan" value="Teknik Mesin">Teknik Mesin</option>
                      <option name="dp_jurusan" value="Teknik Industri">Teknik Industri</option>
                    </optgroup>
                    <!-- FH -->
                    <optgroup label="Fakultas Hukum (FH)">
                      <option name="dp_jurusan" value="Ilmu Hukum">Ilmu Hukum</option>
                    </optgroup>
                    <!-- FAPENDAS -->
                    <optgroup label="Fakultas Pendidikan Dasar dan Menengah (FAPENDASMEN)">
                      <option name="dp_jurusan" value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                      <option name="dp_jurusan" value="Pendidikan Matematika">Pendidikan Matematika</option>
                      <option name="dp_jurusan" value="Pendidikan Biologi">Pendidikan Biologi</option>
                    </optgroup>
                  </select>
                </div>
                <!-- tahun masuk -->
                <div class="form-group">
                  <label for="dp_tahunmasuk"><b>6. Tahun Masuk</b></label>
                  <div class='input-group date' id='myDatepicker'>
                    <input type="text" name="dp_tahunmasuk" placeholder="Tahun Masuk" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['dp_tahunmasuk']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- tahun lulus -->
                <div class="form-group">
                  <label for="dp_tahunlulus"><b>7. Tahun Lulus</b></label>
                  <div class='input-group date' id='myDatepicker2'>
                    <input type="text" name="dp_tahunlulus" placeholder="Tahun Lulus" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['dp_tahunlulus']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- alamat -->
                <div class="form-group">
                  <label for="dp_alamat"><b>8. Alamat</b></label>
                  <textarea id="ta" name="dp_alamat" class="f1-about-yourself form-control" placeholder="Alamat" readonly="readonly"><?php echo $_SESSION['alamat']; ?></textarea>
                </div>
                <!-- kota -->
                <div class="form-group">
                  <label for="dp_kota"><b>9. Kota</b></label>
                  <input type="text" name="dp_kota" placeholder="Kota" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['kota']; ?>" readonly="readonly">
                </div>
                <!-- provinsi -->
                <div class="form-group">
                  <label for="dp_provinsi"><b>10. Provinsi</b></label>
                  <input type="text" name="dp_provinsi" placeholder="Provinsi" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['provinsi']; ?>" readonly="readonly">
                </div>
                <!-- kodepos -->
                <div class="form-group">
                  <label for="dp_kodepos"><b>11. Kode Pos</b></label>
                  <input type="text" name="dp_kodepos" placeholder="Kode Pos" class="form-control" id="f1-first-name" value="<?php echo $row['dp_kodepos']; ?>">
                </div>
                <!-- kontak -->
                <div class="form-group">
                  <label for="dp_kontak"><b>12. Nomor Telepon</b></label>
                  <input type="text" name="dp_kontak" placeholder="Nomor Telepon" class="form-control" id="f1-first-name" value="<?php echo $row['dp_kontak']; ?>">
                </div>
                <!-- email -->
                <div class="form-group">
                  <label for="dp_email"><b>13. Email</b></label>
                  <input type="text" name="dp_email" placeholder="Email" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['email']; ?>" readonly="readonly">
                </div>
                <div class="f1-buttons">
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>

              <!------------------------------------------------------------- RIWAYAT PENDIDIKAN --------------------------------------------------------->
              <!-- Setup Riwayat Pendidikan -->
              <fieldset>
                <!-- pada saat masuk univ -->
                <div class="form-group">
                  <label for="b1"><b>1. Pada saat masuk Universitas Majalengka, prodi yang Anda pilih merupakan pilihan ke ?</b></label>
                  <br><input type="radio" name="b1" class="myForm" id="b1" value="Satu" <?php if ($row['b1'] == 'Satu') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Satu
                  <br><input type="radio" name="b1" class="myForm" id="b1" value="Dua" <?php if ($row['b1'] == 'Dua') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Dua
                  <br><input type="radio" name="b1" class="myForm" id="b1" value="Tiga" <?php if ($row['b1'] == 'Tiga') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Tiga
                </div>
                <!-- apakah berorganisasi -->
                <div class="form-group">
                  <label for="b2"><b>2. Apakah anda berorganisasi ketika masih aktif menjadi mahasiswa ? </b></label>
                  <br><input type="radio" name="b2" class="myForm" id="b2" value="Ya" <?php if ($row['b2'] == 'Ya') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Ya
                  <br><input type="radio" name="b2" class="myForm" id="b2" value="Tidak" <?php if ($row['b2'] == 'Tidak') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Tidak, Karena
                  <br><textarea name="alasanb2" id="ta1" placeholder="Jelaskan alasannya disini"><?php echo $row['alasanb2']; ?></textarea>
                </div>
                <!-- apakah melanjutkan pendidikan -->
                <div class="form-group">
                  <label for="b3"><b>3. Setelah lulus sarjana dari Universitas Majalengka, apakah anda melanjutkan pendidikan ?</b></label>
                  <br><input type="radio" name="b3" class="myForm" id="b3" value="Ya" <?php if ($row['b3'] == 'Ya') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Ya
                  <br><input type="radio" name="b3" class="myForm" id="b3" value="Tidak" <?php if ($row['b3'] == 'Tidak') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Tidak, Karena
                  <br><textarea id="ta1" name="alasanb3" class="myForm" id="b3" placeholder="Jelaskan alasannya disini"><?php echo $row['alasanb3']; ?></textarea>
                </div>
                <!-- dimana menlanjutkan -->
                <div class="form-group">
                  <label for="b4"><b>4. Dimana anda melanjutkan pendidikan ?</b></label>
                  <input id="f1-first-name" class="form-control" name="b4" value="<?php echo $row['b4']; ?>"></input>
                </div>
                <!-- apa alasan maelanjutkan -->
                <div class="form-group">
                  <label for="b5"><b>5. Apa alasan utama anda melanjutkan pendidikan ? </b></label>
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Mengisi kekosongan menganggur" <?php if ($row['b5'] == 'Mengisi kekosongan menganggur') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Mengisi kekosongan menganggur
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Perlu untuk bekerja " <?php if ($row['b5'] == 'Perlu untuk bekerja') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Perlu untuk bekerja
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Merasa ilmu yang dimiliki masih kurang" <?php if ($row['b5'] == 'Merasa ilmu yang dimiliki masih kurang') {
                                                                                                                                echo 'checked';
                                                                                                                              } ?>>&nbsp;Merasa ilmu yang dimiliki masih kurang
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Ada Kesempatan " <?php if ($row['b5'] == 'Ada Kesempatan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Ada Kesempatan
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Sebagai syarat dalam pekerjaan (di tempat kerja)" <?php if ($row['b5'] == 'Sebagai syarat dalam pekerjaan (di tempat kerja)') {
                                                                                                                                          echo 'checked';
                                                                                                                                        } ?>>&nbsp;Sebagai syarat dalam pekerjaan (di tempat kerja)
                  <br><input type="radio" name="b5" class="myForm" id="b5" value="Kurang yakin bila hanya di bidang ini saja" <?php if ($row['b5'] == 'Kurang yakin bila hanya di bidang ini saja') {
                                                                                                                                    echo 'checked';
                                                                                                                                  } ?>>&nbsp;Kurang yakin bila hanya di bidang ini saja
                </div>
                <!-- dimana anda ingin bekerja -->
                <div class="form-group">
                  <label for="b6"><b>6. Pada saat baru lulus, dimana anda ingin bekerja ?</b></label>
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Pemerintah (pusat/departemen) " <?php if ($row['b6'] == 'Pemerintah (pusat/departemen)') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Pemerintah (pusat/departemen)
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Pemerintah (daerah) " <?php if ($row['b6'] == 'Pemerintah (daerah)') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Pemerintah (daerah)
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Pemerintah (BUMN, BHMN)" <?php if ($row['b6'] == 'Pemerintah (BUMN, BHMN)') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Pemerintah (BUMN, BHMN)
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Swasta (Jasa) " <?php if ($row['b6'] == 'Swasta (Jasa)') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Swasta (Jasa)
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Swasta (Manufaktur) " <?php if ($row['b6'] == 'Swasta (Manufaktur)') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Swasta (Manufaktur)
                  <br><input type="radio" name="b6" class="myForm" id="b6" value="Wiraswasta" <?php if ($row['b6'] == 'Wiraswasta') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Wiraswasta
                </div>
                <!-- B7 | Pada saat baru lulus, apakah saudara bersedia bekerja/ditempatkan di daerah-->
                <div class="form-group">
                  <label for="b7"><b>7. Pada saat baru lulus, apakah anda bersedia bekerja/ditempatkan di daerah ? </b></label>
                  <br><input type="radio" name="b7" class="myForm" id="b7" value="Ya" <?php if ($row['b7'] == 'Ya') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Ya
                  <br><input type="radio" name="b7" class="myForm" id="b7" value="Tidak" <?php if ($row['b7'] == 'Tidak') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Tidak
                </div>
                <!-- B8 | Pada saat baru lulus, apakah saudara mengetahui cara/prosedur melamar pekerjaan ?  -->
                <div class="form-group">
                  <label for="b8"><b>8. Pada saat baru lulus, apakah anda mengetahui cara/prosedur melamar pekerjaan ? </b></label>
                  <br><input type="radio" name="b8" class="myForm" id="b8" value="Ya" <?php if ($row['b8'] == 'Ya') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Ya
                  <br><input type="radio" name="b8" class="myForm" id="b8" value="Tidak" <?php if ($row['b8'] == 'Tidak') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Tidak
                </div>
                <!-- BB9 | Menurut saudara, kapa seharusnya cara/prosedur melamar pekerjaan harus mulai diketahui ?    -->
                <div class="form-group">
                  <label for="b9"><b>9. Menurut anda, kapan seharusnya cara/prosedur melamar pekerjaan harus mulai diketahui ? </b></label>
                  <br><input type="radio" name="b9" class="myForm" id="b9" value="Sejak tahun Pertama Perkuliahan " <?php if ($row['b9'] == 'Sejak tahun Pertama Perkuliahan') {
                                                                                                                          echo 'checked';
                                                                                                                        } ?>>&nbsp;Sejak tahun pertama perkuliahan
                  <br><input type="radio" name="b9" class="myForm" id="b9" value="Di tahun kedua perkuliahan" <?php if ($row['b9'] == 'Di tahun kedua perkuliahan') {
                                                                                                                    echo 'checked';
                                                                                                                  } ?>>&nbsp;Di tahun kedua perkuliahan
                  <br><input type="radio" name="b9" class="myForm" id="b9" value="Di tahun ketiga perkuliahan" <?php if ($row['b9'] == 'Di tahun ketiga perkuliahan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp;Di tahun ketiga perkuliahan
                  <br><input type="radio" name="b9" class="myForm" id="b9" value="Di tahun akhir Perkuliahan" <?php if ($row['b9'] == 'Di tahun akhir Perkuliahan') {
                                                                                                                    echo 'checked';
                                                                                                                  } ?>>&nbsp;Di tahun akhir perkuliahan
                  <br><input type="radio" name="b9" class="myForm" id="b9" value="Setelah lulus" <?php if ($row['b9'] == 'Setelah lulus') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Setelah lulus
                </div>
                <!-- B10 | Pada saat baru lulus, apakah saudara mengetahui cara membuat CV untuk melamar pekerjaan ?-->
                <div class="form-group">
                  <label for="b10"><b>10. Pada saat baru lulus, apakah saudara mengetahui cara membuat CV untuk melamar pekerjaan ?</b></label>
                  <br><input type="radio" name="b10" class="myForm" id="b10" value="Ya" <?php if ($row['b10'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="b10" class="myForm" id="b10" value="Tidak" <?php if ($row['b10'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>
                <!-- B11 | Menurut saudara, kapan seharusnya cara membuat CV harus mulai diketahui  ?    -->
                <div class="form-group">
                  <label for="b11"><b>11. Menurut anda, kapan seharusnya cara membuat CV harus mulai diketahui ?</b></label>
                  <br><input type="radio" name="b11" class="myForm" id="b11" value="Sejak tahun Pertama Perkuliahan " <?php if ($row['b11'] == 'Sejak tahun Pertama Perkuliahan') {
                                                                                                                            echo 'checked';
                                                                                                                          } ?>>&nbsp;Sejak tahun pertama perkuliahan
                  <br><input type="radio" name="b11" class="myForm" id="b11" value="Di tahun kedua perkuliahan" <?php if ($row['b11'] == 'Di tahun kedua perkuliahan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp;Di tahun kedua perkuliahan
                  <br><input type="radio" name="b11" class="myForm" id="b11" value="Di tahun ketiga perkuliahan" <?php if ($row['b11'] == 'Di tahun ketiga perkuliahan') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Di tahun ketiga perkuliahan
                  <br><input type="radio" name="b11" class="myForm" id="b11" value="Di tahun akhir Perkuliahan" <?php if ($row['b11'] == 'Di tahun akhir Perkuliahan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp;Di tahun akhir perkuliahan
                  <br><input type="radio" name="b11" class="myForm" id="b11" value="Setelah lulus" <?php if ($row['b11'] == 'Setelah lulus') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Setelah lulus
                </div>
                <!-- B12 | Berapa IPK terakhir saudara ?  -->
                <div class="form-group">
                  <label for="b12"><b>12. Berapa IPK terakhir anda ?</b></label>
                  <input type="text" name="b12" id="b12" class="form-control" id="f1-first-name" value="<?php echo $row['b12']; ?>">
                </div>
                <!-- B13 | Setelah lulus, apakah saudara sudah/pernah bekerja ?  -->
                <div class="form-group">
                  <label for="b13"><b>13. Setelah lulus, apakah anda sudah/pernah bekerja ?</b></label>
                  <br><input type="radio" name="b13" class="myForm" id="b13" checked="" value="Ya" <?php if ($row['b13'] == 'Ya') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Ya
                  <br><input type="radio" name="b13" class="myForm" id="b13" checked="" value="Tidak" <?php if ($row['b13'] == 'Tidak') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak
                </div>

                <!-- button -->
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">Previous</button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>

              <!-------------------------------------------------------------- RIWAYAT PEKERJAAN --------------------------------------------------------->
              <!-- C | Riwayat Pekerjaan Terakhir/Sekarang -->
              <fieldset>
                <!-- C1 | Nama tempat bekerja  -->
                <div class="form-group">
                  <label for="c1"><b>1. Dimana tempat anda bekerja sekarang ?</b></label>
                  <input type="text" name="c1" id="c1" class="form-control" id="f1-first-name" value="<?php echo $row['c1']; ?>">
                </div>
                <!-- C2 | Jenis instansi/bidang usaha/industri   -->
                <div class="form-group">
                  <label for="c2"><b>2. Jenis instansi/bidang usaha/industri</b></label>
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Pemerintah (pusat/departemen)" <?php if ($row['c2'] == 'Pemerintah (pusat/departemen)') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Pemerintah (pusat/departemen)
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Pemerintah (daerah)" <?php if ($row['c2'] == 'Pemerintah (daerah)') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Pemerintah (daerah)
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Pemerintah (BUMN, BHMN)" <?php if ($row['c2'] == 'Pemerintah (BUMN, BHMN)') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Pemerintah (BUMN, BHMN)
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Swasta (Jasa)" <?php if ($row['c2'] == 'Swasta (Jasa)') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Swasta (Jasa)
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Swasta (Manufaktur)" <?php if ($row['c2'] == 'Swasta (Manufaktur)') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Swasta (Manufaktur)
                  <br><input type="radio" name="c2" class="myForm" id="c2" value="Wiraswasta" <?php if ($row['c2'] == 'Wiraswasta') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Wiraswasta
                </div>
                <!-- C3 | Jabatan/posisi dalam pekerjaan  -->
                <div class="form-group">
                  <label for="c3"><b>3. Jabatan/posisi dalam pekerjaan</b></label>
                  <input type="text" name="c3" id="c3" class="form-control" id="f1-first-name" value="<?php echo $row['c3']; ?>">
                </div>
                <!-- C4 | Bulan dan tahun mulai bekerja -->
                <div class="form-group">
                  <label for="c4"><b>4. Bulan dan tahun mulai bekerja</b></label>
                  <div class='input-group date' id='myDatepicker4'>
                    <input type="text" name="c4" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['c4']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- C5 | Bulan dan tahun berhenti bekerja  -->
                <div class="form-group">
                  <label for="c5"><b>5. Bulan dan tahun berhenti bekerja</b></label>
                  <div class='input-group date' id='myDatepicker5'>
                    <input type="text" name="c5" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['c5']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- Bagaimana proses saudara mendapatkan informasi mengenai adanya pekerjaan ini ?    -->
                <div class="form-group">
                  <label for="c6"><b>6. Bagaimana proses anda mendapatkan informasi mengenai adanya pekerjaan ini ?</b></label>
                  <br><input type="radio" name="c6" class="myForm" id="c6" value="Aktif (mencari)" <?php if ($row['c6'] == 'Aktif (mencari)') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Aktif (mencari)
                  <br><input type="radio" name="c6" class="myForm" id="c6" value="Pasif" <?php if ($row['c6'] == 'Pasif') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Pasif
                </div>
                <!-- Darimana saudara mengetahui atau mendapatkan informasi mengenai adanya pekerjaan ini ?  -->
                <div class="form-group">
                  <label for="c7"><b>7. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan ini ?</b></label>
                  <br><input type="radio" name="c7" class="myForm" id="c7" value="Iklan" <?php if ($row['c7'] == 'Iklan') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Iklan
                  <br><input type="radio" name="c7" class="myForm" id="c7" value="Internet" <?php if ($row['c7'] == 'Internet') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Internet
                  <br><input type="radio" name="c7" class="myForm" id="c7" value="Pengumuman di kampus" <?php if ($row['c7'] == 'Pengumuman di kampus') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Pengumuman di kampus
                  <br><input type="radio" name="c7" class="myForm" id="c7" value="Koneksi (teman,dosen,saudara/keluarga, dll)" <?php if ($row['c7'] == 'Koneksi (teman,dosen,saudara/keluarga, dll') {
                                                                                                                                      echo 'checked';
                                                                                                                                    } ?>>&nbsp;Koneksi (teman,dosen,saudara/keluarga, dll)
                  <br><input type="radio" name="c7" class="myForm" id="c7" value="Info lowongan kemahasiswaan" <?php if ($row['c7'] == 'Info lowongan kemahasiswaan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp;Info lowongan kemahasiswaan
                </div>
                <!-- Sejauh mana pekerjaan saudara yang terakhir sesuai dengan harapan ketika pertama kali belajar di FT-UNMA ?    -->
                <div class="form-group">
                  <label for="c8"><b>8. Sejauh mana pekerjaan anda yang terakhir sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka ?</b></label>
                  <br><input type="radio" name="c8" class="myForm" id="c8" value="Sangat sesuai dengan harapan" <?php if ($row['c8'] == 'Sangat sesuai dengan harapan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp;Sangat sesuai dengan harapan
                  <br><input type="radio" name="c8" class="myForm" id="c8" value="Sesuai harapan" <?php if ($row['c8'] == 'Sesuai harapan') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sesuai harapan
                  <br><input type="radio" name="c8" class="myForm" id="c8" value="Kurang sesuai harapan" <?php if ($row['c8'] == 'Kurang sesuai harapan') {
                                                                                                                echo 'checked';
                                                                                                              } ?>>&nbsp;Kurang sesuai harapan
                  <br><input type="radio" name="c8" class="myForm" id="c8" value="Tidak Sesuai harapan" <?php if ($row['c8'] == 'Tidak Sesuai harapan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Tidak Sesuai harapan
                </div>
                <!-- Apakah saudara puas dengan pekerjaan saudara yang terakhir/sekarang ?     -->
                <div class="form-group">
                  <label for="c9"><b>9. Apakah anda puas dengan pekerjaan anda yang terakhir/sekarang ?</b></label>
                  <br><input type="radio" name="c9" class="myForm" id="c9" value="Sangat puas" <?php if ($row['c9'] == 'Sangat puas') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Sangat puas
                  <br><input type="radio" name="c9" class="myForm" id="c9" value="Puas" <?php if ($row['c9'] == 'Puas') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Puas
                  <br><input type="radio" name="c9" class="myForm" id="c9" value="Kurang puas" <?php if ($row['c9'] == 'Kurang puas') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Kurang puas
                  <br><input type="radio" name="c9" class="myForm" id="c9" value="Tidak puas" <?php if ($row['c9'] == 'Tidak puas') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Tidak puas
                </div>
                <!-- Secara umum, apa pertimbangan utama saudara memilih pekerjaan yang terakhir/sekarang ?     -->
                <div class="form-group">
                  <label for="c10"><b>10. Secara umum, apa pertimbangan utama anda memilih pekerjaan yang terakhir/sekarang ?</b></label>
                  <br><input type="radio" name="c10" class="myForm" id="c10" value="Gaji memadai" <?php if ($row['c10'] == 'Gaji memadai') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Gaji memadai
                  <br><input type="radio" name="c10" class="myForm" id="c10" value="Sesuai bidang keilmuan" <?php if ($row['c10'] == 'Sesuai bidang keilmuan') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Sesuai bidang keilmuan
                  <br><input type="radio" name="c10" class="myForm" id="c10" value="Mendapatkan pengalaman" <?php if ($row['c10'] == 'Mendapatkan pengalaman') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Mendapatkan pengalaman
                  <br><input type="radio" name="c10" class="myForm" id="c10" value="Mendapatkan ilmu pengetahuan" <?php if ($row['c10'] == 'Mendapatkan ilmu pengetahuan') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Mendapatkan ilmu pengetahuan
                  <br><input type="radio" name="c10" class="myForm" id="c10" value=" Mendapatkan keterampilan" <?php if ($row['c10'] == 'Mendapatkan keterampilan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp; Mendapatkan keterampilan
                </div>
                <!-- Berapa rata-rata pendapatan (take home pay=seluruh pendapatan per bulan termasuk bonus,insentif,dsb.)saudara pada pekerjaan terakhir/sekarang ?     -->
                <div class="form-group">
                  <label for="c11"><b>11. Berapa rata-rata pendapatan (take home pay=seluruh pendapatan per bulan termasuk bonus,insentif,dsb.) anda pada pekerjaan terakhir/sekarang ?</b></label>
                  <select class="form-control" name="c11" id="f1-first-name">
                    <option>
                      <?php if ($row['c11'] == 'Kurang dari Rp. 1.000.000') {
                            echo 'Kurang dari Rp. 1.000.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 1.000.000 - Rp. 3000.000') {
                            echo 'Lebih dari Rp. 1.000.000 - Rp. 3000.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 3.000.000 - Rp. 5.000.000') {
                            echo 'Lebih dari Rp. 3.000.000 - Rp. 5.000.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 5.000.000 - Rp. 7.500.000') {
                            echo 'Lebih dari Rp. 5.000.000 - Rp. 7.500.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 7.500.000 - Rp. 10.000.000') {
                            echo 'Lebih dari Rp. 7.500.000 - Rp. 10.000.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 10.000.000 - Rp. 12.500.000') {
                            echo 'Lebih dari Rp. 10.000.000 - Rp. 12.500.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 12.500.000 - Rp. 15.000.000') {
                            echo 'Lebih dari Rp. 12.500.000 - Rp. 15.000.000';
                          } ?>
                      <?php if ($row['c11'] == 'Lebih dari Rp. 15.000.000') {
                            echo 'Lebih dari Rp. 15.000.000';
                          } ?>
                    </option>
                    <option name="c11" id="c11" value="Kurang dari Rp. 1.000.000">Kurang dari Rp. 1.000.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 1.000.000 - Rp. 3.000.000">Lebih dari Rp. 1.000.000 - Rp. 3.000.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 3.000.000 - Rp. 5.000.000">Lebih dari Rp. 3.000.000 - Rp. 5.000.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 5.000.000 - Rp. 7.500.000">Lebih dari Rp. 5.000.000 - Rp. 7.500.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 7.500.000 - Rp. 10.000.000">Lebih dari Rp. 7.500.000 - Rp. 10.000.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 10.000.000 - Rp. 12.500.000">Lebih dari Rp. 10.000.000 - Rp. 12.500.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 12.500.000 - Rp. 15.000.000">Lebih dari Rp. 12.500.000 - Rp. 15.000.000</option>
                    <option name="c11" id="c11" value="Lebih dari Rp. 15.000.000">Lebih dari Rp. 15.000.000</option>
                  </select>
                </div>
                <!--  Apakah pekerjaan saudara ini berhubungan dengan ilmu yang saudara pelajari ?   -->
                <div class="form-group">
                  <label for="c12"><b>12. Apakah pekerjaan anda ini berhubungan dengan ilmu yang anda pelajari ?</b></label>
                  <br><input type="radio" name="c12" class="myForm" id="c12" value="Ya" <?php if ($row['c12'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="c12" class="myForm" id="c12" value="Tidak" <?php if ($row['c12'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>
                <!--  Menurut saudara, bagaimana kebutuhan institusi tempat saudara bekerja terhadap lulusan dari program studi/jurusan saudara     -->
                <div class="form-group">
                  <label for="c13"><b>13. Menurut anda, bagaimana kebutuhan institusi tempat anda bekerja terhadap lulusan dari program studi/jurusan anda</b></label>
                  <br><input type="radio" name="c13" class="myForm" id="c13" value="Sangat Tinggi" <?php if ($row['c13'] == 'Sangat Tinggi') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Sangat Tinggi
                  <br><input type="radio" name="c13" class="myForm" id="c13" value="Tinggi" <?php if ($row['c13'] == 'Tinggi') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tinggi
                  <br><input type="radio" name="c13" class="myForm" id="c13" value="Rendah" <?php if ($row['c13'] == 'Rendah') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Rendah
                  <br><input type="radio" name="c13" class="myForm" id="c13" value="Sangat Rendah" <?php if ($row['c13'] == 'Sangat Rendah') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Sangat Rendah
                </div>
                <!--  Sebelumnya, apakah saudara pernah bekerja di tempat lain ?     -->
                <div class="form-group">
                  <label for="c14"><b>14. Sebelumnya, apakah anda pernah bekerja di tempat lain ?</b></label>
                  <br><input type="radio" name="c14" class="myForm" id="c14" value="Ya" <?php if ($row['c14'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="c14" class="myForm" id="c14" value="Tidak" <?php if ($row['c14'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>
                <!--  Sudah berapa kali saudara berganti pekerjaan ?   -->
                <div class="form-group">
                  <label for="c15"><b>15. Sudah berapa kali anda berganti pekerjaan ?</b></label>
                  <br><input type="radio" name="c15" class="myForm" id="c15" value="Satu Kali" <?php if ($row['c15'] == 'Satu Kali') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Satu Kali
                  <br><input type="radio" name="c15" class="myForm" id="c15" value="Dua Kali" <?php if ($row['c15'] == 'Dua Kali') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Dua Kali
                  <br><input type="radio" name="c15" class="myForm" id="c15" value="Tiga Kali" <?php if ($row['c15'] == 'Tiga Kali') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Tiga Kali
                  <br><input type="radio" name="c15" class="myForm" id="c15" value="Lebih dari tiga kali" <?php if ($row['c15'] == 'Lebih dari tiga kali') {
                                                                                                                echo 'checked';
                                                                                                              } ?>>&nbsp;Lebih dari tiga kali
                </div>
                <!--  apakah saudara masih ingin berpindah kerja ?     -->
                <div class="form-group">
                  <label for="c16"><b>16. apakah anda masih ingin berpindah kerja ?</b></label>
                  <br><input type="radio" name="c16" class="myForm" id="c16" value="Ya" <?php if ($row['c16'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="c16" class="myForm" id="c16" value="Tidak" <?php if ($row['c16'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>
                <!-- Nama tempat bekerja pertama kali -->
                <div class="form-group">
                  <label for="c17"><b>17. Nama tempat bekerja pertama kali</b></label>
                  <input type="text" name="c17" id="c17" class="form-control" id="f1-first-name" value="<?php echo $row['c17']; ?>">
                </div>
                <!-- Jabatan/posisi terakhir dalam pekerjaan pertama    -->
                <div class="form-group">
                  <label for="c18"><b>18. Jabatan/posisi dalam pekerjaan pertama</b></label>
                  <input type="text" name="c18" id="c18" class="form-control" id="f1-first-name" value="<?php echo $row['c18']; ?>">
                </div>
                <!-- C3 | Bulan dan tahun mulai bekerja    -->
                <div class="form-group">
                  <label for="c19"><b>19. Bulan dan tahun mulai bekerja</b></label>
                  <div class='input-group date' id='myDatepicker6'>
                    <input type="text" name="c19" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['c19']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!-- Bulan dan tahun berhenti bekerja -->
                <div class="form-group">
                  <label for="c20"><b>20. Bulan dan tahun berhenti bekerja</b></label>
                  <div class='input-group date' id='myDatepicker7'>
                    <input type="text" name="c20" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $row['c20']; ?>">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                <!--  Bagaimana proses saudara mendapatkan pekerjaan pertama ini ?       -->
                <div class="form-group">
                  <label for="c21"><b>21. Bagaimana proses anda mendapatkan pekerjaan pertama ini ?</b></label>
                  <br><input type="radio" name="c21" class="myForm" id="c21" value="Aktif (mencari)" <?php if ($row['c21'] == 'Aktif (mencari)') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Aktif (mencari)
                  <br><input type="radio" name="c21" class="myForm" id="c21" value="Pasif" <?php if ($row['c21'] == 'Pasif') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Pasif
                </div>
                <!-- Darimana saudara mengetahui atau mendapatkan informasi mengenai adanya pekerjaan pertama ini ?  -->
                <div class="form-group">
                  <label for="c22"><b>22. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan pertama ini ?</b></label>
                  <br><input type="radio" name="c22" class="myForm" id="c22" value="Iklan" <?php if ($row['c22'] == 'Iklan') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Iklan
                  <br><input type="radio" name="c22" class="myForm" id="c22" value="Internet" <?php if ($row['c22'] == 'Internet') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Internet
                  <br><input type="radio" name="c22" class="myForm" id="c22" value="Pengumuman di kampus" <?php if ($row['c22'] == 'Pengumuman di kampus') {
                                                                                                                echo 'checked';
                                                                                                              } ?>>&nbsp;Pengumuman di kampus
                  <br><input type="radio" name="c22" class="myForm" id="c22" value="Koneksi (teman,dosen,saudara/keluarga, dll)" <?php if ($row['c22'] == 'Koneksi (teman,dosen,saudara/keluarga, dll)') {
                                                                                                                                        echo 'checked';
                                                                                                                                      } ?>>&nbsp;Koneksi (teman,dosen,saudara/keluarga, dll)
                  <br><input type="radio" name="c22" class="myForm" id="c22" value="PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)" <?php if ($row['c22'] == 'PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)') {
                                                                                                                                                                  echo 'checked';
                                                                                                                                                                } ?>>&nbsp;PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)
                </div>
                <!-- Sejauh mana pekerjaan pertama saudara sesuai dengan harapan ketika pertama kali belajar di FT-UNMA      -->
                <div class="form-group">
                  <label for="c23"><b>23. Sejauh mana pekerjaan pertama anda sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka</b></label>
                  <br><input type="radio" name="c23" class="myForm" id="c23" value="Sangat sesuai dengan harapan" <?php if ($row['c23'] == 'Sangat sesuai dengan harapan') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Sangat sesuai dengan harapan
                  <br><input type="radio" name="c23" class="myForm" id="c23" value="Sesuai harapan" <?php if ($row['c23'] == 'Sesuai harapan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Sesuai harapan
                  <br><input type="radio" name="c23" class="myForm" id="c23" value="Kurang sesuai harapan" <?php if ($row['c23'] == 'Kurang sesuai harapan') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Kurang sesuai harapan
                  <br><input type="radio" name="c23" class="myForm" id="c23" value="Tidak Sesuai harapan" <?php if ($row['c23'] == 'Tidak Sesuai harapan') {
                                                                                                                echo 'checked';
                                                                                                              } ?>>&nbsp;Tidak Sesuai harapan
                </div>
                <!--  Apakah saudara puas dengan pekerjaan pertama saudara ?       -->
                <div class="form-group">
                  <label for="c24"><b>24. Apakah anda puas dengan pekerjaan pertama anda ?</b></label>
                  <br><input type="radio" name="c24" class="myForm" id="c24" value="Ya" <?php if ($row['c24'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="c24" class="myForm" id="c24" value="Tidak" <?php if ($row['c24'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>
                <!-- SSecara umum, apa pertimbangan utama saudara dalam memlilih pekerjaan pertama ?     -->
                <div class="form-group">
                  <label for="c25"><b>25. Secara umum, apa pertimbangan utama anda dalam memlilih pekerjaan pertama ?</b></label>
                  <br><input type="radio" name="c25" class="myForm" id="c25" value="Gaji memadai" <?php if ($row['c25'] == 'Gaji memadai') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Gaji memadai
                  <br><input type="radio" name="c25" class="myForm" id="c25" value="Sesuai bidang keilmuan" <?php if ($row['c25'] == 'Sesuai bidang keilmuan') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Sesuai bidang keilmuan
                  <br><input type="radio" name="c25" class="myForm" id="c25" value="Mendapatkan pengalaman" <?php if ($row['c25'] == 'Mendapatkan pengalaman') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>>&nbsp;Mendapatkan pengalaman
                  <br><input type="radio" name="c25" class="myForm" id="c25" value="Mendapatkan ilmu pengetahuan" <?php if ($row['c25'] == 'Mendapatkan ilmu pengetahuan') {
                                                                                                                        echo 'checked';
                                                                                                                      } ?>>&nbsp;Mendapatkan ilmu pengetahuan
                  <br><input type="radio" name="c25" class="myForm" id="c25" value=" Mendapatkan keterampilan" <?php if ($row['c25'] == 'Mendapatkan keterampilan') {
                                                                                                                      echo 'checked';
                                                                                                                    } ?>>&nbsp; Mendapatkan keterampilan
                </div>
                <!--  Apakah pekerjaan pertama saudara berhubungan dengan bidang ilmu yang saudara pelajari di program studi ?   -->
                <div class="form-group">
                  <label for="c26"><b>26. Apakah pekerjaan pertama saudara berhubungan dengan bidang ilmu yang saudara pelajari di program studi ?</b></label>
                  <br><input type="radio" name="c26" class="myForm" id="c26" value="Ya" <?php if ($row['c26'] == 'Ya') {
                                                                                              echo 'checked';
                                                                                            } ?>>&nbsp;Ya
                  <br><input type="radio" name="c26" class="myForm" id="c26" value="Tidak" <?php if ($row['c26'] == 'Tidak') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Tidak
                </div>

                <!-- button -->
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">Previous</button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>

              <!-------------------------------------------------------------------- RELEVANSI PENDIDIKAN  --------------------------------------------------------->
              <!-- D1 | Relevansi Pendidikan Dengan Pekerjaan-->
              <fieldset>
                <!-- Apakah pendidikan yang saudara dapat di FT-UNMA relevan dengan pekerjaan saudara ?   -->
                <div class="form-group">
                  <label for="d1"><b>1. Apakah pendidikan yang anda dapat di Universitas Majalengka relevan dengan pekerjaan anda ?</b></label>
                  <br><input type="radio" name="d1" class="myForm" id="d1" value="Ya" <?php if ($row['d1'] == 'Ya') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Ya
                  <br><input type="radio" name="d1" class="myForm" id="d1" value="Tidak" <?php if ($row['d1'] == 'Tidak') {
                                                                                                echo 'checked';
                                                                                              } ?>>&nbsp;Tidak
                </div>
                <!-- Dari pengalaman saudara bekerja, apa saran praktis saudara untuk pendidikan di FT-UNMA dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ? -->
                <div class="form-group">
                  <label for="d2"><b>2. Dari pengalaman anda bekerja, apa saran praktis anda untuk pendidikan di Universitas Majalengka dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ?</b></label>
                  <textarea id="ta1" name="d2" class="f1-about-yourself form-control"><?php echo $row['d2']; ?></textarea>
                </div>
                <!-- Saat belajar di FT-UNMA, menurut saudara seberapa penting pengalaman pembelajaran berikut ini memberikan kontribusi dalam dunia kerja ?   -->
                <label for="d3"><b>3. Saat belajar di Universitas Majalengka, menurut anda seberapa penting pengalaman pembelajaran berikut ini memberikan kontribusi dalam dunia kerja ?</b></label>
                <!-- 1. Pengalaman belajar di dalam kelas    -->
                <div class="form-group">
                  <label for="d4"><b>Pengalaman belajar di dalam kelas</b></label>
                  <br><input type="radio" name="d4" class="myForm" id="d4" value="Sangat Penting" <?php if ($row['d4'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d4" class="myForm" id="d4" value="Penting" <?php if ($row['d4'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d4" class="myForm" id="d4" value="Kurang Penting" <?php if ($row['d4'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d4" class="myForm" id="d4" value="Tidak Penting" <?php if ($row['d4'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 2. Pengalaman belajar di laboratorium    -->
                <div class="form-group">
                  <label for="d5"><b>Pengalaman belajar di laboratorium</b></label>
                  <br><input type="radio" name="d5" class="myForm" id="d5" value="Sangat Penting" <?php if ($row['d5'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d5" class="myForm" id="d5" value="Penting" <?php if ($row['d5'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d5" class="myForm" id="d5" value="Kurang Penting" <?php if ($row['d5'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d5" class="myForm" id="d5" value="Tidak Penting" <?php if ($row['d5'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 3. Pengalaman belajar di masyarakat    -->
                <div class="form-group">
                  <label for="d6"><b>Pengalaman belajar di masyarakat</b></label>
                  <br><input type="radio" name="d6" class="myForm" id="d6" value="Sangat Penting" <?php if ($row['d6'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d6" class="myForm" id="d6" value="Penting" <?php if ($row['d6'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d6" class="myForm" id="d6" value="Kurang Penting" <?php if ($row['d6'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d6" class="myForm" id="d6" value="Tidak Penting" <?php if ($row['d6'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 4. Pengalaman belajar di perusahaan/instansi   -->
                <div class="form-group">
                  <label for="d7"><b>Pengalaman belajar di perusahaan/instansi </b></label>
                  <br><input type="radio" name="d7" class="myForm" id="d7" value="Sangat Penting" <?php if ($row['d7'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d7" class="myForm" id="d7" value="Penting" <?php if ($row['d7'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d7" class="myForm" id="d7" value="Kurang Penting" <?php if ($row['d7'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d7" class="myForm" id="d7" value="Tidak Penting" <?php if ($row['d7'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 5. Pengalaman belajar dalam oraganisasi kemahasiswaan  -->
                <div class="form-group">
                  <label for="d8"><b>Pengalaman belajar dalam oraganisasi kemahasiswaan</b></label>
                  <br><input type="radio" name="d8" class="myForm" id="d8" value="Sangat Penting" <?php if ($row['d8'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d8" class="myForm" id="d8" value="Penting" <?php if ($row['d8'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d8" class="myForm" id="d8" value="Kurang Penting" <?php if ($row['d8'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d8" class="myForm" id="d8" value="Tidak Penting" <?php if ($row['d8'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 6. Pengalaman belajar dalam pergaulan kampus  -->
                <div class="form-group">
                  <label for="d9"><b>Pengalaman belajar dalam pergaulan kampus</b></label>
                  <br><input type="radio" name="d9" class="myForm" id="d9" value="Sangat Penting" <?php if ($row['d9'] == 'Sangat Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d9" class="myForm" id="d9" value="Penting" <?php if ($row['d9'] == 'Penting') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Penting
                  <br><input type="radio" name="d9" class="myForm" id="d9" value="Kurang Penting" <?php if ($row['d9'] == 'Kurang Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d9" class="myForm" id="d9" value="Tidak Penting" <?php if ($row['d9'] == 'Tidak Penting') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Penting
                </div>
                <!-- 7. Pengalaman belajar mandiri   -->
                <div class="form-group">
                  <label for="d10"><b>Pengalaman belajar mandiri </b></label>
                  <br><input type="radio" name="d10" class="myForm" id="d10" value="Sangat Penting" <?php if ($row['d10'] == 'Sangat Penting') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Sangat Penting
                  <br><input type="radio" name="d10" class="myForm" id="d10" value="Penting" <?php if ($row['d10'] == 'Penting') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;Penting
                  <br><input type="radio" name="d10" class="myForm" id="d10" value="Kurang Penting" <?php if ($row['d10'] == 'Kurang Penting') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Kurang Penting
                  <br><input type="radio" name="d10" class="myForm" id="d10" value="Tidak Penting" <?php if ($row['d10'] == 'Tidak Penting') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak Penting
                </div>
                <!-- Saat baru lulus, sejauh mana saudara merasa mampu bersaing dengan lulusan perguruan tinggi lain ?   -->
                <div class="form-group">
                  <label for="d11"><b>4. Saat baru lulus, sejauh mana anda merasa mampu bersaing dengan lulusan perguruan tinggi lain ?</b></label>
                  <br><input type="radio" name="d11" class="myForm" id="d11" value="Sangat Mampu" <?php if ($row['d11'] == 'Sangat Mampu') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Sangat Mampu
                  <br><input type="radio" name="d11" class="myForm" id="d11" value="Mampu" <?php if ($row['d11'] == 'Mampu') {
                                                                                                  echo 'checked';
                                                                                                } ?>>&nbsp;Mampu
                  <br><input type="radio" name="d11" class="myForm" id="d11" value="Kurang Mampu" <?php if ($row['d11'] == 'Kurang Mampu') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Kurang Mampu
                  <br><input type="radio" name="d11" class="myForm" id="d11" value="Tidak Mampu" <?php if ($row['d11'] == 'Tidak Mampu') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>&nbsp;Tidak Mampu
                </div>
                <!-- Sejauh ini, menurut saudara lulusan UNMA yang bagaiamana yang diperlukan oleh pasar/lapangan kerja ?   -->
                <div class="form-group">
                  <label for="d12"><b>5. Sejauh ini, menurut anda lulusan Universitas Majalengka yang bagaimana yang diperlukan oleh pasar/lapangan kerja ?</b></label>
                  <br><input type="radio" name="d12" class="myForm" value="Generik" <?php if ($row['d12'] == 'Generik') {
                                                                                          echo 'checked';
                                                                                        } ?>>&nbsp;Generik
                  <br><input type="radio" name="d12" class="myForm" value="Spesifik" <?php if ($row['d12'] == 'Spesifik') {
                                                                                            echo 'checked';
                                                                                          } ?>>&nbsp;Spesifik
                </div>

                <!-- button -->
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">Previous</button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>

              <!--------------------------------------------------------PENGUASAAN KOMPETENSI --------------------------------------------------------->
              <!-- Penguasaan Kompetensi -->
              <fieldset>
                <!-- Saat baru lulus, menurut penilaian saudara, sejauh mana menguasai kompetensi berikut ?   -->
                <label for="d13"><b>1. Saat baru lulus, menurut penilaian anda, sejauh mana anda menguasai kompetensi berikut ?</b></label>
                <!-- 1. Pengetahuan umum   -->
                <div class="form-group">
                  <label for="d14"><b>Pengetahuan umum</b></label>
                  <br><input type="radio" name="d14" class="myForm" id="d14" value="Sangat Menguasai" <?php if ($row['d14'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d14" class="myForm" id="d14" value="Menguasai" <?php if ($row['d14'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d14" class="myForm" id="d14" value="Kurang Menguasai" <?php if ($row['d14'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d14" class="myForm" id="d14" value="Tidak Menguasai" <?php if ($row['d14'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 2. Bahasa inggris  -->
                <div class="form-group">
                  <label for="d15"><b>Bahasa inggris </b></label>
                  <br><input type="radio" name="d15" class="myForm" id="d15" value="Sangat Menguasai" <?php if ($row['d15'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d15" class="myForm" id="d15" value="Menguasai" <?php if ($row['d15'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d15" class="myForm" id="d15" value="Kurang Menguasai" <?php if ($row['d15'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d15" class="myForm" id="d15" value="Tidak Menguasai" <?php if ($row['d15'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!--3. Komputer   -->
                <div class="form-group">
                  <label for="d16"><b>Komputer</b></label>
                  <br><input type="radio" name="d16" class="myForm" id="d16" value="Sangat Menguasai" <?php if ($row['d16'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d16" class="myForm" id="d16" value="Menguasai" <?php if ($row['d16'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d16" class="myForm" id="d16" value="Kurang Menguasai" <?php if ($row['d16'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d16" class="myForm" id="d16" value="Tidak Menguasai" <?php if ($row['d16'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 4. Metodologi penelitian -->
                <div class="form-group">
                  <label for="d17"><b>Metodologi penelitian</b></label>
                  <br><input type="radio" name="d17" class="myForm" id="d17" value="Sangat Menguasai" <?php if ($row['d17'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d17" class="myForm" id="d17" value="Menguasai" <?php if ($row['d17'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d17" class="myForm" id="d17" value="Kurang Menguasai" <?php if ($row['d17'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d17" class="myForm" id="d17" value="Tidak Menguasai" <?php if ($row['d17'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 5. Kerjasama tim   -->
                <div class="form-group">
                  <label for="d18"><b>Kerjasama tim </b></label>
                  <br><input type="radio" name="d18" class="myForm" id="d18" value="Sangat Menguasai" <?php if ($row['d18'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d18" class="myForm" id="d18" value="Menguasai" <?php if ($row['d18'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d18" class="myForm" id="d18" value="Kurang Menguasai" <?php if ($row['d18'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d18" class="myForm" id="d18" value="Tidak Menguasai" <?php if ($row['d18'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 6. Keterampilan komunikasi lisan   -->
                <div class="form-group">
                  <label for="d19"><b>Keterampilan komunikasi lisan</b></label>
                  <br><input type="radio" name="d19" class="myForm" id="d19" value="Sangat Menguasai" <?php if ($row['d19'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d19" class="myForm" id="d19" value="Menguasai" <?php if ($row['d19'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d19" class="myForm" id="d19" value="Kurang Menguasai" <?php if ($row['d19'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d19" class="myForm" id="d19" value="Tidak Menguasai" <?php if ($row['d19'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 7. Keterampilan komunikasi tertulis  -->
                <div class="form-group">
                  <label for="d20"><b>Keterampilan komunikasi tertulis</b></label>
                  <br><input type="radio" name="d20" class="myForm" id="d20" value="Sangat Menguasai" <?php if ($row['d20'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d20" class="myForm" id="d20" value="Menguasai" <?php if ($row['d20'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d20" class="myForm" id="d20" value="Kurang Menguasai" <?php if ($row['d20'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d20" class="myForm" id="d20" value="Tidak Menguasai" <?php if ($row['d20'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 8. Proses pemberdayaan masyarakat  -->
                <div class="form-group">
                  <label for="d21"><b>Proses pemberdayaan masyarakat</b></label>
                  <br><input type="radio" name="d21" class="myForm" id="d21" value="Sangat Menguasai" <?php if ($row['d21'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d21" class="myForm" id="d21" value="Menguasai" <?php if ($row['d21'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d21" class="myForm" id="d21" value="Kurang Menguasai" <?php if ($row['d21'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d21" class="myForm" id="d21" value="Tidak Menguasai" <?php if ($row['d21'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 9. Pengetahuan teoritis spesifik fakultas/departemen -->
                <div class="form-group">
                  <label for="d22"><b>Pengetahuan teoritis spesifik fakultas/departemen</b></label>
                  <br><input type="radio" name="d22" class="myForm" id="d22" value="Sangat Menguasai" <?php if ($row['d22'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d22" class="myForm" id="d22" value="Menguasai" <?php if ($row['d22'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d22" class="myForm" id="d22" value="Kurang Menguasai" <?php if ($row['d22'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d22" class="myForm" id="d22" value="Tidak Menguasai" <?php if ($row['d22'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 10. Pengetahuan praktis praktis fakultas/departemen   -->
                <div class="form-group">
                  <label for="d23"><b>Pengetahuan praktis praktis fakultas/departemen</b></label>
                  <br><input type="radio" name="d23" class="myForm" id="d23" value="Sangat Menguasai" <?php if ($row['d23'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d23" class="myForm" id="d23" value="Menguasai" <?php if ($row['d23'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d23" class="myForm" id="d23" value="Kurang Menguasai" <?php if ($row['d23'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d23" class="myForm" id="d23" value="Tidak Menguasai" <?php if ($row['d23'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 11. Manajemen organisasi   -->
                <div class="form-group">
                  <label for="d24"><b>Manajemen organisasi</b></label>
                  <br><input type="radio" name="d24" class="myForm" id="d24" value="Sangat Menguasai" <?php if ($row['d24'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d24" class="myForm" id="d24" value="Menguasai" <?php if ($row['d24'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d24" class="myForm" id="d24" value="Kurang Menguasai" <?php if ($row['d24'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d24" class="myForm" id="d24" value="Tidak Menguasai" <?php if ($row['d24'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>
                <!-- 12. Kepemimpinan/leadership   -->
                <div class="form-group">
                  <label for="d25"><b>Kepemimpinan/leadership</b></label>
                  <br><input type="radio" name="d25" class="myForm" id="d25" value="Sangat Menguasai" <?php if ($row['d25'] == 'Sangat Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat Menguasai
                  <br><input type="radio" name="d25" class="myForm" id="d25" value="Menguasai" <?php if ($row['d25'] == 'Menguasai') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;Menguasai
                  <br><input type="radio" name="d25" class="myForm" id="d25" value="Kurang Menguasai" <?php if ($row['d25'] == 'Kurang Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang Menguasai
                  <br><input type="radio" name="d25" class="myForm" id="d25" value="Tidak Menguasai" <?php if ($row['d25'] == 'Tidak Menguasai') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak Menguasai
                </div>

                <!-- button -->
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">Previous</button>
                  <button type="button" class="btn btn-next">Next</button>
                </div>
              </fieldset>

              <!------------------------------------------------------ KOMPETENSI DIPERLUKAN --------------------------------------------------------->
              <!-- Komptetensi Diperlukan -->
              <fieldset>
                <!-- SDalam pekerjaan, menurut penilaian saudara sejauh mana kompetensi berikut diperlukan ?  -->
                <label for="e1"><b>1. Dalam pekerjaan, menurut penilaian saudara sejauh mana kompetensi berikut diperlukan</b></label>
                <!-- 1. Pengetahuan umum   -->
                <div class="form-group">
                  <label for="f2"><b>Pengetahuan umum</b></label>
                  <br><input type="radio" name="e2" class="myForm" id="e2" value="Sangat dibutuhkan" <?php if ($row['e2'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e2" class="myForm" id="e2" value="Dibutuhkan" <?php if ($row['e2'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e2" class="myForm" id="e2" value="Kurang dibutuhkan" <?php if ($row['e2'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e2" class="myForm" id="e2" value="Tidak dibutuhkan" <?php if ($row['e2'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 2. Bahasa inggris  -->
                <div class="form-group">
                  <label for="e3"><b>Bahasa inggris</b></label>
                  <br><input type="radio" name="e3" class="myForm" id="e3" value="Sangat dibutuhkan" <?php if ($row['e3'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e3" class="myForm" id="e3" value="Dibutuhkan" <?php if ($row['e3'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e3" class="myForm" id="e3" value="Kurang dibutuhkan" <?php if ($row['e3'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e3" class="myForm" id="e3" value="Tidak dibutuhkan" <?php if ($row['e3'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!--3. Komputer   -->
                <div class="form-group">
                  <label for="e4"><b>Komputer</b></label>
                  <br><input type="radio" name="e4" class="myForm" id="e4" value="Sangat dibutuhkan" <?php if ($row['e4'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e4" class="myForm" id="e4" value="Dibutuhkan" <?php if ($row['e4'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e4" class="myForm" id="e4" value="Kurang dibutuhkan" <?php if ($row['e4'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e4" class="myForm" id="e4" value="Tidak dibutuhkan" <?php if ($row['e4'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 4. Metodologi penelitian -->
                <div class="form-group">
                  <label for="e5"><b>Metodologi penelitian</b></label>
                  <br><input type="radio" name="e5" class="myForm" id="e5" value="Sangat dibutuhkan" <?php if ($row['e5'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e5" class="myForm" id="e5" value="Dibutuhkan" <?php if ($row['e5'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e5" class="myForm" id="e5" value="Kurang dibutuhkan" <?php if ($row['e5'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e5" class="myForm" id="e5" value="Tidak dibutuhkan" <?php if ($row['e5'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 5. Kerjasama tim   -->
                <div class="form-group">
                  <label for="e6"><b>Kerjasama tim </b></label>
                  <br><input type="radio" name="e6" class="myForm" id="e6" value="Sangat dibutuhkan" <?php if ($row['e6'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e6" class="myForm" id="e6" value="Dibutuhkan" <?php if ($row['e6'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e6" class="myForm" id="e6" value="Kurang dibutuhkan" <?php if ($row['e6'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e6" class="myForm" id="e6" value="Tidak dibutuhkan" <?php if ($row['e6'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 6. Keterampilan komunikasi lisan   -->
                <div class="form-group">
                  <label for="e7"><b>Keterampilan komunikasi lisan</b></label>
                  <br><input type="radio" name="e7" class="myForm" id="e7" value="Sangat dibutuhkan" <?php if ($row['e7'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e7" class="myForm" id="e7" value="Dibutuhkan" <?php if ($row['e7'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e7" class="myForm" id="e7" value="Kurang dibutuhkan" <?php if ($row['e7'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e7" class="myForm" id="e7" value="Tidak dibutuhkan" <?php if ($row['e7'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 7. Keterampilan komunikasi tertulis  -->
                <div class="form-group">
                  <label for="e8"><b>Keterampilan komunikasi tertulis</b></label>
                  <br><input type="radio" name="e8" class="myForm" id="e8" value="Sangat dibutuhkan" <?php if ($row['e8'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e8" class="myForm" id="e8" value="Dibutuhkan" <?php if ($row['e8'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e8" class="myForm" id="e8" value="Kurang dibutuhkan" <?php if ($row['e8'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e8" class="myForm" id="e8" value="Tidak dibutuhkan" <?php if ($row['e8'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 8. Proses pemberdayaan masyarakat  -->
                <div class="form-group">
                  <label for="e9"><b>Proses pemberdayaan masyarakat</b></label>
                  <br><input type="radio" name="e9" class="myForm" id="e9" value="Sangat dibutuhkan" <?php if ($row['e9'] == 'Sangat dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e9" class="myForm" id="e9" value="Dibutuhkan" <?php if ($row['e9'] == 'Dibutuhkan') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e9" class="myForm" id="e9" value="Kurang dibutuhkan" <?php if ($row['e9'] == 'Kurang dibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e9" class="myForm" id="e9" value="Tidak dibutuhkan" <?php if ($row['e9'] == ' Tidakdibutuhkan') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 9. Pengetahuan teoritis spesifik fakultas/departemen -->
                <div class="form-group">
                  <label for="e10"><b>Pengetahuan teoritis spesifik fakultas/departemen</b></label>
                  <br><input type="radio" name="e10" class="myForm" id="e10" value="Sangat dibutuhkan" <?php if ($row['e10'] == 'Sangat dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e10" class="myForm" id="e10" value="Dibutuhkan" <?php if ($row['e10'] == 'Dibutuhkan') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e10" class="myForm" id="e10" value="Kurang dibutuhkan" <?php if ($row['e10'] == 'Kurang dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e10" class="myForm" id="e10" value="Tidak dibutuhkan" <?php if ($row['e10'] == ' Tidakdibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 10. Pengetahuan praktis praktis fakultas/departemen   -->
                <div class="form-group">
                  <label for="e11"><b>Pengetahuan praktis praktis fakultas/departemen</b></label>
                  <br><input type="radio" name="e11" class="myForm" id="e11" value="Sangat dibutuhkan" <?php if ($row['e11'] == 'Sangat dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e11" class="myForm" id="e11" value="Dibutuhkan" <?php if ($row['e11'] == 'Dibutuhkan') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e11" class="myForm" id="e11" value="Kurang dibutuhkan" <?php if ($row['e11'] == 'Kurang dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e11" class="myForm" id="e11" value="Tidak dibutuhkan" <?php if ($row['e11'] == ' Tidakdibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 11. Manajemen organisasi   -->
                <div class="form-group">
                  <label for="e12"><b>Manajemen organisasi</b></label>
                  <br><input type="radio" name="e12" class="myForm" id="e12" value="Sangat dibutuhkan" <?php if ($row['e12'] == 'Sangat dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e12" class="myForm" id="e12" value="Dibutuhkan" <?php if ($row['e12'] == 'Dibutuhkan') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e12" class="myForm" id="e12" value="Kurang dibutuhkan" <?php if ($row['e12'] == 'Kurang dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e12" class="myForm" id="e12" value="Tidak dibutuhkan" <?php if ($row['e12'] == ' Tidakdibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 12. Kepemimpinan/leadership   -->
                <div class="form-group">
                  <label for="e13"><b>Kepemimpinan/leadership</b></label>
                  <br><input type="radio" name="e13" class="myForm" id="e13" value="Sangat dibutuhkan" <?php if ($row['e13'] == 'Sangat dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Sangat dibutuhkan
                  <br><input type="radio" name="e13" class="myForm" id="e13" value="Dibutuhkan" <?php if ($row['e13'] == 'Dibutuhkan') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>&nbsp;dibutuhkan
                  <br><input type="radio" name="e13" class="myForm" id="e13" value="Kurang dibutuhkan" <?php if ($row['e13'] == 'Kurang dibutuhkan') {
                                                                                                              echo 'checked';
                                                                                                            } ?>>&nbsp;Kurang dibutuhkan
                  <br><input type="radio" name="e13" class="myForm" id="e13" value="Tidak dibutuhkan" <?php if ($row['e13'] == ' Tidakdibutuhkan') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>&nbsp;Tidak dibutuhkan
                </div>
                <!-- 13. Saran dan Masukan -->
                <div class="form-group">
                  <label for="e14"><b>2. Beri kami Masukan dan Saran agar kedepannya dapat menjadi Universitas yang lebih lebih baik </b></label>
                  <textarea id="ta1" name="e14"><?php echo $row['e14']; ?></textarea>
                </div>

                <!-- button -->
                <div class="f1-buttons">
                  <button type="button" class="btn btn-previous">Previous</button>
                  <button type="submit" class="btn btn-submit">SIMPAN</button>
                </div>
              </fieldset>

          <?php
            }
          }
          ?>

          <div id="clear" style="display:block;height:50px;clear:both;"></div>
        </form>

        <div id="clear" style="display:block;height:50px;clear:both;"></div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- /page content -->

  <!-- Javascript -->
  <script src="../assets/js/jquery-1.11.1.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.backstretch.min.js"></script>
  <script src="../assets/js/retina-1.1.0.min.js"></script>
  <script src="../assets/js/scripts.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../css/vendors/moment/min/moment.min.js"></script>
  <script src="../css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="../css/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <script>
    $("#ta").keyup(function(e) {
      autoheight(this);
    });

    function autoheight(a) {
      if (!$(a).prop('scrollTop')) {
        do {
          var b = $(a).prop('scrollHeight');
          var h = $(a).height();
          $(a).height(h - 5);
        }
        while (b && (b != $(a).prop('scrollHeight')));
      };
      $(a).height($(a).prop('scrollHeight') + 20);
    }

    autoheight($("#ta"));
  </script>
  <script>
    $("#ta1").keyup(function(e) {
      autoheight(this);
    });

    function autoheight(a) {
      if (!$(a).prop('scrollTop')) {
        do {
          var b = $(a).prop('scrollHeight');
          var h = $(a).height();
          $(a).height(h - 5);
        }
        while (b && (b != $(a).prop('scrollHeight')));
      };
      $(a).height($(a).prop('scrollHeight') + 20);
    }

    autoheight($("#ta"));
  </script>
  <script>
    $('#myDatepicker').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker2').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker3').datetimepicker({
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker4').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker5').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker6').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
    $('#myDatepicker7').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true,
      format: 'DD/MM/YYYY'
    });
  </script>

</body>

</html>