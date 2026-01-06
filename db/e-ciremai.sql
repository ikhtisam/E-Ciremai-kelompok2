-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 02:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-ciremai`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `akun_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_id`, `username`, `password`, `time`) VALUES
(1, 'reza', '123', '0000-00-00 00:00:00.000000'),
(2, 'babi', '123', '2025-12-12 18:41:11.000000'),
(3, 'reza1', '123', '2025-12-12 19:06:08.005086'),
(5, 'imin', '234', '2025-12-13 05:22:28.594963'),
(6, 'depan', '456', '2025-12-13 06:17:37.795451'),
(8, 'rere', '234', '2025-12-13 06:19:29.967425'),
(10, 'admin', 'admin', '0000-00-00 00:00:00.000000'),
(11, 'amaa', '123', '2026-01-01 21:50:37.095356'),
(12, 'Akmal', 'ciremai', '2026-01-05 04:28:23.042376'),
(13, 'Imel', '23', '2026-01-05 04:36:28.338725'),
(14, 'anjing', 'ngentod', '2026-01-05 06:27:42.985679');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `ringkas` text DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `ringkas`, `konten`, `gambar`, `created_at`) VALUES
(2, 'orang hilang', 'asadeee', 'awook awook', '1767417986_WhatsApp Image 2025-11-15 at 21.00.23.jpeg', '2026-01-02 21:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `booking_anggota`
--

CREATE TABLE `booking_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_anggota`
--

INSERT INTO `booking_anggota` (`id_anggota`, `id_booking`, `nama_lengkap`, `no_ktp`, `jenis_kelamin`) VALUES
(1, 18, 'reza', '099090', 'L'),
(2, 18, 'readva', 'o9090', 'L'),
(3, 18, 'trr', '00909', 'L'),
(4, 19, 'reza', '90', 'L'),
(5, 19, '909', '90', 'L'),
(6, 19, 'yaya', '89', 'L'),
(7, 19, 'uii', '808', 'L'),
(18, 23, 'ama', '909', 'P'),
(19, 23, 'ry', '90', 'L'),
(20, 23, 'ima', '90', 'P'),
(42, 30, 're', '09', 'L'),
(43, 30, 're', '09', 'L'),
(44, 30, 're', '09', 'L'),
(45, 31, '09', '09', 'L'),
(46, 31, 're', '09', 'L'),
(47, 31, 're', '09', 'L'),
(51, 33, 're', '09', 'L'),
(52, 33, 'tr', '09', 'L'),
(53, 33, '09', '09', 'L'),
(54, 34, 'iui', 'uiui', 'L'),
(55, 34, 'iuiu', 'iuiu', 'L'),
(56, 34, 'iuiui', '98', 'L'),
(57, 35, 'trt', '09', 'L'),
(58, 35, 're', '09', 'L'),
(59, 35, 're', '90', 'L'),
(64, 37, 'rrr', '09', 'L'),
(65, 37, '09', '090', 'L'),
(66, 37, '909', '09', 'L'),
(67, 37, '09', '09', 'L'),
(68, 38, '09', '09', 'L'),
(69, 38, '09', '09', 'L'),
(70, 38, '09', '09', 'L'),
(71, 39, 're', '09', 'L'),
(72, 39, '09', '09', 'L'),
(73, 39, '09', '09', 'L'),
(74, 40, 'reza', '09', 'L'),
(75, 40, '09', '09', 'L'),
(76, 40, '09', '09', 'L'),
(77, 41, 're', '09', 'L'),
(78, 41, '09', '09', 'L'),
(79, 41, '09', '09', 'L'),
(80, 42, 'reza', '0908', 'L'),
(81, 42, '42432', '53525', 'L'),
(82, 42, '53525', '0909', 'L'),
(83, 43, '90', '09', 'L'),
(84, 43, '09', '09', 'L'),
(85, 43, '09', '09', 'L'),
(86, 43, '09', '09', 'L'),
(87, 44, 'rexa', '08790', 'L'),
(88, 44, 'ama', '098', 'P'),
(89, 44, '080', '0889', 'L'),
(90, 45, 'd', '3', 'L'),
(91, 45, 'f', '4', 'P'),
(92, 45, 'fg', '4', 'L'),
(93, 46, 'gffd', '0908', 'L'),
(94, 46, 'yatata', '0908', 'L'),
(95, 46, 'trfff', '0908', 'L'),
(96, 47, 're', '65666', 'L'),
(97, 47, '6565', '65', 'L'),
(98, 47, '65', '65', 'L'),
(99, 48, 'trtr', '66', 'L'),
(100, 48, '666', '6', 'L'),
(101, 48, '66', '666', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `booking_pendaki`
--

CREATE TABLE `booking_pendaki` (
  `id_booking` int(11) NOT NULL,
  `akun_id` int(100) DEFAULT NULL,
  `kode_booking` varchar(30) DEFAULT NULL,
  `id_kp` int(11) NOT NULL,
  `jalur` enum('apuy','sadarehe','linggarjati','palutungan') NOT NULL,
  `jumlah_pendaki` int(3) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_telp_keluarga` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` enum('menunggu_pembayaran','menunggu_konfirmasi','berhasil','ditolak') DEFAULT 'menunggu_pembayaran',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_booking` datetime DEFAULT current_timestamp(),
  `total_pembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_pendaki`
