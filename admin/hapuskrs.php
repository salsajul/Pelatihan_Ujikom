<?php
session_start();
include("../db.php");

if (isset($_GET['id_krs'])) {
    $db = new db();
    $db->hapusKrs($_GET['id_krs']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: krs.php");
exit;
