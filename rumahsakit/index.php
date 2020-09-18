<?php
require_once '_config/config.php';

if (!isset($_SESSION['user'])) {
    // header("Location: " . base_url('auth/login.php'));
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
} else {
    echo "<script>window.location='" . base_url('dashboard') . "';</script>";
}
