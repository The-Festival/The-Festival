-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 28, 2023 at 07:51 PM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--
CREATE DATABASE IF NOT EXISTS `developmentdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `developmentdb`;

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE `About` (
  `about_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `About`
--

INSERT INTO `About` (`about_id`, `detail_id`, `type`, `about`) VALUES
(1, 1, 'history', 'Take a 2 hour tour the City of Haarlem to immerse yourself into the history of one of the oldest cities in the Netherlands. An amazing walk of discovery covering nine historic landmarks starting at St. Bavo Kerk the walk shows how much the city has changed from the 13th Century. Refreshments will be available at the iconic Jopenkerk. Do not miss on on this great opportunity for the whole family'),
(2, 2, 'history', 'Reformed Protestant church and former Catholic cathedral located on the central market square (Grote Markt).\r\nFirst mention of a church on this spot was made in 1307, but the wooden structure burned in the 14th century. The church was rebuilt and promoted to chapter church in 1479 and only became a cathedral in 1559.'),
(3, 2, 'history', 'Centre of the city where there are a larger number of interesting buildings, including the quaint old Fleshers'' Hall, built by Lieven de Key in 1603, the town hall; the old Stadsdoelen, Great Church. This square is used every weekend for a market, during December for Christmas market and during summer for festivals.'),
(4, 2, 'history', 'Frans Hals Museum - Hal (formally: De Hallen Haarlem) is one of the two locations of the Frans Hals Museum, located on the Grote Markt, where modern and contemporary art is on display in alternating presentations. The emphasis is on contemporary photograph and video presentations, with the focus on Man and society. '),
(5, 2, 'history', 'Founded in 1707 by the city council to house elderly men. The main buildings are from the 14th century\r\nUnlike hofjes that were meant for poor elderly women, the homes around this courtyard are much larger, because the inhabitants were men who actually paid the rent as opposed to hofje inhabitants who had no income to spend on rent.'),
(6, 2, 'history', 'Since 1992 Jopenkerk aims to promote the traditional beers of Haarlem. Two ''recipes'' were found useful for brewing again. A recipe from 1407 yielded Koyt , a gruit beer . The recipe for the beer that came on the market as Hoppenbier dates back to 1501. In 1994, both beers could be presented on the occasion of the city''s 750th anniversary.'),
(7, 2, 'history', 'Oldest church in Haarlem, built in 1348. The Walloon church was a real refugee church: in the 16th century, Flemish Protestants had fled from the ruling Catholic Spaniards. The Spanish government gave them a choice: convert to the Catholic faith or leave. More than a hundred thousand Protestants chose the latter option. '),
(8, 2, 'history', 'The windmill was built on the foundations of the Goevrouwetoren by Adriaan de Booys, an industrial producer from Amsterdam. The windmill that burnt down in 1932 and was rebuilt in 2002. The original windmill dates from 1779 and the mill has been a distinctive part of the skyline of Haarlem for centuries.'),
(9, 2, 'history', 'Created in 1355 and is the only remaining city gate from the defenses of Haarlem. Until the 17th century it was the city gate used for traffic by land eastwards towards Spaarnwoude over the Laeghe weg (now Oude weg). In 1631 the Haarlemmertrekvaart was dug, which shortened the waterway from Haarlem to\r\nAmsterdam considerably.'),
(10, 2, 'history', 'Founded in 1395 it is the oldest hofje in the Netherlands. The earliest mention of it in town records is from the History of Haarlem by Samuel Ampzing  Initially, the hofje consisted of 13 houses for 20 women, then one of the buildings was converted into a regent''s room , after which there was still room for 12 women.');

-- --------------------------------------------------------

--
-- Table structure for table `Artist`
--

