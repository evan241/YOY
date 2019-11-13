DROP DATABASE IF EXISTS osrs;
CREATE DATABASE osrs;
USE osrs;

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (

	`item_id` INT(11) NOT NULL AUTO_INCREMENT,
    `slot_id` INT(11) NOT NUll,
    
    `name` VARCHAR(25) NOT NULL,
    `release_date` DATE DEFAULT '2013-02-22',
    `members` BOOLEAN DEFAULT 0,
    `quest_item` BOOLEAN DEFAULT 0,
    
    PRIMARY KEY (`item_id`),
    FOREIGN KEY (`slot_id`) REFERENCES `slot` (`slot_id`)
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `slot`;
CREATE TABLE `slot` (

	`slot_id` INT(11) NOT NULL AUTO_INCREMENT,
    
    `slot` VARCHAR(50) NOT NULL,
    
    PRIMARY KEY (`slot_id`)
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `slot` (`slot`) VALUES ('head');
INSERT INTO `slot` (`slot`) VALUES ('chest');
INSERT INTO `slot` (`slot`) VALUES ('legs');
INSERT INTO `slot` (`slot`) VALUES ('hands');
INSERT INTO `slot` (`slot`) VALUES ('feet');
INSERT INTO `slot` (`slot`) VALUES ('cape');
INSERT INTO `slot` (`slot`) VALUES ('neck');
INSERT INTO `slot` (`slot`) VALUES ('ring');
INSERT INTO `slot` (`slot`) VALUES ('ammunition');
INSERT INTO `slot` (`slot`) VALUES ('shield');
INSERT INTO `slot` (`slot`) VALUES ('weapon');
INSERT INTO `slot` (`slot`) VALUES ('two handed');


DROP TABLE IF EXISTS `speed`;
CREATE TABLE `speed` (
	
    `speed_id` INT(11) NOT NULL AUTO_INCREMENT,
    `speed` INT(11) NOT NULL,
    `interval` FLOAT(11) NOT NULL,
    
    PRIMARY KEY (`speed_id`)
)  ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `speed` (`speed`, `interval`) VALUES (1, 0.6);
INSERT INTO `speed` (`speed`, `interval`) VALUES (2, 1.2);
INSERT INTO `speed` (`speed`, `interval`) VALUES (3, 1.8);
INSERT INTO `speed` (`speed`, `interval`) VALUES (4, 2.4);
INSERT INTO `speed` (`speed`, `interval`) VALUES (5, 3.0);
INSERT INTO `speed` (`speed`, `interval`) VALUES (6, 3.6);
INSERT INTO `speed` (`speed`, `interval`) VALUES (7, 4.2);
INSERT INTO `speed` (`speed`, `interval`) VALUES (8, 4.8);
INSERT INTO `speed` (`speed`, `interval`) VALUES (9, 5.4);
INSERT INTO `speed` (`speed`, `interval`) VALUES (10, 6.0);


DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (

	`stats_id` INT(11) NOT NULL AUTO_INCREMENT,
    `item_id` INT(11) NOT NULL,
    
    `a_stab` INT(11) DEFAULT 0,
    `a_slash` INT(11) DEFAULT 0,
    `a_crush` INT(11) DEFAULT 0,
    `a_magic` INT(11) DEFAULT 0,
    `a_ranged` INT(11) DEFAULT 0,
    
    `d_stab` INT(11) DEFAULT 0,
    `d_slash` INT(11) DEFAULT 0,
    `d_crush` INT(11) DEFAULT 0,
    `d_magic` INT(11) DEFAULT 0,
    `d_ranged` INT(11) DEFAULT 0,
    
    `str_bonus` INT(11) DEFAULT 0,
    `magic_bonus` INT(11) DEFAULT 0,
	`rng_bonus` INT(11) DEFAULT 0,
    `pray_bonus` INT(11) DEFAULT 0,
    
    `speed_id` INT(11) NOT NULL,
    
    PRIMARY KEY (`stats_id`),
    FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
    FOREIGN KEY (`speed_id`) REFERENCES `speed` (`speed_id`)
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (

	`property_id` INT(11) NOT NULL AUTO_INCREMENT,
    `item_id` INT(11) NOT NULL,
    
    `tradeable` BOOLEAN DEFAULT 0,
    `equipable` BOOLEAN DEFAULT 0,
    `stackable` BOOLEAN DEFAULT 0,
    `noteable` BOOLEAN DEFAULT 0,
    `examine` VARCHAR(100) DEFAULT 'nothing interesting happens.',
    `weight` FLOAT(10) DEFAULT '0.0',

	PRIMARY KEY (`property_id`),
    FOREIGN KEY (`item_id`) REFERENCES `items`(`item_id`)

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `values`;
CREATE TABLE `values` (

	`value_id` INT(11) NOT NULL AUTO_INCREMENT,
    `item_id` INT(11) NOT NULL,
    
    `value` INT(11) DEFAULT 0,
    `high_alch` INT(11) DEFAULT 0,
    `low_alch` INT(11) DEFAULT 0,

	PRIMARY KEY (`value_id`),
    FOREIGN KEY (`item_id`) REFERENCES `items`(`item_id`)

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `grand_exchange`;
CREATE TABLE `grand_exchange` (

	`grand_exchange_id` INT(11) NOT NULL AUTO_INCREMENT,
    `item_id` INT(11) NOT NULL,
    
     `exchange` INT(11) DEFAULT 0,
     `buy_limit` INT(11) DEFAULT 0,
     
     PRIMARY KEY (`grand_exchange_id`),
     FOREIGN KEY (`item_id`) REFERENCES `items`(`item_id`)

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (

	`player_id` INT(11) NOT NULL AUTO_INCREMENT,
    
    `name` VARCHAR(25) NOT NULL,
    
    `attack` INT(11) DEFAULT 0,
    `strength` INT(11) DEFAULT 0,
    `defense` INT(11) DEFAULT 0,
    `ranged` INT(11) DEFAULT 0,
    `magic` INT(11) DEFAULT 0,
    `prayer` INT(11) DEFAULT 0

) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;