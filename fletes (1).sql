-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2023 a las 01:36:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fletes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `ndoc` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `dir` varchar(60) NOT NULL,
  `zona` varchar(30) NOT NULL,
  `chofer` varchar(20) NOT NULL,
  `costo` int(11) NOT NULL,
  `estatus` varchar(4) NOT NULL DEFAULT 'A',
  `ffin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `ndoc`, `fecha`, `dir`, `zona`, `chofer`, `costo`, `estatus`, `ffin`) VALUES
(4, '5556655', '2023-06-08 16:03:00', 'Topo Chico 2354 ', 'Guadalupe', 'Héctor Rmz', 456, 'A', '2023-06-06 17:45:25'),
(12, '4455', '2023-06-08 11:06:00', 'vcxvcxv', 'Apodaca', 'Marcos Vega', 44, 'A', '2023-06-08 11:06:47'),
(13, '5687', '2023-06-08 11:06:00', 'vcvcx', 'San Nicolás', 'Héctor Rámirez', 444, 'A', '2023-06-08 11:07:05'),
(14, '567899', '2023-06-09 11:07:00', 'vcbvcbcv', 'San Pedro', 'Luis Gutierrez', 56, 'A', '2023-06-08 11:07:20'),
(15, '77898', '2023-06-09 11:07:00', '5555', 'Cienega de Flores', 'Salvador Hernández', 678, 'A', '2023-06-08 11:07:37'),
(16, '78', '2023-06-07 15:04:00', 'Amapola 234 Fracc Aztlan', 'Monterrey', 'Martín Hernández', 45, 'T', '2023-06-09 15:05:08'),
(17, '2232', '2023-06-10 15:05:00', 'ddfdfds', 'San Nicolás', 'Salvador Hernández', 45, 'A', '2023-06-09 15:05:47'),
(18, '231', '2023-06-07 15:05:00', 'soto la marina', 'San Pedro', 'Rolando Mata', 3, 'A', '2023-06-09 15:06:08'),
(19, '123', '2023-06-01 15:06:00', 'La encarnacion', 'Sta. Catarina', 'Martín Hernández', 23, 'A', '2023-06-09 15:06:29'),
(20, '6789', '2023-06-10 17:32:00', 'Tamesi 5676', 'Escobedo', 'Salvador Hernández', 45, 'A', '2023-06-09 17:32:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusr` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusr`, `nombre`, `usuario`, `clave`, `rol_id`) VALUES
(1, 'Nelson Carrasco', 'Sistemas', '12345', 1),
(2, 'ADMIN', 'admin', 'root', 1),
(3, 'Martín Hernández', 'martin', '12345', 2),
(4, 'Marcos Vega', 'Marcos', '12345', 2),
(5, 'Salvador Hdz', 'salvador', '1234', 2),
(6, 'Luis Gutiérrez', 'Luis', '1234', 2),
(7, 'Héctor Rámirez ', 'Hector', '1234', 2),
(8, 'José D la Torre', 'jose', '1234', 2),
(9, 'Salvador Hernández', 'salvador', '1234', 2),
(10, 'Rolando Mata', 'rolando', '1234', 2),
(11, 'Gregorio Fernando', 'gregorio', '1234', 2),
(12, 'Oscar Contreras', 'oscar', '1234', 2),
(13, 'Virgilio Ramos', 'virgilio', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusr`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `roles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
