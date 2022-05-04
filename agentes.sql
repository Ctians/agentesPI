-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 14:29:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id`, `nombre`, `tipo`) VALUES
(1, 'MenuAgentes', 1),
(2, 'SubAgentes', 2),
(3, 'AgentesMostrar', 3),
(4, 'AgentesAgregar', 3),
(5, 'AgentesEditar', 3),
(6, 'AgentesEliminados', 3),
(7, 'AgentesVer', 3),
(8, 'CredencialMostrar', 3),
(9, 'CredencialPDF', 3),
(10, 'ProfesionMostrar', 3),
(11, 'ProfesionEditar', 3),
(12, 'ProfesionEliminar', 3),
(13, 'ProfesionAgregar', 3),
(14, 'UsuariosMostrar', 3),
(15, 'UsuariosEliminados', 3),
(16, 'UsuariosAgregar', 3),
(17, 'UsuariosEditar', 3),
(18, 'UsuariosEliminados', 3),
(19, 'UsuariosReingresar', 3),
(20, 'RolesMostrar', 3),
(21, 'RolesIngresar', 3),
(22, 'RolesEditar', 3),
(23, 'RolesEliminar', 3),
(24, 'RolesDetalles', 3),
(25, 'AgentesPIMostrar', 3),
(26, 'AgentesPIAgregar', 3),
(27, 'CredendialPIMostrar', 3),
(28, 'CredencialPIPDF', 3),
(29, 'AgentesPIVer', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `id_agentes` smallint(6) NOT NULL,
  `nacionalidad` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `cedula` int(8) NOT NULL,
  `nombre1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nombre2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono1` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `telefono2` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_usuarios` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `id_profesion` int(11) NOT NULL,
  `nro_colegiado` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `inpre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modificado` timestamp NULL DEFAULT NULL,
  `direccion_ip` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto_carnet` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nro_colegiado_file` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `id_permiso` int(11) NOT NULL DEFAULT 1,
  `razon_desaprobar` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `inpre_file` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_file` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`id_agentes`, `nacionalidad`, `cedula`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `telefono1`, `telefono2`, `id_usuarios`, `direccion`, `id_profesion`, `nro_colegiado`, `inpre`, `fecha_creado`, `fecha_modificado`, `direccion_ip`, `foto_carnet`, `nro_colegiado_file`, `id_permiso`, `razon_desaprobar`, `inpre_file`, `titulo_file`) VALUES
(2, 'E', 31231231, 'awdawdawd', '', 'awd', '', '(3123) 123-1231', '', 1, 'awda', 17, '312', '132ewda', '2021-04-25 22:56:54', '2021-04-25 22:56:54', NULL, '31231231-25042021063521-1619390121_85d3f84dffd01ad46b34.png', '31231231-25042021063521-1619390121_26bfdab050c84b7d4431.pdf', 3, NULL, '31231231-25042021063521-1619390121_5310367dc7879cfc87be.pdf', '31231231-25042021063521-1619390121_d9c75306af429fa071a4.pdf'),
(8, 'E', 56732375, 'awadw', '', 'wdawd', '', '(0424) 135-5110', '', 8, 'Plaza caracas', 14, 'dawd', 'awdaw', '2021-05-03 23:00:44', '2021-05-03 23:00:44', '::1', '56732375-03052021070044-1620082844_c4c84e3234a5ccc0a4f3.png', '56732375-03052021070044-1620082844_3b4eaedb8a07d6b0679c.pdf', 1, NULL, '56732375-03052021070044-1620082844_27c6d75a90afdf8fec15.pdf', '56732375-03052021070044-1620082844_f08180e0025bb76892c4.pdf'),
(7, 'V', 373737, 'Bsjsj', 'Shsgw', 'Shsh', 'Hww', '(0416) 614-9413', '', 7, 'Avenida Leonardo Ruiz Pineda San Agustin del Sur.', 7, 'Hwwhwh', 'Hdhdj', '2021-05-03 11:58:14', '2021-05-03 11:58:14', '192.168.0.115', '373737-03052021075814-1620043094_796da3464a1636499a5c.png', '373737-03052021075814-1620043094_ff3e84cafd49784307bd.pdf', 1, NULL, '373737-03052021075814-1620043094_a32f1cb3b2f207893fc9.pdf', '373737-03052021075814-1620043094_38e1b8f190d8f145f568.pdf'),
(5, 'V', 3123123, 'dawda', '', 'awdaw', '', '(0424) 135-5110', '(3123) 123-1231', 5, 'Plaza caracas', 17, 'ewadw', 'r23rwe', '2021-05-02 23:49:30', '2021-05-02 23:49:30', '::1', '3123123-02052021074930-1619999370_5bf6b3b6ab7edd09c06f.png', '3123123-02052021074930-1619999370_85a01f1711c6141cd090.pdf', 1, NULL, '3123123-02052021074930-1619999370_a5e3c5358e76a127a7ec.pdf', '3123123-02052021074930-1619999370_ca986bd61cd1aebfa4f2.pdf'),
(1, 'V', 21798217, 'sdawda', 'awdaw', 'awdaw', 'awdawd', '(3123) 123-1231', '(1212) 313-1231', 1, 'zdawd', 15, '3123123', '3123123', '2021-05-02 16:03:39', '2021-05-02 16:03:39', NULL, '21798217-25042021063413-1619390053_88045b1e13e4fbf223f2.png', '21798217-25042021063413-1619390053_1e055ae152bc62d42624.pdf', 3, NULL, '21798217-25042021063413-1619390053_6e1a66c62bb541bfc605.pdf', '21798217-25042021063413-1619390053_55cc5bc1a7e629efc799.pdf'),
(3, 'V', 23124142, '2adwawdaw', 'awdaw', 'awda', '', '(0416) 614-9413', '', 2, 'Avenida Leonardo Ruiz Pineda San Agustin del Sur.', 15, '2323123', 'dawdaw', '2021-05-02 18:43:17', '2021-05-02 18:43:17', NULL, '23124142-25042021064521-1619390721_cda0cb70ca332a830b03.png', '23124142-25042021064521-1619390721_74eab58e15360144409e.pdf', 1, 'dawdawdaw', '23124142-25042021064521-1619390721_fe53bb8266cbe64c9506.pdf', '23124142-25042021064521-1619390721_ccc352c2491b2d74b8c9.pdf'),
(6, 'V', 65423123, 'adw', '', 'daw', '', '(0416) 614-9413', '', 6, 'Avenida Leonardo Ruiz Pineda San Agustin del Sur.', 13, 'daw', 'dwa', '2021-05-03 22:51:15', '2021-05-03 22:51:15', '::1', '65423123-03052021075117-1620042677_931098b0b5a8ebb0f220.png', '65423123-03052021075117-1620042677_cfa827fbfe61be9307b6.pdf', 2, 'dawdawd', '65423123-03052021075117-1620042677_b8a68259ae5ed8108e07.pdf', '65423123-03052021075117-1620042677_8eeeb226a201550ff409.pdf'),
(4, 'V', 76745745, 'daw', '', 'daw', '', '(0416) 614-9413', '', 4, 'Avenida Leonardo Ruiz Pineda San Agustin del Sur.', 13, '31231', '23123', '2021-05-02 23:41:43', '2021-05-02 23:41:43', '::1', '76745745-02052021074143-1619998903_4f807c04ab8bf7c6bf90.png', '76745745-02052021074143-1619998903_1a407e6c3fa2ff03bd3d.pdf', 1, NULL, '76745745-02052021074143-1619998903_0d22b78c6ffbe8313991.pdf', '76745745-02052021074143-1619998903_c9bd7995641427b00994.pdf'),
(9, 'V', 87654231, 'wdaw', '', 'awdaw', '', '(0424) 135-5110', '', 6, 'Plaza caracas', 15, '312312', '1231231', '2021-05-05 23:43:59', '2021-05-05 23:43:59', '::1', '87654231-03052021071845-1620083925_a19f864b62831bae5a37.png', '87654231-03052021071845-1620083925_49e35caff2f44df848f6.pdf', 2, 'adwdawdaw', '87654231-03052021071845-1620083925_d832ae5692ecce00683e.pdf', '87654231-03052021071845-1620083925_63ca763310cc4dc3160c.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_roles_accesos`
--

