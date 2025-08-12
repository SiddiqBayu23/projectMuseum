-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2025 at 04:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `BannerId` int(11) NOT NULL,
  `BannerCreate` varchar(255) DEFAULT NULL,
  `BannerLabel` varchar(100) DEFAULT NULL,
  `BannerFoto` varchar(255) DEFAULT NULL,
  `BannerUraian` longtext DEFAULT NULL,
  `BannerVisiMisi` varchar(255) DEFAULT NULL,
  `Bannerstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `FooterId` int(11) NOT NULL,
  `FooterCreate` varchar(255) DEFAULT NULL,
  `FooterKolom` varchar(255) DEFAULT NULL,
  `FooterIsi` longtext DEFAULT NULL,
  `FooterFoto` varchar(255) DEFAULT NULL,
  `Footerstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KategoriId` int(11) NOT NULL,
  `KategoriCreate` varchar(255) DEFAULT NULL,
  `KategoriFoto` varchar(255) DEFAULT NULL,
  `KategoriLabel` varchar(100) DEFAULT NULL,
  `Kategoristatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `KegiatanId` int(11) NOT NULL,
  `KegiatanCreate` varchar(255) DEFAULT NULL,
  `KegiatanJudulKegiatan` varchar(255) DEFAULT NULL,
  `KegiatanSubJudul` varchar(255) DEFAULT NULL,
  `KegiatanUraian` longtext DEFAULT NULL,
  `KegiatanFoto` varchar(255) DEFAULT NULL,
  `KegiatanKategori` varchar(255) DEFAULT NULL,
  `Kegiatanstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `KoleksiId` int(11) NOT NULL,
  `KoleksiCreate` varchar(255) DEFAULT NULL,
  `KoleksiKodeKoleksi` varchar(255) DEFAULT NULL,
  `KoleksiNama` varchar(255) DEFAULT NULL,
  `KoleksiKategoriKoleksi` varchar(255) DEFAULT NULL,
  `KoleksiAsalUsul` varchar(255) DEFAULT NULL,
  `KoleksiTahunPembuatan` varchar(255) DEFAULT NULL,
  `KoleksiKondisi` varchar(255) DEFAULT NULL,
  `KoleksiLokasiPenyimpanan` varchar(255) DEFAULT NULL,
  `KoleksiKeterangan` varchar(255) DEFAULT NULL,
  `KoleksiFoto` varchar(255) DEFAULT NULL,
  `KoleksiStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `KunjunganId` int(11) NOT NULL,
  `KunjunganCreate` varchar(255) DEFAULT NULL,
  `KunjunganWaktuKunjungan` varchar(255) DEFAULT NULL,
  `KunjunganInstansi` varchar(255) DEFAULT NULL,
  `KunjunganNamaLengkap` varchar(255) DEFAULT NULL,
  `KunjunganHP` varchar(25) DEFAULT NULL,
  `KunjunganKeperluan` varchar(255) DEFAULT NULL,
  `KunjunganLainnya` varchar(255) DEFAULT NULL,
  `KunjunganJumlah` int(11) DEFAULT NULL,
  `KunjunganKomentar` varchar(255) DEFAULT NULL,
  `KunjunganStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `LogoId` int(11) NOT NULL,
  `LogoCreate` varchar(255) DEFAULT NULL,
  `LogoIcon` varchar(255) DEFAULT NULL,
  `LogoNamaWeb` varchar(255) DEFAULT NULL,
  `Logostatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuId` int(11) NOT NULL,
  `MenuCreate` varchar(255) DEFAULT NULL,
  `MenuLabel` varchar(100) DEFAULT NULL,
  `MenuLink` varchar(255) DEFAULT NULL,
  `Menustatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_01_125221_add_role_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `PengunjungId` int(11) NOT NULL,
  `PengunjungCreate` varchar(255) DEFAULT NULL,
  `PengunjungBulan` varchar(255) DEFAULT NULL,
  `PengunjungKunjungan` varchar(255) DEFAULT NULL,
  `PengunjungPemanduan` varchar(255) DEFAULT NULL,
  `PengunjungEvent` varchar(255) DEFAULT NULL,
  `Pengunjungstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prosedur`
