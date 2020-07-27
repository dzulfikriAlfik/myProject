<?php 
session_start();
if(empty($_SESSION['id_user'])) {
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
          width:850px;
          min-height:100px;
          max-height:100px;
          resize:none;
          overflow: auto;
          
      }
      #ta1 {
          width:850px;
          min-height:300px;
          max-height:300px;
          resize:none;
          overflow: auto;
          
      }
    </style>
  </head>

<body class="container-fluid">
  <div class="row well">
      <div class="container well" style="background-color: white">
      <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
        <form role="form" method="post" class="f1" action="simpantracer.php">

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

<!-- ------------------------------------------------------------------SETUP PRIBADI------------------------------------------------------------------->
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
                      <input type="text" name="dp_tanggallahir" placeholder="Anda belum melengkapi profil anda, setelah melengkapi profil, silahkan login kembali" class="form-control" id="f1-first-name" readonly="readonly" value="<?php echo $_SESSION['tanggallahir']; ?>" readonly="readonly">
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
                  <div class="form-group">
                    <label for="dp_jk"><b>4. Jenis Kelamin</b></label>
                    <p>
                    <input type="radio" class="flat" name="dp_jk" id="dp_jk" value="Laki-laki" checked="">&nbsp;Laki-laki
                    &nbsp;&nbsp;&nbsp; 
                    <input type="radio" class="flat" name="dp_jk" id="dp_jk" value="Perempuan" checked="">&nbsp;Perempuan
                    </p>
                  </div>
                  <!-- jurusan -->
                  <div class="form-group">
                    <label for="dp_jurusan"><b>5. Program Studi</b></label>
                      <select type="text" name="dp_jurusan" placeholder="Program Studi" class="form-control" id="f1-first-name" tabindex="-1">
                        <option></option>
                        <optgroup label="Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)">
                          <option name="dp_jurusan" value="Ilmu Administrasi Negara">Ilmu Administrasi Negara</option>
                          <option name="dp_jurusan" value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                          <option name="dp_jurusan" value="Hubungan Internasional">Hubungan Internasional</option>
                        </optgroup>
                        <optgroup label="Fakultas Keguruan dan Ilmu Pendidikan (FKIP)">
                          <option name="dp_jurusan" value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                          <option name="dp_jurusan" value="Pendidikan Jasmani, Kesehatan dan Rekreasi">Pendidikan Jasmani, Kesehatan dan Rekreasi</option>
                          <option name="dp_jurusan" value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        </optgroup>
                        <optgroup label="Fakultas Ekonomi (FEKON)">
                          <option name="dp_jurusan" value="Manajemen">Manajemen</option>
                          <option name="dp_jurusan" value="Akuntansi">Akuntansi</option>
                        </optgroup>
                        <optgroup label="Fakultas Pertanian (FAPERTA)">
                          <option name="dp_jurusan" value="Agroteknologi">Agroteknologi</option>
                          <option name="dp_jurusan" value="Agribisnis">Agribisnis</option>
                          <option name="dp_jurusan" value="Peternakan">Peternakan</option>
                        </optgroup>
                        <optgroup label="Fakultas Agama Islam (FAI)">
                          <option name="dp_jurusan" value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                          <option name="dp_jurusan" value="Hukum Ekonomi Syari'ah">Hukum Ekonomi Syari'ah</option>
                          <option name="dp_jurusan" value="Pendidikan Guru Raudlatul Athfal">Pendidikan Guru Raudlatul Athfal</option>
                        </optgroup>
                        <optgroup label="Fakultas Teknik (FT)">
                          <option name="dp_jurusan" value="Informatika">Informatika</option>
                          <option name="dp_jurusan" value="Teknik Sipil">Teknik Sipil</option>
                          <option name="dp_jurusan" value="Teknik Mesin">Teknik Mesin</option>
                          <option name="dp_jurusan" value="Teknik Industri">Teknik Industri</option>
                        </optgroup>
                        <optgroup label="Fakultas Hukum (FH)">
                          <option name="dp_jurusan" value="Ilmu Hukum">Ilmu Hukum</option>
                        </optgroup>
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
                      <input type="text" name="dp_tahunmasuk" placeholder="Tahun Masuk" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <!-- tahun lulus -->
                  <div class="form-group">
                    <label for="dp_tahunlulus"><b>7. Tahun Lulus</b></label>
                    <div class='input-group date' id='myDatepicker2'>
                      <input type="text" name="dp_tahunlulus" placeholder="Tahun Lulus" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <!-- alamat -->
                  <div class="form-group">
                    <label for="dp_alamat"><b>8. Alamat</b></label>
                    <textarea id="ta" name="dp_alamat" class="f1-about-yourself form-control" placeholder="Anda belum melengkapi profil anda, setelah melengkapi profil, silahkan login kembali" readonly="readonly"><?php echo $_SESSION['alamat']; ?></textarea>
                  </div>
                  <!-- kota -->
                  <div class="form-group">
                    <label for="dp_kota"><b>9. Kota</b></label>
                    <input type="text" name="dp_kota" placeholder="Anda belum melengkapi profil anda, setelah melengkapi profil, silahkan login kembali" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['kota']; ?>" readonly="readonly">
                  </div>
                  <!-- provinsi -->
                  <div class="form-group">
                    <label for="dp_provinsi"><b>10. Provinsi</b></label>
                    <input type="text" name="dp_provinsi" placeholder="Anda belum melengkapi profil anda, setelah melengkapi profil, silahkan login kembali" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['provinsi']; ?>" readonly="readonly">
                  </div>
                  <!-- kodepos -->
                  <div class="form-group">
                    <label for="dp_kodepos"><b>11. Kode Pos</b></label>
                    <input type="text" name="dp_kodepos" placeholder="Kode Pos" class="form-control" id="f1-first-name">
                  </div>
                  <!-- kontak -->
                  <div class="form-group">
                    <label for="dp_kontak"><b>12. Nomor Telepon</b></label>
                    <input type="text" name="dp_kontak" placeholder="Nomor Telepon" class="form-control" id="f1-first-name">
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <label for="dp_email"><b>13. Email</b></label>
                    <input type="text" name="dp_email" placeholder="Anda belum melengkapi profil anda, setelah melengkapi profil, silahkan login kembali" class="form-control" id="f1-first-name" value="<?php echo $_SESSION['email']; ?>" readonly="readonly">
                  </div>
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>

