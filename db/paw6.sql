-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2021 a las 05:53:05
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(150) DEFAULT NULL,
  `imagen_cate` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `imagen_cate`) VALUES
(7, 'Smartphones', 'Smartphones.jpg'),
(8, 'Sillas', 'Sillas.jpg'),
(9, 'Mouse', 'Mouse.jpg'),
(10, 'Teclados', 'Teclados.webp'),
(11, 'Audifonos', 'Audifonos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id_inventario`, `id_producto`, `id_categoria`, `stock`) VALUES
(1, 14, 11, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `cod_producto` tinytext DEFAULT NULL,
  `nombre_producto` varchar(25) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio_compra` decimal(10,0) DEFAULT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `imagen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `cod_producto`, `nombre_producto`, `id_categoria`, `descripcion`, `precio_compra`, `precio_venta`, `stock`, `fecha_ingreso`, `estado`, `descuento`, `imagen`) VALUES
(6, '07', 'Samsung A12 azul', 7, 'Pantalla de 6.5 pulgadas,procesador de ocho núcleos, con variantes disponibles de 3GB de RAM con 32GB de almacenamiento,OS: Android 10', '100', '215', 700, '2021-10-27', 1, 0.1, NULL),
(7, '08', 'Silla gamer', 8, 'Silla para escritorio anaranjada', '25', '45', 1200, '2021-10-27', 1, 0.1, 'Silla gamer.jpg'),
(8, 'm09', 'Mous usb', 9, 'Mouse usb para computadora', '6', '15', 500, '2021-10-31', 1, 0.07, 'Mous usb.jpg'),
(9, 'm09', 'Mous usb', 9, 'Mouse usb para computadora', '6', '15', 120, '2021-10-31', 1, 0.07, 'Mous usb.jpg'),
(10, '09', 'Teclado XD', 10, 'Teclado con luz y conexión usb', '13', '125', 900, '2021-10-27', 1, 0.05, 'Teclado XD.webp'),
(11, '011', 'Audifonos X3', 11, 'Audifonos bluetooth', '16', '26', 500, '2021-10-28', 1, 0.15, 'Audifonos X3.jpg'),
(12, '012', 'Huawei y7P', 7, 'Celular con pantalla de 6.39\",RAM: 4GB,Almacenamiento: 64GB,OS: Android 9.0.', '100', '200', 500, '2021-10-28', 1, 0.1, 'Huawei y7P.jpg'),
(13, '013', 'Mouse GT-2000', 11, 'Mouse color rosa, conexion por bluetooth', '9', '16', 900, '2021-10-26', 1, 0.05, 'Mouse GT-2000.jpg'),
(14, '014', 'Audifonos Buds2 Samsung', 11, 'Audifonos bluetooth con alta calidad de sonido', '100', '200', 500, '2021-10-27', 1, 0.25, 'Audifonos Buds2 Samsung.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(25) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `direccion`, `telefono`, `correo`) VALUES
(2, 'Samsung', 'Paseo General Escalón, #12. San Salvador', 21369017, 'samsung@gmail.com'),
(3, 'Huawei', 'Calle El Pedregal, #342, San Salvador', 22510024, 'huaweielsalvador@huawei.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `token` varchar(12) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `email`, `clave`, `token`, `tipo`, `foto`, `estado`) VALUES
(1, 'admin', NULL, '$2y$10$vXKEXhA/pSMGo8XWiMXs9.3J3Pu5WtfkKUfp9ornnkZ0OOumW/rlm', NULL, 1, NULL, 1),
(3, 'admin2', NULL, '$2y$10$0LBiSsQyX1BU6pZiLzymse9vPXYQ9nESSVU1NIg9yByLvpf2xXXrS', NULL, 1, 'admin2.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
