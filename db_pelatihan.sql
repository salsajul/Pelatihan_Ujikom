-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 17.11
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kd_dosen` varchar(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kd_dosen`, `nama_dosen`) VALUES
('0317047206', 'S.Sos. SYAFRIL CHAIRIANSYAH S.Sos., M.Kom.'),
('0403089301', 'RAHMAWATI S.Kom., M.Kom.'),
('0405078502', 'NURJAYA S.Kom, M.Kom'),
('0407059301', 'ANDRIAN HIDAYAT S.Kom., M.Kom.'),
('0418018104', 'MUKHAMAD KHOTIB ARIFAI SE.,MM.'),
('0423058704', 'Dr. THOYYIBAH. T S.Kom., M.Kom'),
('0426069301', 'RIA ESTER S.Kom., M.Kom.'),
('0428088701', 'AGUNG PERDANANTO S.Kom, M.Kom'),
('8817530017', 'Drs. H. JAZULI MUKHTAR M.M.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kd_dosen` varchar(11) NOT NULL,
  `kd_matkul` varchar(11) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `kd_dosen`, `kd_matkul`, `jam`, `ruang`) VALUES
(15, '0426069301', 'TPL0512', '08.50 - 10.30', 'V. 629'),
(16, '0403089301', 'TPL0522', '10.30 - 12.10', 'V. 629'),
(17, '0407059301', 'TPL0533', '10.30 - 12.10', 'V. 629'),
(19, '8817530017', 'TEK0052', '08.50 - 10.30', 'V. 601');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kd_semester` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `nim`, `id_jadwal`, `kd_semester`) VALUES
(8, '201011401234', 19, 'SM001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama_mahasiswa` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_mahasiswa`, `alamat`, `jurusan`) VALUES
('201011401234', 'Siti Munawaroh', 'Jakarta Barat', 'Akutansi'),
('201011401925', 'Farhan Kamil', 'Depok', 'Teknik Informatika'),
('201011401926', 'Budi Utomo', 'Jakarta Selatan', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `kd_matkul` varchar(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`kd_matkul`, `nama_matkul`, `sks`) VALUES
('TEK0052', 'KEWIRAUSAHAAN', '2 SKS'),
('TPL0483', 'TESTING DAN QA PERANGKAT LUNAK', '3 SKS'),
('TPL0512', 'KECAKAPAN ANTAR PERSONAL', '2 SKS'),
('TPL0522', 'ETIKA PRODESI', '2 SKS'),
('TPL0533', 'INTERAKSI MANUSIA DENGAN KOMPUTER', '3 SKS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `kd_semester` varchar(11) NOT NULL,
  `semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_semester`
--

INSERT INTO `tbl_semester` (`kd_semester`, `semester`) VALUES
('SM001', 'GANJIL 2023/2024	'),
('SM002', 'GENAP 2023/2024'),
('SM003', 'GANJIL 2024/2025'),
('SM004', 'GENAP 2024/2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_matkul` (`kd_matkul`),
  ADD KEY `fk_dosen` (`kd_dosen`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `fk_nim` (`nim`),
  ADD KEY `fk_jadwal` (`id_jadwal`),
  ADD KEY `fk_semester` (`kd_semester`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indeks untuk tabel `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `fk_dosen` FOREIGN KEY (`kd_dosen`) REFERENCES `tbl_dosen` (`kd_dosen`),
  ADD CONSTRAINT `fk_matkul` FOREIGN KEY (`kd_matkul`) REFERENCES `tbl_matkul` (`kd_matkul`);

--
-- Ketidakleluasaan untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `fk_nim` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`),
  ADD CONSTRAINT `fk_semester` FOREIGN KEY (`kd_semester`) REFERENCES `tbl_semester` (`kd_semester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
