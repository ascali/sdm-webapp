-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2017 at 12:27 AM
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
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '2017-03-01 16:26:01', '2017-03-01 16:26:01'),
(6, 1, 'staff', 'de9bf5643eabf80f4a56fda3bbb84483', 'Staff', '2017-03-01 16:26:34', '2017-03-01 16:26:34'),
(7, 2, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'Staff', '2017-03-01 16:34:40', '2017-03-01 16:34:40'),
(11, 5, 'kmprul', '28371a2748e248f6efb78b3c53c8803c', 'Operator Pegawai', '2017-03-01 16:35:16', '2017-03-01 16:35:16'),
(19, 1, 'bidin', '7834b9a2086ab8c8fcb99c97573455e3', 'Operator Pelatihan', '2017-03-01 16:36:18', '2017-03-01 16:36:18');

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
(13, 2, '6', 'hkjb', '2', 'kjbkjb', '2017-01-14 16:03:45', '2017-01-14 16:03:45');

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
(1, 5, 17, NULL, 'Pelatihan', '2017-01-05 20:06:49', '2017-01-05 20:06:49'),
(2, 1, 18, NULL, 'Pelatihan', '2017-01-06 15:04:59', '2017-01-06 15:04:59'),
(3, 5, NULL, 1, 'Sertifikasi', '2017-01-05 20:37:47', '2017-01-05 20:37:47'),
(4, 2, NULL, 3, 'Sertifikasi', '2017-01-05 20:43:48', '2017-01-05 20:43:48'),
(6, 1, 19, NULL, 'Pelatihan', '2017-01-15 06:04:30', '2017-01-15 06:04:30'),
(7, 2, 22, NULL, 'Pelatihan', '2017-01-15 06:17:09', '2017-01-15 06:17:09'),
(8, 2, 23, NULL, 'Pelatihan', '2017-02-09 16:12:00', '2017-02-09 16:12:00');

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
(1, '1', 'Istri', 'Sarkemini', 'Tegal', '12-12-1992', '2016-12-05 04:44:11', '2017-01-01 14:44:12'),
(5, '2', 'Suami', 'hdfddf', 'gqdsfdfs', '12-12-12222', '2016-12-31 22:16:54', '2017-01-03 14:45:22'),
(6, '8', 'Istri', 'kjhlkh', 'LKHN;LK', '21', '2017-01-06 15:08:06', '2017-01-06 15:08:06');

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
(5, 'Office Boy / Girl', '2016-12-05 07:50:55', '2016-12-05 07:50:55');

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
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `tetap` varchar(15) NOT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `cost_center` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `record_pepelatihan` int(11) DEFAULT NULL,
  `foto` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nid`, `id_status`, `grade`, `skala`, `devisi`, `shift`, `id_bidang`, `id_level`, `id_pendidikan`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`, `tetap`, `no_telp`, `email`, `no_rekening`, `npwp`, `cost_center`, `agama`, `record_pepelatihan`, `foto`, `created`, `updated`) VALUES
(1, 'Bidin', '123', 1, '10', '10', 'General', 'Pagi', 3, 2, 1, 'Kepo', 'Dermayu', '12-12-1991', 'Kepo', 'Kepo', 'Kepo', 'Kepo@telolet.com', 'Kepo', 'Kepo', 'Kepo', 'Islam', NULL, '1485098738911.png', '2016-12-05 07:20:43', '2017-01-22 15:25:38'),
(2, 'Saras ', '321', 2, '12', '12', 'ased', 'asd', 4, 4, 1, 'qweq', 'Lampung', '12-10-1883', '123', 'weq', '123', 'qwe', '123wqe', '123qwe', 'qwe', 'Hindu', NULL, '1486997830788.PNG', '2016-12-05 09:09:09', '2017-02-13 14:57:10'),
(5, 'kmprul', '12312', 3, '4', '4', 'ds1', '4235', 5, 5, 12, '14rew', '12', '12', '12-12-1222', '', '14', '12', '12', '1141', '', 'Islam', NULL, '1483794361614.jpg', '2017-01-03 15:19:57', '2017-01-07 13:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `judul_pelatihan` varchar(255) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `jumlah_peserta_realisasi` int(11) DEFAULT NULL,
  `lembaga_pelatihan` varchar(100) DEFAULT NULL,
  `pelaksanaan_awal` date DEFAULT NULL,
  `pelaksanaan_akhir` date DEFAULT NULL,
  `status_pelatihan` varchar(30) DEFAULT NULL,
  `form_pelatihan` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_pegawai`, `judul_pelatihan`, `jumlah_peserta`, `jumlah_peserta_realisasi`, `lembaga_pelatihan`, `pelaksanaan_awal`, `pelaksanaan_akhir`, `status_pelatihan`, `form_pelatihan`, `created`, `updated`) VALUES
(17, 5, 'tes kmprul', 3, 1, 'Tes Pte Ltd', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1483646823512.pdf', '2017-01-05 20:05:59', '2017-01-05 20:08:53'),
(18, 1, 'Latihan ABC', 3, 1, 'tes', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1483715143720.pdf', '2017-01-06 15:04:14', '2017-01-06 15:06:29'),
(19, 1, 'sad', 2, 1, 'dsf', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1483715143720.pdf', '2017-01-06 15:09:59', '2017-01-15 06:04:30'),
(21, 2, '123qwe', 1, 1, 'sad', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1484458770566.pdf', '2017-01-15 05:38:26', '2017-01-15 06:03:07'),
(22, 2, 'ds', 1, 1, 'ds', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1484460942139.pdf', '2017-01-15 06:14:27', '2017-01-15 06:17:09'),
(23, 2, 'tes', 2, 1, 'testing lembaga abc', '0000-00-00', '0000-00-00', 'Pelatihan Sukses dan Mendapatk', '1486656651456.pdf', '2017-02-09 16:09:26', '2017-02-09 16:12:00');

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
(22, 5, 17, 'tidak ada', 3, '2017-01-05 20:06:49', '2017-01-05 20:06:49'),
(24, 8, 18, 'tes abc latihan', 5, '2017-01-06 15:04:59', '2017-01-06 15:04:59'),
(25, 8, 21, NULL, NULL, NULL, NULL),
(26, 2, 21, '', 3, '2017-01-15 05:39:10', '2017-01-15 05:39:10'),
(27, 1, 19, NULL, NULL, NULL, NULL),
(28, NULL, 22, NULL, NULL, NULL, NULL),
(29, 2, 22, 'ds', 4, '2017-01-15 06:15:16', '2017-01-15 06:15:16'),
(30, NULL, 23, NULL, NULL, NULL, NULL),
(31, 2, 23, 'gk ada', 5, '2017-02-09 16:10:27', '2017-02-09 16:10:27');

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
(1, 5, 'abc sertfid', 4, 5, 'Tersertifikasi', 'qweqwe', '0000-00-00', '0000-00-00', '2017-01-05 20:37:47', '2017-01-05 20:43:02'),
(3, 2, 'wefw', 2, 1, 'Tersertifikasi', 'wfe', '0000-00-00', '0000-00-00', '2017-01-05 20:43:48', '2017-01-05 20:43:48');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pelatihan_peserta`
--
ALTER TABLE `pelatihan_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
  MODIFY `id_sertifikasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
