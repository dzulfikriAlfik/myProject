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
    <!-- iCheck -->
    <link href="../css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../css/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../css/endors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../css/endors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../css/endors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../css/endors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../css/endors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <style>
      #ta {
          min-width:800px;
          min-height:auto;
          max-height:auto;
          resize:initial;
          overflow: auto;
          border:hidden;
          background-color: white;
          
      }
      #ta1 {
          width:800px;
          min-height:auto;
          max-height:auto;
          resize:none;
          overflow: auto;
          border:none;
          background-color: white;
      }

      h2,h1,h3,h5 {
          color:black;
      }

    </style>

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

        <div class="row" style="background-color: white">
          <div class="col-md-10 col-md-offset-1 well" style="background-color: white">

          <?php  
          $sql = "SELECT * FROM job INNER JOIN company ON job.id_company=company.id_company WHERE id_job='$_GET[id]'";
          $result = $koneksi->query($sql);
          if($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) 
           { 
             $sql1 = "SELECT * FROM lamar_kerja WHERE id_user='$_SESSION[id_user]' AND id_job='$row[id_job]' ";
             $result1 = $koneksi->query($sql1);

          ?>

            <center>
              <h5>Diiklankan sejak :
              <a style="color: black"><?php echo date("d/M/Y-H:i:s", strtotime($row['tanggalterbit'])); ?></a>
              </h5>
            </center>
          <!-- MENAMPILKAN DETAIL JOB -->
          <div class="col-md-12 well alert alert-success">
            <h1 class="text-center" style="color: black"><?php echo $row['namajob']; ?></h1>
            <h3 class="text-center"><?php echo $row['namacompany'];?></h3>
            <center><b><a class="fa fa-map-marker" style="font-size: 130%;color: black">&nbsp;&nbsp;<?php echo $row['kotajob'];?></a></b></center>
          </div>
          <div class="separator"></div>

          <div class="row">

            <div class="col-md-6 text-center"><h2>Bidang Pekerjaan</h2>
              <h2 style="color: black"><b><?php echo $row['bidangjob']; ?></b></h2>
            </div>

            <div class="col-md-6 text-center"><h2>Gaji</h2>
              <h2 style="color: black"><p>IDR : 
                <a style="color: black"><?php echo $row['gajiminimal']; ?></a>&nbsp;-&nbsp;
                <a style="color: black"><?php echo $row['gajimaksimal']; ?></a>
              </p></h2>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 separator"></div>

          </div>
          <!-- deskripsi -->
          <div class="row">
            <div class="col-md-6 col-md-offset-1">
              <p></p>
              <h3 class="fa fa-briefcase" style="font-size: 230%">&nbsp;&nbsp;Deskripsi Pekerjaan </h3>
            </div>
            <div class="col-md-12 col-md-offset-1">
              <textarea readonly="readonly" id="ta" disabled="disabled" style="color: black"><?php echo $row['desjob']; ?></textarea>
            </div>
            <!-- srayat -->
            <div class="col-md-1 col-md-offset-1">
              <h3 class="fa fa-book" style="font-size: 230%">&nbsp;&nbsp;Persyaratan</h3>
            </div>
            <div class="col-md-12 col-md-offset-1">
              <textarea readonly="readonly" id="ta1" disabled="disabled" style="color: black"><?php echo $row['syarat']; ?></textarea>
            </div>
            <h5 class="col-md-12 text-center well alert-success" style="color: black"><b>Email Contact For Detail : <?php echo $row['emailcompany']; ?></b></h5>
            <div class="clearfix"></div>
            <div class="col-md-12 separator"></div>   
          </div>

            <center>
              <a href="index-jp-alumni.php" class="btn btn-primary btn-lg">Kembali</a>
            </center>

            <?php
              }
            }
          ?>   
          </div>
           <div id="clear" style="display:block;height:100px;clear:both;"></div>
                
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
    <!-- iCheck -->
    <script src="../css/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../css/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../css/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../css/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../css/vendors/pdfmake/build/vfs_fonts.js"></script>
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