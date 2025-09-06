-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 06-09-2025 a las 04:47:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inicio_prueba`
--

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
-- Estructura de tabla para la tabla `tbl_bebidas`
--

CREATE TABLE `tbl_bebidas` (
  `id_bebidas` int(11) NOT NULL,
  `nombre_bebidas` varchar(50) NOT NULL,
  `descripcion_bebidas` varchar(150) NOT NULL,
  `precio_bebidas` int(11) NOT NULL,
  `foto_bebidas` varchar(100) NOT NULL,
  `vigencia_bebidas` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_bebidas`
--

INSERT INTO `tbl_bebidas` (`id_bebidas`, `nombre_bebidas`, `descripcion_bebidas`, `precio_bebidas`, `foto_bebidas`, `vigencia_bebidas`) VALUES
(0, 'Sin datos', 'Sin datos', 0, '', 1),
(1, 'coca', 'coca', 1200, 'coca', 0),
(2, 'Coca Cola', 'Original', 1300, '1736022948_cocacola-logo.jpeg', 1),
(3, 'Fanta', 'Bebida copia de coca cola', 1200, '1736190511_fanta-logo.jpg', 1),
(4, 'dfdf', 'dfdf', 2323, '1736186052_vecteezy_fanta-popular-drink-brand-logo-vinnytsia-ukraine-may_7978621-1.jpg', 0),
(5, 'dsdsd', '3232', 232323, '1736186189_vecteezy_fanta-popular-drink-brand-logo-vinnytsia-ukraine-may_7978621-1.jpg', 0),
(6, 'dsdsd', '3232', 232323, '1736186208_vecteezy_fanta-popular-drink-brand-logo-vinnytsia-ukraine-may_7978621-1.jpg', 0),
(7, 'dsdsd', '3232', 232323, '1736186234_vecteezy_fanta-popular-drink-brand-logo-vinnytsia-ukraine-may_7978621-1.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_orden`
--

CREATE TABLE `tbl_orden` (
  `id_orden` int(11) NOT NULL,
  `id_platos` int(11) NOT NULL,
  `id_bebidas` int(11) NOT NULL,
  `cantidad_orden` int(11) NOT NULL,
  `precio_orden` int(11) NOT NULL,
  `total_orden` int(11) NOT NULL,
  `mesa_orden` int(11) NOT NULL,
  `nombre_orden` varchar(150) NOT NULL,
  `usuario_orden` varchar(100) DEFAULT NULL,
  `vigencia_odern` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_orden`
--

INSERT INTO `tbl_orden` (`id_orden`, `id_platos`, `id_bebidas`, `cantidad_orden`, `precio_orden`, `total_orden`, `mesa_orden`, `nombre_orden`, `usuario_orden`, `vigencia_odern`) VALUES
(56, 3, 0, 1, 5000, 5000, 3, 'Ratatouille ', '17627019', 1),
(57, 0, 2, 1, 1300, 1300, 3, 'Coca Cola ', '17627019', 1),
(58, 2, 0, 1, 2, 2, 3, 'Mac and Cheese ', '17627019', 1),
(59, 3, 0, 1, 5000, 5000, 3, 'Ratatouille ', '17627019', 1),
(60, 2, 0, 1, 2, 2, 3, 'Mac and Cheese ', '17627019', 1),
(61, 3, 0, 1, 5000, 5000, 3, 'Ratatouille ', '17627019', 1),
(62, 2, 0, 1, 2, 2, 3, 'Mac and Cheese ', '17627019', 1),
(63, 27, 0, 1, 122, 122, 3, 'aaaa ', '17627019', 1),
(64, 2, 0, 1, 2, 2, 3, 'Mac and Cheese ', '17627019', 1),
(65, 25, 0, 1, 0, 0, 11, 'aaaa ', '17627019', 1),
(66, 2, 0, 8, 2, 16, 11, 'Mac and Cheese ', '17627019', 1),
(67, 1, 0, 5, 1200, 6000, 4, 'Buffalo Wings ', '17627019', 1),
(68, 3, 0, 8, 5000, 40000, 4, 'Ratatouille ', '17627019', 1),
(69, 3, 0, 9, 5000, 45000, 18, 'Ratatouille ', '17627019', 1),
(70, 27, 0, 8, 122, 976, 18, 'aaaa ', '17627019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenum`
--

CREATE TABLE `tbl_ordenum` (
  `id_ordenum` int(11) NOT NULL,
  `estado_ordenum` int(11) NOT NULL,
  `rut_ordenum` varchar(50) NOT NULL,
  `vigencia_ordenum` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_ordenum`
--

INSERT INTO `tbl_ordenum` (`id_ordenum`, `estado_ordenum`, `rut_ordenum`, `vigencia_ordenum`) VALUES
(1, 1, '17627019', 1),
(2, 1, '17627019', 1),
(3, 1, '17627019', 1),
(4, 1, '17627019', 1),
(5, 1, '17627019', 1),
(6, 1, '17627019', 1),
(7, 1, '17627019', 1),
(8, 1, '17627019', 1),
(9, 1, '17627019', 1),
(10, 1, '17627019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_platos`
--

CREATE TABLE `tbl_platos` (
  `id_platos` int(11) NOT NULL,
  `nombre_platos` varchar(50) NOT NULL,
  `descripcion_platos` varchar(150) NOT NULL,
  `precio_platos` int(11) DEFAULT NULL,
  `foto_platos` varchar(100) NOT NULL,
  `vigencia_platos` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_platos`
--

INSERT INTO `tbl_platos` (`id_platos`, `nombre_platos`, `descripcion_platos`, `precio_platos`, `foto_platos`, `vigencia_platos`) VALUES
(0, 'Sin datos', 'Sin datos', 0, '', 1),
(1, 'Buffalo Wings', 'Alitas de pollo fritas y bañadas en salsa picante de búfalo, generalmente servidas con apio y aderezo de queso azul.', 1200, '1732279393_plato1.png', 1),
(2, 'Mac and Cheese', 'Guiso de carne de res cocida a fuego lento en vino tinto con zanahorias, cebollas y champiñones.', 2, '1735846897_plato6.png', 1),
(3, 'Ratatouille', 'Estofado de verduras típico de Provenza, con berenjenas, calabacines, pimientos y tomates.', 5000, '1732279411_plato3.png', 1),
(4, 'Tarta', 'Tarta salada rellena de huevo, crema y panceta.', 50, '1732279417_plato4.png', 1),
(5, 'tarta', 'Sopa de cebolla gratinada con pan tostado y queso fundido.', 700, '1732279424_plato5.png', 1),
(6, 'Piazza2024', 'Pastel invertido de manzana caramelizada.', 900, '1732279433_plato6.png', 1),
(22, 'asas', 'sasas', 112233, '', 0),
(23, 'aaaa', 'qwer', 1234, '', 0),
(24, '', '', 0, '', 0),
(25, 'aaaa', 'sss', 0, '1736007876_plato7.png', 1),
(26, '', '', 0, '', 0),
(27, 'aaaa', 'descrip', 122, '1736007920_plato3.png', 1),
(28, '', '', 0, '', 0),
(29, 'aer', '234', 222, '1736008008_plato9.png', 1),
(30, '', '', 0, '', 0),
(31, '', '', 0, '', 0),
(32, 'aaaa', 'sss', 1, '1736008614_plato8.png', 1),
(33, 'Coca cola', 'Coca cola importada', 1300, '1736017873_cocacola-logo.jpeg', 0);

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
(1, 16467621, 8, 'Sebastian', 'Sotelo', 'ortiz', 's.sotelo.ortiz@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 2147483647, 'mi casita #344', 1, 1, '2024-12-09 15:49:22', '2024-11-24 04:09:10'),
(2, 17627019, 5, 'Hector', 'Lillo', 'Vega', 'leinegar@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 96591625, '', 2, 1, '2025-09-05 22:25:02', '2022-05-05 19:53:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bebidas`
--
ALTER TABLE `tbl_bebidas`
  ADD PRIMARY KEY (`id_bebidas`);

--
-- Indices de la tabla `tbl_orden`
--
ALTER TABLE `tbl_orden`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `tbl_ordenum`
--
ALTER TABLE `tbl_ordenum`
  ADD PRIMARY KEY (`id_ordenum`);

--
-- Indices de la tabla `tbl_platos`
--
ALTER TABLE `tbl_platos`
  ADD PRIMARY KEY (`id_platos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bebidas`
--
ALTER TABLE `tbl_bebidas`
  MODIFY `id_bebidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_orden`
--
ALTER TABLE `tbl_orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tbl_ordenum`
--
ALTER TABLE `tbl_ordenum`
  MODIFY `id_ordenum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_platos`
--
ALTER TABLE `tbl_platos`
  MODIFY `id_platos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tupla', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
