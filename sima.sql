-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 02:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sima`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `aset_id` int(11) NOT NULL,
  `aset_nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aset_masa_manfaat` int(2) NOT NULL,
  `kelompok_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`aset_id`, `aset_nama`, `aset_masa_manfaat`, `kelompok_id`) VALUES
(1, 'HP EliteBook 820-G2', 5, 1),
(2, 'Lenovo ThinkPad X250', 5, 1),
(3, 'Macbook Pro 2018', 8, 1),
(4, 'Logitech M170', 3, 2),
(5, 'Logitech M185', 3, 2),
(6, 'LG 22MK400H-B', 5, 3),
(7, 'LG 24MK600M', 5, 1),
(8, 'Realme C2', 5, 4),
(9, 'iPhone 7', 8, 4),
(10, 'HP Pavilion G4 1003-TX', 5, 1),
(11, 'Lenovo Ideapad 305', 5, 1),
(12, 'Samsung C24F390FHE', 5, 3),
(13, 'NS LED185', 5, 1),
(14, 'Acer X163W', 5, 3),
(15, 'Lenovo Ideapad 330', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `kelompok_id` int(11) NOT NULL,
  `kelompok_nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`kelompok_id`, `kelompok_nama`) VALUES
(1, 'laptop'),
(2, 'mouse'),
(3, 'monitor'),
(4, 'smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `pembelian_tanggal` date NOT NULL,
  `pembelian_harga` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`pembelian_id`, `pembelian_tanggal`, `pembelian_harga`, `pengajuan_id`, `aset_id`) VALUES
(1, '2017-07-17', 5850000, 2, 11),
(2, '2017-07-17', 6100000, 2, 10),
(3, '2017-07-17', 5850000, 2, 11),
(4, '2017-07-17', 60000, 2, 4),
(5, '2017-07-17', 60000, 2, 4),
(6, '2017-07-17', 60000, 2, 4),
(7, '2017-12-25', 6100000, 3, 10),
(8, '2017-12-25', 60000, 3, 4),
(9, '2019-05-01', 6250000, 1, 1),
(10, '2019-05-01', 70000, 1, 5),
(11, '2019-04-24', 1850000, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `pengajuan_tanggal` date NOT NULL,
  `pengajuan_keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `pengajuan_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_username` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`pengajuan_id`, `pengajuan_tanggal`, `pengajuan_keterangan`, `pengajuan_status`, `user_username`) VALUES
(1, '2019-04-29', 'Pengajuan untuk 1 unit laptop beserta 1 unit mouse untuk alat kerja pegawai baru Muhammad Syachrul', 'selesai', 'arismunandar'),
(2, '2017-07-17', 'Pengajuan 3 unit laptop dan 3 unit mouse untuk alat kerja Yama, Firman, dan Reza', 'selesai', 'arismunandar'),
(3, '2017-12-18', 'Pengajuan 1 unit laptop dan 1 unit mouse untuk Rofi', 'selesai', 'arismunandar'),
(4, '2019-04-22', 'Pengajuan 1 unit smartphone android untuk kebutuhan testing aplikasi', 'selesai', 'arismunandar');

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan`
--

CREATE TABLE `penyerahan` (
  `penyerahan_id` int(11) NOT NULL,
  `penyerahan_tanggal` date NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `user_username` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penyerahan`
--

