<?php
session_start();
if(empty($_SESSION['id_admin'])) {
  header("Location: login_admin.php");
  exit();
}
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
            <div class="clearfix" style="display:block;height:30px;clear:both"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <center><h2 style="color: white"><b>Menu</b></h2></center>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
                  <li><a><i class="fa fa-users"></i>Admin<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="adminadd.php">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-graduation-cap"></i>Alumni<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="alumnidata.php">Data Alumni</a></li>
                      <li><a href="alumniadd.php">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i>Tracer Study<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tracerstudy.php">laporan Tracer Study Alumni</a></li>
                    </ul>
                  </li>
                  <li><a href="gantipasswordadmin.php"><i class="fa fa-key"></i>Ganti Password</span></a>
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
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <!-- form tambah data alumni -->
            <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
              <div class="x_panel">
                <div class="x_title">
                  <h1 class="text-center">Tambah Data Alumni</h1>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="post" action="adminaddalumni.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <!-- namadepan -->
                    <div class="form-group">
                      <label for="namadepan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Depan</label>
                      <div class="col-md-8 col-sm-6 col-xs-12">
                        <input type="namadepan" class="form-control" id="namadepan" name="namadepan" placeholder="Nama Depan" required="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <!-- namabelakang -->
                    <div class="form-group">
                      <label for="namabelakang" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Belakang</label>
                      <div class="col-md-8 col-sm-6 col-xs-12">
                        <input type="namabelakang" class="form-control" id="namabelakang" name="namabelakang" placeholder="Nama Belakang" required="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <!-- NPM -->
                    <div class="form-group">
                      <label for="npm" class="control-label col-md-3 col-sm-3 col-xs-12">NPM</label>
                      <div class="col-md-8 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM" required="">
                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <!-- password -->
                    <div class="form-group">
                      <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                      <div class="col-md-8 col-sm-6 col-xs-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <center>
                        <div class="col-md-12 col-md-offset" style="background-color: white">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button class="btn btn-primary" type="reset">Reset</button>              
                        <div id="clear" style="display:block;height:30px"></div>
                      <!-- koneksi sukses -->
                      <?php 
                      if(isset($_SESSION['registerCompleted'])) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <center><h5>Berhasil Terdaftar</h5></center>
                        </div>
                      <?php
                       unset($_SESSION['registerCompleted']); }
                      ?>
                      <!-- koneksi error -->
                      <?php 
                      if(isset($_SESSION['registerError'])) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <center><h5>NPM sudah terdaftar Silahkan gunakan NPM lain !</h5></center>
                        </div>
                      <?php
                       unset($_SESSION['registerError']); }
                      ?>
                        </div>
                      </center>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end form tambah data alumni -->              
              <div id="clear" style="display:block;height:100px"></div>
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

  
  </body>
</html>