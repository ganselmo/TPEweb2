-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2019 a las 14:00:21
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cancionero_v2`
--

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
(1, 'Juan Luis', 'Guerra', '1957-06-07', 1);

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
(3, 'Rosalía', '00:03:28', 'Bachata', 'Bachata Rosa', 1, 2),
(4, 'Como abeja al panal', '00:04:07', 'Bachata', 'Bachata Rosa', 1, 5),
(6, 'Campeones de la Vida', '00:00:05', 'Rock', 'Album1', 1, 9),
(8, 'Todo a Pulmon', '00:00:00', 'Rock', 'Todo a Pulmón', 1, 9),
(9, 'Cancion1', '00:00:25', 'Rock', 'Album1', 1, 9),
(10, 'Cancion1', '00:00:56', 'Bachata', 'Album1', 1, 15),
(11, 'Todo a Pulmon', '00:01:50', 'Rock', 'Album1', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_lista`
--

CREATE TABLE `cancion_lista` (
  `id` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `reproducciones` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `cancion_lista`
--
ALTER TABLE `cancion_lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_lista` (`id_lista`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cancion_lista`
--
ALTER TABLE `cancion_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id`);

--
-- Filtros para la tabla `cancion_lista`
--
ALTER TABLE `cancion_lista`
  ADD CONSTRAINT `cancion_lista_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id`),
  ADD CONSTRAINT `cancion_lista_ibfk_2` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
