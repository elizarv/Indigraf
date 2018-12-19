-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2018 a las 18:29:48
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indigraf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE `indicador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` mediumtext,
  `imagen` varchar(45) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `esPadre` int(11) NOT NULL,
  `unidadMedida` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`id`, `nombre`, `descripcion`, `imagen`, `padre`, `esPadre`, `unidadMedida`) VALUES
(0, 'cero', NULL, NULL, NULL, 1, ''),
(18, 'Movilidad', 'Estadísticas sobre la movilidad dentro de la UFPS.\nTiene en cuenta la movilidad internacional y nacional ya sea entrante o saliente.\nSe basa principalmente en movilidad de docentes y estudiantes.', 'back/images/movilidad.png', 0, 1, 'Personas'),
(19, 'Saliente', 'Estadísticas sobre la movilidad saliente de la UFPS.', 'back/images/saliente.png', 18, 0, 'Personas'),
(20, 'Entrante', 'Estadísticas de movilidad entrante en la UFPS', 'back/images/entrante.jpg', 18, 0, 'Personas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Indicador_Indicador_idx` (`padre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `fk_Indicador_Indicador` FOREIGN KEY (`padre`) REFERENCES `indicador` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