INSERT INTO `penyerahan` (`penyerahan_id`, `penyerahan_tanggal`, `pembelian_id`, `user_username`) VALUES
(1, '2017-07-17', 1, 'yamaswastika'),
(2, '2017-07-17', 3, 'muresa'),
(3, '2017-07-17', 2, 'firmanpurnama'),
(4, '2017-07-17', 4, 'firmanpurnama'),
(5, '2017-07-17', 5, 'muresa'),
(6, '2017-07-17', 6, 'yamaswastika'),
(7, '2017-12-25', 7, 'rofib'),
(8, '2017-12-25', 8, 'rofib'),
(9, '2017-08-01', 1, 'kautsarazis'),
(10, '2017-08-14', 1, 'yamaswastika'),
(11, '2019-05-01', 9, 'msyachrul'),
(12, '2019-05-01', 10, 'msyachrul'),
(13, '2019-04-25', 11, 'yamaswastika');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_telepon` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_username`, `user_password`, `user_nama`, `user_telepon`, `user_role`) VALUES
('administrator', '$2y$10$/BA8i2TB31JaTfbjkJR4bezSMBlRmqGMjqazm2.GSh3U9LhTUNH9a', 'Administrator', '', 'administrator'),
('agunghananto', '$2y$10$fSg5hjAis5Vt4xs0/p28DOP0tcaRkzSdW0w/OZJq480BryTjGCKDa', 'Agung Dwi Hananto', '0811765729', 'direksi'),
('ariefmiqbal', '$2y$10$0DIK0v7KYLwphAkmE6ZqUefe01s4LFxelLK2SIR2M6HjeTnQq0UP.', 'Arief Muhammad Iqbal', '085795865956', 'karyawan'),
('arismunandar', '$2y$10$wcGXdDPVlDuIbnA2iBVVVekyHx6Hd2v8t.vyZ.jqBL34ps6qriyi2', 'Aris Munandar', '08112457333', 'direksi'),
('firmanpurnama', '$2y$10$S3JY3b2AMiO6M7e0X58sUOtPAawRbvQLP5xJOG/QwryOjUz3PkdMW', 'Firman Purnama', '081220424920', 'karyawan'),
('gyugie', '$2y$10$kB6blrY0BU6TE6LC44abTuyQbmGhmmAd8aAPI0J/jZxq36wqyocUm', 'Mugiono Arif S', '089666528074', 'karyawan'),
('indahr', '$2y$10$hd3xZovSEx8Xwirjg2sQdecgwek6pT92Q/KzJqaFppk6V//460rLC', 'Indah Rofiyani', '085794507894', 'karyawan'),
('kautsarazis', '$2y$10$Pjrj2wbOFN54qkEZR2SNI./3FC9/FUO9JNMvpDhzzhrGV31N40oVi', 'Kautsar Azis', '08987140835', 'karyawan'),
('msyachrul', '$2y$10$k8JmthkLW6Wf0FD/ZO9E0.lle.pUxMxlkJ9F5e7hs1d.qP1.MXlfO', 'Muhammad Syachrul', '082115111607', 'karyawan'),
('muresa', '$2y$10$T2/IFrRiPjO/I8vO81X24O0L6bFvVodUanzwVC8LEF1J40d/e0uFG', 'Muhammad Reza Saddat', '081240740436', 'karyawan'),
('rofib', '$2y$10$h8z2j.KgsNkOG8urW4CGCu1fEX.o1LHkjZprjVY50CEYYwfIxz1oa', 'Binashir Rofiah', '089680712270', 'karyawan'),
('salimah', '$2y$10$yuBPtsTOUFXBrbrUVe6nG.PG/tfnkhS8bRDar/s4t1SdWa9gC55Dy', 'Saadatusalimah', '085794728350', 'karyawan'),
('sofie', '$2y$10$DSbSPhtMO4xC2O4/BZg2beT9TnzOZ9/RYTC0N8vZic2qKHefbLQEa', 'Sofie', '085211966998', 'karyawan'),
('yamaswastika', '$2y$10$KAuKSwe0AOHSHy6nUHw0b.W7zPb6cLeRbw.sqXV.StQjPI7Wg7A3q', 'Yama Swastika', '089653295578', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`aset_id`),
  ADD KEY `kelompok_id` (`kelompok_id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`kelompok_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`),
  ADD KEY `aset_id` (`aset_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`),
  ADD KEY `user_username` (`user_username`);

--
-- Indexes for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD PRIMARY KEY (`penyerahan_id`),
  ADD KEY `pembelian_id` (`pembelian_id`),
  ADD KEY `user_username` (`user_username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `aset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `kelompok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyerahan`
--
ALTER TABLE `penyerahan`
  MODIFY `penyerahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`kelompok_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`aset_id`) REFERENCES `aset` (`aset_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`pengajuan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`user_username`) REFERENCES `user` (`user_username`) ON UPDATE CASCADE;

--
-- Constraints for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD CONSTRAINT `penyerahan_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`pembelian_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `penyerahan_ibfk_2` FOREIGN KEY (`user_username`) REFERENCES `user` (`user_username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
