<?php
require_once "../_config/config.php";

$query = "DELETE FROM tb_rekammedis WHERE id_rm = '$_GET[id]'";
mysqli_query($con, "$query") or die(mysqli_error($con));

echo "<script>window.location='data.php'</script>";
