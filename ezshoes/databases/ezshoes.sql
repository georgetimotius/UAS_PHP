-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 02:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `harga`, `stok`, `gambar`) VALUES
(1, 'Vans Old Skool Classic', 500000, 20, 'images/vans1.jpg'),
(2, 'Nike Air Mag', 10000000, 2, 'images/airmag1.jpg'),
(3, 'Nike Air Force 1 swoosh', 3000000, 5, 'images/swoosh1.jpg'),
(4, 'Nike Hype Addapt', 1500000, 5, 'images/hypeaddapt1.jpg'),
(5, 'Converse Le Fleur', 1500000, 10, 'images/converse1.jpg'),
(6, 'Air Jordan 1 Shadow', 5000000, 5, 'images/aj11.jpg'),
(7, 'Bank Sneakers', 300000, 20, 'images/s9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_pelanggan`) VALUES
(1, 'diriri2', '$2y$10$BiDT3.B.Hvy/N', 'Diri Anindyah'),
(2, 'georgetimotius', '$2y$10$hq1fCYNPn9n9Q', 'George Timotius'),
(3, 'aldy', '$2y$10$Bt8Btt0K55NVN', 'aldyy'),
(4, 'fonda', '$2y$10$28FcRGoLhYNof', 'dddddd'),
(5, 'asd', '$2y$10$cUsnHaGJC8AWJ', 'sdadas'),
(6, 'renaldy', '$2y$10$8pInO3P8ZPko2.G4ehG3weapUiqFmp4VuAZurmc6jEu/R6kPMntR.', 'Renaldy'),
(7, 'riri', 'riri', 'Diri A'),
(8, 'george', '$2y$10$CUFpIn87IBk/1QQXOXCx9upTvHcZPDKnH1esSnxFsYiTl3n4d9xGK', 'George Timotius'),
(9, 'apa', '$2y$10$xB4rvnCCQxBc5Qv.kCorsOF2vPcWkQbnyXLd9GvPRA.wP4u7FfnJ2', 'tautau');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rek` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nama_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `username`, `bank`, `no_rek`, `nama_rek`) VALUES
(2, 'george', 'BCA', '2531000255986478', 'Carmen Elizabeth'),
(3, 'apa', 'BBB', 'bodoamat', 'apa'),
(4, 'george', 'Mandiri', '120201000266506', 'George Timotius');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `testimoni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `email`, `testimoni`) VALUES
(1, 'George', 'georgetimotius.23@gmail.com', 'Recommended shoes seller, barang asli, pengiriman tepat waktu, terbaik deh!'),
(2, 'Renaldy', 'renaldycahya@gmail.com', 'The best online sneakers store so far ! Very recommended !'),
(3, 'Diri', 'dirianindyah@gmail.com', 'Terbaek dehh bintang 5!!!');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_trans` int(11) NOT NULL,
  `kode_brg` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_hrg` int(20) NOT NULL,
  `tgl_trans` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_trans`, `kode_brg`, `username`, `quantity`, `total_hrg`, `tgl_trans`, `nama_pelanggan`, `no_telp`, `alamat`, `email`) VALUES
(3, 2, 'renaldy', 2, 20000000, '2018-05-23 02:58:40', 'Renaldy Cahya', '2147483647', 'Duta Bandara Permai', 'renaldycahya@gmail.com'),
(4, 4, 'renaldy', 1, 1500000, '2018-05-23 03:02:38', 'Renaldy Cahya', '2147483647', 'Duta Bandara Permai', 'renaldycahya@gmail.com'),
(5, 4, 'renaldy', 3, 4500000, '2018-05-23 04:01:41', 'Renaldy Cahya', '2147483647', 'Duta Bandara Permai', 'renaldycahya@gmail.com'),
(6, 4, 'george', 1, 1500000, '2018-05-24 03:02:40', 'George Timotius', '2147483647', 'Bekasi Regensi 1', 'georgetimotius.23@gmail.com'),
(7, 4, 'george', 1, 1500000, '2018-05-24 03:09:39', 'George Timotius', '2147483647', 'Bekasi Regensi 1', 'georgetimotius.23@gmail.com'),
(8, 4, 'george', 1, 1500000, '2018-05-24 03:16:13', 'George Timotius', '2147483647', 'Bekasi Regensi 1', 'georgetimotius.23@gmail.com'),
(9, 4, 'george', 1, 1500000, '2018-05-24 03:18:27', 'George Timotius', '2147483647', 'Bekasi Regensi 1', 'georgetimotius.23@gmail.com'),
(10, 2, 'george', 1, 10000000, '2018-05-24 03:56:38', 'George Timotius', '081261105834', 'Bumi Sani Permai', 'georgetimotius.23@gmail.com'),
(11, 1, 'apa', 1, 500000, '2018-05-25 06:45:22', 'yee', '0888888888', 'dimana aja', 'mautauaja'),
(12, 5, 'george', 1, 1500000, '2018-05-29 05:31:40', 'George Timotius', '081311238975', 'Bumi Sani Permai', 'georgetimotius.23@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
