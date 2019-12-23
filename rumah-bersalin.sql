-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Waktu pembuatan: 17 Bulan Mei 2019 pada 00.02
-- Versi server: 10.3.14-MariaDB-1:10.3.14+maria~bionic
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah-bersalin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `telepon` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `nama`, `telepon`) VALUES
(4, 'Panca Course', '0822657878'),
(3, 'Ridwan Dwi Susilo', '08768668767');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kamar`
--

CREATE TABLE `data_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `biaya` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kamar`
--

INSERT INTO `data_kamar` (`id_kamar`, `nama`, `biaya`) VALUES
(1, 'Anggrek', 300000),
(3, 'Mawar', 400000),
(4, 'Kamboja', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `stok` int(250) NOT NULL,
  `harga` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `kode_obat`, `nama`, `stok`, `harga`) VALUES
(1, 'O-1', 'OBH', 3, 5000),
(2, 'O-2', 'Procold', 4, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_pasien` int(11) NOT NULL,
  `reg` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `umur` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `suami` varchar(250) NOT NULL,
  `pekerjaan` varchar(250) NOT NULL,
  `pendidikan` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `reg`, `nama`, `umur`, `alamat`, `suami`, `pekerjaan`, `pendidikan`) VALUES
(9, 'REG-001', 'Ratih', '25', 'Indonesia', 'Udin', 'Guru', 'SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rawat_inap`
--

CREATE TABLE `data_rawat_inap` (
  `id_rawat_inap` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `biaya` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_rawat_inap`
--

INSERT INTO `data_rawat_inap` (`id_rawat_inap`, `nama`, `biaya`) VALUES
(4, 'OBGYN', 300000),
(5, 'Portus 1', 800000),
(6, 'Non OBYGEN', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rawat_jalan`
--

CREATE TABLE `data_rawat_jalan` (
  `id_rawat_jalan` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `biaya` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_rawat_jalan`
--

INSERT INTO `data_rawat_jalan` (`id_rawat_jalan`, `nama`, `biaya`) VALUES
(2, 'USG', 100000),
(3, 'Imunisasi', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rekam_medis`
--

CREATE TABLE `data_rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `reg` varchar(250) NOT NULL,
  `riwayat_alergi` varchar(250) NOT NULL,
  `diagnosa` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `pengobatan` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi_obat`
--

CREATE TABLE `data_transaksi_obat` (
  `id_transaksi_obat` int(11) NOT NULL,
  `reg` varchar(250) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `jumlah` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_transaksi_obat`
--

INSERT INTO `data_transaksi_obat` (`id_transaksi_obat`, `reg`, `id_obat`, `biaya`, `jumlah`) VALUES
(1, 'REG-001', 1, 5000, 1);

--
-- Trigger `data_transaksi_obat`
--
DELIMITER $$
CREATE TRIGGER `Stok_obat` AFTER INSERT ON `data_transaksi_obat` FOR EACH ROW BEGIN
UPDATE data_obat set stok=stok-NEW.jumlah
WHERE id_obat=NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `reg` varchar(250) DEFAULT NULL,
  `id_dokter` int(250) DEFAULT NULL,
  `id_kamar` int(250) DEFAULT NULL,
  `id_rawat_inap` int(250) DEFAULT NULL,
  `id_rawat_jalan` int(50) DEFAULT NULL,
  `id_transaksi_obat` int(100) DEFAULT NULL,
  `bhp` int(100) DEFAULT NULL,
  `dpjp` int(100) DEFAULT NULL,
  `kebersihan` int(222) DEFAULT NULL,
  `konsultasi` int(222) DEFAULT NULL,
  `visite` int(222) DEFAULT NULL,
  `infus` int(222) DEFAULT NULL,
  `total` int(222) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `reg`, `id_dokter`, `id_kamar`, `id_rawat_inap`, `id_rawat_jalan`, `id_transaksi_obat`, `bhp`, `dpjp`, `kebersihan`, `konsultasi`, `visite`, `infus`, `total`, `tanggal`) VALUES
(1, 'REG-001', 3, 3, 5, NULL, 1, 10000, 1000, 1000, 9000, 1000, NULL, 1227000, '2019-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('operator','pendaftaran','dokter','owner') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'pendaftaran', '202cb962ac59075b964b07152d234b70', 'pendaftaran'),
(2, 'operator', '202cb962ac59075b964b07152d234b70', 'operator'),
(3, 'dokter', '202cb962ac59075b964b07152d234b70', 'dokter'),
(4, 'owner', '202cb962ac59075b964b07152d234b70', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `reg` (`reg`);

--
-- Indeks untuk tabel `data_rawat_inap`
--
ALTER TABLE `data_rawat_inap`
  ADD PRIMARY KEY (`id_rawat_inap`);

--
-- Indeks untuk tabel `data_rawat_jalan`
--
ALTER TABLE `data_rawat_jalan`
  ADD PRIMARY KEY (`id_rawat_jalan`);

--
-- Indeks untuk tabel `data_rekam_medis`
--
ALTER TABLE `data_rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indeks untuk tabel `data_transaksi_obat`
--
ALTER TABLE `data_transaksi_obat`
  ADD PRIMARY KEY (`id_transaksi_obat`),
  ADD KEY `reg` (`reg`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `reg` (`reg`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_transaksi_obat` (`id_transaksi_obat`),
  ADD KEY `id_rawat_inap` (`id_rawat_inap`),
  ADD KEY `id_rawat_jalan` (`id_rawat_jalan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_kamar`
--
ALTER TABLE `data_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_rawat_inap`
--
ALTER TABLE `data_rawat_inap`
  MODIFY `id_rawat_inap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_rawat_jalan`
--
ALTER TABLE `data_rawat_jalan`
  MODIFY `id_rawat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_rekam_medis`
--
ALTER TABLE `data_rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi_obat`
--
ALTER TABLE `data_transaksi_obat`
  MODIFY `id_transaksi_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
