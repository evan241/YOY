USE shop;

-- productos
	-- id
    -- nombre
    -- precio
    -- descripcion
    -- imagen
 
 DROP TABLE IF EXISTS `sales`;
 CREATE TABLE `sales` (
 
		`sale_id` INT(3) NOT NULL AUTO_INCREMENT,
        `token` VARCHAR(255) NOT NULL,
        `info` VARCHAR(11) NOT NULL,
        `date` DATE NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `total` INT(11) NOT NULL,
        `status` VARCHAR(50) NOT NULL,
        
        PRIMARY KEY (`sale_id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
    
-- DROP TABLE IF EXISTS `items`;
-- CREATE TABLE `items` (

	-- `item_id` INT(11) NOT NULL AUTO_INCREMENT,
    -- `slot_id` INT(11) NOT NUll,
    
    -- `name` VARCHAR(25) NOT NULL,
    -- `release_date` DATE DEFAULT '2013-02-22',
    -- `members` BOOLEAN DEFAULT 0,
    -- `quest_item` BOOLEAN DEFAULT 0,
    
    -- PRIMARY KEY (`item_id`),
    -- FOREIGN KEY (`slot_id`) REFERENCES `slot` (`slot_id`)
    
-- ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
