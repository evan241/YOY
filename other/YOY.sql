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

 Date: 20/02/2020 13:34:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for CATEGORIA
-- ----------------------------
DROP TABLE IF EXISTS `CATEGORIA`;
CREATE TABLE `CATEGORIA` (
  `ID_CATEGORIA` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(50) DEFAULT NULL,
  `VIGENCIA_CATEGORIA` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of CATEGORIA
-- ----------------------------
BEGIN;
INSERT INTO `CATEGORIA` VALUES (1, 'Ropa accesorios', 1);
INSERT INTO `CATEGORIA` VALUES (2, 'Artesanal', 1);
INSERT INTO `CATEGORIA` VALUES (3, 'Pintura', 1);
COMMIT;

-- ----------------------------
-- Table structure for MEDIO_PAGO
-- ----------------------------
DROP TABLE IF EXISTS `MEDIO_PAGO`;
CREATE TABLE `MEDIO_PAGO` (
  `ID_MEDIO_PAGO` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MEDIO_PAGO` varchar(60) DEFAULT NULL,
  `ACTIVO_MEDIO_PAGO` int(1) DEFAULT '1',
  `VIGENTE_MEDIO_PAGO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_MEDIO_PAGO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of MEDIO_PAGO
-- ----------------------------
BEGIN;
INSERT INTO `MEDIO_PAGO` VALUES (1, 'DEPOSITO', 1, 1);
INSERT INTO `MEDIO_PAGO` VALUES (2, 'TRANSFERENCIA', 1, 1);
INSERT INTO `MEDIO_PAGO` VALUES (3, 'PAGO OXXO', 1, 1);
INSERT INTO `MEDIO_PAGO` VALUES (4, 'PAYPAL', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for PRODUCTO
-- ----------------------------
DROP TABLE IF EXISTS `PRODUCTO`;
CREATE TABLE `PRODUCTO` (
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
INSERT INTO `PRODUCTO` VALUES (1, 2, NULL, '0001', 'Equipal artesanal', 'Es una equipal hecho por manos Colimenses...', 500.00, 1000.00, 10, 1, 1, 2, 'assets/img/store/1.jpg');
INSERT INTO `PRODUCTO` VALUES (2, 2, NULL, '0987', 'Mesa de centro', 'Una mesa elaborada de la mejor madera...', 600.00, 1200.00, 89, 1, 1, 2, 'assets/img/store/2.jpg');
INSERT INTO `PRODUCTO` VALUES (3, 2, NULL, '44', 'Silla artesanal', 'Silla de madera decorada y hecha artesanalmente...', 400.00, 800.00, 20, 1, 1, 8, 'assets/img/store/3.jpg');
INSERT INTO `PRODUCTO` VALUES (4, 3, 2, '2', 'CUADRO PINTURA', 'PINTURA AL OLEO CON MARCO ARTESANAL HECHO POR...', 1000.00, 2000.00, 3, 1, 1, 3, 'EMPTY');
INSERT INTO `PRODUCTO` VALUES (5, 1, 1, '6', 'Vestido', 'Vestido de tela artesanal bordado a mano...', 1200.00, 2400.00, 2, 1, 1, 2, 'assets/img/store/5.jpg');
INSERT INTO `PRODUCTO` VALUES (10, 2, NULL, '3333', 'DDD', '', 0.00, 0.00, 0, 1, 0, 0, 'EMPTY');
COMMIT;

-- ----------------------------
-- Table structure for ROL
-- ----------------------------
DROP TABLE IF EXISTS `ROL`;
CREATE TABLE `ROL` (
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
INSERT INTO `ROL` VALUES (1, 'ADMINISTRADOR', NULL, 1);
INSERT INTO `ROL` VALUES (2, 'VENDEDOR', NULL, 1);
INSERT INTO `ROL` VALUES (3, 'USUARIO', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for TIPO_ENVIO
-- ----------------------------
DROP TABLE IF EXISTS `TIPO_ENVIO`;
CREATE TABLE `TIPO_ENVIO` (
  `ID_TIPO_ENVIO` int(5) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_ENVIO` varchar(60) DEFAULT NULL,
  `PRECIO_TIPO_ENVIO` float(10,2) DEFAULT '0.00',
  `ACTIVO_TIPO_ENVIO` int(1) DEFAULT '1',
  `VIGENTE_TIPO_ENVIO` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_TIPO_ENVIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of TIPO_ENVIO
-- ----------------------------
BEGIN;
INSERT INTO `TIPO_ENVIO` VALUES (1, 'EXPRESS', 600.00, 1, 1);
INSERT INTO `TIPO_ENVIO` VALUES (2, '3 DÍAS HÁBILES', 500.00, 1, 1);
INSERT INTO `TIPO_ENVIO` VALUES (3, '2 SEMANAS', 400.00, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for USUARIO
-- ----------------------------
DROP TABLE IF EXISTS `USUARIO`;
CREATE TABLE `USUARIO` (
  `ID_USUARIO` int(255) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(100) DEFAULT NULL,
  `APELLIDO_USUARIO` varchar(255) DEFAULT NULL,
  `TELEFONO_USUARIO` varchar(25) DEFAULT NULL,
  `EMAIL_USUARIO` varchar(200) DEFAULT NULL,
  `PASSWD_USUARIO` varchar(200) DEFAULT NULL,
  `VIGENCIA_USUARIO` tinyint(4) DEFAULT '0',
  `CONFIRMADO_USUARIO` tinyint(4) DEFAULT '0',
  `CODIGO_USUARIO` varchar(6) DEFAULT '',
  `ID_ROL` tinyint(1) DEFAULT '3',
  `ULTIMO_LOGIN_USUARIO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of USUARIO
-- ----------------------------
BEGIN;
INSERT INTO `USUARIO` VALUES (1, 'administrador', '(root)', NULL, 'admin@geem.com', 'dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=', 1, 1, NULL, 1, '2020-02-20 13:21:33');
INSERT INTO `USUARIO` VALUES (2, 'vendedor', '(prueba)', NULL, 'seller@geem.com', 'dbc2642e6c94f7c31c2d22403327efb0ae870e3aeb1fef8da3a499fe39b9465d7d5265d7af74853de00a1a7e6a4dfa1cedb23603bf0675848385fe23d8254c65ojWoHVKGBZI7ve7sztGsERgo+F5vTgWKdZ7tnrTKILk=', 1, 1, NULL, 2, NULL);
INSERT INTO `USUARIO` VALUES (3, 'usuario', '(prueba)', '', 'client@geem.com', '40665ee00e36208f2be802e970a031722ae8f0c748488c06854f01f89b35cda8afad6cdbffbb96b3b8e1f4ab508b3b5321a761bcc37a74471e49f556dabff39fkYtby5TORsvYw1G4RsMYcH2XDS2wwrBvooaqMmvFB1w=', 1, 1, NULL, 3, '2020-02-20 13:22:26');
INSERT INTO `USUARIO` VALUES (4, 'Erick', 'Evangelista', '3121203796', 'evan241@hotmail.com', 'd2d18bb879c28d88f7e586bddccfd3912cb0c82f3a2cce5b4bdfe7968014718107803536916e1030d1683acf26ee54e758f509cb7be08b169a799745891d84eecVR7pkHnxs8pXwMfVR2LnRIz5FitLRUoiBcMgCpIYLU=', 1, 1, 'T5S9LO', 3, '2020-01-09 12:52:48');
COMMIT;

-- ----------------------------
-- Table structure for VENTA
-- ----------------------------
DROP TABLE IF EXISTS `VENTA`;
CREATE TABLE `VENTA` (
  `ID_VENTA` int(255) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(255) DEFAULT '0',
  `ID_PRODUCTO` int(255) DEFAULT '0',
  `PRECIO_PRODUCTO_VENTA` float(10,2) DEFAULT '0.00',
  `CANTIDAD_VENTA` int(10) DEFAULT '0',
  `FECHA_VENTA` datetime DEFAULT NULL,
  `STATUS_VENTA` tinyint(4) DEFAULT '2',
  `ID_MEDIO_PAGO` int(4) DEFAULT '0',
  `ID_TIPO_ENVIO` int(4) DEFAULT '0',
  `COSTO_ENVIO_VENTA` float(10,2) DEFAULT '0.00',
  `TOTAL_VENTA` float(10,2) DEFAULT '0.00',
  `ACTIVA_VENTA` int(1) DEFAULT '1',
  `paypal_order_id` int(11) DEFAULT '0',
  `paypal_error_id` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_VENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of VENTA
-- ----------------------------
BEGIN;
INSERT INTO `VENTA` VALUES (1, 3, 4, 400.00, 1, '2020-01-05 13:25:00', 1, 4, 1, 200.00, 600.00, 1, 1, 1);
INSERT INTO `VENTA` VALUES (2, 3, 1, 500.00, 1, '2020-01-05 13:25:00', 2, 1, 2, 200.00, 700.00, 1, 0, 0);
INSERT INTO `VENTA` VALUES (3, 3, 2, 600.00, 1, '2020-02-05 13:25:00', 3, 2, 1, 200.00, 800.00, 1, 0, 0);
INSERT INTO `VENTA` VALUES (4, 3, 3, 700.00, 1, '2020-02-05 13:25:00', 4, 3, 1, 200.00, 900.00, 1, 0, 0);
INSERT INTO `VENTA` VALUES (5, 3, 5, 800.00, 1, '2020-02-05 13:25:00', 5, 1, 1, 200.00, 1000.00, 1, 0, 0);
INSERT INTO `VENTA` VALUES (6, 3, 4, 400.00, 1, '2020-02-05 13:25:00', 6, 3, 1, 200.00, 600.00, 1, 0, 0);
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

SET FOREIGN_KEY_CHECKS = 1;
