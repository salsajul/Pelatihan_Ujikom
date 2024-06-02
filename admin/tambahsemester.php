<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_semester   = $_POST['kd_semester'];
    $semester = $_POST['semester'];

    $database = new db();
    $database->tambahSemester($kd_semester, $semester);
    $_SESSION['message'] = "Data berhasil disimpan!";

    header("Location: semester.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Semester</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_semester">Kode Semester</label>
            <input type="text" class="form-control" id="kd_semester" name="kd_semester" placeholder="Masukkan kode semester" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan semester" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="semester.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>