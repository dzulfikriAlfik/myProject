<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form Update Identitas
   </div>

   <?php foreach ($identitas as $idt) : ?>
      <form action="<?= base_url('administrator/identitas/update_aksi'); ?>" method="post">

         <input type="hidden" name="id_identitas" value="<?= $idt->id_identitas; ?>">

         <div class="form-group">
            <label for="judul_website">Judul Website</label>
            <input class="form-control" type="text" name="judul_website" id="judul_website" placeholder="Masukan Judul Website" value="<?= $idt->judul_website; ?>">
            <?= form_error('judul_website', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" value="<?= $idt->alamat; ?>">
            <?= form_error('alamat', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="Masukan Email" value="<?= $idt->email; ?>">
            <?= form_error('email', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="telp">No. Telp</label>
            <input class="form-control" type="text" name="telp" id="telp" placeholder="Masukan No. Telp" value="<?= $idt->telp; ?>">
            <?= form_error('telp', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="<?= base_url('administrator/identitas'); ?>" class="btn btn-warning">Kembali</a>
      </form>
   <?php endforeach; ?>

</div>