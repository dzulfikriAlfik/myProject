<div class="container-fluid" style="height:1150px">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah dosen
   </div>

   <?= form_open_multipart('administrator/dosen/tambah_dosen_aksi'); ?>

   <div class="form-group">
      <label for="nidn">NIDN</label>
      <input type="text" name="nidn" id="nidn" class="form-control" placeholder="NIM">
      <?= form_error('nidn', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="nama_dosen">Nama Dosen</label>
      <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" placeholder="Nama dosen">
      <?= form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control"></textarea>
      <?= form_error('alamat', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
         <option value="">-- Pilih Jenis Kelamin --</option>
         <option value="Laki-laki">Laki-laki</option>
         <option value="Perempuan">Perempuan</option>
      </select>
      <?= form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email">
      <?= form_error('email', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="telp">Telepon</label>
      <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon">
      <?= form_error('telp', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="photo" class="mb-4 mt-4">Foto</label>
      <input type="file" name="photo" id="photo">
      <?= form_error('photo', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>

   <button type="submit" class="btn btn-primary">Simpan</button>
   <a href="<?= base_url('administrator/dosen'); ?>" class="btn btn-warning">Kembali</a>

   <?= form_close(); ?>

</div>