-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2019 a las 03:35:32
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cancionero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `access`
--

INSERT INTO `access` (`id`, `id_role`, `type`, `method`, `url`) VALUES
(1, 3, 'API', 'GET', 'Canciones/All'),
(2, 3, 'API', 'GET', 'Canciones/Get/[id]'),
(3, 3, 'API', 'GET', 'Comentarios/Cancion/[idCancion]'),
(4, 1, 'API', 'GET', 'User/Session'),
(5, 3, 'API', 'GET', 'User/Session'),
(6, 1, 'API', 'POST', 'User/Login'),
(7, 3, 'API', 'POST', 'User/Login'),
(8, 3, 'API', 'GET', 'User/Logout'),
(9, 1, 'API', 'POST', 'User/Register'),
(10, 3, 'API', 'POST', 'User/Register'),
(11, 1, 'SYNC', 'GET', 'User/Login'),
(12, 3, 'SYNC', 'GET', 'User/Login'),
(13, 3, 'SYNC', 'GET', 'User/Logout'),
(14, 3, 'SYNC', 'GET', 'Canciones/Get'),
(15, 1, 'SYNC', 'GET', 'Canciones/Get'),
(16, 3, 'SYNC', 'GET', 'Canciones/Get/[id]'),
(17, 3, 'API', 'POST', 'Comentarios/New'),
(18, 3, 'SYNC', 'POST', 'Imagenes/Cancion/New'),
(19, 3, 'API', 'DELETE', 'Imagenes/Delete'),
(20, 3, 'API', 'DELETE', 'Comentarios/Delete'),
(21, 3, 'API', 'PATCH', 'Canciones/Patch'),
(22, 3, 'SYNC', 'GET', 'Canciones/Edit/[id]'),
(23, 3, 'API', 'GET', 'Artistas/All'),
(24, 3, 'API', 'GET', 'Canciones/Patch'),
(25, 3, 'SYNC', 'GET', 'Artistas/Get'),
(26, 3, 'API', 'DELETE', 'Canciones/Delete'),
(27, 3, 'SYNC', 'GET', 'Canciones/Create'),
(28, 3, 'API', 'POST', 'Canciones/New'),
(29, 3, 'API', 'DELETE', 'Artistas/Delete'),
(30, 3, 'SYNC', 'GET', 'Artistas/Create'),
(31, 3, 'SYNC', 'POST', 'Artistas/New'),
(32, 3, 'API', 'POST', 'Artistas/New'),
(33, 3, 'SYNC', 'GET', 'Artistas/Edit/[id]'),
(34, 3, 'API', 'GET', 'Artistas/Get/[id]'),
(35, 3, 'API', 'PATCH', 'Artistas/Patch'),
(36, 3, 'API', 'GET', 'User/Session'),
(37, 1, 'API', 'GET', 'User/Session'),
(38, 2, 'API', 'GET', 'User/Session'),
(39, 2, 'API', 'GET', 'User/Logout'),
(40, 3, 'SYNC', 'GET', 'Users/Get'),
(41, 3, 'API', 'GET', 'Users/All'),
(42, 3, 'API', 'GET', 'Roles/All'),
(43, 3, 'API', 'PATCH', 'User/Role/Patch'),
(44, 3, 'API', 'GET', 'Access/All'),
(45, 1, 'API', 'GET', 'Access/All'),
(46, 1, 'API', 'GET', 'Canciones/All'),
(47, 1, 'SYNC', 'GET', 'Canciones/Get/[id]'),
(48, 1, 'API', 'GET', 'Canciones/Get/[id]'),
(49, 1, 'API', 'GET', 'Comentarios/Cancion/[idcancion]'),
(50, 1, 'SYNC', 'GET', 'User/Register'),
(51, 2, 'SYNC', 'GET', 'Canciones/Get'),
(52, 2, 'API', 'GET', 'Access/All'),
(53, 2, 'API', 'GET', 'Canciones/All'),
(54, 2, 'API', 'GET', 'Canciones/Get/[id]'),
(55, 2, 'SYNC', 'GET', 'Canciones/Get/[id]'),
(56, 2, 'API', 'GET', 'Comentarios/Cancion/[idcancion]'),
(57, 2, 'API', 'POST', 'Comentarios/New'),
(58, 2, 'SYNC', 'GET', 'Artistas/Get'),
(59, 2, 'API', 'GET', 'Artistas/Get/[id]'),
(60, 2, 'API', 'GET', 'Artistas/All');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechanac` date NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `apellido`, `fechanac`, `ranking`) VALUES
(11, '123', '123', '0000-00-00', 12312),
(12, '123', '123', '0123-03-12', 12323);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` time NOT NULL,
  `genero` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id`, `nombre`, `duracion`, `genero`, `album`, `id_artista`, `ranking`) VALUES
(15, 'TEst1', '00:00:02', '231', '123', 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancionimagenes`
--

CREATE TABLE `cancionimagenes` (
  `id` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cancionimagenes`
--

INSERT INTO `cancionimagenes` (`id`, `id_cancion`, `path`) VALUES
(35, 6, './Repositories/images/canciones/5de03a47a5c7c6.53954287.jpg'),
(36, 6, './Repositories/images/canciones/5de03a525bad80.70901417.jpg'),
(37, 1, './Repositories/images/canciones/5de049de89bf77.95831357.jpg'),
(42, 15, './Repositories/images/canciones/5de06fb7cd24f6.69011919.jpg'),
(43, 15, './Repositories/images/canciones/5de081156bbb28.55125459.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comentario` varchar(50) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_user`, `timestamp`, `comentario`, `valoracion`, `id_cancion`) VALUES
(99, 16, '2019-11-29 15:11:03', 'gare', 3, 15),
(102, 16, '2019-11-29 05:11:06', '2312312', 1, 15),
(103, 23, '2019-11-29 06:11:40', 'Golas', 3, 15),
(104, 23, '2019-11-29 06:11:02', '2312', 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Invitado'),
(2, 'Standard'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `id_role`, `password`) VALUES
(16, 'gero@admin.com', 3, '$2y$10$RcKvTZgMC3OyCWuClbJpROdnnWB8bbhLkWNl71NqYm77efYb4mNbu'),
(21, 'gero@test.com', 2, '$2y$10$Ajqxm6JoR/lSqSCbq8s5x.hKFtwa6Sv4fWiTwVb9XR5MTOCsjECoS'),
(22, 'gero@test1234.com', 2, '$2y$10$aYrody/Izk3cqVrNi8B63uqZCyvnoaGLxkUe9azRCPlJLpG55ZKd2'),
(23, 'gero@user.com', 3, '$2y$10$T0Tp.eMo62vBKuLvsQZ5JOhxqOXYTi.zDOBs5UfsSTkMaHeNpupFG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkRole` (`id_role`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `cancionimagenes`
--
ALTER TABLE `cancionimagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkCancion` (`id_cancion`),
  ADD KEY `idkUsuario` (`id_user`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cancionimagenes`
--
ALTER TABLE `cancionimagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `idkRole` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `idkCancion` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idkUsuario` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
