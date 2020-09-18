<div class="container-fluid" style="height: 900px;">

   <?= anchor('administrator/transkrip_nilai', '<div class="btn btn-sm btn-warning">Kembali</div>'); ?>

   <center>
      <legend><strong>Masukkan Nilai Akhir</strong></legend>
      <table class="table-hover mt-4" cellpadding="7">
         <tr>
            <td>NIM</td>
            <td> : <?= $nim; ?></td>
         </tr>
         <tr>
            <td>NAMA</td>
            <td> : <?= $nama; ?></td>
         </tr>
         <tr>
            <td>Program Studi</td>
            <td> : <?= $prodi; ?></td>
         </tr>
      </table>
   </center>

   <table class="table table-bordered table-hover table-striped mt-3">
      <tr>
         <th>No.</th>
         <th>Kode Mata kuliah</th>
         <th>Nama Mata kuliah</th>
         <th class="text-center">SKS</th>
         <th class="text-center">Nilai</th>
         <th class="text-center">Skor</th>
      </tr>
      <?php
      $no = 1;
      $JSks = 0;
      $JSkor = 0;

      foreach ($transkrip as $tr) : ?>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $tr->kode_matakuliah; ?></td>
            <td><?= $tr->nama_matakuliah; ?></td>
            <td class="text-center"><?= $tr->sks; ?></td>
            <td class="text-center"><?= $tr->nilai; ?></td>
            <td class="text-center"><?= skorNilai($tr->nilai, $tr->sks); ?></td>

            <?php
            $JSks    += $tr->sks;
            $JSkor   += skorNilai($tr->nilai, $tr->sks);
            ?>

         </tr>
      <?php endforeach; ?>
      <tr>
         <td colspan="3">Jumlah</td>
         <td class="text-center"><?= $JSks; ?></td>
         <td colspan="2" class="text-center"><?= $JSkor; ?></td>
      </tr>
   </table>

   <p class="text-center">Index Prestasi Kumulatif : <?= number_format($JSkor / $JSks, 2); ?></p>
</div>