<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Tahun Akademik
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/tahun_akademik/tambah_tahun_akademik', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tahun Akademik</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-hover table-bordered table-striped">
      <tr>
         <th>No.</th>
         <th>Tahun Akademik</th>
         <th>Semester</th>
         <th>Status</th>
         <th colspan="2">Aksi</th>
      </tr>

      <?php
      $no = 1;
      foreach ($tahun_akademik as $ak) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $ak->tahun_akademik; ?></td>
            <td><?= $ak->semester; ?></td>
            <td><?= $ak->status; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/tahun_akademik/update/' . $ak->id_thn_aka, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/tahun_akademik/delete/' . $ak->id_thn_aka, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>