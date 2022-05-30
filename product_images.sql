-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 30 2022 г., 02:21
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='image files related to a product';

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(1, 1, 'pain1.jpg', '2022-03-10 10:40:21', '2022-05-29 22:14:47'),
(2, 1, 'pain2.jpg', '2022-03-10 10:40:21', '2022-05-29 22:14:47'),
(3, 1, 'pain3.jpg', '2022-03-10 10:40:21', '2022-05-29 22:14:47'),
(4, 2, 'prodcons1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(5, 2, 'prodcons2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(6, 2, 'prodcons3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(7, 3, 'graph1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(8, 3, 'graph2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(9, 3, 'graph3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(10, 4, 'parser1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(11, 4, 'parser2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(12, 5, 'vkbot1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(13, 5, 'vkbot2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(14, 5, 'vkbot3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(15, 6, 'userlist1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(16, 6, 'userlist2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(17, 6, 'userlist3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(18, 7, 'sparcematrix1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(19, 7, 'sparcematrix2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(20, 8, 'matrix1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(21, 8, 'matrix2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(22, 9, 'trainer1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(23, 9, 'trainer2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(24, 9, 'trainer3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(25, 10, 'gas1.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(26, 10, 'gas2.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(27, 10, 'gas3.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(29, 9, 'trainer4.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47'),
(30, 9, 'trainer5.jpg', '2022-04-10 10:40:21', '2022-05-29 22:14:47');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
