<?php
session_start();
include("../db.php");

$database = new db();
$jadwal = $database->getIdJadwal($_GET['id_jadwal'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editJadwal(
        $_POST['id_jadwal'],
        $_POST['kd_dosen'],
        $_POST['kd_matkul'],
        $_POST['jam'],
        $_POST['ruang'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data Jadwal</h1>
    <form method="post" action="">
        <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal']; ?>">
        <div class="form-group">
            <label for="kd_matkul">Mata Kuliah</label>
            <select class="form-control" id="kd_matkul" name="kd_matkul">
                <?php
                $matkul = $database->getAllMatkul();
                foreach ($matkul as $data) {
                    echo "<option value='" . $data['kd_matkul'] . "'";
                    if ($jadwal['kd_matkul'] == $data['kd_matkul']) {
                        echo " selected";
                    }
                    echo ">" . $data['nama_matkul'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kd_dosen">Dosen</label>
            <select class="form-control" id="kd_dosen" name="kd_dosen">
                <?php
                $dosen = $database->getAllDosen();
                foreach ($dosen as $data) {
                    echo "<option value='" . $data['kd_dosen'] . "'";
                    if ($jadwal['kd_dosen'] == $data['kd_dosen']) {
                        echo " selected";
                    }
                    echo ">" . $data['nama_dosen'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="text" class="form-control" id="jam" name="jam" value="<?= $jadwal['jam']; ?>">
        </div>
        <div class="form-group">
            <label for="ruang">Ruang</label>
            <input type="text" class="form-control" id="ruang" name="ruang" value="<?= $jadwal['ruang']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="jadwal.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>