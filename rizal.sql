-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2025 pada 12.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rizal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auditor`
--

CREATE TABLE `auditor` (
  `id_auditor` int(11) UNSIGNED NOT NULL,
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `status_aktif` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auditor`
--

INSERT INTO `auditor` (`id_auditor`, `id_dosen`, `status_aktif`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 1, 'aktif', '2025-06-18 13:20:57', NULL, 1, NULL),
(6, 2, 'nonaktif', '2025-06-18 13:20:57', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `unique_name` varchar(255) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_file`, `original_name`, `unique_name`, `id_user`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'LaporanAudit.pdf', 'laporan_20240601_001.pdf', 1, '2025-06-18 13:25:21', NULL, 1, NULL),
(2, 'DokumenEvaluasi.docx', 'evaluasi_20240601_002.docx', 2, '2025-06-18 13:25:21', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `capaian_kinerja_prodi`
--

CREATE TABLE `capaian_kinerja_prodi` (
  `id_capaian` int(11) UNSIGNED NOT NULL,
  `id_standar` int(11) UNSIGNED NOT NULL,
  `id_prodi` int(11) UNSIGNED NOT NULL,
  `deskripsi_capaian` text DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `capaian_kinerja_prodi`
--

INSERT INTO `capaian_kinerja_prodi` (`id_capaian`, `id_standar`, `id_prodi`, `deskripsi_capaian`, `tahun`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'Prodi mencapai target lulusan tepat waktu sebesar 90%', '2024', '2025-06-18 13:31:55', NULL, NULL, NULL),
(2, 5, 2, 'FGHJK', '2025', '2025-06-18 10:10:50', '2025-06-18 10:10:50', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_tilik`
--

CREATE TABLE `daftar_tilik` (
  `id_tilik` int(11) UNSIGNED NOT NULL,
  `id_standar` int(11) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text DEFAULT NULL,
  `link_bukti` varchar(255) DEFAULT NULL,
  `hasil_observasi` text DEFAULT NULL,
  `hasil_temuan` enum('sesuai','tidak_sesuai_mayor','tidak_sesuai_minor','observasi') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_tilik`
--

INSERT INTO `daftar_tilik` (`id_tilik`, `id_standar`, `pertanyaan`, `jawaban`, `link_bukti`, `hasil_observasi`, `hasil_temuan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Apakah visi misi tersedia di situs?', NULL, NULL, NULL, 'sesuai', '2025-06-18 13:31:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `niy` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `niy`, `nama_lengkap`, `alamat`, `user_id`, `created_by`, `updated_by`) VALUES
(2, '12345678', '987654321', 'Dosen Satu', 'Jl. Pendidikan No. 10', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_diri`
--

CREATE TABLE `evaluasi_diri` (
  `id_evaluasi` int(11) UNSIGNED NOT NULL,
  `id_standar` int(11) UNSIGNED NOT NULL,
  `id_prodi` int(11) UNSIGNED NOT NULL,
  `nilai_standar` int(3) UNSIGNED DEFAULT NULL COMMENT 'Skor evaluasi berdasarkan faktor standar (0–100)',
  `faktor_internal` text DEFAULT NULL COMMENT 'Deskripsi pengaruh faktor internal terhadap capaian prodi',
  `faktor_eksternal` text DEFAULT NULL COMMENT 'Deskripsi pengaruh faktor eksternal terhadap capaian prodi',
  `kesimpulan` text DEFAULT NULL COMMENT 'Ringkasan hasil evaluasi prodi',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `evaluasi_diri`
--

INSERT INTO `evaluasi_diri` (`id_evaluasi`, `id_standar`, `id_prodi`, `nilai_standar`, `faktor_internal`, `faktor_eksternal`, `kesimpulan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 85, 'Kepemimpinan yang kuat', 'Dukungan pemerintah', 'Prodi berjalan dengan sangat baik', '2025-06-18 13:31:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) UNSIGNED NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `id_dosen`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'Fakultas Teknik', 1, '2025-06-18 13:22:12', NULL, 1, NULL),
(6, 'Fakultas Ekonomi', 2, '2025-06-18 13:22:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lemb_akreditasi`
--

CREATE TABLE `lemb_akreditasi` (
  `id_lemb` int(11) UNSIGNED NOT NULL,
  `nama_lembaga` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lemb_akreditasi`
--

INSERT INTO `lemb_akreditasi` (`id_lemb`, `nama_lembaga`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'BAN-PT', '2025-06-18 13:26:06', NULL, 1, NULL),
(2, 'LAM Teknik', '2025-06-18 13:26:06', NULL, 1, NULL),
(3, 'PT Makmur Jaya', '2025-06-18 08:38:37', '2025-06-18 08:38:49', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) UNSIGNED NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `before` varchar(255) NOT NULL,
  `after` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `create_by` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `table_name`, `deskripsi`, `before`, `after`, `created_at`, `create_by`) VALUES
(1, 'auditor', 'Menambahkan auditor', '-', '{\"id_dosen\":1,\"status_aktif\":\"aktif\"}', '2025-06-18 13:21:09', 'admin'),
(2, 'fakultas', 'Update nama fakultas', '{\"nama_fakultas\":\"FISIP\"}', '{\"nama_fakultas\":\"FISIPOL\"}', '2025-06-18 13:21:09', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matrix_penilaian`
--

CREATE TABLE `matrix_penilaian` (
  `id_matrix` int(11) UNSIGNED NOT NULL,
  `id_standar` int(11) UNSIGNED DEFAULT NULL,
  `deskripsi_kriteria` text DEFAULT NULL,
  `nilai` tinyint(1) UNSIGNED DEFAULT NULL COMMENT 'Rentang nilai 1–4',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matrix_penilaian`
--

INSERT INTO `matrix_penilaian` (`id_matrix`, `id_standar`, `deskripsi_kriteria`, `nilai`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Kesesuaian visi dan misi dengan rencana strategis', 4, '2025-06-18 13:35:32', '2025-06-18 13:35:32', 1, 1),
(2, 1, 'Partisipasi dosen dan mahasiswa dalam evaluasi misi', 3, '2025-06-18 13:35:32', '2025-06-18 13:35:32', 1, 1),
(3, 1, 'Dokumentasi pelaksanaan kegiatan sesuai visi', 2, '2025-06-18 13:35:32', '2025-06-18 13:35:32', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peluang_peningkatan`
--

CREATE TABLE `peluang_peningkatan` (
  `id_peluang` int(11) UNSIGNED NOT NULL,
  `id_standar` int(11) UNSIGNED DEFAULT NULL,
  `id_tilik` int(11) UNSIGNED DEFAULT NULL,
  `id_fakultas` int(11) UNSIGNED DEFAULT NULL,
  `id_prodi` int(11) UNSIGNED DEFAULT NULL,
  `id_unit_kerja` int(11) UNSIGNED DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `kelebihan` text DEFAULT NULL,
  `peluang` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peluang_peningkatan`
--

INSERT INTO `peluang_peningkatan` (`id_peluang`, `id_standar`, `id_tilik`, `id_fakultas`, `id_prodi`, `id_unit_kerja`, `bidang`, `kelebihan`, `peluang`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 1, 1, 1, 'Manajemen Mutu', 'Kegiatan monitoring berjalan rutin setiap semester.', 'Dapat ditingkatkan dengan evaluasi eksternal tahunan.', '2025-06-18 13:35:56', '2025-06-18 13:35:56', 1, 1),
(2, 1, 1, 1, 1, 1, 'Akademik', 'Kurikulum selalu direvisi tiap 2 tahun.', 'Meningkatkan keterlibatan industri dalam revisi kurikulum.', '2025-06-18 13:35:56', '2025-06-18 13:35:56', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan_audit`
--

CREATE TABLE `penugasan_audit` (
  `id_penugasan` int(11) UNSIGNED NOT NULL,
  `id_periode` int(11) UNSIGNED NOT NULL,
  `id_auditor` int(11) UNSIGNED NOT NULL,
  `id_fakultas` int(11) UNSIGNED DEFAULT NULL,
  `id_prodi` int(11) UNSIGNED DEFAULT NULL,
  `id_unit_kerja` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penugasan_audit`
--

INSERT INTO `penugasan_audit` (`id_penugasan`, `id_periode`, `id_auditor`, `id_fakultas`, `id_prodi`, `id_unit_kerja`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 1, 1, NULL, '2025-06-18 13:25:45', NULL, 1, NULL),
(2, 1, 2, NULL, NULL, 1, '2025-06-18 13:25:45', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_audit`
--

CREATE TABLE `periode_audit` (
  `id_periode` int(11) UNSIGNED NOT NULL,
  `tahun_audit` year(4) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status_periode` enum('aktif','nonaktif') DEFAULT 'nonaktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periode_audit`
--

INSERT INTO `periode_audit` (`id_periode`, `tahun_audit`, `tgl_mulai`, `tgl_selesai`, `status_periode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2024', '2024-01-01', '2024-12-31', 'aktif', '2025-06-18 13:14:49', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) UNSIGNED NOT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `id_dosen` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `created_at`, `updated_at`, `created_by`, `updated_by`, `id_dosen`) VALUES
(1, 'Teknik Informatika', '2025-06-18 13:08:51', '2025-06-18 13:08:51', 1, 1, 1),
(2, 'Sistem Informasi', '2025-06-18 13:08:51', '2025-06-18 13:08:51', 1, 1, NULL),
(3, 'Informatika / IT', '2025-06-18 08:23:43', '2025-06-18 08:24:05', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:rgn5q7q0nsfcutd7hpvuuln9fvmkh7sp', '::1', '2025-06-18 10:45:10', 0x5f5f63695f6c6173745f726567656e65726174657c693a313735303234333530393b5f63695f70726576696f75735f75726c7c733a33393a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f6361706169616e223b69647c733a313a2231223b66756c6c6e616d657c733a343a2244696b79223b757365726e616d657c733a31343a2264696b7940676d61696c2e636f6d223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b6c6f676765645f696e7c623a313b44617461205374616e64617220626572686173696c20646970657262617275692e7c4e3b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar_lembaga_akreditasi`
--

CREATE TABLE `standar_lembaga_akreditasi` (
  `id_standar` int(11) UNSIGNED NOT NULL,
  `id_lemb` int(11) UNSIGNED NOT NULL,
  `kode_standar` varchar(50) NOT NULL,
  `nama_standar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `standar_lembaga_akreditasi`
--

INSERT INTO `standar_lembaga_akreditasi` (`id_standar`, `id_lemb`, `kode_standar`, `nama_standar`, `deskripsi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'STD-01', 'Visi dan Misi', 'Standar terkait visi dan misi institusi', '2025-06-18 13:31:55', NULL, NULL, NULL),
(5, 1, 'WEFGFV', 'ABCDS', 'ERFGBN', '2025-06-18 09:21:28', '2025-06-18 09:52:09', 1, 1),
(12, 2, 'FGHKJLK', 'VHBKJN', 'GVJB', '2025-06-18 09:52:45', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temuan_audit`
--

CREATE TABLE `temuan_audit` (
  `id_temuan` int(11) UNSIGNED NOT NULL,
  `hasil_temuan` text DEFAULT NULL COMMENT 'List id_tilik yang dipisahkan koma',
  `id_penugasan` int(11) UNSIGNED DEFAULT NULL,
  `temuan_audit` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temuan_audit`
--

INSERT INTO `temuan_audit` (`id_temuan`, `hasil_temuan`, `id_penugasan`, `temuan_audit`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '1,3', 1, 'Beberapa indikator tidak memiliki dokumen pendukung valid.', '2025-06-18 13:35:44', '2025-06-18 13:35:44', 1, 1),
(2, '2', 1, 'Evaluasi standar mutu belum dilakukan secara berkala.', '2025-06-18 13:35:44', '2025-06-18 13:35:44', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_koreksi`
--

CREATE TABLE `tindakan_koreksi` (
  `id_koreksi` int(11) UNSIGNED NOT NULL,
  `id_temuan` int(11) UNSIGNED DEFAULT NULL,
  `uraian_tindakan` text NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `tgl_rencana` date DEFAULT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `status` enum('diajukan','diproses','selesai') NOT NULL DEFAULT 'diajukan',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan_koreksi`
--

INSERT INTO `tindakan_koreksi` (`id_koreksi`, `id_temuan`, `uraian_tindakan`, `penanggung_jawab`, `tgl_rencana`, `tgl_realisasi`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Melakukan revisi dokumen standar operasional prosedur yang belum sesuai.', 'Dr. Aditya Putra', '2025-06-10', NULL, 'diajukan', '2025-06-18 13:37:38', '2025-06-18 13:37:38', 1, 1),
(2, 2, 'Menjadwalkan pelatihan ulang untuk auditor internal.', 'Ir. Rina Dewi', '2025-06-12', '2025-06-15', 'selesai', '2025-06-18 13:37:38', '2025-06-18 13:37:38', 2, 2),
(3, 1, 'Memperbaiki laporan audit semester sebelumnya.', 'Dr. Budi Santoso', '2025-06-18', NULL, 'diproses', '2025-06-18 13:37:38', '2025-06-18 13:37:38', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) UNSIGNED NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `nama_unit`, `id_dosen`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'Lembaga Penjaminan Mutu', 1, '2025-06-18 13:22:51', NULL, 1, NULL),
(6, 'Unit Teknologi Informasi', 2, '2025-06-18 13:22:51', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(5) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Diky', 'diky@gmail.com', '$2y$10$jFRRAEobttuK/5tVqY/oQ.HT56jcIcJ/fqq3BOTZJ8c2IYBS.oXFa', 1, '2025-06-18 06:38:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_category_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `submenu_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_category_id`, `menu_id`, `submenu_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 1, 1, '2025-06-18 13:11:30', NULL, NULL, NULL),
(2, 1, 1, 2, 2, '2025-06-18 13:11:30', NULL, NULL, NULL),
(3, 2, 1, 2, 2, '2025-06-18 13:11:30', NULL, NULL, NULL),
(4, 1, 1, 3, 0, '2025-06-18 14:24:30', NULL, NULL, NULL),
(5, 1, 1, 4, 0, '2025-06-18 15:08:40', '2025-06-18 15:08:40', NULL, NULL),
(6, 1, 1, 5, 0, '2025-06-18 15:33:47', NULL, NULL, NULL),
(7, 1, 1, 6, 0, '2025-06-18 15:46:07', NULL, NULL, NULL),
(8, 1, 1, 7, 0, '2025-06-18 17:01:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_category`, `title`, `url`, `icon`, `parent`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 1, 'Halaman Dosen', 'dosen', 'fas fa-user', 0, '2025-06-18 15:05:19', '2025-06-18 15:05:19', NULL, NULL),
(4, 1, 'Management Prodi', 'prodi', 'book-open', 0, NULL, NULL, NULL, NULL),
(5, 1, 'Lembaga Akreditasi', 'lembaga', 'fas fa-university', 0, NULL, NULL, NULL, NULL),
(6, 1, 'Standart Akreditasi', 'standar', 'fas fa-folder-open', 0, '2025-06-18 15:44:22', NULL, NULL, NULL),
(7, 1, 'Capaian Kinerja', 'capaian', 'fas fa-trophy', 0, '2025-06-18 17:00:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu_category`
--

CREATE TABLE `user_menu_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu_category`
--

INSERT INTO `user_menu_category` (`id`, `menu_category`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Manajemen Admin', '2025-06-18 13:13:47', NULL, NULL, NULL),
(2, 'Audit', '2025-06-18 13:13:47', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'admin', '2025-06-18 13:11:09', '2025-06-18 13:11:09', NULL, NULL),
(2, 'dosen', '2025-06-18 13:11:09', '2025-06-18 13:11:09', NULL, NULL),
(3, 'mahasiswa', '2025-06-18 13:11:09', '2025-06-18 13:11:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu`, `title`, `url`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Kelola Role', '/role/manage', '2025-06-18 13:14:31', NULL, NULL, NULL),
(2, 1, 'Hak Akses', '/role/access', '2025-06-18 13:14:31', NULL, NULL, NULL),
(3, 2, 'Lihat Periode', '/periode/view', '2025-06-18 13:14:31', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`id_auditor`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `unique_name` (`unique_name`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `capaian_kinerja_prodi`
--
ALTER TABLE `capaian_kinerja_prodi`
  ADD PRIMARY KEY (`id_capaian`),
  ADD KEY `fk_capaian_standar` (`id_standar`),
  ADD KEY `fk_capaian_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `daftar_tilik`
--
ALTER TABLE `daftar_tilik`
  ADD PRIMARY KEY (`id_tilik`),
  ADD KEY `fk_tilik_standar` (`id_standar`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `evaluasi_diri`
--
ALTER TABLE `evaluasi_diri`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `fk_eval_standar` (`id_standar`),
  ADD KEY `fk_eval_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `lemb_akreditasi`
--
ALTER TABLE `lemb_akreditasi`
  ADD PRIMARY KEY (`id_lemb`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matrix_penilaian`
--
ALTER TABLE `matrix_penilaian`
  ADD PRIMARY KEY (`id_matrix`),
  ADD KEY `id_standar` (`id_standar`);

--
-- Indeks untuk tabel `peluang_peningkatan`
--
ALTER TABLE `peluang_peningkatan`
  ADD PRIMARY KEY (`id_peluang`),
  ADD KEY `id_standar` (`id_standar`),
  ADD KEY `id_tilik` (`id_tilik`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`);

--
-- Indeks untuk tabel `penugasan_audit`
--
ALTER TABLE `penugasan_audit`
  ADD PRIMARY KEY (`id_penugasan`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_auditor` (`id_auditor`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`);

--
-- Indeks untuk tabel `periode_audit`
--
ALTER TABLE `periode_audit`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_prodi_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indeks untuk tabel `standar_lembaga_akreditasi`
--
ALTER TABLE `standar_lembaga_akreditasi`
  ADD PRIMARY KEY (`id_standar`),
  ADD UNIQUE KEY `kode_standar` (`kode_standar`),
  ADD KEY `fk_standar_lemb` (`id_lemb`);

--
-- Indeks untuk tabel `temuan_audit`
--
ALTER TABLE `temuan_audit`
  ADD PRIMARY KEY (`id_temuan`),
  ADD KEY `id_penugasan` (`id_penugasan`);

--
-- Indeks untuk tabel `tindakan_koreksi`
--
ALTER TABLE `tindakan_koreksi`
  ADD PRIMARY KEY (`id_koreksi`),
  ADD KEY `id_temuan` (`id_temuan`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu_category`
--
ALTER TABLE `user_menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auditor`
--
ALTER TABLE `auditor`
  MODIFY `id_auditor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `capaian_kinerja_prodi`
--
ALTER TABLE `capaian_kinerja_prodi`
  MODIFY `id_capaian` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_tilik`
--
ALTER TABLE `daftar_tilik`
  MODIFY `id_tilik` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_diri`
--
ALTER TABLE `evaluasi_diri`
  MODIFY `id_evaluasi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lemb_akreditasi`
--
ALTER TABLE `lemb_akreditasi`
  MODIFY `id_lemb` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `matrix_penilaian`
--
ALTER TABLE `matrix_penilaian`
  MODIFY `id_matrix` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peluang_peningkatan`
--
ALTER TABLE `peluang_peningkatan`
  MODIFY `id_peluang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penugasan_audit`
--
ALTER TABLE `penugasan_audit`
  MODIFY `id_penugasan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `periode_audit`
--
ALTER TABLE `periode_audit`
  MODIFY `id_periode` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `standar_lembaga_akreditasi`
--
ALTER TABLE `standar_lembaga_akreditasi`
  MODIFY `id_standar` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `temuan_audit`
--
ALTER TABLE `temuan_audit`
  MODIFY `id_temuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tindakan_koreksi`
--
ALTER TABLE `tindakan_koreksi`
  MODIFY `id_koreksi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit_kerja` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_menu_category`
--
ALTER TABLE `user_menu_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auditor`
--
ALTER TABLE `auditor`
  ADD CONSTRAINT `auditor_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `capaian_kinerja_prodi`
--
ALTER TABLE `capaian_kinerja_prodi`
  ADD CONSTRAINT `fk_capaian_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_capaian_standar` FOREIGN KEY (`id_standar`) REFERENCES `standar_lembaga_akreditasi` (`id_standar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_tilik`
--
ALTER TABLE `daftar_tilik`
  ADD CONSTRAINT `fk_tilik_standar` FOREIGN KEY (`id_standar`) REFERENCES `standar_lembaga_akreditasi` (`id_standar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `evaluasi_diri`
--
ALTER TABLE `evaluasi_diri`
  ADD CONSTRAINT `fk_eval_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eval_standar` FOREIGN KEY (`id_standar`) REFERENCES `standar_lembaga_akreditasi` (`id_standar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matrix_penilaian`
--
ALTER TABLE `matrix_penilaian`
  ADD CONSTRAINT `matrix_penilaian_ibfk_1` FOREIGN KEY (`id_standar`) REFERENCES `standar_lembaga_akreditasi` (`id_standar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peluang_peningkatan`
--
ALTER TABLE `peluang_peningkatan`
  ADD CONSTRAINT `peluang_peningkatan_ibfk_1` FOREIGN KEY (`id_standar`) REFERENCES `standar_lembaga_akreditasi` (`id_standar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peluang_peningkatan_ibfk_2` FOREIGN KEY (`id_tilik`) REFERENCES `daftar_tilik` (`id_tilik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peluang_peningkatan_ibfk_3` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peluang_peningkatan_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peluang_peningkatan_ibfk_5` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penugasan_audit`
--
ALTER TABLE `penugasan_audit`
  ADD CONSTRAINT `penugasan_audit_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode_audit` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_audit_ibfk_2` FOREIGN KEY (`id_auditor`) REFERENCES `auditor` (`id_auditor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_audit_ibfk_3` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_audit_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_audit_ibfk_5` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `standar_lembaga_akreditasi`
--
ALTER TABLE `standar_lembaga_akreditasi`
  ADD CONSTRAINT `fk_standar_lemb` FOREIGN KEY (`id_lemb`) REFERENCES `lemb_akreditasi` (`id_lemb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `temuan_audit`
--
ALTER TABLE `temuan_audit`
  ADD CONSTRAINT `temuan_audit_ibfk_1` FOREIGN KEY (`id_penugasan`) REFERENCES `penugasan_audit` (`id_penugasan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_koreksi`
--
ALTER TABLE `tindakan_koreksi`
  ADD CONSTRAINT `tindakan_koreksi_ibfk_1` FOREIGN KEY (`id_temuan`) REFERENCES `temuan_audit` (`id_temuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `unit_kerja_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
