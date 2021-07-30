-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2021 pada 05.20
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kanwilbpn_baru`
--

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
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_aset` date NOT NULL,
  `asal_perolehan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rupiah_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pengguna_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_aset`, `no_aset`, `tgl_aset`, `asal_perolehan`, `rupiah_aset`, `merk_barang`, `kondisi`, `image`, `created_at`, `updated_at`, `pengguna_id`, `jenis_id`) VALUES
(17, 'CCTV', '1', '2021-07-13', 'HIBAH', 'Rp.12.000.000', 'sony', 'BAGUS', '1627393169-cctv.jpg', '2021-07-27 06:39:29', '2021-07-27 06:39:29', 15, 15),
(19, 'Nisan Terena', '1', '2021-07-06', 'APBN', 'Rp.120.000.000', 'Nissan', 'BAGUS', '1627402315-nisan-terena.jpg', '2021-07-27 09:11:55', '2021-07-27 09:11:55', 21, 10),
(21, 'CCTV', '3', '2021-07-05', 'HIBAH', 'Rp.4.000.000', 'SHARP', 'BAGUS', '1627402592-cctv.jpg', '2021-07-27 09:16:32', '2021-07-27 23:04:29', 13, 15),
(22, 'CCTV', '4', '2021-07-05', 'HIBAH', 'Rp.12.000.000', 'sony', 'RUSAK', '1627402624-cctv.jpg', '2021-07-27 09:17:04', '2021-07-27 11:41:19', 13, 15),
(23, 'Nisan Terena', '2', '2021-07-11', 'HIBAH', 'Rp.120.000.000', 'Nissan', 'BAGUS', '1627479897-nisan-terena.jpg', '2021-07-28 06:44:57', '2021-07-28 06:44:57', 17, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `kode_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(8, '3050105017', 'Mesin Absensi', '2021-07-26 09:16:59', '2021-07-26 09:16:59'),
(9, '3010305002', 'Portable Water Pump', '2021-07-26 09:18:02', '2021-07-26 09:18:02'),
(10, '3020102003', 'Mini Bus', '2021-07-26 09:18:34', '2021-07-26 09:18:34'),
(11, '3020104001', 'Sepeda Motor', '2021-07-26 09:19:18', '2021-07-26 09:19:18'),
(12, '3050104001', 'Lemari Besi (Metal)', '2021-07-26 09:20:12', '2021-07-26 09:20:12'),
(13, '3050104005', 'Filing Kabinet Besi', '2021-07-26 09:21:00', '2021-07-26 09:21:00'),
(14, '3050104017', 'Tempat Menyimpan Gambar', '2021-07-26 09:21:48', '2021-07-26 09:21:48'),
(15, '3050105007', 'CCTV', '2021-07-26 09:22:29', '2021-07-26 09:22:29'),
(16, '3050105010', 'White Bord', '2021-07-26 09:23:05', '2021-07-26 09:23:05'),
(17, '3050201002', 'Meja Kayu', '2021-07-26 09:25:10', '2021-07-26 09:25:10'),
(18, '3050201003', 'Kursi Metal', '2021-07-26 09:25:52', '2021-07-26 09:25:52'),
(19, '3050201020', 'Kursi Plastik', '2021-07-26 09:26:42', '2021-07-26 09:26:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `nama`, `aksi`, `created_at`, `updated_at`) VALUES
(1, 'isan', 'mengubah kondisi aset <b>3050105007-3</b> menjadi <b>RUSAK</b>', '2021-07-27 11:28:58', '2021-07-27 11:28:58'),
(2, 'isan', 'mengubah kondisi aset &lt;b&gt;3050105007-3&lt;/b&gt; menjadi &lt;b&gt;BAGUS&lt;/b&gt;', '2021-07-27 11:37:38', '2021-07-27 11:37:38'),
(3, 'isan', 'mengubah kondisi aset &lt;b&gt;3050105007-4&lt;/b&gt; menjadi &lt;b&gt;RUSAK&lt;/b&gt;', '2021-07-27 11:41:19', '2021-07-27 11:41:19');

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
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2021_07_17_102300_create_pengguna_table', 1),
(39, '2021_07_17_102318_create_jenis_table', 1),
(40, '2021_07_17_102336_create_mobile_table', 1),
(41, '2021_07_17_102400_create_inventaris_table', 1),
(42, '2021_07_17_103340_add_foreign_field_to_inventaris', 1),
(43, '2021_07_17_104846_add_jenis_id_to_inventaris', 2),
(44, '2021_07_27_181306_create_log_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobile`
--

CREATE TABLE `mobile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobile`
--

INSERT INTO `mobile` (`id`, `nama`, `kode_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'isan', 'isan12', 1, '2021-07-17 12:45:44', '2021-07-27 23:33:03'),
(3, 'budi', 'budi', 0, '2021-07-17 12:45:44', '2021-07-26 11:11:18'),
(4, 'agus', 'agus', 0, '2021-07-17 12:45:44', '2021-07-17 21:09:16'),
(5, 'budi', 'budi12', 0, '2021-07-17 14:05:22', '2021-07-17 21:07:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `nip`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Bidang Tata Usaha Kanwil Aceh', 'A006', '081345652431', 'Bidang', '2021-07-26 09:29:20', '2021-07-27 06:32:32'),
(11, 'Bidang Survei dan Pemetaan Kanwil Aceh', 'A005', '081234565442', 'Bidang', '2021-07-26 09:34:28', '2021-07-27 06:32:08'),
(12, 'Bidang Penetapan Hak dan Pendaftaran Kanwil Aceh', 'A004', '081234565354', 'Bidang', '2021-07-26 09:35:36', '2021-07-27 06:31:46'),
(13, 'Bidang Penataan dan Pemberdayaan Kanwil Aceh', 'A003', '085234524352', 'Bidang', '2021-07-26 09:36:19', '2021-07-27 06:31:24'),
(14, 'Bidang Pengadaan Tanah dan Pengembangan Kanwil Aceh', 'A002', '081278765243', 'Bidang', '2021-07-26 09:37:03', '2021-07-27 06:30:52'),
(15, 'Bidang Pengendalian dan Penangganan Sengketa Kanwil Aceh', 'A001', '081370236562', 'Bidang', '2021-07-26 09:37:45', '2021-07-27 06:30:43'),
(16, 'M.Lisan Shidiqie', '12345678901', '081370115822', 'Kontrak', '2021-07-27 06:35:49', '2021-07-27 06:37:50'),
(17, 'Rendy Fahmi Roza', '23432413242', '081234543526', 'Pegawai', '2021-07-27 06:36:45', '2021-07-27 06:36:45'),
(18, 'Aswani Hambali', '3055017876', '08229382298', 'Pegawai', '2021-07-27 06:37:32', '2021-07-27 06:37:32'),
(21, 'Arief Rahman', '11239023954', '081370115876', 'Kontrak', '2021-07-27 07:17:43', '2021-07-27 07:17:43');

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
(1, 'isan', 'isan@gmail.com', NULL, 'qwerty123', NULL, '2021-07-06 17:00:00', '2021-06-30 17:00:00'),
(7, 'Admin', 'kanwilbpnaceh@gmail.com', NULL, '$2y$10$etmO1ERkrvRp93qAEq8V1e4cEw.p2SasEo1zEFdYh5tzKfr5nANfu', NULL, '2021-07-27 05:42:23', '2021-07-27 05:42:23'),
(19, 'kurnia', 'kurnia@gmail.com', NULL, '$2y$10$OFCPGBqPaKqmskiVx79oWeHic1gCvkOYYmBNVFK8OK4w3fatzVRSW', NULL, '2021-07-27 23:15:35', '2021-07-27 23:15:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaris_pengguna_id_foreign` (`pengguna_id`),
  ADD KEY `inventaris_jenis_id_foreign` (`jenis_id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `mobile`
--
ALTER TABLE `mobile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventaris_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
