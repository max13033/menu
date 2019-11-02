-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2019 at 10:08 
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robofood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `position`, `img`, `title`, `desc`) VALUES
(1, 0, 'img/photoEuro.jpg', 'Кулинария', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `subcat` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `yield` double NOT NULL,
  `price` double NOT NULL,
  `zakaz` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `position`, `subcat`, `title`, `desc`, `yield`, `price`, `zakaz`) VALUES
(100, 11, 36, 'С клёцками', '', 56, 656, 0),
(99, 10, 35, 'Тыквенный', '', 65, 56, 0),
(97, 8, 35, 'Морковный', '', 45, 54, 0),
(98, 9, 35, 'Мультифруктовый', '( Апельсин, ананас, яблоко груша)', 45, 76, 0),
(104, 15, 35, 'Груша', '', 54, 45, 0),
(103, 14, 36, 'Чаудер', '', 65, 432, 0),
(102, 13, 36, 'Куриный', '', 565, 656, 0),
(101, 12, 36, 'Суп с индейкой', '', 45, 545, 0),
(90, 1, 1, 'Пеперони', '', 765, 566, 0),
(91, 2, 1, 'с луком', '', 56, 56, 0),
(92, 3, 1, 'Пицца барбекю', '', 365, 456, 0),
(93, 4, 1, 'Пицца берега', '', 56, 56, 0),
(96, 7, 35, 'Яблоко вишня', '(описание)', 56, 65, 0),
(94, 5, 35, 'Апельсиновый', '', 45, 54, 0),
(95, 6, 35, 'Яблочный', '', 56, 56, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE IF NOT EXISTS `subcat` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `position`, `cat`, `title`, `desc`) VALUES
(1, 0, 1, 'Пицца', ''),
(36, 4, 1, 'Супы', ''),
(35, 3, 1, 'Соки', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `zakaz`
--

CREATE TABLE IF NOT EXISTS `zakaz` (
  `id` int(11) NOT NULL,
  `robot` int(11) NOT NULL,
  `totalSum` decimal(6,0) NOT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'started'
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zakaz`
--

INSERT INTO `zakaz` (`id`, `robot`, `totalSum`, `timeStart`, `timeEnd`, `status`) VALUES
(43, 1, '600', '2015-05-25 20:05:27', '0000-00-00 00:00:00', 'started'),
(42, 1, '3240', '2015-05-25 18:05:06', '0000-00-00 00:00:00', 'started'),
(30, 1, '1100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'completed'),
(41, 1, '590', '2015-05-25 18:05:39', '0000-00-00 00:00:00', 'started'),
(28, 1, '580', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'completed'),
(21, 2, '580', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'completed'),
(40, 2, '990', '2015-05-25 17:05:30', '0000-00-00 00:00:00', 'started'),
(39, 2, '3510', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
