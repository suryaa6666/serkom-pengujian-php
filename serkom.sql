-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 11:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cekpendaftaran`
--

CREATE TABLE `tb_cekpendaftaran` (
  `id` int(11) NOT NULL,
  `kode_pendaftaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cekpendaftaran`
--

INSERT INTO `tb_cekpendaftaran` (`id`, `kode_pendaftaran`) VALUES
(9, 'nizh2qr5phcnsgnm'),
(10, 'zsumo860je6xmfwn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `no_hp_wali` varchar(20) NOT NULL,
  `status_penerimaan` enum('Menunggu','Diterima','Cadangan','Tidak Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `nama_lengkap`, `ttl`, `no_hp`, `agama`, `jenis_kelamin`, `alamat`, `sekolah_asal`, `nama_wali`, `no_hp_wali`, `status_penerimaan`) VALUES
(2, 'Cintara', 'Cilacap 26 April 2003', '089514043621', 'Islam', 'Laki-laki', 'Jln. Jantera No. 04\r\n   ', 'SMKN 1 Arab', 'Yuhu', '08999', 'Menunggu'),
(9, 'Cintara Surya Elidanto', 'Cilacap, 14 November 2002', '0895123213', 'Islam', 'Perempuan', ' Jln. Soekarno Hatta\r\n  ', 'SMKN 1 Purbalingga', 'Eli', '082242455511', 'Diterima'),
(10, 'Contoh Saja', 'Contoh, Contoh Contoh', '089514043621', 'Islam', 'Laki-laki', '  Jln. Jalan ', 'SMKN 1 Purbalingga', 'Halo', '08999999999999', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `role_id` int(11) NOT NULL,
  `sudah_daftar` enum('False','True') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_lengkap`, `ttl`, `no_hp`, `agama`, `alamat`, `jenis_kelamin`, `role_id`, `sudah_daftar`) VALUES
(1, '2', '2', 's', 'as', 'd', 'asd', ' asd', 'Perempuan', 1, 'True'),
(9, 'suryaelidanto1', '1234', 'Surya Elidanto', 'Cilacap, 14 November 2002', '0895123213', 'Islam', ' Jln. Soekarno Hatta\r\n', 'Perempuan', 0, 'True'),
(10, 'Contoh', '1234', 'Contoh Saja', 'Contoh, Contoh Contoh', '089514043621', 'Islam', ' Jln. Jalan', 'Laki-laki', 0, 'True');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cekpendaftaran`
--
ALTER TABLE `tb_cekpendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cekpendaftaran`
--
ALTER TABLE `tb_cekpendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
