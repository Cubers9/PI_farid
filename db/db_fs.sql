-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 05:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fs`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `kd_detail` int(3) NOT NULL,
  `kd_produk` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_order` varchar(10) NOT NULL,
  `kd_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`kd_detail`, `kd_produk`, `jumlah`, `kd_order`, `kd_user`) VALUES
(25, 'PRD009', 1, 'PSN001', 'USR002');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_pembayaran` int(3) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `no_acc` varchar(16) NOT NULL,
  `atasnama` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kd_pembayaran`, `metode_pembayaran`, `no_acc`, `atasnama`) VALUES
(1, 'Bank Negara Indonesia', '08080849529', 'farid'),
(2, 'Dana', '082249178530', 'farid');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kd_order` varchar(6) NOT NULL,
  `kd_user` varchar(6) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `subtotal` bigint(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kd_order`, `kd_user`, `nama_user`, `alamat`, `foto`, `subtotal`, `notelp`, `metode`, `status`, `tgl_order`) VALUES
('PSN001', 'USR002', 'Ujang', 'Jl. Merdeka', '8673_tf.jpg', 3500000, '081210613207', 'Bank Central Asia', 'Proses', '2023-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(6) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `desc_produk` varchar(350) NOT NULL,
  `img_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `desc_produk`, `img_produk`, `harga`) VALUES
('PRD001', 'Minimalis', 'Engagement, 1 fotografer & 1 asisten, File google drive, Jam kerja 3 jam, Permintaan edit file tanpa batas', 'minimalis.png', 7000000),
('PRD002', 'Standart', 'Engagement, 1 fotografer, 1 videografer, & 1 asisten, File google drive, Album magazine, Jam kerja 3 jam, Permintaan edit file tanpa batas, Video sinematik', 'standart.png', 1700000),
('PRD003', 'Maksimal', 'Engagement, 1 fotografer, 1 videografer, & 1 asisten, File flashdisk & google drive, Album magazine, Video Sinematik, Jam kerja 3 jam, Permintaan edit file tanpa batas, Video teaser', 'maksimal.png', 2300000),
('PRD004', 'Bronze', 'Prewedding, 2 fotografer, Cetak untuk stand 1x 30x40, Frame minimalis silver, black, white & gold, File flashdisk & google drive, Jam kerja 8 jam, Permintaan edit file tanpa batas', 'bronze.png', 1300000),
('PRD005', 'Silver', 'Prewedding, 2 fotografer dan 1 asisten, Cetak untuk stand 2x 30x40, Frame minimalis silver, black, white & gold, Foto estetis untuk sosial media, File flashdisk & google drive, Jam kerja 8 jam, Permintaan edit file tanpa batas', 'silver.png', 1700000),
('PRD006', 'Gold', 'Prewedding, 2 fotografer dan 1 videografer, Cetak untuk stand 1x 40x60 ukuran besar, Frame minimalis ukuran besar silver, black, white & gold + Album magazine, Video Sinematik, Foto estetis untuk sosial media, File flashdisk & google drive, Jam kerja 8 jam, Permintaan edit file tanpa batas, Video teaser', 'gold.png', 2500000),
('PRD007', 'Premium', 'Wedding, 2 fotografer, File flashdisk & google drive, File orisinal, File yang sudah diedit, Album dan 1x frame 30x40 minimalis, Jam kerja 8 jam', 'premium.png', 1700000),
('PRD008', 'Deluxe', 'Wedding, 2 fotografer dan 1 videografer, File flashdisk & google drive, File yang sudah diedit, File orisinal, Album magnetik, Jam kerja 8 jam, Video teaser sosial media', 'deluxe.png', 2500000),
('PRD009', 'Exclusive', 'Wedding, 2 fotografer dan 1 videografer, File flashdisk & google drive, File orisinal, File yang sudah diedit, Album magazine + cetak 40x50 frame, Jam kerja 8 jam, Permintaan edit file tanpa batas, Videografer 3-5 menit, Cinematic teaser untuk sosial media', 'exclusive.png', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `kd_testi` int(3) NOT NULL,
  `kd_user` varchar(6) NOT NULL,
  `judul_testi` text NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`kd_testi`, `kd_user`, `judul_testi`, `isi`) VALUES
(1, 'USR002', 'Pelayanannya Baik', 'Pelayanannya sangat baik. saya sangat merekomendasikan jasa ini.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` varchar(6) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `rank` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `email`, `nama`, `nohp`, `alamat`, `password`, `rank`) VALUES
('USR001', 'humaedi@gmail.com', 'humaedi', '081288490922', 'Tambun utara', 'edi123', 'Admin'),
('USR002', 'ujang@gmail.com', 'Ujang', '081210613207', 'Jl. Kemang Raya', '123', 'Pelanggan'),
('USR003', 'pangeran@gmail.com', 'pangeran', '081788912356', 'Bumi Anggrek', '123', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`kd_detail`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `kd_order` (`kd_order`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kd_order`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`kd_testi`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `kd_detail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kd_pembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `kd_testi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`kd_order`) REFERENCES `pesanan` (`kd_order`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`) ON DELETE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
