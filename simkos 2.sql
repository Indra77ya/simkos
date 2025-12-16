-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 04:14 AM
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
(1, 0, NULL);

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
('ecdf116b8f115c8e9e57d08da0e154e6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 1764989628, 'a:8:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";N;}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";N;s:8:\"1stvisit\";b:1;s:8:\"flashmsg\";s:76:\"Anda tidak memiliki hak untuk mengakses.<br />Silakan login terlebih dahulu.\";s:9:\"flashtype\";s:6:\"danger\";}'),
('eccb4244db0630fabaef4049320c96b9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 1764990472, 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";N;}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";N;s:8:\"1stvisit\";b:1;s:4:\"auth\";O:8:\"stdClass\":12:{s:2:\"ID\";s:1:\"8\";s:8:\"IDLOKASI\";s:1:\"1\";s:8:\"USERNAME\";s:5:\"admin\";s:8:\"PASSWORD\";s:32:\"21232f297a57a5a743894a0e4a801fc3\";s:4:\"NAMA\";s:28:\"Programmer Check Jgn dihapus\";s:4:\"ROLE\";s:10:\"Superadmin\";s:4:\"FOTO\";s:16:\"profile-pic4.jpg\";s:8:\"ISACTIVE\";s:1:\"1\";s:10:\"CREATED_BY\";s:5:\"admin\";s:12:\"CREATED_DATE\";s:19:\"2022-09-02 10:10:10\";s:10:\"UPDATED_BY\";s:5:\"admin\";s:12:\"UPDATED_DATE\";s:19:\"2025-12-06 09:30:42\";}}'),
('e23d6587085f6cc4b026bdefb7084699', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 1764988610, 'a:8:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";N;}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";N;s:8:\"1stvisit\";b:1;s:8:\"flashmsg\";s:76:\"Anda tidak memiliki hak untuk mengakses.<br />Silakan login terlebih dahulu.\";s:9:\"flashtype\";s:6:\"danger\";}'),
('0e95e7142121c4dc3c3b7f73f7ed60e1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 1764988610, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";N;}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";N;s:8:\"1stvisit\";b:1;}');

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
('2f69d8faf7d364c6287c92b21bd52454', '149.57.180.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 1764848101, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('45477b7cb9126bc42994516b3e646f8d', '149.57.180.192', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1764840635, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('5cc00e33d514dca5c129120e9cacc77f', '149.57.180.108', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1764842700, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('6cb8a3d8e131df9444ff45ff63fe5277', '34.142.139.134', 'Mozilla/5.0 (Linux; Android 12) Chrome/111.0 Mobile Safari/537.36', 1764881308, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('b138b563983634eef3ae8c8c04564a97', '23.27.145.237', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1764846911, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('cee4127a9656583f21c96f4a637db1af', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.', 1764923681, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";O:8:\"stdClass\":9:{s:2:\"id\";s:1:\"1\";s:4:\"nama\";s:18:\"Kost Putri Griyoku\";s:12:\"nama_pemilik\";s:16:\"Novendi Wirayoga\";s:6:\"alamat\";s:22:\"Jl Sakura Regency E-2 \";s:7:\"telepon\";s:12:\"087864398924\";s:2:\"hp\";s:12:\"081335146034\";s:12:\"alamat_usaha\";s:22:\"Jl Sakura Regency E-2 \";s:17:\"telp_tempat_usaha\";s:12:\"087864398924\";s:4:\"logo\";N;}s:13:\"param_company\";s:18:\"Kost Putri Griyoku\";s:12:\"company_dept\";s:18:\"Kost Putri Griyoku\";s:4:\"logo\";N;s:8:\"1stvisit\";b:1;}'),
('d180cbb0db1a3970925e5a95fffac641', '23.27.145.254', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 1764845069, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}'),
('e49aa4863cf97d3d7f801911bf7dee21', '149.57.180.25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 1764844360, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"labelling\";a:0:{}s:13:\"param_company\";N;s:12:\"company_dept\";s:0:\"\";s:4:\"logo\";s:0:\"\";s:8:\"1stvisit\";b:1;}');

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
(1, 5000, 6);

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
(1, 1, 'Double Bed', 4, '3 x 4 M', 'Fasilitas Kamar :Smart tv, Double Bed, Lemari, Meja Kursi Rias AC, Kamar Mandi Dalam (closet duduk, shower & whater heater) & Token Sendiri\n<br/>Fasilitas umum : Ruang Tamu, Wifi Bersama Fre, Air Bersama Free, Dapur Bersama, Tempat Jemur Pakaian, parkir Motor Mobil', 250000, 2250000, 0, 27000000);

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
(1, '', 'Demi kenyamanan bersama, <b>KOS PAK JOKO</b> menerapkan <b>tata tertib</b> yang harus dihormati oleh penghuni maupun pengunjung, yaitu:\r\n<br>\r\n<ol>\r\n  <li>Menjaga ketenangan dan kenyamanan bersama dengan tidak membuat kegaduhan serta saling menghormati penghuni kost lainnya.</li>\r\n  <li>Menjaga kebersihan dengan membersihkan dan merapikan kembali setelah menggunakan fasilitas bersama di dalam kost.</li>\r\n  <li>Tidak menggunakan tempat kost untuk melakukan hal-hal yang bertentangan dengan hukum maupun norma yang berlaku di masyarakat.</li>\r\n  <li>Menggunakan dan menjaga inventaris kost dengan baik serta tidak melakukan perubahan pada rumah kost (misalnya memaku tembok, mencoret-coret dinding, atau merusak furnitur).</li>\r\n  <li>Pengunjung pria hanya diperbolehkan ditemui di ruang tamu.</li>\r\n  <li>Jam berkunjung maksimal hingga pukul 22.00.</li>\r\n  <li>Parkir kendaraan dengan rapi di area kost agar tidak mengganggu pengguna jalan lain.</li>\r\n  <li>Dilarang merokok di dalam rumah kost demi kesehatan bersama. Merokok hanya diperbolehkan di luar rumah kost (area terbuka).</li>\r\n  <li>Tidak menyimpan barang-barang berbahaya (senjata api, bahan mudah terbakar) maupun barang-barang terlarang (narkoba, minuman keras).</li>\r\n  <li>Menghemat pemakaian air, listrik, dan gas demi lingkungan yang lebih baik (Let\'s Go Green!).</li>\r\n</ol>\r\n\r\n<b>BATAS WAKTU PEMBAYARAN</b>\r\n<br/>\r\nBatas toleransi pembayaran kost adalah maksimal 5 hari setelah jatuh tempo. Apabila melewati batas tersebut, mulai hari ke-6 akan dikenakan denda sebesar Rp 5.000,- per hari. Pembayaran dapat dilakukan melalui transfer dengan mencantumkan informasi nama penghuni, nomor kamar, serta periode pembayaran.\r\n<br/>\r\n\r\n<b>TERMINASI/PENGHENTIAN KONTRAK</b>\r\n<br/>\r\nApabila penghuni ingin menghentikan kontrak, maka pemberitahuan kepada pengelola kost harus dilakukan minimal 1 bulan sebelum tanggal terminasi. Terminasi juga dapat dilakukan oleh pengelola kost apabila penghuni melanggar tata tertib atau menunda pembayaran tanpa persetujuan pengelola.');

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
(4, 'karah Jawa Pos', 'Kost Putri Griyoku Karah Jawa Pos', 'Jl jambangan Baru No 1 D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
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
(1, 'Kost Putri Griyoku', 'Novendi Wirayoga', 'Jl Sakura Regency E-2 ', '087864398924', '081335146034', 'Jl Sakura Regency E-2 ', '087864398924', NULL);

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
(8, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Programmer Check Jgn dihapus', 'Superadmin', 'profile-pic4.jpg', '1', 'admin', '2022-09-02 10:10:10', 'admin', '2025-12-06 09:30:42'),
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
  MODIFY `IDKAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
