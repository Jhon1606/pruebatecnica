-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2024 a las 09:11:46
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
-- Base de datos: `prueba_tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL COMMENT 'Identificador del area',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del area de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administración'),
(2, 'Ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL COMMENT 'Identificador del empleado',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre completo del empleado. Campo tipo Text. Solo debe permitir letras con o sin tilde y espacios. No se admiten caracteres especiales ni números. Obligatorio',
  `email` varchar(255) NOT NULL COMMENT 'Correo electrónico del empleado. Campo de tipo Text|Email. Solo permite una estructura de correo. Obligatorio',
  `sexo` char(1) NOT NULL COMMENT 'Campo de tipo radio button. M para Masculino. F para Femenino. Obligatorio',
  `area_id` int(11) NOT NULL COMMENT 'Area de la empresa a la que pertenece el empleado. Campo de tipo select. Obligatorio',
  `boletin` int(11) NOT NULL COMMENT '1 para recibir boletín. 0 para no recibir boletin. Campo de tipo checkbox. Opcional',
  `descripcion` text NOT NULL COMMENT 'Se describe la experiencia del empleado. Campo de tipo text area. Obligatorio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(1, 'Jhon', 'Jhon@gmail.com', 'M', 1, 0, 'fgasfewadf'),
(2, 'Camila', 'camila@gmail.com', 'F', 1, 1, 'daescesijce'),
(3, 'Jhon', 'Jhon@gmail.com', 'M', 1, 1, 'gsdfsd'),
(4, 'Maria Alejandra', 'maria13@gmail.com', 'M', 2, 1, 'vszfsfa'),
(5, 'Alejandra', 'alejandra@gmail.com', 'F', 2, 0, 'hola aleja'),
(9, 'Camilo', 'camilo@fdsf.com', 'M', 2, 1, 'fsefsef'),
(13, 'fsfsfsdc', 'Jhon@gmail.com', 'M', 1, 1, 'fsfsf'),
(17, 'lorena', 'loren@gmail.com', 'F', 1, 0, 'dadad'),
(19, 'Messi', 'messi@gmail.com', 'M', 1, 1, 'dadad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int(11) NOT NULL COMMENT 'Identificador del empleado',
  `rol_id` int(11) NOT NULL COMMENT 'Identificador del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado_rol`
--

INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 2),
(8, 3),
(9, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 3),
(19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Identificador del rol',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Profesional de proyectos - Desarrollador'),
(2, 'Gerente estratégico'),
(3, 'Auxiliar administrativo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del area', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del empleado', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del rol', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
