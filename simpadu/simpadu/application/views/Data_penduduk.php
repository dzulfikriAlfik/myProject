<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button onclick="add_penduduk()" class="btn btn-primary btn-sm">INPUT DATA</button>
                            <hr/>
                            <table width="100%" class="table table-striped table-bordered table-hover" style="font-size:8pt" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO KK</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>AGAMA</td>
                                        <th>TEMPAT, TANGGAL LAHIR</th>
                                        <th>ALAMAT</th>
                                        <th>PENDIDIKAN</td>
                                        <td>PEKERJAAN</td>
                                        <td>KAWIN</td>
                                        <td>SHUB KELUARGA</td>
                                        <td>AKSI</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($penduduks as $penduduk){
                                            ?>
                                                <tr>
                                                    <td><?= $no?></td>
                                                    <td><?= $penduduk->penduduk_nokk?></td>
                                                    <td><?= $penduduk->penduduk_nik?></td>
                                                    <td><?= $penduduk->penduduk_nama?></td>
                                                    <td><?= $penduduk->penduduk_jk?></td>
                                                    <td><?= $penduduk->penduduk_agama?></td>
                                                    <td><?php echo("$penduduk->penduduk_kelahiran, $penduduk->penduduk_birthday "); ?></td>
                                                    <td><?= $penduduk->penduduk_alamat?></td>
                                                    <td><?= $penduduk->penduduk_pendidikan?></td>
                                                    <td><?= $penduduk->penduduk_pekerjaan?></td>
                                                    <td><?= $penduduk->penduduk_status?></td>
                                                    <td><?= $penduduk->penduduk_status_keluarga?></td>
                                                    <td><?= $penduduk->penduduk_status_keluarga?></td>
                                                </tr>
                                            <?php
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>

        <script type="text/javascript">

var save_method; //for save method string
var table;


function add_penduduk()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Penduduk'); // Set Title to Bootstrap modal title
}

function edit_user(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?= base_url()?>master_data/edit_user/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="user_id"]').val(data.user_id);
            $('[name="user_nama"]').val(data.user_nama);
			$('[name="user_alamat"]').val(data.user_alamat);
			$('[name="user_telp"]').val(data.user_telp);
			$('[name="user_jabatan_id"]').val(data.user_jabatan_id);
			$('[name="user_jabatan_id"]').trigger("chosen:updated");

			if(data.user_jabatan_id == 2){
				$('#wilayah').show();
				$('[name="user_divisi_id"]').val(data.user_divisi_id);
				$('[name="user_divisi_id"]').trigger("chosen:updated");
			}else if(data.user_jabatan_id == 3){
				$('#lapangan').show();
				$('[name="user_divisi_id"]').val(data.user_divisi_id);
				$('[name="user_divisi_id"]').trigger("chosen:updated");
			}else if(data.user_jabatan_id == 4){
				$('#lapangan').show();
				$('[name="user_divisi_id"]').val(data.user_divisi_id);
				$('[name="user_divisi_id"]').trigger("chosen:updated");
			}else{
				$('#wilayah').hide();
				$('#lapangan').hide();
			}


			$('#modal_form').modal('show');
			
            $('.modal-title').text('Perubahan user'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('master_data/add_penduduk')?>";
    } else {
        url = "<?php echo site_url('master_data/update_user')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
				location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_user(id)
{
    if(confirm('Anda yakin menghapus user ini ?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('master_data/delete_user')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}



</script>




<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Form Kategori</h3>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" enctype="multipart/form-data" id="submit" class="form-horizontal">
					<input type="hidden" value="" name="user_id"/> 
					<div class="form-body">
						<div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Nama Penduduk</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_nama" placeholder="Nama penduduk" required>
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">No KK</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_nokk" placeholder="No KK">
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">No NIK</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_nik" placeholder="No NIK" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Jenis kelamin</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_jk" placeholder="Jenis kelamin" required>
								<span class="help-block"></span>
							</div>
                        </div>

                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Alamat</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_alamat" placeholder="Alamat" required>
								<span class="help-block"></span>
							</div>
                        </div>

                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Tempat Lahir</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_kelhiran" placeholder="Tempat Lahir" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Tanggal Lahir</label>

							<div class="col-sm-9">
								<input type="date" class="form-control" name="penduduk_birthday" placeholder="Tanggal Lahir" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Agama</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_agama" placeholder="Agama" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Pendidikan</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_pendidikan" placeholder="Pendidikan" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Pekerjaan</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_pekerjaan" placeholder="Pekerjaan" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Setatus perkawinan</label>

							<div class="col-sm-9">
								<select class="form-control" name="penduduk_status">
                                    <option value="Belum Kawin">Belum</option>
                                    <option value="Belum Kawin">Sudah</option>
                                    <option value="Belum Kawin">Pernah</option>

                                </select>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Hubungan Keluarga</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="penduduk_status_krluarga" placeholder="Hubungan Keluarga" required>
								<span class="help-block"></span>
							</div>
						</div>


						

						

						
					</div>
				</form>

				
			</div>

			<div class="modal-footer">
				<button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>

			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->