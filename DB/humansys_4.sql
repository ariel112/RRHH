-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2021 a las 22:16:20
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `humansys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `accion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `tipo_accion_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `users_aprueba_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `empleado_encargado_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `entrada` timestamp NULL DEFAULT NULL,
  `salida` timestamp NULL DEFAULT NULL,
  `entrada_tarde` timestamp NULL DEFAULT NULL,
  `salida_tarde` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `tipo_empleado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `tipo_contrato` varchar(45) DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_fin` varchar(45) DEFAULT NULL,
  `memorandum` varchar(45) DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `horarios_id` int(11) NOT NULL,
  `users_aprueba_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones_otros`
--

CREATE TABLE `deducciones_otros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `tipo_deducciones_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `empleado_encargado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_pais`
--

CREATE TABLE `departamento_pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento_pais`
--

INSERT INTO `departamento_pais` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ATLÁNTIDA', '2021-01-11 04:56:47', NULL),
(2, 'COLÓN', '2021-01-11 04:56:55', NULL),
(3, 'COMAYAGUA', '2021-01-11 03:57:53', NULL),
(4, 'COPÁN', '2021-01-11 04:57:06', NULL),
(5, 'CORTÉS', '2021-01-11 04:57:16', NULL),
(6, 'CHOLUTECA', '2021-01-11 03:57:53', NULL),
(7, 'EL PARAÍSO', '2021-01-11 04:57:34', NULL),
(8, 'FRANCISCO MORAZÁN', '2021-01-11 04:57:47', NULL),
(9, 'GRACIAS A DIOS', '2021-01-11 03:57:53', NULL),
(10, 'INTIBUCÁ', '2021-01-11 04:58:01', NULL),
(11, 'ISLAS DE LA BAHÍA', '2021-01-11 04:58:17', NULL),
(12, 'LA PAZ', '2021-01-11 03:57:53', NULL),
(13, 'LEMPIRA', '2021-01-11 03:57:53', NULL),
(14, 'OCOTEPEQUE', '2021-01-11 03:57:53', NULL),
(15, 'OLANCHO', '2021-01-11 03:57:53', NULL),
(16, 'SANTA BÁRBARA', '2021-01-11 04:58:41', NULL),
(17, 'VALLE', '2021-01-11 03:57:53', NULL),
(18, 'YORO', '2021-01-11 03:57:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `numero_casa` varchar(45) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `lng` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `identidad` varchar(13) DEFAULT NULL,
  `nombre` varchar(145) DEFAULT NULL,
  `primer_nombre` varchar(45) DEFAULT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) DEFAULT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `url_foto` varchar(250) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `email_institucional` varchar(45) DEFAULT NULL,
  `estado_civil` varchar(45) DEFAULT NULL,
  `lugar_nacimiento` varchar(45) DEFAULT NULL,
  `descripcion_laboral` varchar(250) DEFAULT NULL,
  `telefono_1` varchar(45) DEFAULT NULL,
  `telefono_2` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  `grado_academico_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_academico`
--

CREATE TABLE `grado_academico` (
  `id` int(11) NOT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `tipo_horario` varchar(45) DEFAULT NULL,
  `entrada` timestamp NULL DEFAULT NULL,
  `salida` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ihss`
--

