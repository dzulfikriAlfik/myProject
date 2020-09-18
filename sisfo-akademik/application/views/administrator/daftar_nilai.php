<?php

$nilai   = get_instance();
$nilai->load->model('krs_model');
$nilai->load->model('mahasiswa_model');
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

$krs              = $nilai->krs_model->get_by_id($id_krs[0]);
$kode_matakuliah  = $krs->kode_matakuliah;
$id_thn_aka       = $krs->id_thn_aka;

?>

<div class="container-fluid">
   <div class="alert alert-success">
      <i class="fas fa-university"></i> Daftar Nilai Mahasiswa
   </div>

   <?= anchor('administrator/nilai/input_nilai', '<div class="btn btn-sm btn-warning">Kembali</div>'); ?>

   <center>
      <legend><strong>Daftar Nilai Mahasiswa</strong></legend>
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

   <table class="table table-bordered table-hover table-striped mt-5">
      <tr>
         <td>No.</td>
         <td>NIM</td>
         <td>Nama Lengkap</td>
         <td>Nilai</td>
      </tr>
      <?php
      $no = 1;
      for ($i = 0; $i < count($id_krs); $i++) { ?>
         <tr>
            <td><?= $no++; ?></td>
            <?php $nim = $nilai->krs_model->get_by_id($id_krs[$i])->nim; ?>
            <td><?= $nim; ?></td>
            <td><?= $nilai->mahasiswa_model->get_by_id($nim)->nama_lengkap; ?></td>
            <td><?= $nilai->krs_model->get_by_id($id_krs[$i])->nilai; ?></td>
         </tr>
      <?php } ?>
      </tabel>
</div>