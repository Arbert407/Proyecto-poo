-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-05-2018 a las 03:51:44
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_nube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `respuesta` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `carpeta` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `nombre`, `apellido`, `correo`, `contrasena`, `respuesta`, `tipo`, `carpeta`, `ruta`) VALUES
(1, 'Doctor', 'Strange', 'strange23@gmail.com', '123456', 'hitler', 1, 1, 'data/'),
(2, 'Isaac', 'Newton', 'newton64@gmail.com', '212121', 'que es el cine?', 2, 2, 'data/2/'),
(3, 'Pedro ', 'Picapiedra', 'picapiedra45@gmail.com', '343434', 'Pancho', 2, 3, 'data/3/'),
(5, 'hola', 'mundo', 'mundo1@gmail.com', '111111', 'la luna', 2, 5, 'data/5/'),
(4, 'a', 'a', 'aa@gmail.com', 'aaaaaa', 'aaa', 2, 4, 'data/4/'),
(15, 's', 's', 's@gmail.com', 'ssssss', 'ss', 2, 6, 'data/6/'),
(16, 's', 's', 's@gmail.com', 'ssssss', 'ss', 2, 16, 'data/16/'),
(17, 'Un', 'Dia', 'dia@gmail.com', 'diadia', 'dia', 2, 17, 'data/17/'),
(18, 'a', 'a', 'a2@gmail.com', 'aaaaaa', 'a', 2, 18, 'data/18/'),
(19, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 19, 'data/19/'),
(20, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 20, 'data/20/'),
(21, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 21, 'data/21/'),
(22, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 22, 'data/22/'),
(23, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 23, 'data/23/'),
(24, 'a', 'aa', 'aa@gmail.com', 'aaaaaaaaa', 'aaa', 2, 24, 'data/24/'),
(25, 'Eren', 'Jeager', 'jeager19@gmail.com', '121212', 'el titan acorazado', 2, 25, 'data/25/'),
(26, 'Levi', 'Ackerman ', 'ackerman@gmail.com', 'ackerman', 'Sasha', 1, 26, 'data/');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
