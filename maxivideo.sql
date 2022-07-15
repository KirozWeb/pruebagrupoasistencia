-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2022 a las 15:27:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maxivideo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id_actor` int(10) NOT NULL,
  `nombre_actor` varchar(100) NOT NULL,
  `nacionalidad_actor` varchar(100) NOT NULL,
  `sexo` enum('hombre','Mujer') NOT NULL,
  `tipo_actor` enum('principal','extra') NOT NULL DEFAULT 'extra'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id_actor`, `nombre_actor`, `nacionalidad_actor`, `sexo`, `tipo_actor`) VALUES
(1, 'actor uno', 'colombiano', 'hombre', 'principal'),
(2, 'actor dos', 'paraguayo', 'Mujer', 'principal'),
(3, 'actor tres', 'venezolano', 'hombre', 'extra'),
(4, 'actor cuatro', 'ecuatoriano', 'hombre', 'extra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `identificacion_cliente` varchar(100) NOT NULL DEFAULT 'nada',
  `nombre_cliente` varchar(100) NOT NULL,
  `direccion_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `identificacion_cliente`, `nombre_cliente`, `direccion_cliente`, `telefono_cliente`) VALUES
(1, '123', 'cliente uno', 'calle uno', 'uno'),
(2, '345', 'cliente dos', 'calle dos', 'dos'),
(3, '852', 'cliente tres', 'calle tres', 'tres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_detalle_factura` int(10) NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  `id_factura` int(10) NOT NULL,
  `cantidad_detalle_pelicula` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id_detalle_factura`, `id_pelicula`, `id_factura`, `cantidad_detalle_pelicula`) VALUES
(1, 2, 18, 1),
(2, 2, 19, 1),
(3, 2, 20, 1),
(4, 2, 21, 1),
(5, 1, 22, 1),
(6, 1, 23, 1),
(7, 1, 25, 1),
(8, 2, 25, 2),
(9, 1, 25, 1),
(10, 3, 26, 1),
(11, 3, 27, 1),
(12, 2, 28, 1),
(13, 2, 29, 1),
(14, 3, 30, 1),
(15, 1, 31, 1),
(16, 2, 31, 1),
(17, 3, 31, 2),
(18, 2, 32, 1),
(19, 2, 33, 1),
(20, 2, 34, 1),
(21, 2, 35, 1),
(22, 2, 36, 1),
(23, 2, 37, 1),
(24, 2, 38, 1),
(25, 2, 39, 1),
(26, 2, 40, 1),
(27, 2, 41, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reparto`
--

CREATE TABLE `detalle_reparto` (
  `id_reparto` int(10) NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  `id_actor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_reparto`
--

INSERT INTO `detalle_reparto` (`id_reparto`, `id_pelicula`, `id_actor`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id_director` int(10) NOT NULL,
  `nombre_director` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id_director`, `nombre_director`, `nacionalidad`) VALUES
(1, 'director uno', 'colombiano'),
(2, 'director dos', 'mexicano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(10) NOT NULL,
  `fecha_alquiler_factura` date DEFAULT NULL,
  `fecha_devolucion_factura` date DEFAULT NULL,
  `id_cliente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `fecha_alquiler_factura`, `fecha_devolucion_factura`, `id_cliente`) VALUES
(1, '2022-07-14', '2022-07-19', 2),
(2, '2022-07-14', '2022-07-19', 1),
(3, '2022-07-14', '2022-07-19', 2),
(4, '2022-07-14', '2022-07-19', 2),
(5, '2022-07-14', '2022-07-19', 2),
(6, '2022-07-14', '2022-07-19', 1),
(7, '2022-07-14', '2022-07-19', 1),
(8, '2022-07-14', '2022-07-19', 2),
(9, '2022-07-14', '2022-07-19', 2),
(10, '2022-07-14', '2022-07-19', 1),
(11, '2022-07-14', '2022-07-19', 2),
(12, '2022-07-14', '2022-07-19', 2),
(13, '2022-07-14', '2022-07-19', 1),
(14, '2022-07-14', '2022-07-19', 1),
(15, '2022-07-14', '2022-07-19', 2),
(16, '2022-07-14', '2022-07-19', 2),
(17, '2022-07-14', '2022-07-19', 2),
(18, '2022-07-14', '2022-07-19', 2),
(19, '2022-07-14', '2022-07-19', 2),
(20, '2022-07-14', '2022-07-19', 1),
(21, '2022-07-14', '2022-07-19', 2),
(22, '2022-07-14', '2022-07-19', 1),
(23, '2022-07-14', '2022-07-19', 2),
(24, '2022-07-14', '2022-07-19', 1),
(25, '2022-07-14', '2022-07-19', 1),
(26, '2022-07-14', '2022-07-19', 3),
(27, '2022-07-14', '2022-07-19', 1),
(28, '2022-07-14', '2022-07-19', 2),
(29, '2022-07-14', '2022-07-19', 2),
(30, '2022-07-14', '2022-07-19', 2),
(31, '2022-07-15', '2022-07-20', 1),
(32, '2022-07-15', '2022-07-20', 3),
(33, '2022-07-15', '2022-07-20', 1),
(34, '2022-07-15', '2022-07-20', 3),
(35, '2022-07-15', '2022-07-20', 2),
(36, '2022-07-15', '2022-07-20', 2),
(37, '2022-07-15', '2022-07-20', 2),
(38, '2022-07-15', '2022-07-20', 2),
(39, '2022-07-15', '2022-07-20', 2),
(40, '2022-07-15', '2022-07-20', 3),
(41, '2022-07-15', '2022-07-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(10) NOT NULL,
  `titulo_pelicula` varchar(100) NOT NULL,
  `nacionalidad_pelicula` varchar(100) NOT NULL,
  `productora_pelicula` varchar(100) NOT NULL,
  `fecha_pelicula` date NOT NULL,
  `cantidad_pelicula` int(5) NOT NULL DEFAULT 1,
  `id_director` int(10) NOT NULL,
  `precio_pelicula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo_pelicula`, `nacionalidad_pelicula`, `productora_pelicula`, `fecha_pelicula`, `cantidad_pelicula`, `id_director`, `precio_pelicula`) VALUES
(1, 'pelicula uno', 'colombiana', 'caracol', '2022-07-01', 1, 1, 10000),
(2, 'pelicula dos', 'chilena', 'viña vision', '2022-07-03', 1, 2, 5000),
(3, 'pelicula tres', 'españa', 'tves', '2022-07-05', 1, 1, 12000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id_detalle_factura`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `detalle_reparto`
--
ALTER TABLE `detalle_reparto`
  ADD PRIMARY KEY (`id_reparto`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_actor` (`id_actor`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id_director`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_director` (`id_director`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id_actor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detalle_factura` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `detalle_reparto`
--
ALTER TABLE `detalle_reparto`
  MODIFY `id_reparto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id_director` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`),
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`);

--
-- Filtros para la tabla `detalle_reparto`
--
ALTER TABLE `detalle_reparto`
  ADD CONSTRAINT `detalle_reparto_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`),
  ADD CONSTRAINT `detalle_reparto_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id_director`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
