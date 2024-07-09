-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2024 a las 21:24:45
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
-- Base de datos: `matriz`
--
CREATE DATABASE IF NOT EXISTS `matriz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `matriz`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblactividad`
--

DROP TABLE IF EXISTS `tblactividad`;
CREATE TABLE `tblactividad` (
  `Codigo` int(3) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Proceso` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblactividad`
--

INSERT INTO `tblactividad` (`Codigo`, `Nombre`, `Proceso`) VALUES
(1, 'Compras externas', 1),
(2, 'Diligencias laborales', 1),
(3, 'Todas las actividades', 1),
(4, 'Dosificación de fertilizantes', 2),
(5, 'Aseo bodega', 2),
(6, 'Recepción y entrega de materiales', 2),
(7, 'Surtir', 2),
(8, 'Todas las actividades', 2),
(9, 'Atender solicitudes de los clientes', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcargo`
--

DROP TABLE IF EXISTS `tblcargo`;
CREATE TABLE `tblcargo` (
  `Codigo` int(2) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblcargo`
--

INSERT INTO `tblcargo` (`Codigo`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Coordinadora Administrativa'),
(3, 'Oficios Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcargos`
--

DROP TABLE IF EXISTS `tblcargos`;
CREATE TABLE `tblcargos` (
  `Codigo` int(2) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblcargos`
--

INSERT INTO `tblcargos` (`Codigo`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Coordinadora Administrativa'),
(3, 'Oficios Varios'),
(4, 'Todos los cargos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclasificacionpeligro`
--

DROP TABLE IF EXISTS `tblclasificacionpeligro`;
CREATE TABLE `tblclasificacionpeligro` (
  `Codigo` int(1) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblclasificacionpeligro`
--

INSERT INTO `tblclasificacionpeligro` (`Codigo`, `Nombre`) VALUES
(1, 'Biológico'),
(2, 'Físico'),
(3, 'Químico'),
(4, 'Psicosocial'),
(5, 'Biomecánico'),
(6, 'Condiciones de Seguridad'),
(7, 'Fenómenos Naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldescripcionpeligro`
--

DROP TABLE IF EXISTS `tbldescripcionpeligro`;
CREATE TABLE `tbldescripcionpeligro` (
  `Codigo` int(2) NOT NULL,
  `Nombre` varchar(2000) NOT NULL,
  `Clasificacion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbldescripcionpeligro`
--

INSERT INTO `tbldescripcionpeligro` (`Codigo`, `Nombre`, `Clasificacion`) VALUES
(1, 'Virus Animales roedores', 1),
(2, 'Bacterias', 1),
(3, 'Hongos', 1),
(4, 'Ricketsias', 1),
(5, 'Parásitos', 1),
(6, 'Picaduras', 1),
(7, 'Mordeduras', 1),
(8, 'Fluidos o excrementos', 1),
(9, 'Ruido (de impacto, intermitente, continuo)', 2),
(10, 'Iluminación (luz visible por exceso o deficiencia)', 2),
(11, 'Vibración (cuerpo entero, segmentaria)', 2),
(12, 'Temperaturas extremas (calor y frio)', 2),
(13, 'Presión atmosférica (normal y ajustada)', 2),
(14, 'Radiaciones ionizantes (rayos x, gama, beta y alfa)', 2),
(15, 'Radiaciones no ionizantes (laser, ultravioleta, infrarroja, radiofrecuencia, microondas)', 2),
(16, 'Presiones anormales', 2),
(17, 'Polvos orgánicos inorgánicos', 3),
(18, 'Fibras', 3),
(19, 'Líquidos (nieblas y rocíos)', 3),
(20, 'Gases y vapores', 3),
(21, 'Humos metálicos, no metálicoss', 3),
(22, 'Material Particulado', 3),
(23, 'Vapores', 3),
(24, 'Gases y vapores', 3),
(25, 'Gestión Organizacional (estilo de mando, pago, contratación, participación, inducción y capacitación, bienestar social, evaluación del desempeño, manejo de cambios).', 4),
(26, 'Características de la organización del trabajo (comunicación, tecnología, organización del trabajo, demandas cualitativas y cuantitativas de la labor).', 4),
(27, 'Características del grupo social de trabajo (relaciones, cohesión, calidad de interacciones, trabajo en equipo).', 4),
(28, 'Condiciones de la tarea (carga mental, contenido de la tarea, demandas emocionales, sistemas de control, definición de roles, monotonía, etc.)', 4),
(29, 'Interfase persona - tarea (conocimientos, habilidades en relación con la demanda de la tarea, iniciativa, autonomía y reconomiento, identificación de la persona con la tarea y la organización ', 4),
(30, 'Jornada de trabajo (pausas, trabajo nocturno, rotación, horas extras, descansos)', 4),
(31, 'Postura (prolongadas, mantenida, forzada y anti gravitacional)', 5),
(32, 'Esfuerzo', 5),
(33, 'Movimiento repetitivo', 5),
(34, 'Manipulación de cargas', 5),
(35, 'maquinas', 5),
(36, 'equipos herramientas', 5),
(37, 'espacios reducidos', 5),
(38, 'caidas a distinto nivel o sobre nivel', 5),
(39, 'Mecánico (elementos o partes de maquinas, herramientas, equipos, piezas a trabajar, materiales proyectados sólidos o fluidos)', 6),
(40, 'Eléctrico (alta y baja tensión, estática)', 6),
(41, 'Locativo (sistema y medios de almacenamiento), superficies de trabajo (irregulares, deslizantes, con diferencia del nivel), condiciones de orden y aseo, (caídas de objeto)', 6),
(42, 'Tecnológico (explosión, fuga, derrame, incendio)', 6),
(43, 'Accidentes de tránsito', 6),
(44, 'Públicos (robos, atracos, asaltos, atentados, de orden público, etc.)', 6),
(45, 'Trabajos en alturas', 6),
(46, 'Espacios confinados', 6),
(47, 'Sismo', 7),
(48, 'Terremoto', 7),
(49, 'Vendaval', 7),
(50, 'Inundación', 7),
(51, 'Precipitaciones, (lluvias, granizadas, heladas)', 7),
(52, 'Sequias', 7),
(53, 'Huracanes', 7),
(54, 'Zunamis', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblelementosproteccionpersonal`
--

DROP TABLE IF EXISTS `tblelementosproteccionpersonal`;
CREATE TABLE `tblelementosproteccionpersonal` (
  `Codigo` int(3) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblelementosproteccionpersonal`
--

INSERT INTO `tblelementosproteccionpersonal` (`Codigo`, `Nombre`) VALUES
(1, 'Casco de seguridad'),
(2, 'Protección visual'),
(3, 'Protección auditiva'),
(4, 'Protección respiratoria para material particulado'),
(5, 'Protección respiratoria para gases y vapores'),
(6, 'Protección respiratoria desechable'),
(7, 'Delantal Impermeable'),
(8, 'Guantes Impermeables'),
(9, 'Guantes antideslizantes'),
(10, 'Guantes anticorte'),
(11, 'Guantes resistentes a químicos'),
(12, 'Calzado con puntera de seguridad'),
(13, 'Botas Impermeables'),
(14, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleado`
--

DROP TABLE IF EXISTS `tblempleado`;
CREATE TABLE `tblempleado` (
  `DocId` varchar(10) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Cargo` int(2) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Celular` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblempleado`
--

INSERT INTO `tblempleado` (`DocId`, `Nombres`, `Apellidos`, `Cargo`, `Correo`, `Celular`) VALUES
('541061', 'YUSMARY', 'LÓPEZ RODRÍGUEZ', 2, 'yusmary0920@hotmail.com', '3217918368'),
('70697005', 'RICARDO ANDRÉS', 'VALENCIA ZULUAGA', 1, 'agro.rio27@gmail.com', '3217918368');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleadomatrizpeligros`
--

DROP TABLE IF EXISTS `tblempleadomatrizpeligros`;
CREATE TABLE `tblempleadomatrizpeligros` (
  `DocIdEmpleado` varchar(10) NOT NULL,
  `CodigoMatrizPaligros` int(8) NOT NULL,
  `Observaciones` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbleppmatrizpeligros`
--

DROP TABLE IF EXISTS `tbleppmatrizpeligros`;
CREATE TABLE `tbleppmatrizpeligros` (
  `CodigoElementosProteccionPersonal` int(3) NOT NULL,
  `CodigoMatrizPeligros` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbleppmatrizpeligros`
--

INSERT INTO `tbleppmatrizpeligros` (`CodigoElementosProteccionPersonal`, `CodigoMatrizPeligros`) VALUES
(1, 86),
(2, 73),
(4, 74),
(4, 76),
(5, 73),
(5, 79),
(5, 80),
(7, 79),
(7, 80),
(8, 70),
(8, 79),
(8, 80),
(8, 86),
(8, 87),
(8, 88),
(9, 78),
(11, 73),
(12, 86),
(12, 87),
(12, 88),
(13, 73),
(13, 79),
(13, 80),
(14, 77),
(14, 84),
(14, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado`
--

DROP TABLE IF EXISTS `tblestado`;
CREATE TABLE `tblestado` (
  `Codigo` int(1) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblestado`
--

INSERT INTO `tblestado` (`Codigo`, `Nombre`) VALUES
(1, 'Sin gestionar'),
(2, 'En proceso'),
(3, 'Ejecutado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmatrizpeligros`
--

DROP TABLE IF EXISTS `tblmatrizpeligros`;
CREATE TABLE `tblmatrizpeligros` (
  `Codigo` int(8) NOT NULL,
  `Usuario` varchar(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Tarea` int(3) NOT NULL,
  `detallepeligro` varchar(1500) NOT NULL,
  `ZonaLugar` int(2) NOT NULL,
  `Cargos` int(2) NOT NULL,
  `DescripcionPeligro` int(2) NOT NULL,
  `ControlFuente` varchar(1500) NOT NULL,
  `ControlMedio` varchar(1500) NOT NULL,
  `ControlIndividuo` varchar(2000) NOT NULL,
  `NivelDeficiencia` int(2) NOT NULL,
  `NivelExposicion` int(1) NOT NULL,
  `NivelConsecuencia` int(3) NOT NULL,
  `NumeroExpuesto` int(3) NOT NULL,
  `MiEliminacion` varchar(2000) NOT NULL,
  `MiSustitucion` varchar(2000) NOT NULL,
  `MiControlIngenieria` varchar(2000) NOT NULL,
  `MiControlAdministrativo` varchar(2000) NOT NULL,
  `Estado` int(1) NOT NULL,
  `EfectosPosibles` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblmatrizpeligros`
--

INSERT INTO `tblmatrizpeligros` (`Codigo`, `Usuario`, `Fecha`, `Tarea`, `detallepeligro`, `ZonaLugar`, `Cargos`, `DescripcionPeligro`, `ControlFuente`, `ControlMedio`, `ControlIndividuo`, `NivelDeficiencia`, `NivelExposicion`, `NivelConsecuencia`, `NumeroExpuesto`, `MiEliminacion`, `MiSustitucion`, `MiControlIngenieria`, `MiControlAdministrativo`, `Estado`, `EfectosPosibles`) VALUES
(69, '39457318', '2024-06-10', 12, 'movimientos propios de la labor para tomar y llevar pedidos.', 3, 3, 33, '', '', 'Formación en prevención de riesgos y demás.', 0, 2, 10, 3, '', '', '', 'Formación', 2, 'Problemas osteomusculares.'),
(70, '39457318', '2024-06-10', 12, 'movimientos propios de la labor para tomar y llevar pedidos.', 3, 3, 33, '', '', 'Formación en prevención de riesgos y demás.', 0, 2, 10, 3, '', '', '', 'Formación / Evaluaciones médicas ocupacionales', 2, 'Problemas osteomusculares.'),
(71, '39457318', '2024-06-10', 12, 'Tiempos prolongados de pie', 3, 3, 31, 'Se tienen sillas para que el personal use cuando lo desee.', 'NA', 'Formación', 0, 2, 10, 1, 'NA', 'NA', 'NA', 'Formación / Evaluaciones médicas ocupacionales', 2, 'Problemas osteomusculares.'),
(72, '39457318', '2024-06-10', 12, 'Postura prolongada de pie', 3, 3, 31, 'Se tienen sillas para que el personal use cuando lo desee.', 'NA', 'Formación', 0, 3, 10, 1, 'NA', 'NA', 'NA', 'Formación / Evaluaciones médicas ocupacionales', 2, 'Problemas osteomusculares.'),
(73, '39457318', '2024-06-10', 8, 'Contacto indirecto con químicos los cuales están envasados y empacados.', 3, 3, 19, 'Almacenamiento adecuado de sustancias químicas', 'Estibas y estanterías disponibles para la ubicación de químicos.', 'Formación / EPP', 6, 3, 10, 1, 'NA', 'NA', 'NA', 'Hacer matriz de compatibilidad / Hacer Procedimientos de Seguridad / Socializar Procedimientos de Seguridad / Evaluaciones médicas Ocupacionales / Inspecciones de seguridad', 2, 'Irritaciones / Intoxicaciones'),
(74, '39457318', '2024-06-13', 4, 'No uso epp', 1, 3, 17, 'Se usan sustancias químicas no cancerígenas y de bajo riesgo.', 'NA', 'Formación', 0, 1, 25, 2, 'NA', 'NA', 'NA', 'Formación / Evaluaciones médicas ocupacionales', 2, 'Irritaciones / Intoxicaciones'),
(76, '39457318', '2024-06-15', 4, 'No uso epp', 1, 3, 17, 'Máquinas con guardas de seguridad para las partes en movimiento de la máquina.', 'NA', 'EPP', 0, 2, 25, 1, 'NA', 'NA', 'Instalar sistemas de ventilación.', 'Formación', 2, 'Problemas respiratorios / Pulmonares.'),
(77, '39457318', '2024-06-17', 12, 'Tiempos prolongados de pie', 2, 3, 31, 'Sillas a disposición del personal.', 'NA', 'Formación', 0, 2, 10, 1, 'NA', 'NA', 'NA', 'Formación', 2, 'Problemas osteomusculares.'),
(78, '39457318', '2024-06-17', 8, 'Manipulación de bultos entre 20 y 50 kg', 1, 3, 34, 'NA', 'Disponibilidad de ayudas mecánicas para mover objetos pesados.', 'Formación', 6, 3, 25, 1, 'NA', 'NA', 'NA', 'Procedimiento de seguridad / Formación ', 2, 'Problemas osteomusculares.'),
(79, '39457318', '2024-06-17', 8, 'Contacto indirecto con químicos los cuales están envasados y empacados.', 1, 3, 19, 'NA', 'NA', 'Formación / EPP / Procedimientos', 6, 3, 10, 1, 'NA', 'NA', 'NA', 'Formación / Evaluaciones médicas ocupacionales / EPP ', 2, 'Problemas respiratorios / Pulmonares.'),
(80, '39457318', '2024-06-17', 8, 'Contacto indirecto con químicos los cuales están envasados y empacados.', 1, 3, 19, 'NA', 'NA', 'Formación / EPP / Procedimientos', 6, 3, 10, 1, 'NA', 'NA', 'NA', 'Formación / Evaluaciones médicas ocupacionales / EPP ', 2, 'Problemas respiratorios / Pulmonares.'),
(81, '39457318', '2024-06-17', 1, 'Diligencias externas', 4, 2, 44, 'NA', 'NA', 'NA', 10, 2, 25, 1, 'NA', 'NA', '', '', 2, 'Exposición a factores públicos'),
(82, '39457318', '2024-06-17', 1, 'Diligencias externas', 4, 2, 44, 'NA', 'NA', 'NA', 10, 2, 25, 1, 'NA', 'NA', '', '', 2, 'Exposición a factores públicos'),
(83, '39457318', '2024-06-17', 1, 'Diligencias externas', 4, 2, 44, 'NA', 'NA', 'NA', 10, 2, 25, 1, 'NA', 'NA', '', '', 2, 'Exposición a factores públicos'),
(84, '39457318', '2024-06-17', 2, 'Facilidad de robos y alteraciones de orden público ', 4, 2, 44, 'NA', 'NA', 'NA', 10, 2, 25, 1, 'NA', 'NA', 'NA', 'Formación / Hacer y socializar procedimiento de riesgo público / Limitar las transacciones en efectivo, usar plataformas digitales', 2, 'Alteraciones físicas o psicológicas'),
(85, '39457318', '2024-06-17', 2, 'Desplazamientos en vehículo propio.', 4, 1, 39, 'NA', 'NA', 'Se hacen evaluaciones médicas ocupacionales.', 6, 2, 25, 1, 'NA', 'NA', 'Hacer mantenimientos correctivos y preventivos al vehículo.', 'Hacer evaluaciones médicas que validen la idoneidad de conductor / Formación ', 2, 'Posibles accidentes de tránsito que generen alteraciones físicas o psicológicas'),
(86, '39457318', '2024-06-17', 10, 'El empleado se sube a mas de 2 metros de altura en una escalera', 3, 3, 45, 'NA', 'NA', 'Guantes', 10, 3, 100, 1, 'Ubicar productos en las estanterías a una altura que no implique superar la altura de 1.5 mt', '', '', 'Formar al empleado en la altura máxima permitida 1.5 mt y en el uso adecuado de la escalera.', 2, 'Golpes, fracturas o la muerte'),
(87, '39457318', '2024-06-17', 9, 'No se tiene matriz de compatibilidad química por lo cual no se conoce las incompatibilidades y peligros asociados de cada una.', 1, 3, 42, 'Arrumes por producto', 'Señalización', 'Formación / EPP / Procedimientos / Evaluaciones médicas ocupacionales', 6, 4, 100, 1, '', '', '', 'Hacer matriz de compatibilidad / Hacer Procedimientos de Seguridad / Socializar Procedimientos de Seguridad / Inspecciones de seguridad', 2, 'Reacciones químicas peligrosas'),
(88, '39457318', '2024-06-17', 8, 'Estibas en mal estado donde se ubican los bultos', 1, 3, 41, 'NA', 'NA', 'Formación', 6, 3, 60, 1, 'Arreglar las estibas', '', '', 'Inspecciones de seguridad. / Formación', 2, 'Golpes o contusiones. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnivelconsecuencia`
--

DROP TABLE IF EXISTS `tblnivelconsecuencia`;
CREATE TABLE `tblnivelconsecuencia` (
  `ValorNivelConsecuencia` int(3) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Significado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblnivelconsecuencia`
--

INSERT INTO `tblnivelconsecuencia` (`ValorNivelConsecuencia`, `Nombre`, `Significado`) VALUES
(10, 'Leve', 'Lesiones o enfermedades que no requieren incapacidad.'),
(25, 'Grave', 'Lesiones o enfermedades con incapacidad laboral temporal.'),
(60, 'Muy Grave', 'Lesiones o enfermedades graves irreparables (incapacidad permanente parcial o invalidez).'),
(100, 'Mortal o Catastrófic', 'Muerte (s).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblniveldeficiencia`
--

DROP TABLE IF EXISTS `tblniveldeficiencia`;
CREATE TABLE `tblniveldeficiencia` (
  `ValorNivelDeficiencia` int(2) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Significado` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblniveldeficiencia`
--

INSERT INTO `tblniveldeficiencia` (`ValorNivelDeficiencia`, `Nombre`, `Significado`) VALUES
(0, 'Bajo', 'No se ha detectado peiigro o la eficacia del conjunto de medidas preventivas existentes es alta, o ambas. El riesgo está controlado.  Estos peligros se clasifican directamente en el nivel de riesgo y de intervención cuatro (IV)'),
(2, 'Medio', 'Se han detectado peligros que pueden dar lugar a incidentes poco significativas o de menor importancia, o la eficacia del conjunto de medidas preventivas existentes es moderada, o ambas.'),
(6, 'Alto', 'Se ha (n) detectada algún (os) peligro (s) que pueden dar lugar a incidentes significativa(s), o la eficacia del conjunto de medidas preventivas existentes es moderada, o ambos.'),
(10, 'Muy Alto', 'Se ha (n) detectado peligro (s) que determina(n) como posible la generación de incidentes  o la eficacia del conjunto de medidas preventivas existentes respecto al riesgo es nula o no existe, o ambos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnivelexposicion`
--

DROP TABLE IF EXISTS `tblnivelexposicion`;
CREATE TABLE `tblnivelexposicion` (
  `ValorNivelExposicion` int(1) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Significado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblnivelexposicion`
--

INSERT INTO `tblnivelexposicion` (`ValorNivelExposicion`, `Nombre`, `Significado`) VALUES
(1, 'Esporádica', 'La situación de exposición se presenta de manera eventual.'),
(2, 'Ocasional', 'La situación de exposición se presenta alguna vez durante la jornada laboral y por un período de tiempo corto.'),
(3, 'Frecuente', 'La situación de exposición se presenta varias veces durante la jornada laboral por tiempos cortos.'),
(4, 'Continua', 'La situación de exposición se presenta sin interrupción o varias veces con tiempo prolongado durante la jornada laboral.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblperfil`
--

DROP TABLE IF EXISTS `tblperfil`;
CREATE TABLE `tblperfil` (
  `Codigo` int(1) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblperfil`
--

INSERT INTO `tblperfil` (`Codigo`, `Nombre`) VALUES
(1, 'Gestor '),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproceso`
--

DROP TABLE IF EXISTS `tblproceso`;
CREATE TABLE `tblproceso` (
  `Codigo` int(3) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproceso`
--

INSERT INTO `tblproceso` (`Codigo`, `Nombre`) VALUES
(1, 'Administrativo'),
(2, 'Almacenamiento'),
(3, 'Punto de Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltarea`
--

DROP TABLE IF EXISTS `tbltarea`;
CREATE TABLE `tbltarea` (
  `Codigo` int(3) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Actividad` int(3) NOT NULL,
  `Rutinario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbltarea`
--

INSERT INTO `tbltarea` (`Codigo`, `Nombre`, `Actividad`, `Rutinario`) VALUES
(1, 'Desplazarse hacia otras zonas para realizar compras de productos.', 1, 0),
(2, 'Trámites administrativos (pagos, compras, otros)', 2, 1),
(3, 'Todas las tareas', 3, 1),
(4, 'Dosificar fertilizantes', 4, 0),
(5, 'Barrer', 5, 1),
(6, 'Trapear', 5, 1),
(7, 'Sacudir', 5, 1),
(8, 'Cargue y descargue de mercancía', 6, 1),
(9, 'Ubicar bultos en estibas', 7, 1),
(10, 'Ubicar productos en estanterías', 7, 1),
(12, 'Tomar y llevar los pedidos de los clientes', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `DocId` varchar(10) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Perfil` int(1) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`DocId`, `Nombres`, `Apellidos`, `Perfil`, `Correo`, `Contraseña`) VALUES
('1234563456', 'Faber', 'Parra', 1, 'faberparra98@gmail.com', '88888'),
('39457318', 'NATALI', 'SÁNCHEZ PAREJA', 2, 'nsparejasst@gmail.com', 'hola123'),
('541061', 'YUSMARY', 'LÓPEZ RODRÍGUEZ', 1, 'yusmary0920@hotmail.com', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblzonalugar`
--

DROP TABLE IF EXISTS `tblzonalugar`;
CREATE TABLE `tblzonalugar` (
  `Codigo` int(2) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblzonalugar`
--

INSERT INTO `tblzonalugar` (`Codigo`, `Nombre`) VALUES
(1, 'Almacenamiento'),
(2, 'Caja-Punto de venta'),
(3, 'Toda la Zona'),
(4, 'Externo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblactividad`
--
ALTER TABLE `tblactividad`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_tblactividad_tblproceso` (`Proceso`);

--
-- Indices de la tabla `tblcargo`
--
ALTER TABLE `tblcargo`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tblcargos`
--
ALTER TABLE `tblcargos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tblclasificacionpeligro`
--
ALTER TABLE `tblclasificacionpeligro`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tbldescripcionpeligro`
--
ALTER TABLE `tbldescripcionpeligro`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_tbldescripcionpeligro_tblclasificacionpeligro` (`Clasificacion`);

--
-- Indices de la tabla `tblelementosproteccionpersonal`
--
ALTER TABLE `tblelementosproteccionpersonal`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tblempleado`
--
ALTER TABLE `tblempleado`
  ADD PRIMARY KEY (`DocId`),
  ADD KEY `FK_tblempleado_tblcargo` (`Cargo`);

--
-- Indices de la tabla `tblempleadomatrizpeligros`
--
ALTER TABLE `tblempleadomatrizpeligros`
  ADD PRIMARY KEY (`DocIdEmpleado`,`CodigoMatrizPaligros`),
  ADD KEY `FK_tblempleadomatrizpeligros_tblmatrizpeligros` (`CodigoMatrizPaligros`);

--
-- Indices de la tabla `tbleppmatrizpeligros`
--
ALTER TABLE `tbleppmatrizpeligros`
  ADD PRIMARY KEY (`CodigoElementosProteccionPersonal`,`CodigoMatrizPeligros`),
  ADD KEY `FK_tbleppmatrizpeligros_tblmatrizpeligros` (`CodigoMatrizPeligros`);

--
-- Indices de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tblmatrizpeligros`
--
ALTER TABLE `tblmatrizpeligros`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_tblmatrizpeligros_tblniveldeficiencia` (`NivelDeficiencia`),
  ADD KEY `FK_tblmatrizpeligros_tblnivelexposición` (`NivelExposicion`),
  ADD KEY `FK_tblmatrizpeligros_tblnivelConsecuencia` (`NivelConsecuencia`),
  ADD KEY `FK_tblmatrizpeligros_tblEstado` (`Estado`),
  ADD KEY `FK_tblmatrizpeligros_tblZonaLugar` (`ZonaLugar`),
  ADD KEY `FK_tblmatrizpeligros_tblDescripcionPeligro` (`DescripcionPeligro`),
  ADD KEY `FK_tblmatrizpeligros_tblTarea` (`Tarea`),
  ADD KEY `FK_tblmatrizpeligros_tblUsuario` (`Usuario`),
  ADD KEY `FK_tblmatrizpeligros_tblcargos` (`Cargos`);

--
-- Indices de la tabla `tblnivelconsecuencia`
--
ALTER TABLE `tblnivelconsecuencia`
  ADD PRIMARY KEY (`ValorNivelConsecuencia`);

--
-- Indices de la tabla `tblniveldeficiencia`
--
ALTER TABLE `tblniveldeficiencia`
  ADD PRIMARY KEY (`ValorNivelDeficiencia`);

--
-- Indices de la tabla `tblnivelexposicion`
--
ALTER TABLE `tblnivelexposicion`
  ADD PRIMARY KEY (`ValorNivelExposicion`);

--
-- Indices de la tabla `tblperfil`
--
ALTER TABLE `tblperfil`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tblproceso`
--
ALTER TABLE `tblproceso`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tbltarea`
--
ALTER TABLE `tbltarea`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_tbltarea_tblactividad` (`Actividad`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`DocId`),
  ADD KEY `FK_tblusuario_tblperfil` (`Perfil`);

--
-- Indices de la tabla `tblzonalugar`
--
ALTER TABLE `tblzonalugar`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblactividad`
--
ALTER TABLE `tblactividad`
  MODIFY `Codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblcargo`
--
ALTER TABLE `tblcargo`
  MODIFY `Codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblcargos`
--
ALTER TABLE `tblcargos`
  MODIFY `Codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblclasificacionpeligro`
--
ALTER TABLE `tblclasificacionpeligro`
  MODIFY `Codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbldescripcionpeligro`
--
ALTER TABLE `tbldescripcionpeligro`
  MODIFY `Codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `tblelementosproteccionpersonal`
--
ALTER TABLE `tblelementosproteccionpersonal`
  MODIFY `Codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  MODIFY `Codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmatrizpeligros`
--
ALTER TABLE `tblmatrizpeligros`
  MODIFY `Codigo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `tblperfil`
--
ALTER TABLE `tblperfil`
  MODIFY `Codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblproceso`
--
ALTER TABLE `tblproceso`
  MODIFY `Codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbltarea`
--
ALTER TABLE `tbltarea`
  MODIFY `Codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblzonalugar`
--
ALTER TABLE `tblzonalugar`
  MODIFY `Codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblactividad`
--
ALTER TABLE `tblactividad`
  ADD CONSTRAINT `FK_tblactividad_tblproceso` FOREIGN KEY (`Proceso`) REFERENCES `tblproceso` (`Codigo`);

--
-- Filtros para la tabla `tbldescripcionpeligro`
--
ALTER TABLE `tbldescripcionpeligro`
  ADD CONSTRAINT `FK_tbldescripcionpeligro_tblclasificacionpeligro` FOREIGN KEY (`Clasificacion`) REFERENCES `tblclasificacionpeligro` (`Codigo`);

--
-- Filtros para la tabla `tblempleado`
--
ALTER TABLE `tblempleado`
  ADD CONSTRAINT `FK_tblempleado_tblcargo` FOREIGN KEY (`Cargo`) REFERENCES `tblcargo` (`Codigo`);

--
-- Filtros para la tabla `tblempleadomatrizpeligros`
--
ALTER TABLE `tblempleadomatrizpeligros`
  ADD CONSTRAINT `FK_tblempleadomatrizpeligros_tblEmpleado` FOREIGN KEY (`DocIdEmpleado`) REFERENCES `tblempleado` (`DocId`),
  ADD CONSTRAINT `FK_tblempleadomatrizpeligros_tblmatrizpeligros` FOREIGN KEY (`CodigoMatrizPaligros`) REFERENCES `tblmatrizpeligros` (`Codigo`);

--
-- Filtros para la tabla `tbleppmatrizpeligros`
--
ALTER TABLE `tbleppmatrizpeligros`
  ADD CONSTRAINT `FK_tbleppmatrizpeligros_tblelementosproteccionpersonal` FOREIGN KEY (`CodigoElementosProteccionPersonal`) REFERENCES `tblelementosproteccionpersonal` (`Codigo`),
  ADD CONSTRAINT `FK_tbleppmatrizpeligros_tblmatrizpeligros` FOREIGN KEY (`CodigoMatrizPeligros`) REFERENCES `tblmatrizpeligros` (`Codigo`);

--
-- Filtros para la tabla `tblmatrizpeligros`
--
ALTER TABLE `tblmatrizpeligros`
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblDescripcionPeligro` FOREIGN KEY (`DescripcionPeligro`) REFERENCES `tbldescripcionpeligro` (`Codigo`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblEstado` FOREIGN KEY (`Estado`) REFERENCES `tblestado` (`Codigo`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblTarea` FOREIGN KEY (`Tarea`) REFERENCES `tbltarea` (`Codigo`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblUsuario` FOREIGN KEY (`Usuario`) REFERENCES `tblusuario` (`DocId`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblZonaLugar` FOREIGN KEY (`ZonaLugar`) REFERENCES `tblzonalugar` (`Codigo`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblcargos` FOREIGN KEY (`Cargos`) REFERENCES `tblcargos` (`Codigo`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblnivelConsecuencia` FOREIGN KEY (`NivelConsecuencia`) REFERENCES `tblnivelconsecuencia` (`ValorNivelConsecuencia`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblniveldeficiencia` FOREIGN KEY (`NivelDeficiencia`) REFERENCES `tblniveldeficiencia` (`ValorNivelDeficiencia`),
  ADD CONSTRAINT `FK_tblmatrizpeligros_tblnivelexposición` FOREIGN KEY (`NivelExposicion`) REFERENCES `tblnivelexposicion` (`ValorNivelExposicion`);

--
-- Filtros para la tabla `tbltarea`
--
ALTER TABLE `tbltarea`
  ADD CONSTRAINT `FK_tbltarea_tblactividad` FOREIGN KEY (`Actividad`) REFERENCES `tblactividad` (`Codigo`);

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `FK_tblusuario_tblperfil` FOREIGN KEY (`Perfil`) REFERENCES `tblperfil` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
