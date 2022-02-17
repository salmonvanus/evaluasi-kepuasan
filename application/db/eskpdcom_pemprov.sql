-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2019 at 12:22 AM
-- Server version: 10.2.24-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eskpdcom_pemprov`
--
CREATE DATABASE IF NOT EXISTS `eskpdcom_pemprov` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eskpdcom_pemprov`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `application_name` varchar(50) DEFAULT NULL,
  `application_start_date` date NOT NULL,
  `application_category` enum('pemerintah','publik') DEFAULT NULL,
  `application_domain_status` enum('terdaftar','tidak') DEFAULT NULL,
  `application_status` enum('aktiv','tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_name`, `application_start_date`, `application_category`, `application_domain_status`, `application_status`) VALUES
(1, 'E-SKPD BKDD', '2019-02-10', 'pemerintah', 'tidak', 'aktiv'),
(2, 'E-SKPD PENDIDIKAN', '2014-09-11', 'pemerintah', 'terdaftar', 'tidak'),
(3, 'E-SKPD KESEHATAN', '2019-02-14', 'pemerintah', 'terdaftar', 'aktiv'),
(4, 'E-LAPOR', '2015-08-05', 'publik', 'terdaftar', 'tidak'),
(5, 'E-CCTV', '2018-11-01', 'publik', 'terdaftar', 'aktiv'),
(6, 'E-PAJAK', '2017-09-28', 'publik', 'terdaftar', 'aktiv'),
(7, 'E-SKPD KOMINFO', '2016-11-18', 'pemerintah', 'terdaftar', 'aktiv'),
(8, 'E-CAPIL', '2016-11-16', 'pemerintah', 'terdaftar', 'aktiv'),
(15, 'E-KELURAHAN', '2019-05-01', 'pemerintah', 'tidak', 'aktiv'),
(16, 'E-BKAD', '2019-05-03', 'pemerintah', 'tidak', 'aktiv');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_full_name` varchar(50) NOT NULL,
  `city_photo` varchar(50) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_full_name`, `city_photo`, `city_name`) VALUES
(1, 'Kabupaten Bolaang Mongondow', 'logo_bolmong.png', 'bolmong'),
(2, 'Kabupaten Bolaang Mongondow Selatan', 'logo_bolsel.png', 'bolsel'),
(3, 'Kabupaten Bolaang Mongondow Timur', 'logo_boltim.png', 'boltim'),
(4, 'Kabupaten Bolaang Mongondow Utara', 'logo_bolut.png', 'bolut'),
(5, 'Kabupaten Kepulauan Sangihe', 'logo_sangihe.png', 'sangihe'),
(6, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 'logo_sitaro.png', 'sitaro'),
(7, 'Kabupaten Kepulauan Talaud', 'logo_talaud.png', 'talaud'),
(8, 'Kabupaten Minahasa', 'logo_minahasa.png', 'minahasa'),
(9, 'Kabupaten Minahasa Selatan', 'logo_minsel.png', 'minsel'),
(10, 'Kabupaten Minahasa Tenggara', 'logo_mitra.png', 'mitra'),
(11, 'Kabupaten Minahasa Utara', 'logo_minut.png', 'minut'),
(12, 'Kota Bitung', 'logo_bitung.png', 'bitung'),
(13, 'Kota Kotamobagu', 'logo_kotamobagu.png', 'kotamobagu'),
(14, 'Kota Manado', 'logo_manado.png', 'manado'),
(15, 'Kota Tomohon', 'logo_tomohon.png', 'tomohon');

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `counseling_id` int(11) NOT NULL,
  `counseling_place` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `counseling_name` varchar(50) DEFAULT NULL,
  `counseling_number_officer` int(11) DEFAULT NULL,
  `counseling_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counseling`
--

