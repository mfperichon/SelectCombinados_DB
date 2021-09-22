-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2021 a las 20:41:59
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `id_pais`, `descripcion`) VALUES
(1, 1, 'Buenos Aires'),
(2, 1, 'Córdoba'),
(3, 1, 'Rosario'),
(4, 1, 'Mar del Plata'),
(5, 1, 'San Miguel de Tucumán'),
(6, 1, 'Salta'),
(7, 1, 'Santa Fe'),
(8, 1, 'Corrientes'),
(9, 1, 'Bahia Blanca'),
(10, 1, 'Neuquen'),
(11, 1, 'Posadas'),
(12, 1, 'Mendoza'),
(13, 2, 'São Paulo'),
(14, 2, 'Rio de Janeiro'),
(15, 2, 'Salvador'),
(16, 2, 'Brasilia'),
(17, 2, 'Fortaleza'),
(18, 2, 'Belo Horizonte'),
(19, 2, 'Manaus'),
(20, 2, 'Curitiba'),
(21, 2, 'Recife'),
(22, 2, 'Porto Alegre'),
(23, 2, 'Belém'),
(24, 3, 'Madrid'),
(25, 3, 'Barcelona'),
(26, 3, 'Santiago de Compostela'),
(27, 3, 'Sevilla'),
(28, 3, 'Mérida'),
(29, 3, 'Santander'),
(30, 3, 'Huesca'),
(31, 3, 'Pamplona'),
(32, 4, 'Ciudad de México'),
(33, 4, 'Tijuana'),
(34, 4, 'León'),
(35, 4, 'Ciudad Juárez'),
(36, 4, 'Guadalajara'),
(37, 4, 'Monterrey'),
(38, 4, 'Chihuahua'),
(39, 4, 'Mérida'),
(40, 4, 'Cancún'),
(41, 4, 'Culiacán'),
(42, 5, 'Bogotá'),
(43, 5, 'Medellín'),
(44, 5, 'Santiago de Cali'),
(45, 5, 'Barranquilla'),
(46, 5, 'Cartagena'),
(47, 5, 'Soacha'),
(48, 5, 'Cúcuta'),
(49, 5, 'Soledad'),
(50, 5, 'Bucaramanga'),
(51, 5, 'Bello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `id_moneda` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `id_pais`, `descripcion`) VALUES
(1, 1, 'Peso Argentino'),
(2, 2, 'Reales'),
(3, 3, 'Euros'),
(4, 4, 'Peso Mexicano'),
(5, 5, 'Peso Colombiano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `descripcion`) VALUES
(1, 'ARGENTINA'),
(2, 'BRASIL'),
(3, 'ESPAÑA'),
(4, 'MEXICO'),
(5, 'COLOMBIA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id_moneda`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id_moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
