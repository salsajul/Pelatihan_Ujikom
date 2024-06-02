<?php

class db
{
    private $koneksi;
    function __construct()
    {
        $this->koneksi = new mysqli("localhost", "root", "", "db_pelatihan");
    }

    // GET DATA
    function getUser($username, $password)
    {
        return $this->koneksi->query("SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");
    }

    function getKodeDosen($kd_dosen)
    {
        return $this->koneksi->query("SELECT * FROM tbl_dosen WHERE kd_dosen = '$kd_dosen'")->fetch_assoc();
    }

    function getKodeMatkul($kd_matkul)
    {
        return $this->koneksi->query("SELECT * FROM tbl_matkul WHERE kd_matkul = '$kd_matkul'")->fetch_assoc();
    }

    function getKodeSemester($kd_semester)
    {
        return $this->koneksi->query("SELECT * FROM tbl_semester WHERE kd_semester = '$kd_semester'")->fetch_assoc();
    }

    function getMahasiswaByNIM($nim)
    {
        return $this->koneksi->query("SELECT * FROM tbl_mahasiswa WHERE nim = '$nim'")->fetch_assoc();
    }

    function getIdJadwal($id_jadwal)
    {
        return $this->koneksi->query("SELECT * FROM tbl_jadwal WHERE id_jadwal = '$id_jadwal'")->fetch_assoc();
    }

    function getIdKrs($id_krs)
    {
        return $this->koneksi->query("SELECT * FROM tbl_krs WHERE id_krs = '$id_krs'")->fetch_assoc();
    }

    // READ DATA
    function getAllDosen()
    {
        return $this->koneksi->query("SELECT * FROM tbl_dosen");
    }

    function getAllMahasiswa()
    {
        return $this->koneksi->query("SELECT * FROM tbl_mahasiswa");
    }

    function getAllMatkul()
    {
        return $this->koneksi->query("SELECT * FROM tbl_matkul");
    }

    function getAllSemester()
    {
        return $this->koneksi->query("SELECT * FROM tbl_semester");
    }

    function getAllJadwal()
    {
        $query = "SELECT tbl_jadwal.*, tbl_dosen.nama_dosen, tbl_matkul.nama_matkul 
              FROM tbl_jadwal 
              JOIN tbl_dosen ON tbl_jadwal.kd_dosen = tbl_dosen.kd_dosen 
              JOIN tbl_matkul ON tbl_jadwal.kd_matkul = tbl_matkul.kd_matkul";
        return $this->koneksi->query($query);
    }

    function getAllKrs()
    {
        $query = "SELECT tbl_krs.*, tbl_mahasiswa.nim, tbl_jadwal.ruang, tbl_semester.semester 
                  FROM tbl_krs 
                  JOIN tbl_mahasiswa ON tbl_krs.nim = tbl_mahasiswa.nim 
                  JOIN tbl_jadwal    ON tbl_krs.id_jadwal = tbl_jadwal.id_jadwal
                  JOIN tbl_semester  ON tbl_krs.kd_semester = tbl_semester.kd_semester";
        return $this->koneksi->query($query);
    }

    // CREATE DATA
    function tambahDosen($kd_dosen, $nama_dosen)
    {
        return $this->koneksi->query("INSERT INTO tbl_dosen (kd_dosen, nama_dosen) VALUES ('$kd_dosen', '$nama_dosen')");
    }

    function tambahSemester($kd_semester, $semester)
    {
        return $this->koneksi->query("INSERT INTO tbl_semester (kd_semester, semester) VALUES ('$kd_semester', '$semester')");
    }

    function tambahMatkul($kd_matkul, $nama_matkul, $sks)
    {
        return $this->koneksi->query("INSERT INTO tbl_matkul (kd_matkul, nama_matkul, sks) VALUES ('$kd_matkul', '$nama_matkul', '$sks')");
    }

    function tambahMahasiswa($nim, $nama_mahasiswa, $alamat, $jurusan)
    {
        return $this->koneksi->query("INSERT INTO tbl_mahasiswa (nim, nama_mahasiswa, alamat, jurusan) VALUES ('$nim', '$nama_mahasiswa', '$alamat', '$jurusan')");
    }

    function tambahJadwal($kd_dosen, $kd_matkul, $jam, $ruang)
    {
        return $this->koneksi->query("INSERT INTO tbl_jadwal (kd_dosen, kd_matkul, jam, ruang) VALUES ('$kd_dosen', '$kd_matkul', '$jam', '$ruang')");
    }

    function tambahKrs($nim, $id_jadwal, $kd_semester)
    {
        return $this->koneksi->query("INSERT INTO tbl_krs (nim, id_jadwal, kd_semester) VALUES ('$nim', '$id_jadwal', '$kd_semester')");
    }

    // UPDATE DATA
    function editDosen($kd_dosen, $nama_dosen)
    {
        $this->koneksi->query("UPDATE tbl_dosen SET nama_dosen = '$nama_dosen' WHERE kd_dosen = '$kd_dosen'");
    }

    function editSemester($kd_semester, $semester)
    {
        $this->koneksi->query("UPDATE tbl_semester SET semester = '$semester' WHERE kd_semester = '$kd_semester'");
    }

    function editMatkul($kd_matkul, $nama_matkul, $sks)
    {
        $this->koneksi->query("UPDATE tbl_matkul SET nama_matkul = '$nama_matkul', sks = '$sks' WHERE kd_matkul = '$kd_matkul'");
    }

    function editMahasiswa($nim, $nama_mahasiswa, $alamat, $jurusan)
    {
        $this->koneksi->query("UPDATE tbl_mahasiswa SET nama_mahasiswa = '$nama_mahasiswa', alamat = '$alamat', jurusan = '$jurusan' WHERE nim = '$nim'");
    }

    function editJadwal($id_jadwal, $kd_dosen, $kd_matkul, $jam, $ruang)
    {
        $this->koneksi->query("UPDATE tbl_jadwal SET kd_dosen = '$kd_dosen', kd_matkul = '$kd_matkul', jam = '$jam',  ruang = '$ruang' WHERE id_jadwal = '$id_jadwal'");
    }

    function editKrs($id_krs, $nim, $id_jadwal, $kd_semester)
    {
        $this->koneksi->query("UPDATE tbl_krs SET nim = '$nim', id_jadwal = '$id_jadwal', kd_semester = '$kd_semester' WHERE id_krs = '$id_krs'");
    }

    // DELETE DATA
    function hapusMahasiswa($nim)
    {
        $this->koneksi->query("DELETE FROM tbl_mahasiswa WHERE nim = '$nim'");
    }

    function hapusDosen($kd_dosen)
    {
        $this->koneksi->query("DELETE FROM tbl_dosen WHERE kd_dosen = '$kd_dosen'");
    }

    function hapusSemester($kd_semester)
    {
        $this->koneksi->query("DELETE FROM tbl_semester WHERE kd_semester = '$kd_semester'");
    }

    function hapusMatkul($kd_matkul)
    {
        $this->koneksi->query("DELETE FROM tbl_matkul WHERE kd_matkul = '$kd_matkul'");
    }

    function hapusJadwal($id_jadwal)
    {
        $this->koneksi->query("DELETE FROM tbl_jadwal WHERE id_jadwal = '$id_jadwal'");
    }

    function hapusKrs($id_krs)
    {
        $this->koneksi->query("DELETE FROM tbl_krs WHERE id_krs = '$id_krs'");
    }
}
