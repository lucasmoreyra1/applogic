-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 04:07:06
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
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(3) NOT NULL,
  `entregado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `direccion`, `orden`, `entregado`) VALUES
(16, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(16, 'Bartolomé Mitre 200, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(18, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(18, 'Valle Hermoso, Córdoba, Argentina', 0, 0),
(22, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(22, 'Ruta Nacional 177, Villa Constitución, Santa Fe, Argentina', 0, 0),
(22, 'Villa Constitución, Santa Fe, Argentina', 0, 0),
(23, 'Mitre, Rosario, Santa Fe, Argentina', 0, 0),
(23, 'Ruta Nacional 177, Villa Constitución, Santa Fe, Argentina', 0, 0),
(25, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(29, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(30, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(33, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(39, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(39, 'Instituto De Yoga Mirta De Fussi, España, Rosario, Santa Fe, Argentina', 0, 0),
(39, 'Rosario, Santa Fe, Argentina', 0, 0),
(44, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0),
(48, 'Mitre, Rosario, Santa Fe, Argentina', 0, 0),
(48, 'Mitre, Villa Constitución, Santa Fe, Argentina', 0, 0),
(48, 'Bartolomé Mitre 564, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina', 0, 0);

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
(14, 'Lm@gmail.com', '$2y$10$DTEd30M/93.kbcG2BDxsx.8rvvJg6GcCh2jA5SQIDpI1qPmFInYTC', 'Laura Monzon'),
(15, 'ggh', '$2y$10$OuDN2QD15I5mZdD3oc5uweqR9rjRX2FsZ2mCD1BzVAUYAq27KaCH6', 'ggh'),
(16, 'jorge', '$2y$10$0BNdJc6dHloYzpBWyoYXZ..3W.qVI.KohUE6GZa5NI8A.1ricJvJS', 'jorge'),
(17, 'qqq', '$2y$10$sKbt4hWrcHM.kgJUONMLfei19p3OgiNnV1bkM7dqiXdgB/SYJQ1g6', 'qqq'),
(18, 'nnn', '$2y$10$aPp5TYq4w0Sg/uQTIGBXyujh1m0/a0z1kFF/K.HyRTxGfS4QASVzK', 'nnn'),
(19, '1', '$2y$10$MkztuyZLDnOMmN5YOa7EyuggAQstoxfhGSt1lDBY7wq1tG4DdaF6W', '1'),
(20, '2', '$2y$10$3z5M95SYAtjqOQAWQIyBS.HZ1e2zvzqiockmUhMmvmnSGsefbXSUS', '2'),
(21, '4', '$2y$10$/nmvPHssiI3.T0HvKcCdleWUWGvx4T2yBuITv0/s6VIS.Xua06GpO', '4'),
(22, '5', '$2y$10$EqZX0FG/8mzBIkOoj538Ne4j/XOzHtQG69hwzl3H7lOd/MNTZ8Tva', '5'),
(23, '00', '$2y$10$C.AEb4NrimUt2KJaQtVZvOhZx.e8Br0vH8bF6mPaaZ1Tl33fQ8I6W', '00'),
(24, '88', '$2y$10$9hHFVEReBTRnynmZ3iyn.OI4DnytvRzclHgtvguE7JUDuSXsjCKF2', '88'),
(25, 'kkk', '$2y$10$NSBcYfPJ2ET1EWXNWBRKeuVSbK1AuFM3uF4xA.txjwxeU9SrUlF8G', 'kkk'),
(26, '12', '$2y$10$rJxgOplYwWswk0KGypkX4uxVJSD3iQV2AX8XxLypgZp.t/JOSYXw.', '12'),
(27, 'mar', '$2y$10$JbT5i3L21qut3jB4nSctAuZqDVwemz.NeZCPvBrF.6xGafimeucTK', 'mar'),
(28, 'lll', '$2y$10$xvwa23ndzscqGwwfBBjjO.2PvH/.TQe64KO1ATXZ/GwTaVWRsjqsm', 'lll'),
(29, 'mn', '$2y$10$o0vdih730MP7Qh/5OOYMwOzdQhjP2eB.EaxDeK9QFw2TU/hi7bilO', 'mn'),
(30, 'nnnn', '$2y$10$LqirKl1GFbJMS4btolVJ0OrPwr/b2jG2SIspPe9nr0ynjRP4UCmZa', 'nnnn'),
(31, 'as', '$2y$10$ttJJJLe20rfCNEHpW38ZQefPezDFEdVQzEw54bcQYcWjVS1w6f7OS', 'as'),
(32, 'lk', '$2y$10$zUXLCcfFuUER3IKuH.n0kOJwko5.faepQDDgk6Wrubyc5DDD3kdY6', 'lk'),
(33, 'pp', '$2y$10$Gw/IgjJMp0qhQHgNxPgIvuvaifhdt2YgYM0BWYJuoiex01uvaW36.', 'pp'),
(34, '78', '$2y$10$4mdTqLzBwFqa/YnGYAolOO8hkuWJmpCAaOW6hAEAEAlzvfdOw2uT.', '78'),
(35, '56', '$2y$10$rZM3Tu9dS1a3ltwBnOzwmOCcCyVarMuFWAop6dmmQ76HE6BXNsoda', '56'),
(36, 'jh', '$2y$10$K8I/NzMfQsgSjftik9pEPe9Ob9AJNg0pbwpMKEKJUPqU6Gw23q7za', 'jh'),
(37, '45', '$2y$10$ey4Ov4Igsg81XMupxEbse.9GWlGzTP9lqLjBJIvsxV0tg72kLbTNi', '45'),
(38, '66', '$2y$10$LHpLwkLiy9Z6iVUQVD3t5eGqZnE064QRzkpdoWgyWsZh.vyxVH3cW', '66'),
(39, '55', '$2y$10$bpxVbHjfaXvoa/X0HynYtONdtzjCjxKZ0Nf475A1c8BFLtPgTjnDS', '55'),
(40, 'fg', '$2y$10$zKjLwhoQBJ3ljyBMrFJAE.5RJzBq7Plft73eK.o8LBw6vGqcpK4Rm', 'fg'),
(41, '--', '$2y$10$qkthq/O1k8vnR2K9IdaqU.I5tnZ/nJXaV5/UcKgudL7jXhMyNewEG', '--'),
(42, 'bv', '$2y$10$jTDSWQjqVR6MLoQc/F1MU.NQe6Ik0BWA.g4fvlf2PpLmjRTKXyJiy', 'bv'),
(43, 'mm', '$2y$10$RyQSeJfwOaq2PbiBasSxKuVdu99ig/3j19kqv/6ABmhkTE02gJGqy', 'mm'),
(44, 'dd', '$2y$10$3LL74kAIdO4uqNMHb9w10uGqplE8hhT96jbeSAXhf8fFAaRfK8SwS', 'dd'),
(45, 'aa', '$2y$10$TA3569vtVjjB1cty3Hz3Ae4N6KrDlkWUMSqQBhl14cD4TZOQfRJiy', 'aa'),
(46, '13', '$2y$10$MTrPlaAjmhopIitNdNMxMOgbk1/MezSKtqv8HTY04xD4RWQ4WtrMG', '13'),
(47, 'reg', '$2y$10$9m1IcG.Phu67vK4ABVsjO.veIBPanGLV33P5QgcLgCS92C761hcQG', 'reg'),
(48, 'bnm', '$2y$10$0sZ6C2DXJmSsod6OpHuQw.NfGrEP1/.OBR8/X9kDd3kCpRkWRZvq.', 'bnm'),
(49, '456', '$2y$10$X3I3X1S01ucSPfbKSwNNHuqJnP4WOaQS8t22tJsk.HqT9UGAOLXPi', '456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_ruta`
--

