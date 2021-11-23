-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 23:50:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `categoria`) VALUES
(4, 'Smartphones'),
(5, 'Teclados'),
(6, 'Laptop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codregistros`
--

CREATE TABLE `codregistros` (
  `idcr` int(11) NOT NULL,
  `codreg` varchar(20) NOT NULL,
  `nombre_registro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codregistros`
--

INSERT INTO `codregistros` (`idcr`, `codreg`, `nombre_registro`) VALUES
(2, 'PR5100501', 'DELL Laptop 15'),
(3, 'A21344L', 'Acer Laptop 15 Intel Core i7'),
(4, 'PR2903AL12', 'HP Laptop 15\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario`
--

CREATE TABLE `detalle_inventario` (
  `iddi` int(11) NOT NULL,
  `idinventario` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `stock` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_inventario`
--

INSERT INTO `detalle_inventario` (`iddi`, `idinventario`, `idproducto`, `fecha_ingreso`, `idcategoria`, `stock`) VALUES
(0, 3, 4, '2021-11-23', 6, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_preventa`
--

CREATE TABLE `detalle_preventa` (
  `iddpv` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idempleado` int(11) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `idproducto` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `precio_total` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_preventa`
--

INSERT INTO `detalle_preventa` (`iddpv`, `idcliente`, `idempleado`, `cliente`, `idproducto`, `precio`, `cantidad`, `descuento`, `precio_total`, `fecha`, `estado`) VALUES
(1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2021-11-23 20:47:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idempleado` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `nit` varchar(17) DEFAULT NULL,
  `nrc` varchar(15) DEFAULT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `idinventario` int(11) NOT NULL,
  `codproducto` varchar(20) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `stock` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`idinventario`, `codproducto`, `idcategoria`, `stock`) VALUES
(3, 'PR2903AL12', 6, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `codproducto` varchar(20) DEFAULT NULL,
  `producto` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio_venta` float NOT NULL,
  `precio_compra` float NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `stock` float NOT NULL,
  `imagen` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `codproducto`, `producto`, `descripcion`, `precio_venta`, `precio_compra`, `idproveedor`, `fecha_ingreso`, `stock`, `imagen`, `estado`) VALUES
(1, 'PR2903AL12', 'Laptop HP 3G', 'Laptop HP 15\" Intel Core i-7 8 Gen, color negro.', 570, 300, 3, '2021-11-22 00:00:00', 20, '1.jpg', 1),
(3, 'PR2903AL12', 'Laptop HP 3G', 'Laptop HP 15\" Intel Core i-7 8 Gen, color negro.', 570, 300, 3, '2021-11-22 00:00:00', 25, '3.jpg', 1),
(4, 'PR2903AL12', 'Laptop HP 3G', 'Laptop HP 15\" Intel Core i-7 8 Gen, color negro.', 570, 300, 3, '2021-11-23 00:00:00', 15, 'PR2903AL12.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `proveedor`, `direccion`, `telefono`, `correo`) VALUES
(1, 'proveedorSA de C.V', 'San Salvador, El Salvador', '22980421', 'prov1@hotmail.com'),
(3, 'Tecnology', 'Colonia Escalon, San Salvador', '21350624', 'Tecnology@empresa.com.sv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipo` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo`, `tipo`, `nombre_tipo`) VALUES
(1, 1, 'Root'),
(2, 2, 'Administrador'),
(3, 3, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `token` varchar(10) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `passw`, `estado`, `tipo`, `token`, `correo`, `foto`) VALUES
(1, 'admin', '$2y$10$svYPxGihYJvF/adVQWQA2O/7eESY8Cm2FNyrT1doOTJCAwR.keNFm', 1, 1, '', 'gabrieladelm97@gmail.com', NULL),
(6, 'bart', '$2y$10$zQFCQvgTOduh0HyWVq1MTup7RCV0hNklTjMLpbTVrBompP/5Vlpfm', 1, 1, NULL, NULL, 'bart.png'),
(7, 'Gaby', '$2y$10$J9f9HICXDSvsUNFoG7AKLOzEZXdKESMsl1Xu0iIumKAadksrUVXVq', 1, 1, NULL, 'gabrieladelm97@gmail.com', 'Gaby.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `codregistros`
--
ALTER TABLE `codregistros`
  ADD PRIMARY KEY (`idcr`);

--
-- Indices de la tabla `detalle_preventa`
--
ALTER TABLE `detalle_preventa`
  ADD PRIMARY KEY (`iddpv`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`idinventario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codregistros`
--
ALTER TABLE `codregistros`
  MODIFY `idcr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_preventa`
--
ALTER TABLE `detalle_preventa`
  MODIFY `iddpv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `idinventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
