-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2015 г., 03:08
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `allzakazy`
--

INSERT INTO `allzakazy` (`id`, `robot`, `totalSum`, `timeStart`, `status`) VALUES
(11, 2, '1030', '2015-05-26 00:05:00', 'completed'),
(12, 2, '1000', '2015-05-26 00:05:34', 'completed'),
(13, 2, '280', '2015-05-26 00:05:49', 'started'),
(16, 2, '0', '2015-05-26 00:05:56', 'completed'),
(17, 2, '990', '2015-05-26 00:05:43', 'started'),
(19, 2, '0', '2015-05-26 00:05:14', 'started'),
(20, 2, '0', '2015-05-26 01:05:12', 'started'),
(21, 1, '1010', '2015-05-26 02:05:00', 'started'),
(22, 1, '0', '2015-05-26 02:05:28', 'started'),
(23, 1, '130', '2015-05-26 02:05:59', 'started'),
(24, 1, '580', '2015-05-26 02:05:27', 'started'),
(25, 1, '850', '2015-05-26 02:05:46', 'started'),
(26, 1, '50', '2015-05-26 02:05:55', 'started'),
(27, 2, '260', '2015-05-26 02:05:48', 'started'),
(28, 2, '420', '2015-05-26 02:05:02', 'started');

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazproducts`
--

INSERT INTO `zakazproducts` (`id`, `zakaz`, `title`, `yield`, `price`, `count`) VALUES
(34, 11, 'Ассорти мясное', '0', '580', 1),
(35, 11, 'Новый продукт', '0', '150', 3),
(36, 12, 'Лагман', '0', '250', 1),
(37, 12, 'Шурпа “Ташкентская”', '0', '250', 3),
(38, 13, 'Овощная карусель', '0', '160', 1),
(39, 13, 'Сосиска в тесте', '0', '60', 2),
(44, 16, 'Жасмин', '0', '0', 5),
(45, 17, 'Салат “Бахор”', '0', '330', 3),
(49, 19, 'Кофе Эспрессо', '0', '0', 3),
(50, 20, 'Сок', '0', '0', 1),
(51, 21, 'Шурпа “Ташкентская”', '0', '250', 1),
(52, 21, 'Шурпа с  фрикадельками', '0', '260', 1),
(53, 21, 'Чучвара шурпа “Узбекская” оригинальная', '0', '250', 2),
(54, 22, 'Кофе по-восточному', '0', '0', 1),
(55, 23, 'Картофельное пюре                                                           ', '0', '65', 2),
(56, 24, 'Ассорти мясное', '0', '580', 1),
(57, 25, 'Хрустящие жареные манты со сметаной', '0', '330', 2),
(58, 25, 'Чучвара по-дунгански со сметаной ', '0', '190', 1),
(59, 26, 'Блины с яблоками', '0', '50', 1),
(60, 27, 'Салат из  овощей запеченных', '0', '260', 1),
(61, 28, 'Спагетти с маслом и соусом Песто', '0', '320', 1),
(62, 28, 'Красный острый', '0', '50', 1),
(63, 28, 'Белый', '0', '50', 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `zakazproducts`
--
ALTER TABLE `zakazproducts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
