-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2025 pada 11.48
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaristoko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namabarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `namabarang`, `stok`, `harga`, `supplier`, `poster`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 'Laptop Acer Aspire 5', 34, '5000000.00', 'PT Acer Indonesia', 'poster/1766831600.acer.jpg', 'Laptop untuk kebutuhan kerja, kuliah, dan multitasking harian', '2025-12-15 07:52:47', '2025-12-27 03:33:20'),
(8, 'Headphone Sony WH-1000XM4', 15, '3000000.00', 'AudioGear Inc.', 'poster/1766831589.images.jpg', 'Headphone wireless dengan fitur active noise cancelling', '2025-12-15 07:53:32', '2025-12-27 03:33:09'),
(9, 'Smartphone Samsung Galaxy A54', 25, '5000000.00', 'MobileWorld Ltd.', 'poster/1766831579.images (1).jpg', 'Smartphone kelas menengah dengan kamera dan layar AMOLED', '2025-12-15 07:55:11', '2025-12-27 03:32:59'),
(10, 'Keyboard Mechanical Keychron K2', 25, '150000.00', 'Keychron Indonesia', 'poster/1766831565.images (2).jpg', 'Keyboard mechanical wireless dengan switch hot-swappable', '2025-12-15 07:56:15', '2025-12-27 03:32:45'),
(11, 'Monitor LG UltraWide 29WL500 Edit', 0, '4500000.00', 'LG Electronics', 'poster/1766831555.images (3).jpg', 'Monitor ultrawide untuk multitasking dan desain grafis', '2025-12-15 07:57:42', '2025-12-27 03:32:35');

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
(1, '2025_11_18_165535_create_barang_table', 1),
(2, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(7, 'Kevin Admin', 'kevinprasetyo976@gmail.com', '$2y$10$w.dj1Vs/RRSGhBj7dcHLuOWoKvqEIqp3/as82bnRIvyhKBOLNF1VW', 'foto/1765810741.IMG-20250511-WA0269.jpg', '2025-12-15 07:59:01', '2025-12-19 10:35:11'),
(12, 'Admin 2', 'admin@toko.com', '$2y$10$wqOFEl3fmwom/gwRCtVk2eL9/J0BXI8V9AZZFQngM/2kPnT01QZue', NULL, '2025-12-27 03:34:07', '2025-12-27 03:34:07'),
(13, 'Admin 3', 'kevin@gmail.com', '$2y$10$TifQen58JmXXCnzScC6KIey1dSOzBVL0oCq1g2ST9iJA3CQsodFNO', NULL, '2025-12-27 03:38:01', '2025-12-27 03:38:01'),
(14, 'Admin 4', 'admin4@toko.com', '$2y$10$ZpBtprUuOyzp/coBEHGjv.AE..76IfW.EwE0eVudZLWN./8FLir26', 'foto/1766832366.20240715_075457.jpg', '2025-12-27 03:46:07', '2025-12-27 03:46:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
