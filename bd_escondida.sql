-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-07-2023 a las 03:27:14
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_escondida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdministrador`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `contraseña`, `rol`) VALUES
(1, 'Celes', 'Moreno', 'Rodriguez', 'celestino_2001.mor@hotmail.com', '123', 'admin'),
(3, 'Aylin ', 'Rosales', 'Aguilar', 'aylin@gmail.com', '12345', 'admin'),
(16, 'ingrid', 'Gonzales', 'perez', 'ingrid@gmail.com', '123', 'cajero'),
(17, 'pedro', 'Sanches', 'Olivarez', 'sanches@gmail.com', '123', 'cajero'),
(18, 'Carlos ', 'Cervantes', 'Villanueva', 'carlos@gmail.com', '123', 'cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numeroCasa` int(11) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `ciudad`, `calle`, `numeroCasa`, `contraseña`, `email`) VALUES
(7, 'aylinaa', 'Moreno', 'Gonzales', 'Tacambaro', 'Antonio Alzate', 3, '$2y$04$Vz/GhJ.nImSV/qiA53lqSe2Bx/QzHOmlIq6QhAOunsMoGWWZ2pOm6', 'aylin@gmail.com'),
(8, 'daniel', 'Moreno', 'Rodriguez', 'Pedernales', 'Antonio Alzate', 1, '$2y$04$Qv69vAkU1AzqwpK594WmQuBRieBbTdrIcAX1cJoYXpQZ9TZdZrAkO', 'daniel@gmail.com'),
(9, 'ingrid', 'Gonzales', 'Perez', 'Tacambaro', 'Antonio Alzate', 1, '$2y$04$/hh.JRyNyfdjKJ0HAtQvuOW/ip91oMc57tRwJtYPOClsWzlSu2U.i', 'ingrid@gmail.com'),
(10, 'Axel', 'Gutierrez', 'Perez', 'Tecario', 'Benito juarez', 10, '$2y$04$y5S3IABchJBWLQLvBPOAvulIt9xWIozxixTMjkkA.7ghbM53f0xM.', 'axel@gmail.com'),
(11, 'Jair', 'Zirlanda', 'Villalon', 'Santa clara', 'la antorcha', 12, '$2y$04$GVO2DHbWYJlHsvJdp4X7IeISAbyzPxB/PL4rBOBdOxqtRmKBidAI2', 'jair@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(50) NOT NULL,
  `idAdministrador` int(11) NOT NULL,
  `nombreMenu` varchar(50) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `idAdministrador`, `nombreMenu`, `categoria`, `precio`, `descripcion`, `imagen`) VALUES
