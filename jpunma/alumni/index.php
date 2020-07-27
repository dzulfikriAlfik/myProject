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

  <!-- Bootstrap -->
  <link href="../css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../css/vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../css/build/css/custom.min.css" rel="stylesheet">
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
              <center>
                <h2 style="color: white"><b>Menu</b></h2>
              </center>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
                </li>
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
      <div class="right-col" role="main">
        <div class="row">
          <div class="col-md-12">
            <!-- koneksi sukses -->
            <?php
            if (isset($_SESSION['savetracerSuccess'])) {
              ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <center>
                  <h5>Data Tracer Study berhasil di ubah</h5>
                </center>
              </div>
            <?php
              unset($_SESSION['savetracerSuccess']);
            }
            ?>
            <!-- koneksi sukses -->
            <?php
            if (isset($_SESSION['savetracerSuccess1'])) {
              ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <center>
                  <h5>Tracer Study berhasil di ISI Terima Kasih Atas Partisipasinya, Sekarang anda dapat membuka Informasi Lowongan Pekerjaan</h5>
                </center>
              </div>
            <?php
              unset($_SESSION['savetracerSuccess1']);
            }
            ?>

            <div class="form-group">


              <?php

              $sql = "SELECT * FROM kuesioner WHERE id_user='$_SESSION[id_user]'";
              $result = $koneksi->query($sql);

              if ($result->num_rows > 0) {
                ?>



                <div class="row well" style="background-color: white">

                  <h1 class="text-center"><b>Lowongan Kerja Tersedia</b></h1><br><br>

                  <?php

                    $sql = "SELECT * FROM job Order By Rand() Limit 4";
                    $result = $koneksi->query($sql);

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>

                      <div class="col-md-6">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="../css/images/media.jpg" alt="image" />
                            <div class="mask">
                              <p><?php echo $row['bidangjob']; ?></p>
                              <div class="tools tools-bottom">
                                <a href="viewjob.php?id=<?php echo $row['id_job']; ?>">Lihat Detail</a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <center>
                              <h2><b><?php echo $row['namajob']; ?></b></h2>
                            </center>
                          </div>
                        </div>
                      </div>

                  <?php
                      }
                    }
                    ?>
                  <div class="row" style="background-color:white">
                    <center><a href="index-jp-alumni.php" class="text-center btn btn-dark btn-lg col-md-12"><strong>Masuk Job Portal</strong></a></center>
                  </div>
                </div>


              <?php
              } else {
                ?>
                <div class="row well" style="background-color: white">
                  <center><a href="tracer-alumni.php" class="text-center btn btn-dark btn-lg col-md-12"><strong>ISI TRACER STUDY SEKARANG</strong></a></center>
                </div>
              <?php } ?>
            </div>


            <div class="col-md-12 col-md-offset well" style="background-color: white">
              <div class="panel panel-default" id="panduan" style="-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);border-color: rgba(221, 221, 221, 0);">
                <div class="panel-heading unma-padding" style="color:black">
                  <h3 class="panel-title" style="text-align:center"><i class="fa fa-bookmark-o"></i> Panduan</h3>
                </div>

                <div class="panel-body">
                  <div class="panel-body" style="background-color:#fcfcfc">
                    <pre style="background-color:white;font-family: arial;font-size:120%;line-height:25px;text-align:justify">
   <center><img src="../css/images/unma.jpg" style="width:125px;height:130px"></center>
   <center><h3>Manfaat dari kegiatan Tracer Study ini antara lain :</h3></center>
     <i class="fa fa-check" style="color: black"></i>  Untuk melengkapi database alumni Fakultas Teknik Universitas Majalengka</li></h2>
     <i class="fa fa-check" style="color: black"></i>  Sebagai sarana penghubung antara Universitas dengan alumni tentang status alumni dan orientasi lulusan ke depan</li></h2>
     <i class="fa fa-check" style="color: black"></i>  Sebagai sarana masukan kepada Universitas (Prodi) tentang apa yang diperlukan lulusan dilapangan kerja, dan hal-hal yang perlu 
          dikembangkan di Fakultas Teknik Universitas Majalengka

          Dengan demikian peran anda para alumni dalam upaya meningkatkan kualitas pendidikan di Universitas Majalengka dapat terwujud. 
    Untuk itu mohon dengan sangat kesediaannya mengisi kuisioner.
    Terima Kasih 

    Petunjuk Pengisian :
    1. Lengkapi Profil anda terlebih dahulu
    2. Setelah melengkapi profil anda dan data telah berhasil di simpan, silahkan Logout lalu login kembali
    3. Tekan tombol "ISI TRACER STUDY SEKARANG" dan isilah semua pertanyaan dengan sebenar-benarnya
    4. Anda dapat melihat dan mengubah data Tracer Study anda di menu Tracer Study yang ada di sebelah kiri
    5. Setelah data Tracer Study anda berhasil tersimpan, anda akan melihat tombol "MASUK JOB PORTAL"
    6. Di menu Job Portal anda dapat melihat Informasi Lowongan Pekerjaan

                    </pre>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
        <!-- /page content -->


      </div>
      <!-- footer content -->
      <footer>
        <div class="text-center">
          &copy;&nbsp;Dzulfikri Alkautsari 2018&nbsp;<a href="http://unma.ac.id">| Universitas Majalengka</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
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


</body>

</html>