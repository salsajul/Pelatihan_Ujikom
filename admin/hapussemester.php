<?php
session_start();
include("../db.php");

if (isset($_GET['kd_semester'])) {
    $db = new db();
    $db->hapusSemester($_GET['kd_semester']);
    $_SESSION['message'] = "Data berhasil dihapus!";
}

header("Location: semester.php");
exit;
