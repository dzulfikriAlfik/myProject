<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Data Mahasiswa
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/mahasiswa/tambah_mahasiswa', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>


   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>Nama Lengkap</th>
         <th>Alamat</th>
         <th>Email</th>
         <th colspan="3" class="text-center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($mahasiswa as $mhs) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td width="230px"><?= $mhs->nama_lengkap; ?></td>
            <td><?= $mhs->alamat; ?></td>
            <td width="220px"><?= $mhs->email; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/mahasiswa/detail/' . $mhs->id_mahasiswa, '<div class="btn btn-sm btn-info"><i class="fas fa-eye"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/mahasiswa/update/' . $mhs->id_mahasiswa, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/mahasiswa/delete/' . $mhs->id_mahasiswa, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>