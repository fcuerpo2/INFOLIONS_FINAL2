-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2018 a las 21:29:20
-- Versión del servidor: 5.6.40
-- Versión de PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qzw186`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Album`
--

CREATE TABLE `Album` (
  `IdAlbum` bigint(10) NOT NULL,
  `IdUsuario` int(10) NOT NULL,
  `Titulo` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatters`
--

CREATE TABLE `chatters` (
  `IdChatter` int(11) NOT NULL,
  `name` text NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chatters`
--

INSERT INTO `chatters` (`IdChatter`, `name`, `seen`) VALUES
(10, 'Carlos  Acevedo JimÃ©nez', '2018-05-30 20:51:08'),
(9, 'Felipe Cuerpo', '2018-05-30 19:57:00'),
(11, 'Juan Carlos BugÃ©s BugÃ©s', '2018-05-30 20:49:01'),
(12, 'Betty-Chan ', '2018-05-30 19:20:11'),
(13, 'edgar fer', '2018-05-30 20:56:30'),
(16, 'Javier Garcia', '2018-05-30 20:44:53'),
(17, 'Betty-Chan Blanco Santos', '2018-05-30 20:28:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `idComentario` bigint(20) NOT NULL,
  `idTag` int(11) NOT NULL DEFAULT '0',
  `idUsuarioEnvio` int(11) NOT NULL DEFAULT '0',
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cabecera` text,
  `Texto` text,
  `Imagen` text,
  `Longitud` text,
  `Latitud` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Comentarios`
--

INSERT INTO `Comentarios` (`idComentario`, `idTag`, `idUsuarioEnvio`, `Fecha`, `Cabecera`, `Texto`, `Imagen`, `Longitud`, `Latitud`) VALUES
(1, 39, 13, '2018-05-30 17:00:17', 'Respuesta', 'Prueba comentario', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_usuario` varchar(50) NOT NULL,
  `id_contacto` varchar(50) NOT NULL,
  `tipoRelacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Foto`
--

CREATE TABLE `Foto` (
  `IdFoto` bigint(10) NOT NULL,
  `IdAlbum` bigint(10) NOT NULL,
  `IdTag` bigint(10) NOT NULL,
  `Nombre` text CHARACTER SET utf8 NOT NULL,
  `Ruta` text CHARACTER SET utf8 NOT NULL,
  `FechaSubida` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` tinyint(4) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_creador` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposUsuarios`
--

CREATE TABLE `gruposUsuarios` (
  `id_grupo` tinyint(4) NOT NULL,
  `id_usuario` tinyint(4) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Likes`
--

CREATE TABLE `Likes` (
  `IdLikes` int(11) NOT NULL,
  `IdUsuarioEnvia` int(11) NOT NULL,
  `IdUsuarioRecibe` int(11) NOT NULL,
  `IdComentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Likes`
--

INSERT INTO `Likes` (`IdLikes`, `IdUsuarioEnvia`, `IdUsuarioRecibe`, `IdComentario`) VALUES
(1, 6, 12, 29),
(5, 6, 6, 36),
(6, 12, 12, 27),
(13, 13, 12, 38),
(20, 12, 9, 37),
(28, 12, 13, 39),
(30, 11, 13, 41),
(31, 11, 6, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `name` text NOT NULL,
  `msg` text NOT NULL,
  `posted` varchar(20) NOT NULL,
  `Id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`name`, `msg`, `posted`, `Id`) VALUES
('Felipe Cuerpo', 'Mola ???', '2018-05-30 14:11:11', 61),
('Felipe Cuerpo', 'hola', '2018-05-30 14:08:58', 60),
('Felipe Cuerpo', 'Prueba de Chat', '2018-05-30 13:59:34', 57),
('Juan Carlos BugÃ©s BugÃ©s', 'ahora si que mola', '2018-05-30 16:25:44', 62),
('Carlos  Acevedo JimÃ©nez', 'Poz ziii  y tal y tal', '2018-05-30 16:27:52', 63),
('Betty-Chan ', 'Hola, gracias Javi', '2018-05-30 16:31:18', 64),
('Felipe Cuerpo Molina', 'hola', '2018-05-30 16:37:38', 65),
('Betty-Chan ', 'Edgar, escribe algo porfa', '2018-05-30 16:38:41', 66),
('Felipe Cuerpo', 'hola betty', '2018-05-30 16:42:35', 67),
('Felipe Cuerpo', 'HACEMOS LA PAUSA', '2018-05-30 18:17:20', 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `idAnuncio` int(11) NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  `titulo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `visto` int(11) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL,
  `fecha_publicacion` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tags`
--

CREATE TABLE `Tags` (
  `idTag` bigint(20) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Cabecera` text NOT NULL,
  `Texto` text NOT NULL,
  `Imagen` text,
  `Likes` int(11) NOT NULL DEFAULT '0',
  `Fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Latitud` text,
  `Longitud` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tags`
--

INSERT INTO `Tags` (`idTag`, `idUsuario`, `Cabecera`, `Texto`, `Imagen`, `Likes`, `Fecha`, `Latitud`, `Longitud`) VALUES
(12, 5, 'Este es el primer dtag', 'Este es el primer tag del entorno', NULL, 0, '2018-05-17 21:51:17', '', ''),
(13, 5, 'Esto es una prueba', 'Esto es una prueba', NULL, 0, '2018-05-17 21:52:22', '', ''),
(14, 6, 'Que tal estamos', 'funciona', NULL, 0, '2018-05-17 21:56:49', '', ''),
(15, 7, 'Hola soy Marga', 'Este es un valor que funciona', NULL, 0, '2018-05-17 22:02:11', '', ''),
(16, 6, 'Desde el movil', 'Tag introducido desde el movil', NULL, 0, '2018-05-18 14:46:03', '', ''),
(17, 10, 'hola', 'Ya me he conectado por fin.', NULL, 0, '2018-05-18 14:52:10', '', ''),
(18, 9, 'Infolions', 'Hola, me llamó Betty-chan, quiero aprender php y base de datos, gracias por todo.\r\nSomos leones o ratones....', NULL, 0, '2018-05-18 14:52:21', '', ''),
(19, 11, '', 'hola soy edgar ', NULL, 0, '2018-05-18 14:55:11', '', ''),
(20, 6, 'Hola', 'Estamos en el Viena', NULL, 0, '2018-05-19 21:27:47', '', ''),
(21, 6, 'Hola estamos en clase', 'Hoy Miercoles 23 de Mayo del 2018', NULL, 0, '2018-05-23 18:56:23', '', ''),
(22, 12, 'Hola hola caracola', 'Cola loca loca cola psicola coloa moca poca troca loerm ipsum trim,pun sdsd ad asdfklk slklk laskdflk laskdflk laskdlf asfd asdf asdfasf y vamos a la pausa ,ja ja jaj aj jajj aj jaj jaj ja jaj ja jaj aj aj aj jaj aj aj jaajjaaj ja j', NULL, 0, '2018-05-28 16:05:51', '', ''),
(23, 12, 'ja ja ', 'Al patio', NULL, 0, '2018-05-28 16:10:04', '', ''),
(24, 12, '', '', NULL, 0, '2018-05-28 16:57:04', '', ''),
(25, 6, 'Prueba Javi', 'Esto es un test', NULL, 0, '2018-05-28 17:03:36', '', ''),
(26, 6, 'Prueba 2 Javi', 'Otro Test', NULL, 0, '2018-05-28 17:05:47', '', ''),
(27, 12, 'Pruebas de TAG', 'Este es otro tag y tal y tal.', NULL, 0, '2018-05-28 17:10:49', '', ''),
(28, 6, 'Prueba 3 Javi', 'Hola', NULL, 0, '2018-05-28 17:12:36', '', ''),
(29, 12, 'Pruebas de TAG', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/RPqAiJy2U-Y\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', NULL, 0, '2018-05-28 17:24:52', '', ''),
(30, 6, 'javi', 'va ?', NULL, 0, '2018-05-28 17:39:53', '', ''),
(31, 6, 'Javi', 'Ok', NULL, 0, '2018-05-28 17:42:45', '', ''),
(32, 6, 'Javi', 'Testttttt', NULL, 0, '2018-05-28 17:57:16', '', ''),
(33, 6, 'Poner Like', 'test bueno', NULL, 0, '2018-05-28 18:04:04', '', ''),
(34, 6, 'Hola', 'Estamos de servicio', NULL, 0, '2018-05-29 18:11:52', '', ''),
(35, 6, 'Sin pijama', 'https://youtu.be/zEf423kYfqk', NULL, 0, '2018-05-29 18:16:39', '', ''),
(36, 6, 'Hola !!!', 'Quien esta haciendo pruebas ??? Soy Javi', NULL, 0, '2018-05-29 18:18:02', '', ''),
(37, 9, 'Ayuda', 'Felipe, luego vienes ayudarme con lo de Admin.... y a Juan Carlos.', NULL, 0, '2018-05-30 14:32:11', '', ''),
(38, 12, '', '', NULL, 0, '2018-05-30 15:37:09', '', ''),
(39, 13, 'Prueba para comentarios', 'Tag 37 Para Pruebas', NULL, 0, '2018-05-30 16:54:41', '', ''),
(40, 6, 'Tag geolocalizado', 'Tag geolocalizado texto prueba 1', NULL, 0, '2018-05-30 17:53:50', '', ''),
(41, 13, 'Geolocaliza', 'Prueba', NULL, 0, '2018-05-30 17:58:21', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` bigint(20) UNSIGNED NOT NULL,
  `Nombre` text,
  `Apellidos` text,
  `Sexo` char(50) DEFAULT NULL,
  `EstadoCivil` text,
  `FechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaLogin` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enLinea` tinyint(1) NOT NULL,
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
  `Longitud` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Apellidos`, `Sexo`, `EstadoCivil`, `FechaAlta`, `FechaLogin`, `enLinea`, `Telefono`, `Movil`, `password`, `Email`, `Web`, `FotoPortada`, `Activo`, `Confirmado`, `Aficiones`, `Direccion`, `CP`, `Provincia`, `Ciudad`, `Pais`, `TipoPerfil`, `Latitud`, `Longitud`) VALUES
(5, 'manel', 'Navarro', 'Hombre', 'Soltero', '2018-05-17 21:47:07', NULL, 0, '444444444', '444444444', '123456', 'manel@gmail.com', '', '5-manel.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Felipe', 'Cuerpo', 'Hombre', 'Casado', '2018-05-17 21:53:32', '2018-05-30 18:04:04', 0, '5555555', '222222222', '123456', 'fcuerpo@gmail.com', '', '6-felipe.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'margarita', 'Rodriguez Garcel', 'Mujer', 'Soltera', '2018-05-17 21:59:03', NULL, 0, '222333222', '222333222', '123456', 'marga@gmail.com', '', '7-new-marga-profile-home.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'edgar', NULL, NULL, NULL, '2018-05-18 14:47:22', NULL, 0, NULL, NULL, 'a1234', 'edgar@fer.com', NULL, '8-images (1).jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Betty-Chan', 'Blanco Santos', '', '', '2018-05-18 14:47:26', '2018-05-30 17:56:16', 0, '', '', 'Vampiro13!', 'neo.bettyboop2018@gmail.com', '', '9-kimbum.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Juan Carlos', 'Bugés Bugés', 'hombre', 'Separado', '2018-05-18 14:48:02', NULL, 0, '', '', '13051960', 'jcbuges@gmail.com', '', '10-yo.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'edgar', 'fer', '', '', '2018-05-18 14:52:39', NULL, 0, '', '', '12345', 'edgar@hotmail.com', '', '11-images (1).jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Carlos ', 'Acevedo Jiménez', 'Todo lo que se puede', 'Casado', '2018-05-28 16:04:13', '2018-05-28 20:17:15', 0, '639 444 444', 'el mismo', 'Carlos100', 'carlos.acevedo.jimenez@gmail.com', 'TanakaSoft.com', '12-carlos.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Javier', 'Garcia Atance', 'Hombre', 'Soltero', '2018-05-30 16:40:28', '2018-05-30 20:38:23', 0, '555555555', '666666666', '123456', 'rotulance@gmail.com', NULL, '10-yo.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Emmanuel', NULL, NULL, NULL, '2018-05-30 17:26:23', '2018-05-30 19:26:23', 0, NULL, NULL, '123456', 'emm@nuel.com', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Emmanuel', NULL, NULL, NULL, '2018-05-30 17:46:10', '2018-05-30 19:46:10', 0, NULL, NULL, '123456', 'e@email.com', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`IdAlbum`);

--
-- Indices de la tabla `chatters`
--
ALTER TABLE `chatters`
  ADD PRIMARY KEY (`IdChatter`);

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD KEY `email_usuario` (`id_usuario`),
  ADD KEY `email_contacto` (`id_contacto`);

--
-- Indices de la tabla `Foto`
--
ALTER TABLE `Foto`
  ADD PRIMARY KEY (`IdFoto`);

--
-- Indices de la tabla `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`IdLikes`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`idAnuncio`);

--
-- Indices de la tabla `Tags`
--
ALTER TABLE `Tags`
  ADD PRIMARY KEY (`idTag`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Album`
--
ALTER TABLE `Album`
  MODIFY `IdAlbum` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chatters`
--
ALTER TABLE `chatters`
  MODIFY `IdChatter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `idComentario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Foto`
--
ALTER TABLE `Foto`
  MODIFY `IdFoto` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Likes`
--
ALTER TABLE `Likes`
  MODIFY `IdLikes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tags`
--
ALTER TABLE `Tags`
  MODIFY `idTag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
