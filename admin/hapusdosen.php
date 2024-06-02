<?php
session_start();
include("../db.php");

if (isset($_GET['kd_dosen'])) {
    $db = new db();
    $db->hapusDosen($_GET['kd_dosen']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: dosen.php");
exit;
