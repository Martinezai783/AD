-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2023 a las 16:56:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_timeline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `AÑO` int(12) NOT NULL,
  `IMAGEN` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_MAZO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`ID`, `NOMBRE`, `AÑO`, `IMAGEN`, `ID_MAZO`) VALUES
(3, 'Tras la muerte del príncipe Shotoku, den', 621, '../imagenes/ec5a7ec822d0a830d06ef5dba9eaacbd.jpg', 6),
(4, 'Japón se desprende de china', 838, '../imagenes/838.jpg', 6),
(5, 'Surgimiento de la clase samurái', 1051, '../imagenes/1051.jpg', 6),
(6, 'Primeras guerra sino-japonesa', 1894, '../imagenes/1894.jpg', 6),
(7, 'Bombardeo sobre Hisoshima y Nagasaki', 1945, '../imagenes/1945.jpg', 6),
(8, 'Terremoto y tsunami de 2011 y accidente ', 2011, '../imagenes/2011.jpg', 6),
(9, 'Nacimiento de Miyamoto Musashi', 1584, '../imagenes/1584.png', 6),
(10, 'Muerte de Miyamoto Musashi', 1645, '../imagenes/1645.jpg', 6),
(11, 'Pepo pepito', 2023, '../imagenes/pepito.jpg', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mazo`
--

CREATE TABLE `mazo` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mazo`
--

INSERT INTO `mazo` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES
(4, 'Egipto', 'Test modificado'),
(6, 'Japon', 'Mazo cultural Japonés'),
(8, 'Pepo', 'Pepo Pepo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'ZZZ',
  `PUNTUACION` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`ID`, `NOMBRE`, `PUNTUACION`) VALUES
(1, 'AAA', 500),
(2, 'BBB', 215),
(3, 'CCC', 888),
(4, 'DDD', 999),
(5, 'BAB', 780),
(6, 'FFF', 500),
(7, 'XDD', 843),
(8, 'AAA', 999),
(9, 'CCC', 69420),
(10, 'BOB', 960);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MAZO` (`ID_MAZO`);

--
-- Indices de la tabla `mazo`
--
ALTER TABLE `mazo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `index_by_name` (`NOMBRE`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `mazo`
--
ALTER TABLE `mazo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `carta_ibfk_1` FOREIGN KEY (`ID_MAZO`) REFERENCES `mazo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
