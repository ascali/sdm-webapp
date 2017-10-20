-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 03:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('Administrator','Staff','Operator Pelatihan','Operator Pegawai') DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_pegawai`, `username`, `password`, `level`, `created`, `updated`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '2017-03-16 14:08:35', '2017-03-16 14:08:35'),
(26, 5, 'kmprul', '4297f44b13955235245b2497399d7a93', 'Staff', '2017-03-17 22:30:51', '2017-03-17 22:30:51'),
(27, 2, 'saras', '25d55ad283aa400af464c76d713c07ad', 'Operator Pegawai', '2017-03-16 14:09:21', '2017-03-16 14:09:21'),
(28, 1, 'bidin', '25d55ad283aa400af464c76d713c07ad', 'Operator Pelatihan', '2017-03-16 14:09:34', '2017-03-16 14:09:34'),
(32, 14, 'q', '25d55ad283aa400af464c76d713c07ad', 'Staff', '2017-03-21 11:01:24', '2017-03-21 11:01:24'),
(33, 15, 'coba', '25d55ad283aa400af464c76d713c07ad', 'Staff', '2017-03-22 16:11:45', '2017-03-22 16:11:45'),
(35, 16, 'coba12', '25d55ad283aa400af464c76d713c07ad', 'Staff', '2017-03-22 15:52:07', '2017-03-22 15:52:07'),
(36, 17, 'testin439', '25d55ad283aa400af464c76d713c07ad', 'Staff', '2017-03-24 14:06:10', '2017-03-24 14:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(20) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `anakke` varchar(10) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `id_pegawai`, `anakke`, `nama_anak`, `tanggal_lahir`, `tempat_lahir`, `created`, `updated`) VALUES
(1, 1, '1', 'Sodikin', '12-12-1994', 'Indramayu', '2016-12-04 16:38:01', '2016-12-04 16:38:51'),
(3, 1, '2', 'Sodikun', '12-12-1994', 'Jakarta', '2016-12-05 07:48:53', '2016-12-05 07:48:53'),
(4, 2, '1', 'asda', '12-11-2003', 'fdsd', '2016-12-29 02:29:19', '2016-12-31 21:28:02'),
(5, 2, '2', 'ewfdf', '12-11-2005', 'dsf', '2016-12-29 02:29:33', '2016-12-31 21:50:05'),
(6, 1, '3', 'apa aja', '12-12-1992', 'aja kepo', '2016-12-29 06:55:12', '2016-12-31 21:51:32'),
(7, 2, '3', 'sddfmdfsd', '11-11-2006', 'dfjlksdf', '2016-12-31 21:29:08', '2016-12-31 21:46:23'),
(8, 1, '4', 'iughiuh', '12-12-1222', 'khkhk', '2016-12-31 21:51:47', '2016-12-31 21:51:47'),
(9, 2, '4', 'asdf', '1', 'qwqeewf', '2016-12-31 22:06:15', '2017-01-14 16:03:27'),
(10, 2, '5', 'qdsf', '12-12-1999', 'qdsfsd', '2016-12-31 22:09:35', '2017-01-14 16:03:32'),
(11, 8, '1', 'lkh', '12', 'lknb', '2017-01-06 15:08:36', '2017-01-06 15:08:36'),
(12, 8, '2', 'sdfsd', '12', 'dvsdsv', '2017-01-07 13:07:26', '2017-01-07 13:07:26'),
(13, 2, '6', 'hkjb', '12-12-1999', 'kjbkjb', '2017-01-14 16:03:45', '2017-03-16 04:42:38'),
(14, 0, '1', 'abc', '12-12-1990', 'indramayu', '2017-03-16 04:42:20', '2017-03-16 04:42:20'),
(15, 5, '1', 'qwe', '2017-07-13', 'asdas', '2017-03-17 18:12:17', '2017-03-17 21:10:43'),
(16, 14, '1', '1', '2017-03-08', '1', '2017-03-20 06:50:27', '2017-03-20 06:50:27'),
(17, 14, '2', '2', '2017-03-01', '2', '2017-03-20 07:03:00', '2017-03-20 07:03:00'),
(18, 14, '3', '3', '2017-03-01', '3', '2017-03-20 07:15:47', '2017-03-20 07:15:47'),
(19, 15, '1', 'kepo', '2017-03-22', 'kepo', '2017-03-22 15:48:46', '2017-03-22 15:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id_approval` int(20) NOT NULL,
  `id_master` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `turn` bit(30) NOT NULL,
  `approve` bit(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(20) NOT NULL,
  `gambar_berita` text NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `gambar_berita`, `judul`, `isi`, `created`, `updated`) VALUES
