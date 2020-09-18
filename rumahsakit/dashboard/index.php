<?php
require_once('../_config/config.php');
include_once('../_header.php');

if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}

?>

<div class="row">
    <div class="col-lg-12">
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
            <span class="glyphicon glyphicon-tasks"></span>
        </a>
    </div>
</div>
<div class="row">
    <h3>Selamat datang <?= $_SESSION['user']; ?>.</h3>
</div>

<?php include_once('../_footer.php'); ?>