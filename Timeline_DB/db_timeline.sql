-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 04:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_timeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `carta`
--

CREATE TABLE `carta` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `AÑO` int(12) NOT NULL,
  `IMAGEN` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_MAZO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `carta`
--

INSERT INTO `carta` (`ID`, `NOMBRE`, `AÑO`, `IMAGEN`, `ID_MAZO`) VALUES
(3, 'Tras la muerte del príncipe Shotoku, den', 621, '../imagenes/ec5a7ec822d0a830d06ef5dba9eaacbd.jpg', 6),
(4, 'Japón se desprende de china', 838, '../imagenes/838.jpg', 6),
(5, 'Surgimiento de la clase samurái', 1051, '../imagenes/1051.jpg', 6),
(6, 'Primeras guerra sino-japonesa', 1894, '../imagenes/1894.jpg', 6),
(7, 'Bombardeo sobre Hisoshima y Nagasaki', 1945, '../imagenes/1945.jpg', 6),
(8, 'Terremoto y tsunami de 2011 y accidente ', 2011, '../imagenes/2011.jpg', 6),
(9, 'Nacimiento de Miyamoto Musashi', 1584, '../imagenes/1584.png', 6),
(10, 'Muerte de Miyamoto Musashi', 1645, '../imagenes/1645.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mazo`
--

CREATE TABLE `mazo` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `mazo`
--

INSERT INTO `mazo` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES
(4, 'Egipto', 'Test modificado'),
(6, 'Japon', 'Mazo cultural Japonés'),
(8, 'Floles', 'Muchas floles bonitas y de colores ');

-- --------------------------------------------------------

--
-- Table structure for table `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'ZZZ',
  `ID_MAZO` int(10) NOT NULL,
  `PUNTUACION` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `puntuaciones`
--

INSERT INTO `puntuaciones` (`ID`, `NOMBRE`, `ID_MAZO`, `PUNTUACION`) VALUES
(1, 'Luc', 6, 0),
(2, 'Luc', 6, 0),
(3, 'Luc', 6, 0),
(4, 'Luc', 6, 0),
(5, 'Luc', 6, 0),
(6, 'Luc', 6, 0),
(7, 'Luc', 6, 0),
(8, 'Luc', 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MAZO` (`ID_MAZO`);

--
-- Indexes for table `mazo`
--
ALTER TABLE `mazo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `index_by_name` (`NOMBRE`);

--
-- Indexes for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MAZO` (`ID_MAZO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carta`
--
ALTER TABLE `carta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mazo`
--
ALTER TABLE `mazo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `carta_ibfk_1` FOREIGN KEY (`ID_MAZO`) REFERENCES `mazo` (`ID`);

--
-- Constraints for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `puntuaciones_ibfk_1` FOREIGN KEY (`ID_MAZO`) REFERENCES `mazo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
