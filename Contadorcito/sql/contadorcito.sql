-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 16:57:15
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
-- Base de datos: `contadorcito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes_compras`
--

CREATE TABLE `comprobantes_compras` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tipo_comprobante` varchar(255) NOT NULL,
  `numero_comprobante` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `archivo_pdf` varchar(255) DEFAULT NULL,
  `archivo_json` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobantes_compras`
--

INSERT INTO `comprobantes_compras` (`id`, `id_empresa`, `tipo_comprobante`, `numero_comprobante`, `fecha`, `monto`, `proveedor`, `archivo_pdf`, `archivo_json`) VALUES
(1, 1, 'Crédito Fiscal', 'CF-123', '2024-10-01', 1000.50, 'Proveedor 1', 'compra1.pdf', 'compra1.json'),
(2, 1, 'Consumidor Final', 'CF-124', '2024-10-05', 250.75, 'Proveedor 2', 'compra2.pdf', 'compra2.json'),
(3, 2, 'Crédito Fiscal', 'CF-125', '2024-10-10', 1500.00, 'Proveedor 3', 'compra3.pdf', 'compra3.json'),
(7, 1, 'Crédito Fiscal', '15563', '2020-05-02', 152.90, 'Floco S.A DE C.V', '%PDF-1.7\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(es) /StructTreeRoot 31 0 R/MarkInfo<</Marked true>>/Metadata 168 0 R/ViewerPreferences 169 0 R>>\r\nendobj\r\n2 0 obj\r\n<</Type/Pages/Count 3/Kids[ 3 0 R 24 0 R 27 0 R] >>\r\nendobj\r\n3 0 obj\r\n<</Type/Pag', ''),
(8, 1, 'Crédito Fiscal', '15563', '2023-06-05', 152.90, 'Floco S.A DE C.V', '%PDF-1.7\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(es) /StructTreeRoot 35 0 R/MarkInfo<</Marked true>>/Metadata 742 0 R/ViewerPreferences 743 0 R>>\r\nendobj\r\n2 0 obj\r\n<</Type/Pages/Count 2/Kids[ 3 0 R 32 0 R] >>\r\nendobj\r\n3 0 obj\r\n<</Type/Page/Paren', ''),
(9, 2, 'Crédito Fiscal', '15563', '2023-02-05', 152.90, 'Floco S.A DE C.V', '%PDF-1.7\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(es) /StructTreeRoot 31 0 R/MarkInfo<</Marked true>>/Metadata 168 0 R/ViewerPreferences 169 0 R>>\r\nendobj\r\n2 0 obj\r\n<</Type/Pages/Count 3/Kids[ 3 0 R 24 0 R 27 0 R] >>\r\nendobj\r\n3 0 obj\r\n<</Type/Pag', ''),
(10, 1, 'Consumidor Final', '15563', '2023-02-05', 500.48, 'Floco S.A DE C.V', '%PDF-1.7\n%????\n7 0 obj\n<< /Type /Page /Parent 1 0 R /LastModified (??e*??\\)C?\\(v??_?Va?) /Resources 2 0 R /MediaBox [0.000000 0.000000 841.890000 595.276000] /CropBox [0.000000 0.000000 841.890000 595.276000] /BleedBox [0.000000 0.000000 841.890000 5', ''),
(11, 2, 'Crédito Fiscal', '458', '2024-02-05', 135.90, 'SHEIN', '%PDF-1.7\n%????\n7 0 obj\n<< /Type /Page /Parent 1 0 R /LastModified (??e*??\\)C?\\(v??_?Va?) /Resources 2 0 R /MediaBox [0.000000 0.000000 841.890000 595.276000] /CropBox [0.000000 0.000000 841.890000 595.276000] /BleedBox [0.000000 0.000000 841.890000 5', ''),
(12, 2, 'Consumidor Final', '512', '2024-02-08', 155.35, 'TEMU', '%PDF-1.7\n%????\n7 0 obj\n<< /Type /Page /Parent 1 0 R /LastModified (??e*??\\)C?\\(v??_?Va?) /Resources 2 0 R /MediaBox [0.000000 0.000000 841.890000 595.276000] /CropBox [0.000000 0.000000 841.890000 595.276000] /BleedBox [0.000000 0.000000 841.890000 5', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes_ventas`
--

CREATE TABLE `comprobantes_ventas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tipo_comprobante` varchar(255) NOT NULL,
  `numero_comprobante` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `archivo_pdf` varchar(255) DEFAULT NULL,
  `archivo_json` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobantes_ventas`
--

INSERT INTO `comprobantes_ventas` (`id`, `id_empresa`, `tipo_comprobante`, `numero_comprobante`, `fecha`, `monto`, `cliente`, `archivo_pdf`, `archivo_json`) VALUES
(1, 1, 'Crédito Fiscal', 'CV-1001', '2024-10-02', 5000.00, 'Cliente 1', 'venta1.pdf', 'venta1.json'),
(2, 2, 'Consumidor Final', 'CV-1002', '2024-10-12', 1200.75, 'Cliente 2', 'venta2.pdf', 'venta2.json'),
(3, 3, 'Crédito Fiscal', 'CV-1003', '2024-10-15', 3200.00, 'Cliente 3', 'venta3.pdf', 'venta3.json');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_empresa` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `tipo_empresa`, `direccion`, `telefono`, `email`) VALUES
(1, 'Empresa 1', 'S.A. de C.V.', 'Calle Ficticia 123', '555-1234', 'contacto@empresa1.com'),
(2, 'Empresa 2', 'S.A. de R.L.', 'Avenida Ejemplo 456', '555-5678', 'contacto@empresa2.com'),
(3, 'Empresa 3', 'Natural', 'Calle Real 789', '555-8765', 'contacto@empresa3.com'),
(4, 'HENRY VASQUEZ', 'Natural', 'San Miguel', '75489612', 'henry.orellana303@gmail.com'),
(5, 'HENRY VASQUEZ', 'Natural', 'San Miguel', '75489612', 'henry.orellana303@gmail.com'),
(6, 'SIMAN S.A DE C.V', 'JURIDICA', 'SAN SALVADOR 202 BIS BOULEVAR LOS PROVINCIA ', '22304856', 'SIMAN@CONTABILIDAD.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `rol`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'usuario1', 'usuario123', 'usuario'),
(3, 'usuario2', 'usuario456', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprobantes_compras`
--
ALTER TABLE `comprobantes_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `comprobantes_ventas`
--
ALTER TABLE `comprobantes_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
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
-- AUTO_INCREMENT de la tabla `comprobantes_compras`
--
ALTER TABLE `comprobantes_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comprobantes_ventas`
--
ALTER TABLE `comprobantes_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprobantes_compras`
--
ALTER TABLE `comprobantes_compras`
  ADD CONSTRAINT `comprobantes_compras_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `comprobantes_ventas`
--
ALTER TABLE `comprobantes_ventas`
  ADD CONSTRAINT `comprobantes_ventas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