<!------------------------------------------------------------ RIWAYAT PENDIDIKAN --------------------------------------------------------->
                <!-- Setup Riwayat Pendidikan -->
                <fieldset> 
                  <!-- pada saat masuk univ -->
                  <div class="form-group">
                    <label for="b1"><b>1. Pada saat masuk Universitas Majalengka, prodi yang saudara pilih merupakan pilihan ke ?</b></label>
                      <br><input type="radio" name="b1" class="myForm" id="b1" checked="" value="Satu">&nbsp;Satu
                      <br><input type="radio" name="b1" class="myForm" id="b1" checked="" value="Dua">&nbsp;Dua
                      <br><input type="radio" name="b1" class="myForm" id="b1" checked="" value="Tiga">&nbsp;Tiga
                  </div>
                  <!-- apakah berorganisasi -->
                  <div class="form-group">
                    <label for="b2"><b>2. Apakah anda berorganisasi ketika masih aktif menjadi mahasiswa ? </b></label>
                      <br><input type="radio" name="b2" class="myForm" id="b2" checked="" value="Ya, saya mengikuti : ">&nbsp;Ya
                      <br><input type="radio" name="b2" class="myForm" id="b2" checked="" value="Tidak, Karena">&nbsp;Tidak, Karena
                      <br><textarea name="alasanb2" id="ta1" placeholder="Jelaskan alasannya disini mengapa ya/tidak"></textarea>
                  </div>
                  <!-- apakah melanjutkan pendidikan -->
                  <div class="form-group">
                    <label for="b3"><b>3. Setelah lulus sarjana dari Universitas Majalengka, apakah anda melanjutkan pendidikan ?</b></label>
                      <br><input type="radio" name="b3" class="myForm" id="b3" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="b3" class="myForm" id="b3" checked="" value="Tidak, Karena">&nbsp;Tidak, Karena
                      <br><textarea id="ta1" name="alasanb3" class="myForm" id="b3" checked="" placeholder="Jelaskan alasannya disini mengapa ya/tidak"></textarea>
                  </div>
                  <!-- dimana menlanjutkan -->
                  <div class="form-group">
                    <label for="b4"><b>4. Dimana Anda melanjutkan pendidikan ?</b></label>
                    <input type="text" name="b4" placeholder="" class="form-control" id="f1-first-name">
                  </div>
                  <!-- apa alasan maelanjutkan -->
                  <div class="form-group">
                    <label for="b5"><b>5. Apa alasan utama anda melanjutkan pendidikan ?  </b></label>
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Mengisi kekosongan menganggur">&nbsp;Mengisi kekosongan menganggur
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Perlu untuk bekerja ">&nbsp;Perlu untuk bekerja 
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Merasa ilmu yang dimiliki masih kurang">&nbsp;Merasa ilmu yang dimiliki masih kurang
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Ada Kesempatan ">&nbsp;Ada Kesempatan 
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Sebagai syarat dalam pekerjaan (di tempat kerja)">&nbsp;Sebagai syarat dalam pekerjaan (di tempat kerja)
                      <br><input type="radio" name="b5" class="myForm" id="b5" checked="" value="Kurang yakin bila hanya di bidang ini saja">&nbsp;Kurang yakin bila hanya di bidang ini saja
                  </div>
                  <!-- dimana anda ingin bekerja -->
                  <div class="form-group">
                    <label for="b6"><b>6. Pada saat baru lulus, dimana anda ingin bekerja ?</b></label>
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Pemerintah (pusat/departemen) ">&nbsp;Pemerintah (pusat/departemen) 
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Pemerintah (daerah) ">&nbsp;Pemerintah (daerah) 
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Pemerintah (BUMN, BHMN)">&nbsp;Pemerintah (BUMN, BHMN)
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Swasta (Jasa) ">&nbsp;Swasta (Jasa) 
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Swasta (Manufaktur) ">&nbsp;Swasta (Manufaktur) 
                      <br><input type="radio" name="b6" class="myForm" id="b6" checked="" value="Wiraswasta">&nbsp;Wiraswasta
                  </div>
                  <!-- B7 | Pada saat baru lulus, apakah saudara bersedia bekerja/ditempatkan di daerah-->
                  <div class="form-group">
                    <label for="b7"><b>7. Pada saat baru lulus, apakah anda bersedia bekerja/ditempatkan di daerah ?  </b></label>
                      <br><input type="radio" name="b7" class="myForm" id="b7" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="b7" class="myForm" id="b7" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- B8 | Pada saat baru lulus, apakah saudara mengetahui cara/prosedur melamar pekerjaan ?  -->
                  <div class="form-group">
                    <label for="b8"><b>8. Pada saat baru lulus, apakah anda mengetahui cara/prosedur melamar pekerjaan ? </b></label>
                      <br><input type="radio" name="b8" class="myForm" id="b8" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="b8" class="myForm" id="b8" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- BB9 | Menurut saudara, kapa seharusnya cara/prosedur melamar pekerjaan harus mulai diketahui ?    -->
                  <div class="form-group">
                    <label for="b9"><b>9. Menurut anda, kapan seharusnya cara/prosedur melamar pekerjaan harus mulai diketahui ?  </b></label>
                      <br><input type="radio" name="b9" class="myForm" id="b9" checked="" value="Sejak tahun Pertama Perkuliahan ">&nbsp;Sejak tahun pertama perkuliahan 
                      <br><input type="radio" name="b9" class="myForm" id="b9" checked="" value="Di tahun kedua perkuliahan">&nbsp;Di tahun kedua perkuliahan
                      <br><input type="radio" name="b9" class="myForm" id="b9" checked="" value="Di tahun ketiga perkuliahan">&nbsp;Di tahun ketiga perkuliahan
                      <br><input type="radio" name="b9" class="myForm" id="b9" checked="" value="Di tahun akhir Perkuliahan">&nbsp;Di tahun akhir perkuliahan
                      <br><input type="radio" name="b9" class="myForm" id="b9" checked="" value="Setelah lulus">&nbsp;Setelah lulus
                  </div>
                  <!-- B10 | Pada saat baru lulus, apakah saudara mengetahui cara membuat CV untuk melamar pekerjaan ?-->
                  <div class="form-group">
                    <label for="b10"><b>10. Pada saat baru lulus, apakah saudara mengetahui cara membuat CV untuk melamar pekerjaan ?</b></label>
                      <br><input type="radio" name="b10" class="myForm" id="b10" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="b10" class="myForm" id="b10" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- B11 | Menurut saudara, kapan seharusnya cara membuat CV harus mulai diketahui  ?    -->
                  <div class="form-group">
                    <label for="b11"><b>11. Menurut anda, kapan seharusnya cara membuat CV harus mulai diketahui ?</b></label>
                      <br><input type="radio" name="b11" class="myForm" id="b11" checked="" value="Sejak tahun Pertama Perkuliahan ">&nbsp;Sejak tahun pertama perkuliahan 
                      <br><input type="radio" name="b11" class="myForm" id="b11" checked="" value="Di tahun kedua perkuliahan">&nbsp;Di tahun kedua perkuliahan
                      <br><input type="radio" name="b11" class="myForm" id="b11" checked="" value="Di tahun ketiga perkuliahan">&nbsp;Di tahun ketiga perkuliahan
                      <br><input type="radio" name="b11" class="myForm" id="b11" checked="" value="Di tahun akhir Perkuliahan">&nbsp;Di tahun akhir perkuliahan
                      <br><input type="radio" name="b11" class="myForm" id="b11" checked="" value="Setelah lulus">&nbsp;Setelah lulus
                  </div>
                  <!-- B12 | Berapa IPK terakhir saudara ?  -->
                  <div class="form-group">
                    <label for="b12"><b>12. Berapa IPK terakhir anda ?</b></label>
                    <input type="text" name="b12" id="b12" class="form-control" id="f1-first-name">
                  </div>
                  <!-- B13 | Setelah lulus, apakah saudara sudah/pernah bekerja ?  -->
                  <div class="form-group">
                    <label for="b13"><b>13. Setelah lulus, apakah anda sudah/pernah bekerja ?</b></label>
                      <br><input type="radio" name="b13" class="myForm" id="b13" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="b13" class="myForm" id="b13" checked="" value="Tidak">&nbsp;Tidak
                  </div>

                  <!-- button -->
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>

