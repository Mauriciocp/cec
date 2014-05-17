-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2013 at 04:55 AM
-- Server version: 5.5.31-MariaDB
-- PHP Version: 5.5.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cliente`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci` char(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado_civil` enum('Casado','Soltero','Viudo','Unión Libre') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `ci`, `nombres`, `apellidos`, `estado_civil`, `fecha_nacimiento`) VALUES
(1, '1715614789', 'Carlos Alberto', 'Jaramillo Fernández', 'Soltero', '1970-04-17'),
(2, '0614852974', 'María Fernanda', 'Trujillo Cando', 'Viudo', '1935-08-18'),
(3, '1758964712', 'Ernesto Javier', 'Pérez Mantilla', 'Unión Libre', '1981-06-03'),
(4, '0285671498', 'José Mauricio', 'Villalba Montenegro', 'Casado', '1979-10-10'),
(5, '0602158749', 'Eduardo Patricio', 'Caicedo Murillo', 'Casado', '1976-01-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
