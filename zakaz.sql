-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 25 2015 г., 23:07
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `robofood_zakaz`
--

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
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
