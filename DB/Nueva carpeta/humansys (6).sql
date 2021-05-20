-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 16:13:07
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
  `empleado_encargado_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `codigo`, `empleado_encargado_id`, `departamento_id`, `created_at`, `updated_at`) VALUES
(1, 'SUB DIRECCION', 'SUB', 7, 1, NULL, NULL),
(2, 'ASISTENCIA', 'DAS', 7, 1, NULL, NULL),
(3, 'GERENCIA', 'AGE', 7, 2, NULL, NULL),
(4, 'CONTABILIDAD', 'ACO', 7, 2, NULL, NULL),
(5, 'PLANILLA', 'APL', 7, 2, NULL, NULL),
(6, 'ADQUISICIONES', 'AAD', 7, 2, NULL, NULL),
(7, 'SISTEMAS', 'ASI', 7, 2, NULL, NULL),
(8, 'LEGAL', 'ALE', 7, 2, NULL, NULL),
(9, 'ASISTENCIA', 'AAS', 7, 2, NULL, NULL),
(10, 'SERVICIOS GENERALES', 'ASE', 4, 2, NULL, NULL),
(11, 'GERENCIA', 'OGE', 4, 3, NULL, NULL),
(12, 'ASISTENCIA', 'OAS', 4, 3, NULL, NULL),
(13, 'ADMINISTRATIVA', 'OAD', 4, 3, NULL, NULL),
(14, 'BECA ASISTIR', 'OBA', 4, 3, NULL, NULL),
(15, 'INFORMATICA', 'OIN', 4, 3, NULL, NULL),
(16, 'SUPERVICION', 'OSU', 4, 3, NULL, NULL),
(17, 'DEPARTAMENTALES', 'ODE', 4, 3, NULL, NULL),
(18, 'ATENCION AL CLIENTE', 'OAT', 4, 3, NULL, NULL),
(19, 'ARCHIVO', 'OAR', 4, 3, NULL, NULL),
(20, 'GERENCIA', 'SGE', 4, 4, NULL, NULL),
(21, 'ASISTENCIA', 'SAS', 4, 4, NULL, NULL),
(22, 'SUB-GERENCIA DE VOLUNTARIADO', 'SSV', 4, 4, NULL, NULL),
(23, 'SUB-GERENCIA DE ESTRATEGIA', 'SSE', 4, 4, NULL, NULL),
(24, 'ATENCION AL CLIENTE', 'SAC', 4, 4, NULL, NULL),
(25, 'INFORMATICA', 'SIN', 4, 4, NULL, NULL),
(26, 'GERENCIA', 'CGE', 3, 5, NULL, NULL),
(27, 'DISEÑO GRAFICO', 'CDG', 3, 5, NULL, NULL),
(28, 'EVENTOS', 'CEV', 3, 5, NULL, NULL),
(29, 'PUBLICIDAD', 'CPU', 3, 5, NULL, NULL),
(30, 'REDES SOCIALES', 'CRS', 3, 5, NULL, NULL),
(31, 'GERENCIA', 'IGE', 3, 6, NULL, NULL),
(32, 'SUB GERENCIA', 'ISG', 3, 6, NULL, NULL),
(33, 'SUPERVISIÓN', 'ISU', 3, 6, NULL, NULL),
(34, 'REDES SOCIALES', 'IRS', 3, 6, NULL, NULL),
(35, 'GERENCIA', 'TGE', 3, 7, NULL, NULL),
(36, 'ASISTENCIA', 'TAS', 3, 7, NULL, NULL),
(37, 'GERENCIA', 'IMG', 3, 8, NULL, NULL),
(38, 'MEDICINA GENERAL', 'CMG', 3, 9, NULL, NULL),
(39, 'ENFERMERIA', 'CEN', 3, 9, NULL, NULL);

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
(5, '2021-04-26 14:03:22', '2021-04-26', '2021-04-26 23:05:22', '2021-04-26 14:20:00', '2021-04-26 23:00:00', 3, NULL, '16', NULL, '2021-01-25 06:25:12', '2021-04-29 21:51:06'),
(6, '2021-04-27 14:03:22', '2021-04-27', '2021-04-27 23:05:22', '2021-04-27 14:10:00', '2021-04-27 23:00:00', 3, NULL, '0', NULL, '2021-01-27 06:25:12', '2021-04-28 20:38:46'),
(7, '2021-04-28 14:03:22', '2021-04-28', '2021-04-28 23:05:22', '2021-04-28 14:10:00', '2021-04-28 23:00:00', 3, NULL, '0', NULL, '2021-04-28 14:14:18', '2021-04-28 20:37:31'),
(8, '2021-04-29 14:03:22', '2021-04-29', '2021-04-29 23:05:22', '2021-04-29 14:10:00', '2021-04-29 23:00:00', 3, NULL, '0', NULL, '2021-04-29 14:14:18', '2021-04-28 20:38:46'),
(9, '2021-04-30 14:03:22', '2021-04-30', '2021-04-30 23:05:22', '2021-04-30 14:10:00', '2021-04-30 23:00:00', 3, NULL, '0', NULL, '2021-04-30 14:18:55', '2021-04-28 20:38:46'),
(10, '2021-05-01 14:03:22', '2021-05-01', '2021-05-01 23:05:22', '2021-05-01 14:10:00', '2021-05-01 23:00:00', 3, NULL, '0', NULL, '2021-05-01 14:18:55', '2021-04-28 20:38:46'),
(11, '2021-05-02 14:03:22', '2021-05-02', '2021-05-02 23:05:22', '2021-05-02 14:10:00', '2021-05-02 23:00:00', 3, NULL, '0', NULL, '2021-04-27 14:23:27', '2021-04-28 20:38:46'),
(12, '2021-04-26 20:03:22', '2021-04-26', '2021-04-27 05:05:22', '2021-04-26 20:10:00', '2021-04-27 05:00:00', 4, NULL, '0', NULL, '2021-01-25 12:25:12', '2021-04-28 20:38:46'),
(13, '2021-04-27 20:03:22', '2021-04-27', '2021-04-28 05:05:22', '2021-04-27 20:10:00', '2021-04-28 05:00:00', 4, NULL, '0', NULL, '2021-01-27 12:25:12', '2021-04-28 20:38:46'),
(14, '2021-04-28 20:03:22', '2021-04-28', '2021-04-29 05:05:22', '2021-04-28 20:10:00', '2021-04-29 05:00:00', 4, NULL, '0', NULL, '2021-04-28 20:14:18', '2021-04-28 20:38:46'),
(15, '2021-04-29 20:03:22', '2021-04-29', '2021-04-30 05:05:22', '2021-04-29 20:10:00', '2021-04-30 05:00:00', 4, NULL, '0', NULL, '2021-04-29 20:14:18', '2021-04-28 20:38:46'),
(16, '2021-04-30 20:03:22', '2021-04-30', '2021-05-01 05:05:22', '2021-04-30 20:10:00', '2021-05-01 05:00:00', 4, NULL, '0', NULL, '2021-04-30 20:18:55', '2021-04-28 20:38:46'),
(17, '2021-05-01 20:03:22', '2021-05-01', '2021-05-02 05:05:22', '2021-05-01 20:10:00', '2021-05-02 05:00:00', 4, NULL, '0', NULL, '2021-05-01 20:18:55', '2021-04-28 20:38:46'),
(18, '2021-05-02 20:03:22', '2021-05-02', '2021-05-03 05:05:22', '2021-05-02 20:10:00', '2021-05-03 05:00:00', 4, NULL, '0', NULL, '2021-04-27 20:23:27', '2021-04-28 20:38:46'),
(19, NULL, NULL, '2021-04-30 15:57:02', NULL, '2021-04-30 15:57:02', 3, '2021-04-30', '0', NULL, '2021-04-30 15:57:02', '2021-04-30 15:57:02'),
(20, NULL, NULL, '2021-04-30 15:57:06', NULL, '2021-04-30 15:57:06', 4, '2021-04-30', '0', NULL, '2021-04-30 15:57:06', '2021-04-30 15:57:06'),
(21, '2021-04-30 15:57:09', '2021-04-30', NULL, '2021-04-30 15:57:09', NULL, 7, NULL, '0', NULL, '2021-04-30 15:57:09', '2021-04-30 15:57:09'),
(22, NULL, NULL, '2021-04-30 15:57:12', NULL, '2021-04-30 15:57:12', 7, '2021-04-30', '0', NULL, '2021-04-30 15:57:12', '2021-04-30 15:57:12'),
(23, '2021-04-30 18:09:05', '2021-04-30', NULL, '2021-04-30 18:09:05', NULL, 46, NULL, '0', NULL, '2021-04-30 18:09:05', '2021-04-30 18:09:05'),
(24, NULL, NULL, '2021-04-30 18:09:45', NULL, '2021-04-30 18:09:45', 46, '2021-04-30', '0', NULL, '2021-04-30 18:09:45', '2021-04-30 18:09:45'),
(25, '2021-05-17 15:51:26', '2021-05-17', NULL, '2021-05-17 15:51:26', NULL, 3, NULL, '0', NULL, '2021-05-17 15:51:27', '2021-05-17 15:51:27'),
(26, '2021-05-17 16:17:40', '2021-05-17', NULL, '2021-05-17 16:17:40', NULL, 4, NULL, '0', NULL, '2021-05-17 16:17:40', '2021-05-17 16:17:40'),
(27, '2021-05-17 16:17:43', '2021-05-17', NULL, '2021-05-17 16:17:43', NULL, 7, NULL, '0', NULL, '2021-05-17 16:17:43', '2021-05-17 16:17:43'),
(28, '2021-05-18 13:50:31', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 3, NULL, '0', NULL, '2021-05-18 13:50:31', '2021-05-18 13:50:31'),
(29, '2021-05-18 13:50:43', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 4, NULL, '0', NULL, '2021-05-18 13:50:43', '2021-05-18 13:50:43'),
(30, '2021-05-18 13:50:45', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 7, NULL, '0', NULL, '2021-05-18 13:50:45', '2021-05-18 13:50:45'),
(31, '2021-05-18 13:50:50', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 46, NULL, '0', NULL, '2021-05-18 13:50:50', '2021-05-18 13:50:50'),
(32, '2021-05-18 13:50:53', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 3007, NULL, '0', NULL, '2021-05-18 13:50:53', '2021-05-18 13:50:53'),
(33, '2021-05-18 13:50:56', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 3008, NULL, '0', NULL, '2021-05-18 13:50:56', '2021-05-18 13:50:56'),
(34, '2021-05-18 13:50:59', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 3008, NULL, '0', NULL, '2021-05-18 13:50:59', '2021-05-18 13:50:59'),
(35, '2021-05-18 13:51:02', '2021-05-18', NULL, '2021-05-18 14:10:00', NULL, 3009, NULL, '0', NULL, '2021-05-18 13:51:02', '2021-05-18 13:51:02');

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
(1, 'OFICIAL DE LOGISTICA OPERATIVA', 3, 2, NULL, '2021-04-14 20:04:42'),
(2, 'TRANSPORTE', 3, 1, NULL, NULL),
(3, 'CV', 3, 1, NULL, NULL),
(4, 'Buscador', 3, 1, '2021-03-24 21:01:18', '2021-03-24 21:01:18'),
(5, 'Desarrollador de software', 7, 1, '2021-03-26 14:25:15', '2021-03-26 14:25:15'),
(6, 'Comunicador', 3, 1, '2021-04-07 17:43:48', '2021-04-07 17:43:48'),
(7, 'l', 6, 1, '2021-04-09 17:24:27', '2021-04-09 17:24:27'),
(9, 'INNOVADOR', 3, 1, '2021-04-09 17:39:16', '2021-04-09 17:39:16'),
(10, 'ANALISTA INFORMATICO', 3, 2, '2021-04-20 15:12:10', '2021-04-20 15:12:10'),
(11, 'Asintente 2', 2, 1, '2021-04-21 17:40:40', '2021-04-21 17:40:40'),
(12, 'ANALISTA INFORMATICO', 1, 1, '2021-04-23 17:35:10', '2021-04-23 17:35:10'),
(13, 'ANALISTA INFORMATICO', 15, 1, '2021-04-23 17:35:11', '2021-04-23 17:35:11'),
(14, 'ANALISTA INFORMATICO', 1, 1, '2021-04-23 17:35:37', '2021-04-23 17:35:37'),
(15, 'GERENTE', 11, 2, '2021-04-30 06:00:00', '2021-04-30 06:00:00'),
(16, 'GERENTE', 3, 2, '2021-04-30 06:00:00', '2021-04-30 06:00:00');

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
(42, '9865', '565933', NULL, '2021-05-18', '2021-08-20', 27000, 3, 3, 1, 11, '2021-05-19 19:27:16', '2021-05-19 19:43:10', '7', 1),
(43, '5', '53434545', NULL, '2021-05-20', '2021-08-19', 19000, 1, 4, 1, 11, '2021-05-19 20:11:24', '2021-05-19 20:11:59', '7', 2),
(44, '9865', '565933', NULL, '2021-05-20', '2021-06-24', 15000, 0, 46, 1, 11, '2021-05-19 22:08:01', '2021-05-19 22:08:01', '7', 2),
(45, '9865', '53434545', NULL, '2021-11-20', '2022-02-23', 25000, 0, 3, 1, 11, '2021-05-19 22:08:46', '2021-05-19 22:08:46', '7', 2),
(46, '9865', '53434545', NULL, '2021-05-20', '2021-09-20', 20000, 2, 3007, 1, 11, '2021-05-20 14:12:02', '2021-05-20 14:12:02', '7', 1);

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
(23, 'IHSS', NULL, 1, '2021-04-21 14:29:45', '2021-05-07 17:12:23', 1),
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
(59, 'atlantida', 1200, 1, NULL, '2021-04-13 17:15:27', '2021-04-13 17:15:27', 1, 4, 3),
(61, 'elga', 233, 0, NULL, '2021-04-30 15:23:32', '2021-04-30 15:23:32', 1, 1, 3),
(62, 'honduras medical center', 300, 1, NULL, '2021-05-06 17:18:38', '2021-05-06 17:18:38', 1, 3, 3),
(63, 'cooperativa elga', 300, 1, NULL, '2021-05-06 17:25:23', '2021-05-06 17:25:23', 1, 1, 3008),
(64, 'HMD', 125, 1, NULL, '2021-05-06 17:27:08', '2021-05-06 17:27:08', 1, 3, 3008),
(65, 'cooperativa ELGA', 500, 1, NULL, '2021-05-06 17:27:59', '2021-05-06 17:27:59', 1, 1, 3009),
(66, 'HMC', 325, 1, NULL, '2021-05-06 17:28:41', '2021-05-06 17:28:41', 1, 3, 3009),
(67, 'elga', 300, 1, NULL, '2021-05-06 17:30:30', '2021-05-06 17:30:30', 1, 1, 4),
(68, 'demanda de alimentos', 1000, 1, NULL, '2021-05-06 17:31:27', '2021-05-06 17:31:27', 1, 2, 4);

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

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `empleado_encargado_id`, `created_at`, `updated_at`) VALUES
(1, 'Dirección', 4, NULL, NULL),
(2, 'Administración', 4, NULL, NULL),
(3, 'Operaciones', 3008, NULL, NULL),
(4, 'Seguimiento', 7, NULL, NULL),
(5, 'Comunicaciones', 7, NULL, NULL),
(6, 'Beca internacional', 7, NULL, NULL),
(7, 'Talento humano', 3, NULL, NULL),
(8, 'Implementación', 3, NULL, NULL),
(9, 'Clínica', 3, NULL, NULL);

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
(542, '9523 Havey Crossing', '4351', NULL, NULL, NULL, NULL, 7),
(543, '4 Mifflin Junction', '1513', NULL, NULL, NULL, NULL, 4),
(1041, 'Col. San Miguel, calle tocoa casa 5502, Teguc', '8594', NULL, NULL, '2021-04-20 17:43:51', '2021-04-20 17:43:51', 3),
(1049, 'Calle Tocoa. Col. San Miguel', '5859', NULL, NULL, NULL, NULL, 46);

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
  `identidad` varchar(45) DEFAULT NULL,
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
(3, '0801199615145', 'Yefry Rolando Ortiz Zeron', 'Yefry', 'Rolando', 'Ortiz', 'Zeron', '1996-07-12', '2021-04-18', 'foto_1', 'yefryyo@gmail.com', 'jlainez8a@gmail.com', 'SOLTERO(a)', 'TEGUCIGALPA', 'Trabajo en lafise, contador', '31958353', '31958353', 1, 5, 5, NULL, '6546468484684', 10, '2021-03-22 23:15:46', '2021-03-22 23:15:46', 'MASCULINO', 'INGENIERO EN SISTEMAS'),
(4, '88474889', 'Carlos Yefry Rolando 24 RUIZ Zerón', 'Carlos', 'Yefry Rolando 24', 'RUIZ', 'Zerón', '1990-06-21', '2021-03-09', 'foto_1', 'yefryyo@gmail.com', 'yefryyo@gmail.com', 'CASADO(a)', 'Tegucigalpa', 'Laburo en el estadio Nacional', '31958353', '+50497894224', 2, 1, 56, 15268.35, '9846564u', 6, '2021-03-23 13:50:07', '2021-03-23 13:50:07', 'MASCULINO', 'LICENCIADO(A) EN ECONOMIA'),
(7, '0801198210044', 'HAZEL ALEJANDRA ESCOBAR RAMIREZ', 'HAZEL', 'ALEJANDRA', 'ESCOBAR', 'RAMIREZ', '1991-04-20', '2021-03-18', 'foto_1', 'jlainez8a@gmail.com', 'jlainez8a@gmail.com', 'CASADO(a)', 'Intibuca', 'Contador en Banadesa', '31958353', '31958353', 1, 1, 2, 18000, '989849494p', 1, '2021-03-23 14:42:58', '2021-03-23 14:42:58', 'FEMENINO', 'LICENCIADO(A) ADMINISTRACION DE EMPRESAS'),
(46, '0801969689565', 'Walter  Nuñez Valladares', 'Walter', NULL, 'Nuñez', 'Valladares', '1996-01-17', '2021-04-20', 'foto_1', 'walter@gmail.com', 'walterunah@gmail.com', 'SOLTERO(a)', 'Hospital la escuela', 'Gerente en cooperativa Elga', '31958353', '31958353', 2, 3, 110, 19000, '08019696895655', 6, '2021-04-06 14:14:45', '2021-04-06 14:14:45', 'MASCULINO', NULL),
(3007, '0822199500082', 'luis fernando aviles', 'luis', 'fernando', 'AVILES', 'GUEVARA', '2021-04-29', '2021-04-29', 'FOTO-1', 'yefryyo@gmail.com', 'yefryyo@gmail.com', 'SOLTERO(a)', 'AQUI', 'MMMMMMMMMM', '23568985', '32659878', 1, 1, 16, 20000, '12345678996', 13, '2021-04-29 06:00:00', '2021-04-29 06:00:00', 'MASCULINO', 'INGENIERO'),
(3008, '0801202100021', 'Gerente De Operaciones .', 'Gerente', 'De', 'Operaciones', '.', '2021-04-30', '2021-04-30', 'foto_1', 'luis_aviles16@yahoo.com', 'luis_aviles16@yahoo.com', 'SOLTERO(a)', 'Tegucigalpa', 'Gerente', '2233665577', '22556633', 2, 5, 110, 30000, '0801-2021-000211', 15, '2021-04-30 16:28:03', '2021-04-30 16:28:03', 'FEMENINO', 'licenciado'),
(3009, '0801202100022', 'Gerente DE TALENTO HUMANO', 'Gerente', 'DE', 'TALENTO', 'HUMANO', '2021-04-30', '2021-04-30', 'foto_1', 'fer504guevara@gmail.com', 'fer504guevara@gmail.com', 'SOLTERO(a)', 'Tegucigalpa', 'Trabajo', '23568974', '23568974', 2, 5, 110, 35000, '0801-2121-000222', 16, '2021-04-30 16:43:39', '2021-04-30 16:43:39', 'FEMENINO', 'Licenciatura');

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
(3, 23, 200, '2021-05-06 17:56:32', '2021-05-06 17:56:32'),
(3, 24, 300, '2021-05-07 18:00:02', '2021-05-06 18:00:02'),
(3, 25, 225, '2021-05-06 17:58:37', '2021-05-06 17:58:37'),
(4, 23, 175.5, '2021-05-06 17:56:32', '2021-05-06 17:56:32'),
(4, 24, 255, '2021-05-06 18:00:02', '2021-05-06 18:00:02'),
(4, 25, 336, '2021-05-06 17:58:37', '2021-05-06 17:58:37'),
(3008, 23, 253.6, '2021-05-06 17:57:31', '2021-05-06 17:57:31'),
(3008, 24, 600, '2021-05-06 18:00:02', '2021-05-06 18:00:02'),
(3008, 25, 504, '2021-05-06 17:58:37', '2021-05-06 17:58:37'),
(3009, 23, 223.55, '2021-05-06 17:57:31', '2021-05-06 17:57:31'),
(3009, 24, 400, '2021-05-06 18:00:02', '2021-05-06 18:00:02'),
(3009, 25, 505, '2021-05-06 17:58:37', '2021-05-06 17:58:37');

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
(4, '2021-05-19', 'Dia de las americanas', 11, '08:00:00', '17:00:00', 1, '2021-05-17 22:07:22', '2021-05-17 22:07:22'),
(5, '2021-05-26', 'Ganó la h', 11, '08:00:00', '17:00:00', 1, '2021-05-17 22:12:26', '2021-05-17 22:12:26');

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
(18, 'prueba', '2021-04-23 17:35:37', '2021-04-23 17:35:37', 14);

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

--
-- Volcado de datos para la tabla `log_cargo`
--

INSERT INTO `log_cargo` (`id`, `cargo_id`, `nombre_cargo`, `empleado_id`, `contrato_id`, `created_at`, `updated_at`) VALUES
(25, 10, 'ANALISTA INFORMATICO', 3, 42, '2021-05-19 21:34:56', '2021-05-19 21:34:56'),
(26, 5, 'Desarrollador de software', 3, 42, '2021-05-19 21:36:29', '2021-05-19 21:36:29');

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
(10, 25000, 3, 42, '2021-05-19 19:39:16', '2021-05-19 19:39:16'),
(11, 26000, 3, 42, '2021-05-19 19:43:10', '2021-05-19 19:43:10'),
(12, 18000, 4, 43, '2021-05-19 20:11:59', '2021-05-19 20:11:59');

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
  `tipo_gose_sueldo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso_id`, `fecha_inicio`, `fecha_final`, `fecha_inicio_aprobada`, `fecha_final_aprobada`, `hora_inicio`, `hora_final`, `motivo`, `empleado_id`, `tipo_permiso_id`, `estado_permiso_jefe_id`, `estado_permiso_rrhh_id`, `empleado_rrhh_aprueba_id`, `empleado_jefe_aprueba`, `tipo_gose_sueldo_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-04-29 06:00:00', '2021-04-29 06:00:00', '2021-04-29 06:00:00', '2021-04-30 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:15:23', '2021-04-29 21:15:23'),
