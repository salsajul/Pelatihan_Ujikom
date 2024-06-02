<?php
session_start();
include("../db.php");

if (isset($_GET['kd_matkul'])) {
    $db = new db();
    $db->hapusMatkul($_GET['kd_matkul']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: matkul.php");
exit;
