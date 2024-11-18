-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table taskui.cache: ~0 rows (approximately)

-- Dumping data for table taskui.cache_locks: ~0 rows (approximately)

-- Dumping data for table taskui.failed_jobs: ~0 rows (approximately)

-- Dumping data for table taskui.jobs: ~0 rows (approximately)

-- Dumping data for table taskui.job_batches: ~0 rows (approximately)

-- Dumping data for table taskui.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(21, '2024_11_10_145545_drop_trashes_table', 6),
	(43, '0001_01_01_000000_create_users_table', 7),
	(44, '0001_01_01_000001_create_cache_table', 7),
	(45, '0001_01_01_000002_create_jobs_table', 7),
	(46, '2024_11_09_152229_create_tasks_table', 7),
	(47, '2024_11_10_142757_add_deleted_at_to_tasks_table', 7),
	(48, '2024_11_10_151617_create_trash_table', 7);

-- Dumping data for table taskui.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table taskui.sessions: ~0 rows (approximately)

-- Dumping data for table taskui.tasks: ~1 rows (approximately)
INSERT INTO `tasks` (`id`, `taskname`, `description`, `is_completed`, `is_favorite`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'Simple todo', 'Sample text description', 0, 1, 1, '2024-11-14 19:59:21', '2024-11-14 20:14:35', '2024-11-14 20:14:35'),
	(5, 'Simple todo', 'Sample text Description', 0, 1, 1, '2024-11-14 21:01:01', '2024-11-14 21:27:51', NULL);

-- Dumping data for table taskui.trash: ~1 rows (approximately)
INSERT INTO `trash` (`id`, `task_id`, `taskname`, `description`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(14, 4, 'Simple todo', 'Sample text description', 1, NULL, '2024-11-14 20:14:35', '2024-11-14 20:14:35');

-- Dumping data for table taskui.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Panzer', 'panzerweb@gmail.com', NULL, '$2y$12$bdMVtuufbRfskaz.j6NAmOigTYwGtDLkjCQM9WYCgMBJ4mFS9diBW', NULL, '2024-11-14 19:45:44', '2024-11-14 19:45:44');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
