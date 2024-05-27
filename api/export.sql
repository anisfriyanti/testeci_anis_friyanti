-- Adminer 4.8.1 MySQL 8.0.35-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id_dept` int NOT NULL AUTO_INCREMENT,
  `nama_dept` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `departments` (`id_dept`, `nama_dept`, `created_at`, `updated_at`) VALUES
(1,	'Keuangan',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Teknologi Informasi',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'SDM',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'Pemasaran',	'2024-05-27 04:05:19',	'2024-05-27 04:05:19');

DROP TABLE IF EXISTS `jabatans`;
CREATE TABLE `jabatans` (
  `id_jabatan` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  `id_level` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `jabatans` (`id_jabatan`, `nama_jabatan`, `id_level`, `updated_at`, `created_at`) VALUES
(1,	'Vice President of HR',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Supervisor',	2,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Project Manager ',	3,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'Senior EX',	2,	'2024-05-27 05:16:01',	'2024-05-27 05:16:01'),
(6,	'Leader HR',	2,	'2024-05-27 05:16:54',	'2024-05-27 05:16:54'),
(8,	'Senior IT',	3,	'2024-05-27 05:55:59',	'2024-05-27 05:25:09');

DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE `karyawans` (
  `id_karyawan` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `id_jabatan` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `karyawans` (`id_karyawan`, `nik`, `nama`, `ttl`, `alamat`, `id_jabatan`, `updated_at`, `created_at`) VALUES
(1,	'23433434',	'Anisa Fatma',	'1996-09-29',	'lamongan',	3,	'2024-05-26 11:47:05',	'0000-00-00 00:00:00'),
(2,	'563727383',	'Bambang',	'2024-05-26',	'Parungpanjang, BOgor',	2,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'6345242623',	'Fitria Nur',	'2024-05-26',	'Kalitengah, Lamongan',	3,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'234545',	'INdah Dwi',	'1996-09-20',	'lamongan',	1,	'2024-05-26 11:25:24',	'2024-05-26 11:25:24'),
(10,	'435433434',	'anisa f',	'2024-05-09',	'dsds',	2,	'2024-05-27 06:57:47',	'2024-05-27 06:36:43');

DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `levels` (`id_level`, `nama_level`, `created_at`, `updated_at`) VALUES
(1,	'Eksekutif',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Middle management',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Lower management',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'Test1',	'2024-05-27 01:19:55',	'2024-05-27 01:19:55'),
(6,	'Test 2 to 4',	'2024-05-27 01:28:54',	'2024-05-27 03:14:13'),
(7,	'Test3',	'2024-05-27 01:30:40',	'2024-05-27 01:30:40'),
(8,	'Pagi',	'2024-05-27 01:32:24',	'2024-05-27 01:32:24');

-- 2024-05-27 17:43:13
