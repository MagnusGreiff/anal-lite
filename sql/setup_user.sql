-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 19 apr 2017 kl 19:09
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 7.0.9

CREATE DATABASE IF NOT EXISTS oophp;
USE oophp;


SET NAMES utf8;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `oophp`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `setup-user`
--
DROP TABLE IF EXISTS `setup_user`;
CREATE TABLE `setup_user` (
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,

  KEY `index_age` (`age`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `setup-user`
--
ALTER TABLE `setup_user`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