<!------------------------------------------------------------------------ RIWAYAT PEKERJAAN --------------------------------------------------------->
                <!-- C | Riwayat Pekerjaan Terakhir/Sekarang -->
                <fieldset>
                 <!-- C1 | Nama tempat bekerja  -->
                  <div class="form-group">
                    <label for="c1"><b>1. Dimana tempat anda bekerja sekarang ?</b></label>
                    <input type="text" name="c1" id="c1" class="form-control" id="f1-first-name">
                  </div>
                  <!-- C2 | Jenis instansi/bidang usaha/industri   -->
                  <div class="form-group">
                    <label for="c2"><b>2. Jenis instansi/bidang usaha/industri</b></label>
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Pemerintah (pusat/departemen)">&nbsp;Pemerintah (pusat/departemen) 
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Pemerintah (daerah)">&nbsp;Pemerintah (daerah) 
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Pemerintah (BUMN, BHMN)">&nbsp;Pemerintah (BUMN, BHMN)
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Swasta (Jasa)">&nbsp;Swasta (Jasa) 
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Swasta (Manufaktur)">&nbsp;Swasta (Manufaktur) 
                      <br><input type="radio" name="c2" class="myForm" id="c2" checked="" value="Wiraswasta">&nbsp;Wiraswasta
                  </div>
                 <!-- C3 | Jabatan/posisi dalam pekerjaan  -->
                  <div class="form-group">
                    <label for="c3"><b>3. Jabatan/posisi dalam pekerjaan</b></label>
                    <input type="text" name="c3" id="c3" class="form-control" id="f1-first-name">
                  </div>
                  <!-- C4 | Bulan dan tahun mulai bekerja -->
                  <div class="form-group">
                    <label for="c4"><b>4. Bulan dan tahun mulai bekerja</b></label>
                    <div class='input-group date' id='myDatepicker4'>
                      <input type="text" name="c4" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <!-- C5 | Bulan dan tahun berhenti bekerja  -->
                  <div class="form-group">
                    <label for="c5"><b>5. Bulan dan tahun berhenti bekerja</b></label>
                    <div class='input-group date' id='myDatepicker5'>
                      <input type="text" name="c5" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <!-- Bagaimana proses saudara mendapatkan informasi mengenai adanya pekerjaan ini ?    -->
                  <div class="form-group">
                    <label for="c6"><b>6. Bagaimana proses anda mendapatkan informasi mengenai adanya pekerjaan ini ?</b></label>
                      <br><input type="radio" name="c6" class="myForm" id="c6" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c6" class="myForm" id="c6" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- Darimana saudara mengetahui atau mendapatkan informasi mengenai adanya pekerjaan ini ?  -->
                  <div class="form-group">
                    <label for="c7"><b>7. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan ini ?</b></label>
                      <br><input type="radio" name="c7" class="myForm" id="c7" checked="" value="Iklan ">&nbsp;Iklan 
                      <br><input type="radio" name="c7" class="myForm" id="c7" checked="" value="Internet ">&nbsp;Internet 
                      <br><input type="radio" name="c7" class="myForm" id="c7" checked="" value="Pengumuman di kampus">&nbsp;Pengumuman di kampus
                      <br><input type="radio" name="c7" class="myForm" id="c7" checked="" value="Koneksi (teman,dosen,saudara/keluarga, dll)">&nbsp;Koneksi (teman,dosen,saudara/keluarga, dll)
                      <br><input type="radio" name="c7" class="myForm" id="c7" checked="" value="Info lowongan kemahasiswaan">&nbsp;Info lowongan kemahasiswaan
                  </div>
                  <!-- Sejauh mana pekerjaan saudara yang terakhir sesuai dengan harapan ketika pertama kali belajar di FT-UNMA ?    -->
                  <div class="form-group">
                    <label for="c8"><b>8. Sejauh mana pekerjaan anda yang terakhir sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka ?</b></label>
                      <br><input type="radio" name="c8" class="myForm" id="c8" checked="" value="Sangat sesuai dengan harapan">&nbsp;Sangat sesuai dengan harapan
                      <br><input type="radio" name="c8" class="myForm" id="c8" checked="" value="Sesuai harapan">&nbsp;Sesuai harapan
                      <br><input type="radio" name="c8" class="myForm" id="c8" checked="" value="Kurang sesuai harapan">&nbsp;Kurang sesuai harapan
                      <br><input type="radio" name="c8" class="myForm" id="c8" checked="" value="Tidak Sesuai harapan">&nbsp;Tidak Sesuai harapan
                  </div>
                  <!-- Apakah saudara puas dengan pekerjaan saudara yang terakhir/sekarang ?     -->
                  <div class="form-group">
                    <label for="c9"><b>9. Apakah anda puas dengan pekerjaan anda yang terakhir/sekarang ?</b></label>
                      <br><input type="radio" name="c9" class="myForm" id="c9" checked="" value="Sangat puas">&nbsp;Sangat puas
                      <br><input type="radio" name="c9" class="myForm" id="c9" checked="" value="Puas">&nbsp;Puas
                      <br><input type="radio" name="c9" class="myForm" id="c9" checked="" value="Kurang puas">&nbsp;Kurang puas
                      <br><input type="radio" name="c9" class="myForm" id="c9" checked="" value="Tidak puas">&nbsp;Tidak puas
                  </div>
                  <!-- Secara umum, apa pertimbangan utama saudara memilih pekerjaan yang terakhir/sekarang ?     -->
                  <div class="form-group">
                    <label for="c10"><b>10. Secara umum, apa pertimbangan utama anda memilih pekerjaan yang terakhir/sekarang ?</b></label>
                      <br><input type="radio" name="c10" class="myForm" id="c10" checked="" value="Gaji memadai">&nbsp;Gaji memadai
                      <br><input type="radio" name="c10" class="myForm" id="c10" checked="" value="Sesuai bidang keilmuan">&nbsp;Sesuai bidang keilmuan
                      <br><input type="radio" name="c10" class="myForm" id="c10" checked="" value="Mendapatkan pengalaman">&nbsp;Mendapatkan pengalaman
                      <br><input type="radio" name="c10" class="myForm" id="c10" checked="" value="Mendapatkan ilmu pengetahuan">&nbsp;Mendapatkan ilmu pengetahuan
                      <br><input type="radio" name="c10" class="myForm" id="c10" checked="" value=" Mendapatkan keterampilan">&nbsp; Mendapatkan keterampilan
                  </div>
                  <!-- Berapa rata-rata pendapatan (take home pay=seluruh pendapatan per bulan termasuk bonus,insentif,dsb.)saudara pada pekerjaan terakhir/sekarang ?     -->
                  <div class="form-group">
                    <label for="c11"><b>11. Berapa rata-rata pendapatan (take home pay=seluruh pendapatan per bulan termasuk bonus,insentif,dsb.) anda pada pekerjaan terakhir/sekarang ?</b></label>
                      <select class="form-control" name="c11" id="c11">
                        <option name="c11" id="c11" value="Kurang dari Rp. 1.000.000">Kurang dari Rp. 1.000.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 1000.000 - Rp. 3000.000">Lebih dari Rp. 1000.000 - Rp. 3000.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 3000.000 - Rp. 5000.000">Lebih dari Rp. 3000.000 - Rp. 5000.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 5000.000 - Rp. 7.500.000">Lebih dari Rp. 5000.000 - Rp. 7.500.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 7.500.000 - Rp. 10.000.000">Lebih dari Rp. 7.500.000 - Rp. 10.000.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 10.000.000 - Rp. 12.500.000">Lebih dari Rp. 10.000.000 - Rp. 12.500.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 12.500.000 - Rp. 15.000.000">Lebih dari Rp. 12.500.000 - Rp. 15.000.000</option>
                        <option name="c11" id="c11" value="Lebih dari Rp. 15.000.000">Lebih dari Rp. 15.000.000</option>
                      </select>
                  </div>
                  <!--  Apakah pekerjaan saudara ini berhubungan dengan ilmu yang saudara pelajari ?   -->
                  <div class="form-group">
                    <label for="c12"><b>12. Apakah pekerjaan anda ini berhubungan dengan ilmu yang anda pelajari ?</b></label>
                      <br><input type="radio" name="c12" class="myForm" id="c12" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c12" class="myForm" id="c12" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!--  Menurut saudara, bagaimana kebutuhan institusi tempat saudara bekerja terhadap lulusan dari program studi/jurusan saudara     -->
                  <div class="form-group">
                    <label for="c13"><b>13. Menurut anda, bagaimana kebutuhan institusi tempat anda bekerja terhadap lulusan dari program studi/jurusan anda</b></label>
                      <br><input type="radio" name="c13" class="myForm" id="c13" checked="" value="Sangat Tinggi">&nbsp;Sangat Tinggi
                      <br><input type="radio" name="c13" class="myForm" id="c13" checked="" value="Tinggi">&nbsp;Tinggi
                      <br><input type="radio" name="c13" class="myForm" id="c13" checked="" value="Rendah">&nbsp;Rendah
                      <br><input type="radio" name="c13" class="myForm" id="c13" checked="" value="Sangat Rendah">&nbsp;Sangat Rendah
                  </div>
                  <!--  Sebelumnya, apakah saudara pernah bekerja di tempat lain ?     -->
                  <div class="form-group">
                    <label for="c14"><b>14. Sebelumnya, apakah anda pernah bekerja di tempat lain ?</b></label>
                      <br><input type="radio" name="c14" class="myForm" id="c14" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c14" class="myForm" id="c14" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!--  Sudah berapa kali saudara berganti pekerjaan ?   -->
                  <div class="form-group">
                    <label for="c15"><b>15. Sudah berapa kali anda berganti pekerjaan ?</b></label>
                      <br><input type="radio" name="c15" class="myForm" id="c15" checked="" value="Satu Kali">&nbsp;Satu Kali
                      <br><input type="radio" name="c15" class="myForm" id="c15" checked="" value="Dua Kali">&nbsp;Dua Kali
                      <br><input type="radio" name="c15" class="myForm" id="c15" checked="" value="Tiga Kali">&nbsp;Tiga Kali
                      <br><input type="radio" name="c15" class="myForm" id="c15" checked="" value="Lebih dari tiga kali">&nbsp;Lebih dari tiga kali
                  </div>
                  <!--  apakah saudara masih ingin berpindah kerja ?     -->
                  <div class="form-group">
                    <label for="c16"><b>16. apakah anda masih ingin berpindah kerja ?</b></label>
                      <br><input type="radio" name="c16" class="myForm" id="c16" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c16" class="myForm" id="c16" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                 <!-- Nama tempat bekerja pertama kali -->
                  <div class="form-group">
                    <label for="c17"><b>17. Nama tempat bekerja pertama kali</b></label>
                    <input type="text" name="c17" id="c17" class="form-control" id="f1-first-name">
                  </div>
                 <!-- Jabatan/posisi terakhir dalam pekerjaan pertama    -->
                  <div class="form-group">
                    <label for="c18"><b>18. Jabatan/posisi dalam pekerjaan pertama</b></label>
                    <input type="text" name="c18" id="c18" class="form-control" id="f1-first-name">
                  </div>
                 <!-- C3 | Bulan dan tahun mulai bekerja    -->
                  <div class="form-group">
                    <label for="c19"><b>19. Bulan dan tahun mulai bekerja</b></label>
                    <div class='input-group date' id='myDatepicker6'>
                      <input type="text" name="c19" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                 <!-- Bulan dan tahun berhenti bekerja -->
                  <div class="form-group">
                    <label for="c20"><b>20. Bulan dan tahun berhenti bekerja</b></label>
                    <div class='input-group date' id='myDatepicker7'>
                      <input type="text" name="c20" class="form-control" id="f1-first-name" readonly="readonly" style="background-color: white">
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <!--  Bagaimana proses saudara mendapatkan pekerjaan pertama ini ?       -->
                  <div class="form-group">
                    <label for="c21"><b>21. Bagaimana proses anda mendapatkan pekerjaan pertama ini ?</b></label>
                      <br><input type="radio" name="c21" class="myForm" id="c21" checked="" value="Aktif (mencari sendiri) ">&nbsp;Aktif (mencari sendiri) 
                      <br><input type="radio" name="c21" class="myForm" id="c21" checked="" value="Pasif (ditawari pekerjaan)">&nbsp;Pasif (ditawari pekerjaan)
                  </div>
                  <!-- Darimana saudara mengetahui atau mendapatkan informasi mengenai adanya pekerjaan pertama ini ?  -->
                  <div class="form-group">
                    <label for="c22"><b>22. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan pertama ini ?</b></label>
                      <br><input type="radio" name="c22" class="myForm" id="c22" checked="" value="Iklan ">&nbsp;Iklan 
                      <br><input type="radio" name="c22" class="myForm" id="c22" checked="" value="Internet ">&nbsp;Internet 
                      <br><input type="radio" name="c22" class="myForm" id="c22" checked="" value="Pengumuman di kampus">&nbsp;Pengumuman di kampus
                      <br><input type="radio" name="c22" class="myForm" id="c22" checked="" value="Koneksi (teman,dosen,saudara/keluarga, dll)">&nbsp;Koneksi (teman,dosen,saudara/keluarga, dll)
                      <br><input type="radio" name="c22" class="myForm" id="c22" checked="" value="PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)">&nbsp;PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)
                  </div>
                  <!-- Sejauh mana pekerjaan pertama saudara sesuai dengan harapan ketika pertama kali belajar di FT-UNMA      -->
                  <div class="form-group">
                    <label for="c23"><b>23. Sejauh mana pekerjaan pertama anda sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka</b></label>
                      <br><input type="radio" name="c23" class="myForm" id="c23" checked="" value="Sangat sesuai dengan harapan">&nbsp;Sangat sesuai dengan harapan
                      <br><input type="radio" name="c23" class="myForm" id="c23" checked="" value="Sesuai harapan">&nbsp;Sesuai harapan
                      <br><input type="radio" name="c23" class="myForm" id="c23" checked="" value="Kurang sesuai harapan">&nbsp;Kurang sesuai harapan
                      <br><input type="radio" name="c23" class="myForm" id="c23" checked="" value="Tidak Sesuai harapan">&nbsp;Tidak Sesuai harapan
                  </div>
                  <!--  Apakah saudara puas dengan pekerjaan pertama saudara ?       -->
                  <div class="form-group">
                    <label for="c24"><b>24. Apakah anda puas dengan pekerjaan pertama anda ?</b></label>
                      <br><input type="radio" name="c24" class="myForm" id="c24" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c24" class="myForm" id="c24" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- SSecara umum, apa pertimbangan utama saudara dalam memlilih pekerjaan pertama ?     -->
                  <div class="form-group">
                    <label for="c25"><b>25. Secara umum, apa pertimbangan utama anda dalam memlilih pekerjaan pertama ?</b></label>
                      <br><input type="radio" name="c25" class="myForm" id="c25" checked="" value="Gaji memadai">&nbsp;Gaji memadai
                      <br><input type="radio" name="c25" class="myForm" id="c25" checked="" value="Sesuai bidang keilmuan">&nbsp;Sesuai bidang keilmuan
                      <br><input type="radio" name="c25" class="myForm" id="c25" checked="" value="Mendapatkan pengalaman">&nbsp;Mendapatkan pengalaman
                      <br><input type="radio" name="c25" class="myForm" id="c25" checked="" value="Mendapatkan ilmu pengetahuan">&nbsp;Mendapatkan ilmu pengetahuan
                      <br><input type="radio" name="c25" class="myForm" id="c25" checked="" value=" Mendapatkan keterampilan">&nbsp; Mendapatkan keterampilan
                  </div>
                  <!--  Apakah pekerjaan pertama saudara berhubungan dengan bidang ilmu yang saudara pelajari di program studi ?   -->
                  <div class="form-group">
                    <label for="c26"><b>26. Apakah pekerjaan pertama saudara berhubungan dengan bidang ilmu yang saudara pelajari di program studi ?</b></label>
                      <br><input type="radio" name="c26" class="myForm" id="c26" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="c26" class="myForm" id="c26" checked="" value="Tidak">&nbsp;Tidak
                  </div>

                  <!-- button -->
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>

