-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Júl 05. 09:32
-- Kiszolgáló verziója: 5.7.21
-- PHP verzió: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `masks`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `pw`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `forum`
--

INSERT INTO `forum` (`id`, `comment`) VALUES
(1, 'vbgynuhmiijhncvcbtxfc'),
(2, 'serxtyufjgvuhb gftcgv'),
(12, 'dgtbfyvhgnhfbcf'),
(13, 'xddrgtfbhvgh g'),
(14, 'zdxrtyhnv  fcfg'),
(33, '\r\nmegmmnsdjn kjsrfbu skdfjnisd,jfm ihhakudhfksrjidjkckxvj vr j s skdnfjsdbbjv ksjdfh\r\nmegmmnsdjn kjsrfbu skdfjnisd,jfm ihhakudhfksrjidjkckxvj vr j s skdnfjsdbbjv ksjdfh');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `masks`
--

DROP TABLE IF EXISTS `masks`;
CREATE TABLE IF NOT EXISTS `masks` (
  `masks_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `price` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`masks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `masks`
--

INSERT INTO `masks` (`masks_id`, `name`, `type`, `price`, `in_stock`, `description`, `image`) VALUES
(1, 'Egyszerű maszk', 'Orvosi', 20, 2000, 'Egyszerű orvosi maszk, minden napi használatra.', 'pictures/egszerum'),
(2, 'Egyszerű ruha maszk', 'Általános használatra', 100, 100, 'Egyszerű ruha maszk minden napi használatra.', 'pictures/ruhamaszk'),
(3, 'Egyszerű ruha maszk(alakított)', 'Általános használatra', 100, 100, 'Egyszerű arcra símuló ruha maszk, minden napi használatra.', 'pictures/clothmask'),
(4, 'kn95 Maszk', 'Orvosi', 80, 500, 'Orvosi maszk, amely az arcra símul így leszűri a levegőt a pollenektől, portól és hasonló dolgoktól amik megtalálhatóak a levegőben.', 'pictures/kn95respiratormask'),
(6, 'n95 Maszk', 'Orvosi', 150, 400, 'n95-ös orvosi maszk, külön szűrővel ellátva, amely leszűri a levegőt a benne megtalálható anyagoktól amit nem szeretnénk belélegezni.', 'pictures/filterm'),
(7, 'Elipse maszk', 'Munka', 1000, 50, 'Munkára való maszk több szűrővel ellátva, leszűri a levegőt nem csak a portól, de a különféle káros anyagoktól amelyeket szabad szemmel nem lehet látni.', 'pictures/szurosmaszk'),
(8, 'Na and Um', 'Munka', 1500, 25, 'Munkára való maszk, komolyabb szűrőkkel ellátva, amelyek leszűrik a levegőt a káros, szemmel nem látható anyagoktól.', 'pictures/workmask'),
(9, 'Hegesztő maszk', 'Munka', 3000, 10, 'Hegesztésre alkalmas védő maszk, amely megvédi az arcunk a lepattanó szikráktól és szemünk az erős fénytől.', 'pictures/workmask2'),
(10, 'Mantis Búvármaszk', 'Búvármaszk', 2000, 10, 'Búvárkodásra alkalmas maszk.', 'pictures/divingmask');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `piece` int(10) NOT NULL,
  `city` varchar(32) NOT NULL,
  `street` varchar(32) NOT NULL,
  `house_number` int(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(55) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `piece`, `city`, `street`, `house_number`, `phone`, `email`) VALUES
(1, 'Egyszerű ruha maszk', 5, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(2, 'Egyszerű ruha maszk', 17, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(3, 'Egyszerű ruha maszk', 12, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(4, 'choose', 1, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(5, 'Egyszerű ruha maszk', 16, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(6, 'n95 Maszk', 14, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(7, 'Na and Um', 1, 'sdfd', 'dfgdf', 345, 691995222, 'felhasznalo@gmail.com'),
(8, 'Hegesztő maszk', 15, 'wergd', 'rdtdr', 345, 691995222, 'felhasznalo@gmail.com'),
(9, 'Mantis Búvármaszk', 18, 'drgd', 'huhj', 56, 691995222, 'felhasznalo@gmail.com'),
(10, 'Mantis Búvármaszk', 18, 'drgd', 'huhj', 56, 691995222, 'felhasznalo@gmail.com'),
(11, 'n95 Maszk', 16, 'sgdrs', 'huhj', 345, 3456, 'felhasznalo@gmail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(55) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'felhasznalo', 'ae584fad1aaa7e6dd965d2147b7683fc', 'felhasznalo@gmail.com'),
(2, 'valaki', 'bd1b786f53d29148a06d253f07842e3e', 'valaki@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
