-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2015 at 10:48 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `date_created`, `date_modified`, `token`) VALUES
(3, 'nina@nina.com', 'ninon', '$2y$10$6n7XPLsYlHxQ6KOyDOxV0uy6wYNSv7KuGfagZjFkrgMjEL6f3fpWy', '2015-07-20 15:09:03', NULL, ''),
(4, 'nord@sud.com', 'nordsud', '$2y$10$ueegzCAkt.MWq7mB075jNOzboKoMbRKN2Ht0iE4D6EVuuXvJj2QAW', '2015-07-20 15:31:18', NULL, ''),
(5, 'ninu@niv.com', 'bibi', '$2y$10$WVntGHQKvPZaUwGp/k99PunZxMu.MHpFXb7B8ssOHnUDjT7jxFBNq', '2015-07-21 11:52:53', NULL, ''),
(6, 'div@div.com', 'argent', '$2y$10$Z8TnXEBvceLUbrD0Tpe6UeXPonz6EJEtsgF7bW/8nKW8rolTlCu8G', '2015-07-21 14:35:14', NULL, 'jiCN0EE-KRIz8H5UjU4Vz-699jRea8zpj1aPHyiEfUL6ABgQj-oHVoBaDjaI'),
(7, 'diva@diva.com', 'or', '$2y$10$X1wZwEs8P0BVsDdWMb4Io.VGr7XCRZi7tTYdKIALU9eI3omh3ORjO', '2015-07-21 14:37:01', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
