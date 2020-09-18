<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Mata Kuliah
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/matakuliah/tambah_matakuliah', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Matakuliah</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>Kode Mata Kuliah</th>
         <th>Nama Mata Kuliah</th>
         <th>Program Studi</th>
         <th colspan="3" class="text-center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($matakuliah as $mk) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $mk->kode_matakuliah; ?></td>
            <td><?= $mk->nama_matakuliah; ?></td>
            <td><?= $mk->nama_prodi; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/matakuliah/detail/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-info"><i class="fas fa-eye"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/matakuliah/update/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/matakuliah/delete/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>