-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2023 at 12:22 PM
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
-- Database: `evaluasi_kepuasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `name`, `username`, `password`, `image`) VALUES
(1, 'Administrator', 'admin', '$2y$10$rkUS5xQwguXrr7Nxms61CefO61nbS1DU6IRJlbLX7JP8w45iXQ/kW', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_responden`
--

CREATE TABLE `biodata_responden` (
  `id` int(11) NOT NULL,
  `kode_responden` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_responden`
--

INSERT INTO `biodata_responden` (`id`, `kode_responden`, `nama`, `alamat`, `id_layanan`, `tanggal`) VALUES
(14, 'R-835545400', 'Responden 1', 'Tomohon', 2, '2023-11-08'),
(15, 'R-2040282153', 'Bota', 'Tomohon', 2, '2023-11-08'),
(16, 'R-1358366975', 'Gospel', 'Tomohon', 2, '2023-11-08'),
(17, 'R-799453821', 'Angga', 'Tomohon', 2, '2023-11-08'),
(18, 'R-986172155', 'Abas', 'Tomohon', 2, '2023-11-08'),
(19, 'R-788509997', 'Holly', 'Tomohon', 2, '2023-11-08'),
(20, 'R-568676562', 'Leo', 'Tomohon', 2, '2023-11-08'),
(21, 'R-781422425', 'Enggo', 'Tomohon', 2, '2023-11-08'),
(22, 'R-778299161', 'Serwin', 'Tomohon', 2, '2023-11-08'),
(23, 'R-818073694', 'Vanus', 'Tomohon', 2, '2023-11-08'),
(24, 'R-1046893591', 'Mario', 'Tomohon', 2, '2023-11-08'),
(25, 'R-1382729817', 'Brian', 'Tomohon', 2, '2023-11-08'),
(26, 'R-1783126367', 'Revaldy', 'Tomohon', 2, '2023-11-08'),
(27, 'R-953806403', 'Buds', 'Tomohon', 2, '2023-11-08'),
(28, 'R-1814602789', 'Apim', 'Tomohon', 2, '2023-11-08'),
(29, 'R-1649296731', 'Kenny', 'Woloan', 2, '2023-11-08'),
(30, 'R-330492791', 'Jonathan', 'Walian', 2, '2023-11-08'),
(31, 'R-1084761190', 'Ipay', 'Woloan', 2, '2023-11-08'),
(32, 'R-788135833', 'Kerin', 'Walian', 2, '2023-11-08'),
(33, 'R-200013919', 'Responden-20', 'Walian', 2, '2023-11-08'),
(34, 'R-1264891900', 'Test', 'Test', 1, '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `data_layanan`
--

CREATE TABLE `data_layanan` (
  `id` int(11) NOT NULL,
  `layanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_layanan`
--

INSERT INTO `data_layanan` (`id`, `layanan`) VALUES
(1, 'Pelayanan Pertemuan Tatap Muka'),
(2, 'Pelayanan Terpadu Satu Pintu'),
(3, 'Pelayanan Pengantaran Surat'),
(4, 'Pelayanan Mengunjungi Rutan Kejaksaan'),
(5, 'Pelayanan Tamu Mengantar Tahapan Tahap 2'),
(6, 'Pelayanan Tamu Wajib Lapor');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertanyaan`
--

CREATE TABLE `data_pertanyaan` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `jenis_pertanyaan` enum('Pertanyaan Harapan/Pelayanan','Pertanyaan Persepsi/Layanan') NOT NULL,
  `pertanyaan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pertanyaan`
--

INSERT INTO `data_pertanyaan` (`id`, `id_layanan`, `jenis_pertanyaan`, `pertanyaan`) VALUES
(1, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas tidak membeda-bedakan dalam memberikan pelayanan'),
(2, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas melayani berdasarkan SOP'),
(3, 2, 'Pertanyaan Harapan/Pelayanan', 'Pelayanan sesuai dengan waktu yang ditentukan'),
(4, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas menjelaskan mengenai standar pelayanan'),
(5, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas pelayanan selalu berada di tempat'),
(6, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas memberikan pelayanan sesuai wewenangnya'),
(7, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas bersikap baik, rapi dan menjelaskan dengan\r\nsungguh-sungguh'),
(8, 2, 'Pertanyaan Harapan/Pelayanan', 'Ruangan tertata rapi, bersih dan tidak pengap'),
(9, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas memberikan bukti pembayaran dan tidak\r\nmelakukan pungli'),
(10, 2, 'Pertanyaan Harapan/Pelayanan', 'Petugas tidak memberikan pelayanan dengan bertele- tele'),
(11, 2, 'Pertanyaan Persepsi/Layanan', 'Layanan yang diberikan tidak mempersulit masyarakat'),
(12, 2, 'Pertanyaan Persepsi/Layanan', 'Layanan diberikan sesuai dengan ketentuan SOP dan\r\naturan layanan'),
(13, 2, 'Pertanyaan Persepsi/Layanan', 'Bagaimana pendapat anda tentang waktu dalam\r\nmenyelesaikan layanan ?'),
(14, 2, 'Pertanyaan Persepsi/Layanan', 'Bagaimana tingkat kompetensi dari petugas yang\r\nmemberikan pelayanan PTSP ?'),
(15, 2, 'Pertanyaan Persepsi/Layanan', 'Bagaimana tingkat kepuasan anda terhadap layanan\r\nyang telah diberikan'),
(16, 2, 'Pertanyaan Persepsi/Layanan', 'Bagaimana pendapat anda dengan Pelaksanaan Layanan PTSP ?'),
(17, 2, 'Pertanyaan Persepsi/Layanan', 'Layanan yang diberikan sangat membantu masyarakat'),
(18, 2, 'Pertanyaan Persepsi/Layanan', 'Apakah anda merasa puas dengan sarana-prasarana yang\r\ndiberikan selama anda memperoleh layanan ?'),
(19, 2, 'Pertanyaan Persepsi/Layanan', 'Biaya layanan sesuai dengan ketentuan yang diberikan'),
(20, 2, 'Pertanyaan Persepsi/Layanan', 'Apakah produk hasil layanan dapat memenuhi standar\r\nanda ?'),
(21, 1, 'Pertanyaan Harapan/Pelayanan', 'Edit Pertanyaan'),
(22, 1, 'Pertanyaan Persepsi/Layanan', 'Edit Pertanyaan Persepsi');

-- --------------------------------------------------------

--
-- Table structure for table `data_responden_harapan`
--

CREATE TABLE `data_responden_harapan` (
  `id` int(11) NOT NULL,
  `id_pertanyaan_harapan` int(11) NOT NULL,
  `responden_harapan` varchar(100) NOT NULL,
  `nilai_harapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_responden_harapan`
--

INSERT INTO `data_responden_harapan` (`id`, `id_pertanyaan_harapan`, `responden_harapan`, `nilai_harapan`) VALUES
(104, 1, 'R-835545400', 5),
(105, 2, 'R-835545400', 5),
(106, 3, 'R-835545400', 3),
(107, 4, 'R-835545400', 4),
(108, 5, 'R-835545400', 4),
(109, 6, 'R-835545400', 4),
(110, 7, 'R-835545400', 3),
(111, 8, 'R-835545400', 3),
(112, 9, 'R-835545400', 5),
(113, 10, 'R-835545400', 4),
(114, 1, 'R-2040282153', 4),
(115, 2, 'R-2040282153', 4),
(116, 3, 'R-2040282153', 4),
(117, 4, 'R-2040282153', 5),
(118, 5, 'R-2040282153', 4),
(119, 6, 'R-2040282153', 5),
(120, 7, 'R-2040282153', 5),
(121, 8, 'R-2040282153', 5),
(122, 9, 'R-2040282153', 4),
(123, 10, 'R-2040282153', 4),
(124, 1, 'R-1358366975', 5),
(125, 2, 'R-1358366975', 2),
(126, 3, 'R-1358366975', 2),
(127, 4, 'R-1358366975', 4),
(128, 5, 'R-1358366975', 5),
(129, 6, 'R-1358366975', 5),
(130, 7, 'R-1358366975', 4),
(131, 8, 'R-1358366975', 5),
(132, 9, 'R-1358366975', 4),
(133, 10, 'R-1358366975', 3),
(134, 1, 'R-799453821', 4),
(135, 2, 'R-799453821', 4),
(136, 3, 'R-799453821', 4),
(137, 4, 'R-799453821', 4),
(138, 5, 'R-799453821', 4),
(139, 6, 'R-799453821', 4),
(140, 7, 'R-799453821', 4),
(141, 8, 'R-799453821', 3),
(142, 9, 'R-799453821', 4),
(143, 10, 'R-799453821', 2),
(144, 1, 'R-986172155', 5),
(145, 2, 'R-986172155', 5),
(146, 3, 'R-986172155', 5),
(147, 4, 'R-986172155', 5),
(148, 5, 'R-986172155', 4),
(149, 6, 'R-986172155', 5),
(150, 7, 'R-986172155', 3),
(151, 8, 'R-986172155', 2),
(152, 9, 'R-986172155', 4),
(153, 10, 'R-986172155', 4),
(154, 1, 'R-788509997', 4),
(155, 2, 'R-788509997', 4),
(156, 3, 'R-788509997', 4),
(157, 4, 'R-788509997', 4),
(158, 5, 'R-788509997', 4),
(159, 6, 'R-788509997', 4),
(160, 7, 'R-788509997', 5),
(161, 8, 'R-788509997', 4),
(162, 9, 'R-788509997', 4),
(163, 10, 'R-788509997', 4),
(164, 1, 'R-568676562', 4),
(165, 2, 'R-568676562', 4),
(166, 3, 'R-568676562', 4),
(167, 4, 'R-568676562', 3),
(168, 5, 'R-568676562', 4),
(169, 6, 'R-568676562', 4),
(170, 7, 'R-568676562', 2),
(171, 8, 'R-568676562', 4),
(172, 9, 'R-568676562', 5),
(173, 10, 'R-568676562', 5),
(174, 1, 'R-781422425', 3),
(175, 2, 'R-781422425', 3),
(176, 3, 'R-781422425', 4),
(177, 4, 'R-781422425', 4),
(178, 5, 'R-781422425', 5),
(179, 6, 'R-781422425', 5),
(180, 7, 'R-781422425', 4),
(181, 8, 'R-781422425', 5),
(182, 9, 'R-781422425', 4),
(183, 10, 'R-781422425', 5),
(184, 1, 'R-778299161', 5),
(185, 2, 'R-778299161', 5),
(186, 3, 'R-778299161', 2),
(187, 4, 'R-778299161', 4),
(188, 5, 'R-778299161', 5),
(189, 6, 'R-778299161', 5),
(190, 7, 'R-778299161', 5),
(191, 8, 'R-778299161', 4),
(192, 9, 'R-778299161', 3),
(193, 10, 'R-778299161', 3),
(194, 1, 'R-818073694', 5),
(195, 2, 'R-818073694', 4),
(196, 3, 'R-818073694', 5),
(197, 4, 'R-818073694', 4),
(198, 5, 'R-818073694', 5),
(199, 6, 'R-818073694', 5),
(200, 7, 'R-818073694', 5),
(201, 8, 'R-818073694', 5),
(202, 9, 'R-818073694', 4),
(203, 10, 'R-818073694', 5),
(204, 1, 'R-1046893591', 4),
(205, 2, 'R-1046893591', 4),
(206, 3, 'R-1046893591', 3),
(207, 4, 'R-1046893591', 3),
(208, 5, 'R-1046893591', 2),
(209, 6, 'R-1046893591', 5),
(210, 7, 'R-1046893591', 5),
(211, 8, 'R-1046893591', 5),
(212, 9, 'R-1046893591', 5),
(213, 10, 'R-1046893591', 5),
(214, 1, 'R-1382729817', 5),
(215, 2, 'R-1382729817', 5),
(216, 3, 'R-1382729817', 5),
(217, 4, 'R-1382729817', 3),
(218, 5, 'R-1382729817', 5),
(219, 6, 'R-1382729817', 4),
(220, 7, 'R-1382729817', 5),
(221, 8, 'R-1382729817', 4),
(222, 9, 'R-1382729817', 5),
(223, 10, 'R-1382729817', 4),
(224, 1, 'R-1783126367', 3),
(225, 2, 'R-1783126367', 4),
(226, 3, 'R-1783126367', 5),
(227, 4, 'R-1783126367', 5),
(228, 5, 'R-1783126367', 5),
(229, 6, 'R-1783126367', 5),
(230, 7, 'R-1783126367', 5),
(231, 8, 'R-1783126367', 5),
(232, 9, 'R-1783126367', 5),
(233, 10, 'R-1783126367', 3),
(234, 1, 'R-953806403', 4),
(235, 2, 'R-953806403', 4),
(236, 3, 'R-953806403', 4),
(237, 4, 'R-953806403', 4),
(238, 5, 'R-953806403', 3),
(239, 6, 'R-953806403', 3),
(240, 7, 'R-953806403', 3),
(241, 8, 'R-953806403', 4),
(242, 9, 'R-953806403', 4),
(243, 10, 'R-953806403', 5),
(244, 1, 'R-1814602789', 5),
(245, 2, 'R-1814602789', 5),
(246, 3, 'R-1814602789', 4),
(247, 4, 'R-1814602789', 3),
(248, 5, 'R-1814602789', 4),
(249, 6, 'R-1814602789', 3),
(250, 7, 'R-1814602789', 4),
(251, 8, 'R-1814602789', 3),
(252, 9, 'R-1814602789', 3),
(253, 10, 'R-1814602789', 4),
(254, 1, 'R-1649296731', 3),
(255, 2, 'R-1649296731', 3),
(256, 3, 'R-1649296731', 3),
(257, 4, 'R-1649296731', 3),
(258, 5, 'R-1649296731', 3),
(259, 6, 'R-1649296731', 4),
(260, 7, 'R-1649296731', 4),
(261, 8, 'R-1649296731', 5),
(262, 9, 'R-1649296731', 5),
(263, 10, 'R-1649296731', 4),
(264, 1, 'R-330492791', 3),
(265, 2, 'R-330492791', 4),
(266, 3, 'R-330492791', 4),
(267, 4, 'R-330492791', 4),
(268, 5, 'R-330492791', 4),
(269, 6, 'R-330492791', 4),
(270, 7, 'R-330492791', 5),
(271, 8, 'R-330492791', 5),
(272, 9, 'R-330492791', 5),
(273, 10, 'R-330492791', 5),
(274, 1, 'R-1084761190', 4),
(275, 2, 'R-1084761190', 4),
(276, 3, 'R-1084761190', 4),
(277, 4, 'R-1084761190', 4),
(278, 5, 'R-1084761190', 4),
(279, 6, 'R-1084761190', 5),
(280, 7, 'R-1084761190', 5),
(281, 8, 'R-1084761190', 5),
(282, 9, 'R-1084761190', 3),
(283, 10, 'R-1084761190', 4),
(284, 1, 'R-788135833', 3),
(285, 2, 'R-788135833', 4),
(286, 3, 'R-788135833', 4),
(287, 4, 'R-788135833', 4),
(288, 5, 'R-788135833', 5),
(289, 6, 'R-788135833', 3),
(290, 7, 'R-788135833', 5),
(291, 8, 'R-788135833', 5),
(292, 9, 'R-788135833', 5),
(293, 10, 'R-788135833', 5),
(294, 1, 'R-200013919', 4),
(295, 2, 'R-200013919', 4),
(296, 3, 'R-200013919', 4),
(297, 4, 'R-200013919', 4),
(298, 5, 'R-200013919', 4),
(299, 6, 'R-200013919', 3),
(300, 7, 'R-200013919', 3),
(301, 8, 'R-200013919', 5),
(302, 9, 'R-200013919', 5),
(303, 10, 'R-200013919', 4),
(304, 21, 'R-1264891900', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_responden_persepsi`
--

CREATE TABLE `data_responden_persepsi` (
  `id` int(11) NOT NULL,
  `id_pertanyaan_persepsi` int(11) NOT NULL,
  `responden_persepsi` varchar(100) NOT NULL,
  `nilai_persepsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_responden_persepsi`
--

INSERT INTO `data_responden_persepsi` (`id`, `id_pertanyaan_persepsi`, `responden_persepsi`, `nilai_persepsi`) VALUES
(91, 11, 'R-835545400', 4),
(92, 12, 'R-835545400', 4),
(93, 13, 'R-835545400', 4),
(94, 14, 'R-835545400', 4),
(95, 15, 'R-835545400', 5),
(96, 16, 'R-835545400', 5),
(97, 17, 'R-835545400', 4),
(98, 18, 'R-835545400', 3),
(99, 19, 'R-835545400', 4),
(100, 20, 'R-835545400', 4),
(101, 11, 'R-2040282153', 3),
(102, 12, 'R-2040282153', 3),
(103, 13, 'R-2040282153', 3),
(104, 14, 'R-2040282153', 5),
(105, 15, 'R-2040282153', 4),
(106, 16, 'R-2040282153', 4),
(107, 17, 'R-2040282153', 3),
(108, 18, 'R-2040282153', 4),
(109, 19, 'R-2040282153', 3),
(110, 20, 'R-2040282153', 4),
(111, 11, 'R-1358366975', 3),
(112, 12, 'R-1358366975', 4),
(113, 13, 'R-1358366975', 4),
(114, 14, 'R-1358366975', 3),
(115, 15, 'R-1358366975', 4),
(116, 16, 'R-1358366975', 5),
(117, 17, 'R-1358366975', 5),
(118, 18, 'R-1358366975', 4),
(119, 19, 'R-1358366975', 3),
(120, 20, 'R-1358366975', 4),
(121, 11, 'R-799453821', 2),
(122, 12, 'R-799453821', 4),
(123, 13, 'R-799453821', 3),
(124, 14, 'R-799453821', 5),
(125, 15, 'R-799453821', 5),
(126, 16, 'R-799453821', 5),
(127, 17, 'R-799453821', 5),
(128, 18, 'R-799453821', 5),
(129, 19, 'R-799453821', 5),
(130, 20, 'R-799453821', 5),
(131, 11, 'R-986172155', 3),
(132, 12, 'R-986172155', 4),
(133, 13, 'R-986172155', 5),
(134, 14, 'R-986172155', 4),
(135, 15, 'R-986172155', 4),
(136, 16, 'R-986172155', 3),
(137, 17, 'R-986172155', 4),
(138, 18, 'R-986172155', 5),
(139, 19, 'R-986172155', 5),
(140, 20, 'R-986172155', 5),
(141, 11, 'R-788509997', 5),
(142, 12, 'R-788509997', 5),
(143, 13, 'R-788509997', 5),
(144, 14, 'R-788509997', 5),
(145, 15, 'R-788509997', 5),
(146, 16, 'R-788509997', 5),
(147, 17, 'R-788509997', 5),
(148, 18, 'R-788509997', 5),
(149, 19, 'R-788509997', 5),
(150, 20, 'R-788509997', 5),
(151, 11, 'R-568676562', 4),
(152, 12, 'R-568676562', 4),
(153, 13, 'R-568676562', 4),
(154, 14, 'R-568676562', 5),
(155, 15, 'R-568676562', 3),
(156, 16, 'R-568676562', 3),
(157, 17, 'R-568676562', 3),
(158, 18, 'R-568676562', 5),
(159, 19, 'R-568676562', 5),
(160, 20, 'R-568676562', 5),
(161, 11, 'R-781422425', 3),
(162, 12, 'R-781422425', 3),
(163, 13, 'R-781422425', 3),
(164, 14, 'R-781422425', 3),
(165, 15, 'R-781422425', 4),
(166, 16, 'R-781422425', 4),
(167, 17, 'R-781422425', 4),
(168, 18, 'R-781422425', 4),
(169, 19, 'R-781422425', 5),
(170, 20, 'R-781422425', 5),
(171, 11, 'R-778299161', 4),
(172, 12, 'R-778299161', 4),
(173, 13, 'R-778299161', 4),
(174, 14, 'R-778299161', 4),
(175, 15, 'R-778299161', 4),
(176, 16, 'R-778299161', 5),
(177, 17, 'R-778299161', 5),
(178, 18, 'R-778299161', 5),
(179, 19, 'R-778299161', 5),
(180, 20, 'R-778299161', 5),
(181, 11, 'R-818073694', 4),
(182, 12, 'R-818073694', 4),
(183, 13, 'R-818073694', 4),
(184, 14, 'R-818073694', 4),
(185, 15, 'R-818073694', 4),
(186, 16, 'R-818073694', 4),
(187, 17, 'R-818073694', 4),
(188, 18, 'R-818073694', 5),
(189, 19, 'R-818073694', 5),
(190, 20, 'R-818073694', 4),
(191, 11, 'R-1046893591', 2),
(192, 12, 'R-1046893591', 3),
(193, 13, 'R-1046893591', 4),
(194, 14, 'R-1046893591', 4),
(195, 15, 'R-1046893591', 5),
(196, 16, 'R-1046893591', 5),
(197, 17, 'R-1046893591', 4),
(198, 18, 'R-1046893591', 4),
(199, 19, 'R-1046893591', 4),
(200, 20, 'R-1046893591', 4),
(201, 11, 'R-1382729817', 5),
(202, 12, 'R-1382729817', 5),
(203, 13, 'R-1382729817', 5),
(204, 14, 'R-1382729817', 5),
(205, 15, 'R-1382729817', 5),
(206, 16, 'R-1382729817', 5),
(207, 17, 'R-1382729817', 5),
(208, 18, 'R-1382729817', 5),
(209, 19, 'R-1382729817', 5),
(210, 20, 'R-1382729817', 5),
(211, 11, 'R-1783126367', 4),
(212, 12, 'R-1783126367', 4),
(213, 13, 'R-1783126367', 4),
(214, 14, 'R-1783126367', 3),
(215, 15, 'R-1783126367', 3),
(216, 16, 'R-1783126367', 3),
(217, 17, 'R-1783126367', 4),
(218, 18, 'R-1783126367', 3),
(219, 19, 'R-1783126367', 4),
(220, 20, 'R-1783126367', 4),
(221, 11, 'R-953806403', 4),
(222, 12, 'R-953806403', 4),
(223, 13, 'R-953806403', 4),
(224, 14, 'R-953806403', 4),
(225, 15, 'R-953806403', 4),
(226, 16, 'R-953806403', 3),
(227, 17, 'R-953806403', 3),
(228, 18, 'R-953806403', 3),
(229, 19, 'R-953806403', 3),
(230, 20, 'R-953806403', 4),
(231, 11, 'R-1814602789', 3),
(232, 12, 'R-1814602789', 2),
(233, 13, 'R-1814602789', 3),
(234, 14, 'R-1814602789', 4),
(235, 15, 'R-1814602789', 4),
(236, 16, 'R-1814602789', 4),
(237, 17, 'R-1814602789', 4),
(238, 18, 'R-1814602789', 4),
(239, 19, 'R-1814602789', 4),
(240, 20, 'R-1814602789', 4),
(241, 11, 'R-1649296731', 3),
(242, 12, 'R-1649296731', 3),
(243, 13, 'R-1649296731', 3),
(244, 14, 'R-1649296731', 3),
(245, 15, 'R-1649296731', 4),
(246, 16, 'R-1649296731', 4),
(247, 17, 'R-1649296731', 2),
(248, 18, 'R-1649296731', 5),
(249, 19, 'R-1649296731', 5),
(250, 20, 'R-1649296731', 5),
(251, 11, 'R-330492791', 4),
(252, 12, 'R-330492791', 4),
(253, 13, 'R-330492791', 4),
(254, 14, 'R-330492791', 4),
(255, 15, 'R-330492791', 4),
(256, 16, 'R-330492791', 4),
(257, 17, 'R-330492791', 4),
(258, 18, 'R-330492791', 4),
(259, 19, 'R-330492791', 4),
(260, 20, 'R-330492791', 4),
(261, 11, 'R-1084761190', 4),
(262, 12, 'R-1084761190', 5),
(263, 13, 'R-1084761190', 4),
(264, 14, 'R-1084761190', 5),
(265, 15, 'R-1084761190', 5),
(266, 16, 'R-1084761190', 5),
(267, 17, 'R-1084761190', 5),
(268, 18, 'R-1084761190', 5),
(269, 19, 'R-1084761190', 5),
(270, 20, 'R-1084761190', 5),
(271, 11, 'R-788135833', 4),
(272, 12, 'R-788135833', 4),
(273, 13, 'R-788135833', 4),
(274, 14, 'R-788135833', 4),
(275, 15, 'R-788135833', 4),
(276, 16, 'R-788135833', 4),
(277, 17, 'R-788135833', 4),
(278, 18, 'R-788135833', 4),
(279, 19, 'R-788135833', 3),
(280, 20, 'R-788135833', 4),
(281, 11, 'R-200013919', 5),
(282, 12, 'R-200013919', 5),
(283, 13, 'R-200013919', 5),
(284, 14, 'R-200013919', 5),
(285, 15, 'R-200013919', 4),
(286, 16, 'R-200013919', 4),
(287, 17, 'R-200013919', 4),
(288, 18, 'R-200013919', 5),
(289, 19, 'R-200013919', 5),
(290, 20, 'R-200013919', 5),
(291, 22, 'R-1264891900', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata_responden`
--
ALTER TABLE `biodata_responden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_layanan`
--
ALTER TABLE `data_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_responden_harapan`
--
ALTER TABLE `data_responden_harapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_responden_persepsi`
--
ALTER TABLE `data_responden_persepsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata_responden`
--
ALTER TABLE `biodata_responden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `data_layanan`
--
ALTER TABLE `data_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_responden_harapan`
--
ALTER TABLE `data_responden_harapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `data_responden_persepsi`
--
ALTER TABLE `data_responden_persepsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
