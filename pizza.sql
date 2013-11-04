-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2013 at 08:09 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizza`
--
CREATE DATABASE IF NOT EXISTS `pizza` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pizza`;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ClientePK` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Calle` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Número` int(20) NOT NULL,
  `Colonia` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Telefono` int(15) NOT NULL,
  `CP` int(6) NOT NULL,
  PRIMARY KEY (`ClientePK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `DetallePedidoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `ProductoFK` int(10) NOT NULL,
  `PedidoFK` int(10) NOT NULL,
  PRIMARY KEY (`DetallePedidoPK`),
  KEY `ProductoFK` (`ProductoFK`),
  KEY `PedidoFK` (`PedidoFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `EmpleadoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Usuario` varchar(20) CHARACTER SET latin1 NOT NULL,
  `TipoFK` int(10) NOT NULL,
  PRIMARY KEY (`EmpleadoPK`),
  KEY `TipoFK` (`TipoFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`EmpleadoPK`, `Nombre`, `Password`, `Usuario`, `TipoFK`) VALUES
(1, 'Alejandro Gómez', 'alex123', 'alejandro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `insumos`
--

CREATE TABLE IF NOT EXISTS `insumos` (
  `InsumosPK` int(10) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(40) CHARACTER SET latin1 NOT NULL,
  `EmpleadoFK` int(10) NOT NULL,
  PRIMARY KEY (`InsumosPK`),
  KEY `empleadoFK` (`EmpleadoFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `PedidoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Información` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Costo` int(10) NOT NULL,
  `ClienteFK` int(10) NOT NULL,
  `EmpleadoFK` int(10) NOT NULL,
  PRIMARY KEY (`PedidoPK`),
  KEY `ClienteFK` (`ClienteFK`),
  KEY `EmpleadoFK` (`EmpleadoFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `ProductoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Precio` double NOT NULL,
  `Tamaño` int(20) NOT NULL,
  `Descripción` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ProductoPK`),
  KEY `Descripción` (`Descripción`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `TipoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Descripción` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`TipoPK`),
  KEY `Descripción` (`Descripción`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`TipoPK`, `Descripción`) VALUES
(1, 'Administrador'),
(2, 'Cajero');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`ProductoFK`) REFERENCES `producto` (`ProductoPK`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`PedidoFK`) REFERENCES `pedido` (`PedidoPK`);

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`TipoFK`) REFERENCES `tipo` (`TipoPK`);

--
-- Constraints for table `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`EmpleadoFK`) REFERENCES `empleado` (`EmpleadoPK`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ClienteFK`) REFERENCES `cliente` (`ClientePK`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`EmpleadoFK`) REFERENCES `empleado` (`EmpleadoPK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
