<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_matkul      = $_POST['kd_matkul'];
    $nama_matkul    = $_POST['nama_matkul'];
    $sks            = $_POST['sks'];

    $database = new db();
    $database->tambahMatkul($kd_matkul, $nama_matkul, $sks);
    $_SESSION['message'] = "Data berhasil disimpan!";

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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Mata Kuliah</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_matkul">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kd_matkul" name="kd_matkul" placeholder="Masukkan Kode mata kuliah" required>
        </div>
        <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Masukkan nama mata kuliah" required>
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan sks" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="matkul.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>