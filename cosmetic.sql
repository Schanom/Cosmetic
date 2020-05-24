-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mai 2020 um 14:32
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cosmetic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_line_1` varchar(60) DEFAULT NULL,
  `address_line_2` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `fk_users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `qtty` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`cart_id`, `fk_user_id`, `qtty`, `fk_product`) VALUES
(202, 10, 8, 6),
(204, 10, 4, 8),
(205, 9, 3, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `type` enum('treatment','cosmetic') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`product_id`, `name`, `image`, `price`, `type`) VALUES
(6, 'Reinigungsmilch', 'joe-exotic.jpg', 10.99, 'treatment'),
(7, 'Gesichtswasser', 'joe-exotic.jpg', 10.00, 'treatment'),
(8, 'Östrogen Gesichtscreme', 'joe-exotic.jpg', 10.00, 'treatment'),
(9, 'All in One Gesichtscreme', 'joe-exotic.jpg', 10.00, 'treatment'),
(10, 'Vitamin C&E Gesichtscreme', 'joe-exotic.jpg', 10.00, 'treatment'),
(11, 'Hyalurongel Serum für Gesicht', 'joe-exotic.jpg', 10.00, 'treatment'),
(12, 'Peeling für Gesicht', 'joe-exotic.jpg', 10.00, 'treatment'),
(13, 'Aloe Vera Gesichtsmaske', 'joe-exotic.jpg', 10.00, 'treatment'),
(14, 'Sericin Gesichtsmaske', 'joe-exotic.jpg', 10.00, 'treatment'),
(15, 'Sedative Gesichtsmaske', 'joe-exotic.jpg', 10.00, 'treatment'),
(16, 'Squalene Gesichtsmaske', 'joe-exotic.jpg', 10.00, 'treatment'),
(17, 'Hand Creme', 'joe-exotic.jpg', 10.00, 'treatment'),
(18, 'Straffende Körperlotion Vitamin C', 'joe-exotic.jpg', 10.00, 'treatment'),
(19, 'Rückfettende Körpermilch Vitamin E', 'joe-exotic.jpg', 10.00, 'treatment'),
(20, 'Medizinische Gesichtsreinigung mit Hochfrequenz Anwendung ca 50 Min', 'joe-exotic.jpg', 70.00, 'treatment'),
(21, 'Akne Behandlung mit Hochfrequenz Anwendung ca 50 Min', 'joe-exotic.jpg', 70.00, 'treatment'),
(22, 'Anti Aging Behandlung Classic mit Pflegeprodukten von Univ. Prof. Jolanta Schmidt ca 60 Min', 'joe-exotic.jpg', 80.00, 'treatment'),
(23, 'Anti Aging Behandlung mit Elektroporation mit Hyaluron, Vitaminen oder Östrogen, ca 60 Min', 'joe-exotic.jpg', 110.00, 'treatment'),
(24, 'Iontophorese Anwendung Anti Aging, ca 50 Min', 'joe-exotic.jpg', 90.00, 'treatment'),
(25, 'Iontophorese Anwendung bei Akne, ca 45 Min', 'joe-exotic.jpg', 70.00, 'treatment'),
(26, 'Microdermabrasion mit Ampulle, ca 60 Min', 'joe-exotic.jpg', 130.00, 'treatment'),
(27, 'Chemisches Peeling, ca 30 Min', 'joe-exotic.jpg', 120.00, 'treatment'),
(28, 'Kurze Entspannungsbehandlung zwischendurch mit Massage & Maske, ca 30 Min', 'joe-exotic.jpg', 40.00, 'treatment'),
(29, 'Wirkstoffampulle', 'joe-exotic.jpg', 15.00, 'treatment'),
(30, 'Intensivreinigung für Männerhaut ca. 50 Min', 'joe-exotic.jpg', 70.00, 'treatment'),
(31, 'Anti Aging Behandlung für den Mann, ca 60 Min', 'joe-exotic.jpg', 80.00, 'treatment'),
(32, 'Gesichtsenthaarung mit Wachs:\r\nOberlippe', 'joe-exotic.jpg', 5.00, 'treatment'),
(33, 'Gesichtsenthaarung mit Wachs:\r\nKinn', 'joe-exotic.jpg', 5.00, 'treatment'),
(34, 'Gesichtsenthaarung mit Epilation, pro Sitzung ca. 45 Min', 'joe-exotic.jpg', 70.00, 'treatment'),
(35, 'Augenbrauen färben', 'joe-exotic.jpg', 10.00, 'treatment'),
(36, 'Wimpern färben', 'joe-exotic.jpg', 10.00, 'treatment'),
(37, 'Kombi\r\nAugenbrauen färben\r\nWimpern färben', 'joe-exotic.jpg', 15.00, 'treatment'),
(48, 'Maniküre mit Klarlack', 'joe-exotic.jpg', 20.00, 'treatment');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `birth_date`, `pass`, `type`) VALUES
(6, 'LOL', 'LOL@mail.com', '2020-04-09', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(8, 'Mike', 'michael.schano@gmx.at', '0000-00-00', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(9, 'Mike', 'mike@mike.mike', '0000-00-00', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(10, 'asdf', 'user@user.com', '0000-00-00', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `fk_users_id` (`fk_users_id`);

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_product` (`fk_product`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`fk_users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