(1, '1480910317122.png', 'a1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-12-05 03:56:24', '2016-12-29 02:47:45'),
(3, '1482979606926.jpg', 'lorem 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-12-29 02:46:46', '2016-12-29 02:47:33'),
(4, '1482996742725.jpg', 'lorem 12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nv\r\nvvLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-12-29 02:48:22', '2016-12-29 07:32:22'),
(5, '1486997770778.jpg', 'coba', 'dadjkahdkjahdkahflhalf', '2016-12-30 12:05:23', '2017-02-13 14:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(20) NOT NULL,
  `nama_bidang` varchar(25) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `created`, `updated`) VALUES
(1, 'Administrasi', '2016-12-04 16:51:54', '2016-12-05 05:12:24'),
(3, 'Operasi', '2016-12-05 05:12:29', '2016-12-05 05:12:29'),
(4, 'Operator', '2016-12-05 05:12:34', '2016-12-05 05:12:34'),
(5, 'Quality Risk Manage', '2016-12-31 09:00:18', '2016-12-31 09:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_pelatihan` int(11) DEFAULT NULL,
  `id_sertifikasi` int(11) DEFAULT NULL,
  `status_history` enum('Pelatihan','Sertifikasi') DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_pegawai`, `id_pelatihan`, `id_sertifikasi`, `status_history`, `created`, `updated`) VALUES
(9, 5, 24, NULL, 'Pelatihan', '2017-03-17 21:06:23', '2017-03-17 21:06:23'),
(10, 14, 25, NULL, 'Pelatihan', '2017-03-21 10:13:57', '2017-03-21 10:13:57'),
(11, 14, NULL, 4, 'Sertifikasi', '2017-03-21 10:56:50', '2017-03-21 10:56:50'),
(12, 15, 26, NULL, 'Pelatihan', '2017-03-22 16:08:14', '2017-03-22 16:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `judul_pelatihan`
--

CREATE TABLE `judul_pelatihan` (
  `id_judul` int(20) NOT NULL,
  `judul_pelatihan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `status` enum('Suami','Istri') NOT NULL,
  `nama_pasangan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `id_pegawai`, `status`, `nama_pasangan`, `tempat_lahir`, `tanggal_lahir`, `created`, `updated`) VALUES
(1, '1', 'Istri', 'Sarkemini', 'Tegal', '12-12-1992', '2016-12-05 04:44:11', '2017-03-20 14:32:27'),
(5, '2', 'Suami', 'hdfddf', 'gqdsfdfs', '12-12-1990', '2016-12-31 22:16:54', '2017-03-16 04:42:50'),
(6, '8', 'Istri', 'kjhlkh', 'LKHN;LK', '21', '2017-01-06 15:08:06', '2017-01-06 15:08:06'),
(7, '5', 'Istri', 'qwewq', 'swdsad', '2017-03-24', '2017-03-17 18:12:01', '2017-03-17 21:10:27'),
(8, '14', 'Istri', '1123', '1123', '2017-03-01', '2017-03-20 06:50:06', '2017-03-20 08:16:44'),
(9, '15', 'Istri', 'eah', 'eah', '1993-07-08', '2017-03-22 15:48:26', '2017-03-22 15:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(20) NOT NULL,
  `level_jabatan` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level_jabatan`, `created`, `updated`) VALUES