--

CREATE TABLE `prosedur` (
  `ProsedurId` int(11) NOT NULL,
  `ProsedurCreate` varchar(255) DEFAULT NULL,
  `ProsedurKolom` varchar(255) DEFAULT NULL,
  `ProsedurFoto` varchar(255) DEFAULT NULL,
  `ProsedurUraian` longtext DEFAULT NULL,
  `Prosedurstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `PublikasiId` int(11) NOT NULL,
  `PublikasiCreate` varchar(255) DEFAULT NULL,
  `PublikasiKategori` varchar(255) DEFAULT NULL,
  `PublikasiJudul` varchar(255) DEFAULT NULL,
  `PublikasiIsi` longtext DEFAULT NULL,
  `PublikasiPenulis` varchar(255) DEFAULT NULL,
  `PublikasiFoto` varchar(255) DEFAULT NULL,
  `PublikasiStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `RuangId` int(11) NOT NULL,
  `RuangCreate` varchar(255) DEFAULT NULL,
  `RuangNamaRuang` varchar(255) DEFAULT NULL,
  `RuangUraian` text DEFAULT NULL,
  `RuangFoto` varchar(255) DEFAULT NULL,
  `Ruangstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `SlideId` int(11) NOT NULL,
  `SlideCreate` varchar(255) DEFAULT NULL,
  `SlideFoto` varchar(255) DEFAULT NULL,
  `SlideJudul` varchar(255) DEFAULT NULL,
  `SlideSubTitle` varchar(255) DEFAULT NULL,
  `Slidestatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `SosmedId` int(11) NOT NULL,
  `SosmedCreate` varchar(255) DEFAULT NULL,
  `SosmedLabel` varchar(100) DEFAULT NULL,
  `SosmedLink` varchar(255) DEFAULT NULL,
  `SosmedLevel` varchar(255) DEFAULT NULL,
  `Sosmedstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `TentangId` int(11) NOT NULL,
  `TentangCreate` varchar(255) DEFAULT NULL,
  `TentangLabel` varchar(100) DEFAULT NULL,
  `TentangIsi` longtext DEFAULT NULL,
  `TentangFoto` varchar(255) DEFAULT NULL,
  `Tentangstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'IMANIAR DEFEND MARDOTILAH', 'mardotilahimaniar@gmail.com', NULL, '$2y$10$IY9Z7B9AEktGDvH1/s3W6uXvVaFFBDpZqzsnFVKrN0gxloWT0k8Jm', NULL, '2025-07-31 06:53:10', '2025-07-31 06:53:10', 'user'),
(11, 'ardi', 'ardi@gmail.com', NULL, '$2y$10$NqaP1rHj7UvK63qFrF5yfuqYPcDhL6qwECkSKJ4x6jLxmjThEzASG', NULL, '2025-08-11 05:47:09', '2025-08-11 05:47:09', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `VisitorId` int(11) NOT NULL,
  `VisitorCreate` varchar(255) DEFAULT NULL,
  `VisitorDeskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BannerId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`FooterId`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KategoriId`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`KegiatanId`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`KoleksiId`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`KunjunganId`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`LogoId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`PengunjungId`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prosedur`
--
ALTER TABLE `prosedur`
  ADD PRIMARY KEY (`ProsedurId`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`PublikasiId`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`RuangId`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`SlideId`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`SosmedId`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`TentangId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`VisitorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `BannerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `FooterId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KategoriId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `KegiatanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `KoleksiId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `KunjunganId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `LogoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `PengunjungId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prosedur`
--
ALTER TABLE `prosedur`
  MODIFY `ProsedurId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `PublikasiId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `RuangId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `SlideId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `SosmedId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `TentangId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `VisitorId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
