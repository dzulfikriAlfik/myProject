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
              <div class="col-md-12 col-md-offset" style="background-color: white">
                <div id="clear" style="display:block;height:40px;clear:both;"></div>
                <div class="col-md-12 col-md-offset" style="background-color: white">
                  <center><h3 style="font-color:black">Lowongan Kerja</h3>
                    <h2>Mulailah membuat lowongan pekerjaan dan temukan kandidat berkualitas untuk perusahaan Anda dari alumni Universitas Majalengka.</h2>
                    <div style="height:30px"></div>
                    <a class="btn btn-primary btn-lg" href="lowongan-kerja.php" role="button">Buat Lowongan Pekerjaan</a> 
                  </center>
                </div>
                <div id="clear" style="display:block;height:40px;clear:both;"></div>
              </div>

              <div class="row" style="background-color: white">
                <div class="col-md-10 col-md-offset-1" style="background-color: white">
                  <section class="content invoice">

              <!-- menampilkan hasil buat job -->
              <?php if(isset($_SESSION['jobPostSuccess'])) { ?>
              <div class="col-md-12 col-md-offset">
                <div class="alert alert-success">
                  <h2><center>Lowongan Telah Berhasil di Post !!!</center></h2> 
                </div>
              </div>
              <?php unset($_SESSION['jobPostSuccess']); } ?>
              <!-- menampilkan hasil buat job -->
              <!-- menampilkan hasil ubah job -->
              <?php if(isset($_SESSION['jobPostUpdateSuccess'])) { ?>
              <div class="col-md-12 col-md-offset">
                <div class="alert alert-success">
                  <h2><center>Lowongan Telah Berhasil di Ubah !!!</center></h2> 
                </div>
              </div>
              <?php unset($_SESSION['jobPostUpdateSuccess']); } ?>
              <!-- menampilkan hasil ubah job -->
              <!-- menampilkan hasil Hapus job -->
              <?php if(isset($_SESSION['jobPostDeletedSuccess'])) { ?>
              <div class="col-md-12 col-md-offset">
                <div class="alert alert-danger">
                  <h2><center>Lowongan Telah Berhasil di Hapus !!!</center></h2> 
                </div>
              </div>
              <?php unset($_SESSION['jobPostDeletedSuccess']); } ?>
              <!-- menampilkan hasil Hapus job -->


                </div>           
                <!-- tabel lowongan -->
                <div class="col-md-12 col-md-offset">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Lowongan Tersedia :<small>lowongan pekerjaan perusahaan anda</small></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="column-title text-center alert-success" style="color:white"><b>Posisi Lowongan Pekerjaan</b></th>
                            <th class="column-title text-center alert-success" style="color:white"><b>Tanggal Posting</b></th>
                            <th class="column-title text-center alert-success" style="color:white"><b>Kota</b></th>
                            <th class="column-title text-center alert-success" style="color:white"><b>Preview</b></th>
                            <th class="column-title text-center alert-success" style="color:white"><b>Aksi</b></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- koneksi database -->
                          <?php  
                           $sql = "SELECT * FROM job WHERE id_company='$_SESSION[id_company]'";
                           $result = $koneksi->query($sql);

                           if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                          ?>
                          <!-- endkoneksi -->
                          <tr>
                            <td class="text-center"><b><?php echo $row['namajob']; ?></b></td>
                            <td class="text-center"><?php echo date("d-M-Y", strtotime($row['tanggalterbit'])); ?></td>
                            <td class="text-center"><?php echo $row['kotajob']; ?></i></td>
                            <td class="text-center"><a href="viewjob.php?id=<?php echo $row['id_job']; ?>">View</a>
                            <td class="text-center">
                             <a href="editjob.php?id=<?php echo $row['id_job']; ?>">Edit&nbsp;&nbsp;&nbsp;|</a>
                             <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" href="hapusjob.php?id=<?php echo $row['id_job']; ?>" style="color:red">&nbsp;&nbsp;Hapus</a>
                            </td>
                          <?php
                              }
                            }
                          ?>
                          </tr>
                        </tbody>
                      </table>
                
                
                    </div>
                  </div>
                </div>
              <!-- endtable lowongan -->
              <div id="clear" style="display:block;height:20px;clear:both;"></div>   
              </div>

                

            
              <div id="clear" style="display:block;height:50px;clear:both;"></div>   

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
    <script>
    window.onload = function () {
      var chart1 = document.getElementById("line-chart").getContext("2d");
      window.myLine = new Chart(chart1).Line(lineChartData, {
      responsive: true,
      scaleLineColor: "rgba(0,0,0,.2)",
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleFontColor: "#c5c7cc"
      });
    };
  </script>
    <!-- Custom Theme Scripts -->
    <script src="../css/build/js/custom.min.js"></script>

  
  </body>
</html>