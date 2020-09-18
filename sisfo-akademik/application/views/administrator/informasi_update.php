<div class="container-fluid" style="height:900px">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form edit informasi
   </div>

   <?php
   foreach ($informasi as $info) : ?>

      <form action="<?= base_url('administrator/informasi/update_informasi_aksi'); ?>" method="post">

         <input type="hidden" name="id_informasi" value="<?= $info->id_informasi; ?>">

         <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon" value="<?= $info->icon; ?>">
            <?= form_error('icon', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="judul_informasi">Judul Informasi</label>
            <input type="text" name="judul_informasi" id="judul_informasi" class="form-control" placeholder="Judul Informasi" value="<?= $info->judul_informasi; ?>">
            <?= form_error('judul_informasi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="isi_informasi">Isi Informasi</label>
            <textarea name="isi_informasi" id="isi_informasi" cols="30" rows="7" class="form-control"><?= $info->isi_informasi; ?></textarea>
            <?= form_error('isi_informasi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="<?= base_url('administrator/informasi'); ?>" class="btn btn-warning">Kembali</a>

      </form>

   <?php endforeach; ?>

</div>