<!-------------------------------------------------------------------- RELEVANSI PENDIDIKAN  --------------------------------------------------------->
                <fieldset>
                  <!-- Apakah pendidikan yang saudara dapat di FT-UNMA relevan dengan pekerjaan saudara ?   -->
                  <div class="form-group">
                    <label for="d1"><b>1. Apakah pendidikan yang anda dapat di Universitas Majalengka relevan dengan pekerjaan anda ?</b></label>
                      <br><input type="radio" name="d1" class="myForm" id="d1" checked="" value="Ya">&nbsp;Ya
                      <br><input type="radio" name="d1" class="myForm" id="d1" checked="" value="Tidak">&nbsp;Tidak
                  </div>
                  <!-- Dari pengalaman saudara bekerja, apa saran praktis saudara untuk pendidikan di FT-UNMA dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ? -->
                  <div class="form-group">
                    <label for="d2"><b>2. Dari pengalaman anda bekerja, apa saran praktis anda untuk pendidikan di Universitas Majalengka dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ?</b></label>
                    <textarea id="ta1" name="d2" class="f1-about-yourself form-control"></textarea>
                  </div>
                  <!-- Saat belajar di FT-UNMA, menurut saudara seberapa penting pengalaman pembelajaran berikut ini memberikan kontribusi dalam dunia kerja ?   -->
                  <label for="d3"><b>3. Saat belajar di Universitas Majalengka, menurut anda seberapa penting pengalaman pembelajaran berikut ini memberikan kontribusi dalam dunia kerja ?</b></label>
                  <!-- 1. Pengalaman belajar di dalam kelas    -->
                  <div class="form-group">
                    <label for="d4"><b>Pengalaman belajar di dalam kelas></b></label>
                      <br><input type="radio" name="d4" class="myForm" id="d4" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d4" class="myForm" id="d4" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d4" class="myForm" id="d4" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d4" class="myForm" id="d4" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 2. Pengalaman belajar di laboratorium    -->
                  <div class="form-group">
                    <label for="d5"><b>Pengalaman belajar di laboratorium</b></label>
                      <br><input type="radio" name="d5" class="myForm" id="d5" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d5" class="myForm" id="d5" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d5" class="myForm" id="d5" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d5" class="myForm" id="d5" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 3. Pengalaman belajar di masyarakat    -->
                  <div class="form-group">
                    <label for="d6"><b>Pengalaman belajar di masyarakat</b></label>
                      <br><input type="radio" name="d6" class="myForm" id="d6" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d6" class="myForm" id="d6" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d6" class="myForm" id="d6" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d6" class="myForm" id="d6" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 4. Pengalaman belajar di perusahaan/instansi   -->
                  <div class="form-group">
                    <label for="d7"><b>Pengalaman belajar di perusahaan/instansi </b></label>
                      <br><input type="radio" name="d7" class="myForm" id="d7" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d7" class="myForm" id="d7" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d7" class="myForm" id="d7" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d7" class="myForm" id="d7" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 5. Pengalaman belajar dalam oraganisasi kemahasiswaan  -->
                  <div class="form-group">
                    <label for="d8"><b>Pengalaman belajar dalam oraganisasi kemahasiswaan</b></label>
                      <br><input type="radio" name="d8" class="myForm" id="d8" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d8" class="myForm" id="d8" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d8" class="myForm" id="d8" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d8" class="myForm" id="d8" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 6. Pengalaman belajar dalam pergaulan kampus  -->
                  <div class="form-group">
                    <label for="d9"><b>Pengalaman belajar dalam pergaulan kampus</b></label>
                      <br><input type="radio" name="d9" class="myForm" id="d9" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d9" class="myForm" id="d9" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d9" class="myForm" id="d9" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d9" class="myForm" id="d9" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- 7. Pengalaman belajar mandiri   -->
                  <div class="form-group">
                    <label for="d10"><b>Pengalaman belajar mandiri </b></label>
                      <br><input type="radio" name="d10" class="myForm" id="d10" checked="" value="Sangat Penting">&nbsp;Sangat Penting
                      <br><input type="radio" name="d10" class="myForm" id="d10" checked="" value="Penting">&nbsp;Penting
                      <br><input type="radio" name="d10" class="myForm" id="d10" checked="" value="Kurang Penting">&nbsp;Kurang Penting
                      <br><input type="radio" name="d10" class="myForm" id="d10" checked="" value="Tidak Penting">&nbsp;Tidak Penting
                  </div>
                  <!-- Saat baru lulus, sejauh mana saudara merasa mampu bersaing dengan lulusan perguruan tinggi lain ?   -->
                  <div class="form-group">
                    <label for="d11"><b>4. Saat baru lulus, sejauh mana anda merasa mampu bersaing dengan lulusan perguruan tinggi lain ?</b></label>
                      <br><input type="radio" name="d11" class="myForm" id="d11" checked="" value="Sangat mampu">&nbsp;Sangat mampu
                      <br><input type="radio" name="d11" class="myForm" id="d11" checked="" value="mampu">&nbsp;mampu
                      <br><input type="radio" name="d11" class="myForm" id="d11" checked="" value="Kurang mampu">&nbsp;Kurang mampu
                      <br><input type="radio" name="d11" class="myForm" id="d11" checked="" value="Tidak mampu">&nbsp;Tidak mampu
                  </div>
                  <!-- Sejauh ini, menurut saudara lulusan UNMA yang bagaiamana yang diperlukan oleh pasar/lapangan kerja ?   -->
                  <div class="form-group">
                    <label for="d12"><b>5. Sejauh ini, menurut anda lulusan Universitas Majalengka yang bagaimana yang diperlukan oleh pasar/lapangan kerja ?</b></label>
                      <br><input type="radio" name="d12" class="myForm" id="d12" checked="" value="Generik">&nbsp;Generik
                      <br><input type="radio" name="d12" class="myForm" id="d12" checked="" value="Spesifik">&nbsp;Spesifik
                  </div>

                  <!-- button -->
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>

