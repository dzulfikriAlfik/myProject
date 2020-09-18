<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-plus"></i> Form tambah data KRS
   </div>

   <?= $this->session->flashdata('pesan'); ?>

   <form action="<?= base_url('administrator/krs/tambah_krs_aksi'); ?>" method="post">

      <input type="hidden" name="id_thn_aka" id="id_thn_aka" class="form-control" value="<?= $id_thn_aka; ?>">
      <input type="hidden" name="id_krs" id="id_krs" class="form-control" value="<?= $id_krs; ?>">

      <div class="form-group">
         <label for="thn_aka_smt">Tahun Akademik</label>
         <input type="text" name="thn_aka_smt" id="thn_aka_smt" class="form-control" value="<?= $thn_aka_smt . ' ' . $semester; ?>" readonly>
      </div>
      <div class="form-group">
         <label for="nim">NIM Mahasiswa</label>
         <input type="text" name="nim" id="nim" class="form-control" value="<?= $nim; ?>" readonly>
      </div>
      <div class="form-group">
         <label for="nama_matakuliah">Mata Kuliah</label>
         <?php
         $query = $this->db->query("SELECT kode_matakuliah, nama_matakuliah FROM matakuliah");
         $dropdowns = $query->result();

         foreach ($dropdowns as $dropdown) {
            $dropdownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
         }

         echo form_dropdown('kode_matakuliah', $dropdownList, $kode_matakuliah, 'class="form-control" id="kode_matakuliah"');

         ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <?= anchor('administrator/krs/krs_aksi', '<div class="btn btn-danger"> Cancel </div>'); ?>

   </form>

</div>