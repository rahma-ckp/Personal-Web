-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 04:27 PM
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
-- Database: `db_dewi rahma_d1a240093`
--
CREATE DATABASE IF NOT EXISTS `db_dewi rahma_d1a240093` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_dewi rahma_d1a240093`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(2) NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`, `foto`) VALUES
(8, 'Anyeong! Saya Dewi Rahma, mahasiswi semester 2 Program Studi Sistem Informasi, Fakultas Ilmu Komputer, Universitas Subang.\r\nCeria, aktif, dan suka tantangan—apalagi kalau udah urusan ngoding.\r\nContohnya, niat nambah satu baris skrip, eh ada aja yang error.\r\nTapi justru di situ serunya... kadang bikin stres, tapi puasnya nggak bohong. :)\r\n\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(5) NOT NULL,
  `nama_artikel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `isi_artikel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`, `gambar`, `created_at`) VALUES
(3, 'Frontend vs Backend', 'Dalam pengembangan web, frontend adalah bagian yang dilihat pengguna seperti tampilan dan desain, sedangkan backend mengurus hal-hal di balik layar seperti database dan proses logika. Keduanya saling terhubung agar aplikasi berjalan lancar dan memberikan pengalaman yang baik bagi pengguna.', 'artikel_1750857336.webp', NULL),
(4, 'Apa Itu Debugging?', 'Debugging adalah proses memperbaiki kesalahan (bug) dalam kode program agar aplikasi berjalan sesuai harapan. Bug bisa muncul karena kesalahan logika, ketidaktelitian, atau kondisi tak terduga. Programmer biasanya menggunakan alat bantu seperti debugger atau menambahkan cetakan (print) untuk melacak masalah.', 'artikel_1750857325.webp', NULL),
(5, 'Bahasa Pemrograman Populer', 'Beberapa bahasa pemrograman yang sering digunakan adalah Python untuk pembelajaran dan data science, JavaScript untuk tampilan website, Java untuk aplikasi Android, serta C++ untuk pengembangan game. Setiap bahasa punya kelebihan masing-masing tergantung proyek atau tujuan penggunaannya.', 'artikel_1750857313.jpg', NULL),
(6, 'Apa Itu Pemrograman?', 'Pemrograman adalah proses memberi instruksi kepada komputer melalui bahasa khusus seperti Python, Java, atau C++. Dengan menulis kode, kita bisa membuat berbagai hal seperti aplikasi, situs web, hingga sistem otomatis. Intinya, pemrograman memungkinkan kita \"berbicara\" dengan komputer agar mereka melakukan apa yang kita inginkan.', 'artikel_1750856852.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(5) NOT NULL,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`, `kategori`, `deskripsi`) VALUES
(10, 'me', 'ama cantik.jpg', '', NULL),
(17, 'face', 'face.jpg', '', NULL),
(18, 'food', 'food.jpg', '', NULL),
(23, 'random', 'random.jpg', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin'),
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
