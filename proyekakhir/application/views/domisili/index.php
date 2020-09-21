<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Domisili</h3>
             <div class="box-tools">
                    <a href="<?php echo site_url('domisili/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
      <th>Nama Warga</th>
      <th>NIK</th>
      <th>Jenis Kelamin</th>
      <th>Tempat Tanggal Lahir</th>
      <th>Agama</th>
      <th>Kewarganegaraan</th>
      <th>Status</th>
      <th>Pekerjaan</th>
      <th>Pendidikan</th>
      <th>Alamat Asal</th>
      <th>Pindah Ke-</th>
      <th>Alasan Pindah</th>
      <th>Pengikut</th>
      <th>Tanggal Surat Dibuat</th>
      <th>Tanggal Surat Masuk</th>
      <th?>Keterangan</th>
      <th?>Scan</th>
                    </tr>
                    <?php foreach($domisili as $t){ ?>
                    <tr>
      <td><?php echo $t['nama_warga']; ?></td>
      <td><?php echo $t['nik']; ?></td>
      <td><?php echo $t['jenis_kelamin']; ?></td>
      <td><?php echo $t['tempat_tanggal_lahir']; ?></td>
      <td><?php echo $t['agama']; ?></td>
      <td><?php echo $t['kewarganegaraan']; ?></td>
      <td><?php echo $t['status']; ?></td>
      <td><?php echo $t['pekerjaan']; ?></td>
      <td><?php echo $t['pendidikan']; ?></td>
      <td><?php echo $t['alamat_asal']; ?></td>
      <td><?php echo $t['pindah_ke']; ?></td>
      <td><?php echo $t['alasan_pindah']; ?></td>
      <td><?php echo $t['pengikut']; ?></td>
      <td><?php echo $t['tgl_surat_dibuat']; ?></td>
      <td><?php echo $t['tgl_surat_masuk']; ?></td>
      <td><?php echo $t['ket']; ?></td>
      <td><?php echo $t['scan']; ?></td>
      <td>
                            <a href="<?php echo site_url('domisili/edit/'.$t['nik']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('domisili/remove/'.$t['nik']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>