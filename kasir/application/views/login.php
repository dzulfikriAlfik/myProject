<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Kasir | Login</title>
   <link rel="icon" href="<?= base_url('uploads/logo.png'); ?>" type="image/ico">

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="<?= base_url('assets') ?>/index2.html"><b>Kasir</b> Penjualan</a>
      </div>
      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="logout-success" data-flashdata="<?= $this->session->flashdata('pesan_logout'); ?>"></div>
            <div class="login-error" data-flashdata="<?= $this->session->flashdata('error_login'); ?>"></div>

            <form action="<?= site_url('auth/process') ?>" method="post">
               <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username" autofocus required autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 offset-8">
                     <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- jQuery -->
   <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
   <!-- SweetAlert2 -->
   <script src="<?= base_url('assets'); ?>/dist/js/swal/sweetalert2.all.min.js"></script>
   <script src="<?= base_url('assets'); ?>/dist/js/myscript.js"></script>

</body>

</html>