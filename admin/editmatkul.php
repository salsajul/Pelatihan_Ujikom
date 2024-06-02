<?php
session_start();
include("../db.php");

$database = new db();
$matkul = $database->getKodeMatkul($_GET['kd_matkul'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editMatkul(
        $_POST['kd_matkul'],
        $_POST['nama_matkul'],
        $_POST['sks'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
    header("Location: matkul.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mata Kuliah</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_matkul">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kd_matkul" name="kd_matkul" value="<?= $matkul['kd_matkul']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $matkul['nama_matkul']; ?>">
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" class="form-control" id="sks" name="sks" value="<?= $matkul['sks']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="matkul.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>