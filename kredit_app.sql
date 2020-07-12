-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2020 at 06:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `down_payment` double NOT NULL,
  `total_sisa_bayar` double NOT NULL,
  `harga_beli` double NOT NULL,
  `tenor` double NOT NULL,
  `pembayaran_perbulan` double NOT NULL,
  `tanggal_pembayaran_awal` datetime DEFAULT NULL,
  `tanggal_pembayaran_akhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `user_id`, `produk_id`, `down_payment`, `total_sisa_bayar`, `harga_beli`, `tenor`, `pembayaran_perbulan`, `tanggal_pembayaran_awal`, `tanggal_pembayaran_akhir`) VALUES
(47, 22, 16, 54000000, 126000000, 180000000, 10, 12600000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 22, 17, 57000000, 133000000, 190000000, 12, 11083333.333333334, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 22, 20, 60000000, 140000000, 200000000, 12, 11666666, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 26, 18, 60000000, 140000000, 200000000, 10, 14000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 22, 21, 54000000, 126000000, 180000000, 10, 12600000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 22, 22, 57000000, 133000000, 190000000, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 22, 23, 60000000, 140000000, 200000000, 12, 11666666, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tipe` text NOT NULL,
  `harga` double NOT NULL,
  `harga_pokok` double NOT NULL,
  `keuntungan` double NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `thumbnail` text NOT NULL,
  `lokasi` text NOT NULL,
  `luas_bangunan` double NOT NULL,
  `luas_tanah` double NOT NULL,
  `fasilitas` text NOT NULL,
  `lantai` text NOT NULL,
  `alamat` text NOT NULL,
  `sertifikasi` text NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `status` enum('ready','terjual') NOT NULL DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `tipe`, `harga`, `harga_pokok`, `keuntungan`, `stok`, `thumbnail`, `lokasi`, `luas_bangunan`, `luas_tanah`, `fasilitas`, `lantai`, `alamat`, `sertifikasi`, `tanggal_ditambahkan`, `status`) VALUES
