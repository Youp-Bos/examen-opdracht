-- -------------------------------------------------------------
-- TablePlus 4.5.0(396)
--
-- https://tableplus.com/
--
-- Database: examen
-- Generation Time: 2022-01-21 16:53:49.1900
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `bestellings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `resevering_id` int(10) unsigned NOT NULL,
  `menuitem_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuitem_catagory` int(11) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `prijs_menuitem` double(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bestellings_resevering_id_foreign` (`resevering_id`),
  KEY `bestellings_menuitem_code_foreign` (`menuitem_code`),
  CONSTRAINT `bestellings_menuitem_code_foreign` FOREIGN KEY (`menuitem_code`) REFERENCES `menus` (`code`) ON DELETE CASCADE,
  CONSTRAINT `bestellings_resevering_id_foreign` FOREIGN KEY (`resevering_id`) REFERENCES `reseverings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naam` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemcatagory` int(11) NOT NULL,
  `prijs` double(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reseverings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `tafel` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoonnummer` bigint(20) NOT NULL,
  `aantal` int(11) NOT NULL,
  `allergien` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opmerkingen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reseverings_tafel_unique` (`tafel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bestellings` (`id`, `resevering_id`, `menuitem_code`, `menuitem_catagory`, `hoeveelheid`, `prijs_menuitem`) VALUES
(1, 1, 'HTJ', 572001, 2, 2.35),
(2, 1, 'NFS', 572001, 5, 2.35),
(3, 1, 'HTJ', 572001, 8, 2.35),
(4, 1, 'HTJ', 572001, 3, 2.35);

INSERT INTO `menus` (`id`, `code`, `naam`, `itemcatagory`, `prijs`) VALUES
(1, 'HTJ', 'Hertoch jan 4.5%', 70003, 2.35),
(2, 'NFS', 'steak', 90004, 8.21),
(3, 'FNW', 'Water', 70005, 1.12),
(4, 'FRA', 'Aardappel pure', 572001, 2.35),
(5, 'YZX', 'salade', 572001, 2.67);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_16_082646_create_bestellings_table', 1);

INSERT INTO `reseverings` (`id`, `datum`, `tijd`, `tafel`, `naam`, `telefoonnummer`, `aantal`, `allergien`, `opmerkingen`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-03-04', '16:00:00', 18, 'youp bos', 612345679, 3, 'geen allergien', 'ik vind alles best maar zo lang wij niet naast de wc zitten!', 0, '2021-12-16 16:13:31', '2021-12-16 16:13:31'),
(2, '2021-12-16', '12:00:00', 6, 'dave van den huizen', 612345679, 9, 'geen allergien', 'ik vind alles best maar zo lang wij niet naast de wc zitten!', 0, '2021-12-16 16:37:52', '2021-12-16 16:37:52'),
(3, '2022-03-04', '15:00:00', 9, 'harry potter', 623456789, 8, 'er zijn 2 mensen alergies voor banaan', 'ik vind alles best maar zo lang wij niet naast de wc zitten!', 0, '2021-12-16 16:38:31', '2021-12-16 16:38:31');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'youp', 'youp.bos@student.rocva.nl', NULL, '$2y$10$R5fchsHRxQPy3sQyDdstfunbfW1MbiITrqTVo4oJJGRgPRcRK7392', NULL, '2021-12-16 16:11:53', '2021-12-16 16:11:53');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;