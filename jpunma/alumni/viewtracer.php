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

    <!-- Bootstrap -->
    <link href="../css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
    <style>
      #ta {
          justify-content: justify;
          min-width:965px;
          min-height:auto;
          max-height:auto;
          resize:none;
          overflow: auto;
          border:hidden;
          background-color: white;
          
      }
      #ta1 {
          justify-content:justify; 
          width:965px;
          min-height:auto;
          max-height:auto;
          resize:none;
          overflow: auto;
          border:none;
          background-color: white;
      }

    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix" style="display:block;height:10px;clear:both"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../css/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?php echo $_SESSION['nama']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <div class="clearfix" style="display:block;height:20px;clear:both"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <center><h2 style="color: white"><b>Menu</b></h2></center>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li></li>
                  <li><a href="profile-alumni.php"><i class="fa fa-user"></i>Profile</a></li>
                  <li><a><i class="fa fa-book"></i>Tracer Study<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viewtracer.php">Lihat Hasil Tracer Study Anda</a></li>
                    </ul>
                  </li>
                  <li><a href="gantipasswordalumni.php"><i class="fa fa-key"></i>Ganti Password</a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                <div id="clear" style="display:block;height:10px;clear:both;"></div> 
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="background-color: ">
          <div class="row">
            <div class="col-md-12 col-md-offset well" style="background-color: white">
              <div class="col-md-12 col-md-offset">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Hasil Quesioner Tracer Study anda</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

<!-- -------------------------------------------------------KUESIONER ------------------------------------------------------------- 1 -->
                        <!-- koneksi sukses -->
                        <?php 
                        if(isset($_SESSION['savetracerSuccess'])) {
                          ?>
                          <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <center><h5>Data Tracer Study berhasil di ubah</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['savetracerSuccess']); }
                        ?>
                        <!-- koneksi sukses -->
                        <?php 
                        if(isset($_SESSION['savetracerSuccess1'])) {
                          ?>
                          <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <center><h5>Data Tracer Study berhasil di ubah</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['savetracerSuccess1']); }
                        ?>

                          <!-- koneksi database -->
                          <?php  
                           $sql = "SELECT * FROM kuesioner WHERE id_user='$_SESSION[id_user]'";
                           $result = $koneksi->query($sql);

                           if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                          ?>
                          <!-- endkoneksi -->
            <!-- -------------------------------------------------------KUESIONER ------------------------------------------------------------- 1 -->

                            <!------------------------------- STEP 1 DATA PRIBADI-------------------------------- -->
                            <h1><center><b>Data Pribadi</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <pre><b>1.  Nama                : <?php echo $row['dp_nama']; ?>         </pre>
                            <pre><b>2.  NPM                 : <?php echo $row['dp_npm']; ?>          </pre>
                            <pre><b>3.  Jenis Kelamin       : <?php echo $row['dp_jk']; ?>           </pre>
                            <pre><b>4.  Tanggal Lahir       : <?php echo $row['dp_tanggallahir']; ?> </pre>
                            <pre><b>5.  Program Studi       : <?php echo $row['dp_jurusan']; ?>      </pre>
                            <pre><b>6.  Tahun Masuk         : <?php echo $row['dp_tahunmasuk']; ?>   </pre>
                            <pre><b>7.  Tahun Lulus         : <?php echo $row['dp_tahunlulus']; ?>   </pre>
                            <pre><b>8.  Alamat              : <?php echo $row['dp_alamat']; ?>       </pre>
                            <pre><b>9.  Kota                : <?php echo $row['dp_kota']; ?>         </pre>
                            <pre><b>10. Provinsi            : <?php echo $row['dp_provinsi']; ?>     </pre>
                            <pre><b>11. Kode Pos            : <?php echo $row['dp_kodepos']; ?>      </pre>
                            <pre><b>12. Nomor Telepon       : <?php echo $row['dp_kontak']; ?>       </pre>
                            <pre><b>13. Email               : <?php echo $row['dp_email']; ?>        </pre>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:30px;clear:both"></div>


