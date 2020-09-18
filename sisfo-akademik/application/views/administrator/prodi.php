<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Program Studi
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/prodi/tambah_prodi', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Prodi</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-bordered table-striped table-hover">
      <tr>
         <th>No.</th>
         <th>Kode Prodi</th>
         <th>Nama Prodi</th>
         <th>Nama Jurusan</th>
         <th colspan="2">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($prodi as $prd) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $prd->kode_prodi; ?></td>
            <td><?= $prd->nama_prodi; ?></td>
            <td><?= $prd->nama_jurusan; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/prodi/update/' . $prd->id_prodi, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/prodi/delete/' . $prd->id_prodi, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>