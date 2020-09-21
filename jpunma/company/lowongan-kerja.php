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
        <div class="right_col" role="main" style="background-color: ">
          <div class="row">
            <div class="col-md-12 col-md-offset well" style="background-color: white">

               <div class="page-title">
                 <div class="alert alert-success col-md-12 col-md-offset well">
                    <center><h3><b>Post Lowongan Kerja</b></h3></center>
                 </div>
               </div> 

               <div class="row col-md-12">
                 <form method="post" action="lowongan-add.php" class="form-horizontal form-label-left">

                   <div class="x_panel">

                      <a class="col-md-12 col-md-offset x_title btn btn-dark" style="color:white">
                        <h2>Informasi Dasar</h2>
                        <div class="clearfix"></div>
                      </a>

                      <div class="x_content well">
                        <p class="font-black">
                          <center>Dengan melengkapi ini, perusahaan anda akan menarik kandidat yang sesuai dan terbaik.</center>
                        </p>
                        <!-- begin textbox informasi dasar -->
                        <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
                          <div class="form-group">
                           <label>1. Nama Pekerjaan * :</label>
                           <input type="namajob" class="form-control" id="namajob" name="namajob" required="">
                          </div>
                          <div class="form-group">
                           <label>2. Bidang Pekerjaan * :</label>
                           <input type="bidangjob" class="form-control" id="bidangjob" name="bidangjob" required="">
                          </div>
                          <div class="form-group">
                           <label>3. Gaji Minimal * :</label>
                           <input type="gajiminimal" class="form-control" id="gajiminimal" name="gajiminimal" required="">
                          </div>
                          <div class="form-group">
                           <label>4. Gaji Maksimal * :</label>
                           <input type="gajimaksimal" class="form-control" id="gajimaksimal" name="gajimaksimal" required="">
                          </div>
                          <div class="form-group">
                           <label>5. Kota * :</label>
                           <input type="kotajob" class="form-control" id="kotajob" name="kotajob" required="">
                          </div>
                        </div>
                        <!-- end textbox informasi dasar -->
                      </div>

                   </div>

                  <!-- deskripsi -->
                  <div class="x_panel">
                    <!-- xtitle -->
                    <a class="col-md-12 col-md-offset x_title btn btn-dark" style="color:white">
                      <h2>Rincian Pekerjaan</h2>
                      <div class="clearfix"></div>
                    </a>
                    <!-- end xtitle -->
                    <!-- xcontent -->
                    <div class="x_content well">
                      <p class="font-black">
                        <center><b>Jelaskan deskripsi dan persyaratan dari pekerjaan :</b></center>
                      </p>
                      <!-- desjob -->
                      <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
                        <!-- textbox desjob -->
                        <div class="form-group">
                          <label>1. Deskripsi Pekerjaan * :</label>
                            <textarea style="resize:none;width:810px;height:300px;" id="desjob" name="desjob" required=""></textarea>
                        </div>
                        <!-- /textbox desjob -->
                      </div>
                      <!-- desjob -->
                      <!-- syarat -->
                      <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
                        <div class="form-group">
                          <label>2. Syarat * :
                            <textarea style="resize:none;width:810px;height:300px;" id="syarat" name="syarat" required=""></textarea> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end deskripsi -->

                  <!-- terbitkan -->
                  <div class="x_panel">
                    <a class="col-md-12 col-md-offset x_title btn btn-dark" style="color:white">
                      <h2>Terbitkan</h2>
                      <div class="clearfix"></div>
                    </a>

                      <div class="x_content well">
                        <p class="font-black">
                          <center>Terbitkan Lowongan untuk Posisi :</center>
                        </p>

                        <div class="col-md-10 col-md-offset-1 well" style="background-color: white">
                          <div class="form-group">
                            <label>1. Email Kontak * :</label>
                            <input type="emailcompany" class="form-control" id="emailcompany" name="emailcompany" required="">
                          </div>
                          <div class="form-group">
                            <label>2. Tanggal Terbit * :</label>
                            <input type="tanggalterbit" class="form-control" id="tanggalterbit" name="tanggalterbit" disabled="disabled" placeholder="Otomatis">
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                  <!-- end terbitkan -->

                  <!-- button simpan -->
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <center>
                      <button type="submit" class="btn btn-success" style="height:50px; width:1050px">Terbitkan Lowongan Kerja</button>
                    </center>
                  </div>
                  <!-- end button simpan -->

                 </form>
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