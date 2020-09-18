<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form tambah tahun akademik
   </div>

   <form action="<?= base_url('administrator/tahun_akademik/tambah_tahun_akademik_aksi'); ?>" method="post">
      <div class="form-group">
         <label for="tahun_akademik">Tahun Akademik</label>
         <input class="form-control" type="text" name="tahun_akademik" id="tahun_akademik" placeholder="Masukan Tahun Akademik">
         <?= form_error('tahun_akademik', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="semester">Semester</label>
         <select name="semester" id="semester" class="form-control">
            <option value="">-- Pilih Semster --</option>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
         </select>
         <?= form_error('semester', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>
      <div class="form-group">
         <label for="status">Nama Jurusan</label>
         <select name="status" id="status" class="form-control">
            <option value="">-- Pilih Status --</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak aktif">Tidak aktif</option>
         </select>
         <?= form_error('status', '<div class="text-danger small ml-3">', '</div>'); ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('administrator/tahun_akademik'); ?>" class="btn btn-warning">Kembali</a>
   </form>

</div>