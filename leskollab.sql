-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 01:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leskollab`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` int(200) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `number`, `msg`) VALUES
('a', '111', 90, 'a'),
('COLE', '', 0, ''),
('COLE', '111ar', 0, ''),
('Arpit Jain', '111arpit1@gmail.com', 0, 'aaaaaaaaaaaaa'),
('Arpit Jain', '111arpit1@gmail.com', 0, 'aaaaaaaaaaaaa'),
('Arpit Jain', 'arpit456jain@gmail.com', 0, 'helo'),
('Arpit Jain', 'arpit4567jain@gmail.com', 0, 'a'),
('', '', 998, ''),
('Arpit Jain', '111arpit1@gmail.com', 2147483647, 'This is testing msg by arpit jain '),
('AMan', 'excelresearchpapers@gmail.com', 2147483647, 'testing 2 by aman');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdes` varchar(255) NOT NULL,
  `plink` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `github`, `linkedin`, `profile`, `salt`, `bio`, `createdAt`) VALUES
(9, '111arpit1@gmail.com', 'AJ', '123456789', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
