<?php
session_start();
if(isset($_SESSION['id_user'])) {
  header("Location: companyregister.php");
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
    <link rel="icon" href="../css/images/company.png" type="image/ico">

    <title>JP-Unma | Job Portal Universitas Majalengka </title>

    <!-- Bootstrap -->
    <link href="../css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav_menu">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="background-color: white">
            <div id="clear" style="display:block;height:30px;clear:both;"></div>
            <div class="col-md-6 col-md-offset-3 well" style="background-color: white">
                <div class="x_panel">
                  <div class="x_title">
                    <h1 class="text-center">Registrasi Perusahaan</h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="cekcompany-register.php" class="form-horizontal form-label-left input_mask">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="namacompany" class="form-control has-feedback-left" id="namacompany" name="namacompany" placeholder="Nama Perusahaan *)" required="">
                        <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="namahired" class="form-control" id="namahired" name="namahired" placeholder="Nama Anda" required="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="posisi" class="form-control has-feedback-left" id="posisi" name="posisi" placeholder="Posisi">
                        <span class="fa fa-anchor form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="nomortelepon" name="nomortelepon" placeholder="Nomor Telepon *)" required="">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left" id="email" name="email" placeholder="Email *)" required="">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi *)" required="">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                          <textarea type="alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat Perusahaan *)" required=""></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <!-- option Provinsi -->
                        <div class="col-md-6 col-md-offset">
                          <input type="provinsi" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi *)" required="">
                          <span class="fa fa-globe form-control-feedback right"></span>
                        </div>
                        <!-- end option kota -->
                        <!-- option kota -->
                        <div class="col-md-6 col-md-offset">
                          <input type="kota" class="form-control" id="kota" name="kota" placeholder="kota *)" required="">
                          <span class="fa fa-home form-control-feedback right"></span>
                        </div>
                        <!-- end option kota -->
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="" required=""> 
                              <div align="justify">
                              Kami setuju dan memahami pernyataan dan kondisi diatas dan mengakui bahwa formulir ini merupakan pernyataan resmi perusahaan kami dan dapat digunakan sebagai dokumen hukum oleh pihak terkait
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset" style="background-color: white">
                          <center><button type="submit" class="btn btn-success">Daftar</button></center>
                          <div style="height: 20px"></div>
                        </div>
                      </div>
                      <div class="separator">
                        <p class="text-center" class="change_link">Sudah Punya Akun? 
                          <a href="login_hiring.php">Masuk</a>
                        </p>
                        <div class="clearfix"></div>
                      <!-- koneksi sukses -->
                        <?php 
                        if(isset($_SESSION['registerCompleted'])) {
                          ?>
                          <div id="successMessage" class="alert alert-success alert-dismissible fade in successMessage" role="alert">
                            <button type="button" id="successMessage"  class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <center><h5>Perusahaan Berhasil Terdaftar</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['registerCompleted']); }
                        ?>
                        <!-- koneksi error -->
                        <?php 
                        if(isset($_SESSION['registerError'])) {
                          ?>
                          <div id="errorMessage" class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <center><h5>Email sudah terdaftar Silahkan gunakan Email lain !</h5></center>
                          </div>
                        <?php
                         unset($_SESSION['registerError']); }
                        ?>
                      <div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div id="clear" style="display:block;height:45px;clear:both;"></div>
        <!-- /page content -->
      </div>
    </div>

  </body>
  <script type="text/javascript">
    $(function(){
      $("#.successMessage:visible").fadeOut(2000);
    }); 
  </script>
</html>
