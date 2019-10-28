-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2015 at 12:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vyd`
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `position`, `img`, `title`, `desc`) VALUES
(28, 0, 'img/photoEast.jpg', 'Восточная кухня', 'yyhhy'),
(29, 0, 'img/photoChild.jpg', 'Детское меню', ''),
(33, 0, 'img/photoEuro.jpg', 'Европейская кухня', ''),
(32, 0, 'img/photoDrinks.jpg', 'Вода, вино, напитки', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `position`, `subcat`, `title`, `desc`, `yield`, `price`, `zakaz`) VALUES
(24, 0, 12, 'Огурцы', '', 0, 0, 0),
(28, 0, 19, 'Нарзан газ.', '', 0.7, 25, 17),
(27, 0, 19, 'Бон Аква газ., и н/газ', '', 0, 40, 10),
(25, 0, 12, 'Помидоры', '', 0, 0, 0),
(26, 0, 11, 'Ежевика', 'купкуп', 100, 5000, 0),
(29, 0, 19, 'Ледяная жемчужина', '', 0.5, 30, 4),
(30, 0, 21, 'Кока-Кола', '', 0.33, 50, 0),
(31, 0, 21, 'Спрайт', '', 1, 90, 0),
(32, 0, 21, 'Швепс-тоник', '', 0.33, 40, 0),
(33, 1, 22, 'Сок Я', '', 1, 150, 0),
(34, 0, 22, 'Сок RICH', '', 1, 200, 0),
(35, 0, 23, 'Апельсиновый', '', 0, 0, 0),
(36, 0, 23, 'Ананасовый', '', 0, 0, 0),
(37, 0, 23, 'Яблочный', '', 0, 0, 0),
(38, 0, 23, 'Грейпфрутовый', '', 0, 0, 0),
(39, 0, 23, 'Морковный', '', 0, 0, 0),
(40, 0, 23, 'Яблочно-морковный', '', 0, 0, 0),
(41, 0, 23, 'Лимонный', '', 0, 0, 0),
(42, 0, 23, 'Чесночный', '', 1, 50000, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `position`, `cat`, `title`, `desc`) VALUES
(20, 0, 28, 'Евроблюдо', ''),
(19, 1, 32, 'Минеральная вода', ''),
(21, 2, 32, 'Безалкогольные напитки', ''),
(22, 3, 32, 'Соки в ассортименте', ''),
(23, 4, 32, 'Свежевыжатые соки', ''),
(24, 5, 32, 'Чай черный листовой', ''),
(25, 6, 32, 'Чай зеленый коллекционный', ''),
(26, 7, 32, 'Чай фруктовый', ''),
(27, 9, 32, 'Кофе', ''),
(28, 8, 32, 'Горячий шоколад', ''),
(29, 11, 32, 'Вино', ''),
(30, 12, 32, 'Коктейли', '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
