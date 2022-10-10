<!DOCTYPE html>
<html lang="en" class="color-theme-deeppurple">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Schoolfess Test | <?= $judul; ?></title>
   <!-- style -->
   <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">
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

<body style="margin: 0;"> 

   <!-- Navbar -->
   <?= $this->include('templates/navbar'); ?>
   <!-- End Navbar -->

   <!-- Konten --> 
   <?= $this->renderSection('content'); ?>
   <!-- End Konten -->
   
   <!-- Script Essentials -->
   <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
   <script src="<?=base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

</body>

</html>