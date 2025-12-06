#
# TABLE STRUCTURE FOR: ak_params
#

DROP TABLE IF EXISTS ak_params;

CREATE TABLE `ak_params` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `value1` varchar(100) DEFAULT NULL,
  `value2` varchar(100) DEFAULT NULL,
  `value3` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ak_params (`id`, `name`, `value1`, `value2`, `value3`, `description`, `created`, `modified`) VALUES (1, 'company', 'LMI', 'lmi3.png', 'KEUANGAN', 'Nama Perusahaan', '2014-01-17 20:30:34', NULL);


#
# TABLE STRUCTURE FOR: anak_kost
#

DROP TABLE IF EXISTS anak_kost;

CREATE TABLE `anak_kost` (
  `IDANAKKOST` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`IDANAKKOST`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (1, '337204550296006', 'lARASHINTA INDAH PRAWESTI', 'Wanita', '', '1996-02-15', 'JL. DEMPO DALAM NO 1. MOJOSONGO', '087836768460', '', NULL, 'SANATA DHARMA', 'MRICAN TROMOLPOS 29 YOGYAKARTA', '', 'IDA CHANDRA DEWI', '', '087835304624', '', 'Wanita', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (2, '1471074904980002', 'TENGKU LUFYANDARA R. L', 'Wanita', '', '1998-04-09', 'JL. BERINGIN NO 21 A, PEKANBARU', '085355720979', '', NULL, 'UGM', '', '', 'HAFFRIANI', '', '081378025558', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (3, '3471045208920001', 'MONICA FOROLUS K. M', 'Pria', '', '0000-00-00', 'KALANGAN UH. 5/720. RT/RW 016/004. YOGYAKARTA', '081226570445', '', NULL, 'PT. ASURANSI ASTRA BUANA', '', '', 'ADITYA DANANJAYA', '', '081222650004', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (4, '3401127005960001', 'EMMELIA PASCA PRADANA', 'Pria', '', '1997-05-30', 'SALAK MALANG, BANJARHARJO, KALIBAWANG, KULON PROGO. YOGYAKARTA', '082221545156', '', NULL, 'ATMA JAYA YOGYAKARTA', 'JL MRICAN BARU', '', 'SAGUH ISTIYANTO ISAAC JAGUES', '', '081328832123', '', 'Pria', '', '', 'SALAK MALANG, BANJARHARJO, KALIBAWANG, KULON PROGO, YOGYAKARTA.');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (5, '1571026206940001', 'MORIA MARUWU', 'Wanita', '', '1993-06-22', 'KOMPLEK PU PASIR PUTIH NO 24', '082225959040', '', NULL, 'UKDW', '', '', 'ADHITYA MANUMPIL ', '', '081242890596', '', 'Pria', '', '', 'JL. JEMBATAN MERAH');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (6, '3969', 'JOAENE AGUSTINE', 'Wanita', '', '1999-08-01', 'PERUM GREENLAND CITY BLOK G NO 53 & 55 PANGKALPINANG, BANGKA', '0821344054860/081804231059', '', NULL, 'SMA STELLA DUCE 2', 'JL DR. SUTOMO N0 16 YOGYAKARTA', '', 'YOZENDA Z. TENLIMA', '', '081367609361', '', 'Pria', '', '', 'PERUM GREENLAND BLOK G NO 53 & 55 PANGKAL PINANG, BANGKA');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (7, '327316080592001', 'Kelvin Christian', 'Pria', '', '1992-05-08', 'Jl Wuluku V no. 11A', '081320014549 / Ktr 027461789', '', NULL, '', 'Jl, Ring road', '', 'MONICA', '', '08383282741', '', 'Wanita', '', '', 'JL. WULULU V NO IIA');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (8, '8171012404950001', 'leocarlo indra tomasoa', 'Pria', '', '1995-04-24', 'jl. latuharhary', '081247536235', '', NULL, '', '', '', 'MICHELLE BRENDA', '', '081391779202', '', 'Wanita', '', '', 'JL BABARSARI KOMPLEKS BATAM');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (9, '', 'Hendry Sepriyadin', 'Laki-Laki', NULL, '1999-09-12', '', '082337756374', NULL, NULL, 'UGM', 'Jl Agro no 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (10, '', 'Ega Harits Muhammad', 'Laki-Laki', NULL, '1998-02-12', 'Komplek Iksora 102 PT.CPI Rumbai Pekanbaru', '082220899437', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (21, '', 'testing', 'Laki-Laki', NULL, '0000-00-00', '', '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (12, '', 'Faiz Shabri', 'Laki-Laki', NULL, '1998-09-19', 'Puskoplar Blok A1 nom 30 Batam', '087807623429', NULL, NULL, 'UGM', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (13, '', 'James Keiya Budi Arjanto', 'Pria', '', '1988-08-24', 'Jl DiPanaitan Rt 005/Rw 002, purwarkarta', '081229901010', '', NULL, 'Harper', 'Mangkubumi, jl Mangkubumi no 52', '', 'MARY KURNIAWATI', '', '08112609292', '', 'Wanita', '', '', 'JL. PANJAITAN, PURWOKERTO');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (14, '', 'Christ Yeremias kondorva', 'Pria', '', '1996-12-07', 'Jl Sakura no 8a, loji, gunung Batu', '087770571046', '', NULL, '', 'jl Babarsari 43 Yogyakarta', '', 'HERTI MULYANINGSIH', '', '082110416360', '', 'Wanita', '', '', 'JL. SAKURA NO 84, LOJI, GUNUNG BATU, BOGOR');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (15, '', 'Aloysius Bruno', 'Laki-Laki', NULL, '1993-10-26', 'Nunukan, Kalimantan Utara', '085396916042', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (16, '', 'Deddie Marthin Perwira', 'Laki-Laki', NULL, '1996-12-14', 'Jl G Obos VIII no 115', '085252845327', NULL, NULL, 'ATMA JAYA YOGYAKARTA', 'JL MRICAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (18, '1471116508980041', 'AISYAFA SHAFIRA', 'Wanita', '', '1998-08-25', 'JL JASA BLOK B NO 1', '081261788838', '', NULL, 'UGM - FIB', '', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (19, '3316095710870001', 'ANNIS ANGGRAINI', 'Pria', '', '1987-10-17', 'JL AGIL KUSUMADIYA NO. 62 BLORA', '085876353250', '', NULL, '', '', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (20, '6171065404940001', 'Naura Fahira', 'Perempuan', NULL, '1998-04-14', 'Jl P.H. Hustin II komp Alex Griya Permai I D11', '082153619268', NULL, NULL, 'UGM', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (22, '3171036607950001', 'LEONY ISABELLA CONGGO', 'Perempuan', NULL, '1995-07-26', 'VILAA NUSA INDAH 2 BLOK S10/7 KAB BOGOR 16969', '081218392567', NULL, NULL, 'UPN', 'TAMBAK BAYAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (23, '6405025408940004', 'ALAU', 'Pria', '', '1994-08-14', 'JL PATTIMURA RT 01 NUNUKAN', '085328752221', '', NULL, 'ATMA JAYA YOGYAKARTA', 'JL MRICAN BARU', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (24, '3174062707950003', 'DIO ASMANDARU WIDODO', 'Pria', '', '1995-07-27', 'KOMPLEK VILLA DELIMA BLOCK I/20, LEBAK BULUS JAKARTA SELATAN', '082137969923', '', NULL, 'UGM - TEKNIK ARSITEKTUR', 'BULAKSUMUR', '', 'AGUSTINI PURWANINGSIH', '', '08161983710', '', 'Wanita', '', '', 'KOMPLEK VILLA DELIMA BLOK I/20 LEBAK BULUS JAKSEL');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (25, '3314095005960002', 'NOVIA ANDRIANI', 'Wanita', '', '1996-05-10', 'MARGO ASRI, SRAGEN', '081329883055', '', NULL, 'UPN', 'RINGROAD UTARA', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (26, '3301214707950002', 'JULIA TATUM', 'Wanita', '', '1995-07-07', 'JL. KELAPA 5 NO 11 CILACAP', '085747219525', '', NULL, 'STIE YKPN', 'SETURAN RAYA', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (27, '130511353', 'DINA PERINATA', 'Perempuan', NULL, '1995-08-13', 'JL PEMBANGUNAN NO 11', '085387888617', NULL, NULL, 'ATMA JAYA YOGYAKARTA', 'JL MRICAN BARU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (28, '1971032905950002', 'JOZAN ADOLF', 'Pria', '', '1995-05-29', 'ARMAWA NO 10', '082134414523', '', NULL, 'ATMAJAYA', 'JL BABARSARI NO 44 YOGYAKARTA', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (29, '1205070612950007', 'RICKY ANTHONY', 'Pria', '', '1995-12-06', 'JL. PROKLAMASI NO 99 STABAT LANGKAT', '085200267777', '', NULL, 'ATMA JAYA YOGYAKARTA', 'JL. MRICAN', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (30, '970917151296', 'THERESSA PRATIWI WILANDINI', 'Wanita', '', '1997-09-23', 'JL. PASUNDAN, PERUM PASUNDAN PERMAI BLOK J9 - J10', '082220066604', '', NULL, 'ATMA JAYA YOGYAKARTA', 'MERICAN', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (31, '1271025211960002', 'TAMARA NOVITA', 'Perempuan', NULL, '1996-11-12', 'MEDAN', '082163501112', NULL, NULL, 'FKH UGM', 'UGM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (32, '1471030204940001', 'KRISTIANTO R.', 'Pria', '', '1994-04-24', 'ASR. KPT. FADILLAH BLOK A II/2', '085271495559', '', NULL, 'UNIVERSITAS ISLAM FAK. EKONOMI', 'CONDONG CATUR', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (33, '6271031412960002', 'Deddie Marthin Perwira', 'Pria', '', '1996-12-14', 'Jl G Obos VIII no 115', '085252845327', '', NULL, 'ATMA JAYA YOGYAKARTA', 'JL. MERICAN', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (34, '1471114203950001', 'FIONA ARDHANA RESWARI KASMI', 'Pria', '', '1995-03-02', 'POGUNG RAYA 272J', '081290203132', '', NULL, 'FKG UGM', 'UGM', '', '', '', '', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (35, '3307096505920001', 'ROSDA KHAIRANA', 'Wanita', 'WONOSOBO', '1992-05-25', 'JL SOEKARNO - HATTA NO 8B', '081239886324', 'rosdakhairana@rocketmail.com', NULL, 'UGM', 'UGM FAK PERTENAKAN', '0', '', '', '0', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (36, '13/349575/FI/03827', 'ANINDYA DESINTA PETRASILVI', 'Wanita', 'MEDAN', '1995-12-05', 'JL KAHARUDDIN NASUTION, VILLA TAMAN MULIA INDAH', '081275572001', 'APETRASILVI@YMAIL.COM ', NULL, 'UGM FAK PSIKOLOGI', 'UGM', '0', 'CHANDRAWATI KUSUMAYEKTI', '', '08126063025', '', 'Wanita', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (37, '', 'ANINDYA DESINTA PETRASILVI', 'Wanita', 'MEDAN', '1995-12-05', 'JL KAHARUDDIN NASUTION, VILLA TAMAN MULIA INDAH', '081275572001', 'APETRASILVI@YMAIL.COM ', NULL, 'UGM FAK PSIKOLOGI', 'UGM', '0', 'CHANDRAWATI KUSUMAYEKTI', '', '08126063025', '', 'Wanita', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (38, '3275052108900007', 'FELIX', 'Pria', '', '0000-00-00', 'KEMANG MELATI 6 BLOK O NO 5', '0', '', NULL, '', '', '0', '', '', '0', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (39, '3604051911970001', 'K. ANOM PAMUNGKAS', 'Pria', '', '0000-00-00', 'KOMP. PEGADINGAN PERMAI B 1 / 155', '0', '', NULL, '', '', '0', '', '', '0', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (40, '1471070502940021', 'FRISKI FEBRIYAN', 'Pria', '', '0000-00-00', 'JL. TENGKU BEY GG. UTAMA 1', '0085363848008', '', NULL, '', '', '0', 'BELLA SYOFI', '', '0', '', 'Wanita', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (41, '1271025211960002', 'TAMARA NOVITA', 'Wanita', 'MEDAN', '1996-11-12', 'MEDAN', '082163501112', 'TAMARA.NOVITA@YMAIL.COM', NULL, 'FKH UGM', '', '0', 'MICHAEL', '', '0813751188', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (42, '3314075401990003', 'SELMA ZAHRA SYAVIA', 'Wanita', '', '0000-00-00', 'MENANGAN RT/RW 002/001, JOYOSURAN, PAAR KLIWON', '0', '', NULL, 'UGM', 'UGM HUKUM', '0', 'MURNI', '', '087812600088', '', 'Pria', '', '', 'SOLO BARU');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (43, '3376020104900001', 'FIRDAUS SETIO NUGROHO', 'Pria', '', '0000-00-00', 'PERUMAHAN ARYA MUKTI BARAT VI NO 22', '0', '', NULL, '', '', '0', '', '', '0', '', 'Pria', '', '', '');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (44, '1405050612950001', 'AMIRUL AZRI', 'Pria', '', '0000-00-00', 'PEKANBARU', '0', '', NULL, '', '', '0', 'FAJAR RAMADHAN ', '', '0', '', 'Pria', '', '', 'NOLOGATEN');
INSERT INTO anak_kost (`IDANAKKOST`, `NOIDENTITAS`, `NAMA`, `JENISKELAMIN`, `TEMPAT_LAHIR`, `TGLLAHIR`, `ALAMAT_ASAL`, `NOTELP`, `EMAIL`, `FOTO`, `NAMA_PT`, `ALAMAT_KERJA_KULIAH`, `NOTELP_INSTANSI`, `NAMA_PJ`, `NOIDENTITAS_PJ`, `NOTELP_PJ`, `EMAIL_PJ`, `JENISKELAMIN_PJ`, `TEMPAT_LAHIR_PJ`, `TGL_LAHIR_PJ`, `ALAMAT_PJ`) VALUES (45, '123456', 'tes agustus', 'Pria', '', '0000-00-00', 'tess', '0811111111111', '', NULL, '', '', '0', '', '', '0', '', 'Pria', '', '', '');


#
# TABLE STRUCTURE FOR: bank
#

DROP TABLE IF EXISTS bank;

CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Cabang` varchar(50) NOT NULL,
  `NoRekening` varchar(50) NOT NULL,
  `atasNama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO bank (`id`, `Nama`, `Cabang`, `NoRekening`, `atasNama`) VALUES (1, 'MAYBANK', 'JOGJAKARTA', '1027665625', 'PRAMILASARI PUSPITANINGSASI');


#
# TABLE STRUCTURE FOR: bayar_bulanan
#

DROP TABLE IF EXISTS bayar_bulanan;

CREATE TABLE `bayar_bulanan` (
  `NOTRANSAKSI` varchar(50) NOT NULL,
  `idPendaftaran` varchar(20) NOT NULL,
  `pembayaran_ke` int(11) DEFAULT NULL,
  `thnbln_tagihan` varchar(20) DEFAULT NULL,
  `tglBayar` date NOT NULL,
  `jmlTagihan` double NOT NULL DEFAULT '0',
  `jmlBayar` double DEFAULT '0',
  `petugas` varchar(50) NOT NULL,
  `idkamar` int(11) DEFAULT NULL,
  `namaKamar` varchar(30) NOT NULL,
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
  `denda` double NOT NULL DEFAULT '0',
  `pengurangan_denda` double DEFAULT '0',
  `kwh_akhir` double DEFAULT '0',
  `tarif_per_kwh` double DEFAULT '0',
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`NOTRANSAKSI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328110204', '20170328093537', 1, '201703', '2017-03-28', '1200000', '1200000', 'pramilasari', 25, '206', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328112001', '20170328111702', 1, '201703', '2017-03-28', '1300000', '1300000', 'pramilasari', 35, '218', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328114605', '20170328112452', 1, '201703', '2017-03-28', '1500000', '150000', 'pramilasari', 40, '223', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328124133', '20170328123636', 1, '201703', '2017-03-28', '1300000', '1300000', 'pramilasari', 57, '216', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328124744', '20170328124252', 1, '201703', '2017-03-30', '1200000', '1200000', 'pramilasari', 31, '212', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170328125527', '20170328125118', 1, '201703', '2017-03-28', '1300000', '1300000', 'pramilasari', 30, '211', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170329082542', '20170329081437', 1, '201703', '2017-03-31', '1300000', '1300000', 'pramilasari', 9, '108', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170330035304', '20170330035100', 1, '201703', '2017-03-30', '1300000', '1300000', 'pramilasari', 11, '110', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170331064630', '20170331064033', 1, '201703', '2017-03-31', '1500000', '750000', 'pramilasari', 38, '221', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170331074453', '20170331074015', 1, '201703', '2017-03-31', '1400000', '150000', 'pramilasari', 34, '217', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170401044013', '20170401043713', 1, '201704', '2017-04-01', '1300000', '150000', 'pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170402072544', '20170330080200', 1, '201704', '2017-04-02', '1300000', '1300000', 'pramilasari', 10, '109', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403091959', '20170403090917', 1, '201704', '2017-04-03', '1500000', '150000', 'pramilasari', 21, '202', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403094327', '20170403094024', 1, '201704', '2017-04-20', '1300000', '1300000', 'Pramilasari', 32, '213', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403095942', '20170403095649', 1, '201704', '2017-04-11', '1400000', '1400000', 'Pramilasari', 16, '115', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403110822', '20170403110556', 1, '201704', '2017-04-13', '1300000', '1300000', 'Pramilasari', 27, '208', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403111419', '20170403111129', 1, '201704', '2017-04-03', '1300000', '1300000', 'pramilasari', 28, '209', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170403113212', '20170403112730', 1, '201704', '2017-04-03', '1300000', '1300000', 'pramilasari', 31, '212', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170404111701', '20170404110539', 1, '201704', '2017-04-07', '1300000', '1300000', 'pramilasari', 12, '111', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170405025517', '20170405025237', 1, '201704', '2017-04-05', '1300000', '1300000', 'pramilasari', 8, '107', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170405054325', '20170405052440', 1, '201704', '2017-04-05', '1300000', '1300000', 'pramilasari', 33, '214', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170408112530', '20170408111349', 1, '201704', '2017-04-08', '1300000', '500000', 'pramilasari', 12, '111', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170411005903', '20170411000516', 1, '201704', '2017-04-13', '1300000', '1300000', 'pramilasari', 3, '102', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170411123247', '20170411122941', 1, '201704', '2017-04-21', '1500000', '1500000', 'Pramilasari', 41, '224', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '0', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170415094351', '20170330074924', 1, '201704', '2017-04-15', '1300000', '1300000', 'Pramilasari', 2, '101', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170416232234', '20170416231714', 1, '201704', '2017-04-16', '1500000', '1500000', 'Pramilasari', 39, '222', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170416232436', '20170416231714', 1, '201704', '2017-04-16', '1500000', '1500000', 'Pramilasari', 39, '222', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170423104937', '20170328093537', 2, '201704', '2017-04-23', '1241325', '1241325', 'Pramilasari', 25, '206', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '49', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170428082112', '20170328123636', 2, '201704', '2017-04-28', '1334200', '1334200', 'Pramilasari', 26, '207', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '44', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430030726', '20170328111702', 2, '201704', '2017-04-30', '1382650', '1382650', 'Pramilasari', 35, '218', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '78', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430031017', '20170328112452', 2, '201704', '2017-04-30', '1718025', '218025', 'Pramilasari', 40, '223', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '173', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430031535', '20170328125118', 2, '201704', '2017-04-30', '1452475', '1452475', 'Pramilasari', 30, '211', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '127', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430034323', '20170329081437', 1, '201704', '2017-04-30', '1300000', '1300000', 'Pramilasari', 9, '108', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '70', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430034506', '20170329081437', 1, '201704', '2017-04-30', '1300000', '1300000', 'Pramilasari', 9, '108', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '70', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430034832', '20170328124252', 2, '201704', '2017-04-30', '1306875', '1306875', 'Pramilasari', 36, '219', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '95', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430074935', '20170330035100', 2, '201704', '2017-04-30', '1300000', '1300000', 'Pramilasari', 11, '110', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430115626', '20170329081437', 2, '201705', '2017-04-30', '1371250', '1300000', 'Pramilasari', 9, '108', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '70', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170430121212', '20170430120839', 1, '201704', '2017-04-30', '1300000', '1300000', 'Pramilasari', 11, '110', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170501101447', '20170330072103', 1, '201705', '2017-05-01', '1300000', '1300000', 'Pramilasari', 13, '112', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170502034022', '20170401043713', 2, '201705', '2017-05-02', '1300000', '1300000', 'Pramilasari', 29, '210', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170502052550', '20170331074015', 1, '201704', '2017-05-02', '1400000', '1400000', 'Pramilasari', 34, '217', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170502145047', '20170330071403', 1, '201705', '2017-05-02', '1200000', '1200000', 'Pramilasari', 7, '106', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170503020905', '20170503020618', 1, '201705', '2017-05-03', '1200000', '1200000', 'Pramilasari', 14, '113', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170503160757', '20170330080200', 2, '201705', '2017-05-03', '1385500', '1385500', 'Pramilasari', 10, '109', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '80', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170504115536', '20170504115315', 1, '201705', '2017-05-04', '1300000', '1300000', 'Pramilasari', 12, '111', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170507045349', '20170405052440', 2, '201705', '2017-05-07', '1300000', '1300000', 'Pramilasari', 33, '214', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510054444', '20170331064033', 1, '201704', '2017-05-10', '1500000', '1500000', 'Pramilasari', 38, '221', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510054736', '20170331064033', 2, '201705', '2017-05-10', '1500000', '1500000', 'Pramilasari', 38, '221', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510054941', '20170331064033', 3, '201706', '2017-05-10', '1500000', '1500000', 'Pramilasari', 38, '221', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510062054', '20170510061538', 1, '201705', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510062437', '20170510061538', 2, '201706', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510062538', '20170510061538', 3, '201707', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510062647', '20170510061538', 4, '201708', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510062741', '20170510061538', 5, '201709', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510063030', '20170510061538', 6, '201710', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510063124', '20170510061538', 7, '201711', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510063226', '20170510061538', 8, '201712', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510065607', '20170510061538', 9, '201801', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510065714', '20170510061538', 10, '201802', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510065842', '20170510061538', 11, '201803', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170510065922', '20170510061538', 12, '201804', '2017-05-10', '1300000', '1300000', 'Pramilasari', 20, '201', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170511065250', '20170404110539', 2, '201705', '2017-05-11', '1366975', '1366975', 'Pramilasari', 17, '116', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '67', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170511065424', '20170403095649', 2, '201705', '2017-05-11', '1448450', '1448450', 'Pramilasari', 16, '115', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '54', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170513030431', '20170403111129', 2, '201705', '2017-05-13', '1352725', '1352725', 'Pramilasari', 28, '209', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '57', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170513030544', '20170403111129', 2, '201705', '2017-05-13', '1352725', '1352725', 'Pramilasari', 28, '209', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '57', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170513031006', '20170403112730', 2, '201705', '2017-05-13', '1300000', '1300000', 'Pramilasari', 31, '212', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '15000', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170514065632', '20170411000516', 2, '201705', '2017-05-14', '1300000', '1386925', 'Pramilasari', 3, '102', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170514065726', '20170411000516', 2, '201705', '2017-05-14', '1386925', '1386925', 'Pramilasari', 3, '102', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '81', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170517111729', '20170408111349', 1, '201705', '2017-05-17', '1300000', '1300000', 'Pramilasari', 5, '104', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170517141624', '20170330074924', 2, '201705', '2017-05-17', '1358425', '1358425', 'Pramilasari', 2, '101', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '61', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170517150758', '20170405025237', 2, '201705', '2017-05-17', '1300000', '1300000', 'Pramilasari', 8, '107', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170518075320', '20170403110556', 2, '201705', '2017-05-18', '1345600', '1345600', 'Pramilasari', 27, '208', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '52', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170518092804', '20170518092132', 1, '201705', '2017-05-18', '1300000', '1300000', 'Pramilasari', 31, '212', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170518092839', '20170518092132', 2, '201706', '2017-05-18', '1300000', '1300000', 'Pramilasari', 31, '212', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170518093151', '20170518092132', 3, '201707', '2017-05-18', '1300000', '1300000', 'Pramilasari', 31, '212', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105103', '20170519104941', 1, '201705', '2017-05-19', '1300000', '1300000', 'Pramilasari', 8, '107', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170521115502', '20170416231714', 2, '201705', '2017-05-21', '1548450', '1548450', 'Pramilasari', 39, '222', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '54', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170521115804', '20170411122941', 2, '201705', '2017-05-21', '1641075', '1641075', 'Pramilasari', 41, '224', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '119', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170523112517', '20170523112056', 1, '201705', '2017-05-23', '1200000', '1200000', 'Pramilasari', 18, '117', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170526101046', '20170403094024', 2, '201705', '2017-05-26', '1300000', '1300000', 'Pramilasari', 32, '213', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170526103230', '20170328093537', 3, '201705', '2017-05-26', '1245600', '1245600', 'Pramilasari', 25, '206', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '101', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170526104001', '20170328111702', 3, '201705', '2017-05-26', '1341325', '1341325', 'Pramilasari', 35, '218', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '127', '1425', 1, '2017-08-15');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170601153947', '20170329081437', 3, '201706', '2017-06-01', '1376950', '1376950', 'Pramilasari', 9, '108', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '144', '1425', 0, '2017-06-29');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170810163523', '20170810163317', 1, '201708', '2017-08-10', '1308000', '1308000', 'admin', 6, '105', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '1425', 0, NULL);
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170806090645', '20170328111702', 4, '201706', '2017-08-06', '1450000', '1450000', 'admin', 35, '218', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150000', '0', '0', '1425', 0, NULL);
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170806082523', '20170403095649', 4, '201707', '2017-08-06', '1495000', '1495000', 'admin', 16, '115', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '95000', '0', '0', '1425', 1, '2017-08-06');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170806082349', '20170328093537', 5, '201707', '2017-08-06', '1235000', '1235000', 'admin', 25, '206', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35000', '0', '0', '1425', 1, '2017-08-06');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170806082502', '20170403095649', 3, '201706', '2017-08-06', '1550000', '1550000', 'admin', 16, '115', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150000', '0', '0', '1425', 1, '2017-08-06');
INSERT INTO bayar_bulanan (`NOTRANSAKSI`, `idPendaftaran`, `pembayaran_ke`, `thnbln_tagihan`, `tglBayar`, `jmlTagihan`, `jmlBayar`, `petugas`, `idkamar`, `namaKamar`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `denda`, `pengurangan_denda`, `kwh_akhir`, `tarif_per_kwh`, `sts_post_sia`, `tgl_post`) VALUES ('20170723083351', '20170328093537', 4, '201706', '2017-07-23', '1330675', '1330675', 'admin', 25, '206', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '115000', '0', '132', '1425', 1, '2017-07-31');


#
# TABLE STRUCTURE FOR: bayar_harian_detil
#

DROP TABLE IF EXISTS bayar_harian_detil;

CREATE TABLE `bayar_harian_detil` (
  `noPendaftaran` varchar(30) NOT NULL,
  `noUrut` int(11) NOT NULL AUTO_INCREMENT,
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
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`noPendaftaran`,`noUrut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170403133329', 1, '2017-04-03', '75000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170407140551', 1, '2017-04-07', '75000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170408153408', 1, '2017-04-08', '170000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170407140551', 2, '2017-04-08', '75000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170409011056', 1, '2017-04-09', '180000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170409015744', 1, '2017-04-09', '270000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170409020750', 1, '2017-04-09', '180000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170409104636', 1, '2017-04-09', '75000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170409123122', 1, '2017-04-09', '225000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170410035135', 1, '2017-04-10', '75000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170410105439', 1, '2017-04-10', '90000', 'pramilasari', 'tunai', '0000-00-00', '', '', '', 0, '', '', '', '', '0000-00-00', 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170410142224', 1, '2017-04-10', '90000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170410142549', 1, '2017-04-10', '170000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170422012551', 1, '2017-04-22', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170422052914', 1, '2017-04-22', '170000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170423013946', 1, '2017-04-23', '225000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170423015014', 1, '2017-04-23', '225000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170423015758', 1, '2017-04-23', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170423135806', 1, '2017-04-23', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170425142604', 1, '2017-04-25', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170423135806', 2, '2017-04-26', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170427034633', 1, '2017-04-27', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170428093115', 1, '2017-04-28', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170428095629', 1, '2017-04-28', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170429053104', 1, '2017-04-29', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170430135435', 1, '2017-04-30', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170502113231', 1, '2017-05-02', '300000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170502041832', 1, '2017-05-03', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170507045431', 1, '2017-05-07', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170507082638', 1, '2017-05-07', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170507092759', 1, '2017-05-07', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170508094204', 1, '2017-05-08', '180000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170508090116', 1, '2017-05-08', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170508131626', 1, '2017-05-08', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170508132145', 1, '2017-05-08', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170511063637', 1, '2017-05-11', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170511063823', 1, '2017-05-11', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170513025848', 1, '2017-05-13', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170514040742', 1, '2017-05-14', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170514041711', 1, '2017-05-14', '360000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170515063004', 1, '2017-05-15', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170515095959', 1, '2017-05-15', '225000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170515101057', 1, '2017-05-15', '0', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170515101057', 2, '2017-05-15', '255000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170516062637', 1, '2017-05-16', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170516075630', 1, '2017-05-16', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170517120730', 1, '2017-05-17', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170517150350', 1, '2017-05-17', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170518085245', 1, '2017-05-18', '510000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170518085551', 1, '2017-05-18', '300000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170519101853', 1, '2017-05-19', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170520074514', 1, '2017-05-20', '90000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170520085959', 1, '2017-05-20', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170520090301', 1, '2017-05-20', '150000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170522100914', 1, '2017-05-22', '225000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112034', 1, '2017-05-25', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170526100401', 1, '2017-05-26', '180000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170526152117', 1, '2017-05-26', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170526152330', 1, '2017-05-26', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170526152650', 1, '2017-05-26', '75000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170531090334', 1, '2017-05-31', '90000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170807090453', 1, '2017-08-09', '200000', 'admin', 'transfer', '2017-07-23', 'BCA', '123', 'eee', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO bayar_harian_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170810172938', 1, '2017-08-10', '165000', 'admin', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);


#
# TABLE STRUCTURE FOR: bayar_harian_master
#

DROP TABLE IF EXISTS bayar_harian_master;

CREATE TABLE `bayar_harian_master` (
  `noPendaftaran` varchar(30) NOT NULL,
  `jmlHari` int(4) NOT NULL,
  `tarif` double NOT NULL,
  `jmlBayar` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `namaKamar` varchar(30) NOT NULL,
  PRIMARY KEY (`noPendaftaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170403133329', 1, '75000', '75000', 'Lunas', 'pramilasari', '201');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170407140551', 2, '75000', '150000', 'Lunas', 'pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170408153408', 2, '85000', '170000', 'Lunas', 'pramilasari', '216');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170409011056', 2, '90000', '180000', 'Lunas', 'pramilasari', '222');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170409015744', 3, '90000', '270000', 'Lunas', 'pramilasari', '224');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170409020750', 2, '90000', '180000', 'Lunas', 'pramilasari', '224');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170409104636', 1, '75000', '75000', 'Lunas', 'pramilasari', '102');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170409123122', 3, '75000', '225000', 'Lunas', 'pramilasari', '104');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170410035135', 1, '75000', '75000', 'Lunas', 'pramilasari', '104');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170410105439', 1, '90000', '90000', 'Lunas', 'pramilasari', '222');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170410142224', 1, '90000', '90000', 'Lunas', 'pramilasari', '224');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170410142549', 2, '85000', '170000', 'Lunas', 'pramilasari', '216');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170422012551', 2, '75000', '150000', 'Lunas', 'Pramilasari', '111');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170422052914', 2, '85000', '170000', 'Lunas', 'Pramilasari', '216');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170423013946', 3, '75000', '225000', 'Lunas', 'Pramilasari', '111');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170423015014', 3, '75000', '225000', 'Lunas', 'Pramilasari', '113');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170423015758', 2, '75000', '150000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170423135806', 4, '75000', '300000', 'Lunas', 'Pramilasari', '220');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170425142604', 1, '75000', '75000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170427034633', 1, '75000', '75000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170428093115', 2, '75000', '150000', 'Lunas', 'Pramilasari', '215');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170428095629', 1, '75000', '75000', 'Lunas', 'Pramilasari', '111');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170429053104', 1, '75000', '75000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170430135435', 2, '75000', '150000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170502113231', 4, '75000', '300000', 'Lunas', 'Pramilasari', '203');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170502041832', 2, '75000', '150000', 'Lunas', 'Pramilasari', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170507045431', 1, '75000', '75000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170507082638', 1, '75000', '75000', 'Lunas', 'Pramilasari', '203');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170507092759', 1, '75000', '75000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170508094204', 2, '90000', '180000', 'Lunas', 'Pramilasari', '223');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170508090116', 1, '75000', '75000', 'Lunas', 'Pramilasari', '117');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170508131626', 2, '75000', '150000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170508132145', 1, '75000', '75000', 'Lunas', 'Pramilasari', '117');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170511063637', 1, '75000', '75000', 'Lunas', 'Pramilasari', '203');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170511063823', 1, '75000', '75000', 'Lunas', 'Pramilasari', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170513025848', 1, '75000', '75000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170514040742', 1, '75000', '75000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170514041711', 4, '90000', '360000', 'Lunas', 'Pramilasari', '223');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170515063004', 2, '75000', '150000', 'Lunas', 'Pramilasari', '215');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170515095959', 3, '75000', '225000', 'Lunas', 'Pramilasari', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170515101057', 3, '85000', '255000', 'Lunas', 'Pramilasari', '216');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170516062637', 2, '75000', '150000', 'Lunas', 'Pramilasari', '105');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170516075630', 1, '75000', '75000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170517120730', 1, '75000', '75000', 'Lunas', 'Pramilasari', '215');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170517150350', 2, '75000', '150000', 'Lunas', 'Pramilasari', '220');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170518085245', 6, '85000', '510000', 'Lunas', 'Pramilasari', '216');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170518085551', 4, '75000', '300000', 'Lunas', 'Pramilasari', '215');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170519101853', 2, '75000', '150000', 'Lunas', 'Pramilasari', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170520074514', 1, '90000', '90000', 'Lunas', 'Pramilasari', '223');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170520085959', 2, '75000', '150000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170520090301', 2, '75000', '150000', 'Lunas', 'Pramilasari', '202');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170522100914', 3, '75000', '225000', 'Lunas', 'Pramilasari', '105');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170525112034', 6, '75000', '450000', 'Lunas', 'Pramilasari', '118');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170526100401', 2, '90000', '180000', 'Lunas', 'Pramilasari', '223');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170526152117', 1, '75000', '75000', 'Lunas', 'Pramilasari', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170526152330', 1, '75000', '75000', 'Lunas', 'Pramilasari', '105');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170526152650', 1, '75000', '75000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170531090334', 1, '90000', '90000', 'Lunas', 'Pramilasari', '223');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170807090453', 6, '75000', '200000', 'Belum Lunas', 'admin', '103');
INSERT INTO bayar_harian_master (`noPendaftaran`, `jmlHari`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170810172938', 3, '55000', '165000', 'Lunas', 'admin', '202');


#
# TABLE STRUCTURE FOR: bayar_mingguan_detil
#

DROP TABLE IF EXISTS bayar_mingguan_detil;

CREATE TABLE `bayar_mingguan_detil` (
  `noPendaftaran` varchar(30) NOT NULL,
  `noUrut` int(11) NOT NULL AUTO_INCREMENT,
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
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`noPendaftaran`,`noUrut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170403100827', 1, '2017-04-03', '450000', 'pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170429014409', 1, '2017-04-29', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-06-29');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170810163559', 1, '2017-08-10', '900000', 'admin', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170507060846', 1, '2017-05-07', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170512142259', 1, '2017-05-12', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170514040139', 1, '2017-05-14', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170514102608', 1, '2017-05-14', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170516074850', 1, '2017-05-16', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170523053738', 1, '2017-05-23', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');
INSERT INTO bayar_mingguan_detil (`noPendaftaran`, `noUrut`, `tglBayar`, `jmlBayar`, `petugas`, `metode_bayar`, `tgl_transfer`, `dari_bank`, `norek_pengirim`, `nama_pengirim`, `idrek_penerima`, `jenis_kartu`, `no_kartu`, `nmpemilik_kartu`, `no_struk`, `tgl_struk`, `sts_post_sia`, `tgl_post`) VALUES ('20170525111846', 1, '2017-05-25', '450000', 'Pramilasari', 'tunai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-15');


#
# TABLE STRUCTURE FOR: bayar_mingguan_master
#

DROP TABLE IF EXISTS bayar_mingguan_master;

CREATE TABLE `bayar_mingguan_master` (
  `noPendaftaran` varchar(30) NOT NULL,
  `jmlMinggu` int(4) NOT NULL,
  `tarif` double NOT NULL,
  `jmlBayar` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `namaKamar` varchar(30) NOT NULL,
  PRIMARY KEY (`noPendaftaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170403100827', 1, '450000', '450000', 'Lunas', 'pramilasari', '103');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170429014409', 1, '450000', '450000', 'Lunas', 'Pramilasari', '220');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170507060846', 1, '450000', '450000', 'Lunas', 'Pramilasari', '204');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170512142259', 1, '450000', '450000', 'Lunas', 'Pramilasari', '117');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170514040139', 1, '450000', '450000', 'Lunas', 'Pramilasari', '203');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170514102608', 1, '450000', '450000', 'Lunas', 'Pramilasari', '204');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170516074850', 1, '450000', '450000', 'Lunas', 'Pramilasari', '214');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170523053738', 1, '450000', '450000', 'Lunas', 'Pramilasari', '220');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170525111846', 1, '450000', '450000', 'Lunas', 'Pramilasari', '204');
INSERT INTO bayar_mingguan_master (`noPendaftaran`, `jmlMinggu`, `tarif`, `jmlBayar`, `status`, `petugas`, `namaKamar`) VALUES ('20170810163559', 2, '450000', '900000', 'Lunas', 'admin', '114');


#
# TABLE STRUCTURE FOR: biaya_tambahan
#

DROP TABLE IF EXISTS biaya_tambahan;

CREATE TABLE `biaya_tambahan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jenisbiaya` varchar(100) NOT NULL,
  `tarif` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO biaya_tambahan (`id`, `jenisbiaya`, `tarif`) VALUES (2, 'Car Parking Space', '100000');
INSERT INTO biaya_tambahan (`id`, `jenisbiaya`, `tarif`) VALUES (4, 'Laundry & Housekeeping', '3000');
INSERT INTO biaya_tambahan (`id`, `jenisbiaya`, `tarif`) VALUES (9, 'Extra Bad', '25000');
INSERT INTO biaya_tambahan (`id`, `jenisbiaya`, `tarif`) VALUES (8, 'Water Heater', '55000');


#
# TABLE STRUCTURE FOR: cekkamar
#

DROP TABLE IF EXISTS cekkamar;

CREATE TABLE `cekkamar` (
  `idKamar` int(11) NOT NULL,
  `terisi` int(2) NOT NULL,
  PRIMARY KEY (`idKamar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (0, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (2, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (3, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (4, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (5, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (6, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (7, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (8, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (9, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (10, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (11, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (12, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (13, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (14, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (15, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (16, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (17, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (18, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (19, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (20, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (21, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (22, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (23, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (24, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (25, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (26, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (27, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (28, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (29, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (30, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (31, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (32, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (33, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (34, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (35, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (36, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (37, -1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (38, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (39, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (40, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (41, 1);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (42, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (43, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (44, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (45, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (46, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (47, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (48, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (49, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (50, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (51, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (52, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (53, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (54, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (55, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (56, 0);
INSERT INTO cekkamar (`idKamar`, `terisi`) VALUES (57, 0);




#
# TABLE STRUCTURE FOR: daftar_sewa_harian
#

DROP TABLE IF EXISTS daftar_sewa_harian;

CREATE TABLE `daftar_sewa_harian` (
  `idPendaftaran` varchar(30) NOT NULL,
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
  `diskon` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPendaftaran`,`idKamar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170403133329', 20, 'ONIK', '', '081226335007', NULL, 'Perempuan', NULL, NULL, 'SEMARANG', '', '', NULL, '2017-04-03', '2017-04-04', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170407140551', 21, 'tika musfita', '1771045003920003', '08112595665', NULL, 'Perempuan', NULL, NULL, 'jl. darma wanita, sidodadi', '', '', NULL, '2017-04-07', '2017-04-09', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170408153408', 57, 'SOLIHIN', '3578261409730001', '', NULL, 'Laki-Laki', NULL, NULL, 'MULYOSARI TENGAH 7/74 SURABAYA', '', '', NULL, '2017-04-08', '2017-04-10', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170409011056', 39, 'IBU SHINDY', '', '', NULL, 'Perempuan', NULL, NULL, 'SURABAYA', '', '', NULL, '2017-04-08', '2017-04-10', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170409015744', 41, 'IBU IR. BELIANTI', '3573046905670003', '', NULL, 'Perempuan', NULL, NULL, 'JL. PATUHA 12', '', '', NULL, '2017-04-08', '2017-04-10', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170409020750', 41, 'IBU IR. BELIANTI', '', '', NULL, 'Perempuan', NULL, NULL, 'MALANG', '', '', NULL, '2017-04-09', '2017-04-11', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170409104636', 3, 'TEMBOK LOR 4/4', '641215141145', '', NULL, 'Laki-Laki', NULL, NULL, 'SURABAYA', '', '', NULL, '2017-04-09', '2017-04-10', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170409123122', 5, 'BPK.DENY', '', '', NULL, 'Laki-Laki', NULL, NULL, 'SURABAYA', '', '', NULL, '2017-04-07', '2017-04-10', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170410035135', 5, 'ADANG SAPUTRA', '', '', NULL, 'Laki-Laki', NULL, NULL, 'JAKARTA ', '', '', NULL, '2017-04-10', '2017-04-11', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170410105439', 39, 'IBU SHINDY', '', '', NULL, 'Perempuan', NULL, NULL, '', '', '', NULL, '2017-04-10', '2017-04-11', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170410142224', 41, 'IBU IR. BELIANTI', '', '', NULL, 'Perempuan', NULL, NULL, 'SURABAYA', '', '', NULL, '2017-04-10', '2017-04-11', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170410142549', 57, 'IBU VERA', '', '', NULL, 'Perempuan', NULL, NULL, 'SURABAYA', '', '', NULL, '2017-04-10', '2017-04-12', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170422012551', 12, 'drs. ilham nur lase', '3604012303660188', '0', '', 'Pria', '', '0000-00-00', 'komp permata blok n no 4', '', '', '', '2017-04-21', '2017-04-23', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170422052914', 57, 'RAHWATI BR. BRAHMANA', '3273025706910012', '0', '', 'Wanita', '', '0000-00-00', 'JL DAGO POJOK NO 80', '', '', '', '2017-04-22', '2017-04-24', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170423013946', 12, 'drs. ilham nur lase', '3604012303660188', '0', '', 'Pria', '', '0000-00-00', 'komp permata blok n no 4', '', '', '', '2017-04-21', '2017-04-24', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170423015014', 14, 'drs. ilham nur lase (2)', '3604012303660188', '0', '', 'Pria', '', '0000-00-00', 'komp permata blok n no 4', '', '', '', '2017-04-21', '2017-04-24', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170423015758', 21, 'SINTA MELATI', '3204126802950005', '0', '', 'Wanita', '', '0000-00-00', 'TAMAN CIBADUYUT INDAH D 178', '', '', '', '2017-04-22', '2017-04-24', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170423135806', 37, 'BPK. AGUS SUSENO', '3172012809840003', '0', '', 'Pria', '', '0000-00-00', 'JL MUARA BARU', '', '', '', '2017-04-22', '2017-04-26', 4, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170425142604', 21, 'EVANA ANDRIANI', '3318124208940004', '0', '', 'Wanita', '', '0000-00-00', 'DK BUNGKUK, PATI', '', '', '', '2017-04-25', '2017-04-26', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170427034633', 21, 'MSY GEMALA RABIAH', '1611044307960001', '0', '', 'Wanita', '', '0000-00-00', 'PASAR ILIR TEBING TINGGI', '', '', '', '2017-04-26', '2017-04-27', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170428093115', 56, 'DIANDRA RANNY PRASTITI', '3502175505960002', '0', '', 'Wanita', '', '0000-00-00', 'JL MADURA 72 PONOROGO', '', '', '', '2017-04-28', '2017-04-30', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170428095629', 12, 'TUNGGUL PRIYATAMA', '3302182510880001', '0', '', 'Wanita', '', '0000-00-00', 'KARANGLEWAS KIDUL', '', '', '', '2017-04-28', '2017-04-29', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170429053104', 21, 'YUNAN HELMI', '3402121805870002', '0', '', 'Wanita', '', '0000-00-00', 'MERTOSANAN WETAN', '', '', '', '2017-04-28', '2017-04-29', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170430135435', 21, 'DIANDRA RANNY PRASTITI', '3502175505960002', '0', '', 'Wanita', '', '0000-00-00', 'JL MADURA 72', '', '', '', '2017-04-30', '2017-05-02', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170502041832', 4, 'TUNGGUL PRIYATAMA', '3302182510880001', '0', '', 'Pria', '', '0000-00-00', 'KARANGLEWAS KIDUL', '', '', '', '2017-05-02', '2017-05-04', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170502113231', 22, 'MANURUNG PRIMA ULI', '910917181115', '0', '', 'Wanita', '', '0000-00-00', 'DUSUN MEKAR JAYA RT 01', '', '', '', '2017-04-28', '2017-05-02', 4, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170507045431', 33, 'THERESSA PRATIWI WILANDINI', '970917151296', '0', '', 'Wanita', '', '0000-00-00', 'JL. PASUNDAN, PERUM PASUNDAN PERMAI BLOK J9 - J10', '', '', '', '2017-05-06', '2017-05-07', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170507082638', 22, 'DITA HILMAYANTI', '940314230044', '0', '', 'Wanita', '', '0000-00-00', 'DS. DAYEUHLUHUR RT 001/008. CILACAP', '', '', '', '2017-05-07', '2017-05-08', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170507092759', 33, 'NURINA FILDZAH', '3471014502960002', '0', '', 'Wanita', '', '0000-00-00', 'JATIMULYO TR II/419', '', '', '', '2017-05-07', '2017-05-08', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170508090116', 18, 'ADEKNYA ROSDA', '1357890234567', '0', '', 'Pria', '', '0000-00-00', 'KALIMANTAN', '', '', '', '2017-05-07', '2017-05-08', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170508094204', 40, 'PAPA DIO ASMANDARU', '3174062707950003', '0', '', 'Pria', '', '0000-00-00', 'JAKARTA', '', '', '', '2017-05-05', '2017-05-07', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170508131626', 21, 'ANIK WAHYUNI', '800614590480', '0', '', 'Wanita', '', '0000-00-00', 'SEMARANG', '', '', '', '2017-05-07', '2017-05-09', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170508132145', 18, 'KRISTIAN WIGUNA', '3318120201930001', '0', '', 'Pria', '', '0000-00-00', 'DK SEKARUNG, MARGEREJO', '', '', '', '2017-05-08', '2017-05-09', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170511063637', 22, 'NADA KUSUMA', '3173065301990005', '0', '', 'Pria', '', '0000-00-00', 'JAKARTA', '', '', '', '2017-05-10', '2017-05-11', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170511063823', 4, 'HENDRIK PUTRA KUSUMA', '3170362911980005', '0', '', 'Pria', '', '0000-00-00', 'JAKARTA', '', '', '', '2017-05-10', '2017-05-11', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170513025848', 21, 'NURINA FILDZAH', '3471014502960002', '0', '', 'Wanita', '', '0000-00-00', 'JATIMULYO, YOGYAKARTA', '', '', '', '2017-05-12', '2017-05-13', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170514040742', 21, 'IKA FITRIA LAWATI', '3216074711980006', '0', '', 'Wanita', '', '0000-00-00', 'CIBITUNG', '', '', '', '2017-05-21', '2017-05-22', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170514041711', 40, 'MAMA JOAENE', '3969', '0', '', 'Wanita', '', '0000-00-00', 'BANGKA', '', '', '', '2017-05-10', '2017-05-14', 4, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170515063004', 56, 'JALIAH', '6171025007740006', '0', '', 'Wanita', '', '0000-00-00', 'PONTIANAK TIMUR', '', '', '', '2017-05-15', '2017-05-17', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170515095959', 4, 'BUSYE MEINA', '3201283005700001', '0', '', 'Pria', '', '0000-00-00', 'CIJERUK', '', '', '', '2017-05-14', '2017-05-17', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170515101057', 57, 'BUSYE MEINA', '3201283005700001', '0', '', 'Wanita', '', '0000-00-00', 'CIJERUK', '', '', '', '2017-05-14', '2017-05-17', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170516062637', 6, 'FEBRI GUNAWAN', '3322081002930002', '0', '', 'Pria', '', '0000-00-00', 'KRAJAN', '', '', '', '2017-05-16', '2017-05-18', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170516075630', 33, 'MEYSHI CRISTIANA', '1605015205990001', '0', '', 'Wanita', '', '0000-00-00', 'JL. JEND SUDIRMAN DUSUN I', '', '', '', '2017-05-16', '2017-05-17', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170517120730', 56, 'MELANISA', '13627095678450001', '0', '', 'Wanita', '', '0000-00-00', 'PONTIANAK', '', '', '', '2017-05-17', '2017-05-18', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170517150350', 37, 'SHAFIRA BALQIS', '61710445010000014', '0', '', 'Wanita', '', '0000-00-00', 'PONTIANAK', '', '', '', '2017-05-16', '2017-05-18', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170518085245', 57, 'NISAUN FADHILAH', '1872026105990002', '0', '', 'Wanita', '', '0000-00-00', 'JL. MURAI NO 9. LAMPUNG', '', '', '', '2017-05-18', '2017-05-24', 6, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170518085551', 56, 'NISAUN FADHILAH', '1872026105990002', '0', '', 'Pria', '', '0000-00-00', 'JL. MURAI NO 9. LAMPUNG', '', '', '', '2017-05-18', '2017-05-22', 4, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170519101853', 4, 'DAVID DANURJAYA', '3313120708940004', '0', '', 'Pria', '', '0000-00-00', 'KASURAN, COLOMADU', '', '', '', '2017-05-19', '2017-05-21', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170520074514', 40, 'RATNA MELIANA', '3603174502000006', '0', '', 'Wanita', '', '0000-00-00', 'KP. CUKUNGGALIH, TANGERANG', '', '', '', '2017-05-20', '2017-05-21', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170520085959', 33, 'FILLIA FADHILAH', '3174074604920004', '0', '', 'Wanita', '', '0000-00-00', 'JL. KIRAI UJUNG NO 52', '', '', '', '2017-05-20', '2017-05-22', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170520090301', 21, 'FILLIA FADHILAH', '3174074604920004', '0', '', 'Wanita', '', '0000-00-00', 'JL KIRAI UJUNG NO 52', '', '', '', '2017-05-20', '2017-05-22', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170522100914', 6, 'FEBRI GUNAWAN', '3322081002930002', '0', '', 'Pria', '', '0000-00-00', 'KRAJAN RT 002/001', '', '', '', '2017-05-22', '2017-05-25', 3, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170525112034', 19, 'TUNGGUL PRIYATAMA', '3302182510880001', '0', '', 'Pria', '', '0000-00-00', 'PURWOKERTO', '', '', '', '2017-05-18', '2017-05-24', 6, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170526100401', 40, 'BRYCE', '1324354646570001', '0', '', 'Wanita', '', '0000-00-00', 'SEWON', '', '', '', '2017-05-25', '2017-05-27', 2, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170526152117', 4, 'MUHAMMAD YUDHA WISNU PRADHANA', '121112112852', '0', '', 'Pria', '', '0000-00-00', 'SEMARANG', '', '', '', '2017-05-26', '2017-05-27', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170526152330', 6, 'MUHAMMAD YUDHA WISNU PRADHANA', '121112112852', '0', '', 'Pria', '', '0000-00-00', 'SEMARANG', '', '', '', '2017-05-26', '2017-05-27', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170526152650', 33, 'MUHAMMAD YUDHA WISNU PRADHANA', '121112112852', '0', '', 'Wanita', '', '0000-00-00', 'SEMARANG', '', '', '', '2017-05-26', '2017-05-27', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170531090334', 40, 'BRYCE', '235793423570001', '0', '', 'Pria', '', '0000-00-00', 'SEWON', '', '', '', '2017-05-27', '2017-05-28', 1, 1, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170807090453', 4, 'tes hari', '12343', '1233214', '', 'Pria', '', '0000-00-00', 'sdfsdfs', '', '', '', '2017-08-01', '2017-08-07', 6, 0, '0');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170810172656', 9, 'tes harian', '123124', '67565', '', 'Pria', '', '0000-00-00', 'gfrer', '', '', '', '2017-08-07', '2017-08-10', 3, 0, '20000');
INSERT INTO daftar_sewa_harian (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `JK`, `tempat_lahir`, `tgl_lahir`, `alamat_asal`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglCek_in`, `tglCek_out`, `lama`, `checkout`, `diskon`) VALUES ('20170810172938', 21, 'tes harian3', '32423', '0234523', '', 'Pria', '', '0000-00-00', 'dferger', '', '', '', '2017-08-07', '2017-08-10', 3, 1, '20000');


#
# TABLE STRUCTURE FOR: daftar_sewa_mingguan
#

DROP TABLE IF EXISTS daftar_sewa_mingguan;

CREATE TABLE `daftar_sewa_mingguan` (
  `idPendaftaran` varchar(30) NOT NULL,
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
  `diskon` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPendaftaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170403100827', 4, 'ADANG SAPUTRA', '840612202826', '082110095045', NULL, 'KP. CIBITUNG SEBRANG RT. 04/09 CIMUNING', 'Laki-Laki', NULL, NULL, '', '', NULL, '2017-04-03', 1, '2017-04-10', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170429014409', 37, 'MONICA WAWORUNTU', '3173026210920004', '0', '', 'JL DR MAKALIWE I NO 1B', 'Wanita', '', '0000-00-00', '', '', '0', '2017-04-23', 1, '2017-04-30', 0, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170507060846', 23, 'EVA SARI', '2323170400857', '0', '', 'JALAN MUTIARA NO 21, PALANGKARAYA', 'Wanita', '', '0000-00-00', '', '', '0', '2017-05-07', 1, '2017-05-14', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170512142259', 18, 'MUSTAFID HAMDILLAH', '9992365126', '0', '', 'RIAU', 'Pria', '', '0000-00-00', '', '', '0', '2017-05-12', 1, '2017-05-19', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170514040139', 22, 'IKA FITRIA LAWATI', '3216074711980006', '0', '', 'CIBITUNG', 'Wanita', '', '0000-00-00', '', '', '0', '2017-05-14', 1, '2017-05-21', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170514102608', 23, 'EVA SARI', '2323170400857', '0', '', 'JL. MUTIARA NO 21, PALANGKARAYA', 'Wanita', '', '0000-00-00', '', '', '0', '2017-05-14', 1, '2017-05-21', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170516074850', 33, 'MEYSHI CRISTIANA', '1605015205990001', '0', '', 'JL. JEND SUDIRMAN DUSUN I', 'Wanita', '', '0000-00-00', '', '', '0', '2017-05-09', 1, '2017-05-16', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170523053738', 37, 'FRISKI FEBRIYAN', '1471070502940021', '0', '', 'JL. TENGKU BAY GG UTAMA 1 RT 001/002 SIMPANG 3, BUKIT RAYA', 'Pria', '', '0000-00-00', '', '', '0', '2017-05-16', 1, '2017-05-23', 1, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170525111846', 23, 'EVA SAPUTRI', '134268730001', '0', '', 'KALIMANTAN', 'Wanita', '', '0000-00-00', '', '', '0', '2017-05-24', 1, '2017-05-31', 0, '0');
INSERT INTO daftar_sewa_mingguan (`idPendaftaran`, `idKamar`, `nama`, `noIdentitas`, `Telp`, `email`, `alamat_asal`, `JK`, `tempat_lahir`, `tgl_lahir`, `namaInstansi`, `alamatInstansi`, `telp_instansi`, `tglMulai`, `lama`, `tglAkhir`, `checkout`, `diskon`) VALUES ('20170810163559', 15, 'tes minggu', '12312423', '082123123', '', 'fsfsrefer', 'Pria', '', '0000-00-00', '', '', '0', '2017-08-01', 2, '2017-08-15', 1, '30000');


#
# TABLE STRUCTURE FOR: denda
#

DROP TABLE IF EXISTS denda;

CREATE TABLE `denda` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `hari_ke` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO denda (`id`, `nominal`, `hari_ke`) VALUES (1, '5000', 7);


#
# TABLE STRUCTURE FOR: denda_persen
#

DROP TABLE IF EXISTS denda_persen;

CREATE TABLE `denda_persen` (
  `id` int(3) NOT NULL,
  `range1` int(11) NOT NULL,
  `range2` int(11) NOT NULL,
  `persen` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO denda_persen (`id`, `range1`, `range2`, `persen`) VALUES (1, 1, 10, 5);
INSERT INTO denda_persen (`id`, `range1`, `range2`, `persen`) VALUES (2, 11, 20, 10);
INSERT INTO denda_persen (`id`, `range1`, `range2`, `persen`) VALUES (3, 21, 31, 20);


#
# TABLE STRUCTURE FOR: detildaftar
#

DROP TABLE IF EXISTS detildaftar;

CREATE TABLE `detildaftar` (
  `idPendaftaran` varchar(30) NOT NULL,
  `idAnakKost` varchar(30) NOT NULL,
  `idBiaya` int(11) NOT NULL,
  PRIMARY KEY (`idPendaftaran`,`idAnakKost`,`idBiaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO detildaftar (`idPendaftaran`, `idAnakKost`, `idBiaya`) VALUES ('20170810163317', '45', 4);
INSERT INTO detildaftar (`idPendaftaran`, `idAnakKost`, `idBiaya`) VALUES ('20170810163317', '45', 8);


#
# TABLE STRUCTURE FOR: itemoption
#

DROP TABLE IF EXISTS itemoption;

CREATE TABLE `itemoption` (
  `idCat` int(11) NOT NULL,
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `item` text NOT NULL,
  PRIMARY KEY (`idCat`,`idItem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (1, 1, 'Laki-Laki');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (1, 2, 'Perempuan');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 1, 'Listrik Bulanan');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 2, 'PDAM bulanan');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 3, 'Internet Bulanan');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 4, 'Gaji Satpam');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 5, 'Gaji Admin');
INSERT INTO itemoption (`idCat`, `idItem`, `item`) VALUES (2, 6, 'Gaji Petugas Kebersihan');


#
# TABLE STRUCTURE FOR: kamar
#

DROP TABLE IF EXISTS kamar;

CREATE TABLE `kamar` (
  `IDKAMAR` int(11) NOT NULL AUTO_INCREMENT,
  `LABELKAMAR` varchar(20) NOT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `LUAS` varchar(100) DEFAULT NULL,
  `FASILITAS` text,
  `TARIFHARIAN` double NOT NULL DEFAULT '0',
  `TARIFBULANAN` double NOT NULL DEFAULT '0',
  `TARIFMINGGUAN` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDKAMAR`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (2, '101', 1, '10.24', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (3, '102', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (4, '103', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (5, '104', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (6, '105', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (7, '106', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (8, '107', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (9, '108', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (10, '109', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (11, '110', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (12, '111', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (13, '112', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (14, '113', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (15, '114', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '85000', '1400000', '480000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (16, '115', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '85000', '1400000', '480000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (17, '116', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '85000', '1300000', '480000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (18, '117', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (19, '118', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (20, '201', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (21, '202', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (22, '203', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (23, '204', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (24, '205', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (25, '206', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (26, '207', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (27, '208', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (28, '209', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (29, '210', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (30, '211', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (31, '212', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (32, '213', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (33, '214', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (34, '217', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '85000', '1400000', '480000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (35, '218', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1300000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (36, '219', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (37, '220', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (38, '221', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '90000', '1500000', '515000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (39, '222', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '90000', '1500000', '515000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (40, '223', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '90000', '1500000', '515000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (41, '224', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '90000', '1500000', '515000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (56, '215', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '75000', '1200000', '450000');
INSERT INTO kamar (`IDKAMAR`, `LABELKAMAR`, `KAPASITAS`, `LUAS`, `FASILITAS`, `TARIFHARIAN`, `TARIFBULANAN`, `TARIFMINGGUAN`) VALUES (57, '216', 1, '3.2X3.2', 'AC, TV, Kamar Mandi,1, Meja belajar,1 Kursi Belajar,\r\n1, Tempat Tidur, 1 Bantal', '85000', '1400000', '480000');


#
# TABLE STRUCTURE FOR: kategori
#

DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO kategori (`id`, `nama`, `ket`) VALUES (1, 'Jenis Kelamin', 'Untuk Option List jenis kelamin');
INSERT INTO kategori (`id`, `nama`, `ket`) VALUES (2, 'Jenis Pengeluaran Rutin', 'Untuk Option List Biaya-biaya Pengeluaran Rutin');


#
# TABLE STRUCTURE FOR: kuitansi_var
#

DROP TABLE IF EXISTS kuitansi_var;

CREATE TABLE `kuitansi_var` (
  `id` int(3) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO kuitansi_var (`id`, `nama_kota`, `notes`) VALUES (1, 'YOGYAKARTA', '');


#
# TABLE STRUCTURE FOR: kwh_var
#

DROP TABLE IF EXISTS kwh_var;

CREATE TABLE `kwh_var` (
  `id` int(3) NOT NULL,
  `kwh_tdk_kena_tarif` int(10) DEFAULT NULL,
  `kwh_tarif` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO kwh_var (`id`, `kwh_tdk_kena_tarif`, `kwh_tarif`) VALUES (1, 20, '1425');


#
# TABLE STRUCTURE FOR: owner
#

DROP TABLE IF EXISTS owner;

CREATE TABLE `owner` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_pemilik` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `alamat_usaha` text NOT NULL,
  `telp_tempat_usaha` varchar(40) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO owner (`id`, `nama`, `nama_pemilik`, `alamat`, `telepon`, `hp`, `alamat_usaha`, `telp_tempat_usaha`, `logo`) VALUES (1, 'GRIYA NIRWANA', 'TATAK BRAWIYANTO', 'Harapan Indah claster Aralia Blok HY 39/22 Jakarta', '081288225676', '08129938913', 'Perumahan Griya Nirwana D30 Kampung Klebengan sleman / Jogjakarta', '0274555281', 'Entrepreneur1.jpg');


#
# TABLE STRUCTURE FOR: pemasukan
#

DROP TABLE IF EXISTS pemasukan;

CREATE TABLE `pemasukan` (
  `idTrans` varchar(30) NOT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`idTrans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330073507', '2017-03-30', 'Kamar 106\r\nHendry Supriyadin\r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330074119', '2017-03-30', 'Kamar no 112\r\nEga Haritz Muhammad\r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330074213', '2017-03-30', 'Kamar no 107\r\nFaiz Shabri\r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330080725', '2017-03-30', 'Kamar 101\r\nJames Keiya Budi Arjanto\r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330080824', '2017-03-30', 'Kamar 109\r\nChrist Yeremias Kondorvra\r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330095138', '2017-03-30', 'Kamar no 102\r\nDeddie Marthin Perwira \r\nDp kamar', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170330111858', '2017-03-30', 'Kamar 210\r\nnone\r\nDp kamar ', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170331064339', '2017-03-31', 'Kamar no 221\r\nAisyafa Shafira\r\ndp kamar\r\nvia trf Maybank', '750000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406145940', '2017-04-06', '2SPAGHETTI', '24000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150049', '2017-04-06', '1ROTI BAKAR COKLAT', '6000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150116', '2017-04-06', '2HOT MILO + MARSMELLOW', '16000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150156', '2017-04-06', '1HOT TEA ', '3500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150244', '2017-04-06', '1MILK SHAKE CHOCOLATE + OREO', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150319', '2017-04-06', '1ROTIBAKAR COKLAT KEJU', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150425', '2017-04-06', '1ICE LEMON TEA', '3500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150449', '2017-04-06', '1ICE MILO BLEND', '7000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150513', '2017-04-06', '2KENTANG SOSIS', '20000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406150534', '2017-04-06', '1AQUA BOTOL', '2750', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152003', '2017-04-04', '1YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152034', '2017-04-04', '1AQUA BOTOL', '2750', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152100', '2017-04-04', '1ULTRAMILK 200ML', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152132', '2017-04-05', '1ULTRAMILK 200ML', '4100', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152155', '2017-04-05', '1MOGU - MOGU', '7800', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170406152238', '2017-04-05', '2YAKULT', '5000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407150834', '2017-04-07', '2ICE MILO BLEND', '14000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407152754', '2017-04-07', '3NASI', '9000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407152931', '2017-04-07', '7ICE/HOT TEA', '24500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153054', '2017-04-07', '3ROTI BAKAR COKLAT / KEJU', '18000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153229', '2017-04-07', '2GOOD DAY FLOAT', '12400', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153250', '2017-04-07', '1NU GREEN TEA', '5700', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153309', '2017-04-07', '1VANILA BLUE', '6000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153331', '2017-04-07', '3SPAGHETTI', '36000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153406', '2017-04-07', '5KENTANG SOSIS', '50000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153447', '2017-04-07', '1AQUA BOTOL', '2750', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153504', '2017-04-07', '1MILK SHAKE LYCHEE + BUBBLE', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153530', '2017-04-07', '1MILK SHAKE STRAWBERRY + BUBBLE', '8000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153559', '2017-04-07', '1MILK SHAKE CHOCOLATE + OREO', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153631', '2017-04-07', '1MILK SHAKE STRAWBERRY + OREO', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153712', '2017-04-07', '1MILO 115ML', '2900', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153737', '2017-04-07', '1CHOCOLATE + NATA DE COCO', '8000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153857', '2017-04-07', '2YAKULT', '5000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170407153918', '2017-04-07', '1ABC KCANG HIJAU', '4100', 'JAZZY', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162114', '2017-04-08', '1NASI', '3000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162149', '2017-04-08', '9AQUA BOTOL', '24750', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162229', '2017-04-08', '1POP MIE', '5100', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162300', '2017-04-08', '2ULTRA MILK', '8200', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162329', '2017-04-08', '1MOGU - MOGU', '7800', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162354', '2017-04-08', '1KENTANG SOSIS', '10000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408162426', '2017-04-08', '1BEAR BRAND ', '8400', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170408164709', '2017-04-08', '2ABC EXO MILK', '12000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409161856', '2017-04-09', '7AQUA BOTOL', '19250', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409161949', '2017-04-09', '5SPAGHETTI', '60000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162116', '2017-04-09', '1BLACK COFFEE', '3500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162149', '2017-04-09', '3OMELET', '30000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162224', '2017-04-09', '2TEH HOT / ICE', '7000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162306', '2017-04-09', '1NU GREEN TEA', '5700', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162342', '2017-04-09', '1HYDROCOCO', '5600', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162437', '2017-04-09', '4NASI', '12000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162518', '2017-04-09', '1MILO 115ML', '2900', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162549', '2017-04-09', '2KENTANG SOSIS', '20000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162631', '2017-04-09', '2NASI RAWON', '24000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162801', '2017-04-09', '2ROTI BAKAR KEJU', '12000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162852', '2017-04-09', '1SPAGHETTI SOSIS', '15000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162915', '2017-04-09', '1ICE LEMON TEA', '3500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409162944', '2017-04-09', '1ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163004', '2017-04-09', '1ULTRA ASEM', '4600', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163026', '2017-04-09', '1HOT MILO', '5000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163043', '2017-04-09', '1ROTI BAKAR COKLAT ', '6000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163108', '2017-04-09', '1LOVE JUICE', '6000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163128', '2017-04-09', '1YAKULT', '2500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409163228', '2017-04-09', '1HOT MILO', '5000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410145404', '2017-04-10', '2 OMELET ', '20000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150516', '2017-04-10', '2 KOPI HITAM', '7000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150535', '2017-04-10', '5 KENTANG SOSIS', '50000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150555', '2017-04-10', '1 HOT MILO', '5000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150636', '2017-04-10', '6 TEH PANAS', '21000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150655', '2017-04-10', '2 ROTI BAKAR NUTTELA', '16000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150728', '2017-04-10', '5 NASI RAWON', '60000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150745', '2017-04-10', '1 RAWON', '9000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150800', '2017-04-10', '2 TEMPE GORENG', '6000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150821', '2017-04-10', '1 POP MIE', '5000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150835', '2017-04-10', '4 MILO 115ML', '11600', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150858', '2017-04-10', '3 SPAGETTI', '36000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150916', '2017-04-10', '1 LEMON TEA', '3500', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150935', '2017-04-10', '1 KENTANG GORENG', '3000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410150956', '2017-04-10', '1 NESCAFE VANILA', '4100', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410151033', '2017-04-10', '1 SOSIS GORENG', '6000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410151049', '2017-04-10', '1 MOGU MOGU', '7800', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410151106', '2017-04-10', '1 ULTRA 12ML', '2800', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170410151121', '2017-04-10', '1 BUAVITA', '6800', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411132433', '2017-04-11', '13 LE MINERALE', '27300', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133123', '2017-04-11', '2 ULTRAMILK 125ML, 2 ULTRAMILK 200ML', '13800', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133337', '2017-04-11', '2 BEAR BRAND', '16800', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133406', '2017-04-11', '1 KOPIKO 78C ', '5600', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133427', '2017-04-11', '3 OMELET + 1 OMELET TANPA NASI', '37000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133516', '2017-04-11', '3 KENTANG SOSIS', '30000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133615', '2017-04-11', '3 HOT TEA', '10500', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411133937', '2017-04-11', '3 MILKSHAKE + OREO', '24000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411134049', '2017-04-11', '1 MILKSHAKE STROWBERRY', '6000', 'Teresia Retananta', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411142123', '2017-04-11', '1 HOT MILO + MARSMELLOW', '8000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411142206', '2017-04-11', '1 MILO BLEND', '7000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411142301', '2017-04-11', '1 HYDRO COCOA', '5600', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411142333', '2017-04-11', '6 NASI BEEF TERIYAKI', '102000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170411142439', '2017-04-11', '3 NASI + TELOR', '13000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414024720', '2017-04-12', '1 NASI SOSIS NUGGET', '12000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414024758', '2017-04-12', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414024834', '2017-04-12', '1 HOT MILO', '5000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414024901', '2017-04-12', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414024941', '2017-04-12', '1 MILO 115ML', '2900', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025018', '2017-04-12', '2 SPAGHETTI', '24000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025115', '2017-04-12', '1 NASI RAWON', '12000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025149', '2017-04-12', '2 NASI PUTIH', '6000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025228', '2017-04-12', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025254', '2017-04-12', '1 NESCAFE SMOOVLATTE', '7300', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025324', '2017-04-12', '1 NASI OMELETE', '10000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025350', '2017-04-12', '1 NASI BEEF TERIYAKI', '17000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025414', '2017-04-12', '1 SOSIS', '6000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025434', '2017-04-12', '1 POCARI 250ML', '7000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025502', '2017-04-12', '2 LE MINERAL', '4200', 'DYBOW', 1, '2017-06-22');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025530', '2017-04-13', '1 ROTI BAKAR COKLAT KEJU', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025554', '2017-04-14', '1 LE MINERAL', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025614', '2017-04-13', '1 KOPIKO 78C', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025640', '2017-04-14', '1 TEH JAVANA', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025723', '2017-04-13', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025741', '2017-04-13', '1 POP MIE', '5400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170414025800', '2017-04-13', '1 NESCAFE 200ML', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170416010238', '2017-04-16', 'coba input', '10000', 'admin', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170416010437', '2017-04-16', 'coba 2', '10000', 'admin', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000030', '2017-04-15', '1 ABC JUICE', '5700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000120', '2017-04-15', '2 SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000138', '2017-04-15', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000225', '2017-04-15', '1 MILKSHAKE CHOCOLATE + NATA DE COCO', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000253', '2017-04-15', '1 NASI BEF TERIYAKI', '17000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000331', '2017-04-15', '1 HOT MILO MARSMELLOW', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000403', '2017-04-15', '2 NASI PUTIH', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000417', '2017-04-15', '3 ICE TEA', '10500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000433', '2017-04-15', '1 OMELET NASI', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000447', '2017-04-15', '2 MILKSHAKE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000502', '2017-04-15', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000515', '2017-04-15', '1 NASI SOSIS NUGGET', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000530', '2017-04-15', '1 LE MINERAL', '2100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000552', '2017-04-15', '1 SPAGHETTI SOSIS', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000616', '2017-04-15', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000643', '2017-04-15', '1 POCARI SWEAT', '6900', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001040', '2017-04-16', '2 YOUC1000', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001109', '2017-04-16', '1 SUSU BER BRAND', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001136', '2017-04-16', '2 MOGU MOGU', '15600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001210', '2017-04-16', '1 POCARI SWEAT', '6900', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001237', '2017-04-16', '2 MILKSHAKE OREO', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001307', '2017-04-16', '1 OMELET NASI', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001336', '2017-04-16', '1 NASI SOSIS NUGGET', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001418', '2017-04-16', '1 TEH PANAS', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001502', '2017-04-16', '2 YAKULT', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001551', '2017-04-16', '1 OMELET', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001618', '2017-04-16', '1 NASI RAWON TEMPE', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001644', '2017-04-16', '1 NU MILK TEA', '5800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001715', '2017-04-16', '1 EXO COFFEE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001740', '2017-04-16', '1 POP MIE', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001753', '2017-04-16', '2 SPAGHETTI', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417001813', '2017-04-16', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131334', '2017-04-17', '4 NASI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131404', '2017-04-17', '1 HOT COFFEE MILK', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131419', '2017-04-17', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131440', '2017-04-17', '1 BUAVITA', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131502', '2017-04-17', '1 ULTRAMILK MOCCA', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131536', '2017-04-17', '2 MILO 115ML', '5800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131552', '2017-04-17', '1 MOGU - MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131619', '2017-04-17', '1 NAI RAWON + TEMPE', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131641', '2017-04-17', '1 MILKSHAKE CHOCOLATE + BUBBLE', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131704', '2017-04-17', '2 ROTI BAKAR NUTELLA', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417131721', '2017-04-17', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170419112547', '2017-04-18', '1 roti bakar nutella', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170419112648', '2017-04-18', '1 nasi nugget sosis', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055143', '2017-04-18', '1 buavita', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055209', '2017-04-18', '1 spaghetti', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055237', '2017-04-18', '7 nasi', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055323', '2017-04-18', '1 milo blend', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055350', '2017-04-18', '1 ice tea', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055417', '2017-04-18', '1 ice lemon tea', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055437', '2017-04-18', '3 milk shake', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055501', '2017-04-18', '1 roti bakar keju', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055525', '2017-04-18', '1 kentang sosis', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055549', '2017-04-18', '1 bear brand', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055623', '2017-04-18', '1 tahi goreng petis', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055651', '2017-04-19', '1 buavita', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055713', '2017-04-19', '1 kentang sosis', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055736', '2017-04-19', '2 soup jagung', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055802', '2017-04-19', '1 spaghetti', '1200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055825', '2017-04-19', 'kentang goreng', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420055856', '2017-04-19', '1 bear brand', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420060002', '2017-04-19', '1 ultramilk 200ml', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170420060131', '2017-04-19', '1 pop mie', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030242', '2017-04-20', '3 soup cream jagung', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030313', '2017-04-20', '1 soup cream jagung', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030353', '2017-04-20', '2 nasi ayam bakar sayur oseng', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030419', '2017-04-20', '2 milkshake + bubble', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030443', '2017-04-20', '2 ice tea', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030501', '2017-04-20', '1 spaghetti sosis', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030531', '2017-04-20', '2 nasi', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030547', '2017-04-20', '1 tahu goreng petis', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030606', '2017-04-20', '1 kentang sosis', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170421030626', '2017-04-20', '1 mogu mogu', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014652', '2017-04-21', '5 NASI AYAM BAKAR SAYUR OSENG', '60000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014740', '2017-04-21', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014800', '2017-04-21', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014824', '2017-04-21', '2 HYDRO COCO', '11200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014858', '2017-04-21', '3 ULTRAMILK 200ML', '12300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422014933', '2017-04-21', '3 POP MIE', '15400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015021', '2017-04-21', '1 AQUA 600ML', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015108', '2017-04-21', '3 SPAGHETTI', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015130', '2017-04-21', '1 SOUP CREME JAGUNG', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015150', '2017-04-21', '2 NASI SOSIS NUGGET', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015216', '2017-04-21', '1 MILKSHAKE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015235', '2017-04-21', '1 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015251', '2017-04-21', '1 POCARI 350ML', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015307', '2017-04-21', '1 NESCAFE WHITE COFFEE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015323', '2017-04-21', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015338', '2017-04-21', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015354', '2017-04-21', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015408', '2017-04-21', '1 ABC SARI KACANG HIJAU', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422015432', '2017-04-21', '1 ROTI BAKAR COKALT', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170422052701', '2017-04-18', '15 HARI EXTRA BED', '375000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020719', '2017-04-22', '1 NASI TELOR', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020736', '2017-04-22', '1 SPAGHETTI NUGGET', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020755', '2017-04-22', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020817', '2017-04-22', '1 HOT MILO MASRMELLOW', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020837', '2017-04-22', '2 SPAGHETTI', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020856', '2017-04-22', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020914', '2017-04-22', '2 MILKSHAKE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423020930', '2017-04-22', '1 HOT COFFEEMIX', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423110652', '2017-04-22', '1 POCARI ION', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423110708', '2017-04-22', '1 SPRITE', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133432', '2017-04-23', '2 AQUA 600ML', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133455', '2017-04-23', '3 ULTRAMILK', '12300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133517', '2017-04-23', '4 NASI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133538', '2017-04-23', '1 POCARI SWEAT', '6900', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133557', '2017-04-23', '1 MIZONE', '4400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133613', '2017-04-23', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133628', '2017-04-23', '1 POP MIE', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423133640', '2017-04-23', '1 ROTI BAKAR NUTELLA', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053541', '2017-04-24', '2 NASI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053610', '2017-04-24', '1 HOT COFFEE MIX', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053632', '2017-04-24', '4 NASI OMELETE', '40000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053659', '2017-04-24', '2 HOT MILO MARSMELLOW', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053739', '2017-04-24', '1 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053804', '2017-04-24', '1 MOGU - MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170425053828', '2017-04-24', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063547', '2017-04-25', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063624', '2017-04-25', '2 MILK SHAKE, 1 BUBBLE', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063719', '2017-04-25', '1 SPAGHETTI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063805', '2017-04-25', '3 ICE TEA', '10500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063835', '2017-04-25', '3 ULTRA MILK', '12300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063907', '2017-04-25', '1 LOVE JUICE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063931', '2017-04-25', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426063952', '2017-04-25', '1 COCA COLA', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064020', '2017-04-25', '1 NASI RAWON', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064040', '2017-04-25', '2 NASI AYAM BAKAR', '30000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064123', '2017-04-25', '1 BUAVITA', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064156', '2017-04-25', '1 MIZONE', '4400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064217', '2017-04-25', '1 COOLANT', '6200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064232', '2017-04-25', '1 MIE SEDAP CUP', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170426064247', '2017-04-25', '1 HOT COFFEEMIX', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427040820', '2017-04-27', '4 NASI', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427040848', '2017-04-27', '5 MILKSHAKE + TOPPING', '40000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427040926', '2017-04-27', '3 NASI AYAM BAKAR', '45000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427040956', '2017-04-27', '1 BEAR BRAND', '8400', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041016', '2017-04-27', '1 HYDRO COCO', '5600', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041034', '2017-04-27', '1 ICE LEMON TEA', '4000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041053', '2017-04-27', '2 ICE MILO BLEND', '14000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041122', '2017-04-27', '1 KENTANG SOSIS', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041141', '2017-04-27', '2 ROTI BAKAR COKLAT', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041207', '2017-04-27', '1 SOSIS + 1 OMELETE', '13000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041231', '2017-04-27', '2 ROTI BAKAR NUTELLA', '16000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041301', '2017-04-27', '1 KOPI 78', '5600', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041330', '2017-04-27', '1 BUAVITA', '6800', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170427041342', '2017-04-27', '1 YAKULT', '2500', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084445', '2017-04-27', '2 nasi', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084521', '2017-04-27', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084554', '2017-04-27', '3 MILKSHAKE', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084619', '2017-04-27', '3 ICE MILO BLEND', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084656', '2017-04-27', '1 NASI RAWON', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084722', '2017-04-27', '3 NASI AYAM BAKAR', '45000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084754', '2017-04-27', '2 SPAGHETTI', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084842', '2017-04-27', '1 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428084902', '2017-04-27', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428163822', '2017-04-28', '1 OMELETE', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428164648', '2017-04-28', '2 KENTANG', '10000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428164806', '2017-04-28', '1 LOVE JUICE', '6500', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428164824', '2017-04-28', 'NASI SOSIS NUGGET', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428164932', '2017-04-28', '1 MILKSHAKE CHOCOLATE', '6000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428165041', '2017-04-28', '1 MOGU - MOGU', '7800', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428165431', '2017-04-28', '1 OMELETE', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428165541', '2017-04-28', '1 MILKSHAKE', '6000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428165926', '2017-04-28', '1 CHOCOLATE HILO', '7000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428165950', '2017-04-28', '1 NASI RAWON', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430082927', '2017-04-30', '1 HOT COFFEE MIX', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083010', '2017-04-30', '1 NASI', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083034', '2017-04-30', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083059', '2017-04-30', '1 ENERGEN', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083116', '2017-04-30', '2 SUSU ULTRA 200ML', '8200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083140', '2017-04-30', '1 SUSU ULTRA 125ML', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083158', '2017-04-30', '2 ROTI BAKAR', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083248', '2017-04-30', '1 NASI OMELETE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083312', '2017-04-30', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083327', '2017-04-30', '1 SPAGHETTI SOSIS', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083347', '2017-04-30', '1 HOT LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083432', '2017-04-30', '1 SPAGHETTI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083446', '2017-04-30', '1 OMELETE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083503', '2017-04-30', '1 KENTANG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083517', '2017-04-30', '3 MILKSHAKE + TOPPING', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430083541', '2017-04-30', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430124211', '2017-04-30', 'KOMISI LAUNDRY BULAN APRIL', '39200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430142652', '2017-04-30', '3 POCARI SWEAT', '18900', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430142810', '2017-04-30', '1 TELOR', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430142850', '2017-04-30', '6 OMELETE', '65000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143007', '2017-04-30', '1 BUAVITA', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143037', '2017-04-30', '2 BEAR BRAND', '16800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143121', '2017-04-30', '2 NASI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143200', '2017-04-30', '3 ICE MILO BLEND', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143237', '2017-04-30', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143306', '2017-04-30', '2 ORIGINAL LOVE JUICE', '13000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143350', '2017-04-30', '1 SPRITE', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143414', '2017-04-30', '1 ULTRAMILK 125ML', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143441', '2017-04-30', '3 KENTANG SOSIS', '39000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430143615', '2017-04-30', '1 ENERGEN', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430144102', '2017-04-30', '3 ROTI BAKAR', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430144311', '2017-04-30', '1 NESCAFE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031512', '2017-05-02', '2 HYDROCOCO', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031600', '2017-05-02', '2 BEAR BRAND', '16800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031628', '2017-05-02', '4 POP MIE', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031711', '2017-05-02', '2 ULTRAMILK 200ML', '8200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031743', '2017-05-02', '2 BUAVITA', '13600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031825', '2017-05-02', '6 TEH SOSRO', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503031905', '2017-05-02', '1 YPUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032048', '2017-05-02', '2 LOVE JUICE', '13000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032131', '2017-05-02', '2 OMELETE', '22000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032221', '2017-05-02', '4 POCARI SWEAT', '25000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032308', '2017-05-02', '1 GOOD DAY', '3800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032340', '2017-05-02', '3 LE MINERAL', '6300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032526', '2017-05-02', '3 MOGU MOGU', '23400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032718', '2017-05-02', '2 ICE TEA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032743', '2017-05-02', '1 KOPIKO 78', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032759', '2017-05-02', '1 AQUA', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032816', '2017-05-02', '4 NASI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032854', '2017-05-02', '1 KENTANG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032918', '2017-05-02', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170503032934', '2017-05-02', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504035759', '2017-05-03', '3 OMELETE', '32000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504035851', '2017-05-03', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504035914', '2017-05-03', '1 SPAGHETTI, 1 SPAGHETTI SOSIS, 1 SPAGHETTI KENTANG', '47000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040012', '2017-05-03', '1 BEAR BRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040033', '2017-05-03', '3 POP MIE', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040053', '2017-05-03', '1 ABC KACANG HIJAU', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040114', '2017-05-03', '1 LE MINERAL', '2100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040130', '2017-05-03', '2 MILKSHAKE CHOCOLATE JELLY + 1 MILKSHAKE CHOCOLATE', '22000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040229', '2017-05-03', '1 BEAR BRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040248', '2017-05-03', '4 NASI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040313', '2017-05-03', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040416', '2017-05-03', '2 AQUA', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040434', '2017-05-03', '2 GOOD DAY', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040501', '2017-05-03', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040521', '2017-05-03', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040540', '2017-05-03', '1 BLACK COFFEE', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170504040557', '2017-05-03', '1 MOGU2', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505064854', '2017-05-04', '4 OMELETE', '43000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065043', '2017-05-04', '1 HOT MILO', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065122', '2017-05-04', '3 ICE TEA', '10500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065235', '2017-05-04', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065433', '2017-05-04', '3 MILKSHAKE + 1 OREO', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065637', '2017-05-04', '1 COOLANT', '6200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065708', '2017-05-04', '7 NASI KARE AYAM', '105000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065905', '2017-05-04', '1 ULTRAMILK', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505065949', '2017-05-04', '1 BEAR BRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070022', '2017-05-04', '2 HYDROCOCO', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070107', '2017-05-04', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070121', '2017-05-04', '1 KOPIKO 78', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070232', '2017-05-04', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070302', '2017-05-04', '2 AQUA', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070338', '2017-05-04', '1 BUAVITA', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070603', '2017-05-04', '2 NESCAFE', '8200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070639', '2017-05-04', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070655', '2017-05-04', '1 GOOD DAY', '6200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505070841', '2017-05-04', '1 SARI ASEM', '4600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090449', '2017-05-05', '4 AQUA', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090532', '2017-05-05', '1 MOGU MOOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090557', '2017-05-05', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090616', '2017-05-05', '2 NASI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090647', '2017-05-05', '2 ICE TEA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090705', '2017-05-05', '1 KENTANG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090728', '2017-05-05', '3 OMELETE', '34000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090810', '2017-05-05', '3 SPAGHETTI SOSIS, 2 SPAGHETTI', '78000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090926', '2017-05-05', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506090952', '2017-05-05', '1 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091009', '2017-05-05', '1 BEAR BRAND', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091035', '2017-05-05', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091057', '2017-05-05', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091117', '2017-05-05', '1 RB COKLAT KEJU, 2 RB KEJU', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091157', '2017-05-05', '1 MILKSHAKE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170506091218', '2017-05-05', '1 ULTRAMILK', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507050037', '2017-05-07', 'EXTRA BED 6 HARI KAMAR 214', '150000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507050058', '2017-05-06', '1 BER BRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052104', '2017-05-06', '2 YOUC1000', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052120', '2017-05-06', '2 POP MIE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052144', '2017-05-06', '5 AQUA', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052209', '2017-05-06', '2 GOOD DAY', '7600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052422', '2017-05-06', '2 NASI OMELETE', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052522', '2017-05-06', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052604', '2017-05-06', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052636', '2017-05-06', '2 SPAGHETTI', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052705', '2017-05-06', '2 ICE COFFEE', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507052812', '2017-05-06', '5 MILKSHAKE + 3 TOPPING', '39000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507053354', '2017-05-06', '5 NASI SEMUR DAGING', '85000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507053758', '2017-05-06', '1 ULTRA MILK', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507053832', '2017-05-06', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507053905', '2017-05-06', '1 NASI SOSIS', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507054041', '2017-05-06', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507054057', '2017-05-06', '1 NASI SOSIS TELOR NUGGET', '17000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507054202', '2017-05-06', '2 BUAVITA', '13600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507054229', '2017-05-06', '1 ABC KACANG HIJAU', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508063150', '2017-05-06', 'listrik periode 6 april - 6 mei 2017', '98000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065206', '2017-05-07', '7 OMELTE', '74000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065359', '2017-05-07', '5 NASI', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065512', '2017-05-07', '2NASI SEMUR DAGING', '34000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065545', '2017-05-07', '3 ICE TEA', '10500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065619', '2017-05-07', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065648', '2017-05-07', '1 HOT MILO MARSMELLOW', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065716', '2017-05-07', '1 MILKSHAKE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065742', '2017-05-07', '1ULTRAMILK 125ML', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065816', '2017-05-07', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065839', '2017-05-07', '1 NESCAFE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508065956', '2017-05-07', '3 AQUA', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070031', '2017-05-07', '2 ICE MILO BLEND', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070054', '2017-05-07', '1 POCARI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070153', '2017-05-07', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070323', '2017-05-07', '1 LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070343', '2017-05-07', '1 PORSI SOSIS', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070402', '2017-05-07', '1 GOOD DAY', '3800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070417', '2017-05-07', '1 PORSI KENTANG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508070438', '2017-05-07', '1 LE MINERAL', '2100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510042928', '2017-05-08', '3 NASI RAWON', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510043054', '2017-05-08', '1 BUAVITA', '6800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510043120', '2017-05-08', '1 KENTANG GORENG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510043157', '2017-05-08', '2 ULTRA MILK 200ML, 1 ULTRAMILK 125ML', '11000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510043257', '2017-05-08', '1 MOGU2', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510044121', '2017-05-08', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510044134', '2017-05-08', '1 TEH KOTAK', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045028', '2017-05-08', '1 PORSI SOSIS', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045051', '2017-05-08', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045117', '2017-05-08', '1 NASI SOSIS NUGGET', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045216', '2017-05-08', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045306', '2017-05-08', '3 YAKULT', '7500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510045424', '2017-05-08', '1 SPAGHETTI, 2 SPAGHETTI SOSIS', '48000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510051733', '2017-05-08', '1 HYDROCOCO', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510051750', '2017-05-08', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510051811', '2017-05-08', '1 MILKSHAKE', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052251', '2017-05-08', '2 NASI OMELETE, 1 OMELETE', '32000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052314', '2017-05-08', '1 NESCAFE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052335', '2017-05-08', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052457', '2017-05-08', '1 ABC KACANG HIJAU', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052521', '2017-05-09', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052855', '2017-05-08', '2 ICE COFFEE', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052919', '2017-05-09', '3 ICE LEMON TEA', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510052941', '2017-05-09', '3 NESCAFE', '12300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053030', '2017-05-09', '1 SPAGHETTI, 1 SPAGHETTI SOSIS', '30000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053538', '2017-05-09', '3 NASI OMELET', '30000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053626', '2017-05-09', '2 POCARI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053653', '2017-05-09', '3 HYDROCOCO', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053724', '2017-05-09', '1 HOT COFFEE MILK', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053744', '2017-05-09', '2 MILKSHAKE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053805', '2017-05-09', '3 BEAR BRAND', '25200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053840', '2017-05-09', '2 TEH KOTAK', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510053954', '2017-05-09', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510054040', '2017-05-09', '1 AQUA', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510111628', '2017-05-09', '1 NASI RAWON', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510111647', '2017-05-09', '1 ROTI BAKAR COKLAT', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511071255', '2017-05-10', '1 NASI OMELETE 1/2 + KENTANG', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511071425', '2017-05-10', '6 NASI', '3000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511071817', '2017-05-10', '6 NASI', '18000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511071838', '2017-05-10', '1 NESCAFE', '4100', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072144', '2017-05-10', '2 HYDRO COCO', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072251', '2017-05-10', '3 MILKSHAKE + 1 JELLY', '20000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072328', '2017-05-10', '1 PORSI SOSIS', '10000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072347', '2017-05-10', '2 ICE TEA 1 HOT TEA', '10500', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072446', '2017-05-10', '1 ULTRAMILK', '4100', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072514', '2017-05-10', '1 KOPIKO 78', '5600', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072541', '2017-05-10', '1 POCARI', '6000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072559', '2017-05-10', '1 SARI ASEM', '4600', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072620', '2017-05-10', '1 ABC KACANG IJO', '4100', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072646', '2017-05-10', '1 OMELET NASI + 1 OMELET', '22000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072719', '2017-05-10', '1 SPAGETTHI , SPAGHETTI SOSIS', '30000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072754', '2017-05-10', '1 KENTANG SOSIS', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072812', '2017-05-10', '1 BEARBRAND', '8400', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511072831', '2017-05-10', '1 ICE MILO BLEND', '7000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170512075913', '2017-05-11', '1 PAX YAKULT', '12000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170512080014', '2017-05-11', '3 POP MIE', '15000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513023509', '2017-05-12', '2 HOT / ICE TEA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513023731', '2017-05-12', '2 ABC SARI KACANG HIJAU', '7600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513023924', '2017-05-12', '1 KOPIKO 78', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513023949', '2017-05-12', '1 TEH KOTAK SOSRO', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024018', '2017-05-12', '2 OMELETE NASI, 2 OMELETE', '44000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024148', '2017-05-12', '1 SPAGHETTI, 4 SPAGHETTI SOSIS', '84000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024401', '2017-05-12', '5 BEAR BRAND', '42000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024535', '2017-05-12', '3 NESCAFE', '12300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024605', '2017-05-12', '1 PAX YAKULT', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024624', '2017-05-12', '5 MILKSHAKE + 3 TOPPING', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024747', '2017-05-12', '3 POP MIE', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024809', '2017-05-12', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024831', '2017-05-12', '2 ICE MILO BLEND', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024858', '2017-05-12', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024918', '2017-05-12', '1 NESCAFE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513024934', '2017-05-12', '1 MILO 190ML', '4700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513025351', '2017-05-12', '1 KOPIKO 78', '5600', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513025802', '2017-05-12', '1 TEH KOTAK SOSRO', '3000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513031144', '2017-05-04', 'BIAYA LISTRIKA DINA K.212 PERIODE 3 APRIL 2017 - 3 MEI 2017', '42750', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514061021', '2017-05-13', '2 MILO 190ML', '9400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514061828', '2017-05-13', '2 HYDRO COCO', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514061900', '2017-05-13', '4 ULTRAMILK', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514061945', '2017-05-13', '5 PORSI KENTANG', '25000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062206', '2017-05-13', '6 NASI', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062317', '2017-05-13', '4 ICE MILO BLEND', '28000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062348', '2017-05-13', '4 ICE TEA', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062428', '2017-05-13', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062501', '2017-05-13', '3 NESTLE PURE LIFE', '7500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062556', '2017-05-13', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062626', '2017-05-13', '1 MILKSHAKE + TOPPING', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062654', '2017-05-13', '1 SPAGHETTI SOSIS', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062725', '2017-05-13', '2 TEH PUCUK HARUM', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062803', '2017-05-13', '1 SPAGHETTI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514062831', '2017-05-13', '2 POP MIE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514063002', '2017-05-13', '1 KOPIKO 78', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514063314', '2017-05-13', '1 TEH PUCUK', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514063329', '2017-05-13', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515123820', '2017-05-14', '3 OMELETE NASI', '30000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515123937', '2017-05-14', '2 ICE TEA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515124036', '2017-05-14', '3 BUAVITA', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515124542', '2017-05-14', '3 ULTRAMILK 250 ML', '13500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515124612', '2017-05-14', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515124705', '2017-05-14', '3 OMELETE', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125335', '2017-05-14', '3 KENTANG SOSIS', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125409', '2017-05-14', '1 MILO 190ML', '4700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125621', '2017-05-14', '5 NESTLE PURE LIFE', '12500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125717', '2017-05-14', '1 PORSI KENTANG GORENG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125801', '2017-05-14', '1 MOGU2', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515125926', '2017-05-14', '1 MILKSHAKE + NATADECOCO', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130157', '2017-05-14', '4 NASI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130234', '2017-05-14', '1 TEH BOTOL KOTAK', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130304', '2017-05-14', '1 HYDROCOCO', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130329', '2017-05-14', '9 NASI SOTO, 1 SOTO', '118000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130427', '2017-05-14', '3 SPAGHETTI', '36000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130511', '2017-05-14', '1 BLACK COFFEE', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130532', '2017-05-14', '2 TEH PUCUK', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130614', '2017-05-14', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170515130640', '2017-05-14', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041350', '2017-05-15', '1 COCA COLA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041431', '2017-05-15', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041527', '2017-05-15', '2 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041551', '2017-05-15', '2 POP MIE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041627', '2017-05-15', '1 PORSI KENTANG GORENG', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041737', '2017-05-15', '1 BLACK COFFEE', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516041810', '2017-05-15', '2 NESTLE PURE LIFE', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042138', '2017-05-15', '2 BEAR BRAND', '16800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042418', '2017-05-15', '1 YOUC 1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042502', '2017-05-15', '1 MILO 190ML', '4700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042607', '2017-05-15', '1 HYDRO COCOC', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042713', '2017-05-15', '1 PULPY ORANGE', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516042937', '2017-05-15', '4 NASI SOTO + SOTO', '58000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043052', '2017-05-15', '3 MILKSHAKE + 1 TOPPING', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043138', '2017-05-15', '2 LEMON TEA', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043224', '2017-05-15', '1 JERUK NIPIS PANAS', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043336', '2017-05-15', '3 NASI GORENG TELOR', '45000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043443', '2017-05-15', '1 TEH KOTAK', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043525', '2017-05-15', '1 ICE MILO BLEND', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043614', '2017-05-15', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043646', '2017-05-15', '1 KENTANG SOSIS', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043704', '2017-05-15', '1 ULTRA 125ML', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043725', '2017-05-15', '1 NASI', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043739', '2017-05-15', '1 ULTRAMILK 250ML', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043810', '2017-05-15', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043828', '2017-05-15', '1 KOPIKO', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170516043843', '2017-05-15', '1 SPAGHETTI SOSIS', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151531', '2017-05-16', '1 FANTA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151547', '2017-05-16', '2 LOVE JUICE', '13000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151602', '2017-05-16', '4 NASI GORENG', '57000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151728', '2017-05-16', '1 TEH KOTAK', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151814', '2017-05-16', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151852', '2017-05-16', '1 NESCAFE', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517151927', '2017-05-16', '1 ABC KACANG HIJAU', '3700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152009', '2017-05-16', '2 NASI SOTO', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152036', '2017-05-16', '5 ICE TEA', '17500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152110', '2017-05-16', '1 ULTRA MILK', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152143', '2017-05-16', '2 MILKSHAKE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152222', '2017-05-16', '1 PULPY', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152246', '2017-05-16', '1 COCA COLA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152309', '2017-05-16', '3 YOUC 1000', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152333', '2017-05-16', '1 ULTRAMILK', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517152359', '2017-05-16', '1 HYDROCOCO', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517153618', '2017-05-16', '2 POPMIE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170518090747', '2017-05-18', 'EXTRABED 8 HARI K.215 DAN K.216', '200000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519102923', '2017-05-17', '1 ABC KACANG HIJAU', '3700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519102939', '2017-05-17', '3 SPRITE', '18600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519103029', '2017-05-17', '2 COCA COLA', '10400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519103323', '2017-05-17', '1 PULPY', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519103540', '2017-05-17', '1 BUAVITA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519103601', '2017-05-17', '1 BEARBRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104044', '2017-05-17', '1 YAKULT', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104114', '2017-05-17', '2 YOUC1000', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104138', '2017-05-17', '3 KENTANG', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104203', '2017-05-17', '1 SPAGHETTI', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104224', '2017-05-17', '1 ICE LEMON TEA', '4000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104245', '2017-05-17', '1 TELOR OMELETE', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104422', '2017-05-17', '1 SOSIS', '1000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104433', '2017-05-17', '1 HYDROCOCO', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104513', '2017-05-17', '1 ICE TEA', '3500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104557', '2017-05-17', '1 SARI ASEM', '4600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104614', '2017-05-17', '2 MOGU2', '15600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104638', '2017-05-17', '1 FANTA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104822', '2017-05-17', '1 FANTA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519104838', '2017-05-17', '1 TEH KOTAK', '3000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105557', '2017-05-18', '1 ULTRAMILK', '2800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105701', '2017-05-18', '2 PURELIFE', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105746', '2017-05-18', '3 ROTI BAKAR', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105821', '2017-05-18', '1 BEARBRAND', '8400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105853', '2017-05-18', '1 NASI GORENG TELOR CEPLOK', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519105924', '2017-05-18', '2 KENTANG SOSIS', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110000', '2017-05-18', '4 ICE TEA', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110027', '2017-05-18', '2 MILKSHAKE', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110056', '2017-05-18', '2 GOOD DAY', '7600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110151', '2017-05-18', '2 NASI OMELETE', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110217', '2017-05-18', '3 NASI', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110252', '2017-05-18', '1 PULPY ORANGE', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110322', '2017-05-18', '1 NASI SOTO', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110345', '2017-05-18', '1 ICE COFFEE', '400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110401', '2017-05-18', '1 SOSIS GORENG', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110423', '2017-05-18', '1 VEGIE FRUIT', '7200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110440', '2017-05-18', '1 SPAGHETTI, 1 SPAGHETTI SOSIS', '30000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110515', '2017-05-18', '1 NASI GORENG', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110529', '2017-05-18', '2 NASI SOSIS NUGGET', '26000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110549', '2017-05-18', '1 NASI OMELETE SOSIS', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110608', '2017-05-18', '2 ICE LEMON TEA', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110625', '2017-05-18', '1 LOVE JUICE', '6500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170519110642', '2017-05-18', '1 HOT MILO', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062303', '2017-05-19', '5 NASI RAWON', '75000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062343', '2017-05-19', '2 BEAR BRAND', '16800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062403', '2017-05-19', '2 ICE TEA', '7000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062425', '2017-05-19', '1 FANTA', '5200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062505', '2017-05-19', '1 NASI OMELETE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062529', '2017-05-19', '2 HYDRO COCO', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062549', '2017-05-19', '1 MOGU MOGU', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062608', '2017-05-19', '1 PURE LIFE NESTLE', '2500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062631', '2017-05-19', '2 NASI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062650', '2017-05-19', '1 HOT MILO', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170520062708', '2017-05-19', '1 NASI GORENG', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522042645', '2017-05-22', 'PEMASUKAN EXTRABED', '675000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522094411', '2017-05-20', '1 SPAGHETTI SOSIS', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522094424', '2017-05-20', '1 KENTANG SOSIS', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522094903', '2017-05-20', '3 ICE TEA', '13500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522094957', '2017-05-20', '1 NESCAFE UHT', '4100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522095750', '2017-05-20', '1 ROTI BAKAR NUTELLA', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522095847', '2017-05-20', '3 MILKSHAKE', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522095918', '2017-05-20', '1 MOGU2', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522095947', '2017-05-20', '1 KENTANG', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522101605', '2017-05-20', '1 1/2 KENTANG', '9000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522101653', '2017-05-20', '1 OMELET', '14000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522101913', '2017-05-20', '4 NASI SOSIS NUGGET', '56000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102548', '2017-05-20', '1 TEH KOTAK', '3200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102624', '2017-05-20', '4 NESTLE PURE LIFE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102722', '2017-05-20', '3 YAKULT', '7500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102758', '2017-05-20', '3 POCARI SWEAT', '18000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102824', '2017-05-20', '1 NASI GORENG TELOR CEPLOK', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522102913', '2017-05-20', '2 YOUC1000', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170522103010', '2017-05-20', '1 PULPY ORANG', '7800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523060550', '2017-05-22', '3 POP MIE', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523060617', '2017-05-22', '4 NESTLE PURE LIFE', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523060751', '2017-05-22', '1 ICE COFFEE BLEND', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523060854', '2017-05-22', '2 MILKSHAKE', '16000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523060935', '2017-05-22', '3 MOGU MOGU', '23400', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061357', '2017-05-22', '2 ES TEH', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061550', '2017-05-22', '2 NASI OMELETE', '24000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061635', '2017-05-22', '2 ICE LEMON TEA', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061713', '2017-05-22', '1 POCARI', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061851', '2017-05-22', '1 SPRITE', '4500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061914', '2017-05-22', '1 SOUP JAGUNG', '10000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523061946', '2017-05-22', '1 ABC KACANG HIJAU', '3700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062013', '2017-05-22', '1 SPAGHETTI', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062032', '2017-05-22', '1 YOUC1000', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062051', '2017-05-22', '1 NASI RAWON', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062106', '2017-05-22', '2 BEAR BRAND', '16800', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062344', '2017-05-22', '1 NASI RAWON', '15000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062417', '2017-05-22', '1 NASI GORENG', '12000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170523062428', '2017-05-22', '1 SOSIS GORENG', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112405', '2017-05-23', '3 ES TEH', '13000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112703', '2017-05-23', '1 KOPIKO', '5600', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112809', '2017-05-23', '3 BUAVITA', '21000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112838', '2017-05-23', '1 KENTANG GORENG', '6000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112921', '2017-05-23', '2 SOUP JAGUNG', '20000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525112954', '2017-05-23', '4 NASI RAWON', '57000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113050', '2017-05-23', '1 ROTI BAKAR', '8000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113113', '2017-05-23', '1 NASI SOSIS NUGGET', '14000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113313', '2017-05-23', '2 NESTLE PURE LIFE', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113351', '2017-05-23', '2 ULTRAMILK', '9000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113411', '2017-05-23', '1 ICE COFFEE\n1 KOPI HITAM \n3 BEAR BRAND\n1 FANTA\n3 YOUC 1000\n1 NASI\n1 ICE MILO BLEND\n2 NESTLE PURE LIFE\n3 MOGU MOGU\n1 SPAGHETTI SOSIS\n1 NASI SOSIS\n2 NESCAFE', '136500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170525113932', '2017-05-24', '2 SOUP JAGUNG\n3 BUAVITA\n2 YOUC1000\n1 ES TEH\n9 AIR MINERAL VIT\n1 MOGU MOGU\n2 HYDRO COCO\n2 POP MIE\n1 NASI RAWON\n1 ULTRA\n1 ULTRA MINI\n3 BEAR BRAND\n1 HOT LEMON TEA\n1 ROTI BAKAR', '169300', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170526112907', '2017-05-25', '1 YOUC1000\n1 BUAVITA\n1 SPAGHETTI\n2 TELOR\n2 YAKULT\n1 BEAR BRAND\n1 NASI SOSIS NUGGET\n2 NESCAFE\n1 MILO KECIL\n1 VIT', '73100', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170526114043', '2017-05-26', 'LISTRIK ALAU K.213', '74000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170527101627', '2017-05-26', '2 HYDRO COCO\n1 SPAGHETTI SOSIS\n5 SPAGHETTI\n2 ES TEH\n2 LEMON TEA\n3 BUAVITA\n1 PULPY\n4 BEAR BRAND\n1 TEH KOTAK\n1 YOUC 1000\n1 OMELETE TOK\n1 NASI OMELETE\n1 POP MIE\n1 KENTANG SOSIS\n3 ULTRAMILK\n2 MOGU MOGU\n3 ABC KACANG HIJAU\n1 KENTANG GORENG\n1 FANTA\n2 NESCAFE\n1 MILO 115 ML', '288200', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170527102856', '2017-05-26', 'PRINT WARNA', '5000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170527122805', '2017-05-26', 'DENDA KETERLAMBATAN PEMBAYARAN K.104', '85000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pemasukan (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170531090559', '2017-05-30', '7 POP MIE\n1 PULPY\n1 SPRITE\n15 ES CAMPUR\n1 SOSIS JUMBO\n1 NASI OMEIS\n2 NASI GORENG + CEPLOK TELOR\n1 OMEIS\n2 ULTRA\n3 HYDROCOCO\n1 BUAVITA\n1 YOUC 1000\n1 HOT TEA\n1 MILO 115ML\n1 OMELET NASI\n1 MILKSHAKE + TOPPING\n1 ROTI BAKAR COKLAT KEJU\n1 OMEIS + KENTANG \n1 SPAGHETTI\n1 KENTANG', '352600', 'DYBOW', 1, '2017-06-29');


#
# TABLE STRUCTURE FOR: pendaftaran
#

DROP TABLE IF EXISTS pendaftaran;

CREATE TABLE `pendaftaran` (
  `IDPENDAFTARAN` varchar(20) NOT NULL,
  `IDANAKKOST` varchar(50) NOT NULL,
  `IDKAMAR` varchar(50) NOT NULL,
  `TGLDAFTAR` date DEFAULT NULL,
  `tglMulai` date DEFAULT NULL,
  `checkout` int(2) NOT NULL DEFAULT '0',
  `diskon` double NOT NULL DEFAULT '0',
  `kwh_awal` double DEFAULT '0',
  `deposit` double DEFAULT '0',
  PRIMARY KEY (`IDPENDAFTARAN`),
  KEY `FK_CATAT_KAMAR_` (`IDKAMAR`),
  KEY `FK_MENDAFTAR` (`IDANAKKOST`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328093537', '1', '25', '2017-03-20', '2017-03-23', 0, '0', '7', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328111702', '2', '35', '2017-03-24', '2017-03-24', 0, '0', '9', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328112452', '3', '40', '2017-03-22', '2017-03-28', 1, '0', '17', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328123636', '4', '26', '2017-03-28', '2017-03-29', 0, '0', '7', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328124252', '5', '36', '2017-03-28', '2017-03-30', 0, '0', '5', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170328125118', '6', '30', '2017-03-28', '2017-03-30', 0, '0', '9', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170329081437', '7', '9', '2017-03-29', '2017-04-01', 0, '0', '21', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330035100', '8', '11', '2017-03-29', '2017-03-30', 1, '0', '17', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330071403', '9', '7', '2017-03-30', '2017-05-02', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330072103', '10', '13', '2017-03-30', '2017-05-02', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403095649', '24', '16', '2017-04-03', '2017-04-11', 0, '0', '20', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330072502', '12', '8', '2017-03-30', '2017-04-01', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330074924', '13', '2', '2017-03-30', '2017-04-15', 0, '0', '24', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330080200', '14', '10', '2017-03-30', '2017-04-03', 0, '0', '14', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330082839', '15', '5', '2017-03-30', '2017-04-01', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170330093633', '16', '3', '2017-03-30', '2017-04-14', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403094024', '23', '32', '2017-04-03', '2017-04-20', 0, '0', '11', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170331064033', '18', '38', '2017-03-31', '2017-04-24', 0, '0', '35', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170331074015', '19', '34', '2017-03-31', '2017-04-30', 0, '0', '41', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170401043713', '20', '29', '2017-04-01', '2017-04-01', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403090917', '22', '41', '2017-04-03', '2017-04-03', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403110556', '25', '27', '2017-04-03', '2017-04-13', 0, '0', '17', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403111129', '26', '28', '2017-04-03', '2017-04-13', 0, '0', '17', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170403112730', '27', '31', '2017-04-03', '2017-04-03', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170404110539', '28', '17', '2017-04-04', '2017-04-07', 0, '0', '19', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170405025237', '29', '8', '2017-04-05', '2017-04-17', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170405052440', '30', '33', '2017-04-05', '2017-04-07', 1, '0', '9', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170406125424', '31', '20', '2017-04-06', '2017-04-06', 1, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170408111349', '32', '5', '2017-04-08', '2017-05-01', 0, '0', '64', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170411000516', '33', '3', '2017-04-11', '2017-04-14', 0, '0', '21', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170411122941', '34', '41', '2017-04-11', '2017-04-21', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170416231714', '35', '39', '2017-04-15', '2017-04-15', 0, '0', '41', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170417100041', '36', '24', '2017-04-17', '2017-08-01', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170430120839', '38', '11', '2017-04-30', '2017-04-29', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170503020618', '39', '14', '2017-05-03', '2017-05-03', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170504115315', '40', '12', '2017-05-04', '2017-05-04', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170510061538', '41', '20', '2017-05-10', '2017-05-10', 0, '0', '78', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170518092132', '42', '31', '2017-05-18', '2017-05-18', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170519104941', '43', '8', '2017-05-19', '2017-05-18', 0, '0', '39', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170523112056', '44', '18', '2017-05-23', '2017-05-23', 0, '0', '0', '0');
INSERT INTO pendaftaran (`IDPENDAFTARAN`, `IDANAKKOST`, `IDKAMAR`, `TGLDAFTAR`, `tglMulai`, `checkout`, `diskon`, `kwh_awal`, `deposit`) VALUES ('20170810163317', '45', '6', '2017-08-10', '2017-08-10', 0, '50000', '0', '0');


#
# TABLE STRUCTURE FOR: pengeluaran_ins
#

DROP TABLE IF EXISTS pengeluaran_ins;

CREATE TABLE `pengeluaran_ins` (
  `idTrans` varchar(30) NOT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`idTrans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170331071116', '2017-03-31', 'Cancel DP kamar 107\r\nFaiz Shabri', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170331071146', '2017-03-31', 'Cancel kamar no 116\r\nAloysius Bruno\r\n', '150000', 'Teresia Retananta', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409024042', '2017-04-09', 'CANCEL 3 HARI SEWA KAMAR 224', '270000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170409094208', '2017-04-09', 'CANCEL DP KAMAR 224', '150000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170416010552', '2017-04-16', 'Release coba', '20000', 'admin', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417000825', '2017-04-14', 'SALAH INPUT NOMINAL LE MINERAL', '18900', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170417003457', '2017-04-17', 'CANCEL ROSDA (KELEBIHAN INPUT)', '1500000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170423014902', '2017-04-21', 'salah input harian Drs. Ilham nur lase', '150000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428153722', '2017-04-28', 'PEMBELIAN ALAT-ALAT DAPUR', '2533170', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160242', '2017-04-28', 'BIKIN STEMPEL INDEKOS', '130000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160308', '2017-04-28', 'BENSIN JENSET', '42500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160336', '2017-04-28', 'CETAK DAN LAMINATING KARTU PARKIR', '150000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160555', '2017-04-28', 'TEH DAN JERUK NIPIS', '19000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160612', '2017-04-28', 'BAJU SATPAM', '370000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160632', '2017-04-28', '2 TABUNG LPG', '775000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160652', '2017-04-28', 'SERVICE MOTOR', '175000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160709', '2017-04-28', 'KASBON DARMAJI', '250000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160732', '2017-04-28', 'BELANJA 16 PORSI RAWON, 21 PORSI SPAGHETTI', '347000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428160803', '2017-04-28', 'BELANJA BAHAN JUALAN', '442760', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161041', '2017-04-28', 'BELI LAMPU, STICKER, DISPENSER SATPAM', '228500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161114', '2017-04-28', 'KASBON DARMAJI', '1500000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161144', '2017-04-28', 'BELI BAHAN PERBAIKAN POMPA, LAMPU, STICKER', '595000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161226', '2017-04-28', 'BELI STOCK MINUMAN', '321900', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161602', '2017-04-28', 'KASBON GONDRONG', '100000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161623', '2017-04-28', 'BELANJA BAHAN AYAM TERIYAKI, SOSIS, KENTANG, TELUR,DLL', '804000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161709', '2017-04-28', 'PEWANGI RUANGAN DAN HIASAN MEJA', '371000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161752', '2017-04-28', 'KASBON GONDRONG', '200000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161812', '2017-04-28', 'KASBON AJID', '500000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428161829', '2017-04-28', 'PEWANGI RUANGAN, LAUNDRY SPREI, LAMINATING, PITA PRINTER', '718900', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162056', '2017-04-28', '8 POTONG SPREI', '760000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162117', '2017-04-28', 'BAYAR LISTRIK BLN APRIL 2017', '2100000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162143', '2017-04-28', 'BAYAR INTERNET APRIL 2017', '484200', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162205', '2017-04-28', 'ONGKOS PLAMIR TEMBOK BELAKANG 2 HARI', '160000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162247', '2017-04-28', 'KASBON GONDRONG', '250000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162316', '2017-04-28', 'PENGAMBILAN KASBON AJID REF BS 03', '500000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162412', '2017-04-28', 'KASBON AJID', '1000000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162434', '2017-04-28', 'KASBON GONDRONG', '100000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162452', '2017-04-28', 'KASBON AJID', '1000000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162510', '2017-04-28', '2 SET TEMPAT TIDUR + MEJA HAMBALAN', '5970000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162550', '2017-04-28', 'SIKU, FIBER DENABOL DLL UTK BIKIN JEMURAN', '960500', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162639', '2017-04-28', 'NUGET, SOSIS, MINUMAN2, DAGING SAPI, UNTUK RAWON DAN AYAM BAKAR', '871867', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162714', '2017-04-28', 'FOTO COPY', '5000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162915', '2017-04-28', 'BAUT', '15000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428162951', '2017-04-28', 'UD MAYAR DIESEL', '73000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428163013', '2017-04-28', 'BENSIN', '45000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428163037', '2017-04-28', 'BELI NASI', '20000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428163048', '2017-04-28', 'PLAZA AGRO GADJAH MADA', '29000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170428163118', '2017-04-28', 'BELANJA BAHAN MAKAN MINUM', '255000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170429015213', '2017-04-29', 'SALAH INPUT MINGGUAN MONICA 22APRIL - 30 APRIL 2017', '900000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430074430', '2017-04-30', 'monic bulan april', '1500000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430074951', '2017-04-30', 'cek out leocarlo 110', '1300000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430105518', '2017-04-30', 'SALAH INPUT KELVIN 30 APRIL 2017', '1300000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430105637', '2017-04-30', 'SALAH INPUT KELVIN 30 APRIL 2017', '1300000', 'JAZZY', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112554', '2017-04-30', 'BELI ROTI', '10500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112611', '2017-04-30', 'BELI BERAS', '12200', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112627', '2017-04-30', 'KASBON MAS GONDRONG', '50000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112644', '2017-04-30', 'BELI ES BATU', '10000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112700', '2017-04-30', 'BELI TELUR', '17500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112713', '2017-04-30', 'UANG BELI SARAPAN SATPAM, DAN ADEK', '20000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112741', '2017-04-30', 'BELI BAUT ROTING', '30000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430112759', '2017-04-30', 'BELI TESPEN', '15000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430124437', '2017-04-30', 'LAUNDRY', '8700', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430124511', '2017-04-30', 'KK16\nBELANJA MAKAN + MINUM 567.600\n1 TABUNG LPG 100.000\nBENSIN 1 BULAN 282.000', '949600', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430124630', '2017-04-30', 'KK17\nPALEM, KERANJANG, POT, MEDIA 285.000\n1 TEMPAT SAMPAH 39.500', '324500', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170502041549', '2017-04-01', 'SALA INPUT 1 April Naura Fahira', '150000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505075503', '2017-05-05', 'KK19\n\nBELI BAUT ROTING, RECEIVER, TESPEN, WALLPAPER Rp. 159.000\nKONSUMSI UNTUK PERSEKUTUAN DOA DAN TALI ASIH PENDETA Rp. 860.500\nALAT TELKOM MIKROTIK Rp. 1.500.000', '2519500', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505075718', '2017-05-05', 'KK 20\n\nBAHAN MAKAN DAN MINUM', '291119', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505075811', '2017-05-05', 'KK21\n\nSTICKER KAMAR Rp. 49.000\nBUANG PUING DAN TENAGANYA Rp. 750.000\nKIRIM DOKUMEN Rp. 37.000', '836000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505080018', '2017-05-05', 'KK 22\n\nKURSI TINGGI BUAT KURSI ADMIN', '125000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170505080055', '2017-05-05', 'KK23\n\nBELANJA BAHAN2 MENU KARE AYAM,DLL', '495515', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170507045403', '2017-05-07', 'CHECK OUT 214 A.N THERESSA', '1300000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508095739', '2017-05-08', 'KK24\n\nBELANJA BAHAN RAWON, SEUR DAGING, SOSIS\nBELANJA SEDOTAN, KENTANG, MINYAK GORENG', '278700', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170508100016', '2017-05-08', 'KK 25\n\nKIRIM BARANG DARMAJI\nGAS TORCH B\nBAYAR BUANG SAMPAH BESAR', '274000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170510061226', '2017-05-10', 'DISKON PEMBAYARAN RAPEL 3 BULAN KAMAR 221 A.N AISYAFA SHAFIRA', '100000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170511071745', '2017-05-10', 'SALAH INPUT 6 NASI', '3000', 'JAZZY', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170513031113', '2017-05-04', 'CHECK OUT DINA K.212', '1300000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514064909', '2017-05-13', 'SALAH INPUT JULIA TATUM', '1352725', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170514070341', '2017-05-14', 'SALAH INPUT DEDDIE MARTHIN', '1386925', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170517150859', '2017-05-17', 'CHECK OUT RICKY ANTHONY K.107', '1300000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170518094022', '2017-05-18', 'DISKON 100.000 PEMBAYARAN RAPEL 3 BULAN KAMAR 212 A.N SELMA ZAHRA SYAVIA', '100000', 'DYBOW', 1, '2017-06-29');
INSERT INTO pengeluaran_ins (`idTrans`, `tglBayar`, `keterangan`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170526101058', '2017-05-25', 'CHECK OUT ALAU', '1300000', 'DYBOW', 1, '2017-06-29');


#
# TABLE STRUCTURE FOR: pengeluaran_rutin
#

DROP TABLE IF EXISTS pengeluaran_rutin;

CREATE TABLE `pengeluaran_rutin` (
  `idTrans` varchar(30) NOT NULL,
  `tglBayar` date NOT NULL,
  `idItemBayar` int(11) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `besar` double NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `sts_post_sia` int(2) DEFAULT '0',
  `tgl_post` date DEFAULT NULL,
  PRIMARY KEY (`idTrans`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pengeluaran_rutin (`idTrans`, `tglBayar`, `idItemBayar`, `bulan`, `tahun`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430133205', '2017-04-30', 4, '04', '2017', '1300000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_rutin (`idTrans`, `tglBayar`, `idItemBayar`, `bulan`, `tahun`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430133248', '2017-04-30', 4, '04', '2017', '1300000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_rutin (`idTrans`, `tglBayar`, `idItemBayar`, `bulan`, `tahun`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430133259', '2017-04-30', 6, '04', '2017', '1350000', 'DYBOW', 1, '2017-06-22');
INSERT INTO pengeluaran_rutin (`idTrans`, `tglBayar`, `idItemBayar`, `bulan`, `tahun`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170430133455', '2017-04-30', 5, '04', '2017', '0', '2700000', 1, '2017-06-22');
INSERT INTO pengeluaran_rutin (`idTrans`, `tglBayar`, `idItemBayar`, `bulan`, `tahun`, `besar`, `petugas`, `sts_post_sia`, `tgl_post`) VALUES ('20170502043446', '2017-05-02', 5, '04', '2017', '2700000', 'DYBOW', 1, '2017-06-29');


#
# TABLE STRUCTURE FOR: pengguna
#

DROP TABLE IF EXISTS pengguna;

CREATE TABLE `pengguna` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `ROLE` varchar(25) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `ISACTIVE` varchar(10) DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO pengguna (`ID`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES (1, 'ummuipan', 'f5bd55573700e176fc4ef9fc78f19f84', 'tes', 'Admin', 'user1.jpg', '1', 'admin', '2017-04-14 22:45:07', 'admin', '2017-04-14 22:45:07');
INSERT INTO pengguna (`ID`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES (2, 'Pramilasari', '05ba2fa1a3a92b4966cf495e5d82f973', 'Pramilasari Puspitaningsasi', 'Operator', 'IMG_8997.JPG', '1', 'admin', '2017-04-16 01:25:25', 'admin', '2017-04-16 01:25:25');
INSERT INTO pengguna (`ID`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES (4, 'Bow', 'd999502e9343dc79ef17aa47cc031672', 'Randy Bow', 'Operator', NULL, '1', 'admin', '2017-04-15 01:21:52', 'admin', '2017-04-15 01:21:52');
INSERT INTO pengguna (`ID`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES (5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', 'profile-pic11.jpg', '1', 'admin', '2017-04-14 22:44:26', 'admin', '2017-04-14 22:44:26');
INSERT INTO pengguna (`ID`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`, `FOTO`, `ISACTIVE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES (6, 'tatakb', '5957c5cf7c3dee8bc0e50abc7e3803e0', 'Tatak Brawiyanto', 'Admin', 'IMG_8253.JPG', '1', 'admin', '2017-04-16 01:23:47', 'admin', '2017-04-16 01:23:47');


