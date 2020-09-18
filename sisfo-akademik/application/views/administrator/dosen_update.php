<div class="container-fluid" style="height:1350px">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form update dosen
   </div>

   <?php foreach ($dosen as $dsn) : ?>

      <?= form_open_multipart('administrator/dosen/update_dosen_aksi'); ?>

      <input type="hidden" name="id_dosen" value="<?= $dsn->id_dosen; ?>">

      <div class="form-group">
         <label for="nidn">NIDN</label>
         <input type="text" name="nidn" id="nidn" class="form-control" placeholder="NIDN" value="<?= $dsn->nidn; ?>">
         <?= form_error('nidn', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_dosen">Nama Dosen</label>
         <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" placeholder="Nama Dosen" value="<?= $dsn->nama_dosen; ?>">
         <?= form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="alamat">Alamat</label>
         <textarea name="alamat" id="alamat" class="form-control" value="<?= $dsn->alamat; ?>"><?= $dsn->alamat; ?></textarea>
         <?= form_error('alamat', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="jenis_kelamin">Jenis Kelamin</label>
         <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <option value="<?= $dsn->jenis_kelamin; ?>"><?= $dsn->jenis_kelamin; ?></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
         </select>
         <?= form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= $dsn->email; ?>">
         <?= form_error('email', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="telp">Telepon</label>
         <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon" value="<?= $dsn->telp; ?>">
         <?= form_error('telp', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <?= form_error('photo', '<div class="text-danger ml-3 mb-2">', '</div>'); ?>

         <img src="<?= base_url('assets/uploads/img/') . $dsn->photo; ?>" alt="&nbsp;Foto Dosen" width="200px" class="img-fluid img-thumbnail img-profile"><br>

         <label for="photo" class="mb-4 mt-4">Foto</label>
         <input type="file" name="photo" id="photo" value="<?= $dsn->photo; ?>">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/dosen'); ?>" class="btn btn-warning">Kembali</a>

      <?= form_close(); ?>

   <?php endforeach; ?>

</div>