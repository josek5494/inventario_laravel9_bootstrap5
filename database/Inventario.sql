-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para inventario
CREATE DATABASE IF NOT EXISTS `inventario` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `inventario`;

-- Volcando estructura para tabla inventario.almacenes
CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.almacenes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `almacenes` DISABLE KEYS */;
INSERT IGNORE INTO `almacenes` (`id`, `nombre`, `localizacion`, `created_at`, `updated_at`) VALUES
	(1, 'El Sebadal', 'Gran Canaria', '2022-04-30 09:33:50', '2022-04-30 09:33:50'),
	(2, 'San Fernando', 'Gran Canaria', '2022-04-30 09:33:50', '2022-04-30 09:33:50'),
	(3, 'Santa Cruz', 'Tenerife', '2022-04-30 09:33:50', '2022-04-30 09:33:50'),
	(4, 'La Laguna', 'Tenerife', '2022-04-30 09:33:51', '2022-04-30 09:33:51');
/*!40000 ALTER TABLE `almacenes` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.categorias: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT IGNORE INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Alimentación', 'Comida y productos alimentarios.', '2022-04-30 09:33:50', '2022-04-30 09:33:50'),
	(2, 'Limpieza', 'Todo lo relacionado con la limpieza.', '2022-04-30 09:33:50', '2022-04-30 09:33:50'),
	(3, 'Higiene', 'Higiene y cuidado de las personas.', '2022-04-30 09:33:50', '2022-04-30 09:33:50');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.migrations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, 'create_almacenes_table', 1),
	(2, 'create_categorias_table', 2),
	(3, 'create_productos_table', 3),
	(4, 'create_productos_almacenes_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No hay observaciones.',
  `id_categoria` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.productos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT IGNORE INTO `productos` (`id`, `nombre`, `precio`, `observaciones`, `id_categoria`, `created_at`, `updated_at`) VALUES
	(1, 'Zanahoria', 1.50, 'Es naranja.', 1, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(2, 'Patata', 0.50, 'Es redonda.', 1, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(3, 'Detergente', 3.50, 'Para lavar la ropa a mano o en la lavadora.', 2, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(4, 'Champú', 2.50, 'Para todo tipo de pelo.', 3, '2022-04-30 09:33:51', '2022-05-02 08:31:03'),
	(5, 'Fregona', 4.00, 'Para limpiar el suelo.', 2, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(6, 'Cepillo de dientes', 1.00, 'Con cerdas de diferente dureza.', 3, '2022-04-30 09:33:51', '2022-04-30 09:33:51');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.productos_almacenes
CREATE TABLE IF NOT EXISTS `productos_almacenes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` bigint(20) unsigned NOT NULL,
  `id_almacen` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_almacenes_id_producto_foreign` (`id_producto`),
  KEY `productos_almacenes_id_almacen_foreign` (`id_almacen`),
  CONSTRAINT `productos_almacenes_id_almacen_foreign` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productos_almacenes_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.productos_almacenes: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_almacenes` DISABLE KEYS */;
INSERT IGNORE INTO `productos_almacenes` (`id`, `id_producto`, `id_almacen`, `created_at`, `updated_at`) VALUES
	(3, 2, 2, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(4, 3, 4, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(5, 3, 2, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(9, 5, 1, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(10, 6, 3, '2022-04-30 09:33:51', '2022-04-30 09:33:51'),
	(13, 1, 1, '2022-04-30 15:18:19', '2022-04-30 15:18:19'),
	(14, 1, 2, '2022-04-30 15:18:19', '2022-04-30 15:18:19'),
	(15, 1, 4, '2022-04-30 15:18:19', '2022-04-30 15:18:19'),
	(20, 4, 1, '2022-05-02 08:31:03', '2022-05-02 08:31:03'),
	(21, 4, 3, '2022-05-02 08:31:04', '2022-05-02 08:31:04');
/*!40000 ALTER TABLE `productos_almacenes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
