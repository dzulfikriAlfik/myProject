<div class="container-fluid">

   <!-- Breadcrumb Dashboard -->
   <div class="alert alert-success" role="alert">
      <i class="fas fa-tachometer-alt"></i> Dashboard
   </div>

   <!-- Bigger Alert -->
   <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Selamat Datang!</h4>
      <p>Selamat datang <strong><?= ucwords($username); ?></strong> di Sistem Informasi Akademik Universitas Majalengka, Anda Login sebagai <strong><?= ucwords($level); ?></strong></p>
      <hr>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal">
         <i class="fas fa-cogs"></i> Control Panel
      </button>
   </div>

   <!-- modalbox shorcut menu -->
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <!-- 1st row -->
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Mahasiswa</p>
                        <i class="fas fa-3x fa-user-graduate"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Tahun Akademik</p>
                        <i class="fas fa-3x fa-calendar-alt"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">KRS</p>
                        <i class="fas fa-3x fa-edit"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">KHS</p>
                        <i class="fas fa-3x fa-file-alt"></i>
                     </a>
                  </div>
               </div>
               <hr>
               <!-- 2nd row -->
               <div class="row">
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Input Nilai</p>
                        <i class="fas fa-3x fa-sort-numeric-down"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Cetak Transkrip</p>
                        <i class="fas fa-3x fa-print"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Kategori</p>
                        <i class="fas fa-3x fa-list-ul"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Info Kampus</p>
                        <i class="fas fa-3x fa-bullhorn"></i>
                     </a>
                  </div>
               </div>
               <hr>
               <!-- 3rd row -->
               <div class="row">
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Identitas</p>
                        <i class="fas fa-3x fa-id-card-alt"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Tentang Kampus</p>
                        <i class="fas fa-3x fa-info-circle"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Fasilitas</p>
                        <i class="fas fa-3x fa-laptop"></i>
                     </a>
                  </div>
                  <div class="col-md-3 text-center">
                     <a href="<?= base_url(); ?>">
                        <p class="nav-link small text-danger">Gallery</p>
                        <i class="fas fa-3x fa-image"></i>
                     </a>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</div>