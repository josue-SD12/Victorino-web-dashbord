-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-08-2026 a las 23:40:53
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `victorino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pagos`
--

CREATE TABLE `historial_pagos` (
  `id` int NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `numero_tarjeta_o_dato` varchar(100) DEFAULT NULL,
  `codigo_verificacion` varchar(10) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `registrado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `historial_pagos`
--

INSERT INTO `historial_pagos` (`id`, `producto`, `tamano`, `metodo_pago`, `numero_tarjeta_o_dato`, `codigo_verificacion`, `fecha_pago`, `nombre_cliente`, `registrado_en`) VALUES
(1, 'Pizza', 'Personal', 'visa', '12312312', '123123', '2025-06-12 00:44:24', 'pepemanuel', '2025-06-12 00:44:24'),
(2, 'Pizza', 'Personal', 'visa', '12312312', '123123', '2025-06-12 00:47:02', 'pepemanuel', '2025-06-12 00:47:02'),
(3, 'Pizza', 'Familiar', 'plin', '12312312', '123123', '2025-06-12 00:54:53', 'pepemanuel', '2025-06-12 00:54:53'),
(4, 'Pizza', 'Familiar', 'yape', '12312312', '123123', '2025-06-12 01:56:55', 'melany agely', '2025-06-12 01:56:55'),
(5, 'Pizza', 'Familiar', 'yape', 'iuw', 'werwrwr', '2025-10-01 12:49:12', 'wewrw', '2025-10-01 12:49:12'),
(6, 'Pizza', 'Familiar', 'yape', 'iuw', 'werwrwr', '2025-10-01 12:49:19', 'wewrw', '2025-10-01 12:49:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int NOT NULL,
  `numero_mesa` int NOT NULL,
  `estado` enum('libre','reservada','ocupada') DEFAULT 'libre',
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `correo_cliente` varchar(100) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `numero_mesa`, `estado`, `nombre_cliente`, `correo_cliente`, `fecha_reserva`, `hora_reserva`) VALUES
(1, 1, 'reservada', 'JOSUE ', 'pepito@yonigmial.com', '1111-11-11', '13:00:00'),
(2, 2, 'reservada', 'JOSUE ', 'pepito@yonigmial.com', '1111-11-11', '13:00:00'),
(3, 1, 'reservada', 'JOSUE ', 'melany@correo.com', '0001-11-11', '12:00:00'),
(4, 3, 'reservada', 'JOSUE ', 'melany@correo.com', '0001-11-11', '12:00:00'),
(5, 1, 'reservada', 'JOSUE ', 'melany@correo.com', '2025-12-12', '15:00:00'),
(6, 4, 'reservada', 'JOSUE ', 'melany@correo.com', '2025-12-12', '15:00:00'),
(7, 5, 'reservada', 'JOSUE ', 'melany@correo.com', '2025-12-12', '15:00:00'),
(8, 1, 'reservada', 'JOSUE ', 'melany@correo.com', '2035-10-12', '19:00:00'),
(9, 1, 'reservada', 'alonzo', 'melany@correo.com', '2025-06-11', '20:00:00'),
(10, 1, 'reservada', 'JOSUE ', 'pepito@yonigmial.com', '2099-02-12', '15:00:00'),
(11, 1, 'reservada', 'JOSUE ', 'juabnalberto@gmail.com', '2099-02-12', '19:00:00');

--
-- Disparadores `mesas`
--
DELIMITER $$
CREATE TRIGGER `insertar_reserva_en_historial` AFTER UPDATE ON `mesas` FOR EACH ROW BEGIN
    -- Solo si el estado cambia a 'reservada'
    IF NEW.estado = 'reservada' THEN
        INSERT INTO reservacion_mesa (
            nombre_cliente,
            correo_cliente,
            fecha_reserva,
            hora_reserva,
            id_mesa,
            estado_reserva
        ) VALUES (
            NEW.nombre_cliente,
            NEW.correo_cliente,
            NEW.fecha_reserva,
            NEW.hora_reserva,
            NEW.id,
            'confirmada'
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_reservacion_mesa` AFTER INSERT ON `mesas` FOR EACH ROW BEGIN
    INSERT INTO reservacion_mesas (
        nombre_cliente,
        correo_cliente,
        fecha_reserva,
        hora_reserva,
        id_mesa,
        estado_reserva
    )
    VALUES (
        NEW.nombre_cliente,
        NEW.correo_cliente,
        NEW.fecha_reserva,
        NEW.hora_reserva,
        NEW.numero_mesa,
        NEW.estado
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `numero_tarjeta_o_dato` varchar(100) DEFAULT NULL,
  `codigo_verificacion` varchar(10) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `producto`, `tamano`, `metodo_pago`, `numero_tarjeta_o_dato`, `codigo_verificacion`, `fecha_pago`, `nombre_cliente`) VALUES
(1, 'Pizza', 'Personal', 'visa', '12312312', '123123', '2025-06-12 00:44:24', 'pepemanuel'),
(2, 'Pizza', 'Personal', 'visa', '12312312', '123123', '2025-06-12 00:47:02', 'pepemanuel'),
(3, 'Pizza', 'Familiar', 'plin', '12312312', '123123', '2025-06-12 00:54:53', 'pepemanuel'),
(4, 'Pizza', 'Familiar', 'yape', '12312312', '123123', '2025-06-12 01:56:55', 'melany agely'),
(5, 'Pizza', 'Familiar', 'yape', 'iuw', 'werwrwr', '2025-10-01 12:49:12', 'wewrw'),
(6, 'Pizza', 'Familiar', 'yape', 'iuw', 'werwrwr', '2025-10-01 12:49:19', 'wewrw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reguistro_pizza`
--

CREATE TABLE `reguistro_pizza` (
  `id` int NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `tamaño` varchar(50) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `numero_tarjeta_o_dato` varchar(100) DEFAULT NULL,
  `codigo_verificacion` varchar(10) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reguistro_pizza`
--

INSERT INTO `reguistro_pizza` (`id`, `producto`, `tamaño`, `metodo_pago`, `numero_tarjeta_o_dato`, `codigo_verificacion`, `fecha_pago`, `nombre_cliente`) VALUES
(1, 'Pizza', 'Personal', 'paypal', '12312312', '123123', '2025-06-11', NULL),
(2, 'Pizza', 'Familiar', 'visa', '12312312', '123123', '2025-06-11', NULL),
(3, 'Pizza', 'Personal', 'yape', '12312312', '123123', '2025-06-12', NULL);

--
-- Disparadores `reguistro_pizza`
--
DELIMITER $$
CREATE TRIGGER `trg_insert_pagos_pizza` AFTER INSERT ON `reguistro_pizza` FOR EACH ROW BEGIN
    INSERT INTO pagos_pizza (
        producto,
        tamaño,
        metodo_pago,
        numero_tarjeta_o_dato,
        codigo_verificacion,
        fecha_pago,
        nombre_cliente
    ) VALUES (
        NEW.producto,
        NEW.tamaño,
        NEW.metodo_pago,
        NEW.numero_tarjeta_o_dato,
        NEW.codigo_verificacion,
        NEW.fecha_pago,
        NEW.nombre_cliente
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_mesa`
--

CREATE TABLE `reservacion_mesa` (
  `id` int NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `correo_cliente` varchar(100) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_reserva` time NOT NULL,
  `id_mesa` int NOT NULL,
  `estado_reserva` enum('pendiente','confirmada','cancelada') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_mesas`
--

CREATE TABLE `reservacion_mesas` (
  `id` int NOT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `correo_cliente` varchar(100) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `id_mesa` int DEFAULT NULL,
  `estado_reserva` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `clave`) VALUES
(1, 'Josue@correo.com', '12345');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pagos_pizza`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_pagos_pizza` (
);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reguistro_pizza`
--
ALTER TABLE `reguistro_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservacion_mesa`
--
ALTER TABLE `reservacion_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `reservacion_mesas`
--
ALTER TABLE `reservacion_mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reguistro_pizza`
--
ALTER TABLE `reguistro_pizza`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reservacion_mesa`
--
ALTER TABLE `reservacion_mesa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservacion_mesas`
--
ALTER TABLE `reservacion_mesas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pagos_pizza`
--
DROP TABLE IF EXISTS `vista_pagos_pizza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_pagos_pizza`  AS SELECT `pagos_pizza`.`id` AS `id`, `pagos_pizza`.`producto` AS `producto`, `pagos_pizza`.`tamaño` AS `tamaño`, `pagos_pizza`.`metodo_pago` AS `metodo_pago`, `pagos_pizza`.`numero_tarjeta_o_dato` AS `numero_tarjeta_o_dato`, `pagos_pizza`.`codigo_verificacion` AS `codigo_verificacion`, `pagos_pizza`.`fecha_pago` AS `fecha_pago` FROM `pagos_pizza` ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservacion_mesa`
--
ALTER TABLE `reservacion_mesa`
  ADD CONSTRAINT `reservacion_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