<!---------------------------------------------- STEP 2 RIWAYAT PENDIDIKAN --------------------------------------------- -->
                            <h1><center><b>Riwayat Pendidikan</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <h4>1. Pada saat masuk Universitas Majalengka, prodi yang saudara pilih merupakan pilihan ke ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b1']; ?></b></h4></pre>
                            <h4>2. Apakah anda berorganisasi ketika masih aktif menjadi mahasiswa ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b2']; ?></b></h4></pre>
                            <h4>3. Setelah lulus sarjana dari Universitas Majalengka, apakah anda melanjutkan pendidikan ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b3']; ?></b></h4></pre>
                            <h4>4. Dimana anda melanjutkan pendidikan ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b4']; ?></b></h4></pre>
                            <h4>5. Apa alasan utama anda melanjutkan pendidikan ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b5']; ?></b></h4></pre>
                            <h4>6. Pada saat baru lulus, dimana anda ingin bekerja ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b6']; ?></b></h4></pre>
                            <h4>7. Pada saat baru lulus, apakah anda bersedia bekerja/ditempatkan di daerah ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b7']; ?></b></h4></pre>
                            <h4>8. Pada saat baru lulus, apakah anda mengetahui cara/prosedur melamar pekerjaan ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b8']; ?></b></h4></pre>
                            <h4>9. Menurut anda, kapan seharusnya cara/prosedur melamar pekerjaan harus mulai diketahui ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b9']; ?></b></h4></pre>
                            <h4>10. Pada saat baru lulus, apakah saudara mengetahui cara membuat CV untuk melamar pekerjaan ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b10']; ?></b></h4></pre>
                            <h4>11. Menurut anda, kapan seharusnya cara membuat CV harus mulai diketahui ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b11']; ?></b></h4></pre>
                            <h4>12. Berapa IPK terakhir anda ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b12']; ?></b></h4></pre>
                            <h4>13. Setelah lulus, apakah anda sudah/pernah bekerja ?</h4>
                              <h4><pre>Jawaban <?php echo $row['dp_nama']; ?>   : <b><?php echo $row['b13']; ?></b></h4></pre>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:30px;clear:both"></div>


<!-- -------------------------------------- STEP 3 Riwayat pekerjaan terakhir ------------------------------------ -->
                            <h1><center><b>Riwayat Pekerjaan Terakhir/Sekarang</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <h4>1. Dimana tempat anda bekerja sekarang ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c1']; ?></b></pre>
                            <h4>2. Jenis instansi/bidang usaha/industri  ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c2']; ?></b></pre>
                            <h4>3. Jabatan/posisi dalam pekerjaan ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c3']; ?></b></pre>
                            <h4>4. Bulan dan tahun mulai bekerja ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c4']; ?></b></pre>
                            <h4>5. Bulan dan tahun berhenti bekerja ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c5']; ?></b></pre>
                            <h4>6. Bagaimana proses anda mendapatkan informasi mengenai adanya pekerjaan ini ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c6']; ?></b></pre>
                            <h4>7. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan ini ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c7']; ?></b></pre>
                            <h4>8. Sejauh mana pekerjaan anda yang terakhir sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c8']; ?></b></pre>
                            <h4>9. Apakah anda puas dengan pekerjaan anda yang terakhir/sekarang ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c9']; ?></b></pre>
                            <h4>10. Secara umum, apa pertimbangan utama anda memilih pekerjaan yang terakhir/sekarang ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c10']; ?></b></pre>
                            <h4>11. Berapa rata-rata pendapatan anda pada pekerjaan terakhir/sekarang ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c11']; ?></b></pre>
                            <h4>12. Apakah pekerjaan anda ini berhubungan dengan ilmu yang anda pelajari ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c12']; ?></b></pre>
                            <h4>13. Menurut anda, bagaimana kebutuhan institusi tempat anda bekerja terhadap lulusan dari program studi/jurusan anda ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c13']; ?></b></pre>
                            <h4>14. Sebelumnya, apakah anda pernah bekerja di tempat lain ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c14']; ?></b></pre>
                            <h4>15. Sudah berapa kali anda berganti pekerjaan ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c15']; ?></b></pre>
                            <h4>16. apakah anda masih ingin berpindah kerja ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c16']; ?></b></pre>
                            <h4>17. Nama tempat bekerja pertama kali :</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c17']; ?></b></pre>
                            <h4>18. Jabatan/posisi dalam pekerjaan :</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c18']; ?></b></pre>
                            <h4>19. Bulan dan tahun mulai bekerja :</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c19']; ?></b></pre>
                            <h4>20. Bulan dan tahun berhenti bekerja :</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c20']; ?></b></pre>
                            <h4>21. Bagaimana proses anda mendapatkan pekerjaan pertama ini ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c21']; ?></b></pre>
                            <h4>22. Darimana anda mengetahui atau mendapatkan informasi mengenai adanya pekerjaan pertama ini ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c22']; ?></b></pre>
                            <h4>23. Sejauh mana pekerjaan pertama anda sesuai dengan harapan ketika pertama kali belajar di Universitas Majalengka ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c23']; ?></b></pre>
                            <h4>24. Apakah anda puas dengan pekerjaan pertama anda ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c24']; ?></b></pre>
                            <h4>25. Secara umum, apa pertimbangan utama anda dalam memlilih pekerjaan pertama ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c25']; ?></b></pre>
                            <h4>26. Apakah pekerjaan pertama saudara berhubungan dengan bidang ilmu yang saudara pelajari di program studi ?</h4>
                              <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['c26']; ?></b></pre>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:30px;clear:both"></div>

