<div class="container-fluid" style="height: 1200px;">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Kartu Rencana Studi (KRS)
   </div>

   <a href="<?= base_url('administrator/krs'); ?>" class="btn btn-warning mb-3 mt-2">Kembali</a><br>

   <?= $this->session->flashdata('pesan'); ?>

   <center>
      <legend class="mt-3"><strong>Kartu Rencana Studi</strong></legend>

      <table class="table-hover mt-4" cellpadding="7">
         <tr>
            <td><strong>NIM &nbsp;</strong></td>
            <td>:</td>
            <td width="200px">&nbsp;<?= $nim; ?></td>
         </tr>
         <tr>
            <td><strong>Nama Lengkap &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $nama_lengkap; ?></td>
         </tr>
         <tr>
            <td><strong>Program Studi &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $prodi; ?></td>
         </tr>
         <tr>
            <td><strong>Tahun Akademik (Semester) &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $tahun_akademik . '&nbsp;(' . $semester . ')'; ?></td>
         </tr>
      </table>
   </center>

   <?= anchor('administrator/krs/tambah_krs/' . $nim . '/' . $id_thn_aka, '<button class="btn btn-sm btn-primary mt-5"><i class="fas fa-plus fa-sm"></i> Tambah Data Krs</button>'); ?>
   <?= anchor('administrator/krs/print', '<button class="btn btn-sm btn-info mt-5"><i class="fas fa-print fa-sm"></i> Print</button>'); ?>

   <table class="table table-bordered table-hover table-striped mt-3">
      <tr>
         <th>No.</th>
         <th>Kode Mata Kuliah</th>
         <th>Nama Mata Kuliah</th>
         <th>SKS</th>
         <th colspan="2">Aksi</th>
      </tr>
      <?php $no = 1;
      $jumlahSks = 0;
      foreach ($krs_data as $krs) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $krs->kode_matakuliah; ?></td>
            <td><?= $krs->nama_matakuliah; ?></td>
            <td>
               <?= $krs->sks;
               $jumlahSks += $krs->sks;
               ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/krs/update/' . $krs->id_krs, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td width="20px" class="text-center">
               <?= anchor('administrator/krs/delete/' . $krs->id_krs, '<div class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\');"><i class="fas fa-trash"></i></div>'); ?>
            </td>
         </tr>
      <?php endforeach; ?>
      <tr>
         <td colspan="3" align="right">
            <strong>Jumlah SKS</strong>
         </td>
         <td colspan="3"><strong><?= $jumlahSks; ?></strong></td>
      </tr>
   </table>

</div>