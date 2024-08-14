-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2023 pada 03.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disperindag2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen`
--

CREATE TABLE `agen` (
  `id_agen` int(11) NOT NULL,
  `nama_agen` varchar(100) NOT NULL,
  `alamat_agen` varchar(100) NOT NULL,
  `jumlah_mitra` varchar(100) NOT NULL,
  `pso` varchar(30) NOT NULL,
  `id_spbe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
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
-- Struktur dari tabel `anak`
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
-- Dumping data untuk tabel `anak`
--

INSERT INTO `anak` (`id_anak`, `id_pegawai`, `nama_anak`, `tgl_lahir`, `nama_ayah`, `nama_ibu`) VALUES
(1, 1, 'refi', '2023-07-13', 'adamn', 'mamah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `pangkat_gol_ruang` varchar(120) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `eselon` varchar(120) NOT NULL,
  `unit_bidang` varchar(120) NOT NULL,
  `bidang` varchar(120) NOT NULL,
  `no_karpeg` varchar(120) NOT NULL,
  `nomor_seri_kepegawaian` varchar(120) NOT NULL,
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
  `id_pegawai` int(11) NOT NULL,
  `status` varchar(120) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kawin`
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
-- Struktur dari tabel `kebutuhan_bbm`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kgb`
--

CREATE TABLE `kgb` (
  `pejabat_sk` varchar(225) NOT NULL,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(225) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `gaji_plama` varchar(225) NOT NULL,
  `gaji_pokok` varchar(225) NOT NULL,
  `pp_lama` varchar(120) NOT NULL,
  `ket` varchar(120) NOT NULL,
  `id_kgb` int(11) NOT NULL,
  `tmt` date NOT NULL,
  `tmt_baru` date NOT NULL,
  `pp_baru` varchar(120) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kpl`
--

CREATE TABLE `kpl` (
  `id_kpl` int(11) NOT NULL,
  `nama_kpl` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `dis_1` varchar(100) NOT NULL,
  `dis_2` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkalan`
--

CREATE TABLE `pangkalan` (
  `id_pangkalan` int(11) NOT NULL,
  `pangkalan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `alamat_pangkalan` varchar(100) NOT NULL,
  `penyaluran` varchar(50) NOT NULL,
  `id_agen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `pangkatbaru` varchar(225) NOT NULL,
  `ms_kerja_lama` varchar(100) NOT NULL,
  `ms_kerja_baru` varchar(100) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `tmt_pangkatbaru` date NOT NULL,
  `id_pangkat1` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kgb`
--

CREATE TABLE `riwayat_kgb` (
  `id_riwayat` int(11) NOT NULL,
  `id_kgb` int(11) NOT NULL,
  `tmt` date NOT NULL,
  `tmt_baru` date NOT NULL,
  `tmt_selanjutnya` date NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pangkat`
--

CREATE TABLE `riwayat_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `tmt_pangkatbaru` date NOT NULL,
  `tmt_pangkat_selanjutnya` date NOT NULL,
  `id_pangkat1` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pensiun`
--

CREATE TABLE `riwayat_pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `unit_kerja` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tmt_pensiun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spbe`
--

CREATE TABLE `spbe` (
  `id_spbe` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_kantor` varchar(200) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spbu`
--

CREATE TABLE `spbu` (
  `id_spbu` int(11) NOT NULL,
  `no_spbu` varchar(100) NOT NULL,
  `nama_spbu` varchar(100) NOT NULL,
  `lokasi_spbu` varchar(100) NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdg`
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
  `komoditas_gudang` varchar(100) NOT NULL,
  `longitud` varchar(225) NOT NULL,
  `latitud` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('Super Admin','User Perdagangan','Admin Perdagangan','Admin Pasar','Admin Sarana Prasarana Pemberdayaan Industri dan ESDM','Admin Sekretariat','Admin P2KP','Admin Pembangunan Sumber Daya Industri') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_sessions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `password2`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(13, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'administrator', 'er', 'Super Admin', 'N', ''),
(17, 'perdagangan', '83878c91171338902e0fe0fb97a8c47a', 'p', 'perdagangan@gmail.com', 'Admin Perdagangan', 'N', ''),
(18, 'sekretariat', '593277eb017ecbe3d5bc8e552d68ff53', 'sekretariat', 'sekretariat@gmail.com', 'Admin Sekretariat', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kawin`
--
ALTER TABLE `kawin`
  ADD PRIMARY KEY (`id_kawin`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `kebutuhan_bbm`
--
ALTER TABLE `kebutuhan_bbm`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indeks untuk tabel `kgb`
--
ALTER TABLE `kgb`
  ADD PRIMARY KEY (`id_kgb`);

--
-- Indeks untuk tabel `kpl`
--
ALTER TABLE `kpl`
  ADD PRIMARY KEY (`id_kpl`);

--
-- Indeks untuk tabel `pangkalan`
--
ALTER TABLE `pangkalan`
  ADD PRIMARY KEY (`id_pangkalan`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat1`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indeks untuk tabel `riwayat_kgb`
--
ALTER TABLE `riwayat_kgb`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `riwayat_pensiun`
--
ALTER TABLE `riwayat_pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- Indeks untuk tabel `spbe`
--
ALTER TABLE `spbe`
  ADD PRIMARY KEY (`id_spbe`);

--
-- Indeks untuk tabel `spbu`
--
ALTER TABLE `spbu`
  ADD PRIMARY KEY (`id_spbu`);

--
-- Indeks untuk tabel `tdg`
--
ALTER TABLE `tdg`
  ADD PRIMARY KEY (`id_tdg`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agen`
--
ALTER TABLE `agen`
  MODIFY `id_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kawin`
--
ALTER TABLE `kawin`
  MODIFY `id_kawin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan_bbm`
--
ALTER TABLE `kebutuhan_bbm`
  MODIFY `id_kebutuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `kgb`
--
ALTER TABLE `kgb`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `kpl`
--
ALTER TABLE `kpl`
  MODIFY `id_kpl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pangkalan`
--
ALTER TABLE `pangkalan`
  MODIFY `id_pangkalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kgb`
--
ALTER TABLE `riwayat_kgb`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pensiun`
--
ALTER TABLE `riwayat_pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `spbe`
--
ALTER TABLE `spbe`
  MODIFY `id_spbe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `spbu`
--
ALTER TABLE `spbu`
  MODIFY `id_spbu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tdg`
--
ALTER TABLE `tdg`
  MODIFY `id_tdg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
