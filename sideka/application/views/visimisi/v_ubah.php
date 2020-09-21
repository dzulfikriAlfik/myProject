<script src="<?php echo base_url();?>nic/nicEdit.js"  type="text/javascript"></script>
<script type="text/javascript">
var _base_url = '<?= base_url() ?>';
	bkLib.onDomLoaded(function() {
		new nicEditor({iconsPath : _base_url + 'nic/nicEditorIcons.gif'}).panelInstance('xxx');
		new nicEditor({maxHeight : 500}).panelInstance('xxx');
	});
</script>
<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open_multipart('admin/c_visimisi/update_visimisi'); ?>

	<input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $tempna->id_pengguna ?>" size="20" /> 
	<input type="hidden" name="id_visi_misi" id="id_visi_misi" value="<?= $hasil->id_visi_misi ?>" size="20" />
	<legend></legend>
	<div class="form-group"> 
		<div class="image-editor">	
			<label class="col-md-12 control-label" for="userfile">Banner Visi Misi</label>
			<div class="col-md-12 col-lg-12">
				<div id="lihat">
					<div class="cropit-image-preview" ></div>				
					<input type="range" class="cropit-image-zoom-input" style="width:692px" >
					<br>
				</div>
				<input type="file" id="userfile" class="cropit-image-input custom" accept="image/*">
				<input type="hidden" name="image-data" class="hidden-image-data" />				
			</div>
			
		</div>				
	</div>
	<legend>
		<br>
	</legend>

<div class="form-group"> 
	<label class="col-md-12 control-label" for="isi_visi_misi">Visi Misi Desa</label>
	 <div class="col-md-12">
	 <textarea class="form-control input-md" id="xxx"  name="isi_visi_misi"  cols="80"> <?= $hasil->isi_visi_misi ?> </textarea>
	 <span class="help-block">
	</span>
	</div>
</div>
<legend></legend>

<div class="col-md-9">
<span class="help-block">
<input type="submit" class="btn btn-success" value="Simpan" id="simpan"/>
<input type="button" class="btn btn-danger" value="Batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_visimisi'"/>
</span>	
</div>

<?php echo form_close(); ?>

<script>

function nav_active(){
	document.getElementById("a-data-web").className = "collapsed active";
	var r = document.getElementById("pengelola_data_web");
	r.className = "collapsed";

	var d = document.getElementById("nav-visimisi");
	d.className = d.className + "active";
	}
 
$( document ).ready(function() {
   nav_active();
});
</script>

<style>
		/* Show load indicator when image is being loaded */
		.cropit-image-preview.cropit-image-loading .spinner {
		opacity: 1;
		}

		/* Show move cursor when image has been loaded */
		.cropit-image-preview.cropit-image-loaded {
		cursor: move;
		}

		/* Gray out zoom slider when the image cannot be zoomed */
		.cropit-image-zoom-input[disabled] {
		opacity: .2;
		}

		
      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 692px;
        height: 152px;
        cursor: move;
      }

      .cropit-image-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }
     }
    </style>	
<script src="<?php echo base_url(); ?>assetku/cropit/jquery.cropit.js"></script> 

<script>
$(function() {
  
$('.image-editor').cropit({
  imageState: {
	src: '<?php echo site_url($hasil->foto_banner);?>'
  }
});
  
$('form').submit(function() {
	  // Move cropped image data to hidden input
	 var imageData = $('.image-editor').cropit('export', { 
		 type: 'image/jpeg',  
		 quality: 1,
		 });		
	  $('.hidden-image-data').val(imageData);
		
	  // Prevent the form from actually submitting
	  return true;
	});
  });

</script>

<script>

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#userfile').attr('src', e.target.result);		
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#userfile").change(function(){
    readURL(this);
	{document.getElementById("lihat").style.display = "block";}
});
</script>