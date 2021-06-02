-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 22:53:42
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_accion_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `users_aprueba_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `empleado_encargado_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `codigo`, `empleado_encargado_id`, `departamento_id`, `created_at`, `updated_at`) VALUES
(1, 'SUB DIRECCION', 'SUB', NULL, 1, NULL, NULL),
(2, 'ASISTENCIA', 'DAS', NULL, 1, NULL, NULL),
(4, 'CONTABILIDAD', 'ACO', NULL, 2, NULL, NULL),
(5, 'PLANILLA', 'APL', NULL, 2, NULL, NULL),
(6, 'ADQUISICIONES', 'AAD', NULL, 2, NULL, NULL),
(7, 'SISTEMAS', 'ASI', NULL, 2, NULL, NULL),
(8, 'LEGAL', 'ALE', NULL, 2, NULL, NULL),
(9, 'ASISTENCIA', 'AAS', NULL, 2, NULL, NULL),
(10, 'SERVICIOS GENERALES', 'ASE', NULL, 2, NULL, NULL),
(11, 'GERENCIA', 'OGE', NULL, 3, NULL, NULL),
(12, 'ASISTENCIA', 'OAS', NULL, 3, NULL, NULL),
(13, 'ADMINISTRATIVA', 'OAD', NULL, 3, NULL, NULL),
(14, 'BECA ASISTIR', 'OBA', NULL, 3, NULL, NULL),
(15, 'INFORMATICA', 'OIN', NULL, 3, NULL, NULL),
(16, 'SUPERVICION', 'OSU', NULL, 3, NULL, NULL),
(17, 'DEPARTAMENTALES', 'ODE', NULL, 3, NULL, NULL),
(18, 'ATENCION AL CLIENTE', 'OAT', NULL, 3, NULL, NULL),
(19, 'ARCHIVO', 'OAR', NULL, 3, NULL, NULL),
(20, 'GERENCIA', 'SGE', NULL, 4, NULL, NULL),
(21, 'ASISTENCIA', 'SAS', NULL, 4, NULL, NULL),
(22, 'SUB-GERENCIA DE VOLUNTARIADO', 'SSV', NULL, 4, NULL, NULL),
(23, 'SUB-GERENCIA DE ESTRATEGIA', 'SSE', NULL, 4, NULL, NULL),
(24, 'ATENCION AL CLIENTE', 'SAC', NULL, 4, NULL, NULL),
(25, 'INFORMATICA', 'SIN', NULL, 4, NULL, NULL),
(26, 'GERENCIA', 'CGE', NULL, 5, NULL, NULL),
(27, 'DISEÑO GRAFICO', 'CDG', NULL, 5, NULL, NULL),
(28, 'EVENTOS', 'CEV', NULL, 5, NULL, NULL),
(29, 'PUBLICIDAD', 'CPU', NULL, 5, NULL, NULL),
(30, 'REDES SOCIALES', 'CRS', NULL, 5, NULL, NULL),
(31, 'GERENCIA', 'IGE', NULL, 6, NULL, NULL),
(32, 'SUB GERENCIA', 'ISG', NULL, 6, NULL, NULL),
(33, 'SUPERVISIÓN', 'ISU', NULL, 6, NULL, NULL),
(34, 'REDES SOCIALES', 'IRS', NULL, 6, NULL, NULL),
(35, 'GERENCIA', 'TGE', NULL, 7, NULL, NULL),
(36, 'ASISTENCIA', 'TAS', NULL, 7, NULL, NULL),
(37, 'GERENCIA', 'IMG', NULL, 8, NULL, NULL),
(38, 'MEDICINA GENERAL', 'CMG', NULL, 9, NULL, NULL),
(39, 'ENFERMERIA', 'CEN', NULL, 9, NULL, NULL),
(43, 'GERENCIA', 'GER', NULL, 2, NULL, NULL),
(44, 'PRE-INTERVENCIÓN', 'PI', NULL, 2, NULL, NULL),
(45, 'IT', 'IT', NULL, 2, NULL, NULL),
(46, 'ADMINISTRACIÓN', 'ADMIN', NULL, 2, NULL, NULL),
(47, 'COMUNICACIONES', 'COM', NULL, 5, NULL, NULL),
(48, 'DIGITAL', 'DIG', NULL, 5, NULL, NULL),
(49, 'GERENCIA', 'GER', NULL, 10, NULL, NULL),
(50, 'BECA ASISTIR', 'BAS', NULL, 10, NULL, NULL),
(51, 'BECA INTERNACIONAL', 'BI', NULL, 6, NULL, NULL),
(52, 'OPERACIONES', 'OP', NULL, 3, NULL, NULL),
(53, 'SUB-GERENCIA DE MONITOREO', 'SUBG', NULL, 4, NULL, NULL),
(54, 'ESTRATEGIA', 'EST', NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `entrada_real` timestamp NULL DEFAULT NULL,
  `fecha_dia` date DEFAULT NULL,
  `salida_real` timestamp NULL DEFAULT NULL,
  `entrada_fija` timestamp NULL DEFAULT NULL,
  `salida_fija` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha_dia_salida` date DEFAULT NULL,
  `monto_deduccion` decimal(10,0) DEFAULT 0,
  `minutos_tarde` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `entrada_real`, `fecha_dia`, `salida_real`, `entrada_fija`, `salida_fija`, `empleado_id`, `fecha_dia_salida`, `monto_deduccion`, `minutos_tarde`, `created_at`, `updated_at`) VALUES
(75, '2021-04-26 19:00:52', '2021-04-26', '2021-04-26 23:45:57', '2021-04-26 19:00:52', '2021-04-26 23:00:00', 3020, '2021-04-26', '0', 0, '2021-05-31 21:45:57', '2021-05-31 22:36:09'),
(76, '2021-04-27 14:00:52', '2021-04-27', '2021-04-27 23:45:57', '2021-04-27 14:10:00', NULL, 3020, '2021-04-27', '710', 530, '2021-05-31 21:45:57', '2021-06-01 22:50:01'),
(77, '2021-04-28 14:00:52', '2021-04-28', '2021-04-28 23:45:57', '2021-04-28 14:10:00', '2021-04-28 23:00:00', 3020, '2021-04-28', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(78, '2021-04-29 19:00:52', '2021-04-29', '2021-04-29 23:45:57', '2021-04-29 19:00:52', '2021-04-29 23:00:00', 3020, '2021-04-29', '390', 291, '2021-05-31 21:45:57', '2021-06-01 22:50:01'),
(79, '2021-04-30 14:00:52', '2021-04-30', '2021-04-30 23:45:57', '2021-04-30 14:10:00', '2021-04-30 23:00:00', 3020, '2021-04-30', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(80, '2021-05-03 14:00:52', '2021-05-03', '2021-05-03 23:45:57', '2021-05-03 14:10:00', '2021-05-03 23:00:00', 3020, '2021-05-03', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(81, '2021-05-04 14:00:52', '2021-05-04', '2021-05-04 23:45:57', '2021-05-04 14:10:00', '2021-05-04 23:00:00', 3020, '2021-05-04', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(82, '2021-05-05 14:00:52', '2021-05-05', '2021-05-05 23:45:57', '2021-05-05 14:10:00', '2021-05-05 23:00:00', 3020, '2021-05-05', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(83, '2021-05-06 14:00:52', '2021-05-06', '2021-05-06 23:45:57', '2021-05-06 14:10:00', '2021-05-06 23:00:00', 3020, '2021-05-06', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(84, '2021-05-07 14:00:52', '2021-05-07', '2021-05-07 23:45:57', '2021-05-07 14:10:00', '2021-05-07 23:00:00', 3020, '2021-05-07', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(85, '2021-04-26 14:00:52', '2021-04-26', '2021-04-26 23:45:57', '2021-04-26 14:10:00', '2021-04-26 23:00:00', 3015, '2021-04-26', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(86, '2021-04-27 14:00:52', '2021-04-27', '2021-04-27 23:45:57', '2021-04-27 14:10:00', '2021-04-27 23:00:00', 3015, '2021-04-27', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(87, '2021-04-28 14:00:52', '2021-04-28', '2021-04-28 23:45:57', '2021-04-28 14:10:00', '2021-04-28 23:00:00', 3015, '2021-04-28', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(88, '2021-04-29 14:00:52', '2021-04-29', '2021-04-29 23:45:57', '2021-04-29 14:10:00', '2021-04-29 23:00:00', 3015, '2021-04-29', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(89, '2021-04-30 14:00:52', '2021-04-30', '2021-04-30 23:45:57', '2021-04-30 14:10:00', '2021-04-30 23:00:00', 3015, '2021-04-30', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(90, '2021-05-03 14:00:52', '2021-05-03', '2021-05-03 23:45:57', '2021-05-03 14:10:00', '2021-05-03 23:00:00', 3015, '2021-05-03', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(94, '2021-05-07 14:00:52', '2021-05-07', '2021-05-07 23:45:57', '2021-05-07 14:10:00', '2021-05-07 23:00:00', 3015, '2021-05-07', '0', 0, '2021-05-31 21:45:57', '2021-05-31 21:45:57'),
(95, NULL, '2021-05-04', NULL, NULL, NULL, 3015, NULL, '749', 530, '2021-05-31 22:52:17', '2021-06-01 22:50:01'),
(96, NULL, '2021-05-05', NULL, NULL, NULL, 3015, NULL, '749', 530, '2021-05-31 22:52:17', '2021-06-01 22:50:01'),
(97, NULL, '2021-05-06', NULL, NULL, NULL, 3015, NULL, '749', 530, '2021-05-31 22:52:17', '2021-06-01 22:50:01'),
(98, '2021-06-01 15:01:15', '2021-06-01', '2021-06-01 17:40:18', '2021-06-01 15:01:15', '2021-06-01 17:40:18', 3015, '2021-06-01', '0', NULL, '2021-06-01 15:01:15', '2021-06-01 15:01:15'),
(99, '2021-06-01 15:01:18', '2021-06-01', '2021-06-01 17:40:22', '2021-06-01 15:01:18', '2021-06-01 17:40:22', 3020, '2021-06-01', '0', NULL, '2021-06-01 15:01:18', '2021-06-01 15:01:18'),
(100, '2021-06-01 15:01:39', '2021-06-01', '2021-06-01 15:30:55', '2021-06-01 15:01:39', '2021-06-01 15:30:55', 3016, '2021-06-01', '0', NULL, '2021-06-01 15:01:39', '2021-06-01 15:01:39');

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

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `area_id`, `tipo_empleado_id`, `created_at`, `updated_at`) VALUES
(20, 'GERENTE ADMINISTRATIVO', 43, 2, '2021-06-02 15:12:29', '2021-06-02 15:12:29'),
(21, 'PRE-INTERVENTOR', 44, 1, '2021-06-02 15:20:58', '2021-06-02 15:20:58'),
(22, 'ASISTENTE ADMINISTRATIVO', 9, 1, '2021-06-02 15:22:34', '2021-06-02 15:22:34'),
(23, 'AUXILIAR DE SISTEMAS 1', 45, 1, '2021-06-02 15:25:18', '2021-06-02 15:25:18'),
(24, 'JEFE DE PLANILLA', 5, 1, '2021-06-02 15:28:21', '2021-06-02 15:28:21'),
(25, 'OFICIAL DE PLANILLA', 5, 1, '2021-06-02 15:30:19', '2021-06-02 15:30:19'),
(26, 'AUXILIAR DE SISTEMAS 2', 45, 1, '2021-06-02 15:33:31', '2021-06-02 15:33:31'),
(27, 'OFICIAL DE PRESUPUESTO', 46, 1, '2021-06-02 15:36:14', '2021-06-02 15:36:14'),
(28, 'OFICIAL ADMINISTRATIVO', 46, 1, '2021-06-02 15:38:17', '2021-06-02 15:38:17'),
(29, 'CONTADOR GENERAL', 46, 1, '2021-06-02 15:40:38', '2021-06-02 15:40:38'),
(30, 'OFICIAL DE BIENES NACIONALES', 46, 1, '2021-06-02 15:43:53', '2021-06-02 15:43:53'),
(31, 'COORDINADOR RRHH', 46, 1, '2021-06-02 15:46:41', '2021-06-02 15:46:41'),
(32, 'OFICIAL DE RRHH', 46, 1, '2021-06-02 15:48:25', '2021-06-02 15:48:25'),
(33, 'COTIZADOR', 46, 1, '2021-06-02 15:49:09', '2021-06-02 15:49:09'),
(34, 'OFICIAL LEGAL', 8, 1, '2021-06-02 15:50:22', '2021-06-02 15:50:22'),
(35, 'GERENTE DE COMUNICACIONES', 26, 2, '2021-06-02 16:00:45', '2021-06-02 16:00:45'),
(36, 'COORDINADOR DE EVENTOS E IMAGEN', 47, 1, '2021-06-02 16:10:56', '2021-06-02 16:10:56'),
(37, 'GESTOR DE REDES SOCIALES', 47, 1, '2021-06-02 16:13:49', '2021-06-02 16:13:49'),
(38, 'DISEÑADOR GRÁFICO', 47, 1, '2021-06-02 16:16:47', '2021-06-02 16:16:47'),
(39, 'RELACIONADOR PÚBLICO', 47, 1, '2021-06-02 16:21:10', '2021-06-02 16:21:10'),
(40, 'ADMINISTRADOR DE REDES SOCIALES Y PUBLICIDAD', 48, 1, '2021-06-02 16:28:39', '2021-06-02 16:28:39'),
(42, 'PRODUCTOR AUDIOVISUAL', 47, 1, '2021-06-02 16:36:08', '2021-06-02 16:36:08'),
(43, 'DISEÑADOR GRÁFICO', 27, 1, '2021-06-02 16:40:17', '2021-06-02 16:40:17'),
(44, 'GERENTE BESA ASISTIR', 49, 2, '2021-06-02 16:54:10', '2021-06-02 16:54:10'),
(45, 'AUXILIAR BECA ASISTIR', 50, 1, '2021-06-02 17:01:25', '2021-06-02 17:01:25'),
(46, 'GERENTE DE BECA INTERNACIONAL', 31, 2, '2021-06-02 17:10:10', '2021-06-02 17:10:10'),
(47, 'OFICIAL DE BECA INTERNACIONAL', 51, 1, '2021-06-02 17:12:51', '2021-06-02 17:12:51'),
(48, 'GERENTE DE OPERACIONES', 11, 2, '2021-06-02 17:24:53', '2021-06-02 17:24:53'),
(49, 'ASISTENTE OPERATIVO', 12, 1, '2021-06-02 17:30:12', '2021-06-02 17:30:12'),
(50, 'SUB-GERENTE DE OPERACIONES', 52, 2, '2021-06-02 17:38:27', '2021-06-02 17:38:27'),
(51, 'JEFE OPERATIVO', 52, 1, '2021-06-02 17:44:06', '2021-06-02 17:44:06'),
(52, 'SUPERVISOR DE OPERACIONES', 52, 1, '2021-06-02 17:50:34', '2021-06-02 17:50:34'),
(53, 'AUXILIAR OPERATIVO DE ARCHIVO', 19, 1, '2021-06-02 17:57:22', '2021-06-02 17:57:22'),
(54, 'SUPERVISOR DE SERVICIO AL CLIENTE', 52, 1, '2021-06-02 18:46:14', '2021-06-02 18:46:14'),
(55, 'AUXILIAR DE SERVICIO AL CLIENTE', 52, 1, '2021-06-02 18:52:12', '2021-06-02 18:52:12'),
(56, 'SUPERVISOR DEPARTAMENTAL', 17, 1, '2021-06-02 19:00:10', '2021-06-02 19:00:10'),
(57, 'OFICIAL INFORMÁTICO', 15, 1, '2021-06-02 19:16:48', '2021-06-02 19:16:48'),
(58, 'ENCARGADO DE ARCHIVO', 19, 1, '2021-06-02 19:21:30', '2021-06-02 19:21:30'),
(59, 'DIGITALIZADOR DE DOCUMENTOS', 52, 1, '2021-06-02 19:25:10', '2021-06-02 19:25:10'),
(60, 'GERENTE DE SEGUIMIENTO', 20, 2, '2021-06-02 19:27:48', '2021-06-02 19:27:48'),
(61, 'ASISTENTE DE SEGUIMIENTO', 21, 1, '2021-06-02 19:31:43', '2021-06-02 19:31:43'),
(62, 'SUB-GERENTE DE MONITOREO Y LIDERAZGO', 53, 2, '2021-06-02 19:38:35', '2021-06-02 19:38:35'),
(63, 'OFICIAL DE ESTRATEGIA', 54, 1, '2021-06-02 19:45:22', '2021-06-02 19:45:22'),
(64, 'OFICIAL DE SEGUIMIENTO', 20, 1, '2021-06-02 19:50:34', '2021-06-02 19:50:34'),
(65, 'SUB-GERENCIA DE SEGUIMIENTO Y VOLUNTARIADO Y ', 22, 1, '2021-06-02 19:55:34', '2021-06-02 19:55:34'),
(66, 'AUXILIAR DE SEGUIMIENTO', 20, 1, '2021-06-02 20:02:20', '2021-06-02 20:02:20'),
(67, 'COORDINADOR REGIONAL NOROCCIDENTAL', 20, 1, '2021-06-02 20:06:12', '2021-06-02 20:06:12'),
(68, 'COORDINADOR ZONA NOR-ORIENTAL', 20, 1, '2021-06-02 20:14:43', '2021-06-02 20:14:43'),
(69, 'COORDINADOR REGIONAL DEL LITORAL ATLÁNTICO', 20, 1, '2021-06-02 20:19:58', '2021-06-02 20:19:58'),
(70, 'COORDINADOR REGIONAL ZONA SUR', 20, 1, '2021-06-02 20:31:20', '2021-06-02 20:31:20'),
(71, 'ASISTENTE DE OPERACIONES', 21, 1, '2021-06-02 20:35:21', '2021-06-02 20:35:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `num_contrato` varchar(45) DEFAULT NULL,
  `num_delegacion` varchar(45) DEFAULT NULL,
  `tipo_contrato` varchar(45) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `vacaciones` int(11) DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `horarios_id` int(11) NOT NULL,
  `users_aprueba_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleado_rrhh` varchar(45) DEFAULT NULL,
  `estatus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `num_contrato`, `num_delegacion`, `tipo_contrato`, `fecha_inicio`, `fecha_fin`, `sueldo`, `vacaciones`, `empleado_id`, `horarios_id`, `users_aprueba_id`, `created_at`, `updated_at`, `empleado_rrhh`, `estatus_id`) VALUES
