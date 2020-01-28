DROP DATABASE IF EXISTS `yoy`;
CREATE DATABASE `yoy`;
USE `yoy`;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for CATEGORIA
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(50) DEFAULT NULL,
  `VIGENCIA_CATEGORIA` int(1) DEFAULT 1,
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of CATEGORIA
-- ----------------------------
BEGIN;
INSERT INTO `categoria` VALUES (1, 'Ropa accesorios', 1);
INSERT INTO `categoria` VALUES (2, 'Artesanal', 1);
INSERT INTO `categoria` VALUES (3, 'Pintura', 1);
COMMIT;

-- ----------------------------
-- Table structure for MEDIO_PAGO
-- ----------------------------
DROP TABLE IF EXISTS `medio_pago`;
CREATE TABLE `medio_pago` (
  `ID_MEDIO_PAGO` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MEDIO_PAGO` varchar(60) DEFAULT NULL,
  `ACTIVO_MEDIO_PAGO` int(1) DEFAULT '1',
  `VIGENTE_MEDIO_PAGO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_MEDIO_PAGO`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of MEDIO_PAGO
-- ----------------------------
BEGIN;
INSERT INTO `medio_pago` VALUES (1, 'DEPOSITO', 1, 1);
INSERT INTO `medio_pago` VALUES (2, 'TRANSFERENCIA', 1, 1);
INSERT INTO `medio_pago` VALUES (3, 'PAGO OXXO', 1, 1);
INSERT INTO `medio_pago` VALUES (4, 'PAYPAL', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for PRODUCTO
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `ID_PRODUCTO` int(255) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA` int(10) DEFAULT NULL,
  `ID_ALMACEN` int(10) DEFAULT NULL,
  `CODIGO_PRODUCTO` varchar(40) DEFAULT NULL,
  `NOMBRE_PRODUCTO` varchar(50) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO` varchar(50) DEFAULT NULL,
  `COSTO_PRODUCTO` float(10,2) DEFAULT '0.00',
  `PRECIO_PRODUCTO` float(10,2) DEFAULT '0.00',
  `STOCK_PRODUCTO` int(30) DEFAULT '0',
  `ACTIVO_PRODUCTO` int(1) DEFAULT '1',
  `VIGENCIA_PRODUCTO` int(1) DEFAULT '1',
  `STOCK_MINIMO_PRODUCTO` int(4) DEFAULT '0',
  `IMAGEN_PRODUCTO` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of PRODUCTO
-- ----------------------------
BEGIN;
INSERT INTO `producto` VALUES (1, 2, NULL, '0001', 'Equipal artesanal', 'Es una equipal hecho por manos Colimenses...', 500.00, 1000.00, 10, 1, 1, 2, 'assets/img/store/1.jpg');
INSERT INTO `producto` VALUES (2, 2, NULL, '0987', 'Mesa de centro', 'Una mesa elaborada de la mejor madera...', 600.00, 1200.00, 89, 1, 1, 2, 'assets/img/store/2.jpg');
INSERT INTO `producto` VALUES (3, 2, NULL, '44', 'Silla artesanal', 'Silla de madera decorada y hecha artesanalmente...', 400.00, 800.00, 20, 1, 1, 8, 'assets/img/store/3.jpg');
INSERT INTO `producto` VALUES (4, 3, 2, '2', 'Cuadro pintura', 'Pintura al oleo con marco artesanal hecho por...', 1000.00, 2000.00, 3, 1, 1, 3, 'assets/img/store/4.jpg');
INSERT INTO `producto` VALUES (5, 1, 1, '6', 'Vestido', 'Vestido de tela artesanal bordado a mano...', 1200.00, 2400.00, 2, 1, 1, 2, 'assets/img/store/5.jpg');
COMMIT;

-- ----------------------------
-- Table structure for ROL
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `ID_ROL` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(45) DEFAULT NULL,
  `DESCRIPCION_ROL` varchar(50) DEFAULT NULL,
  `VIGENCIA_ROL` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ROL
-- ----------------------------
BEGIN;
INSERT INTO `rol` VALUES (1, 'ADMINISTRADOR', NULL, 1);
INSERT INTO `rol` VALUES (2, 'VENDEDOR', NULL, 1);
INSERT INTO `rol` VALUES (3, 'USUARIO', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for TIPO_ENVIO
-- ----------------------------
DROP TABLE IF EXISTS `tipo_envio`;
CREATE TABLE `tipo_envio` (
  `ID_TIPO_ENVIO` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_ENVIO` varchar(60) DEFAULT NULL,
  `PRECIO_TIPO_ENVIO` float(10,2) DEFAULT '0.00',
  `ACTIVO_TIPO_ENVIO` int(1) DEFAULT '1',
  `VIGENTE_TIPO_ENVIO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_TIPO_ENVIO`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of TIPO_ENVIO
-- ----------------------------
BEGIN;
INSERT INTO `tipo_envio` VALUES (1, 'EXPRESS', 600.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (2, '3 DÍAS HÁBILES', 500.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (3, '2 SEMANAS', 400.00, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for USUARIO
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID_USUARIO` int(255) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(100) DEFAULT NULL,
  `APELLIDO_USUARIO` varchar(255) DEFAULT NULL,
  `TELEFONO_USUARIO` varchar(25) DEFAULT NULL,
  `EMAIL_USUARIO` varchar(200) DEFAULT NULL,
  `PASSWD_USUARIO` varchar(200) DEFAULT NULL,
  `VIGENCIA_USUARIO` tinyint DEFAULT 0,
  `CONFIRMADO_USUARIO` tinyint DEFAULT 0,
  `CODIGO_USUARIO` varchar(6) DEFAULT NULL,
  `ID_ROL` tinyint(1) DEFAULT 3,
  `ULTIMO_LOGIN_USUARIO` datetime DEFAULT NULL,
  
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of USUARIO
-- ----------------------------
INSERT INTO `usuario` (`EMAIL_USUARIO`, `PASSWD_USUARIO`, `VIGENCIA_USUARIO`, `CONFIRMADO_USUARIO`, `ID_ROL`) VALUES
("admin@geem.com", "dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=", 1, 1, 1),
("seller@geem.com", "dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=", 1, 1, 2),
("client@geem.com", "dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=", 1, 1, 3);

-- ----------------------------
-- Table structure for VENTA
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `ID_VENTA` int(255) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(255) DEFAULT '0',
  `ID_PRODUCTO` int(255) DEFAULT '0',
  `FECHA_VENTA` datetime DEFAULT CURRENT_TIMESTAMP,
  `STATUS_VENTA` TINYINT DEFAULT 2,
  `ID_MEDIO_PAGO` int(4) DEFAULT '0',
  `ID_TIPO_ENVIO` int(4) DEFAULT '1',
  `ACTIVA_VENTA` int(1) DEFAULT 1,
  `paypal_order_id` INT DEFAULT 0,
  `paypal_error_id` INT DEFAULT 0,
  PRIMARY KEY (`ID_VENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

INSERT INTO `venta` VALUES (1, 3, 4, '2019-11-05 13:25:00', 1, 3, 1, 1, 0, 0);

DROP TABLE IF EXISTS 	`status`;
CREATE TABLE 			`status` (

	`status_id` 	TINYINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `status` 		VARCHAR(25) NOT NULL
    
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `status` (`status`) VALUES
('ERROR'), ('SIN VERIFICAR'), ('PAGO VERIFICADO'), ('ENVIADO'), ('RECIBIDO');

SET FOREIGN_KEY_CHECKS = 1;
