-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 12:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
(4, 'Egipto', 'Test modificado');

-- --------------------------------------------------------

--
-- Table structure for table `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'ZZZ',
  `PUNTUACION` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carta`
--
ALTER TABLE `carta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mazo`
--
ALTER TABLE `mazo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `carta_ibfk_1` FOREIGN KEY (`ID_MAZO`) REFERENCES `mazo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
