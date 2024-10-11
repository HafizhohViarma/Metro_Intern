-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mepcons`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ebook`
--

CREATE TABLE `tb_ebook` (
  `id_ebook` int(11) NOT NULL,
  `sampul_ebook` varchar(255) NOT NULL,
  `ebook_file` varchar(255) NOT NULL,
  `judul_ebook` varchar(255) NOT NULL,
  `deskripsi_ebook` varchar(255) NOT NULL,
  `harga_ebook` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ebook`
--

INSERT INTO `tb_ebook` (`id_ebook`, `sampul_ebook`, `ebook_file`, `judul_ebook`, `deskripsi_ebook`, `harga_ebook`) VALUES
(2, 'autocad.jpg', 'DAFTAR MENU.pdf', 'Manufacturing for Mechanical Engineering', 'Deskripsi Manufacturing for Mechanical Engineering', '129.000'),
(4, 'CAD Training.jpeg', 'VARIAN RASA AKU CENDOL KAMU.pdf', 'Training CAD for Beginner', 'Deskripsi Training CAD for Beginner', '99.000'),
(5, 'autocad.jpg', 'SOAL LATIHAN HITUNG CAMPURAN.pdf', '123', '123', '123.000'),
(6, 'images (2).png', 'SPANDUK MUBES.pdf', 'BIM for Beginner', 'lorem lorem lorem lorem lorem lorem lorem lorem loremlorem lorem lorem lorem lorem lorem', '129.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `sampul_kelas` varchar(255) NOT NULL,
  `judul_kelas` varchar(255) NOT NULL,
  `deskripsi_kelas` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `harga_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `sampul_kelas`, `judul_kelas`, `deskripsi_kelas`, `jadwal`, `harga_kelas`) VALUES
