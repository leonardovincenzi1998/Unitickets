- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 17, 2020 alle 17:02
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitickets`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(512) NOT NULL,
  `admin_salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_salt`) VALUES
(1, 'leo@admin.it', '33be7ee3c0947e275ef58b46e5d72695f92b917c2c9effce4643d6b774ea61a14c2a23d2cfbf602c2b16b4030de855c6424cd2306f4a57c0a6cf88074f6970e3', '2e1d721cb9b21aa02a72ce8db1775ec1e3fdec6208057d965cbfcdd02b06271e9901ee81c862f71b53401fc8e9575e6d001e7ac53552df419be58bda305704ae');

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `image_url`, `description`) VALUES
(1, 'Cinema', 'cinema1.jfif', 'Goditi i film piu\' belli nei migliori cinema d\'Italia!'),
(2, 'Concerto', 'concerto.jpg', 'Canta le tue canzoni preferite in location da urlo!'),
(3, 'Mostra', 'mostra.jpg', 'Ammira le opere dei tuoi artisti preferiti nei luoghi del territorio!'),
(4, 'Museo', 'museo3.jfif', 'Un universo di conoscenza, dalla nascita della Terra fino ad Oggi!'),
(5, 'Party', 'party.jpg', 'Salta, balla, conosci nuove persone! Solo nei migliori party della riviera!'),
(6, 'Teatro', 'teatro.jpg', 'Le opere teatrali che hanno fatto la storia nei teatri piu\' incantevoli!');

-- --------------------------------------------------------

--
-- Struttura della tabella `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_place` varchar(255) NOT NULL,
  `ticket_price` double(6,2) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `in_evidence` tinyint(1) NOT NULL,
  `img` varchar(100) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `Stato` varchar(50) NOT NULL,
  `ticket_available` int(11) NOT NULL,
  `total_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_place`, `ticket_price`, `organizer_id`, `category`, `in_evidence`, `img`, `descriptions`, `Stato`, `ticket_available`, `total_ticket`) VALUES
(1, 'TULUS - LIVE', '2020-10-30 20:20:00', '105 Stadium, Rimini', 15.00, 1, 2, 1, 'tulus.jpg', 'Stanco del solito rock italiano? I Tulus sono qui per te, puro black metal direttamente dalla Norvegia', 'Approvato', 990, 1000),
(2, 'CLUB DOGO REUNION', '2020-02-27 22:00:10', 'San Siro, Milano', 35.00, 1, 2, 1, 'clubdogo.jpg', 'A distanza di 5 anni dal loro ultimo concerto, i Club Dogo si riuniscono per un unica fenomenale data in una delle location più ambite d\'Italia,San Siro.', 'Approvato', 1, 35000),
(3, 'ROMEO e GIULIETTA', '2020-03-20 21:00:00', 'Teatro Verdi, Cesena', 20.00, 1, 6, 1, 'teatro1.jpg', 'Dopo aver girato il \r\nmondo, Romeo e Giulietta tornano al teatro Verdi di Cesena per un altra esibizione mozzafiato.', 'Approvato', 295, 300),
(25, 'VAN GOGH', '2020-10-30 08:00:00', 'History Museum, Londra', 5.00, 1, 4, 0, '', 'ok', 'Approvato', 14999, 15000),
(28, 'Reunion POOH', '2020-04-20 20:00:00', 'San Siro, Milano', 100.00, 4, 2, 0, '', 'Riunione POOH', 'In approvazione', 54996, 60000),
(43, 'JOVA BEACH PARTY', '2020-06-25 21:00:00', 'Marina Centro, Rimini', 55.00, 1, 2, 0, 'jovanotti.jpg', 'Unisciti al pirotecnico tour estivo di Jovanotti, un\' unione di suoni e di colori mai visti prima.', 'In approvazione', 20000, 20000),
(44, '1917', '2020-02-28 20:15:00', 'Uci Cinemas, Savignano S/R', 9.00, 1, 1, 0, '', '6 aprile, 1917. Blake e Schofield, giovani caporali britannici, ricevono un ordine di missione suicida...', 'Approvato', 400, 400),
(45, 'RANDOM PARTY', '2020-02-21 23:00:00', 'Teatro Verdi, Cesena', 16.00, 1, 5, 0, '', 'Per la prima volta al Teatro Verdi di Cesena arriva\r\nRandom #unafestaacaso\r\nINGRESSO: 16 con 1 DRINK COMPRESO!', 'Approvato', 1500, 1500),
(46, 'RÒ E BUNÍ ', '2020-03-08 14:45:00', 'Sala Allende, Savignano S/R', 5.00, 1, 3, 0, '', 'Vieni anche tu ad ammirare le storiche fotografie in bianco e nero di Pier Paolo Zani.', 'Approvato', 1000, 1000);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifies`
--

