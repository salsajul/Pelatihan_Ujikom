<?php
session_start();
include("../db.php");

$database = new db();
$dosen = $database->getKodeDosen($_GET['kd_dosen'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editDosen(
        $_POST['kd_dosen'],
        $_POST['nama_dosen'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
    header("Location: dosen.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Dosen</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_dosen">Kode Dosen</label>
            <input type="text" class="form-control" id="kd_dosen" name="kd_dosen" value="<?= $dosen['kd_dosen']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= $dosen['nama_dosen']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>