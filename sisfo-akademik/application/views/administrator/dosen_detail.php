<div class="container-fluid" style="height: 960px;">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> Detail Dosen
   </div>

   <a href="<?= base_url('administrator/dosen'); ?>" class="btn btn-warning mb-3 mt-2">Kembali</a><br>

   <table class="table table-hover table-striped table-bordered">

      <?php foreach ($detail as $dsn) : ?>
         <img src="<?= base_url('assets/uploads/img/') . $dsn->photo; ?>" alt="Photo Dosen" width="200px" class="img-fluid img-thumbnail img-profile mt-2 mb-3">
         <tr>
            <td>NIDN</td>
            <td><?= $dsn->nidn; ?></td>
         </tr>
         <tr>
            <td>Nama Dosen</td>
            <td><?= $dsn->nama_dosen; ?></td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td><?= $dsn->alamat; ?></td>
         </tr>
         <tr>
            <td>Jenis Kelamin</td>
            <td><?= $dsn->jenis_kelamin; ?></td>
         </tr>
         <tr>
            <td>Email</td>
            <td><?= $dsn->email; ?></td>
         </tr>
         <tr>
            <td>Telepon</td>
            <td><?= $dsn->telp; ?></td>
         </tr>
      <?php endforeach; ?>

   </table>

</div>