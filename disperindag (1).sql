-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 01:22 PM
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
-- Database: `disperindag`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `jns_alat` varchar(100) NOT NULL,
  `jml_alat` varchar(100) NOT NULL,
  `fungsi_alat` varchar(100) NOT NULL,
  `jns_bbm` varchar(100) NOT NULL,
  `jml_kbthan` varchar(100) NOT NULL,
  `durasi_operasi` varchar(100) NOT NULL,
  `kons_bbm` varchar(100) NOT NULL,
  `durasi_kons` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `id_pegawai`, `nama_anak`, `tgl_lahir`, `nama_ayah`, `nama_ibu`) VALUES
(1, 1, 'refi', '2023-07-13', 'adamn', 'mamah');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `pangkat_gol_ruang` varchar(120) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `eselon` varchar(120) NOT NULL,
  `unit_bidang` varchar(120) NOT NULL,
  `bidang` varchar(120) NOT NULL,
  `no_karpeg` varchar(120) NOT NULL,
  `nomor_seri_kepegawaian` varchar(120) NOT NULL,
  `golongan_gaji` varchar(120) NOT NULL,
  `jabatan_dinas` varchar(250) NOT NULL,
  `gol_awal` varchar(120) NOT NULL,
  `tmt_awal` date NOT NULL,
  `gol_akhir` varchar(120) NOT NULL,
  `tmt_akhir` date NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `pendidikan` varchar(250) NOT NULL,
  `jurusan` varchar(120) NOT NULL,
  `sekolah` varchar(120) NOT NULL,
  `lulus` varchar(120) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `agama` varchar(120) NOT NULL,
  `status_perkawinan` varchar(120) NOT NULL,
  `jalan_kampung` varchar(120) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan_desa` varchar(120) NOT NULL,
  `kecamatan` varchar(120) NOT NULL,
  `kabupaten` varchar(120) NOT NULL,
  `kota` varchar(120) NOT NULL,
  `telepon` varchar(120) NOT NULL,
  `penghargaan` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `nama`, `pangkat_gol_ruang`, `pangkat`, `jabatan`, `eselon`, `unit_bidang`, `bidang`, `no_karpeg`, `nomor_seri_kepegawaian`, `golongan_gaji`, `jabatan_dinas`, `gol_awal`, `tmt_awal`, `gol_akhir`, `tmt_akhir`, `tmt_jabatan`, `pendidikan`, `jurusan`, `sekolah`, `lulus`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `jalan_kampung`, `rt`, `rw`, `kelurahan_desa`, `kecamatan`, `kabupaten`, `kota`, `telepon`, `penghargaan`, `keterangan`, `id_pegawai`) VALUES
('32190', 'Refi Firmansyah ', 'Juru I/C', '', 'Kepala Bidang Pembangunan Sumber Daya Industri', 'II.b', 'Kepala Seksi Pengembangan Dan Tata Kelola Pasar', 'Bidang Pengembangan Usaha Perdagangan', '34', '34', 'erer', 'Bendahara Pengeluaran', 'Juru I/C', '2023-07-04', 'Juru Tk I I/D', '2023-07-10', '2023-07-17', 'erer', 'erer', 'er', 'er', 'er', '2023-07-15', 'Perempuan', 'Kristen', 'Kawin', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'er', 'Penghargaan Presiden 20 Tahun', 'er', 23);

-- --------------------------------------------------------

--
-- Table structure for table `kawin`
--

CREATE TABLE `kawin` (
  `id_kawin` int(11) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_perkawinan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_bbm`
--

