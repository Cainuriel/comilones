-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db-comilones
-- Tiempo de generación: 19-09-2020 a las 16:31:56
-- Versión del servidor: 8.0.20
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comilones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `direccion` varchar(75) NOT NULL,
  `localidad` varchar(120) DEFAULT NULL,
  `cp` int NOT NULL,
  `precios` int DEFAULT NULL,
  `valoracion` int DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tipo_cocina` varchar(200) NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `name`, `direccion`, `localidad`, `cp`, `precios`, `valoracion`, `telefono`, `foto`, `tipo_cocina`, `latitud`, `longitud`) VALUES
(1, 'Can torrat', '', 'Palma de Mallorca', 0, 35, 2, 666666666, 'img/can_torrat.png', 'Mallorquina', 39.5231, 2.75269),
(2, 'Celler de Sa Premsa', '', 'Palma de Mallorca', 0, 13, 5, 666666666, 'img/celler_sa_prensa.jpg', 'Mallorquina', 39.5766, 2.65169),
(3, 'Diablito Portitxol', '', 'Palma de Mallorca', 0, 20, 2, 666666666, 'img/diablito_porto_pi.jpg', 'Italiana', 39.5625, 2.66699),
(4, 'Es 4 vents', '', 'Algaida', 0, 35, 3, 666666666, 'img/es-4-vents.jpg', 'Mallorquina', 39.5655, 2.90275),
(6, 'Perla Brillante', '', 'Manacor', 0, 55, 4, 666666666, 'img/perla_brillante.jpg', 'China', 39.5667, 3.21492),
(7, 'Pura Louzao', '', 'Palma de Mallorca', 0, 40, 4, 666666666, 'img/puralouzao.jpg', 'Alta cocina', 39.5717, 2.64158);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