--

INSERT INTO `booking_pendaki` (`id_booking`, `akun_id`, `kode_booking`, `id_kp`, `jalur`, `jumlah_pendaki`, `no_ktp`, `nama_lengkap`, `tgl_lahir`, `jenis_kelamin`, `berat_badan`, `tinggi_badan`, `email`, `no_telp`, `no_telp_keluarga`, `created_at`, `status_pembayaran`, `bukti_pembayaran`, `tanggal_booking`, `total_pembayaran`) VALUES
(1, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-25', 'L', 90, 8, 'rezaikhtisam30@gmail.com', '09', '0909', '2025-12-31 08:23:04', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(2, NULL, NULL, 21, '', 7, '0880808', 'reza', '2025-12-02', 'L', 8, 8, 'rezaikhtisam30@gmail.com', '09', '0909', '2025-12-31 08:26:46', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(3, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:28:43', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(4, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:31:47', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(5, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:36:27', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(6, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:37:15', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(7, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:39:05', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(8, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:42:11', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(9, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:42:39', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(10, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:43:08', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(11, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:49:27', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(12, NULL, NULL, 21, '', 5, '0880808', 'reza', '2025-12-09', 'P', 900, 99, 'r@gmail.com', '09', '90', '2025-12-31 08:52:54', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(13, NULL, NULL, 21, '', 4, '0880808', '123', '2005-03-09', 'L', 90, 90, 'rezaikhtisam30@gmail.com', 'i0008', '08080', '2025-12-31 08:54:09', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(14, NULL, NULL, 21, '', 4, '0880808', '123', '2005-03-09', 'L', 90, 90, 'rezaikhtisam30@gmail.com', 'i0008', '08080', '2025-12-31 08:59:06', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(15, NULL, NULL, 19, '', 4, '09090', '009090', '0099-09-01', 'L', 90, 9, 'rezaikhtisam30@gmail.com', '09', '909', '2025-12-31 09:01:27', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(16, NULL, NULL, 19, '', 4, '09090', '009090', '0099-09-01', 'L', 90, 9, 'rezaikhtisam30@gmail.com', '09', '909', '2025-12-31 09:04:36', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(17, NULL, NULL, 19, '', 4, '09090', '009090', '0099-09-01', 'L', 90, 9, 'rezaikhtisam30@gmail.com', '09', '909', '2025-12-31 09:07:28', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(18, NULL, NULL, 19, '', 4, '09090', '009090', '0099-09-01', 'L', 90, 9, 'rezaikhtisam30@gmail.com', '09', '909', '2025-12-31 09:14:55', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(19, NULL, NULL, 21, '', 5, '88', '080', '0009-09-08', 'L', 7, 67, 'r@gmail.com', '90', '90', '2025-12-31 09:16:17', 'menunggu_pembayaran', NULL, '2025-12-31 01:38:57', NULL),
(23, NULL, 'BK-APU-20251231-A104', 21, 'apuy', 4, '0909', 'reza', '0090-01-09', 'L', 90, 9, 'r@gmail.com', '0909', '909', '2025-12-31 09:51:41', 'berhasil', '1767175325_Logo1.png', '2025-12-31 01:51:41', 160000),
(30, NULL, 'BK-APU-20251231-96F8', 23, 'apuy', 4, '9', 'rza', '0009-09-09', 'L', 9, 9, 'r@gmail.com', '09', '09', '2025-12-31 13:22:22', 'berhasil', '1767187352_WhatsApp Image 2025-12-27 at 05.23.43.jpeg', '2025-12-31 05:22:22', 160000),
(31, 1, 'BK-APU-20260101-1435', 19, 'apuy', 4, '09', 'reza', '0009-09-09', 'L', 9, 9, 'r@gmail.com', '090', '09', '2026-01-01 11:59:10', 'berhasil', '1767268767_US.drawio.png', '2026-01-01 03:59:10', 160000),
(33, 1, 'BK-SAD-20260101-7C43', 19, 'sadarehe', 4, '09', 'trtrtrtr', '0900-09-09', 'L', 90, 909, 'r@gmail.com', '09', '09', '2026-01-01 13:49:52', 'menunggu_konfirmasi', '1767278749_Untitled Diagram.drawio (7).png', '2026-01-01 05:49:52', 160000),
(34, 1, 'BK-SAD-20260101-FB55', 19, 'sadarehe', 4, '988', 'rrererererere', '9090-09-09', 'L', 9, 909, 'r@gmail.com', '09', '09', '2026-01-01 13:59:20', 'menunggu_konfirmasi', '1767278727_WhatsApp Image 2025-12-27 at 05.23.43.jpeg', '2026-01-01 05:59:20', 160000),
(35, 1, 'BK-SAD-20260101-D615', 19, 'sadarehe', 4, '090', 'rererer', '0090-09-09', 'L', 9, 9, 'r@gmail.com', 't09', '099', '2026-01-01 14:00:58', 'berhasil', '1767276076_Logo1.1.png', '2026-01-01 06:00:58', 160000),
(37, 1, 'BK-PAL-20260101-01C3', 19, 'palutungan', 5, '09', 'tetete', '0909-09-09', 'L', 9, 9, 'rea@gmail.com', '09', '09', '2026-01-01 14:11:01', 'menunggu_konfirmasi', '1767276674_apuy.jpeg', '2026-01-01 06:11:01', 200000),
(38, 1, 'BK-APU-20260101-010B', 19, 'apuy', 4, '09', '09', '0009-09-09', 'L', 909, 9, 'r@gmail.com', '09', '09', '2026-01-01 14:37:46', 'berhasil', '1767278416_WhatsApp Image 2025-12-27 at 05.23.43.jpeg', '2026-01-01 06:37:46', 160000),
(39, 1, 'BK-LIN-20260102-1068', 19, 'linggarjati', 4, '09', 'rezaaa', '0009-09-09', 'L', 9, 9, 'r@gmail.com', '09', '09', '2026-01-02 06:21:47', 'berhasil', '1767334915_logo.png', '2026-01-01 22:21:47', 160000),
(40, 1, 'BK-SAD-20260102-2738', 23, 'sadarehe', 4, '09', 'traaaaaaaa', '0009-09-09', 'L', 9, 9, 'r@gmail.com', '09', '09', '2026-01-02 07:08:40', 'berhasil', '1767337727_Untitled Diagram.drawio (7).png', '2026-01-01 23:08:40', 160000),
(41, 1, 'BK-APU-20260102-068B', 23, 'apuy', 4, '09', 'atragka', '0909-09-09', 'L', 9, 9, 'r@gmail.com', '09', '09', '2026-01-02 13:12:56', 'berhasil', '1767359606_Logo1.png', '2026-01-02 05:12:56', 160000),
(42, 1, 'BK-APU-20260103-9EA2', 23, 'apuy', 4, '090', 'Rezaa ikhhhh', '2026-01-08', 'L', 70, 15, 'rezaikhtisam933@gmail.com', '089', '0800', '2026-01-03 06:54:19', 'berhasil', '1767423287_IMG-20260102-WA0012.jpg', '2026-01-02 22:54:19', 160000),
(43, 10, 'BK-LIN-20260103-13A1', 24, 'linggarjati', 5, '90909', 'TRTTRTRTRT', '0909-09-09', 'L', 9, 9, 'rea@gmail.com', '09', '09', '2026-01-03 15:42:11', 'berhasil', '1767454942_g10.jpg', '2026-01-03 07:42:11', 200000),
(44, 1, 'BK-SAD-20260103-3888', 25, 'sadarehe', 4, '0889', 'Rezaaaaaa', '2005-09-30', 'L', 50, 70, 'rezaikhtisam933@gmail.com', '07908', '08679', '2026-01-03 16:11:14', 'berhasil', '1767456693_IMG-20260102-WA0005.jpeg', '2026-01-03 08:11:14', 160000),
(45, 13, 'BK-APU-20260105-AC87', 25, 'apuy', 4, '234', 'sfd', '2026-01-04', 'P', 23, 5, 'imeldamaryani23@gmail.com', '8878945785478', '3455665536', '2026-01-05 13:20:23', 'ditolak', '1767619290_logo utb.jpg', '2026-01-05 05:20:23', 160000),
(46, 1, 'BK-APU-20260105-3D64', 25, 'apuy', 4, '090', 'rezaaaaa', '2025-12-01', 'L', 20, 20, 'rezaikhtisam933@gmail.com', '089', '08679', '2026-01-05 14:37:49', 'menunggu_pembayaran', NULL, '2026-01-05 06:37:49', NULL),
(47, 1, 'BK-APU-20260105-CA64', 25, 'apuy', 4, '65', '65', '0065-06-05', 'L', 6565, 6565, 'r@gmail.com', '8989', '08080', '2026-01-05 15:33:56', 'menunggu_konfirmasi', '1767627300_g7.jpg', '2026-01-05 07:33:56', 160000),
(48, 1, 'BK-SAD-20260105-B130', 25, 'sadarehe', 4, '66', '66', '0006-06-06', 'L', 6, 66, 'rea@gmail.com', '767', '09', '2026-01-05 15:38:41', 'menunggu_pembayaran', NULL, '2026-01-05 07:38:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `gambar`, `created_at`) VALUES
(2, 'apuy', '1767454114_g2.jpg', '2026-01-03 03:52:52'),
(3, 'G-Ciremai', '1767454723_crm-reza1.jpeg', '2026-01-03 07:38:43'),
(4, 'G-Ciremai 2', '1767454746_g3.jpg', '2026-01-03 07:39:06'),
(5, 'G-Ciremai 3', '1767454767_g4.jpg', '2026-01-03 07:39:27'),
(6, 'G-Ciremai 4', '1767454797_g5.jpg', '2026-01-03 07:39:57'),
(7, 'gilng', '1767697969_g9.jpg', '2026-01-06 03:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
(3, 'halaman bawah', '', '<p><img src=\"../img/202cb962ac59075b964b07152d234b70.jpeg\" style=\"width: 904px;\"><br></p>', '2025-12-29 06:13:08'),
(14, 'Booking Sekarang!!', 'Booking Sekarang!!', '<p style=\"font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\"; font-size: 20px;\">Pendakian, Berkemah, Pengamatan flora fauna, & Pemandangan Alam</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\"; font-size: 20px;\"><img src=\"../img/96da2f590cd7246bbde0051047b0d6f7.jpeg\" style=\"width: 904px;\"><br></p>', '2025-12-26 05:55:25'),
(15, 'Welcome To Ciremai', 'Jalan Lebih Menantang', '<p>Jalur Apuy ke Ciremai terkenal cepat tapi curam. Pemandangannya bagus dan banyak area terbuka. Waktu naik sekitar 5–7 jam dan basecamp-nya lengkap. Cocok untuk pendaki yang ingin jalur singkat namun menantang.<img src=\"../img/f0935e4cd5920aa6c7c996a5ee53a70f.jpg\" style=\"width: 1053.78px;\"></p>', '2025-12-14 14:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `kuota_pendakian`
--

CREATE TABLE `kuota_pendakian` (
  `id_kp` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `apuy` int(11) DEFAULT 0,
  `palutungan` int(11) DEFAULT 0,
  `linggarjati` int(11) DEFAULT 0,
  `sadarehe` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuota_pendakian`
--

INSERT INTO `kuota_pendakian` (`id_kp`, `tanggal`, `apuy`, `palutungan`, `linggarjati`, `sadarehe`) VALUES
(7, '2025-12-23', 90, 99, 80, 99),
(8, '2025-12-23', 90, 99, 80, 99),
(11, '2025-12-17', 100, 0, 0, 0),
(18, '2025-12-22', 0, 0, 0, 0),
(19, '2026-01-02', 285, 295, 296, 292),
(21, '2026-01-01', 0, 0, 1, 100),
(22, '2026-01-07', 100, 100, 100, 100),
(23, '2026-01-03', 293, 300, 300, 296),
(24, '2026-01-04', 300, 300, 295, 308),
(25, '2026-01-05', 292, 300, 300, 296);

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_ciremai`
--

CREATE TABLE `sejarah_ciremai` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `ringkas` text DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah_ciremai`
--

INSERT INTO `sejarah_ciremai` (`id`, `judul`, `ringkas`, `konten`, `gambar`, `created_at`) VALUES
(1, 'SEJARAH CIREMAI', 'Gunung Ciremai mencakup catatan vulkanik aktif dengan letusan terakhir tahun 1938, asal-usul nama dari tumbuhan cereme atau legenda \"pencecereman\" Wali Songo, serta kaya akan legenda mistis seperti Nini Pelet, Nyi Linggi, dan harimau bermata satu, yang menjadikannya monumen alam dan budaya penting di Jawa Barat, sering dianggap sakral dan menjadi pusat spiritual bagi masyarakat Sunda', 'Sejarah Nama dan Legenda\r\nAsal Nama: Nama \"Ciremai\" berasal dari tumbuhan cereme (Phyllanthus acidus) yang banyak tumbuh di lerengnya, atau dari kata \"pencecereman\" yang berarti perundingan para wali, karena Wali Songo dipercaya pernah bermusyawarah di puncaknya. \r\nHubungan dengan Wali Songo: Konon Sunan Gunung Jati melakukan tadabur alam di Batu Lingga untuk menghadapi penjajah Portugis, memperkuat sisi spiritual gunung ini. ', '1767416462_WhatsApp Image 2025-12-27 at 05.23.43.jpeg', '2026-01-02 07:28:57'),
(2, 'trtrtrtr', 'trtrtr', 'trtr', '1767416002_logo.png', '2026-01-02 20:53:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`akun_id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_anggota`
--
ALTER TABLE `booking_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `booking_pendaki`
--
ALTER TABLE `booking_pendaki`
  ADD PRIMARY KEY (`id_booking`),
  ADD UNIQUE KEY `kode_booking` (`kode_booking`),
  ADD KEY `fk_booking_kp` (`id_kp`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuota_pendakian`
--
ALTER TABLE `kuota_pendakian`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `sejarah_ciremai`
--
ALTER TABLE `sejarah_ciremai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `akun_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_anggota`
--
ALTER TABLE `booking_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `booking_pendaki`
--
ALTER TABLE `booking_pendaki`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kuota_pendakian`
--
ALTER TABLE `kuota_pendakian`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sejarah_ciremai`
--
ALTER TABLE `sejarah_ciremai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_anggota`
--
ALTER TABLE `booking_anggota`
  ADD CONSTRAINT `booking_anggota_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking_pendaki` (`id_booking`) ON DELETE CASCADE;

--
-- Constraints for table `booking_pendaki`
--
ALTER TABLE `booking_pendaki`
  ADD CONSTRAINT `fk_booking_kp` FOREIGN KEY (`id_kp`) REFERENCES `kuota_pendakian` (`id_kp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