CREATE TABLE `ihss` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isr`
--

CREATE TABLE `isr` (
  `id` int(11) NOT NULL,
  `porcentaje` double DEFAULT NULL,
  `rango_inicio` double DEFAULT NULL,
  `rango_final` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departamento_pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `created_at`, `updated_at`, `departamento_pais_id`) VALUES
(1, 'La Ceiba', '2021-01-11 04:08:15', NULL, 1),
(2, 'Tela', '2021-01-11 04:08:15', NULL, 1),
(3, 'Jutiapa', '2021-01-11 04:08:15', NULL, 1),
(4, 'La Masica', '2021-01-11 04:08:16', NULL, 1),
(5, 'San Francisco', '2021-01-11 04:08:16', NULL, 1),
(6, 'Arizona', '2021-01-11 04:08:16', NULL, 1),
(7, 'Esparta', '2021-01-11 04:08:16', NULL, 1),
(8, 'El Porvenir', '2021-01-11 04:08:16', NULL, 1),
(9, 'TRUJILLO', '2021-01-11 04:12:40', NULL, 2),
(10, 'BALFATE', '2021-01-11 04:12:40', NULL, 2),
(11, 'IRIONA', '2021-01-11 04:12:40', NULL, 2),
(12, 'LIMÓN', '2021-01-11 04:31:02', NULL, 2),
(13, 'SABÁ', '2021-01-11 04:31:36', NULL, 2),
(14, 'SANTA FE', '2021-01-11 04:12:40', NULL, 2),
(15, 'SANTA ROSA DE AGUÁN', '2021-01-11 04:12:40', NULL, 2),
(16, 'SONAGUERA', '2021-01-11 04:12:40', NULL, 2),
(17, 'TOCOA', '2021-01-11 04:12:41', NULL, 2),
(18, 'BONITO ORIENTAL', '2021-01-11 04:12:41', NULL, 2),
(19, 'COMAYAGUA', '2021-01-11 04:21:27', NULL, 3),
(20, 'AJUTERIQUE', '2021-01-11 04:21:27', NULL, 3),
(21, 'EL ROSARIO', '2021-01-11 04:21:27', NULL, 3),
(22, 'ESQUÍAS', '2021-01-11 04:21:27', NULL, 3),
(23, 'HUMUYA', '2021-01-11 04:21:27', NULL, 3),
(24, 'LA LIBERTAD', '2021-01-11 04:21:27', NULL, 3),
(25, 'LAMANÍ', '2021-01-11 04:21:27', NULL, 3),
(26, 'LA TRINIDAD', '2021-01-11 04:21:27', NULL, 3),
(27, 'LEJAMANI', '2021-01-11 04:21:27', NULL, 3),
(28, 'MEAMBAR', '2021-01-11 04:21:27', NULL, 3),
(29, 'MINAS DE ORO', '2021-01-11 04:21:27', NULL, 3),
(30, 'OJOS DE AGUA', '2021-01-11 04:21:27', NULL, 3),
(31, 'SAN JERÓNIMO (HONDURAS)', '2021-01-11 04:21:27', NULL, 3),
(32, 'SAN JOSÉ DE COMAYAGUA', '2021-01-11 04:21:27', NULL, 3),
(33, 'SAN JOSÉ DEL POTRERO', '2021-01-11 04:21:27', NULL, 3),
(34, 'SAN LUIS', '2021-01-11 04:21:27', NULL, 3),
(35, 'SAN SEBASTIÁN', '2021-01-11 04:21:27', NULL, 3),
(36, 'SIGUATEPEQUE', '2021-01-11 04:21:27', NULL, 3),
(37, 'VILLA DE SAN ANTONIO', '2021-01-11 04:21:27', NULL, 3),
(38, 'LAS LAJAS', '2021-01-11 04:21:27', NULL, 3),
(39, 'TAULABÉ', '2021-01-11 04:21:27', NULL, 3),
(40, 'SANTA ROSA DE COPÁN', '2021-01-11 04:24:20', NULL, 4),
(41, 'CABAÑAS', '2021-01-11 04:24:20', NULL, 4),
(42, 'CONCEPCIÓN', '2021-01-11 04:24:20', NULL, 4),
(43, 'COPÁN RUINAS', '2021-01-11 04:24:20', NULL, 4),
(44, 'CORQUÍN', '2021-01-11 04:24:20', NULL, 4),
(45, 'CUCUYAGUA', '2021-01-11 04:24:20', NULL, 4),
(46, 'DOLORES', '2021-01-11 04:24:21', NULL, 4),
(47, 'DULCE NOMBRE', '2021-01-11 04:24:21', NULL, 4),
(48, 'EL PARAÍSO', '2021-01-11 04:24:21', NULL, 4),
(49, 'FLORIDA', '2021-01-11 04:24:21', NULL, 4),
(50, 'LA JIGUA', '2021-01-11 04:24:21', NULL, 4),
(51, 'LA UNIÓN', '2021-01-11 04:24:21', NULL, 4),
(52, 'NUEVA ARCADIA', '2021-01-11 04:24:21', NULL, 4),
(53, 'SAN AGUSTÍN', '2021-01-11 04:24:21', NULL, 4),
(54, 'SAN ANTONIO', '2021-01-11 04:24:21', NULL, 4),
(55, 'SAN JERÓNIMO', '2021-01-11 04:24:21', NULL, 4),
(56, 'SAN JOSÉ', '2021-01-11 04:24:21', NULL, 4),
(57, 'SAN JUAN DE OPOA', '2021-01-11 04:24:21', NULL, 4),
(58, 'SAN NICOLÁS', '2021-01-11 04:24:21', NULL, 4),
(59, 'SAN PEDRO', '2021-01-11 04:24:21', NULL, 4),
(60, 'SANTA RITA', '2021-01-11 04:24:21', NULL, 4),
(61, 'TRINIDAD DE COPÁN', '2021-01-11 04:24:21', NULL, 4),
(62, 'VERACRUZ', '2021-01-11 04:24:21', NULL, 4),
(63, 'SAN PEDRO SULA', '2021-01-11 04:26:38', NULL, 5),
(64, 'CHOLOMA', '2021-01-11 04:26:38', NULL, 5),
(65, 'OMOA', '2021-01-11 04:26:38', NULL, 5),
(66, 'PIMIENTA', '2021-01-11 04:26:38', NULL, 5),
(67, 'POTRERILLOS', '2021-01-11 04:26:38', NULL, 5),
(68, 'PUERTO CORTÉS', '2021-01-11 04:26:38', NULL, 5),
(69, 'SAN ANTONIO DE CORTÉS', '2021-01-11 04:26:38', NULL, 5),
(70, 'SAN FRANCISCO DE YOJOA', '2021-01-11 04:26:38', NULL, 5),
(71, 'SAN MANUEL', '2021-01-11 04:26:38', NULL, 5),
(72, 'SANTA CRUZ DE YOJOA', '2021-01-11 04:26:38', NULL, 5),
(73, 'VILLANUEVA', '2021-01-11 04:26:38', NULL, 5),
(74, 'LA LIMA', '2021-01-11 04:26:38', NULL, 5),
(75, 'CHOLUTECA', '2021-01-11 04:29:31', NULL, 6),
(76, 'APACILAGUA', '2021-01-11 04:29:31', NULL, 6),
(77, 'CONCEPCIÓN DE MARÍA', '2021-01-11 04:29:31', NULL, 6),
(78, 'DUYURE', '2021-01-11 04:29:31', NULL, 6),
(79, 'EL CORPUS', '2021-01-11 04:29:31', NULL, 6),
(80, 'EL TRIUNFO', '2021-01-11 04:29:31', NULL, 6),
(81, 'MARCOVIA', '2021-01-11 04:29:32', NULL, 6),
(82, 'MOROLICA', '2021-01-11 04:29:32', NULL, 6),
(83, 'NAMASIGUE', '2021-01-11 04:29:32', NULL, 6),
(84, 'OROCUINA', '2021-01-11 04:29:32', NULL, 6),
(85, 'PESPIRE', '2021-01-11 04:29:32', NULL, 6),
(86, 'SAN ANTONIO DE FLORES', '2021-01-11 04:29:32', NULL, 6),
(87, 'SAN ISIDRO', '2021-01-11 04:29:32', NULL, 6),
(88, 'SAN JOSÉ', '2021-01-11 04:29:32', NULL, 6),
(89, 'SAN MARCOS DE COLÓN', '2021-01-11 04:29:32', NULL, 6),
(90, 'SANTA ANA DE YUSGUARE', '2021-01-11 04:29:32', NULL, 6),
(91, 'YUSCARÁN', '2021-01-11 04:35:04', NULL, 7),
(92, 'ALAUCA', '2021-01-11 04:35:04', NULL, 7),
(93, 'DANLÍ', '2021-01-11 04:35:04', NULL, 7),
(94, 'EL PARAÍSO', '2021-01-11 04:35:04', NULL, 7),
(95, 'GÜINOPE', '2021-01-11 04:35:04', NULL, 7),
(96, 'JACALEAPA', '2021-01-11 04:35:04', NULL, 7),
(97, 'LIURE', '2021-01-11 04:35:04', NULL, 7),
(98, 'MOROCELÍ', '2021-01-11 04:35:04', NULL, 7),
(99, 'OROPOLÍ', '2021-01-11 04:35:04', NULL, 7),
(100, 'POTRERILLOS', '2021-01-11 04:35:04', NULL, 7),
(101, 'SAN ANTONIO DE FLORES', '2021-01-11 04:35:04', NULL, 7),
(102, 'SAN LUCAS', '2021-01-11 04:35:04', NULL, 7),
(103, 'SAN MATÍAS', '2021-01-11 04:35:05', NULL, 7),
(104, 'SOLEDAD', '2021-01-11 04:35:05', NULL, 7),
(105, 'TEUPASENTI', '2021-01-11 04:35:05', NULL, 7),
(106, 'TEXIGUAT', '2021-01-11 04:35:05', NULL, 7),
(107, 'VADO ANCHO', '2021-01-11 04:35:05', NULL, 7),
(108, 'YAUYUPE', '2021-01-11 04:35:05', NULL, 7),
(109, 'TROJES', '2021-01-11 04:35:05', NULL, 7),
(110, 'DISTRITO CENTRAL', '2021-01-11 04:37:39', NULL, 8),
(111, 'ALUBARÉN', '2021-01-11 04:37:39', NULL, 8),
(112, 'CEDROS', '2021-01-11 04:37:39', NULL, 8),
(113, 'CURARÉN', '2021-01-11 04:37:39', NULL, 8),
(114, 'EL PORVENIR', '2021-01-11 04:37:39', NULL, 8),
(115, 'GUAIMACA', '2021-01-11 04:37:39', NULL, 8),
(116, 'LA LIBERTAD', '2021-01-11 04:37:39', NULL, 8),
(117, 'LA VENTA', '2021-01-11 04:37:39', NULL, 8),
(118, 'LEPATERIQUE', '2021-01-11 04:37:39', NULL, 8),
(119, 'MARAITA', '2021-01-11 04:37:39', NULL, 8),
(120, 'MARALE', '2021-01-11 04:37:39', NULL, 8),
(121, 'NUEVA ARMENIA', '2021-01-11 04:37:39', NULL, 8),
(122, 'OJOJONA', '2021-01-11 04:37:39', NULL, 8),
(123, 'ORICA', '2021-01-11 04:37:39', NULL, 8),
(124, 'REITOCA', '2021-01-11 04:37:39', NULL, 8),
(125, 'SABANAGRANDE', '2021-01-11 04:37:39', NULL, 8),
(126, 'SAN ANTONIO DE ORIENTE', '2021-01-11 04:37:39', NULL, 8),
(127, 'SAN BUENAVENTURA', '2021-01-11 04:37:39', NULL, 8),
(128, 'SAN IGNACIO', '2021-01-11 04:37:39', NULL, 8),
(129, 'SAN JUAN DE FLORES', '2021-01-11 04:37:39', NULL, 8),
(130, 'SAN MIGUELITO', '2021-01-11 04:37:39', NULL, 8),
(131, 'SANTA ANA', '2021-01-11 04:37:39', NULL, 8),
(132, 'SANTA LUCÍA', '2021-01-11 04:37:39', NULL, 8),
(133, 'TALANGA', '2021-01-11 04:37:39', NULL, 8),
(134, 'TATUMBLA', '2021-01-11 04:37:39', NULL, 8),
(135, 'VALLE DE ÁNGELES', '2021-01-11 04:37:39', NULL, 8),
(136, 'VILLA DE SAN FRANCISCO', '2021-01-11 04:37:39', NULL, 8),
(137, 'VALLECILLO', '2021-01-11 04:37:39', NULL, 8),
(138, 'PUERTO LEMPIRA', '2021-01-11 04:40:22', NULL, 9),
(139, 'BRUS LAGUNA', '2021-01-11 04:40:22', NULL, 9),
(140, 'AHUAS', '2021-01-11 04:40:22', NULL, 9),
(141, 'JUAN FRANCISCO BULNES', '2021-01-11 04:40:22', NULL, 9),
(142, 'RAMÓN VILLEDA MORALES', '2021-01-11 04:40:22', NULL, 9),
(143, 'WAMPUSIRPE', '2021-01-11 04:40:22', NULL, 9),
(144, 'LA ESPERANZA', '2021-01-11 04:42:37', NULL, 10),
(145, 'CAMASCA', '2021-01-11 04:42:37', NULL, 10),
(146, 'COLOMONCAGUA', '2021-01-11 04:42:37', NULL, 10),
(147, 'CONCEPCIÓN', '2021-01-11 04:42:37', NULL, 10),
(148, 'DOLORES', '2021-01-11 04:42:37', NULL, 10),
(149, 'INTIBUCÁ', '2021-01-11 04:42:37', NULL, 10),
(150, 'JESÚS DE OTORO', '2021-01-11 04:42:37', NULL, 10),
(151, 'MAGDALENA', '2021-01-11 04:42:37', NULL, 10),
(152, 'MASAGUARA', '2021-01-11 04:42:37', NULL, 10),
(153, 'SAN ANTONIO', '2021-01-11 04:42:37', NULL, 10),
(154, 'SAN ISIDRO', '2021-01-11 04:42:37', NULL, 10),
(155, 'SAN JUAN', '2021-01-11 04:42:37', NULL, 10),
(156, 'SAN MARCOS DE LA SIERRA', '2021-01-11 04:42:37', NULL, 10),
(157, 'SAN MIGUEL GUANCAPLA', '2021-01-11 04:42:37', NULL, 10),
(158, 'SANTA LUCÍA', '2021-01-11 04:42:37', NULL, 10),
(159, 'YAMARANGUILA', '2021-01-11 04:42:38', NULL, 10),
(160, 'SAN FRANCISCO DE OPALACA', '2021-01-11 04:42:38', NULL, 10),
(161, 'ROATÁN', '2021-01-11 04:43:50', NULL, 11),
(162, 'GUANAJA', '2021-01-11 04:43:50', NULL, 11),
(163, 'JOSÉ SANTOS GUARDIOLA', '2021-01-11 04:43:50', NULL, 11),
(164, 'UTILA', '2021-01-11 04:43:50', NULL, 11),
(165, 'LA PAZ', '2021-01-11 04:45:32', NULL, 12),
(166, 'AGUANQUETERIQUE', '2021-01-11 04:45:32', NULL, 12),
(167, 'CABAÑAS', '2021-01-11 04:45:32', NULL, 12),
(168, 'CANE', '2021-01-11 04:45:32', NULL, 12),
(169, 'CHINACLA', '2021-01-11 04:45:32', NULL, 12),
(170, 'GUAJIQUIRO', '2021-01-11 04:45:32', NULL, 12),
(171, 'LAUTERIQUE', '2021-01-11 04:45:32', NULL, 12),
(172, 'MARCALA', '2021-01-11 04:45:32', NULL, 12),
(173, 'MERCEDES DE ORIENTE', '2021-01-11 04:45:32', NULL, 12),
(174, 'OPATORO', '2021-01-11 04:45:32', NULL, 12),
(175, 'SAN ANTONIO DEL NORTE', '2021-01-11 04:45:32', NULL, 12),
(176, 'SAN JOSÉ', '2021-01-11 04:45:32', NULL, 12),
(177, 'SAN JUAN', '2021-01-11 04:45:32', NULL, 12),
(178, 'SAN PEDRO DE TUTULE', '2021-01-11 04:45:32', NULL, 12),
(179, 'SANTA ANA', '2021-01-11 04:45:33', NULL, 12),
(180, 'SANTA ELENA', '2021-01-11 04:45:33', NULL, 12),
(181, 'SANTA MARÍA', '2021-01-11 04:45:33', NULL, 12),
(182, 'SANTIAGO DE PURINGLA', '2021-01-11 04:45:33', NULL, 12),
(183, 'YARULA', '2021-01-11 04:45:33', NULL, 12),
(184, 'GRACIAS', '2021-01-11 04:47:09', NULL, 13),
(185, 'BELÉN', '2021-01-11 04:47:09', NULL, 13),
(186, 'CANDELARIA', '2021-01-11 04:47:09', NULL, 13),
(187, 'COLOLACA', '2021-01-11 04:47:09', NULL, 13),
(188, 'ERANDIQUE', '2021-01-11 04:47:10', NULL, 13),
(189, 'GUALCINCE', '2021-01-11 04:47:10', NULL, 13),
(190, 'GUARITA', '2021-01-11 04:47:10', NULL, 13),
(191, 'LA CAMPA', '2021-01-11 04:47:10', NULL, 13),
(192, 'LA IGUALA', '2021-01-11 04:47:10', NULL, 13),
(193, 'LAS FLORES', '2021-01-11 04:47:10', NULL, 13),
(194, 'LA UNIÓN', '2021-01-11 04:47:10', NULL, 13),
(195, 'LA VIRTUD', '2021-01-11 04:47:10', NULL, 13),
(196, 'LEPAERA', '2021-01-11 04:47:10', NULL, 13),
(197, 'MAPULACA', '2021-01-11 04:47:10', NULL, 13),
(198, 'PIRAERA', '2021-01-11 04:47:10', NULL, 13),
(199, 'SAN ANDRÉS', '2021-01-11 04:47:10', NULL, 13),
(200, 'SAN FRANCISCO', '2021-01-11 04:47:10', NULL, 13),
(201, 'SAN JUAN GUARITA', '2021-01-11 04:47:10', NULL, 13),
(202, 'SAN MANUEL COLOHETE', '2021-01-11 04:47:10', NULL, 13),
(203, 'SAN RAFAEL', '2021-01-11 04:47:10', NULL, 13),
(204, 'SAN SEBASTIÁN', '2021-01-11 04:47:10', NULL, 13),
(205, 'SANTA CRUZ', '2021-01-11 04:47:10', NULL, 13),
(206, 'TALGUA', '2021-01-11 04:47:10', NULL, 13),
(207, 'TAMBLA', '2021-01-11 04:47:10', NULL, 13),
(208, 'TOMALÁ', '2021-01-11 04:47:10', NULL, 13),
(209, 'VALLADOLID', '2021-01-11 04:47:10', NULL, 13),
(210, 'VIRGINIA', '2021-01-11 04:47:10', NULL, 13),
(211, 'SAN MARCOS DE CAIQUÍN', '2021-01-11 04:47:10', NULL, 13),
(212, 'OCOTEPEQUE', '2021-01-11 04:48:46', NULL, 14),
(213, 'BELÉN GUALCHO', '2021-01-11 04:48:46', NULL, 14),
(214, 'CONCEPCIÓN', '2021-01-11 04:48:46', NULL, 14),
(215, 'DOLORES MERENDÓN', '2021-01-11 04:48:46', NULL, 14),
(216, 'FRATERNIDAD', '2021-01-11 04:48:46', NULL, 14),
(217, 'LA ENCARNACIÓN', '2021-01-11 04:48:46', NULL, 14),
(218, 'LA LABOR', '2021-01-11 04:48:46', NULL, 14),
(219, 'LUCERNA', '2021-01-11 04:48:46', NULL, 14),
(220, 'MERCEDES', '2021-01-11 04:48:46', NULL, 14),
(221, 'SAN FERNANDO', '2021-01-11 04:48:46', NULL, 14),
(222, 'SAN FRANCISCO DEL VALLE', '2021-01-11 04:48:46', NULL, 14),
(223, 'SAN JORGE', '2021-01-11 04:48:46', NULL, 14),
(224, 'SAN MARCOS', '2021-01-11 04:48:46', NULL, 14),
(225, 'SANTA FE', '2021-01-11 04:48:46', NULL, 14),
(226, 'SENSENTI', '2021-01-11 04:48:46', NULL, 14),
(227, 'SINUAPA', '2021-01-11 04:48:46', NULL, 14),
(228, 'JUTICALPA', '2021-01-11 04:50:30', NULL, 15),
(229, 'CAMPAMENTO', '2021-01-11 04:50:30', NULL, 15),
(230, 'CATACAMAS', '2021-01-11 04:50:30', NULL, 15),
(231, 'CONCORDIA', '2021-01-11 04:50:30', NULL, 15),
(232, 'DULCE NOMBRE DE CULMÍ', '2021-01-11 04:50:30', NULL, 15),
(233, 'EL ROSARIO', '2021-01-11 04:50:30', NULL, 15),
(234, 'ESQUIPULAS DEL NORTE', '2021-01-11 04:50:30', NULL, 15),
(235, 'GUALACO', '2021-01-11 04:50:30', NULL, 15),
(236, 'GUARIZAMA', '2021-01-11 04:50:30', NULL, 15),
(237, 'GUATA', '2021-01-11 04:50:30', NULL, 15),
(238, 'GUAYAPE', '2021-01-11 04:50:30', NULL, 15),
(239, 'JANO', '2021-01-11 04:50:30', NULL, 15),
(240, 'LA UNIÓN', '2021-01-11 04:50:30', NULL, 15),
(241, 'MANGULILE', '2021-01-11 04:50:30', NULL, 15),
(242, 'MANTO', '2021-01-11 04:50:30', NULL, 15),
(243, 'SALAMÁ', '2021-01-11 04:50:30', NULL, 15),
(244, 'SAN ESTEBAN', '2021-01-11 04:50:30', NULL, 15),
(245, 'SAN FRANCISCO DE BECERRA', '2021-01-11 04:50:30', NULL, 15),
(246, 'SAN FRANCISCO DE LA PAZ', '2021-01-11 04:50:31', NULL, 15),
(247, 'SANTA MARÍA DEL REAL', '2021-01-11 04:50:31', NULL, 15),
(248, 'SILCA', '2021-01-11 04:50:31', NULL, 15),
(249, 'YOCÓN', '2021-01-11 04:50:31', NULL, 15),
(250, 'PATUCA', '2021-01-11 04:50:31', NULL, 15),
(251, 'SANTA BÁRBARA', '2021-01-11 04:53:10', NULL, 16),
(252, 'ARADA', '2021-01-11 04:53:10', NULL, 16),
(253, 'ATIMA', '2021-01-11 04:53:10', NULL, 16),
(254, 'AZACUALPA', '2021-01-11 04:53:10', NULL, 16),
(255, 'CEGUACA', '2021-01-11 04:53:10', NULL, 16),
(256, 'CONCEPCIÓN DEL NORTE', '2021-01-11 04:53:10', NULL, 16),
(257, 'CONCEPCIÓN DEL SUR', '2021-01-11 04:53:10', NULL, 16),
(258, 'CHINDA', '2021-01-11 04:53:10', NULL, 16),
(259, 'EL NÍSPERO', '2021-01-11 04:53:10', NULL, 16),
(260, 'GUALALA', '2021-01-11 04:53:10', NULL, 16),
(261, 'ILAMA', '2021-01-11 04:53:10', NULL, 16),
(262, 'LAS VEGAS', '2021-01-11 04:53:10', NULL, 16),
(263, 'MACUELIZO', '2021-01-11 04:53:10', NULL, 16),
(264, 'NARANJITO', '2021-01-11 04:53:10', NULL, 16),
(265, 'NUEVO CELILAC', '2021-01-11 04:53:11', NULL, 16),
(266, 'NUEVA FRONTERA', '2021-01-11 04:53:11', NULL, 16),
(267, 'PETOA', '2021-01-11 04:53:11', NULL, 16),
(268, 'PROTECCIÓN', '2021-01-11 04:53:11', NULL, 16),
(269, 'QUIMISTÁN', '2021-01-11 04:53:11', NULL, 16),
(270, 'SAN FRANCISCO DE OJUERA', '2021-01-11 04:53:11', NULL, 16),
(271, 'SAN JOSÉ DE LAS COLINAS', '2021-01-11 04:53:11', NULL, 16),
(272, 'SAN LUIS', '2021-01-11 04:53:11', NULL, 16),
(273, 'SAN MARCOS', '2021-01-11 04:53:11', NULL, 16),
(274, 'SAN NICOLÁS', '2021-01-11 04:53:11', NULL, 16),
(275, 'SAN PEDRO ZACAPA', '2021-01-11 04:53:11', NULL, 16),
(276, 'SAN VICENTE CENTENARIO', '2021-01-11 04:53:11', NULL, 16),
(277, 'SANTA RITA', '2021-01-11 04:53:11', NULL, 16),
(278, 'TRINIDAD', '2021-01-11 04:53:11', NULL, 16),
(279, 'NACAOME', '2021-01-11 04:54:24', NULL, 17),
(280, 'ALIANZA', '2021-01-11 04:54:24', NULL, 17),
(281, 'AMAPALA', '2021-01-11 04:54:24', NULL, 17),
(282, 'ARAMECINA', '2021-01-11 04:54:24', NULL, 17),
(283, 'CARIDAD', '2021-01-11 04:54:24', NULL, 17),
(284, 'GOASCORÁN', '2021-01-11 04:54:24', NULL, 17),
(285, 'LANGUE', '2021-01-11 04:54:24', NULL, 17),
(286, 'SAN FRANCISCO DE CORAY', '2021-01-11 04:54:24', NULL, 17),
(287, 'SAN LORENZO', '2021-01-11 04:54:24', NULL, 17),
(288, 'YORO', '2021-01-11 04:55:56', NULL, 18),
(289, 'ARENAL', '2021-01-11 04:55:56', NULL, 18),
(290, 'EL NEGRITO', '2021-01-11 04:55:56', NULL, 18),
(291, 'EL PROGRESO', '2021-01-11 04:55:56', NULL, 18),
(292, 'JOCÓN', '2021-01-11 04:55:56', NULL, 18),
(293, 'MORAZÁN', '2021-01-11 04:55:56', NULL, 18),
(294, 'OLANCHITO', '2021-01-11 04:55:56', NULL, 18),
(295, 'SANTA RITA', '2021-01-11 04:55:56', NULL, 18),
(296, 'SULACO', '2021-01-11 04:55:56', NULL, 18),
(297, 'VICTORIA', '2021-01-11 04:55:56', NULL, 18),
(298, 'YORITO', '2021-01-11 04:55:56', NULL, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('selvinmorazan@gmail.com', '$2y$10$xAqD.MxzJbJdF6OwjzG8D.R5cHZFYVyVlnK1/BpdeBz3KF/9BpOBG', '2021-03-18 03:04:08'),
('yefryyo@gmail.com', '$2y$10$f20gT6V5wcr8p9Wku7Hh7eh3DLgjtd2GAPmjiPSvNX0/R2qTcq1y6', '2021-03-18 14:48:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_permiso` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `hora_entrada` timestamp NULL DEFAULT NULL,
  `hora_salida` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `users_aprueba_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla`
