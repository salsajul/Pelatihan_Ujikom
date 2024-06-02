<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_dosen   = $_POST['kd_dosen'];
    $nama_dosen = $_POST['nama_dosen'];

    $database = new db();
    $database->tambahDosen($kd_dosen, $nama_dosen);
    $_SESSION['message'] = "Data berhasil disimpan!";

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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Dosen</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="kd_dosen">Kode Dosen</label>
            <input type="text" class="form-control" id="kd_dosen" name="kd_dosen" placeholder="Masukkan Kode Dosen" required>
        </div>
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukkan nama dosen" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>