-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 08:07:48
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
(6, 'Herramientras', '2024-04-09 20:46:10'),
(7, 'Electrodomesticos', '2024-05-17 17:42:53');

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
(2, 'Genius', '2024-05-21 03:32:09'),
(3, 'Epson', '2023-12-04 21:48:51'),
(4, 'HP', '2023-12-04 21:48:51'),
(5, 'Philips', '2023-12-04 21:52:39'),
(6, 'Noga', '2024-05-17 17:29:17'),
(10, 'Sony', '2024-05-17 17:31:48'),
(11, 'Atma', '2024-05-17 17:44:11'),
(12, 'Samsung', '2024-05-21 03:32:20');

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
  `cantidad_producto` int(11) NOT NULL,
  `estado_producto` int(11) NOT NULL,
  `marca_producto` int(11) NOT NULL,
  `fecha_creacion_producto` datetime NOT NULL,
  `fecha_edicion_producto` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `categoria_producto`, `imagen_producto`, `precio_producto`, `cantidad_producto`, `estado_producto`, `marca_producto`, `fecha_creacion_producto`, `fecha_edicion_producto`) VALUES
(51, 'Microondas Digital Vintage Atma 20lts Display Blanco', 'Descubre la elegancia atemporal con el microondas Atma Vintage, fusionando estilo y funcionalidad en tu cocina. Con una potencia de 700W y un volumen generoso de 20 litros, este electrodoméstico no solo destaca por su rendimiento, sino también por su diseño vintage que añade un toque único a tu espacio.\r\n\r\nLa función de descongelado automático simplifica la preparación de tus alimentos congelados, mientras que el panel digital ofrece un control preciso y moderno. Con un menú que incluye 8 programas predefinidos, desde recalentar hasta cocinar, este microondas se adapta a tus necesidades culinarias de manera conveniente.\r\n\r\nEl microondas Atma Vintage no solo es una herramienta práctica en la cocina, sino también una declaración de estilo que complementa cualquier decoración. Disfruta de la fusión perfecta entre lo clásico y lo moderno en cada comida con este encantador electrodoméstico.', 3, 'vistas/imagenes/productos/microondas-digital-vintage-atma-20lts-display-blanco.jpg', 23611, 11, 1, 1, '0000-00-00 00:00:00', '2024-05-21 01:08:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_eliminados`
--

CREATE TABLE `productos_eliminados` (
  `id_producto_eliminado` int(11) NOT NULL,
  `nombre_producto_eliminado` varchar(100) NOT NULL,
  `descripcion_producto_eliminado` text NOT NULL,
  `categoria_producto_eliminado` int(11) NOT NULL,
  `imagen_producto_eliminado` varchar(100) NOT NULL,
  `precio_producto_eliminado` float NOT NULL,
  `cantidad_producto_eliminado` int(11) NOT NULL,
  `estado_producto_eliminado` int(11) NOT NULL,
  `marca_producto_eliminado` int(11) NOT NULL,
  `fecha_eliminacion_producto` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Empleado'),
(4, 'Cliente');

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
(20, 'mikel', 'mikel@burns.com', '$2a$07$hdgfamkdhdshsjhduaostues3JeulsSfJKtHIqh6GlVn08sArK.f6', 1, 2, '2024-05-17 02:14:59'),
(77, 'mikel44', 'asds@gmail.com', '$2a$07$hdgfamkdhdshsjhduaostues3JeulsSfJKtHIqh6GlVn08sArK.f6', 1, 2, '2024-05-16 18:39:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_eliminados`
--

CREATE TABLE `usuarios_eliminados` (
  `id_usuario_eliminado` int(11) NOT NULL,
  `nombre_usuario_eliminado` varchar(100) NOT NULL,
  `email_usuario_eliminado` varchar(100) NOT NULL,
  `password_usuario_eliminado` varchar(100) NOT NULL,
  `id_rol_usuario_eliminado` int(11) NOT NULL,
  `estado_usuario_eliminado` tinyint(4) NOT NULL,
  `fecha_eliminacion_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `productos_eliminados`
--
ALTER TABLE `productos_eliminados`
  ADD PRIMARY KEY (`id_producto_eliminado`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
