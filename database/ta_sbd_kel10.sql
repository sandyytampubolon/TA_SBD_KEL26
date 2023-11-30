-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_sbd_kel10`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `merks`
--

CREATE TABLE `merks` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merks`
--

INSERT INTO `merks` (`id_merk`, `nama_merk`, `country`) VALUES
(1, 'Samsung', 'South Korea'),
(2, 'Apple', 'US'),
(3, 'Huawei', 'China'),
(4, 'Vivo', 'China'),
(5, 'Oppo', 'China');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_11_28_112616_add_deleted_at_to_nama_tabel', 2),
(6, '2023_11_28_113044_add_deleted_at_to_produks_table', 3),
(7, '2023_11_28_113849_add_deleted_at_to_produks_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `loyalty_rank` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `loyalty_rank`) VALUES
(1, 'Ratna', 'Ahmad Street', 'A'),
(2, 'Agoy Yogas', 'Budi Street', 'C'),
(3, 'Yuda Aduy', 'Aminah Street 5', 'B'),
(4, 'Donito', 'John Street', 'C'),
(5, 'Sutan', 'Sutan Street', 'S'),
(6, 'Sultan', 'Sultan Street', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_item` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `fk_id_merk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_item`, `nama_barang`, `harga_barang`, `fk_id_merk`) VALUES
(1, 'A51 second', 5000000, 1),
(2, 'A533', 50000000, 1),
(3, 'Iphone11', 100000, 1),
(4, 'P30 Pro', 100000, 3),
(5, 'Oppo A53', 200000, 5),
(6, 'Vivo V60', 200000, 4),
(7, 'A50s', 100000, 1),
(8, 'Ipad 6 Pro', 200000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tbs`
--

CREATE TABLE `transaksi_tbs` (
  `id_transaction` int(11) NOT NULL,
  `fk_id_pelanggan` int(11) DEFAULT NULL,
  `fk_id_item` int(11) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `item_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_tbs`
--

INSERT INTO `transaksi_tbs` (`id_transaction`, `fk_id_pelanggan`, `fk_id_item`, `transaction_date`, `item_amount`) VALUES
(1, 4, 3, '2023-11-17', 2),
(2, 1, 4, '2023-11-17', 1),
(3, 2, 1, '2023-11-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ratna', 'ratna@gmail.com', NULL, '$2y$10$qojhzpMw2AIqpuNcb8jHJuGQwsLmMXuR.dm05KfDi/py3p8JXLU2y', NULL, '2023-11-28 05:48:52', '2023-11-28 05:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id_merk`);

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
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_id_merk` (`fk_id_merk`);

--
-- Indexes for table `transaksi_tbs`
--
ALTER TABLE `transaksi_tbs`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_id_pelanggan` (`fk_id_pelanggan`),
  ADD KEY `fk_id_item` (`fk_id_item`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `fk_id_merk` FOREIGN KEY (`fk_id_merk`) REFERENCES `merks` (`id_merk`);

--
-- Constraints for table `transaksi_tbs`
--
ALTER TABLE `transaksi_tbs`
  ADD CONSTRAINT `transaksi_tbs_ibfk_1` FOREIGN KEY (`fk_id_pelanggan`) REFERENCES `pelanggans` (`id_pelanggan`),
  ADD CONSTRAINT `transaksi_tbs_ibfk_2` FOREIGN KEY (`fk_id_item`) REFERENCES `produks` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
