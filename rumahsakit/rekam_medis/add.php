<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Rekam Medis</h1>
    <h4>
        <small>Tambah Rekam Medis</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="pasien">Nama Pasien <span style="color: red">*</span></label>
                    <select name="pasien" id="pasien" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php

                        $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die($die);
                        while ($data_pasien = mysqli_fetch_assoc($sql_pasien)) {
                            echo '<option value=" ' . $data_pasien['id_pasien'] . ' ">' . $data_pasien['nama_pasien'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan <span style="color: red">*</span></label>
                    <textarea name="keluhan" id="keluhan" cols="30" rows="7" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dokter">Nama Dokter <span style="color: red">*</span></label>
                    <select name="dokter" id="dokter" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php

                        $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die($die);
                        while ($data_dokter = mysqli_fetch_assoc($sql_dokter)) {
                            echo '<option value=" ' . $data_dokter['id_dokter'] . ' ">' . $data_dokter['nama_dokter'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa <span style="color: red">*</span></label>
                    <textarea name="diagnosa" id="diagnosa" cols="30" rows="7" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="poli">Poliklinik <span style="color: red">*</span></label>
                    <select name="poli" id="poli" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php

                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die($die);
                        while ($data_poli = mysqli_fetch_assoc($sql_poli)) {
                            echo '<option value=" ' . $data_poli['id_poli'] . ' ">' . $data_poli['nama_poli'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="obat">Obat <span style="color: red">*</span></label>
                    <select multiple name="obat[]" id="obat" class="form-control" size="5" required>
                        <?php

                        $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die($die);
                        while ($data_obat = mysqli_fetch_array($sql_obat)) {
                            echo '<option value="' . $data_obat['id_obat'] . '">' . $data_obat['nama_obat'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_periksa">Tanggal Periksa <span style="color: red">*</span></label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa" value="<?= date("Y-m-d") ?>" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success"></input>&nbsp;
                    <input type="reset" name="reset" value="Reset" class="btn btn-default"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('keluhan', {
        uiColor: '#ebab00'
    });
    CKEDITOR.replace('diagnosa', {
        uiColor: '#ebab00'
    });
</script>

<?php include_once('../_footer.php');
