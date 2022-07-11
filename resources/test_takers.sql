-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Júl 11. 14:43
-- Kiszolgáló verziója: 10.4.20-MariaDB
-- PHP verzió: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `lara_tests`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `test_takers`
--

CREATE TABLE `test_takers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testTaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correctAnswers` int(11) NOT NULL,
  `incorrectAnswers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `test_takers`
--

INSERT INTO `test_takers` (`id`, `testTaker`, `correctAnswers`, `incorrectAnswers`) VALUES
(1, '12-345-6789', 15, 25),
(6, '64-465-6944', 22, 90),
(7, '83-844-7211', 17, 25),
(1022, '12-343-5678', 12, 12);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `test_takers`
--
ALTER TABLE `test_takers`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `test_takers`
--
ALTER TABLE `test_takers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
