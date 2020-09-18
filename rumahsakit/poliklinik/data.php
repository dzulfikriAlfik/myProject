<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Poliklinik</h1>
    <h4>
        <small>Data Poliklinik</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Poli</a>
        </div>
    </h4>
    <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Poli</th>
                        <th>Gedung</th>
                        <th class="text-center">
                            <input type="checkbox" name="select_all" id="select_all" value="">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tb_poliklinik ORDER BY gedung ASC";
                    $sql_poli = mysqli_query($con, $sql) or die(mysqli_error($con));

                    $no = 1;
                    if (mysqli_num_rows($sql_poli) > 0) {
                        while ($data = mysqli_fetch_assoc($sql_poli)) { ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $data['nama_poli']; ?></td>
                                <td><?= $data['gedung']; ?></td>
                                <td class="text-center"><input type="checkbox" class="check" name="checked[]" value="<?= $data['id_poli']; ?>"></td>
                            </tr>
                    <?php }
                    } else {
                        echo "<tr><td colspan=\"4\" align=\"center\">Tidak ada Data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="box pull-right">
        <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                })
            }
        });

        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length) {
                $('#select_all').prop('checked', true)
            } else {
                $('#select_all').prop('checked', false)
            }
        })
    })

    function edit() {
        document.proses.action = 'edit.php';
        document.proses.submit();
    }

    function hapus() {
        var conf = confirm('Yakin?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }
    }
</script>

<?php include_once('../_footer.php');
