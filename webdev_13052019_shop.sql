-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 30 2019 г., 14:18
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webdev_13052019_shop`
--
CREATE DATABASE IF NOT EXISTS `webdev_13052019_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webdev_13052019_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`) VALUES
(1, 'Мужчинам'),
(2, 'Женщинам'),
(3, 'Детям');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img1` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img1`, `sku`, `text`) VALUES
(1, 'Куртка синяя', 5400, '/images/catalog/1.jpg', '123456', 'Куртка синяя удобная'),
(2, 'Кожаная куртка', 22500, '/images/catalog/4.jpg', '123213', 'Кожаная куртка'),
(3, 'Джинсы', 4800, '/images/catalog/11.jpg', '231245', 'Джинсы'),
(4, 'Куртка с капюшоном', 6100, '/images/catalog/2.jpg', '564768', 'Куртка с капюшоном'),
(5, 'Куртка с карманами', 22500, '/images/catalog/3.png', '232123', 'Куртка с карманами'),
(6, 'Куртка с капюшоном', 6100, '/images/catalog/2.jpg', '333121', 'Куртка с капюшоном'),
(7, 'Куртка Casual', 8800, '/images/catalog/5.jpg', '432356', 'Куртка Casual'),
(8, 'Стильная кожаная куртка', 12800, '/images/catalog/6.jpg', '343232', 'Стильная кожаная куртка'),
(9, 'Кеды серые', 2900, '/images/catalog/7.jpg', '123222', 'Кеды серые'),
(10, 'Кеды черные', 4500, '/images/catalog/8.jpg', '567897', 'Кеды черные'),
(11, 'Кеды Casual', 5900, '/images/catalog/9.jpg', '787656', 'Отличные кеды из водонепроницаемого материала. Отлично подходят для любой погоды.<br>\r\nПриятно сидят на ноге, стильные и комфортные'),
(12, 'Кеды всепогодные', 9200, '/images/catalog/10.jpg', '898786', 'Кеды всепогодные'),
(13, 'Джинсы', 4800, '/images/catalog/11.jpg', '343546', 'Джинсы'),
(14, 'Джинсы голубые', 4200, '/images/catalog/12.jpg', '657679', 'Джинсы голубые');

-- --------------------------------------------------------

--
-- Структура таблицы `products_catalogs`
--

CREATE TABLE IF NOT EXISTS `products_catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_catalogs`
--

INSERT INTO `products_catalogs` (`id`, `catalog_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `products_sizes`
--

CREATE TABLE IF NOT EXISTS `products_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size_id`, `quantity`) VALUES
(1, 2, 2, 1),
(5, 1, 1, 3),
(6, 1, 3, 0),
(7, 1, 4, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `priority`) VALUES
(1, 'M', 0),
(2, 'L', 10),
(3, 'XL', 20),
(4, 'XXL', 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
