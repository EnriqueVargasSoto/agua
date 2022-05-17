-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2022 a las 16:42:24
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `concepto` varchar(250) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL,
  `tipo` enum('fijo','editable') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`concepto`, `valor`, `created_at`, `updated_at`, `id`, `tipo`) VALUES
('valor', '6.00', '2022-04-17 01:55:19', '2022-04-17 01:56:19', 1, 'editable'),
('valor suministro', '150.00', '2022-05-01 09:28:40', '2022-05-01 09:28:40', 2, 'fijo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `created_at`, `updated_at`) VALUES
(1, 'Amazonas', NULL, NULL),
(2, 'Ancash', NULL, NULL),
(3, 'Apurímac', NULL, NULL),
(4, 'Arequipa', NULL, NULL),
(5, 'Ayacucho', NULL, NULL),
(6, 'Cajamarca', NULL, NULL),
(7, 'Callao', NULL, NULL),
(8, 'Cuzco', NULL, NULL),
(9, 'Huancavelica', NULL, NULL),
(10, 'Huánuco', NULL, NULL),
(11, 'Ica', NULL, NULL),
(12, 'Junín', NULL, NULL),
(13, 'La Libertad', NULL, NULL),
(14, 'Lambayeque', NULL, NULL),
(15, 'Lima', NULL, NULL),
(16, 'Loreto', NULL, NULL),
(17, 'Madre de Dios', NULL, NULL),
(18, 'Moquegua', NULL, NULL),
(19, 'Pasco', NULL, NULL),
(20, 'Piura', NULL, NULL),
(21, 'Puno', NULL, NULL),
(22, 'Sna Martín', NULL, NULL),
(23, 'Tacna', NULL, NULL),
(24, 'Tumbes', NULL, NULL),
(25, 'Ucayali', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `distrito` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `idProvincia`, `distrito`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cajamarca', NULL, NULL),
(2, 1, 'Asunción', NULL, NULL),
(3, 1, 'Chetilla', NULL, NULL),
(4, 1, 'Cospán', NULL, NULL),
(5, 1, 'Encañada', NULL, NULL),
(6, 1, 'Jesús', NULL, NULL),
(7, 1, 'Llacanora', NULL, NULL),
(8, 1, 'Los Baños del Inca', NULL, NULL),
(9, 1, 'Magdalena', NULL, NULL),
(10, 1, 'Matara', NULL, NULL),
(11, 1, 'Namora', NULL, NULL),
(12, 1, 'San Juan', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `imgDniFront` varchar(250) DEFAULT NULL,
  `imgDniBack` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `idDepartamento` int(11) DEFAULT NULL,
  `idProvincia` int(11) DEFAULT NULL,
  `idDistrito` int(11) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `imgEscritura` varchar(250) DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `estadoPago` enum('pendiente','pagado') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apellidoPaterno` varchar(250) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombres`, `dni`, `imgDniFront`, `imgDniBack`, `direccion`, `idDepartamento`, `idProvincia`, `idDistrito`, `email`, `imgEscritura`, `estado`, `estadoPago`, `created_at`, `updated_at`, `apellidoPaterno`, `apellidoMaterno`, `telefono`) VALUES
(1, 'Edwin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', NULL, 'activo', NULL, '2022-04-12 01:56:33', '2022-04-12 01:56:33', NULL, NULL, NULL),
(2, 'Enrique Vargas', '70848421', NULL, 'Entrevista ALONSO ESPINOZA.pdf', 'Calle #30', 6, 1, 1, 'ejemplo@gmail.com', 'Entrevista ALONSO ESPINOZA.pdf', 'activo', 'pagado', '2022-04-14 00:26:28', '2022-04-14 04:21:06', NULL, NULL, NULL),
(3, 'Luis Vargas', '12345678', 'RYR.pdf', 'RYR.pdf', 'Calle #30', 1, 1, 1, 'mario@gmail.com', 'RYR.pdf', 'activo', 'pagado', '2022-04-18 06:02:22', '2022-04-18 06:03:29', NULL, NULL, NULL),
(4, 'cahmaco', '12345678', 'nubetech.png', 'd680893421490f23438e2ab8436521a6.jpg', 'Calle #30', 6, 1, 1, 'ejemplo@gmail.com', 'RYR.pdf', 'activo', 'pagado', '2022-04-19 23:42:55', '2022-05-01 09:36:52', NULL, NULL, NULL),
(5, 'Luis Soto', '70848421', '279091098_718448532629173_1879059252237838512_n.jpg', 'logo.png', 'Calle #30', 6, 1, 1, 'luissoto@gmail.com', 'Sin título-1_Mesa de trabajo 1.png', 'activo', 'pagado', '2022-05-01 09:50:16', '2022-05-01 09:50:28', NULL, NULL, NULL),
(6, 'ULISES SEGUNDO', '18892059', 'logo.png', '279091098_718448532629173_1879059252237838512_n.jpg', 'calle lima', 6, 1, 1, 'kikevargas23@gmail.com', 'Sin título-1_Mesa de trabajo 1 (1).png', 'inactivo', 'pendiente', '2022-05-03 20:28:10', '2022-05-03 20:28:10', 'VARGAS', 'RIOS', '977654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `provincia` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `idDepartamento`, `provincia`, `created_at`, `updated_at`) VALUES
(1, 6, 'Cajamarca', NULL, NULL),
(2, 6, 'Cajabamba', NULL, NULL),
(3, 6, 'Celendín', NULL, NULL),
(4, 6, 'Chota', NULL, NULL),
(5, 6, 'Contumazá', NULL, NULL),
(6, 6, 'Cutervo', NULL, NULL),
(7, 6, 'Hualgayoc', NULL, NULL),
(8, 6, 'Jaén', NULL, NULL),
(9, 6, 'San Ignacio', NULL, NULL),
(10, 6, 'San Marcos', NULL, NULL),
(11, 6, 'San Miguel', NULL, NULL),
(12, 6, 'San Pablo', NULL, NULL),
(13, 6, 'Santa Cruz', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `idSuministro` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `estado` enum('pendiente','pagado') NOT NULL,
  `fechaEmision` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id`, `idSuministro`, `concepto`, `cantidad`, `valor`, `total`, `estado`, `fechaEmision`, `fechaVencimiento`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pago por instalacion de suministro', '1.00', '150.00', '150.00', 'pendiente', '2022-05-01', '2022-05-08', '2022-05-01 09:37:47', '2022-05-01 09:37:47'),
(2, 4, 'Pago por instalacion de suministro', '1.00', '150.00', '150.00', 'pendiente', '2022-05-01', '2022-05-08', '2022-05-01 09:50:28', '2022-05-01 09:50:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `estado`, `create_at`, `updated_at`) VALUES
(1, 'Administrador', 'activo', NULL, NULL),
(2, 'Usuario', 'activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministros`
--

CREATE TABLE `suministros` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `estado` enum('activo','suspendido') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `suministros`
--

INSERT INTO `suministros` (`id`, `numero`, `codigo`, `idUsuario`, `direccion`, `estado`, `created_at`, `updated_at`) VALUES
(3, 3, '00003', 6, 'Calle #30', 'activo', '2022-05-01 09:37:47', '2022-05-01 09:37:47'),
(4, 4, '00004', 7, 'Calle #30', 'activo', '2022-05-01 09:50:28', '2022-05-01 09:50:28'),
(5, 3, '00003', 7, 'Calle #54', 'activo', '2022-05-05 21:18:24', '2022-05-05 21:18:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `idPerfil`, `idRol`, `usuario`, `password`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', '$2y$10$JPmC/W5umFCGhlEVttYVzO1X37Cf2FNvCzOoowTp6sQyB/J9Y5nlS', 'activo', '2022-04-12 01:56:33', '2022-04-12 01:56:33'),
(2, 2, 2, '70848421', '$2y$10$Olz07FhfK6x9jFpE2S/Rku5KgfX4keX.8FTuQr6yk9eXw1hUyKWwW', 'activo', '2022-04-14 04:21:06', '2022-05-01 02:46:30'),
(3, 3, 2, '12345678', '$2y$10$ANRZ7DI7C8eNwGBcJVI2xOKMPXfHzMCiixp2SP3Vka6NAqbThfjzi', 'activo', '2022-04-18 06:03:29', '2022-04-18 06:03:29'),
(6, 4, 2, '12345678', '$2y$10$z5nShSaXgnPyBHqHG2AQBO49Hh0/bo8tfaZiqdXtDb0B1wKSegkZa', 'activo', '2022-05-01 09:37:47', '2022-05-01 09:37:47'),
(7, 5, 2, '70848426', '$2y$10$Olz07FhfK6x9jFpE2S/Rku5KgfX4keX.8FTuQr6yk9eXw1hUyKWwW', 'activo', '2022-05-01 09:50:28', '2022-05-01 10:50:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suministros`
--
ALTER TABLE `suministros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suministros`
--
ALTER TABLE `suministros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
