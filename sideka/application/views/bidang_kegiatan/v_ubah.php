<!-- Memanggil file .js untuk proses autocomplete -->
  <script type='text/javascript' src='<?php echo base_url();?>assetku/autocomplete/js/jquery-1.8.2.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url();?>assetku/autocomplete/js/jquery.autocomplete.js'></script>

  <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
  <link href='<?php echo base_url();?>assetku/autocomplete/js/jquery.autocomplete.css' rel='stylesheet' />

  <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
  <link href='<?php echo base_url();?>assetku/autocomplete/css/default.css' rel='stylesheet' />

  <script type='text/javascript'>
      var site = "<?php echo site_url();?>";
      $(function(){
          $('#desa').autocomplete({
              // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
              serviceUrl: site+'datapenduduk/c_bidang_kegiatan/cari_desa',
              // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
              onSelect: function (suggestion) {
                  $('#v_id_desa').val(''+suggestion.id_desa); // membuat id 'v_nim' untuk ditampilkan
                  // $('#v_jurusan').val(''+suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
              }
          });

          $("#desa").keyup(function(){
              if ($("#desa").val() == '') {
                  $('#v_id_desa').val('');
              }
          });

      });
  </script>

<h2><?= $page_title ?></h2>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open_multipart('datapenduduk/c_bidang_kegiatan/update_bidang_kegiatan'); ?>
	<fieldset>
		<!-- Form Name -->
		<legend></legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="id_bidang_kegiatan">ID BIDANG & KEGIATAN</label>
		  <div class="col-md-9">
		  <input value="<?= $hasil->id_bidang_kegiatan?>" id="id_bidang_kegiatan_sementara" name="id_bidang_kegiatan_sementara" type="text" placeholder="ID Bidang Kegiatan" class="form-control input-md" required="" disabled>
		  <input value="<?= $hasil->id_bidang_kegiatan?>" id="id_bidang_kegiatan" name="id_bidang_kegiatan" type="hidden" placeholder="ID Bidang Kegiatan" class="form-control input-md" >
		  <span class="help-block"><?php echo form_error('id_bidang_kegiatan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

		<!-- Text input-->
    <div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Desa</label>
		  <div class="col-md-9">
		  <input id="desa" name="desa" type="search" placeholder="Nama Desa" class="form-control input-md" required="" value="<?= $hasil->nama_desa; ?>"/>
      <input id="v_id_desa" name="id_desa" type="text" placeholder="ID Desa" class="form-control input-md" required="" value="<?= $hasil->id_desa; ?>"/>
		  <span class="help-block"><?php echo form_error('desa', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nama">Nama Bidang & Kegiatan</label>
		  <div class="col-md-9">
		  <input value="<?= $hasil->bidang_kegiatan?>" id="bidang_kegiatan" name="bidang_kegiatan" type="text" placeholder="Nama Bidang & Kegiatan" class="form-control input-md" required="" >
		  <span class="help-block"><?php echo form_error('bidang_kegiatan', '<p class="field_error">','</p>')?></span>
		  </div>
		</div>

		<!-- Button (Double) -->
		<legend></legend>
		<div class="form-group">
		  <label class="col-md-0 control-label" for="simpan"></label>
		  <div class="col-md-9">
			<button id="simpan" name="simpan" class="btn btn-success">Simpan</button>
			<button id="batal" name="batal" class="btn btn-danger" onclick="location.href='<?= base_url() ?>datapenduduk/c_bidang_kegiatan'">Batal</button>
		  </div>
		</div>

	</fieldset>
<?php echo form_close(); ?>

</div>
</div>

<script>
function nav_active(){

	document.getElementById("a-data-penganggaran").className = "collapsed active";

	document.getElementById("penganggaran").className = "collapsed";

	var d = document.getElementById("nav-bidang_kegiatan");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
