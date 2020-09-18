<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form update prodi
   </div>

   <?php foreach ($prodi as $prd) : ?>
      <form action="<?= base_url('administrator/prodi/update_aksi'); ?>" method="post">

         <input type="hidden" name="id_prodi" value="<?= $prd->id_prodi; ?>">
         <div class="form-group">
            <label for="kode_prodi">Kode Prodi</label>
            <input class="form-control" type="text" name="kode_prodi" id="kode_prodi" placeholder="Masukan kode prodi" value="<?= $prd->kode_prodi; ?>">
            <?= form_error('kode_prodi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <input class="form-control" type="text" name="nama_prodi" id="nama_prodi" placeholder="Masukan nama prodi" value="<?= $prd->nama_prodi; ?>">
            <?= form_error('nama_prodi', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>
         <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <select name="nama_jurusan" id="nama_jurusan" class="form-control">
               <option value="<?= $prd->nama_jurusan; ?>"><?= $prd->nama_jurusan; ?></option>
               <?php foreach ($jurusan as $jrs) : ?>
                  <option value="<?= $jrs->nama_jurusan; ?>"><?= $jrs->nama_jurusan; ?></option>
               <?php endforeach; ?>
            </select>
            <?= form_error('nama_jurusan', '<div class="text-danger small ml-3">', '</div>'); ?>
         </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="<?= base_url('administrator/prodi'); ?>" class="btn btn-warning">Kembali</a>
      </form>
   <?php endforeach; ?>

</div>