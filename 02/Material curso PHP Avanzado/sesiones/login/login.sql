-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2013 at 02:03 AM
-- Server version: 5.5.31-MariaDB
-- PHP Version: 5.5.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `etiqueta` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ruta` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish2_ci NOT NULL,
  `nivel` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `etiqueta`, `ruta`, `nivel`) VALUES
(1, '¿Quienes Somos?', 'pages/quienes_somos.php', 0),
(2, 'Productos', 'pages/productos.php', 0),
(3, 'Contáctenos', 'pages/contacto.php', 0),
(4, 'Facturación', 'pages/facturacion.php', 1),
(5, 'Clientes', 'pages/clientes.php', 1),
(6, 'Reportes', 'pages/reportes.php', 2),
(7, 'Proveedores', 'pages/proveedores.php', 3),
(8, 'Inventario', 'pages/inventario.php', 3),
(9, 'Usuarios', 'pages/usuarios.php', 4),
(10, 'Configuraciones', 'pages/config.php', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre completo',
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nivel` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `password`, `nivel`) VALUES
(1, 'Administrador', 'admin', 'd33931038d2904e5309afd65655801a020aa8e94', 3),
(2, 'Usuario', 'user', 'd33931038d2904e5309afd65655801a020aa8e94', 0),
(3, 'Cajero', 'cashier', 'd33931038d2904e5309afd65655801a020aa8e94', 1),
(4, 'Supervisor', 'super', 'd33931038d2904e5309afd65655801a020aa8e94', 2),
(5, 'Super Administrador', 'sadmin', 'd33931038d2904e5309afd65655801a020aa8e94', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
