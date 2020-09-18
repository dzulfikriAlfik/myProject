<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Identitas Website
   </div>

   <?= $this->session->flashdata('pesan'); ?>

   <table class="table table-bordered table-hover table-striped">
      <tr>
         <th>No.</th>
         <th>Judul Website</th>
         <th>Alamat</th>
         <th>Email</th>
         <th>No. Telepon</th>
         <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      foreach ($identitas as $idt) : ?>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $idt->judul_website; ?></td>
            <td><?= $idt->alamat; ?></td>
            <td><?= $idt->email; ?></td>
            <td><?= $idt->telp; ?></td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/identitas/update/' . $idt->id_identitas, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>