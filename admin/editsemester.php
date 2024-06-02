<?php
session_start();
include("../db.php");

$database = new db();
$semester = $database->getKodeSemester($_GET['kd_semester'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editSemester(
        $_POST['kd_semester'],
        $_POST['semester'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data Semester</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_semester">Kode Semester</label>
            <input type="text" class="form-control" id="kd_semester" name="kd_semester" value="<?= $semester['kd_semester']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" value="<?= $semester['semester']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="semester.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>