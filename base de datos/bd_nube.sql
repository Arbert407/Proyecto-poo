-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-05-2018 a las 01:55:40
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
  `pswsha1` varchar(400) NOT NULL,
  PRIMARY KEY (`codigo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `nombre`, `apellido`, `correo`, `contrasena`, `respuesta`, `tipo`, `carpeta`, `ruta`, `pswsha1`) VALUES
(1, 'Doctor', 'Strange', 'strange23@gmail.com', '123456', 'hitler', 1, 1, 'data/', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'Isaac', 'Newton', 'newton64@gmail.com', '212121', 'que es el cine?', 2, 2, 'data/2/', '03785d4e638cd09cea620fd0939bf06825be88df'),
(3, 'Pedro ', 'Picapiedra', 'picapiedra45@gmail.com', '343434', 'Pancho', 2, 3, 'data/3/', 'e77dcace2b3869df8f46925352b67e51938d5a76'),
(29, 'Yo soy', 'Groot', 'groot@gmail.com', 'yosoygroot', 'Yo soy Groot', 2, 29, 'data/29/', 'aa867e855e4f26174279510c2120d746d60fabbd'),
(43, 'Albert', 'Einstein', 'einstein@gmail.com', 'relatividad', 'x', 2, 43, 'data/43/', '0e47b8b4d1bb3f0075076d06a9be08d87c7b5317'),
(26, 'Levi', 'Ackerman ', 'ackerman@gmail.com', 'ackerman', 'Sasha', 1, 26, 'data/', 'c0357d48785e8aa2a5907271710792d8fa9d5119'),
(27, 'The', 'Hackerman', 'hackerman@gmail.com', 'Ws3400%', 'Elliot Anderson', 1, 27, 'data/', '0451626aa0327321fa9a0052182a6adbb2c25399'),
(46, 'Una', 'Persona', 'persona@gmail.com', '123456', 'Goku', 2, 46, 'data/46/', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(47, 'Un', 'Estudiante', 'un@gmail.com', '123456', 'Iron Man', 2, 47, 'data/47/', '7c4a8d09ca3762af61e59520943dc26494f8941b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
