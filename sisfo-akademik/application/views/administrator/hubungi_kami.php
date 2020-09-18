<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Pesan dari user
   </div>

   <?= $this->session->flashdata('pesan'); ?>


   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th width="20px">No.</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Isi Pesan</th>
         <th colspan="2" class="text-center">Aksi</th>
      </tr>
      <?php
      $no = 1;
      foreach ($hubungi as $hub) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td width="200px"><?= $hub->nama; ?></td>
            <td width="250px"><?= $hub->email; ?></td>
            <td><?= $hub->pesan; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/hubungi_kami/kirim_email/' . $hub->id_hubungi, '<div class="btn btn-sm btn-primary"><i class="fas fa-comment-dots"></i></div>'); ?>
            <td width="20px" class="text-center">
               <?= anchor('administrator/hubungi_kami/delete/' . $hub->id_hubungi, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>