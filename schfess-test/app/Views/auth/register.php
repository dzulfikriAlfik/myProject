<!DOCTYPE html>
<html lang="en" class="color-theme-deeppurple">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Schoolfess Test | Register</title>
   <!-- Framework 7 -->
   <!-- <link rel="stylesheet" href="<?=base_url('assets/css/framework7-bundle.css');?>">
   <link rel="stylesheet" href="<?=base_url('assets/css/app.css');?>"> -->
   <!-- style -->
   <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">
   <link rel="stylesheet" href="<?=base_url('assets/css/signin.css');?>">
   <!-- Fonts -->
   <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome/css/all.min.css');?>">
   <link rel="stylesheet" href="<?=base_url('assets/css/line-awesome/css/line-awesome.min.css');?>">
   <!-- Favicon -->
   <link rel="apple-touch-icon" href="<?=base_url('assets/img/f7-icon-square.png');?>">
   <link rel="icon" href="<?=base_url('assets/img/f7-icon.png');?>">
   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="text-center">
   
   
   <form class="form-signin" method="post" action="">
      <img class="mb-4" src="<?= base_url('assets/img/f7-icon-square.png'); ?>" alt="" width="72" height="72">
      <h1 class="mb-3 h3 font-weight-normal">Buat Akun</h1>
      <?php if(isset($validation)):?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <?= $validation->listErrors() ?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <?php endif;?>
      <div>
         <label for="fullname" class="sr-only">Full Name</label>
         <input name="name" type="text" id="fullname" class="form-control" placeholder="Full Name" required>
      </div>
      <div>
         <label for="email" class="sr-only">Email</label>
         <input name="email" type="email" id="email" class="form-control" placeholder="Email" required value="<?= set_value('email'); ?>">
      </div>
      <div>
      <div>
         <label for="inputPassword" class="sr-only">Password</label>
         <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>
      <div>
         <label for="inputPassword" class="sr-only">Confirm Password</label>
         <input name="confpassword" type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <hr>
      <p>Sudah punya akun? <a href="<?= base_url('/'); ?>">Login</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
   </form>
   


   <!-- Script Essentials -->
   <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
   <script src="<?=base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

</body>

</html>