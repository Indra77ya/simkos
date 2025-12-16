-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 01:26 PM
-- Server version: 10.1.38-MariaDB
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
-- Database: `sikos42`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak_params`
--

CREATE TABLE `ak_params` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `value1` varchar(100) DEFAULT NULL,
  `value2` varchar(100) DEFAULT NULL,
  `value3` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_params`
--

INSERT INTO `ak_params` (`id`, `name`, `value1`, `value2`, `value3`, `description`, `created`, `modified`) VALUES
(1, 'company', 'LMI', 'lmi3.png', 'KEUANGAN', 'Nama Perusahaan', '2014-01-17 20:30:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anak_kost`
--

CREATE TABLE `anak_kost` (
  `IDANAKKOST` int(11) NOT NULL,
  `IDLOKASI` int(4) DEFAULT NULL,
  `NOIDENTITAS` varchar(50) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `JENISKELAMIN` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(50) DEFAULT NULL,
  `TGLLAHIR` date DEFAULT NULL,
  `ALAMAT_ASAL` varchar(100) DEFAULT NULL,
  `NOTELP` text,
  `EMAIL` varchar(60) DEFAULT NULL,
  `FOTO` text,
  `NAMA_PT` varchar(100) DEFAULT NULL,
  `ALAMAT_KERJA_KULIAH` varchar(200) DEFAULT NULL,
  `NOTELP_INSTANSI` varchar(20) DEFAULT NULL,
  `NAMA_PJ` varchar(50) DEFAULT NULL,
  `NOIDENTITAS_PJ` varchar(25) DEFAULT NULL,
  `NOTELP_PJ` varchar(20) DEFAULT NULL,
  `EMAIL_PJ` varchar(60) DEFAULT NULL,
  `JENISKELAMIN_PJ` varchar(15) DEFAULT NULL,
  `TEMPAT_LAHIR_PJ` varchar(50) DEFAULT NULL,
  `TGL_LAHIR_PJ` varchar(15) DEFAULT NULL,
  `ALAMAT_PJ` varchar(200) DEFAULT NULL,
  `HUBUNGAN` varchar(20) DEFAULT NULL,
  `JENIS_SEWA` varchar(20) DEFAULT 'Bulanan',
  `IMGIDENTITAS` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Cabang` varchar(50) NOT NULL,
  `NoRekening` varchar(50) NOT NULL,
  `atasNama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `Nama`, `Cabang`, `NoRekening`, `atasNama`) VALUES
(1, 'BCA', 'Ahmad Yani Surabaya ', '2582741281', 'Novendi Wirayoga');

-- --------------------------------------------------------

--
-- Table structure for table `bayar_bulanan`
--

CREATE TABLE `bayar_bulanan` (
  `idPendaftaran` varchar(20) NOT NULL,
  `idlokasi` int(4) DEFAULT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `thnbln_tagihan` varchar(20) DEFAULT NULL,
  `jmlTagihan` double NOT NULL DEFAULT '0',
  `jmlBayar` double DEFAULT '0',
  `idkamar` int(11) DEFAULT NULL,
  `namaKamar` varchar(30) NOT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `pengurangan_denda` double DEFAULT '0',
  `kwh_akhir` double DEFAULT '0',
  `tarif_per_kwh` double DEFAULT '0',
  `kwh_terpakai` double DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_bulanan_detil`
--

CREATE TABLE `bayar_bulanan_detil` (
  `idPendaftaran` varchar(20) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `thnbln_tagihan` varchar(20) DEFAULT NULL,
  `tglBayar` date NOT NULL,
  `jmlBayar` double DEFAULT '0',
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_harian_detil`
--

CREATE TABLE `bayar_harian_detil` (
  `noPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `noUrut` int(11) NOT NULL,
  `tglBayar` text NOT NULL,
  `jmlBayar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_harian_master`
--

CREATE TABLE `bayar_harian_master` (
  `noPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) DEFAULT NULL,
  `jmlHari` int(4) NOT NULL,
  `tarif` double NOT NULL,
  `jmlBayar` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `namaKamar` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_mingguan_detil`
--

CREATE TABLE `bayar_mingguan_detil` (
  `noPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `noUrut` int(11) NOT NULL,
  `tglBayar` text NOT NULL,
  `jmlBayar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_mingguan_master`
--

CREATE TABLE `bayar_mingguan_master` (
  `noPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) DEFAULT NULL,
  `jmlMinggu` int(4) NOT NULL,
  `tarif` double NOT NULL,
  `jmlBayar` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `namaKamar` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_tahunan`
--

CREATE TABLE `bayar_tahunan` (
  `idPendaftaran` varchar(20) NOT NULL,
  `idlokasi` int(4) DEFAULT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `tahun_tagihan` varchar(20) NOT NULL,
  `jmlTagihan` double NOT NULL DEFAULT '0',
  `jmlBayar` double DEFAULT '0',
  `idkamar` int(11) DEFAULT NULL,
  `namaKamar` varchar(30) NOT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `pengurangan_denda` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_tahunan_detil`
--

CREATE TABLE `bayar_tahunan_detil` (
  `idPendaftaran` varchar(20) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `tahun_tagihan` varchar(20) DEFAULT NULL,
  `tglBayar` date NOT NULL,
  `jmlBayar` double DEFAULT '0',
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_tahunan_tag_blnan`
--

CREATE TABLE `bayar_tahunan_tag_blnan` (
  `idPendaftaran` varchar(20) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `periode_tagihan` varchar(20) NOT NULL,
  `kwh_awal` double DEFAULT NULL,
  `kwh_akhir` double DEFAULT NULL,
  `tarif_per_kwh` double DEFAULT NULL,
  `kwh_terpakai` double DEFAULT NULL,
  `jmltag_listrik` double DEFAULT NULL,
  `jmltag_pdam` double DEFAULT NULL,
  `jmlBayar` double DEFAULT '0',
  `tglBayar` date NOT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya_tambahan`
--

CREATE TABLE `biaya_tambahan` (
  `id` int(5) NOT NULL,
  `jenisbiaya` varchar(100) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_tambahan`
--

INSERT INTO `biaya_tambahan` (`id`, `jenisbiaya`, `tarif`) VALUES
(1, 'Iuran Sampah & Iuran Gas Sakura Regency', 10000),
(2, 'Iuran Sampah  Ketintang Baru', 10000),
(3, 'Iuran Sampah  Karah Swk', 7000),
(4, 'Iuran Sampah  Karah Jawa Pos', 10000),
(5, 'Iuran Sampah, Galon & Gas  Gayungan VII', 20000),
(6, 'Iuran Sampah & Galon  gayungan MGN VIII', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `cekkamar`
--

CREATE TABLE `cekkamar` (
  `idKamar` int(11) NOT NULL,
  `terisi` int(2) NOT NULL,
  `last_checkout_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cekkamar`
--

INSERT INTO `cekkamar` (`idKamar`, `terisi`, `last_checkout_date`) VALUES
(1, 0, NULL),
(2, 0, NULL),
(3, 0, NULL),
(4, 0, NULL),
(5, 0, NULL),
(6, 0, NULL),
(7, 0, NULL),
(8, 0, NULL),
(9, 0, NULL),
(10, 0, NULL),
(11, 0, NULL),
(12, 0, NULL),
(13, 0, NULL),
(14, 0, NULL),
(15, 0, NULL),
(16, 0, NULL),
(17, 0, NULL),
(18, 0, NULL),
(19, 0, NULL),
(20, 0, NULL),
(21, 0, NULL),
(22, 0, NULL),
(23, 0, NULL),
(24, 0, NULL),
(25, 0, NULL),
(26, 0, NULL),
(27, 0, NULL),
(28, 0, NULL),
(29, 0, NULL),
(30, 0, NULL),
(31, 0, NULL),
(32, 0, NULL),
(33, 0, NULL),
(34, 0, NULL),
(35, 0, NULL),
(36, 0, NULL),
(37, 0, NULL),
(38, 0, NULL),
(39, 0, NULL),
(40, 0, NULL),
(41, 0, NULL),
(42, 0, NULL),
(43, 0, NULL),
(44, 0, NULL),
(45, 0, NULL),
(46, 0, NULL),
(47, 0, NULL),
(48, 0, NULL),
(49, 0, NULL),
(50, 0, NULL),
(51, 0, NULL),
(52, 0, NULL),
(53, 0, NULL),
(54, 0, NULL),
(55, 0, NULL),
(56, 0, NULL),
(57, 0, NULL),
(58, 0, NULL),
(59, 0, NULL),
(60, 0, NULL),
(61, 0, NULL),
(62, 0, NULL),
(63, 0, NULL),
(64, 0, NULL),
(65, 0, NULL),
(66, 0, NULL),
(67, 0, NULL),
(68, 0, NULL),
(69, 0, NULL),
(70, 0, NULL),
(71, 0, NULL),
(72, 0, NULL),
(73, 0, NULL),
(74, 0, NULL),
(75, 0, NULL),
(76, 0, NULL),
(77, 0, NULL),
(78, 0, NULL),
(79, 0, NULL),
(80, 0, NULL),
(81, 0, NULL),
(82, 0, NULL),
(83, 0, NULL),
(84, 0, NULL),
(85, 0, NULL),
(86, 0, NULL),
(87, 0, NULL),
(88, 0, NULL),
(89, 0, NULL),
(90, 0, NULL),
(91, 0, NULL),
(92, 0, NULL),
(93, 0, NULL),
(94, 0, NULL),
(95, 0, NULL),
(96, 0, NULL),
(97, 0, NULL),
(98, 0, NULL),
(99, 0, NULL),
(100, 0, NULL),
(101, 0, NULL),
(102, 0, NULL),
(103, 0, NULL),
(104, 0, NULL),
(105, 0, NULL),
(106, 0, NULL),
(107, 0, NULL),
(108, 0, NULL),
(109, 0, NULL),
(110, 0, NULL),
(111, 0, NULL),
(112, 0, NULL),
(113, 0, NULL),
(114, 0, NULL),
(115, 0, NULL),
(116, 0, NULL),
(117, 0, NULL),
(118, 0, NULL),
(119, 0, NULL),
(120, 0, NULL),
(121, 0, NULL),
(122, 0, NULL),
(123, 0, NULL),
(124, 0, NULL),
(125, 0, NULL),
(126, 0, NULL),
(127, 0, NULL),
(128, 0, NULL),
(129, 0, NULL),
(130, 0, NULL),
(131, 0, NULL),
(132, 0, NULL),
(133, 0, NULL),
(134, 0, NULL),
(135, 0, NULL),
(136, 0, NULL),
(137, 0, NULL),
(138, 0, NULL),
(139, 0, NULL),
(140, 0, NULL),
(141, 0, NULL),
(142, 0, NULL),
(143, 0, NULL),
(144, 0, NULL),
(145, 0, NULL),
(146, 0, NULL),
(147, 0, NULL),
(148, 0, NULL),
(149, 0, NULL),
(150, 0, NULL),
(151, 0, NULL),
(152, 0, NULL),
(153, 0, NULL),
(154, 0, NULL),
(155, 0, NULL),
(156, 0, NULL),
(157, 0, NULL),
(158, 0, NULL),
(159, 0, NULL),
(160, 0, NULL),
(161, 0, NULL),
(162, 0, NULL),
(163, 0, NULL),
(164, 0, NULL),
(165, 0, NULL),
(166, 0, NULL),
(167, 0, NULL),
(168, 0, NULL),
(169, 0, NULL),
(170, 0, NULL),
(171, 0, NULL),
(172, 0, NULL),
(173, 0, NULL),
(174, 0, NULL),
(175, 0, NULL),
(176, 0, NULL),
(177, 0, NULL),
(178, 0, NULL),
(179, 0, NULL),
(180, 0, NULL),
(181, 0, NULL),
(182, 0, NULL),
(183, 0, NULL),
(184, 0, NULL),
(185, 0, NULL),
(186, 0, NULL),
(187, 0, NULL),
(188, 0, NULL),
(189, 0, NULL),
(190, 0, NULL),
(191, 0, NULL),
(192, 0, NULL),
(193, 0, NULL),
(194, 0, NULL),
(195, 0, NULL),
(196, 0, NULL),
(197, 0, NULL),
(198, 0, NULL),
(199, 0, NULL),
(200, 0, NULL),
(201, 0, NULL),
(202, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sikos`
--

CREATE TABLE `ci_sikos` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sikos`
--

INSERT INTO `ci_sikos` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a28be81a3aa7ff97da3b13281a72bbee', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.', 1765887481, 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"nama_pemilik\";s:16:\"NOVENDI WIRAYOGA\";s:6:\"alamat\";s:23:\"Jl Sakura Regency E-2 \n\";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"company_dept\";s:18:\"KOST PUTRI GRIYOKU\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;s:4:\"auth\";O:8:\"stdClass\":12:{s:2:\"ID\";s:1:\"8\";s:8:\"IDLOKASI\";s:1:\"1\";s:8:\"USERNAME\";s:5:\"admin\";s:8:\"PASSWORD\";s:32:\"21232f297a57a5a743894a0e4a801fc3\";s:4:\"NAMA\";s:28:\"Programmer Check Jgn dihapus\";s:4:\"ROLE\";s:10:\"Superadmin\";s:4:\"FOTO\";s:16:\"profile-pic4.jpg\";s:8:\"ISACTIVE\";s:1:\"1\";s:10:\"CREATED_BY\";s:5:\"admin\";s:12:\"CREATED_DATE\";s:19:\"2022-09-02 10:10:10\";s:10:\"UPDATED_BY\";s:5:\"admin\";s:12:\"UPDATED_DATE\";s:19:\"2025-12-05 13:12:14\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sikos_penghuni`
--

CREATE TABLE `ci_sikos_penghuni` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sikos_penghuni`
--

INSERT INTO `ci_sikos_penghuni` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('039111d7612bf9ea9f0b4a4799fb758b', '103.196.9.147', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1765590860, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('069ee2e91b5da6784e9a4ca0ba16740f', '103.196.9.145', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1765619529, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('1653c066ed3ab3f3be60664d3a8a7db7', '35.247.0.221', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765815411, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"nama_pemilik\";s:16:\"NOVENDI WIRAYOGA\";s:6:\"alamat\";s:23:\"Jl Sakura Regency E-2 \n\";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"company_dept\";s:18:\"KOST PUTRI GRIYOKU\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('2dc56f06481fcb2c1dee7dc4c1f53469', '149.57.180.186', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1765706376, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('3fe8beee6d73cfaf4b33d188be998b7f', '35.204.134.146', 'Scrapy/2.13.4 (+https://scrapy.org)', 1765665099, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('45094728f6c0a4cca8bb1e61beddd96c', '103.196.9.147', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 1765590852, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('4937f426e0311aa5c92d73f6a9133d53', '34.10.70.202', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765553818, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('54957e35df99ff045460ebbaaff5fb68', '23.27.145.14', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1765706378, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('59f2554cc9a6573399d0cf44bed7e567', '34.32.146.22', 'Scrapy/2.13.4 (+https://scrapy.org)', 1765665095, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('5d58ff252c69bbb3134ac00a8622253b', '111.94.139.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 1765606613, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('5f074b3b9b95888be93c541e3eedb906', '3.238.92.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 1765650231, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('660f5ca54d1197b987a888aa86809183', '103.4.250.3', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 1765659429, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('670eb043a7a05778d36d63015f9dd8d4', '149.57.180.135', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1765713334, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('6b86eb1576e4f7f47982ca0b76cac17e', '107.172.195.171', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1765595439, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('6c27162033a458b4023db923daaf08f4', '45.126.187.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.', 1765605129, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('6de585d67aea77c3ab6d92eb2883209c', '35.202.8.58', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765791192, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('80a4ae741832412e583e68e79fbe1aa3', '104.196.102.149', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765793252, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"nama_pemilik\";s:16:\"NOVENDI WIRAYOGA\";s:6:\"alamat\";s:23:\"Jl Sakura Regency E-2 \n\";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"company_dept\";s:18:\"KOST PUTRI GRIYOKU\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('9bfe233e50e6abf1ebcde8d6c6eee474', '136.113.202.114', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765476210, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('a35be27c45c72249d6dfff0eb0414d04', '136.111.41.80', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765471233, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('aa02ce39c06453d0a98404ad7aa3e59e', '107.172.195.171', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1765595426, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('af27c34580d9b3121fda741fe8977e77', '34.73.62.14', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765725695, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('b275d229c2f2b9a71fd1850a27878d96', '167.71.12.153', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 1765684078, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('b8bc263c500631f6c18e6329bd953d82', '18.212.198.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 1765650229, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('b8be08b85c0d46a5208b6a620c77492b', '136.118.155.29', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765470084, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('be3614eaa70fb680baf2ce52f4fcb2da', '23.27.145.170', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1765711572, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('c316fe8736ca36ed98f73c6b7b924ce2', '167.71.12.153', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 1765684080, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('cfccacad9cf46ac54f27ba192aa690bc', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.', 1765887534, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"nama_pemilik\";s:16:\"NOVENDI WIRAYOGA\";s:6:\"alamat\";s:23:\"Jl Sakura Regency E-2 \n\";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"company_dept\";s:18:\"KOST PUTRI GRIYOKU\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('d16dd510ef6ac47d5faba75cdaf549c7', '103.4.250.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 1765659449, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('d2951175ac6e2cde757a99be620bf46e', '34.86.185.228', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765550867, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('d8d14aee759724873429587f91270247', '139.59.176.126', 'Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0', 1765523161, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('e3ae395c7c0de0cddc969a2bb6f08cf4', '34.9.178.140', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765815704, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"nama_pemilik\";s:16:\"NOVENDI WIRAYOGA\";s:6:\"alamat\";s:23:\"Jl Sakura Regency E-2 \n\";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"KOST PUTRI GRIYOKU\";s:12:\"company_dept\";s:18:\"KOST PUTRI GRIYOKU\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('e47c0b139a4f3465dbba0ddecf929e53', '34.73.103.48', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765549451, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('e9ff1b2bf608292b7c0a0697dc091919', '34.85.174.135', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765715933, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('f1fa4bd90bcf0c1fc3a88452ae1f1fd1', '34.56.13.219', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 1765551864, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('f20887c0eb6b14cfbd3729950c132060', '100.27.47.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 1765650232, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}'),
('f8ea705a15911815835ec4578cf51090', '139.59.176.126', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 1765523159, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";s:9:\"amsol.png\";}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";s:9:\"amsol.png\";s:8:\"1stvisit\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sewa_harian`
--

CREATE TABLE `daftar_sewa_harian` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `idKamar` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `noIdentitas` varchar(30) NOT NULL,
  `Telp` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `JK` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_asal` varchar(200) NOT NULL,
  `namaInstansi` varchar(50) NOT NULL,
  `alamatInstansi` varchar(100) NOT NULL,
  `telp_instansi` varchar(20) DEFAULT NULL,
  `tglCek_in` date NOT NULL,
  `tglCek_out` date NOT NULL,
  `lama` int(11) DEFAULT NULL,
  `checkout` int(2) NOT NULL DEFAULT '0',
  `diskon` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sewa_mingguan`
--

CREATE TABLE `daftar_sewa_mingguan` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `idKamar` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `noIdentitas` varchar(30) NOT NULL,
  `Telp` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat_asal` varchar(200) NOT NULL,
  `JK` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `namaInstansi` varchar(50) DEFAULT NULL,
  `alamatInstansi` varchar(100) DEFAULT NULL,
  `telp_instansi` varchar(20) DEFAULT NULL,
  `tglMulai` date NOT NULL,
  `lama` int(4) NOT NULL,
  `tglAkhir` date NOT NULL,
  `checkout` int(2) NOT NULL DEFAULT '0',
  `diskon` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(3) NOT NULL,
  `nominal` double DEFAULT NULL,
  `hari_ke` int(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id`, `nominal`, `hari_ke`) VALUES
(1, 50000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `denda_persen`
--

CREATE TABLE `denda_persen` (
  `id` int(3) NOT NULL,
  `range1` int(11) NOT NULL,
  `range2` int(11) NOT NULL,
  `persen` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda_persen`
--

INSERT INTO `denda_persen` (`id`, `range1`, `range2`, `persen`) VALUES
(1, 1, 10, 5),
(2, 11, 20, 10),
(3, 21, 31, 20);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_detil`
--

CREATE TABLE `deposit_detil` (
  `id` int(11) NOT NULL,
  `deposit_id` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL DEFAULT 'SETORAN' COMMENT 'SETORAN, PENARIKAN',
  `jumlah` double DEFAULT '0',
  `tglBayar` date NOT NULL,
  `deskripsi` text,
  `isFirstDepo` int(2) NOT NULL DEFAULT '0',
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit_detil`
--

INSERT INTO `deposit_detil` (`id`, `deposit_id`, `tipe`, `jumlah`, `tglBayar`, `deskripsi`, `isFirstDepo`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`, `petugas`, `created_at`) VALUES
(15, 9, 'SETORAN', 300000, '2025-03-25', 'deposit awal/setoran masuk', 1, 'tunai', NULL, '', '', '', 0, '', '', '', '', NULL, 0, NULL, 'admin', '2025-03-25 15:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_master`
--

CREATE TABLE `deposit_master` (
  `id` int(11) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `idpendaftaran` varchar(25) NOT NULL,
  `jenis_sewa` varchar(20) DEFAULT NULL,
  `setoran_awal` double DEFAULT '0',
  `jumlah_akumulasi` double DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closure_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Open' COMMENT 'Open, Close'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit_master`
--

INSERT INTO `deposit_master` (`id`, `idlokasi`, `idpendaftaran`, `jenis_sewa`, `setoran_awal`, `jumlah_akumulasi`, `created_at`, `updated_at`, `closure_date`, `status`) VALUES
(9, 1, '20240713154037', 'Bulanan', 300000, 300000, '2025-03-25 15:29:37', '2025-03-25 15:29:37', NULL, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `detildaftar`
--

CREATE TABLE `detildaftar` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `idAnakKost` varchar(30) NOT NULL,
  `idBiaya` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detildaftar_mingguan`
--

CREATE TABLE `detildaftar_mingguan` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idBiaya` int(11) NOT NULL,
  `idlokasi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detildaftar_tahunan`
--

CREATE TABLE `detildaftar_tahunan` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `idAnakKost` varchar(30) NOT NULL,
  `idBiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE `email_setting` (
  `id` int(11) NOT NULL,
  `email_host` varchar(50) NOT NULL,
  `email_port` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `email_pass` varchar(50) NOT NULL,
  `email_from` varchar(50) NOT NULL,
  `email_from_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `email_host`, `email_port`, `email_user`, `email_pass`, `email_from`, `email_from_name`) VALUES
(1, 'smtp.gmail.com', '465', 'amsol.sikos.app@gmail.com', '!Adm1n_*', 'amsol.sikos.app@gmail.com', 'Team Support kostgriyokusuroboyo.com');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_bulanan`
--

CREATE TABLE `invoice_bulanan` (
  `idPendaftaran` varchar(20) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `thnbln_tagihan` varchar(20) DEFAULT NULL,
  `jmlTagihan` double NOT NULL DEFAULT '0',
  `jmlBayar` double DEFAULT '0',
  `idkamar` int(11) DEFAULT NULL,
  `namaKamar` varchar(30) NOT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `pengurangan_denda` double DEFAULT '0',
  `kwh_akhir` double DEFAULT '0',
  `tarif_per_kwh` double DEFAULT '0',
  `kwh_terpakai` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tahunan`
--

CREATE TABLE `invoice_tahunan` (
  `idPendaftaran` varchar(20) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `thnbln_tagihan` varchar(20) DEFAULT NULL,
  `jmlTagihan` double NOT NULL DEFAULT '0',
  `jmlBayar` double DEFAULT '0',
  `idkamar` int(11) DEFAULT NULL,
  `namaKamar` varchar(30) NOT NULL,
  `denda` double NOT NULL DEFAULT '0',
  `pengurangan_denda` double DEFAULT '0',
  `kwh_akhir` double DEFAULT '0',
  `tarif_per_kwh` double DEFAULT '0',
  `kwh_terpakai` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemoption`
--

CREATE TABLE `itemoption` (
  `idCat` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `item` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemoption`
--

INSERT INTO `itemoption` (`idCat`, `idItem`, `item`) VALUES
(1, 1, 'Laki-Laki'),
(1, 2, 'Perempuan'),
(2, 2, 'Operasional Tagihan PDAM Bulanan'),
(2, 1, 'Operasional Tagihan Listrik Bulanan'),
(3, 1, 'Venny (310) - Bayar listrik'),
(3, 2, 'Titipan uang kelebihan Reddoorz'),
(3, 3, 'Pendapatan Air Galon PW Water'),
(3, 4, 'Pendapatan Karaoke'),
(3, 5, '209-Zahrah'),
(3, 6, 'laundry'),
(3, 7, 'coba income sby'),
(3, 8, 'coba jkt'),
(3, 9, 'Koperasi bulanan'),
(3, 10, 'laundri'),
(3, 11, 'sda londri'),
(2, 3, 'Operasional Pengisian Token'),
(2, 4, 'Operasional Pembelian Material Perbaikan Kost'),
(2, 5, 'Operasional Jasa Perbaikan '),
(2, 6, 'BBM Operasional Tim Kost'),
(2, 7, 'Operasional Sembako Tim Kost'),
(2, 8, 'Paket Data Bulanan HP Admin Kost'),
(2, 9, 'Gaji Staff ');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `IDKAMAR` int(11) NOT NULL,
  `IDLOKASI` int(4) DEFAULT NULL,
  `LABELKAMAR` varchar(100) NOT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `LUAS` varchar(100) DEFAULT NULL,
  `FASILITAS` text,
  `TARIFHARIAN` double NOT NULL DEFAULT '0',
  `TARIFBULANAN` double NOT NULL DEFAULT '0',
  `TARIFMINGGUAN` double NOT NULL DEFAULT '0',
  `TARIFTAHUNAN` double DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`IDKAMAR`, `IDLOKASI`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`, `TARIFTAHUNAN`) VALUES
(1, 1, 'Sakura - Double Bed - 1', 1, '3 x 4 M', 'Fasilitas Kamar :Smart tv, Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 250000, 2250000, 0, 27000000),
(2, 1, 'Sakura - Double Bed - 2', 1, '3 x 4 M', 'Fasilitas Kamar :Smart tv, Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 250000, 2250000, 0, 27000000),
(3, 1, 'Sakura - Double Bed - 3', 1, '3 x 4 M', 'Fasilitas Kamar :Smart tv, Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 250000, 2250000, 0, 27000000),
(4, 1, 'Sakura - Double Bed - 4', 1, '3 x 4 M', 'Fasilitas Kamar :Smart tv, Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 250000, 2250000, 0, 27000000),
(5, 1, 'Sakura - Single Bed AC/L - A.1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1600000, 0, 19200000),
(6, 1, 'Sakura - Single Bed AC/L - A.2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1600000, 0, 19200000),
(7, 1, 'Sakura - Single Bed AC/L - A.3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1600000, 0, 19200000),
(8, 1, 'Sakura - Single Bed AC/L - A.4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1600000, 0, 19200000),
(9, 1, 'Sakura - Single Bed AC/L - B.1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1700000, 0, 20400000),
(10, 1, 'Sakura - Single Bed AC/L - B.2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1700000, 0, 20400000),
(11, 1, 'Sakura - Single Bed AC/L - B.3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1700000, 0, 20400000),
(12, 1, 'Sakura - Single Bed AC/B - 1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1788000, 0, 21456000),
(13, 1, 'Sakura - Single Bed AC/B - 2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1788000, 0, 21456000),
(14, 1, 'Sakura - Single Bed AC/B - 3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1788000, 0, 21456000),
(15, 1, 'Sakura - Single Bed AC/B - 4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 1788000, 0, 21456000),
(16, 1, 'Sakura - Single Bed K/L - A.1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Include Listrik<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 875000, 0, 10500000),
(17, 1, 'Sakura - Single Bed K/L - A.2', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Include Listrik<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 875000, 0, 10500000),
(18, 1, 'Sakura - Single Bed K/L - A.3', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Include Listrik<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 200000, 875000, 0, 10500000),
(19, 1, 'Sakura - Single Bed K/L - B.1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Include Listrik<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 150000, 888000, 0, 10656000),
(20, 1, 'Sakura - Single Bed K/B - 1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Include Listrik<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 150000, 988000, 0, 11856000),
(21, 2, 'Ketintang - Single Bed AC&IL - 1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token Include<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 250000, 1988000, 0, 23856000),
(22, 2, 'Ketintang - Single Bed AC&TM/L - A.1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(23, 2, 'Ketintang - Single Bed AC&TM/L - A.2', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(24, 2, 'Ketintang - Single Bed AC&TM/L - A.3', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(25, 2, 'Ketintang - Single Bed AC&TM/L - A.4', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(26, 2, 'Ketintang - Single Bed AC&TM/L - A.5', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(27, 2, 'Ketintang - Single Bed AC&TM/L - A.6', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(28, 2, 'Ketintang - Single Bed AC&TM/L - A.7', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1600000, 0, 19200000),
(29, 2, 'Ketintang - Single Bed AC&TM/L - B.1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1700000, 0, 20400000),
(30, 2, 'Ketintang - Single Bed AC&TM/L - B.2', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1700000, 0, 20400000),
(31, 2, 'Ketintang - Single Bed AC&TM/L - B.3', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1700000, 0, 20400000),
(32, 2, 'Ketintang - Single Bed AC&TM/L - B.4', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1700000, 0, 20400000),
(33, 2, 'Ketintang - Single Bed AC&TM/B - 1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(34, 2, 'Ketintang - Single Bed AC&TM/B - 2', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(35, 2, 'Ketintang - Single Bed KA&IL/L - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Include <br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 950000, 0, 11400000),
(36, 2, 'Ketintang - Single Bed KA&IL/B - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Include <br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 988000, 0, 11856000),
(37, 2, 'Ketintang - Single Bed KA&TS/L - A.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(38, 2, 'Ketintang - Single Bed KA&TS/L - A.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(39, 2, 'Ketintang - Single Bed KA&TS/L - A.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(40, 2, 'Ketintang - Single Bed KA&TS/L - A.4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(41, 2, 'Ketintang - Single Bed KA&TS/L - A.5', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(42, 2, 'Ketintang - Single Bed KA&TS/L - A.6', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(43, 2, 'Ketintang - Single Bed KA&TS/L - A.7', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(44, 2, 'Ketintang - Single Bed KA&TS/L - A.8', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(45, 2, 'Ketintang - Single Bed KA&TS/L - A.9', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(46, 2, 'Ketintang - Single Bed KA&TS/L - A.10', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(47, 2, 'Ketintang - Single Bed KA&TS/L - A.11', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(48, 2, 'Ketintang - Single Bed KA&TS/L - A.12', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(49, 2, 'Ketintang - Single Bed KA&TS/L - A.13', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(50, 2, 'Ketintang - Single Bed KA&TS/L - A.14', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(51, 2, 'Ketintang - Single Bed KA&TS/L - A.15', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(52, 2, 'Ketintang - Single Bed KA&TS/L - A.16', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(53, 2, 'Ketintang - Single Bed KA&TS/L - A.17', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(54, 2, 'Ketintang - Single Bed KA&TS/L - A.18', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(55, 2, 'Ketintang - Single Bed KA&TS/L - A.19', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(56, 2, 'Ketintang - Single Bed KA&TS/L - A.20', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(57, 2, 'Ketintang - Single Bed KA&TS/L - A.21', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(58, 2, 'Ketintang - Single Bed KA&TS/L - A.22', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(59, 2, 'Ketintang - Single Bed KA&TS/L - B.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(60, 2, 'Ketintang - Single Bed KA&TS/L - B.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(61, 2, 'Ketintang - Single Bed KA&TS/L - C.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(62, 2, 'Ketintang - Single Bed KA&TS/L - C.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(63, 2, 'Ketintang - Single Bed KA&TS/L - C.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(64, 2, 'Ketintang - Single Bed KA&TS/L - C.4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(65, 2, 'Ketintang - Single Bed KA&TS/L - C.5', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(66, 2, 'Ketintang - Single Bed KA&TS/L - C.6', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(67, 2, 'Ketintang - Single Bed KA&TS/L - C.7', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(68, 2, 'Ketintang - Single Bed KA&TS/L - C.8', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(69, 2, 'Ketintang - Single Bed KA&TS/L - C.9', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(70, 2, 'Ketintang - Single Bed KA&TS/L - C.10', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(71, 2, 'Ketintang - Single Bed KA&TS/L - C.11', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(72, 2, 'Ketintang - Single Bed KA&TS/L - C.12', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(73, 2, 'Ketintang - Single Bed KA&TS/L - C.13', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(74, 2, 'Ketintang - Single Bed KA&TS/L - C.14', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(75, 2, 'Ketintang - Single Bed KA&TS/L - C.15', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(76, 2, 'Ketintang - Single Bed KA&TS/B - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(77, 2, 'Ketintang - Single Bed KA&TS/B - 2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(78, 2, 'Ketintang - Single Bed KA&TS/B - 3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(79, 2, 'Ketintang - Single Bed KAKMD&TS - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1100000, 0, 13200000),
(80, 2, 'Ketintang - Single Bed KAKMD&TS - 2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1100000, 0, 13200000),
(81, 2, 'Ketintang - Single Bed KAKMD&TS - 3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1100000, 0, 13200000),
(82, 2, 'Ketintang - Single Bed KAKMD&TS - 4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1100000, 0, 13200000),
(83, 3, 'Karah SWK - Single Bed AC&TS - 1', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1600000, 0, 19200000),
(84, 3, 'Karah SWK - Single Bed AC&TS - 2', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1600000, 0, 19200000),
(85, 3, 'Karah SWK - Single Bed AC&TS - 3', 1, '4x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1600000, 0, 19200000),
(86, 3, 'Karah SWK - Double Bed AC&TS - 1', 1, '4x4 m', 'Fasilitas Kamar :Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Luar & Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1600001, 0, 19200012),
(87, 3, 'Karah SWK - Single Bed KA,KMD&TS - A.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1100000, 0, 13200000),
(88, 3, 'Karah SWK - Single Bed KA,KMD&TS - B.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1200000, 0, 14400000),
(89, 3, 'Karah SWK - Single Bed KA,KMD&TS - C.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1250000, 0, 15000000),
(90, 3, 'Karah SWK - Single Bed KA,KMD&TS - C.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Dalam & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 1250000, 0, 15000000),
(91, 3, 'Karah SWK - Single Bed KA&IL/B - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Include <br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 988000, 0, 11856000),
(92, 3, 'Karah SWK - Single Bed KA&TS/L - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(93, 3, 'Karah SWK - Single Bed KA&TS/L - 2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(94, 3, 'Karah SWK - Single Bed KA&TS/L - 3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(95, 3, 'Karah SWK - Single Bed KA&TS/L - 4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(96, 3, 'Karah SWK - Single Bed KA&TS/L - A.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(97, 3, 'Karah SWK - Single Bed KA&TS/L - A.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(98, 3, 'Karah SWK - Single Bed KA&TS/L - A.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(99, 3, 'Karah SWK - Single Bed KA&TS/L - B.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 825000, 0, 9900000),
(100, 3, 'Karah SWK - Single Bed KA&TS/L - C1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(101, 3, 'Karah SWK - Single Bed KA&TS/L - D.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(102, 3, 'Karah SWK - Single Bed KA&TS/L - D.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(103, 3, 'Karah SWK - Single Bed KA&TS/L - D.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(104, 3, 'Karah SWK - Single Bed KA&TS/L - D.4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(105, 3, 'Karah SWK - Single Bed KA&TS/L - D.5', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(106, 3, 'Karah SWK - Single Bed KA&TS/L - D.6', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(107, 3, 'Karah SWK - Single Bed KA&TS/L - D.7', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(108, 3, 'Karah SWK - Single Bed KA&TS/L - D.8', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(109, 3, 'Karah SWK - Single Bed KA&TS/L - D.9', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(110, 3, 'Karah SWK - Single Bed KA&TS/L - D.10', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(111, 3, 'Karah SWK - Single Bed KA&TS/L - D.11', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 700000, 0, 8400000),
(112, 4, 'Karah JP - Single Bed KA&IL/L - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Include <br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 825000, 0, 9900000),
(113, 4, 'Karah JP - Single Bed KA&TS/B - 1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(114, 4, 'Karah JP - Single Bed KA&TS/B - 2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(115, 4, 'Karah JP - Single Bed KA&TS/B - 3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(116, 4, 'Karah JP - Single Bed KA&TS/B - 4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 888000, 0, 10656000),
(117, 4, 'Karah JP - Single Bed KA&TS/L - A.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(118, 4, 'Karah JP - Single Bed KA&TS/L - A.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(119, 4, 'Karah JP - Single Bed KA&TS/L - A.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 875000, 0, 10500000),
(120, 4, 'Karah JP - Single Bed KA&TS/L - B.1', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(121, 4, 'Karah JP - Single Bed KA&TS/L - B.2', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(122, 4, 'Karah JP - Single Bed KA&TS/L - B.3', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(123, 4, 'Karah JP - Single Bed KA&TS/L - B.4', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(124, 4, 'Karah JP - Single Bed KA&TS/L - B.5', 1, '3x4 m', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 0, 775000, 0, 9300000),
(125, 5, 'Gayungan VII - Single Bed AC - 1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(126, 5, 'Gayungan VII - Single Bed AC - 2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(127, 5, 'Gayungan VII - Single Bed AC - 3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(128, 5, 'Gayungan VII - Single Bed AC - 4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(129, 5, 'Gayungan VII - Single Bed AC - 5', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(130, 5, 'Gayungan VII - Single Bed AC - 6', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(131, 5, 'Gayungan VII - Single Bed AC - 7', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(132, 5, 'Gayungan VII - Single Bed AC - 8', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(133, 5, 'Gayungan VII - Single Bed AC - 9', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(134, 5, 'Gayungan VII - Single Bed AC - 10', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(135, 5, 'Gayungan VII - Single Bed AC - 11', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(136, 5, 'Gayungan VII - Single Bed AC - 12', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(137, 5, 'Gayungan VII - Single Bed AC - 13', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(138, 5, 'Gayungan VII - Single Bed AC - 14', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(139, 5, 'Gayungan VII - Single Bed AC - 15', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(140, 5, 'Gayungan VII - Single Bed AC - 16', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(141, 5, 'Gayungan VII - Single Bed AC - 17', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(142, 5, 'Gayungan VII - Single Bed AC - 18', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1788000, 0, 21456000),
(143, 5, 'Gayungan VII - Single Bed KA & TS/L - 1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(144, 5, 'Gayungan VII - Single Bed KA & TS/L - 2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(145, 5, 'Gayungan VII - Single Bed KA & TS/L - 3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(146, 5, 'Gayungan VII - Single Bed KA & TS/L - 4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(147, 5, 'Gayungan VII - Single Bed KA & TS/L - 5', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(148, 5, 'Gayungan VII - Single Bed KA & TS/L - 6', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(149, 5, 'Gayungan VII - Single Bed KA & TS/L - 7', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(150, 5, 'Gayungan VII - Single Bed KA & TS/L - 8', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(151, 5, 'Gayungan VII - Single Bed KA & TS/L - 9', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(152, 5, 'Gayungan VII - Single Bed KA & TS/L - 10', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(153, 5, 'Gayungan VII - Single Bed KA & TS/L - 11', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(154, 5, 'Gayungan VII - Single Bed KA & TS/L - 12', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(155, 5, 'Gayungan VII - Single Bed KA & TS/L - 13', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(156, 5, 'Gayungan VII - Single Bed KA & TS/L - 14', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000);
INSERT INTO `kamar` (`IDKAMAR`, `IDLOKASI`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`, `TARIFTAHUNAN`) VALUES
(157, 5, 'Gayungan VII - Single Bed KA & TS/L - 15', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(158, 5, 'Gayungan VII - Single Bed KA & TS/L - 16', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(159, 5, 'Gayungan VII - Single Bed KA & TS/L - 17', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(160, 5, 'Gayungan VII - Single Bed KA & TS/L - 18', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(161, 5, 'Gayungan VII - Single Bed KA & TS/L - 19', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(162, 5, 'Gayungan VII - Single Bed KA & TS/L - 20', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(163, 5, 'Gayungan VII - Single Bed KA & TS/L - 21', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(164, 5, 'Gayungan VII - Single Bed KA & TS/L - 22', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 875000, 0, 10500000),
(165, 5, 'Gayungan VII - Single Bed KA & TS/B -1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(166, 5, 'Gayungan VII - Single Bed KA & TS/B -2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(167, 5, 'Gayungan VII - Single Bed KA & TS/B -3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(168, 5, 'Gayungan VII - Single Bed KA & TS/B -4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(169, 6, 'Gayungan MGN - Single Bed AC - 1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(170, 6, 'Gayungan MGN - Single Bed AC - 2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(171, 6, 'Gayungan MGN - Single Bed AC - 3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(172, 6, 'Gayungan MGN - Single Bed AC - 4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(173, 6, 'Gayungan MGN - Single Bed AC - 5', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(174, 6, 'Gayungan MGN - Single Bed AC - 6', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(175, 6, 'Gayungan MGN - Single Bed AC - 7', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(176, 6, 'Gayungan MGN - Single Bed AC - 8', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(177, 6, 'Gayungan MGN - Single Bed AC - 9', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(178, 6, 'Gayungan MGN - Single Bed AC - 10', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(179, 6, 'Gayungan MGN - Single Bed AC - 11', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(180, 6, 'Gayungan MGN - Single Bed AC - 12', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(181, 6, 'Gayungan MGN - Single Bed AC - 13', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(182, 6, 'Gayungan MGN - Single Bed AC - 14', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(183, 6, 'Gayungan MGN - Single Bed AC - 15', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(184, 6, 'Gayungan MGN - Single Bed AC - 16', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(185, 6, 'Gayungan MGN - Single Bed AC - 17', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(186, 6, 'Gayungan MGN - Single Bed AC - 18', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(187, 6, 'Gayungan MGN - Single Bed AC - 19', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower) & Token listrik Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor', 200000, 1588000, 0, 19056000),
(188, 6, 'Gayungan MGN - Single Bed KA & TS/B - 1', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(189, 6, 'Gayungan MGN - Single Bed KA & TS/B - 2', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(190, 6, 'Gayungan MGN - Single Bed KA & TS/B - 3', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(191, 6, 'Gayungan MGN - Single Bed KA & TS/B - 4', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(192, 6, 'Gayungan MGN - Single Bed KA & TS/B - 5', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(193, 6, 'Gayungan MGN - Single Bed KA & TS/B - 6', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(194, 6, 'Gayungan MGN - Single Bed KA & TS/B - 7', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(195, 6, 'Gayungan MGN - Single Bed KA & TS/B - 8', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(196, 6, 'Gayungan MGN - Single Bed KA & TS/B - 9', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(197, 6, 'Gayungan MGN - Single Bed KA & TS/B - 10', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(198, 6, 'Gayungan MGN - Single Bed KA & TS/B - 11', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(199, 6, 'Gayungan MGN - Single Bed KA & TS/B - 12', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(200, 6, 'Gayungan MGN - Single Bed KA & TS/B - 13', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(201, 6, 'Gayungan MGN - Single Bed KA & TS/B - 14', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000),
(202, 6, 'Gayungan MGN - Single Bed KA & TS/B - 15', 1, '3 x 4 M', 'Fasilitas Kamar :One Bed, Lemari, Meja Kursi Rias, Kipas Angin, Kamar Mandi Luar & Listrik Token Sendiri<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Kulkas Bersama, Tempat Jemur Pakaian, parkir Motor', 150000, 888000, 0, 10656000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `ket`) VALUES
(1, 'Jenis Kelamin', 'Untuk Option List jenis kelamin'),
(2, 'Jenis Pengeluaran Rutin', 'Untuk Option List Biaya-biaya Pengeluaran Rutin'),
(3, 'Pemasukan Rutin', 'Untuk Option List Pemasukan Rutin');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` int(11) NOT NULL,
  `jenis_sewa` varchar(30) DEFAULT NULL,
  `jenis_bayar` varchar(30) DEFAULT NULL,
  `periode_tagihan` varchar(8) DEFAULT NULL,
  `idPendaftaran` varchar(20) DEFAULT NULL,
  `idlokasi` int(4) DEFAULT NULL,
  `tglBayar` date DEFAULT NULL,
  `jmlBayar` double DEFAULT '0',
  `bukti` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `status_cek` int(2) DEFAULT '0',
  `metode_bayar` varchar(50) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `dari_bank` varchar(50) DEFAULT NULL,
  `norek_pengirim` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `idrek_penerima` int(11) DEFAULT NULL,
  `jenis_kartu` varchar(50) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `nmpemilik_kartu` varchar(100) DEFAULT NULL,
  `no_struk` varchar(100) DEFAULT NULL,
  `tgl_struk` date DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuitansi_var`
--

CREATE TABLE `kuitansi_var` (
  `id` int(3) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `notes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuitansi_var`
--

INSERT INTO `kuitansi_var` (`id`, `nama_kota`, `notes`) VALUES
(1, '', 'Demi kenyamanan bersama, <b>ASRAMA ANNISA</b> menerapkan <b>tata tertib</b> yang harus dihormati oleh penghuni maupun pengunjung, yaitu:\r\n<br>\r\n<ol><li>Menjaga ketenangan dan kenyaman bersama dengan tidak membuat kegaduhan dan saling menghormati penghuni kost yang lain\r\n</li>\r\n\r\n<li> Menjaga kebersihan dan kenyamanan bersama dengan membersihkan dan merapikan kembali setelah menggunakan fasilitas bersama di dalam kost\r\n</li>\r\n<li> Tidak menggunakan tempat kost untuk melakukan hal-hal yang bertentangan dengan hukum dan norma-norma yang berlaku di masyarakat umum\r\n</li>\r\n<li> Menggunakan dan menjaga inventaris kost dengan baik dan tidak melakukan perubahan rumah kost (contohnya memaku tembok, mencoret-coret tembok dan furnitur)\r\n</li>\r\n<li> Pengunjung pria hanya diperbolehkan ditemui di ruang tamu\r\n</li>\r\n<li>Jam berkunjung maksimal pukul. 22.00.\r\n</li>\r\n<li>Parkirlah kendaraan Anda dengan rapi dan berada di dalam area kost sehingga tidak menganggu pengguna jalan yang lain.\r\n</li>\r\n<li>Dilarang merokok di dalam rumah kost demi kesehatan bersama. Merokok diperbolehkan di luar rumah kost (area terbuka).\r\n</li>\r\n<li> Tidak menyimpan barang-barang berbahaya (senjata api, bahan mudah terbakar) dan barang-barang yang dilarang (narkoba, miras).\r\n</li>\r\n<li> Menghemat pemakaian air, listrik, dan gas demi lingkungan yang lebih baik (Letâ€™s go Green!)\r\n </li>\r\n</ol>\r\n<b>BATAS WAKTU PEMBAYARAN</b>\r\n<br/>\r\nBatas toleransi waktu pembayaran kost dilakukan paling lambat 5 hari setelah jatuh tempo. Apabila melebihi batas toleransi maka di hari ke 6 denda akan keluar sebesar Rp. 5.000,-/harinya. Pembayaran dapat dilakukan melalui transfer dengan menyertakan informasi tentang nama penghuni/nomor kamar dan periode pembayaran.\r\n <br/>\r\n<b>TERMINASI/PENGHENTIAN KONTRAK</b>\r\n<br/>\r\nApabila penghuni ingin menghentikan kontrak, maka pemberitahuan tentang terminasi ke pengelola kost harus dilakukan minimal 1 bulan sebelum tanggal terminasi. Terminasi juga dapat dilakukan oleh pengelola kost apabila penghuni melanggar tata tertib dan atau menunda pembayaran tanpa persetujuan pengelola kost.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kuitansi_variable`
--

CREATE TABLE `kuitansi_variable` (
  `id` int(3) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `notes` text,
  `notes2` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuitansi_variable`
--

INSERT INTO `kuitansi_variable` (`id`, `nama_kota`, `notes`, `notes2`) VALUES
(1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kwh_var`
--

CREATE TABLE `kwh_var` (
  `id` int(3) NOT NULL,
  `kwh_tdk_kena_tarif` int(10) DEFAULT NULL,
  `kwh_tarif` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwh_var`
--

INSERT INTO `kwh_var` (`id`, `kwh_tdk_kena_tarif`, `kwh_tarif`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_penghuni`
--

CREATE TABLE `login_penghuni` (
  `ID` int(11) NOT NULL,
  `IDLOKASI` int(4) DEFAULT NULL,
  `IDPENDAFTARAN` varchar(20) DEFAULT NULL,
  `IDANAKKOST` int(11) DEFAULT NULL,
  `JENIS_SEWA` varchar(20) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `FOTO` varchar(30) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT 'penghuni',
  `ISACTIVE` varchar(10) DEFAULT '1',
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(4) NOT NULL,
  `kode_kost` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_pengurus` varchar(100) DEFAULT NULL,
  `nama_asisten1` varchar(100) DEFAULT NULL,
  `nama_asisten2` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `pbb` varchar(100) DEFAULT NULL,
  `status_tanah` varchar(100) DEFAULT NULL,
  `isactive` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode_kost`, `lokasi`, `alamat`, `nama_pengurus`, `nama_asisten1`, `nama_asisten2`, `telp`, `hp`, `pbb`, `status_tanah`, `isactive`) VALUES
(1, 'Sakura Regency', 'Kost Putri Griyoku Sakura', 'Jl Sakura Regency E-2 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Ketintang Baru', 'Kost Putri Griyoku Ketintang Baru', 'Jl Ketintang Baru XVII No20/B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Karah Putri', 'Kost Putri Griyoku Karah SWK', 'Jl Kebon Agung no 2-4 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Karah Jawa Pos', 'Kost Putri Griyoku Karah Jawa Pos', 'Jl jambangan Baru No 1 D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'Gayungan VII', 'Kost Putri Gayungan VII', 'Jl Gayungan VII No 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Gayungsari Timur VIII', 'Kos Putri Griyoku Gayungan MGN', 'Jl Gayungsari Timur VIII MGN-14 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_pemilik` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `alamat_usaha` text NOT NULL,
  `telp_tempat_usaha` varchar(40) NOT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `nama`, `nama_pemilik`, `alamat`, `telepon`, `hp`, `alamat_usaha`, `telp_tempat_usaha`, `logo`) VALUES
(1, 'KOST PUTRI GRIYOKU', 'NOVENDI WIRAYOGA', 'Jl Sakura Regency E-2 \n', '087864398924', '081335146034', 'Jl Sakura Regency E-2 ', '087864398924', 'amsol.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `idTrans` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_rutin`
--

CREATE TABLE `pemasukan_rutin` (
  `idTrans` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `iditem` int(11) DEFAULT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `uraian` text,
  `besar` double NOT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `IDPENDAFTARAN` varchar(20) NOT NULL,
  `IDLOKASI` int(4) NOT NULL,
  `IDANAKKOST` varchar(50) NOT NULL,
  `IDKAMAR` varchar(50) NOT NULL,
  `TGLDAFTAR` date DEFAULT NULL,
  `tglMulai` date DEFAULT NULL,
  `checkout` int(2) NOT NULL DEFAULT '0',
  `diskon` double NOT NULL DEFAULT '0',
  `kwh_awal` double DEFAULT '0',
  `deposit` double DEFAULT '0',
  `tgl_checkout` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_tahunan`
--

CREATE TABLE `pendaftaran_tahunan` (
  `IDPENDAFTARAN` varchar(20) NOT NULL,
  `IDLOKASI` int(4) NOT NULL,
  `IDANAKKOST` varchar(50) NOT NULL,
  `IDKAMAR` varchar(50) NOT NULL,
  `TGLDAFTAR` date DEFAULT NULL,
  `thn_mulai` varchar(4) DEFAULT NULL,
  `checkout` int(2) NOT NULL DEFAULT '0',
  `diskon` double NOT NULL DEFAULT '0',
  `kwh_awal` double DEFAULT '0',
  `deposit` double DEFAULT '0',
  `tgl_checkout` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_ins`
--

CREATE TABLE `pengeluaran_ins` (
  `idTrans` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_rutin`
--

CREATE TABLE `pengeluaran_rutin` (
  `idTrans` varchar(30) NOT NULL,
  `idlokasi` int(4) NOT NULL,
  `tglBayar` date NOT NULL,
  `idItemBayar` int(11) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID` int(10) NOT NULL,
  `IDLOKASI` int(4) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `ROLE` varchar(25) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `ISACTIVE` varchar(10) DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID`, `IDLOKASI`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
(9, 1, 'operator', '21232f297a57a5a743894a0e4a801fc3', 'Jinani Qoumy', 'Operator', NULL, '1', 'admin', '2019-02-06 15:47:07', 'admin', '2022-11-21 15:30:46'),
(8, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Programmer Check Jgn dihapus', 'Superadmin', 'profile-pic4.jpg', '1', 'admin', '2022-09-02 10:10:10', 'admin', '2025-12-05 13:12:14'),
(7, 1, 'admin_lokasi', '21232f297a57a5a743894a0e4a801fc3', 'Admin Lokasi 1', 'Admin', 'photo_2018-11-16_15-52-23.jpg', '1', 'admin', '2018-11-16 08:57:22', 'admin', '2022-11-21 15:31:11'),
(10, 1, 'iwans', '4474c282f445f2c36319113b20d52482', 'iwan setiawan', 'Superadmin', 'foto.jpg', '1', 'admin', '2022-10-20 16:42:43', 'admin', '2023-12-13 10:39:37'),
(12, 1, 'Operator-Coliving', 'a103e55e6eb8b3d1fcaf5c5dd1e2adf9', 'Adrian', 'Operator', 'NicePng_bayley-png_1748863.png', '1', 'admin', '2022-11-18 16:37:47', 'admin', '2022-12-05 09:21:05'),
(13, 1, 'Admin - Coliving', '202cb962ac59075b964b07152d234b70', 'Admin Studio 7', 'Admin', '17074986.jpg', '1', 'admin', '2022-11-02 11:17:53', 'admin', '2023-07-05 09:45:03'),
(14, 1, 'wenny', '4474c282f445f2c36319113b20d52482', 'Wenny', 'Admin', NULL, '1', 'admin', '2023-01-30 15:05:14', 'admin', '2024-03-28 18:52:55'),
(15, 1, 'kimhoa', '4474c282f445f2c36319113b20d52482', 'Kim Hoa', 'Superadmin', NULL, '1', 'admin', '2023-07-05 09:46:22', 'admin', '2023-07-05 10:56:44'),
(16, 1, 'hpy', '4474c282f445f2c36319113b20d52482', 'HPY', 'Superadmin', NULL, '1', 'admin', '2023-09-11 14:10:22', 'admin', '2023-09-11 17:14:11'),
(17, 1, 'Operator2-Coliving', 'a103e55e6eb8b3d1fcaf5c5dd1e2adf9', 'Mia Amalia', 'Operator', NULL, '1', 'admin', '2023-09-19 09:00:25', 'admin', '2023-09-19 09:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kritik`
--

CREATE TABLE `pesan_kritik` (
  `id` int(11) NOT NULL,
  `id_anak_kost` int(11) DEFAULT NULL,
  `id_pendaftaran` varchar(20) DEFAULT NULL,
  `jenis_sewa` varchar(20) DEFAULT NULL,
  `waktu_post` datetime DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `isi` text,
  `isactive` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ak_params`
--
ALTER TABLE `ak_params`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `anak_kost`
--
ALTER TABLE `anak_kost`
  ADD PRIMARY KEY (`IDANAKKOST`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayar_bulanan`
--
ALTER TABLE `bayar_bulanan`
  ADD PRIMARY KEY (`idPendaftaran`,`pembayaran_ke`);

--
-- Indexes for table `bayar_bulanan_detil`
--
ALTER TABLE `bayar_bulanan_detil`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`pembayaran_ke`,`no_urut`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `bayar_harian_detil`
--
ALTER TABLE `bayar_harian_detil`
  ADD PRIMARY KEY (`noPendaftaran`,`idlokasi`,`noUrut`),
  ADD KEY `nourut_hr` (`noUrut`);

--
-- Indexes for table `bayar_harian_master`
--
ALTER TABLE `bayar_harian_master`
  ADD PRIMARY KEY (`noPendaftaran`);

--
-- Indexes for table `bayar_mingguan_detil`
--
ALTER TABLE `bayar_mingguan_detil`
  ADD PRIMARY KEY (`noPendaftaran`,`idlokasi`,`noUrut`),
  ADD KEY `nourut_mgg` (`noUrut`);

--
-- Indexes for table `bayar_mingguan_master`
--
ALTER TABLE `bayar_mingguan_master`
  ADD PRIMARY KEY (`noPendaftaran`);

--
-- Indexes for table `bayar_tahunan`
--
ALTER TABLE `bayar_tahunan`
  ADD PRIMARY KEY (`idPendaftaran`,`tahun_tagihan`);

--
-- Indexes for table `bayar_tahunan_detil`
--
ALTER TABLE `bayar_tahunan_detil`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`pembayaran_ke`,`no_urut`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `bayar_tahunan_tag_blnan`
--
ALTER TABLE `bayar_tahunan_tag_blnan`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`no_urut`,`periode_tagihan`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `biaya_tambahan`
--
ALTER TABLE `biaya_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cekkamar`
--
ALTER TABLE `cekkamar`
  ADD PRIMARY KEY (`idKamar`);

--
-- Indexes for table `ci_sikos`
--
ALTER TABLE `ci_sikos`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `ci_sikos_penghuni`
--
ALTER TABLE `ci_sikos_penghuni`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `daftar_sewa_harian`
--
ALTER TABLE `daftar_sewa_harian`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`idKamar`);

--
-- Indexes for table `daftar_sewa_mingguan`
--
ALTER TABLE `daftar_sewa_mingguan`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denda_persen`
--
ALTER TABLE `denda_persen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_detil`
--
ALTER TABLE `deposit_detil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposit_id` (`deposit_id`);

--
-- Indexes for table `deposit_master`
--
ALTER TABLE `deposit_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detildaftar`
--
ALTER TABLE `detildaftar`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`idAnakKost`,`idBiaya`);

--
-- Indexes for table `detildaftar_mingguan`
--
ALTER TABLE `detildaftar_mingguan`
  ADD PRIMARY KEY (`idPendaftaran`,`idBiaya`,`idlokasi`);

--
-- Indexes for table `detildaftar_tahunan`
--
ALTER TABLE `detildaftar_tahunan`
  ADD PRIMARY KEY (`idPendaftaran`,`idlokasi`,`idAnakKost`,`idBiaya`);

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemoption`
--
ALTER TABLE `itemoption`
  ADD PRIMARY KEY (`idCat`,`idItem`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`IDKAMAR`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuitansi_var`
--
ALTER TABLE `kuitansi_var`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuitansi_variable`
--
ALTER TABLE `kuitansi_variable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kwh_var`
--
ALTER TABLE `kwh_var`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_penghuni`
--
ALTER TABLE `login_penghuni`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`idTrans`,`idlokasi`);

--
-- Indexes for table `pemasukan_rutin`
--
ALTER TABLE `pemasukan_rutin`
  ADD PRIMARY KEY (`idTrans`,`idlokasi`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`IDPENDAFTARAN`,`IDLOKASI`),
  ADD KEY `FK_CATAT_KAMAR_` (`IDKAMAR`),
  ADD KEY `FK_MENDAFTAR` (`IDANAKKOST`);

--
-- Indexes for table `pendaftaran_tahunan`
--
ALTER TABLE `pendaftaran_tahunan`
  ADD PRIMARY KEY (`IDPENDAFTARAN`,`IDLOKASI`);

--
-- Indexes for table `pengeluaran_ins`
--
ALTER TABLE `pengeluaran_ins`
  ADD PRIMARY KEY (`idTrans`,`idlokasi`);

--
-- Indexes for table `pengeluaran_rutin`
--
ALTER TABLE `pengeluaran_rutin`
  ADD PRIMARY KEY (`idTrans`,`idlokasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pesan_kritik`
--
ALTER TABLE `pesan_kritik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_kost`
--
ALTER TABLE `anak_kost`
  MODIFY `IDANAKKOST` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayar_bulanan_detil`
--
ALTER TABLE `bayar_bulanan_detil`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `bayar_harian_detil`
--
ALTER TABLE `bayar_harian_detil`
  MODIFY `noUrut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `bayar_mingguan_detil`
--
ALTER TABLE `bayar_mingguan_detil`
  MODIFY `noUrut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bayar_tahunan_detil`
--
ALTER TABLE `bayar_tahunan_detil`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bayar_tahunan_tag_blnan`
--
ALTER TABLE `bayar_tahunan_tag_blnan`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biaya_tambahan`
--
ALTER TABLE `biaya_tambahan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit_detil`
--
ALTER TABLE `deposit_detil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deposit_master`
--
ALTER TABLE `deposit_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemoption`
--
ALTER TABLE `itemoption`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `IDKAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_penghuni`
--
ALTER TABLE `login_penghuni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesan_kritik`
--
ALTER TABLE `pesan_kritik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposit_detil`
--
ALTER TABLE `deposit_detil`
  ADD CONSTRAINT `deposit_detil_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposit_master` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
