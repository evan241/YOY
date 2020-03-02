/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : localhost:3306
 Source Schema         : yoy

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : 65001

 Date: 20/02/2020 14:13:14
*/

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
  `VIGENCIA_CATEGORIA` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of CATEGORIA
-- ----------------------------
BEGIN;
INSERT INTO `categoria` VALUES (1, 'Ropa accesorios', 1);
INSERT INTO `categoria` VALUES (2, 'Artesanal', 1);
INSERT INTO `categoria` VALUES (3, 'Pintura', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of PRODUCTO
-- ----------------------------
BEGIN;
INSERT INTO `producto` VALUES (1, 2, NULL, '0001', 'Equipal artesanal', 'Es una equipal hecho por manos Colimenses...', 500.00, 1000.00, 10, 1, 1, 2, 'assets/img/store/1.jpg');
INSERT INTO `producto` VALUES (2, 2, NULL, '0987', 'Mesa de centro', 'Una mesa elaborada de la mejor madera...', 600.00, 1200.00, 89, 1, 1, 2, 'assets/img/store/2.jpg');
INSERT INTO `producto` VALUES (3, 2, NULL, '44', 'Silla artesanal', 'Silla de madera decorada y hecha artesanalmente...', 400.00, 800.00, 20, 1, 1, 8, 'assets/img/store/3.jpg');
INSERT INTO `producto` VALUES (4, 3, 2, '2', 'CUADRO PINTURA', 'PINTURA AL OLEO CON MARCO ARTESANAL HECHO POR...', 1000.00, 2000.00, 3, 1, 1, 3, 'EMPTY');
INSERT INTO `producto` VALUES (5, 1, 1, '6', 'Vestido', 'Vestido de tela artesanal bordado a mano...', 1200.00, 2400.00, 2, 1, 1, 2, 'assets/img/store/5.jpg');
INSERT INTO `producto` VALUES (10, 2, NULL, '3333', 'DDD', '', 0.00, 0.00, 0, 1, 0, 0, 'EMPTY');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ROL
-- ----------------------------
BEGIN;
INSERT INTO `rol` VALUES (1, 'ADMINISTRADOR', NULL, 1);
INSERT INTO `rol` VALUES (2, 'VENDEDOR', NULL, 1);
INSERT INTO `rol` VALUES (3, 'USUARIO', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for img_producto
-- ----------------------------
DROP TABLE IF EXISTS `img_producto`;
CREATE TABLE `img_producto` (
  `ID_IMG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUCTO` int(11) NOT NULL,
  `TIPO_IMG` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NOMBRE_IMG` varchar(50) CHARACTER SET utf8 NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  PRIMARY KEY (`ID_IMG`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of img_producto
-- ----------------------------
BEGIN;
INSERT INTO `img_producto` VALUES (1, 2, 'jpg', '1.jpg', '2020-02-14 14:00:00');
INSERT INTO `img_producto` VALUES (2, 2, 'jpg', '2.jpg', '2020-02-14 14:00:00');
INSERT INTO `img_producto` VALUES (4, 2, 'jpg', '3.jpg', '2020-02-14 14:00:00');
COMMIT;

-- ----------------------------
-- Table structure for medio_pago
-- ----------------------------
DROP TABLE IF EXISTS `medio_pago`;
CREATE TABLE `medio_pago` (
  `ID_MEDIO_PAGO` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MEDIO_PAGO` varchar(60) DEFAULT NULL,
  `SRC_IMG` varchar(1000) NOT NULL DEFAULT '',
  `ACTIVO_MEDIO_PAGO` int(1) DEFAULT '1',
  `VIGENTE_MEDIO_PAGO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_MEDIO_PAGO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of medio_pago
-- ----------------------------
BEGIN;
INSERT INTO `medio_pago` VALUES (1, 'DEPOSITO', 'https://img2.freepng.es/20180409/gjq/kisspng-deposit-account-computer-icons-bank-debit-card-fin-atm-5acb9b7865a473.3589904515232930484163.jpg', 1, 1);
INSERT INTO `medio_pago` VALUES (2, 'TRANSFERENCIA', 'https://img.favpng.com/3/13/6/payment-money-order-electronic-funds-transfer-png-favpng-64JYvAmWwgXL0g2KSMBHta59v.jpg', 1, 1);
INSERT INTO `medio_pago` VALUES (3, 'PAGO OXXO', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Oxxo_Logo.svg/1200px-Oxxo_Logo.svg.png', 1, 1);
INSERT INTO `medio_pago` VALUES (4, 'PAYPAL', 'https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `AUTOR` int(11) DEFAULT '0',
  `TITULO` varchar(80) DEFAULT '',
  `CONTENIDO` varchar(800) DEFAULT '',
  `PUBLICADO` int(1) DEFAULT '1',
  `CREATED_AT` date DEFAULT NULL,
  `IMAGEN_TITULO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------
BEGIN;
INSERT INTO `news` VALUES (2, 1, 'Hola<br>', '<div class=\"news-image\"><img src=\"http://localhost/YOY/assets/img/news/16839608_10212436189243544_1210350954_n.jpg\" alt=\"image\" width=\"460\"></div>', 1, NULL, '');
INSERT INTO `news` VALUES (3, 1, 'Hola<br>', '<div class=\"news-image\"><img src=\"http://localhost/YOY/assets/img/news/16839608_10212436189243544_1210350954_n.jpg\" alt=\"image\" width=\"460\"></div>', 1, NULL, '');
INSERT INTO `news` VALUES (4, 1, 'fff<br>', '<div class=\"news-image\"><img src=\"http://localhost/YOY/assets/img/news/79479986_440558360228615_4412971814515376128_n.jpg\" alt=\"image\" width=\"450\"></div>', 1, NULL, '');
COMMIT;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `status_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  `status_color` varchar(20) DEFAULT 'white',
  `status_back` varchar(20) DEFAULT 'blue',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status
-- ----------------------------
BEGIN;
INSERT INTO `status` VALUES (1, 'ERROR', 'black', '#efa40d');
INSERT INTO `status` VALUES (2, 'SIN VERIFICAR', 'black', '#f2d90a');
INSERT INTO `status` VALUES (3, 'PAGO VERIFICADO', 'white', '#0aaff2');
INSERT INTO `status` VALUES (4, 'ENVIADO', 'black', '#0af2a5');
INSERT INTO `status` VALUES (5, 'RECIBIDO', 'white', '#10ab1f');
INSERT INTO `status` VALUES (6, 'CANCELADA', 'white', 'red');
COMMIT;

-- ----------------------------
-- Table structure for tipo_envio
-- ----------------------------
DROP TABLE IF EXISTS `tipo_envio`;
CREATE TABLE `tipo_envio` (
  `ID_TIPO_ENVIO` int(5) NOT NULL AUTO_INCREMENT,
  `TIPO_ENVIO` text NOT NULL,
  `NOMBRE_TIPO_ENVIO` varchar(60) DEFAULT NULL,
  `TIEMPO_TIPO_ENVIO` varchar(100) NOT NULL DEFAULT '',
  `PRECIO_TIPO_ENVIO` float(10,2) DEFAULT '0.00',
  `ACTIVO_TIPO_ENVIO` int(1) DEFAULT '1',
  `VIGENTE_TIPO_ENVIO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_TIPO_ENVIO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tipo_envio
-- ----------------------------
BEGIN;
INSERT INTO `tipo_envio` VALUES (1, 'Nacional', 'PRIORITARIO A DOMICILIO', 'Llega mañana', 600.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (2, 'Nacional', 'NORMAL A DOMICILIO', '2 a 3 días hábiles', 500.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (3, 'Nacional', 'ENVIO TERRESTRE', '2 semanas', 400.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (4, 'Internacional', 'PRIORITARIO A DOMICILIO', 'Llega en 15 días', 600.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (5, 'Internacional', 'NORMAL A DOMICILIO', '10 a 20 días hábiles', 500.00, 1, 1);
INSERT INTO `tipo_envio` VALUES (6, 'Internacional', 'ENVIO TERRESTRE', '1 mes', 400.00, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID_USUARIO` int(255) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(100) DEFAULT NULL,
  `DIRECCION_USUARIO` varchar(100) DEFAULT NULL,
  `CP_USUARIO` varchar(10) DEFAULT NULL,
  `APELLIDO_USUARIO` varchar(255) DEFAULT NULL,
  `TELEFONO_USUARIO` varchar(25) DEFAULT NULL,
  `EMAIL_USUARIO` varchar(200) DEFAULT NULL,
  `PASSWD_USUARIO` varchar(200) DEFAULT NULL,
  `VIGENCIA_USUARIO` tinyint(4) DEFAULT '0',
  `CONFIRMADO_USUARIO` tinyint(4) DEFAULT '0',
  `CODIGO_USUARIO` varchar(6) NOT NULL,
  `ID_ROL` tinyint(1) DEFAULT '3',
  `ULTIMO_LOGIN_USUARIO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES (1, NULL, NULL, NULL, NULL, NULL, 'admin@geem.com', 'dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=', 1, 1, '', 1, '2020-02-19 23:30:09');
INSERT INTO `usuario` VALUES (2, NULL, NULL, NULL, NULL, NULL, 'seller@geem.com', 'dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=', 1, 1, '', 2, NULL);
INSERT INTO `usuario` VALUES (3, 'Joel Ramirez', 'Guillermo Prieto 371 - 371 - Lic. Primo De Verdad / Ignacio Sandoval - C', '28011', NULL, '3124930490', 'client@geem.com', 'dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=', 1, 1, '', 3, '2020-02-20 19:57:19');
INSERT INTO `usuario` VALUES (4, 'Sergio Ignacio', NULL, NULL, 'Machuca Garcia', '3123005071', 'infexiuz@gmail.com', '66a421788333bc85c9a451f606df4b370864523120a44e47c158fcb8d3d10692091e6a298e10f7d9503cf57b330cb34d5f37e214511f8aeee46548966292359bK20XuGT7vhKQ9UV6to7qUqCe3gwKn7Y8MVWerAJYB2M=', 1, 1, 'EDJPW2', 3, '2020-01-25 23:52:21');
COMMIT;

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `ID_VENTA` int(255) NOT NULL AUTO_INCREMENT,
  `ID_SALE` varchar(11) NOT NULL,
  `ID_USUARIO` int(255) DEFAULT '0',
  `ID_PRODUCTO` int(255) DEFAULT '0',
  `DIRECCION_VENTA` varchar(150) NOT NULL,
  `CP_VENTA` varchar(15) NOT NULL,
  `FECHA_VENTA` datetime DEFAULT CURRENT_TIMESTAMP,
  `TOTAL_VENTA` float(10,2) NOT NULL,
  `STATUS_VENTA` tinyint(4) DEFAULT '2',
  `ID_MEDIO_PAGO` int(4) DEFAULT '0',
  `ID_TIPO_ENVIO` int(4) DEFAULT '1',
  `ACTIVA_VENTA` int(1) DEFAULT '1',
  `paypal_order_id` int(11) DEFAULT '0',
  `paypal_error_id` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_VENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of venta
-- ----------------------------
BEGIN;
INSERT INTO `venta` VALUES (1, '85e4d9572e', 3, 2, '', '', '2020-02-19 21:07:00', 1800.00, 1, 4, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (2, '25e4d9ce5d', 3, 2, '', '', '2020-02-19 14:39:01', 1800.00, 1, 3, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (3, '855e4db336', 3, 2, '', '', '2020-02-19 16:14:14', 1700.00, 1, 2, 2, 1, 0, 0);
INSERT INTO `venta` VALUES (4, '405e4db4e3', 3, 4, '', '', '2020-02-19 16:21:23', 2600.00, 1, 4, 4, 1, 0, 0);
INSERT INTO `venta` VALUES (5, '55e4db6b20', 3, 2, '', '', '2020-02-19 16:29:05', 1800.00, 1, 2, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (6, '975e4dc375', 3, 2, '', '', '2020-02-19 17:23:33', 1800.00, 1, 1, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (7, '625e4de70a', 3, 2, '', '', '2020-02-19 19:55:22', 1700.00, 1, 2, 2, 1, 0, 0);
INSERT INTO `venta` VALUES (8, '45e4ed2ce7', 3, 2, '', '', '2020-02-20 12:41:18', 1800.00, 1, 4, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (9, '605e4ed3cf', 3, 4, '', '', '2020-02-20 12:45:35', 2600.00, 1, 2, 1, 1, 0, 0);
INSERT INTO `venta` VALUES (10, '595e4ed6e7', 3, 2, '', '', '2020-02-20 12:58:47', 1700.00, 1, 4, 2, 1, 0, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
