<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah mata kuliah
   </div>

   <form action="<?= base_url('administrator/matakuliah/tambah_matakuliah_aksi'); ?>" method="post">
      <div class="form-group">
         <label for="kode_matakuliah">Kode Mata Kuliah</label>
         <input type="text" name="kode_matakuliah" id="kode_matakuliah" class="form-control" placeholder="Kode Mata Kuliah ...">
         <?= form_error('kode_matakuliah', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_matakuliah">Nama Mata Kuliah</label>
         <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="form-control" placeholder="Nama Mata Kuliah ...">
         <?= form_error('nama_matakuliah', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="sks">SKS</label>
         <select name="sks" id="sks" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
         </select>
         <?= form_error('sks', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="semester">Semester</label>
         <select name="semester" id="semester" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
         </select>
         <?= form_error('semester', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="nama_prodi">Program Studi</label>
         <select name="nama_prodi" id="nama_prodi" class="form-control">
            <option value="">-- Pilih Program Studi --</option>
            <?php foreach ($prodi as $prd) : ?>
               <option value="<?= $prd->nama_prodi; ?>"><?= $prd->nama_prodi; ?></option>
            <?php endforeach; ?>
         </select>
         <?= form_error('nama_matakuliah', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/matakuliah'); ?>" class="btn btn-warning">Kembali</a>
   </form>

</div>