<!-- --------------------------------------------------------------KUESIONER LANJUTAN -------------------------------------------------- -->

                 <!------------------------------- STEP 4 Relevansi Pendidikan Dengan Pekerjaan -------------------------------- -->
                            <h1><center><b>Relevansi Pendidikan Dengan Pekerjaan</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <h4>1. Apakah pendidikan yang anda dapat di Universitas Majalengka relevan dengan pekerjaan anda ?</h4>
                            <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['d1']; ?></b></pre>
                            <h4 style="line-height: 25px">2. Dari pengalaman anda bekerja, apa saran praktis anda untuk pendidikan di Universitas Majalengka dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ?&nbsp;</h4>
                              <div class="col-md-12 col-md-offset">
                                <pre style="background-color: white"><h4><b><textarea readonly="readonly" id="ta1" disabled="disabled" style="line-height:25px"><?php echo $row['d2']; ?></textarea></b></h4>
                              </div>
                            <h4 style="line-height: 25px">3. Saat belajar di Universitas Majalengka, menurut anda seberapa penting pengalaman pembelajaran berikut ini memberikan kontribusi dalam dunia kerja ?</h4>
                            <pre>  a. Pengalaman belajar di kelas                       : <b><?php echo $row['d4']; ?></b></h4></pre>
                            <pre>  b. Pengalaman belajar di laboratorium                : <b><?php echo $row['d5']; ?></b></h4></pre>
                            <pre>  c. Pengalaman belajar di masyarakat                  : <b><?php echo $row['d6']; ?></b></h4></pre>
                            <pre>  d. Pengalaman belajar di perusahaan/instansi         : <b><?php echo $row['d7']; ?></b></h4></pre>
                            <pre>  e. Pengalaman belajar di oraganisasi kemahasiswaan   : <b><?php echo $row['d8']; ?></b></h4></pre>
                            <pre>  g. Pengalaman belajar di dalam pergaulan kampus      : <b><?php echo $row['d9']; ?></b></h4></pre>
                            <pre>  h. Pengalaman belajar mandiri                        : <b><?php echo $row['d10']; ?></b></h4></pre>
                            <h4>4. Saat baru lulus, sejauh mana anda merasa mampu bersaing dengan lulusan perguruan tinggi lain ?</h4>
                            <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['d11']; ?></b></h4></pre>
                            <h4>5. Sejauh ini, menurut anda lulusan Universitas Majalengka yang bagaimana yang diperlukan oleh pasar/lapangan kerja ?</h4>
                            <pre>Jawaban <?php echo $row['dp_nama']; ?> : <b><?php echo $row['d12']; ?></b></h4></pre>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:30px;clear:both"></div>


         <!---------------------------------------    STEP 5 Penguasaan Kompetensi --------------------------------------------- -->
                            <h1><center><b>Penguasaan Kompetensi</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <h4>1. Saat baru lulus, menurut penilaian anda, sejauh mana anda menguasai kompetensi berikut ?</h4>
                            <pre>  a. Pengetahuan umum                                   : <b> <?php echo $row['d14']; ?></b></pre>
                            <pre>  b. Bahasa inggris                                     : <b> <?php echo $row['d15']; ?></b></pre>
                            <pre>  c. Komputer                                           : <b> <?php echo $row['d16']; ?></b></pre>
                            <pre>  d. Metodologi penelitian                              : <b> <?php echo $row['d17']; ?></b></pre>
                            <pre>  e. Kerjasama tim                                      : <b> <?php echo $row['d18']; ?></b></pre>
                            <pre>  f. Keterampilan komunikasi lisan                      : <b> <?php echo $row['d19']; ?></b></pre>
                            <pre>  g. Keterampilan komunikasi tertulis                   : <b> <?php echo $row['d20']; ?></b></pre>
                            <pre>  h. Proses pemberdayaan masyarakat                     : <b> <?php echo $row['d21']; ?></b></pre>
                            <pre>  i. Pengetahuan teoritis spesifik fakultas/departemen  : <b> <?php echo $row['d22']; ?></b></pre>
                            <pre>  j. Pengetahuan praktis praktis fakultas/departemen    : <b> <?php echo $row['d23']; ?></b></pre>
                            <pre>  k. Manajemen organisasi                               : <b> <?php echo $row['d24']; ?></b></pre>
                            <pre>  l. Kepemimpinan/leadership                            : <b> <?php echo $row['d25']; ?></b></pre>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:30px;clear:both"></div></pre>


         <!-- ----------------------- FINAL STEP Komptetensi Diperlukan dan Saran untuk Universitas -------------------------- -->
                            <h1><center><b>Final Step | Komptetensi Diperlukan dan Saran untuk Universitas</b></center></h1>
                            <div class="separator"></div>
                            <div class="clearfix" style="display:block;height:10px;clear:both"></div>
                            <h4><b>1. Dalam pekerjaan, menurut penilaian saudara sejauh mana kompetensi berikut diperlukan</b></h4>
                            <pre>  a. Pengetahuan umum                                   : <b><?php echo $row['e2']; ?></b></pre>
                            <pre>  b. Bahasa inggris                                     : <b><?php echo $row['e3']; ?></b></pre>
                            <pre>  c. Komputer                                           : <b><?php echo $row['e4']; ?></b></pre>
                            <pre>  d. Metodologi penelitian                              : <b><?php echo $row['e5']; ?></b></pre>
                            <pre>  e. Kerjasama tim                                      : <b><?php echo $row['e6']; ?></b></pre>
                            <pre>  f. Keterampilan komunikasi lisan                      : <b><?php echo $row['e7']; ?></b></pre>
                            <pre>  g. Keterampilan komunikasi tertulis                   : <b><?php echo $row['e8']; ?></b></pre>
                            <pre>  h. Proses pemberdayaan masyarakat                     : <b><?php echo $row['e9']; ?></b></pre>
                            <pre>  i. Pengetahuan teoritis spesifik fakultas/departemen  : <b><?php echo $row['e10']; ?></b></pre>
                            <pre>  j. Pengetahuan praktis praktis fakultas/departemen    : <b><?php echo $row['e11']; ?></b></pre>
                            <pre>  k. Manajemen organisasi                               : <b><?php echo $row['e12']; ?></b></pre>
                            <pre>  l. Kepemimpinan/leadership                            : <b><?php echo $row['e13']; ?></b></pre>
                            <h4><b>2. Saran Anda Untuk Unviversitas :</b></h4>
                              <div class="col-md-12 col-md-offset">
                                <pre style="background-color:white"><h4><b><textarea readonly="readonly" id="ta" disabled="disabled" style="line-height:25px;"><?php echo $row['e14']; ?></textarea></b></h4></pre>
                              </div>
                            <br><br>
                            <div class="separator"></div>
                            <br><br>
                            <h1 class="text-center" style="font-size:40">
                              <a href="tracer-alumniedit.php?id=<?php echo $row['id_label']; ?>" class="btn btn-dark" style="height:50px;width:100px;size:100px;">Edit</a>
                            </h1>

                          <?php
                              }
                            }
                          ?>

                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="text-center">
            &copy;&nbsp;Dzulfikri Alkautsari 2018&nbsp;<a href="http://unma.ac.id">| Universitas Majalengka</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../css/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../css/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../css/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../css/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../css/build/js/custom.min.js"></script>
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

      autoheight($("#ta1"));
  </script> 

  
  </body>
</html>