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
                            Data Kelahiran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button onclick="add_kelahiran()" class="btn btn-primary btn-sm">INPUT DATA</button>
                            <button onclick="printDiv('dataKelahiran')"  class="btn btn-primary btn-sm">PRINT</button>
                            <hr/>
                            <table width="100%" class="table table-striped table-bordered table-hover" style="font-size:7pt" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TANGGAL</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>ALAMAT</th>
                                        <th>NAMA ORANGTUA</td>
                                        <th>KETERANGAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        $no = 1;
                                        foreach($kelahirans as $kelahiran){
                                            ?>
                                                <tr>
                                                    <td><?= $no?></td>
                                                    <td><?= $kelahiran->kelahiran_nama?></td>
                                                    <td><?= $kelahiran->kelahiran_date?></td>
                                                    <td><?= $kelahiran->kelahiran_jk?></td>
                                                    <td><?= $kelahiran->kelahiran_alamat?></td>
                                                    <td><?= $kelahiran->kelahiran_orangtua?></td>
                                                    <td><?= $kelahiran->kelahiran_keterangan?></td>
                                                    <td> <button onclick="edit_kelahiran(<?= $kelahiran->kelahiran_id?>)" class="btn btn-primary btn-sm"> <span class="fa fa-pencil fa-fw" style="font-size: 6pt"></span> </button>
                                                    <button onclick="delete_kelahiran(<?= $kelahiran->kelahiran_id?>)" class="btn btn-primary btn-sm"><span class="fa fa-trash fa-fw" style="font-size: 6pt"></span> </button> </td>
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


function add_kelahiran()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Penduduk'); // Set Title to Bootstrap modal title
}

function edit_kelahiran(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?= base_url()?>pencatatan/edit_kelahiran/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="kelahiran_id"]').val(data.kelahiran_id);
			$('[name="kelahiran_nama"]').val(data.kelahiran_nama);
			$('[name="kelahiran_jk"]').val(data.kelahiran_jk);
            $('[name="kelahiran_alamat"]').val(data.kelahiran_alamat);
            $('[name="kelahiran_orangtua"]').val(data.kelahiran_orangtua);
            $('[name="kelahiran_date"]').val(data.kelahiran_date);
            $('[name="kelahiran_keterangan"]').val(data.kelahiran_keterangan);

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
        url = "<?php echo site_url('pencatatan/add_kelahiran')?>";
    } else {
        url = "<?php echo site_url('pencatatan/update_kelahiran')?>";
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

function delete_kelahiran(id)
{
    if(confirm('Anda yakin menghapus Data Penduduk ini ?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('pencatatan/delete_kelahiran')?>/"+id,
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

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
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
					<input type="hidden" value="" name="kelahiran_id"/> 
					<div class="form-body">
						<div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Nama Lengkap</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="kelahiran_nama" placeholder="Nama penduduk" required>
								<span class="help-block"></span>
							</div>
						</div>

                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Tanggal Lahir</label>

							<div class="col-sm-9">
								<input type="date" class="form-control" name="kelahiran_date" placeholder="Tempat Lahir" required>
								<span class="help-block"></span>
							</div>
                        </div>

                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Jenis Kelamin</label>

							<div class="col-sm-9">
								<select class="form-control" name="kelahiran_jk">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>

                                </select>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Alamat</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="kelahiran_alamat" placeholder="Agama" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Orangtua</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="kelahiran_orangtua" placeholder="Pendidikan" required>
								<span class="help-block"></span>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-3 control-label">Keterangan</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" name="kelahiran_keterangan" placeholder="Hubungan Keluarga" required>
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




<div id="dataKelahiran" hidden>
    <div class="text-center"><h3>DATA PENDUDUK DESA CENGAL</h3></div>
    <hr/>
    <table class="table table-bordered" style="font-size: 8pt">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>TANGGAL</th>
            <th>JENIS KELAMIN</th>
            <th>ALAMAT</th>
            <th>NAMA ORANGTUA</td>
            <th>KETERANGAN</th>
            <th>AKSI</th>
        </tr>
        <?php
            $no = 1;
            foreach($kelahirans as $kelahiran){
                ?>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $kelahiran->kelahiran_nama?></td>
                        <td><?= $kelahiran->kelahiran_date?></td>
                        <td><?= $kelahiran->kelahiran_jk?></td>
                        <td><?= $kelahiran->kelahiran_alamat?></td>
                        <td><?= $kelahiran->kelahiran_orangtua?></td>
                        <td><?= $kelahiran->kelahiran_keterangan?></td>
                        <td> <button onclick="edit_kelahiran(<?= $kelahiran->kelahiran_id?>)" class="btn btn-primary btn-sm"> <span class="fa fa-pencil fa-fw" style="font-size: 6pt"></span> </button>
                        <button onclick="delete_kelahiran(<?= $kelahiran->kelahiran_id?>)" class="btn btn-primary btn-sm"><span class="fa fa-trash fa-fw" style="font-size: 6pt"></span> </button> </td>
                    </tr>
                <?php
                $no++;
            }
        ?>
    </table>
</div>