(16, 'Rumah Tipe 36 Asri Blok B.12', '36 ', 180000000, 90000000, 90000000, 1, '', 'Kota Palembang', 36, 72, '', '', '', 'SHM', '2020-02-19 21:05:19', 'terjual'),
(17, 'Rumah Tipe 36 Asri Blok A.1', '36', 190000000, 100000000, 90000000, 1, '', 'Kota Palembang', 36, 84, '', '', '', 'SHM', '2020-02-19 21:49:13', 'terjual'),
(18, 'Rumah Tipe 36 Asri Blok C.8', '36', 200000000, 130000000, 70000000, NULL, '', 'Kota Palembang', 0, 100, '', '', '', 'SHM', '2020-02-26 20:25:46', 'terjual'),
(20, 'Rumah Tipe 36 Asri blok A.2', '36', 200000000, 110000000, 90000000, NULL, '', 'Kota Palembang', 0, 100, '', '', '', 'SHM', '2020-02-24 11:11:38', 'terjual'),
(21, 'Rumah Tipe 36 Asri Blok A.4', '36', 180000000, 90000000, 90000000, NULL, '', 'Kota Palembang', 0, 72, '', '', '', 'SHM', '2020-03-05 09:35:10', 'terjual'),
(22, 'Rumah Tipe 36 Asri Blok A.5', '36', 190000000, 100000000, 90000000, NULL, '', 'Kota Palembang', 0, 84, '', '', '', 'SHM', '2020-03-23 20:09:05', 'terjual'),
(23, 'Rumah Tipe 36 Asri Blok A.6', '36', 200000000, 110000000, 90000000, NULL, '', 'Kota Palembang', 0, 100, '', '', '', 'SHM', '2020-07-11 15:11:25', 'terjual'),
(24, 'Rumah Tipe 36 Asri Blok A.3', '36', 190000000, 100000000, 90000000, NULL, '', 'Kota Palembang', 0, 84, '', '', '', 'SHM', '2020-02-24 11:07:44', 'ready'),
(25, 'Rumah Tipe 36 Asri Blok A.7', '36', 180000000, 90000000, 90000000, NULL, '', 'Kota Palembang', 0, 72, '', '', '', 'SHM', '2020-07-11 15:57:32', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `bulan` int(2) NOT NULL,
  `tahun` text NOT NULL,
  `bukti` text NOT NULL,
  `status` enum('bayar','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `user_id`, `produk_id`, `tanggal`, `bulan`, `tahun`, `bukti`, `status`) VALUES
(327, 22, 16, '2020-03-19 07:00:31', 3, '2020', 'Screenshot_from_2020-07-09_19-06-591.png', 'bayar'),
(328, 22, 16, '2020-02-19 22:01:21', 4, '2020', '', 'bayar'),
(329, 22, 16, '2020-02-26 21:35:35', 5, '2020', '', 'bayar'),
(330, 22, 16, '2020-03-15 15:02:27', 6, '2020', '', 'bayar'),
(331, 22, 16, '2020-03-18 21:51:42', 7, '2020', '', 'bayar'),
(332, 22, 16, '2020-03-18 21:51:46', 8, '2020', '', 'bayar'),
(333, 22, 16, '2020-03-18 22:00:04', 9, '2020', '', 'bayar'),
(334, 22, 16, '2020-03-19 07:00:52', 10, '2020', '', 'bayar'),
(335, 22, 16, '2020-03-23 17:52:40', 11, '2020', '', 'bayar'),
(336, 22, 16, '2020-04-09 14:42:21', 12, '2020', '', 'bayar'),
(337, 22, 17, '2020-02-19 22:16:56', 3, '2020', '', 'bayar'),
(338, 22, 17, '2020-02-19 22:16:58', 4, '2020', '', 'bayar'),
(339, 22, 17, '2020-02-19 22:17:01', 5, '2020', '', 'bayar'),
(340, 22, 17, '0000-00-00 00:00:00', 6, '2020', '', 'belum'),
(341, 22, 17, '0000-00-00 00:00:00', 7, '2020', '', 'belum'),
(342, 22, 17, '0000-00-00 00:00:00', 8, '2020', '', 'belum'),
(343, 22, 17, '0000-00-00 00:00:00', 9, '2020', '', 'belum'),
(344, 22, 17, '0000-00-00 00:00:00', 10, '2020', '', 'belum'),
(345, 22, 17, '0000-00-00 00:00:00', 11, '2020', '', 'belum'),
(346, 22, 17, '0000-00-00 00:00:00', 12, '2020', '', 'belum'),
(347, 22, 17, '0000-00-00 00:00:00', 1, '2021', '', 'belum'),
(348, 22, 17, '0000-00-00 00:00:00', 2, '2021', '', 'belum'),
(349, 22, 20, '2020-02-24 11:13:20', 3, '2020', 'Screenshot_from_2020-07-03_10-18-35.png', 'bayar'),
(350, 22, 20, '0000-00-00 00:00:00', 4, '2020', '', 'belum'),
(351, 22, 20, '0000-00-00 00:00:00', 5, '2020', '', 'belum'),
(352, 22, 20, '0000-00-00 00:00:00', 6, '2020', '', 'belum'),
(353, 22, 20, '0000-00-00 00:00:00', 7, '2020', '', 'belum'),
(354, 22, 20, '0000-00-00 00:00:00', 8, '2020', '', 'belum'),
(355, 22, 20, '0000-00-00 00:00:00', 9, '2020', '', 'belum'),
(356, 22, 20, '0000-00-00 00:00:00', 10, '2020', '', 'belum'),
(357, 22, 20, '0000-00-00 00:00:00', 11, '2020', '', 'belum'),
(358, 22, 20, '0000-00-00 00:00:00', 12, '2020', '', 'belum'),
(359, 22, 20, '0000-00-00 00:00:00', 1, '2021', '', 'belum'),
(360, 22, 20, '0000-00-00 00:00:00', 2, '2021', '', 'belum'),
(361, 26, 18, '2020-07-12 11:19:14', 3, '2020', 'sintalogo.png', 'bayar'),
(362, 26, 18, '0000-00-00 00:00:00', 4, '2020', '', 'belum'),
(363, 26, 18, '0000-00-00 00:00:00', 5, '2020', '', 'belum'),
(364, 26, 18, '0000-00-00 00:00:00', 6, '2020', '', 'belum'),
(365, 26, 18, '0000-00-00 00:00:00', 7, '2020', '', 'belum'),
(366, 26, 18, '0000-00-00 00:00:00', 8, '2020', '', 'belum'),
(367, 26, 18, '0000-00-00 00:00:00', 9, '2020', '', 'belum'),
(368, 26, 18, '0000-00-00 00:00:00', 10, '2020', '', 'belum'),
(369, 26, 18, '0000-00-00 00:00:00', 11, '2020', '', 'belum'),
(370, 26, 18, '0000-00-00 00:00:00', 12, '2020', '', 'belum'),
(371, 22, 21, '0000-00-00 00:00:00', 4, '2020', '', 'belum'),
(372, 22, 21, '0000-00-00 00:00:00', 5, '2020', '', 'belum'),
(373, 22, 21, '0000-00-00 00:00:00', 6, '2020', '', 'belum'),
(374, 22, 21, '0000-00-00 00:00:00', 7, '2020', '', 'belum'),
(375, 22, 21, '0000-00-00 00:00:00', 8, '2020', '', 'belum'),
(376, 22, 21, '0000-00-00 00:00:00', 9, '2020', '', 'belum'),
(377, 22, 21, '0000-00-00 00:00:00', 10, '2020', '', 'belum'),
(378, 22, 21, '0000-00-00 00:00:00', 11, '2020', '', 'belum'),
(379, 22, 21, '0000-00-00 00:00:00', 12, '2020', '', 'belum'),
(380, 22, 21, '0000-00-00 00:00:00', 1, '2021', '', 'belum'),
(381, 22, 23, '0000-00-00 00:00:00', 8, '2020', '', 'belum'),
(382, 22, 23, '0000-00-00 00:00:00', 9, '2020', '', 'belum'),
(383, 22, 23, '0000-00-00 00:00:00', 10, '2020', '', 'belum'),
(384, 22, 23, '0000-00-00 00:00:00', 11, '2020', '', 'belum'),
(385, 22, 23, '0000-00-00 00:00:00', 12, '2020', '', 'belum'),
(386, 22, 23, '0000-00-00 00:00:00', 1, '2021', '', 'belum'),
(387, 22, 23, '0000-00-00 00:00:00', 2, '2021', '', 'belum'),
(388, 22, 23, '0000-00-00 00:00:00', 3, '2021', '', 'belum'),
(389, 22, 23, '0000-00-00 00:00:00', 4, '2021', '', 'belum'),
(390, 22, 23, '0000-00-00 00:00:00', 5, '2021', '', 'belum'),
(391, 22, 23, '0000-00-00 00:00:00', 6, '2021', '', 'belum'),
(392, 22, 23, '0000-00-00 00:00:00', 7, '2021', '', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('admin','common','pimpinan','superadmin') NOT NULL,
  `nik` text NOT NULL,
  `npwp` text NOT NULL,
  `telepon` text NOT NULL,
  `usia` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `fullname`, `password`, `role`, `nik`, `npwp`, `telepon`, `usia`, `alamat`) VALUES
(5, 'admin', 'admin@gmail.com', 'Admin Care Kredit', '202cb962ac59075b964b07152d234b70', 'admin', '121091029102', '121091029102', '0711123456', 0, 'Jakabaring, Palembang'),
(16, 'anggi', 'zalbinaridwan@gmail.com', 'Anggi Permatasari', '202cb962ac59075b964b07152d234b70', 'common', '121091029121', '121091029102', '0711123456', 0, 'Plaju, Palembang'),
(22, 'anggun', 'anggun@gmail.com', 'Anggun Dwi Puspita', '202cb962ac59075b964b07152d234b70', 'common', '121091029121', '121091029102', '0711123454', 0, 'Plaju, Palembang'),
(26, 'anggun3', 'anggun@gmail.com', 'anggun', '202cb962ac59075b964b07152d234b70', 'common', '', '', '', 0, ''),
(27, 'anggun2', 'anggun@gmail.com', 'anggun', '202cb962ac59075b964b07152d234b70', 'common', '123123123', '', '08123123123', 0, 'Jl. Jend. Basuki Rachmat No.886 F, 20 Ilir D II, Kec. Kemuning, Kota Palembang, Sumatera Selatan 30128'),
(28, 'pimpinan', 'pimpinan@gmail.com', 'Admin Care Kredit2', '202cb962ac59075b964b07152d234b70', 'pimpinan', '121091029102', '121091029102', '0711123456', 0, 'Jakabaring, Palembang'),
(35, 'superadmin', 'superadmin@gmail.com', 'Superadmin Care Kredit', '202cb962ac59075b964b07152d234b70', 'superadmin', '121091029102', '121091029102', '0711123456', 0, 'Jakabaring, Palembang'),
(39, 'dina', 'Dina@gmail.com', 'Dina', '202cb962ac59075b964b07152d234b70', 'common', '', '', '', 0, ''),
(40, 'iga', 'iga@gmail.com', 'iga', '202cb962ac59075b964b07152d234b70', 'common', '67782919029', '', '082177075872', 0, 'plaju');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
