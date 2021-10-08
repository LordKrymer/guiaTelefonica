-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2021 a las 05:12:49
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guiatelefonica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `postal` int(5) NOT NULL,
  `nombre_ciudad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`postal`, `nombre_ciudad`) VALUES
(7300, 'Azul'),
(7610, 'Mar del plata'),
(7400, 'Olavarria'),
(7000, 'Tandil'),
(7165, 'Villa Gesell');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `DNI` int(8) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `postal_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`DNI`, `nombre`, `apellido`, `postal_fk`) VALUES
(34, 'Geronimo', 'alberti', 7000),
(123123, 'Martin', 'Toronti', 7610),
(2003223, 'anastacio', 'figueroa', 7610),
(2554025, 'Gonza', 'Martinez', 7300),
(22910811, 'Analia', 'Paz', 7165),
(40404040, 'Horacio', 'Andreal', 7610),
(41877000, 'Lucas', 'Quiroga', 7000),
(41877021, 'Rosario', 'Juarez', 7400),
(41877022, 'Alejandro', 'Villegas', 7300),
(41877055, 'Martin', 'Carretto', 7400),
(41877095, 'Agustin', 'Carretto', 7165),
(41877097, 'Marcos', 'Fernandez', 7165),
(41888888, 'Braian', 'Soto', 7165);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id_telefono` int(10) UNSIGNED NOT NULL,
  `DNI_fk` int(8) NOT NULL,
  `compania` varchar(20) NOT NULL,
  `caracteristica` int(5) NOT NULL,
  `telefono` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id_telefono`, `DNI_fk`, `compania`, `caracteristica`, `telefono`) VALUES
(6, 41877097, 'Movistar', 2255, 413267),
(7, 41877097, 'Claro', 2267, 665817),
(8, 41877097, 'Claro', 2255, 413222),
(11, 41877000, 'Personal', 0, 413267),
(12, 22910811, 'Movistar', 2255, 413377),
(13, 22910811, 'Personal', 2267, 638898),
(14, 22910811, 'Personal', 2267, 888888),
(15, 22910811, 'Claro', 222, 333),
(16, 2554025, 'Personal', 1133, 113311);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `password`, `rol`) VALUES
('Krymer', '$2y$10$dwLGchzKvpt3/b1MSv9wleAiM9OC/KUExX5os6uPyHGcDPRAViFa.', 'admin'),
('pollo', '$2y$10$f.SV.DINkgX7f6WIDAX93OjfIgZ3ZWI4OGUbNGVv0tTx/GDKbWSrm', 'admin'),
('usuario1', '$2y$10$h9310ClK.mGOvRG2KUjqee0fI9DZ7SrNYN7kNVVetZ4SMDtxElAPq', 'user'),
('usuario2', '$2y$10$q1d15UgSzjHk/1oMnT/28.Wx7Z2W/1MEeHBa8K3Z6NNwFG3CWvihO', 'user'),
('usuario3', '$2y$10$pzvg62X4g9dSB/sUj62RRusXSy.VGDFG5CDtQJW6py0bTHSmL6X1.', 'user'),
('usuario4', '$2y$10$F4UmjfvHiiQEn87h2UCnRuxGhl/5lkb94SlY0GSvcY4rBtFV7T0Xe', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`postal`),
  ADD UNIQUE KEY `nombre_ciudad` (`nombre_ciudad`),
  ADD KEY `postal` (`postal`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `postal_fk` (`postal_fk`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `DNI_fk` (`DNI_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`postal_fk`) REFERENCES `ciudades` (`postal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`DNI_fk`) REFERENCES `personas` (`DNI`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