CREATE TABLE `Artist` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `about` text NOT NULL,
  `price` float NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Artist`
--

INSERT INTO `Artist` (`artist_id`, `name`, `about`, `price`, `event_id`) VALUES
(1, 'Gumbo Kings', 'The Gumbo Kings are a five-piece band who combine the groove of New Orleans with rugged delta blues and the melody of soul from old Memphis. The band is their love baby, and their aim is to convey their passion for music through an energetic live show.', 15, 1),
(2, 'Evolve', 'EVOLVE is the downtempo chillout project of artist/producer Red Broad. The first album, HAPPY HOUR IN THE GENE POOL has enjoyed great success within the downtempo chillout and lounge genres with iconic tracks', 15, 1),
(3, 'Ntjam Rosie', 'Ntjam Rosie, born as Rosie Boei, is a Dutch-Cameroonian singer/songwriter from Rotterdam, The Netherlands. Her style is a mix of pop music, jazz and soul.', 15, 1),
(4, 'Wicked Jazz Sounds', 'Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music.Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music. Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music.', 10, 1),
(5, 'Tom Thomsom Assemble', 'Doesn''t exist?', 10, 1),
(6, 'Jonna Frazer', 'Jonna Fraser is a rapper and singer, but above all a particularly driven performer. The Rotterdam-born storyteller has been living in Zaandam for more than half his life. At age 11, he was introduced to rap and then never let go of the microphone.', 10, 1),
(7, 'Fox & The Mayors', 'Doesn''t exist?', 15, 1),
(8, 'Uncle Sue', 'Uncle Sue is a seven-piece Haarlem Funk and Soul Band with its own story, soul diva and swinging horn section. Quirky repertoire, from their own studio and slightly less obvious gems by our musical heroes. A sound that harks back to the 60s and 70s. That''s where Uncle Sue feels at home', 15, 1),
(9, 'Chris Allen', 'Doesn''t exist?', 15, 1),
(10, 'Myles Sanko', 'He began his musical career singing and rapping alongside disc jockeys in nightclubs. Since then he toured across Europe and worked with the likes of Gregory Porter, Martha High, Mousse T, Speedometer, Billy Wooten, China Mosses, Ben l''Oncle Soul, Sarah McKenzie, Miss Kelly Marie, Mo'' Horizons, Ed Meme, Chris Read, Robin Mullarkey, Ben Lamdin (Nostalgia 77) and many more.', 10, 1),
(11, 'Ruis Soundsystem', 'Doesn''t exist?', 10, 1),
(12, 'The Family XL', 'Doesn''t exist?', 10, 1),
(13, 'Gare du Nord', 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc and Inca. Doc played guitar and Inca played saxophone, while both performed vocal duties. After the pair split up in 2013, the band continued to work and tour with a different line-up', 15, 1),
(14, 'Rilan & The Bombadiers', 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy. Both nationally and abroad.', 15, 1),
(15, 'Soul Six', 'Doesn''t exist?', 15, 1),
(16, 'Han Bennink', 'Drummer & visual artist Han Bennink reached the age of 80 this year and has been in the business for more than 60 years. He travelled all over the world and is now celebrating his anniversary close to home, on the border of Drenthe and Friesland, with the festival HANBENNINK80 in Fryslân. Multi-talented Han gives concerts on four different stages/galleries during his exhibitions.', 10, 1),
(17, 'The Nordanians', 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks, roaring u-turns and cinematic tearjerkers. Then they started writing songs together based on traditional ragas, smashing funk and delicate chamber music.', 10, 1),
(18, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel.', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Event Jazz`
--

