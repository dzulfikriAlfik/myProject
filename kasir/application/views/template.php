<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Kasir | <?= ucwords($menu); ?></title>
   <link rel="icon" href="<?= base_url('uploads/logo.png'); ?>" type="image/ico">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
</head>

<body class="hold-transition sidebar-mini <?= $aktif == 'sales' ? 'sidebar-collapse' : '' ?>">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-users-cog"></i> <strong><?= ucwords($this->fungsi->user_login()->username); ?></strong>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">Settings</span>
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                     <i class="fas fa-sign-out-alt mr-2"></i> Logout
                  </a>
               </div>
            </li>
         </ul>
      </nav>

      <div class="login-success" data-flashdata="<?= $this->session->flashdata('pesan_login'); ?>" data-user="<?= ucwords($this->fungsi->user_login()->name); ?>"></div>

      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <a href="<?= base_url('dashboard'); ?>" class="brand-link">
            <img src="<?= base_url('assets/'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">My Kasir</span>
         </a>

         <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?= base_url('assets/'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block"><?= ucwords($this->fungsi->user_login()->name); ?></a>
               </div>
            </div>

            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= add_class('dashboard', $aktif, 'active'); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('supplier'); ?>" class="nav-link <?= add_class('supplier', $aktif, 'active'); ?>">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                           Suppliers
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('customer'); ?>" class="nav-link <?= $aktif == 'customer' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Customers
                        </p>
                     </a>
                  </li>
                  <li class="nav-item has-treeview <?= $aktif == 'category' || $aktif == 'unit' || $aktif == 'item' ? 'menu-open' : ''; ?>">
                     <a href="" class="nav-link <?= $aktif == 'category' || $aktif == 'unit' || $aktif == 'item' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                           Product
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= base_url('category'); ?>" class="nav-link <?= add_class('category', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Categories</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('unit'); ?>" class="nav-link <?= add_class('unit', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Units</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('item'); ?>" class="nav-link <?= add_class('item', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Items</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item has-treeview <?= $aktif == 'sales' || $aktif == 'stock_in' || $aktif == 'stock_out' ? 'menu-open' : ''; ?>">
                     <a href="<?= base_url(''); ?>" class="nav-link <?= $aktif == 'sales' || $aktif == 'stock_in' || $aktif == 'stock_out' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                           Transactions
                           <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= base_url('sales'); ?>" class="nav-link <?= add_class('sales', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Sales</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('stock/in'); ?>" class="nav-link <?= add_class('stock_in', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Stock In</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('stock/out'); ?>" class="nav-link <?= add_class('stock_out', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Stock Out</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item has-treeview <?= $aktif == 'report sales' || $aktif == 'report stock' ? 'menu-open' : ''; ?>">
                     <a href="<?= base_url(''); ?>" class="nav-link <?= $aktif == 'report sales' || $aktif == 'report stock' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Report
                           <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?= base_url('report/sales'); ?>" class="nav-link <?= add_class('report sales', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Sales</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('report/stock'); ?>" class="nav-link <?= add_class('report stock', $aktif, 'active'); ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Stock</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <?php if ($this->fungsi->user_login()->level == 1) : ?>
                     <li class="nav-header">SETTING</li>
                     <li class="nav-item">
                        <a href="<?= base_url('user'); ?>" class="nav-link <?= add_class('user', $aktif, 'active'); ?>">
                           <i class="nav-icon fas fa-user text-info"></i>
                           <p>Users</p>
                        </a>
                     </li>
                  <?php endif; ?>
               </ul>
            </nav>
         </div>
      </aside>

      <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
      <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>

      <div class="content-wrapper">
         <?= $contents; ?>
      </div>

      <footer class="main-footer">
         <strong>Copyright &copy; 2020 <a href="#">Dzulfikri</a>.</strong> All rights reserved.
      </footer>

      <aside class="control-sidebar control-sidebar-dark">
      </aside>
   </div>


   <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
   <script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
   <!-- DataTables -->
   <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
   <!-- SweetAlert2 -->
   <script src="<?= base_url('assets'); ?>/dist/js/swal/sweetalert2.all.min.js"></script>
   <!-- InputMask -->
   <script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
   <script src="<?= base_url('assets'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
   <!-- date-range-picker -->
   <script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Custom Script -->
   <script src="<?= base_url('assets'); ?>/dist/js/myscript.js"></script>
   <script>
      $(function() {
         $("#myTable1").DataTable({
            "responsive": true,
            "autoWidth": false,
         });
      });
   </script>
</body>

</html>