CREATE TABLE `notifies` (
  `notifies_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `notify_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `letta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notifies`
--

INSERT INTO `notifies` (`notifies_id`, `description`, `notify_date`, `user_id`, `letta`) VALUES
(2, 'Il tuo ordine numero:  19 è stato confermato', '2020-01-31', 2, 1),
(3, 'Il tuo ordine numero:  20 è stato confermato', '2020-01-31', 2, 1),
(4, 'Il tuo ordine numero:  21 è stato confermato', '2020-01-31', 2, 1),
(5, 'Il tuo ordine numero:  22 è stato confermato', '2020-01-31', 2, 1),
(6, 'Il tuo ordine numero:  23 è stato confermato', '2020-01-31', 2, 1),
(7, 'L\'evento: VAN GOGH ha subito delle modifiche', '2020-01-31', 2, 1),
(8, 'L\'evento: TULUS - ROCK IN RIMINI ha subito delle modifiche', '2020-02-05', 2, 1),
(9, 'Il tuo ordine numero:  24 è stato confermato', '2020-02-17', 2, 1),
(10, 'L\'evento: ROMEO e GIULIETTA ha subito delle modifiche', '2020-02-17', 2, 1),
(11, 'Il tuo ordine numero:  25 è stato confermato', '2020-02-17', 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifies_org`
--

CREATE TABLE `notifies_org` (
  `notifies_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `notify_date` date NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `letta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notifies_org`
--

INSERT INTO `notifies_org` (`notifies_id`, `description`, `notify_date`, `organizer_id`, `letta`) VALUES
(1, 'Il tuo evento CLUB DOGO REUNION - SAN SIRO è stato Accettato', '2020-01-24', 1, 1),
(2, 'Il tuo evento TULUS - ROCK IN RIMINI è stato Rifiutato', '2020-01-24', 1, 1),
(3, 'Il tuo evento ROMEO e GIULIETTA e\' In Evidenza', '2020-01-24', 1, 1),
(4, 'Il tuo evento Reunion POOH e\' stato Rifiutato', '2020-01-24', 4, 0),
(5, 'Il tuo evento modifica e\' stato Rifiutato', '2020-01-24', 4, 0),
(8, 'Il tuo evento Reunion POOH e\' stato Accettato', '2020-01-31', 4, 0),
(10, 'Il tuo evento 1917 e\' stato Accettato', '2020-02-17', 1, 1),
(11, 'Il tuo evento RANDOM PARTY e\' stato Accettato', '2020-02-17', 1, 1),
(12, 'Il tuo evento RÒ E BUNÍ  e\' stato Accettato', '2020-02-17', 1, 1),
(13, 'Il tuo evento RÒ E BUNÍ  è stato Accettato', '2020-02-17', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amounts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`order_id`, `purchase_date`, `user_id`, `total_amounts`) VALUES
(13, '2020-01-29', 2, 150),
(14, '2020-01-29', 2, 50),
(15, '2020-01-29', 2, 350),
(16, '2020-01-29', 2, 100),
(17, '2020-01-29', 2, 300),
(18, '2020-01-29', 2, 15),
(19, '2020-01-31', 2, 15),
(20, '2020-01-31', 2, 50),
(21, '2020-01-31', 2, 300),
(22, '2020-01-31', 2, 10),
(23, '2020-01-31', 2, 155);

-- --------------------------------------------------------

--
-- Struttura della tabella `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `event_id`, `quantity`, `price`) VALUES
(32, 13, 1, 1, 35.00),
(33, 13, 28, 1, 100.00),
(34, 13, 2, 1, 15.00),
(35, 14, 1, 1, 35.00),
(36, 14, 2, 1, 15.00),
(37, 15, 1, 1, 35.00),
(38, 15, 2, 1, 15.00),
(39, 15, 28, 3, 300.00),
(40, 16, 28, 1, 100.00),
(41, 17, 1, 2, 70.00),
(42, 17, 2, 2, 30.00),
(43, 17, 28, 2, 200.00),
(44, 18, 2, 1, 15.00),
(45, 19, 2, 1, 15.00),
(46, 20, 1, 1, 35.00),
(47, 20, 2, 1, 15.00),
(48, 21, 28, 3, 300.00),
(49, 22, 25, 2, 10.00),
(50, 23, 3, 2, 40.00),
(51, 23, 2, 1, 15.00),
(52, 23, 28, 1, 100.00);

-- --------------------------------------------------------

--
-- Struttura della tabella `organizer`
--

CREATE TABLE `organizer` (
  `organizer_id` int(11) NOT NULL,
  `organizer_name` varchar(50) NOT NULL,
  `organizer_surname` varchar(50) NOT NULL,
  `organizer_email` varchar(100) NOT NULL,
  `organizer_password` varchar(512) NOT NULL,
  `organizer_tel` bigint(10) NOT NULL,
  `organizer_salt` char(128) NOT NULL,
  `organizer_iva` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `organizer`
--

INSERT INTO `organizer` (`organizer_id`, `organizer_name`, `organizer_surname`, `organizer_email`, `organizer_password`, `organizer_tel`, `organizer_salt`, `organizer_iva`) VALUES
(1, 'Leonardo', 'Vincenzi', 'leo.vincenzi@hotmail.it', 'a70c8b056081ac7bc224307d45be870dfa35176feeac5f144e8d192f95aba244329dde5ad301049513e3279826f025c232206759ccfb11336bc1726dbbcedc6d', 126126126, 'b302249eb045aa8fe5c5523b7b8ad8794c992f9e9ebf2fb3d49a38d0becec511629ef58f0ef02dc415f0f5402529180691783ef717236e1d7764cdd7c760bdc5', 11111111111),
(3, 'Filippo', 'Tartagni', 'f.tartagni@gmail.com', 'a70c8b056081ac7bc224307d45be870dfa35176feeac5f144e8d192f95aba244329dde5ad301049513e3279826f025c232206759ccfb11336bc1726dbbcedc6d', 123, 'b302249eb045aa8fe5c5523b7b8ad8794c992f9e9ebf2fb3d49a38d0becec511629ef58f0ef02dc415f0f5402529180691783ef717236e1d7764cdd7c760bdc5', 11221122112),
(4, 'Andrea', 'Vincenzi', 'andrea@gmail.com', 'a70c8b056081ac7bc224307d45be870dfa35176feeac5f144e8d192f95aba244329dde5ad301049513e3279826f025c232206759ccfb11336bc1726dbbcedc6d', 127, 'b302249eb045aa8fe5c5523b7b8ad8794c992f9e9ebf2fb3d49a38d0becec511629ef58f0ef02dc415f0f5402529180691783ef717236e1d7764cdd7c760bdc5', 55555555555);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(512) NOT NULL,
  `user_tel` bigint(10) NOT NULL,
  `birthdate` date NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`user_id`, `name`, `surname`, `user_email`, `user_password`, `user_tel`, `birthdate`, `salt`) VALUES
(2, 'Leonardo', 'Vincenzi', 'leo@prova.it', 'f64d94423be39b206038227c14ae3fa2d509c10e72cfc34c847bb753e911bf347e684671d8325066596a554542ae29ad03c33ef6114340ab885eb89ebca5b5ae', 3885723720, '1998-12-16', '3971f431aaf2d3466247d9e58cb4771114ef737be7188cc8d6654cfeb9f65cde9f999093f8c86f4b4dabf7a96623da0f6918d8e962f1b589d674f666db966bac'),
(5, 'Lorenzo', 'Gori', 'lolloxd@euroclub.it', '188f8f91d60205ff886adb48ee79d3c458681c659719abdc4001ef6cefd2231c428e0d48e8a9f2cb71366fe3ed56b61c3aeaac2254a2cbfeef4bd977f3574f0b', 3331234337, '1996-06-15', 'e01c5f34cab2835f75db40a61caac9df1608da6e435d87b3f231113a84fa388460871a406d2fee79a8b1ed11f4c3cb2210a40e40489449eeb454dd66327dec65');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indici per le tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `organizer_id` (`organizer_id`),
  ADD KEY `category` (`category`);

--
-- Indici per le tabelle `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`notifies_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `notifies_org`
--
ALTER TABLE `notifies_org`
  ADD PRIMARY KEY (`notifies_id`),
  ADD KEY `organizer_id` (`organizer_id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indici per le tabelle `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `notifies`
--
ALTER TABLE `notifies`
  MODIFY `notifies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `notifies_org`
--
ALTER TABLE `notifies_org`
  MODIFY `notifies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT per la tabella `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);

--
-- Limiti per la tabella `notifies`
--
ALTER TABLE `notifies`
  ADD CONSTRAINT `notifies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `notifies_org`
--
ALTER TABLE `notifies_org`
  ADD CONSTRAINT `notifies_org_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`);

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limiti per la tabella `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
