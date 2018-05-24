-- --------------------------------------------------------
-- Host:                         192.168.9.108
-- Versión del servidor:         10.1.31-MariaDB - Source distribution
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para INFOLIONS
CREATE DATABASE IF NOT EXISTS `INFOLIONS` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `INFOLIONS`;

-- Volcando estructura para tabla INFOLIONS.Comentarios
CREATE TABLE IF NOT EXISTS `Comentarios` (
  `idComentario` bigint(20) NOT NULL AUTO_INCREMENT,
  `idTag` int(11) NOT NULL DEFAULT '0',
  `idUsuarioEnvio` int(11) NOT NULL DEFAULT '0',
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cabecera` text,
  `Texto` text,
  `Imagen` text,
  `Longitud` text,
  `Latitud` text,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla INFOLIONS.Comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `Comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Comentarios` ENABLE KEYS */;

-- Volcando estructura para tabla INFOLIONS.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `idImagen` bigint(20) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT '0',
  `ruta` text,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla INFOLIONS.imagenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;

-- Volcando estructura para tabla INFOLIONS.Tags
CREATE TABLE IF NOT EXISTS `Tags` (
  `idTag` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL DEFAULT '0',
  `Cabecera` text NOT NULL,
  `Texto` text NOT NULL,
  `Imagen` text,
  `Likes` int(11) NOT NULL DEFAULT '0',
  `Fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Latitud` text,
  `Longitud` text,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla INFOLIONS.Tags: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `Tags` DISABLE KEYS */;
INSERT INTO `Tags` (`idTag`, `idUsuario`, `Cabecera`, `Texto`, `Imagen`, `Likes`, `Fecha`, `Latitud`, `Longitud`) VALUES
	(1, 1, 'Hola esto funciona', 'Hemos visto que esto va bien', NULL, 0, '2018-05-11 20:12:32', '', ''),
	(2, 1, 'Hoy ha hecho buen dia', 'Hoy en Hospitalet hemos tomado un café en la terraza', NULL, 0, '2018-05-11 20:32:52', '', ''),
	(3, 1, 'Hoy ha hecho mal dia', 'Hoy en Hospitalet hemos tomado un café en la terraza', NULL, 0, '2018-05-11 20:33:20', '', ''),
	(4, 1, 'Hoy ha hecho dia regular', 'Hoy en las Bahamas hemos tomado un café en la terraza', NULL, 0, '2018-05-11 20:34:17', '', ''),
	(5, 4, 'Soy Juan', 'Soy Juan. bieeeennnnn', NULL, 0, '2018-05-11 20:35:02', '', ''),
	(6, 4, 'dsfadfaf', 'asdfasfas', NULL, 0, '2018-05-11 20:48:10', '', ''),
	(7, 4, 'rrrrrr', 'rrrrrr', NULL, 0, '2018-05-11 20:49:48', '', ''),
	(8, 4, 'HJola aldlafjladfjalñf', 'adfadfadfasfa', NULL, 0, '2018-05-11 20:50:52', '', ''),
	(9, 4, 'dfadf', 'asdfasdfas', NULL, 0, '2018-05-11 20:51:54', '', ''),
	(10, 4, 'dfasdfasdf', 'asdfasdfasf', NULL, 0, '2018-05-11 20:52:28', '', ''),
	(11, 1, 'eqwerqwerq', 'qwerqwrqw', NULL, 0, '2018-05-11 20:55:43', '', '');
/*!40000 ALTER TABLE `Tags` ENABLE KEYS */;

-- Volcando estructura para tabla INFOLIONS.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` text,
  `Apellidos` text,
  `Sexo` char(50) DEFAULT NULL,
  `EstadoCivil` text,
  `FechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaLastLogin` datetime DEFAULT NULL,
  `Telefono` text,
  `Movil` text,
  `password` text,
  `Email` text,
  `Web` text,
  `FotoPortada` text,
  `Activo` tinyint(4) DEFAULT '1',
  `Confirmado` tinyint(4) DEFAULT '0',
  `Aficiones` text,
  `Direccion` text,
  `CP` varchar(6) DEFAULT NULL,
  `Provincia` text,
  `Ciudad` text,
  `Pais` text,
  `TipoPerfil` text,
  `Latitud` text,
  `Longitud` text,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla INFOLIONS.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Apellidos`, `Sexo`, `EstadoCivil`, `FechaAlta`, `FechaLastLogin`, `Telefono`, `Movil`, `password`, `Email`, `Web`, `FotoPortada`, `Activo`, `Confirmado`, `Aficiones`, `Direccion`, `CP`, `Provincia`, `Ciudad`, `Pais`, `TipoPerfil`, `Latitud`, `Longitud`) VALUES
	(1, 'Felipe', 'Cuerpo Molina', 'Hombre', 'Casado', '2018-05-04 20:38:05', '2018-05-04 20:38:11', '444455556', '454545454545', '123456', 'fcuerpo@gmail.com', 'fcuerpo.blogspot.com', '1-ferraritestarossa.jpg', 1, 0, NULL, NULL, NULL, 'Barcelona', 'Barcelona', NULL, NULL, NULL, NULL),
	(2, 'Margarita', 'Rodriguez Garcel', 'Mujer', 'Soltera', '2018-05-10 18:16:04', NULL, '333333333', '444444444', '123456', 'marga@gmail.com', 'marga.blogspot.com', '2-ferraritestarossa.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Pedro', 'Picapiedra', 'Hombre', 'Casado', '2018-05-10 18:20:52', NULL, '34134144', '34134141', '12345', 'pedro@gmail.com', '', '3-lamborghini.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'Juan', 'Lopez Arroyo', 'Otros', 'Casado', '2018-05-10 19:59:47', NULL, '888888888', '9999999999', '123456', 'juan@gmail.com', '', '4-bugattichiron.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
