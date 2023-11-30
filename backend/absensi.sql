-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 09.49
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'error.png',
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','undefined') DEFAULT 'undefined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `foto_profil`, `username`, `nama`, `alamat`, `kodepos`, `tempat`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'qoqo1.jpg', 'admin', 'admin', 'admin', 'admin', 'admin', '2002-09-30', 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `foto_profil` varchar(255) NOT NULL DEFAULT 'error.png',
  `username` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL,
  `gelardepan` varchar(100) DEFAULT NULL,
  `gelarbelakang` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','undefined') DEFAULT 'undefined',
  `jabatan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `foto_profil`, `username`, `nip`, `nama`, `alamat`, `kodepos`, `gelardepan`, `gelarbelakang`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `jabatan`, `email`) VALUES
(1, 'qoqo1.jpg', 'dosen', '123', 'dosen', 'alamat', '27212', 'dosen', 'dosen', 'dosen', '2023-11-15', 'undefined', 'dosen', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT 'error.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `deskripsi`, `foto_profil`) VALUES
(1, 'FMIPA', 'lorem ipsum', 'roman-synkevych-vXInUOv1n84-unsplash.jpg'),
(20, 'FISIP', '1234', '_41df9f50-2219-4980-905d-03ea4c766a89.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'unri.png',
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `foto_profil`, `nama_jurusan`, `deskripsi`, `id_fakultas`) VALUES
(2, 'Logo UNRI (Universitas Riau) Hitam Putih PNG.png', 'Manajemen Informatika (D3)', '1234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_pertemuan`
--

CREATE TABLE `kehadiran_pertemuan` (
  `id_kehadiran` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `status` enum('hadir','tidak hadir') DEFAULT 'tidak hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `foto_profil` varchar(255) NOT NULL DEFAULT 'error.png',
  `username` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','undefined') DEFAULT 'undefined',
  `email` varchar(100) DEFAULT NULL,
  `nohp` varchar(100) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `foto_profil`, `username`, `nim`, `nama`, `alamat`, `kodepos`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `email`, `nohp`, `id_fakultas`, `id_jurusan`) VALUES
(1, 'error.png', 'mahasiswa', '123', 'mahasiswa', 'mahasiswa', '27212', 'mahasiswa', '2023-11-15', 'laki-laki', 'mahasiswa@mahasiswa.com', '1234', 1, 2),
(4070, '_9befee2b-f3b7-499e-b8b3-5a845da76c25.jpeg', '123', '123', '123', '123', '123', '123', '4567-03-12', 'laki-laki', 'admin@admin.com', '123', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matkul` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah_mahasiswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `nama`, `jumlah_mahasiswa`) VALUES
(5, 'Matematika Dasar', '50'),
(6, 'Fisika Dasar', '45'),
(7, 'Pemrograman Web', '30'),
(8, 'Basis Data', '35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_absensi`
--

CREATE TABLE `rekap_absensi` (
  `id_rekap` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `total_hadir` int(11) DEFAULT NULL,
  `total_tidak_hadir` int(11) DEFAULT NULL,
  `pertemuan_1` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_2` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_3` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_4` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_5` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_6` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_7` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_8` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_9` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_10` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_11` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_12` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_13` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_14` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_15` enum('hadir','tidak hadir') DEFAULT NULL,
  `pertemuan_16` enum('hadir','tidak hadir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa','dosen') NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `id_mahasiswa`, `id_dosen`, `id_admin`) VALUES
(1, 'admin', 'admin', 'admin', NULL, NULL, NULL),
(3, 'dosen', 'dosen', 'dosen', NULL, 1, NULL),
(4, 'mahasiswa', 'mahasiswa', 'mahasiswa', 1, NULL, NULL),
(8, '123', '123', 'mahasiswa', 4070, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `kehadiran_pertemuan`
--
ALTER TABLE `kehadiran_pertemuan`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_absen` (`id_absen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9303;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kehadiran_pertemuan`
--
ALTER TABLE `kehadiran_pertemuan`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4071;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id_matkul`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `kehadiran_pertemuan`
--
ALTER TABLE `kehadiran_pertemuan`
  ADD CONSTRAINT `kehadiran_pertemuan_ibfk_1` FOREIGN KEY (`id_absen`) REFERENCES `absen` (`id_absen`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD CONSTRAINT `rekap_absensi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `rekap_absensi_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id_matkul`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