CREATE TABLE `detalles_roles_accesos` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalles_roles_accesos`
--

INSERT INTO `detalles_roles_accesos` (`id`, `id_rol`, `id_acceso`) VALUES
(133, 1, 3),
(134, 1, 4),
(135, 1, 5),
(136, 1, 6),
(137, 1, 7),
(138, 1, 8),
(139, 1, 9),
(140, 1, 10),
(141, 1, 11),
(142, 1, 12),
(143, 1, 13),
(144, 1, 14),
(145, 1, 15),
(146, 1, 16),
(147, 1, 17),
(148, 1, 18),
(149, 1, 19),
(150, 1, 20),
(151, 1, 21),
(152, 1, 22),
(153, 1, 23),
(154, 1, 24),
(160, 5, 3),
(161, 5, 7),
(162, 5, 8),
(163, 5, 10),
(164, 5, 11),
(165, 5, 13),
(166, 6, 3),
(167, 6, 4),
(168, 6, 5),
(169, 6, 6),
(170, 6, 7),
(171, 6, 8),
(172, 6, 9),
(173, 6, 10),
(174, 6, 11),
(175, 6, 12),
(176, 6, 13),
(193, 2, 25),
(194, 2, 26),
(195, 2, 27),
(196, 2, 28),
(197, 2, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `evento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `detalles` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `id_usuarios`, `evento`, `fecha`, `ip`, `detalles`) VALUES
(1, 1, '0', '2021-05-02 19:09:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(2, 1, '0', '2021-05-02 19:14:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(3, 1, 'Inicio de Sesión', '2021-05-02 19:15:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(4, 1, 'Cierre de Sesión', '2021-05-02 19:15:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(5, 1, 'Inicio de Sesión', '2021-05-02 19:17:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(6, 4, 'Nueva solicitud de credencial', '2021-05-02 19:41:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(7, 1, 'Cierre de Sesión', '2021-05-02 19:42:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(8, 1, 'Inicio de Sesión', '2021-05-02 19:46:46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(9, 1, 'Inicio de Sesión', '2021-05-02 19:48:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(10, 1, 'Nueva solicitud de credencial', '2021-05-02 19:49:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(11, 1, 'Cierre de Sesión', '2021-05-02 19:49:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(12, 1, 'Inicio de Sesión', '2021-05-03 07:48:05', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(13, 1, 'Cierre de Sesión', '2021-05-03 07:48:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(14, 1, 'Inicio de Sesión', '2021-05-03 07:48:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(15, 1, 'Cierre de Sesión', '2021-05-03 07:50:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(16, 1, 'Inicio de Sesión', '2021-05-03 07:50:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(17, 1, 'Nueva solicitud de credencial V65423123', '2021-05-03 07:51:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(18, 1, 'Cierre de Sesión', '2021-05-03 07:55:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(19, 1, 'Inicio de Sesión', '2021-05-03 07:55:29', '192.168.0.115', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.443'),
(20, 1, 'Nueva solicitud de credencial V373737', '2021-05-03 07:58:15', '192.168.0.115', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.443'),
(21, 1, 'Cierre de Sesión', '2021-05-03 07:58:22', '192.168.0.115', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.443'),
(22, 1, 'Inicio de Sesión', '2021-05-03 10:43:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(23, 1, 'Inicio de Sesión', '2021-05-03 13:47:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(24, 1, 'Inicio de Sesión', '2021-05-03 13:48:51', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(25, 1, 'Inicio de Sesión', '2021-05-03 13:49:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(26, 1, 'Cierre de Sesión', '2021-05-03 14:04:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(27, 8, 'Inicio de Sesión', '2021-05-03 14:04:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(28, 8, 'Cierre de Sesión', '2021-05-03 14:31:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(29, 1, 'Inicio de Sesión', '2021-05-03 14:31:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(30, 6, 'Inicio de Sesión', '2021-05-03 14:45:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(31, 6, 'Cierre de Sesión', '2021-05-03 14:56:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(32, 6, 'Inicio de Sesión', '2021-05-03 14:56:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(33, 6, 'Cierre de Sesión', '2021-05-03 14:56:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(34, 1, 'Inicio de Sesión', '2021-05-03 14:56:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(35, 1, 'Cierre de Sesión', '2021-05-03 14:56:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(36, 6, 'Inicio de Sesión', '2021-05-03 14:57:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(37, 6, 'Cierre de Sesión', '2021-05-03 15:01:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(38, 1, 'Cierre de Sesión', '2021-05-03 15:02:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(39, 6, 'Inicio de Sesión', '2021-05-03 15:02:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(40, 1, 'Inicio de Sesión', '2021-05-03 15:21:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(41, 1, 'Inicio de Sesión', '2021-05-03 17:49:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(42, 6, 'Cierre de Sesión', '2021-05-03 17:58:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(43, 6, 'Inicio de Sesión', '2021-05-03 17:58:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(44, 1, 'Nueva solicitud de credencial E56732375', '2021-05-03 19:00:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(45, 6, 'Nueva solicitud de credencial V87654231', '2021-05-03 19:18:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(46, 1, 'Inicio de Sesión', '2021-05-04 20:06:25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(47, 1, 'Cierre de Sesión', '2021-05-04 20:49:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(48, 6, 'Inicio de Sesión', '2021-05-04 20:49:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(49, 6, 'Cierre de Sesión', '2021-05-04 20:49:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(50, 1, 'Inicio de Sesión', '2021-05-04 20:49:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(51, 1, 'Cierre de Sesión', '2021-05-04 21:29:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(52, 1, 'Inicio de Sesión', '2021-05-05 14:46:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`) VALUES
(1, 'Credencial Solicitada'),
(2, 'Credencial Negada'),
(3, 'Credencial Aprobada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `id_profesion` int(11) NOT NULL,
  `nombre_profesion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modificado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id_profesion`, `nombre_profesion`, `fecha_creado`, `fecha_modificado`) VALUES
(1, 'Abogado', '2021-04-18 20:56:41', '2021-04-18 20:56:41'),
(2, 'Académico', '2021-03-08 20:55:48', NULL),
(3, 'Adjunto', '2021-03-08 20:55:48', NULL),
(4, 'Administrador', '2021-03-08 20:55:48', NULL),
(5, 'Administrativo', '2021-03-08 20:55:48', NULL),
(6, 'Agrónomo', '2021-03-08 20:55:48', NULL),
(7, 'Alergólogo Alergista', '2021-03-08 20:55:48', NULL),
(8, 'Almacenero Almacenista', '2021-03-08 20:55:48', NULL),
(9, 'Anatomista', '2021-03-08 20:55:48', NULL),
(10, 'Anestesiólogo Anestesista', '2021-03-08 20:55:48', NULL),
(11, 'Antologista', '2021-03-08 20:55:48', NULL),
(12, 'Antropólogo', '2021-03-08 20:55:48', NULL),
(13, 'Arabista', '2021-03-08 20:55:48', NULL),
(14, 'Archivero', '2021-03-08 20:55:48', NULL),
(15, 'Arqueólogo', '2021-03-08 20:55:48', NULL),
(16, 'Arquitecto', '2021-03-08 20:55:48', NULL),
(17, 'Asesor', '2021-03-08 20:55:48', NULL),
(18, 'Asistente', '2021-03-08 20:55:48', NULL),
(19, 'Astrofísico', '2021-03-08 20:55:48', NULL),
(20, 'Astrólogo', '2021-03-08 20:55:48', NULL),
(21, 'Astrónomo', '2021-03-08 20:55:48', NULL),
(22, 'Atleta', '2021-03-08 20:55:48', NULL),
(23, 'ATS', '2021-03-08 20:55:48', NULL),
(24, 'Autor', '2021-03-08 20:55:48', NULL),
(25, 'Auxiliar', '2021-03-08 20:55:48', NULL),
(26, 'Avicultor', '2021-03-08 20:55:48', NULL),
(27, 'Bacteriólogo', '2021-03-08 20:55:48', NULL),
(28, 'Bedel', '2021-03-08 20:55:48', NULL),
(29, 'Bibliógrafo', '2021-03-08 20:55:48', NULL),
(30, 'Bibliotecario', '2021-03-08 20:55:48', NULL),
(31, 'Biofísico', '2021-03-08 20:55:48', NULL),
(32, 'Biógrafo', '2021-03-08 20:55:48', NULL),
(33, 'Biólogo', '2021-03-08 20:55:48', NULL),
(34, 'Bioquímico', '2021-03-08 20:55:48', NULL),
(35, 'Botánico', '2021-03-08 20:55:48', NULL),
(36, 'Cancerólogo', '2021-03-08 20:55:48', NULL),
(37, 'Cardiólogo', '2021-03-08 20:55:48', NULL),
(38, 'Cartógrafo', '2021-03-08 20:55:48', NULL),
(39, 'Castrador', '2021-03-08 20:55:48', NULL),
(40, 'Catedrático', '2021-03-08 20:55:48', NULL),
(41, 'Cirujano', '2021-03-08 20:55:48', NULL),
(42, 'Citólogo', '2021-03-08 20:55:48', NULL),
(43, 'Climatólogo', '2021-03-08 20:55:48', NULL),
(44, 'Codirector', '2021-03-08 20:55:48', NULL),
(45, 'Comadrón', '2021-03-08 20:55:48', NULL),
(46, 'Consejero', '2021-03-08 20:55:48', NULL),
(47, 'Conserje', '2021-03-08 20:55:48', NULL),
(48, 'Conservador', '2021-03-08 20:55:48', NULL),
(49, 'Coordinador', '2021-03-08 20:55:48', NULL),
(50, 'Cosmógrafo', '2021-03-08 20:55:48', NULL),
(51, 'Cosmólogo', '2021-03-08 20:55:48', NULL),
(52, 'Criminalista', '2021-03-08 20:55:48', NULL),
(53, 'Cronólogo', '2021-03-08 20:55:48', NULL),
(54, 'Decorador', '2021-03-08 20:55:48', NULL),
(55, 'Defensor', '2021-03-08 20:55:48', NULL),
(56, 'Delegado', '2021-03-08 20:55:48', NULL),
(57, 'Delineante', '2021-03-08 20:55:48', NULL),
(58, 'Demógrafo', '2021-03-08 20:55:48', NULL),
(59, 'Dentista', '2021-03-08 20:55:48', NULL),
(60, 'Dermatólogo', '2021-03-08 20:55:48', NULL),
(61, 'Dibujante', '2021-03-08 20:55:48', NULL),
(62, 'Directivo', '2021-03-08 20:55:48', NULL),
(63, 'Director', '2021-03-08 20:55:48', NULL),
(64, 'Dirigente', '2021-03-08 20:55:48', NULL),
(65, 'Doctor', '2021-03-08 20:55:48', NULL),
(66, 'Documentalista', '2021-03-08 20:55:48', NULL),
(67, 'Ecólogo', '2021-03-08 20:55:48', NULL),
(68, 'Economista', '2021-03-08 20:55:48', NULL),
(69, 'Educador', '2021-03-08 20:55:48', NULL),
(70, 'Egiptólogo', '2021-03-08 20:55:48', NULL),
(71, 'Endocrinólogo', '2021-03-08 20:55:48', NULL),
(72, 'Enfermero', '2021-03-08 20:55:48', NULL),
(73, 'Enólogo', '2021-03-08 20:55:48', NULL),
(74, 'Entomólogo', '2021-03-08 20:55:48', NULL),
(75, 'Epidemiólogo', '2021-03-08 20:55:48', NULL),
(76, 'Especialista', '2021-03-08 20:55:48', NULL),
(77, 'Espeleólogo', '2021-03-08 20:55:48', NULL),
(78, 'Estadista', '2021-03-08 20:55:48', NULL),
(79, 'Etimólogo Etimologista', '2021-03-08 20:55:48', NULL),
(80, 'Etnógrafo', '2021-03-08 20:55:48', NULL),
(81, 'Etnólogo', '2021-03-08 20:55:48', NULL),
(82, 'Etólogo', '2021-03-08 20:55:48', NULL),
(83, 'Examinador', '2021-03-08 20:55:48', NULL),
(84, 'Facultativo', '2021-03-08 20:55:48', NULL),
(85, 'Farmacéutico', '2021-03-08 20:55:48', NULL),
(86, 'Farmacólogo', '2021-03-08 20:55:48', NULL),
(87, 'Filósofo', '2021-03-08 20:55:48', NULL),
(88, 'Fiscal', '2021-03-08 20:55:48', NULL),
(89, 'Físico', '2021-03-08 20:55:48', NULL),
(90, 'Fisiólogo', '2021-03-08 20:55:48', NULL),
(91, 'Fisioterapeuta', '2021-03-08 20:55:48', NULL),
(92, 'Fonetista', '2021-03-08 20:55:48', NULL),
(93, 'Foníatra', '2021-03-08 20:55:48', NULL),
(94, 'Fonólogo', '2021-03-08 20:55:48', NULL),
(95, 'Forense', '2021-03-08 20:55:48', NULL),
(96, 'Fotógrafo', '2021-03-08 20:55:48', NULL),
(97, 'Funcionario', '2021-03-08 20:55:48', NULL),
(98, 'Gemólogo', '2021-03-08 20:55:48', NULL),
(99, 'Genetista', '2021-03-08 20:55:48', NULL),
(100, 'Geobotánica', '2021-03-08 20:55:48', NULL),
(101, 'Geodesta', '2021-03-08 20:55:48', NULL),
(102, 'Geofísico', '2021-03-08 20:55:48', NULL),
(103, 'Geógrafo', '2021-03-08 20:55:48', NULL),
(104, 'Geólogo', '2021-03-08 20:55:48', NULL),
(105, 'Geomántico', '2021-03-08 20:55:48', NULL),
(106, 'Geómetra', '2021-03-08 20:55:48', NULL),
(107, 'Geoquímica', '2021-03-08 20:55:48', NULL),
(108, 'Gerente', '2021-03-08 20:55:48', NULL),
(109, 'Geriatra', '2021-03-08 20:55:48', NULL),
(110, 'Gerontólogo', '2021-03-08 20:55:48', NULL),
(111, 'Gestor', '2021-03-08 20:55:48', NULL),
(112, 'Grabador', '2021-03-08 20:55:48', NULL),
(113, 'Graduado social', '2021-03-08 20:55:48', NULL),
(114, 'Grafólogo', '2021-03-08 20:55:48', NULL),
(115, 'Gramático', '2021-03-08 20:55:48', NULL),
(116, 'Hematólogo', '2021-03-08 20:55:48', NULL),
(117, 'Hepatólogo', '2021-03-08 20:55:48', NULL),
(118, 'Hidrogeólogo', '2021-03-08 20:55:48', NULL),
(119, 'Hidrógrafo', '2021-03-08 20:55:48', NULL),
(120, 'Hidrólogo', '2021-03-08 20:55:48', NULL),
(121, 'Higienista', '2021-03-08 20:55:48', NULL),
(122, 'Hispanista', '2021-03-08 20:55:48', NULL),
(123, 'Historiador', '2021-03-08 20:55:48', NULL),
(124, 'Homeópata', '2021-03-08 20:55:48', NULL),
(125, 'Informático', '2021-03-08 20:55:48', NULL),
(126, 'Ingeniero', '2021-03-08 20:55:48', NULL),
(127, 'Ingeniero técnico', '2021-03-08 20:55:48', NULL),
(128, 'Inmunólogo', '2021-03-08 20:55:48', NULL),
(129, 'Inspector', '2021-03-08 20:55:48', NULL),
(130, 'Interino', '2021-03-08 20:55:48', NULL),
(131, 'Interventor', '2021-03-08 20:55:48', NULL),
(132, 'Investigador', '2021-03-08 20:55:48', NULL),
(133, 'Jardinero', '2021-03-08 20:55:48', NULL),
(134, 'Jefe', '2021-03-08 20:55:48', NULL),
(135, 'Juez', '2021-03-08 20:55:48', NULL),
(136, 'Latinista', '2021-03-08 20:55:48', NULL),
(137, 'Lector', '2021-03-08 20:55:48', NULL),
(138, 'Letrado (abogado)', '2021-03-08 20:55:48', NULL),
(139, 'Lexicógrafo', '2021-03-08 20:55:48', NULL),
(140, 'Lexicólogo', '2021-03-08 20:55:48', NULL),
(141, 'Licenciado', '2021-03-08 20:55:48', NULL),
(142, 'Lingüista', '2021-03-08 20:55:48', NULL),
(143, 'Logopeda', '2021-03-08 20:55:48', NULL),
(144, 'Maestro', '2021-03-08 20:55:48', NULL),
(145, 'Matemático', '2021-03-08 20:55:48', NULL),
(146, 'Matrón', '2021-03-08 20:55:48', NULL),
(147, 'Medico', '2021-03-08 20:55:48', NULL),
(148, 'Meteorólogo', '2021-03-08 20:55:48', NULL),
(149, 'Micólogo', '2021-03-08 20:55:48', NULL),
(150, 'Microbiológico', '2021-03-08 20:55:48', NULL),
(151, 'Microcirujano', '2021-03-08 20:55:48', NULL),
(152, 'Mimógrafo', '2021-03-08 20:55:48', NULL),
(153, 'Mineralogista', '2021-03-08 20:55:48', NULL),
(154, 'Monitor', '2021-03-08 20:55:48', NULL),
(155, 'Musicólogo', '2021-03-08 20:55:48', NULL),
(156, 'Naturópata', '2021-03-08 20:55:48', NULL),
(157, 'Nefrólogo', '2021-03-08 20:55:48', NULL),
(158, 'Neumólogo', '2021-03-08 20:55:48', NULL),
(159, 'Neuroanatomista', '2021-03-08 20:55:48', NULL),
(160, 'Neurobiólogo', '2021-03-08 20:55:48', NULL),
(161, 'Neurocirujano', '2021-03-08 20:55:48', NULL),
(162, 'Neuroembriólogo', '2021-03-08 20:55:48', NULL),
(163, 'Neurofisiólogo', '2021-03-08 20:55:48', NULL),
(164, 'Neurólogo', '2021-03-08 20:55:48', NULL),
(165, 'Nutrólogo', '2021-03-08 20:55:48', NULL),
(166, 'Oceanógrafo', '2021-03-08 20:55:48', NULL),
(167, 'Odontólogo', '2021-03-08 20:55:48', NULL),
(168, 'Oficial', '2021-03-08 20:55:48', NULL),
(169, 'Oficinista', '2021-03-08 20:55:48', NULL),
(170, 'Oftalmólogo', '2021-03-08 20:55:48', NULL),
(171, 'Oncólogo', '2021-03-08 20:55:48', NULL),
(172, 'Óptico', '2021-03-08 20:55:48', NULL),
(173, 'Optometrista', '2021-03-08 20:55:48', NULL),
(174, 'Ordenanza', '2021-03-08 20:55:48', NULL),
(175, 'Orientador', '2021-03-08 20:55:48', NULL),
(176, 'Ornitólogo', '2021-03-08 20:55:48', NULL),
(177, 'Ortopédico', '2021-03-08 20:55:48', NULL),
(178, 'Ortopedista', '2021-03-08 20:55:48', NULL),
(179, 'Osteólogo', '2021-03-08 20:55:48', NULL),
(180, 'Osteópata', '2021-03-08 20:55:48', NULL),
(181, 'Otorrinolaringólogo', '2021-03-08 20:55:48', NULL),
(182, 'Paleobiólogo', '2021-03-08 20:55:48', NULL),
(183, 'Paleobotánico', '2021-03-08 20:55:48', NULL),
(184, 'Paleógrafo', '2021-03-08 20:55:48', NULL),
(185, 'Paleólogo', '2021-03-08 20:55:48', NULL),
(186, 'Paleontólogo', '2021-03-08 20:55:48', NULL),
(187, 'Patólogo', '2021-03-08 20:55:48', NULL),
(188, 'Pedagogo', '2021-03-08 20:55:48', NULL),
(189, 'Pediatra', '2021-03-08 20:55:48', NULL),
(190, 'Pedicuro', '2021-03-08 20:55:48', NULL),
(191, 'Periodista', '2021-03-08 20:55:48', NULL),
(192, 'Perito', '2021-03-08 20:55:48', NULL),
(193, 'Ingeniero técnico', '2021-03-08 20:55:48', NULL),
(194, 'Piscicultor', '2021-03-08 20:55:48', NULL),
(195, 'Podólogo', '2021-03-08 20:55:48', NULL),
(196, 'Portero', '2021-03-08 20:55:48', NULL),
(197, 'Prehistoriador', '2021-03-08 20:55:48', NULL),
(198, 'Presidente', '2021-03-08 20:55:48', NULL),
(199, 'Proctólogo', '2021-03-08 20:55:48', NULL),
(200, 'Profesor', '2021-03-08 20:55:48', NULL),
(201, 'Programador', '2021-03-08 20:55:48', NULL),
(202, 'Protésico', '2021-03-08 20:55:48', NULL),
(203, 'Proveedor', '2021-03-08 20:55:48', NULL),
(204, 'Psicoanalista', '2021-03-08 20:55:48', NULL),
(205, 'Psicólogo', '2021-03-08 20:55:48', NULL),
(206, 'Psicofísico', '2021-03-08 20:55:48', NULL),
(207, 'Psicopedagogo', '2021-03-08 20:55:48', NULL),
(208, 'Psicoterapeuta', '2021-03-08 20:55:48', NULL),
(209, 'Psiquiatra', '2021-03-08 20:55:48', NULL),
(210, 'Publicista', '2021-03-08 20:55:48', NULL),
(211, 'Publicitario', '2021-03-08 20:55:48', NULL),
(212, 'Puericultor', '2021-03-08 20:55:48', NULL),
(213, 'Químico', '2021-03-08 20:55:48', NULL),
(214, 'Quiropráctico', '2021-03-08 20:55:48', NULL),
(215, 'Radioastrónomo', '2021-03-08 20:55:48', NULL),
(216, 'Radiofonista', '2021-03-08 20:55:48', NULL),
(217, 'Radiólogo', '2021-03-08 20:55:48', NULL),
(218, 'Radiotécnico', '2021-03-08 20:55:48', NULL),
(219, 'Radiotelefonista', '2021-03-08 20:55:48', NULL),
(220, 'Radiotelegrafista', '2021-03-08 20:55:48', NULL),
(221, 'Radioterapeuta', '2021-03-08 20:55:48', NULL),
(222, 'Rector', '2021-03-08 20:55:48', NULL),
(223, 'Sanitario', '2021-03-08 20:55:48', NULL),
(224, 'Secretario', '2021-03-08 20:55:48', NULL),
(225, 'Sexólogo', '2021-03-08 20:55:48', NULL),
(226, 'Sismólogo', '2021-03-08 20:55:48', NULL),
(227, 'Sociólogo', '2021-03-08 20:55:48', NULL),
(228, 'Subdelegado', '2021-03-08 20:55:48', NULL),
(229, 'Subdirector', '2021-03-08 20:55:48', NULL),
(230, 'Subsecretario', '2021-03-08 20:55:48', NULL),
(231, 'Técnico', '2021-03-08 20:55:48', NULL),
(232, 'Telefonista', '2021-03-08 20:55:48', NULL),
(233, 'Teólogo', '2021-03-08 20:55:48', NULL),
(234, 'Terapeuta', '2021-03-08 20:55:48', NULL),
(235, 'Tocoginecólogo', '2021-03-08 20:55:48', NULL),
(236, 'Tocólogo', '2021-03-08 20:55:48', NULL),
(237, 'Toxicólogo', '2021-03-08 20:55:48', NULL),
(238, 'Traductor', '2021-03-08 20:55:48', NULL),
(239, 'Transcriptor', '2021-03-08 20:55:48', NULL),
(240, 'Traumatólogo', '2021-03-08 20:55:48', NULL),
(241, 'Tutor', '2021-03-08 20:55:48', NULL),
(242, 'Urólogo', '2021-03-08 20:55:48', NULL),
(243, 'Veterinario', '2021-03-08 20:55:48', NULL),
(244, 'Vicedecano', '2021-03-08 20:55:48', NULL),
(245, 'Vicedirector', '2021-03-08 20:55:48', NULL),
(246, 'Vicegerente', '2021-03-08 20:55:48', NULL),
(247, 'Vicepresidente', '2021-03-08 20:55:48', NULL),
(248, 'Vicerrector', '2021-03-08 20:55:48', NULL),
(249, 'Vicesecretario', '2021-03-08 20:55:48', NULL),
(250, 'Virólogo', '2021-03-08 20:55:48', NULL),
(251, 'Viticultor', '2021-03-08 20:55:48', NULL),
(252, 'Vulcanólogo', '2021-03-08 20:55:48', NULL),
(253, 'Xilógrafo', '2021-03-08 20:55:48', NULL),
(254, 'Zoólogo', '2021-03-08 20:55:48', NULL),
(255, 'Zootécnico', '2021-03-09 22:40:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modifica` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `activo`, `fecha_creado`, `fecha_modifica`) VALUES
(1, 'Administrador', 1, '2021-05-03 15:15:56', NULL),
(2, 'Usuario', 1, '2021-04-18 21:01:31', NULL),
(5, 'Analista', 1, '2021-05-03 18:03:00', NULL),
(6, 'Supervisor', 1, '2021-05-03 18:30:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(130) COLLATE latin1_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 2,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `direccion_ip` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `correo`, `password`, `id_rol`, `activo`, `direccion_ip`, `fecha_creado`, `fecha_modificado`) VALUES
(1, 'cmalav3@gmail.com', '$2y$10$H35t7/5.J6Q1SirB1kmVTugs3mfHKdRLGDBLHDG2BLGxOsCOZWmOu', 1, 1, '', '2021-04-25 22:32:51', '2021-04-25 22:32:51'),
(2, 'a@gmail.com', '$2y$10$.dLg005gDsGHL8ko0e3RxOt9ehkHtlx0/m5VDSAYmP5Ixg9fZvfia', 1, 1, '', '2021-04-25 22:33:01', '2021-04-25 22:33:01'),
(3, 'b@gmail.com', '$2y$10$6JiYESxSKOhl/KpElAVnLOmdrzuNICISr3BCSE4tTQGCEbKAjiQ4a', 1, 0, '', '2021-04-25 22:33:19', '2021-04-25 22:33:33'),
(4, 'q3@gmail.com', '$2y$10$20caWtHuSTmWvkbEn6djwOJFJFEQH1EhA7AOSzFox.pXiA2/9lR9m', 1, 1, '::1', '2021-05-02 23:17:59', '2021-05-02 23:17:59'),
(5, 'a4@gmail.com', '$2y$10$khfU3.9.wkbxpHdAh6O7/uk.9JRCr9LQcrJqeFXu3s3aVUVmekA.a', 1, 1, '::1', '2021-05-02 23:48:19', '2021-05-03 18:21:25'),
(6, 'awd@gmail.com', '$2y$10$GceR7cOMjVHECy30mEUdsObLtTPl6f/RxntcIebAxJIZldyg3SH3W', 2, 1, '::1', '2021-05-03 11:50:28', '2021-05-03 11:50:28'),
(7, 'ty@gmail.com', '$2y$10$aM0A7cKBlOz3JDpKvL78ZuxDL47JYpKIEze.4Ssf1RDVqrq5WArcq', 2, 1, '192.168.0.115', '2021-05-03 11:54:59', '2021-05-03 11:54:59'),
(8, 'lisnay@gmail.com', '$2y$10$QzV87V11CgzYG5j.8h4lAufYpFg3XSRdq9g0hM1r5RdC//5h5Z/YS', 5, 1, '::1', '2021-05-03 18:03:35', '2021-05-03 18:03:35'),
(9, 'fabio@gmail.com', '$2y$10$85zMMqzrWgTDt37Ne/qsc.82Y2O.HqXfduYAnL3zvkGt.Kxrn8j8G', 2, 1, '::1', '2021-05-05 01:09:13', '2021-05-05 01:09:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`nacionalidad`,`cedula`),
  ADD UNIQUE KEY `id_agentes` (`id_agentes`),
  ADD KEY `id_profesion` (`id_profesion`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `detalles_roles_accesos`
--
ALTER TABLE `detalles_roles_accesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_acceso` (`id_acceso`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`id_profesion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`) USING BTREE,
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
  MODIFY `id_agentes` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalles_roles_accesos`
--
ALTER TABLE `detalles_roles_accesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `id_profesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD CONSTRAINT `agentes_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `agentes_ibfk_2` FOREIGN KEY (`id_profesion`) REFERENCES `profesion` (`id_profesion`),
  ADD CONSTRAINT `agentes_ibfk_3` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`);

--
-- Filtros para la tabla `detalles_roles_accesos`
--
ALTER TABLE `detalles_roles_accesos`
  ADD CONSTRAINT `detalles_roles_accesos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `detalles_roles_accesos_ibfk_2` FOREIGN KEY (`id_acceso`) REFERENCES `accesos` (`id`);

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
