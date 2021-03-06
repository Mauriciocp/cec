-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2014 a las 18:22:30
-- Versión del servidor: 5.5.33
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `contactos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `fechanacimiento` date NOT NULL,
  PRIMARY KEY (`id`,`pais_id`),
  KEY `fk_contacto_pais_idx` (`pais_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `direccion`, `telefono`, `email`, `pais_id`, `fechanacimiento`) VALUES
(1, 'mauricio', 'direccion', '23123', 'mauricio@crativa.ws', 1, '2014-05-14'),
(3, 'mauricio', 'villaflora', '2651146', 'dev@creativa.ws', 1, '2014-05-04'),
(5, '12', '2', '1234234', 'sdfsdf', 1, '2014-05-12'),
(6, 'henry', 's', '3', 'dev@creativa.ws', 1, '0000-00-00'),
(7, 'henry', 'villaflora', '2651146', 'asdasd@sadasd.com', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`) VALUES
(1, 'Ecuador', 'EC'),
(2, 'Argentina', 'AR');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_pais` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         