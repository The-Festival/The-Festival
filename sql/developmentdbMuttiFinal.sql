-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 13, 2023 at 07:35 PM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.25

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
(3, 2, 'history', 'Centre of the city where there are a larger number of interesting buildings, including the quaint old Fleshers\' Hall, built by Lieven de Key in 1603, the town hall; the old Stadsdoelen, Great Church. This square is used every weekend for a market, during December for Christmas market and during summer for festivals.'),
(4, 2, 'history', 'Frans Hals Museum - Hal (formally: De Hallen Haarlem) is one of the two locations of the Frans Hals Museum, located on the Grote Markt, where modern and contemporary art is on display in alternating presentations. The emphasis is on contemporary photograph and video presentations, with the focus on Man and society. '),
(5, 2, 'history', 'Founded in 1707 by the city council to house elderly men. The main buildings are from the 14th century\r\nUnlike hofjes that were meant for poor elderly women, the homes around this courtyard are much larger, because the inhabitants were men who actually paid the rent as opposed to hofje inhabitants who had no income to spend on rent.'),
(6, 2, 'history', 'Since 1992 Jopenkerk aims to promote the traditional beers of Haarlem. Two \'recipes\' were found useful for brewing again. A recipe from 1407 yielded Koyt , a gruit beer . The recipe for the beer that came on the market as Hoppenbier dates back to 1501. In 1994, both beers could be presented on the occasion of the city\'s 750th anniversary.'),
(7, 2, 'history', 'Oldest church in Haarlem, built in 1348. The Walloon church was a real refugee church: in the 16th century, Flemish Protestants had fled from the ruling Catholic Spaniards. The Spanish government gave them a choice: convert to the Catholic faith or leave. More than a hundred thousand Protestants chose the latter option. '),
(8, 2, 'history', 'The windmill was built on the foundations of the Goevrouwetoren by Adriaan de Booys, an industrial producer from Amsterdam. The windmill that burnt down in 1932 and was rebuilt in 2002. The original windmill dates from 1779 and the mill has been a distinctive part of the skyline of Haarlem for centuries.'),
(9, 2, 'history', 'Created in 1355 and is the only remaining city gate from the defenses of Haarlem. Until the 17th century it was the city gate used for traffic by land eastwards towards Spaarnwoude over the Laeghe weg (now Oude weg). In 1631 the Haarlemmertrekvaart was dug, which shortened the waterway from Haarlem to\r\nAmsterdam considerably.'),
(10, 2, 'history', 'Founded in 1395 it is the oldest hofje in the Netherlands. The earliest mention of it in town records is from the History of Haarlem by Samuel Ampzing  Initially, the hofje consisted of 13 houses for 20 women, then one of the buildings was converted into a regent\'s room , after which there was still room for 12 women.');

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
(5, 'Tom Thomsom Assemble', 'Doesn\'t exist?', 10, 1),
(6, 'Jonna Frazer', 'Jonna Fraser is a rapper and singer, but above all a particularly driven performer. The Rotterdam-born storyteller has been living in Zaandam for more than half his life. At age 11, he was introduced to rap and then never let go of the microphone.', 10, 1),
(7, 'Fox & The Mayors', 'Doesn\'t exist?', 15, 1),
(8, 'Uncle Sue', 'Uncle Sue is a seven-piece Haarlem Funk and Soul Band with its own story, soul diva and swinging horn section. Quirky repertoire, from their own studio and slightly less obvious gems by our musical heroes. A sound that harks back to the 60s and 70s. That\'s where Uncle Sue feels at home', 15, 1),
(9, 'Chris Allen', 'Doesn\'t exist?', 15, 1),
(10, 'Myles Sanko', 'He began his musical career singing and rapping alongside disc jockeys in nightclubs. Since then he toured across Europe and worked with the likes of Gregory Porter, Martha High, Mousse T, Speedometer, Billy Wooten, China Mosses, Ben l\'Oncle Soul, Sarah McKenzie, Miss Kelly Marie, Mo\' Horizons, Ed Meme, Chris Read, Robin Mullarkey, Ben Lamdin (Nostalgia 77) and many more.', 10, 1),
(11, 'Ruis Soundsystem', 'Doesn\'t exist?', 10, 1),
(12, 'The Family XL', 'Doesn\'t exist?', 10, 1),
(13, 'Gare du Nord', 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc and Inca. Doc played guitar and Inca played saxophone, while both performed vocal duties. After the pair split up in 2013, the band continued to work and tour with a different line-up', 15, 1),
(14, 'Rilan & The Bombadiers', 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy. Both nationally and abroad.', 15, 1),
(15, 'Soul Six', 'Doesn\'t exist?', 15, 1),
(16, 'Han Bennink', 'Drummer & visual artist Han Bennink reached the age of 80 this year and has been in the business for more than 60 years. He travelled all over the world and is now celebrating his anniversary close to home, on the border of Drenthe and Friesland, with the festival HANBENNINK80 in Fryslân. Multi-talented Han gives concerts on four different stages/galleries during his exhibitions.', 10, 1),
(17, 'The Nordanians', 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks, roaring u-turns and cinematic tearjerkers. Then they started writing songs together based on traditional ragas, smashing funk and delicate chamber music.', 10, 1),
(18, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel.', 10, 1),
(19, 'Evolve\r\n', 'EVOLVE is the downtempo chillout project of artist/producer Red Broad. The first album, HAPPY HOUR IN THE GENE POOL has enjoyed great success within the downtempo chillout and lounge genres with iconic tracks\r\n', 15, 1),
(20, 'Gumbo Kings', 'The Gumbo Kings are a five-piece band who combine the groove of New Orleans with rugged delta blues and the melody of soul from old Memphis. The band is their love baby, and their aim is to convey their passion for music through an energetic live show.', 15, 1),
(21, 'Evolve', 'EVOLVE is the downtempo chillout project of artist/producer Red Broad. The first album, HAPPY HOUR IN THE GENE POOL has enjoyed great success within the downtempo chillout and lounge genres with iconic tracks', 15, 1),
(22, 'Ntjam Rosie', 'Ntjam Rosie, born as Rosie Boei, is a Dutch-Cameroonian singer/songwriter from Rotterdam, The Netherlands. Her style is a mix of pop music, jazz and soul.', 15, 1),
(23, 'Wicked Jazz Sounds', 'Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music.Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music. Wicked Jazz Sounds is a versatile music platform that connects the sensations of jazz with the energy of contemporary dance music.', 10, 1),
(24, 'Tom Thomsom Assemble', 'Doesn’t exist?', 10, 1),
(25, 'Jonna Frazer', 'Jonna Fraser is a rapper and singer, but above all a particularly driven performer. The Rotterdam-born storyteller has been living in Zaandam for more than half his life. At age 11, he was introduced to rap and then never let go of the microphone.', 10, 1),
(26, 'Fox & The Mayors', 'Doesn’t exist?', 15, 1),
(27, 'Uncle Sue', 'Uncle Sue is a seven-piece Haarlem Funk and Soul Band with its own story, soul diva and swinging horn section. Quirky repertoire, from their own studio and slightly less obvious gems by our musical heroes. A sound that harks back to the 60s and 70s. That\'s where Uncle Sue feels at home', 15, 1),
(28, 'Chris Allen', 'Doesn’t exist?', 15, 1),
(29, 'Myles Sanko', 'He began his musical career singing and rapping alongside disc jockeys in nightclubs. Since then he toured across Europe and worked with the likes of Gregory Porter, Martha High, Mousse T, Speedometer, Billy Wooten, China Mosses, Ben l\'Oncle Soul, Sarah McKenzie, Miss Kelly Marie, Mo’ Horizons, Ed Meme, Chris Read, Robin Mullarkey, Ben Lamdin (Nostalgia 77) and many more.', 10, 1),
(30, 'Ruis Soundsystem', 'Doesn’t exist?', 10, 1),
(31, 'The Family XL', 'Doesn’t exist?', 10, 1),
(32, 'Gare du Nord', 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc and Inca. Doc played guitar and Inca played saxophone, while both performed vocal duties. After the pair split up in 2013, the band continued to work and tour with a different line-up', 15, 1),
(33, 'Rilan & The Bombadiers', 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy. Both nationally and abroad.', 15, 1),
(34, 'Soul Six', 'Doesn’t exist?', 15, 1),
(35, 'Han Bennink', 'Drummer & visual artist Han Bennink reached the age of 80 this year and has been in the business for more than 60 years. He travelled all over the world and is now celebrating his anniversary close to home, on the border of Drenthe and Friesland, with the festival HANBENNINK80 in Fryslân. Multi-talented Han gives concerts on four different stages/galleries during his exhibitions.', 10, 1),
(36, 'The Nordanians', 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks, roaring u-turns and cinematic tearjerkers. Then they started writing songs together based on traditional ragas, smashing funk and delicate chamber music.', 10, 1),
(37, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel.', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Event_Jazz`
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
-- Dumping data for table `Event_Jazz`
--

INSERT INTO `Event_Jazz` (`event_id`, `artist_id`, `hall`, `seats`, `seats_left`, `datetime`) VALUES
(1, 1, 'First Hall', 300, 300, '2020-01-01 19:00:00');

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
  `available_spaces` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
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
-- Table structure for table `Main_Page`
--

CREATE TABLE `Main_Page` (
  `mainpage_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `order_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `emailaddress` varchar(320) NOT NULL,
  `order_time` datetime NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_vat` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Order';

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`order_id`, `client_name`, `address`, `phonenumber`, `emailaddress`, `order_time`, `payment_method`, `total_vat`, `total_price`) VALUES
(2, 'frank', 'Bijdroplaan 15', '0612345678', 'frankie12345@hotmail.com', '2023-04-13 17:56:00', 'paypal', 0, 0),
(3, 'henk', 'henk 123', '0612345678', 'henk@gmail.com', '2023-04-13 17:56:00', 'paypal', 0, 0),
(4, 'henk', 'henk 123', '0612345678', 'henk@gmail.com', '2023-04-13 17:56:00', 'paypal', 13.5, 150);

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
-- Table structure for table `Restraurant`
--

CREATE TABLE `Restraurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `restaurant_type` varchar(128) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `cuisine` varchar(128) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Session`
--

CREATE TABLE `Session` (
  `session_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `duration` time NOT NULL,
  `seats_left` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ischecked` tinyint(4) NOT NULL,
  `vat_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`ticket_id`, `order_id`, `event_type`, `event_id`, `quantity`, `ischecked`, `vat_percentage`) VALUES
(2, 4, 'jazz', 1, 10, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Tour`
--

CREATE TABLE `Tour` (
  `tour_id` int(11) NOT NULL,
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
(6, 'Usman', 'muttalip9801@gmail.comdasd', '$2y$10$3a5G7f6I7Z6/XWJXLG.mrerYugDEi0DTTcK62SbBmZ/brLgRr2Pn6', 'customer', '2023-03-14'),
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
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `tb_lang_ky_tour_id_FK` (`tour_id`);

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
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `Restraurant`
--
ALTER TABLE `Restraurant`
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
  ADD PRIMARY KEY (`tour_id`);

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
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `Restraurant`
--
ALTER TABLE `Restraurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `Language`
--
ALTER TABLE `Language`
  ADD CONSTRAINT `tb_lang_ky_tour_id_FK` FOREIGN KEY (`tour_id`) REFERENCES `Tour` (`tour_id`);

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
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restraurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
