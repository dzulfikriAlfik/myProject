<div class="container-fluid" style="height: 900px;">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form Update Tentang Kampus
   </div>

   <?php foreach ($tentang as $ttg) : ?>
      <form action="<?= base_url('administrator/tentang_kampus/update_aksi'); ?>" method="post">

         <input type="hidden" name="id_tentang" value="<?= $ttg->id_tentang; ?>">

         <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea name="sejarah" cols="30" rows="10" class="form-control"><?= $ttg->sejarah; ?></textarea>
            <?= form_error('sejarah', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="visi">Visi</label>
            <textarea name="visi" cols="30" class="form-control"><?= $ttg->visi; ?></textarea>
            <?= form_error('visi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="misi">Misi</label>
            <textarea name="misi" cols="30" rows="5" class="form-control"><?= $ttg->misi; ?></textarea>
            <?= form_error('misi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="<?= base_url('administrator/tentang_kampus'); ?>" class="btn btn-warning">Kembali</a>
      </form>
   <?php endforeach; ?>

</div>