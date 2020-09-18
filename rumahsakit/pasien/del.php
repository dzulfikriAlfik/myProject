<?php
require_once "../_config/config.php";

$query = "DELETE FROM tb_pasien WHERE id_pasien = '$_GET[id]'";
$delete = mysqli_query($con, "$query") or die($die);

echo "<script>window.location='data.php'</script>";
