<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Data</h3>
            </div>
   <?php echo form_open('laporan/edit/'.$laporan['id_laporan']); ?>
   <div class="box-body">
    <div class="row clearfix">
     <div class="col-md-12">
      <label for="data_warga" class="control-label"><span class="text-danger">*</span>Data Warga</label>
      <div class="form-group">
       <input type="text" name="data_warga" value="<?php echo ($this->input->post('data_warga') ? $this->input->post('data_warga') : $laporan['data_warga']); ?>" class="form-control" id="data_warga" />
       <span class="text-danger"><?php echo form_error('data_warga');?></span>
      </div>
     </div>
     <div class="col-md-12">
      <label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
      <div class="form-group">
       <input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $laporan['keterangan']); ?>" class="form-control" id="keterangan" />
       <span class="text-danger"><?php echo form_error('keterangan');?></span>
      </div>
     </div>
    </div>
   </div>
   <div class="box-footer">
             <button type="submit" class="btn btn-success">
     <i class="fa fa-check"></i> Save
    </button>
         </div>    
   <?php echo form_close(); ?>
  </div>
    </div>
</div>