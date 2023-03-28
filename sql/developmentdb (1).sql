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

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `posted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `posted_at`) VALUES
(1, 'Test title', 'test content', 'test author', '2022-11-30 13:09:55'),
(2, 'Another test title', 'Some more test content', 'test author', '2022-11-29 13:09:55');

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
(5, 'Tom Thomsom Assemble', 'Doesn’t exist?', 10, 1),
(6, 'Jonna Frazer', 'Jonna Fraser is a rapper and singer, but above all a particularly driven performer. The Rotterdam-born storyteller has been living in Zaandam for more than half his life. At age 11, he was introduced to rap and then never let go of the microphone.', 10, 1),
(7, 'Fox & The Mayors', 'Doesn’t exist?', 15, 1),
(8, 'Uncle Sue', 'Uncle Sue is a seven-piece Haarlem Funk and Soul Band with its own story, soul diva and swinging horn section. Quirky repertoire, from their own studio and slightly less obvious gems by our musical heroes. A sound that harks back to the 60s and 70s. That\'s where Uncle Sue feels at home', 15, 1),
(9, 'Chris Allen', 'Doesn’t exist?', 15, 1),
(10, 'Myles Sanko', 'He began his musical career singing and rapping alongside disc jockeys in nightclubs. Since then he toured across Europe and worked with the likes of Gregory Porter, Martha High, Mousse T, Speedometer, Billy Wooten, China Mosses, Ben l\'Oncle Soul, Sarah McKenzie, Miss Kelly Marie, Mo’ Horizons, Ed Meme, Chris Read, Robin Mullarkey, Ben Lamdin (Nostalgia 77) and many more.', 10, 1),
(11, 'Ruis Soundsystem', 'Doesn’t exist?', 10, 1),
(12, 'The Family XL', 'Doesn’t exist?', 10, 1),
(13, 'Gare du Nord', 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc and Inca. Doc played guitar and Inca played saxophone, while both performed vocal duties. After the pair split up in 2013, the band continued to work and tour with a different line-up', 15, 1),
(14, 'Rilan & The Bombadiers', 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy. Both nationally and abroad.', 15, 1),
(15, 'Soul Six', 'Doesn’t exist?', 15, 1),
(16, 'Han Bennink', 'Drummer & visual artist Han Bennink reached the age of 80 this year and has been in the business for more than 60 years. He travelled all over the world and is now celebrating his anniversary close to home, on the border of Drenthe and Friesland, with the festival HANBENNINK80 in Fryslân. Multi-talented Han gives concerts on four different stages/galleries during his exhibitions.', 10, 1),
(17, 'The Nordanians', 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks, roaring u-turns and cinematic tearjerkers. Then they started writing songs together based on traditional ragas, smashing funk and delicate chamber music.', 10, 1),
(18, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel.', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Event Jazz`
--

CREATE TABLE `Event Jazz` (
  `event_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `about` text NOT NULL,
  `general_info` text NOT NULL,
  `bannerfilepath` varchar(264) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Event Jazz`
--

INSERT INTO `Event Jazz` (`event_id`, `name`, `about`, `general_info`, `bannerfilepath`, `datetime`) VALUES
(1, 'Jazz', 'The Haarlem Jazz Festival is a four-day celebration of jazz music, taking place from July 27th to July 30th in the historic city of Haarlem. Set against the stunning backdrop of Haarlem\'s historic architecture and picturesque canals, the festival brings together some of the biggest names in jazz, as well as up-and-coming talent, for a series of concerts, workshops, and jam sessions. With a diverse lineup of international and local artists, the Haarlem Jazz Festival is a must-attend event for any jazz enthusiast. ', 'Location: \r\nPatronaat, Zijlsingel 2 2013 DN Haarlem\r\nEmail: info@patronaat.nl\r\nPhone: \r\n023-5175850 (office) - during office hours 10:00 - 17:00\r\n023-5175858 (cash desk/information number)', '/path/to/banner', '2023-07-26 18:00:00');

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
-- Table structure for table `Pass`
--

CREATE TABLE `Pass` (
  `pass_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(64) NOT NULL,
  `price` float NOT NULL,
  `startingTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Point of interest`
--

CREATE TABLE `Point of interest` (
  `poi_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `phonenumber` varchar(15) NOT NULL,
  `total_seats` int(11) NOT NULL
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
  `seats_left` int(11) NOT NULL
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
  `seats_left` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `fullname` int(128) NOT NULL,
  `email` varchar(320) NOT NULL,
  `paswword` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`artist_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `Event Jazz`
--
ALTER TABLE `Event Jazz`
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
-- Indexes for table `Pass`
--
ALTER TABLE `Pass`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `Point of interest`
--
ALTER TABLE `Point of interest`
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
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Artist`
--
ALTER TABLE `Artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Event Jazz`
--
ALTER TABLE `Event Jazz`
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
-- AUTO_INCREMENT for table `Pass`
--
ALTER TABLE `Pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Point of interest`
--
ALTER TABLE `Point of interest`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `Tour`
--
ALTER TABLE `Tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Artist`
--
ALTER TABLE `Artist`
  ADD CONSTRAINT `Artist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `Event Jazz` (`event_id`);

--
-- Constraints for table `Guide`
--
ALTER TABLE `Guide`
  ADD CONSTRAINT `Guide_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `Tour` (`tour_id`);

--
-- Constraints for table `Pass`
--
ALTER TABLE `Pass`
  ADD CONSTRAINT `Pass_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `Event Jazz` (`event_id`);

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

--
-- Constraints for table `Tour`
--
ALTER TABLE `Tour`
  ADD CONSTRAINT `Tour_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `Language` (`language_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
