-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 02:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survei_kpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_file` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kepala` int(11) DEFAULT NULL,
  `nama_file` varchar(256) DEFAULT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id_file`, `id_user`, `id_kepala`, `nama_file`, `file`) VALUES
(17, 22, 12, 'ini ganti', 'AbtrakdanInterface3.pdf'),
(32, 22, 12, 'nananna', 'ppt presentasi rabu (1).pptx');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `jabatan` varchar(256) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `jenis_kelamin` varchar(256) DEFAULT NULL,
  `note1` varchar(256) DEFAULT NULL,
  `note2` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_sekolah`, `nip`, `nama`, `telp`, `email`, `jabatan`, `foto`, `jenis_kelamin`, `note1`, `note2`) VALUES
(9, 6, '123', 'Pak Guru', '08987654321', 'pakguru@gmail.com', 'guru', 'kisspng-avatar-education-professor-user-profile-faculty-boss-5abcab3d918a17_21409156152231404559616.png', 'Laki-laki', NULL, NULL),
(10, 6, '456', 'Bu Guru', '08123456789', 'buguru@gmail.com', 'guru', 'kisspng-computer-icons-user-profile-avatar-profile-transparent-png-5ab03f3e24df49_00541654152149996615112.png', 'Perempuan', NULL, NULL),
(11, 5, '789', 'Pak Guru Smk', '08234567890', 'pakgurusmk@gmail.com', 'guru', 'User-icon8.png', 'Laki-laki', NULL, NULL),
(12, 5, '901', 'Bu Guru smk', '08234567890', 'bugurusmk@gmail.com', 'guru', 'wanita.jpg', 'Perempuan', NULL, NULL),
(13, 6, '098', 'Admin SMA', '08357826722', 'adminsma@gmail.com', 'guru', 'kisspng-avatar-education-professor-user-profile-faculty-boss-5abcab3d918a17_21409156152231404559617.png', 'Laki-laki', NULL, NULL),
(14, 5, '765', 'Admin SMK', '08123456778', 'adminsmk@gmail.com', 'guru', 'kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e32cb90_17773802152149609420811.png', 'Laki-laki', NULL, NULL),
(15, 7, '432', 'Bu Guru', '087654321', 'buguru@gmail.com', 'guru', 'wanita1.jpg', 'Perempuan', NULL, NULL),
(16, 8, '007', 'develop', '987654323456', 'develop', 'guru', 'logo1.png', 'Laki-laki', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL,
  `nama_quiz` varchar(256) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `nama_quiz`, `tanggal`) VALUES
(13, 'Kuis Rutin', '2022-07-28'),
(14, 'Kuis Akhir Tahun', '2022-07-29'),
(15, 'Kuis Bulanan', '2022-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kepala` int(11) DEFAULT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  `jawab` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_user`, `id_kepala`, `id_quiz`, `jawab`) VALUES
(68, 27, 12, 34, '1'),
(69, 28, 12, 28, '4'),
(70, 28, 12, 32, '3'),
(71, 28, 12, 33, '3'),
(72, 26, 12, 28, '4'),
(73, 26, 12, 32, '4'),
(74, 26, 12, 33, '3'),
(75, 26, 14, 28, '4'),
(76, 26, 14, 32, '3'),
(77, 26, 14, 33, '4'),
(78, 26, 14, 34, '4'),
(79, 26, 14, 30, '4'),
(80, 26, 14, 31, '3'),
(81, 29, 13, 34, '4'),
(82, 29, 13, 28, '4'),
(83, 29, 13, 32, '2'),
(84, 29, 13, 33, '3'),
(85, 29, 13, 30, '4'),
(86, 29, 13, 31, '4'),
(87, 30, 13, 34, '3'),
(88, 30, 13, 28, '3'),
(89, 30, 13, 32, '4'),
(90, 30, 13, 33, '3'),
(91, 30, 13, 30, '4'),
(92, 30, 13, 31, '3');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id_kepala` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_kepala` varchar(256) DEFAULT NULL,
  `nip` varchar(256) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `periode_awal` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL,
  `id_status` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id_kepala`, `id_sekolah`, `nama_kepala`, `nip`, `foto`, `periode_awal`, `periode_akhir`, `id_status`) VALUES
(12, 6, 'Pak Kepala SMA', '234', 'User-icon9.png', '2022-06-30', '2022-08-02', '1'),
(13, 5, 'Pak Kepala SMK', '345', 'kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e32cb90_1777380215214960942081.png', '2022-06-30', '2022-06-29', '1'),
(14, 7, 'Kepala SMP', '67888', 'User-icon10.png', '2022-07-08', '2022-08-04', '1'),
(15, 6, 'Saviyours', '123', 'User-icon11.png', '2022-03-03', '2022-05-05', '2');

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE `opsi` (
  `id_opsi` int(11) NOT NULL,
  `opsi` varchar(500) DEFAULT NULL,
  `value` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id_opsi`, `opsi`, `value`) VALUES
(2, 'baik', '3'),
(3, 'cukup', '2'),
(4, 'kurang baik', '1'),
(7, 'sangat baik', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `id_group`, `id_sekolah`, `id_guru`, `username`, `password`, `is_active`) VALUES
(3, 1, 8, 16, 'dev', 'dev123', 1),
(22, 2, 6, 13, 'admin sma', 'admin123', 1),
(23, 2, 5, 14, 'admin smk', 'admin123', 1),
(25, 2, 7, 15, 'admin smp', 'admin123', 1),
(26, 8, 7, 15, 'guru smp', 'guru123', 1),
(27, 8, 6, 9, 'guru', 'guru123', 1),
(28, 8, 6, 10, 'guru 2', 'guru123', 1),
(29, 8, 5, 11, 'gurusmk', 'guru123', 1),
(30, 8, 5, 12, 'gurusmk2', 'guru123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `quiz` varchar(500) DEFAULT NULL,
  `id_histori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `quiz`, `id_histori`) VALUES
(28, 'Kepala sekolah meakukan evaluasi akhir tahun bersama Guru', 14),
(30, 'kepala sekolah memberikan hukuman dengan tegas kepada siapapun', 13),
(31, 'kepala sekolah selalu ikut berpartisipasi dalam kegiatan sekolah', 13),
(32, 'Kepala sekolah menyampaikan perkembangan apapun kepada guru', 14),
(33, 'Kepala Sekolah sering datang terlambat', 14),
(34, 'apakah kepala sekolah pernah telat selama satu bulan', 15);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(256) DEFAULT NULL,
  `alamat_sekolah` varchar(256) DEFAULT NULL,
  `email_sekolah` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `email_sekolah`) VALUES
(5, 'SMK N 1', '                    jl smk 1', 'smkn1@gmail.co.id'),
(6, 'SMA N 1', 'jl sma n 1', 'sman1@gmail.com'),
(7, 'SMP 1', 'jl smp', 'smp@gmail.com'),
(8, 'SUPER ADMIN', '-', 'super@gimail.com');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `jenis_status` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `jenis_status`) VALUES
(1, 'Aktif'),
(2, 'Non aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_histori` int(11) DEFAULT NULL,
  `hasil` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group_name`, `note`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Super Admin', '-', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Admin', '-', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'Guru', '-', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id_kepala`);

--
-- Indexes for table `opsi`
--
ALTER TABLE `opsi`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id_kepala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `opsi`
--
ALTER TABLE `opsi`
  MODIFY `id_opsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
