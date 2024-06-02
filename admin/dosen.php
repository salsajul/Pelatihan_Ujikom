<?php
session_start();
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Dosen</h1>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success' role='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

    <a href="tambahdosen.php" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Kode Dosen</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../db.php");
            $database = new db();
            $dosen = $database->getAllDosen();
            $count = 1;
            foreach ($dosen as $data) {
                echo "<tr class='text-center'>";
                echo "<th scope='row'>" . $count . ".</th>";
                echo "<td>" . $data['kd_dosen'] . "</td>";
                echo "<td>" . $data['nama_dosen'] . "</td>";
                echo "<td>
                    <a href='editdosen.php?kd_dosen=" . $data['kd_dosen'] . "' class='btn btn-warning' onclick='return confirm(\"Edit data?\")'>Edit</a>
                    <a href='hapusdosen.php?kd_dosen=" . $data['kd_dosen'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
                    </td>";
                echo "</tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include "../templates/footer.php";
?>