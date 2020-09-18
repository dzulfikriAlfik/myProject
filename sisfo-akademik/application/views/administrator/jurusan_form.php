<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah jurusan
   </div>

   <form action="<?= base_url('administrator/jurusan/input_aksi'); ?>" method="post">
      <div class="form-group">
         <label for="kode_jurusan">Kode Jurusan</label>
         <input class="form-control" type="text" name="kode_jurusan" id="kode_jurusan" placeholder="Masukan kode jurusan">
         <?= form_error('kode_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_jurusan">Nama Jurusan</label>
         <input class="form-control" type="text" name="nama_jurusan" id="nama_jurusan" placeholder="Masukan nama jurusan">
         <?= form_error('nama_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/jurusan'); ?>" class="btn btn-warning">Kembali</a>
   </form>

</div>