-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db-comilones
-- Tiempo de generación: 01-07-2020 a las 08:47:45
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
  `name` varchar(20) NOT NULL,
  `localidad` varchar(120) DEFAULT NULL,
  `precios` int DEFAULT NULL,
  `valoracion` int DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tipo_cocina` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `name`, `localidad`, `precios`, `valoracion`, `telefono`, `foto`, `tipo_cocina`) VALUES
(1, 'Casa Cholo', 'Palma de Mallorca', 50, 4, 666666666, NULL, 'Argentina'),
(2, 'Restaurante el embol', 'Marratxi', 40, 5, 666666666, NULL, 'Mallorquina'),
(3, 'Pizzeria trattoria', 'Palma de Mallorca', 75, 3, 666666666, NULL, 'Italiana'),
(4, 'Restaurante Fremi', 'Palma de Mallorca', 15, 2, 666666666, NULL, 'Casera'),
(6, 'Pizzeria Petato', 'Palma de Mallorca', 25, 2, 666666666, NULL, 'Italiana'),
(7, 'Restaurante BonJour', 'Portals Nous', 180, 4, 666666666, NULL, 'Francesa');

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
