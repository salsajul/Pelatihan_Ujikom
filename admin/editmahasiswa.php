<?php
session_start();
include("../db.php");

$database = new db();
$mahasiswa = $database->getMahasiswaByNIM($_GET['nim'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editMahasiswa(
        $_POST['nim'],
        $_POST['nama_mahasiswa'],
        $_POST['alamat'],
        $_POST['jurusan'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
    header("Location: mahasiswa.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mahasiswa</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa']; ?>">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
                <option value="<?= $mahasiswa['jurusan']; ?>"><?= $mahasiswa['jurusan']; ?></option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Manajemen">Manajemen</option>
                <option value="Akutansi">Akutansi</option>
                <option value="Sastra Inggris">Sastra Inggris</option>
                <option value="Sastra Indonesia">Sastra Indonesi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa['alamat']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>