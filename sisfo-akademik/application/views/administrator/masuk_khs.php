<div class="container-fluid">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Form masuk halaman KHS
   </div>

   <?= $this->session->flashdata('pesan'); ?>

   <form action="<?= base_url('administrator/nilai/nilai_aksi'); ?>" method="post">

      <div class="form-group">
         <label for="nim">NIM Mahasiswa</label>
         <input type="text" name="nim" id="nim" placeholder="Masukan NIM Mahasiswa" class="form-control">
         <?= form_error('nim', '<div class="text-danger small ml-3">', '</div'); ?>
      </div>

      <div class="form-group">
         <label for="thn_aka">Tahun Akademik / Semester</label>
         <?php
         $query = $this->db->query('SELECT id_thn_aka, semester, CONCAT(tahun_akademik, " ") AS thn_semester FROM tahun_akademik');
         $dropdowns = $query->result();

         foreach ($dropdowns as $dropdown) {
            if ($dropdown->semester == 'Ganjil') {
               $tampilSemester = "Ganjil";
               // 
            } else if ($dropdown->semester == 'Genap') {
               $tampilSemester = "Genap";
            }

            $dropdownList[$dropdown->id_thn_aka] = $dropdown->thn_semester . " " . $tampilSemester;
         }

         echo form_dropdown('id_thn_aka', $dropdownList, '', 'class="form-control" id="id_thn_aka" ');
         ?>
      </div>

      <button type="submit" class="btn btn-primary">Proses</button>

   </form>



</div>