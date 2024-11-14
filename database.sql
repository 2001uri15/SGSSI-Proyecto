-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb
-- Tiempo de generación: 19-10-2024 a las 18:45:28
-- Versión del servidor: 11.5.2-MariaDB-ubu2404
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `tipo_combustion` varchar(20) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `matricula`, `tipo_combustion`, `modelo`, `color`, `marca`) VALUES
(2, '1121-jns', 'Gasolina', 'M5', 'negro', 'BMW'),
(4, '1121jnq', 'Gasolina', 'M5', 'Blanco', 'BMW'),
(6, '1821-jns', 'Gasolina', 'M5', 'Rojo', 'BMW'),
(7, '7302-yaq', 'Gasolina', 'Seat', 'Rojo', 'BMW'),
(9, '2121-aaa', 'Gasolina', 'Seat', 'Rojo', 'BMW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fNacimiento` date NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `Apellido`, `usuario`, `password`, `dni`, `telefono`, `fNacimiento`, `mail`) VALUES
(1, 'mikel', '', '', 'hola', '', 0, '0000-00-00', ''),
(2, 'aitor', '', '', '', '', 0, '0000-00-00', ''),
(3, 'test', 'test', 'test', '$2y$10$qGaMncF7p4zONiJdqaHnrebFznhlWSW6td02H6v/DvEdJIvTwK08u', '12345678-Z', 612345678, '1212-12-12', 'test@gmail.com'),
(13, 'aritz', 'aritz', 'aritz', '$2y$10$6aWsnzgMKRdD0HTMbugK0.98BthBILp8b5.MFPQl0YC/PxhtXTG.2', '12345678-Z', 612345678, '1111-11-11', 'aritz@gmail.com'),
(14, 'Asier', 'Larrazabal Subinas', 'asierla', '$2y$10$TNghim8UCc323BJKv6vsdOqBMbHVgS0RZ5R77NDpVrtFp.HvindBK', '16106286-F', 665231462, '2001-10-15', 'ik.asierlarrazabal@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