--

CREATE TABLE `planilla` (
  `id` int(11) NOT NULL,
  `identidad` varchar(45) DEFAULT NULL,
  `numero_memo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `sueldo_mensual` double DEFAULT NULL,
  `catorcena` double DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `isr` double DEFAULT NULL,
  `ihss` double DEFAULT NULL,
  `elga` double DEFAULT NULL,
  `cargo_id` int(11) NOT NULL,
  `optica_innova` double DEFAULT NULL,
  `total_deducciones` double DEFAULT NULL,
  `seguro_hmc` double DEFAULT NULL,
  `total_pagar` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rap`
--

CREATE TABLE `rap` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia`
--

CREATE TABLE `referencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `identidad` varchar(13) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `parentezco` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DWTOja2bICCvGw4h0YIDbeq4c1V1bPtYwoBZLplJ', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiN1hvcWlidXNpd2Zrc0I4MHF5Z2xaQ3plQ3VvNVhFSHFFT3UyZTk1TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsZWFkbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdXN6Wnp5NnAyRHJWUWhsVlZaTDRyZVZwUGFxMENjSGlZbHNGZVF2U09ZMVhBTHVaOVI4anUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHVzelp6eTZwMkRyVlFobFZWWkw0cmVWcFBhcTBDY0hpWWxzRmVRdlNPWTFYQUx1WjlSOGp1Ijt9', 1616186886);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 5, 'Yefry\'s Team', 1, '2021-03-18 02:22:22', '2021-03-18 02:22:22'),
(2, 6, 'ARIEL\'s Team', 1, '2021-03-18 02:34:52', '2021-03-18 02:34:52'),
(3, 7, 'Yeff\'s Team', 1, '2021-03-17 22:21:46', '2021-03-17 22:21:46'),
(4, 8, 'Yefry\'s Team', 1, '2021-03-17 22:30:21', '2021-03-17 22:30:21'),
(5, 9, 'Yefry\'s Team', 1, '2021-03-17 22:31:58', '2021-03-17 22:31:58'),
(6, 10, 'Yefry\'s Team', 1, '2021-03-17 22:39:20', '2021-03-17 22:39:20'),
(7, 11, 'Yefry\'s Team', 1, '2021-03-18 14:24:41', '2021-03-18 14:24:41'),
(8, 12, 'Yefry\'s Team', 1, '2021-03-18 14:50:10', '2021-03-18 14:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_accion`
--

CREATE TABLE `tipo_accion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_deducciones`
--

CREATE TABLE `tipo_deducciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tipo_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `id_tipo_user`) VALUES
(6, 'ARIEL MORAZAN', 'selvinmorazan@gmail.com', NULL, '$2y$10$L4TWuUIDTb5Wx3nTK.FtVe9yWFRNLVKuO7G5Gox0NdWsLEru82utS', NULL, NULL, NULL, NULL, NULL, '2021-03-18 02:34:52', '2021-03-18 02:34:52', NULL),
(11, 'Yefry Ortiz', 'yefryyo@gmail.com', '2021-03-18 14:36:41', '$2y$10$uszZzy6p2DrVQhlVVZL4reVpPaq0CcHiYlsFeQvSOY1XALuZ9R8ju', NULL, NULL, 'YJ1ShatJi963XcplbjJMeDmDatgmP4jmHXiH3nv7QLTvIGN3Tne4ny0thCqe', NULL, NULL, '2021-03-18 14:24:41', '2021-03-18 14:37:45', NULL),
(12, 'Yefry Ortiz', 'yefry21.yo@gmail.com', '2021-03-18 16:28:02', '$2y$10$HTv3xzDpa9KiFXKchLk20ujDqI2AK6zdotnPnJZmYfKgKbkJRk1qK', NULL, NULL, NULL, NULL, NULL, '2021-03-18 14:50:10', '2021-03-18 16:28:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `contrato_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones_tomadas`
--

CREATE TABLE `vacaciones_tomadas` (
  `id` int(11) NOT NULL,
  `dias` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `horarios_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Accion_Tipo_accion1_idx` (`tipo_accion_id`),
  ADD KEY `fk_Accion_Empleado1_idx` (`empleado_id`),
  ADD KEY `fk_Accion_users1_idx` (`users_aprueba_id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Area_Empleado1_idx` (`empleado_encargado_id`),
  ADD KEY `fk_Area_Departamento1_idx` (`departamento_id`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Asistencia_Empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cargo_Area1_idx` (`area_id`),
  ADD KEY `fk_Cargo_Tipo_empleado1_idx` (`tipo_empleado_id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Contrato_Empleado1_idx` (`empleado_id`),
  ADD KEY `fk_Contrato_Horarios1_idx` (`horarios_id`),
  ADD KEY `fk_Contrato_users1_idx` (`users_aprueba_id`);

--
-- Indices de la tabla `deducciones_otros`
--
ALTER TABLE `deducciones_otros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Deducciones_otros_Tipo_deducciones1_idx` (`tipo_deducciones_id`),
  ADD KEY `fk_Deducciones_otros_Empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Departamento_Empleado1_idx` (`empleado_encargado_id`);

--
-- Indices de la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Direccion_Empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Documentos_Empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identidad_UNIQUE` (`identidad`),
  ADD KEY `fk_Empleado_Grado_academico1_idx` (`grado_academico_id`),
  ADD KEY `fk_Empleado_Estatus1_idx` (`estatus_id`),
  ADD KEY `fk_empleado_municipio1_idx` (`municipio_id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ihss`
--
ALTER TABLE `ihss`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `isr`
--
ALTER TABLE `isr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio_departamento_pais1_idx` (`departamento_pais_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Permisos_Empleado1_idx` (`empleado_id`),
  ADD KEY `fk_Permisos_users1_idx` (`users_aprueba_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identidad_UNIQUE` (`identidad`),
  ADD KEY `fk_Planilla_Empleado1_idx` (`empleado_id`),
  ADD KEY `fk_Planilla_Cargo1_idx` (`cargo_id`);

--
-- Indices de la tabla `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Referencia_Empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_accion`
--
ALTER TABLE `tipo_accion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_deducciones`
--
ALTER TABLE `tipo_deducciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_Tipo_user_idx` (`id_tipo_user`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Vacaciones_Contrato1_idx` (`contrato_id`);

--
-- Indices de la tabla `vacaciones_tomadas`
--
ALTER TABLE `vacaciones_tomadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Vacaciones_tomadas_Horarios1_idx` (`horarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion`
--
ALTER TABLE `accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deducciones_otros`
--
ALTER TABLE `deducciones_otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ihss`
--
ALTER TABLE `ihss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `isr`
--
ALTER TABLE `isr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rap`
--
ALTER TABLE `rap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_accion`
--
ALTER TABLE `tipo_accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_deducciones`
--
ALTER TABLE `tipo_deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacaciones_tomadas`
--
ALTER TABLE `vacaciones_tomadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accion`
--
ALTER TABLE `accion`
  ADD CONSTRAINT `fk_Accion_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Accion_Tipo_accion1` FOREIGN KEY (`tipo_accion_id`) REFERENCES `tipo_accion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Accion_users1` FOREIGN KEY (`users_aprueba_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_Area_Departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Area_Empleado1` FOREIGN KEY (`empleado_encargado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_Asistencia_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_Cargo_Area1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cargo_Tipo_empleado1` FOREIGN KEY (`tipo_empleado_id`) REFERENCES `tipo_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_Contrato_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contrato_Horarios1` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contrato_users1` FOREIGN KEY (`users_aprueba_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deducciones_otros`
--
ALTER TABLE `deducciones_otros`
  ADD CONSTRAINT `fk_Deducciones_otros_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Deducciones_otros_Tipo_deducciones1` FOREIGN KEY (`tipo_deducciones_id`) REFERENCES `tipo_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_Empleado1` FOREIGN KEY (`empleado_encargado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_Direccion_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_Documentos_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Grado_academico1` FOREIGN KEY (`grado_academico_id`) REFERENCES `grado_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento_pais1` FOREIGN KEY (`departamento_pais_id`) REFERENCES `departamento_pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_Permisos_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Permisos_users1` FOREIGN KEY (`users_aprueba_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD CONSTRAINT `fk_Planilla_Cargo1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Planilla_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD CONSTRAINT `fk_Referencia_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_Tipo_user` FOREIGN KEY (`id_tipo_user`) REFERENCES `tipo_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_Vacaciones_Contrato1` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones_tomadas`
--
ALTER TABLE `vacaciones_tomadas`
  ADD CONSTRAINT `fk_Vacaciones_tomadas_Horarios1` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
