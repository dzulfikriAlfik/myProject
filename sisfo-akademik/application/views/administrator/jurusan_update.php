<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form update jurusan
   </div>

   <?php foreach ($jurusan as $jrs) : ?>
      <form action="<?= base_url('administrator/jurusan/update_aksi'); ?>" method="post">

         <input type="hidden" name="id_jurusan" value="<?= $jrs->id_jurusan; ?>">
         <div class="form-group">
            <label for="kode_jurusan">Kode Jurusan</label>
            <input class="form-control" type="text" name="kode_jurusan" id="kode_jurusan" placeholder="Masukan kode jurusan" value="<?= $jrs->kode_jurusan; ?>">
            <?= form_error('kode_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input class="form-control" type="text" name="nama_jurusan" id="nama_jurusan" placeholder="Masukan kode jurusan" value="<?= $jrs->nama_jurusan; ?>">
            <?= form_error('nama_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="<?= base_url('administrator/jurusan'); ?>" class="btn btn-warning">Kembali</a>
      </form>
   <?php endforeach; ?>

</div>