-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 23:08:41
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
-- Estructura de tabla para la tabla `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

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
(101, 2, 1, 'Test-1', 'cWnotTdTGloChH87490UXorKXAT1I0wKqpRXTPCGuuQ=', 1),
(102, 2, 1, '', '', 1),
(106, 2, 1, '', '', 1),
(201, 2, 2, '', '', 1),
(203, 2, 2, '', '', 1),
(301, 1, 3, '', '', 1),
(405, 1, 4, '', '', 1),
(501, 2, 5, '', '', 1);

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
  `id_usuario` int(16) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` varchar(128) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pais_id` int(16) NOT NULL,
  `direccion` text NOT NULL,
  `id_rol` int(64) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `clave` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `sh_huespedes`
--

INSERT INTO `sh_huespedes` (`id_usuario`, `correo`, `nombre`, `apellido`, `telefono`, `fecha_registro`, `pais_id`, `direccion`, `id_rol`, `ultimo_login`, `clave`) VALUES
(1, 'arc980103@gmail.com', 'Alfonso', 'Reyes', '6677749291', '2018-01-02 15:31:13', 1, 'Priv. Rio Suchiate 1125', 1, '0000-00-00 00:00:00', 'edc0fe321a62efbfc8eb900e3c590eb55a54bca0e381fd3e2ba93408a2ec0bf0');

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
(1, 'hola@mrarc.xyz', 'mrarc', 'Alfonso', 'Reyes', '2018-01-11 14:46:22', 1, '2018-01-19 22:08:32', 'edc0fe321a62efbfc8eb900e3c590eb55a54bca0e381fd3e2ba93408a2ec0bf0');

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
(3, 'Piso 3'),
(4, 'Piso 4'),
(5, 'Piso 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_reservas`
--

CREATE TABLE `sh_reservas` (
  `id_reserva` varchar(8) NOT NULL,
  `huesped` int(16) NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime NOT NULL,
  `id_habitacion` int(16) NOT NULL,
  `notas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sh_reservas`
--

INSERT INTO `sh_reservas` (`id_reserva`, `huesped`, `desde`, `hasta`, `id_habitacion`, `notas`) VALUES
('lzl0Ahhx', 1, '2018-01-22 00:00:00', '2018-01-31 00:00:00', 101, 'No le gusta que lo molesten');

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
-- Indices de la tabla `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- Indices de la tabla `sh_reservas`
--
ALTER TABLE `sh_reservas`
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
-- AUTO_INCREMENT de la tabla `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT de la tabla `sh_habitaciones_tipos`
--
ALTER TABLE `sh_habitaciones_tipos`
  MODIFY `id_tipo_habitacion` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sh_huespedes`
--
ALTER TABLE `sh_huespedes`
  MODIFY `id_usuario` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