(64, '9865', '53434545', NULL, '2021-03-30', '2021-07-30', 19000, 4, 3015, 1, 33, '2021-05-31 21:29:20', '2021-05-31 21:35:08', '3016', 2),
(65, '9865', '565933', NULL, '2021-04-15', '2021-06-15', 18000, 2, 3020, 1, 33, '2021-05-31 21:30:07', '2021-05-31 21:30:07', '3016', 2),
(66, '9865', '53434545', NULL, '2021-06-07', '2021-10-07', 20000, 0, 3020, 1, 32, '2021-06-02 14:56:16', '2021-06-02 14:56:16', '3016', 2),
(67, '500-2021', '565933', NULL, '2021-05-01', '2021-11-01', 25000, 0, 3021, 1, 32, '2021-06-02 14:57:03', '2021-06-02 14:57:03', '3016', 2),
(68, '9865', '53434545', NULL, '2021-04-26', '2021-10-22', 20000, 3, 3015, 1, 32, '2021-06-02 15:14:28', '2021-06-02 15:14:28', '3016', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `url_imagen` varchar(240) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_deducciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id`, `nombre`, `url_imagen`, `estatus`, `created_at`, `updated_at`, `tipo_deducciones_id`) VALUES
(23, 'IHSS', NULL, 1, '2021-04-21 14:29:45', '2021-05-07 17:12:23', 2),
(24, 'RAP', NULL, 1, '2021-04-21 14:30:13', '2021-04-22 15:55:51', 2),
(25, 'ISR', NULL, 1, '2021-04-21 14:30:44', '2021-05-07 17:12:32', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones_empleado`
--

CREATE TABLE `deducciones_empleado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `monto` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_deducciones_id` int(11) NOT NULL,
  `tipo_deducciones_varibale_id` int(11) DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deducciones_empleado`
--

INSERT INTO `deducciones_empleado` (`id`, `descripcion`, `monto`, `estado`, `porcentaje`, `created_at`, `updated_at`, `tipo_deducciones_id`, `tipo_deducciones_varibale_id`, `empleado_id`) VALUES
(75, 'COOPERATIVA ELGA', 505.25, 1, NULL, '2021-05-31 21:37:51', '2021-05-31 21:37:51', 1, 1, 3020),
(76, 'PRUEBA LEGAL', 300, 0, NULL, '2021-06-01 21:55:14', '2021-06-01 21:55:14', 1, 2, 3015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `empleado_encargado_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `empleado_encargado_id`, `created_at`, `updated_at`) VALUES
(1, 'Dirección', 4, NULL, NULL),
(2, 'Administración', 4, NULL, NULL),
(3, 'Operaciones', 3, NULL, NULL),
(4, 'Seguimiento', 7, NULL, NULL),
(5, 'Comunicaciones', 7, NULL, NULL),
(6, 'Beca internacional', 7, NULL, NULL),
(7, 'Talento humano', 3, NULL, NULL),
(8, 'Implementación', 3, NULL, NULL),
(9, 'Clínica', 3, NULL, NULL),
(10, 'Beca asistir', NULL, NULL, NULL);

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
-- Estructura de tabla para la tabla `dias_horario`
--

CREATE TABLE `dias_horario` (
  `id` int(11) NOT NULL,
  `dia` varchar(45) DEFAULT NULL,
  `entrada` time DEFAULT NULL,
  `salida` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `horarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `descripcion`, `numero_casa`, `lat`, `lng`, `created_at`, `updated_at`, `empleado_id`) VALUES
(1054, 'Col. LAS LOMAS, calle tocoa Tegucigalpa', '8956', NULL, NULL, '2021-05-31 17:27:52', '2021-05-31 17:27:52', 3016),
(1058, 'Col. Policarpo Paz García', '204', NULL, NULL, '2021-05-31 18:35:44', '2021-05-31 18:35:44', 3020),
(1059, 'Calle Tocoa. Col. San Miguel', '5502', NULL, NULL, NULL, NULL, 3015),
(1060, 'Col. San Miguel, calle tocoa casa 5502\r\nAl pa', '2305', NULL, NULL, '2021-06-02 14:48:45', '2021-06-02 14:48:45', 3021);

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
  `estatus_id` int(11) DEFAULT NULL,
  `grado_academico_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `rtn` varchar(45) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `identidad`, `nombre`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `fecha_ingreso`, `url_foto`, `email`, `email_institucional`, `estado_civil`, `lugar_nacimiento`, `descripcion_laboral`, `telefono_1`, `telefono_2`, `estatus_id`, `grado_academico_id`, `municipio_id`, `sueldo`, `rtn`, `cargo_id`, `created_at`, `updated_at`, `genero`, `profesion`) VALUES
