<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Informasi
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/informasi/tambah_informasi', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah informasi</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>


   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>Icon</th>
         <th>Judul Indormasi</th>
         <th>Isi Informasi</th>
         <th colspan="2" class="text-center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($informasi as $info) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td width="200px"><?= $info->icon; ?></td>
            <td width="250px"><?= $info->judul_informasi; ?></td>
            <td><?= $info->isi_informasi; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/informasi/update/' . $info->id_informasi, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            <td width="20px" class="text-center">
               <?= anchor('administrator/informasi/delete/' . $info->id_informasi, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>