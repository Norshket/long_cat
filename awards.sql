-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2021 г., 17:58
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `awards`
--

-- --------------------------------------------------------

--
-- Структура таблицы `athletes`
--

CREATE TABLE `athletes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sure_name` varchar(150) NOT NULL,
  `patronymic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `athletes`
--

INSERT INTO `athletes` (`id`, `name`, `sure_name`, `patronymic`) VALUES
(5, 'Грегош ', 'Бженджештукевич', ''),
(6, 'Имя ', ' Фамилия ', 'Отчество');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(5, 'Уганда'),
(6, 'Польша');

-- --------------------------------------------------------

--
-- Структура таблицы `country_medals`
--

CREATE TABLE `country_medals` (
  `id` int(11) NOT NULL,
  `medal_type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `athletes_id` int(11) NOT NULL,
  `sport_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country_medals`
--

INSERT INTO `country_medals` (`id`, `medal_type_id`, `country_id`, `athletes_id`, `sport_type_id`) VALUES
(1, 1, 6, 4, 4),
(2, 2, 5, 5, 5),
(3, 1, 5, 4, 4),
(4, 1, 5, 4, 4),
(5, 2, 6, 4, 5),
(6, 2, 6, 4, 4),
(7, 3, 6, 5, 5),
(8, 1, 6, 5, 4),
(9, 2, 0, 5, 8),
(10, 2, 5, 6, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `medal_type`
--

CREATE TABLE `medal_type` (
  `id` int(11) NOT NULL,
  `medal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `medal_type`
--

INSERT INTO `medal_type` (`id`, `medal`) VALUES
(1, 'Золото'),
(2, 'Серебро'),
(3, 'Медь');

-- --------------------------------------------------------

--
-- Структура таблицы `sport_type`
--

CREATE TABLE `sport_type` (
  `id` int(11) NOT NULL,
  `sport_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sport_type`
--

INSERT INTO `sport_type` (`id`, `sport_type`) VALUES
(4, 'Сон на время'),
(8, 'лежание сидя');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country_medals`
--
ALTER TABLE `country_medals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `medal_type`
--
ALTER TABLE `medal_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sport_type`
--
ALTER TABLE `sport_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `country_medals`
--
ALTER TABLE `country_medals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `medal_type`
--
ALTER TABLE `medal_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sport_type`
--
ALTER TABLE `sport_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
