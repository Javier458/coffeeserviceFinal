-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 16:04:52
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

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

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `names` varchar(40) NOT NULL,
  `adminname` varchar(150) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `names`, `adminname`, `password`) VALUES
(1, 'Javier Galvis Echavarria', 'Javier', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nameCategoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nameCliente` varchar(40) NOT NULL,
  `apellidoCliente` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nameCliente`, `apellidoCliente`, `email`, `password`) VALUES
(1, 'Javier', 'Galvis', 'javier@cfs.co', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 1, '2019-10-14 02:37:16', 2500, 0),
(14, 1, '2019-10-23 08:58:21', 8300, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `oferta` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `productos_compra` (
  `idCP` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(31, 13, 6, 1, 2500),
(32, 14, 4, 1, 2500),
(33, 14, 3, 1, 7000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `productos_compra`
--
ALTER TABLE `productos_compra`
  ADD PRIMARY KEY (`idCP`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idProducto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `productos_compra`
--
ALTER TABLE `productos_compra`
  MODIFY `idCP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_compra`
--
ALTER TABLE `productos_compra`
  ADD CONSTRAINT `productos_compra_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_compra_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
