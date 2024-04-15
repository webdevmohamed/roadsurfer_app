-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2024 a las 03:12:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roadsurfer_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_types`
--

CREATE TABLE `activity_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activity_types`
--

INSERT INTO `activity_types` (`id`, `name`) VALUES
(1, 'Surfing'),
(2, 'Running'),
(3, 'Cycling'),
(4, 'Swimming'),
(5, 'Walking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fitness_activities`
--

CREATE TABLE `fitness_activities` (
  `id` int(11) NOT NULL,
  `activity_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `distance` decimal(10,2) NOT NULL,
  `distance_unit` varchar(10) NOT NULL,
  `elapsed_time` time NOT NULL,
  `activity_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fitness_activities`
--

INSERT INTO `fitness_activities` (`id`, `activity_date`, `name`, `distance`, `distance_unit`, `elapsed_time`, `activity_type_id`) VALUES
(1, '2024-04-10', 'Morning Surf', 540.00, 'm', '00:30:00', 1),
(2, '2024-04-05', 'Afternoon Surf', 1.10, 'km', '01:00:00', 1),
(3, '2024-04-07', 'Evening Surf', 605.00, 'm', '00:45:00', 1),
(4, '2024-04-01', 'Morning Run', 10.60, 'km', '01:00:00', 2),
(5, '2024-04-10', 'Afternoon Run', 12.20, 'km', '01:25:00', 2),
(6, '2024-04-09', 'Evening Run', 85.00, 'hm', '00:50:00', 2),
(7, '2024-04-04', 'Morning Cycling', 257.00, 'hm', '01:30:00', 3),
(8, '2024-04-06', 'Afternoon Cycling', 30.50, 'km', '01:45:00', 3),
(9, '2024-04-02', 'Evening Cycling', 19.10, 'km', '01:15:00', 3),
(10, '2024-04-03', 'Morning Swim', 1050.00, 'm', '00:45:00', 4),
(11, '2024-04-07', 'Afternoon Swim', 1.20, 'km', '01:00:00', 4),
(12, '2024-04-04', 'Evening Swim', 8.70, 'hm', '00:30:00', 4),
(13, '2024-04-14', 'Morning Walk', 2000.00, 'm', '00:30:00', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fitness_activities`
--
ALTER TABLE `fitness_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_type_id` (`activity_type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `fitness_activities`
--
ALTER TABLE `fitness_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fitness_activities`
--
ALTER TABLE `fitness_activities`
  ADD CONSTRAINT `fitness_activities_ibfk_1` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