CREATE TABLE `user_ruta` (
  `id_ruta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ruta_inicio` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_ruta`
--

INSERT INTO `user_ruta` (`id_ruta`, `id_user`, `ruta_inicio`) VALUES
(1, 12, 'mitre 200 san nicolas'),
(5, 12, ''),
(6, 10, ''),
(7, 10, ''),
(8, 10, ''),
(9, 9, ''),
(10, 9, ''),
(11, 7, ''),
(12, 7, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(13, 15, ''),
(14, 15, ''),
(15, 15, ''),
(16, 16, ''),
(17, 17, ''),
(18, 18, ''),
(19, 19, ''),
(20, 20, ''),
(21, 21, ''),
(22, 22, ''),
(23, 23, ''),
(24, 24, ''),
(25, 25, NULL),
(26, 26, 'Asda Hulme Superstore, Princess Road, Hulme, Manchester, Reino Unido'),
(27, 27, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(28, 28, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(29, 29, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(30, 30, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(31, 31, NULL),
(32, 32, NULL),
(33, 33, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(34, 34, NULL),
(35, 35, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(36, 36, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(37, 37, NULL),
(38, 38, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(39, 39, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(40, 40, NULL),
(41, 41, NULL),
(42, 43, NULL),
(43, 44, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(44, 45, NULL),
(45, 46, 'Nacion 670, De la Nación, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(46, 47, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(47, 48, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina'),
(48, 49, 'Bartolomé Mitre, San Nicolás de Los Arroyos, Provincia de Buenos Aires, Argentina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `user_ruta`
--
ALTER TABLE `user_ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
