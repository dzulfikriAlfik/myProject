<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Dokter</h1>
    <h4>
        <small>Data Dokter</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
        </div>
    </h4>
    <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
                <thead>
                    <tr>
                        <th class="text-center">
                            <input type="checkbox" name="select_all" id="select_all" value="">
                        </th>
                        <th>No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tb_dokter";
                    $sql_poli = mysqli_query($con, $sql) or die(mysqli_error($con));

                    $no = 1;
                    while ($data = mysqli_fetch_assoc($sql_poli)) { ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="check" name="checked[]" value="<?= $data['id_dokter']; ?>"></td>
                            <td><?= $no++; ?>.</td>
                            <td><?= $data['nama_dokter']; ?></td>
                            <td><?= $data['spesialis']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['no_telp']; ?></td>
                            <td align="center">
                                <a href="edit.php?id=<?= $data['id_dokter'] ?>" class="btn btn-warning btn-xs">
                                    <i class="glyphicon glyphicon-edit"> Edit</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="box pull-right">
        <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#dokter').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 6]
            }],
            "order": [1, "asc"]
        });

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

    function hapus() {
        var conf = confirm('Yakin?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }
    }
</script>

<?php include_once('../_footer.php');
