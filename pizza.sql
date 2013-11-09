-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2013 a las 07:02:39
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pizza`
--
CREATE DATABASE IF NOT EXISTS `pizza` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pizza`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ClientePK` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Calle` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Numero` int(20) NOT NULL,
  `Colonia` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CP` int(6) NOT NULL,
  PRIMARY KEY (`ClientePK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ClientePK`, `Nombre`, `Calle`, `Numero`, `Colonia`, `Telefono`, `CP`) VALUES
(1, 'Alejandro Gómez', 'Leandro Valle', 403, 'Centro', '4131662791', 38500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
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
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `EmpleadoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Calle` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Numero` int(20) NOT NULL,
  `Colonia` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CP` int(6) NOT NULL,
  `Horario` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Salario` varchar(40) CHARACTER SET latin1 NOT NULL,
  `TipoFK` int(10) NOT NULL,
  PRIMARY KEY (`EmpleadoPK`),
  KEY `TipoFK` (`TipoFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`EmpleadoPK`, `Nombre`, `Calle`, `Numero`, `Colonia`, `Telefono`, `CP`, `Horario`, `Salario`, `TipoFK`) VALUES
(1, 'Alejandro Gómez', 'Irrigacion',20, 'Apaseo el Alto', '413-125-75-18', 36512, '07:00 - 17:00', '$1000', 2),
(2, 'Juan Carlos Arteaga', 'Progreso',26, 'Celaya', '461-100-12-45', 38700, '17:00 - 20:00', '$500', 1),
(3, 'Jorge Mendez', 'Lazaro Cardenas',1, 'Tarimoro', '466-116-23-10', 38710, '08:00 - 16:00', '$1000', 2);

---------------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `UsuarioPK` int(10) NOT NULL AUTO_INCREMENT,
  `Password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Usuario` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`UsuarioPK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioPK`, `Password`, `Usuario`) VALUES
(1, 'alex123', 'alejandro'),
(2, 'juanote1', 'juancho'),
(3, 'koke01', 'jorge');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
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
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `PedidoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Informacion` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Costo` int(10) NOT NULL,
  `ClienteFK` int(10) NOT NULL,
  `EmpleadoFK` int(10) NOT NULL,
  PRIMARY KEY (`PedidoPK`),
  KEY `ClienteFK` (`ClienteFK`),
  KEY `EmpleadoFK` (`EmpleadoFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
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
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `TipoPK` int(10) NOT NULL AUTO_INCREMENT,
  `Descripción` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`TipoPK`),
  KEY `Descripción` (`Descripción`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`TipoPK`, `Descripción`) VALUES
(1, 'Cajero'),
(2, 'Administrador'),
(3, 'Repartidor');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`ProductoFK`) REFERENCES `producto` (`ProductoPK`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`PedidoFK`) REFERENCES `pedido` (`PedidoPK`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`TipoFK`) REFERENCES `tipo` (`TipoPK`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`EmpleadoFK`) REFERENCES `empleado` (`EmpleadoPK`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ClienteFK`) REFERENCES `cliente` (`ClientePK`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`EmpleadoFK`) REFERENCES `empleado` (`EmpleadoPK`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`UsuarioPK`) REFERENCES `empleado` (`EmpleadoPK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
