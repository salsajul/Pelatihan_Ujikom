<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim            = $_POST['nim'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $alamat         = $_POST['alamat'];
    $jurusan        = $_POST['jurusan'];

    $database = new db();
    $database->tambahMahasiswa($nim, $nama_mahasiswa, $alamat, $jurusan);
    $_SESSION['message'] = "Data berhasil disimpan!";

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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Mahasiswa</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan nim" required>
        </div>
        <div class="form-group">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa" required>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
                <option>Pilih</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Manajemen">Manajemen</option>
                <option value="Akutansi">Akutansi</option>
                <option value="Sastra Inggris">Sastra Inggris</option>
                <option value="Sastra Indonesi">Sastra Indonesi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>