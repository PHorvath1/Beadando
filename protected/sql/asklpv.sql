-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 10. 15:44
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `asklpv`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `pid`, `uid`, `date`, `content`) VALUES
(1, 3, 1, '2020-05-09 13:51:50', 'And it works flawlessly.'),
(2, 3, 1, '2020-05-09 15:54:54', '...and it separates nicely as well.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`id`, `uid`, `title`, `content`, `date`) VALUES
(1, 1, 'Version 0.7.1', '-Fixed date display issues', '2020-05-07 10:56:18'),
(2, 1, 'Version 0.7.2', '-Added post author to each post\r\n-Separated author and date from post content', '2020-05-07 11:19:36'),
(3, 1, 'Version 0.7.3', '-Added comment button, now you can express your thoughts below every post', '2020-05-09 13:11:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `first_name` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(1, 'Péter', 'Horváth', 'hpeti291@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2),
(2, 'User', 'Test', 'user@test.com', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 0),
(3, 'Member', 'Teszt', 'member@teszt.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
