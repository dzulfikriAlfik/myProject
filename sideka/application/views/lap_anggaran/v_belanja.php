<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $page_title;?></title>

    <style>
      table, tr, th, td {
          border: 1px solid #C6C6C6;
          border-collapse: collapse;
      }
      #head-tr{
        height: 40px;
        background-color: #222;
        color: #f1f1f1;
      }
      #foot-tr{
        height: 30px;
        background-color: #f1f1f1;
        color: #222;
      }
    </style>
  </head>
  <body onload="window.print()">

    <h2 align="center">
      LAPORAN ANGGARAN BELANJA <br>
      DESA <?= strtoupper($v_belanja->row()->nama_desa);?>
    </h2>

    <table border="1" width="100%">
      <tr id='head-tr'>
        <th width='50'>No.</th>
        <th>Bidang & Kegiatan</th>
        <th>Anggaran</th>
        <th>Perubahan</th>
        <th>Jumlah</th>
        <th>Nama Rekening</th>
        <th>Tanggal</th>
      </tr>
      <?php
      $no='1';
      foreach ($v_belanja->result() as $baris) {?>
        <tr>
          <th><?php echo $no; ?></th>
          <th align='left'>&nbsp; <?php echo ucwords($baris->bidang_kegiatan); ?></th>
          <th align='left'>&nbsp; Rp. <?php echo number_format($baris->anggaran,0,",","."); ?></th>
          <th align='left'>&nbsp; Rp. <?php echo number_format($baris->anggaranpak,0,",","."); ?></th>
          <th align='left'>&nbsp; Rp. <?php echo number_format($baris->jumlah,0,",","."); ?></th>
          <th align='left'>&nbsp; <?php echo ucwords($baris->nama_rek); ?></th>
          <th><?php echo $baris->tgl_pendapatan; ?></th>
        </tr>
      <?php
      $no++;
      } ?>
      <tr id='foot-tr'>
        <th colspan="2" rowspan="2" align='right'> Total : &nbsp;</th>
        <th align="left">&nbsp; Rp. <?php echo number_format($v_total->t_anggaran,0,",","."); ?></th>
        <th align="left">&nbsp; Rp. <?php echo number_format($v_total->t_anggaranpak,0,",","."); ?></th>
        <th align="left">&nbsp; Rp. <?php echo number_format($v_total->t_jumlah,0,",","."); ?></th>
        <th colspan="2" rowspan="2"></th>
      </tr>
      <tr id='foot-tr'>
        <th colspan="3" style="height:40px;">Rp. <?= number_format($v_total->t_anggaran + $v_total->t_anggaranpak + $v_total->t_jumlah,0,",","."); ?></th>
      </tr>
    </table>

  </body>
</html>
