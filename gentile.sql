-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2013 a las 10:42:46
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gentile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gentile`
--

CREATE TABLE IF NOT EXISTS `gentile` (
  `id_gentile` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_zone` int(11) NOT NULL,
  `nom_gentile` varchar(225) NOT NULL,
  `auteur` varchar(225) NOT NULL,
  PRIMARY KEY (`id_gentile`),
  KEY `id_joueur` (`id_joueur`),
  KEY `id_zone` (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `id_joueur` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pays` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id_score` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `nombredepoint` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_score`),
  KEY `id_joueur` (`id_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trophe`
--

CREATE TABLE IF NOT EXISTS `trophe` (
  `id_trophe` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type_trophe` varchar(225) NOT NULL,
  PRIMARY KEY (`id_trophe`),
  KEY `id_joueur` (`id_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `id_zone` int(11) NOT NULL,
  `longitude` float DEFAULT NULL,
  `laltitude` float DEFAULT NULL,
  `zone_min` float DEFAULT NULL,
  `zone_max` float DEFAULT NULL,
  `adress` varchar(225) NOT NULL,
  `code_postal` varchar(225) NOT NULL,
  `ville` varchar(225) NOT NULL,
  `pays` varchar(225) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gentile`
--
ALTER TABLE `gentile`
  ADD CONSTRAINT `gentile_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`),
  ADD CONSTRAINT `gentile_ibfk_2` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`);

--
-- Filtros para la tabla `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`);

--
-- Filtros para la tabla `trophe`
--
ALTER TABLE `trophe`
  ADD CONSTRAINT `trophe_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
