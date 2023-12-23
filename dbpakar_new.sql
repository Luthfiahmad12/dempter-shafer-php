-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2023 pada 11.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpakar_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `ekskull` varchar(100) NOT NULL,
  `indikator` varchar(100) NOT NULL,
  `kepercayaan` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`id`, `nama`, `alamat`, `tanggal`, `ekskull`, `indikator`, `kepercayaan`) VALUES
(86, 'tess1', 'assdf', '2023-12-08', '4,6,7', '101,102,', '80.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ekskull`
--

CREATE TABLE `tb_ekskull` (
  `id` int(11) NOT NULL,
  `code_ekskull` varchar(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ekskull`
--

INSERT INTO `tb_ekskull` (`id`, `code_ekskull`, `nama`, `deskripsi`) VALUES
(4, 'E1', 'Olahraga', 'Gerakan yang dilakukan saat olahraga akan melatih\r\npernapasan jadi lebih baik, meningkatkan fleksibilitas dan\r\nperforma anak ketika melakukan pertandingan. Sama\r\nseperti manfaat olahraga pada umumnya, latihan tersebut\r\njuga bisa melancarkan peredaran darah dan mengendalikan\r\nkadar gula darah, kolesterol, dan tekanan darah. Jadi sudah\r\npasti sangat menyehatkan sejak dini.\r\nKamu Bisa Memilih Cabang Olahraga, Sepak Bola, Futsal,\r\nVoly, dan Badminton.'),
(5, 'E2', 'Kesenian', 'Pembelajaran Kesenian bertujuan agar anak tidak hanya\r\nmenggunakan belahan otak kiri semata, tetapi juga otak\r\nkanan. Dengan keseimbangan dalam proses belajar inilah\r\ndiharapkan dapat dihasilkan generasi yang mempunyai\r\nwawasan IPTEK luas, keimanan yang memadai, dan budi\r\npekerti yang tinggi.\r\nKamu bisa memilih untuk mengikuti Ekstrakurikuler,\r\nPaduan Suara atau Musik band.'),
(6, 'E3', 'Paskibra', 'Menjadi Paskibra akan membuat diri kita memiliki rasa\r\ncinta yang dalam terhadap Negara Kesatuan RepubIik\r\nIndonesia, menumbuhkan sikap disiplin, kerja sama tim\r\ndan menejemen waktu yang baik\r\nKamu bisa mengikuti Ekstrakurikuler Paskibra untuk\r\nmempelajari sikap-sikap tersebut'),
(7, 'E4', 'Pramuka', 'Mengikuti pramuka memberikan manfaat yang berharga\r\ndalam pembentukan karakter, pengembangan\r\nketerampilan sosial, kepemimpinan, dan kecintaan pada\r\nlingkungan. Pramuka juga mengajarkan nilai-nilai seperti kerjasama, tanggung jawab, dan pengabdian kepada\r\nmasyarakat.\r\nKamu bisa Mengikuti Ekstrakurikuler Pramuka untuk\r\nmenanamkan sikap-sikap tersebut.'),
(8, 'E5', 'PKS', 'Menjadi anggota PKS sangat bermanfaat bagi kita maupun\r\nbagi masyarakat pemakai jalan pada umumya. Menjadi\r\nanggota PKS akan mendapatkan pengalaman dan dapat\r\nmembantu para pengguna jalan dilingkungan sekolah\r\nuntuk memahami keselamatan berkendara.\r\nKamu bisa mengkuti Ekstrakurikuler PKS untuk\r\nmenerapkan rasa peduli terhadap pengguna jalan disekitar\r\nlingkungan sekolah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indikator`
--

CREATE TABLE `tb_indikator` (
  `id` int(11) NOT NULL,
  `kode_indikator` varchar(3) DEFAULT NULL,
  `indikator` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_indikator`
--

INSERT INTO `tb_indikator` (`id`, `kode_indikator`, `indikator`) VALUES
(20, '101', 'Sering/suka melakukan Kegiatan out door'),
(21, '102', 'Suka melakukan aktifitas fisik'),
(22, '103', 'Memiliki daya tahan tubuh yang bagus/tidak mudah sakit'),
(23, '104', 'Memiliki/ingin menerapkan sikap disiplin'),
(24, '105', 'Paham/ingin mempelajari keselamatan berlalu lintas'),
(25, '106', 'Sering/suka melakukan kegiatan indoor'),
(26, '107', 'Tertarik dengan bela negara'),
(27, '108', 'Bisa bermain alat musik'),
(28, '109', 'Tertarik mempelajari rambu-rambu lalulintas'),
(29, '110', 'Suka bermain/mengunjungi alam'),
(30, '111', 'Pernah mengikuti lomba kesenian'),
(31, '112', 'Tidak suka melakukan aktifitas fisik'),
(32, '113', 'Suka menonton pertandingan olahraga'),
(33, '114', 'Selalu tepat waktu dalam kegiatan apapun'),
(34, '115', 'Tertarik dengan kegiatan survival'),
(35, '116', 'Suka bernyanyi random'),
(36, '117', 'Memiliki sikap berani dan bertanggung jawab'),
(37, '118', 'Sering/pernah melakukan pertandingan olahraga'),
(38, '119', 'Tertarik dengan pertunjukan seni'),
(39, '120', 'Peduli terhadap orang disekitar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id` int(11) NOT NULL,
  `id_ekskull` int(11) DEFAULT NULL,
  `id_indikator` int(11) DEFAULT NULL,
  `bobot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rules`
--

INSERT INTO `tb_rules` (`id`, `id_ekskull`, `id_indikator`, `bobot`) VALUES
(27, 4, 20, 0.6),
(28, 6, 20, 0.6),
(29, 7, 20, 0.6),
(30, 8, 20, 0.6),
(31, 4, 21, 0.8),
(32, 6, 21, 0.8),
(33, 7, 21, 0.8),
(34, 4, 22, 0.8),
(35, 6, 22, 0.8),
(36, 4, 23, 0.8),
(37, 6, 23, 0.8),
(38, 7, 23, 0.8),
(39, 8, 23, 0.8),
(40, 8, 24, 0.9),
(41, 5, 25, 0.7),
(42, 6, 26, 0.9),
(43, 7, 26, 0.9),
(44, 5, 27, 0.9),
(45, 8, 28, 0.9),
(46, 7, 29, 0.8),
(47, 5, 30, 0.9),
(48, 5, 31, 0.6),
(49, 4, 32, 0.7),
(50, 6, 33, 0.6),
(51, 7, 33, 0.6),
(52, 8, 33, 0.6),
(53, 7, 34, 0.8),
(54, 5, 35, 0.8),
(55, 6, 36, 0.7),
(56, 7, 36, 0.7),
(57, 8, 36, 0.7),
(58, 4, 37, 0.9),
(59, 5, 38, 0.7),
(60, 4, 39, 0.6),
(61, 5, 39, 0.6),
(62, 6, 39, 0.6),
(63, 7, 39, 0.6),
(64, 8, 39, 0.6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ekskull`
--
ALTER TABLE `tb_ekskull`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_indikator`
--
ALTER TABLE `tb_indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_rules_tb_ekskull` (`id_ekskull`),
  ADD KEY `fk_tb_rules_tb_indikator` (`id_indikator`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `tb_ekskull`
--
ALTER TABLE `tb_ekskull`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_indikator`
--
ALTER TABLE `tb_indikator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD CONSTRAINT `fk_tb_rules_tb_ekskull` FOREIGN KEY (`id_ekskull`) REFERENCES `tb_ekskull` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tb_rules_tb_indikator` FOREIGN KEY (`id_indikator`) REFERENCES `tb_indikator` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
