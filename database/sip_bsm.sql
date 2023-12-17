-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 05:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_bsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keahlian` varchar(50) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama`, `jk`, `telp`, `email`, `alamat`, `keahlian`, `id_user`) VALUES
('IT2301', 'Andi Paris Bachtiar', 'l', '081539473834', 'andiparis02@gmail.com', 'Jl. Gadang No. 78, Kota Malang', 'Pembuatan kerajinan tangan', NULL),
('IT2302', 'Agung Sedayu', 'l', '081289126734', 'agungsedayu07@gmail.com', 'Jl. Pondok Indah No. 123, Kabupaten Malang', 'Pembina magang', 'U2301'),
('IT2305', 'Dila Ninda', 'p', '081289238934', 'dila100@gmail.com', 'Jl. Lima No. 5, Kabupaten Malang', 'Pembina magang', 'U2304'),
('IT2306', 'Fitri Dina', 'p', '089012893489', 'fitridina01@gmail.com', 'Jl. Cendrawasih No. 81, Kabupaten Malang', 'Pembuatan kerajinan tangan', NULL),
('IT2307', 'Figo Yusra', 'l', '081289238934', 'figoyusra12@gmail.com', 'Jl. Puri No. 11, Kota Malang', 'Pemilahan jenis sampah', 'U2302'),
('IT2308', 'Jati Kuncoro', 'l', '081290128923', 'jatikuncoro111@gmail.com', 'Jl. Merdeka No 89, Kota Malang', 'Pemilahan jenis sampah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kapasitas`) VALUES
('KL2301', 'Teori 1', 15),
('KL2302', 'Teori 2', 15),
('KL2303', 'Pelatihan 1', 10),
('KL2304', 'Pelatihan 2', 10),
('KL2305', 'Teori 3', 20),
('KL2306', 'Pelatihan 3', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pembinaan`
--

CREATE TABLE `pembinaan` (
  `id_kegiatan` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `kategori` enum('1','2','3') NOT NULL COMMENT '''1'' = Magang,\r\n''2'' = Pelatihan,\r\n''3'' = Workshop',
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `kuota` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_permohonan` varchar(10) DEFAULT NULL,
  `id_instruktur_1` varchar(10) NOT NULL,
  `id_instruktur_2` varchar(10) DEFAULT NULL,
  `id_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembinaan`
--

INSERT INTO `pembinaan` (`id_kegiatan`, `nama_kegiatan`, `kategori`, `tgl_mulai`, `tgl_berakhir`, `kuota`, `keterangan`, `id_permohonan`, `id_instruktur_1`, `id_instruktur_2`, `id_kelas`) VALUES
('PB230703', 'Penyuluhan Kebersihan Lingkungan Kel. Gadang', '3', '2023-08-06', '2023-08-06', NULL, '', 'WS2307002', 'IT2301', 'IT2302', NULL),
('PB230801', 'Pelatihan Pembuatan Kerajinan Tangan Periode Juli II', '2', '2023-07-24', '2023-07-28', 10, '', NULL, 'IT2301', 'IT2307', 'KL2303'),
('PB230802', 'Magang BSM Periode Agustus I', '1', '2023-07-31', '2023-08-04', 15, '', NULL, 'IT2302', 'IT2305', 'KL2301'),
('PB230803', 'Pelatihan Pemilahan Jenis Sampah Periode Agustus I', '2', '2023-07-31', '2023-08-04', 15, '', NULL, 'IT2307', 'IT2301', 'KL2304'),
('PB230804', 'Pelatihan Pembuatan Kerajinan Tangan Periode Agustus I', '2', '2023-08-14', '2023-08-18', 10, '', NULL, 'IT2301', 'IT2306', 'KL2304'),
('PB230805', 'Pelatihan Pemilahan Jenis Sampah Periode Juli I', '2', '2023-07-17', '2023-07-21', 10, '', NULL, 'IT2307', 'IT2306', 'KL2304'),
('PB230806', 'Workshop Daur Ulang Sampah Kel. Linggar', '3', '2023-07-29', '2023-07-29', NULL, 'Dilakukan pada jam 10.00 - 13.00', 'WS2307004', 'IT2307', 'IT2308', NULL),
('PB230807', 'Pelatihan Pemilahan Jenis Sampah Periode Agustus II', '2', '2023-08-21', '2023-08-25', 2, '', NULL, 'IT2308', 'IT2307', 'KL2301'),
('PB230808', 'Workshop Kebersihan Kampung Baru', '3', '2023-07-30', '2023-07-30', NULL, 'Dilakukan pada jam 9.00 - 12.00', 'WS2307003', 'IT2301', 'IT2306', NULL),
('PB230809', 'Workshop Pembuatan Kerajinan Tangan Desa Litung', '3', '2023-08-12', '2023-08-12', NULL, 'Dilakukan pada jam 9.00 - 12.00', 'WS2308003', 'IT2301', 'IT2307', NULL),
('PB230812', 'Magang', '1', '2023-08-07', '2023-08-11', 10, '', NULL, 'IT2308', 'IT2307', 'KL2302'),
('PB230813', 'Workshop Edukasi Pembuatan Kerajinan Tangan', '3', '2023-08-19', '2023-08-19', NULL, '', 'WS2308007', 'IT2308', 'IT2305', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `status` enum('0','1','2') DEFAULT NULL COMMENT '''0'' = menunggu\r\n''1'' = disetujui\r\n''2'' = ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `jk`, `telp`, `alamat`, `email`, `tgl_daftar`, `status`) VALUES
('PS23060004', 'Deni Nur', 'l', '081290127812', 'Jl. Apel No. 12, Kota Malang', 'deni12@gmail.com', '2023-06-18', '1'),
('PS23060006', 'Dimas Nur', 'l', '081290347812', 'Jl. Mega No. 89, Kota Malang', NULL, '2023-06-18', '1'),
('PS23060007', 'Rizka Fahmi', 'l', '081289238932', 'Jl. Linggar No. 18, Kota Malang', 'rizka18@gmail.com', '2023-06-18', '1'),
('PS23060008', 'Mochammad Faisal', 'l', '088912781289', 'Jl. Danau No. 90, Kabupaten Malang', NULL, '2023-06-18', '1'),
('PS23060009', 'Ahmad Firmansyah', 'l', '087812128923', 'Jl. Lilin No. 908, Kota Malang', NULL, '2023-06-18', '1'),
('PS23070001', 'Dina', 'p', '089012893489', 'Jl. Gadang No. 90, Kota Malang', 'dina90@gmail.com', '2023-06-18', '1'),
('PS23070002', 'Nanda Saputra', 'l', '087812723872', 'Jl. Limaru No. 90, Kota Malang', 'nanda90@gmail.com', '2023-07-20', '1'),
('PS23070003', 'Bima Raya', 'l', '081278238934', 'Jl. Cempaka No. 94, Kota Malang', NULL, '2023-07-20', '1'),
('PS23070004', 'Anggi Putri', 'p', '081989128923', 'Jl. Durian No. 12, Kabupaten Malang', 'anggi991@gmail.com', '2023-07-20', '1'),
('PS23070005', 'Linda Eka', 'p', '088978127834', 'Jl. Apel No. 18, Kota Malang', NULL, '2023-07-21', '1'),
('PS23070006', 'Putri Adel', 'p', '088912893489', 'Jl. Bintang No. 67, Kota Malang', 'putriadel10@gmail.com', '2023-07-21', '1'),
('PS23070007', 'Lugi Putra', 'l', '081867128934', 'Jl. Mergosono No. 78, Kota Malang', 'lugi78@gmail.com', '2023-07-22', '1'),
('PS23070008', 'Dimas Mulya', 'l', '081290127823', 'Jl. Kol Sugiono No. 12, Kota Malang', 'dimaas12@gmail.com', '2023-07-31', '1'),
('PS23070009', 'Putri Alia', 'p', '081290239023', 'Jl. Indah No. 34, Kota Malang', 'putri02@gmail.com', '2023-07-31', '1'),
('PS23070010', 'Erick Satya', 'l', '081290237834', 'Jl. Liku No. 56, Kota Malang', 'ercik56@gmail.com', '2023-07-31', '1'),
('PS23070011', 'Suyanto ', 'l', '088934781278', 'Jl. Lima No. 81, Kabupaten Malang', 'suyanto81@gmail.com', '2023-07-31', '2'),
('PS23070012', 'Beni Anggara', 'l', '0812902389', 'Jl. Putih No. 88, Kota Malang', NULL, '2023-07-31', '1'),
('PS23080001', 'Budi Satya', 'l', '081289238934', 'Jl. Limau No. 22, Kota Malang', 'budisatya22@gmail.com', '2023-08-03', '1'),
('PS23080002', 'Dodi Angga', 'l', '088912892389', 'Jl. Mangga No. 11, Kota Malang', 'angga11@gmail.com', '2023-07-24', '1'),
('PS23080003', 'Nur Lingga', 'p', '081290238734', 'Jl. Jati No. 13, Kabupaten Malang', NULL, '2023-07-24', '1'),
('PS23080004', 'Deni Putra', 'l', '088912892378', 'Jl. Putra No. 92, Kota Malang', 'putradeni@gmail.com', '2023-07-24', '1'),
('PS23080005', 'Ilmi Citra', 'p', '081212345678', 'Jl. Citra No. 12, Kota Malang', 'citrailmi12@gmail.com', '2023-08-05', '1'),
('PS23080006', 'Bima Sakti', 'l', '081267766776', 'Jl. Raya No. 12, Kota Malang', NULL, '2023-08-05', '2'),
('PS23080007', 'Fajar Aji', 'l', '081278236734', 'Jl. Merdeka No. 17, Kota Malang', 'fajar@gmail.com', '2023-08-05', '1'),
('PS23080008', 'Dani Angga', 'l', '081289128912', 'Jl. Blimbing No. 11, Kota Malang', 'daniangga@gmail.com', '2023-08-05', '0'),
('PS23080009', 'Putri Dinda', 'p', '081290239023', 'Jl. Coklat No. 77, Kota Malang', NULL, '2023-08-05', '0'),
('PS23080010', 'Nanda', 'l', '081290129023', 'Jl. Kucing No. 112, Kota Malang', NULL, '2023-08-05', '0'),
('PS23080011', 'Bintang Raga', 'l', '081290128923', 'Jl. Maju No. 17, Kota Malang', 'bintangraga@gmail.com', '2023-08-06', '0'),
('PS23080012', 'Budi', 'l', '081290129012', 'Jl. Gadang No. 11, Kota Malang', 'budi@gmail.com', '2023-08-07', '1'),
('PS23080013', 'Joko', 'l', '081290129012', 'Jl. Gadang No. 11, Kota Malang', NULL, '2023-08-07', '1'),
('PS23080014', 'Anggi', 'l', '08129012901', 'Jl. Gadang ', NULL, '2023-08-07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pembinaan`
--

CREATE TABLE `peserta_pembinaan` (
  `id_peserta_pembinaan` varchar(10) NOT NULL,
  `id_peserta` varchar(10) NOT NULL,
  `id_kegiatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pembinaan`
--

INSERT INTO `peserta_pembinaan` (`id_peserta_pembinaan`, `id_peserta`, `id_kegiatan`) VALUES
('PP18060001', 'PS23070012', 'PB230803'),
('PP23060002', 'PS23060004', 'PB230805'),
('PP23060003', 'PS23060006', 'PB230805'),
('PP23060004', 'PS23060007', 'PB230805'),
('PP23060005', 'PS23060008', 'PB230805'),
('PP23060006', 'PS23060009', 'PB230805'),
('PP23070001', 'PS23070001', 'PB230801'),
('PP23070002', 'PS23070002', 'PB230801'),
('PP23070003', 'PS23070003', 'PB230801'),
('PP23070004', 'PS23070004', 'PB230801'),
('PP23070005', 'PS23070005', 'PB230802'),
('PP23070006', 'PS23070006', 'PB230802'),
('PP23070007', 'PS23070007', 'PB230802'),
('PP23070008', 'PS23070008', 'PB230802'),
('PP23070009', 'PS23070009', 'PB230802'),
('PP23070010', 'PS23070010', 'PB230802'),
('PP23070011', 'PS23070011', 'PB230802'),
('PP23080001', 'PS23080001', 'PB230803'),
('PP23080002', 'PS23080002', 'PB230803'),
('PP23080003', 'PS23080003', 'PB230803'),
('PP23080004', 'PS23080004', 'PB230803'),
('PP23080005', 'PS23080005', 'PB230804'),
('PP23080006', 'PS23080006', 'PB230804'),
('PP23080007', 'PS23080007', 'PB230804'),
('PP23080008', 'PS23080008', 'PB230804'),
('PP23080009', 'PS23080009', 'PB230804'),
('PP23080010', 'PS23080010', 'PB230804'),
('PP23080011', 'PS23080011', 'PB230807'),
('PP23080012', 'PS23080012', 'PB230812'),
('PP23080013', 'PS23080013', 'PB230807'),
('PP23080014', 'PS23080014', 'PB230807');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` varchar(11) NOT NULL,
  `tgl` date NOT NULL,
  `status_kehadiran` enum('0','1') DEFAULT NULL COMMENT '''0'' = Tidak masuk\r\n''1'' = Masuk',
  `id_peserta_pembinaan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `tgl`, `status_kehadiran`, `id_peserta_pembinaan`) VALUES
('PR230800001', '2023-08-04', '1', 'PP18060001'),
('PR230800002', '2023-08-04', '1', 'PP23080001'),
('PR230800003', '2023-08-04', '0', 'PP23080002'),
('PR230800004', '2023-08-04', '1', 'PP23080003'),
('PR230800005', '2023-08-04', '1', 'PP23080004'),
('PR230800006', '2023-08-04', '0', 'PP18060001'),
('PR230800007', '2023-08-04', '0', 'PP23080001'),
('PR230800008', '2023-08-04', '0', 'PP23080002'),
('PR230800009', '2023-08-04', '0', 'PP23080003'),
('PR230800010', '2023-08-04', '0', 'PP23080004'),
('PR230800011', '2023-08-03', '1', 'PP18060001'),
('PR230800012', '2023-08-03', '0', 'PP23080001'),
('PR230800013', '2023-08-03', '1', 'PP23080002'),
('PR230800014', '2023-08-03', '1', 'PP23080003'),
('PR230800015', '2023-08-03', '0', 'PP23080004'),
('PR230800016', '2023-08-02', '0', 'PP18060001'),
('PR230800017', '2023-08-02', '1', 'PP23080001'),
('PR230800018', '2023-08-02', '1', 'PP23080002'),
('PR230800019', '2023-08-02', '1', 'PP23080003'),
('PR230800020', '2023-08-02', '0', 'PP23080004'),
('PR230800021', '2023-08-01', '1', 'PP18060001'),
('PR230800022', '2023-08-01', '1', 'PP23080001'),
('PR230800023', '2023-08-01', '1', 'PP23080002'),
('PR230800024', '2023-08-01', '1', 'PP23080003'),
('PR230800025', '2023-08-01', '0', 'PP23080004'),
('PR230800026', '2023-07-31', '0', 'PP18060001'),
('PR230800027', '2023-07-31', '0', 'PP23080001'),
('PR230800028', '2023-07-31', '1', 'PP23080002'),
('PR230800029', '2023-07-31', '1', 'PP23080003'),
('PR230800030', '2023-07-31', '0', 'PP23080004'),
('PR230800031', '2023-07-17', '0', 'PP23060002'),
('PR230800032', '2023-07-17', '0', 'PP23060003'),
('PR230800033', '2023-07-17', '1', 'PP23060004'),
('PR230800034', '2023-07-17', '1', 'PP23060005'),
('PR230800035', '2023-07-17', '1', 'PP23060006'),
('PR230800036', '2023-07-18', '0', 'PP23060002'),
('PR230800037', '2023-07-18', '1', 'PP23060003'),
('PR230800038', '2023-07-18', '1', 'PP23060004'),
('PR230800039', '2023-07-18', '1', 'PP23060005'),
('PR230800040', '2023-07-18', '1', 'PP23060006'),
('PR230800041', '2023-07-19', '1', 'PP23060002'),
('PR230800042', '2023-07-19', '1', 'PP23060003'),
('PR230800043', '2023-07-19', '0', 'PP23060004'),
('PR230800044', '2023-07-19', '1', 'PP23060005'),
('PR230800045', '2023-07-19', '1', 'PP23060006'),
('PR230800046', '2023-07-20', '0', 'PP23060002'),
('PR230800047', '2023-07-20', '1', 'PP23060003'),
('PR230800048', '2023-07-20', '1', 'PP23060004'),
('PR230800049', '2023-07-20', '0', 'PP23060005'),
('PR230800050', '2023-07-20', '1', 'PP23060006'),
('PR230800051', '2023-07-21', '0', 'PP23060002'),
('PR230800052', '2023-07-21', '0', 'PP23060003'),
('PR230800053', '2023-07-21', '0', 'PP23060004'),
('PR230800054', '2023-07-21', '0', 'PP23060005'),
('PR230800055', '2023-07-21', '0', 'PP23060006'),
('PR230800056', '2023-07-24', '1', 'PP23070001'),
('PR230800057', '2023-07-24', '1', 'PP23070002'),
('PR230800058', '2023-07-24', '1', 'PP23070003'),
('PR230800059', '2023-07-24', '1', 'PP23070004'),
('PR230800060', '2023-07-25', '1', 'PP23070001'),
('PR230800061', '2023-07-25', '1', 'PP23070002'),
('PR230800062', '2023-07-25', '1', 'PP23070003'),
('PR230800063', '2023-07-25', '1', 'PP23070004'),
('PR230800064', '2023-07-26', '1', 'PP23070001'),
('PR230800065', '2023-07-26', '1', 'PP23070002'),
('PR230800066', '2023-07-26', '1', 'PP23070003'),
('PR230800067', '2023-07-26', '1', 'PP23070004'),
('PR230800068', '2023-07-27', '1', 'PP23070001'),
('PR230800069', '2023-07-27', '0', 'PP23070002'),
('PR230800070', '2023-07-27', '1', 'PP23070003'),
('PR230800071', '2023-07-27', '1', 'PP23070004'),
('PR230800072', '2023-07-28', '1', 'PP23070001'),
('PR230800073', '2023-07-28', '1', 'PP23070002'),
('PR230800074', '2023-07-28', '1', 'PP23070003'),
('PR230800075', '2023-07-28', '1', 'PP23070004'),
('PR230800076', '2023-07-31', '1', 'PP23070005'),
('PR230800077', '2023-07-31', '1', 'PP23070006'),
('PR230800078', '2023-07-31', '1', 'PP23070007'),
('PR230800079', '2023-07-31', '1', 'PP23070008'),
('PR230800080', '2023-07-31', '0', 'PP23070009'),
('PR230800081', '2023-07-31', '1', 'PP23070010'),
('PR230800082', '2023-08-01', '1', 'PP23070005'),
('PR230800083', '2023-08-01', '1', 'PP23070006'),
('PR230800084', '2023-08-01', '1', 'PP23070007'),
('PR230800085', '2023-08-01', '0', 'PP23070008'),
('PR230800086', '2023-08-01', '1', 'PP23070009'),
('PR230800087', '2023-08-01', '1', 'PP23070010'),
('PR230800088', '2023-08-02', '1', 'PP23070005'),
('PR230800089', '2023-08-02', '0', 'PP23070006'),
('PR230800090', '2023-08-02', '1', 'PP23070007'),
('PR230800091', '2023-08-02', '1', 'PP23070008'),
('PR230800092', '2023-08-02', '1', 'PP23070009'),
('PR230800093', '2023-08-02', '1', 'PP23070010'),
('PR230800094', '2023-08-03', '1', 'PP23070005'),
('PR230800095', '2023-08-03', '0', 'PP23070006'),
('PR230800096', '2023-08-03', '0', 'PP23070007'),
('PR230800097', '2023-08-03', '1', 'PP23070008'),
('PR230800098', '2023-08-03', '0', 'PP23070009'),
('PR230800099', '2023-08-03', '0', 'PP23070010'),
('PR230800100', '2023-08-04', '1', 'PP23070005'),
('PR230800101', '2023-08-04', '0', 'PP23070006'),
('PR230800102', '2023-08-04', '1', 'PP23070007'),
('PR230800103', '2023-08-04', '1', 'PP23070008'),
('PR230800104', '2023-08-04', '1', 'PP23070009'),
('PR230800105', '2023-08-04', '1', 'PP23070010'),
('PR230800106', '2023-08-07', '1', 'PP23080012');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('0','1') NOT NULL COMMENT '''0'' = administrator\r\n''1'' = instruktur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
('U2300', 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator', '0'),
('U2301', 'agung', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', 'Agung Sedayu', '1'),
('U2302', 'figo', '36897575779e7f74e16c5dde8fa4c9a3', 'Figo Yusra', '1'),
('U2303', 'dina', 'f093c0fed979519fbc43d772b76f5c86', 'Fitri Dina', '1'),
('U2304', 'dila', '80481217df55271c79ea38840ced0a72', 'Dila Ninda', '1');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id_permohonan` varchar(10) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `alamat_kegiatan` varchar(100) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `surat_kegiatan` varchar(150) NOT NULL,
  `jenis_kegiatan` varchar(20) DEFAULT NULL,
  `status_permohonan` enum('0','1','2') DEFAULT NULL COMMENT '''0'' = menunggu\r\n''1'' = disetujui\r\n''2'' = ditolak',
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id_permohonan`, `nama_pemohon`, `telp`, `nama_kegiatan`, `alamat_kegiatan`, `tgl_permohonan`, `surat_kegiatan`, `jenis_kegiatan`, `status_permohonan`, `keterangan`) VALUES
('WS2307002', 'Supriadi', '089812782398', 'Penyuluhan kebersihan lingkungan kelurahan gadang', 'Jl. Kolonel Sugiono 190', '2023-07-30', 'WS2307002.pdf', NULL, '1', ''),
('WS2307003', 'Doni', '088912892389', 'Kegiatan Edukasi Kebersihan Kampung Baru', 'Jl. Coklat No. 90, Kabupaten Malang', '2023-07-31', 'WS2307003.pdf', NULL, '1', ''),
('WS2307004', 'Arya', '081298238912', 'Edukasi daur ulang sampah kel linggar', 'Jl. Jeruk No. 67, Kel. Linggar, Kota Malang', '2023-07-31', 'WS2307004.pdf', NULL, '1', ''),
('WS2308001', 'Rangga', '089012892389', 'Penyuluhan bersih desa limau', 'Jl. Suka Maju No. 91, Kabupaten Malang', '2023-08-02', 'WS2308001.pdf', NULL, '2', ''),
('WS2308002', 'Lina', '0812782378', 'Penyuluhan pendaur ulangan sampah', 'Jl. Sejati No. 11, Kota Malang', '2023-08-02', 'WS2308002.pdf', NULL, '1', ''),
('WS2308003', 'Ilham Saputra', '081278237812', 'Edukasi daur ulang sampah menjadi kerajinan', 'Jl. Linggar No. 73, Kabupaten Malang', '2023-08-02', 'WS2308003.pdf', NULL, '1', 'Pada jam 9.00 - 11.00'),
('WS2308004', 'Joko', '081212341234', 'Kegiatan Bersih Sungai Lingga', 'Kantor Kelurahan Lingga, jl. Lingga No. 11, Kota Malang', '2023-08-05', 'WS2308004.pdf', NULL, '2', ''),
('WS2308005', 'Joko Putra', '081290129012', 'Penyuluhan Bersih Desa Lama', 'Kantor Kel. Lama, jl. Lama No. 88, Kota Malang', '2023-08-05', 'WS2308005.jpg', NULL, '1', 'Dilakukan mulai jam 9.00 - 12.00'),
('WS2308006', 'Bima Anggara', '081290129012', 'Pendaurulangan sampah menjadi kerajinan', 'Gedung Balai RW, jl. Pandu No. 11, Kabupaten Malang', '2023-08-06', 'WS2308006.pdf', NULL, '1', ''),
('WS2308007', 'Joko', '081290129012', 'Kegiatan Edukasi Pembuatan Kerajinan Tangan', 'Jl. Gadang No. 11, Kota Malang', '2023-08-07', 'WS2308007.pdf', NULL, '1', ''),
('WS2308011', 'Budiman', '091290129012', 'Kegiatan Bersih Desa', 'Jl. Lunta No. 11, Kota Malang', '2023-08-12', 'WS2308011.jpg', '1,2,3', '0', ''),
('WS2308012', 'Guntur', '0912901289', 'Kegiatan Pembersihan Sungai Junja', 'Jl. Mantis No. 11, Kota Malang', '2023-08-12', 'WS2308012.jpg', NULL, '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembinaan`
--
ALTER TABLE `pembinaan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_permohonan` (`id_permohonan`),
  ADD KEY `id_instruktur_1` (`id_instruktur_1`),
  ADD KEY `id_instruktur_2` (`id_instruktur_2`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `peserta_pembinaan`
--
ALTER TABLE `peserta_pembinaan`
  ADD PRIMARY KEY (`id_peserta_pembinaan`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_peserta_pembinaan` (`id_peserta_pembinaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD CONSTRAINT `instruktur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembinaan`
--
ALTER TABLE `pembinaan`
  ADD CONSTRAINT `pembinaan_ibfk_1` FOREIGN KEY (`id_instruktur_1`) REFERENCES `instruktur` (`id_instruktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembinaan_ibfk_2` FOREIGN KEY (`id_instruktur_2`) REFERENCES `instruktur` (`id_instruktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembinaan_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembinaan_ibfk_4` FOREIGN KEY (`id_permohonan`) REFERENCES `workshop` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_pembinaan`
--
ALTER TABLE `peserta_pembinaan`
  ADD CONSTRAINT `peserta_pembinaan_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_pembinaan_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `pembinaan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_peserta_pembinaan`) REFERENCES `peserta_pembinaan` (`id_peserta_pembinaan`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
