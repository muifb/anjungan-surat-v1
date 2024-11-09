-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2024 pada 13.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjungan_surat`
--
CREATE DATABASE IF NOT EXISTS `anjungan_surat` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anjungan_surat`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perangkat`
--

CREATE TABLE `tb_perangkat` (
  `nik` varchar(25) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_perangkat`
--

INSERT INTO `tb_perangkat` (`nik`, `nama`, `jk`, `no_hp`, `jabatan`, `alamat`) VALUES
('2024000000000001', 'Cahya Bagya Pranowo', 'Laki-Laki', '081234567890', 'Kepala Desa', 'Jl. Ekonomi Enam No. 466, Bogor 72469, Jambi'),
('2024000000000002', 'Sabrina Yuliarti', 'Perempuan', '081234567891', 'Kaur Keuangan', 'Jl. Ekonomi Enam No. 466, Bogor 72469, Jambi'),
('2024000000000003', 'Kenzie Najmudin', 'Laki-Laki', '081234567892', 'Sekretaris', 'Jl. Ekonomi Enam No. 466, Bogor 72469, Jambi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile`
--

INSERT INTO `tb_profile` (`id_profile`, `id_user`, `nik`) VALUES
(1, 2, '2024000000000001'),
(2, 3, '2024000000000002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(9) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_cetak` datetime NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `nik`, `jenis_surat`, `keterangan`, `tgl_cetak`, `id_user`) VALUES
(1, '2024082800000001', 'Domisili', 'Test Cetak Domisili', '2024-11-09 19:44:15', 3),
(2, '2024082800000001', 'Usaha', 'Cek Cetak Surat Keterangan Usaha', '2024-11-09 19:45:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$0T0Z5y2DHOiqT.hGbyU5Y.H78f0F3GbeiJO70WRJCwtqdXVnCLe6u', 'Administrator'),
(2, 'kepala.desa', '$2y$10$IWR1xB0nc2y9Tkke./NTRuOQCKuVoHi76LHzBd/xJTxwdb43mF8Na', 'Kepala Desa'),
(3, 'petugas_satu', '$2y$10$iZ7VwsEXHOXicTdrO7ECeOlNEaZWttiUi6joi62LmLAdIyfXdRwu2', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_warga`
--

CREATE TABLE `tb_warga` (
  `nik` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(25) NOT NULL,
  `kwa` varchar(50) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_warga`
--

INSERT INTO `tb_warga` (`nik`, `nama`, `tgl_lahir`, `jk`, `kwa`, `agama`, `pekerjaan`, `status`, `alamat`, `rt`, `rw`) VALUES
('2024082800000001', 'Anastasia Aryani', '1997-02-14', 'Perempuan', 'WNI', 'Islam', 'Wiraswasta', 'Belum Kawin', 'pati', '4', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `nik_perangkat` (`nik`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `nik_warga` (`nik`),
  ADD KEY `user_cetak` (`id_user`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nik_perangkat` FOREIGN KEY (`nik`) REFERENCES `tb_perangkat` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `nik_warga` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_cetak` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
