-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2020 a las 00:06:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bills`
--

INSERT INTO `bills` (`id`, `social_reason`, `rfc`, `folio`, `company_id`, `created_at`, `updated_at`) VALUES
(2, 'Pepito Inc', '111111111111', '0000000001', 1, '2020-08-17 02:26:56', '2020-08-17 13:40:30'),
(3, 'Bad Bunny', '111111111111', '0000000002', 1, '2020-08-17 13:49:49', '2020-08-17 13:49:49'),
(4, 'Bad Bunny', '111111111111', '0000000001', 5, '2020-08-17 22:33:19', '2020-08-17 22:33:19'),
(7, 'UPVictoria', 'frfrfrfrwfrf', 'wefewfewfe', 5, '2020-08-17 23:36:16', '2020-08-17 23:36:16'),
(8, 'Pepito Inc', '111111111111', '1111111111', 5, '2020-08-17 23:39:54', '2020-08-17 23:39:54'),
(9, 'TEC', '123456788990', '0000000003', 5, '2020-08-18 00:21:12', '2020-08-18 00:21:12'),
(10, 'Yellowstone', '123456788990', '1111111111', 1, '2020-08-18 00:56:52', '2020-08-18 00:56:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `rfc`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Empresa Chida', 'Dirección 1', '123456789012', 'empresa1@empresa.com', NULL, '2020-08-17 13:06:24'),
(5, 'empresa 2', 'dirección 2', '000000000000', 'empresa2@empresa.com', '2020-08-17 22:31:58', '2020-08-17 22:31:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies_user`
--

CREATE TABLE `companies_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `companies_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies_user`
--

INSERT INTO `companies_user` (`id`, `user_id`, `companies_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, '2020-08-17 12:15:45', '2020-08-17 12:15:45'),
(3, 3, 5, '2020-08-17 22:32:18', '2020-08-17 22:32:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `files_bills`
--

CREATE TABLE `files_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `files_bills`
--

INSERT INTO `files_bills` (`id`, `bill_id`, `file`, `created_at`, `updated_at`) VALUES
(3, 2, 'public/8NzoiiF3x4FWegW3YdeRibhB4fLDzi2SAorYoBtL.pdf', NULL, NULL),
(4, 3, 'public/vthOB72njNLmRfhoqas4XPbotpg7ohNKD8moysEy.pdf', NULL, NULL),
(5, 4, 'public/kWYei8mwF5RmzerT7jXEW97mQe0ZfYAM5CpY26EJ.pdf', NULL, NULL),
(6, 7, 'public/VsjAZPyZtrRssBekKtKRj7RwGec8VsQ3yr9E4R4X.txt', NULL, NULL),
(7, 8, 'public/lOKuafemYF3u83JXOlYXAtCoouiDwZANMfBDtWXJ.pdf', NULL, NULL),
(8, 8, 'public/tXNFs8IqHjogqBPGBTu7ui2obRMxe5wXfNR9eMSL.docx', NULL, NULL),
(9, 9, 'public/aPCX8Ufs7FCLLrqgJZPS738daiSVO8F7XZvfF3tK.pdf', NULL, NULL),
(10, 9, 'public/oAHZOfXBgyieypF4mEkCl3JVskiYY4vIUn2MFfIA.docx', NULL, NULL),
(11, 10, 'public/ZzzqLQARo3rpW7ceDV4aINU7mYLqexPuCezyVrO7.txt', NULL, NULL),
(12, 10, 'public/RDXF6GiotBGjwMEDGAhn9UQ2lOzYrgWuMd9j8XFh.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(39, '2014_10_12_000000_create_users_table', 1),
(40, '2014_10_12_100000_create_password_resets_table', 1),
(41, '2019_08_19_000000_create_failed_jobs_table', 1),
(42, '2020_08_16_093431_create_companies_table', 1),
(43, '2020_08_16_094119_create_bills_table', 1),
(44, '2020_08_16_094305_create_company_user_table', 1),
(45, '2020_08_16_195801_create_files_bills_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@paper.com', '2020-08-17 01:01:25', '$2y$10$eea2MV2cfz.QZMlYVphAB.AZQLwKOXoomgRevHPOicsSurEo31LrO', NULL, '2020-08-17 01:01:25', '2020-08-17 01:01:25'),
(2, 'Miguel Luna', 'mlunav99@gmail.com', NULL, '$2y$10$hpNMNn1hOqf4xvd4mU7wPuUT5RnMfnIGA5ou54MGS6h9A89xFdL6y', NULL, '2020-08-17 12:15:44', '2020-08-17 14:04:54'),
(3, 'Juan Perez', 'jperez@gmail.com', NULL, '$2y$10$K0vqVf.H9exZIfs./RmjZu0rngNoLwimEip2xXP6uHlcsSZH2A8B6', NULL, '2020-08-17 22:32:17', '2020-08-17 22:32:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_company_id_foreign` (`company_id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies_user`
--
ALTER TABLE `companies_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_companies_id_foreign` (`companies_id`),
  ADD KEY `companies_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files_bills`
--
ALTER TABLE `files_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_bills_bill_id_foreign` (`bill_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `companies_user`
--
ALTER TABLE `companies_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_bills`
--
ALTER TABLE `files_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `companies_user`
--
ALTER TABLE `companies_user`
  ADD CONSTRAINT `companies_user_companies_id_foreign` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `files_bills`
--
ALTER TABLE `files_bills`
  ADD CONSTRAINT `files_bills_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
