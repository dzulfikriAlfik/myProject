<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>JP-Unma | Job Portal Universitas Majalengka </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav_menu">
    <div class="container body">
      <div class="main_container">

        <!-- top navigation -->
        <div class="nav_menu">
          <div class="top_nav">
            <div class="navigation">
              <nav>
                <ul class="nav navbar-nav navbar-left">
                    <li class="col-md-12 col-md-offset-5">
                      <a class="active" href="index-perusahaan.php">Dashboard</a>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-left">
                    <li class="col-md-12 col-md-offset-9">
                      <a class="active" href="lowongan-perusahaan.php">Lowongan</a>
                    </li>
                  </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt=" ">Nama Anda
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="seting-company.php">Pengaturan</a></li>
                      <li><a href="javascript:;">Tentang Kami</a></li>
                      <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </ul>
              </nav>
            </div> 
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- form Profile -->
          <div class="row well" style="background-color: white">
            <div class="col-md-8 col-md-offset-2 well" style="background-color: white">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-12 col-md-offset" style="background-color: white">
                    <h1 class="text-center">Profil Perusahaan Anda</h1>
                  </div>
                    <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <!-- namadepan -->
                      <div class="form-group">
                        <label for="namadepan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Depan</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="namadepan" class="form-control" id="namadepan" name="namadepan" placeholder="Nama Depan" required="">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- namabelakang -->
                      <div class="form-group">
                        <label for="namabelakang" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Belakang</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="namabelakang" class="form-control" id="namabelakang" name="namabelakang" placeholder="Nama Belakang" required="">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- tanggalahir -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                        <div class="col-md-8 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" id="tanggallahir" name="tanggallahir" placeholder="__/__/____">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- alamat -->
                      <div class="form-group">
                        <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea type="text" class="form-control col-md-7 col-xs-12" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                      <!-- kota -->
                      <div class="form-group">
                        <label for="kota" class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="kota" name="kota" placeholder="Kota">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- provinsi -->
                      <div class="form-group">
                        <label for="provinsi" class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="provinsi" name="provinsi" placeholder="Provinsi">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- email -->
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- nomor kontak -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kontak</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="nomorkontak" name="nomorkontak" placeholder="Nomor Kontak">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="jurusan" class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="jurusan" name="jurusan" placeholder="Jurusan">
                          <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- tahun masuk -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun Masuk</label>
                        <div class="col-md-8 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'"id="tahunmasuk" name="tahunmasuk" placeholder="__/__/____">
                          <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- tahun lulus -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tahun Lulus</label>
                        <div class="col-md-8 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" id="tahunlulus" name="tahunlulus" placeholder="__/__/____">
                          <span class="fa fa-graduation-cap form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset">
                          <div class="col-md-8 col-md-offset-2">
                          <center><button type="submit" class="btn btn-success">SIMPAN</button></center>
                        </div>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <div id="clear" style="display:block;height:300px;clear:both;"></div>
          <!-- end register -->

        </div>
        <!-- /page content -->
        
        <!-- <footer>-->
        <ul class="nav navbar-nav navbar-left">
          <li><a>DzulFikri Alkautsari</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="http://unma.ac.id">&copy; Universitas Majalengka 2018</a></li>
        </ul>
         
        <!-- </footer> -->
      </div>
      <!-- end container body -->
    </div>
    <!-- end main container -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