INSERT INTO `counseling` (`counseling_id`, `counseling_place`, `city_id`, `counseling_name`, `counseling_number_officer`, `counseling_date`) VALUES
(1, 'Kamasi', 2, 'Penyuluhan Aplikasi Cerdas', 10, '2018-02-12'),
(2, 'Taman Kesatuan Bangsa Kota Manado', 14, 'Penyuluhan Aplikasi Lapor Untuk Masyarakat Kota Ma', 20, '2017-02-12'),
(3, 'SMA Katolik Rex Mundi Manado', 14, 'Penuluhan Teknologi Terbaru', 5, '2019-01-01'),
(4, 'Pardo', 12, 'Penyuluhan Jaringan', 2, '2019-02-06'),
(5, 'amurang', 9, 'Penyuluhan IPTEK', 1, '2019-02-14'),
(6, 'Ratahan', 10, 'Penyuluhan AI', 5, '2019-02-28'),
(7, 'Kamasi', 15, 'Penyuluhan ODSK Cerdas', 10, '2019-03-30'),
(8, 'sdfsd', 15, 'Penyuluhan TIK', 10, '2018-10-09'),
(9, 'Tondano', 8, 'Penyuluhan SDM Bidang IT', 10, '2018-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `letter_id` int(11) NOT NULL,
  `letter_name` varchar(50) NOT NULL DEFAULT '0',
  `letter_from` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `skpd_id` int(11) DEFAULT NULL,
  `letter_date_of_entry` date DEFAULT NULL,
  `letter_photo` varchar(100) DEFAULT NULL,
  `letter_fax_date` varchar(100) DEFAULT NULL,
  `letter_status` enum('diteruskan','belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`letter_id`, `letter_name`, `letter_from`, `city_id`, `skpd_id`, `letter_date_of_entry`, `letter_photo`, `letter_fax_date`, `letter_status`) VALUES
(26, 'Surat Udangan Pelatihan Teknologi', 'Dinas Kominfo Kota Manado', 2, NULL, '2019-02-26', 'contoh-surat-dinas-kesehatan.jpg', '2019-04-05', 'diteruskan'),
(29, 'Surat Undangan Rapat', 'Pemerintah Kota Bitung', 14, NULL, '2019-02-12', 'img-01.png', '1970-01-01', 'diteruskan'),
(30, 'Surat Undangan Jalan Sehat Dinas Pendidikan', 'Dinas Pendidikan Provinsi Sulut', NULL, 11, '2019-02-27', 'img-01.png', '1970-01-01', 'diteruskan'),
(31, 'Surat HUT Daerah', 'Pemerintah Kabupaten Minahasa', 14, NULL, '2019-02-26', 'img-01.png', '1970-01-01', 'diteruskan'),
(49, 'Surat Undangan Festival Budaya Pemerintah Provinsi', 'Dinas Kebudayaan Provinsi Sulut', NULL, 28, '2019-02-05', 'use_case_sistem_baru_vanus-1.jpg', NULL, 'belum'),
(50, 'Surat Seleksi OSK (Olimpiade sains kabupaten kota)', 'Dinas Pendidikan Provinsi Sulut', 12, NULL, '2019-05-01', 'use_case_sistem_baru_vanus-1.jpg', NULL, 'belum'),
(51, 'Pemberitahuan Pelayanan Kesehatan', 'Dinas Kesehatan Republik Indonesia', NULL, 37, '2019-05-02', 'contoh-surat-dinas-kesehatan.jpg', NULL, 'belum'),
(52, 'Pemeriksaan Keuangan', 'Badan Pemeriksa Keuangan', NULL, 4, '2019-04-30', 'contoh-surat-dinas-kesehatan.jpg', NULL, 'belum'),
(53, 'Pengajuan Barang', 'Dinas Pendidikan Provinsi Sulawesi Utara', NULL, 43, '2019-04-24', 'mengolah_data_media-1.jpg', NULL, 'belum'),
(54, 'Surat PORSENI Dalam Rangka HUT Ke-70 BKN', 'Sekretariat Pemerintah Kota Manado', 14, NULL, '2018-09-13', 'porseni_hut_70_bkn.jpg', NULL, 'belum'),
(55, 'Surat Undangan Pesta Rakyat Dalam Rangka HUT Kota ', 'Sekretariat Daerah Kota Manado', 14, NULL, '2018-07-10', 'pestaRakyat.jpg', NULL, 'belum'),
(56, 'Surat Pengangkatan Sekertaris Daerah', 'Pemerintah Kota Manado', 14, NULL, '2018-10-25', 'surat_pengangkatan_sekertaris_daerah_manado.jpg', NULL, 'belum'),
(57, 'Surat Apel Kerja Perdana', 'Sekretariat Daerah Kota', 14, NULL, '2017-11-27', 'apel_kerja_perdana.jpg', NULL, 'belum'),
(58, 'Surat Undangan Penganugerahan Adipura', 'Kementrian Lingkungan Hidup dan Kehutanan', 13, NULL, '2019-01-08', 'undangan_penganugerahan_adipura.jpg', NULL, 'belum'),
(59, 'Surat Undangan Sosialisasi Peraturan Walikota Mana', 'Pemerintah Kota Manado', 14, NULL, '2018-03-15', 'undangan_sosialisasi_peraturan_walikota_manado.JPG', NULL, 'belum'),
(60, 'Pemantauan Puskesmas Melakukan Pelayanan Sesuai St', 'Dinas Kesehatan Daerah', NULL, 37, '2017-08-16', 'pemantauan_puskesmas_melakukan_pelayanan_sesuai_standar_permenkes.jpg', NULL, 'belum'),
(61, 'Surat Usul Kebutuhan ASN', 'Dinas Kesehatan Kota Manado', NULL, 4, '2017-05-10', 'usul_kebutuhan_asn.jpg', NULL, 'belum'),
(62, 'Surat Edaran Periapan Operasional Penyelenggaraan ', 'Kementrian Kesehatan Republik Indonesia', NULL, 37, '2018-01-12', 'surat_edaran_periapan_operasional_penyelenggaraan_ibadah_haji.JPG', NULL, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_name` varchar(50) DEFAULT NULL,
  `media_address` text DEFAULT NULL,
  `media_phone_number` varchar(50) DEFAULT NULL,
  `media_mail` varchar(50) DEFAULT NULL,
  `media_category` enum('cetak','siber') DEFAULT NULL,
  `media_status` enum('terdaftar','tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_name`, `media_address`, `media_phone_number`, `media_mail`, `media_category`, `media_status`) VALUES
(1, 'Posko', 'Jln Pumorow', '081342298654', 'posko@gmail.com', 'cetak', 'tidak'),
(2, 'sulutnews.com', 'Tomohon', '085298490580', 'sulutnews@gmail.com', 'siber', 'tidak'),
(3, 'Tribun Sulut', 'Kairagi', '081342298654', 'tribunsulut@gmail.com', 'cetak', 'terdaftar'),
(5, 'Manado Post', 'Manado', '0980934', 'manadopost@gmail.com', 'cetak', 'terdaftar'),
(6, 'Aspirasi Rakyat', 'Jln Samratulangi', '34234', 'aspirasirakyat@gmail.com', 'cetak', 'tidak'),
(10, 'Media Totabuan', 'Manado', '081354918929', 'mediatotabuan@gmail.com', 'cetak', 'terdaftar'),
(11, 'Kawanua Post', 'Manado', '085298490580', 'kawanuapost@gmail.com', 'cetak', 'terdaftar'),
(12, 'beritakawanua.com', 'Manado', '085250928741', 'beritakawanua@gmail.com', 'siber', 'tidak'),
(13, 'manadosatunews.com', 'Manado', '085690127488', 'manadosatunews@gmail.com', 'siber', 'terdaftar'),
(14, 'berindos.com', 'Manado', '085275663219', 'berindos@gmail.com', 'siber', 'tidak'),
(15, 'bunaken.co.id', 'Manado', '081376291070', 'bunaken@gmail.com', 'siber', 'terdaftar'),
(16, 'cahayamanado.com', 'Manado', '089789981237', 'cahayamanado@yahoo.co.id', 'siber', 'terdaftar'),
(17, 'mediamanado.com', 'Manado', '085298541892', 'mediamanado@gmail.com', 'siber', 'terdaftar'),
(18, 'pilarsulut.com', 'Tomohon', '085289127623', 'pilarsulut@gmail.com', 'siber', 'tidak'),
(19, 'sulutexpress.com', 'Manado', '089640297412', 'sulutexpress@gmail.com', 'siber', 'tidak'),
(20, 'suluttoday.com', 'Manado', '085240567218', 'suluttoday@yahoo.co.id', 'siber', 'terdaftar'),
(21, 'Koran Sindo Manado', 'Manado', '081277661289', 'sindomanado@gmail.com', 'cetak', 'terdaftar'),
(22, 'Komentar', 'Manado', '081289124587', 'komentar@yahoo.co.id', 'cetak', 'tidak'),
(23, 'Radar Manado', 'Manado', '085256981290', 'radarmanado@gmail.com', 'cetak', 'terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(50) NOT NULL DEFAULT '0',
  `news_publish_date` date DEFAULT NULL,
  `news_information` text DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `news_link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_publish_date`, `news_information`, `reporter_id`, `news_link`) VALUES
(1, 'Kerja Keras ODSK Harga Kopra Naik', '2014-10-09', '', 2, 'http://www.sulutprov.go.id/'),
(2, 'Harga Cengkeh Turun-turun Gara-Gara ODSK', '2019-03-05', 'blaaaasssss\r\n', NULL, 'http://www.sulutprov.go.id/'),
(3, 'Penanggulangan Bencana Cepat Tanggap', '2013-09-04', '', 3, 'http://www.sulutprov.go.id/'),
(5, 'Polda Sulut: 2 Terduga Teroris di Bitung Sudah Dib', '2019-05-01', '', 2, 'https://regional.kompas.com/read/2019/05/07/150309'),
(7, 'Saksi Akui Pleno Tingkat KPU Manado Jurdil', '2015-12-16', '', 15, 'https://manadopostonline.com/read/2019/05/08/Saksi'),
(8, 'Ini 8 Calon Legislatif Sulut Peraih Suara Terbanya', '2016-11-01', '', 15, 'https://beritamanado.com/ini-8-calon-legislatif-su'),
(9, 'Sumendap: Kemenangan 17 April 2019 Jalan Menuju, M', '2019-04-17', '', 16, 'http://manado.tribunnews.com/2019/04/13/sumendap-k'),
(10, 'Kira-kira Siapa Legislator PDIP Ketua DPRD Manado ', '2019-04-24', '', 16, 'https://beritamanado.com/kira-kira-siapa-legislato'),
(11, 'Manado Dikepung Banjir usai Hujan Deras, 1 Orang D', '2019-04-28', '', 16, 'https://www.inews.id/daerah/regional/manado-dikepu'),
(12, 'Turis China Pelesiran ke Sulut Tambah Banyak, Tapi', '2018-09-17', '', 2, 'https://sulawesi.bisnis.com/read/20190402/540/9072');

-- --------------------------------------------------------

--
-- Table structure for table `reporter`
--

CREATE TABLE `reporter` (
  `reporter_id` int(11) NOT NULL,
  `reporter_name` varchar(50) DEFAULT NULL,
  `reporter_phone_number` varchar(50) DEFAULT NULL,
  `reporter_mail` varchar(50) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporter`
--

INSERT INTO `reporter` (`reporter_id`, `reporter_name`, `reporter_phone_number`, `reporter_mail`, `media_id`) VALUES
(2, 'Marcela Balderas', '081342298654', 'marcela@gmail.com', 2),
(3, 'Dea Sihombing', '081328912098', 'deasihombing@gmail.com', 5),
(9, 'Galatia Rasuh', '085298580490', 'galatia@gmail.com', 2),
(15, 'Donny Ticoalu', '085298490580', 'donny@gmail.com', 6),
(16, 'Wenny Pangalila', '081355198021', 'wennypangalila@gmail.com', 3),
(18, 'Rizki Sondakh', '081366190231', 'riskisondakh@gmail.com', 5),
(19, 'Natasya Mawitjere', '085298650210', 'natasya@gmail.com', 1),
(20, 'Stefanus Pangkey', '081240298146', 'ivanpangkey@gmail.com', 1),
(21, 'Bagus Wibisono', '089729831073', 'wibisonobagus@yahoo.co.id', 1),
(22, 'Felisitas Ayu', '085690657731', 'ayufelisitas@yahoo.co.id', 3),
(23, 'Paskal Roring', '081356891144', 'paskalroring@gmail.com', 5),
(24, 'Christian Kaidun', '081367219953', 'christiankai@gmail.com', 6),
(25, 'Javier Tuerah', '081256889120', 'javie18@gmail.com', 6),
(26, 'Chandra Loho', '082156991241', 'chanlo@gmail.com', 6),
(27, 'Jimmy Wungkana', '081288912021', 'jwungkana@gmail.com', 10),
(28, 'Enru Pasla', '082156110092', 'epasla98@gmail.com', 10),
(29, 'Jonathan Lauren', '081288902141', 'nyaxmen@gmail.com', 11),
(30, 'Jolly Rompis', '082188751044', 'rompisjolly@gmail.com', 10),
(31, 'Mersondi Adrian', '089814116788', 'dodsadrian@gmail.com', 11),
(32, 'Efraim Kayangan', '089789217744', 'efraimaim@gmail.com', 21),
(33, 'Sebastian Pinem', '081288904121', 'pinemtian@gmail.com', 21),
(34, 'Cindy Gunarsih', '081255892190', 'ingcindy@gmail.com', 22),
(35, 'Brigita Sumarjo', '081290417843', 'igitSumarjo12@gmail.com', 22),
(36, 'Juan Posumah', '081342892190', 'juanju@gmail.com', 23),
(37, 'Jopie Pajouw', '081388902142', 'Jopiepajou@gmail.com', 1),
(38, 'Ronaldo Sangel', '081328901251', 'nadonado@gmail.com', 1),
(40, 'Ardi Manalang', '085275894536', 'armanalang@gmail.com', 12),
(41, 'Saldi Kasiadi', '084567389213', 'saldikasiadi@gmail.com', 12),
(42, 'Ever Salikara', '085567836777', 'salikaraever@yahoo.com', 13),
(43, 'Tian Storm', '087789564782', 'stian@gmail.co.id', 13),
(44, 'Coco Lense', '084567382349', 'cocolense@gmail.com', 14),
(45, 'karel Kakondo', '087683627463', 'karel@gmail.com', 14),
(46, 'Viki Salamor', '0846372632212', 'vikis@gmail.com', 15),
(47, 'Mitha Talahatu', '084637238846', 'mtalahatu@gmail.com', 15),
(48, 'Rian Taarega', '084536271232', 'rtaarega@gmail.com', 16),
(49, 'Aldo Mayusip', '084677878923', 'aldom@gmail.com', 16),
(50, 'Dante Nababan', '08456738898', 'dantenababan@gmail.com', 17),
(51, 'Jungli Pasoi', '085234565347', 'jpasoi@gmail.com', 17),
(52, 'Nando Menteng', '08523452635555', 'Nandocuk@gmail.com', 18),
(53, 'George Gentindatu', '081324536738', 'gentindatuoca@gmail.com', 18),
(54, 'Krisna Soeda', '083546278342', 'krisnasoeda22@gmail.com', 19),
(55, 'Sandra Aesong', '083526346787', 'nandasaesong@gmail.com', 19),
(56, 'Laila Ali', '0823536172322', 'ilaali14@gmail.com', 20),
(57, 'Brayen Aesong', '085674837878', 'brayaesong@gmail.com', 20);

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `skpd_id` int(11) NOT NULL,
  `skpd_name` varchar(50) DEFAULT NULL,
  `skpd_scope` enum('badan','biro','dinas') DEFAULT NULL,
  `skpd_abbreviation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`skpd_id`, `skpd_name`, `skpd_scope`, `skpd_abbreviation`) VALUES
(1, 'Badan Perancangan Pembangunan Daerah', 'badan', 'BPPD'),
(2, 'Badan Pengelola Keuangan dan Aset Daerah', 'badan', 'BPKAD'),
(3, 'Badan Pengelola Pajak dan Restribusi Daerah', 'badan', 'BPPRD'),
(4, 'Badan Kepegawaian Daerah', 'badan', 'BKD'),
(5, 'Badan Pendidikan dan Pelatihan', 'badan', 'BPENPEL'),
(6, 'Badan Penelitian dan Pengembangan', 'badan', 'BPENPEN'),
(7, 'Badan Penghubung', 'badan', 'BPENGHUBUNG'),
(8, 'Badan Kesatuan Bangsa dan Politik', 'badan', 'BKBP'),
(9, 'Inspektorat', 'badan', 'INSPEKTORAT'),
(10, 'Sekretariat Dewan Perwakilan Rakyat', 'badan', 'SEK.DPR'),
(11, 'Dinas Pendidikan Daerah', 'dinas', 'D.PD'),
(12, 'Dinas Pekerjaan Umum dan Penataan Ruang Daerah', 'dinas', 'D.PUPRD'),
(13, 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan', 'dinas', 'D.PKPP'),
(14, 'Satuan Polisi Pamong Praja', 'dinas', 'Pol.PP'),
(15, 'Dinas Sosial', 'dinas', 'D.Sos'),
(16, 'Dinas Tenaga Kerja dan Transmigrasi', 'dinas', 'D.TKT'),
(17, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'dinas', 'D.PPPA'),
(18, 'Dinas Pangan', 'dinas', 'D.Pangan'),
(19, 'Dinas Lingkungan Hidup', 'dinas', 'D.LH'),
(20, 'Dinas Kependudukan dan Capil', 'dinas', 'D.Capil'),
(21, 'Dinas Pemberdayaan Masyarakat dan Desa', 'dinas', 'D.PemMasDes'),
(22, 'Dinas Perhubungan Daerah', 'dinas', 'D.PerDa'),
(23, 'Dinas Komunikasi Informatika, Persandian dan Stati', 'dinas', 'D.KIPS'),
(24, 'Dinas Koperasi dan UKM', 'dinas', 'D.KopUKM'),
(25, 'Badan Penanggulangan Bancana Daerah', 'badan', 'BPBD'),
(26, 'Dinas Penanaman Modal Daerah dan PTSP', 'dinas', 'D.PMDdanPTSP'),
(27, 'Dinas Kepemudaan dan Olah Raga', 'dinas', 'D.KOR'),
(28, 'Dinas Kebudayaan', 'dinas', 'D.Kebudayaan'),
(29, 'Dinas Perpustakaan dan Kearsipan', 'dinas', 'D.Pepus'),
(30, 'Dinas Kelautan dan Perikanan', 'dinas', 'D.KP'),
(32, 'Dinas Pertanian dan Peternakan', 'dinas', 'D.PP'),
(33, 'Dinas Kehutanan', 'dinas', 'D.Kehutanan'),
(34, 'Dinas Energi dan Sumber Daya Mineral', 'dinas', 'D.ESDM'),
(35, 'Dinas Perindustrian dan Perdagangan', 'dinas', 'D.Perindustrian'),
(36, 'Dinas Perkebunan', 'dinas', 'D.Perkebunan'),
(37, 'Dinas Kesehatan', 'dinas', 'D.Kesehatan'),
(38, 'Biro Pemerintahan dan Otonomi Daerah', 'biro', 'BPOD'),
(39, 'Biro Kesejahteraan Rakyat', 'biro', 'BKR'),
(40, 'Biro Hukum', 'biro', 'BH'),
(41, 'Biro Administrasi Perekonomian dan Sumber Daya Ala', 'biro', 'BAPSDA'),
(42, 'Biro Administrasi Pembangunan', 'biro', 'BAP'),
(43, 'Biro Infrastruktur dan Pengadaan Barang dan Jasa', 'biro', 'BPPBJ'),
(44, 'Biro Organisasi', 'biro', 'BO'),
(45, 'Biro Protokol, Kerjasama dan Komunikasi Publik', 'biro', 'BPKKP'),
(46, 'Biro Umum', 'biro', 'BU');

-- --------------------------------------------------------

--
-- Table structure for table `sterilization`
--

CREATE TABLE `sterilization` (
  `sterilization_id` int(11) NOT NULL,
  `sterilization_item` varchar(50) DEFAULT NULL,
  `sterilization_date` date DEFAULT NULL,
  `sterilization_place` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `sterilization_information` text DEFAULT NULL,
  `sterilization_officer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sterilization`
--

INSERT INTO `sterilization` (`sterilization_id`, `sterilization_item`, `sterilization_date`, `sterilization_place`, `city_id`, `sterilization_information`, `sterilization_officer`) VALUES
(1, 'Lampu_UV', '2019-05-29', 'Kantor Walikota Manado', 14, 'Digunakan Untuk Sterilisasi Ruangan Rapat', 'Mario Lala,Zico Giroth'),
(2, 'Sterilisator_Uap', '2019-01-05', 'Kantor Walikota Manado', 14, 'Digunakan Untuk Sterilisasi Ruangan Rapat', 'Yesi Baba,Julia Sidaluwu'),
(3, 'Jummer', '2019-02-11', 'Kantor Walikota Tomohon', 15, 'Digunakan Untuk Sterilisasi Ruangan Rapat', 'Peter Briand'),
(4, 'Jummer', '2019-04-16', 'Kantor Walikota Tomohon', 15, 'Untuk sterilisasi ruang pejabat', 'Mario,Javier'),
(5, 'Sterilisator_Uap', '2019-04-28', 'Kantor Walikota Bitung', 12, 'Digunakan untuk sterilisasi ruang rapat', 'Ferdinand,Billy'),
(6, 'Sterilisator_Uap', '2019-04-29', 'Kantor DPRD Kota Manado', 14, 'Untuk Sterilisasi Ruang Rapat', 'Ferdinand'),
(7, 'Lampu_UV', '2019-05-02', 'Lapangan Tikala', 14, 'Sterilisasi upacara ', 'Billy,Piniel'),
(8, 'Lampu UV', '2019-03-12', 'Kantor Walikota Bitung', 12, 'Untuk sterilisasi ruang rapat', 'Franco'),
(9, 'Sterilisator Uap', '2019-03-25', 'Kantor DPRD Kota Kotamobagu', 13, 'Untuk sterilisasi ruang rapat', 'Julia,Franco'),
(10, 'Lampu UV', '2019-04-15', 'Kantor Walikota Bitung', 12, 'Untuk sterilisasi ruang serba guna', 'Peter,Franco');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_full_name` varchar(50) DEFAULT NULL,
  `user_nip` varchar(50) DEFAULT NULL,
  `user_job` enum('A1','A2','A3','A4','A5','A6','A7') DEFAULT NULL,
  `user_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_full_name`, `user_nip`, `user_job`, `user_photo`) VALUES
(1, 'yandessihombing', 'Yandes123', 'Yandes Sihombing', '45245245', 'A2', 'yandes.jpg'),
(2, 'ferdinandisa', 'Ferdinandisa123', 'Ferdinand Nelwan', '12333', 'A3', 'isa.jpg'),
(3, 'hiskiamangenggek', 'Hiskia123', 'Hiskia Manenggek', '2452345425', 'A3', 'hiskia.jpg'),
(4, 'jetipulu', 'Jetipulu123', 'Dr. Jeti Pulu, S.Sos, M.Si', '196212271985042002', 'A4', 'aa.jpg'),
(5, 'johnrembet', 'Johnrembet123', 'John F. Rembet, SH, M.Si', '196712041997031003', 'A5', 'john.jpg'),
(6, 'kabid_kominfo', 'KbdKominfo123', 'Fidel Hansang', '235425435', 'A6', 'abc.jpg'),
(7, 'rollykaramoj', 'rollykaramoj111', 'Drs. Rolly J. Karamoj', '196603291986021002', 'A7', 'rollyjpg.jpg'),
(15, 'nourswitspulu18', 'Nourswitspulu123', 'Nourswits Pulu', '', 'A1', 'nourwits.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `counseling`
--
ALTER TABLE `counseling`
  ADD PRIMARY KEY (`counseling_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`letter_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `skpd_id` (`skpd_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `reporter_id` (`reporter_id`);

--
-- Indexes for table `reporter`
--
ALTER TABLE `reporter`
  ADD PRIMARY KEY (`reporter_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`skpd_id`);

--
-- Indexes for table `sterilization`
--
ALTER TABLE `sterilization`
  ADD PRIMARY KEY (`sterilization_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `counseling`
--
ALTER TABLE `counseling`
  MODIFY `counseling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reporter`
--
ALTER TABLE `reporter`
  MODIFY `reporter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `skpd`
--
ALTER TABLE `skpd`
  MODIFY `skpd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sterilization`
--
ALTER TABLE `sterilization`
  MODIFY `sterilization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `counseling`
--
ALTER TABLE `counseling`
  ADD CONSTRAINT `counseling_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `letter`
--
ALTER TABLE `letter`
  ADD CONSTRAINT `letter_ibfk_1` FOREIGN KEY (`skpd_id`) REFERENCES `skpd` (`skpd_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `letter_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `reporter` (`reporter_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `reporter`
--
ALTER TABLE `reporter`
  ADD CONSTRAINT `reporter_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sterilization`
--
ALTER TABLE `sterilization`
  ADD CONSTRAINT `sterilization_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
