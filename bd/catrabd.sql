-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2021 a las 18:47:15
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catrabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brownies`
--

CREATE TABLE `brownies` (
  `id_brownie` int(11) NOT NULL,
  `nombre_brownie` varchar(100) NOT NULL,
  `precio_brownie` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brownies`
--

INSERT INTO `brownies` (`id_brownie`, `nombre_brownie`, `precio_brownie`) VALUES
(1, 'Brownie de Chocolate', 25),
(2, 'Brownie de Matcha con Chispas de Chocolate Blanco', 35),
(3, 'Brownie de Chocolate con Frambuesa', 30),
(4, 'Brownie de Chocolate con Nuez', 30),
(5, 'Brownie de Chocolate con Crema de Cacahuate', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id_detalles` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `apellidos_cliente` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numExt` int(11) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `numInt` text NOT NULL,
  `telefono` bigint(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `indicaciones` varchar(300) NOT NULL,
  `metodoPago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id_detalles`, `id_usuario`, `nombre_cliente`, `apellidos_cliente`, `calle`, `numExt`, `colonia`, `numInt`, `telefono`, `correo`, `indicaciones`, `metodoPago`) VALUES
(52, 1, 'Lizbeth', 'Robles Hernández', 'Aeropuerto', 234, 'Tamulté', '12', 9933057080, 'lizirobles20@gmail.com', '', 'Pago por transferencia'),
(53, 15, 'María Guadalupe', 'Martinez', 'Arboledas', 136, 'Lagunas', '', 9933496780, 'lupita@martinez.com', 'Con dedicación', 'Pago con Tarjeta de crédito/débito'),
(54, 15, 'Josue', 'Ramirez', 'Ixtacomitan', 234, 'Atasta', '', 9932038794, 'josue@gmail.com', '', 'Pago por transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galletas`
--

CREATE TABLE `galletas` (
  `id_galleta` int(11) NOT NULL,
  `nombre_galleta` varchar(100) NOT NULL,
  `precio_galleta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galletas`
--

INSERT INTO `galletas` (`id_galleta`, `nombre_galleta`, `precio_galleta`) VALUES
(1, 'Galletas de Chocolate con Almendras', 30),
(2, 'Macarons', 150),
(3, 'Polvorones', 10),
(4, 'Galletas con Chispas de Chocolate', 20),
(5, 'Galletas de Avena', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles`
--

CREATE TABLE `pasteles` (
  `id_pastel` int(11) NOT NULL,
  `nombre_pastel` varchar(100) NOT NULL,
  `precio_pastel` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasteles`
--

INSERT INTO `pasteles` (`id_pastel`, `nombre_pastel`, `precio_pastel`) VALUES
(1, 'Pastel de Chocolate', 300),
(2, 'Pastel de Fresa', 300),
(3, 'Pastel de Zanahoria', 350),
(4, 'Pastel Red Velvet', 400),
(5, 'Pastel de Moras', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_detalles` int(11) NOT NULL,
  `producto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `id_detalles`, `producto`, `total`) VALUES
(42, 1, 52, ' Producto:\"Polvorones\", Precio:\"$10.00\", Cantidad:3, Producto:\"Galletas de Avena\", Precio:\"$15.00\", Cantidad:1', 65),
(43, 15, 53, ' Producto:\"Brownie de Chocolate\", Precio:\"$25.00\", Cantidad:1, Producto:\"Brownie de Chocolate con Crema de Cacahuate\", Precio:\"$30.00\", Cantidad:1, Producto:\"Pastel de Chocolate\", Precio:\"$300.00\", Cantidad:1', 375),
(44, 15, 54, ' Producto:\"Galletas de Chocolate con Almendras\", Precio:\"$30.00\", Cantidad:4, Producto:\"Polvorones\", Precio:\"$10.00\", Cantidad:1, Producto:\"Galletas de Avena\", Precio:\"$15.00\", Cantidad:1', 165);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `contra` varchar(20) NOT NULL,
  `nombre_user` varchar(20) NOT NULL,
  `tipo_user` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `contra`, `nombre_user`, `tipo_user`, `email`) VALUES
(1, '12345', 'lizirobles', 'cliente', 'lizirobles20@hotmail.com'),
(2, '12345', 'admi', 'administrador', 'admi@reposteriacatra.com'),
(15, '12345', 'griseschan', 'cliente', 'lupita_martinez123@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brownies`
--
ALTER TABLE `brownies`
  ADD PRIMARY KEY (`id_brownie`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id_detalles`);

--
-- Indices de la tabla `galletas`
--
ALTER TABLE `galletas`
  ADD PRIMARY KEY (`id_galleta`);

--
-- Indices de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  ADD PRIMARY KEY (`id_pastel`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brownies`
--
ALTER TABLE `brownies`
  MODIFY `id_brownie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `galletas`
--
ALTER TABLE `galletas`
  MODIFY `id_galleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  MODIFY `id_pastel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
