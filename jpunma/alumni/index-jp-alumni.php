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
    <!-- Datatables -->
    <link href="../css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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

              <div class="col-md-12 col-md-offset">
               <!-- koneksi sukses -->
                   <?php 
                   if(isset($_SESSION['lamarJobSuccess'])) {
                     ?>
                     <div class="alert alert-success alert-dismissible fade in" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                       </button>
                       <center><h5>Anda Berhasil Melamar</h5></center>
                     </div>
                   <?php
                    unset($_SESSION['lamarJobSuccess']); }
                   ?>

                   <?php 
                   if(isset($_SESSION['uploadError'])) {
                     ?>
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                       </button>
                       <center><h5><?php echo $_SESSION['uploadError']; ?></h5></center>
                     </div>
                   <?php
                    unset($_SESSION['uploadError']); }
                   ?>

                   <center>
                     <a href="lamarlowongan.php" class="btn btn-dark btn-lg">Lowongan Tersimpan</a>
                     <a href="upload-cv.php" class="btn btn-primary btn-lg">Upload CV</a>

                     <?php 
                    $sql = "SELECT * FROM alumni WHERE id_user='$_SESSION[id_user]' AND cv IS NOT NULL ";
                    $result = $koneksi->query($sql);
                    if($result->num_rows > 0)  {
                      $row = $result->fetch_assoc();
                      ?>
                      <a href="../upload/cv/<?php echo $row['cv']; ?>" class="btn btn-primary btn-lg text-center" download="MyUploadedCV">Download CV</a>

                    <?php } ?>
                   </center>

                    

               <br>   
               <!-- koneksi error -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lowongan Tersedia :<small>Cari Pekerjaan Sesuai yang anda minati</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="column-title text-center alert alert-success">Posisi Lowongan Pekerjaan</th>
                          <th class="column-title text-center alert alert-success">Bidang</th>
                          <th class="column-title text-center alert alert-success">Tanggal Posting</th>
                          <th class="column-title text-center alert alert-success">Kota</th>
                          <th class="column-title text-center alert alert-success">Preview</th>
                          <th class="column-title text-center alert alert-success">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- koneksi database -->
                        <?php  
                         $sql = "SELECT * FROM job INNER JOIN company ON job.id_company=company.id_company";
                         $result = $koneksi->query($sql);
                         if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) 
                          { 
                            $sql1 = "SELECT * FROM lamar_kerja WHERE id_user='$_SESSION[id_user]' AND id_job='$row[id_job]' ";
                            $result1 = $koneksi->query($sql1);

                        ?>
                        <!-- endkoneksi -->
                        <tr>
                          <td class="text-center"><b style="font-size:15px"><?php echo $row['namajob']; ?></b></td>
                          <td class="text-center"><b style="font-size:15px"><?php echo $row['bidangjob']; ?></b></td>
                          <td class="text-center"><?php echo date("d-M-Y", strtotime($row['tanggalterbit'])); ?></td>
                          <td class="text-center"><?php echo $row['kotajob']; ?></td>
                          <td class="text-center"><b><a href="viewjobdetail.php?id=<?php echo $row['id_job']; ?>">Lihat Detail</a></b></td>
                          <?php 
                          if($result1->num_rows > 0 ) {
                            ?>
                            <td class="text-center" style="color: red"><strong>sudah di lamar</strong></td>
                            <?php  
                          } else {
                          ?>
                          <td class="text-center"><b><a href="viewjob.php?id=<?php echo $row['id_job']; ?>">Lamar</a></b></td>
                          <?php } ?>
                        </tr>
                        <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>
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

  
  </body>
</html>