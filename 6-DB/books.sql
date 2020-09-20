-- Папка 6. Создать бд library и в ней таблицу books с пятью полями (id, Название, автор, год издания, рейтинг от 1 до 5).
-- id должен быть первичным ключом с автоинкрементом. Ни одно из полей не может быть пустым. Добавить в таблицу пять записей.
-- После создания таблицы добавить в нее еще три поля: цвет обложки, прочитана книга или нет и количество страниц. Цвет
-- обложки должен быть по умолчанию красный. Поле прочитана книга или нет по умолчанию false, содержит только булевые значения.
-- Изменить все записи, добавив в них цвета обложек и true вместо false в поле прочитана книга или нет.

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 20 2020 г., 15:29
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL COMMENT 'Первичный ключ с автоинкрементом',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название книги',
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Автор книги',
  `publication_year` int(4) NOT NULL COMMENT 'Год публикации',
  `rating` float NOT NULL COMMENT 'Рейтинг книги',
  `cover_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'red' COMMENT 'Цвет обложки',
  `read_or_not` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Прочитана книга или нет, тип данных - bool',
  `num_of_pages` int(4) NOT NULL COMMENT 'Количество страниц'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publication_year`, `rating`, `cover_color`, `read_or_not`, `num_of_pages`) VALUES
(1, 'Джейн Эйр', 'Шарлотта Бронте', 1847, 4.4, 'brown', 1, 576),
(2, 'Молчание ягнят', 'Томас Харрис', 1988, 4.6, 'yellow', 1, 512),
(3, 'Грозовой перевал', 'Эмили Бронте', 1847, 4.6, 'grey', 1, 368),
(4, 'Жареные зеленые помидоры в кафе полустанок', 'Фэнни Флэгг', 1987, 4.6, 'green', 1, 416),
(5, 'Зеленая миля', 'Стивен Кинг', 1996, 4.9, 'green', 1, 384);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Первичный ключ с автоинкрементом', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
