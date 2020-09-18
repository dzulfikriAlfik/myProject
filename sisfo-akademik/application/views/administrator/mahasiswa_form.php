<div class="container-fluid" style="height:1150px">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah mahasiswa
   </div>

   <?= form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi'); ?>

   <div class="form-group">
      <label for="nim">NIM</label>
      <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM">
      <?= form_error('nim', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="nama_lengkap">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
      <?= form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control"></textarea>
      <?= form_error('alamat', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email">
      <?= form_error('email', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="telepon">Telepon</label>
      <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Nomor Telepon">
      <?= form_error('telepon', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
      <?= form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
      <?= form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>'); ?>
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
      <label for="nama_prodi">Program Studi</label>
      <select name="nama_prodi" id="nama_prodi" class="form-control">
         <option value="">-- Pilih Program Studi --</option>
         <?php foreach ($prodi as $prd) : ?>
            <option value="<?= $prd->nama_prodi; ?>"><?= $prd->nama_prodi; ?></option>
         <?php endforeach; ?>
      </select>
      <?= form_error('nama_prodi', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>
   <div class="form-group">
      <label for="photo" class="mb-4 mt-4">Foto</label>
      <input type="file" name="photo" id="photo">
      <?= form_error('photo', '<div class="text-danger small ml-3">', '</div>'); ?>
   </div>

   <button type="submit" class="btn btn-primary">Simpan</button>
   <a href="<?= base_url('administrator/mahasiswa'); ?>" class="btn btn-warning">Kembali</a>

   <?= form_close(); ?>

</div>