CREATE TABLE `kebutuhan_bbm` (
  `id_kebutuhan` int(11) NOT NULL,
  `id_rekomendasi` int(11) NOT NULL,
  `id_spbu` int(11) NOT NULL,
  `jenis_alat` varchar(50) NOT NULL,
  `jumlah_alat` int(11) NOT NULL,
  `fungsi_alat` varchar(50) NOT NULL,
  `jenis_bbm` varchar(20) NOT NULL,
  `kebutuhan_bbm` varchar(50) NOT NULL,
  `operasi` varchar(20) NOT NULL,
  `konsumsi` int(20) NOT NULL,
  `durasi_konsumsi` varchar(15) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `up_rekom_lama` varchar(200) NOT NULL,
  `satuan_kebutuhan` varchar(100) NOT NULL,
  `masa_berlaku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kebutuhan_bbm`
--

INSERT INTO `kebutuhan_bbm` (`id_kebutuhan`, `id_rekomendasi`, `id_spbu`, `jenis_alat`, `jumlah_alat`, `fungsi_alat`, `jenis_bbm`, `kebutuhan_bbm`, `operasi`, `konsumsi`, `durasi_konsumsi`, `tgl_pengajuan`, `up_rekom_lama`, `satuan_kebutuhan`, `masa_berlaku`) VALUES
(3, 3, 0, '3', 3, '3', 'Pertalite', '3', '3', 3, '3', '0000-00-00', '', '', ''),
(5, 0, 0, '5', 5, '5', 'Solar', '5', '5', 5, '5', '0000-00-00', '', '', ''),
(16, 25, 0, 'w', 0, 'w', 'w', 'w', 'w', 0, 'w', '0000-00-00', '', '', ''),
(17, 26, 0, 'er', 2, 'er', 'er', '34', '3', 0, '34', '0000-00-00', '', '', ''),
(18, 27, 0, 'er', 34, 'er', 'er', 'er', '3', 0, '3', '0000-00-00', '', '', ''),
(19, 28, 0, 'er', 34, 'er', 'er', 'er', 'er', 0, '34', '0000-00-00', '', '', ''),
(20, 30, 0, 'Pesawat Terbang', 34, 'er', 'Pertalite', 'er', 'er', 0, 'erer', '0000-00-00', '', '', ''),
(21, 30, 0, 'Traktor', 3, 'er', 'Solar', '45', 'we', 0, 'ssd', '0000-00-00', '', '', ''),
(22, 25, 0, 'KERETA TERBANG', 3, 'we', 'Solar', '34', '34', 34, '34', '0000-00-00', '', '', ''),
(23, 25, 0, 'Pesawat Terbang', 2, 'wewe', 'Pertalite', '23', '23', 23, '23', '0000-00-00', '', '', ''),
(24, 37, 0, 'KAPAL PERANG ', 2, 'PERANG ', 'Pertalite', '45', '5 jam', 3, '2', '0000-00-00', '', '', ''),
(25, 25, 0, 'TANK BAJA ', 3, 'PERANG ', 'Solar', '45', '5 jam', 3, '2', '0000-00-00', '', '', ''),
(26, 33, 0, '34', 34, '3', 'Pertalite', '34', '34', 34, '34', '0000-00-00', '', '', ''),
(30, 0, 0, 'BAJAJ', 0, '', '', '', '', 0, '', '0000-00-00', '', '', ''),
(31, 0, 0, 'TANK TERBANG', 0, '', '', '', '', 0, '', '0000-00-00', '', '', ''),
(32, 6, 0, 'PESAWAT TEMPUr', 12, '12', 'pertalit', '', '', 0, '', '0000-00-00', '', '', ''),
(33, 38, 0, 'MANTAP ', 23, '23', '23', '', '', 0, '', '0000-00-00', '', '', ''),
(34, 39, 0, 'KAPAL PERANG NYA ', 2, 'NAON NYA ', 'DEXLUTE', '', '3', 3, '2', '0000-00-00', '', '', ''),
(35, 39, 0, 'KAPAL PERANG TERBANG', 12, '23', 'DEXLUTE', '', '23', 23, '23', '0000-00-00', '', '', ''),
(36, 39, 0, 'KAPAL PERANG EDANKEUN', 21, '12', '12', '', '12', 12, '12', '0000-00-00', '', '', ''),
(37, 38, 0, 'KAPAL PERANG NYA ', 23, '23', '23', '', '23', 23, '23', '2023-08-24', '', '', ''),
(38, 38, 0, 'KAPAL PERANG NYA ', 23, '23', '23', '', '23', 23, '23', '2023-08-24', '', '', ''),
(39, 39, 0, 'Odong Odong Terbang ', 12, 'Narik Penumpang ', 'Pertalite', '', '23', 23, '2', '2023-08-04', 'refi.jpg', 'lt', '3'),
(40, 37, 0, 'KAPAL PERANG NYA ', 23, 'er', 'Pertalite', '', '23', 23, '23', '2023-08-04', 'refi.jpg', '23', '23');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `konsumen` varchar(50) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `jumlah_alokasi` varchar(50) NOT NULL,
  `durasi_alokasi` varchar(50) NOT NULL,
  `no_penyalur` varchar(50) NOT NULL,
  `lokasi_penyalur` varchar(50) NOT NULL,
  `lembaga_penyalur_tempat_pengambilan` varchar(100) NOT NULL,
  `no_lembaga_penyalur` varchar(100) NOT NULL,
  `lok_lembaga_penyalur` varchar(100) NOT NULL,
  `upload_sku` varchar(100) NOT NULL,
  `up_mesin_tempat` varchar(100) NOT NULL,
  `up_surat_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `nama_pemilik`, `nik`, `alamat`, `telp`, `konsumen`, `nama_usaha`, `jenis_usaha`, `no_surat`, `jumlah_alokasi`, `durasi_alokasi`, `no_penyalur`, `lokasi_penyalur`, `lembaga_penyalur_tempat_pengambilan`, `no_lembaga_penyalur`, `lok_lembaga_penyalur`, `upload_sku`, `up_mesin_tempat`, `up_surat_pengajuan`) VALUES
(6, '2', '', '', '2', '2', '', '2', '1', '2', '2', '2', '2', '', '', '', '', '', ''),
(7, '2', '', '', '2', '2', '', '2', '1', '2', '2', '2', '2', '', '', '', '', '', ''),
(8, '3', '', '', '3', '3', '', '3', '3', '3', '3', '3', '3', '', '', '', '', '', ''),
(10, '5', '', '5', '5', '5', '', '5', '5', '5', '5', '5', '5', '', '', '', '', '', ''),
(13, '8', '', '8', '8', '8', '', '8', '8', '8', '8', '8', '8', '', '', '', '', '', ''),
(14, '8', '', '8', '8', '8', '', '8', '8', '8', '8', '8', '8', '', '', '', '', '', ''),
(17, '11', '', '11', '11', '11', '', '11', '11', '11', '11', '11', '11', '', '', '', '', '', ''),
(20, 're', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 're', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'REFI FIRMANSYAH GANTENG', '2232', '', '2323', 'ewewe', '2323', 'wewe', '1', '12', '', '12', 'wswe', 'we', '23', 'we', 'w', 'w', 'w'),
(25, 'REFI FIRMANSYAH GANTENG', '2232', '', '2323', 'ewewe', '2323', 'wewe', '1', '12', '', '12', 'wswe', 'we', '23', 'we', 'w', 'w', 'w'),
(26, 'RIDA SOFIATUHUSNA', '3434', '', '3434', 'dfdf', 'dfdfd', 'dfdfdf', '1', '34', '34', '34', 'er', 'er', '34', 'er', 'er', 'er', 'er'),
(27, 'UDIN', '34', 'Wanaraja ', '3434', 'er', 'er', 'er', '34', '34', '34', '34', 'er', 'er', '34', 'er', 'refi.jpg', 'er', 'er'),
(28, 'er', '34', 'er', '34', 'er', 'er', 'er', '23', 'er', '34', '34', 'er', 'er', '34', 'er', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(29, 'HILMAN ', '3434', 'erer', '3434', 'er', 'er', 'er', '2323', '3', 'rer', '2', 'errer', 'er', '2', 'er', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(30, 'HILMAN ', '3434', 'erer', '3434', 'er', 'er', 'er', '2323', '3', 'rer', '2', 'errer', 'er', '2', 'er', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(31, 'DZIKRI APRILLA', '2', 'GARUT', '3', 'df', 'df', 'df', '12', '3', '3', '2', 'er', 'er', '2', 'er', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(32, 'wdwewe', '23', 'we', '23', 'we', 'we', 'we', '23', '23', '23', '23', '23', 'we', '23', '23', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(33, 'UJANG', '23', 'e', '3', '34', '34', '34', '23', '34', '34', '34', '343', '34', '34', '34', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(36, 'MNATP', '2', 'Wanaraja ', '23', '', 'er', 'we', '23', '', '', '', '', '', '', '', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(37, 'UJANG BARBAR', '23', 'awe', '23', '', 'we', 'we', '23', '', '', '', '', '', '', '', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(38, 'Dzikri Syahril', '2345', 'Wanaraja ', '23', '', 'NAON WEH', 'NAON WEH OGE ', '90', '', '', '', '', '', '', '', 'refi.jpg', 'refi.jpg', 'refi.jpg'),
(39, 'HENI ROHAENI', '123', 'Wanaraja ', '3', '', 'er', 'er', '23', '', '', '', '', '', '', '', 'refi.jpg', 'refi.jpg', 'refi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `spbu`
--

CREATE TABLE `spbu` (
  `id_spbu` int(11) NOT NULL,
  `no_spbu` int(30) NOT NULL,
  `nama_spbu` varchar(100) NOT NULL,
  `lokasi_spbu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spbu`
--

INSERT INTO `spbu` (`id_spbu`, `no_spbu`, `nama_spbu`, `lokasi_spbu`) VALUES
(1, 123, 'SPBU CIATEUL', 'JLN RAYA NGEUNAH');

-- --------------------------------------------------------

--
-- Table structure for table `tdg`
--

CREATE TABLE `tdg` (
  `id_tdg` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `alamat_gudang` varchar(100) NOT NULL,
  `telp_fax` varchar(100) NOT NULL,
  `nib` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `investasi` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `titik_koordinat` varchar(100) NOT NULL,
  `luas_lahan` varchar(100) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `nomor_tgl_bap` date NOT NULL,
  `nomor_tgl_pertek` date NOT NULL,
  `nomor_tgl_tdg` date NOT NULL,
  `komoditas_gudang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tdg`
--

INSERT INTO `tdg` (`id_tdg`, `nama_pemilik`, `alamat_pemilik`, `nama_perusahaan`, `alamat_perusahaan`, `alamat_gudang`, `telp_fax`, `nib`, `npwp`, `email`, `investasi`, `website`, `titik_koordinat`, `luas_lahan`, `luas`, `kapasitas`, `nomor_tgl_bap`, `nomor_tgl_pertek`, `nomor_tgl_tdg`, `komoditas_gudang`) VALUES
(1, 'ARJOEKI  TJANDRA', 'JL. Mekar Permai I No. 2 RT. 001 RW. 004 Kelurahan Mekarwangi Kec. Bojong Loa Kidul Kota Bandung', 'PD. MERDEKA TANI', ' Jl. Merdeka No.218 Desa haurpanggung Kec. Tarogong ', 'Jalan Merdeka No.218 Desa Haurpanggung Kec. Tarogong Kidul', '0262-236755 / 08122048899', '\'8120107872796', '04.007.297.7-443.000', 'pdmerdekatanigrt@gmail.com ', '205', 'mantap.com', '\'-  LAT   : -7.1956748              -   LON : 107.9037447', '1080', '72', '200  Ton', '2023-07-18', '2023-07-25', '2023-07-17', 'Gudang Pupuk, Alat-alat Pertanian & Obat-obat pertanian'),
(2, 'DEDE NURAENI, SE., MP', 'Jl. Munggang NO. 48 RT.004 RW.001 Kelurahan Bale Kambang Kecamatan Kramat Jati jakarta Timur', 'PT. DETI PUTRI JAYA', 'Kp. Lebak Gede RT. 001 RW. 008 Desa Mekarwangi Kecamatan Kecamatan Tarogong Kaler ', 'Kp. Lebak Gede RT. 001 RW. 008 Desa Mekarwangi Kecamatan Tarogong Kaler', '81298945085', '\'2412210003574', '02.521.661.5-443.000.', 'detiputrijaya@gmail.com', '215', '34', '\'-  LAT   : -7.20723354              -   LON : 107.8520365', '300', '344', '3434', '2023-07-12', '2023-07-19', '2023-07-04', '34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('Super Admin','User Perdagangan','Admin Perdagangan','Admin Pasar','Admin Sarana Prasarana Pemberdayaan Industri dan ESDM','Admin Sekretariat','Admin P2KP','Admin Pembangunan Sumber Daya Industri') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_sessions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(1, 'ichsyan', '4c7a88fbd574f7bdd78004ebf1d6660d', 'ichsyan666@gmail.com', 'Super Admin', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `kawin`
--
ALTER TABLE `kawin`
  ADD PRIMARY KEY (`id_kawin`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `kebutuhan_bbm`
--
ALTER TABLE `kebutuhan_bbm`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indexes for table `spbu`
--
ALTER TABLE `spbu`
  ADD PRIMARY KEY (`id_spbu`);

--
-- Indexes for table `tdg`
--
ALTER TABLE `tdg`
  ADD PRIMARY KEY (`id_tdg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kawin`
--
ALTER TABLE `kawin`
  MODIFY `id_kawin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kebutuhan_bbm`
--
ALTER TABLE `kebutuhan_bbm`
  MODIFY `id_kebutuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `spbu`
--
ALTER TABLE `spbu`
  MODIFY `id_spbu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tdg`
--
ALTER TABLE `tdg`
  MODIFY `id_tdg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
