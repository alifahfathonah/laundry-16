-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 12:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `alamat`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'webmaster@sixghakreasi.com', '08238923848', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(5) NOT NULL,
  `item_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_name`, `type`, `harga`) VALUES
(33, 'Tas', 'Laundry', 35000),
(32, 'Blus Mute S', 'Wet Cleaning', 20000),
(1, 'Bed Cover Single', 'Laundry', 50000),
(40, 'Blus', 'Laundry', 15000),
(44, 'Bed Cover Double', 'Wet Cleaning', 70000),
(45, 'Boneka', 'Laundry', 15000),
(46, 'Celana Jeans', 'Laundry', 15000),
(47, 'Celana Panjang Pria', 'Laundry', 20000),
(48, 'Celana Panjang Mute S', 'Wet Cleaning', 25000),
(49, 'Celana Pendek', 'Laundry', 15000),
(50, 'Gaun Pesta', 'Wet Cleaning', 50000),
(51, 'Jas Stelan Pria / Wanita', 'Wet Cleaning', 50000),
(52, 'Jas / Jaket / Blazer', 'Wet Cleaning', 30000),
(53, 'Kebaya Mute S', 'Wet Cleaning', 30000),
(54, 'Kemeja Lengan Panjang', 'Laundry', 19000),
(55, 'Kemeja Lengan Pendek', 'Laundry', 18000),
(56, 'Kemeja Batik / Safari', 'Wet Cleaning', 20000),
(57, 'Kemeja Sutra', 'Wet Cleaning', 20000),
(58, 'Karpet Kecil', 'Laundry', 50000),
(59, 'Rok', 'Laundry', 15000),
(60, 'Rok Panjang Mute S', 'Wet Cleaning', 20000),
(61, 'Sprei Single', 'Laundry', 25000),
(62, 'Sprei Double', 'Wet Cleaning', 30000),
(63, 'Syal Selendang', 'Wet Cleaning', 12000),
(64, 'T-Shirt', 'Laundry', 10000),
(65, 'Stelan Dinas / Safari', 'Wet Cleaning', 35000),
(66, 'Selimut Single', 'Laundry', 25000),
(68, 'Gaun Pengantin', 'Wet Cleaning', 150000),
(69, 'Sepatu Kulit', 'Laundry', 50000),
(70, 'Sepatu Sneaker', 'Laundry', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(10) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(1) NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_lengkap`, `no_telp`, `alamat`, `username`, `password`, `aktif`, `level`) VALUES
(7, 'Ada Penike', '0855345', 'asdas', 'penike', 'penike', 1, 'member'),
(2, 'Novalia Sihitessss', '0818956973', 'Wosi', 'novel', 'novel', 1, 'member'),
(3, '1234', '0818956973', 'Wosi', '456', '456', 1, 'member'),
(11, 'Muhammad Firman', '123', 'Jalan Baru', 'firman', 'firman', 1, 'member'),
(12, 'Adam Aja', '123', 'Wosi Dalam', 'adams', '1', 1, 'member'),
(13, 'tes', '081212123434', 'abs', 'tes', 'tes', 0, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `jenis` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `order_id` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `id_item` int(10) NOT NULL,
  `layanan_pcs` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `id_paket` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(20,0) NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `status_laundry` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `jenis`, `order_id`, `id_item`, `layanan_pcs`, `id_paket`, `qty`, `price`, `tanggal_selesai`, `status_laundry`) VALUES
(13, 'pcs', 'NOTA19-1', 70, 'kilat', '', 1, 70000, '2019-11-12 20:40:38', 2),
(23, 'kiloan', 'NOTA19-3', 0, '', '3', 4, 48000, '2019-10-21 22:10:11', 2),
(20, 'kiloan', 'NOTA19-2', 0, '', '2', 3, 60000, '0000-00-00 00:00:00', 0),
(24, 'pcs', 'NOTA19-3', 59, 'kilat', '', 1, 30000, '2019-10-21 22:10:16', 2),
(26, 'kiloan', 'NOTA19-4', 0, '', '1', 3, 30000, '2019-10-21 22:11:27', 1),
(31, 'pcs', 'NOTA19-5', 68, 'kilat', '', 1, 300000, '2019-10-21 22:55:51', 2),
(30, 'kiloan', 'NOTA19-5', 0, '', '3', 4, 48000, '0000-00-00 00:00:00', 0),
(32, 'kiloan', 'NOTA19-6', 0, '', '4', 4, 96000, '0000-00-00 00:00:00', 0),
(33, 'kiloan', 'NOTA19-7', 0, '', '3', 4, 48000, '0000-00-00 00:00:00', 0),
(35, 'kiloan', 'NOTA19-7', 0, '', '2', 1, 20000, '0000-00-00 00:00:00', 0),
(37, 'kiloan', 'NOTA19-1', 0, '', '1', 2, 20000, '2019-11-12 20:40:33', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_laundry`
--

CREATE TABLE `order_laundry` (
  `id` int(10) NOT NULL,
  `order_id` varchar(9) COLLATE utf8mb4_bin NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `grand_total` int(10) NOT NULL DEFAULT '0',
  `uang` int(11) NOT NULL DEFAULT '0',
  `cetak` int(1) NOT NULL DEFAULT '0',
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `alamat_order` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `struk` varchar(100) COLLATE utf8mb4_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_laundry`
--

INSERT INTO `order_laundry` (`id`, `order_id`, `tanggal_masuk`, `username`, `grand_total`, `uang`, `cetak`, `Latitude`, `Longitude`, `alamat_order`, `status`, `struk`) VALUES
(2, 'NOTA19-1', '2019-11-12 20:39:46', 'penike', 90000, 90000, 0, -0.8592385708179268, 134.04552402301636, 'SMA 2 Manokwari, Manokwari Barat, Manokwari Regency, West Papua, Indonesia', 2, ''),
(3, 'NOTA19-2', '2019-10-18 00:00:00', 'penike', 60000, 60000, 1, -0.9055264086955777, 134.03607351812286, 'Sowi III Kompleks Marampa, Manokwari Barat, Manokwari Regency, West Papua, Indonesia', 2, ''),
(4, 'NOTA19-3', '2019-11-12 19:54:28', 'penike', 78000, 78000, 1, -0.8619134398227032, 134.04802503306576, 'Jalan Nusantara IV, Wosi, Manokwari Regency, West Papua, Indonesia', 2, ''),
(5, 'NOTA19-4', '2019-10-18 00:00:00', 'adams', 30000, 30000, 1, -0.8526142432955922, 134.0557479567459, 'SMK NEGERI 2 MANOKWARI, Manokwari Barat, Manokwari Regency, West Papua, Indonesia', 1, ''),
(6, 'NOTA19-5', '2019-10-21 22:51:06', 'penike', 348000, 100000, 1, -0.8658227087485235, 134.0653471079346, 'Pasar Tingkat, Jalan Yos Sudarso, Sanggeng, Manokwari Regency, West Papua, Indonesia', 2, 'Penike_Dowansiba-NOTA19-5.jpg'),
(7, 'NOTA19-6', '2019-11-05 23:11:02', 'penike', 96000, 96000, 0, -0.8350165082549013, 134.07029896137374, 'Rektorat Universitas Papua, Amban, Manokwari Regency, West Papua, Indonesia', 2, 'Muhammad_Firman-NOTA19-6.jpg'),
(8, 'NOTA19-7', '2019-11-12 20:03:18', 'penike', 68000, 68000, 0, -0.8910374969655612, 134.0443250945816, 'Jalan Sowi Gunung, Sowi, Manokwari Regency, West Papua, Indonesia', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(5) NOT NULL,
  `nama_paket` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'Reguler (1-3kg) Melayani cucian 1-3 kilo dengan waktu pengerjaan selama 3hari sesuai permintaan.', '10000'),
(2, 'Kilat (1-3kg) Melayani cucian 1-3 kilo dengan waktu pengerjaan sehari.', '20000'),
(3, 'Reguler (4kg+) Melayani cucian 4 kilo ketas dengan waktu pengerjan selama 3hari.', '12000'),
(4, 'Kilat (4kg+) Melayani cucian 4 kilo keatas dengan waktu 1hari tergantung banyak cucian.', '24000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_laundry`
--
ALTER TABLE `order_laundry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beli_id` (`order_id`),
  ADD KEY `supplier_id` (`username`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