(2, 1, '2021-04-30 06:00:00', '2021-04-30 06:00:00', '2021-04-29 06:00:00', '2021-04-30 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:15:23', '2021-04-29 21:15:23'),
(3, 3, '2021-04-30 06:00:00', '2021-04-30 06:00:00', '2021-04-30 06:00:00', '2021-05-04 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 1, 4, 3, 3008, NULL, '2021-04-29 21:19:02', '2021-05-18 20:09:24'),
(4, 3, '2021-05-01 06:00:00', '2021-05-01 06:00:00', '2021-04-30 06:00:00', '2021-05-04 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:19:02', '2021-04-29 21:19:02'),
(5, 3, '2021-05-02 06:00:00', '2021-05-02 06:00:00', '2021-04-30 06:00:00', '2021-05-04 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:19:02', '2021-04-29 21:19:02'),
(6, 3, '2021-05-03 06:00:00', '2021-05-03 06:00:00', '2021-04-30 06:00:00', '2021-05-04 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:19:02', '2021-04-29 21:19:02'),
(7, 3, '2021-05-04 06:00:00', '2021-05-04 06:00:00', '2021-04-30 06:00:00', '2021-05-04 06:00:00', '08:00:00', '17:00:00', 'prueba', 3007, 1, 3, 5, NULL, NULL, NULL, '2021-04-29 21:19:02', '2021-04-29 21:19:02'),
(8, 8, '2021-05-19 06:00:00', '2021-05-19 06:00:00', '2021-05-19 06:00:00', '2021-05-20 06:00:00', '08:00:00', '17:00:00', 'Cualquier', 3, 1, 3, 5, NULL, NULL, NULL, '2021-05-18 20:06:44', '2021-05-18 20:06:44'),
(9, 8, '2021-05-20 06:00:00', '2021-05-20 06:00:00', '2021-05-19 06:00:00', '2021-05-20 06:00:00', '08:00:00', '17:00:00', 'Cualquier', 3, 1, 3, 5, NULL, NULL, NULL, '2021-05-18 20:06:44', '2021-05-18 20:06:44');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(96, 'Loralie Foad', '831-39-8090', '150-401-5317', 'lfoad1@g.co', '41656 Helena Park', 'Poaceae', NULL, NULL, 7, 1),
(956, 'Elvis Fontell', '496-10-7579', '505-440-3972', 'efontellnx@jigsy.com', '7 Tomscot Point', 'Asteraceae', NULL, NULL, 4, 2),
(962, 'goku san', '5555555555555', '+50431958353', 'yefryyo@gmail.com', 'Col. San Miguel, calle tocoa casa 5502, Teguc', 'CUÑADO', '2021-04-20 18:16:00', '2021-04-20 18:16:00', 3, 1),
(966, 'jhkjgkghkhgjk', '5555555559161', '31958353', 'yefryyo@gmail.com', 'Col. San Miguel, calle tocoa casa 5502, Teguc', 'TIO(A)', '2021-05-11 17:02:24', '2021-05-11 17:02:24', 3, 1),
(967, 'jhkjgkghkhgjk', '5555355555555', '31958353', 'yefryyo@gmail.com', 'Col. San Miguel, calle tocoa casa 5502, Teguc', 'VECINO', '2021-05-14 15:00:48', '2021-05-14 15:00:48', 3, 1);

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
('lCbacqUXGu4wo7nMcW8RcLhT8sJAdiScpVvmHraJ', 11, '10.62.144.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiM1lFVk5FbHVnREE3NGlLYkh6cmxTZGlmcFFpM2hXcWxIblRjUDM0ZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTAuNjIuMTQ0LjI0NTo4MDAwL2NvbnRyYXRvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdXN6Wnp5NnAyRHJWUWhsVlZaTDRyZVZwUGFxMENjSGlZbHNGZVF2U09ZMVhBTHVaOVI4anUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHVzelp6eTZwMkRyVlFobFZWWkw0cmVWcFBhcTBDY0hpWWxzRmVRdlNPWTFYQUx1WjlSOGp1Ijt9', 1621519922);

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
(8, 12, 'Yefry\'s Team', 1, '2021-03-18 14:50:10', '2021-03-18 14:50:10'),
(11, 20, 'o\'s Team', 1, '2021-04-05 19:34:24', '2021-04-05 19:34:24'),
(12, 22, 'y\'s Team', 1, '2021-04-05 19:50:09', '2021-04-05 19:50:09'),
(13, 23, 'w\'s Team', 1, '2021-04-05 19:51:14', '2021-04-05 19:51:14'),
(14, 24, 'Luis\'s Team', 1, '2021-04-26 14:34:25', '2021-04-26 14:34:25'),
(15, 25, 'Fernando\'s Team', 1, '2021-04-30 15:15:43', '2021-04-30 15:15:43'),
(16, 26, 'Gerente\'s Team', 1, '2021-04-30 15:17:22', '2021-04-30 15:17:22'),
(17, 27, 'Gerente\'s Team', 1, '2021-04-30 15:18:31', '2021-04-30 15:18:31');

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
(1, 'AHORRO Y CREDITO', NULL, '2021-05-10 14:25:02', 1),
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
(1, 'Trabajador', NULL, NULL),
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
(1, 'Con gocé de sueldo'),
(2, 'Sin goce de sueldo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_permiso`
--

CREATE TABLE `tipo_permiso` (
  `id` int(11) NOT NULL,
  `permiso` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_permiso`
--

INSERT INTO `tipo_permiso` (`id`, `permiso`, `created_at`, `updated_at`) VALUES
(1, 'permiso 1', '2021-03-22 22:19:42', NULL),
(2, 'permiso 2', '2021-03-22 22:19:42', NULL);

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
(11, '0801199615145', 'Yefry Ortiz', 'yefryyo@gmail.com', '2021-03-18 14:36:41', '$2y$10$uszZzy6p2DrVQhlVVZL4reVpPaq0CcHiYlsFeQvSOY1XALuZ9R8ju', NULL, NULL, 'e9QpVlLu3ZA6oggZw03BDXxAA1oQEjxBETuonPnhj6nFycxEn6uRjJeYOg9q', NULL, NULL, '2021-03-18 14:24:41', '2021-03-18 14:37:45', 1),
(24, '0822199500082', 'Luis Aviles', 'luisfaviles18@gmail.com', '2021-04-26 14:34:47', '$2y$10$nJ1WkD3ADo.voEXweUI.Feb5SEABHqDmu8xaQARO5AnJGsp0VeK1S', NULL, NULL, NULL, NULL, NULL, '2021-04-26 14:34:25', '2021-04-26 14:34:47', 1);

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
  ADD KEY `fk_permisos_tipo_gose_sueldo1_idx` (`tipo_gose_sueldo_id`),
  ADD KEY `fk_permisos_permisos1_idx` (`permiso_id`);

--
-- Indices de la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salidas_tarde_empleado1_idx` (`empleado_id`),
  ADD KEY `fk_salidas_tarde_empleado2_idx` (`empleado_registra`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `deducciones_empleado`
--
ALTER TABLE `deducciones_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1050;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3010;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `log_sueldos`
--
ALTER TABLE `log_sueldos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_deducciones_fijas`
--
ALTER TABLE `pagos_deducciones_fijas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_deducciones_variables`
--
ALTER TABLE `pagos_deducciones_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `fk_permisos_permisos1` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_tipo_gose_sueldo1` FOREIGN KEY (`tipo_gose_sueldo_id`) REFERENCES `tipo_gose_sueldo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_tipo_permiso1` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `tipo_permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos_mdia`
--
ALTER TABLE `permisos_mdia`
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
