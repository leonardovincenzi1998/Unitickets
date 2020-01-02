CREATE SCHEMA IF NOT EXISTS `unitickets` DEFAULT CHARACTER SET utf8 ;
USE `unitickets` ;

CREATE TABLE IF NOT EXISTS `user` (              -- indirizzo -> tabella (così più di uno)
	`user_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`surname` varchar(50) NOT NULL,
	`user_email` varchar(100) NOT NULL,
	`user_password` varchar(512) NOT NULL,
	`user_tel` tinyint(10) NOT NULL,
	`birthdate` date NOT NULL,
	`salt` CHAR(128) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `organizer` (
	`organizer_id` int(11) NOT NULL AUTO_INCREMENT,
	`organizer_name` varchar(50) NOT NULL,
	`organizer_email` varchar(100) NOT NULL,
	`organizer_password` varchar(512) NOT NULL,
	`organizer_tel` tinyint(10) NOT NULL,
	`organizer_salt` CHAR(128) NOT NULL
  PRIMARY KEY (`organizer_id`),
) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `events` (
	`event_id` int(11) NOT NULL AUTO_INCREMENT,
	`event_name` varchar(50) NOT NULL,
	`event_date` date NOT NULL,
	-- `event_email` varchar(100) NOT NULL,
	`event_place` varchar(255) NOT NULL,					--category qui o tabella a parte? direi tabella a parte perchè devo averle tutte
	PRIMARY KEY (`event_id`),
	FOREIGN KEY (`organizer`)										--ci sta? l'evento è di un organizzatore
		REFERENCES `organizer` (`organizer_id`)
	FOREIGN KEY (`category`)
			REFERENCES `category` (`category_id`)
) ENGINE=InnoDB                                 --total tickets   --tickets available

CREATE TABLE IF NOT EXISTS `category` (
	`category_id` int(11) NOT NULL AUTO_INCREMENT,
	`category_name` varchar(50) NOT NULL,
	PRIMARY KEY(`category_id`)
) ENGINE=InnoDB

-- CREATE TABLE IF NOT EXISTS `event_has_category` (   -- per visualizzare eventi per categoria
-- 	`events` INT NOT NULL,														-- senza andare a pescare nella loro tabella
-- 	`category` INT NOT NULL,
-- 	PRIMARY KEY (`events`, `category`),
-- 	FOREIGN KEY (`events`)
-- 		REFERENCES `events` (`event_id`),
-- 	FOREIGN KEY (`category`)
-- 		REFERENCES `category` (`category_id`)
-- ) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `tickets` (			--prezzo?
	`ticket_id` int(11),
	`available_tickets` int NOT NULL,   --	QUESTI DUE LI METTEREI IN EVENTS, PERò  (inizialmente potrei fare senza diversi settori)
	`total_tickets` int NOT NULL,			 -- COME TENGO TRACCIA DEL NUMERO DI BIGLIETTI RIMASTI
	`ticket_price` tinyint NOT NULL,    -- SICURO ???
	FOREIGN KEY (`events`)
		REFERENCES `events` (`event_id`),

	PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB
-- tickets -> disponibilità   	prezzo
-- events  -> luogo		categoria

CREATE TABLE IF NOT EXISTS `orders` (				--quantity 	--events   PAG.234 libro basi
	`order_id` int(11) NOT NULL AUTO_INCREMENT,
	--QUI MI TROVO TUTTI I DATI DA FUORI O METTO ALMENO order_cost ?
	FOREIGN KEY (`events`)
		REFERENCES `events` (`event_name`),
	--FOREIGN KEY user_id perchè poi voglio stampare tutti gli
	-- ordini di un utente
	FOREIGN KEY (`user`)
		REFERENCES `user` (`user_id`)
) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `order_details` (
	`order_details_id` int(11) NOT NULL AUTO_INCREMENT,

) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `login_attempts` (
	`time` TIME,
	FOREIGN KEY (`user`)
		REFERENCES `user` (`user_id`)
) ENGINE=InnoDBS
