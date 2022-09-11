-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2022 a las 21:11:44
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
(8, 'diego@gmail.com', '$2y$10$1n0IbDIuqruZjR2ziUyvFOykbogz0padACX40r94P4URfOVw5OVR2', 'diego');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
