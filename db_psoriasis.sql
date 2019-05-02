-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mei 2019 pada 06.01
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psoriasis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `nama_gejala` text NOT NULL,
  `belief` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `nama_gejala`, `belief`, `created_at`, `updated_at`) VALUES
(1, 'Timbulnya bintik merah', 0.6, '2019-05-01 02:27:39', '2019-05-01 02:27:39'),
(2, 'Timbulnya lesi merah yang melebar', 0.7, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(3, 'Ditumbuhi sisik putih yang berlapis-lapis', 0.6, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(4, 'Sering mengelupas', 0.7, '2019-05-01 02:28:38', '2019-05-01 02:28:38'),
(5, 'Gatal', 0.8, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(6, 'Sakit dan perih', 0.6, '2019-05-01 02:29:21', '2019-05-01 02:29:21'),
(7, 'Sering tertutup lapisan putih keperakan', 0.5, '2019-05-01 02:29:44', '2019-05-01 02:29:44'),
(8, 'Timbul di sekitar alis, lutut, kepala, siku, dan bagian belakang panggul', 0.7, '2019-05-01 02:30:03', '2019-05-01 02:30:03'),
(9, 'Kulit tebal dan keras', 0.5, '2019-05-01 02:30:27', '2019-05-01 02:30:27'),
(10, 'Timbul pada bagian tangan dan kaki', 0.7, '2019-05-01 02:30:45', '2019-05-01 02:30:45'),
(11, 'Nyeri pada sendi', 0.7, '2019-05-01 02:31:02', '2019-05-01 02:31:02'),
(12, 'Sendi terasa bengkak dan kaku', 0.8, '2019-05-01 02:31:23', '2019-05-01 02:31:23'),
(13, 'Timbul pada badan dan kaki', 0.7, '2019-05-01 02:31:42', '2019-05-01 02:31:42'),
(14, 'Kulit berwarna sangat merah', 0.7, '2019-05-01 02:32:02', '2019-05-01 02:32:02'),
(15, 'Lesi tampak licin dan bersinar', 0.6, '2019-05-01 02:32:22', '2019-05-01 02:32:22'),
(16, 'Timbul pada lipatan-lipatan kulit', 0.7, '2019-05-01 02:32:42', '2019-05-01 02:32:42'),
(17, 'Kedinginan', 0.7, '2019-05-01 02:33:05', '2019-05-01 02:33:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala_penyakit`
--

CREATE TABLE `gejala_penyakit` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala_penyakit`
--

INSERT INTO `gejala_penyakit` (`id`, `id_penyakit`, `id_gejala`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2019-05-01 02:27:39', '2019-05-01 02:27:39'),
(2, 2, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(3, 3, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(4, 4, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(5, 5, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(6, 6, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(7, 7, 2, '2019-05-01 02:27:57', '2019-05-01 02:27:57'),
(8, 2, 3, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(9, 4, 3, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(10, 5, 3, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(11, 6, 3, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(12, 7, 3, '2019-05-01 02:28:22', '2019-05-01 02:28:22'),
(13, 2, 4, '2019-05-01 02:28:38', '2019-05-01 02:28:38'),
(14, 2, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(15, 3, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(16, 4, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(17, 5, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(18, 6, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(19, 7, 5, '2019-05-01 02:28:58', '2019-05-01 02:28:58'),
(20, 2, 6, '2019-05-01 02:29:21', '2019-05-01 02:29:21'),
(21, 2, 7, '2019-05-01 02:29:45', '2019-05-01 02:29:45'),
(22, 4, 7, '2019-05-01 02:29:45', '2019-05-01 02:29:45'),
(23, 5, 7, '2019-05-01 02:29:45', '2019-05-01 02:29:45'),
(24, 6, 7, '2019-05-01 02:29:45', '2019-05-01 02:29:45'),
(25, 7, 7, '2019-05-01 02:29:45', '2019-05-01 02:29:45'),
(26, 2, 8, '2019-05-01 02:30:03', '2019-05-01 02:30:03'),
(27, 4, 9, '2019-05-01 02:30:27', '2019-05-01 02:30:27'),
(28, 6, 9, '2019-05-01 02:30:27', '2019-05-01 02:30:27'),
(29, 7, 9, '2019-05-01 02:30:27', '2019-05-01 02:30:27'),
(30, 7, 10, '2019-05-01 02:30:45', '2019-05-01 02:30:45'),
(31, 4, 11, '2019-05-01 02:31:02', '2019-05-01 02:31:02'),
(32, 4, 12, '2019-05-01 02:31:23', '2019-05-01 02:31:23'),
(33, 6, 13, '2019-05-01 02:31:42', '2019-05-01 02:31:42'),
(34, 3, 14, '2019-05-01 02:32:02', '2019-05-01 02:32:02'),
(35, 5, 14, '2019-05-01 02:32:02', '2019-05-01 02:32:02'),
(36, 3, 15, '2019-05-01 02:32:22', '2019-05-01 02:32:22'),
(37, 3, 16, '2019-05-01 02:32:42', '2019-05-01 02:32:42'),
(38, 5, 17, '2019-05-01 02:33:05', '2019-05-01 02:33:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode`, `nama_penyakit`, `created_at`, `updated_at`) VALUES
(2, 'PV', 'Psoriasis Vulgaris', '2019-04-30 09:54:14', '2019-04-30 09:54:14'),
(3, 'PI', 'Psoriasis Inverse', '2019-04-30 09:54:29', '2019-04-30 09:54:29'),
(4, 'PA', 'Psoriasis Arthritis', '2019-04-30 09:54:39', '2019-04-30 09:54:39'),
(5, 'PE', 'Psoriasis Eritoderma', '2019-04-30 09:54:47', '2019-04-30 09:54:47'),
(6, 'PG', 'Psoriasis Guttate', '2019-04-30 09:54:56', '2019-04-30 09:54:56'),
(7, 'PP', 'Psoriasis Pultolosa', '2019-04-30 09:55:04', '2019-04-30 09:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD CONSTRAINT `gejala_penyakit_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gejala_penyakit_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
