-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 05:49 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inven`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(12) NOT NULL,
  `part_no` varchar(15) NOT NULL,
  `nama_barang` varchar(18) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `part_no`, `nama_barang`, `total`) VALUES
(116, '44763-KK140', 'paku', '72'),
(117, '44763-KK150', 'masker produksi', '60'),
(118, '44763-KK160', 'celemek', '79'),
(119, '11409-BZ120', 'topi', '9'),
(120, '44763-KK120', 'besi', '15'),
(121, '41533-0K070', 'kabel tis', '11'),
(122, '41533-0K100', 'kanebo', '25'),
(123, '12229-OC010', 'solatip bening', '28'),
(124, '77013-BZ100', 'pilox', '33'),
(125, '44763-KK060', 'kunci inggris', '40'),
(126, '44763-KK070', 'tang', '44'),
(127, '44763-KK130', 'kacamata produksi', '50'),
(128, '77013-BZ110', 'topi keamanan', '100'),
(129, '17761-TG2-T000', 'sepatu safety', '12'),
(130, '17762-TG2-T000', 'amplas besi', '1000'),
(140, '17763-TG2-T000', 'mesin potong', '90'),
(141, '9004A-44068', 'oli', '120'),
(142, '17830-73R00', 'bor', '11'),
(143, '17762-T7W-A000', 'palu', '20'),
(144, '1310-B210', 'mesin pendingin', '12'),
(145, '1310-B212', 'mesin tubing', '11'),
(146, '16930-52S00', 'mesin penghancur', '20'),
(147, '17550-52S00', 'ac', '15'),
(148, '17761-T7W-A00', 'cat minyak', '18');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `part_no` varchar(15) DEFAULT NULL,
  `id_suplier` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_brgkeluar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`part_no`, `id_suplier`, `total`, `tanggal`, `id_brgkeluar`) VALUES
('44763-KK120', '234567', 2, '2019-10-03', 1),
('44763-KK160', '123456', 1, '2019-10-05', 2),
('41533-0K070', '234567', 11, '2019-10-10', 4);

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE barang set total=total-NEW.total
where part_no=NEW.part_no;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_brgmasuk` int(11) NOT NULL,
  `part_no` varchar(15) DEFAULT NULL,
  `id_suplier` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_brgmasuk`, `part_no`, `id_suplier`, `total`, `tanggal`) VALUES
(14, '44763-KK150', '234567', 20, '2019-10-08'),
(15, '11409-BZ120', '345678', 11, '2019-10-08'),
(16, '44763-KK140', '123456', 12, '0000-00-00'),
(17, '44763-KK160', '234567', 10, '2019-10-05'),
(18, '44763-KK120', '456789', 12, '2019-10-05');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE barang set total=total+NEW.total
where part_no=NEW.part_no;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` varchar(50) NOT NULL DEFAULT 'NULL',
  `nama_suplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no.tlp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `no.tlp`) VALUES
('123456', 'PT. AMC INDONESIA', 'Jl. Maligi VI Lot E6 Kawasan Industri KIIC, Karawa', '0770-696288 / 0770-696286'),
('234567', 'PT. TRIX INDONESIA', ' Kawasan Industri KIIC Karawang, Jalan Maligi 4 Lo', '+62-21-8911-4735 / +62-267-646-614'),
('345678', 'PT. BHAKTI  KARYA CEMERLANG', 'Ruko Perum Karaba Indàh Blok Rusa 2 No. 2, Jl. Aks', '(0267) 6483309'),
('456789', 'PT. PPA (PUTRA PERKASA ABADI', 'Jalan Jati Raya Blok C3 No.7, Serang, Bekasi, Jawa', '(021) 8973584'),
('5678910', 'PT. SANKINTAMA', 'Jl. Industri Sel. 1 ,Blok QQ No.9H Sel., Pasirsari', '(021) 89841402 '),
('789101112', 'PT SARI TAKAGI ELOK PRODUK (STEP)', 'Jalan Jababeka IXA Blok P6, Wangunharja, Kec. Cika', '(021) 89904955');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `part_no` (`part_no`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_brgkeluar`),
  ADD KEY `FK_barang_keluar_suplier` (`id_suplier`),
  ADD KEY `part_no` (`part_no`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_brgmasuk`),
  ADD KEY `id_suplier` (`id_suplier`),
  ADD KEY `part_no` (`part_no`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_brgkeluar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_brgmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `FK_barang_keluar_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`),
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`part_no`) REFERENCES `barang` (`part_no`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`part_no`) REFERENCES `barang` (`part_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
