-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 08:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Baju'),
(3, 'Celana'),
(4, 'Tas'),
(5, 'Baju Kemeja');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(200) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jumlah_barang` varchar(200) NOT NULL,
  `harga_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kategori_id`, `jumlah_barang`, `harga_barang`) VALUES
('001', 'anyone', 2, '92', '90000'),
('002', 'celana', 3, '44', '50000'),
('003', 'anyone', 2, '100', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembalian`
--

CREATE TABLE `tb_kembalian` (
  `id_kembalian` int(11) NOT NULL,
  `kode_transaksi_kembalian` varchar(100) NOT NULL,
  `bayar` varchar(200) NOT NULL,
  `kembalian` varchar(100) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kembalian`
--

INSERT INTO `tb_kembalian` (`id_kembalian`, `kode_transaksi_kembalian`, `bayar`, `kembalian`, `tanggal_transaksi`) VALUES
(1, 'T0001', '200000', '100000', '2021-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pasok` int(11) NOT NULL,
  `barang_pasok_id` varchar(200) NOT NULL,
  `jumlah_pasok` varchar(200) NOT NULL,
  `nama_pemasok` varchar(200) NOT NULL,
  `tanggal_pasok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasok`
--

INSERT INTO `tb_pasok` (`id_pasok`, `barang_pasok_id`, `jumlah_pasok`, `nama_pemasok`, `tanggal_pasok`) VALUES
(1, '002', '19', 'ud ubung', '2021-08-04'),
(2, '001', '90', 'ud ubung', '2021-08-04');

--
-- Triggers `tb_pasok`
--
DELIMITER $$
CREATE TRIGGER `tg_pasok` AFTER INSERT ON `tb_pasok` FOR EACH ROW BEGIN
UPDATE tb_barang
SET jumlah_barang = jumlah_barang + NEW.jumlah_pasok
WHERE
id_barang = NEW.barang_pasok_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sementara`
--

CREATE TABLE `tb_sementara` (
  `id_sementara` int(11) NOT NULL,
  `kode_transaksi` varchar(200) NOT NULL,
  `barang_id` varchar(200) NOT NULL,
  `jumlah_beli` varchar(200) NOT NULL,
  `total_harga` varchar(200) NOT NULL,
  `pengguna_id` varchar(200) NOT NULL,
  `tanggal_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(200) NOT NULL,
  `barang_id` varchar(200) NOT NULL,
  `jumlah_beli` varchar(200) NOT NULL,
  `total_harga` varchar(200) NOT NULL,
  `pengguna_id` varchar(200) NOT NULL,
  `tanggal_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_transaksi`, `barang_id`, `jumlah_beli`, `total_harga`, `pengguna_id`, `tanggal_beli`) VALUES
(1, 'T0001', '002', '2', '100000', '16', '2021-04-08');

--
-- Triggers `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `tg_transaksi` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
UPDATE tb_barang
SET jumlah_barang = jumlah_barang - NEW.jumlah_beli
WHERE
id_barang = NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('A','K') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'admin', 'admin@gmail.com', NULL, '$2y$10$oxgI7yiV0T85OTi9MKYljus5ApRi.MDGLI.PqmX8v.Om0IA8QZw3S', 'A', NULL, '2020-03-26 06:10:07', '2020-03-26 06:10:22'),
(17, 'ilham', 'ilham@gmail.com', NULL, '$2y$10$raO1c/9ESNP6wqNGU8DjwOnsO/Goie3H1.cVifk0LGxe6xdvvKwYG', 'K', NULL, NULL, NULL),
(18, 'hardin', 'hardin@gmail.com', NULL, '$2y$10$dIjJI5B3go5uyhPeA.g/COmZRdViHNP7drk0vFmQ2QTFTNa5lTDRm', 'K', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kembalian`
--
ALTER TABLE `tb_kembalian`
  ADD PRIMARY KEY (`id_kembalian`);

--
-- Indexes for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pasok`);

--
-- Indexes for table `tb_sementara`
--
ALTER TABLE `tb_sementara`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kembalian`
--
ALTER TABLE `tb_kembalian`
  MODIFY `id_kembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sementara`
--
ALTER TABLE `tb_sementara`
  MODIFY `id_sementara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
