-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 07. 13:59
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_elso_dolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `halak`
--

CREATE TABLE `halak` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `suly` float NOT NULL,
  `so` tinyint(1) NOT NULL,
  `kifogva` date NOT NULL,
  `megrendelo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `halak`
--

INSERT INTO `halak` (`id`, `nev`, `suly`, `so`, `kifogva`, `megrendelo`) VALUES
(1, 'ponty', 21.3, 0, '2024-01-07', 'ecsedi@petrik.hu'),
(2, 'pisztráng', 4.5, 0, '2022-01-01', 'valaki@gmail.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `halak`
--
ALTER TABLE `halak`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `halak`
--
ALTER TABLE `halak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
