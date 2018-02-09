-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2018 a las 20:05:01
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smarthotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_configuracion`
--

CREATE TABLE `sh_configuracion` (
  `nombre_hotel` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `ciudad` varchar(128) NOT NULL,
  `pais` varchar(128) NOT NULL,
  `codigo_postal` int(8) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `info` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sh_configuracion`
--

INSERT INTO `sh_configuracion` (`nombre_hotel`, `correo`, `ciudad`, `pais`, `codigo_postal`, `direccion`, `info`) VALUES
('Hotel Feliz', 'soporte@hotelfeliz.com', 'CuliacÃ¡n', 'MÃ©xico', 80120, 'Priv. Rio Suchiate 1125', 'Somos un hotel muy feliz owo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_habitaciones`
--

CREATE TABLE `sh_habitaciones` (
  `habitacion` int(16) NOT NULL,
  `id_tipo_habitacion` int(16) NOT NULL,
  `id_piso` int(16) NOT NULL,
  `iot_id` varchar(256) NOT NULL,
  `iot_key` varchar(256) NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sh_habitaciones`
--

INSERT INTO `sh_habitaciones` (`habitacion`, `id_tipo_habitacion`, `id_piso`, `iot_id`, `iot_key`, `estatus`) VALUES
(101, 2, 1, 'Test-1', '', 1),
(102, 1, 1, '', '', 1),
(201, 2, 2, '', '', 1),
(202, 1, 2, '', '', 1),
(301, 2, 3, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_habitaciones_tipos`
--

CREATE TABLE `sh_habitaciones_tipos` (
  `id_tipo_habitacion` int(16) NOT NULL,
  `tipo_habitacion` varchar(64) NOT NULL,
  `costo_mx` int(8) NOT NULL,
  `costo_usd` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sh_habitaciones_tipos`
--

INSERT INTO `sh_habitaciones_tipos` (`id_tipo_habitacion`, `tipo_habitacion`, `costo_mx`, `costo_usd`) VALUES
(1, 'Cama sencilla', 800, 35),
(2, 'Cama doble', 1800, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_huespedes`
--

CREATE TABLE `sh_huespedes` (
  `id_huesped` int(16) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` varchar(128) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pais_id` varchar(16) NOT NULL,
  `direccion` text NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `clave` char(64) NOT NULL,
  `gsm_key` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sh_huespedes`
--

INSERT INTO `sh_huespedes` (`id_huesped`, `correo`, `nombre`, `apellido`, `telefono`, `fecha_registro`, `pais_id`, `direccion`, `ultimo_login`, `clave`, `gsm_key`) VALUES
(2, 'ricardoreyes@hotmail.com', 'Ricardo', 'Reyes Cortes', '667774489', '2018-02-03 00:55:24', 'Mexico', 'Priv. Rio Suchiate 1125', '0000-00-00 00:00:00', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', ''),
(5, 'aldodanielfigueroa@gmail.com', 'Aldo Daniel', 'Figueroa Valle', '6677806811', '2018-02-03 01:05:14', 'Niger', 'Calle desconocida', '0000-00-00 00:00:00', '39be519c5e9629211acb2c9034e778e1e528f091f7650f962d438385bcec12dc', ''),
(6, 'alexiatarinadln@gmail.com', 'Alexia Adilene', 'Tarin', '6442501555', '2018-02-03 01:39:40', 'Mexico', '612 N Claremont St', '0000-00-00 00:00:00', 'eb2de31bf5f0876db334c64cc142fa5f5ef1fd41ce8595a2e81769b85b2c48f6', ''),
(7, 'mariselacortes@gmail.com', 'Marisela', 'CortÃ©s Gutierrez', '6671383065', '2018-02-04 05:25:56', 'Mexico', 'Priv. Rio Suchiate 1125', '0000-00-00 00:00:00', '7686e0a07516fbe42a6afc23ba7cbcc24435b8a38c10b46453a91cc07a673824', ''),
(8, 'arc980103@gmail.com', 'Alfonso', 'Reyes CortÃ©s', '6677749291', '2018-02-04 20:58:14', 'Mexico', 'Priv. Rio Suchiate 1125', '0000-00-00 00:00:00', 'edc0fe321a62efbfc8eb900e3c590eb55a54bca0e381fd3e2ba93408a2ec0bf0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_panel_usuarios`
--

CREATE TABLE `sh_panel_usuarios` (
  `id_usuario` int(16) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_rol` int(64) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `clave` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sh_panel_usuarios`
--

INSERT INTO `sh_panel_usuarios` (`id_usuario`, `correo`, `usuario`, `nombre`, `apellido`, `fecha_registro`, `id_rol`, `ultimo_login`, `clave`) VALUES
(1, 'hola@mrarc.xyz', 'mrarc', 'Alfonso', 'Reyes', '2018-01-11 14:46:22', 1, '2018-02-08 05:28:55', 'edc0fe321a62efbfc8eb900e3c590eb55a54bca0e381fd3e2ba93408a2ec0bf0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_pisos`
--

CREATE TABLE `sh_pisos` (
  `piso` int(8) NOT NULL,
  `nombre` varchar(128) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sh_pisos`
--

INSERT INTO `sh_pisos` (`piso`, `nombre`) VALUES
(1, 'Piso 1'),
(2, 'Piso 2'),
(3, 'Piso 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_reservaciones`
--

CREATE TABLE `sh_reservaciones` (
  `id_reserva` varchar(8) NOT NULL,
  `huesped` int(16) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `id_habitacion` int(16) NOT NULL,
  `notas` text NOT NULL,
  `activa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sh_reservaciones`
--

INSERT INTO `sh_reservaciones` (`id_reserva`, `huesped`, `desde`, `hasta`, `id_habitacion`, `notas`, `activa`) VALUES
('3IlxbVMa', 5, '2018-02-08', '2018-02-10', 102, '', 0),
('gr0oqtaF', 8, '2018-02-04', '2018-02-09', 101, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_roles`
--

CREATE TABLE `sh_roles` (
  `id_rol` int(64) NOT NULL,
  `rol` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sh_roles`
--

INSERT INTO `sh_roles` (`id_rol`, `rol`) VALUES
(1, 'admin'),
(3, 'empleado'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_sensor_data`
--

CREATE TABLE `sh_sensor_data` (
  `id_habitacion` int(16) NOT NULL,
  `data` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sh_sensor_data`
--

INSERT INTO `sh_sensor_data` (`id_habitacion`, `data`) VALUES
(0, 'asddddddddddddddddd'),
(1, 'asdasdasdadadadas2312312312'),
(1, 'asdasdasdadadadas2312312312');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sh_configuracion`
--
ALTER TABLE `sh_configuracion`
  ADD KEY `nombre_hotel` (`nombre_hotel`(255));

--
-- Indices de la tabla `sh_habitaciones`
--
ALTER TABLE `sh_habitaciones`
  ADD PRIMARY KEY (`habitacion`),
  ADD UNIQUE KEY `id_habitacion` (`habitacion`);

--
-- Indices de la tabla `sh_habitaciones_tipos`
--
ALTER TABLE `sh_habitaciones_tipos`
  ADD PRIMARY KEY (`id_tipo_habitacion`),
  ADD UNIQUE KEY `id_tipo_habitacion` (`id_tipo_habitacion`),
  ADD UNIQUE KEY `tipo_habitacion` (`tipo_habitacion`);

--
-- Indices de la tabla `sh_huespedes`
--
ALTER TABLE `sh_huespedes`
  ADD PRIMARY KEY (`id_huesped`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`),
  ADD KEY `id_usuario` (`id_huesped`);

--
-- Indices de la tabla `sh_panel_usuarios`
--
ALTER TABLE `sh_panel_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `sh_pisos`
--
ALTER TABLE `sh_pisos`
  ADD PRIMARY KEY (`piso`),
  ADD UNIQUE KEY `piso` (`piso`),
  ADD UNIQUE KEY `piso_3` (`piso`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `piso_2` (`piso`);

--
-- Indices de la tabla `sh_reservaciones`
--
ALTER TABLE `sh_reservaciones`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `sh_roles`
--
ALTER TABLE `sh_roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sh_habitaciones_tipos`
--
ALTER TABLE `sh_habitaciones_tipos`
  MODIFY `id_tipo_habitacion` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sh_huespedes`
--
ALTER TABLE `sh_huespedes`
  MODIFY `id_huesped` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sh_panel_usuarios`
--
ALTER TABLE `sh_panel_usuarios`
  MODIFY `id_usuario` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sh_roles`
--
ALTER TABLE `sh_roles`
  MODIFY `id_rol` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
