-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 06:11:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `waiky`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `tipo_destino` varchar(250) DEFAULT NULL,
  `destino_id` int(11) DEFAULT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL,
  `fin_conversacion` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chatbot`
--

INSERT INTO `chatbot` (`id`, `tipo_destino`, `destino_id`, `queries`, `replies`, `fin_conversacion`) VALUES
(1, NULL, NULL, 'Hola, me podrías indicar que servicios tiene?', 'Claro, estoy para servirle, que servicio te gustaria? Tenemos: <br> \n1. Apus y Montañas <br>\n2. Rutas y Aventuras <br>\n3. Tours Convencionales <br>\n4. Paquetes Escolares <br>\nElige un numero', 0),
(2, NULL, NULL, 'Me gustaria el servicio de Apus y Montañas', 'Ok, tenemos varios tipos de ascenso y son: \n1. Misti \n2. Chachani \n3. Pichu Pichu\n4. Coropuna\n5. Mismi\n6. Hualca Hualca \nCual te gustaría? Elige una letra ', 0),
(3, NULL, NULL, '1. Misti, me gustaría saber que tipos tienes', 'Tenemos dos rutas: <br>\n1.1 Aguada Blanca <br>\n1.2 Ruta Sur Chiguata<br>\nElige un numero', 0),
(4, 'SUBCATEGORIA', 1, '1.1 aguada Blanca, en que consiste?', 'Consiste en: \nMODALIDAD	 : Montaña.\nDIFICULTAD	  	 : Fácil a media (Enero a abril Lluvias / \nMayo a Diciembre temporada seca)\nDURACIÓN     	: 02 Días y 01 Noche\nCOSTO POR PAX: S/350.00\nSALIDAS               : Todo el año\n\nRECORRIDO        : 15Km,  (9.5 millas)\nEl costo es de : S/. 350', 1),
(5, 'SUBCATEGORIA', 2, '1.2 ruta sur Chiguata en que consiste', 'Consiste en:\r\nMODALIDAD	: Montaña.\r\nDIFICULTAD	  	: Fácil a media (Enero a abril Lluvias / \r\nMayo a Diciembre temporada seca)\r\nDURACIÓN     	: 02 días / 01 noche\r\nCOSTO POR PAX: S/300.00\r\nSALIDAS              : Todo el año', 1),
(6, NULL, NULL, 'quiero reservar', 'Si deseas reservar registrate en el siguiente link:\r\nhttp://localhost/chatbot2_wayki/registro.html\r\n', 0),
(7, NULL, NULL, '2. Chachani', 'Tenemos dos opciones para ascenso Volcán al Chachani:\r\na. 1 día\r\nb. 2 días\r\ncual te gustaría elige uno', 0),
(8, 'SUBCATEGORIA', 3, 'a. 1 día', 'Consiste en:\nMODALIDAD		: Montaña.\nDIFICULTAD	        : Fácil a media (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\nDURACIÓN		: 01 Día\nCOSTO POR PAX: S/330.00\nRECORRIDO		:  10 km. (6.213 Millas)', 1),
(9, 'SUBCATEGORIA', 4, 'b. 2 días', 'Consiste en:\r\nMODALIDAD		: Montaña.\r\nDIFICULTAD		 : Fácil a media (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\r\nDURACIÓN 		 : 02 Días y 01 noche\r\n\r\nRECORRIDO	       :  10 km.  (6.213 Millas)\r\nCOSTO POR PAX: S/350.00', 1),
(10, 'CATEGORIA', 5, '3. Pichu Pichu', 'Consiste en:\nMODALIDAD     	  : Montaña - Visita Ecológica.\nDIFICULTAD      	 : Moderada a  Fácil.\nDURACIÓN             : 01 Día.\n\nRECORRIDO           :7 KM  (3.728 millas)\nCOSTO POR PAX: S/170.00', 1),
(11, 'CATEGORIA', 6, '4. Coropuna', 'Ingresamos por la ruta sur y consiste en:\r\nMODALIDAD : Alta Montaña.\r\nDIFICULTAD   : Técnico a difícil (Enero a Abril temporada de lluvias / Mayo a Diciembre temporada seca)\r\nDURACIÓN     : 02 Días y 02 noches\r\n\r\nRECORRIDO   :  15 km.  (12.213 Millas)\r\nCOSTO POR PAX: S/850.00', 0),
(12, NULL, NULL, '5. Mismi', 'Tenemos dos opciones:\r\na. Full day\r\nb. 2 días\r\nelige una por favor', 0),
(13, NULL, NULL, 'a. Full Day', 'Consiste en:\r\nMODALIDAD: Montaña.\r\nDIFICULTAD: Fácil (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\r\nDURACIÓN: 02 Días 1 Noche\r\nRECORRIDO:  8km. (4.970 Millas)\r\nCOSTO POR PAX: S/450.00', 1),
(14, NULL, NULL, 'b. 2 días', 'Consiste en:\r\nMODALIDAD: Montaña.\r\nDIFICULTAD: Fácil a media (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\r\nDURACIÓN : 02 Días y 01 noche\r\nRECORRIDO:  10 km.  (6.213 Millas)\r\nCOSTO POR PAX: S/1.350.00', 1),
(15, NULL, NULL, '6. Hualca Hualca', 'Consiste en:\r\nMODALIDAD : Alta Montaña.\r\nDIFICULTAD   : Técnico a difícil (Enero a Abril temporada de lluvias / Mayo a Diciembre temporada seca)\r\nDURACIÓN     : 02 días y 01 noche', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `celular` varchar(250) NOT NULL,
  `estado_cliente` tinyint(4) DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `correo`, `celular`, `estado_cliente`, `fecha_registro`) VALUES
(1, 'Miguel Mendoza', 'miguel@gmail.com', '4535345', 0, '2024-06-10 19:15:15'),
(2, 'Voluptatem Et duis ', 'vyfet@mailinator.com', 'Temporibus ad illum', 1, '2024-06-10 19:15:15'),
(3, 'jaime chincha', 'jaime@mailinator.com', '5345345', 1, '2024-06-10 19:15:15'),
(4, 'nombre prueba', 'nifemeha@mailinator.com', '936983242', 1, '2024-06-10 19:15:15'),
(5, 'pepe', 'pepe@gmil.no', '34', 1, '2024-06-10 19:15:15'),
(6, 'jacinta', 'jacienta@dgf.cpo', '5345', 1, '2024-06-10 19:15:15'),
(7, 'nombre prueba', 'vocac@mailinator.com', '645', 1, '2024-06-10 19:15:15'),
(8, 'caro', 'caro@gmilfsd.com', '3453', 1, '2024-06-10 19:15:15'),
(9, 'roxi perez', 'roxi@roxi.com', '534554', 1, '2024-06-10 19:15:15'),
(10, ' gabriel quispe', 'gabriel@gmail.com', '4545645', 1, '2024-06-10 19:15:15'),
(11, 'tre6456', '456456', '45646', 1, '2024-06-10 19:15:15'),
(12, 'mogu', '456456', '45646', 1, '2024-06-10 19:15:15'),
(13, 'daysi xd', 'daysi@gmail.com', '43253', 1, '2024-06-10 19:15:15'),
(14, 'ramiro', 'Eum est voluptate i', 'Et expedita in in en', 1, '2024-06-10 19:15:15'),
(15, 'Miguel Mendoza perez', 'sf@gmail.com', '8787786', 1, '2024-06-10 19:15:15'),
(16, 'carlos torres', 'sf@gmail.com', '6456', 1, '2024-06-10 19:15:15'),
(17, 'carmen perez ramires', 'carmen@gmail.com', '86464654', 0, '2024-06-10 22:41:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_servicio_categoria` int(11) DEFAULT NULL,
  `id_servicio_subcategoria` int(11) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `num_personas` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `estado_reserva` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_servicio_categoria`, `id_servicio_subcategoria`, `id_cliente`, `num_personas`, `fecha_reserva`, `fecha_registro`, `estado_reserva`) VALUES
(1, NULL, 1, 1, 2, '2024-06-08', '2024-06-08 12:30:59', 1),
(10, NULL, 1, 7, 34, '2024-04-07', '2024-06-08 22:28:29', 1),
(11, NULL, 2, 5, 2, '2024-03-07', '2024-06-09 00:42:30', 1),
(12, NULL, 1, 1, 5, '2024-04-07', '2024-06-09 01:17:07', 1),
(13, NULL, 1, 8, 5, '2024-06-07', '2024-06-09 01:18:19', 1),
(14, NULL, 1, 9, 5, '2024-06-05', '2024-06-09 01:27:46', 1),
(15, NULL, 1, 9, 9, '2024-06-05', '2024-06-09 01:31:57', 1),
(16, NULL, 1, 10, 2, '2024-06-09', '2024-06-09 15:58:31', 1),
(17, NULL, 1, 10, 3, '2024-06-09', '2024-06-09 16:00:21', 1),
(18, 2, 2, 2, 2, '2024-06-09', '2024-06-10 18:20:10', 1),
(19, NULL, 6, 2, 10, '1999-04-25', '2024-06-10 19:09:07', 0),
(20, 1, NULL, 5, 4, '2024-06-10', '2024-06-10 22:51:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `estado_servicio` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `fecha_registro`, `estado_servicio`) VALUES
(1, 'Apus y Montañas', '2000-01-27 00:00:00', 1),
(2, 'Rutas y Aventuras', '2000-01-27 00:00:00', 1),
(3, 'Tours Convencionales', '2000-01-27 00:00:00', 1),
(4, 'Paquetes Escolares', '2000-01-27 00:00:00', 1),
(6, 'a paris', '2000-01-27 00:00:00', 1),
(7, 'lima', '2000-01-27 00:00:00', 0),
(8, 'servicio nuevo 01', '2024-06-10 22:43:43', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_categorias`
--

