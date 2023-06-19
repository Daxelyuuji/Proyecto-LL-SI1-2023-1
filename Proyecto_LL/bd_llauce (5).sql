-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2023 a las 09:21:46
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
-- Base de datos: `bd_llauce`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_canasta_ac` (IN `ac_id` INT(11), IN `ac_producto` VARCHAR(40), IN `ac_cantidad` INT(11), IN `ac_precio` FLOAT, IN `ac_metodopago` VARCHAR(40))   BEGIN
UPDATE canasta
SET producto = ac_producto,precio = ac_precio , cantidad = ac_cantidad, metodopago = ac_metodopago
WHERE id = ac_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_canasta_elim` (IN `el_id` INT)   BEGIN
DELETE FROM canasta WHERE id=el_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_canasta_in` (IN `in_producto` VARCHAR(40), IN `in_cantidad` INT(11), IN `in_precio` FLOAT, IN `in_metodopago` VARCHAR(40), IN `in_id` INT(11))   BEGIN
INSERT INTO canasta(id, producto,precio, cantidad, metodopago) VALUES (in_id, in_producto, in_precio, in_cantidad, in_metodopago);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_productos_ac` (IN `ac_id` INT(11), IN `ac_categoria` VARCHAR(40), IN `ac_idproveedor` INT(11), IN `ac_img` VARCHAR(255), IN `ac_precio` DECIMAL(10,2), IN `ac_proveedor` VARCHAR(50), IN `ac_producto` VARCHAR(50))   BEGIN
UPDATE productoss
SET producto=ac_producto, img=ac_img, precio=ac_precio,  categoria=ac_categoria, idproveedor=ac_idproveedor, proveedor=ac_proveedor WHERE id=ac_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_productos_elim` (IN `el_id` INT(11))   BEGIN
DELETE FROM productoss WHERE id=el_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_productos_in` (IN `in_id` INT(11), IN `in_producto` VARCHAR(60), IN `in_img` VARCHAR(255), IN `in_precio` DECIMAL(10,2), IN `in_stock` INT(11), IN `in_categoria` VARCHAR(40), IN `in_idproveedor` INT(11), IN `in_proveedor` VARCHAR(50))   BEGIN
INSERT INTO productoss (id, producto,img,precio, stock,categoria,idproveedor, proveedor) VALUES (in_id, in_producto, in_img,in_precio,  in_stock, in_categoria, in_idproveedor, in_proveedor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_trabajadores_act` (IN `ac_id` INT, IN `ac_nombre` VARCHAR(30), IN `ac_apellidos` VARCHAR(40), IN `ac_cargo` VARCHAR(30), IN `ac_celular` INT, IN `ac_contrasena` VARCHAR(10), IN `ac_correo` VARCHAR(50), IN `ac_edad` INT, IN `ac_codigo` VARCHAR(20))   BEGIN
UPDATE empleados
SET nombre = ac_nombre, apellidos = ac_apellidos, cargo = ac_cargo, celular = ac_celular, contrasena = ac_contraseña, correo = ac_correo, edad = ac_edad, codigo = ac_codigo
WHERE id = ac_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_trabajadores_elim` (IN `el_id` INT)   BEGIN
DELETE FROM empleados WHERE id=el_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DB_trabajadores_in` (IN `in_id` INT, IN `in_nombre` VARCHAR(30), IN `in_apellidos` VARCHAR(40), IN `in_cargo` VARCHAR(30), IN `in_celular` INT, IN `in_contrasena` VARCHAR(10), IN `in_correo` VARCHAR(50), IN `in_edad` INT, IN `in_codigo` VARCHAR(20))   BEGIN
INSERT INTO empleados(id,nombre,apellidos,cargo,celular,codigo,edad,correo,contrasena) values (in_id, in_nombre, in_apellidos, in_cargo, in_celular, in_codigo, in_edad, in_correo, in_contrasena);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `num_boleta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canasta`
--

CREATE TABLE `canasta` (
  `id` int(11) NOT NULL,
  `producto` varchar(40) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `metodopago` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `canasta`
--

INSERT INTO `canasta` (`id`, `producto`, `precio`, `cantidad`, `metodopago`) VALUES
(1, 'Yogurt 500g', 3.5, 2, 'Efectivo'),
(2, 'Detergente 500g', 4.5, 2, 'Efectivo'),
(3, 'Yogurt 1l Gloria', 5.4, 3, 'Efectivo'),
(4, 'Gaseosa Coca Cola 500ml', 5.4, 4, 'Efectivo'),
(5, 'Fideo Don Victorio 950gr', 5.4, 3, 'Efectivo'),
(6, 'Arroz Costeño 5kg', 4, 5, 'Efectivo'),
(9, 'Yogurt 500g Gloria', 4, 5, 'Efectivo'),
(10, 'Arroz Costeño 5kg', 10, 5, 'Efectivo'),
(12, 'Arroz Costeño 5kg', 5, 5, 'Efectivo'),
(13, 'Yogurt 1l Gloria', 23, 3, 'Efectivo'),
(14, 'Arroz Costeño 5kg', 4, 5, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `producto_nombre` varchar(100) DEFAULT NULL,
  `producto_precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto_id`, `producto_nombre`, `producto_precio`, `cantidad`, `fecha_registro`) VALUES
(2, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 07:55:17'),
(4, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 08:02:20'),
(5, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 07:55:58'),
(6, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 08:04:49'),
(9, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 08:06:26'),
(11, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 09:08:57'),
(15, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 09:10:22'),
(28, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:14:00'),
(29, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:14:00'),
(31, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:15:04'),
(32, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:15:04'),
(34, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:16:02'),
(35, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:16:02'),
(37, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:39:03'),
(38, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:39:03'),
(40, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:39:14'),
(41, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:39:14'),
(43, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:41:56'),
(44, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:41:56'),
(46, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:45:06'),
(47, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:45:06'),
(49, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:46:38'),
(50, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:46:38'),
(52, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 16:46:54'),
(53, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 16:46:54'),
(55, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:12:37'),
(56, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:12:37'),
(58, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:19:52'),
(59, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:19:52'),
(61, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:26:23'),
(62, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:26:23'),
(64, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:29:29'),
(65, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:29:29'),
(67, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:29:31'),
(68, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:29:31'),
(70, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:29:36'),
(71, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:29:36'),
(73, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:29:37'),
(74, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:29:37'),
(76, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 17:29:41'),
(77, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 17:29:41'),
(79, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 22:46:15'),
(80, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 22:46:15'),
(82, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 23:02:10'),
(83, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 23:02:10'),
(85, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-14 23:05:52'),
(86, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-14 23:05:52'),
(89, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-17 01:44:22'),
(90, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-17 01:44:22'),
(91, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-17 01:44:22'),
(92, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-17 08:01:14'),
(93, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-17 08:03:43'),
(95, 10006, 'Leche Gloria 400g', 5.90, 2, '2023-06-17 08:03:43'),
(96, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 08:06:04'),
(97, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 08:06:04'),
(99, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 08:06:04'),
(100, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 08:07:35'),
(101, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 08:07:35'),
(103, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 08:07:35'),
(104, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-17 08:07:35'),
(105, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 08:08:10'),
(106, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 08:08:10'),
(108, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 08:08:10'),
(109, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-17 08:08:10'),
(110, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 08:08:11'),
(111, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 08:08:11'),
(113, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 08:08:11'),
(114, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-17 08:08:11'),
(115, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 08:08:11'),
(116, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 08:08:11'),
(118, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 08:08:11'),
(119, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-17 08:08:11'),
(120, 10003, 'Galletas Oreo 216g', 3.20, 8, '2023-06-17 08:09:47'),
(122, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-17 08:09:47'),
(124, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-17 05:14:10'),
(125, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 05:14:10'),
(126, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 05:14:10'),
(127, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 05:14:10'),
(128, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-17 05:16:06'),
(129, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 05:16:06'),
(130, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 05:16:06'),
(131, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 05:16:06'),
(132, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-17 05:16:28'),
(133, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-17 05:16:28'),
(134, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 2, '2023-06-17 05:16:28'),
(135, 10001, 'Detergente ariel 500Gr', 9.40, 3, '2023-06-17 05:16:28'),
(136, 10003, 'Galletas Oreo 216g', 3.20, 3, '2023-06-17 10:05:20'),
(137, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-17 10:05:20'),
(138, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-17 10:05:20'),
(139, 10003, 'Galletas Oreo 216g', 3.20, 3, '2023-06-17 10:06:32'),
(140, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-17 10:06:32'),
(145, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:38:33'),
(146, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:39:02'),
(147, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:39:27'),
(148, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:39:50'),
(149, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:06'),
(150, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:07'),
(151, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:08'),
(152, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:08'),
(153, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:08'),
(154, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:08'),
(155, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:50'),
(156, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:50'),
(157, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:41:51'),
(158, 10011, 'Gaseosa Inka Kola 1l', 5.90, 3, '2023-06-18 22:45:11'),
(159, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 22:46:26'),
(160, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 22:47:37'),
(161, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 22:48:33'),
(162, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 22:51:00'),
(163, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 22:53:12'),
(164, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 22:53:43'),
(165, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:03:56'),
(166, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:12:08'),
(167, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:12:37'),
(168, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:13:14'),
(169, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:13:15'),
(170, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:16:21'),
(171, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:16:36'),
(172, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:17:20'),
(173, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:17:46'),
(174, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 2, '2023-06-18 23:18:06'),
(175, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:20:27'),
(176, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:20:27'),
(177, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:20:27'),
(178, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:20:42'),
(179, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:20:42'),
(180, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:20:42'),
(181, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:21:50'),
(182, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:21:50'),
(183, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:21:50'),
(184, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:21:51'),
(185, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:21:51'),
(186, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:21:51'),
(187, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:22:22'),
(188, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:22:22'),
(189, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:22:22'),
(190, 10006, 'Leche Gloria 400g', 5.90, 2, '2023-06-18 23:22:22'),
(191, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:33:33'),
(192, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:33:33'),
(193, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:33:33'),
(194, 10006, 'Leche Gloria 400g', 5.90, 2, '2023-06-18 23:33:33'),
(195, 10010, 'Gaseosa Inka Kola 600ml', 3.20, 1, '2023-06-18 23:33:34'),
(196, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-18 23:33:34'),
(197, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:33:34'),
(198, 10006, 'Leche Gloria 400g', 5.90, 2, '2023-06-18 23:33:34'),
(199, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:35:08'),
(200, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:35:08'),
(201, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:35:46'),
(202, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:35:46'),
(203, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:36:07'),
(204, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:36:07'),
(205, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:38:26'),
(206, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:38:26'),
(207, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:40:13'),
(208, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:40:13'),
(209, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:46:37'),
(210, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:46:37'),
(211, 10011, 'Gaseosa Inka Kola 1l', 5.90, 2, '2023-06-18 23:51:33'),
(212, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-18 23:51:33'),
(213, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-18 23:51:33'),
(214, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-18 23:51:58'),
(215, 10009, 'Gaseosa Coca Cola 500ml', 2.50, 1, '2023-06-18 23:56:07'),
(216, 10006, 'Leche Gloria 400g', 5.90, 1, '2023-06-18 23:57:07'),
(217, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:10:33'),
(218, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:11:04'),
(219, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:16:39'),
(220, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:17:54'),
(221, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:18:01'),
(222, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 00:20:54'),
(223, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:26:23'),
(224, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:29:03'),
(225, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:29:03'),
(226, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:29:48'),
(227, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:30:50'),
(228, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:33:33'),
(229, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:34:44'),
(230, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:39:36'),
(231, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:40:19'),
(232, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:40:20'),
(233, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:40:37'),
(234, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:40:38'),
(235, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:40:39'),
(236, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:41:06'),
(237, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:42:05'),
(238, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:48:53'),
(239, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:48:53'),
(240, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:50:07'),
(241, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:50:13'),
(242, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:50:23'),
(243, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:50:32'),
(244, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:51:12'),
(245, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 00:56:22'),
(246, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 01:14:43'),
(247, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 01:30:41'),
(248, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 01:32:50'),
(249, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 01:34:21'),
(251, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 01:40:13'),
(252, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 01:40:13'),
(253, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 01:40:13'),
(254, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 01:43:31'),
(255, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 01:43:31'),
(256, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 01:43:31'),
(257, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:03:29'),
(258, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:03:29'),
(259, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:03:29'),
(260, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:27:52'),
(261, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:27:52'),
(262, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:27:52'),
(263, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:40:53'),
(264, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:40:53'),
(265, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:40:53'),
(266, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:42:23'),
(267, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:42:23'),
(268, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:42:23'),
(269, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:44:51'),
(270, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:44:51'),
(271, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:44:51'),
(272, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:45:18'),
(273, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 02:45:18'),
(274, 10011, 'Gaseosa Inka Kola 1l', 5.90, 1, '2023-06-19 02:45:18'),
(275, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:51:04'),
(276, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 02:52:23'),
(277, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:00:49'),
(278, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:02:32'),
(279, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:05:00'),
(280, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:05:31'),
(281, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:05:38'),
(282, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:05:44'),
(284, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:06:51'),
(286, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:08:01'),
(288, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:09:03'),
(290, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:13:26'),
(292, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:13:43'),
(293, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:16:14'),
(294, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:25:20'),
(295, 10001, 'Detergente ariel 500Gr', 9.40, 2, '2023-06-19 03:25:32'),
(296, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:25:54'),
(297, 10003, 'Galletas Oreo 216g', 3.20, 1, '2023-06-19 03:26:07'),
(298, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:29:17'),
(299, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 03:29:36'),
(301, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:35:57'),
(302, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:40:12'),
(303, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:40:21'),
(304, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:51:20'),
(305, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:51:33'),
(307, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:51:36'),
(308, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:53:07'),
(310, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:53:09'),
(311, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 04:58:58'),
(312, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:10:50'),
(313, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:11:31'),
(314, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:11:42'),
(315, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:13:48'),
(316, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:15:49'),
(317, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:19:10'),
(318, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:19:40'),
(319, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:22:01'),
(320, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:26:31'),
(321, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:28:25'),
(322, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 05:29:05'),
(323, 10001, 'Detergente ariel 500Gr', 9.40, 1, '2023-06-19 06:21:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_boleta`
--

CREATE TABLE `detalle_boleta` (
  `id` int(11) NOT NULL,
  `id_boleta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `celular` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `contrasena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `codigo`, `nombre`, `apellidos`, `celular`, `correo`, `edad`, `cargo`, `contrasena`) VALUES
(1, 'LL001', 'Paco', 'Yunque', 925689452, 'yunque@gmail.com', 42, 'Cajero', 'paco123'),
(2, 'LL002', 'Juan', 'Nasca', 952445252, 'jose@utp.edu.oe', 21, 'Vendedor', '27288192A'),
(3, 'LL003', 'Julio', 'Ynonan Vidaure', 932022073, 'utp@utp.edu.pe', 21, 'Vendedor', '27288192SS'),
(4, 'LL004', 'Rosalinda', 'Siesquen', 965212335, 'rosa12@utp.edu.pe', 19, 'Cajera', 'GDHKEKE5'),
(5, 'LL005', 'Raul', 'Vazquez', 967456335, 'raul1s12@utp.edu.pe', 22, 'Limpieza', 'Jgsfjh4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_tabla`
--

CREATE TABLE `images_tabla` (
  `id` int(11) NOT NULL,
  `imagenes` longblob NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoss`
--

CREATE TABLE `productoss` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoss`
--

INSERT INTO `productoss` (`id`, `producto`, `img`, `precio`, `stock`, `categoria`, `idproveedor`, `proveedor`) VALUES
(10001, 'Detergente ariel 500Gr', 'WhatsApp Image 2023-05-24 at 18.47.13.jpeg', 9.40, 73, 'Limpieza', 10001, 'Zapolio'),
(10002, 'Yogurt 500g Gloria', 'WhatsApp Image 2023-05-24 at 18.43.31.jpeg', 5.40, 85, 'Bebidas', 10002, 'Gloria'),
(10003, 'Galletas Oreo 216g', 'WhatsApp Image 2023-05-24 at 19.23.21.jpeg', 3.20, 82, 'Viveres', 10003, 'Oreo'),
(10004, 'Arroz  Costeño 5kg', 'WhatsApp Image 2023-05-24 at 20.15.58.jpeg', 20.50, 86, 'Viveres', 10004, 'Alicport'),
(10005, 'Fideo Don victorio 950gr', 'WhatsApp Image 2023-05-24 at 20.18.54.jpeg', 5.40, 90, 'Viveres', 10005, 'Alicport'),
(10006, 'Leche Gloria 400g', 'WhatsApp Image 2023-05-26 at 01.04.05.jpeg', 5.90, 104, 'Viveres', 10006, 'Gloria'),
(10007, 'Azucar Rubia Costeño 750g', 'WhatsApp Image 2023-05-26 at 01.06.18.jpeg', 4.50, 200, 'Viveres', 10007, 'Alicport'),
(10008, 'Atun Gloria 170g', 'WhatsApp Image 2023-05-26 at 01.08.29.jpeg', 7.20, 50, 'Viveres', 10008, 'Gloria'),
(10009, 'Gaseosa Coca Cola 500ml', 'WhatsApp Image 2023-05-26 at 01.12.00.jpeg', 2.50, 62, 'Bebidas', 10009, 'Coca Cola'),
(10010, 'Gaseosa Inka Kola 600ml', 'WhatsApp Image 2023-05-26 at 01.18.53.jpeg', 3.20, 155, 'Bebidas', 10010, 'Coca cola'),
(10011, 'Gaseosa Inka Kola 1l', 'WhatsApp Image 2023-05-26 at 01.24.10.jpeg', 5.90, 81, 'Bebidas', 10011, 'Coca cola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `edad` int(11) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `correo`, `password`, `apellidos`, `telefono`, `direccion`, `date_add`, `edad`, `genero`) VALUES
(1, 'José', 'jose@gmail.com', 'jennial29', 'Ynoñan Vidaurre', 932022074, 'Los Olivos', '2023-05-08 00:00:00', 18, 'Masculino'),
(2, 'Jose Ynonan', 'jose@gmail.com', 'jennial28', 'Ynoñan Vidaurre', 932022074, 'Puente Piedra', '2004-07-14 00:00:00', 18, 'Masculino'),
(3, 'Marcos', 'u336337@utp.edu.pe', '123445567', 'Alcazar Vazquez', 912345678, 'Villa El Salvador', '2023-05-16 00:00:00', 21, 'Masculino'),
(4, 'Carlos', 'jf@gmail.com', '113', 'Yunque', 123456789, 'Jr.alberto589', '2000-03-28 00:00:00', 23, 'Masculino'),
(5, 'Carlos', 'carlos12@gmail.com', 'car123', 'Villa Miguel', 963852147, 'Puente Piedra', '2001-06-17 00:00:00', 22, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `nombre`, `descripcion`) VALUES
(1, 'ADMINISTRADOR', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(16) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` blob NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombres`, `paterno`, `materno`, `correo`, `clave`, `tipo`) VALUES
(1, '77210858', 'Alex', 'Llauce', 'Santisteban', 'llauce@gmail.com', 0xa3b420ab7068f346dfeea1dffa1b5535, 1),
(2, '75097053', 'LUIS', 'VENTOCILLA', 'MATTOS', 'luis@example.com', 0x5943994674ac996cca4c9636cb61d807, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `canasta`
--
ALTER TABLE `canasta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrito_producto` (`producto_id`);

--
-- Indices de la tabla `detalle_boleta`
--
ALTER TABLE `detalle_boleta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_boleta` (`id_boleta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images_tabla`
--
ALTER TABLE `images_tabla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoss`
--
ALTER TABLE `productoss`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_usuario_tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canasta`
--
ALTER TABLE `canasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT de la tabla `detalle_boleta`
--
ALTER TABLE `detalle_boleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `images_tabla`
--
ALTER TABLE `images_tabla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productoss`
--
ALTER TABLE `productoss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10020;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
