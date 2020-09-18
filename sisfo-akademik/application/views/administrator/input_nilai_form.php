<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form masuk halaman input nilai
   </div>

   <form action="<?= base_url('administrator/nilai/input_nilai_aksi'); ?>" method="post">

      <div class="form-group">
         <label for="tahun_aka">Tahun Akademik (Semester)</label>
         <?php
         $query = $this->db->query('SELECT id_thn_aka, semester, CONCAT(tahun_akademik, " ") AS ta_semester FROM tahun_akademik');
         $dropdowns = $query->result();

         foreach ($dropdowns as $dropdown) {
            if ($dropdown->semester == 'Ganjil') {
               $tampilSemester = 'Ganjil';
            } else {
               $tampilSemester = 'Genap';
            }

            $dropDownList[$dropdown->id_thn_aka] = $dropdown->ta_semester . " " . $tampilSemester;
         }

         echo form_dropdown('id_thn_aka', $dropDownList, '', 'class="form-control"');
         ?>
      </div>

      <div class="form-group">
         <label for="kode_matakuliah">Kode Mata kuliah</label>
         <input type="text" name="kode_matakuliah" id="kode_matakuliah" class="form-control" placeholder="Masukan Kode Mata Kuliah">
      </div>

      <button type="submit" class="btn btn-primary">Proses</button>

   </form>

</div>