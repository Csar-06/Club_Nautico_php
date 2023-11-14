-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 10:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club_nautico`
--

-- --------------------------------------------------------

--
-- Table structure for table `barco`
--

CREATE TABLE `barco` (
  `matricula` int(11) NOT NULL,
  `cedsocio` varchar(15) DEFAULT NULL,
  `nombre_barco` varchar(50) NOT NULL,
  `numamarre` int(11) NOT NULL,
  `cuota` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barco`
--

INSERT INTO `barco` (`matricula`, `cedsocio`, `nombre_barco`, `numamarre`, `cuota`) VALUES
(1001, 'x-xxx-xxx1', 'Stella', 1, 50),
(1002, 'x-xxx-xxx2', 'barco basurero', 2, 25.5),
(1003, 'x-xxx-xxx3', 'Yerupaja', 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `conductor_patron`
--

CREATE TABLE `conductor_patron` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conductor_patron`
--

INSERT INTO `conductor_patron` (`codigo`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Cesar Bernal', 'xxxx-xxx4', 'Panama, Colon'),
(2, 'Alexander Castillo', 'xxxx-xxx5', 'Panama, Colon'),
(3, 'José Guevara', 'xxxx-xxx6', 'Panama, Panama'),
(4, 'Antonio Castro', 'xxxx-xxx4', 'Panama');

-- --------------------------------------------------------

--
-- Table structure for table `socio`
--

CREATE TABLE `socio` (
  `cedula` varchar(15) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socio`
--

INSERT INTO `socio` (`cedula`, `nombre_completo`, `telefono`, `correo`) VALUES
('x-xxx-xxx1', 'Roberto Morales', 'xxxx-0001', 'robertomorales@email.com'),
('x-xxx-xxx2', 'Kevin Roosevelt', 'xxxx-0002', 'rooseveltkevin@email.com'),
('x-xxx-xxx3', 'Leonel Morales', 'xxxx-0003', 'moralesleonel@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `viaje`
--

CREATE TABLE `viaje` (
  `numero` int(11) NOT NULL,
  `matribarco` int(11) NOT NULL,
  `codpatron` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `destino` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viaje`
--

INSERT INTO `viaje` (`numero`, `matribarco`, `codpatron`, `fecha`, `hora`, `destino`) VALUES
(10001, 1001, 1, '2023/11/10', '5:00', 'EEUU'),
(10001, 1003, 2, '2023/06/01', '5:00', 'Panamá'),
(10002, 1001, 1, 'XXXX/XX/XX', '00:00', 'EEUU'),
(10002, 1003, 2, '2023/11/12', '7:00', 'Colombia'),
(10003, 1001, 1, 'xxxx/xx/xx', '00:00', 'Perú');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barco`
--
ALTER TABLE `barco`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `cedsocio` (`cedsocio`);

--
-- Indexes for table `conductor_patron`
--
ALTER TABLE `conductor_patron`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`numero`,`codpatron`),
  ADD KEY `matribarco` (`matribarco`),
  ADD KEY `codpatron` (`codpatron`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barco`
--
ALTER TABLE `barco`
  ADD CONSTRAINT `barco_ibfk_1` FOREIGN KEY (`cedsocio`) REFERENCES `socio` (`cedula`);

--
-- Constraints for table `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`matribarco`) REFERENCES `barco` (`matricula`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`codpatron`) REFERENCES `conductor_patron` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
