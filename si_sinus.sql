-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 11, 2022 at 12:42 PM
-- Server version: 5.7.34
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_sinus`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id_basis_pengetahuan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf_pakar_basis_pengetahuan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id_basis_pengetahuan`, `id_penyakit`, `id_gejala`, `cf_pakar_basis_pengetahuan`) VALUES
(1, 1, 1, 0.2),
(2, 2, 1, 0.2),
(3, 3, 1, 0.2),
(4, 4, 1, 0.2),
(5, 1, 2, 0.2),
(6, 2, 2, 0.2),
(7, 3, 2, 0.2),
(8, 4, 2, 0.2),
(9, 1, 3, 0.4),
(10, 2, 3, 0.4),
(11, 3, 3, 0.4),
(12, 4, 3, 0.4),
(13, 1, 4, 0.4),
(14, 2, 4, 0.4),
(15, 3, 4, 0.4),
(16, 4, 4, 0.4),
(17, 1, 5, 0.4),
(18, 2, 5, 0.4),
(19, 3, 5, 0.4),
(20, 4, 5, 0.4),
(21, 3, 6, 0.6),
(22, 4, 6, 0.6),
(23, 3, 7, 0.6),
(24, 1, 8, 0.6),
(25, 2, 9, 0.4),
(26, 1, 10, 0.4),
(27, 2, 10, 0.4),
(28, 3, 10, 0.4),
(29, 4, 10, 0.4),
(30, 1, 11, 0.4),
(31, 2, 11, 0.4),
(32, 3, 11, 0.4),
(33, 4, 11, 0.4),
(34, 1, 12, 0.8),
(35, 2, 12, 0.8),
(36, 3, 12, 0.8),
(37, 4, 12, 0.8),
(38, 1, 13, 0.4),
(39, 3, 13, 0.4),
(40, 4, 13, 0.4),
(41, 1, 14, 0.6),
(42, 3, 14, 0.6),
(43, 4, 14, 0.6),
(44, 4, 15, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL,
  `cf_pakar` double NOT NULL,
  `inisial_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `cf_pakar`, `inisial_gejala`) VALUES
(1, 'G1', 'Demam', 0.2, ''),
(2, 'G2', 'Hidung Tersumbat', 0.2, ''),
(3, 'G3', 'Sulit Bernapas Lewat Hidung', 0.4, ''),
(4, 'G4', 'Area Sekitar Mata Bengkak', 0.4, ''),
(5, 'G5', 'Lendir Kental Di Hidung', 0.4, ''),
(6, 'G6', 'Nyeri Di Mata', 0.6, ''),
(7, 'G7', 'Nyeri Di Pipi', 0.6, ''),
(8, 'G8', 'Nyeri Di Hidung', 0.6, ''),
(9, 'G9', 'Nyeri Di Dahi', 0.4, ''),
(10, 'G10', 'Berkurang Indra Perasa', 0.4, ''),
(11, 'G11', 'Berkurang Indra Penciuman', 0.4, ''),
(12, 'G12', 'Hidung Berbau Busuk', 0.8, ''),
(13, 'G13', 'Nyeri Gigi', 0.4, ''),
(14, 'G14', 'Nyeri Rahang Bagian Atas', 0.6, ''),
(15, 'G15', 'Nyeri Bagian Telinga', 0.6, '');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_pasien`
--

CREATE TABLE `gejala_pasien` (
  `id_gejala_pasien` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `cf_pakar` double NOT NULL,
  `cf_user` double NOT NULL,
  `cf_gejala` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala_pasien`
--

INSERT INTO `gejala_pasien` (`id_gejala_pasien`, `id_pasien`, `id_gejala`, `id_penyakit`, `cf_pakar`, `cf_user`, `cf_gejala`) VALUES
(199, 5, 1, 1, 0.2, 1, 0.2),
(200, 5, 1, 2, 0.2, 1, 0.2),
(201, 5, 1, 3, 0.2, 1, 0.2),
(202, 5, 1, 4, 0.2, 1, 0.2),
(203, 5, 5, 1, 0.4, 0.6, 0.24),
(204, 5, 5, 2, 0.4, 0.6, 0.24),
(205, 5, 5, 3, 0.4, 0.6, 0.24),
(206, 5, 5, 4, 0.4, 0.6, 0.24),
(207, 5, 7, 3, 0.6, 0.8, 0.48),
(208, 5, 10, 1, 0.4, 0.8, 0.32),
(209, 5, 10, 2, 0.4, 0.8, 0.32),
(210, 5, 10, 3, 0.4, 0.8, 0.32),
(211, 5, 10, 4, 0.4, 0.8, 0.32),
(212, 5, 12, 1, 0.8, 0.8, 0.64),
(213, 5, 12, 2, 0.8, 0.8, 0.64),
(214, 5, 12, 3, 0.8, 0.8, 0.64),
(215, 5, 12, 4, 0.8, 0.8, 0.64),
(216, 5, 15, 4, 0.6, 0.6, 0.36),
(343, 6, 1, 1, 0.2, 1, 0.2),
(344, 6, 1, 2, 0.2, 1, 0.2),
(345, 6, 1, 3, 0.2, 1, 0.2),
(346, 6, 1, 4, 0.2, 1, 0.2),
(347, 6, 5, 1, 0.4, 0.6, 0.24),
(348, 6, 5, 2, 0.4, 0.6, 0.24),
(349, 6, 5, 3, 0.4, 0.6, 0.24),
(350, 6, 5, 4, 0.4, 0.6, 0.24),
(351, 6, 7, 3, 0.6, 0.8, 0.48),
(352, 6, 10, 1, 0.4, 0.8, 0.32),
(353, 6, 10, 2, 0.4, 0.8, 0.32),
(354, 6, 10, 3, 0.4, 0.8, 0.32),
(355, 6, 10, 4, 0.4, 0.8, 0.32),
(356, 6, 12, 1, 0.8, 0.8, 0.64),
(357, 6, 12, 2, 0.8, 0.8, 0.64),
(358, 6, 12, 3, 0.8, 0.8, 0.64),
(359, 6, 12, 4, 0.8, 0.8, 0.64),
(360, 6, 15, 4, 0.6, 0.6, 0.36),
(1099, 7, 1, 1, 0.2, 1, 0.2),
(1100, 7, 1, 2, 0.2, 1, 0.2),
(1101, 7, 1, 3, 0.2, 1, 0.2),
(1102, 7, 1, 4, 0.2, 1, 0.2),
(1103, 7, 5, 1, 0.4, 0.6, 0.24),
(1104, 7, 5, 2, 0.4, 0.6, 0.24),
(1105, 7, 5, 3, 0.4, 0.6, 0.24),
(1106, 7, 5, 4, 0.4, 0.6, 0.24),
(1107, 7, 7, 3, 0.6, 0.8, 0.48),
(1108, 7, 10, 1, 0.4, 0.8, 0.32),
(1109, 7, 10, 2, 0.4, 0.8, 0.32),
(1110, 7, 10, 3, 0.4, 0.8, 0.32),
(1111, 7, 10, 4, 0.4, 0.8, 0.32),
(1112, 7, 12, 1, 0.8, 0.8, 0.64),
(1113, 7, 12, 2, 0.8, 0.8, 0.64),
(1114, 7, 12, 3, 0.8, 0.8, 0.64),
(1115, 7, 12, 4, 0.8, 0.8, 0.64),
(1116, 7, 15, 4, 0.6, 0.6, 0.36),
(1189, 8, 1, 1, 0.2, 1, 0.2),
(1190, 8, 1, 2, 0.2, 1, 0.2),
(1191, 8, 1, 3, 0.2, 1, 0.2),
(1192, 8, 1, 4, 0.2, 1, 0.2),
(1193, 8, 5, 1, 0.4, 0.6, 0.24),
(1194, 8, 5, 2, 0.4, 0.6, 0.24),
(1195, 8, 5, 3, 0.4, 0.6, 0.24),
(1196, 8, 5, 4, 0.4, 0.6, 0.24),
(1197, 8, 7, 3, 0.6, 0.8, 0.48),
(1198, 8, 10, 1, 0.4, 0.8, 0.32),
(1199, 8, 10, 2, 0.4, 0.8, 0.32),
(1200, 8, 10, 3, 0.4, 0.8, 0.32),
(1201, 8, 10, 4, 0.4, 0.8, 0.32),
(1202, 8, 12, 1, 0.8, 0.8, 0.64),
(1203, 8, 12, 2, 0.8, 0.8, 0.64),
(1204, 8, 12, 3, 0.8, 0.8, 0.64),
(1205, 8, 12, 4, 0.8, 0.8, 0.64),
(1206, 8, 15, 4, 0.6, 0.6, 0.36),
(1225, 9, 1, 1, 0.2, 1, 0.2),
(1226, 9, 1, 2, 0.2, 1, 0.2),
(1227, 9, 1, 3, 0.2, 1, 0.2),
(1228, 9, 1, 4, 0.2, 1, 0.2),
(1229, 9, 5, 1, 0.4, 0.6, 0.24),
(1230, 9, 5, 2, 0.4, 0.6, 0.24),
(1231, 9, 5, 3, 0.4, 0.6, 0.24),
(1232, 9, 5, 4, 0.4, 0.6, 0.24),
(1233, 9, 7, 3, 0.6, 0.8, 0.48),
(1234, 9, 10, 1, 0.4, 0.8, 0.32),
(1235, 9, 10, 2, 0.4, 0.8, 0.32),
(1236, 9, 10, 3, 0.4, 0.8, 0.32),
(1237, 9, 10, 4, 0.4, 0.8, 0.32),
(1238, 9, 12, 1, 0.8, 0.8, 0.64),
(1239, 9, 12, 2, 0.8, 0.8, 0.64),
(1240, 9, 12, 3, 0.8, 0.8, 0.64),
(1241, 9, 12, 4, 0.8, 0.8, 0.64),
(1242, 9, 15, 4, 0.6, 0.6, 0.36),
(1261, 10, 1, 1, 0.2, 0.8, 0.16),
(1262, 10, 1, 2, 0.2, 0.8, 0.16),
(1263, 10, 1, 3, 0.2, 0.8, 0.16),
(1264, 10, 1, 4, 0.2, 0.8, 0.16),
(1265, 10, 3, 1, 0.4, 0.8, 0.32),
(1266, 10, 3, 2, 0.4, 0.8, 0.32),
(1267, 10, 3, 3, 0.4, 0.8, 0.32),
(1268, 10, 3, 4, 0.4, 0.8, 0.32),
(1269, 10, 6, 3, 0.6, 0.8, 0.48),
(1270, 10, 6, 4, 0.6, 0.8, 0.48),
(1271, 10, 10, 1, 0.4, 1, 0.4),
(1272, 10, 10, 2, 0.4, 1, 0.4),
(1273, 10, 10, 3, 0.4, 1, 0.4),
(1274, 10, 10, 4, 0.4, 1, 0.4),
(1275, 10, 14, 1, 0.6, 0.4, 0.24),
(1276, 10, 14, 3, 0.6, 0.4, 0.24),
(1277, 10, 14, 4, 0.6, 0.4, 0.24),
(1278, 10, 15, 4, 0.6, 1, 0.6),
(1765, 11, 1, 1, 0.2, 1, 0.2),
(1766, 11, 1, 2, 0.2, 1, 0.2),
(1767, 11, 1, 3, 0.2, 1, 0.2),
(1768, 11, 1, 4, 0.2, 1, 0.2),
(1769, 11, 5, 1, 0.4, 0.6, 0.24),
(1770, 11, 5, 2, 0.4, 0.6, 0.24),
(1771, 11, 5, 3, 0.4, 0.6, 0.24),
(1772, 11, 5, 4, 0.4, 0.6, 0.24),
(1773, 11, 7, 3, 0.6, 0.8, 0.48),
(1774, 11, 10, 1, 0.4, 0.8, 0.32),
(1775, 11, 10, 2, 0.4, 0.8, 0.32),
(1776, 11, 10, 3, 0.4, 0.8, 0.32),
(1777, 11, 10, 4, 0.4, 0.8, 0.32),
(1778, 11, 12, 1, 0.8, 0.8, 0.64),
(1779, 11, 12, 2, 0.8, 0.8, 0.64),
(1780, 11, 12, 3, 0.8, 0.8, 0.64),
(1781, 11, 12, 4, 0.8, 0.8, 0.64),
(1782, 11, 15, 4, 0.6, 0.6, 0.36),
(1798, 12, 1, 1, 0.2, 0.6, 0.12),
(1799, 12, 1, 2, 0.2, 0.6, 0.12),
(1800, 12, 1, 3, 0.2, 0.6, 0.12),
(1801, 12, 1, 4, 0.2, 0.6, 0.12),
(1802, 12, 4, 1, 0.4, 1, 0.4),
(1803, 12, 4, 2, 0.4, 1, 0.4),
(1804, 12, 4, 3, 0.4, 1, 0.4),
(1805, 12, 4, 4, 0.4, 1, 0.4),
(1806, 12, 6, 3, 0.6, 0.8, 0.48),
(1807, 12, 6, 4, 0.6, 0.8, 0.48),
(1808, 12, 9, 2, 0.4, 0.4, 0.16),
(1809, 12, 13, 1, 0.4, 1, 0.4),
(1810, 12, 13, 3, 0.4, 1, 0.4),
(1811, 12, 13, 4, 0.4, 1, 0.4),
(1812, 12, 15, 4, 0.6, 0.8, 0.48),
(1827, 13, 1, 1, 0.2, 0.6, 0.12),
(1828, 13, 1, 2, 0.2, 0.6, 0.12),
(1829, 13, 1, 3, 0.2, 0.6, 0.12),
(1830, 13, 1, 4, 0.2, 0.6, 0.12),
(1831, 13, 4, 1, 0.4, 0.6, 0.24),
(1832, 13, 4, 2, 0.4, 0.6, 0.24),
(1833, 13, 4, 3, 0.4, 0.6, 0.24),
(1834, 13, 4, 4, 0.4, 0.6, 0.24),
(1835, 13, 7, 3, 0.6, 1, 0.6),
(1836, 13, 10, 1, 0.4, 0.2, 0.08),
(1837, 13, 10, 2, 0.4, 0.2, 0.08),
(1838, 13, 10, 3, 0.4, 0.2, 0.08),
(1839, 13, 10, 4, 0.4, 0.2, 0.08),
(1840, 13, 15, 4, 0.6, 1, 0.6),
(1841, 14, 1, 1, 0.2, 1, 0.2),
(1842, 14, 1, 2, 0.2, 1, 0.2),
(1843, 14, 1, 3, 0.2, 1, 0.2),
(1844, 14, 1, 4, 0.2, 1, 0.2),
(1845, 14, 5, 1, 0.4, 0.6, 0.24),
(1846, 14, 5, 2, 0.4, 0.6, 0.24),
(1847, 14, 5, 3, 0.4, 0.6, 0.24),
(1848, 14, 5, 4, 0.4, 0.6, 0.24),
(1849, 14, 7, 3, 0.6, 0.8, 0.48),
(1850, 14, 10, 1, 0.4, 0.8, 0.32),
(1851, 14, 10, 2, 0.4, 0.8, 0.32),
(1852, 14, 10, 3, 0.4, 0.8, 0.32),
(1853, 14, 10, 4, 0.4, 0.8, 0.32),
(1854, 14, 12, 1, 0.8, 0.8, 0.64),
(1855, 14, 12, 2, 0.8, 0.8, 0.64),
(1856, 14, 12, 3, 0.8, 0.8, 0.64),
(1857, 14, 12, 4, 0.8, 0.8, 0.64),
(1858, 14, 15, 4, 0.6, 0.6, 0.36),
(1992, 15, 1, 1, 0.2, 1, 0.2),
(1993, 15, 1, 2, 0.2, 1, 0.2),
(1994, 15, 1, 3, 0.2, 1, 0.2),
(1995, 15, 1, 4, 0.2, 1, 0.2),
(1996, 15, 5, 1, 0.4, 1, 0.4),
(1997, 15, 5, 2, 0.4, 1, 0.4),
(1998, 15, 5, 3, 0.4, 1, 0.4),
(1999, 15, 5, 4, 0.4, 1, 0.4),
(2000, 15, 6, 3, 0.6, 0.6, 0.36),
(2001, 15, 6, 4, 0.6, 0.6, 0.36),
(2002, 15, 9, 2, 0.4, 0.8, 0.32),
(2003, 15, 10, 1, 0.4, 0.6, 0.24),
(2004, 15, 10, 2, 0.4, 0.6, 0.24),
(2005, 15, 10, 3, 0.4, 0.6, 0.24),
(2006, 15, 10, 4, 0.4, 0.6, 0.24),
(2007, 15, 12, 1, 0.8, 0.8, 0.64),
(2008, 15, 12, 2, 0.8, 0.8, 0.64),
(2009, 15, 12, 3, 0.8, 0.8, 0.64),
(2010, 15, 12, 4, 0.8, 0.8, 0.64);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_analisa_pasien`
--

CREATE TABLE `hasil_analisa_pasien` (
  `id_hasil_analisa` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `hasil_analisa` double NOT NULL,
  `kepercayaan_cf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil_analisa_pasien`
--

INSERT INTO `hasil_analisa_pasien` (`id_hasil_analisa`, `id_pasien`, `id_penyakit`, `hasil_analisa`, `kepercayaan_cf`) VALUES
(647, 7, 1, 0.8511616, 85.1162),
(648, 7, 2, 0.8511616, 85.1162),
(649, 7, 3, 0.922604032, 92.2604),
(650, 7, 4, 0.904743424, 90.4743),
(667, 8, 1, 0.8511616, 85.1162),
(668, 8, 2, 0.8511616, 85.1162),
(669, 8, 3, 0.922604032, 92.2604),
(670, 8, 4, 0.904743424, 90.4743),
(675, 9, 1, 0.8511616, 85.1162),
(676, 9, 2, 0.8511616, 85.1162),
(677, 9, 3, 0.922604032, 92.2604),
(678, 9, 4, 0.904743424, 90.4743),
(683, 10, 1, 0.7395328, 73.9533),
(684, 10, 2, 0.65728, 65.728),
(685, 10, 3, 0.864557056, 86.4557),
(686, 10, 4, 0.9458228224, 94.5823),
(795, 11, 1, 0.8511616, 85.1162),
(796, 11, 2, 0.8511616, 85.1162),
(797, 11, 3, 0.922604032, 92.2604),
(798, 11, 4, 0.904743424, 90.4743),
(803, 12, 1, 0.6832, 68.32),
(804, 12, 2, 0.55648, 55.648),
(805, 12, 3, 0.835264, 83.5264),
(806, 12, 4, 0.91433728, 91.4337),
(811, 13, 1, 0.384704, 38.4704),
(812, 13, 2, 0.384704, 38.4704),
(813, 13, 3, 0.7538816, 75.3882),
(814, 13, 4, 0.7538816, 75.3882),
(815, 14, 1, 0.8511616, 85.1162),
(816, 14, 2, 0.8511616, 85.1162),
(817, 14, 3, 0.922604032, 92.2604),
(818, 14, 4, 0.904743424, 90.4743),
(847, 15, 1, 0.868672, 86.8672),
(848, 15, 2, 0.91069696, 91.0697),
(849, 15, 3, 0.91595008, 91.595),
(850, 15, 4, 0.91595008, 91.595);

-- --------------------------------------------------------

--
-- Table structure for table `pasien_konsultasi`
--

CREATE TABLE `pasien_konsultasi` (
  `id_pasien` int(11) NOT NULL,
  `kode_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tanggal_konsultasi` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien_konsultasi`
--

INSERT INTO `pasien_konsultasi` (`id_pasien`, `kode_pasien`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`, `tanggal_konsultasi`) VALUES
(5, 77634384, 'Stevanus', 'L', 'kj', '081354818929', '2022-06-10 16:34:16'),
(6, 1463852897, 'Nadia', 'P', 'dfsdf', '081354818929', '2022-06-10 16:36:33'),
(7, 2010633910, 'Tuuk', 'L', 'ds', '081354818929', '2022-06-10 16:43:06'),
(8, 2097455819, 'Ut', 'L', 'd', '081354818929', '2022-06-10 19:18:49'),
(9, 865058493, 'Ai', 'L', 'dfs', '081354818929', '2022-06-10 19:20:30'),
(10, 2065675026, 'dsdf', 'P', 'lkjlk', '081354818929', '2022-06-10 19:21:37'),
(11, 1379054213, 'Mba', 'P', 'dfs', '081354818929', '2022-06-10 19:30:30'),
(12, 360419456, 'ala', 'P', 'dfs', '081354818929', '2022-06-10 19:57:01'),
(13, 1895668037, 'sdfa', 'L', 'dsf', '081354818929', '2022-06-10 20:03:51'),
(14, 917004230, 'Ara', 'P', 'dsfs', '081354818929', '2022-06-10 20:57:01'),
(15, 229624926, 'Rina', 'P', 'Test', '081354818929', '2022-06-11 11:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`) VALUES
(1, 'P1', 'Sinusitis Maksilaris'),
(2, 'P2', 'Sinusitis Frontalis'),
(3, 'P3', 'Sinusitis Etmoidalis'),
(4, 'P4', 'Sinusitis Sphenoidalis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `image`) VALUES
(1, 'Stevanus William Salmon', 'admin', '$2y$10$2i5aw.MciOUu3Vfr//9m4OFhsspMjO3UAzH7tGX2DE0nqFaGsD/Ze', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id_basis_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  ADD PRIMARY KEY (`id_gejala_pasien`);

--
-- Indexes for table `hasil_analisa_pasien`
--
ALTER TABLE `hasil_analisa_pasien`
  ADD PRIMARY KEY (`id_hasil_analisa`);

--
-- Indexes for table `pasien_konsultasi`
--
ALTER TABLE `pasien_konsultasi`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id_basis_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  MODIFY `id_gejala_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2011;

--
-- AUTO_INCREMENT for table `hasil_analisa_pasien`
--
ALTER TABLE `hasil_analisa_pasien`
  MODIFY `id_hasil_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=851;

--
-- AUTO_INCREMENT for table `pasien_konsultasi`
--
ALTER TABLE `pasien_konsultasi`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
