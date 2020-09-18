<div class="container-fluid" style="height: 1200px;">

   <div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> Kartu Hasil Studi (KHS)
   </div>

   <a href="<?= base_url('administrator/nilai'); ?>" class="btn btn-warning mb-3 mt-2">Kembali</a><br>

   <?= $this->session->flashdata('pesan'); ?>

   <center>
      <legend class="mt-3"><strong>Kartu Hasil Studi</strong></legend>

      <table class="table-hover mt-4" cellpadding="7">
         <tr>
            <td><strong>NIM &nbsp;</strong></td>
            <td>:</td>
            <td width="200px">&nbsp;<?= $mhs_nim; ?></td>
         </tr>
         <tr>
            <td><strong>Nama Lengkap &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $mhs_nama; ?></td>
         </tr>
         <tr>
            <td><strong>Program Studi &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $mhs_prodi; ?></td>
         </tr>
         <tr>
            <td><strong>Tahun Akademik (Semester) &nbsp;</strong></td>
            <td>:</td>
            <td>&nbsp;<?= $thn_aka; ?></td>
         </tr>
      </table>
   </center>

   <?= anchor('administrator/khs/print', '<button class="btn btn-sm btn-info mt-5"><i class="fas fa-print fa-sm"></i> Print</button>'); ?>

   <table class="table table-bordered table-hover table-striped mt-3">
      <tr>
         <th>No.</th>
         <th>Kode Mata Kuliah</th>
         <th>Nama Mata Kuliah</th>
         <th>SKS</th>
         <th>Nilai</th>
         <th>Skor</th>
      </tr>
      <?php $no = 1;
      $jumlahSks = 0;
      $jumlahNilai = 0;
      foreach ($mhs_data as $row) : ?>
         <tr>
            <td width="20px"><?= $no++; ?></td>
            <td><?= $row->kode_matakuliah; ?></td>
            <td><?= $row->nama_matakuliah; ?></td>
            <td><?= $row->sks; ?></td>
            <td><?= $row->nilai; ?></td>
            <td><?= skorNilai($row->nilai, $row->sks); ?></td>
            <?php
            $jumlahSks += $row->sks;
            $jumlahNilai += skorNilai($row->nilai, $row->sks);
            ?>
         </tr>
      <?php endforeach; ?>
      <tr>
         <td colspan="3">Jumlah</td>
         <td><?= $jumlahSks; ?></td>
         <td><?= $jumlahNilai; ?></td>
      </tr>

   </table>

   Index Prestasi : <?= number_format($jumlahNilai / $jumlahSks, 2); ?>

</div>