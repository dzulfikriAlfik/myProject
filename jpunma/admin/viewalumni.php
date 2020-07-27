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

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
    <style>
      #ta {
          width:530px;
          min-height:auto;
          max-height:auto;
          resize:initial;
          overflow: auto;
          
      }

    </style>
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
        <div class="right_col" role="main" style="background-color: ">
          <div class="row" style="background-color: ">
            <div class="col-md-12 col-md-offset well" style="background-color: white">
            <div class="row">          <!-- form Profile -->
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="btn btn-dark col-md-12 col-md-offset well" readonly="readonly">
                    <h1 class="text-center" style="color: white"><b>Profil Alumni</b></h1>
                  </div>
                    <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left well" style="background-color:white">
                    <?php  

                       $sql = "SELECT * FROM alumni WHERE id_user='$_GET[id]'";
                       $result = $koneksi->query($sql);

                       if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      
                      <!-- 1. namadepan -->
                      <div class="form-group">
                        <label for="namadepan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Depan</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="namadepan" class="form-control" id="namadepan" name="namadepan" placeholder="Nama Depan" value="<?php echo $row['namadepan']; ?>" readonly="readonly">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 2. namabelakang -->
                      <div class="form-group">
                        <label for="namabelakang" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Belakang</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="namabelakang" class="form-control" id="namabelakang" name="namabelakang" placeholder="Nama Belakang" value="<?php echo $row['namabelakang']; ?>" readonly="readonly">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 3. tanggalahir -->
                      <div class="form-group">
                        <label for="tanggallahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker'>
                            <input type="tanggallahir" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="dd/mm/yyyy" value="<?php echo $row['tanggallahir']; ?>" readonly="readonly">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar" readonly="readonly"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- 4. alamat -->
                      <div class="form-group">
                        <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea type="text" class="form-control col-md-7 col-xs-12" id="ta" name="alamat" placeholder="Alamat" readonly="readonly" ><?php echo $row['alamat']; ?></textarea>
                        </div>
                      </div>
                      <!-- 5. kota -->
                      <div class="form-group">
                        <label for="kota" class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="kota" name="kota" placeholder="Kota" value="<?php echo $row['kota']; ?>" readonly="readonly">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 6. provinsi -->
                      <div class="form-group">
                        <label for="provinsi" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="provinsi" name="provinsi" value="<?php echo $row['provinsi']; ?>" placeholder="Provinsi" readonly="readonly">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 7. email -->
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required="" readonly="readonly">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 8. nomor kontak -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kontak</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="nomorkontak" name="nomorkontak" placeholder="Nomor Kontak" value="<?php echo $row['nomorkontak']; ?>" readonly="readonly">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 9. Jurusan -->
                      <div class="form-group">
                        <label for="jurusan" class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?php echo $row['jurusan']; ?>" readonly="readonly">
                          <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 10. tahun masuk -->
                      <div class="form-group">
                        <label for="tahunmasuk" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Masuk</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type="tahunmasuk" class="form-control" id="tahunmasuk" name="tahunmasuk" placeholder="dd/mm/yyyy" value="<?php echo $row['tahunmasuk']; ?>" readonly="readonly">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar" readonly="readonly"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- 11. tahun lulus -->
                      <div class="form-group">
                        <label for="tahunlulus" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Lulus</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker3'>
                            <input type="tahunlulus" class="form-control" id="tahunlulus" name="tahunlulus" placeholder="dd/mm/yyyy" value="<?php echo $row['tahunlulus']; ?>" readonly="readonly">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar" readonly="readonly"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                    <?php
                        }
                      }
                    ?>
                      </div> 
                    </form>
                  </div>
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
    <!-- jQuery Smart Wizard -->
    <script src="../css/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
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

  
  </body>
</html>