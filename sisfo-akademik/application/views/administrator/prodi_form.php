<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah program studi
   </div>

   <form action="<?= base_url('administrator/prodi/tambah_prodi_aksi'); ?>" method="post">
      <div class="form-group">
         <label for="kode_prodi">Kode Prodi</label>
         <input class="form-control" type="text" name="kode_prodi" id="kode_prodi" placeholder="Masukan kode prodi">
         <?= form_error('kode_prodi', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_prodi">Nama Prodi</label>
         <input class="form-control" type="text" name="nama_prodi" id="nama_prodi" placeholder="Masukan nama prodi">
         <?= form_error('nama_prodi', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_jurusan">Nama Jurusan</label>
         <select name="nama_jurusan" id="nama_jurusan" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach ($jurusan as $jrs) : ?>
               <option value="<?= $jrs->nama_jurusan; ?>"><?= $jrs->nama_jurusan; ?></option>
            <?php endforeach; ?>
         </select>
         <?= form_error('nama_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/prodi'); ?>" class="btn btn-warning">Kembali</a>
   </form>

</div>