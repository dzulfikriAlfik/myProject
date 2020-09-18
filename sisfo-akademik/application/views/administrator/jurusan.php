<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Jurusan
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/jurusan/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jurusan</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-bordered table-striped table-hover">
      <tr class="text-center">
         <th>No.</th>
         <th>Kode Jurusan</th>
         <th>Nama Jurusan</th>
         <th colspan="2">Aksi</th>
      </tr>

      <?php
      $no = 1;
      foreach ($jurusan as $jrs) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $jrs->kode_jurusan; ?></td>
            <td><?= $jrs->nama_jurusan; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/jurusan/update/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/jurusan/delete/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>