(3, 'Staff', '2016-12-05 07:50:25', '2016-12-05 07:50:25'),
(2, 'General Manager', '2016-12-04 17:23:37', '2016-12-04 17:23:47'),
(4, 'Helper', '2016-12-05 07:50:37', '2016-12-05 07:50:37'),
(5, 'Office Boy / Girl', '2016-12-05 07:50:55', '2016-12-05 07:50:55'),
(7, 'abc', '2017-03-12 08:22:47', '2017-03-12 08:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `id_status` int(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `skala` varchar(20) NOT NULL,
  `devisi` varchar(20) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `id_bidang` int(20) NOT NULL,
  `id_level` int(20) NOT NULL,
  `id_pendidikan` int(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tetap` varchar(15) NOT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `cost_center` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `record_pepelatihan` int(11) DEFAULT NULL,
  `status_perkawinan` int(1) DEFAULT NULL,
  `foto` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nid`, `id_status`, `grade`, `skala`, `devisi`, `shift`, `id_bidang`, `id_level`, `id_pendidikan`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`, `tetap`, `no_telp`, `email`, `no_rekening`, `npwp`, `cost_center`, `agama`, `record_pepelatihan`, `status_perkawinan`, `foto`, `created`, `updated`) VALUES
(1, 'Bidin', '123', 2, '10', '10', 'General', 'Pagi', 3, 2, 1, 'Kepo', 'Dermayu', '2017-03-18', '2017-03-18', 'Kepo', 'Kepo', 'Kepo@telolet.com', 'Kepo', 'Kepo', 'Kepo', 'Islam', NULL, 1, '1485098738911.png', '2016-12-05 07:20:43', '2017-03-20 07:59:18'),
(2, 'Saras ', '321', 3, '12', '12', 'ased', 'asd', 4, 4, 1, 'qweq', 'Lampung', '2017-03-18', '2017-03-18', 'weq', '123', 'qwe', '123wqe', '123qwe', 'qwe', 'Hindu', NULL, 1, '1486997830788.PNG', '2016-12-05 09:09:09', '2017-03-20 07:56:05'),
(5, 'kmprul', '12312', 3, '4', '4', 'ds1', '4235', 5, 5, 12, '14rew', '2017-03-05', '2017-03-18', '2017-03-18', 'ya', '14', '12', '12', '1141', '1', 'Islam', NULL, 1, '1483794361614.jpg', '2017-01-03 15:19:57', '2017-03-17 18:11:05'),
(14, 'q', '1231', 3, '4', '4', '4', '4', 5, 2, 11, '4', '4', '2017-03-20', '2017-03-20', '4', '4', '4@gm.com', '4', '4', '4', 'Islam', 0, 1, '1490020178825.jpg', '2017-03-20 06:47:54', '2017-03-20 14:34:59'),
(15, 'coba', '11', 3, '1', '1', 'sdm', 'daytime', 1, 3, 4, 'test', 'test', '2017-03-22', '1993-07-15', '', '123', 'a@gmail.com', '123', '123', 'y4535', 'Islam', 0, 1, '1490197659447.jpg', '2017-03-22 15:38:37', '2017-03-22 16:12:39'),
(16, 'coba12', '12', 4, '1', '1', '1', '1', 5, 5, 12, '1', '1', '2017-03-22', '2017-03-22', '1', '', '', '', '', '1', '', 0, 0, '', '2017-03-22 15:40:13', '2017-03-22 15:56:36'),
(17, 'test ing peg', '1233', 4, '1', '1', '1', '1', 5, 3, 12, '1', '1', '2017-03-24', '2017-03-24', '1', '089973221381', 'ascaliko@student.mer', '1', '1', '1', 'Islam', 0, 0, '1490364370113.jpg', '2017-03-24 14:06:10', '2017-03-24 14:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `judul_pelatihan` varchar(50) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `jumlah_peserta_realisasi` int(11) DEFAULT NULL,
  `lembaga_pelatihan` varchar(50) DEFAULT NULL,
  `pelaksanaan_awal` date DEFAULT NULL,
  `pelaksanaan_akhir` date DEFAULT NULL,
  `status_pelatihan` varchar(50) DEFAULT NULL,
  `form_pelatihan` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_pegawai`, `judul_pelatihan`, `jumlah_peserta`, `jumlah_peserta_realisasi`, `lembaga_pelatihan`, `pelaksanaan_awal`, `pelaksanaan_akhir`, `status_pelatihan`, `form_pelatihan`, `created`, `updated`) VALUES
(24, 5, 'abcdef', 1, 1, '', '2017-03-18', '2017-03-31', 'Pelatihan Sukses dan Mendapatkan Sertifikat', '1489784681641.pdf', '2017-03-17 21:03:29', '2017-03-17 21:06:23'),
(25, 14, 'IT Management Server', 2, 2, 'X Code', '2017-03-01', '2017-03-21', 'Pelatihan Sukses dan Mendapatkan Sertifikat', '1490091194219.pdf', '2017-03-21 10:09:17', '2017-03-21 10:13:57'),
(26, 15, 'tes', 2, 2, 'tes', '2017-03-01', '2017-03-31', 'Pelatihan Sukses dan Mendapatkan Sertifikat', '1490198842498.pdf', '2017-03-22 15:51:29', '2017-03-22 16:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan_peserta`
--

CREATE TABLE `pelatihan_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_pelatihan` int(11) DEFAULT NULL,
  `history_pelatihan` text,
  `id_bidang` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan_peserta`
--

INSERT INTO `pelatihan_peserta` (`id_peserta`, `id_pegawai`, `id_pelatihan`, `history_pelatihan`, `id_bidang`, `created`, `updated`) VALUES
(35, 14, 25, '', 5, '2017-03-21 10:12:11', '2017-03-21 10:12:11'),
(36, 5, 25, '', 5, '2017-03-21 10:12:22', '2017-03-21 10:12:22'),
(37, NULL, 26, NULL, NULL, NULL, NULL),
(38, 15, 26, '', 5, '2017-03-22 16:05:46', '2017-03-22 16:05:46'),
(39, 16, 26, '', 5, '2017-03-22 16:06:00', '2017-03-22 16:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan_terakhir`, `tahun_lulus`, `created`, `updated`) VALUES
(1, 'Sekolah Dasar', '2012', '2016-12-04 17:18:03', '2016-12-04 17:18:51'),
(3, 'Ahli Madya 3', '2012', '2016-12-31 09:16:37', '2016-12-31 09:16:37'),
(4, 'SMK', '', '2016-12-31 09:21:14', '2016-12-31 09:21:25'),
(5, 'SMA', '', '2016-12-31 09:21:30', '2016-12-31 09:21:30'),
(6, 'SMP', '', '2016-12-31 09:21:39', '2016-12-31 09:21:39'),
(7, 'MI', '', '2016-12-31 09:21:44', '2016-12-31 09:21:44'),
(8, 'MA', '', '2016-12-31 09:21:51', '2016-12-31 09:21:51'),
(9, 'MDA', '', '2016-12-31 09:21:56', '2016-12-31 09:21:56'),
(10, 'S1', '', '2016-12-31 09:22:03', '2016-12-31 09:22:03'),
(11, 'S2', '', '2016-12-31 09:22:07', '2016-12-31 09:22:07'),
(12, 'MTS', '', '2016-12-31 09:22:16', '2016-12-31 09:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `prosedur`
--

CREATE TABLE `prosedur` (
  `id` int(11) NOT NULL,
  `form` text,
  `tna` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id_sertifikasi` int(20) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_sertifikasi` varchar(100) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_bidang` int(20) DEFAULT NULL,
  `status_sertifikasi` varchar(100) DEFAULT NULL,
  `lembaga_sertifikasi` varchar(100) DEFAULT NULL,
  `tanggal_expaired_awal` date DEFAULT NULL,
  `tanggal_expired_akhir` date DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`id_sertifikasi`, `id_pegawai`, `nama_sertifikasi`, `id_level`, `id_bidang`, `status_sertifikasi`, `lembaga_sertifikasi`, `tanggal_expaired_awal`, `tanggal_expired_akhir`, `created`, `updated`) VALUES
(1, 5, 'abc sertfid', 4, 5, 'Tersertifikasi', 'qweqwe', '2017-03-18', '2017-03-31', '2017-01-05 20:37:47', '2017-03-17 18:04:10'),
(3, 2, 'wefw', 2, 1, 'Tersertifikasi', 'wfe', '2017-03-18', '2017-03-18', '2017-01-05 20:43:48', '2017-03-17 18:03:59'),
(4, 14, 'qwe', 3, 5, 'Tersertifikasi', '123', '2017-03-21', '2017-03-21', '2017-03-21 10:56:50', '2017-03-21 10:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `id_status` int(20) NOT NULL,
  `status_kepegawaian` varchar(25) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`id_status`, `status_kepegawaian`, `created`, `updated`) VALUES
(1, 'Icon Plus', '2016-12-31 09:15:47', '2016-12-31 09:15:47'),
(2, 'PJB', '2016-12-31 09:13:42', '2016-12-31 09:13:42'),
(3, 'PJBS', '2016-12-31 09:13:42', '2016-12-31 09:13:44'),
(4, 'PLN', '2016-12-31 09:14:17', '2016-12-31 09:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `judul_pelatihan`
--
ALTER TABLE `judul_pelatihan`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `pelatihan_peserta`
--
ALTER TABLE `pelatihan_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `prosedur`
--
ALTER TABLE `prosedur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`id_sertifikasi`);

--
-- Indexes for table `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pelatihan_peserta`
--
ALTER TABLE `pelatihan_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `prosedur`
--
ALTER TABLE `prosedur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id_sertifikasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  MODIFY `id_status` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`id_approval`) REFERENCES `judul_pelatihan` (`id_judul`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
