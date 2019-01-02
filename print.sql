-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for print
CREATE DATABASE IF NOT EXISTS `print` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `print`;

-- Dumping structure for table print.merchants
CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table print.merchants: ~2 rows (approximately)
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
REPLACE INTO `merchants` (`id`, `nama`, `tlp`, `alamat`, `deskripsi`, `created_at`, `updated_at`, `user_id`) VALUES
	(2, 'mercabuana', '081111', 'pandan', 'terima pemesanan online percetakan dalam bentuk cetakan ataupun lembaran', NULL, NULL, 5),
	(3, 'Toko Mulia', '08777777', 'jl pandansari', 'mantap banget', NULL, NULL, 6);
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;

-- Dumping structure for table print.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table print.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2014_10_12_000000_create_users_table', 1),
	(5, '2014_10_12_100000_create_password_resets_table', 1),
	(6, '2018_12_26_072529_create_merchants_table', 1),
	(8, '2018_12_27_144012_create_orders_table', 2),
	(9, '2019_01_02_140420_alter_table_merchant', 3),
	(10, '2019_01_02_143912_alter_table_order', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table print.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `marchant_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table print.orders: ~5 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
REPLACE INTO `orders` (`id`, `name`, `doc`, `user_id`, `marchant_id`, `status`, `created_at`, `updated_at`, `qty`, `description`) VALUES
	(8, 'tugas 1', 'http://print.test/file/5c2ccf8337599Perancangan_Aplikasi_Marketplace_Jasa_Percetakan_B.pdf', 1, 2, 2, '2019-01-02 14:49:39', '2019-01-02 19:57:08', '2', 'halaman 100 coppy 1'),
	(9, 'tugas bahagia', 'http://print.test/file/5c2cd1b845622Perancangan_Aplikasi_Marketplace_Jasa_Percetakan_B.pdf', 1, 3, 2, '2019-01-02 14:59:04', '2019-01-02 16:04:32', '1', 'printkan halaman 3'),
	(10, 'tugas arifin', 'http://print.test/file/5c2d0d5994f0dPerancangan_Aplikasi_Marketplace_Jasa_Percetakan_B.pdf', 7, 2, 1, '2019-01-02 19:13:29', '2019-01-02 20:02:04', '2', 'ini tugas arifin'),
	(11, 'tugas arifin 1', 'http://print.test/file/5c2d0dc6c0349Perancangan_Aplikasi_Marketplace_Jasa_Percetakan_B.pdf', 7, 2, 2, '2019-01-02 19:15:18', '2019-01-02 20:02:07', '2', 'ini tugas arifin'),
	(12, 'tugas arifin 2', 'http://print.test/file/5c2d0df6caaffPerancangan_Aplikasi_Marketplace_Jasa_Percetakan_B.pdf', 7, 2, 3, '2019-01-02 19:16:06', '2019-01-02 20:02:10', '2', 'ini tugas arifin');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table print.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table print.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table print.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table print.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', '$2y$10$7caBeZRy8EEFAuWMdbszYOOgecqHVqn8mo0zk6SCR2LXDRUwTRdlm', 0, 'Ah5mY0WC6Jy8gut6VuRYE3I1ARuVNch3Pz9UH2vEjVRs9NbeWUqTliM3egbG', NULL, NULL),
	(5, 'Merchabuana', 'user@user.com', '$2y$10$A0IpAMd8Kh8oxgz8pwWRMORYl/Z017K5tLXqhL7t5.XsAEoc98poy', 1, 'TgTo0XAuGHTobfZ33mXJeJDgsbzq77lADvMjcOSucgkUpf1uw6wjP6QxKnBG', '2019-01-01 20:38:14', '2019-01-02 14:50:58'),
	(6, 'Toko Mulia', 'mulia@gmail.com', '$2y$10$MzNj3Ic77axkwDj.NOlG6u.aZp6l0HcaVG0WkwH13nSgjzdCp6xP2', 1, 'fQJxF37IsMKIiAMF9teuekUD5oUa48cc5CvjWi4DjE9R12zLRWqMQfoB8spi', '2019-01-02 14:29:39', '2019-01-02 14:29:39'),
	(7, 'Misbahul Arifin', 'misbahularifin14@gmail.com', '$2y$10$p0pFt.rsiGtmjRRYGo47Wu8WDPG4U6hUShlh60mMWGldZUBK2/maa', 2, '2pDWsduQDCtEorDN2k0ji0EziqJIh7vRuoVQbOpIOXzwRgoQBKZn2pKnqJ6u', '2019-01-02 16:40:06', '2019-01-02 16:40:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
