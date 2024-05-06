-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2024 a las 14:13:38
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
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Codigo` int(80) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Apellido_Paterno` varchar(80) NOT NULL,
  `Apellido_Materno` varchar(80) NOT NULL,
  `Fecha_de_Nacimiento` varchar(80) NOT NULL,
  `Correo_electronico` varchar(80) NOT NULL,
  `Telefono` int(80) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Carrera` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`Codigo`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Fecha_de_Nacimiento`, `Correo_electronico`, `Telefono`, `Direccion`, `Carrera`) VALUES
(1, 'Neko', 'Michel', 'Limachi', '2018-12-05', 'neko@gmail.com', 57578999, 'Direccion 1', 'Cazador'),
(2, 'Loki', 'Michel', 'Limachi', '2024-03-05', 'loki@gmail.com', 78643239, 'Direccion 2', 'Cazador'),
(3, 'Chenoa', 'Michel', 'Limachi', '2020-03-28', 'cheno@gmail.com', 34567889, 'Zona Sur', 'Ing. En Sistemas Electronicos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
