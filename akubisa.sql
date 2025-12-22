-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 10.58
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akubisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_code` varchar(255) NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_code`, `cart_id`, `user_id`, `service_id`, `date`, `time_slot_id`, `start_time`, `end_time`, `location_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'APP-1', 2, 19, 2, '2024-05-22', 9, '17:00:00', '18:00:00', 1, 3000.00, 0, '2024-05-22 06:39:30', '2024-05-22 06:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `is_abandoned` tinyint(1) NOT NULL DEFAULT 0,
  `total` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `uuid`, `user_id`, `is_paid`, `is_cancelled`, `is_abandoned`, `total`, `created_at`, `updated_at`) VALUES
(1, '1e3a02bb-24d7-4edc-a37a-b8046cde085f', 17, 0, 0, 0, 9500.00, '2024-05-22 06:07:31', '2024-05-22 06:48:56'),
(2, '9073eec9-f231-4cc8-ac2b-d752d90d4a72', 19, 1, 0, 0, 3000.00, '2024-05-22 06:39:22', '2024-05-22 06:39:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_service`
--

CREATE TABLE `cart_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart_service`
--

INSERT INTO `cart_service` (`id`, `cart_id`, `service_id`, `time_slot_id`, `date`, `start_time`, `end_time`, `location_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, '2024-05-23', '13:00:00', '14:00:00', 2, 3000.00, NULL, NULL),
(2, 2, 2, 9, '2024-05-22', '17:00:00', '18:00:00', 1, 3000.00, NULL, NULL),
(3, 1, 1, 7, '2024-05-22', '15:00:00', '16:00:00', 1, 1250.00, NULL, NULL),
(4, 1, 1, 8, '2024-05-22', '16:00:00', '17:00:00', 1, 1250.00, NULL, NULL),
(5, 1, 3, 6, '2024-05-22', '14:00:00', '15:00:00', 5, 4000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'field', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(2, 'ball', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(3, 'seat', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(4, 'change room', '2024-05-21 15:08:53', '2024-05-21 15:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `deals`
--

INSERT INTO `deals` (`id`, `name`, `description`, `discount`, `start_date`, `end_date`, `is_hidden`, `created_at`, `updated_at`) VALUES
(1, 'Deal 1', 'deal with benaya ', 10, '2024-05-22', '2024-05-25', 0, '2024-05-21 15:08:53', '2024-05-22 06:46:52');

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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"43e79391-9f34-4319-a972-4e61a3ddd910\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-ee06-4c4b-b2de-e4e487f97e0a\"}', 0, NULL, 1716309533, 1716309533),
(2, 'default', '{\"uuid\":\"3add5db3-bae0-46f9-b8cd-f0ebd25942bb\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-f1fc-400e-bff4-1c98a3bb05a8\"}', 0, NULL, 1716309533, 1716309533),
(3, 'default', '{\"uuid\":\"38ceeca1-d7c4-4a97-920f-4265ebfaaee0\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-f495-4a40-8495-f5d0396aa82a\"}', 0, NULL, 1716309533, 1716309533),
(4, 'default', '{\"uuid\":\"53b6851a-634b-44c9-a180-fe8405ecc6df\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-f9b2-4c3c-b7b1-090f4e56168e\"}', 0, NULL, 1716309533, 1716309533),
(5, 'default', '{\"uuid\":\"cec844df-4b2d-4c89-a61f-fb819d7dcfb0\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-fb13-43d4-afa9-48ee1a4411af\"}', 0, NULL, 1716309533, 1716309533),
(6, 'default', '{\"uuid\":\"50b259d2-019f-4312-adeb-7f8c7d115da1\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-fc69-47e5-bd0a-b7927bf34792\"}', 0, NULL, 1716309533, 1716309533),
(7, 'default', '{\"uuid\":\"1004bec8-5372-4a05-a82a-f15fac6e7934\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f201-ff98-4c96-a92b-78739063868b\"}', 0, NULL, 1716309533, 1716309533),
(8, 'default', '{\"uuid\":\"ab6d2a5a-44b1-4f3c-ab1e-25d07018f6c2\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f202-00f3-4032-992e-120c11fd48fe\"}', 0, NULL, 1716309533, 1716309533),
(9, 'default', '{\"uuid\":\"1f9297d4-cf2e-4883-af2f-8692a7045a4a\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f202-0206-4111-b8a0-fdaf3fc59655\"}', 0, NULL, 1716309533, 1716309533),
(10, 'default', '{\"uuid\":\"c7c1f59f-2a64-4b88-803a-220969224208\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f202-0576-4ea1-8f61-9a777e7ce9dd\"}', 0, NULL, 1716309533, 1716309533),
(11, 'default', '{\"uuid\":\"620507fd-3bf7-4bd1-ac41-27bef593590b\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f202-0747-456a-ba85-d60eaf6db1e0\"}', 0, NULL, 1716309533, 1716309533),
(12, 'default', '{\"uuid\":\"ed00af55-78a5-46a0-89d6-5144b7454020\",\"displayName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNewServicePromoMailJob\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\SendNewServicePromoMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"service\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Service\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c18f202-0924-4547-8333-6c65d36fb8f4\"}', 0, NULL, 1716309533, 1716309533),
(13, 'default', '{\"uuid\":\"c3615d55-4a67-4017-8b0e-d4b5687a1ba8\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:2;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19eec9-9caf-4fe2-b6b5-bfe180408525\"}', 0, NULL, 1716351943, 1716351943),
(14, 'default', '{\"uuid\":\"6a74c409-6deb-42ee-82da-039bfe1771c7\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f137-35fc-42b0-b864-093741b69d75\"}', 0, NULL, 1716352350, 1716352350),
(15, 'default', '{\"uuid\":\"43b0b987-e6a6-433b-91e2-d8b5d2e238b5\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f16a-ba2c-4839-a9b8-fbfcba7724f1\"}', 0, NULL, 1716352384, 1716352384),
(16, 'default', '{\"uuid\":\"b4398cc0-c844-43b8-914b-b0fd39f2569b\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f18c-a72f-4130-94b3-4b6a23ec2f27\"}', 0, NULL, 1716352406, 1716352406),
(17, 'default', '{\"uuid\":\"0fcc5f25-b123-4b5a-85ee-88ea0b2745c4\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f190-8dcf-45e1-a408-014bf5e8e7de\"}', 0, NULL, 1716352408, 1716352408),
(18, 'default', '{\"uuid\":\"43ccf12e-700d-4585-ba9f-d361e656b708\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f191-687c-487f-b5a1-5a15199fa16c\"}', 0, NULL, 1716352409, 1716352409),
(19, 'default', '{\"uuid\":\"27eb27d5-42eb-4527-88d0-f9683dede3ba\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f234-bdc7-44d6-8243-d989f6775038\"}', 0, NULL, 1716352516, 1716352516),
(20, 'default', '{\"uuid\":\"6f9a4dd7-dff8-4626-bbcd-068e678efc96\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f286-87f2-45f4-b0f7-32cf0aa8e2a8\"}', 0, NULL, 1716352570, 1716352570),
(21, 'default', '{\"uuid\":\"a0689eac-fbef-48d0-b282-5824421d02c9\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f287-5750-4bb7-9de9-0fe3d51cc36f\"}', 0, NULL, 1716352570, 1716352570),
(22, 'default', '{\"uuid\":\"f243fba5-8105-40d3-8055-39cf38537a2f\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f28a-8980-48ea-9edd-902f8ac12811\"}', 0, NULL, 1716352572, 1716352572),
(23, 'default', '{\"uuid\":\"3d99070d-0345-43c9-b111-e31d67af24ea\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f28b-9029-4634-8f9a-00eb5f3e1119\"}', 0, NULL, 1716352573, 1716352573),
(24, 'default', '{\"uuid\":\"f7f67586-ea15-4bac-afd8-7c33a07911ae\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f28c-7743-4e68-8fd1-176bc6daddd2\"}', 0, NULL, 1716352574, 1716352574),
(25, 'default', '{\"uuid\":\"38512664-2c66-4797-b2a9-ddccdb41a8f2\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f28f-847b-45ea-bf53-58856264bb0f\"}', 0, NULL, 1716352576, 1716352576),
(26, 'default', '{\"uuid\":\"7b1a9666-8a49-4467-bb1d-522a5180891a\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f2a8-02d5-4c74-8a4f-02e455b591a6\"}', 0, NULL, 1716352592, 1716352592),
(27, 'default', '{\"uuid\":\"6c967429-4f6d-49a0-8b47-a87cde0552a4\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f2a8-cfb5-4ef3-83a2-d4c4f694bfc5\"}', 0, NULL, 1716352592, 1716352592),
(28, 'default', '{\"uuid\":\"92843ef1-2fc7-4807-bfe9-9fbd61d4d681\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f2ac-04a4-4ef3-a882-afac0dc4053b\"}', 0, NULL, 1716352594, 1716352594),
(29, 'default', '{\"uuid\":\"7050899b-924f-43ba-a065-04009771174a\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c19f372-7d48-4f10-a97f-bc10de4ebb5f\"}', 0, NULL, 1716352724, 1716352724),
(30, 'default', '{\"uuid\":\"e60f55d5-9b58-474e-9a83-b9f8d9b56562\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:2;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a3956-13e8-47a6-90c2-6cdb1c6cf442\"}', 0, NULL, 1716364450, 1716364450),
(31, 'default', '{\"uuid\":\"cad3af51-6b07-4333-ac55-325b586bc5d4\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a3a87-c2b0-484f-a685-d2ea0fc735e6\"}', 0, NULL, 1716364650, 1716364650),
(32, 'default', '{\"uuid\":\"2420f796-06cc-4ef0-8e9d-f5ff2a05cc89\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a3cf1-f91d-47e0-9fce-77e1732f4f96\"}', 0, NULL, 1716365055, 1716365055),
(33, 'default', '{\"uuid\":\"61257d01-e88f-46d2-a8bd-2926721bd84e\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:2;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a3e17-139c-465e-8178-dfc0f9ce3e08\"}', 0, NULL, 1716365247, 1716365247),
(34, 'default', '{\"uuid\":\"e6bc0202-9b28-4316-82d3-6924bd5d726c\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:2;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a3eb4-6280-458b-9c01-d56446fc5ecb\"}', 0, NULL, 1716365350, 1716365350),
(35, 'default', '{\"uuid\":\"9178c87f-c20b-4743-843b-99f87aa7bace\",\"displayName\":\"App\\\\Jobs\\\\SendAppointmentConfirmationMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendAppointmentConfirmationMailJob\",\"command\":\"O:43:\\\"App\\\\Jobs\\\\SendAppointmentConfirmationMailJob\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"appointment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\Appointment\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"},\"telescope_uuid\":\"9c1a3ed1-a249-41b6-9a7b-ee7afc9626b3\"}', 0, NULL, 1716365370, 1716365370),
(36, 'default', '{\"uuid\":\"c6ddd485-c9d1-4ff6-89d1-7676e4ccf82f\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a41b6-8aa5-498d-9563-d229b7ef9a4d\"}', 0, NULL, 1716365855, 1716365855),
(37, 'default', '{\"uuid\":\"a25785a7-aa44-40cd-a2be-9c207e8dd4d5\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a41e6-4e04-4d2f-8ebd-6987d6d7fd3b\"}', 0, NULL, 1716365886, 1716365886),
(38, 'default', '{\"uuid\":\"d9e5ed82-b0b4-44bd-9d19-1932dc5026c8\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a41fd-4f2b-4711-9d41-d8e7bc18aa69\"}', 0, NULL, 1716365902, 1716365902),
(39, 'default', '{\"uuid\":\"436c827b-f281-480d-b386-e890ebc854db\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:1;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a420b-02ed-4b59-9ce6-909b8df2bc0e\"}', 0, NULL, 1716365911, 1716365911),
(40, 'default', '{\"uuid\":\"68c83c50-3635-4a12-9dae-d39874f8e5d7\",\"displayName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\AnalyticsJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\AnalyticsJob\\\":3:{s:5:\\\"model\\\";s:7:\\\"Service\\\";s:2:\\\"id\\\";i:3;s:13:\\\"analytic_type\\\";s:4:\\\"view\\\";}\"},\"telescope_uuid\":\"9c1a4220-4625-4b32-87bc-c9baa95732ed\"}', 0, NULL, 1716365924, 1716365924);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `telephone_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Location 1', 'Laguboti', '1234567890', 1, '2024-05-21 15:08:53', '2024-05-22 06:04:29'),
(2, 'Location 2', 'Porsea', '1234567890', 1, '2024-05-21 15:08:53', '2024-05-22 06:04:39'),
(3, 'Location 3', 'Balige', '1234567890', 1, '2024-05-21 15:08:53', '2024-05-22 06:04:57'),
(4, 'Location 4', 'Jalur Gaza', '1234567890', 1, '2024-05-21 15:08:53', '2024-05-22 06:05:24'),
(5, 'Location 5', 'Lumban Julu', '1234567890', 1, '2024-05-22 06:05:52', '2024-05-22 06:05:52');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_08_135614_create_sessions_table', 1),
(7, '2023_05_13_144600_create_roles_table', 1),
(8, '2023_05_13_155544_add_role_id_to_users_table', 1),
(9, '2023_06_01_114923_create_locations_table', 1),
(10, '2023_06_03_121845_create_services_table', 1),
(11, '2023_06_07_091657_create_deals_table', 1),
(12, '2023_09_18_134208_create_categories_table', 1),
(13, '2023_09_26_040647_create_jobs_table', 1),
(14, '2023_09_26_085642_create_service_hits_table', 1),
(15, '2023_09_26_185410_create_time_slots_table', 1),
(16, '2023_09_27_021712_create_carts_table', 1),
(17, '2023_09_27_023637_create_appointments_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('yosiagurning@gmail.com', '$2y$10$ZX5J9u.aiEg3eXjS9.ZRiuMPCd8GeOC4Ee7AJcrs94owgI2HLCnvq', '2024-05-22 06:02:58');

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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(2, 'Employee', 1, '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(3, 'Customer', 1, '2024-05-21 15:08:53', '2024-05-21 15:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `allergens` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `aftercare_tips` varchar(255) DEFAULT NULL,
  `cautions` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `description`, `image`, `price`, `notes`, `allergens`, `benefits`, `aftercare_tips`, `cautions`, `category_id`, `is_hidden`, `created_at`, `updated_at`) VALUES
(1, 'Field Cleaning', 'Field-Cleaning', 'Get great service cleaning extensions for a stylish field \r\n look.', 'hair.jpg', '1250.00', 'Choose from a variety of Field Cleaning.', NULL, 'Adds length and clean to your field.', 'Avoid harsh chemicals on your nails to maintain the extensions.', NULL, 1, 0, '2024-05-21 15:08:53', '2024-05-22 06:06:40'),
(2, 'seat', 'seat', 'Add vibrant highlights to your field view for most experince of view.', 'skin.jpg', '3000.00', 'Consult with our staff for the best shade selection.', '', 'Transform your field look with our staff.', '', 'Patch test required for new clients with new recomend.', 3, 0, '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(3, 'new-ball', 'new-ball', 'Revitalize your ball with deep conditioning service.', 'nails.jpg', '4000.00', 'Recommended for dry and damaged ball.', NULL, 'Nourish and repair your ball for improved texture and shine.', 'Use recommended ball masks for ongoing maintenance.', NULL, 3, 0, '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(4, 'Changes room', 'Changes-room', 'Relaxing scalp massage to rejuvenate your foot.', 'makeup.jpg', '3500.00', 'Enjoy a soothing massage with aromatic oils.', 'Massage oils may contain allergens; inform us of any allergies.', 'Promote scalp health and reduce stress with this pampering treatment.', 'Take time to relax and destress after the treatment.', NULL, 3, 0, '2024-05-21 15:08:53', '2024-05-21 15:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_hits`
--

CREATE TABLE `service_hits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `hit_time` timestamp NOT NULL DEFAULT '2024-05-21 14:35:35',
  `analytic_data_type` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0uz3AnIexQPlF6xcuJRbKLnif1WA1KeDu3Mp0afP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2pZY0xrMFVIc2dNT1BzODh2cmt6TlRNUlVyUDJ6TWNtdjRYREZMZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367310),
('67YRh1c8RrC1yDTDh0OAMe8rlROL7YBwvFtLjAvV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDYyTnMzM2V1cEdvdkxOaGZBOUxGSlZNMXZZMkt2WkZMRkFSbkFpdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366634),
('6rMZM4gZLQKnqectNOUanBdhEDfNgZuRDOp2Ih6v', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFNCMVg5QlRZZ2czTFo1OGZleFFqeUZMaDlzd2h5eUNKTWJxcUhaMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366670),
('6W2pjVdiFclcMIaeV9MhHkJArKDxfoVgzNcsXt2m', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVk4SkMxaTZ0TG9LRm9TVUNMNzJyaTFLakxlUkdlRFd2UUh2NG5acCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366606),
('6ZZhqTzMgFvrle9OsIrYsmgaw0oJW0kl3tjrO82z', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2NIY2VrenRoWmlXQWJEM2l3cUt0aHlScGhkTWtMRFpGZ09QbXBVaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367241),
('94rIT0gNgmC0z0k3VmkC3NXZ5yFgSZjUNkwk63CY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREtLb09WYUYyTlhHV2Q4SmxaY2tnOWtMeWNacVRvSEhXYk94V0MxdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366691),
('a9Z4uS2i1ZAyxnWMbl3HoXyBZCEruYXzFiC9kpmF', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2NhbXpVTURvVEFzQ3lvTjNkd05Bc2xNYldaTlR2TjVDRTlGS1JXcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367222),
('Ar7VX8qfxfSZ4d6l6dGHTzrSSVIFs7jqopsRbIcQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGk3aFg2cmg4YUZOenFlUm9ydDhUQ0I1MlowaFRQdzd0clhxaWpEMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366698),
('bdz3cAZ6cJSo9sPfOquv8uIbBJDiWzTPSCday3JB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlAxV3JwZ0VISkI2UlhzTGNSQUk0TW4zMHlsak1SOVU3R0ZxcThVdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366717),
('cpQXloJPo0Qj4WG2MgT7grKvwJiTSZ2xtZXlZfzl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGVXYWUzMmZvaXplVVZ6Ums0TUpTdDZzTlhKaEhCOThCSWhVSEpXZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367030),
('J6FC1wUC1srFNBRBE6IQd8Djs4TwKU0vTZODTL1k', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN00wa2tKYVl1RHRXSWlOWjc0c1lkdXJCWXB5bmNOVFphQmQwa2pqcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366709),
('pMTS6IyEscNc1dfasWSCjpdyl3DFFOSdzO9eLyG9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0Y0S25tdUdZb3ROVUZVSkRJOG9mUE5LZFU0SDBGZXlJNkNvUGZ0cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367025),
('rEaFhD9J2wVQPCRwi8blqsz2MrXoMJab4zNNe3Vt', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkpyMGpob2l5ZWZtSVRONWJlQTA5MkhHY2hSd2ZldWxLaXpPcEVGZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367237),
('tgENyBGqP0LOtFRv7QmAZjRf6WLpeqCQV4Gmv98Q', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVdQS1Z3alp5ZEFMejMwZThPZFdxbjRiMWM1Nm16M2V5U0lmVUdHRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367303),
('TSy2RdjdDWtMcB4bPrSnvZ7vEuYX9vrXarNeBMOk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHRidng3U2xtSW03TjhCRENMUFNKTTVUd3h2aXJsbjZzdFlKOFN2eSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1716367931),
('VKZGGLD9JbiPznKhhgFgmgiTkskkAZXAfiGO83bM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHpPZTFwSVViSVEwYURpeEMwWlR2UXp3WUY1cTBZME1zb3lkc2RLcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367186),
('X3VNyZodAo6LqlAJfbvF7aHAvuHAnl5AKCDy2fvd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjhZZXppRFdwd0VEV1djcTBsNVpmc2NGT2hVSVJlUEIzMXFQQTd6SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366702),
('xvvmWC2fL8hA0PXUMjsjnQhzlvGTzFQaGLetJSK9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicldHckc4d0hNVmpWaGhPM0d2WU5ibXg2UXZPWVE4TWlkR3dOQWdpSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716364024),
('yJQRdTTFqJZ9SG0XS4m9jxSOgy9aWFiIbjbrNHL7', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1k3UjNWRDRkUG85YWNSb0hKRjBLSk9NUVU2aGo5aGtUZVpJajlhayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716367204),
('ySAaZfXQrC84FPaYtfDtCH0GDSqaAnCfcwjyTkvA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFlFSW1XWkNXSkZTU2g1blFaVzkxVXh5dmFqdXlRTkg5ZjNGVmI0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716366618);

-- --------------------------------------------------------

--
-- Struktur dari tabel `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `time_slots`
--

INSERT INTO `time_slots` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', '10:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(2, '10:00:00', '11:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(3, '11:00:00', '12:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(4, '12:00:00', '13:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(5, '13:00:00', '14:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(6, '14:00:00', '15:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(7, '15:00:00', '16:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(8, '16:00:00', '17:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53'),
(9, '17:00:00', '18:00:00', '2024-05-21 15:08:53', '2024-05-21 15:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `phone_number`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`, `role_id`) VALUES
(17, 'Yosia Yehezkiel Gurning', 'yosiagurning@gmail.com', NULL, '$2y$10$F/Lps72Yob/mpLMvP000puhOE3xRJ7xiAd2eO2eItMP9u0drl91k6', NULL, NULL, NULL, '0812609704', NULL, NULL, NULL, 1, '2024-05-21 15:26:41', '2024-05-21 15:26:41', 1),
(19, 'benaya', 'benaya@gmail.com', NULL, '$2y$10$YptJnkBMVUDMMDylByIyQOp3kgwAIxTxECZT6eY77OwinnKTT7gKi', NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, 1, '2024-05-22 06:13:34', '2024-05-22 06:13:34', 3),
(20, 'yudi', 'yudi@gmail.com', NULL, '$2y$10$quA/Jb3ad/bu6tjQeoqnTu9wPcXkMRRBl/Urr/B0lu5EB5k6qJbsO', NULL, NULL, NULL, '0987654321', NULL, NULL, NULL, 1, '2024-05-22 06:44:31', '2024-05-22 06:44:31', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_appointment_code_unique` (`appointment_code`),
  ADD KEY `appointments_cart_id_foreign` (`cart_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`),
  ADD KEY `appointments_time_slot_id_foreign` (`time_slot_id`),
  ADD KEY `appointments_location_id_foreign` (`location_id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_uuid_unique` (`uuid`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cart_service`
--
ALTER TABLE `cart_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_service_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_service_service_id_foreign` (`service_id`),
  ADD KEY `cart_service_time_slot_id_foreign` (`time_slot_id`),
  ADD KEY `cart_service_location_id_foreign` (`location_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_category_id_index` (`category_id`);

--
-- Indeks untuk tabel `service_hits`
--
ALTER TABLE `service_hits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart_service`
--
ALTER TABLE `cart_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `service_hits`
--
ALTER TABLE `service_hits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `appointments_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `appointments_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`),
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `cart_service`
--
ALTER TABLE `cart_service`
  ADD CONSTRAINT `cart_service_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_service_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `cart_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `cart_service_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
