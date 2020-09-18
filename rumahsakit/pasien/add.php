<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Pasien</h1>
    <h4>
        <small>Tambah Data Pasien</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="identitas">Nomor Identitas</label>
                    <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                        <label for="lk" class="radio-inline">
                            <input type="radio" name="jk" id="lk" value="L" required> Laki-laki
                        </label>
                        <label for="pr" class="radio-inline">
                            <input type="radio" name="jk" id="pr" value="P"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success pull-right"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php');
