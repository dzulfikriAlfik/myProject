<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah user
   </div>

   <form action="<?= base_url('administrator/user/tambah_user_aksi'); ?>" method="post">
      <div class="form-group">
         <label for="username">Username</label>
         <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username">
         <?= form_error('username', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="password">Password</label>
         <input class="form-control" type="text" name="password" id="password" placeholder="Masukan Password">
         <?= form_error('password', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input class="form-control" type="text" name="email" id="email" placeholder="Masukan Email">
         <?= form_error('email', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="level">Level</label>
         <select name="level" id="level" class="form-control">
            <option value="admin">Admin</option>
            <option value="mahasiswa">Mahasiswa</option>
            <!-- <?php
            if ($level == 'admin') { ?>
               <option value="admin" selected>Admin</option>
               <option value="mahasiswa">Mahasiswa</option>
            <?php } else if ($level == 'mahasiswa') { ?>
               <option value="admin">Admin</option>
               <option value="mahasiswa" selected>Mahasiswa</option>
            <?php } else { ?>
               <option value="admin">Admin</option>
               <option value="mahasiswa">Mahasiswa</option>
            <?php } ?> -->
         </select>
         <?= form_error('level', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="blokir">Blokir</label>
         <select name="blokir" id="blokir" class="form-control">
            <?php
            if ($blokir == 'Y') { ?>
               <option value="Y" selected>Ya</option>
               <option value="N">Tidak</option>
            <?php } else if ($blokir == 'N') { ?>
               <option value="Y">Ya</option>
               <option value="N" selected>Tidak</option>
            <?php } else { ?>
               <option value="Y">Ya</option>
               <option value="N">Tidak</option>
            <?php } ?>
         </select>
         <?= form_error('blokir', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/prodi'); ?>" class="btn btn-warning">Kembali</a>
   </form>

</div>