<?php
  session_start(); 
if(isset($_SESSION['id_company'])) {
  header("Location: index-perusahaan.php");
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

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="ceklogin-hiring.php">
              <h1><i class="fa fa-institution"></i>   Login Perusahaan</h1>
              <div>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required="" />
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">MASUK</button>
              </div>
              <!-- ceklogin-alumni -->   
                <?php 
                if(isset($_SESSION['loginError'])) {
                  ?>
                  <div>
                    <br>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h6>Email / Password Salah ! Silahkan Coba Lagi</h6>
                    </div>
                  </div>
                <?php
                 unset($_SESSION['loginError']); }
                ?>
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

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum Punya Akun? 
                  <a href="companyregister.php">Daftar</a>&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php" style="color:red">KEMBALI</a>
                </p>
                <div class="clearfix"></div>
                <br/>
              <div>
                  
                  <p>©2018 All Rights Reserved Designed by Dzulfikri </p>
                </div>
              </div>
              
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
