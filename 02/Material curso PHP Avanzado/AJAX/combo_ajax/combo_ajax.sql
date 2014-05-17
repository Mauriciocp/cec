-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2013 at 01:31 PM
-- Server version: 5.5.31-MariaDB
-- PHP Version: 5.5.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `combo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `codigo` char(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`) VALUES
(1, 'Ecuador', 'EC'),
(2, 'Perú', 'PU'),
(3, 'Colombia', 'CO'),
(4, 'Venezuela', 'VE');

-- --------------------------------------------------------

--
-- Table structure for table `provincia_estado`
--

CREATE TABLE IF NOT EXISTS `provincia_estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pais` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `provincia_estado`
--

INSERT INTO `provincia_estado` (`id`, `nombre`, `pais`) VALUES
(10, 'Esmeraldas', 1),
(11, 'Carchi', 1),
(12, 'Orellana', 1),
(13, 'Manabí', 1),
(14, 'Sucumbíos', 1),
(15, 'Santa Elena', 1),
(16, 'Pichincha', 1),
(17, 'Napo', 1),
(18, 'Guayas', 1),
(19, 'Cotopaxi', 1),
(20, 'El Oro', 1),
(21, 'Pastaza', 1),
(22, 'El Oro', 1),
(23, 'Tungurahua', 1),
(24, 'Morona Santiago', 1),
(25, 'Chimborazo', 1),
(26, 'Bolívar', 1),
(27, 'Cañar', 1),
(28, 'Azuay', 1),
(29, 'Loja', 1),
(30, 'Zamora Chinchipe', 1),
(31, 'Galápagos', 1),
(32, 'Antioquia', 3),
(33, 'Bolívar', 3),
(34, 'Boyacá', 3),
(35, 'Caldas', 3),
(36, 'Cauca', 3),
(37, 'Chocó', 3),
(38, 'Cundinamarca', 3),
(39, 'Huila', 3),
(40, 'La Guajira', 3),
(41, 'Meta', 3),
(42, 'Nariño', 3),
(43, 'Norte de Santander', 3),
(44, 'Santander', 3),
(45, 'Sucre', 3),
(46, 'Tolima', 3),
(47, 'Valle del Cauca', 3),
(48, 'Amazonas', 2),
(49, 'Ancash', 2),
(50, 'Apurimac', 2),
(51, 'Arequipa', 2),
(52, 'Ayacucho', 2),
(53, 'Cajamarca', 2),
(54, 'Cusco', 2),
(55, 'Huancavelica', 2),
(56, 'Huanuco', 2),
(57, 'Ica', 2),
(58, 'Junín', 2),
(59, 'La Libertad', 2),
(60, 'Lambayeque', 2),
(61, 'Lima', 2),
(62, 'Loreto', 2),
(63, 'Madre de Dios', 2),
(64, 'Moquegua', 2),
(65, 'Pasto', 2),
(66, 'Piura', 2),
(67, 'Puno', 2),
(68, 'San Marín', 2),
(69, 'Tacna', 2),
(70, 'Tumbes', 2),
(71, 'Ucayali', 2),
(72, 'Collao', 2),
(73, 'Amazonas', 4),
(74, 'Anzoátegui', 4),
(75, 'Apure', 4),
(76, 'Arague', 4),
(77, 'Barinas', 4),
(78, 'Bolívar', 4),
(79, 'Carabobo', 4),
(80, 'Cojedes', 4),
(81, 'Delta Smacuro', 4),
(82, 'Dependencias Federales', 4),
(83, 'Distrito Capital', 4),
(84, 'Falcón', 4),
(85, 'Guarico', 4),
(86, 'Lara', 4),
(87, 'Mérida', 4),
(88, 'Miranda', 4),
(89, 'Monagas', 4),
(90, 'Nueva Esparta', 4),
(91, 'Portuguesa', 4),
(92, 'Sucre', 4),
(93, 'Táchira', 4),
(94, 'Francisca de Miranda', 4),
(95, 'Trujillo', 4),
(96, 'Vargas', 4),
(97, 'Yaracuy', 4),
(98, 'Zulia', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
