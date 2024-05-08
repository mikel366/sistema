-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2024 a las 09:30:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feliciano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `fecha_creacion`) VALUES
(1, 'Cocinas', '2023-12-04 21:44:11'),
(2, 'Accesorios', '2023-12-04 21:44:11'),
(3, 'Tablets', '2023-12-04 21:44:44'),
(4, 'Celulares', '2023-12-04 21:44:44'),
(5, 'Línea blanca', '2023-12-04 21:48:10'),
(6, 'Herramientras', '2024-04-09 20:46:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`, `fecha_creacion`) VALUES
(1, 'Inactivo', '2023-11-17 21:47:00'),
(2, 'Activo', '2023-11-17 21:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `fecha_creacion`) VALUES
(1, 'Lenovo', '2023-11-17 21:42:50'),
(2, 'Genius', '2023-11-17 21:43:15'),
(3, 'Epson', '2023-12-04 21:48:51'),
(4, 'HP', '2023-12-04 21:48:51'),
(5, 'Philips', '2023-12-04 21:52:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `categoria_producto` int(11) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `precio_producto` float NOT NULL,
  `estado_producto` int(11) NOT NULL,
  `marca_producto` int(11) NOT NULL,
  `fecha_creacion_producto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `categoria_producto`, `imagen_producto`, `precio_producto`, `estado_producto`, `marca_producto`, `fecha_creacion_producto`) VALUES
(6, 'Cortadora de Cabello', '', 2, ' ../assets/imagenes/productos/1700312124.jpg', 25000, 1, 4, '2023-11-18 09:55:24'),
(7, 'Depiladora', '', 2, ' ../assets/imagenes/productos/1700313110.jpg', 62350, 1, 2, '2023-11-18 10:11:50'),
(8, 'Cocina Aurora Multigas', '', 1, ' ../assets/imagenes/productos/1700313207.jpg', 350000, 1, 1, '2023-11-18 10:13:27'),
(9, 'Amoladora', '', 6, ' ../assets/imagenes/productos/1700313297.jpg', 65000, 1, 3, '2023-11-18 10:14:57'),
(10, 'Secarropas', 'Acá va la descripción del producto', 5, ' ../assets/imagenes/productos/1701728134.jpg', 150000, 1, 5, '2023-12-04 19:15:34'),
(11, 'Fabrica de pastas', 'Desc', 5, ' ../assets/imagenes/productos/1701729408.jpg', 25000, 1, 1, '2023-12-04 19:36:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `id_rol_usuario` int(11) NOT NULL,
  `estado_usuario` tinyint(4) NOT NULL,
  `fecha_creacion_usuario` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `password_usuario`, `id_rol_usuario`, `estado_usuario`, `fecha_creacion_usuario`) VALUES
(2, 'Pablo Pérez', 'pablo.eluniversoweb@gmail.com', '$2a$07$hdgfamkdhdshsjhduaostuRJbInCi2roRtiizyDZAO.2DpAreNOyW', 2, 1, '2024-04-16 21:44:29'),
(20, 'mikel', 'mikel@burns.com', '$2a$07$hdgfamkdhdshsjhduaostues3JeulsSfJKtHIqh6GlVn08sArK.f6', 1, 1, '2024-04-29 03:14:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
