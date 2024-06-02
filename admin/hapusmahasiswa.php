<?php
session_start();
include("../db.php");

if (isset($_GET['nim'])) {
    $db = new db();
    $db->hapusMahasiswa($_GET['nim']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: mahasiswa.php");
exit;
