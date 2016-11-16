-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2016 a las 17:25:33
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemh4_principal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rbac_modulos`
--

CREATE TABLE IF NOT EXISTS `rbac_modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(64) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rbac_modulos`
--

INSERT INTO `rbac_modulos` (`id`, `Titulo`, `Descripcion`) VALUES
(1, 'rbac', 'Modulo de Control de Roles y Permisos de Usuarios. Permite asignar distintos niveles de acceso a cada uno de los módulos en base a una lista de permisos agrupados por rol.'),
(2, 'pb', 'Modulo de Plan Bimestral. Permite definir una serie de Gastos Proyectados los cuales se van cotejando contra los gastos reales en las sucursales.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rbac_permisos`
--

CREATE TABLE IF NOT EXISTS `rbac_permisos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `moduloID` int(11) NOT NULL,
  `Titulo` char(64) COLLATE utf8_bin NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `Title` (`Titulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `rbac_permisos`
--

INSERT INTO `rbac_permisos` (`ID`, `moduloID`, `Titulo`, `Descripcion`) VALUES
(2, 2, 'ver_PB_global', 'Puede ver los Planes Bimestrales de todas las sucursales '),
(3, 2, 'ver_PB_regional', 'Puede ver los Planes Bimestrales de su región.'),
(4, 2, 'ver_PB_local', 'Puede ver el Plan Bimestral de su sucursal.'),
(5, 2, 'crear_gasto_proyectado', 'Puede crear nuevos gastos proyectados.'),
(6, 2, 'leer_gasto_proyectado', 'Puede leer gastos proyectados.'),
(7, 2, 'editar_gasto_proyectado', 'Puede editar gastos proyectados.'),
(8, 2, 'borrar_gasto_proyectado', 'Puede eliminar gastos proyectados.'),
(9, 2, 'crear_gasto', 'Puede crear gastos.'),
(10, 2, 'leer_gasto', 'Puede ver los gastos existentes.'),
(11, 2, 'editar_gasto', 'Puede editar los gastos existentes.'),
(12, 2, 'borrar_gasto', 'Puede eliminar un gasto.'),
(13, 1, 'ver_RBAC', 'Puede ver el modulo de configuración de Permisos y Roles de acceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rbac_permisos_rol`
--

CREATE TABLE IF NOT EXISTS `rbac_permisos_rol` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rolID` int(11) NOT NULL,
  `permisoID` int(11) NOT NULL,
  `fechaAsignacion` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `rbac_permisos_rol`
--

INSERT INTO `rbac_permisos_rol` (`ID`, `rolID`, `permisoID`, `fechaAsignacion`) VALUES
(1, 1, 2, '2016-11-10 22:06:16'),
(2, 1, 3, '2016-11-10 22:08:57'),
(5, 1, 6, '2016-11-10 22:08:57'),
(6, 1, 7, '2016-11-10 22:08:57'),
(7, 1, 4, '2016-11-10 22:08:57'),
(8, 1, 5, '2016-11-10 22:08:57'),
(9, 1, 6, '2016-11-10 22:08:57'),
(10, 1, 7, '2016-11-10 22:08:57'),
(11, 1, 8, '2016-11-10 22:08:57'),
(12, 1, 9, '2016-11-10 22:08:57'),
(13, 1, 10, '2016-11-10 22:08:57'),
(14, 1, 11, '2016-11-10 22:08:57'),
(15, 1, 12, '2016-11-10 22:08:57'),
(16, 2, 2, '2016-11-10 22:08:57'),
(19, 2, 5, '2016-11-10 22:08:57'),
(20, 2, 6, '2016-11-10 22:08:57'),
(21, 2, 7, '2016-11-10 22:08:57'),
(22, 2, 4, '2016-11-10 22:08:57'),
(23, 2, 5, '2016-11-10 22:08:57'),
(24, 2, 6, '2016-11-10 22:08:57'),
(25, 2, 7, '2016-11-10 22:08:57'),
(26, 2, 8, '2016-11-10 22:08:57'),
(27, 2, 9, '2016-11-10 22:08:57'),
(28, 2, 10, '2016-11-10 22:08:57'),
(29, 2, 11, '2016-11-10 22:08:57'),
(30, 2, 12, '2016-11-10 22:08:57'),
(31, 3, 3, '2016-11-10 22:08:57'),
(32, 3, 4, '2016-11-10 22:08:57'),
(33, 3, 5, '2016-11-10 22:08:57'),
(34, 3, 6, '2016-11-10 22:08:57'),
(35, 3, 7, '2016-11-10 22:08:57'),
(36, 3, 4, '2016-11-10 22:08:57'),
(37, 3, 5, '2016-11-10 22:08:57'),
(38, 3, 6, '2016-11-10 22:08:57'),
(39, 3, 7, '2016-11-10 22:08:57'),
(40, 3, 8, '2016-11-10 22:08:57'),
(41, 3, 9, '2016-11-10 22:08:57'),
(42, 3, 10, '2016-11-10 22:08:57'),
(43, 3, 11, '2016-11-10 22:08:57'),
(44, 3, 12, '2016-11-10 22:08:57'),
(45, 4, 4, '2016-11-10 22:08:57'),
(46, 4, 5, '2016-11-10 22:08:57'),
(47, 4, 6, '2016-11-10 22:08:57'),
(48, 4, 7, '2016-11-10 22:08:57'),
(49, 4, 4, '2016-11-10 22:08:57'),
(50, 4, 5, '2016-11-10 22:08:57'),
(51, 4, 6, '2016-11-10 22:08:57'),
(52, 4, 7, '2016-11-10 22:08:57'),
(53, 4, 8, '2016-11-10 22:08:57'),
(54, 4, 9, '2016-11-10 22:08:57'),
(55, 4, 10, '2016-11-10 22:08:57'),
(56, 4, 11, '2016-11-10 22:08:57'),
(57, 4, 12, '2016-11-10 22:08:57'),
(58, 5, 4, '2016-11-10 22:08:57'),
(59, 5, 6, '2016-11-10 22:08:57'),
(60, 5, 9, '2016-11-10 22:08:57'),
(61, 5, 10, '2016-11-10 22:08:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rbac_roles`
--

CREATE TABLE IF NOT EXISTS `rbac_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(128) COLLATE utf8_bin NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Title` (`Titulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rbac_roles`
--

INSERT INTO `rbac_roles` (`ID`, `Titulo`, `Descripcion`) VALUES
(1, 'ROOT', 'ROOT'),
(2, 'ADMINISTRA', 'Descripción de administrador'),
(3, 'GERENTE', 'Descripción de Gerente'),
(4, 'SUPERVISOR', 'Descripción de supervisor.'),
(5, 'FINANCIERO', 'Descripción de financiero.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rbac_rol_usuarios`
--

CREATE TABLE IF NOT EXISTS `rbac_rol_usuarios` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `AssignmentDate` timestamp NOT NULL,
  PRIMARY KEY (`UserID`,`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rbac_rol_usuarios`
--

INSERT INTO `rbac_rol_usuarios` (`UserID`, `RoleID`, `AssignmentDate`) VALUES
(8111, 1, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
