USE YOY;
SET FOREIGN_KEY_CHECKS=0;

-- Informacion del cliente respecto a como esta registrado en la pagina
-- de Paypal, por lo cual no debe ser repetido el field "id",
-- es aquel que contiene el ID original enlazado a la cuenta del cliente.

DROP TABLE IF EXISTS 	`paypal_client`;
CREATE TABLE 			`paypal_client` (

	`paypal_client_id` 	INT(15) NOT NULL AUTO_INCREMENT,
    
    `id` 				VARCHAR(25) NOT NULL,
    `name` 				VARCHAR(50) NOT NULL,
    `surname` 			VARCHAR(50) NOT NULL,
    `email` 			VARCHAR(50) NOT NULL,
    
    PRIMARY KEY (`paypal_client_id`)
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Dado el caso en el que un cliente puede hacer compras con distintas cuentas de paypal,
-- entonces creamos una tabla para enlazar al usuario con distipos tipos de cuentas de 
-- paypal que este haya utilizado.

DROP TABLE IF EXISTS 	`paypal_account`;
CREATE TABLE 			`paypal_account` (

	`paypal_account_id` INT(15) NOT NULL AUTO_INCREMENT,
    `ID_USUARIO` 		INT(255) NOT NUll,
    `paypal_client_id` 	INT(25) NOT NULL,
    
    PRIMARY KEY (`paypal_account_id`),
    FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIO` (`ID_USUARIO`) ON DELETE CASCADE,
    FOREIGN KEY (`paypal_client_id`) REFERENCES `paypal_client` (`paypal_client_id`) ON DELETE CASCADE
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Guarda la informacion de la orden en el momento que se hace la compra, es la informacion
-- más util para la pagina web, contiene cosas cmo el ID de la orden, cliente, producto,
-- asi como tambien la cantidad total pagada, la cantidad neta y la comision de paypal.

DROP TABLE IF EXISTS 	`paypal_order`;
CREATE TABLE 			`paypal_order` (

	`paypal_order_id` 	INT(15) NOT NULL AUTO_INCREMENT,
    `paypal_client_id` 	INT(15) NOT NUll,
    `ID_PRODUCTO` 		INT(255) NOT NULL,
    
    `id` 				VARCHAR(25) NOT NULL,
    `create_date`		DATE NOT NULL,
    `create_time`		TIME NOT NULL,
    
    `currency` 			VARCHAR(5) NOT NULL,
    `total_amount` 		FLOAT(15) NOT NULL,
    `net_amount` 		FLOAT(15) NOT NULL,
    `paypal_fee` 		FLOAT(15) NOT NULL,
    
    PRIMARY KEY (`paypal_order_id`),
    FOREIGN KEY (`paypal_client_id`) REFERENCES `paypal_client` (`paypal_client_id`) ON DELETE CASCADE
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Contiene informacion adicional de la compra que puede ser util para los developer,
-- el "checkout_url" te regresa toda la informacion de la compra, lo cual es útil en
-- caso de querer implementar más features en un futuro, como seguimiento a rembolsos.

DROP TABLE IF EXISTS 	`paypal_info`;
CREATE TABLE 			`paypal_info` (

	`paypal_info_id` 	INT(15) NOT NULL AUTO_INCREMENT,
    `paypal_order_id` 	INT(15) NOT NUll,
    
    `status` 			VARCHAR(25) NOT NULL,
    `update_date`		DATE NOT NULL,
    `update_time`		TIME NOT NULL,
    
    `checkout_url` 		VARCHAR(100) NOT NULL,
    `checkout_id` 		VARCHAR(25) NOT NULL,
    
    PRIMARY KEY (`paypal_info_id`),
    FOREIGN KEY (`paypal_order_id`) REFERENCES `paypal_order` (`paypal_order_id`) ON DELETE CASCADE
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

SET FOREIGN_KEY_CHECKS=1;