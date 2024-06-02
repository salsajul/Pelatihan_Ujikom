<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_dosen   = $_POST['kd_dosen'];
    $kd_matkul  = $_POST['kd_matkul'];
    $jam        = $_POST['jam'];
    $ruang      = $_POST['ruang'];

    $database = new db();
    $database->tambahJadwal($kd_dosen, $kd_matkul, $jam, $ruang);
    $_SESSION['message'] = "Data berhasil disimpan!";

    header("Location: jadwal.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Jadwal</h1>

    <form method="post" action="">
        <div class="form-group">
            <label for="kd_matkul">Mata Kuliah</label>
            <select class="form-control" id="kd_matkul" name="kd_matkul">
                <option>Pilih</option>
                <?php
                $database = new db();
                $matkul = $database->getAllMatkul();

                foreach ($matkul as $data) {
                    echo "<option value='" . $data['kd_matkul'] . "'>" . $data['nama_matkul'] . "</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kd_dosen">Dosen</label>
            <select class="form-control" id="kd_dosen" name="kd_dosen">
                <option>Pilih</option>
                <?php
                $database = new db();
                $dosen = $database->getAllDosen();

                foreach ($dosen as $data) {
                    echo "<option value='" . $data['kd_dosen'] . "'>" . $data['nama_dosen'] . "</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="text" class="form-control" id="jam" name="jam" placeholder="Masukkan jam" required>
        </div>
        <div class="form-group">
            <label for="ruang">Ruang</label>
            <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Masukkan ruang" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="jadwal.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</div>

<?php
include "../templates/footer.php";
?>