<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Data dosen
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/dosen/tambah_dosen', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah dosen</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>


   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>NIDN</th>
         <th>Nama Dosen</th>
         <th>Alamat</th>
         <th colspan="3" class="text-center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($dosen as $dsn) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td width="200px"><?= $dsn->nidn; ?></td>
            <td width="250px"><?= $dsn->nama_dosen; ?></td>
            <td><?= $dsn->alamat; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/dosen/detail/' . $dsn->nidn, '<div class="btn btn-sm btn-info"><i class="fas fa-eye"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/dosen/update/' . $dsn->nidn, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/dosen/delete/' . $dsn->nidn, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>