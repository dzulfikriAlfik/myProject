<div class="container-fluid">

   <div class="alert alert-success">
      <i class="fas fa-university"></i> Form masuk halaman transkrip nilai
   </div>

   <form action="<?= base_url('administrator/transkrip_nilai/buat_transkrip_aksi'); ?>" method="post">

      <div class="form-group">
         <label for="nim">NIM</label>
         <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan NIM">
         <?= form_error('nim', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Proses</button>

   </form>

</div>