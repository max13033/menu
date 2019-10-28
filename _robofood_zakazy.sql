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
-- База данных: `robofood_zakazy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `allzakazy`
--

CREATE TABLE IF NOT EXISTS `allzakazy` (
  `id` int(11) NOT NULL,
  `robot` int(11) NOT NULL,
  `totalSum` decimal(6,0) NOT NULL,
  `timeStart` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'started'
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `allzakazy`
--

INSERT INTO `allzakazy` (`id`, `robot`, `totalSum`, `timeStart`, `status`) VALUES
(66, 1, '444', '2019-03-17 15:03:18', 'completed'),
(67, 2, '509', '2019-03-17 15:03:50', 'started'),
(68, 10, '65', '2019-03-17 15:03:47', 'completed');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazproducts`
--

CREATE TABLE IF NOT EXISTS `zakazproducts` (
  `id` int(11) NOT NULL,
  `zakaz` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `yield` decimal(6,0) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazproducts`
--

INSERT INTO `zakazproducts` (`id`, `zakaz`, `title`, `yield`, `price`, `count`) VALUES
(71, 66, 'Блюдо', '0', '444', 1),
(72, 67, 'Бон Аква газ., и н/газ', '0', '40', 1),
(73, 67, 'Нарзан газ.', '0', '25', 1),
(74, 67, 'Блюдо', '0', '444', 1),
(75, 68, 'Бон Аква газ., и н/газ', '0', '40', 1),
(76, 68, 'Нарзан газ.', '0', '25', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `allzakazy`
--
ALTER TABLE `allzakazy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakazproducts`
--
ALTER TABLE `zakazproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `allzakazy`
--
ALTER TABLE `allzakazy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT для таблицы `zakazproducts`
--
ALTER TABLE `zakazproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
