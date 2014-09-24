-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2014 a las 23:53:44
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `banco_alimentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE IF NOT EXISTS `alimento` (
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`codigo`, `descripcion`) VALUES
('1', 'Leche en Polvo'),
('2', 'Harina de arroz (000)'),
('f943', 'Yerba3 Matea'),
('f9432', 'das2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_donante`
--

CREATE TABLE IF NOT EXISTS `alimento_donante` (
  `detalle_alimento_id` int(11) NOT NULL,
  `donante_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_alimento`
--

CREATE TABLE IF NOT EXISTS `detalle_alimento` (
`id` int(11) NOT NULL,
  `alimento_codigo` varchar(10) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `stock` int(11) NOT NULL,
  `peso_unitario` double(6,2) NOT NULL,
  `reservado` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `detalle_alimento`
--

INSERT INTO `detalle_alimento` (`id`, `alimento_codigo`, `contenido`, `fecha_vencimiento`, `stock`, `peso_unitario`, `reservado`) VALUES
(6, '1', '31231', '2014-09-26', 213, 123.00, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE IF NOT EXISTS `donante` (
`id` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `apellido_contacto` varchar(50) NOT NULL,
  `nombre_contacto` varchar(50) NOT NULL,
  `telefono_contacto` varchar(30) NOT NULL,
  `mail_contacto` varchar(50) NOT NULL,
  `domicilio_contacto` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`id`, `razon_social`, `apellido_contacto`, `nombre_contacto`, `telefono_contacto`, `mail_contacto`, `domicilio_contacto`) VALUES
(2, 'hola', 'holad', 'hgolah', 'hosafo', 'dhofdghopmp', 'dfposckpodg'),
(5, 'Coopergar', 'Rodrigue', 'Juan', '542214257922', 'Qucsito@hotmail.com', ' 117 nro 27'),
(6, 'Menem', 'Roberto', 'Robertitussen', '8549665', '89489@hotmail.com', 'ads11221'),
(8, 'Carlancion', 'Peperinopiolipo', 'Cancon', '213', '99999@hotmail.com', 'ads11221');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_receptora`
--

CREATE TABLE IF NOT EXISTS `entidad_receptora` (
`id` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `estado_entidad_id` int(11) NOT NULL,
  `necesidad_entidad_id` int(11) NOT NULL,
  `servicio_prestado_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `entidad_receptora`
--

INSERT INTO `entidad_receptora` (`id`, `razon_social`, `telefono`, `domicilio`, `estado_entidad_id`, `necesidad_entidad_id`, `servicio_prestado_id`) VALUES
(30, 'Franchela', 'Holis', '+65+6+95+89849848', 4, 3, 4),
(31, 'Giopdsaawdads', 'dsfhdgsgasd', 'shdfhsdfdfsfds', 3, 3, 3),
(32, 'Giopdsadg45', 'dsfhdgsgfgdfg', 'shdfhsdf', 3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_entidad`
--

CREATE TABLE IF NOT EXISTS `estado_entidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_entidad`
--

INSERT INTO `estado_entidad` (`id`, `descripcion`) VALUES
(1, 'alta'),
(2, 'en tramite'),
(3, 'suspendida'),
(4, 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `necesidad_entidad`
--

CREATE TABLE IF NOT EXISTS `necesidad_entidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `necesidad_entidad`
--

INSERT INTO `necesidad_entidad` (`id`, `descripcion`) VALUES
(1, 'maxima'),
(2, 'mediana'),
(3, 'minima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_prestado`
--

CREATE TABLE IF NOT EXISTS `servicio_prestado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_prestado`
--

INSERT INTO `servicio_prestado` (`id`, `descripcion`) VALUES
(1, 'hogar de dia'),
(2, 'comedor infantil'),
(3, 'hogar de adolescentes'),
(4, 'jardín maternal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'peon', 'peonpeon'),
(2, 'admin', 'adminadmin'),
(3, 'gestion', 'gestiongestion'),
(4, 'consulta', 'consultaconsulta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `alimento_donante`
--
ALTER TABLE `alimento_donante`
 ADD PRIMARY KEY (`detalle_alimento_id`,`donante_id`);

--
-- Indices de la tabla `detalle_alimento`
--
ALTER TABLE `detalle_alimento`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidad_receptora`
--
ALTER TABLE `entidad_receptora`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_entidad`
--
ALTER TABLE `estado_entidad`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `necesidad_entidad`
--
ALTER TABLE `necesidad_entidad`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_prestado`
--
ALTER TABLE `servicio_prestado`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_alimento`
--
ALTER TABLE `detalle_alimento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `donante`
--
ALTER TABLE `donante`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `entidad_receptora`
--
ALTER TABLE `entidad_receptora`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
