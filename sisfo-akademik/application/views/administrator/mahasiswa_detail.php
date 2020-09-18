<div class="container-fluid" style="height: 960px;">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> Detail Mahasiswa
   </div>

   <a href="<?= base_url('administrator/mahasiswa'); ?>" class="btn btn-warning mb-3 mt-2">Kembali</a><br>

   <table class="table table-hover table-striped table-bordered">

      <?php foreach ($detail as $mhs) : ?>
         <img src="<?= base_url('assets/uploads/img/') . $mhs->photo; ?>" alt="Photo Mahasiswa" width="200px" class="img-fluid img-thumbnail img-profile mt-2 mb-3">
         <tr>
            <td>NIM</td>
            <td><?= $mhs->nim; ?></td>
         </tr>
         <tr>
            <td>Nama Lengkap</td>
            <td><?= $mhs->nama_lengkap; ?></td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td><?= $mhs->alamat; ?></td>
         </tr>
         <tr>
            <td>Email</td>
            <td><?= $mhs->email; ?></td>
         </tr>
         <tr>
            <td>Telepon</td>
            <td><?= $mhs->telepon; ?></td>
         </tr>
         <tr>
            <td>Tempat Lahir</td>
            <td><?= $mhs->tempat_lahir; ?></td>
         </tr>
         <tr>
            <td>Tanggal Lahir</td>
            <td><?= strftime("%d %B %Y", strtotime($mhs->tanggal_lahir)); ?></td>
         </tr>
         <tr>
            <td>Jenis Kelamin</td>
            <td><?= $mhs->jenis_kelamin; ?></td>
         </tr>
         <tr>
            <td>Program Studi</td>
            <td><?= $mhs->nama_prodi; ?></td>
         </tr>
      <?php endforeach; ?>

   </table>

</div>