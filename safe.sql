-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 03:05:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `safe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abastecimiento`
--

CREATE TABLE `abastecimiento` (
  `id` int(11) NOT NULL COMMENT 'Identificador único del reporte',
  `nombre` varchar(255) NOT NULL COMMENT 'nombre del lugar',
  `descripcion` text DEFAULT NULL COMMENT 'Descripción detallada del reporte o lugar',
  `contacto` varchar(255) DEFAULT NULL COMMENT 'Información de contacto del lugar (nombre, teléfono, etc.)',
  `latitud` decimal(10,8) NOT NULL COMMENT 'Latitud de la ubicación',
  `longitud` decimal(11,8) NOT NULL COMMENT 'Longitud de la ubicación',
  `fecha_cre` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `activo` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Activo, 0 = Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `abastecimiento`
--

INSERT INTO `abastecimiento` (`id`, `nombre`, `descripcion`, `contacto`, `latitud`, `longitud`, `fecha_cre`, `activo`) VALUES
(1, 'Avenida Francisco de Aguirre', 'Centro de acopio, ropa, alímetros, etc', 'contacto@gmail.com', -29.90602735, -71.25753858, '2024-11-30 22:03:50', 1),
(3, 'Plaza de Armas Coquimbo', 'Punto de encuentro para recolección de alimentos no perecibles y frazadas.', 'plazacoquimbo@gmail.com', -29.95329000, -71.33894000, '2024-12-01 01:30:00', 1),
(4, 'Mall Plaza La Serena', 'Centro temporal de donaciones para familias afectadas.', 'mallserena@gmail.com', -29.91253707, -71.25833317, '2024-12-01 01:31:00', 1),
(5, 'Colegio Gabriela Mistral', 'Recepción de útiles escolares y kits de higiene.', 'g_mistral@gmail.com', -29.90654000, -71.24630000, '2024-12-01 01:32:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causacorte`
--

CREATE TABLE `causacorte` (
  `id_causacorte` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `causacorte`
--

INSERT INTO `causacorte` (`id_causacorte`, `descripcion`, `activo`) VALUES
(1, 'Desastre Natural', 1),
(2, 'Accidente Automovilístico', 1),
(3, 'Robo de Cable', 1),
(4, 'Cañería Rota', 1),
(5, 'Otros', 1),
(6, 'exploto un generador', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoreporte`
--

CREATE TABLE `estadoreporte` (
  `id_estadoreporte` int(11) NOT NULL COMMENT 'Identificador de la tula',
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion',
  `activo` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 vigente, 0 eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `estadoreporte`
--

INSERT INTO `estadoreporte` (`id_estadoreporte`, `descripcion`, `activo`) VALUES
(1, 'Ingresado', 1),
(2, 'En Reparación', 1),
(3, 'Finalizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL COMMENT 'identidicador del perfil',
  `des_perfil` varchar(40) NOT NULL COMMENT 'descripcion del perfil ',
  `activo` tinyint(11) NOT NULL DEFAULT 1 COMMENT 'Identifica los registros eliminados logicamente.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla que define los perfiles de usuario disponibles en el sistema, como roles o permisos.';

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `des_perfil`, `activo`) VALUES
(1, 'administrador', 1),
(2, 'cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'usuario que reporta',
  `id_tipocorte` int(11) NOT NULL,
  `id_causacorte` int(11) NOT NULL,
  `id_estadoreporte` int(2) NOT NULL DEFAULT 1 COMMENT 'estado del reporte\r\n',
  `titulo` varchar(255) NOT NULL COMMENT 'Titulo ingresado por el usuario',
  `latitud` decimal(10,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_cre_cortes` timestamp NOT NULL DEFAULT current_timestamp(),
  `reposicion` time DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = activo, 0 eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `id_usuario`, `id_tipocorte`, `id_causacorte`, `id_estadoreporte`, `titulo`, `latitud`, `longitud`, `descripcion`, `fecha_cre_cortes`, `reposicion`, `activo`) VALUES
(1, 16467621, 1, 1, 1, 'Plaza de Armas La Serena', -29.90453000, -71.24894000, 'Lugar histórico central en La Serena.', '2024-11-17 05:12:47', NULL, 1),
(2, 18736526, 2, 2, 2, 'Faro Monumental', -29.91796000, -71.27297000, 'El icónico faro de La Serena.', '2024-11-17 05:12:47', NULL, 1),
(3, 16467621, 1, 3, 3, 'Puerto de Coquimbo', -29.95330000, -71.34349000, 'Zona turística y gastronómica de Coquimbo.', '2024-11-17 05:12:47', NULL, 1),
(4, 18736526, 2, 4, 2, 'mi casa', 0.00000000, 0.00000000, 'corte de lux', '2024-11-17 05:12:47', NULL, 1),
(5, 16467621, 1, 2, 1, 'abogadamolina', -29.97616640, -71.24746240, 'Corte de suministro', '2024-11-17 05:12:47', NULL, 1),
(6, 18736526, 2, 1, 3, 'wanldo', -29.97846018, -71.25294685, 'magallanes', '2024-11-17 05:12:47', NULL, 1),
(7, 16467621, 2, 3, 2, 'Casa Pato', -29.95993972, -71.34604739, 'Prueba de indecencia. ', '2024-11-17 05:12:47', '18:50:00', 1),
(9, 16467621, 1, 4, 2, 'dqwd', -29.96633600, -71.33593600, 'eeee', '2024-11-24 04:42:45', NULL, 1),
(10, 16467621, 1, 2, 1, 'neuvo reporte', -29.93805220, -71.24471289, 'nuevo reporte ', '2024-11-28 22:36:49', NULL, 1),
(11, 17478796, 1, 5, 1, 'Corte de Agua', -29.96961280, -71.25401600, 'corte de agua en el sector ', '2024-12-02 23:22:10', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocorte`
--

CREATE TABLE `tipocorte` (
  `id_tipocorte` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `activo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipocorte`
--

INSERT INTO `tipocorte` (`id_tipocorte`, `descripcion`, `activo`) VALUES
(1, 'Corte de Agua', 1),
(2, 'Corte de Luz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'identificador de la tupla',
  `id_usuario` int(11) NOT NULL COMMENT 'rut',
  `digito_rut` int(11) NOT NULL COMMENT 'validador rut',
  `nombre` varchar(60) NOT NULL COMMENT 'nombre del cliente',
  `paterno` varchar(60) NOT NULL COMMENT 'apellido paterno del cliente',
  `materno` varchar(60) NOT NULL COMMENT 'apellido materno del cliente	',
  `email` text NOT NULL COMMENT 'Correo Electronico',
  `password` text NOT NULL COMMENT 'contrasena hash',
  `telefono` int(11) NOT NULL COMMENT 'telefono del usuario',
  `direccion` varchar(150) NOT NULL COMMENT 'direccion',
  `id_perfil` int(11) NOT NULL DEFAULT 2 COMMENT '1=admin 2=cliente',
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT '0=activo\r\n1=inactivo\r\n',
  `ultimo_login` datetime NOT NULL COMMENT 'ultimo acceso',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha creacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `digito_rut`, `nombre`, `paterno`, `materno`, `email`, `password`, `telefono`, `direccion`, `id_perfil`, `activo`, `ultimo_login`, `fecha`) VALUES
(1, 16467621, 8, 'Sebastian', 'Sotelo', 'ortiz', 's.sotelo.ortiz@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 2147483647, 'mi casita #344', 1, 1, '2024-12-02 20:44:26', '2024-11-24 04:09:10'),
(2, 15658465, 8, 'Patricio Antonio', 'Campos', 'Mendez', 'pato.camposm@gmail.com', '$2a$07$asxx54ahjppf45sd87a5autK1aqIRW8upSLXe25wMe1f9rHp/35S6', 96591625, 'Villa dulce 324', 2, 1, '0000-00-00 00:00:00', '2022-05-05 19:53:43'),
(3, 0, 0, 'Miel Andrea', 'Choque Chambe', '', 'mieandrea19@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auCBSlMPlTCeVAHUSHTNxOgnAdDGk5fH2', 2147483647, '', 2, 1, '0000-00-00 00:00:00', '2022-05-05 19:53:35'),
(4, 17478796, 4, 'camila ', 'molina', 'tapia', 'camila@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 1231244, 'efwefwef', 2, 1, '2024-12-02 20:21:34', '2024-12-02 22:52:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abastecimiento`
--
ALTER TABLE `abastecimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `causacorte`
--
ALTER TABLE `causacorte`
  ADD PRIMARY KEY (`id_causacorte`);

--
-- Indices de la tabla `estadoreporte`
--
ALTER TABLE `estadoreporte`
  ADD PRIMARY KEY (`id_estadoreporte`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipocorte`
--
ALTER TABLE `tipocorte`
  ADD PRIMARY KEY (`id_tipocorte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abastecimiento`
--
ALTER TABLE `abastecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del reporte', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `causacorte`
--
ALTER TABLE `causacorte`
  MODIFY `id_causacorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estadoreporte`
--
ALTER TABLE `estadoreporte`
  MODIFY `id_estadoreporte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tula', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipocorte`
--
ALTER TABLE `tipocorte`
  MODIFY `id_tipocorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tupla', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