<!-------------------------------------------------------------------PENGUASAAN KOMPETENSI --------------------------------------------------------->
                <!-- Penguasaan Kompetensi -->
                <fieldset> 
                  <!-- Saat baru lulus, menurut penilaian saudara, sejauh mana menguasai kompetensi berikut ?   -->
                  <label for="d13"><b>1. Saat baru lulus, menurut penilaian anda, sejauh mana anda menguasai kompetensi berikut ?</b></label>
                  <!-- 1. Pengetahuan umum   -->
                  <div class="form-group">
                    <label for="d14"><b>Pengetahuan umum</b></label>
                      <br><input type="radio" name="d14" class="myForm" id="d14" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d14" class="myForm" id="d14" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d14" class="myForm" id="d14" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d14" class="myForm" id="d14" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 2. Bahasa inggris  -->
                  <div class="form-group">
                    <label for="d15"><b>Bahasa inggris </b></label>
                      <br><input type="radio" name="d15" class="myForm" id="d15" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d15" class="myForm" id="d15" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d15" class="myForm" id="d15" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d15" class="myForm" id="d15" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!--3. Komputer   -->
                  <div class="form-group">
                    <label for="d16"><b>Komputer</b></label>
                      <br><input type="radio" name="d16" class="myForm" id="d16" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d16" class="myForm" id="d16" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d16" class="myForm" id="d16" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d16" class="myForm" id="d16" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 4. Metodologi penelitian -->
                  <div class="form-group">
                    <label for="d17"><b>Metodologi penelitian</b></label>
                      <br><input type="radio" name="d17" class="myForm" id="d17" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d17" class="myForm" id="d17" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d17" class="myForm" id="d17" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d17" class="myForm" id="d17" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 5. Kerjasama tim   -->
                  <div class="form-group">
                    <label for="d18"><b>Kerjasama tim </b></label>
                      <br><input type="radio" name="d18" class="myForm" id="d18" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d18" class="myForm" id="d18" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d18" class="myForm" id="d18" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d18" class="myForm" id="d18" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 6. Keterampilan komunikasi lisan   -->
                  <div class="form-group">
                    <label for="d19"><b>Keterampilan komunikasi lisan</b></label>
                      <br><input type="radio" name="d19" class="myForm" id="d19" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d19" class="myForm" id="d19" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d19" class="myForm" id="d19" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d19" class="myForm" id="d19" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 7. Keterampilan komunikasi tertulis  -->
                  <div class="form-group">
                    <label for="d20"><b>Keterampilan komunikasi tertulis</b></label>
                      <br><input type="radio" name="d20" class="myForm" id="d20" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d20" class="myForm" id="d20" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d20" class="myForm" id="d20" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d20" class="myForm" id="d20" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 8. Proses pemberdayaan masyarakat  -->
                  <div class="form-group">
                    <label for="d21"><b>Proses pemberdayaan masyarakat</b></label>
                      <br><input type="radio" name="d21" class="myForm" id="d21" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d21" class="myForm" id="d21" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d21" class="myForm" id="d21" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d21" class="myForm" id="d21" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 9. Pengetahuan teoritis spesifik fakultas/departemen -->
                  <div class="form-group">
                    <label for="d22"><b>Pengetahuan teoritis spesifik fakultas/departemen</b></label>
                      <br><input type="radio" name="d22" class="myForm" id="d22" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d22" class="myForm" id="d22" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d22" class="myForm" id="d22" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d22" class="myForm" id="d22" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 10. Pengetahuan praktis praktis fakultas/departemen   -->
                  <div class="form-group">
                    <label for="d23"><b>Pengetahuan praktis praktis fakultas/departemen</b></label>
                      <br><input type="radio" name="d23" class="myForm" id="d23" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d23" class="myForm" id="d23" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d23" class="myForm" id="d23" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d23" class="myForm" id="d23" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 11. Manajemen organisasi   -->
                  <div class="form-group">
                    <label for="d24"><b>Manajemen organisasi</b></label>
                      <br><input type="radio" name="d24" class="myForm" id="d24" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d24" class="myForm" id="d24" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d24" class="myForm" id="d24" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d24" class="myForm" id="d24" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>
                  <!-- 12. Kepemimpinan/leadership   -->
                  <div class="form-group">
                    <label for="d25"><b>Kepemimpinan/leadership</b></label>
                      <br><input type="radio" name="d25" class="myForm" id="d25" checked="" value="Sangat Menguasai">&nbsp;Sangat Menguasai
                      <br><input type="radio" name="d25" class="myForm" id="d25" checked="" value="Menguasai">&nbsp;Menguasai
                      <br><input type="radio" name="d25" class="myForm" id="d25" checked="" value="Kurang Menguasai">&nbsp;Kurang Menguasai
                      <br><input type="radio" name="d25" class="myForm" id="d25" checked="" value="Tidak Menguasai">&nbsp;Tidak Menguasai
                  </div>

                  <!-- button -->
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>