CREATE TABLE `servicios_categorias` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad_max_personas` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `esstado_ser_categoria` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios_categorias`
--

INSERT INTO `servicios_categorias` (`id`, `servicio_id`, `titulo`, `descripcion`, `precio`, `cantidad_max_personas`, `fecha_registro`, `esstado_ser_categoria`) VALUES
(1, 1, 'Misti', '-', 1500, 1200, '2024-06-10 19:16:13', 1),
(2, 1, 'Chachani', '-', 1500, 1500, '2024-06-10 19:16:13', 1),
(5, 1, 'Pichu Pichu', '-', 1500, 1500, '2024-06-10 19:16:13', 1),
(6, 1, 'Coropuna', '-', 1500, 1500, '2024-06-10 19:16:13', 1),
(8, 1, 'viaje de prueba', '-', 1500, 12, '2024-06-10 19:16:13', 1),
(10, 4, 'Aut cupidatat qui om', '', 0, 0, '2024-06-10 19:16:13', 1),
(11, 3, 'Temporibus corrupti', '', 85, 39, '2024-06-10 19:16:13', 1),
(12, 2, 'Maiores aut numquam ', '', 34, 12, '2024-06-10 19:16:13', 1),
(13, 3, 'titulo', 'descripcino :)', 27, 45, '2024-06-10 19:16:13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_subcategorias`
--

CREATE TABLE `servicios_subcategorias` (
  `id` int(11) NOT NULL,
  `servicio_cat_id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad_max_personas` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_registro` tinyint(4) NOT NULL DEFAULT current_timestamp(),
  `esstado_ser_subcategoria` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios_subcategorias`
--

INSERT INTO `servicios_subcategorias` (`id`, `servicio_cat_id`, `titulo`, `descripcion`, `cantidad_max_personas`, `precio`, `fecha_registro`, `esstado_ser_subcategoria`) VALUES
(1, 1, 'Ruta aguada blanca 01', 'MODALIDAD	 : Montaña.\r\nDIFICULTAD	  	 : Fácil a media (Enero a abril Lluvias / \r\n\r\nMayo a Diciembre temporada seca)\r\nDURACIÓN     	: 02 Días y 01 Noche\r\n\r\nSALIDAS               : Todo el año\r\n\r\nRECORRIDO        : 15Km,  (9.5 millas)', 15, 350, 127, 1),
(2, 1, 'Sur chiguata', 'MODALIDAD	: Montaña.\r\nDIFICULTAD	  	: Fácil a media (Enero a abril Lluvias / \r\n\r\nMayo a Diciembre temporada seca)\r\nDURACIÓN     	: 02 días / 01 noche\r\n\r\nSALIDAS              : Todo el año', 10, 300, 127, 1),
(3, 2, 'VOLCÁN CHACHANI (1 día)', 'MODALIDAD		: Montaña.\r\nDIFICULTAD	        : Fácil a media (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\r\nDURACIÓN		: 01 Día', 10, 330, 127, 1),
(4, 2, 'VOLCÁN CHACHANI (2 días)', 'MODALIDAD		: Montaña.\r\nDIFICULTAD		 : Fácil a media (Enero a abril Lluvias/ Mayo a Diciembre temporada seca)\r\nDURACIÓN 		 : 02 Días y 01 noche\r\n\r\nRECORRIDO	       :  10 km.  (6.213 Millas)', 15, 350, 127, 1),
(5, 5, 'CUMBRE MONTE BLANCO (5,470 Msnm)', 'MODALIDAD     	  : Montaña - Visita Ecológica.\r\nDIFICULTAD      	 : Moderada a  Fácil.\r\nDURACIÓN             : 01 Día.\r\n\r\nRECORRIDO           :7 KM  (3.728 millas)', 5, 170, 127, 1),
(6, 6, 'RUTA SUR (6,425 Msnm)', 'MODALIDAD : Alta Montaña.\r\nDIFICULTAD   : Técnico a difícil (Enero a Abril temporada de lluvias / Mayo a Diciembre temporada seca)\r\nDURACIÓN     : 02 Días y 02 noches\r\n\r\nRECORRIDO   :  15 km.  (12.213 Millas)', 15, 850, 127, 1),
(10, 13, 'title', 'Hic omnis culpa dic', 27, 32, 127, 0),
(11, 5, 'ruta a salinas', '-', 5, 1800, 127, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `servicio` varchar(250) NOT NULL,
  `cant_pers` int(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha_reserva` varchar(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellidos`, `celular`, `correo`, `servicio`, `cant_pers`, `rol`, `password`, `fecha_reserva`, `fecha`) VALUES
(1, 'Emanuel', 'Lopes', '9911165677', 'mugarte5672@gmail.com', 'Misti', 2, 1, '12345', '2024-05-06', '2024-06-05 23:23:25'),
(3, 'Ana', 'Juarez', '955578456', 'ashas@mail.com', 'Coropuna', 1, 1, '54321', '2024-07-15', '2024-06-05 23:23:34'),
(4, 'Juan', 'Martinez', '978453201', 'juan@gmail.com', 'Chachani', 2, 2, '1235', '2024-08-16', '2024-06-05 23:23:43'),
(5, 'Luisa', 'Paredes', '974512365', 'lpar@gmail.com', 'Coropuna', 3, 2, '123', '2024-09-11', '2024-06-05 23:24:03'),
(6, 'Adrian', 'Quispe', '978451237', 'adq@gmail.com', 'Misti', 4, 2, '321', '2024-08-12', '2024-06-05 23:46:07'),
(7, 'Wen', 'Mamani', '941236548', 'wmam@gmail.com', 'misti', 1, 2, '123', '2024-06-09', '2024-06-06 02:26:21'),
(10, 'Omnis id ullam id ex', 'Vel est dolore esse', 'Atque quibusdam et a', 'nifemeha@mailinator.com', '3', 43, 1, 'Pa$$w0rd!', '2022-07-09', '2024-06-08 17:20:55'),
(11, 'Quis mollit elit do', 'Voluptas earum fuga', 'Architecto maiores i', 'ritoqelav@mailinator.com', '2', 44, 1, 'Pa$$w0rd!', '1975-01-25', '2024-06-08 20:33:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destino_id` (`destino_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servicio_subcategoria` (`id_servicio_subcategoria`),
  ADD KEY `id_servicio_categoria` (`id_servicio_categoria`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_categorias`
--
ALTER TABLE `servicios_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indices de la tabla `servicios_subcategorias`
--
ALTER TABLE `servicios_subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio_cat_id` (`servicio_cat_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios_categorias`
--
ALTER TABLE `servicios_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `servicios_subcategorias`
--
ALTER TABLE `servicios_subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_servicio_categoria`) REFERENCES `servicios_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_servicio_subcategoria`) REFERENCES `servicios_subcategorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios_categorias`
--
ALTER TABLE `servicios_categorias`
  ADD CONSTRAINT `servicios_categorias_ibfk_1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios_subcategorias`
--
ALTER TABLE `servicios_subcategorias`
  ADD CONSTRAINT `servicios_subcategorias_ibfk_1` FOREIGN KEY (`servicio_cat_id`) REFERENCES `servicios_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
