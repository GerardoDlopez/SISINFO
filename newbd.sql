-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2024 a las 10:28:45
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
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_26_210414_create_votantes_table', 1),
(6, '2024_02_27_183750_create_liders_table', 1),
(7, '2024_02_28_014918_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 22),
(4, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion_promovido`
--

CREATE TABLE `observacion_promovido` (
  `id` int(11) NOT NULL,
  `promovido_id` int(11) NOT NULL,
  `observacion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupaciones`
--

CREATE TABLE `ocupaciones` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ocupaciones`
--

INSERT INTO `ocupaciones` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'gruero', NULL, NULL),
(2, 'costurera', NULL, NULL),
(3, 'programador', '2024-03-11 04:21:59', '2024-03-11 04:21:59'),
(4, 'Ninguna', NULL, NULL),
(5, 'Maestro', NULL, NULL),
(6, 'Ninguna', NULL, NULL),
(7, 'maestra', '2024-03-22 06:11:35', '2024-03-22 06:11:35'),
(8, 'soldador', '2024-03-22 06:15:38', '2024-03-22 06:15:38'),
(9, 'doctor', '2024-03-22 06:16:37', '2024-03-22 06:16:37'),
(10, 'Trailero', '2024-03-22 06:26:52', '2024-03-22 06:26:52'),
(11, 'Trailero', '2024-03-22 06:27:07', '2024-03-22 06:27:07'),
(12, 'farmaceutico', '2024-03-22 06:54:38', '2024-03-22 06:54:38'),
(13, 'heladero', '2024-03-22 06:55:32', '2024-03-22 06:55:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(2, 'agregar-promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(3, 'actualizar-promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(4, 'eliminar-promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(5, 'ver-usuarios', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(6, 'agregar-usuarios', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(7, 'actualizar-usuarios', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(8, 'eliminar-usuarios', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19');

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
-- Estructura de tabla para la tabla `promovidos`
--

CREATE TABLE `promovidos` (
  `id` int(11) NOT NULL,
  `id_seccion` int(10) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido_pat` varchar(250) DEFAULT NULL,
  `apellido_mat` varchar(250) DEFAULT NULL,
  `localidad_y_domicilio` varchar(250) DEFAULT NULL,
  `clave_elec` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `id_ocupacion` bigint(20) DEFAULT NULL,
  `escolaridad` varchar(250) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promovidos`
--

INSERT INTO `promovidos` (`id`, `id_seccion`, `nombre`, `apellido_pat`, `apellido_mat`, `localidad_y_domicilio`, `clave_elec`, `telefono`, `correo`, `facebook`, `id_ocupacion`, `escolaridad`, `fecha_captura`, `genero`, `edad`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 2, 'venancio', 'diaz', 'lopez', '24 poniente no 63 entre 10 y 12 sur', 'DZLPVN00021007H800', '9621863131', 'gerardo_dl_2000@hotmail.com', 'gerardoDL', 3, 'licenciatura', '2000-02-10', 'H', '24', 1, '2024-03-26 08:58:35', '2024-03-26 09:17:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(2, 'Ver-Promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(3, 'Agregar-Promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(4, 'Actualizar-Promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19'),
(5, 'Eliminar-Promovidos', 'web', '2024-02-28 07:56:19', '2024-02-28 07:56:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 1),
(3, 4),
(4, 1),
(4, 5),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `seccion` varchar(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `nombre`, `updated_at`, `created_at`) VALUES
(1, '0163', 'BO. LA UNIDAD', NULL, NULL),
(2, '0164', 'BO. GUADALUPE', NULL, NULL),
(3, '0165', 'BO. MIGUEL HIDALGO', NULL, NULL),
(4, '0166', 'COL. CENTRO', NULL, NULL),
(5, '0167', 'BO. EMILIANO ZAPATA', NULL, NULL),
(6, '0168', 'BO. ALVARO OBREGON', NULL, NULL),
(7, '0169', 'BO. TAMARINDO', NULL, NULL),
(8, '0170', 'EJ. AGUACALIENTE', NULL, NULL),
(9, '0171', 'EJ. AZTECA', NULL, NULL),
(10, '0172', 'EJ. BENITO JUAREZ EL PLAN', NULL, NULL),
(11, '0173', 'EJ. EL PLATANAR', NULL, NULL),
(12, '0174', 'EJ. ALPUJARRAS', NULL, NULL),
(13, '0175', 'EJ. EL AGUILA ', NULL, NULL),
(14, '0176', 'EJ. AGUSTIN DE ITURBIDE', NULL, NULL),
(15, '0177', 'EJ. EL PROGRESO', NULL, NULL),
(16, '0178', 'EJ. UNIÓN ROJA', NULL, NULL),
(17, '0179', 'EJ. BENITO JUAREZ SAN VICENTE', NULL, NULL),
(18, '0180', 'EJ. EL CARMEN', NULL, NULL),
(19, '0180', 'EJ. GUATIMOC', NULL, NULL),
(20, '0181', 'EJ. MIXCUM', NULL, NULL),
(21, '0182', 'EJ. FAJA DE ORO', NULL, NULL),
(22, '0183', 'EJ. AHUACATLAN', NULL, NULL),
(23, '0184', 'EJ. SALVADOR URBINA', NULL, NULL),
(24, '0185', 'EJ. ROSARIO IXTAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `telefono`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@gmail.com', NULL, '9621863131', '$2y$12$xz86Vn0Iajgf5h/EnpcVueuPkjt6s.oTcVFU4phQJnYEG4pIXYzTK', NULL, '2024-03-08 10:09:05', '2024-03-14 03:59:30'),
(2, 'prueba', 'prueba@gmail.com', NULL, '9621863131', '$2y$12$gFD4IeFevXqvS0ZcG4PPPu8EbAJiM2ymWpUH5B.ismgMVc7dt.coK', NULL, '2024-03-11 02:22:35', '2024-03-14 04:25:56'),
(3, 'lider', 'lider@gmail.com', NULL, '5653454345', '$2y$12$/48xe46RVxzzitopsq8lmuMUpRectV6yCEsBE6sdqPvg6wx2LidHO', NULL, '2024-03-14 04:12:02', '2024-03-14 04:12:02'),
(4, 'lider2', 'lider2@gmail.com', NULL, '8548568525', '$2y$12$Vr0GqoDL0FbvPh/QBEFFBu/Dh9Ko/nTKSRlkD3rSCKJJYqIekKcPK', NULL, '2024-03-14 20:05:17', '2024-03-14 20:05:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observacion_promovido`
--
ALTER TABLE `observacion_promovido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_promovido` (`promovido_id`),
  ADD KEY `id_observacion` (`observacion_id`);

--
-- Indices de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `promovidos`
--
ALTER TABLE `promovidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave_elec` (`clave_elec`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ocupacion` (`id_ocupacion`),
  ADD KEY `seccion_elec` (`id_seccion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `observacion_promovido`
--
ALTER TABLE `observacion_promovido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promovidos`
--
ALTER TABLE `promovidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `observacion_promovido`
--
ALTER TABLE `observacion_promovido`
  ADD CONSTRAINT `observacion_promovido_ibfk_1` FOREIGN KEY (`observacion_id`) REFERENCES `observaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `observacion_promovido_ibfk_2` FOREIGN KEY (`promovido_id`) REFERENCES `promovidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promovidos`
--
ALTER TABLE `promovidos`
  ADD CONSTRAINT `promovidos_ibfk_2` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promovidos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promovidos_ibfk_4` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
