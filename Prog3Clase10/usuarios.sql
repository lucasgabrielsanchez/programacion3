-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 21:33:36
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Perfil` varchar(20) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Email`, `Perfil`, `Edad`, `Clave`) VALUES
(17, 'Laura', 'Laura@hotmail.com', 'Usuario', 28, '$2y$10$DtIg3XUPAsveTpJWgDqKRuzK2eQpoe6x8mgq.hd.TFz.jrr420kO.'),
(18, 'Lucas', 'Lucas@hotmail.com', 'Admin', 25, '$2y$10$CY5J7AltcuU5EhCM76/IwutTYPcTCuahvn.gLXd0gb6twp6Lw3hCW'),
(19, 'Micaela', 'Micaela@hotmail.com', 'Usuario', 24, '$2y$10$SYjpdJqfpV89ZFGJoZpBI.S53NIDU4UXtVgNpBRl8YMJZqe9otcb.'),
(21, 'Pedro', 'Pedro@hotmail.com', 'Admin', 28, '$2y$10$q4wC6kC0ix6A5.rE6.954.kDNouWgt7cIwvGuiXwmjFs354Jhy3X6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
