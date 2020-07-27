<?php
  session_start(); 
if(empty($_SESSION['id_admin'])) {
  header("Location: login_admin.php");
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
    <!-- Datatables -->
    <link href="../css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../css/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../css/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

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
            <!-- tabel lowongan -->
              <div class="col-md-12 col-md-offset">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Alumni</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              <!-- menampilkan hasil Hapus job -->
              <?php if(isset($_SESSION['alumniDeletedSuccess'])) { ?>
              <div class="col-md-12 col-md-offset">
                <div class="alert alert-danger">
                  <h2><center>Data Alumni Berhasil dihapus !!!</center></h2> 
                </div>
              </div>
              <?php unset($_SESSION['alumniDeletedSuccess']); } ?>
              <!-- menampilkan hasil Hapus job -->
              
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="column-title text-center"><b>Nama</b></th>
                          <th class="column-title text-center"><b>NPM</b></th>
                          <th class="column-title text-center"><b>Jurusan</b></th>
                          <th class="column-title text-center"><b>Tahun Masuk</b></th>
                          <th class="column-title text-center"><b>Tahun Lulus</b></th>
                          <th class="column-title text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- koneksi database -->
                        <?php  
                         $sql = "SELECT * FROM alumni";
                         $result = $koneksi->query($sql);

                         if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                        ?>
                        <!-- endkoneksi -->
                        <tr>
                          <td class="text-left">
                            <a><?php echo $row['namadepan']; ?>&nbsp;</a>
                            <a><?php echo $row['namabelakang']; ?></a>
                          </td>
                          <td class="text-center"><?php echo $row['npm']; ?></td>
                          <td class="text-center"><?php echo $row['jurusan']; ?></i></td>
                          <td class="text-center"><?php echo $row['tahunmasuk']; ?></i></td>
                          <td class="text-center"><?php echo $row['tahunlulus']; ?></i></td>
                          <td class="text-center"><a href="viewalumni.php?id=<?php echo $row['id_user']; ?>">Lihat detail&nbsp;&nbsp;|</a>
                            <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')" href="hapusalumni.php?id=<?php echo $row['id_user']; ?>" title="klik untuk hapus" style="color:red">&nbsp;Hapus</a>
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