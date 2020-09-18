<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Daftar User
   </div>

   <!-- Button Tambah Jurusan -->
   <?= anchor('administrator/user/tambah_user', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah User</button>'); ?>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>Username</th>
         <th>Email</th>
         <th>Level</th>
         <th>Blokir</th>
         <th colspan="2">Aksi</th>
      </tr>

      <?php
      $no = 1;
      foreach ($user as $usr) : ?>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $usr->username; ?></td>
            <td><?= $usr->email; ?></td>
            <td><?= $usr->level; ?></td>
            <td><?= $usr->blokir; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/user/update/' . $usr->id, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/user/delete/' . $usr->id, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>