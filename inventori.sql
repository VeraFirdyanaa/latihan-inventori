-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2019 at 12:15 PM
-- Server version: 5.7.24
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `tipe_id` int(11) DEFAULT NULL,
  `gudang_id` int(11) DEFAULT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`barang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `qty`, `satuan`, `tipe_id`, `gudang_id`, `tgl_input`) VALUES
(2, 'Laptop', 10, 'pcs', 3, 3, '2019-03-02 14:51:20'),
(4, 'Hanphone Huawei', 5, 'pcs', 2, 1, '2019-03-02 17:47:27'),
(5, 'Mouse Gaming', 4, 'Unit', 1, 3, '2019-03-02 17:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
CREATE TABLE IF NOT EXISTS `gudang` (
  `gudang_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`gudang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`gudang_id`, `nama_gudang`, `description`) VALUES
(1, 'Cakung Center Park', 'Jl. M Hasibuan no. 68'),
(3, 'Brebes', 'Jl. Brebes Raya');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

DROP TABLE IF EXISTS `tipe`;
CREATE TABLE IF NOT EXISTS `tipe` (
  `tipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tipe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`tipe_id`, `nama_tipe`) VALUES
(1, 'Asus'),
(2, 'HP'),
(3, 'Acer'),
(4, 'Zyrex');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
