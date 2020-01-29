USE yoy;
SET FOREIGN_KEY_CHECKS=0;

-- Informacion del cliente respecto a como esta registrado en la pagina
-- de Paypal, por lo cual no debe ser repetido el field "id",
-- es aquel que contiene el ID original enlazado a la cuenta del cliente.

DROP TABLE IF EXISTS 	`paypal_client`;
CREATE TABLE 			`paypal_client` (

	`paypal_client_id` 	INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    
    `id` 				VARCHAR(25) UNIQUE NOT NULL,
    `name` 				VARCHAR(50) NOT NULL,
    `surname` 			VARCHAR(50) NOT NULL,
    `email` 			VARCHAR(50) NOT NULL,
    
    INDEX `paypal_client_email` (`email`)
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Guarda la informacion de la orden en el momento que se hace la compra, es la informacion
-- más util para la pagina web, contiene cosas cmo el ID de la orden, cliente, producto,
-- asi como tambien la cantidad total pagada, la cantidad neta y la comision de paypal.

DROP TABLE IF EXISTS 	`paypal_order`;
CREATE TABLE 			`paypal_order` (

	`paypal_order_id` 	INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    
    `paypal_client_id` 	INT DEFAULT NULL,
    `ID_USUARIO`		INT DEFAULT NULL,
    `ID_PRODUCTO` 		INT DEFAULT NULL,
    `ID_TIPO_ENVIO`		INT DEFAULT NULL,
    
    `sale_id` 			VARCHAR(25) UNIQUE NOT NULL,
    
    `currency` 			VARCHAR(5) NOT NULL,
    `total_amount` 		FLOAT(15) NOT NULL,
    `net_amount` 		FLOAT(15) NOT NULL,
    `paypal_fee` 		FLOAT(15) NOT NULL,
    
    `status` 			VARCHAR(100) NOT NULL,
    `create_date`		DATE NOT NULL,
    `create_time`		TIME NOT NULL,
    `update_date`		DATE NOT NULL,
    `update_time`		TIME NOT NULL,
    
    `order_id` 		VARCHAR(25) UNIQUE NOT NULL,

    FOREIGN KEY (`paypal_client_id`) REFERENCES `paypal_client` (`paypal_client_id`) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (`ID_TIPO_ENVIO`) REFERENCES `tipo_envio` (`ID_TIPO_ENVIO`) ON UPDATE CASCADE ON DELETE SET NULL
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Cuando alguna venta falle en procesarse por causa de ID invalido / password invalido /
-- orden invalida / token no obtenido, o incluso perdida de conexion con el usuario,
-- lo guardamos aqui para procesarlo despues

DROP TABLE IF EXISTS 	`paypal_error`;
CREATE TABLE 			`paypal_error` (

	`paypal_error_id` 	INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	
	`ID_USUARIO`		INT NOT NULL,
    `ID_PRODUCTO` 		INT NOT NULL,
    `ID_TIPO_ENVIO`		INT NOT NULL,
    `order_id`		VARCHAR(25) UNIQUE NOT NULL,
    
    FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE ON DELETE NO ACTION
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

SET FOREIGN_KEY_CHECKS=1;