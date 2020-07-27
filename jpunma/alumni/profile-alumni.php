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
    <!-- bootstrap-daterangepicker -->
    <link href="../css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../css/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../css/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../css/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../css/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../css/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../css/vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <style>
      #map-canvas {width:100%;height:400px;border:solid #999 1px;}
      select {width:240px;}
      #kab_box,#kec_box,#kel_box,#lat_box,#lng_box{display:none;}
     </style>

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
    <style>
      #ta {
          width:557px;
          min-height:auto;
          max-height:auto;
          resize:initial;
          overflow: auto;
          
      }
      #ta1 {
          width:557px;
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
          <div class="row" style="background-color: ">
            <div class="col-md-12 col-md-offset well" style="background-color: white">
            <div class="row">          <!-- form Profile -->
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="btn btn-dark col-md-12 col-md-offset well" readonly="readonly">
                    <h1 class="text-center" style="color: white"><b>Profil Anda</b></h1>
                  </div>
                    <div class="clearfix"></div>
                    <!-- koneksi sukses -->
                        <?php 
                        if(isset($_SESSION['updateCompleted'])) {
                          ?>
                          <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <center><h5>Data anda sudah berhasil diperbarui</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['updateCompleted']); }
                        ?>
                    <!-- koneksi error -->
                        <?php 
                        if(isset($_SESSION['updateError'])) {
                          ?>
                          <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <center><h5>NPM sudah terdaftar Silahkan gunakan NPM lain !</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['updateError']); }
                        ?>
                </div>
                  <div class="x_content">
                    <br/>
                    <form method="post" action="profile-alumni-update.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <?php  

                       $sql = "SELECT * FROM alumni WHERE id_user='$_SESSION[id_user]'";
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
                            <input type="tanggallahir" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="dd/mm/yyyy" readonly="readonly" value="<?php echo $row['tanggallahir']; ?>">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- 4. alamat -->
                      <div class="form-group">
                        <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea type="text" class="form-control col-md-7 col-xs-12" id="ta" name="alamat" placeholder="Alamat" ><?php echo $row['alamat']; ?></textarea>
                        </div>
                      </div>
                      <!-- 5. provinsi -->
                      <div class="form-group">
                        <label for="provinsi" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="provinsi" name="provinsi" value="<?php echo $row['provinsi']; ?>" placeholder="Provinsi">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 6. kota -->
                      <div class="form-group">
                        <label for="kota" class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="kota" name="kota" placeholder="Kota" value="<?php echo $row['kota']; ?>">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 7. email -->
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required="">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 8. nomor kontak -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kontak</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="nomorkontak" name="nomorkontak" placeholder="Nomor Kontak" value="<?php echo $row['nomorkontak']; ?>">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 9. Jurusan -->
                      <div class="form-group">
                        <label for="jurusan" class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?php echo $row['jurusan']; ?>">
                          <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- 10. tahun masuk -->
                      <div class="form-group">
                        <label for="tahunmasuk" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Masuk</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type="tahunmasuk" readonly="readonly" class="form-control" id="tahunmasuk" name="tahunmasuk" placeholder="dd/mm/yyyy" value="<?php echo $row['tahunmasuk']; ?>">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- 11. tahun lulus -->
                      <div class="form-group">
                        <label for="tahunlulus" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Lulus</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker3'>
                            <input type="tahunlulus" readonly="readonly" class="form-control" id="tahunlulus" name="tahunlulus" placeholder="dd/mm/yyyy" value="<?php echo $row['tahunlulus']; ?>">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset well" style="background-color: white">
                          <div class="col-md-6 col-md-offset">
                          <center><button type="submit" class="btn btn-dark" style="height:50px; width:820px">SIMPAN</button></center>
                        </div>
                      </div>
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


      </div>
    </div>
  <!-- footer content -->
   <footer>
     <div class="text-center">
       &copy;&nbsp;Dzulfikri Alkautsari 2018&nbsp;<a href="http://unma.ac.id">| Universitas Majalengka</a>
     </div>
     <div class="clearfix"></div>
   </footer>

    <!-- jQuery -->
    <script src="../css/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../css/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../css/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../css/vendors/moment/min/moment.min.js"></script>
    <script src="../css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../css/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../css/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../css/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../css/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../css/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../css/vendors/cropper/dist/cropper.min.js"></script>
    <script type="text/javascript" src="ajax_daerah.js"></script>

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
    $('#myDatepicker').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true,
        format: 'DD/MM/YYYY'
    });
    $('#myDatepicker2').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true,
        format: 'DD/MM/YYYY'
    });
    $('#myDatepicker3').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true,
        format: 'DD/MM/YYYY'
    });
</script>
  
  </body>
</html>