<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim            = $_POST['nim'];
    $id_jadwal      = $_POST['id_jadwal'];
    $kd_semester    = $_POST['kd_semester'];

    $database = new db();
    $database->tambahKrs($nim, $id_jadwal, $kd_semester);
    $_SESSION['message'] = "Data berhasil disimpan!";

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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data KRS</h1>

    <form method="post" action="">
        <div class="form-group">
            <label for="nim">NIM</label>
            <select class="form-control" id="nim" name="nim">
                <option>Pilih</option>
                <?php
                $database = new db();
                $nim = $database->getAllMahasiswa();

                foreach ($nim as $data) {
                    echo "<option value='" . $data['nim'] . "'>" . $data['nim'] . "</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_jadwal">Ruang</label>
            <select class="form-control" id="id_jadwal" name="id_jadwal">
                <option>Pilih</option>
                <?php
                $database = new db();
                $ruang = $database->getAllJadwal();

                foreach ($ruang as $data) {
                    echo "<option value='" . $data['id_jadwal'] . "'>" . $data['ruang'] . "</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kd_semester">Semester</label>
            <select class="form-control" id="kd_semester" name="kd_semester">
                <option>Pilih</option>
                <?php
                $database = new db();
                $semester = $database->getAllSemester();

                foreach ($semester as $data) {
                    echo "<option value='" . $data['kd_semester'] . "'>" . $data['semester'] . "</option>";
                }

                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="krs.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</div>

<?php
include "../templates/footer.php";
?>