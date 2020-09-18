<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Dokter</h1>
    <h4>
        <small>Edit Data Dokter</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_assoc($sql_dokter); ?>

            <form action="proses.php" method="post">
                <input value="<?= $data['id_dokter']; ?>" type="hidden" name="id">
                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input value="<?= $data['nama_dokter']; ?>" type="text" name="nama" id="nama" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input value="<?= $data['spesialis']; ?>" type="text" name="spesialis" id="spesialis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="7" class="form-control" required><?= $data['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                    <input value="<?= $data['no_telp']; ?>" type="text" name="no_telp" id="no_telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success pull-right"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php');
