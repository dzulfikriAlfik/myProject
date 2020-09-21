<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open('admin/c_rt/simpan_rt'); ?>
<legend></legend>
    <div class="form-group">
    	 <label  class="col-md-3 control-label" for="nomor_rt">Nomor RT </label>
        <div class="col-md-9">         
         <input class="form-control input-md" type="text" name="nomor_rt" id="nomor_rt" size="30" placeholder="Nomor RT" required /> 
		<span class="help-block">
		<?php echo form_error('nomor_rt', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<div class="form-group">
    	 <label  class="col-md-3 control-label" for="luas_wilayah">Luas Wilayah </label>
        <div class="col-md-9">
         
         <input class="form-control input-md" type="text" name="luas_wilayah" id="luas_wilayah" size="30" placeholder="Luas Wilayah RT (ha)"required /> 
		<span class="help-block">
		<?php echo form_error('luas_wilayah', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	
	<div class="form-group">
    	 <label  class="col-md-3 control-label" for="nama_dusun">Dusun </label>
        <div class="col-md-9">
<select name="id_rw" class="form-control input-md">
        <?php 

          $data_rw = $this->db->query("SELECT * FROM ref_rw");
          foreach ($data_rw->result() as $key => $v_rw) {
            ?>
            
<option value="<?php echo $v_rw->id_rw ?>"><?php echo $v_rw->nomor_rw; ?></option>

            <?php
          }

         ?>

         </select>
         <span class="help-block">         
		
		</span>
		</div>
		
	</div>
	
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-3 control-label" for="nik_nama">Pencarian Data Ketua RT</label>  
      <div class="col-md-9">
      <input id="nik_nama" name="nik_nama" type="text" placeholder="NIK / Nama Penduduk" class="form-control input-md">
      <span class="help-block"><?php echo form_error('nik_nama', '<p class="field_error">','</p>')?></span>  
      </div>
    </div>
    
    <legend></legend>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-3 control-label" for="nik">NIK Ketua RT</label>  
      <div class="col-md-9">
      <input id="nik_sementara" name="nik_sementara" type="text" placeholder="NIK" class="form-control input-md" required="" disabled/>
      <input id="nik" name="nik" type="hidden" placeholder="NIK" class="form-control input-md" >
      <span class="help-block"><?php echo form_error('nik', '<p class="field_error">','</p>')?></span>  
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-3 control-label" for="nama">Nama Ketua RT</label>  
      <div class="col-md-9">
      <input id="nama_sementara" name="nama_sementara" type="text" placeholder="Nama Penduduk" class="form-control input-md" required="" disabled/>
      <input id="nama" name="nama" type="hidden" placeholder="Nama Penduduk" class="form-control input-md" >
      <span class="help-block"><?php echo form_error('nama', '<p class="field_error">','</p>')?></span>  
      </div>
    </div>

    <legend></legend>

<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan"/>Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_rt'"/>Batal</button>
    </div>
</div>

<?php echo form_close(); ?>

<script>    

  $(function() {
    var nikPenduduk = <?php  echo $json_array_nama; ?> ;
    $("#nik_nama" ).autocomplete({
      source: nikPenduduk,
      minLength: 2,
      select: function(event, ui) {
        
        bits = ui.item.value.split(' | ')
        nik = bits[bits.length - 2]
        nama = bits[bits.length - 1]
            $("#nik").val(nik);
            $("#nama").val(nama);
            $("#nik_sementara").val(nik);
            $("#nama_sementara").val(nama);
        },
        change: function(event, ui) {
        
        bits = ui.item.value.split(' | ')
        nik = bits[bits.length - 2]
        nama = bits[bits.length - 1]
                $("#nik").val(nik);
            $("#nama").val(nama);           
            $("#nik_sementara").val(nik);
            $("#nama_sementara").val(nama);
        }
    });
  });
  
  

  function nav_active(){

	document.getElementById("a-data-web").className = "collapsed active";
	
	var r = document.getElementById("pengelola_data_wilayah");
	r.className = "collapsed";

	var d = document.getElementById("nav-rt");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
  	$("#id_dusun").change(function(){
				var cek = document.getElementById("id_dusun").value;
				 if(cek === "")
				{
					document.getElementById("id_rw_sementara").style.display = 'block';
					document.getElementById("id_rw").style.display = 'none';
				}
				else
				{ 
					var id_dusun = {id_dusun:$("#id_dusun").val()};
					$.ajax({
							type: "POST",
							url : "<?php echo site_url('admin/c_rt/getRw')?>",
							data: id_dusun,
							success: function(msg){
							document.getElementById("id_rw_sementara").style.display = 'none';
								$('#lala').html(msg);
							}
						});
				} 
        });
});
  
</script>