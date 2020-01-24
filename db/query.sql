CREATE DATABASE IF NOT EXISTS `unitickets` DEFAULT CHARACTER SET utf8 ;
USE `unitickets` ;

CREATE TABLE IF NOT EXISTS `user` (
	`user_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`surname` varchar(50) NOT NULL,
	`user_email` varchar(100) NOT NULL,
	`user_password` varchar(512) NOT NULL,
	`user_tel` bigint(10) NOT NULL,
	`birthdate` date NOT NULL,
	`salt` CHAR(128) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `organizer` (
	`organizer_id` int(11) NOT NULL AUTO_INCREMENT,
	`organizer_name` varchar(50) NOT NULL,
	`organizer_surname` varchar(50) NOT NULL,
	`organizer_email` varchar(100) NOT NULL,
	`organizer_password` varchar(512) NOT NULL,
	`organizer_tel` tinyint(10) NOT NULL,
	`organizer_salt` CHAR(128) NOT NULL,
	`organizer_iva` BIGINT(11) ZEROFILL NOT NULL,
  PRIMARY KEY (`organizer_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `admin` (
	`admin_id` int(11) NOT NULL AUTO_INCREMENT,
	`admin_email` varchar(100) NOT NULL,
	`admin_password` varchar(512) NOT NULL,
	`admin_salt` char(128) NOT NULL,
	PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `category` (
	`category_id` int(11) NOT NULL AUTO_INCREMENT,
	`category_name` varchar(50) NOT NULL,
	`image_url` varchar(100) NOT NULL,
	PRIMARY KEY(`category_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `events` (
	`event_id` int(11) NOT NULL AUTO_INCREMENT,
	`event_name` varchar(50) NOT NULL,
	`event_date` date NOT NULL,
	`event_place` varchar(255) NOT NULL,
	`ticket_price` double(6,2) NOT NULL,
	`organizer_id` int(11) NOT NULL,
	`category` int(11) NOT NULL,
	`available_tickets` int NOT NULL,
	`total_tickets` int NOT NULL,
	`description` varchar(512) NOT NULL,
	PRIMARY KEY (`event_id`),
	FOREIGN KEY (`organizer_id`)
		REFERENCES `organizer`(`organizer_id`),
	FOREIGN KEY (`category`)
			REFERENCES `category`(`category_id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `tickets` (
	`ticket_id` int(11),
	`event_id` int(11) NOT NULL,
	PRIMARY KEY (`ticket_id`),
	FOREIGN KEY (`event_id`)
		REFERENCES `events`(`event_id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `orders` (
	`order_id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	-- `event_id` int(11) NOT NULL,
	-- `quantity` int (11) NOT NULL,
	`purchase_date` date NOT NULL,
	`total_amounts` double(6,2) NOT NULL,
	PRIMARY KEY (`order_id`),
	FOREIGN KEY (`user_id`)
		REFERENCES `user`(`user_id`)
	-- FOREIGN KEY (`event_id`)
	-- 	REFERENCES `events`(`event_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `order_details` (
	`order_id` int(11) NOT NULL,
	-- `user_id` int(11) NOT NULL,
	`event_id` int(11) NOT NULL,
	`quantity` int (11) NOT NULL,
	-- `ticket_price` double(6,2) NOT NULL,
	-- `total_amounts` double(6,2) NOT NULL,
	PRIMARY KEY (`order_id`, `event_id`),
	FOREIGN KEY (`order_id`)
		REFERENCES `orders`(`order_id`),
	FOREIGN KEY (`event_id`)
		REFERENCES `events`(`event_id`)  --,
	-- FOREIGN KEY (`ticket_price`)
	--   REFERENCES `events` (`ticket_price`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `notifies` (
	`notifies_id` int(11) NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`notify_date` date NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`notifies_id`),
	FOREIGN KEY(`user_id`)
		REFERENCES `user`(`user_id`)
) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `notifies_org` (
	`notifies_id` int(11) NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`notify_date` date NOT NULL,
	`organizer_id` int(11) NOT NULL,
	PRIMARY KEY (`notifies_id`),
	FOREIGN KEY(`organizer_id`)
		REFERENCES `organizer`(`organizer_id`)
) ENGINE=InnoDB

CREATE TABLE IF NOT EXISTS `notifies_org` (
	`notifies_id` int(11) NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`notify_date` date NOT NULL,
	`organizer_id` int(11) NOT NULL,
	PRIMARY KEY (`notifies_id`),
	FOREIGN KEY(`organizer_id`)
		REFERENCES `organizer`(`organizer_id`)
) ENGINE=InnoDB


CREATE TABLE IF NOT EXISTS `login_attempts` (   --tarta non so cosa vuoi farci con questa per il login, lascio a te
	`time` TIME,
	`user_id`int(11) NOT NULL,
	FOREIGN KEY (`user_id`)
		REFERENCES `user` (`user_id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;
