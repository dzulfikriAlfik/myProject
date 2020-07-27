<?php
session_start();
if (empty($_SESSION['id_admin'])) {
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
              <h2><b><?php echo $_SESSION['nama']; ?></b></h2>
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
      <div class="right_col" role="main" style="background-color: ">
        <div class="row" style="background-color: ">
          <div id="clear" style="display:block;height:30px;clear:both;"></div>
          <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
            <div class="jumbotron text-center" style="background-color: white">
              <center><img class="img-responsive avatar-view" src="../css/images/unma.jpg" style="width:130px;height:130px"></center>
              <h3 style="font-size: 50px"> Selamat Datang Admin!</h3>
              <h3>Tracer Study Alumni Universitas Majalengka</h3>
              <div id="clear" style="display:block;height:10px;clear:both;"></div>
              <div class="separator"></div>
              <div id="clear" style="display:block;height:30px"></div>
            </div>
          </div>
        </div>
        <div id="clear" style="display:block;height:20px"></div>
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