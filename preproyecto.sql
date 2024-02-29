-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 11:04:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'futbol', '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(2, 'baloncesto', '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(3, 'tenis', '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(4, 'rugby', '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(5, 'padel', '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(6, 'hockey', '2024-02-27 07:29:17', '2024-02-27 07:29:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_02_22_105047_create_deportes_table', 1),
(4, '2024_02_22_105104_create_pistas_table', 1),
(5, '2024_02_22_105119_create_socios_table', 1),
(6, '2024_02_22_105155_create_reservas_table', 1),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(10, '2016_06_01_000004_create_oauth_clients_table', 2),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('604b51bd7713aa3794525b04b93aca6d6664871b2d256727dda8a1df2664f901f0e06ec370155b2c', 3, 1, 'Token', '[]', 0, '2024-02-27 09:54:00', '2024-02-27 09:54:00', '2025-02-27 10:54:00'),
('8579c829cd6527f2509f46dc29978ced93dd2399721589ee7efb5d21a9a711b10dfee0e1cd928857', 3, 1, 'Token', '[]', 0, '2024-02-28 08:10:54', '2024-02-28 08:10:54', '2025-02-28 09:10:54'),
('8d63910d2c72a2d41338f811203be0263edfadec8f2f7e72e19bdccd5774d810e05facdcf611dfb4', 3, 1, 'Token', '[]', 0, '2024-02-27 09:53:05', '2024-02-27 09:53:05', '2025-02-27 10:53:05'),
('bc2dda92098e4892e201abeb9fc0fd586a9173f47f00f7b33f7d9efd80504883d6cfadb2f27304df', 2, 1, 'Token', '[]', 0, '2024-02-27 09:47:08', '2024-02-27 09:47:08', '2025-02-27 10:47:08'),
('c489d156c75a6244ab2a6ed2aae354ab2bc19a9853d36aab3e61988cca75e3324a906c382edbbd6e', 4, 1, 'Token', '[]', 0, '2024-02-28 08:05:05', '2024-02-28 08:05:05', '2025-02-28 09:05:05'),
('d8e338aaceb836297e373233bd2a66000ec3003de1bca83ef39b5e03f42cdabff4a9ad39a695a8db', 3, 1, 'Token', '[]', 0, '2024-02-28 09:28:03', '2024-02-28 09:28:03', '2025-02-28 10:28:03'),
('e63413d96539907811cd1680c389dc73b5353b1dc69bb7aeb968959d4b77d00fdf3ceaf430219296', 5, 1, 'Token', '[]', 0, '2024-02-29 08:52:32', '2024-02-29 08:52:32', '2025-03-01 09:52:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'YwkjNk4ezDTYHeKj8pSHd9vhg7pUw2dLQDIfynfi', NULL, 'http://localhost', 1, 0, 0, '2024-02-27 08:56:33', '2024-02-27 08:56:33'),
(2, NULL, 'Laravel Password Grant Client', 'u5f3iqZOF9AUbTV6UcGRG0p1SK25fouaA7oa84SW', 'users', 'http://localhost', 0, 1, 0, '2024-02-27 08:56:33', '2024-02-27 08:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-02-27 08:56:33', '2024-02-27 08:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deporte_id` bigint(20) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id`, `deporte_id`, `numero`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(2, 2, 2, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(3, 3, 3, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(4, 4, 4, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(5, 5, 5, '2024-02-26 07:20:18', '2024-02-26 07:20:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `socio_id` bigint(20) UNSIGNED NOT NULL,
  `pista_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha`, `hora`, `socio_id`, `pista_id`, `created_at`, `updated_at`) VALUES
(1, '2024-04-28', '10:00:00', 24, 5, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(3, '2024-06-05', '09:00:00', 11, 3, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(4, '2024-07-12', '18:00:00', 12, 3, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(5, '2024-11-09', '12:00:00', 22, 5, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(6, '2024-11-08', '09:00:00', 1, 2, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(7, '2024-07-27', '12:00:00', 13, 5, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(8, '2024-12-13', '19:00:00', 32, 4, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(9, '2024-02-16', '22:00:00', 21, 5, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(10, '2024-11-10', '18:00:00', 5, 4, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(11, '2024-02-27', '18:00:00', 6, 3, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(12, '2024-12-04', '17:00:00', 13, 2, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(13, '2024-02-27', '20:00:00', 11, 2, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(14, '2024-02-19', '14:00:00', 22, 1, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(15, '2024-08-05', '21:00:00', 18, 5, '2024-02-26 07:20:19', '2024-02-26 07:20:19'),
(17, '2024-04-22', '10:00:00', 24, 4, '2024-02-26 10:22:14', '2024-02-26 10:22:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `edad`, `created_at`, `updated_at`) VALUES
(1, 'Margarete', 57, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(2, 'Teagan', 47, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(3, 'Lee', 18, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(4, 'Zakary', 39, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(5, 'Marta', 26, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(6, 'Myrtis', 18, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(7, 'Dorothy', 21, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(8, 'Lupe', 30, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(9, 'Earline', 58, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(10, 'Paris', 22, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(11, 'Dortha', 60, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(12, 'Maeve', 22, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(13, 'Curt', 22, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(14, 'Arvel', 25, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(15, 'Alverta', 38, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(16, 'Mossie', 18, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(17, 'Tito', 40, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(18, 'Gussie', 20, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(19, 'Kailee', 23, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(20, 'Aron', 30, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(21, 'Keeley', 25, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(22, 'Nicole', 21, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(23, 'Emmy', 40, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(24, 'Trevor', 25, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(25, 'Felipa', 20, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(26, 'Maximo', 42, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(27, 'Bernard', 59, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(28, 'Gracie', 41, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(29, 'Beverly', 30, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(30, 'Montana', 36, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(31, 'Ludwig', 23, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(32, 'Arden', 56, '2024-02-26 07:20:18', '2024-02-26 07:20:18'),
(33, 'Fleta', 19, '2024-02-26 07:20:18', '2024-02-26 07:20:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Juan', 'juan@example.com', '$2y$12$AqVAMpsMjQXDZHEzXRMtPuAW4.UUOxa7Gu.5aqxzL9Eiz.nPz8sUK', NULL, '2024-02-27 09:47:08', '2024-02-27 09:47:08'),
(3, 'Laura', 'laura@example.com', '$2y$12$hugGlizsTNa/IpwBUzC3ruv8IfnwIKYOc/FNg.a9JE9OgP.oSZlNS', NULL, '2024-02-27 09:53:05', '2024-02-27 09:53:05'),
(4, 'Eli', 'eli@example.com', '$2y$12$oQrRxNw.SBYfE0gcj0CgRutas3WTNDOLtkgX8r/HNYEJduiJ6mcqu', NULL, '2024-02-28 08:05:04', '2024-02-28 08:05:04'),
(5, 'Elizabeth', 'elizabeth@example.com', '$2y$12$Zd0N2hO5p0.ulXNWx0YtOeh4UrqWcYnoPZGEOsjJJ7HGKJYRbdh3.', NULL, '2024-02-29 08:51:27', '2024-02-29 08:51:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pistas_deporte_id_foreign` (`deporte_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_socio_id_foreign` (`socio_id`),
  ADD KEY `reservas_pista_id_foreign` (`pista_id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pistas`
--
ALTER TABLE `pistas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD CONSTRAINT `pistas_deporte_id_foreign` FOREIGN KEY (`deporte_id`) REFERENCES `deportes` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_pista_id_foreign` FOREIGN KEY (`pista_id`) REFERENCES `pistas` (`id`),
  ADD CONSTRAINT `reservas_socio_id_foreign` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
