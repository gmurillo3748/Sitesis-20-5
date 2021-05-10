-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2021 at 09:33 PM
-- Server version: 5.7.34
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagaments`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `curs_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Indica a que curso pertenece esta categoría',
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `curs_id`, `updated_by`, `created_by`, `updated_at`, `created_at`) VALUES
(13, 'ESO', NULL, 3, 3, '2021-05-10 13:17:30', '2021-05-10 13:17:30'),
(14, 'Batxillerat', NULL, 3, 3, '2021-05-10 13:17:40', '2021-05-10 13:17:40'),
(15, 'Cicles Formatius', NULL, 3, 3, '2021-05-10 13:17:49', '2021-05-10 13:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(10) UNSIGNED NOT NULL,
  `compte` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuc` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL COMMENT 'ID del usuario que ha modificado el registro por última vez. ',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'ID del usuario que ha creado el registro. ',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp de la última modificación del registro. ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp de la creación del registro. '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comptes`
--

INSERT INTO `comptes` (`id`, `compte`, `fuc`, `clau`, `updated_by`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 'Matrícules', 'fasdfsfsfsadfsafas', 'dfsadfsdafasdfsfa', 3, 3, '2021-05-04 16:11:40', '2021-05-04 16:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `curs`
--

CREATE TABLE `curs` (
  `id` int(10) UNSIGNED NOT NULL,
  `curs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'ID del usuario que ha modificado el registro por última vez.',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'ID del usuario que ha creado el registro.',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp de la última modificación del registro.',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp de la creación del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curs`
--

INSERT INTO `curs` (`id`, `curs`, `updated_by`, `created_by`, `updated_at`, `created_at`) VALUES
(9, 'ESO', 3, 3, '2021-05-04 13:46:19', '2021-05-04 11:48:50'),
(14, 'Batxillerat', 3, 3, '2021-05-04 13:45:49', '2021-05-04 13:45:02'),
(16, 'Cicles Formatius', 3, 3, '2021-05-04 15:19:39', '2021-05-04 15:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `pagaments`
--

CREATE TABLE `pagaments` (
  `id` int(10) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `preu` decimal(10,2) UNSIGNED NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagaments`
--

INSERT INTO `pagaments` (`id`, `descripcion`, `nombre`, `compte_id`, `categoria_id`, `preu`, `data_inicial`, `data_final`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '<p>Benvolgudes fam&iacute;lies,</p>\r\n\r\n<p><strong>A PAGAR</strong>.</p>\r\n\r\n<blockquote>\r\n<p>Prueba Wysiwyg</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'PAGAMENT DESPESES ESCOLARS CURS 2020-2021', 1, 13, '14.99', '2021-05-06', '2021-05-18', 3, 3, '2021-05-10 18:41:48', '2021-05-10 16:41:48'),
(2, '<p>Benvolgudes fam&iacute;lies,</p>\r\n\r\n<p>Heu de fer el pagament per adherir-vos al projecte de reciclatge.</p>', 'Adhesió projecte reciclatge llibres Ajuntament', 1, 14, '2.99', '2021-05-12', '2021-05-19', 3, 3, '2021-05-10 15:04:56', '2021-05-10 15:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(1) NOT NULL DEFAULT '1' COMMENT '0=Administrador,1=Profesor',
  `activo` tinyint(1) DEFAULT '1' COMMENT '0=Inactiu,1=actiu',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `activo`, `updated_at`, `created_at`) VALUES
(1, 'facund', 'facun772@gmail.com', '$2y$10$aVTerBXLNPsHOXpnrTcaZePAEJXy1ALK20FDsdC6YJLZ8qmjD1k.e', 1, 1, '2021-05-10 16:16:51', '2021-05-10 18:16:51'),
(2, 'Gloria', 'gloria@inscamidemar.cat', '$2y$10$Uv4Zeabtf09kElIWaQuLGOfFeBCK1WMaK0EP98urcRQR87vhgoD5m', 0, 1, '2021-05-10 16:17:44', '2021-05-10 18:17:44'),
(3, 'facundo', 'fsilva@inscamidemar.cat', '$2y$10$12VnVnvK4Vw0HCtSJtxB/u8QQIYfUazz2yw.v1SX6J39Jg.N9H5Oi', 0, 1, '2021-04-27 16:04:22', '2021-04-28 14:56:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curs`
--
ALTER TABLE `curs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagaments`
--
ALTER TABLE `pagaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `curs`
--
ALTER TABLE `curs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pagaments`
--
ALTER TABLE `pagaments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
