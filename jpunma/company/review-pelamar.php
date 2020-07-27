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

                <div class="panel panel-default col-md-12 col-md-offset">

                  <div class="x_panel text-center btn btn-dark"><b><h2>Pelamar</h2></b></div>
                  <div class="panel-body">

                  <?php  
                   $sql = "SELECT * FROM lamar_kerja INNER JOIN alumni ON lamar_kerja.id_user=alumni.id_user WHERE lamar_kerja.id_user='$_GET[id_user]' AND lamar_kerja.id_job='$_GET[id_job]' ";
                   $result = $koneksi->query($sql);

                   if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                    ?>

                    <pre style="font-family:arial;background-color:white;line-height:10px">
                        
                      <h4>        Nama                     :  <?php echo $row['namadepan'] . " " . $row['namabelakang']; ?></h4>
                      <h4>        Program studi        :  <?php echo $row['jurusan']; ?></h4>
                      <h4>        Tanggal Lahir         :  <?php echo $row['tanggallahir']; ?></h4>
                      <h4>        Alamat                   :  <?php echo $row['alamat']; ?></h4>
                      <h4>        Kota                       :  <?php echo $row['kota']; ?></h4>
                      <h4>        Provinsi                  :  <?php echo $row['provinsi']; ?></h4>
                      <h4>        Nomor Kontak        :  <?php echo $row['nomorkontak']; ?></h4>
                      <h4>        Email                      :  <?php echo $row['email']; ?></h4>
                      <?php 
                      if(isset($row['cv'])) {
                        ?>
<center>
  <a href="../Upload/cv/<?php echo $row['cv']; ?>" class="btn btn-success btn-lg" download="<?php echo $row['namadepan'].'cv'; ?>">Download CV</a>
</center>

                        <?php 
                      }

                      ?>

<center class="well" style="background-color: white">
  <a onclick="return confirm('Apakah Anda Yakin Untuk Menolak Pelamar ini?')" href="tolak-pelamar.php?id_user=<?php echo $_GET['id_user']; ?>&id_job=<?php echo $row['id_job']; ?>" class="btn btn-danger btn-lg">Tolak  </a> <a onclick="return confirm('Apakah Anda Yakin Untuk Menerima Pelamar Ini?')" href="terima.php?id_user=<?php echo $_GET['id_user']; ?>&id_job=<?php echo $row['id_job']; ?>" class="btn btn-success btn-lg">Terima</a>
</center>

                      <div id="clear" style="display:block;height:10px;clear:both;"></div>

                    </pre>

                    <?php } } ?>

                  
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