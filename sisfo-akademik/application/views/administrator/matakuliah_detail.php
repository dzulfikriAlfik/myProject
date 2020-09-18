<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> Detail Mata Kuliah
   </div>

   <a href="<?= base_url('administrator/matakuliah'); ?>" class="btn btn-warning mb-3 mt-2">Kembali</a>

   <table class="table table-hover table-striped table-bordered">
      <?php foreach ($detail as $dt) : ?>
         <tr>
            <th>Kode Matakuliah</th>
            <td><?= $dt->kode_matakuliah; ?></td>
         </tr>
         <tr>
            <th>Nama Matakuliah</th>
            <td><?= $dt->nama_matakuliah; ?></td>
         </tr>
         <tr>
            <th>SKS</th>
            <td><?= $dt->sks; ?></td>
         </tr>
         <tr>
            <th>Semester</th>
            <td><?= $dt->semester; ?></td>
         </tr>
         <tr>
            <th>Nama Prodi</th>
            <td><?= $dt->nama_prodi; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

</div>