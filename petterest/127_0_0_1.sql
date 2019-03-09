-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 May 2017, 20:34:48
-- Sunucu sürümü: 5.7.9
-- PHP Sürümü: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `petportal`
--
CREATE DATABASE IF NOT EXISTS `petportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `petportal`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `animalID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `aSpecies` varchar(255) NOT NULL,
  `aKind` varchar(255) NOT NULL,
  `aName` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `vaccine` varchar(255) NOT NULL,
  `aAvatar` varchar(255) NOT NULL,
  `momKind` varchar(255) NOT NULL,
  `dadKind` varchar(255) NOT NULL,
  `sharePurpose` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `addDate` varchar(255) NOT NULL,
  `lastSituation` tinyint(2) NOT NULL,
  PRIMARY KEY (`animalID`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `animals`
--

INSERT INTO `animals` (`animalID`, `userID`, `aSpecies`, `aKind`, `aName`, `birthDate`, `gender`, `vaccine`, `aAvatar`, `momKind`, `dadKind`, `sharePurpose`, `information`, `addDate`, `lastSituation`) VALUES
(47, 23, 'dog', 'Alaskan Malamute', 'Bailey', '2016-04-09', 'female', 'yes', '../tema/my_profile/my_pets/images/re61451.jpg', 'Alaskan Malamute', 'Alaskan Malamute', 'mating', ':D ', '2017-05-31 23:23:34', 1),
(44, 23, 'dog', 'Affenpinscher', 'chi chi', '2013-03-23', 'male', 'yes', '../tema/my_profile/my_pets/images/er17621.jpg', 'Affenpinscher', 'Affenpinscher', 'mating', 'my sweet dog want to be happy :D ', '2017-05-31 23:16:27', 1),
(43, 22, 'dog', 'LABRADOR', 'Annie', '2017-05-10', 'female', 'yes', '../tema/my_profile/my_pets/images/se26249.jpg', 'LABRADOR', 'LABRADOR', 'ownership', 'Annie loves to play with her toys. ', '2017-05-31 23:09:31', 1),
(45, 23, 'cat', 'Alaskan Malamute', 'Rocky', '2016-01-31', 'male', 'yes', '../tema/my_profile/my_pets/images/re52137.jpg', 'Alaskan Malamute', 'Alaskan Malamute', 'ownership', 'mw sweet is too alone...:D  ', '2017-05-31 23:18:41', 1),
(46, 23, 'dog', 'Alpine Dachsbracke', 'cabbar', '2017-01-07', 'male', 'yes', '../tema/my_profile/my_pets/images/yts10627.jpg', 'Alpine Dachsbracke', 'Alpine Dachsbracke', 'Just Add', 'Hello...', '2017-05-31 23:21:48', 1),
(48, 23, 'dog', ' Terrier', 'Molly', '2016-11-17', 'female', 'yes', '../tema/my_profile/my_pets/images/uy81443.png', ' Terrier', ' Terrier', 'mating', 'Hi :D  ', '2017-05-31 23:24:33', 1),
(49, 24, 'bird', 'Kangal', 'Chloe', '2012-03-30', 'male', 'yes', '../tema/my_profile/my_pets/images/uy26719.png', 'Kangal', 'Kangal', 'mating', 'hello :D ', '2017-05-31 23:28:02', 1),
(42, 22, 'cat', 'tekir', 'pamuk', '2015-10-06', 'male', 'yes', '../tema/my_profile/my_pets/images/re25693.png', 'tekir', 'tekir', 'mating', 'My sweet cat is very alone..:D ', '2017-05-31 23:04:19', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `animalID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `addDate` varchar(50) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `rutbe` tinyint(4) NOT NULL,
  `onay` tinyint(4) NOT NULL,
  `enrolDate` varchar(20) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `name`, `surname`, `e_mail`, `password`, `gender`, `birthDate`, `address`, `avatar`, `rutbe`, `onay`, `enrolDate`) VALUES
(22, 'resat', 'memis', 'resat@gmail.com', '123456', 'male', '2017-05-23', 'From The EARTH', '../tema/images/users_avatar/er19230.jpg', 0, 1, '2017-05-31 22:59:07'),
(23, 'hasan', 'hüseyin', 'hasan@gmail.com', '123456', 'male', '2015-05-16', 'From The EARTH', '../tema/images/users_avatar/noAvatar.png', 0, 1, '2017-05-31 23:14:10'),
(24, 'yasir', 'sezmiş', 'yasir@gmail.com', '123456789', 'male', '1978-01-31', 'From The EARTH', '../tema/images/users_avatar/noAvatar.png', 0, 1, '2017-05-31 23:26:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
