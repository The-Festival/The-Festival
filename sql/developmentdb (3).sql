-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 06 apr 2023 om 12:20
-- Serverversie: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP-versie: 8.0.25

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
-- Tabelstructuur voor tabel `About`
--

CREATE TABLE `About` (
  `about_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `About`
--

INSERT INTO `About` (`about_id`, `detail_id`, `type`, `about`) VALUES
(1, 1, 'Jopen Kerk', 'Since 1992 Jopenkerk aims to promote the traditional beers of Haarlem. Two \'recipes\' were found useful for brewing again. A recipe from 1407 yielded Koyt , a gruit beer . The recipe for the beer that came on the market as Hoppenbier dates back to 1501. In 1994, both beers could be presented on the occasion of the city\'s 750th anniversary.'),
(2, 2, 'Amsterdamse Poort', 'Created in 1355 and is the only remaining city gate from the defenses of Haarlem. Until the 17th century it was the city gate used for traffic by land eastwards towards Spaarnwoude over the Laeghe weg (now Oude weg). In 1631 the Haarlemmertrekvaart was dug, which shortened the waterway from Haarlem to\r\nAmsterdam considerably.'),
(3, 3, 'Frans Hals Museum', 'Frans Hals Museum - Hal (formally: De Hallen Haarlem) is one of the two locations of the Frans Hals Museum, located on the Grote Markt, where modern and contemporary art is on display in alternating presentations. The emphasis is on contemporary photograph and video presentations, with the focus on Man and society. '),
(4, 4, 'Proveniershof', 'Founded in 1707 by the city council to house elderly men. The main buildings are from the 14th century\nUnlike hofjes that were meant for poor elderly women, the homes around this courtyard are much larger, because the inhabitants were men who actually paid the rent as opposed to hofje inhabitants who had no income to spend on rent.'),
(5, 5, 'St. Bavo Kerk', 'Reformed Protestant church and former Catholic cathedral located on the central market square (Grote Markt).\nFirst mention of a church on this spot was made in 1307, but the wooden structure burned in the 14th century. The church was rebuilt and promoted to chapter church in 1479 and only became a cathedral in 1559.'),
(6, 6, 'Waalse Kerk', 'Oldest church in Haarlem, built in 1348. The Walloon church was a real refugee church: in the 16th century, Flemish Protestants had fled from the ruling Catholic Spaniards. The Spanish government gave them a choice: convert to the Catholic faith or leave. More than a hundred thousand Protestants chose the latter option. '),
(7, 7, 'Molen De Adriaan', 'The windmill was built on the foundations of the Goevrouwetoren by Adriaan de Booys, an industrial producer from Amsterdam. The windmill that burnt down in 1932 and was rebuilt in 2002. The original windmill dates from 1779 and the mill has been a distinctive part of the skyline of Haarlem for centuries.'),
(8, 8, 'Grote Markt', 'Centre of the city where there are a larger number of interesting buildings, including the quaint old Fleshers\' Hall, built by Lieven de Key in 1603, the town hall; the old Stadsdoelen, Great Church. This square is used every weekend for a market, during December for Christmas market and during summer for festivals.'),
(9, 9, 'Hof van Bakenes', 'Founded in 1395 it is the oldest hofje in the Netherlands. The earliest mention of it in town records is from the History of Haarlem by Samuel Ampzing  Initially, the hofje consisted of 13 houses for 20 women, then one of the buildings was converted into a regent\'s room , after which there was still room for 12 women.'),
(11, 1, 'Jopen Kerk', 'Jopen&#039;s beer is a result of the work of Stichting Haarlems Biergenootschap, which was founded in 1992. The mission of the Biergenootschap is to re-create traditional Haarlem beers and bring them to the commercial market. Two recipes were found in the Haarlem city archives that were used as a foundation for two initial beers. The first one was a recipe from 1408; the recreation of this was named Koyt, a gruit beer. '),
(12, 1, 'Jopen Kerk', 'The name Jopen refers to the 112 litre beer barrels that were used in early times to transport the Haarlem beer. Until the end of 1996 Jopen beer was brewed in the Halve Maan brewery in Hulst, after that it was made in the La Trappe brewery in Berkel-Enschot. Since 2001, the Jopen beer brands were brewed in Ertvelde, Belgium, in brewery Van Steenberge. '),
(13, 1, 'Jopen Kerk', 'At the end of 2005, it was announced that the old Jacobskerk, in the Raaks area in the city centre of Haarlem, would be transformed into a brewery. On November 11, 2010, the \'Jopenkerk\' (Jopen church) opened its doors for the public. Besides the brewery it also hosts a café and restaurant. Jopen won two silver medals at the 2008 World Beer Championship.'),
(14, 10, 'test event', 'this is slider text'),
(15, 11, 'Thijs Moerland', ' vnbmn,m,vhcgch'),
(16, 12, 'Thijs Moerland', 'hgv'),
(18, 2, 'Amsterdamse Poort', 'Last remaining of 12 original city gates that formed Haarlem’s defences, this well preserved city gate dates back to 1355 and until the 17th century it was the city gate used for traffic by land eastwards towards Spaarnwoudeover the Laeghe weg (now Oude Weg).\r\nThis gate was originally called the Spaarnwouderpoort, with the new canal dug in 1631 and its towpath, the trip to Amsterdam was shorted, making possible travelling back and forth to Amsterdam on the same day. Thus the name of the gate changed to Amsterdamse Poort.'),
(19, 2, 'Amsterdamse Poort', 'In 1865 the Haarlem government wanted to demolish the gate. A petition to pull down the gate was requested, as the gate was in a bad state of repair and was heeding the construction of a new bridge on the location just in front of the gate. However, the Haarlem government was denied their plans due to lack of funds.\r\n\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Artist`
--

CREATE TABLE `Artist` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `link` varchar(128) NOT NULL,
  `event_id` int(11) NOT NULL,
  `genre` varchar(256) NOT NULL,
  `track` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event_Jazz`
--

CREATE TABLE `Event_Jazz` (
  `event_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `hall` varchar(128) NOT NULL,
  `seats` int(11) NOT NULL,
  `seats_left` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Foto`
--

CREATE TABLE `Foto` (
  `foto_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `filepath` varchar(260) NOT NULL,
  `isBanner` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Foto`
--

INSERT INTO `Foto` (`foto_id`, `detail_id`, `type`, `filepath`, `isBanner`) VALUES
(1, 1, 'history home', '/img/image79.png', 0),
(2, 2, 'Amsterdamse Poort', '/img/image49.png', 0),
(3, 3, 'history home', '/img/image74.png', 0),
(4, 4, 'history home', '/img/image75.png', 0),
(5, 5, 'history home', '/img/image44.png', 0),
(6, 6, 'history home', '/img/image81.png', 0),
(7, 7, 'history home', '/img/image10.png', 0),
(8, 8, 'history home', '/img/image73.png', 0),
(9, 9, 'history home', '/img/image86.png', 0),
(10, 1, 'Jopen Kerk', '/img/image88.png', 1),
(11, 1, 'Jopen Kerk', '/img/image78.png', 0),
(12, 1, 'Jopen Kerk', '/img/image99.png', 0),
(13, 1, 'Jopen Kerk', '/img/image79.png', 0),
(14, 10, 'test event', '/img/6425e64037baa9.55377270.png', 0),
(15, 11, 'Thijs Moerland', '/img/6426bdd6cd2f58.62065506.png', 0),
(16, 11, 'Thijs Moerland', '/img/6426cfad6b29f8.97681321.png', 0),
(17, 12, 'Thijs Moerland', '/img/6426d0be9ecf22.57803827.png', 0),
(19, 2, 'Amsterdamse Poort', '/img/image46.png', 1),
(20, 2, 'Amsterdamse Poort', '/img/642c27e93c4613.57325875.png', 0),
(21, 2, 'Amsterdamse Poort', '/img/642c2a42cf0818.88290339.png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Guide`
--

CREATE TABLE `Guide` (
  `guide_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Guide`
--

INSERT INTO `Guide` (`guide_id`, `tour_id`, `name`) VALUES
(1, 1, 'Luke');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Language`
--

CREATE TABLE `Language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `spaces_left` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Language`
--

INSERT INTO `Language` (`language_id`, `name`, `spaces_left`, `tour_id`) VALUES
(1, 'English', 12, 1),
(2, 'Dutch', 12, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Location`
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

--
-- Gegevens worden geëxporteerd voor tabel `Location`
--

INSERT INTO `Location` (`location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber`) VALUES
(1, 1, 'Jopen Kerk', 'Gedempte Voldersgracht', '2011WD', 'Haarlem', '2'),
(2, 10, 'test event', 'this street', '2131GB', 'Haarlem', '22'),
(3, 2, 'Amsterdamse Poort', 'Spaarwouderpoort', '2011BZ', 'Haarlem', '1'),
(4, 11, 'Thijs Moerland', 'Söderblomstraat', '2131GB', 'Haarlem', '53'),
(5, 12, 'Thijs Moerland', 'Söderblomstraat', '2131GB', 'Haarlem', '53');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Main_Page`
--

CREATE TABLE `Main_Page` (
  `mainpage_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Order`
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
-- Gegevens worden geëxporteerd voor tabel `Order`
--

INSERT INTO `Order` (`order_id`, `client_name`, `address`, `phonenumber`, `emailaddress`, `order_time`, `payment_method`, `total_vat`, `total_price`) VALUES
(1, 'Bob', 'Bijdroplaan 15', '+31612345678', 'bob1234@gmail.com', '2023-10-10 12:00:00', 'paypal', 441, 2100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Pass`
--

CREATE TABLE `Pass` (
  `pass_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `days` varchar(64) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Point_of_interest`
--

CREATE TABLE `Point_of_interest` (
  `poi_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Point_of_interest`
--

INSERT INTO `Point_of_interest` (`poi_id`, `name`) VALUES
(1, 'Jopen Kerk'),
(2, 'Amsterdamse Poort'),
(3, 'Frans Hals Museum'),
(4, 'Proveniershof'),
(5, 'St. Bavo Kerk'),
(6, 'Waalse Kerk'),
(7, 'Molen De Adriaan'),
(8, 'Grote Markt'),
(9, 'Hof van Bakenes'),
(10, 'test event'),
(11, 'Thijs Moerland'),
(12, 'Thijs Moerland');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reservation`
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
-- Tabelstructuur voor tabel `Restraurant`
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
-- Tabelstructuur voor tabel `Session`
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
-- Tabelstructuur voor tabel `Ticket`
--

CREATE TABLE `Ticket` (
  `ticket_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `vat_percentage` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ischecked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Ticket`
--

INSERT INTO `Ticket` (`ticket_id`, `order_id`, `event_type`, `event_id`, `vat_percentage`, `quantity`, `ischecked`) VALUES
(51, 8, 'yummy', 1, 21, 10, 0),
(52, 8, 'history', 1, 21, 12, 0),
(53, 8, 'jazz', 2, 21, 10, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Tour`
--

CREATE TABLE `Tour` (
  `tour_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `start_location` varchar(150) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Tour`
--

INSERT INTO `Tour` (`tour_id`, `datetime`, `start_location`, `price`) VALUES
(1, '2023-03-21 14:30:00', 'St. Bavo Church', 17.5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `User`
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
-- Gegevens worden geëxporteerd voor tabel `User`
--

INSERT INTO `User` (`user_id`, `fullname`, `email`, `password`, `role`, `registration_date`) VALUES
(1, 'Mutti', 'mutti123@gmail.com', '$2y$10$U2C8GzuGPEkNs5BF0TvQMu1rtGuBlMoMWBqzZoXzfXBJNVH.0Hjry', 'customer', '2023-03-01'),
(2, 'Frank', 'frankie12345@hotmail.com', '$2y$10$U2C8GzuGPEkNs5BF0TvQMu1rtGuBlMoMWBqzZoXzfXBJNVH.0Hjry', 'admin', '2022-04-03'),
(6, 'Usman', 'muttalip9801@gmail.com', '$2y$10$3a5G7f6I7Z6/XWJXLG.mrerYugDEi0DTTcK62SbBmZ/brLgRr2Pn6', 'customer', '2023-03-14'),
(7, 'Thijs Moerland', 'Moerland8@gmail.com', '$2y$10$/hl0X1lVbEwtbuT5LwAtIuB.KjZHKK7k8gjD5ONsZY7oqp4JGbzii', 'customer', '2023-03-15'),
(8, 'henk', 'henk@gmail.com', '$2y$10$SOk.60rek5ngz8K4ML.6T.aDppi62BvIUf6sduxAzow6kZ0dQrdiy', 'customer', '2023-03-20'),
(9, 'luke', 'Luke@gmail.com', '$2y$10$B6juEdgRXRc49wAN6MdR3O9stnv2nUwVDYi4BZ/T27QxelERBrrji', 'customer', '2023-03-31');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexen voor tabel `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`artist_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexen voor tabel `Event_Jazz`
--
ALTER TABLE `Event_Jazz`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexen voor tabel `Foto`
--
ALTER TABLE `Foto`
  ADD PRIMARY KEY (`foto_id`);

--
-- Indexen voor tabel `Guide`
--
ALTER TABLE `Guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexen voor tabel `Language`
--
ALTER TABLE `Language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `FK_language_tour_id` (`tour_id`);

--
-- Indexen voor tabel `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexen voor tabel `Main_Page`
--
ALTER TABLE `Main_Page`
  ADD PRIMARY KEY (`mainpage_id`);

--
-- Indexen voor tabel `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexen voor tabel `Pass`
--
ALTER TABLE `Pass`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexen voor tabel `Point_of_interest`
--
ALTER TABLE `Point_of_interest`
  ADD PRIMARY KEY (`poi_id`);

--
-- Indexen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `Restraurant`
--
ALTER TABLE `Restraurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexen voor tabel `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexen voor tabel `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `FK_ticket_order_orderId` (`order_id`);

--
-- Indexen voor tabel `Tour`
--
ALTER TABLE `Tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexen voor tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `About`
--
ALTER TABLE `About`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `Artist`
--
ALTER TABLE `Artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Event_Jazz`
--
ALTER TABLE `Event_Jazz`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Foto`
--
ALTER TABLE `Foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `Guide`
--
ALTER TABLE `Guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Language`
--
ALTER TABLE `Language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Location`
--
ALTER TABLE `Location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `Main_Page`
--
ALTER TABLE `Main_Page`
  MODIFY `mainpage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Order`
--
ALTER TABLE `Order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Pass`
--
ALTER TABLE `Pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Point_of_interest`
--
ALTER TABLE `Point_of_interest`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Restraurant`
--
ALTER TABLE `Restraurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Session`
--
ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT voor een tabel `Tour`
--
ALTER TABLE `Tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Artist`
--
ALTER TABLE `Artist`
  ADD CONSTRAINT `Artist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `Event_Jazz` (`event_id`);

--
-- Beperkingen voor tabel `Guide`
--
ALTER TABLE `Guide`
  ADD CONSTRAINT `Guide_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `Tour` (`tour_id`);

--
-- Beperkingen voor tabel `Language`
--
ALTER TABLE `Language`
  ADD CONSTRAINT `FK_language_tour_id` FOREIGN KEY (`tour_id`) REFERENCES `Tour` (`tour_id`);

--
-- Beperkingen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `Session` (`session_id`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Beperkingen voor tabel `Session`
--
ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restraurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
