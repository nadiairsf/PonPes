-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2024 pada 05.12
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0821599879', 'admin@gmail.com', NULL, '$2y$10$zVy8f1FhHS4nJblQcnSsKOhz7V11PKrkz5tn0rEtg57oj3nRWlaEy', NULL, NULL, '2022-11-18 16:34:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asupans`
--

CREATE TABLE `asupans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED NOT NULL,
  `jam` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asupans`
--

INSERT INTO `asupans` (`id`, `id_santri`, `jam`, `waktu`, `ket`, `created_at`, `updated_at`) VALUES
(58, 23, 'Sarapan', '07:18', 'Nasi Jotos', '2023-02-03', NULL),
(59, 23, 'Makan Siang', '11:53', 'Sate Ayam', '2023-02-03', NULL),
(60, 23, 'Jajan', '00:53', 'Roti Bakar', '2023-02-03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gurus`
--

CREATE TABLE `data_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` bigint(50) NOT NULL,
  `id_gurus` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tempat_tinggal` varchar(225) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `riwayat_pendidikan` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_gurus`
--

INSERT INTO `data_gurus` (`id`, `nip`, `id_gurus`, `nama`, `tgl_lahir`, `tempat_lahir`, `status`, `jenis_kelamin`, `tgl_masuk`, `tgl_keluar`, `tempat_tinggal`, `noHp`, `riwayat_pendidikan`, `created_at`, `updated_at`) VALUES
(15, 199512062023022, 45, 'Budi Laksono', '1995-06-12', 'Madiun', 'Aktif', 'Laki - laki', '2023-02-01', NULL, 'Jl. Salak No.99 Kota Madiun Jawa Timur', '08234543278', 'S1 Pendidikan Agama', '2023-02-02 21:39:41', '2023-02-02 21:39:41'),
(16, 1993150620230216, 46, 'Leni Sulistiyowati', '1993-06-15', 'Solo', 'Aktif', 'Perempuan', '2023-02-01', NULL, 'alan Ir. Sutami No.109, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah', '08165788293', 'S1 Pendidikan Matematika', '2023-02-02 21:43:06', '2023-02-02 21:43:06'),
(17, 1999231120230217, 47, 'Bayu Setiawan', '1999-11-23', 'Bekasi', 'Aktif', 'Laki - laki', '2023-02-01', NULL, 'Perum Bekasi Timur Permai Jl. Kresna Raya RT 10 RW 12. Desa/Kelurahan, : Setiamekar. Kecamatan/Kota (LN), : KEC. TAMBUN SELATAN.', '08245654778', 'S1 Pendidikan Olahraga', '2023-02-02 21:44:45', '2023-02-02 21:44:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_santris`
--

CREATE TABLE `data_santris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santris` bigint(20) UNSIGNED NOT NULL,
  `nis` bigint(25) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `nama_ortu` varchar(225) NOT NULL,
  `tempat_tinggal` varchar(225) NOT NULL,
  `noHp_ortu` varchar(25) NOT NULL,
  `kelas` varchar(225) DEFAULT NULL,
  `ket` varchar(225) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_santris`
--

INSERT INTO `data_santris` (`id`, `id_santris`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `status`, `jenis_kelamin`, `tgl_masuk`, `tgl_keluar`, `nama_ortu`, `tempat_tinggal`, `noHp_ortu`, `kelas`, `ket`, `updated_at`, `created_at`) VALUES
(21, 44, 199397624, 'Wati Cahyani', 'Madiun', '2005-02-05', 'Aktif', 'perempuan', '2023-02-01', NULL, 'Yuni Dara', 'Jl. Lawu No.19 Kota Madiun', '0898789976', '9', NULL, '2023-02-02 21:46:38', '2023-02-02 21:46:38'),
(22, 45, 1933070056, 'Emiliander Setyo', 'Jakarta', '2004-11-15', 'Aktif', 'laki-laki', '2023-02-01', NULL, 'Lily Nurwati', 'Jl. KH Agus Salim 16, Sabang, Menteng Jakarta Pusat', '0812 1000 6604', '9', NULL, '2023-02-02 21:49:35', '2023-02-02 21:49:35'),
(23, 46, 1933070089, 'Bima Syah', 'Batam', '2005-04-19', 'Aktif', 'laki-laki', '2023-02-01', NULL, 'Rusminiasih', 'Jl. Raja Isa No.21, Batam Center, Kec. Batam Kota, Kota Batam, Kepulauan Riau', '082123456', '9', NULL, '2023-02-02 21:51:14', '2023-02-02 21:51:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_checks`
--

CREATE TABLE `general_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santris` bigint(20) UNSIGNED NOT NULL,
  `tekanan_darah` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spo2` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respiration_rate` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` int(20) DEFAULT NULL,
  `berat_badan` int(20) DEFAULT NULL,
  `imt` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_penyakit` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obat_konsumsi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `general_checks`
--

INSERT INTO `general_checks` (`id`, `id_santris`, `tekanan_darah`, `spo2`, `suhu`, `nadi`, `respiration_rate`, `tinggi_badan`, `berat_badan`, `imt`, `riwayat_penyakit`, `obat_konsumsi`, `alergi`, `keterangan`, `created_at`, `updated_at`) VALUES
(12, 23, '110/130', '80', '36', '90', '120', 158, 48, 'Normal', NULL, NULL, NULL, NULL, '2023-02-02 21:51:58', '2023-02-02 21:51:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gizikus`
--

CREATE TABLE `gizikus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santris` bigint(20) UNSIGNED NOT NULL,
  `perubahan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gastrointestinal` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bab` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_bab` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bak` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_bak` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rata_tidur` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sulit_tidur` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_sulittidur` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketergantungan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_ketergantungan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperawatan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_keperawatan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_alergi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(45, 'Budi Laksono', 'budi@gmail.com', NULL, '$2y$10$.0lvCSBP/2gm0G.kEjaqIOLpuvkV.UTr/.WYwI3SJ6zXdG2Lxsr2.', NULL, '2023-02-02 21:39:41', '2023-02-02 21:39:41'),
(46, 'Leni Sulistiyowati', 'leni@gmail.com', NULL, '$2y$10$AuafbgxNNylbdRedmztL5eVWIk/5dUuBN0Sdt0NKV.p5dQIAZ0Esa', NULL, '2023-02-02 21:43:06', '2023-02-02 21:43:06'),
(47, 'Bayu Setiawan', 'bayu@gmail.com', NULL, '$2y$10$Tbn8c59zbsCzccshPG9JmeAPqDTxnLhuHV.OLYRv53pc.S6jw7nUO', NULL, '2023-02-02 21:44:45', '2023-02-02 22:23:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hafalans`
--

CREATE TABLE `hafalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED NOT NULL,
  `ket` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hafalans`
--

INSERT INTO `hafalans` (`id`, `id_santri`, `ket`, `created_at`, `updated_at`) VALUES
(11, 23, 'Surah Annas', '2023-02-02 22:24:54', '2023-02-02 22:24:54'),
(12, 23, 'Surah Al-fatihah', '2023-02-02 22:24:58', '2023-02-02 22:24:58'),
(13, 23, 'Surah Al-Baqarah ayat 1-10', '2023-02-02 22:25:16', '2023-02-02 22:25:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mapel` bigint(20) UNSIGNED DEFAULT NULL,
  `id_guru` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `waktu` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_mapel`, `id_guru`, `id_kelas`, `waktu`, `created_at`, `updated_at`) VALUES
(9, 23, 15, 9, 'Senin | 07.30 - 09.30', '2023-02-02 21:54:43', '2023-02-02 21:54:43'),
(10, 24, 16, 9, 'Selasa | 09.00 - 11.00', '2023-02-02 21:55:07', '2023-02-02 21:55:07'),
(11, 28, 17, 9, 'Jumat | 08.00 - 09.30', '2023-02-02 21:56:02', '2023-02-02 21:56:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_nilais`
--

CREATE TABLE `kategori_nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_nilais`
--

INSERT INTO `kategori_nilais` (`id`, `tahun`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(1, '2019/2020', 'Ganjil', 0, NULL, '2023-02-02 21:36:54'),
(14, '2019/2020', 'Genap', 0, '2023-02-02 21:36:54', '2023-02-02 21:37:06'),
(15, '2020/2021', 'Ganjil', 1, '2023-02-02 21:37:06', '2023-02-02 21:37:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `nama`, `tahun`, `created_at`, `updated_at`) VALUES
(9, 'VII', 'VII A', '2020/2021', '2023-01-25 23:35:49', '2023-01-25 23:35:49'),
(10, 'VII', 'VII B', '2020/2021', '2023-02-02 21:34:23', '2023-02-02 21:34:23'),
(11, 'VIII', 'VIII A', '2020/2021', '2023-02-02 21:34:37', '2023-02-02 21:34:37'),
(12, 'VIII', 'VIII B', '2020/2021', '2023-02-02 21:34:48', '2023-02-02 21:34:48'),
(13, 'IX', 'IX A', '2020/2021', '2023-02-02 21:34:59', '2023-02-02 21:34:59'),
(14, 'IX', 'IX B', '2020/2021', '2023-02-02 21:35:15', '2023-02-02 21:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhans`
--

CREATE TABLE `keluhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santris` bigint(20) UNSIGNED NOT NULL,
  `riwayat_konsumsi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `makanan_terakhir` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minuman_terakhir` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluhan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_keluhan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_umum` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_kondisi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nyeri_haid` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_nyeri` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_haid` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna_haid` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nyeri_payudara` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benjolan_payudara` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna_cairan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bau_cairan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fisik_pria` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mastrubasi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_mastrubasi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gatal` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_gatal` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_gatal` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_gatal` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentuk_kulit` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keluhans`
--

INSERT INTO `keluhans` (`id`, `id_santris`, `riwayat_konsumsi`, `makanan_terakhir`, `minuman_terakhir`, `keluhan`, `ket_keluhan`, `kondisi_umum`, `ket_kondisi`, `nyeri_haid`, `lama_nyeri`, `lama_haid`, `warna_haid`, `nyeri_payudara`, `benjolan_payudara`, `warna_cairan`, `bau_cairan`, `fisik_pria`, `mastrubasi`, `jml_mastrubasi`, `gatal`, `ket_gatal`, `waktu_gatal`, `lama_gatal`, `bentuk_kulit`, `created_at`, `updated_at`) VALUES
(35, 23, 'Sayur', 'Tempe Bacem', 'Es teh', '[\"batuk\",\"pusing\"]', NULL, '[\"tampak sakit\",\"pucat\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"lainnya\"]', 'Tidak', NULL, '[\"belakang punggung\"]', NULL, NULL, NULL, '[\"kemerahan tidak bersisik\"]', '2023-02-02 21:52:51', '2023-02-02 21:52:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED NOT NULL,
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `konsultasi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_konsul` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_konsul` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultasis`
--

INSERT INTO `konsultasis` (`id`, `id_santri`, `id_guru`, `konsultasi`, `tgl_konsul`, `jam_konsul`, `hasil`, `status`, `created_at`, `updated_at`) VALUES
(13, 23, 17, 'Berantem dgn gilang', '2023-02-01', '16:00', NULL, '0', '2023-02-02 22:30:22', '2023-02-02 22:30:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2021_05_08_181649_create_doctors_table', 1),
(11, '2021_05_08_181649_create_gurus_table', 2),
(14, '2014_10_12_000000_create_users_table', 3),
(15, '2014_10_12_100000_create_password_resets_table', 3),
(16, '2019_08_19_000000_create_failed_jobs_table', 3),
(17, '2021_05_08_154637_create_admins_table', 3),
(18, '2022_09_15_090039_create_walis_table', 3),
(19, '2022_09_29_120922_create_general_checks_table', 4),
(20, '2022_09_29_141410_create_keluahans_table', 5),
(21, '2022_09_30_113558_create_gizikus_table', 6),
(22, '2022_09_30_150844_create_pelajrans_table', 7),
(23, '2022_09_30_210049_create_konsultasis_table', 8),
(24, '2022_10_05_090503_create_kelas_table', 9),
(25, '2022_10_07_035540_create_jadwals_table', 10),
(26, '2022_10_08_163524_create_isi_kelas_table', 11),
(27, '2022_10_10_030821_create_hafalans_table', 12),
(28, '2022_10_11_074418_create_kategori_nilais_table', 13),
(29, '2022_10_12_051259_create_nilais_table', 14),
(30, '2022_10_24_094926_create_dynamic_fields_table', 15),
(31, '2022_10_26_012001_create_asupans_table', 16),
(32, '2022_10_31_132552_create_prestasis_table', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED NOT NULL,
  `id_kat` bigint(20) UNSIGNED NOT NULL,
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `tg1` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg2` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg3` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ph1` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ph2` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ph3` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `id_santri`, `id_kat`, `id_mapel`, `tg1`, `tg2`, `tg3`, `ph1`, `ph2`, `ph3`, `final`, `created_at`, `updated_at`) VALUES
(59, 23, 15, 13, '80', '70', '85', '98', '78', '90', '89', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(60, 23, 15, 22, '70', '89', '90', '78', '76', '80', '90', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(61, 23, 15, 23, '78', '86', '88', '85', '97', '93', '90', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(62, 23, 15, 24, '67', '70', '78', '85', '89', '85', '79', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(63, 23, 15, 25, '80', '97', '86', '75', '77', '72', '70', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(64, 23, 15, 26, '80', '79', '70', '89', '88', '86', '85', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(65, 23, 15, 27, '70', '90', '80', '90', '90', '90', '90', '2023-02-02 22:27:32', '2023-02-02 22:27:32'),
(66, 23, 15, 28, '80', '78', '80', '90', '90', '90', '98', '2023-02-02 22:27:32', '2023-02-02 22:27:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('santri@gmail.com', '6mtyo9GOv4QM3jS0s11QK7oNqamA9zNKC7V7wNikL9tQLBTFuhjjb8z6ShA0zt10', '2022-11-17 21:16:02'),
('santri@gmail.com', 'lQiAq8QPSGdz77GTgUIujn6SP6m1wG8Jw8s0FrPXuddpRcpIaNLCftsVKwRqgCre', '2022-11-17 21:17:12'),
('santri@gmail.com', 'N0M4m5JnDElRaY7dXvn5z2N8DlFtN2kwOH357WQz2xQzZyILdBBw6KBLXRCmiMzd', '2022-11-17 21:17:55'),
('santri@gmail.com', 'FDNH0tuKKaRu4xCuI8m3dcneCJB2yoiw4mVM6R1ejrpc1foQzooxaZjfdO81WSV6', '2022-11-17 21:18:11'),
('santri@gmail.com', 'WpEkifY89P9w0jBjw1zt2ie5KnWvr0dbyLFAoqn7PMiJpbF3PJboP2STXZPMQzm8', '2022-11-17 21:29:23'),
('santri@gmail.com', '3ryqQjmqnEwsiAn9Ck6skrKdTUsnNY5KM53iqn1AyYl7EBiQgBcEh5w2MyJpLz4j', '2022-11-17 21:30:06'),
('nadmain18@gmail.com', 'dgxG2yV4pWUcs82beuDYfbZTJ6E1Y3a3PuZ0JshDnfceDtMCX8ai816aAFJ5e5TO', '2022-11-17 21:30:49'),
('nadmain18@gmail.com', 'blip5odZRtE53POXeIyZA0HuRbkHIvYOCao2PcSBDMPIOGaWKOIxTSvcerBS19mt', '2022-11-18 05:25:15'),
('nadmain18@gmail.com', 'Z1N6w4DwNyHhB6k3oSmgAMZM6Q9k4ILIiGntfNVa5wsq8PKWWKgHPkQPQSp3Dzbe', '2022-11-18 05:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajarans`
--

CREATE TABLE `pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelajarans`
--

INSERT INTO `pelajarans` (`id`, `kode`, `mapel`, `jam`, `created_at`, `updated_at`) VALUES
(13, 'Map - 014', 'Bahasa Indonesiaaa', '2', '2022-10-07 08:13:11', '2023-02-02 21:35:35'),
(22, 'Map - 023', 'Bahasa Inggris', '2', '2023-02-02 21:35:43', '2023-02-02 21:35:43'),
(23, 'Map - 024', 'Agama', '1', '2023-02-02 21:35:51', '2023-02-02 21:35:51'),
(24, 'Map - 025', 'Matematika', '3', '2023-02-02 21:36:06', '2023-02-02 21:36:06'),
(25, 'Map - 026', 'IPA', '2', '2023-02-02 21:36:11', '2023-02-02 21:36:11'),
(26, 'Map - 027', 'IPS', '1', '2023-02-02 21:36:15', '2023-02-02 21:36:21'),
(27, 'Map - 028', 'PPKN', '1', '2023-02-02 21:36:25', '2023-02-02 21:36:25'),
(28, 'Map - 029', 'Penjaskes', '2', '2023-02-02 21:36:35', '2023-02-02 21:36:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED NOT NULL,
  `ket` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasis`
--

INSERT INTO `prestasis` (`id`, `id_santri`, `ket`, `created_at`, `updated_at`) VALUES
(5, 23, 'Juara 1 Lomba Mewarnai', '2023-02-02 22:25:34', '2023-02-02 22:25:34'),
(6, 23, 'Finalis Pidato Behaya Narkoba', '2023-02-02 22:25:56', '2023-02-02 22:25:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santris`
--

CREATE TABLE `santris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `santris`
--

INSERT INTO `santris` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(43, 'Santriwati Cahya', 'santriwati@gmail.com', NULL, '$2y$10$ZV6YLKQOvghNql6DXWjd7.WxyYqDEXwE9wKX5pbJPEECClDfs7B.u', NULL, '2023-01-25 23:36:47', '2023-01-25 23:36:47'),
(44, 'Wati Cahyani', 'wati@gmail.com', NULL, '$2y$10$gGWd/QW6Q6hgBATvBQzTuO/SH21CyXA4JruNwQ/zj6uV0yw7xjbwi', NULL, '2023-02-02 21:46:38', '2023-02-02 21:46:38'),
(45, 'Emiliander Setyo', 'emil@gmail.com', NULL, '$2y$10$OG/YWObq03TyJ.5W.UQ1x.sKERIAYi27Rkym4GDNS2ozjeuKrh9ka', NULL, '2023-02-02 21:49:35', '2023-02-02 21:49:35'),
(46, 'Bima Syah', 'bima@gmail.com', NULL, '$2y$10$/AOqFbtN4HL/TwoOnvpGquPnZa0xW8IG65t28ZSisah5nvxtHBRs.', NULL, '2023-02-02 21:51:14', '2023-02-02 22:29:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'siswa', 'siswa@gmail.com', NULL, '$2y$10$l0NUL9oosoDzG5616Ar3WOPBsjlYa4YLTix0xlEfbqMF9yyu935gm', NULL, '2022-09-30 17:52:28', '2022-09-30 17:52:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `walis`
--

CREATE TABLE `walis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_santri` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `walis`
--

INSERT INTO `walis` (`id`, `id_santri`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 43, 'Wali Santriwati', '08981099872', 'wali@gmail.com', NULL, '$2y$10$R60zruKg98liRvZ14UiU3ONs3.PHrqSoFckgdyLQdAmYRKuvocCDi', NULL, '2023-01-25 23:36:47', '2023-01-25 23:36:47'),
(17, 44, 'Yuni Dara', '0898789976', 'yuni@gmail.com', NULL, '$2y$10$67.FVI5LKtsj1Zm9TYuyjemKwgZtY60b4ayEe8rPWG2jpEiiPA0Mm', NULL, '2023-02-02 21:46:38', '2023-02-02 21:46:38'),
(18, 45, 'Lily Nurwati', '0812 1000 6604', 'liliy@gmail.com', NULL, '$2y$10$08cVmBujgxERsGaYXoFCMumDVHsNt/AjYrMxF1zn7iUB8l19C9LJ.', NULL, '2023-02-02 21:49:35', '2023-02-02 21:49:35'),
(19, 46, 'Rusminiasih', '082123456', 'rusmini@gmail.com', NULL, '$2y$10$L6UbNN5cXo1aA4cJv9/E9eL16l/HEIMTeRRo1HROZVmXeKDVlGZKq', NULL, '2023-02-02 21:51:14', '2023-02-02 22:31:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `asupans`
--
ALTER TABLE `asupans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indeks untuk tabel `data_gurus`
--
ALTER TABLE `data_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gurus` (`id_gurus`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `data_santris`
--
ALTER TABLE `data_santris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santris`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `general_checks`
--
ALTER TABLE `general_checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santris`);

--
-- Indeks untuk tabel `gizikus`
--
ALTER TABLE `gizikus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santris`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`);

--
-- Indeks untuk tabel `hafalans`
--
ALTER TABLE `hafalans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santri`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kategori_nilais`
--
ALTER TABLE `kategori_nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluhans`
--
ALTER TABLE `keluhans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santris`);

--
-- Indeks untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santris` (`id_santri`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indeks untuk tabel `santris`
--
ALTER TABLE `santris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `walis`
--
ALTER TABLE `walis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `walis_email_unique` (`email`),
  ADD KEY `id_anak` (`id_santri`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `asupans`
--
ALTER TABLE `asupans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `data_gurus`
--
ALTER TABLE `data_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_santris`
--
ALTER TABLE `data_santris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `general_checks`
--
ALTER TABLE `general_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gizikus`
--
ALTER TABLE `gizikus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `hafalans`
--
ALTER TABLE `hafalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori_nilais`
--
ALTER TABLE `kategori_nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `keluhans`
--
ALTER TABLE `keluhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `santris`
--
ALTER TABLE `santris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `walis`
--
ALTER TABLE `walis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `asupans`
--
ALTER TABLE `asupans`
  ADD CONSTRAINT `asupans_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_gurus`
--
ALTER TABLE `data_gurus`
  ADD CONSTRAINT `data_gurus_ibfk_1` FOREIGN KEY (`id_gurus`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_santris`
--
ALTER TABLE `data_santris`
  ADD CONSTRAINT `data_santris_ibfk_1` FOREIGN KEY (`id_santris`) REFERENCES `santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `general_checks`
--
ALTER TABLE `general_checks`
  ADD CONSTRAINT `general_checks_ibfk_1` FOREIGN KEY (`id_santris`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gizikus`
--
ALTER TABLE `gizikus`
  ADD CONSTRAINT `gizikus_ibfk_1` FOREIGN KEY (`id_santris`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hafalans`
--
ALTER TABLE `hafalans`
  ADD CONSTRAINT `hafalans_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `data_gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keluhans`
--
ALTER TABLE `keluhans`
  ADD CONSTRAINT `keluhans_ibfk_1` FOREIGN KEY (`id_santris`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD CONSTRAINT `konsultasis_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasis_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `data_gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  ADD CONSTRAINT `prestasis_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `data_santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `walis`
--
ALTER TABLE `walis`
  ADD CONSTRAINT `walis_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
