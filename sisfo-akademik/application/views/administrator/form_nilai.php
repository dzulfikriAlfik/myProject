<?php

$nilai = get_instance();
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

?>

<div class="container-fluid">

   <?php
   if ($list_nilai == null) {
      $thn        = $nilai->tahunakademik_model->get_by_id($id_thn_aka);
      $semester   = $thn->semester;
      // $semester   = $thn->semester == 'Ganjil';

      if ($semester == 'Ganjil') {
         $tampilSemester = 'Ganjil';
      } else {
         $tampilSemester = 'Genap';
      }

   ?>

      <div class="alert alert-danger">
         Maaf, kode mata kuliah yang anda input <strong>Tidak Tersedia</strong> di <?= $thn->tahun_akademik . " (" . $tampilSemester . ")"; ?>
      </div>

      <?= anchor('administrator/nilai/input_nilai', '<div class="btn btn-sm btn-warning">Kembali</div>'); ?>

   <?php
   } else { ?>
      <?= anchor('administrator/nilai/input_nilai', '<div class="btn btn-sm btn-warning">Kembali</div>'); ?>
      <center>
         <legend><strong>Masukkan Nilai Akhir</strong></legend>
         <table class="table-hover mt-4" cellpadding="7">
            <tr>
               <td>Kode Mata kuliah</td>
               <td> : <?= $kode_matakuliah; ?></td>
            </tr>
            <tr>
               <td>Nama Mata kuliah</td>
               <td> : <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
            </tr>
            <tr>
               <td>SKS</td>
               <td> : <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
            </tr>
            <?php
            $thn = $nilai->tahunakademik_model->get_by_id($id_thn_aka);
            $semester   = $thn->semester;
            // $semester   = $thn->semester == 'Ganjil';

            if ($semester == 'Ganjil') {
               $tampilSemester = 'Ganjil';
            } else {
               $tampilSemester = 'Genap';
            }
            ?>
            <tr>
               <td>
                  Tahun Akademik (Semester)
               </td>
               <td> : <?= $thn->tahun_akademik . " (" . $tampilSemester . ")"; ?></td>
            </tr>
         </table>
      </center>

      <form action="<?= base_url('administrator/nilai/simpan_nilai'); ?>" method="post">
         <table class="table table-bordered table-hover table-striped mt-5">
            <tr>
               <th>No.</th>
               <th>NIM</th>
               <th>Nama Mahasiswa</th>
               <th>Nilai</th>
            </tr>
            <?php
            $no = 1;
            foreach ($list_nilai as $row) : ?>
               <tr>
                  <td width="30px"><?= $no++; ?></td>
                  <td><?= $row->nim; ?></td>
                  <td><?= $row->nama_lengkap; ?></td>
                  <input type="hidden" name="id_krs[]" value="<?= $row->id_krs; ?>">
                  <td width="80px"><input type="text" name="nilai[]" class="form-control text-center" value="<?= $row->nilai; ?>" id="nilai"></td>
               </tr>
            <?php endforeach; ?>
         </table>
         <button type="submit" class="btn btn-primary">Simpan</button>
      </form>

   <?php } ?>

</div>