-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2025 pada 14.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxvolum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bahans`
--

CREATE TABLE `jenis_bahans` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `spesifikasi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_bahans`
--

INSERT INTO `jenis_bahans` (`id`, `nama_bahan`, `gambar`, `spesifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Terpal Truk', '1751494685_WhatsApp Image 2025-05-30 at 20.47.33_5ce37e66.jpg', 'adadaw\r\ndawdw\r\ndawdawdw\r\ndaw', '2025-07-02 22:18:05', '2025-07-02 22:18:05'),
(2, 'Polyster', '1751494732_WhatsApp Image 2025-05-30 at 00.07.49_ec8c5fee.jpg', 'awdawdawd\r\nawdaw\r\ndaw\r\ndaw\r\ndawd\r\nawd\r\naw', '2025-07-02 22:18:52', '2025-07-02 22:18:52'),
(3, 'Karton', '1751494810_WhatsApp Image 2025-05-30 at 19.30.57_36637226.jpg', 'awdaw\r\ndwa\r\ndaw\r\ndaw\r\ndawdwa\r\nd\r\nwd\r\nawd\r\na', '2025-07-02 22:20:10', '2025-07-02 22:20:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tas`
--

CREATE TABLE `jenis_tas` (
  `id` int(11) NOT NULL,
  `ukuran_tas` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_tas`
--

INSERT INTO `jenis_tas` (`id`, `ukuran_tas`, `gambar`, `spesifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Sedang', '1751457672_Frame 1 (2).png', 'Ukuran\r\nSedang', '2025-07-02 12:01:13', '2025-07-02 12:01:13'),
(2, 'Besar', '1751457721_Frame 1.png', 'Ukuran\r\nBesar', '2025-07-02 12:02:01', '2025-07-02 12:02:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `no_pesanan` int(255) NOT NULL,
  `jenis_tas` varchar(255) NOT NULL,
  `bahan_luar` varchar(255) NOT NULL,
  `bahan_tengah` varchar(255) NOT NULL,
  `bahan_dalam` varchar(255) NOT NULL,
  `ukuran_tas_khusus` varchar(255) NOT NULL,
  `warna_bahan` varchar(255) NOT NULL,
  `list_tas` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('Menunggu','Menunggu Pembayaran','Diproses','Selesai') NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `subtotal` int(255) DEFAULT NULL,
  `pengiriman` varchar(255) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `users_id`, `no_pesanan`, `jenis_tas`, `bahan_luar`, `bahan_tengah`, `bahan_dalam`, `ukuran_tas_khusus`, `warna_bahan`, `list_tas`, `catatan`, `status`, `tanggal_pesan`, `subtotal`, `pengiriman`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 'Super', 'Kain polyester D anti air', 'Spon khusus', 'Terpal swallow biru', 'Panjang Tas: 10cm, Lebar Tas: 12cm, Tinggi Tas: 13cm, Lebar Jok Motor: 9cm', 'Hitam', 'Biru', 'tidak ada', 'Menunggu Pembayaran', '2025-07-02', 12000000, 'JNE', '', '2025-07-02 12:10:20', '2025-07-03 12:47:59'),
(2, 2, 202507042, 'Besar', 'Terpal swallow biru', 'Spon khusus', 'Terpal truk anti air warna hijau', 'Panjang Tas: 10cm, Lebar Tas: 11cm, Tinggi Tas: 12cm, Lebar Jok Motor: 13cm', 'Hitam', 'Biru', 'tidak ada', 'Diproses', '2025-07-04', 15000000, 'Ambil Ditempat', '1751621552_WhatsApp Image 2025-05-30 at 00.07.49_ec8c5fee.jpg', '2025-07-04 08:39:32', '2025-07-04 09:32:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pelanggan') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `no_tlp`, `password`, `role`, `remember_token`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$JpqvDwHjdxL3zPv6RjwPDO3wdzcI.iabHxQR7jW9QqSNqYM5yDTGa', 'admin', NULL, NULL, '2025-07-02 11:54:01', '2025-07-02 11:54:01'),
(2, 'iksan', 'iksan@gmail.com', NULL, NULL, '$2y$10$WDVxNIoz5gviujVM0aiKHOgGyfv1il1BB8EySL5HSzxK3ycf8KUuu', 'pelanggan', NULL, 'adawdawawawdwdwadawdawdawdawadwadwadawdawdwa awdawdaw aw daw aw awd', '2025-07-02 12:04:07', '2025-07-02 22:54:37');

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
-- Indeks untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_tas`
--
ALTER TABLE `jenis_tas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
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
-- AUTO_INCREMENT untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_tas`
--
ALTER TABLE `jenis_tas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
