-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 11:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(11) NOT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `tanggal_barang_masuk` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `id_merk`, `nama_barang`, `tanggal_barang_masuk`, `jumlah`, `foto`, `keterangan`) VALUES
(1, 3, 'laptop', '2020-06-10', 6, '2e3c1-laptop.jpg', '<p>\r\n	4 gb</p>\r\n'),
(2, 3, 'monitor', '2020-06-10', 5, 'cec17-monitor.jpg', '<p>\r\n	2018</p>\r\n'),
(3, 3, 'CPU', '2020-06-10', 2, '03a81-cpu.jpg', '<p>\r\n	2018</p>\r\n'),
(4, 2, 'mouse', '2020-06-10', 5, '643e1-mouse.jpg', '<p>\r\n	2018</p>\r\n'),
(5, 1, 'printer', '2020-06-10', 3, '9469b-printer.jpg', '<p>\r\n	2018</p>\r\n'),
(6, 2, 'keyboard', '2020-06-10', 4, 'ab681-keyboard.jpg', '<p>\r\n	2018</p>\r\n'),
(7, 3, 'monitor', '2020-06-10', 5, 'cc7b3-monitor.jpg', '<p>\r\n	2017</p>\r\n'),
(9, 5, 'laptop', '2020-07-25', 5, 'bf02c-2.png', '<p>\r\n	4 gb</p>\r\n'),
(10, 5, 'laptop asus', '2020-07-25', 1, '8721f-3.png', '<p>\r\n	4 gb</p>\r\n<p>\r\n	&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kriteria`
--

CREATE TABLE `tabel_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `pertanyaan_kriteria` text DEFAULT NULL,
  `jawaban1` varchar(50) DEFAULT NULL,
  `jawaban2` varchar(50) DEFAULT NULL,
  `jawaban3` varchar(50) DEFAULT NULL,
  `jawaban4` varchar(50) DEFAULT NULL,
  `jawaban5` varchar(50) DEFAULT NULL,
  `positif` double(10,8) DEFAULT NULL,
  `negatif` double(10,8) DEFAULT NULL,
  `bobot_kriteria` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kriteria`
--

INSERT INTO `tabel_kriteria` (`id_kriteria`, `nama_kriteria`, `pertanyaan_kriteria`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`, `positif`, `negatif`, `bobot_kriteria`) VALUES
(1, 'Harga', '<p>\r\n	Apakah harga mempengaruhi pertimbangan dalam membeli inventory perusahaan ?</p>\r\n', 'Harga Sangat Penting', 'Harga Penting', 'Harga Cukup Penting', 'Harga Kurang Penting', 'Harga Tidak Penting', 0.40451991, 2.02259958, 3.00),
(2, 'Stok', '<p>\r\n	Apakah stok di gudang sudah mendekati limit persediaan (hampir habis)</p>\r\n', 'Stok Habis', 'Stok Hampir Habis', 'Stok Cukup', 'Stok Masih Ada', 'Stok Masih Banyak', 2.69679940, 0.53935980, 4.00),
(3, 'Pengguna', '<p>\r\n	Berapa persen (%) dari pegawai rumah sakit yang akan menggunakan alat ini ?</p>\r\n', '80% - 100 % Pengguna', '60% - 80% Pengguna', '40% - 60% Pengguna', '20% - 40% Pengguna', '< 20% Pengguna', 3.37099931, 0.67419986, 5.00),
(4, 'Urgensi', '<p>\r\n	Seberapa urgent (penting) kah barang ini untuk operasional rumah sakit ?</p>\r\n', 'Sangat Dibutuhkan', 'Dibutuhkan', 'Cukup Dibutuhkan', 'Kurang Dibutuhkan', 'Tidak Dibutuhkan', 3.37099931, 0.67419986, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_merk`
--

CREATE TABLE `tabel_merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL,
  `pabrik_merk` varchar(50) DEFAULT NULL,
  `keterangan_merk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_merk`
--

INSERT INTO `tabel_merk` (`id_merk`, `nama_merk`, `pabrik_merk`, `keterangan_merk`) VALUES
(1, 'canon', 'canon', '<p>\r\n	printer, cpu</p>\r\n'),
(2, 'logitech', 'logitech', '<p>\r\n	mouse, monitor</p>\r\n'),
(3, 'lenovo', 'lenovo', '<p>\r\n	laptop, monitor, cpu</p>\r\n'),
(4, 'dell', 'PT dell', '<p>\r\n	monitor, CPU, mouse, keyboard</p>\r\n'),
(5, 'asus', 'asus', '<p>\r\n	asus</p>\r\n'),
(6, 'hp', 'hp', '<p>\r\n	mouse, cpu</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(7, 'jenius', 'jenius', '<p>\r\n	mouse</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username_pengguna` varchar(50) DEFAULT NULL,
  `password_pengguna` varchar(50) DEFAULT NULL,
  `level_pengguna` enum('SIM','RT','DIREKTUR','SUBUNIT') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`id_pengguna`, `nama_pengguna`, `username_pengguna`, `password_pengguna`, `level_pengguna`) VALUES
(1, 'Direktur', 'direktur', 'e56c0d6857d7acbd5bce85e1ffa28e34', 'DIREKTUR'),
(3, 'RT', 'rt', '327f42dc9cc897f17dc63852d31d3a99', 'RT'),
(9, 'Poli Dalam', 'polid', 'c842e0a50d7d9874125f471c3cdcef71', 'SUBUNIT'),
(10, 'Poli Mata', 'polim', 'd81dae8028b774f55e1941b4f50b43d7', 'SUBUNIT'),
(11, 'Poli Anak', 'polia', 'eb38d8c20b41fb4192e7802d7eb751e2', 'SUBUNIT'),
(13, 'Farmasi', 'farmasi', 'ab5b5f8e9b15685db78734f9dbaa2b44', 'SUBUNIT'),
(14, 'Gizi', 'gizi', '00c08ae98427567f86e1ec0660d629ad', 'SUBUNIT'),
(15, 'diklat', 'diklat', '8a6a2b6629900ea78709bb5236be70d7', 'SUBUNIT'),
(16, 'ICU', 'icu', '4770e52597f00cff152199d35f85bae9', 'SUBUNIT'),
(18, 'aris', 'sim', '9aa35fa7ef8eb91069ef4ffecb27ca47', 'SIM'),
(21, 'a', 'a', '25d55ad283aa400af464c76d713c07ad', 'DIREKTUR'),
(22, 'nur', 'polim', 'c5cdca791725c20da0a90faefe89e62f', 'SUBUNIT'),
(23, 'nur', 'amin', '67a95c52d87dcfabe6878fe37c155e3e', 'SUBUNIT');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_permintaan_barang`
--

CREATE TABLE `tabel_permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `positif` double(10,8) DEFAULT NULL,
  `negatif` double(10,8) DEFAULT NULL,
  `nilai_akhir` double(10,8) DEFAULT NULL,
  `hasil` enum('Belum Ada Hasil','Direkomendasikan','Dipertimbangkan','Ditolak') DEFAULT 'Belum Ada Hasil',
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_permintaan_barang`
--

INSERT INTO `tabel_permintaan_barang` (`id_permintaan`, `tgl_permintaan`, `id_barang`, `jumlah_barang`, `harga_barang`, `positif`, `negatif`, `nilai_akhir`, `hasil`, `id_pengguna`) VALUES
(98, '2020-07-24', 1, 1, 4000000, 4.90605827, 3.30730307, 0.40267351, 'Ditolak', 18),
(99, '2020-07-24', 2, 1, 4000000, 2.83251406, 1.90947232, 0.40267351, 'Ditolak', 18),
(100, '2020-07-24', 1, 2, 10000000, 4.90605827, 3.30730307, 0.40267351, 'Ditolak', 18),
(101, '2020-07-25', 1, 1, 4000000, 4.90605827, 3.30730307, 0.40267351, 'Ditolak', 18),
(102, '2020-07-25', 2, 1, 4000000, 4.66532647, 7.34864072, 0.61167478, 'Ditolak', 18),
(103, '2020-07-25', 1, 1, 4000000, 5.14303565, 4.89351474, 0.48756939, 'Ditolak', 18),
(104, '2020-07-25', 2, 1, 4000000, 4.91392705, 8.18600961, 0.62488925, 'Ditolak', 18),
(105, '2020-07-25', 3, 1, 4000000, 1.54318110, 3.60669279, 0.70034585, 'Direkomendasikan', 18),
(106, '2020-07-25', 1, 1, 4000000, NULL, NULL, NULL, 'Belum Ada Hasil', 18),
(107, '2020-07-25', 1, 1, 4000000, NULL, NULL, NULL, 'Belum Ada Hasil', 18),
(108, '2020-07-26', 1, 1, 2000000, NULL, NULL, NULL, 'Belum Ada Hasil', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_request`
--

CREATE TABLE `tabel_request` (
  `id_request` int(10) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `ruangan` varchar(100) NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `proses` enum('Sudah Diproses','Belum Diproses') NOT NULL,
  `id_pengguna` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_request`
--

INSERT INTO `tabel_request` (`id_request`, `tanggal_permintaan`, `id_barang`, `jumlah`, `ruangan`, `hasil`, `proses`, `id_pengguna`) VALUES
(15, '2020-07-08', 3, 1, 'sim', '0', 'Sudah Diproses', 2),
(20, '2020-07-22', 6, 1, 'poli', '0', 'Belum Diproses', 4),
(22, '2020-07-23', 3, 2, 'melati', '0', 'Sudah Diproses', 10),
(24, '2020-07-23', 1, 1, 'siti', '0', 'Belum Diproses', 10),
(26, '2020-07-24', 3, 1, 'sim', '0', 'Sudah Diproses', 4),
(27, '2020-07-24', 3, 1, 'sim', '0', 'Sudah Diproses', 4),
(28, '2020-07-24', 3, 1, 'sim', '0', 'Sudah Diproses', 2),
(29, '2020-07-24', 3, 1, 'aris', '0', 'Belum Diproses', 18),
(30, '2020-07-24', 3, 1, 'aris', '0', 'Belum Diproses', 18),
(31, '2020-07-08', 3, 1, 'aris', '0', 'Belum Diproses', 18),
(32, '2020-07-24', 3, 1, 'bunga', '0', 'Belum Diproses', 10),
(33, '2020-07-24', 3, 1, 'aris', '0', 'Belum Diproses', 18),
(34, '2020-07-24', 6, 1, 'aris', '0', 'Belum Diproses', 18),
(35, '2020-07-24', 3, 1, 'sim', '0', 'Belum Diproses', 18),
(36, '2020-07-25', 10, 1, 'nini', '0', 'Belum Diproses', 18),
(37, '2020-07-25', 3, 1, 'sim', '0', 'Belum Diproses', 18),
(38, '2020-07-25', 6, 1, 'kiki', '0', 'Belum Diproses', 10),
(39, '2020-07-26', 3, 1, 'polimata', '0', 'Belum Diproses', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_subkriteria`
--

CREATE TABLE `tabel_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_subkriteria` varchar(50) DEFAULT NULL,
  `bobot_subkriteria` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_subkriteria`
--

INSERT INTO `tabel_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot_subkriteria`) VALUES
(1, 1, 'Harga Sangat Penting', 0.05),
(2, 1, 'Harga Penting', 0.04),
(3, 1, 'Harga Cukup Penting', 0.03),
(4, 1, 'Harga Kurang Penting', 0.02),
(5, 1, 'Harga Tidak Penting', 0.01),
(6, 2, '80 % s.d. 100 %', 0.05),
(7, 2, '60% s.d. 80%', 0.04),
(8, 2, '40% s.d. 60%', 0.03),
(9, 2, '20% s.d. 40%', 0.02),
(10, 2, '0% s.d. 20%', 0.01),
(11, 3, 'Habis', 0.05),
(12, 3, 'Hampir Habis', 0.04),
(13, 3, 'Cukup', 0.03),
(14, 3, 'Masih ada', 0.02),
(15, 3, 'Masih banyak', 0.01),
(16, 4, 'Sangat dibutuhkan', 0.05),
(17, 4, 'dibutuhkan', 0.04),
(18, 4, 'cukup dibutuhkan', 0.03),
(19, 4, 'kurang dibutuhkan', 0.02),
(20, 4, 'tidak dibutuhkan', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_topsis`
--

CREATE TABLE `tabel_topsis` (
  `id_topsis` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` double(10,2) DEFAULT NULL,
  `normalisasi` double(10,2) DEFAULT NULL,
  `normalisasi_ternormalisasi` double(10,8) DEFAULT NULL,
  `terbobot` double(10,8) DEFAULT NULL,
  `max` double(10,8) DEFAULT NULL,
  `min` double(10,8) DEFAULT NULL,
  `status` enum('PROSES','SELESAI') DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_topsis`
--

INSERT INTO `tabel_topsis` (`id_topsis`, `id_permintaan`, `id_kriteria`, `nilai`, `normalisasi`, `normalisasi_ternormalisasi`, `terbobot`, `max`, `min`, `status`) VALUES
(312, 93, 1, 5.00, 25.00, 0.70710678, 2.12132034, 0.40451991, 2.02259958, 'SELESAI'),
(313, 93, 2, 5.00, 25.00, 0.70710678, 2.82842712, 2.69679940, 0.53935980, 'SELESAI'),
(314, 93, 3, 5.00, 25.00, 0.70710678, 3.53553390, 3.37099931, 0.67419986, 'SELESAI'),
(315, 93, 4, 5.00, 25.00, 0.70710678, 3.53553390, 3.37099931, 0.67419986, 'SELESAI'),
(316, 94, 1, 5.00, 25.00, 0.70710678, 2.12132034, 0.40451991, 2.02259958, 'SELESAI'),
(317, 94, 2, 5.00, 25.00, 0.70710678, 2.82842712, 2.69679940, 0.53935980, 'SELESAI'),
(318, 94, 3, 5.00, 25.00, 0.70710678, 3.53553390, 3.37099931, 0.67419986, 'SELESAI'),
(319, 94, 4, 5.00, 25.00, 0.70710678, 3.53553390, 3.37099931, 0.67419986, 'SELESAI'),
(320, 95, 1, 5.00, 25.00, NULL, NULL, 0.40451991, 2.02259958, 'SELESAI'),
(321, 95, 2, 5.00, 25.00, NULL, NULL, 2.69679940, 0.53935980, 'SELESAI'),
(322, 95, 3, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(323, 95, 4, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(324, 96, 1, 5.00, 25.00, NULL, NULL, 0.40451991, 2.02259958, 'SELESAI'),
(325, 96, 2, 5.00, 25.00, NULL, NULL, 2.69679940, 0.53935980, 'SELESAI'),
(326, 96, 3, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(327, 96, 4, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(328, 97, 1, 5.00, 25.00, NULL, NULL, 0.40451991, 2.02259958, 'SELESAI'),
(329, 97, 2, 5.00, 25.00, NULL, NULL, 2.69679940, 0.53935980, 'SELESAI'),
(330, 97, 3, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(331, 97, 4, 5.00, 25.00, NULL, NULL, 3.37099931, 0.67419986, 'SELESAI'),
(332, 98, 1, 5.00, 25.00, 0.33333333, 0.99999999, 0.40451991, 2.02259958, 'SELESAI'),
(333, 98, 2, 5.00, 25.00, 0.33333333, 1.33333332, 2.69679940, 0.53935980, 'SELESAI'),
(334, 98, 3, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(335, 98, 4, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(336, 99, 1, 5.00, 25.00, 0.33333333, 0.99999999, 0.40451991, 2.02259958, 'SELESAI'),
(337, 99, 2, 5.00, 25.00, 0.33333333, 1.33333332, 2.69679940, 0.53935980, 'SELESAI'),
(338, 99, 3, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(339, 99, 4, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(340, 100, 1, 5.00, 25.00, 0.33333333, 0.99999999, 0.40451991, 2.02259958, 'SELESAI'),
(341, 100, 2, 5.00, 25.00, 0.33333333, 1.33333332, 2.69679940, 0.53935980, 'SELESAI'),
(342, 100, 3, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(343, 100, 4, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(344, 101, 1, 5.00, 25.00, 0.33333333, 0.99999999, 0.40451991, 2.02259958, 'SELESAI'),
(345, 101, 2, 5.00, 25.00, 0.33333333, 1.33333332, 2.69679940, 0.53935980, 'SELESAI'),
(346, 101, 3, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(347, 101, 4, 5.00, 25.00, 0.33333333, 1.66666665, 3.37099931, 0.67419986, 'SELESAI'),
(348, 102, 1, 5.00, 25.00, 1.00000000, 3.00000000, 0.40451991, 2.02259958, 'SELESAI'),
(349, 102, 2, 5.00, 25.00, 1.00000000, 4.00000000, 2.69679940, 0.53935980, 'SELESAI'),
(350, 102, 3, 5.00, 25.00, 1.00000000, 5.00000000, 3.37099931, 0.67419986, 'SELESAI'),
(351, 102, 4, 5.00, 25.00, 1.00000000, 5.00000000, 3.37099931, 0.67419986, 'SELESAI'),
(352, 103, 1, 5.00, 25.00, 0.57735027, 1.73205081, 0.40451991, 2.02259958, 'SELESAI'),
(353, 103, 2, 5.00, 25.00, 0.57735027, 2.30940108, 2.69679940, 0.53935980, 'SELESAI'),
(354, 103, 3, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(355, 103, 4, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(356, 104, 1, 5.00, 25.00, 0.57735027, 1.73205081, 0.40451991, 2.02259958, 'SELESAI'),
(357, 104, 2, 5.00, 25.00, 0.57735027, 2.30940108, 2.69679940, 0.53935980, 'SELESAI'),
(358, 104, 3, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(359, 104, 4, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(360, 105, 1, 5.00, 25.00, 0.57735027, 1.73205081, 0.40451991, 2.02259958, 'SELESAI'),
(361, 105, 2, 5.00, 25.00, 0.57735027, 2.30940108, 2.69679940, 0.53935980, 'SELESAI'),
(362, 105, 3, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(363, 105, 4, 5.00, 25.00, 0.57735027, 2.88675135, 3.37099931, 0.67419986, 'SELESAI'),
(364, 106, 1, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(365, 106, 2, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(366, 106, 3, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(367, 106, 4, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(368, 107, 1, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(369, 107, 2, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(370, 107, 3, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(371, 107, 4, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(372, 108, 1, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(373, 108, 2, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(374, 108, 3, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES'),
(375, 108, 4, 5.00, 25.00, NULL, NULL, NULL, NULL, 'PROSES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `tabel_kriteria`
--
ALTER TABLE `tabel_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tabel_merk`
--
ALTER TABLE `tabel_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tabel_permintaan_barang`
--
ALTER TABLE `tabel_permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tabel_request`
--
ALTER TABLE `tabel_request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tabel_subkriteria`
--
ALTER TABLE `tabel_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tabel_topsis`
--
ALTER TABLE `tabel_topsis`
  ADD PRIMARY KEY (`id_topsis`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_kriteria`
--
ALTER TABLE `tabel_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_merk`
--
ALTER TABLE `tabel_merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tabel_permintaan_barang`
--
ALTER TABLE `tabel_permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tabel_request`
--
ALTER TABLE `tabel_request`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tabel_subkriteria`
--
ALTER TABLE `tabel_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tabel_topsis`
--
ALTER TABLE `tabel_topsis`
  MODIFY `id_topsis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