(53, 1, 'Tacos al pastor', 'Cena', 13, 'Ricos tacos al pastor de pollo', 'tacos.jpg'),
(54, 1, 'makis', 'Comida', 100, 'Makis de surimi', 'makis.jpg'),
(55, 1, 'Margarita', 'Bebidas', 20, 'margarita con  tequila', 'MARGARITA.jpg'),
(59, 1, 'boneless', 'Snacks', 50, 'Deliciosos bonelles de pollo', 'boneless.jpg'),
(60, 1, 'pizza', 'Comida', 100, 'Pizza italiana', 'pizza.jpeg'),
(61, 1, 'waflles', 'Desayuno', 150, 'ricos waffles', 'waffles.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_ordenes`
--

CREATE TABLE `menu_ordenes` (
  `id_menu_orden` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `hora` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu_ordenes`
--

INSERT INTO `menu_ordenes` (`id_menu_orden`, `idMenu`, `id_orden`, `cantidad`, `total`, `hora`) VALUES
(250, 54, 143, 1, 10, '10:23:56'),
(251, 53, 143, 1, 10, '10:23:57'),
(253, 54, 150, 2, NULL, NULL),
(256, 53, 151, 1, NULL, NULL),
(258, 55, 151, 1, NULL, NULL),
(260, 54, 152, 1, NULL, NULL),
(262, 54, 153, 1, NULL, NULL),
(263, 59, 153, 1, NULL, NULL),
(265, 53, 154, 1, NULL, NULL),
(266, 54, 154, 1, NULL, NULL),
(267, 54, 155, 1, NULL, NULL),
(268, 53, 155, 1, NULL, NULL),
(272, 53, 156, 1, NULL, NULL),
(274, 59, 156, 1, NULL, NULL),
(279, 55, 160, 1, NULL, NULL),
(281, 55, 149, 1, 10, '02:42:47'),
(282, 53, 149, 1, 10, '02:42:50'),
(283, 54, 149, 1, 10, '02:42:53'),
(285, 54, 144, 1, 10, '02:45:45'),
(287, 59, 159, 1, NULL, NULL),
(289, 54, 164, 1, NULL, NULL),
(291, 59, 145, 1, 10, '12:58:04'),
(292, 53, 145, 1, 10, '12:58:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `id_administrador` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `id_administrador`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `idAdministrador` int(11) DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `idCliente` int(50) DEFAULT NULL,
  `totalOrden` int(11) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `horaTerminacion` time DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `idAdministrador`, `id_mesa`, `idCliente`, `totalOrden`, `cantidad`, `estado`, `horaTerminacion`, `fecha`) VALUES
(143, 1, 1, NULL, 113, NULL, NULL, '10:24:05', '2023-06-04'),
(144, 1, 2, NULL, 150, NULL, NULL, '02:46:18', '2023-06-05'),
(145, 1, 3, NULL, 113, NULL, NULL, '12:58:59', '2023-06-05'),
(146, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 1, 1, NULL, 183, NULL, NULL, NULL, NULL),
(150, NULL, NULL, 7, 500, 4, 'confirmado', '19:51:19', '2023-06-04'),
(151, NULL, NULL, 7, 233, 4, 'confirmado', '20:36:31', '2023-06-04'),
(152, NULL, NULL, 7, 300, 2, 'confirmado', '08:54:50', '2023-06-05'),
(153, NULL, NULL, 7, 350, 3, 'confirmado', '08:56:44', '2023-06-05'),
(154, NULL, NULL, 7, 313, 3, 'confirmado', '05:07:00', '2023-06-05'),
(155, NULL, NULL, 7, 363, 4, 'confirmado', '07:10:00', '2023-06-05'),
(156, NULL, NULL, 7, 263, 4, 'rechazado', NULL, '2023-06-05'),
(157, NULL, NULL, 7, 200, 2, 'rechazado', NULL, '2023-06-05'),
(158, NULL, NULL, 7, 150, 1, 'rechazado', NULL, '2023-06-05'),
(159, NULL, NULL, 7, 50, 1, 'confirmado', '16:55:00', '2023-06-05'),
(160, NULL, NULL, 10, 70, 2, 'confirmado', '18:50:00', '2023-06-05'),
(161, NULL, NULL, 10, NULL, NULL, 'sin confirmar', NULL, NULL),
(162, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(163, NULL, NULL, 7, NULL, NULL, 'sin confirmar', NULL, NULL),
(164, NULL, NULL, 11, 150, 2, 'confirmado', '21:36:00', '2023-06-05'),
(165, NULL, NULL, 11, NULL, NULL, 'sin confirmar', NULL, NULL),
(166, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `menu_ibfk_1` (`idAdministrador`);

--
-- Indices de la tabla `menu_ordenes`
--
ALTER TABLE `menu_ordenes`
  ADD PRIMARY KEY (`id_menu_orden`),
  ADD KEY `idMenu` (`idMenu`),
  ADD KEY `menu-ordenes_ibfk_2` (`id_orden`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `ordenes_ibfk_1` (`id_mesa`),
  ADD KEY `idAdministrador` (`idAdministrador`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `menu_ordenes`
--
ALTER TABLE `menu_ordenes`
  MODIFY `id_menu_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idAdministrador`) REFERENCES `administradores` (`idAdministrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_ordenes`
--
ALTER TABLE `menu_ordenes`
  ADD CONSTRAINT `menu_ordenes_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ordenes_ibfk_2` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`idAdministrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`idAdministrador`) REFERENCES `administradores` (`idAdministrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenes_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