CREATE TABLE `Event_Jazz` (
  `event_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `hall` varchar(128) NOT NULL,
  `seats` int(11) NOT NULL,
  `seats_left` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Event Jazz`
--

INSERT INTO `Event_Jazz` (`event_id`, `artist_id`, `hall`, `seats`, `seats_left`, `datetime`) VALUES
(1, 1, "First Hall", 300, 300, "2020-01-01 19:00:00");
-- --------------------------------------------------------

--
-- Table structure for table `Foto`
--

CREATE TABLE `Foto` (
  `foto_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `filepath` varchar(260) NOT NULL,
  `isBanner` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Guide`
--

CREATE TABLE `Guide` (
  `guide_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Language`
--

CREATE TABLE `Language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `available_spaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `location_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `streetname` varchar(128) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `city` varchar(64) NOT NULL,
  `housenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `Location`
--

INSERT INTO `Location` (`location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber`) VALUES
(1, 1, 'Restaurant', 'Oude Groenmarkt', '2011HL', 'Haarlem', '10-12'),
(2, 2, 'Restaurant', 'Twijnderslaan', '2021BG', 'Haarlem', '7'),
(3, 3, 'Restaurant', 'Spekstraat', '2011HM', 'Haarlem', '4'),
(4, 4, 'Restaurant', 'Spaarne', '2011CL', 'Haarlem', '96'),
(5, 5, 'Restaurant', 'Lange Veerstraat', '2011DB', 'Haarlem', '4'),
(6, 6, 'Restaurant', 'Klokhuisplein', '2011HK', 'Haarlem', '9'),
(7, 7, 'Restaurant', 'Grote Markt', '2011RC', 'Haarlem', '13'),
(8, 8, 'Restaurant', 'test00', 'test', 'test', '2'),
(9, 9, 'Restaurant', 'test00', 'test', 'test', '2'),
(10, 24, 'Restaurant', 'straat', '1234AB', 'alkmaar', '34');


--
-- Table structure for table `Main_Page`
--

CREATE TABLE `Main_Page` (
  `mainpage_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pass`
--

CREATE TABLE `Pass` (
  `pass_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `days` varchar(64) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Point_of_interest`
--

CREATE TABLE `Point_of_interest` (
  `poi_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Point_of_interest`
--

INSERT INTO `Point_of_interest` (`poi_id`, `name`) VALUES
(1, 'history home page'),
(2, 'history home');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `reservation_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request` text NOT NULL,
  `count_people` int(11) NOT NULL,
  `reservation_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `price_kids` float NOT NULL,
  `star_rating` int(11) NOT NULL,
  `cuisine` varchar(128) NOT NULL,
  `website` varchar(320) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
--
-- Gegevens worden geëxporteerd voor tabel `Restaurant`
--

INSERT INTO `Restaurant` (`restaurant_id`, `name`, `description`, `price`, `price_kids`, `star_rating`, `cuisine`, `website`, `phonenumber`, `total_seats`) VALUES
(1, 'Urban Frenchy Bistro Toujours', 'For a cozy and beautiful dinner, Toujours is the place to be. It’s located is the center of Haarlem, right across from the Grote kerk. It’s a french restaurant with two open kitchens and a cozy styled interior. ', 35, 17.5, 4, 'French', 'https://restauranttoujours.nl/', '023 5321699', 48),
(2, 'Fris', 'Fris a modern french restaurant in the city center of Haarlem, by Rick May.  the restaurant has a relaxed atmosphere with high quality dishes, made with fresh seasonal products. Fris received in 2022 a Michelin star. ', 45, 22.5, 4, 'French', 'https://www.restaurantfris.nl/', '023 5310717', 45),
(3, 'Specktakel', 'Specktakel is a unique world restaurant centrally located in the heart of Haarlem. With a special covered courtyard and a terrace with a view of the historic Vleeshal and the centuries-old Bavo church.', 35, 17.5, 3, 'World', 'https://specktakel.nl/', '023-5323841', 36),
(4, 'Ratatouille', 'This restaurant is a star in Haarlem. It is one of the few restaurants in this city with a Michelin star. It provides a sophisticated theme with a traditional French decor. Here you can also taste some top of the line seafood with a rich and complex flavor.', 45, 22.5, 4, 'French, European', 'https://ratatouillefoodandwine.nl/', '023 542 7270', 52),
(5, 'Mr. & Mrs.', 'Restaurant Mr. and Mrs. serves small luxury dishes, with the size of a starter, so you can try a lot of different combinations. You can choose between hot and cold dishes and they always have a matching glass of wine with your dish.', 45, 22.5, 4, 'European', 'https://www.restaurantmrandmrs.nl/', '023 531 5935', 40),
(6, 'ML', 'Restaurant ML is located in historical Hotel ML. It is a french restaurant with surprising flavor combinations in their dishes, but with the right combination between traditional and new products and flavors.', 45, 22.5, 4, 'International', 'https://www.mlinhaarlem.nl/', '023 5123910', 60),
(7, 'Grand Cafe Brinkmann', 'Grand Cafe Brinkmann has been known since 1879 in Haarlem and surroundings.  Located on the Grote Markt in the center of Haarlem. The various menu has for everyone something to offer, prepared with fresh ingredients. ', 35, 17.5, 4, 'Dutch', 'https://www.grandcafebrinkmann.nl/', '023 532 3111', 100),
(10, 'test3', 'leeeukkkkkkk', 33, 23, 3, 'fransig', 'iets.com', '0612345672', 12),
(12, 'test5', 'leeeukkkkkkk', 33, 23, 3, 'fransig', 'iets.com', '0612345672', 12),
(13, 'test6', 'leeeukkkkkkk', 33, 23, 3, 'fransig', 'iets.com', '0612345672', 12),
(14, 'test7', 'leeeukkkkkkk', 33, 23, 2, 'fransig', 'iets.commm', '0612345672', 12),
(15, 'test8', 'leeeukkkkkkk', 33, 23, 2, 'fransig', 'iets.commm', '0612345672', 12),
(16, 'test9', 'leeeukkkkkkk', 33, 23, 2, 'fransig', 'iets.commm', '0612345672', 12),
(17, 'test11', 'test', 2, 2, 3, 'fransig', 'iets.commm', '0612345672', 44),
(18, 'test22', 'test', 2, 2, 3, 'test', 'test', '1234', 2),
(19, 'test33', 'test', 2, 2, 3, 'test', 'test', '1234', 2),
(20, 'test44', 'test', 2, 2, 3, 'test', 'test', '1234', 2),
(21, 'test', 'test', 2, 2, 3, 'test', 'test', '1234', 2),
(22, 'test', 'test', 2, 2, 3, 'test', 'test', '1234', 2),
(23, 'test', 'test', 2, 2, 3, 'fransig', 'iets.commm', '0612345672', 44),
(24, 'nog een restaurantje', 'leeeukkkkkkk', 33, 2, 2, 'zeevisjes', 'visvis.nl', '0612345672', 454);

--
-- Table structure for table `Session`
--

CREATE TABLE `Session` (
  `session_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `duration` time NOT NULL,
  `seats_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Session`
--

INSERT INTO `Session` (`session_id`, `restaurant_id`, `start_datetime`, `duration`, `seats_left`) VALUES
(1, 1, '2023-07-27 17:30:00', '01:30:00', 48),
(2, 1, '2023-07-27 19:00:00', '01:30:00', 48),
(3, 1, '2023-07-27 20:30:00', '01:30:00', 48),
(4, 1, '2023-07-28 17:30:00', '01:30:00', 48),
(5, 1, '2023-07-28 19:00:00', '01:30:00', 48),
(6, 1, '2023-07-28 20:30:00', '01:30:00', 48),
(7, 1, '2023-07-29 17:30:00', '01:30:00', 48),
(8, 1, '2023-07-29 19:00:00', '01:30:00', 48),
(9, 1, '2023-07-29 20:30:00', '01:30:00', 48),
(10, 2, '2023-07-27 17:30:00', '01:30:00', 45),
(11, 2, '2023-07-27 19:00:00', '01:30:00', 45),
(12, 2, '2023-07-27 20:30:00', '01:30:00', 45),
(13, 2, '2023-07-28 17:30:00', '01:30:00', 45),
(14, 2, '2023-07-28 19:00:00', '01:30:00', 45),
(15, 2, '2023-07-28 20:30:00', '01:30:00', 45),
(16, 2, '2023-07-29 17:30:00', '01:30:00', 45),
(17, 2, '2023-07-29 19:00:00', '01:30:00', 45),
(18, 2, '2023-07-29 20:30:00', '01:30:00', 45),
(19, 3, '2023-07-27 17:00:00', '01:30:00', 36),
(20, 3, '2023-07-27 18:30:00', '01:30:00', 36),
(21, 3, '2023-07-27 20:00:00', '01:30:00', 36),
(22, 3, '2023-07-28 17:00:00', '01:30:00', 36),
(23, 3, '2023-07-28 18:30:00', '01:30:00', 36),
(24, 3, '2023-07-28 20:00:00', '01:30:00', 36),
(25, 3, '2023-07-29 17:00:00', '01:30:00', 36),
(26, 3, '2023-07-29 18:30:00', '01:30:00', 36),
(27, 3, '2023-07-29 20:00:00', '01:30:00', 36),
(31, 4, '2023-07-27 17:00:00', '02:00:00', 52),
(32, 4, '2023-07-27 19:00:00', '02:00:00', 52),
(33, 4, '2023-07-27 21:00:00', '02:00:00', 52),
(34, 4, '2023-07-28 17:00:00', '02:00:00', 52),
(35, 4, '2023-07-28 19:00:00', '02:00:00', 52),
(36, 4, '2023-07-28 21:00:00', '02:00:00', 52),
(37, 4, '2023-07-29 17:00:00', '02:00:00', 52),
(38, 4, '2023-07-29 19:00:00', '02:00:00', 52),
(39, 4, '2023-07-29 21:00:00', '02:00:00', 52),
(40, 5, '2023-07-27 18:00:00', '01:30:00', 40),
(41, 5, '2023-07-27 19:30:00', '01:30:00', 40),
(42, 5, '2023-07-27 21:00:00', '01:30:00', 40),
(43, 5, '2023-07-28 18:00:00', '01:30:00', 40),
(44, 5, '2023-07-28 19:30:00', '01:30:00', 40),
(45, 5, '2023-07-28 21:00:00', '01:30:00', 40),
(46, 5, '2023-07-29 18:00:00', '01:30:00', 40),
(47, 5, '2023-07-29 19:30:00', '01:30:00', 40),
(48, 5, '2023-07-29 21:00:00', '01:30:00', 40),
(49, 6, '2023-07-27 17:00:00', '02:00:00', 60),
(50, 6, '2023-07-27 19:00:00', '02:00:00', 60),
(51, 6, '2023-07-28 17:00:00', '02:00:00', 60),
(52, 6, '2023-07-28 19:00:00', '02:00:00', 60),
(53, 6, '2023-07-29 17:00:00', '02:00:00', 60),
(54, 6, '2023-07-29 19:00:00', '02:00:00', 60),
(55, 7, '2023-07-27 16:30:00', '01:30:00', 100),
(56, 7, '2023-07-27 18:00:00', '01:30:00', 100),
(57, 7, '2023-07-27 19:30:00', '01:30:00', 100),
(58, 7, '2023-07-28 16:30:00', '01:30:00', 100),
(59, 7, '2023-07-28 18:00:00', '01:30:00', 100),
(60, 7, '2023-07-28 19:30:00', '01:30:00', 100),
(61, 7, '2023-07-29 16:30:00', '01:30:00', 100),
(62, 7, '2023-07-29 18:00:00', '01:30:00', 100),
(63, 7, '2023-07-29 19:30:00', '01:30:00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `ticket_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ischecked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Tour`
--

CREATE TABLE `Tour` (
  `tour_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `start_location` varchar(150) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `fullname`, `email`, `password`, `role`, `registration_date`) VALUES
(1, 'Mutti', 'mutti123@gmail.com', '$2y$10$U2C8GzuGPEkNs5BF0TvQMu1rtGuBlMoMWBqzZoXzfXBJNVH.0Hjry', 'customer', '2023-03-01'),
(2, 'Frank', 'frankie12345@hotmail.com', '$2y$10$U2C8GzuGPEkNs5BF0TvQMu1rtGuBlMoMWBqzZoXzfXBJNVH.0Hjry', 'admin', '2022-04-03'),
(6, 'Usman', 'muttalip9801@gmail.com', '$2y$10$3a5G7f6I7Z6/XWJXLG.mrerYugDEi0DTTcK62SbBmZ/brLgRr2Pn6', 'customer', '2023-03-14'),
(7, 'Thijs Moerland', 'Moerland8@gmail.com', '$2y$10$/hl0X1lVbEwtbuT5LwAtIuB.KjZHKK7k8gjD5ONsZY7oqp4JGbzii', 'customer', '2023-03-15'),
(8, 'henk', 'henk@gmail.com', '$2y$10$SOk.60rek5ngz8K4ML.6T.aDppi62BvIUf6sduxAzow6kZ0dQrdiy', 'customer', '2023-03-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`artist_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `Event_Jazz`
--
ALTER TABLE `Event_Jazz`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Foto`
--
ALTER TABLE `Foto`
  ADD PRIMARY KEY (`foto_id`);

--
-- Indexes for table `Guide`
--
ALTER TABLE `Guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `Language`
--
ALTER TABLE `Language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `Main_Page`
--
ALTER TABLE `Main_Page`
  ADD PRIMARY KEY (`mainpage_id`);

--
-- Indexes for table `Pass`
--
ALTER TABLE `Pass`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `Point_of_interest`
--
ALTER TABLE `Point_of_interest`
  ADD PRIMARY KEY (`poi_id`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `FK_ticket_order_orderId` (`order_id`);

--
-- Indexes for table `Tour`
--
ALTER TABLE `Tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `About`
--
ALTER TABLE `About`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Artist`
--
ALTER TABLE `Artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Event_Jazz`
--
ALTER TABLE `Event_Jazz`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Guide`
--
ALTER TABLE `Guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Language`
--
ALTER TABLE `Language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Main_Page`
--
ALTER TABLE `Main_Page`
  MODIFY `mainpage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pass`
--
ALTER TABLE `Pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Point_of_interest`
--
ALTER TABLE `Point_of_interest`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tour`
--
ALTER TABLE `Tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Artist`
--
ALTER TABLE `Artist`
  ADD CONSTRAINT `Artist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `Event_Jazz` (`event_id`);

--
-- Constraints for table `Guide`
--
ALTER TABLE `Guide`
  ADD CONSTRAINT `Guide_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `Tour` (`tour_id`);

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `Session` (`session_id`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Session`
--
ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurant` (`restaurant_id`);

--
-- Constraints for table `Tour`
--
ALTER TABLE `Tour`
  ADD CONSTRAINT `Tour_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `Language` (`language_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
