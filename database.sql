-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.5-10.0.4-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `laravel`;


-- Volcando estructura para tabla laravel.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.categories: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `url`, `description`) VALUES
	(1, 'General', 'general', 'Categoría general'),
	(2, 'Laravel', 'laravel', 'Trucos sobre laravel');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Volcando estructura para tabla laravel.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_user` (`user_id`),
  KEY `comment_post` (`post_id`),
  CONSTRAINT `comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.comments: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
	(1, 1, 1, 'Probando los comentarios', '2013-09-28 00:55:18'),
	(2, 1, 2, 'Yo también pruebo los comentarios', '2013-09-28 00:57:12'),
	(3, 1, 3, 'Anda, y yo!', '2013-09-28 00:57:24'),
	(4, 1, 1, 'Probando probando', '2013-09-28 01:01:51'),
	(5, 1, 1, 'Probando desde el form', '2013-09-28 01:03:27'),
	(6, 1, 1, 'Y otra prueba más', '2013-09-28 01:04:13'),
	(7, 4, 1, 'Claro que sí!', '2013-09-28 01:04:30'),
	(8, 4, 1, 'Escribiendo un comentario!', '2013-09-28 03:06:10'),
	(9, 1, 1, 'Probando en vivo', '2013-09-28 05:31:48'),
	(10, 2, 1, 'Soy el primero!', '2013-09-28 05:33:08');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Volcando estructura para tabla laravel.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comments` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user` (`user_id`),
  CONSTRAINT `post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.posts: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `url`, `content`, `status`, `created_at`, `updated_at`, `comments`) VALUES
	(1, 1, 'Curso de Laravel 4', 'curso-de-laravel-4', '<p>Artículo tratando sobre Laravel 4</p>', 1, '2013-09-27 23:24:20', '2013-09-28 03:50:50', 0),
	(2, 2, 'Otro artículo NO SI', 'otro-articulo', '<p>Otro artículo</p>', 1, '2013-09-27 23:25:01', '2013-09-28 03:53:24', 0),
	(4, 1, 'Prueba de artículo a través del form', 'prueba-de-articulo-a-traves-del-form', 'Probando probando', 1, '2013-09-27 22:35:00', '2013-09-27 22:35:28', 0),
	(5, 1, 'Prueba de artículo a través del form', 'prueba-de-articulo-a-traves-del-form-1', 'Probando probando', 1, '2013-09-27 22:35:00', '2013-09-28 02:44:08', 0),
	(6, 3, 'Prueba de artículo a través del form', 'prueba-de-articulo-a-traves-del-form-2', 'Probando probando', 0, '2013-09-27 22:35:00', '2013-09-28 02:44:12', 0),
	(7, 7, 'Nuevo artículo en vivo', 'nuevo-articulo-en-vivo', '<p>Contenido del artículo</p>', 1, '2013-09-28 03:50:04', '2013-09-28 03:50:04', 0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Volcando estructura para tabla laravel.relationships
CREATE TABLE IF NOT EXISTS `relationships` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `relation_category` (`category_id`),
  CONSTRAINT `relation_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `relation_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.relationships: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `relationships` DISABLE KEYS */;
INSERT INTO `relationships` (`post_id`, `category_id`) VALUES
	(1, 2),
	(2, 2),
	(4, 2),
	(7, 1);
/*!40000 ALTER TABLE `relationships` ENABLE KEYS */;


-- Volcando estructura para tabla laravel.sites
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `footer` text NOT NULL,
  `maintenance` tinyint(1) unsigned NOT NULL,
  `maintenance_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.sites: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` (`id`, `name`, `slogan`, `footer`, `maintenance`, `maintenance_text`) VALUES
	(1, 'Curso de Laravel', 'Creando una APP completa. Por JaimeMSE', '<p>Copyright 2013</p>', 0, '<p>Estamos en mantenimiento</p>');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;


-- Volcando estructura para tabla laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `comments` int(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla laravel.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `comments`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'JaimeMSE', 'jaimemse@gmail.com', '$2y$08$zYFICVZEnrfajIUgAT2LN.h2f5m5jC3PWIphdKA1dxeHCRqwq6xr6', 0, 2, '2013-09-27 16:33:57', '2013-09-28 01:04:52'),
	(2, 'Alicia', 'alicia@gmail.com', '$2y$08$OCEpZCjRUo.YGNsLJAIbEOLUjURejBIJcdaEk44DWZHLlcmJPM87y', 0, 1, '2013-09-27 16:33:57', '2013-09-28 01:04:54'),
	(3, 'Bienve', 'bienve@bienve.com', '$2y$08$qNC1CPnOh2t7S0GdvGnpde3hYeBKH58b8CmX11dqICksvtwE7AqlK', 0, 1, '2013-09-27 16:33:57', '2013-09-27 16:33:57'),
	(4, 'Otro', 'otro@otro.com', '$2y$08$Ogjq2PZGpA3GzihpRP1sBuDUTFrqdNeEctkm6nmZ.pforZruGNYai', 0, 1, '2013-09-27 16:34:53', '2013-09-27 16:34:53'),
	(5, 'Usuario', 'usuario@usuario.com', '$2y$08$pOw5svkn1F/7HeKFCuunDeCAdae8VJCVRFEwCA8qqrr6VKNbH3cay', 0, 2, '2013-09-28 01:25:18', '2013-09-28 03:27:26'),
	(6, 'Otrou', 'otro@otrou.com', '$2y$08$uHjJwwyF0mAzfD8zpvDIje7A1zp62fYKlPcE6HquiaAemdUNwsxky', 0, 1, '2013-09-28 01:26:02', '2013-09-28 01:26:02'),
	(7, 'Pepito', 'pepito@algo.com', '$2y$08$Nw3aCS28eww59WR4L/O3KeDZvqI0sHtWrXjc7rNFkjCY3MKc1pUFq', 0, 2, '2013-09-28 03:37:59', '2013-09-28 05:38:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
