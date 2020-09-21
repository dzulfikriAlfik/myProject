<?php 
session_start();
if(empty($_SESSION['id_company'])) {
  header("Location: login_hiring.php");
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
                <h2><b><?php echo $_SESSION['namacompany']; ?></b></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <div class="clearfix" style="display:block;height:20px;clear:both"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <center><h2 style="color: white"><b>Menu</b></h2></center>
                <div id="clear" style="display:block;height:10px;clear:both;"></div> 
                <ul class="nav side-menu">
                  <?php  

                  $sql = "SELECT * FROM lamar_kerja WHERE id_company='$_SESSION[id_company]' AND status='0' ";
                  $result = $koneksi->query($sql);
                  if($result->num_rows > 0) {
                    ?>

                  <li><a href="view-lamar-kerja.php" class="btn btn-success btn-lg" style="color: white">Pelamar Kerja&nbsp;&nbsp;<span class="badge"><?php echo $result->num_rows; ?></a></li>

                      <?php  

                    }

                  ?>
                  <li><a href="index-perusahaan.php"><i class="fa fa-home"></i>Dashboard</a></li></li>
                  <li><a href="lowongan-perusahaan.php"><i class="fa fa-newspaper-o"></i>Lowongan Kerja</a></li>
                  <li><a href="seting-perusahaan.php"><i class="fa fa-key"></i>Pengaturan</a></li>
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
          <div class="row">
              <div class="col-md-12" role="main">
                <div class="row " style="background-color: none">
                  <div class="col-md-12 well" style="background-color: white">
                    <div class="col-md-1" style="background-color: white">
                      <img style="width: 220%; display: inline;" src="../css/images/user.png" alt="image">
                    </div>
                    <div>
                      <h1 class="col-md-8 col-md-offset-1">Selamat Datang</h1>
                      <h3 class="col-md-8 col-md-offset-1""><?php echo $_SESSION['namacompany']; ?></h3>
                    </div>
                  </div>
                  <div class="clearfix"></div>

                  <div class="container">
                      <div class="col-md-12 col-md-offset well" style="background-color: white">
                      <h1 class="text-center">Job Terakhir di Post</h1>
                        <!-- koneksi database -->
                        <?php  

                         $sql = "SELECT * FROM job WHERE id_company='$_SESSION[id_company]' Order By Rand() Limit 4";
                         $result = $koneksi->query($sql);

                         if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
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
                              <center><h2><b><?php echo $row['namajob']; ?></b></h2></center>
                            </div>
                          </div>
                        </div>


                        <?php
                            }
                          }
                        ?>
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-12 col-md-offset">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Testimoni</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="col-md-12 col-md-offset" style="background-color: white">
                            <!-- blockquote -->
                            <blockquote>
                              <p>Dengan adanya website ini, Kami sangat terbantu untuk memberikan informasi lowongan pekerjaan bagi, khusus nya bagi alumni Universitas Majalengka yang kami utamakan perekrutannya dari lulusan sana</p>
                              <footer>Someone famous in <cite title="Source Title">Source Title</cite>
                              </footer>
                            </blockquote>

                            <blockquote class="blockquote-reverse">
                              <p>Dengan adanya website ini, Kami sangat terbantu untuk memberikan informasi lowongan pekerjaan bagi, khusus nya bagi alumni Universitas Majalengka yang kami utamakan perekrutannya dari lulusan sana</p>
                              <footer>Someone famous in <cite title="Source Title">Source Title</cite>
                              </footer>
                            </blockquote>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="clear" style="display:block;height:100px;clear:both;"></div>
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

  
  </body>
</html>