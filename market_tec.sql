-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2018 a las 18:13:28
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `market_tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `sesion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `imagen` text,
  `estatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `clave` varchar(6) DEFAULT NULL,
  `borde` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `nombre`, `clave`, `borde`) VALUES
(1, 'Negro', '000000', 0),
(2, 'Azul', '0071BC', 0),
(3, 'Amarillo', 'FFFF00', 0),
(4, 'Rojo', 'ED1C24', 0),
(5, 'Morado', '662D91', 0),
(6, 'Rosa', 'FF7BAC', 0),
(7, 'Naranja', 'F15A24', 0),
(8, 'Verde', '009245', 0),
(9, 'Blanco', 'FFFFFF', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `consecutivo` varchar(10) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_usuario`
--

CREATE TABLE `info_usuario` (
  `id_info_usuario` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `codigo_postal` varchar(12) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `vigencia` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL DEFAULT '0',
  `id_equipo` int(11) NOT NULL DEFAULT '0',
  `sexo` varchar(1) NOT NULL DEFAULT 'M',
  `fecha_nac` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Consultas'),
(3, 'Editor'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `imagen` text,
  `precio` decimal(10,2) DEFAULT NULL,
  `unidad` varchar(10) DEFAULT NULL,
  `estatus` int(1) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_carrito`
--

CREATE TABLE `prod_carrito` (
  `id_prod_carrito` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_carrito` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_ent`
--

CREATE TABLE `prod_ent` (
  `id_prod_ent` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_sal`
--

CREATE TABLE `prod_sal` (
  `id_prod_sal` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `id_salida` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad_home`
--

CREATE TABLE `publicidad_home` (
  `id_publicidad_home` int(11) NOT NULL,
  `imagen` text,
  `liga` text,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `consecutivo` varchar(10) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT '1',
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `estatus` int(2) NOT NULL DEFAULT '1',
  `id_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidos`, `correo`, `pass`, `estatus`, `id_perfil`) VALUES
(1, 'Andres', 'Gómez', 'andres@recaudia.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(2, 'Guillermo', 'Pulos', 'gpulos@loyaltyrefunds.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(3, 'Usuario', 'Consultas', 'consultasPlanP@loyaltyrefunds.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 2),
(6, 'Andres Felipe', 'Gómez Díaz', 'gomez_andresf@hotmail.com', '65fc456700480b9b966f0c86fb345bb91073b9ab', 1, 4),
(7, 'Miguel', 'Hernandez Medina', 'miguel@correo.com', 'de615c0929b397366d41734bf38f3a1786e2035c', 1, 4),
(8, 'Gustavo', 'Perez Velasco', 'gperezvelascol@gmail.com', '30bf1c2d807e3bb353490466ae596ea827fc3568', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  ADD PRIMARY KEY (`id_info_usuario`,`id_usuario`),
  ADD KEY `fk_info_usuario_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`,`id_categoria`),
  ADD KEY `fk_producto_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_producto_color1_idx` (`id_color`);

--
-- Indices de la tabla `prod_carrito`
--
ALTER TABLE `prod_carrito`
  ADD PRIMARY KEY (`id_prod_carrito`,`id_carrito`),
  ADD KEY `fk_prod_carrito_carrito1_idx` (`id_carrito`);

--
-- Indices de la tabla `prod_ent`
--
ALTER TABLE `prod_ent`
  ADD PRIMARY KEY (`id_prod_ent`,`id_producto`,`id_entrada`),
  ADD KEY `fk_prod_ent_producto1_idx` (`id_producto`),
  ADD KEY `fk_prod_ent_entrada1_idx` (`id_entrada`);

--
-- Indices de la tabla `prod_sal`
--
ALTER TABLE `prod_sal`
  ADD PRIMARY KEY (`id_prod_sal`,`id_producto`,`id_salida`),
  ADD KEY `fk_prod_sal_producto1_idx` (`id_producto`),
  ADD KEY `fk_prod_sal_salida1_idx` (`id_salida`);

--
-- Indices de la tabla `publicidad_home`
--
ALTER TABLE `publicidad_home`
  ADD PRIMARY KEY (`id_publicidad_home`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_perfil`),
  ADD KEY `fk_usuario_perfil_idx` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  MODIFY `id_info_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prod_carrito`
--
ALTER TABLE `prod_carrito`
  MODIFY `id_prod_carrito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prod_ent`
--
ALTER TABLE `prod_ent`
  MODIFY `id_prod_ent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prod_sal`
--
ALTER TABLE `prod_sal`
  MODIFY `id_prod_sal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `publicidad_home`
--
ALTER TABLE `publicidad_home`
  MODIFY `id_publicidad_home` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
