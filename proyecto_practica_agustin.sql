-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 03:24:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_practica_agustin`
-- 
   drop database if exists proyecto_practica_agustin;
   create database proyecto_practica_agustin;
   use proyecto_practica_agustin; 

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(4) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `domicilio` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `Nombre`, `Apellido`, `Telefono`, `dni`, `domicilio`) VALUES
(0, 'Diamela', 'Di mauro', '3402456789', '12345678', 'moreno 34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctacte`
--

CREATE TABLE `ctacte` (
  `ID` int(11) NOT NULL,
  `ID_cliente` int(11) NOT NULL,
  `detalle` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ctacte`
--

INSERT INTO `ctacte` (`ID`, `ID_cliente`, `detalle`) VALUES
(1, 0, '3000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `id_lab` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cuit` varchar(15) NOT NULL,
  `telefono` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`id_lab`, `nombre`, `cuit`, `telefono`) VALUES
(5, 'medlab', '23456789012', '1154675568');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `detalle` varchar(32) NOT NULL,
  `stock` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `detalle`, `stock`) VALUES
(2, 'ibuprofeno 600', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `nombre` varchar(12) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cuit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `nombre`, `telefono`, `cuit`) VALUES
(2, 'cremas', '3402541150', '21320453212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prov_labo`
--

CREATE TABLE `prov_labo` (
  `id_lab` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `detalle` varchar(10) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `detalle`, `pass`, `email`) VALUES
(12, 'AgustinT98', 'Walker98', 'agustoponi333@gmail.com'),
(24, 'AgustinT67', 'Walker12', 'sadasd@gmail.com'),
(25, 'AgustinT97', 'Walker97', 'ANDA@gmail.com'),
(26, 'alfin23', 'Alfin23', 'alfinanda23@gmail.com'),
(28, 'alvaro', '12345', 'asddas23@gmail.com'),
(29, 'AgustinT99', 'Walker97', 'agusitn324@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vencimientos`
--

CREATE TABLE `vencimientos` (
  `id` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lote` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `ctacte`
--
ALTER TABLE `ctacte`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_cliente` (`ID_cliente`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id_lab`),
  ADD UNIQUE KEY `cuit` (`cuit`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`),
  ADD UNIQUE KEY `cuit` (`cuit`);

--
-- Indices de la tabla `prov_labo`
--
ALTER TABLE `prov_labo`
  ADD PRIMARY KEY (`id_lab`,`id_prov`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `detalle` (`detalle`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `vencimientos`
--
ALTER TABLE `vencimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lote` (`lote`),
  ADD KEY `id_productos` (`id_productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ctacte`
--
ALTER TABLE `ctacte`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `vencimientos`
--
ALTER TABLE `vencimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ctacte`
--
ALTER TABLE `ctacte`
  ADD CONSTRAINT `ctacte_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID`);

--
-- Filtros para la tabla `prov_labo`
--
ALTER TABLE `prov_labo`
  ADD CONSTRAINT `prov_labo_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `laboratorios` (`id_lab`),
  ADD CONSTRAINT `prov_labo_ibfk_2` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`);

--
-- Filtros para la tabla `vencimientos`
--
ALTER TABLE `vencimientos`
  ADD CONSTRAINT `vencimientos_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