(3015, '0801199615145', 'YEFRY ROLANDO ORTIZ ZERON', 'YEFRY', 'ROLANDO', 'ORTIZ', 'ZERON', '1996-07-12', '2021-03-08', NULL, 'yefryyo@gmail.com', 'yefryyo@gmail.com', 'SOLTERO(a)', 'Tegucigalpa', 'Trabajo independiente, experiencia por 1 año', '31958353', '31958353', 1, 4, 110, 6501.7, '08011996151453', 57, '2021-05-31 16:46:31', '2021-06-01 22:50:01', 'MASCULINO', 'INGENIERO EN SISTEMAS'),
(3016, '0801198210044', 'HAZEL ALEJANDRA ESCOBAR RAMIREZ', 'HAZEL', 'ALEJANDRA', 'ESCOBAR', 'RAMIREZ', '1982-06-08', '2021-03-08', 'foto_1', 'yefry21.yo@gmail.com', 'yefry21.yo@gmail.com', 'CASADO(a)', 'Tegucigalpa', 'EXPERIENCIA ADMINISTRATIVA EN EMPRESA X', '+50431958353', '31958353', 2, 5, 110, 0, '08011982100446', 20, '2021-05-31 17:27:52', '2021-05-31 17:27:52', 'FEMENINO', 'LICENCIADA EN ADMINISTRACION DE EMPRESAS'),
(3020, '0822199500082', 'LUIS FERNANDO AVILES GUEVARA', 'LUIS', 'FERNANDO', 'AVILES', 'GUEVARA', '1995-03-16', '2021-05-31', 'foto_1', 'luisfaviles18@gmail.com', 'luisfaviles18@gmail.com', 'SOLTERO(a)', 'Tegucigalpa', 'INFORMATICO ADMINISTRATIVO', '31958353', '+50497894224', 2, 3, 110, 6643.45, '08221995000822', 70, '2021-05-31 18:35:44', '2021-06-01 22:50:01', 'MASCULINO', 'INGENIERO EN SISTEMAS'),
(3021, '0822199000045', 'CARLOS ROBERTO LOPEZ TENORIO', 'CARLOS', 'ROBERTO', 'LOPEZ', 'TENORIO', '1990-07-24', '2021-06-02', 'foto_1', 'carlos2020hj@gmail.com', 'carlos2020hj@gmail.com', 'SOLTERO(a)', 'Tegucigalpa', 'Trayectoria gubernamental de asistencia técnica', '31958353', NULL, 2, 5, 110, 0, '08221990000456', 23, '2021-06-02 14:48:45', '2021-06-02 14:48:45', 'MASCULINO', 'ARQUITECTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_deducciones_fijas`
--

CREATE TABLE `empleado_has_deducciones_fijas` (
  `empleado_id` int(11) NOT NULL,
  `deducciones_id` int(11) NOT NULL,
  `monto_deduccion` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado_has_deducciones_fijas`
--

INSERT INTO `empleado_has_deducciones_fijas` (`empleado_id`, `deducciones_id`, `monto_deduccion`, `created_at`, `updated_at`) VALUES
(3015, 23, 200.5, '2021-06-01 22:49:05', '2021-05-31 21:36:35'),
(3015, 24, 250.5, '2021-06-01 22:49:10', '2021-05-31 21:36:35'),
(3015, 25, 300.3, '2021-06-01 22:49:15', '2021-05-31 21:36:35'),
(3020, 23, 200.5, '2021-06-01 22:49:34', '2021-05-31 21:37:01'),
(3020, 24, 250.5, '2021-06-01 22:49:41', '2021-05-31 21:37:01'),
(3020, 25, 300.3, '2021-06-01 22:49:45', '2021-05-31 21:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_permiso`
--

CREATE TABLE `estado_permiso` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ente` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_permiso`
--

INSERT INTO `estado_permiso` (`id`, `estado`, `ente`, `created_at`, `updated_at`) VALUES
(1, 'Aprobado', 'JEFE INMEDIATO', '2021-03-22 23:37:06', '2021-03-22 23:37:06'),
(2, 'Denegado', 'JEFE INMEDIATO', '2021-03-22 23:37:06', '2021-03-22 23:37:06'),
(3, 'Pendiente', 'JEFE INMEDIATO', '2021-03-22 23:37:29', '2021-03-22 23:37:29'),
(4, 'Aprobado', 'GERENTE TALENTO HUMANO', '2021-03-23 23:16:09', '2021-03-23 23:16:09'),
(5, 'Pendiente', 'GERENTE TALENTO HUMANO', '2021-03-23 23:16:09', '2021-03-23 23:16:09'),
(6, 'Denegado', 'GERENTE TALENTO HUMANO', '2021-03-23 23:17:15', '2021-03-23 23:17:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_tdv`
--

CREATE TABLE `estado_tdv` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_tdv`
--

INSERT INTO `estado_tdv` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(0, 'INACTIVO', NULL, NULL),
(1, 'ACTIVO', NULL, NULL);

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

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVO', NULL, NULL),
(2, 'INACTIVO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_referencia`
--

CREATE TABLE `estatus_referencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus_referencia`
--

INSERT INTO `estatus_referencia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVO', NULL, NULL),
(2, 'INACTIVO', NULL, NULL);

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
-- Estructura de tabla para la tabla `feriado`
--

CREATE TABLE `feriado` (
  `id` int(11) NOT NULL,
  `fecha_dia` date DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `feriado`
--

INSERT INTO `feriado` (`id`, `fecha_dia`, `motivo`, `users_id`, `hora_inicio`, `hora_fin`, `estatus_id`, `created_at`, `updated_at`) VALUES
(4, '2021-05-19', 'Dia de las americanas', 33, '08:00:00', '17:00:00', 2, '2021-05-17 22:07:22', '2021-05-17 22:07:22'),
(5, '2021-05-26', 'Ganó la h', 33, '08:00:00', '17:00:00', 2, '2021-05-17 22:12:26', '2021-05-17 22:12:26'),
(6, '2021-06-01', 'Nada', 33, '08:00:00', '17:00:00', 1, '2021-05-31 14:03:52', '2021-05-31 14:03:52'),
(7, '2021-05-03', 'DIA DEL TRABAJADOR', 33, '08:00:00', '17:00:00', 1, '2021-05-31 15:43:10', '2021-05-31 15:43:10'),
(9, '2021-07-05', 'Prueba de feriado Nuevo', 33, '08:00:00', '17:00:00', 1, '2021-06-01 14:58:47', '2021-06-01 14:58:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cargo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id`, `nombre`, `created_at`, `updated_at`, `cargo_id`) VALUES
(1, 'Compra', '2021-03-24 21:01:18', '2021-03-24 21:01:18', 4),
(2, 'Venta', '2021-03-24 21:01:18', '2021-03-24 21:01:18', 4),
(3, 'Desarrollo de sitios web', '2021-03-26 14:25:15', '2021-03-26 14:25:15', 5),
(4, 'Desarrollo de aplicaciones nativas', '2021-03-26 14:25:15', '2021-03-26 14:25:15', 5),
(5, 'Desarrollo de aplicaciones móviles', '2021-03-26 14:25:15', '2021-03-26 14:25:15', 5),
(6, 'Infraestructura y sopórte técnico', '2021-03-26 14:25:15', '2021-03-26 14:25:15', 5),
(7, 'Mantenimiento de sistemas', '2021-03-26 14:25:16', '2021-03-26 14:25:16', 5),
(8, 'Comunica los recados', '2021-04-07 17:43:48', '2021-04-07 17:43:48', 6),
(9, 'Delegador', '2021-04-09 17:39:16', '2021-04-09 17:39:16', 9),
(10, 'Delegar cargos sistematicos en TI', '2021-04-14 17:40:30', '2021-04-14 17:40:30', 1),
(11, 'Trabajos de revisiones de datos', '2021-04-14 17:40:30', '2021-04-14 17:40:30', 1),
(12, 'Comisiones de logistica', '2021-04-14 17:40:30', '2021-04-14 17:40:30', 1),
(13, 'Inclusión de personal administrativo', '2021-04-14 17:40:30', '2021-04-14 17:40:30', 1),
(14, 'ADMINISTRAR 2', '2021-04-20 15:12:10', '2021-04-20 15:12:25', 10),
(15, 'COORDINAR', '2021-04-20 15:12:10', '2021-04-20 15:12:10', 10),
(17, 'Atender llamadas telefonicas', '2021-04-21 17:40:40', '2021-04-21 17:40:40', 11),
(18, 'prueba', '2021-04-23 17:35:37', '2021-04-23 17:35:37', 14),
(19, 'CALCULO DE PLANILLAS', '2021-05-31 17:07:56', '2021-05-31 17:07:56', 17),
(20, 'INGRESO DE COLABORADORES AL SISTEMA', '2021-05-31 17:07:56', '2021-05-31 17:07:56', 17),
(21, 'CREACION DE CONTRATOS', '2021-05-31 17:07:56', '2021-05-31 17:07:56', 17),
(22, 'CALCULO DE PAGOS', '2021-05-31 17:07:56', '2021-05-31 17:07:56', 17),
(23, 'CREACION DE FICHAS DE EMPLEADO', '2021-05-31 17:22:48', '2021-05-31 17:22:48', 18),
(24, 'CREACIONES DE CONTRATOS', '2021-05-31 17:22:48', '2021-05-31 17:22:48', 18),
(25, 'DELEGACIONES DE ROLES DENTRO DEL SISTEMA', '2021-05-31 17:22:48', '2021-05-31 17:22:48', 18),
(26, 'CONTRATACIONES', '2021-05-31 19:55:45', '2021-05-31 19:55:45', 19),
(27, 'Establecer los procesos administrativos del Programa', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(28, 'Administrar los Recursos Financieros asignados al Programa', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(29, 'Administrar el Recurso Humano que presta su servicio en el Programa', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(30, 'Establecer los mecanismos de Control interno en el trámite administrativo', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(31, 'Planificar coordinar y controlar los procesos de compras y contrataciones', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(32, 'Recibir, revisar la documentación de los procesos remitidos por adquisiciones', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(33, 'Proceder con la emisión de pagos derivados de adquisiciones de las actividades normales del proceso', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(34, 'Solicitar y obtener insumos de las áreas involucradas para la elaboración del POA', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(35, 'Coordinar con los organismos correspondientes la adecuada y oportuna asignación y transferencia de los fondos del presupuesto aprobado', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(36, 'Velar porque se proporcione a las distintas áreas del programa los recursos financieros y materiales necesarios para el desarrollo de sus actividades', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(37, 'Coordinar, dirigir, controlar y evaluar los procedimientos y actividades de contabilidad y presupuesto', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(38, 'Supervisar el manejo y control de los inventarios de bienes, materiales y suministros, y de los seguros de los bienes del Programa Así mismo, disponer la realización de arqueos y comprobación de existencia de los bienes del Programa.', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(39, 'Aprobar las conciliaciones bancarias.', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(40, 'Aprobar la liquidación de fondos de manera mensual.', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(41, 'Ejecutar las demás funciones que sean asignadas en el marco de la competencia', '2021-06-02 15:12:29', '2021-06-02 15:12:29', 20),
(42, 'Revisión de expedientes de los becarios (requisitos)', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(43, 'Revisión de planillas de pagos a los becarios', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(44, 'Revisión de viáticos y anticipos de viaje', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(45, 'Apoyo a las diferentes coordinaciones en sus actividades', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(46, 'Visitar instituciones y centros educativos para las liquidaciones por las transferencias hechas por el programa', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(47, 'Apoyo a la gerencia Administrativa en las diferentes funciones asignadas', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(48, 'Revisión en los diferentes procesos de suministros', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(49, 'Participación como observador en las compras de licitación privadas y publicas', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(50, 'Revisión de controles basados en auditoria', '2021-06-02 15:20:58', '2021-06-02 15:20:58', 21),
(51, 'Elaboración y de Memorándum, Distribución de los mismos', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(52, 'Elaboración de oficios, y Distribución de los mismos', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(53, 'Entregar Documentos en algunas Instituciones del Gobierno', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(54, 'Archivar Documentación', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(55, 'Sacar copias', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(56, 'Llevar Agenda de la Gerencia administrativa', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(57, 'Proporcionar Documentación a la Gerencia administrativa para revisión y Firma', '2021-06-02 15:22:34', '2021-06-02 15:22:34', 22),
(58, 'Planeación y ejecución oportuna de cualquier proyecto de TI.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(59, 'Diseñar, programar, aplicar y mantener sistemas informáticos.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(60, 'Administrar redes y sistemas de información.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(61, 'Optimizar los datos que maneja en la Institución.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(62, 'Diseñar y mantener los sitios web.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(63, 'Mantenimiento de infraestructuras de redes.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(64, 'Administración de bases de datos.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(65, 'Consultoría técnica.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(66, 'Auditoría informática.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(67, 'Apoyo y soporte a todas las áreas de la Institución.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(68, 'Administrar y Gestionar el correo institucional.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(69, 'Reparación y Mantenimiento de equipo informático.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(70, 'Respaldar información crítica de la institución.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(71, 'Análisis y Preparación de datos.', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(72, 'Administración y mantenimiento del Hosting', '2021-06-02 15:25:18', '2021-06-02 15:25:18', 23),
(73, 'Realizar pagos de planillas a becarios a nivel nacional.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(74, 'Reportes de pagos realizados.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(75, 'Consolidados de pagos realizados.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(76, 'Liquidación de pagos realizados.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(77, 'Reporte de CENISS.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(78, 'Supervisión y seguimiento al trabajo de oficiales de planillas.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(79, 'Seguimientos a aperturas de cuentas de becarios en banco Ficohsa y en Banco Atlántida.', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(80, 'Atención a los becarios con solicitudes, consultas, reclamos', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(81, 'Enlace y gestión con los bancos para la solución en cualquier tipo de incidentes en relación a los recursos económicos y cuentas de becarios', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(82, 'Seguimiento al muestro por parte de pre interventor a las pre- planillas para poder generar las planillas', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(83, 'Seguimiento a la recepción de los memorándums que incluyen la pre-planilla generadas por parte del depto. de Operaciones para poder realizar planillas en base a esa información', '2021-06-02 15:28:21', '2021-06-02 15:28:21', 24),
(84, 'Realizar pagos de planillas a becarios a nivel nacional.', '2021-06-02 15:30:19', '2021-06-02 15:30:19', 25),
(85, 'Reportes de pagos realizados.', '2021-06-02 15:30:19', '2021-06-02 15:30:19', 25),
(86, 'Consolidados de pagos realizados.', '2021-06-02 15:30:19', '2021-06-02 15:30:19', 25),
(87, 'Liquidación de pagos realizados.', '2021-06-02 15:30:19', '2021-06-02 15:30:19', 25),
(88, 'Reporte de CENISS.', '2021-06-02 15:30:19', '2021-06-02 15:30:19', 25),
(89, 'Planeación y ejecución oportuna de cualquier proyecto de TI.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(90, 'Diseñar, programar, aplicar y mantener sistemas informáticos.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(91, 'Administrar redes y sistemas de información.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(92, 'Optimizar los datos que maneja en la Institución.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(93, 'Diseñar y mantener los sitios web.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(94, 'Mantenimiento de infraestructuras de redes.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(95, 'Administración de bases de datos.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(96, 'Consultoría técnica.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(97, 'Auditoría informática.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(98, 'Apoyo y soporte a todas las áreas de la Institución.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(99, 'Administrar y Gestionar el correo institucional.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(100, 'Respaldar información crítica de la institución.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(101, 'Análisis y Preparación de datos.', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(102, 'Administración y mantenimiento del Hosting', '2021-06-02 15:33:31', '2021-06-02 15:33:31', 26),
(103, 'Elaboración anual de presupuesto', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(104, 'Solicitudes de desembolso a la secretaría de finanzas (sefin)', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(105, 'Revisión de documentos con instituc. Educ. (convenios)', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(106, 'Visitar centro educativos', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(107, 'Elaboración de liquidación financiera a la sefin', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(108, 'Revisión y autorización (firma) de procesos de compras	y adquisiciones de bienes y servicios', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(109, 'Ser miembro del comité de evaluación para las compras y adquisiciones de bienes y servicios', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(110, 'Reuniones con auditoría de finanzas', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(111, 'Relación/ reunión con personal de instituciones bancarias sobre movimientos específicos en cuentas bancarias.', '2021-06-02 15:36:14', '2021-06-02 15:36:14', 27),
(112, 'Esta es una función temporal. Realizar una revisión de control Interno, a los procesos de compra que realizo el Programa durante el 2017.', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(113, 'Revisar que los procesos cuenten con Requerimiento, Invitación a cotizar, las ofertas, actas de apertura de ofertas, comisión evaluadora, informe, orden de compra, acta de recepción, pago, verificar si se realizó la publicación en HONDUCOMPRAS', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(114, 'Dar seguimiento a la línea de atención a denuncias línea 130', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(115, 'Revisar los procedimientos administrativos en las áreas de adquisiciones para evaluar el desarrollo de las actividades aplicando las leyes de contratación del estado', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(116, 'Verificar el cumplimiento de controles, políticas para la mejora institucional.', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(117, 'Mantener permanentemente informado a la Gerencia dando informes de las debilidades detectadas y las fallas de control interno', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(118, 'Desempeñar las demás funciones asignadas por la autoridad competente, de acuerdo con el nivel, la naturaleza y el área de desempeño del cargo', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(119, 'Elaboración de Planillas de Pago de Becarios', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(120, 'Elaboración de Memos internos para el proceso de aplicación de planillas.', '2021-06-02 15:38:17', '2021-06-02 15:38:17', 28),
(121, 'Emisión de Cheques de Gasto Administrativo y Becas cuando corresponde', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(122, 'Emisión de Autorizaciones para emisión de Cheques', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(123, 'Emisión de Comprobantes de Retención de Impuestos', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(124, 'Elaboración de Libro Diario y Auxiliares de las Cuentas de Banco', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(125, 'Emisión de Anticipo de Viáticos', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(126, 'Seguimiento y control de las liquidaciones de Viáticos', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(127, 'Monitoreo y Pago de los servicios públicos del Programa y sus oficinas regionales', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(128, 'Elaboración y pago de las Retenciones de Impuesto a SAR', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(129, 'Presentación de DMR en SAR en línea', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(130, 'Calculo de liquidaciones y otros derechos laborales cuando se requiere', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(131, 'Envío de Correspondencia a oficinas regionales, concernientes a administración', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(132, 'Gestionar los diferentes depósitos o pagos de servicios con motoristas del programa', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(133, 'Encargada del archivo contable', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(134, 'Atención a proveedores', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(135, 'Cálculo DE ISR Empleados', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(136, 'Calculo y Pago de Impuesto Vecinal', '2021-06-02 15:40:38', '2021-06-02 15:40:38', 29),
(137, 'Gestionar y administrar los bienes de la Institución', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(138, 'Realizar inventarios de bienes de la institución', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(139, 'Identificar los bienes con un código visible para cada bien para facilitar el control y ubicación', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(140, 'Verificar el estado físico de los bienes', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(141, 'Recibir mobiliario y equipo en su llegada	O	E', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(142, 'Elaborar actas de incorporación, desincorporación, traslados e inspección de bienes.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(143, 'Ordena y archiva documentos y/o comprobantes de la unidad.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(144, 'Entregar equipo por medio de solicitud', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(145, 'Mandar a reparación equipo dañado', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(146, 'Mantiene en orden el equipo y sitio de trabajo reportando cualquier anomalía.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(147, 'Actualizar los bienes con informes finales de inventarios y actas de descargos, certificación de pérdida o daño que se	M	E realicen.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(148, 'Coordinar las compras con adquisiciones y contabilidad.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(149, 'Realiza cualquier otra tarea asignada.', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(150, 'Hacer Memos solicitando producto para utilizar en el programa', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(151, 'Recibir producto solicitado en el programa', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(152, 'Llevar un control de lo que entra y sale de bodega por medio de requerimiento del personal', '2021-06-02 15:43:53', '2021-06-02 15:43:53', 30),
(153, 'Llevar control de inventario de la existencia física de la bodega', '2021-06-02 15:44:29', '2021-06-02 15:44:29', 30),
(154, 'Brindar atención a todos los departamentos del programa en lo relacionado a los suministros de lo solicitado', '2021-06-02 15:44:29', '2021-06-02 15:44:29', 30),
(155, 'Estar pendiente del abastecimiento de la bodega', '2021-06-02 15:44:30', '2021-06-02 15:44:30', 30),
(156, 'Elaboración de contratos de trabajo', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(157, 'Encargado de que cada empleado firme contrato en tiempo y forma', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(158, 'Eleborar un expediente a cada colaborador', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(159, 'Elaboración de planilla de pago', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(160, 'Elaboración de macro para acreditación de la planilla', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(161, 'Actualización de entradas y bajas del ihss', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(162, 'Calculo de liquidación y derechos laborales a colaboradores', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(163, 'Supervisar la administración de personal dentro del programa', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(164, 'Coordinar actividades dentro del programa para motivar relaciones laborales', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(165, 'Diseñar politicas que deben seguir para reclutamiento, selección, formación , desarrollo del personal, clima laboral, y evaluación de desempeño', '2021-06-02 15:46:41', '2021-06-02 15:46:41', 31),
(166, 'Aplica instrumento de registro de información de cargo, para el analisis de los cargos.', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(167, 'Verifica las referencias de los aspirantes a cada cargo', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(168, 'Mantiene actualizados los archivos de personal', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(169, 'Elaborar constancias de trabajo cuando el colaborador lo solicite', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(170, 'Apoyo en la revisión y modificación de contratos laborales', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(171, 'Actualiza y registra en cada expediente del personal reposo, permiso inasistencias y demás información relacionada con el personal', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(172, 'Registrar la asistencia del personal', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(173, 'Checar diariamente la asistencia del personal y detectar falla', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(174, 'Rinde cuentas a su superior inmediato de las ac tividades realizadas cuando lo requieran', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(175, 'Chequea el otorgamiento de los beneficios tales como prima cumplimiento de los requisitos exigidos para el', '2021-06-02 15:48:25', '2021-06-02 15:48:25', 32),
(176, 'Cotizar servicios y equipo', '2021-06-02 15:49:09', '2021-06-02 15:49:09', 33),
(177, 'Entrega de Documentación', '2021-06-02 15:49:09', '2021-06-02 15:49:09', 33),
(178, 'Pago de servicios públicos/SAR', '2021-06-02 15:49:09', '2021-06-02 15:49:09', 33),
(179, 'Redacción de Contratos Legales', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(180, 'Emisión de Dictámenes Legales', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(181, 'Contestación de Demandas Laborales', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(182, 'Redacción de Convenios Interinstitucionales', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(183, 'Revisión de Contratos', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(184, 'Revisión de Convenios Interinstitucionales', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(185, 'Redacción de adendas a Contratos', '2021-06-02 15:50:22', '2021-06-02 15:50:22', 34),
(186, 'Creación e implementación de estrategia de comunicación e identidad de marca (tanto interna como externa)', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(187, 'Creación e implementación de estrategias de comunicación para los diferentes tipos de becas (juventud, asistir, internacional)', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(188, 'Supervisión de estrategia digital y materiales para la comunicación de las diferentes actividades realizadas por el voluntariado de programa', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(189, 'Velar por el correcto uso de la marca a nivel país', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(190, 'Supervisar la producción de materiales promocionales comunicacionales a nivel interno y externo', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(191, 'Supervisar relación con medios de comunicación en función de la marca', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(192, 'Desarrollo de eventos y actividades vinculadas directamente con el presidente', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(193, 'Conceptualización creativa para los diferentes proyectos del programa', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(194, 'Creación y mantenimiento de canales propios de comunicación para el programa', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(195, 'Manejo del branding personal del delegado presidencial en redes sociales y supervisión en medios de comunicación', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(196, 'Creación de material publicitario gráfico y visual', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(197, 'Desarrollo de estrategias de comunicación y/o campañas de publicidad para otros productos del sector educación', '2021-06-02 16:00:45', '2021-06-02 16:00:45', 35),
(198, 'Dar seguimiento a las instrucciones enmendadas por el delegado presidencial', '2021-06-02 16:10:56', '2021-06-02 16:10:56', 36),
(199, 'Planificar y ejecutar diferentes que se realizan a nivel nacional tanto a lo interno como a lo externo del programa', '2021-06-02 16:10:56', '2021-06-02 16:10:56', 36),
(200, 'Manejar una lista de contáctos institucionales que sirven de apoyo a cada uno de los eventos', '2021-06-02 16:10:56', '2021-06-02 16:10:56', 36),
(201, 'Velar por la correcta imagen del edificio en general: Estética, comunicación interna entre otros', '2021-06-02 16:10:56', '2021-06-02 16:10:56', 36),
(202, 'Dar apoyo y seguimiento a memorándums de solicitud de bienes realizados por otros departamentos para las cotizaciones y adquisiciones para la coordinación de eventos', '2021-06-02 16:10:56', '2021-06-02 16:10:56', 36),
(203, 'Apoyo en la plataforma Facebook como \"community manager\"', '2021-06-02 16:13:49', '2021-06-02 16:13:49', 37),
(204, 'Monitoreo y generación de reportes (métricas mensuales) de los embajadores digitales del programa', '2021-06-02 16:13:49', '2021-06-02 16:13:49', 37),
(205, 'Encargado de atender el canal de comunicación: correo institucional', '2021-06-02 16:13:49', '2021-06-02 16:13:49', 37),
(206, 'Apoyo en la generación de contenidos para las distintas plataformas', '2021-06-02 16:13:49', '2021-06-02 16:13:49', 37),
(207, 'Participación en el desarrollo y creación de proyectos estratégicos del programa', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(208, 'Diseño gráfico y conceptual creativo de campañas y eventos', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(209, 'Diseño de materiales OP, materiales promocionales, logos, invitaciones entre otros', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(210, 'Diseño interactivo de presentaciones estratégicas', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(211, 'Preparación de artes finales', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(212, 'Apoyo en producción de material audiovisual y fotográfico', '2021-06-02 16:16:47', '2021-06-02 16:16:47', 38),
(213, 'Redacción de contenido periodístico del programa para medios de comunicación y canales propios', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(214, 'Contacto y convocatoria de medios para eventos, entrevistas y cualquier otro tema de interés', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(215, 'Locución institucional del programa para vídeos y documentales', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(216, 'Asistencia y coordinación de eventos y proyectos', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(217, 'Actualización y mantenimiento del sitio web del programa', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(218, 'Control de archivo publicitario (memos, control de materiales, solicitudes)', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(219, 'Revisión y seguimiento del monitoreo de medios (noticias diarias vinculadas con el sector educación y específicamente el programa) medios impresos, televisivos y digitales', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(220, 'Asistencia en diferentes proyectos del programa', '2021-06-02 16:21:10', '2021-06-02 16:21:10', 39),
(221, 'Construcción y ejecución de estrategia del programa en la comunidad online', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(222, 'Administración general de las redes sociales (Facebook del programa y Erasmo, Instagram, Twitter)', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(223, 'Construcción y análisis de reportes métricos, evaluación de resultados', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(224, 'Creación y redacción de contenido atractivo diario y de calidad para los jóvenes', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(225, 'Creación previa de la calendarización del contenido a publicar', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(226, 'Establecimiento de conversación con nuestros becarios, siendo la voz en las redes sociales para crear relaciones estables y cercanas; así cómo la creación de protocolos de respuesta a becarios y supervisión de los tiempos de respuesta', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(227, 'Cobertur de eventos en vivo y/oactividades que generen contenido a nuestras redes sociales', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(228, 'Monitoreo de competencia directa e indirecta de la marca', '2021-06-02 16:28:39', '2021-06-02 16:28:39', 40),
(229, 'Atención de consultas, solicitudes, dudas de becarios a través del canal de respuesta INMEDIATA vía whatsApp', '2021-06-02 16:33:52', '2021-06-02 16:33:52', 41),
(230, 'Generación de reportes mensual de consultas entrantes vía Whatsapp', '2021-06-02 16:33:52', '2021-06-02 16:33:52', 41),
(231, 'Atención de la plataforma Grupo privado Juventud 20/20 de Facebook para asesorar diariamente las consultas entrantes de becarios', '2021-06-02 16:33:52', '2021-06-02 16:33:52', 41),
(232, 'Filmación, edición y postproducción de material audiovisual para publicar en los diferentes canales y plataformas de comunicación', '2021-06-02 16:36:08', '2021-06-02 16:36:08', 42),
(233, 'Cobertura de eventos y actividades para capturar contenido audiovisual y fotográfico', '2021-06-02 16:36:08', '2021-06-02 16:36:08', 42),
(234, 'Animación de material gráfico y fotográfico para vídeos', '2021-06-02 16:36:08', '2021-06-02 16:36:08', 42),
(235, 'Diseño de todo el material digital para las publicaciones de actividades, eventos, campañas y cualquier contenido diario que se publica en nuestras redes sociales', '2021-06-02 16:40:17', '2021-06-02 16:40:17', 43),
(236, 'Retoques fotográficos', '2021-06-02 16:40:17', '2021-06-02 16:40:17', 43),
(237, 'Apoyo con diseño de material gráfico', '2021-06-02 16:40:17', '2021-06-02 16:40:17', 43),
(238, 'Diseño de la comunicación interna del programa', '2021-06-02 16:40:17', '2021-06-02 16:40:17', 43),
(239, 'Preparación de artes finales para producción', '2021-06-02 16:40:17', '2021-06-02 16:40:17', 43),
(240, 'Coordinar el programa beca asistir', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(241, 'Evaluar y seleccionar centros educativos por beneficiar', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(242, 'Darles seguimiento a los centros educativos beneficiados', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(243, 'Solicitar, recolectar y revisar documentación correcta de los beneficiarios', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(244, 'Trasladar los documentos completos y revisados a la gerencia encargada dentro del PROGRAMA \"PRESIDECIAL DE BECAS HONDURAS 20/20\" para su archivo y digitalización', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(245, 'Coordinar las estrategas y servicios prestados con las instituciones y empresas que hacen parte del funcionamiento de BECA ASISTIR', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(246, 'Realizar convenios con instituciones públicas y privadas', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(247, 'Buscar alianzas estratégicas', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(248, 'Realizar socializaciones con directores de centros educativos, alumnos y padres de familia', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(249, 'Revisar montos y enviar planillas de pago BECA ASISTIR', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(250, 'Informar a las demás gerencias de los eventos que se puedan suscitar dentro de Beca asistir', '2021-06-02 16:54:10', '2021-06-02 16:54:10', 44),
(251, 'Recolectar la documentación e ingresar la información de posibles beneficiarios de BECA ASISTIR al sistema', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(252, 'Extraer la data de los relojes marcadores, instalados en los centros educativos', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(253, 'Armar base de datos de beneficiarios de BECA ASISTIR', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(254, 'Calcular los montos por beneficiarios para generar las planillas de pago de BECA ASISTIR', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(255, 'Tener comunicación constante con los directores de los centros educativos', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(256, 'Elaborar los memorándum y oficios para solicitudes o comunicaciones internas con las demás gerencias del PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(257, 'Dar inducción sobre el programa de BECA ASISTIR a los nuevos centros educativos seleccionados', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(258, 'Gestionar la elaboración de carnés de los nuevos beneficiarios', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(259, 'Coordinar la instalación de equipo en los centros educativos', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(260, 'Estar pendiente y corroborar que los equipos y los carnés funcionen correctamente', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(261, 'Establecer los procesos administrativos del Programa', '2021-06-02 17:01:25', '2021-06-02 17:01:25', 45),
(262, 'Estar en comunicación con autoridades de las instituciones públicas y privadas con las que Beca Asistir se relaciona por motivos de pagos, habilitación de nuevos puntos de venta, para coordinar las fechas en que estarán habilitados los pagos y cualquier otro asunto que surja de la relación', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(263, 'Apoyar en cualquier otra tarea asignada por autoridad del programa', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(264, 'Darle respuesta a cualquier inquietud o consulta de los beneficiarios, padres de familia o de los centros educativos', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(265, 'Tener al día todos los pendientes que se generen dentro de Beca Asistir', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(266, 'Gestionar y solicitar con las intituciones públicas o privadas con las que tiene relación Beca Asistir la información requerida o documentos solicitados por cualquier gerencia del PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(267, 'Informar a cada sector de centro educativo las fechas en que se acredita el beneficio', '2021-06-02 17:06:15', '2021-06-02 17:06:15', 45),
(268, 'Gestionar con el Banco Ficohsa que el pago de los becarios se realice en tiempo y forma.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(269, 'Administrar y distribuir los fondos del fideicomiso en las convocatorias que se habiliten para otorgar becas.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(270, 'Elaborar el presupuesto y flujo de fondos para la adjudicacion de becas.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(271, 'Realizar convenios con universidades en el extrajero, para potenciar que mayor cantidad de Hondureños estudien en universidades prestigiosas.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(272, 'Evaluacion de los candidatos establecidos en los convenios de INCAE y Instituto Empresa y Humanismo.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(273, 'Asistir a los comites solicitados para la adjudicación y aprobacion de beca de los postulantes.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(274, 'Revisar los ciclos academicos de las universidades en el extranjero para que los postulantes puedan realizar su admision.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(275, 'Elaborar la planilla de CENISS, para el control de adminisdtracion de pagos realizados a los becarios.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(276, 'Elaboracion de oficios y manejo de seguros de poliza de Banco Ficohsa.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(277, 'Brindar atencion al cliente, a todos los interesados en conocer sobre el programa.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(278, 'Atender cualquier requerimiento de sus superiores.', '2021-06-02 17:10:10', '2021-06-02 17:10:10', 46),
(279, 'Recepcionar documentos de postulaciones para proceso de beca.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(280, 'Dar seguimiento a los becarios en el extranjero para que cumplan con sus deberes como becarios internacionales.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(281, 'Elaborar planillas y oficios para envio de pago al banco.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(282, 'Evaluar y gestionar todo el proceso de seleción de los candidatos establecidos en el convenio de Fundapanaca y Cuba.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(283, 'Archivar expedientes de todos los becarios internacionales.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(284, 'Brindar atencion al cliente, a todos los interesados en conocer del programa.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(285, 'Atender cualquier requerimiento de sus superiores.', '2021-06-02 17:12:51', '2021-06-02 17:12:51', 47),
(286, 'Dirigir y coordinar las operaciones necesarias para la recepción, procedimiento y documentación de expedientes de los becarios', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(287, 'Definir procesos y procedimientos que permitan automatizar las funciones del departamento', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(288, 'Supervisar al personal a cargo, para el buen desempeño de acuerdo a las funciones ya definidas', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(289, 'Convocar a los becarios a nivel nacional para la recepción de documentos y sustentos de expedientes', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(290, 'Coordinar la logística con el área de comunicación cuándo se requiera la organización de eventos', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(291, 'Reuniones periódicas con el personal de operaciones', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(292, 'Elaboración y presentación de informes y estadísticas del área operativa', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(293, 'Mantener las relaciones con las Universidades por medio de los convenios ya establecidos por el PPBH20/20', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(294, 'Recepción de planilla por parte de la Gerencia Administrativa para verificar los expedientes actualizados de los becarios remitidos a pago a nivel nacional', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(295, 'Remisión a la Gerencia de Administración la revisión de actas por cada supervisor regional conforme a las pre-planillas remitidas a pago', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(296, 'Participación en los comités de adjudicación de nuevos becarios', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(297, 'Remitir a la Gerencia legal la lista de nuevos becarios adjudicación para la elaboración de nuevas actas de adjudicación de becas', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(298, 'Planificar las funciones del personal para eficientar la gestión de área operativa', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(299, 'Proponer y realizar mejoras necesarias de los procesos del departamento', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(300, 'Asegurar el buen funcionamiento del sistema operativo', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(301, 'Evaluación periódica al personal en busca de la mejora continua', '2021-06-02 17:24:53', '2021-06-02 17:24:53', 48),
(302, 'Administrar el personal de la gerencia de Operaciones (Vacaciones, permisos, capacitaciones)', '2021-06-02 17:26:55', '2021-06-02 17:26:55', 48),
(303, 'Demás funciones que se le asignen', '2021-06-02 17:26:55', '2021-06-02 17:26:55', 48),
(304, 'Manejo de la agenda de la Gerencia de Operaciones', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(305, 'Elaboración de memorándum del área operativa', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(306, 'Organizar y archivar los documentos de la Gerencia de operaciones', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(307, 'Recepción de correspondencia', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(308, 'Elaboración de informes y reportes', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(309, 'Apoyo al personal de operaciones en actividades requeridas por la Gerencia de Operaciones', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(310, 'Apoyo en temas administrativos del área operativa', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(311, 'Y demás funciones que se le asignen', '2021-06-02 17:30:12', '2021-06-02 17:30:12', 49),
(312, 'Atención directa a los becarios', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(313, 'Recepción, revisión y verificación de los documentos de los becarios autorizados por el Programa para Beca Juventud y para Beca Solidaria', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(314, 'Actualizar los expedientes de los becarios, según el periodo académico', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(315, 'Elaboración y presentación de informes cada vez que se soliciten', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(316, 'Digitación y revisión de nuevos becarios autorizados', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(317, 'Remisión de planillas a la Gerencia Administrativa para que procedan al pago de las mismas', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(318, 'Evaluación periódica al personal sub gerencia de operaciones', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(319, 'Administrar las actividades del personal de la sub gerencia de operaciones', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(320, 'Participar en reuniones con las diferentes áreas del programa de becas para lograr un mejor funcionamiento del mismo', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(321, 'Y demás funciones que se le asignen', '2021-06-02 17:38:27', '2021-06-02 17:38:27', 50),
(322, 'Seguimiento a becarios de nuevos ingresos', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(323, 'Generar pre planillas para convenios de las instituciones beneficiadas por el programa', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(324, 'Custodiar expedientes de nuevos becarios', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(325, 'Supervisar y revisar cada una de las actividades del personal bajo su cargo', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(326, 'Generar base de seguimiento de nuevos becarios como los ya existentes', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(327, 'Actualizaciones de periodos de planilla administrativa', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(328, 'Evaluaciones periódicas del personal bajo su cargo', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(329, 'Atender de forma directa las consultas o inquietudes de los becarios', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(330, 'y demás funciones que se le asignen', '2021-06-02 17:44:06', '2021-06-02 17:44:06', 51),
(331, 'Atención a becarios', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(332, 'Actualización de los documentos de todos los becarios a nivel nacional, requeridos por el PPBH20/20', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(333, 'Actualización de los documentos recolectados por los supervisores departamentales a nivel nacional', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(334, 'Manejo de listas de incidencias y documentos no recibidos', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(335, 'Digitación de nuevos becarios autorizados por el comité de adjudicación de becas en base a nuevas convocatorias', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(336, 'Entrega de constancias para remisión  de apertura de cuentas de Becarios pendientes de cuenta de ahorro', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(337, 'Recepción de renuncias de becarios para actualizar en sistema', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(338, 'Organizar los documentos por departamento y universidades para sus archivo', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(339, 'Recepción de documento de beca solidaria', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(340, 'Apoyo a los supervisores departamentales en actualización y revisión de documentos', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(341, 'Y demás funciones que se le asignen', '2021-06-02 17:50:34', '2021-06-02 17:50:34', 52),
(342, 'Atención de personal de operaciones para consultas de expedientes', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(343, 'Recepción de documentos del personal de SAC/digitación para su archivo y custodia', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(344, 'Organizar los documentos por departamento y universidades para su archivo', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(345, 'Custodia de los expedientes de becarios a nivel nacional', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(346, 'Archivo de expedientes por Universidad y orden alfabético según el departamento de Francisco Morazán', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(347, 'Manejo de un control de expedientes prestados a personal del área de operaciones y áreas que lo soliciten', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(348, 'Auxiliar al personal de operaciones en evento de recepción de documentos en los diferentes departamentos a nivel nacional cuándo sea requerido', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(349, 'Y demás funciones que se le asignen', '2021-06-02 17:57:22', '2021-06-02 17:57:22', 53),
(350, 'Manejo y control del personal de SAC', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(351, 'Control de calidad sobre cada reporte de becarios actualizados diariamente', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(352, 'Asegurarse que el becario sea atendido de forma diligente y que recibe la información y asistencia que busca', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(353, 'Que intervenga en la solución de problemas de becarios y solvente de la manera oportuna', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(354, 'Responsable que los oficiales de SAC no actualicen becarios no autorizados', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(355, 'Encargado de monitoreo de los oficiales de SAC', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(356, 'Capacidad de enseñar procesos y funciones al nuevo personal', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(357, 'Responsable de velar por el cumplimiento de las políticas y procesos del área', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(358, 'Implementar sistemas de medición de la calidad de servicio', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(359, 'Encargado de llevar los controles necesarios para monitorear la gestión de servicio al cliente', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(360, 'Entrega de constancias para remisión de apertura de Cuentas de Becarios pendientes de cuenta de ahorro', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(361, 'Y demás funciones que se le asignen', '2021-06-02 18:46:14', '2021-06-02 18:46:14', 54),
(362, 'Atención a becarios', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(363, 'Actualización de los documentos de todos los becarios a nivel nacional, requeridos por el PPBH20/20', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(364, 'Actualización de los documentos recolectados por los supervisores departamentales a nivel nacional', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(365, 'Elaboración y remisión de reporte de becarios actualizados al supervisor departamental encargado', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(366, 'Manejo de listas de incidencias y documentos no recibidos', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(367, 'Digitación de nuevos becarios autorizados por el comité de adjudicación de becas en base a nuevas convocatorias', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(368, 'Apoyo a los supervisores departamentales en actualización y revisión de documentos', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(369, 'Entrega de constancias para remisión de apertura de cuenta a Becarios pendientes de cuenta de ahorro', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(370, 'Recepción de renuncias de becarios para actualizar en sistema', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(371, 'Y demás funciones que se asignen', '2021-06-02 18:52:12', '2021-06-02 18:52:12', 55),
(372, 'Atención directa a los becarios del departamento asignado', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(373, 'Atención de las incidencias cuándo no se remiten a planillas', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(374, 'Recepción, revisión y verificación de los documentos requeridos a los becarios autorizados por el programa 20/20', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(375, 'Elaborar listas de actualización de los becarios para pago según el departamento', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(376, 'Actualizar los expedientes de los becarios del departamento asignado, según periodo académico', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(377, 'Actualizar y archivar documentos de becarios por orden alfabético y por Universidades', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(378, 'Verificar la base de los becarios según los departamentos correspondientes', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(379, 'Realizar traslados de centros universitarios', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(380, 'Elaborar informes que solicite la Gerencia de Operaciones', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(381, 'Recolección de documentos para la actualización de los becarios', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(382, 'Gestionar información de los estudiantes becarios del programa a las Universidades con convenios a nivel nacional de acuerdo a la asignación de cada supervisor', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(383, 'Monitoreo de cambios de periodos académicos con la diferentes Universidades a nivel nacional', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(384, 'Elaboración de actas de revisión de expedientes/convenios de becarios remitidos a pago', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(385, 'Y demás funciones que se le asignen', '2021-06-02 19:00:10', '2021-06-02 19:00:10', 56),
(386, 'Generación de reportes del departamento de operaciones', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(387, 'Elaboración de pre planilla para remisión a la Gerencia Administrativa', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(388, 'Generación de herramientas para optimizar el trabajo en el área de operaciones (matrices de convenios, verificaciones de pago, estado del becario)', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(389, 'Actualización diaria de la base de datos de becario', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(390, 'Planificación de actividades generales del área de operaciones', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(391, 'Verificación de becarios egresados, retención de pago, en práctica, no actualizados', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(392, 'Validación de base de datos actualizadas por periodo/universidad a nivel nacional', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57);
INSERT INTO `funciones` (`id`, `nombre`, `created_at`, `updated_at`, `cargo_id`) VALUES
(393, 'Verificación de convenios con base a los registros de becarios actualizados', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(394, 'Elaboración de reporte de convenios a los Supervisores departamentales, enlaces de cada universidad', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(395, 'Verificación de renuncias de becarios para reportar al área administrativa y confirmar estado en el sistemaVerificar la actualización de base de datos por departamentos', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(396, 'Y demás funciones que se le asignen', '2021-06-02 19:16:48', '2021-06-02 19:16:48', 57),
(397, 'Coordinar la actualización de los documentos del área de archivo', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(398, 'Recepción de expedientes de los supervisores departamentales, servicio al cliente para su revisión, digitación, archivo y custodia', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(399, 'Organizar los documentos por departamento y universidades para su archivo', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(400, 'Custodia de los expedientes a nivel nacional', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(401, 'Manejo de un control de expedientes prestados al personal y áreas autorizadas', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(402, 'Apoyo al personal de operaciones en eventos de actualización de becarios a nivel nacional cuándo sea requerido', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(403, 'Digitalización de documentos administrativos y áreas a fin', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(404, 'Y demás funciones que se le asignen', '2021-06-02 19:21:30', '2021-06-02 19:21:30', 58),
(405, 'Digitalizar los expedientes de los becarios a nivel nacional', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(406, 'Recepción de expedientes de los supervisores departamentales para su revisión y digitación', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(407, 'Organizar los documentos por departamento y universidades para su archivo', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(408, 'Implementar una herramienta digital para consulta de los expedientes digitalizados', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(409, 'Recomendar los recursos que requiere el sistema informático para salvaguardar la información digital de la institución', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(410, 'Elaboración de informes por departamento de los expedientes y documentos digitalizados', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(411, 'Y demás funciones que se le asignen', '2021-06-02 19:25:10', '2021-06-02 19:25:10', 59),
(412, 'Dictar los lineamientos estratégicos en base a lo expuesto por la autoridad máxima.', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(413, 'Gerenciar el equipo para el logro de los objetivos.', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(414, 'Evaluar, coordinar, ejecutar y acompañar las actividades de voluntariado y formación a nivel nacional, de la mano con sus	S colaboradores.', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(415, 'Velar por el clima laboral y las necesidades de los colaboradores bajo su mando', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(416, 'Otorgar visto bueno a las propuestas de nuevos liderazgos presentados por la Subgerencia (guías y embajadores)', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(417, 'Coordinar las oficinas Regionales', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(418, 'Las demás que asignaciones de la máxima autoridad', '2021-06-02 19:27:48', '2021-06-02 19:27:48', 60),
(419, 'Recibir, enviar, archivar y dar seguimiento a la documentación de la gerencia', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(420, 'Ser enlace con Gerencia Administrativa', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(421, 'Dar seguimiento y en los casos correspondientes cumplimieto de los que asigne la gerencia de seguimiento', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(422, 'Apoyo en tabulación de horas de los becarios', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(423, 'Dar información en cuánto al seguimiento del cumplimientode horas por parte de los becarios', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(424, 'Apoyo logístico para las actividades del cumplimiento de horas', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(425, 'Apoyo en cubrir actividades del Programa en cumplimiento de horas', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(426, 'Atender a los becarios siempre que sea necesario', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(427, 'Apoyo logístico de las actividades en general del programa', '2021-06-02 19:31:43', '2021-06-02 19:31:43', 61),
(428, 'Encargado de dar seguimiento al cumplimiento de las asignaciones y metas establecidas por el gerente', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(429, 'Evaluar propuestas de nuevos liderazgos', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(430, 'Monitorear y controlar las horas de voluntariado', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(431, 'Aprobar perfiles de guías y embajadores basado en parámetros establecidos por la gerencia', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(432, 'Presentar propuestas de promoción y de remoción de guías y embajadores a la gerencia de seguimiento para su respectiva aprobación', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(433, 'Supervisar al personal bajo su cargo', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(434, 'Brindar informes a la gerencia de seguimiento de las actividades realizadas', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(435, 'Demás funciones que se le asignen relacionadas al cargo', '2021-06-02 19:38:35', '2021-06-02 19:38:35', 62),
(436, 'Restructuración, validación y depuración de las bases de estructuras a nivel nacional', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(437, 'Creación de base general de horas, (tabulación, consolidación de horas)', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(438, 'Creación de formatos de evaluación para estructuras de trabajo', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(439, 'Supervisión del proceso de tabulación de horas', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(440, 'Atención al becario (actualización en base de datos, consultas, etc.)', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(441, 'Elaboración y envío de formatos para notificaciones, a través de call center', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(442, 'Seguimiento y retroalimentación a embajadores, guías, becarios sobre su estructura, llamados de atención, ascensos, descensos, actualizaciones, etc.', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(443, 'Elaboración de informes', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(444, 'Generación de estadísticas de las diferentes bases', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(445, 'Actualización de las bases de estructuras, con las pre-planillas envíadas a pago mensualmente', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(446, 'Apoyo logístico en distintas actividades', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(447, 'Distintos trabajos asignados por los gerentes de seguimiento', '2021-06-02 19:45:22', '2021-06-02 19:45:22', 63),
(448, 'Restructuración total de la base de datos de embajadores guías y becarios', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(449, 'Atención al becario, para la solución de conflictos que surgen entre él y el guía', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(450, 'Constante procesos de entrevistas para los becarios que quieren emprender en el tema de liderazgo y puedan formar parte de la estructura 20/20, así cómo los guías que quieren ser embajadores', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(451, 'Creación de estructuras dentro de las universidades', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(452, 'Seguimiento a todos los jóvenes, para mantener una línea de trabajo conforme a lo establecido por la gerencia de seguimiento en el tema de liderazgo', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(453, 'Coordinación de todos los grupos de respuesta a nivel nacional, en tema de liderazgo', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(454, 'Estar atento a todas las instrucciones que brinden las autoridades para activar las convocatorias', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(455, 'Evaluación constante a todos los guías y embajadores', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(456, 'Apoyo en logística cuándo se realizan actividades de voluntariados masivas', '2021-06-02 19:50:34', '2021-06-02 19:50:34', 64),
(457, 'Atención personal y a través de llamadas a becarios de Francisco Morazán y Regionales', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(458, 'Restructuración de la plataforma de becarios', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(459, 'Coordinación de actividades de voluntariado tanto de Francisco Morazán como de las regionales', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(460, 'Seguimiento y evaluación del manejo de las regionales', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(461, 'Planificación de actividades de voluntariado en Francisco Morazán y regionales', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(462, 'Gestionar patrocinios para las actividades de voluntariado', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(463, 'Visitas a las regionales para evaluación y seguimiento de estructura organizacional de los becarios y de sus coordinadores', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(464, 'Reuniones con coordinadores de casas y embajadores', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(465, 'Alianzas estratégicas', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(466, 'Actualización de base de datos', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(467, 'Realización de informe de giras', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(468, 'Realización de actividades del programa', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(469, 'Revisar en el sistema estatus de becarios', '2021-06-02 19:55:34', '2021-06-02 19:55:34', 65),
(470, 'Planificación de capacitaciones y actividades de voluntariado', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(471, 'Convocatoria a actividades masivas por solicitud de diversas instituciones', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(472, 'Creación de formatos para control de asistencia o recepción de insumo para los becarios', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(473, 'Supervisión de la ejecución de las actividades y capacitaciones de voluntariado', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(474, 'Atención al becario (solución de problemas de pago, solución de problemas de horas de voluntariado , consultas)', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(475, 'Elaboración de comunicados para difusión de los becarios sobre las diversas actividades', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(476, 'Redacción de información para el departamento de comunicaciones para elaboración de artes y publicaciones en las redes institucionales', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(477, 'Elaboración de informes sobre las actividades realizadas', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(478, 'Control de asistencia y convocatoria en las actividades', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(479, 'Alianzas y enlace con instituciones, empresas y organizaciones', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(480, 'Apoyo logístico en distintas actividades', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(481, 'Distintos trabajos asignados por los gerentes de seguimiento', '2021-06-02 20:02:20', '2021-06-02 20:02:20', 66),
(482, 'Representar al programa externa e internamente', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(483, 'Organizar la estructura de los becarios', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(484, 'Planificar y organizar las actividades de voluntariado', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(485, 'Supervisión de la ejecución de las actividades de voluntariado', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(486, 'Gestionar ante las universidades documentación', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(487, 'Gestionar ayudas y recolecciones para las donaciones', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(488, 'Atender a los becarios en sus gestiones', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(489, 'Gestionar las necesidades operativas', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(490, 'Capacitaciones a los becarios en temas trascendentales den sus vidas', '2021-06-02 20:06:12', '2021-06-02 20:06:12', 67),
(491, 'Dar respuesta a ciertos problemas que presentan cada beneficiario del PPBH2020 en diferentes temas, gestiones, procesos', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(492, 'Ofrecer la mejor atención y apoyo logístico para el seguimiento del programa dentro del departamento', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(493, 'Estar a la disposición a cualquier información o docuemntación que sea pedida por parte de las autoridades del programa', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(494, 'Presentar mensualmente informes de tabulación de horas de voluntariado de actividades del programa', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(495, 'Coordinar, planificar y relizar las actividades del voluntariado social', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(496, 'Trabajar con las autoridades superiores, embajadores y los guías universitarios para coordinar las tareas de voluntariado en los distintos campos de actuación', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(497, 'Colaborar con otros miembros, autoridades regionales y miembros de la comunidad pueden involucrarse como voluntarios', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(498, 'Dar respuesta a ciertos problemas que presenten cada beneficiario del PPBH2020 en diferentes temas, gestiones procesos.', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(499, 'Ofrecer la mejor atención y apoyo logístico para el seguimiento del programa dentro del departamento', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(500, 'Estar a la disposición a cualquier información o documentación que sea pedida por parte de las autoridades del programa', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(501, 'Presentar mensualmente informes de tabulación de horas de voluntariado de actividades del programa', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(502, 'Coordinar, Planificar y realizar las Actividades del voluntariado social', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(503, 'Trabajar con las autoridades superiores, embajadores y los guías universitarios para coordinar las tareas de voluntariado en los distintos campos de actuación', '2021-06-02 20:14:43', '2021-06-02 20:14:43', 68),
(504, 'Dar seguimiento a los becarios beneficiarios de esta zona en el marco de acción social juvenil', '2021-06-02 20:19:58', '2021-06-02 20:19:58', 69),
(505, 'Apoyo a oficina central en la organización de eventos de capacitación a los beneficiarios de este sector', '2021-06-02 20:19:58', '2021-06-02 20:19:58', 69),
(506, 'Recepción de documentos para elaboración de expedientes de aplicación y actualización para becas', '2021-06-02 20:19:58', '2021-06-02 20:19:58', 69),
(507, 'Dar seguimiento a los Becarios con problemas de Pago', '2021-06-02 20:19:58', '2021-06-02 20:19:58', 69),
(508, 'Planificar y organizar las actividades de voluntariado', '2021-06-02 20:19:58', '2021-06-02 20:19:58', 69),
(509, 'Dar respuesta a ciertos problemas que presentan cada beneficiario del PPB2020 en diferentes temas, gestiones, procesos', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(510, 'Ofrecer la mejor atención y apoyo logístico para el seguimiento del programa dentro del Departamento', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(511, 'Estar a la disposición a cualquier información o documentación que sea pedida', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(512, 'Presentar mensualmente informes de tabulación de horas de voluntariado de actividades del programa', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(513, 'Coordinar, Planificar y realizar las actividades del voluntariado social', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(514, 'Trabajar con las autoridades superiores, embajadores y guías universitarios para coordinar las tareas de voluntariado en los distintos campos de actuación', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(515, 'Colaborar con otros miembros, autoridades, regionales y  miembros de la comunidad pueden involucrarse como voluntarios', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(516, 'Dar respuesta a ciertos problemas que presentan cada beneficiario del PPBH2020 en diferentes temas, gestiones, procesos', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(517, 'Ofrecer la mejor atención y apoyo logístico para el seguimiento del programa dentro del Departamento', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(518, 'Estar a disposición a cualquier información o documentación que sea pedida por parte de las autoridades del programa', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(519, 'Presentar mensualmente informes de tabulación  de horas de voluntariado de actividades del programa', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(520, 'Coordinar, planificar y realizar las actividades del voluntariado social', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(521, 'Trabajar con las autoridades superiores, embajadores y los guías universitarios para coordinar las tareas de voluntariado en los distintos campos de actuación', '2021-06-02 20:31:20', '2021-06-02 20:31:20', 70),
(522, 'Recepcionar y revisar documentación para formular expedientes', '2021-06-02 20:35:21', '2021-06-02 20:35:21', 71),
(523, 'Recepcionar y revisar documentos para actualización', '2021-06-02 20:35:21', '2021-06-02 20:35:21', 71),
(524, 'Apoyo a las diversas actividades de voluntariado programadas por coordinación regional', '2021-06-02 20:35:21', '2021-06-02 20:35:21', 71),
(525, 'Atención al público sobre información acerca del programa', '2021-06-02 20:35:21', '2021-06-02 20:35:21', 71),
(526, 'Brindar apoyo a coordinación regional en las diferentes funciones', '2021-06-02 20:35:21', '2021-06-02 20:35:21', 71);

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

--
-- Volcado de datos para la tabla `grado_academico`
--

INSERT INTO `grado_academico` (`id`, `grado`, `created_at`, `updated_at`) VALUES
(1, 'PRIMARIA', NULL, NULL),
(2, 'SECUNDARIA', NULL, NULL),
(3, 'UNIVERDIDAD INC.', NULL, NULL),
(4, 'UNIVERSIDAD COM.', NULL, NULL),
(5, 'POSTGRADO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `tipo_horario` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `tipo_horario`, `created_at`, `updated_at`) VALUES
(1, 'PRESENCIAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_cargo`
--

CREATE TABLE `log_cargo` (
  `id` int(11) NOT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `nombre_cargo` varchar(150) DEFAULT NULL,
  `empleado_id` int(11) DEFAULT NULL,
  `contrato_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_sueldos`
--

CREATE TABLE `log_sueldos` (
  `id` int(11) NOT NULL,
  `sueldo` double DEFAULT NULL,
  `empleado_id` int(11) DEFAULT NULL,
  `contrato_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log_sueldos`
--

INSERT INTO `log_sueldos` (`id`, `sueldo`, `empleado_id`, `contrato_id`, `created_at`, `updated_at`) VALUES
(14, 20000, 3015, 64, '2021-05-31 21:32:33', '2021-05-31 21:32:33'),
(15, 25000, 3015, 64, '2021-05-31 21:33:40', '2021-05-31 21:33:40'),
(16, 26000, 3015, 64, '2021-05-31 21:35:08', '2021-05-31 21:35:08');

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
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `sueldo_mensual` varchar(45) NOT NULL,
  `catorcena` varchar(45) NOT NULL,
  `llegadas_tarde_monto` double NOT NULL,
  `total_deducciones` varchar(45) NOT NULL,
  `sueldo_neto` varchar(45) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `nombre_empleado` varchar(45) NOT NULL,
  `identidad` varchar(13) NOT NULL,
  `planilla_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `ajuste_salarial` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `sueldo_mensual`, `catorcena`, `llegadas_tarde_monto`, `total_deducciones`, `sueldo_neto`, `empleado_id`, `nombre_empleado`, `identidad`, `planilla_id`, `created_at`, `updated_at`, `ajuste_salarial`) VALUES
(35, '19000', '9500', 2247, '2997', '6503', 3015, 'YEFRY ROLANDO ORTIZ ZERON', '0801199615145', 19, '2021-06-01 22:22:59', '2021-06-01 22:22:59', NULL),
(36, '18000', '9000', 1100, '2350', '6650', 3020, 'LUIS FERNANDO AVILES GUEVARA', '0822199500082', 19, '2021-06-01 22:22:59', '2021-06-01 22:22:59', NULL),
(37, '19000', '9500', 0, '0', '9500', 3015, 'YEFRY ROLANDO ORTIZ ZERON', '0801199615145', 20, '2021-06-01 22:24:50', '2021-06-01 22:24:50', NULL),
(38, '18000', '9000', 0, '0', '9000', 3020, 'LUIS FERNANDO AVILES GUEVARA', '0822199500082', 20, '2021-06-01 22:24:50', '2021-06-01 22:24:50', NULL),
(39, '19000', '9500', 0, '0', '9500', 3015, 'YEFRY ROLANDO ORTIZ ZERON', '0801199615145', 21, '2021-06-01 22:32:49', '2021-06-01 22:32:49', NULL),
(40, '18000', '9000', 0, '0', '9000', 3020, 'LUIS FERNANDO AVILES GUEVARA', '0822199500082', 21, '2021-06-01 22:32:49', '2021-06-01 22:32:49', NULL),
(41, '19000', '9500', 2247, '2998.3', '6501.7', 3015, 'YEFRY ROLANDO ORTIZ ZERON', '0801199615145', 22, '2021-06-01 22:50:01', '2021-06-01 22:50:01', NULL),
(42, '18000', '9000', 1100, '2356.55', '6643.45', 3020, 'LUIS FERNANDO AVILES GUEVARA', '0822199500082', 22, '2021-06-01 22:50:01', '2021-06-01 22:50:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_deducciones_fijas`
--

CREATE TABLE `pagos_deducciones_fijas` (
  `id` int(11) NOT NULL,
  `deduccion_fija_id` int(11) NOT NULL,
  `nombre_deduccion` varchar(45) NOT NULL,
  `monto` double NOT NULL,
  `pagos_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_deducciones_fijas`
--

INSERT INTO `pagos_deducciones_fijas` (`id`, `deduccion_fija_id`, `nombre_deduccion`, `monto`, `pagos_id`, `created_at`, `updated_at`) VALUES
(85, 23, 'IHSS', 200, 35, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(86, 24, 'RAP', 250, 35, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(87, 25, 'ISR', 300, 35, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(88, 23, 'IHSS', 200, 36, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(89, 24, 'RAP', 250, 36, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(90, 25, 'ISR', 300, 36, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(91, 23, 'IHSS', 200.5, 41, '2021-06-01 22:50:01', '2021-06-01 22:50:01'),
(92, 24, 'RAP', 250.5, 41, '2021-06-01 22:50:01', '2021-06-01 22:50:01'),
(93, 25, 'ISR', 300.3, 41, '2021-06-01 22:50:01', '2021-06-01 22:50:01'),
(94, 23, 'IHSS', 200.5, 42, '2021-06-01 22:50:01', '2021-06-01 22:50:01'),
(95, 24, 'RAP', 250.5, 42, '2021-06-01 22:50:01', '2021-06-01 22:50:01'),
(96, 25, 'ISR', 300.3, 42, '2021-06-01 22:50:01', '2021-06-01 22:50:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_deducciones_variables`
--

CREATE TABLE `pagos_deducciones_variables` (
  `id` int(11) NOT NULL,
  `deduccion_variable_id` int(11) NOT NULL,
  `nombre_deduccion` varchar(45) NOT NULL,
  `monto` double NOT NULL,
  `pagos_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_deducciones_variables`
--

INSERT INTO `pagos_deducciones_variables` (`id`, `deduccion_variable_id`, `nombre_deduccion`, `monto`, `pagos_id`, `created_at`, `updated_at`) VALUES
(21, 1, 'AHORRO Y CREDITO', 500, 36, '2021-06-01 22:22:59', '2021-06-01 22:22:59'),
(22, 1, 'AHORRO Y CREDITO', 505.25, 42, '2021-06-01 22:50:01', '2021-06-01 22:50:01');

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
  `permiso_id` int(11) DEFAULT NULL,
  `fecha_inicio` timestamp NULL DEFAULT NULL,
  `fecha_final` timestamp NULL DEFAULT NULL,
  `fecha_inicio_aprobada` timestamp NULL DEFAULT NULL,
  `fecha_final_aprobada` timestamp NULL DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `tipo_permiso_id` int(11) NOT NULL,
  `estado_permiso_jefe_id` int(11) DEFAULT NULL,
  `estado_permiso_rrhh_id` int(11) DEFAULT NULL,
  `empleado_rrhh_aprueba_id` int(11) DEFAULT NULL,
  `empleado_jefe_aprueba` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso_id`, `fecha_inicio`, `fecha_final`, `fecha_inicio_aprobada`, `fecha_final_aprobada`, `hora_inicio`, `hora_final`, `motivo`, `empleado_id`, `tipo_permiso_id`, `estado_permiso_jefe_id`, `estado_permiso_rrhh_id`, `empleado_rrhh_aprueba_id`, `empleado_jefe_aprueba`, `created_at`, `updated_at`) VALUES
(83, NULL, '2021-04-29 14:00:00', '2021-04-29 14:00:00', '2021-04-29 14:00:00', '2021-04-29 19:00:00', '08:00:00', '13:00:00', 'ENFERMEDAD', 3020, 10, 1, 4, NULL, NULL, '2021-05-31 22:39:45', '2021-05-31 22:39:45'),
(85, 85, '2021-05-04 06:00:00', '2021-05-04 06:00:00', '2021-05-04 06:00:00', '2021-05-06 06:00:00', '08:00:00', '17:00:00', 'NADA', 3015, 10, 1, 4, 3016, NULL, '2021-05-31 22:43:41', '2021-05-31 22:43:41'),
(86, 85, '2021-05-05 06:00:00', '2021-05-05 06:00:00', '2021-05-04 06:00:00', '2021-05-06 06:00:00', '08:00:00', '17:00:00', 'NADA', 3015, 10, 1, 4, 3016, NULL, '2021-05-31 22:43:41', '2021-05-31 22:43:41'),
(87, 85, '2021-05-06 06:00:00', '2021-05-06 06:00:00', '2021-05-04 06:00:00', '2021-05-06 06:00:00', '08:00:00', '17:00:00', 'NADA', 3015, 10, 1, 4, 3016, NULL, '2021-05-31 22:43:41', '2021-05-31 22:43:41'),
(88, 88, '2021-05-03 20:00:00', '2021-05-03 20:00:00', '2021-05-03 20:00:00', '2021-05-03 23:00:00', '14:00:00', '17:00:00', 'pruebas', 3015, 8, 3, 5, NULL, NULL, '2021-05-31 22:57:26', '2021-05-31 22:57:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_mdia`
--

CREATE TABLE `permisos_mdia` (
  `id` int(11) NOT NULL,
  `fecha_dia` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `empleado_registra` int(11) NOT NULL,
  `tanda_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos_mdia`
--

INSERT INTO `permisos_mdia` (`id`, `fecha_dia`, `hora_inicio`, `hora_final`, `empleado_id`, `empleado_registra`, `tanda_id`, `created_at`, `updated_at`) VALUES
(25, '2021-04-26', '08:00:00', '13:00:00', 3020, 3016, 1, '2021-05-31 22:35:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `codigo_unico` varchar(20) NOT NULL,
  `numero_memo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `identidad` varchar(13) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `empleado_genera_id` int(11) NOT NULL,
  `total_pago_planilla` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planilla`
--

INSERT INTO `planilla` (`id`, `codigo_unico`, `numero_memo`, `nombre`, `identidad`, `fecha_inicio`, `fecha_final`, `empleado_genera_id`, `total_pago_planilla`, `created_at`, `updated_at`) VALUES
(22, '1622587801', 'uu', 'HAZEL ALEJANDRA ESCOBAR RAMIREZ', '0801198210044', '2021-04-26', '2021-05-07', 3016, 13145.15, '2021-06-01 22:50:01', '2021-06-01 22:50:01');

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
  `empleado_id` int(11) NOT NULL,
  `estatus_referencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `referencia`
--

INSERT INTO `referencia` (`id`, `nombre`, `identidad`, `telefono`, `email`, `direccion`, `parentezco`, `created_at`, `updated_at`, `empleado_id`, `estatus_referencia_id`) VALUES
(972, 'Claudia Lozano Lopez', '0801197056981', '99568965', 'Aryani.Lainez@email.swbts.edu', 'Col. Humuya, Casa 1025, Tegucigalpa', 'VECINO', '2021-05-31 17:27:52', '2021-05-31 17:27:52', 3016, 1),
(976, 'CARLOS RUIZ PAVON', '0801199525956', '95863254', 'Aryani.Lainez@email.swbts.edu', 'Col. Humuya, Casa 1025, Tegucigalpa, Honduras', 'AMIGO(A)', '2021-05-31 18:35:44', '2021-05-31 18:35:44', 3020, 1),
(977, 'RICARDO FLORES CAMPO', '0801197045123', '98653214', 'Aryani.Lainez@email.swbts.edu', 'Col. Humuya, Casa 1025, Tegucigalpa, Honduras', 'PRIMO(A)', '2021-06-01 21:53:27', '2021-06-01 21:53:27', 3015, 1),
(978, 'Norma Irias Lopez', '0501197500256', '+50497894224', 'Aryani.Lainez@email.swbts.edu', 'Col. Humuya, Casa 1025, Tegucigalpa, Honduras', 'TIO(A)', '2021-06-02 14:48:45', '2021-06-02 14:48:45', 3021, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('fZ4iKDxzgrtM0B1TWZbq04eZjr9w6zECyJtrado6', 32, '10.62.144.245', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVlpuRmd0S0ZEa2lSQzJEakJGbVl5MjZPSWY2Q3lsbUU0NDUweUQ2RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMC42Mi4xNDQuMjQ1OjgwMDAvZW1wbGVhZG8vcGVyZmlsLzMwMTUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE05bWw3cks1ektJM0ZwYzRYQjNmdmU0UkpKTW9TSTFCS0Jhbldvbm4xSWFrdU1YM2tMbE5xIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRNOW1sN3JLNXpLSTNGcGM0WEIzZnZlNFJKSk1vU0kxQktCYW5Xb25uMUlha3VNWDNrTGxOcSI7fQ==', 1622667116);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanda`
--

CREATE TABLE `tanda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tanda`
--

INSERT INTO `tanda` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ENTRADA', NULL, NULL),
(2, 'SALIDA', NULL, NULL);

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
(19, 32, 'Yefry\'s Team', 1, '2021-05-31 16:40:24', '2021-05-31 16:40:24'),
(20, 33, 'HAZEL\'s Team', 1, '2021-05-31 17:27:52', '2021-05-31 17:27:52'),
(21, 37, 'LUIS\'s Team', 1, '2021-05-31 18:35:44', '2021-05-31 18:35:44'),
(22, 38, 'CARLOS\'s Team', 1, '2021-06-02 14:48:46', '2021-06-02 14:48:46');

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
-- Estructura de tabla para la tabla `techos`
--

CREATE TABLE `techos` (
  `id` int(11) NOT NULL,
  `porcentaje` double DEFAULT NULL,
  `rango_inicio` double DEFAULT NULL,
  `rango_final` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deducciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `techos`
--

INSERT INTO `techos` (`id`, `porcentaje`, `rango_inicio`, `rango_final`, `created_at`, `updated_at`, `deducciones_id`) VALUES
(4, 10, 18000, 30000, '2021-04-21 14:29:45', '2021-04-23 14:28:44', 23),
(5, 1.5, 15000, 23000, '2021-04-21 14:30:13', '2021-04-21 14:30:13', 24),
(6, 0.15, 16000, 25000, '2021-04-21 14:30:44', '2021-04-21 14:30:44', 25),
(15, 2.5, 15000, 25000, '2021-04-22 16:32:26', '2021-04-22 16:32:26', 23),
(16, 2.5, 15, 25000, '2021-04-23 14:28:33', '2021-04-23 14:28:33', 23);

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
  `nombre_` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_deducciones`
--

INSERT INTO `tipo_deducciones` (`id`, `nombre_`, `created_at`, `updated_at`) VALUES
(1, 'VARIANTE', NULL, NULL),
(2, 'GENERAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_deducciones_variables`
--

CREATE TABLE `tipo_deducciones_variables` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_tdv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_deducciones_variables`
--

INSERT INTO `tipo_deducciones_variables` (`id`, `nombre`, `created_at`, `updated_at`, `estado_tdv_id`) VALUES
(1, 'AHORRO Y CREDITO', NULL, '2021-05-31 21:39:54', 1),
(2, 'LEGALES', NULL, '2021-05-10 14:25:06', 1),
(3, 'SALUD', NULL, '2021-05-10 14:25:12', 1),
(4, 'ADMINISTRATIVO', NULL, '2021-05-10 14:25:17', 1);

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

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'COLABORADOR', NULL, NULL),
(2, 'GERENTE', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gose_sueldo`
--

CREATE TABLE `tipo_gose_sueldo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_gose_sueldo`
--

INSERT INTO `tipo_gose_sueldo` (`id`, `tipo`) VALUES
(1, 'Con goce de sueldo'),
(2, 'Sin goce de sueldo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_permiso`
--

CREATE TABLE `tipo_permiso` (
  `id` int(11) NOT NULL,
  `permiso` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_gose_sueldo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_permiso`
--

INSERT INTO `tipo_permiso` (`id`, `permiso`, `created_at`, `updated_at`, `tipo_gose_sueldo_id`) VALUES
(1, 'CITA MEDICA', '2021-03-22 22:19:42', NULL, 1),
(2, 'EMERGENCIA PERSONAL O FAMILIAR', '2021-03-22 22:19:42', NULL, 1),
(5, 'SALIDA OFICIAL', NULL, NULL, 1),
(6, 'LLEGADA TARDE JUSTIFICADA', NULL, NULL, 1),
(7, 'A CUENTA DE VACACIONES', NULL, NULL, 1),
(8, 'TIEMPO COMPENSATORIO', NULL, NULL, 1),
(9, 'LLEGADA TARDE INJUSTIFICADA', NULL, NULL, 2),
(10, 'PERSONAL', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id`, `nombre`) VALUES
(1, 'ADMIN'),
(2, 'COLABORADOR'),
(3, 'JEFE RRHH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identidad` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `identidad`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `id_tipo_user`) VALUES
(32, '0801199615145', 'Yefry Ortiz', 'yefryyo@gmail.com', '2021-05-31 16:40:48', '$2y$10$M9ml7rK5zKI3Fpc4XB3fve4RJJMoSI1BKBanWonn1IakuMX3kLlNq', NULL, NULL, NULL, NULL, NULL, '2021-05-31 16:40:24', '2021-05-31 16:40:48', 1),
(33, '0801198210044', 'HAZEL ESCOBAR', 'yefry21.yo@gmail.com', '2021-05-31 17:29:35', '$2y$10$CtV1tSkuWnK47aMQYl4uRuLYpd4SrOOHfi/8cejt3q4kmRcwNcpk2', NULL, NULL, 'h51BH0qbg8xM3MJKUzzxJMyaMi9WtR5ZYx5B3SRDAvBaTGThFXZB1qDxfBvi', NULL, NULL, '2021-05-31 17:27:52', '2021-05-31 17:29:35', 3),
(37, '0822199500082', 'LUIS AVILES', 'luisfaviles18@gmail.com', '2021-05-31 18:38:13', '$2y$10$BqPH9EO.0JM2XaNFg960IegGgDbRTuFq19aRHyTj5iN0KS7k045r2', NULL, NULL, 'GOqg3uHitPbMdvKqdxv6BzFQ9Cv9A0c6fq9jprOvwfRHoLiPgactiFwLTi4g', NULL, NULL, '2021-05-31 18:35:44', '2021-05-31 18:39:17', 2),
(38, '0822199000045', 'CARLOS LOPEZ', 'carlos2020hj@gmail.com', NULL, '$2y$10$vqxtF9rgaNvP3PIusZ3ENO8PbOb6taUuHP4oBeBStxUQaM5N4kyYi', NULL, NULL, NULL, NULL, NULL, '2021-06-02 14:48:46', '2021-06-02 14:48:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones_tomadas`
--

CREATE TABLE `vacaciones_tomadas` (
  `id` int(11) NOT NULL,
  `dias` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
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
  ADD KEY `fk_Contrato_users1_idx` (`users_aprueba_id`),
  ADD KEY `fk_contrato_estatus1_idx` (`estatus_id`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deducciones_tipo_deducciones1_idx` (`tipo_deducciones_id`);

--
-- Indices de la tabla `deducciones_empleado`
--
ALTER TABLE `deducciones_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deducciones_empleado_tipo_deducciones1_idx` (`tipo_deducciones_id`),
  ADD KEY `fk_deducciones_empleado_tipo_deducciones_varibale1_idx` (`tipo_deducciones_varibale_id`),
  ADD KEY `fk_deducciones_empleado_empleado1_idx` (`empleado_id`);

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
-- Indices de la tabla `dias_horario`
--
ALTER TABLE `dias_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dias_horario_horarios1_idx` (`horarios_id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_direccion_empleado1_idx` (`empleado_id`);

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
  ADD KEY `fk_empleado_municipio1_idx` (`municipio_id`),
  ADD KEY `fk_empleado_cargo1_idx` (`cargo_id`);

--
-- Indices de la tabla `empleado_has_deducciones_fijas`
--
ALTER TABLE `empleado_has_deducciones_fijas`
  ADD PRIMARY KEY (`empleado_id`,`deducciones_id`),
  ADD KEY `fk_empleado_has_deducciones_deducciones1_idx` (`deducciones_id`),
  ADD KEY `fk_empleado_has_deducciones_empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `estado_permiso`
--
ALTER TABLE `estado_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_tdv`
--
ALTER TABLE `estado_tdv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus_referencia`
--
ALTER TABLE `estatus_referencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `feriado`
--
ALTER TABLE `feriado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feriados_estatus1_idx` (`estatus_id`),
  ADD KEY `fk_feriados_users1_idx` (`users_id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funciones_cargo1_idx` (`cargo_id`);

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
-- Indices de la tabla `log_cargo`
--
ALTER TABLE `log_cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_cargo_contrato1_idx` (`contrato_id`);

--
-- Indices de la tabla `log_sueldos`
--
ALTER TABLE `log_sueldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_sueldos_contrato1_idx` (`contrato_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio_departamento_pais1_idx` (`departamento_pais_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagos_empleado1_idx` (`empleado_id`),
  ADD KEY `fk_pagos_planilla1_idx` (`planilla_id`);

--
-- Indices de la tabla `pagos_deducciones_fijas`
--
ALTER TABLE `pagos_deducciones_fijas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagos_deducciones_fijas_pagos1_idx` (`pagos_id`);

--
-- Indices de la tabla `pagos_deducciones_variables`
--
ALTER TABLE `pagos_deducciones_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagos_deducciones_varibales_pagos1_idx` (`pagos_id`);

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
  ADD KEY `fk_permisos_tipo_permiso1_idx` (`tipo_permiso_id`),
  ADD KEY `fk_permisos_estado_permiso1_idx` (`estado_permiso_jefe_id`),
  ADD KEY `fk_permisos_estado_permiso2_idx` (`estado_permiso_rrhh_id`),
  ADD KEY `fk_Permisos_Empleado11_idx` (`empleado_id`),
  ADD KEY `fk_permisos_empleado2_idx` (`empleado_rrhh_aprueba_id`),
  ADD KEY `fk_permisos_empleado_jefe_aprueba` (`empleado_jefe_aprueba`),
  ADD KEY `fk_permisos_permisos1_idx` (`permiso_id`);

--
-- Indices de la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salidas_tarde_empleado1_idx` (`empleado_id`),
  ADD KEY `fk_salidas_tarde_empleado2_idx` (`empleado_registra`),
  ADD KEY `fk_permisos_mdia_tanda1_idx` (`tanda_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD UNIQUE KEY `codigo_unico_UNIQUE` (`codigo_unico`),
  ADD KEY `fk_planilla_empleado1_idx` (`empleado_genera_id`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_referencia_empleado1_idx` (`empleado_id`),
  ADD KEY `fk_referencia_estatus_referencia1_idx` (`estatus_referencia_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tanda`
--
ALTER TABLE `tanda`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `techos`
--
ALTER TABLE `techos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_techos_deducciones1_idx` (`deducciones_id`);

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
-- Indices de la tabla `tipo_deducciones_variables`
--
ALTER TABLE `tipo_deducciones_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_deducciones_variables_estado_tdv1_idx` (`estado_tdv_id`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_gose_sueldo`
--
ALTER TABLE `tipo_gose_sueldo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_permiso_tipo_gose_sueldo1_idx` (`tipo_gose_sueldo_id`);

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
  ADD UNIQUE KEY `identidad_UNIQUE` (`identidad`),
  ADD KEY `fk_users_Tipo_user_idx` (`id_tipo_user`);

--
-- Indices de la tabla `vacaciones_tomadas`
--
ALTER TABLE `vacaciones_tomadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vacaciones_tomadas_empleado1_idx` (`empleado_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `deducciones_empleado`
--
ALTER TABLE `deducciones_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `dias_horario`
--
ALTER TABLE `dias_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1061;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3022;

--
-- AUTO_INCREMENT de la tabla `estado_permiso`
--
ALTER TABLE `estado_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estatus_referencia`
--
ALTER TABLE `estatus_referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `feriado`
--
ALTER TABLE `feriado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `log_cargo`
--
ALTER TABLE `log_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `log_sueldos`
--
ALTER TABLE `log_sueldos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pagos_deducciones_fijas`
--
ALTER TABLE `pagos_deducciones_fijas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `pagos_deducciones_variables`
--
ALTER TABLE `pagos_deducciones_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=979;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tanda`
--
ALTER TABLE `tanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `techos`
--
ALTER TABLE `techos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_accion`
--
ALTER TABLE `tipo_accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_deducciones`
--
ALTER TABLE `tipo_deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_deducciones_variables`
--
ALTER TABLE `tipo_deducciones_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  ADD CONSTRAINT `fk_Contrato_users1` FOREIGN KEY (`users_aprueba_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contrato_estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD CONSTRAINT `fk_deducciones_tipo_deducciones1` FOREIGN KEY (`tipo_deducciones_id`) REFERENCES `tipo_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deducciones_empleado`
--
ALTER TABLE `deducciones_empleado`
  ADD CONSTRAINT `fk_deducciones_empleado_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deducciones_empleado_tipo_deducciones1` FOREIGN KEY (`tipo_deducciones_id`) REFERENCES `tipo_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deducciones_empleado_tipo_deducciones_varibale1` FOREIGN KEY (`tipo_deducciones_varibale_id`) REFERENCES `tipo_deducciones_variables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_Empleado1` FOREIGN KEY (`empleado_encargado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dias_horario`
--
ALTER TABLE `dias_horario`
  ADD CONSTRAINT `fk_dias_horario_horarios1` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_direccion_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_empleado_cargo1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_has_deducciones_fijas`
--
ALTER TABLE `empleado_has_deducciones_fijas`
  ADD CONSTRAINT `fk_empleado_has_deducciones_deducciones1` FOREIGN KEY (`deducciones_id`) REFERENCES `deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_has_deducciones_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `feriado`
--
ALTER TABLE `feriado`
  ADD CONSTRAINT `fk_feriados_estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feriados_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `fk_funciones_cargo1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_cargo`
--
ALTER TABLE `log_cargo`
  ADD CONSTRAINT `fk_log_cargo_contrato1` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_sueldos`
--
ALTER TABLE `log_sueldos`
  ADD CONSTRAINT `fk_log_sueldos_contrato1` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento_pais1` FOREIGN KEY (`departamento_pais_id`) REFERENCES `departamento_pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagos_planilla1` FOREIGN KEY (`planilla_id`) REFERENCES `planilla` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos_deducciones_fijas`
--
ALTER TABLE `pagos_deducciones_fijas`
  ADD CONSTRAINT `fk_pagos_deducciones_fijas_pagos1` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos_deducciones_variables`
--
ALTER TABLE `pagos_deducciones_variables`
  ADD CONSTRAINT `fk_pagos_deducciones_varibales_pagos1` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_Permisos_Empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_empleado2` FOREIGN KEY (`empleado_rrhh_aprueba_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_empleado3` FOREIGN KEY (`empleado_jefe_aprueba`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_estado_permiso1` FOREIGN KEY (`estado_permiso_jefe_id`) REFERENCES `estado_permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_estado_permiso2` FOREIGN KEY (`estado_permiso_rrhh_id`) REFERENCES `estado_permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_permisos1` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_permisos_tipo_permiso1` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipo_permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
  ADD CONSTRAINT `fk_permisos_mdia_tanda1` FOREIGN KEY (`tanda_id`) REFERENCES `tanda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salidas_tarde_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salidas_tarde_empleado2` FOREIGN KEY (`empleado_registra`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD CONSTRAINT `fk_planilla_empleado1` FOREIGN KEY (`empleado_genera_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD CONSTRAINT `fk_referencia_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_referencia_estatus_referencia1` FOREIGN KEY (`estatus_referencia_id`) REFERENCES `estatus_referencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `techos`
--
ALTER TABLE `techos`
  ADD CONSTRAINT `fk_techos_deducciones1` FOREIGN KEY (`deducciones_id`) REFERENCES `deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_deducciones_variables`
--
ALTER TABLE `tipo_deducciones_variables`
  ADD CONSTRAINT `fk_tipo_deducciones_variables_estado_tdv1` FOREIGN KEY (`estado_tdv_id`) REFERENCES `estado_tdv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  ADD CONSTRAINT `fk_tipo_permiso_tipo_gose_sueldo1` FOREIGN KEY (`tipo_gose_sueldo_id`) REFERENCES `tipo_gose_sueldo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_Tipo_user` FOREIGN KEY (`id_tipo_user`) REFERENCES `tipo_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones_tomadas`
--
ALTER TABLE `vacaciones_tomadas`
  ADD CONSTRAINT `fk_vacaciones_tomadas_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `inactivacion_estados_empleado_contrato` ON SCHEDULE EVERY 23 HOUR STARTS '2021-05-13 09:35:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
        UPDATE contrato INNER JOIN empleado ON empleado.id = contrato.empleado_id 
        SET contrato.estatus_id = 2, empleado.estatus_id = 2 
        WHERE contrato.fecha_fin = CURDATE() AND contrato.estatus_id = 1;
    END$$

CREATE DEFINER=`root`@`localhost` EVENT `activacion_estados_empleado_contrato` ON SCHEDULE EVERY 23 HOUR STARTS '2021-05-12 01:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
            UPDATE contrato INNER JOIN empleado ON empleado.id = contrato.empleado_id 
            SET contrato.estatus_id = 1, empleado.estatus_id = 1 
            WHERE contrato.fecha_inicio = CURDATE() AND contrato.estatus_id = 2;
        END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
