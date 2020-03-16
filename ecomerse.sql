-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk ecomerse
CREATE DATABASE IF NOT EXISTS `ecomerse` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecomerse`;

-- membuang struktur untuk table ecomerse.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.barang: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `stok`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'celana panjang pensil putih', 150000, 24, 'celanaputih.png', 'celana modis', NULL, '2020-03-16 06:37:10'),
	(2, 'celana panjang pensil biru', 100000, 30, 'celanabiru.png', 'celana santai', NULL, '2020-03-09 09:20:42'),
	(3, 'celana panjang pensil hitam', 200000, 25, 'celanahitam.png', 'celana best seller', NULL, '2020-03-16 03:01:59'),
	(4, 'celana cinos putih', 180000, 28, 'celana cinos putih.png', 'celana lentur', NULL, '2020-03-16 04:35:47'),
	(5, 'celana leging putih', 200000, 27, 'celana leging putih.png', 'celana strech modis', NULL, '2020-03-14 07:45:40'),
	(6, 'celana cinos biru', 150000, 28, 'celana cinos biru.png', 'celana bahan lentur dan nyaman', NULL, '2020-03-14 08:17:28'),
	(7, 'kemeja hitam', 150000, 29, 'kemeja hitam.jpg', 'kemeja lentur nyaman dipakai', NULL, '2020-03-16 05:15:10'),
	(8, 'kemeja cokelat bahan', 250000, 21, 'kmeja cokelat.jpg', 'kemeja kerja nyaman dan cerah', NULL, '2020-03-16 05:15:10'),
	(9, 'kemeja putih cerah', 200000, 29, 'kmeja putih.jpg', 'kemeja cerah dan slim', NULL, '2020-03-16 05:15:10');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- membuang struktur untuk table ecomerse.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.migrations: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2020_03_05_050330_create_barang_table', 1),
	(5, '2020_03_05_052559_create_pesanan_detail_table', 1),
	(7, '2020_03_05_051225_create_pesanan_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table ecomerse.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table ecomerse.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.pesanan: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` (`id`, `user_id`, `tanggal`, `status`, `kode`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
	(1, 4, '2020-03-16', '1', 642, 510000, '2020-03-16 03:36:54', '2020-03-16 04:35:47'),
	(2, 4, '2020-03-16', '1', 923, 1100000, '2020-03-16 05:14:15', '2020-03-16 05:15:09'),
	(3, 4, '2020-03-16', '1', 797, 600000, '2020-03-16 06:20:35', '2020-03-16 06:20:42'),
	(4, 4, '2020-03-16', '1', 186, 150000, '2020-03-16 06:28:17', '2020-03-16 06:37:09');
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;

-- membuang struktur untuk table ecomerse.pesanan_detail
CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.pesanan_detail: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `pesanan_detail` DISABLE KEYS */;
INSERT INTO `pesanan_detail` (`id`, `barang_id`, `pesanan_id`, `jumlah`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
	(39, 1, 1, 1, 150000, '2020-03-16 03:36:54', '2020-03-16 03:36:54'),
	(40, 4, 1, 2, 360000, '2020-03-16 04:35:38', '2020-03-16 04:35:38'),
	(41, 7, 2, 1, 150000, '2020-03-16 05:14:15', '2020-03-16 05:14:15'),
	(42, 8, 2, 3, 750000, '2020-03-16 05:14:30', '2020-03-16 05:14:30'),
	(43, 9, 2, 1, 200000, '2020-03-16 05:14:55', '2020-03-16 05:14:55'),
	(44, 1, 3, 4, 600000, '2020-03-16 06:20:35', '2020-03-16 06:20:35'),
	(45, 1, 4, 1, 150000, '2020-03-16 06:28:17', '2020-03-16 06:28:17');
/*!40000 ALTER TABLE `pesanan_detail` ENABLE KEYS */;

-- membuang struktur untuk table ecomerse.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel ecomerse.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'luis nani', 'nani17@gmail.com', NULL, '$2y$10$mIUGl6spq3U1ENkDFHtb/uFSPBJ8YD5HLwl6qyhmhdh8W1TTedMzm', NULL, NULL, NULL, '2020-03-16 02:32:12', '2020-03-16 02:32:12'),
	(5, 'neymar', 'njr10@gmail.com', NULL, '$2y$10$U2KhO95NsQdxwojea/bJrun1fujBViJjq57izi6vWf7jgODcRa7/G', NULL, NULL, NULL, '2020-03-16 06:41:04', '2020-03-16 06:41:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