<!-------------------------------------------------------------------- KOMPETENSI DIPERLUKAN --------------------------------------------------------->
                <!-- Komptetensi Diperlukan -->
                <fieldset> 
                  <!-- SDalam pekerjaan, menurut penilaian saudara sejauh mana kompetensi berikut diperlukan ?  -->
                  <label for="e1"><b>1. Dalam pekerjaan, menurut penilaian saudara sejauh mana kompetensi berikut diperlukan</b></label>
                  <!-- 1. Pengetahuan umum   -->
                  <div class="form-group">
                    <label for="f2"><b>Pengetahuan umum</b></label>
                      <br><input type="radio" name="e2" class="myForm" id="e2" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e2" class="myForm" id="e2" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e2" class="myForm" id="e2" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e2" class="myForm" id="e2" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 2. Bahasa inggris  -->
                  <div class="form-group">
                    <label for="e3"><b>Bahasa inggris</b></label>
                      <br><input type="radio" name="e3" class="myForm" id="e3" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e3" class="myForm" id="e3" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e3" class="myForm" id="e3" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e3" class="myForm" id="e3" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!--3. Komputer   -->
                  <div class="form-group">
                    <label for="e4"><b>Komputer</b></label>
                      <br><input type="radio" name="e4" class="myForm" id="e4" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e4" class="myForm" id="e4" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e4" class="myForm" id="e4" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e4" class="myForm" id="e4" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 4. Metodologi penelitian -->
                  <div class="form-group">
                    <label for="e5"><b>Metodologi penelitian</b></label>
                      <br><input type="radio" name="e5" class="myForm" id="e5" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e5" class="myForm" id="e5" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e5" class="myForm" id="e5" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e5" class="myForm" id="e5" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 5. Kerjasama tim   -->
                  <div class="form-group">
                    <label for="e6"><b>Kerjasama tim </b></label>
                      <br><input type="radio" name="e6" class="myForm" id="e6" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e6" class="myForm" id="e6" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e6" class="myForm" id="e6" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e6" class="myForm" id="e6" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 6. Keterampilan komunikasi lisan   -->
                  <div class="form-group">
                    <label for="e7"><b>Keterampilan komunikasi lisan</b></label>
                      <br><input type="radio" name="e7" class="myForm" id="e7" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e7" class="myForm" id="e7" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e7" class="myForm" id="e7" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e7" class="myForm" id="e7" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 7. Keterampilan komunikasi tertulis  -->
                  <div class="form-group">
                    <label for="e8"><b>Keterampilan komunikasi tertulis</b></label>
                      <br><input type="radio" name="e8" class="myForm" id="e8" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e8" class="myForm" id="e8" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e8" class="myForm" id="e8" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e8" class="myForm" id="e8" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 8. Proses pemberdayaan masyarakat  -->
                  <div class="form-group">
                    <label for="e9"><b>Proses pemberdayaan masyarakat</b></label>
                      <br><input type="radio" name="e9" class="myForm" id="e9" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e9" class="myForm" id="e9" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e9" class="myForm" id="e9" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e9" class="myForm" id="e9" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 9. Pengetahuan teoritis spesifik fakultas/departemen -->
                  <div class="form-group">
                    <label for="e10"><b>Pengetahuan teoritis spesifik fakultas/departemen</b></label>
                      <br><input type="radio" name="e10" class="myForm" id="e10" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e10" class="myForm" id="e10" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e10" class="myForm" id="e10" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e10" class="myForm" id="e10" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 10. Pengetahuan praktis praktis fakultas/departemen   -->
                  <div class="form-group">
                    <label for="e11"><b>Pengetahuan praktis praktis fakultas/departemen</b></label>
                      <br><input type="radio" name="e11" class="myForm" id="e1" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e11" class="myForm" id="e1" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e11" class="myForm" id="e1" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e11" class="myForm" id="e1" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 11. Manajemen organisasi   -->
                  <div class="form-group">
                    <label for="e12"><b>Manajemen organisasi</b></label>
                      <br><input type="radio" name="e12" class="myForm" id="e12" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkann
                      <br><input type="radio" name="e12" class="myForm" id="e12" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e12" class="myForm" id="e12" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e12" class="myForm" id="e12" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>                  
                  <!-- 12. Kepemimpinan/leadership   -->
                  <div class="form-group">
                    <label for="e13"><b>Kepemimpinan/leadership</b></label>
                      <br><input type="radio" name="e13" class="myForm" id="e13" checked="" value="Sangat dibutuhkan">&nbsp;Sangat dibutuhkan
                      <br><input type="radio" name="e13" class="myForm" id="e13" checked="" value="dibutuhkan">&nbsp;dibutuhkan
                      <br><input type="radio" name="e13" class="myForm" id="e13" checked="" value="Kurang dibutuhkan">&nbsp;Kurang dibutuhkan
                      <br><input type="radio" name="e13" class="myForm" id="e13" checked="" value="Tidak dibutuhkan">&nbsp;Tidak dibutuhkan
                  </div>
                  <!-- 13. Saran dan Masukan -->
                  <div class="form-group">
                    <label for="e14"><b>2. Beri kami Masukan dan Saran agar kedepannya dapat menjadi Universitas yang lebih lebih baik </b></label>
                    <textarea id="ta1" name="e14"></textarea>
                  </div>

                  <!-- button -->
                  <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" class="btn btn-submit">SIMPAN</button>
                  </div>
                </fieldset>
  
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
      $("#ta").keyup(function (e) {
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
      $("#ta1").keyup(function (e) {
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