-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 17 2019 г., 16:11
-- Версия сервера: 5.6.31
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `robofood`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cat`
--

INSERT INTO `cat` (`id`, `position`, `img`, `title`, `desc`) VALUES
(1, 0, 'img/photoEuro.jpg', 'Европейская кухня', ''),
(2, 0, 'img/photoDrinks.jpg', 'Вода, вино, напитки', '');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `position`, `subcat`, `title`, `desc`, `yield`, `price`, `zakaz`) VALUES
(28, 0, 2, 'Нарзан газ.', '', 0.7, 25, 17),
(27, 0, 2, 'Бон Аква газ., и н/газ', '', 0, 40, 10),
(46, 5, 1, 'Суп', '', 400, 250, 0),
(45, 4, 1, 'Блюдо', 'пвпа', 444, 444, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subcat`
--

CREATE TABLE IF NOT EXISTS `subcat` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcat`
--

INSERT INTO `subcat` (`id`, `position`, `cat`, `title`, `desc`) VALUES
(1, 0, 1, 'Евроблюдо', ''),
(2, 0, 2, 'Напитки', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
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
-- Дамп данных таблицы `zakaz`
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
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
