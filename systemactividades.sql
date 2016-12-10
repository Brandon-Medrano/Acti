-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2016 a las 01:11:31
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `systemactividades`
--
CREATE DATABASE IF NOT EXISTS `systemactividades` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `systemactividades`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id_actividad` bigint(255) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) NOT NULL,
  `estatus` varchar(17) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `nombre_empleado` varchar(25) NOT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `fecha`, `estatus`, `descripcion`, `nombre_empleado`) VALUES
(78, '2016-06-23', 'Realizado', 'se realizo manteamiento preventivo en computo  alas maquinas 25 y mas 37 con n/s 6327327623723673266 y 2363273627376237623', 'Lic. Hector Alejandro'),
(79, '2016-06-20', 'Realizado', 'se realizo sistema para control de actividades de jefes de departamento para llevar un mejor contol', 'Lic. Hector Alejandro'),
(80, '2016-06-14', 'Realizado', 'realizar respaldo infromacion de computadoras con el proceso catalizador', 'Lic. Hector Alejandro'),
(81, '2016-06-21', 'No Realiado', 'se realizo la actividad de compras de  camisetas para el equipo de fútbol femenil', 'Lic. Jose Alejandro'),
(82, '2016-06-16', 'Realizado', 'se realizo la  actividad de creacion de un sitio web para e area de  radiodifundir ', 'Lic. Hector Alejandro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `id_consulta` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_empleado` varchar(4) NOT NULL,
  `id_area` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(32) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `nombre_empleado` varchar(40) NOT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_empleado`, `id_area`, `fecha`, `estatus`, `descripcion`, `nombre_empleado`) VALUES
(73, '5013', 'Depto. de Centro de Computo', '2016-06-23', 'Realizado', 'se realizo manteamiento preventivo en computo  alas maquinas 25 y mas 37 ', 'Lic. Hector Alejandro'),
(74, '5013', 'Depto. de Centro de Computo', '2016-06-20', 'Realizado', 'se realizo sistema para control de actividades de jefes de departamento para llevar un mejor contol', 'Lic. Hector Alejandro'),
(75, '5013', 'Depto. de Centro de Computo', '2016-06-14', 'Realizado', 'realizar respaldo infromacion de computadoras con el proceso catalizador', 'Lic. Hector Alejandro'),
(76, '5012', 'Subdireccion de Servicios Administrativo', '2016-06-21', 'No Realiado', 'se realizo la actividad de compras de  camisetas para el equipo de fútbol femenil', 'Lic. Jose Alejandro'),
(77, '5013', 'Depto. de Centro de Computo', '2016-06-16', 'Realizado', 'se realizo la  actividad de creacion de un sitio web para e area de  radiodifundir ', 'Lic. Hector Alejandro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(12) NOT NULL AUTO_INCREMENT,
  `nombre_empleado` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(44) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_area` varchar(70) NOT NULL,
  `pasadmin` varchar(17) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5057 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `ap_paterno`, `ap_materno`, `password`, `id_area`, `pasadmin`) VALUES
(5012, 'Lic. Jose Alejandro', 'Acosta', 'Gonzalez', 'sub1370', 'Subdireccion de Servicios Administrativos', 'agja2872'),
(5013, 'Lic. Hector Alejandro', 'Ochoa', 'Alvarez', 'site34', 'Depto. de Centro de Computo', 'site2377'),
(5015, 'Eric Ali', 'Casados', 'Arriaga', 'ali454', 'Depto. de Centro de Computo', ''),
(5016, 'Gabriela', 'Carmona', 'Carranza', 'gabi48', 'Depto. de Recursos Humanos', ''),
(5017, 'Ivan', 'Del Rio', 'Landa', 'Ivan988', 'Depto. de Recursos Humanos', ''),
(5018, 'Olga Lidia', 'Ortiz', 'Garcia', 'Olga93832', 'Depto. de Recursos Financieros', ''),
(5019, 'Cesar Jeovanny', 'Lobaton', 'Ramirez', 'Cesar0992', 'Depto. de Recursos Financieros', ''),
(5020, 'Lic. Nemorio', 'Ortega', 'Hernandez', 'nemorio247', 'Depto. de Recursos Materiales y Servicios.', ''),
(5021, 'Lizeth Noemi', 'Ramirez', 'Martignon', 'lize54353', 'Depto. de Recursos Materiales y Servicios.', ''),
(5022, 'Edgar Agustin', 'Zepeda', 'Sanchez', 'edagar6754', 'Depto. de Mantenimiento y Equipo', ''),
(5023, 'Luis Angel', 'Ochoa', 'Miranda', 'luis7463', 'Depto. de Mantenimiento y Equipo', ''),
(5056, 'Irene', 'Barron', 'Perez', 'barron2723', 'Depto. de Recursos Financieros', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `id_matenimiento` bigint(255) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(80) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_matenimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_matenimiento`, `servicio`, `tipo`, `estatus`, `fecha`) VALUES
(1, 'supervisar el servidor y equipo de computo de site ', 'interno', 'Realizado', '2016-06-16'),
(17, 'Realiza chequeo de  los laboratorios de computo 1 y 2', 'interno', 'pendiente', '2016-06-15'),
(19, 'Realizar chequeo de consumo de agua', 'interno', 'pendiente', '2016-06-24'),
(20, 'Realizar chequeo de consumo de agua', 'interno', 'Realizado', '2016-06-25'),
(21, 'supervisar servidor y equipos', 'interno', 'Realizado', '2016-06-16'),
(22, 'chequeo de red en departamentos', 'interno', 'pendiente', '2016-06-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
