-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-10-2019 a las 01:47:14
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cfs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(40) NOT NULL,
  `adminname` varchar(150) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `names`, `adminname`, `password`) VALUES
(1, 'Javier Galvis Echavarria', 'Javier', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `idCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idCarrito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategoria` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nameCategoria`) VALUES
(7, 'Bebidas'),
(8, 'PanaderÃ­a'),
(9, 'Alimentos'),
(10, 'Especiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nameCliente` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nameCliente`, `email`, `password`) VALUES
(1, 'Javier', 'javier@cfs.co', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idFactura`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idCliente`, `fecha`, `monto`, `status`) VALUES
(1, 1, '2019-10-08 01:12:33', 8000, 0),
(2, 1, '2019-10-11 17:08:28', 0, 0),
(3, 1, '2019-10-13 00:15:38', 1000, 0),
(4, 1, '2019-10-13 22:09:45', 100016000, 0),
(5, 1, '2019-10-14 01:38:14', 57000, 0),
(6, 1, '2019-10-14 01:58:54', 28650, 0),
(7, 1, '2019-10-14 02:04:46', 30900, 0),
(8, 1, '2019-10-14 02:08:07', 72750, 0),
(9, 1, '2019-10-14 02:16:28', 175050, 0),
(10, 1, '2019-10-14 02:21:58', 25500, 0),
(11, 1, '2019-10-14 02:28:14', 33750, 0),
(12, 1, '2019-10-14 02:34:06', 14000, 0),
(13, 1, '2019-10-14 02:37:16', 2500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `oferta` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `name`, `price`, `description`, `imagen`, `oferta`, `idCategoria`) VALUES
(1, 'CafÃ©', 1000, 'Se sirve habitualmente caliente tambiÃ©n se toma frÃ­o o con hielo.', 'CafÃ©667.png', 0, 7),
(2, 'Secreto del Mundo', 100000000, 'No hay descripciones', 'Secreto del Mundo485.png', 100, 10),
(3, 'Almuerzo', 7000, 'filete de pollo, pescado, pavita o atÃºn', 'Almuerzo567.png', 10, 9),
(4, 'DeTodito Natural', 2500, 'No hay descripciones', 'DeTodito Natural331.png', 20, 9),
(5, 'Desayuno Saludable', 6000, 'No hay descripciones', 'Desayuno Saludable918.png', 0, 9),
(6, 'Malteada', 2500, 'No hay descripciones', 'CafÃ©994.png', 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_compra`
--

DROP TABLE IF EXISTS `productos_compra`;
CREATE TABLE IF NOT EXISTS `productos_compra` (
  `idCP` int(11) NOT NULL AUTO_INCREMENT,
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` float NOT NULL,
  PRIMARY KEY (`idCP`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_compra`
--

INSERT INTO `productos_compra` (`idCP`, `idFactura`, `idProducto`, `cantidad`, `monto`) VALUES
(1, 1, 2, 1, 7000),
(2, 1, 1, 1, 1000),
(3, 3, 1, 1, 1000),
(4, 4, 5, 1, 6000),
(5, 4, 4, 1, 2500),
(6, 4, 3, 1, 7000),
(7, 4, 2, 1, 100000000),
(8, 5, 4, 6, 2500),
(9, 5, 3, 6, 7000),
(10, 6, 3, 3, 7000),
(11, 6, 4, 3, 2500),
(12, 6, 1, 3, 1000),
(13, 7, 4, 4, 2500),
(14, 7, 1, 3, 1000),
(15, 7, 3, 3, 7000),
(16, 8, 3, 5, 7000),
(17, 8, 4, 5, 2500),
(18, 8, 2, 5, 100000000),
(19, 8, 5, 5, 6000),
(20, 9, 5, 11, 6000),
(21, 9, 4, 11, 2500),
(22, 9, 3, 11, 7000),
(23, 9, 6, 6, 2500),
(24, 10, 6, 3, 2500),
(25, 10, 5, 3, 6000),
(26, 11, 5, 3, 6000),
(27, 11, 4, 7, 2500),
(28, 11, 2, 1, 100000000),
(29, 12, 4, 1, 2500),
(30, 12, 5, 2, 6000),
(31, 13, 6, 1, 2500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
