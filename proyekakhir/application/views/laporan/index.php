<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan</h3>
             <div class="box-tools">
                    <a href="<?php echo site_url('laporan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>                
      <th>Data Warga</th>
      <th>Keterangan</th>
                    </tr>
                    <?php foreach($laporan as $t){ ?>
                    <tr>
      <td>
        <a href="<?php echo site_url('assets/uploads/'.$t['data_warga']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Unduh File </a><?php echo $t['data_warga']; ?></td>
      <td><?php echo $t['keterangan']; ?></td>
      <td>
                            <a href="<?php echo site_url('laporan/edit/'.$t['id_laporan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('laporan/remove/'.$t['id_laporan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>