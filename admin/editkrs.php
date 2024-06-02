<?php
session_start();
include("../db.php");

$database = new db();
$krs = $database->getIdKrs($_GET['id_krs'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editKrs(
        $_POST['id_krs'],
        $_POST['nim'],
        $_POST['id_jadwal'],
        $_POST['kd_semester'],
    );
    $_SESSION['message'] = "Data berhasil diubah!";
    header("Location: krs.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data KRS</h1>
    <form method="post" action="">
        <input type="hidden" name="id_krs" value="<?= $krs['id_krs']; ?>">
        <div class="form-group">
            <label for="nim">NIM</label>
            <select class="form-control" id="nim" name="nim">
                <?php
                $nim = $database->getAllMahasiswa();
                foreach ($nim as $data) {
                    echo "<option value='" . $data['nim'] . "'";
                    if ($krs['nim'] == $data['nim']) {
                        echo " selected";
                    }
                    echo ">" . $data['nim'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_jadwal">Ruang</label>
            <select class="form-control" id="id_jadwal" name="id_jadwal">
                <?php
                $ruang = $database->getAllJadwal();
                foreach ($ruang as $data) {
                    echo "<option value='" . $data['id_jadwal'] . "'";
                    if ($krs['id_jadwal'] == $data['id_jadwal']) {
                        echo " selected";
                    }
                    echo ">" . $data['ruang'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kd_semester">Semester</label>
            <select class="form-control" id="kd_semester" name="kd_semester">
                <?php
                $semester = $database->getAllSemester();
                foreach ($semester as $data) {
                    echo "<option value='" . $data['kd_semester'] . "'";
                    if ($krs['kd_semester'] == $data['kd_semester']) {
                        echo " selected";
                    }
                    echo ">" . $data['semester'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="krs.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>