-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2022 a las 09:40:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ubitec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `waypoint_id` int(13) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `orden` int(3) NOT NULL,
  `entregado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nickname`) VALUES
(4, 'qerqweq', '$2y$10$90nF8jNrWETAEO4KSxzGqORyJCgOKy9jEOywO6VThJ/X4HnN1M1WG', 'pedro123'),
(5, 'test123@mail.com', '$2y$10$w4GmgbWdi9fz7ttQjfkUyes9lDdART7YzqWSCrDEh6.5V84zPNQwK', 'pedro1'),
(6, 'prueba123@gmail.com', '$2y$10$a0qA9mKX3X/YlCTbbygBN.nIgLznnDTFBQyzIgdkNT7lVFNDVemQW', 'testeo'),
(7, 'tito', '$2y$10$CAgcZK4E4XM3.YD57Ch8uuc7NUMd3YSiaMlad4ghjdd2Fuv0mW0qG', 'tito'),
(8, 'diego@gmail.com', '$2y$10$1n0IbDIuqruZjR2ziUyvFOykbogz0padACX40r94P4URfOVw5OVR2', 'diego'),
(9, '0@0.com', '$2y$10$dO6P.xdCAqeclkImCas5/en5gPfy/kqrkWUJPwGC8xYH.vsX64Y3G', 'Juan Perez'),
(10, 'correo@falso.com', '$2y$10$R31iJHweI/GUmDZIXl38we8oST/fd0eqySJOKyTQSQTB9X1lwJuDe', 'Jorge Lopez'),
(11, 'Martinfgmail.com', '$2y$10$Zx/2BK37FjERP5ha4hKVAOqe034j9VZxiYgacYMG06SGppNIXEKr.', 'Martin Fernandez'),
(12, 'Jmr@gmail.com', '$2y$10$Plt90.GWVtqFgisQbOb/A.jgNY1t8Z8z5pWFJfILfGfYllJNAw3dK', 'JOse Martinez'),
(13, 'ramirezignacio491@gmail.com', '$2y$10$uFQU8U8HyHexlKudc106n.Db4sKbN1PvIOcnrpbyZsSsMUuuggIUK', 'NachoRam27'),
(14, 'Lm@gmail.com', '$2y$10$DTEd30M/93.kbcG2BDxsx.8rvvJg6GcCh2jA5SQIDpI1qPmFInYTC', 'Laura Monzon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_ruta`
--

CREATE TABLE `user_ruta` (
  `id_ruta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nombre_ruta` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`waypoint_id`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_ruta`
--
ALTER TABLE `user_ruta`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user_ruta`
--
ALTER TABLE `user_ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `user_ruta` (`id_ruta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_ruta`
--
ALTER TABLE `user_ruta`
  ADD CONSTRAINT `user_ruta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
