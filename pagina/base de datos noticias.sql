-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 16:42:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticias`
--

CREATE TABLE `noticias` (
  `Noticia_id` int(55) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Noticias`
--

INSERT INTO `Noticias` (`Noticia_id`, `Title`, `Image`, `Description`, `Link`) VALUES
(4, 'Tarek William Saab: En Venezuela no hay niños detenidos, hay adolescentes', 'imagenes\\noticias\\tarek.jpg', 'Descripción breve de la noticia destacada...', 'C:\\xampp\\htdocs\\pagina w\\pagina 2\\noticias.data/noticia-tarek.html'),
(5, 'Edmundo González en Bruselas: El 10 de enero estaremos tomando posesión del nuevo gobierno en Venezuela', 'imagenes/noticias/edmundo.jpg', 'El líder opositor venezolano se reunirá con Josep Borrell...', 'noticias/noticias.data/noticia-edmundo'),
(6, 'En imágenes: España en alerta por una nueva DANA que está causando inundaciones', 'imagenes\\noticias\\España.webp', 'Las tormentas que se avecinan también obligaron a suspender...', '/pagina/noticias/3.html');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  ADD PRIMARY KEY (`Noticia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  MODIFY `Noticia_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
