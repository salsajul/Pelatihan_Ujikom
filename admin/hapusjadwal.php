<?php
session_start();
include("../db.php");

if (isset($_GET['id_jadwal'])) {
    $db = new db();
    $db->hapusJadwal($_GET['id_jadwal']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: jadwal.php");
exit;
