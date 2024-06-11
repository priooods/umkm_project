-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table project_umkm.m_category_tabs: ~8 rows (approximately)
DELETE FROM `m_category_tabs`;
INSERT INTO `m_category_tabs` (`id`, `title`) VALUES
	(1, 'Makanan & Minuman'),
	(2, 'Kerajinan Tangan'),
	(3, 'Kesehatan'),
	(4, 'Produk Rumah Tangga'),
	(5, 'Kosmetik'),
	(6, 'Produk Keramik'),
	(7, 'Produk Pertanian'),
	(8, 'Alat Musik');

-- Dumping data for table project_umkm.users_tabs: ~1 rows (approximately)
DELETE FROM `users_tabs`;
INSERT INTO `users_tabs` (`id`, `email`, `name`, `password`, `brand`, `address`, `phone`, `m_category_tabs_id`, `rating`) VALUES
	(2, 'email@gmail.com', 'testing fullname', '$2y$10$pnoxziidcJkgdtHfZFwnlutGchp/a.sv/mbTFPR73uJcyWUF/plfi', 'angeline', 'serang', '12244322443', 1, 3),
	(3, 'harbimartin@gmail.com', 'sdfsdfsdf', '$2y$10$TqGE2KpEC0lIWVR7i/uGO.PA5rKLC4.PZs/5LgNp37FtAvCtKy56K', 'Warung Mak Nyak', 'dsfsdfsdf', '084738943746', 7, 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