(1, 'computer.jpg', 'Desain-Desain Engineering', 'Kelas ini menguasai lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', 'Rabu, 18.00-19.00', '839.000'),
(2, 'cad.jpg', 'Teknik Menggambar Poligon', 'Dalam materi ini, Anda akan mendalami berbagai teknik untuk menggambar bentuk-bentuk dasar dalam AutoCAD. Fokus akan diberikan pada pembuatan garis, lingkaran, dan poligon, serta pengaturan properti objek seperti warna, jenis garis, dan ketebalan. Materi ', 'Sabtu, 10.00 - 12.00 WIB ', '197.000'),
(7, 'computer-display-with-3d-render-software-architectural-building-complex-architect-modern-office-desktop-screen-desk-showing-urban-planning-architecture-construction-plans.jpg', 'Mengelola Layer dalam AutoCAD ', 'Materi ini membahas konsep layer dalam AutoCAD, termasuk cara membuat, mengedit, dan menghapus layer. Anda akan belajar cara mengatur visibilitas dan properti layer untuk menjaga gambar tetap terorganisir dan mudah dibaca. Fokus juga akan diberikan pada p', 'Senin, 12.00 - 14.00', '76.000'),
(9, 'CAD Training.jpeg', 'Penggunaan Dimensi dan Anotasi', 'Materi ini mengajarkan cara menambahkan dimensi dan anotasi pada gambar untuk memberikan informasi yang jelas dan akurat. Anda akan belajar cara menggunakan alat dimensi seperti DIMLINEAR dan DIMALIGNED, serta cara menambahkan teks, label, dan simbol untu', 'Minggu, 16.00 - 17.00', '299.000'),
(10, 'computer-display-with-3d-render-software-architectural-building-complex-architect-modern-office-desktop-screen-desk-showing-urban-planning-architecture-construction-plans.jpg', 'Statistika dan Probabilitas', 'Probabilitas dan Statistika adalah dua konsep penting dalam Matematika. Probabilitas adalah tentang peluang. Sementara statistika lebih tentang bagaimana kita menangani berbagai data menggunakan berbagai teknik. Statistika membantu menyajikan data', 'Kamis (19.00-20.30 WIB)', '189.000'),
(11, 'autocad.jpg', 'Model 3D dalam AutoCAD', 'Materi ini memperkenalkan konsep dasar modeling 3D dalam AutoCAD, termasuk pembuatan bentuk 3D dasar seperti box, cylinder, dan sphere. Anda akan belajar teknik lanjutan seperti extrude, revolve, dan sweep untuk membuat model yang lebih kompleks, serta ca', 'Selasa, 09.00 - 11.00', '178.000'),
(12, 'autocad.jpg', 'Penerapan Xref (External Reference)', 'Dalam materi ini, Anda akan mempelajari cara menggunakan Xref (external references) untuk mengelola referensi gambar dari file lain dalam proyek besar. Anda akan belajar cara mengimpor, mengedit, dan memperbarui Xref, serta bagaimana cara mengelola hubung', 'Kamis (19.00-20.30 WIB)', '189.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testi`
--

CREATE TABLE `tb_testi` (
  `id_testi` int(11) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `testimoni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_testi`
--

INSERT INTO `tb_testi` (`id_testi`, `nama_peserta`, `profil`, `testimoni`) VALUES
(26, 'testi1', 'testi1.jpg', 'Materi yang disampaikan sangat lengkap dan jelas. Saya bisa belajar sesuai kecepatan saya sendiri.'),
(27, 'testi2', 'testi2.jpg', 'Pengajarannya sangat interaktif dan mudah diikuti. Saya merasa lebih percaya diri dengan keahlian baru saya.'),
(28, 'testi3', 'testi3.jpg', 'Belajar dari mana saja dan kapan saja! Kursus ini benar-benar mengubah cara saya belajar.'),
(29, 'testi4', 'testi4.jpg', 'Belajar dari mana saja dan kapan saja! Kursus ini benar-benar mengubah cara saya belajar.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_ebook` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `tipe_produk` enum('video','kelas','ebook') NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `status` enum('pending','konfirmasi','tolak') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_video`, `id_ebook`, `id_kelas`, `nama_user`, `tipe_produk`, `tgl_transaksi`, `harga`, `payment`, `bukti_bayar`, `status`) VALUES
(84, 21, 9, 0, 0, 'Metro Software', 'video', '2024-10-02', '199.000', 'mandiri', 'img/Rizki.jpg', 'konfirmasi'),
(86, 21, 0, 6, 0, 'Metro Software', 'ebook', '2024-10-02', '129.000', 'mandiri', 'img/arid.jpg', 'konfirmasi'),
(89, 21, 0, 0, 11, 'Metro Software', 'kelas', '2024-10-02', '178.000', 'mandiri', 'img/Budi Setiawan.jpg', 'konfirmasi'),
(90, 21, 9, 0, 0, 'Metro Software', 'video', '2024-10-02', '199.000', 'BCA', 'img/Rizki.jpg', 'konfirmasi'),
(91, 21, 0, 2, 0, 'Metro Software', 'ebook', '2024-10-02', '129.000', 'mandiri', 'img/images (6).jpeg', 'konfirmasi'),
(92, 21, 0, 0, 1, 'Metro Software', 'kelas', '2024-10-02', '839.000', 'mandiri', 'img/Rizki.jpg', 'konfirmasi'),
(93, 21, 13, 0, 0, 'Metro Software', 'video', '2024-10-10', '129.000', 'mandiri', 'img/images (2).png', 'konfirmasi'),
(94, 21, 12, 0, 0, 'Metro Software', 'video', '2024-10-10', '289.000', 'BCA', 'img/images (2).png', 'konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_video` int(11) NOT NULL,
  `sampul_video` varchar(255) NOT NULL,
  `judul_video` varchar(255) NOT NULL,
  `keterangan_video` varchar(255) NOT NULL,
  `harga_video` varchar(50) NOT NULL,
  `video_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `sampul_video`, `judul_video`, `keterangan_video`, `harga_video`, `video_file`) VALUES
(12, '96_Apartment Plan AutoCAD and Photoshop Files Free Download.jpeg', 'Mechanical Engineering', 'Sebuah penjelasan terkait keamanan dari sebuah produk lorem lorem lorem lorem lorem lorem lorem', '345.000', ''),
(13, 'images (2).png', 'Dasar Dasar AutoCAD ', 'Deskripsi Video ', '129.000', ''),
(14, 'wallpaperflare.com_wallpaper.jpg', 'Mechanical', 'ini deskripsi Video', '199.000', ''),
(15, 'CAD Training.jpeg', 'Mechanical Engineering', 'Deskripsi', '99.000', ''),
(16, 'images (6).jpeg', 'Dasar Dasar AutoCAD ', 'Sebuah penjelasan terkait keamanan dari sebuah produk lorem lorem lorem lorem lorem lorem lorem', '199.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `telp`, `profil`, `password`, `level`, `otp`, `otp_expiration`) VALUES
(21, 'Metro Software', 'software@gmail.com', '085623785368', 'instagramMetro.png', '$2y$10$vS1HWeF4YtXgZ.UjWIQTSOp4b1cCNSjFlVvgAUVfYPNnU8X7f2hdK', 'user', NULL, NULL),
(28, 'Admin', 'admin@gmail.com', '082149345534', '0', '$2y$10$.WKKzp/rEArHB.g1I.s3Ku/1f0m/akOOMgyjZtQ5KUjMD41bEzGCO', 'admin', NULL, NULL),
(29, 'Hagi Siraj Sumanta', 'hagi@gmail.com', '0000000', '0', '$2y$10$8/8YMu4u1sEPczrMGTt4IOTTRBLTgtUtxK4fGSGsLHKsg4CwsB6wS', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_file`
--

CREATE TABLE `video_file` (
  `id_file` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `sub_judul` varchar(255) NOT NULL,
  `video_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_file`
--

INSERT INTO `video_file` (`id_file`, `id_video`, `sub_judul`, `video_file`) VALUES
(2, 11, '0', '5495781-uhd_2560_1080_30fps.mp4'),
(4, 13, '0', '3010398-hd_1920_1080_24fps.mp4'),
(16, 0, '0', '3010398-hd_1920_1080_24fps.mp4'),
(17, 0, '0', 'TEMPLATE MUBES.mp4'),
(18, 0, '0', '3936483-hd_1920_1080_30fps.mp4'),
(20, 14, '0', '3010398-hd_1920_1080_24fps.mp4'),
(21, 13, '0', '3010398-hd_1920_1080_24fps.mp4'),
(44, 12, 'Mwehehe', '3936483-hd_1920_1080_30fps.mp4'),
(66, 15, 'Sub Judul', '3936483-hd_1920_1080_30fps.mp4'),
(67, 15, 'Sub Judul 2', '4443250-hd_1920_1080_25fps.mp4'),
(68, 16, '', '5495781-uhd_2560_1080_30fps.mp4'),
(72, 12, '', '3010398-hd_1920_1080_24fps.mp4'),
(73, 12, '', '3936483-hd_1920_1080_30fps.mp4'),
(74, 12, '', '4443250-hd_1920_1080_25fps.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_testi`
--
ALTER TABLE `tb_testi`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `video_file`
--
ALTER TABLE `video_file`
  ADD PRIMARY KEY (`id_file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  MODIFY `id_ebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_testi`
--
ALTER TABLE `tb_testi`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `video_file`
--
ALTER TABLE `video_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
