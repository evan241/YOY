/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : localhost:3306
 Source Schema         : YOY

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : 65001

 Date: 14/11/2019 13:39:23
*/
USE `yoy`;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for CATEGORIA
-- ----------------------------
DROP TABLE IF EXISTS `CATEGORIA`;
CREATE TABLE `CATEGORIA` (
  `ID_CATEGORIA` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(50) DEFAULT NULL,
  `ID_GRUPO` int(10) DEFAULT '0',
  `VIGENCIA_CATEGORIA` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of CATEGORIA
-- ----------------------------
BEGIN;
INSERT INTO `CATEGORIA` VALUES (1, 'Ropa accesorios', 0, 1);
INSERT INTO `CATEGORIA` VALUES (2, 'Artesanal', 0, 1);
INSERT INTO `CATEGORIA` VALUES (3, 'Pintura', 0, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of PRODUCTO
-- ----------------------------
BEGIN;
INSERT INTO `PRODUCTO` VALUES (1, 2, NULL, '0001', 'Equipal artesanal', 'Es una equipal hecho por manos Colimenses...', 500.00, 1000.00, 10, 1, 1, 2, 'assets/img/store/1.jpg');
INSERT INTO `PRODUCTO` VALUES (2, 2, NULL, '0987', 'Mesa de centro', 'Una mesa elaborada de la mejor madera...', 600.00, 1200.00, 89, 1, 1, 2, 'assets/img/store/2.jpg');
INSERT INTO `PRODUCTO` VALUES (3, 2, NULL, '44', 'Silla artesanal', 'Silla de madera decorada y hecha artesanalmente...', 400.00, 800.00, 20, 1, 1, 8, 'assets/img/store/3.jpg');
INSERT INTO `PRODUCTO` VALUES (4, 3, 2, '2', 'Cuadro pintura', 'Pintura al oleo con marco artesanal hecho por...', 1000.00, 2000.00, 3, 1, 1, 3, 'assets/img/store/4.jpg');
INSERT INTO `PRODUCTO` VALUES (5, 1, 1, '6', 'Vestido', 'Vestido de tela artesanal bordado a mano...', 1200.00, 2400.00, 2, 1, 1, 2, 'assets/img/store/5.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `EMAIL_USUARIO` VARCHAR(50) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(100) DEFAULT NULL,
  `APELLIDO_USUARIO` varchar(255) DEFAULT NULL,
  `PASSWD_USUARIO` varchar(100) DEFAULT NULL,
  `VIGENCIA_USUARIO` varchar(255) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT 0,
  `V_KEY` VARCHAR(50) DEFAULT NULL,
  `ID_ROL` int(1) DEFAULT NULL,
  `ULTIMO_LOGIN_USUARIO` datetime DEFAULT NULL,
  
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of USUARIO
-- ----------------------------
BEGIN;
INSERT INTO `USUARIO` VALUES (1, 'asdas','admin', 'Evangelista', 'admin', '1', 1, '2019-11-13 10:42:12');
INSERT INTO `USUARIO` VALUES (2,'asdas', '2', 'General', '2', '1', 2, '2019-11-13 10:43:24');
INSERT INTO `USUARIO` VALUES (3,'asdas', '1', 'Iniciales', '1', '1', 3, '2019-11-13 11:44:22');
COMMIT;

-- ----------------------------
-- Table structure for VENTA
-- ----------------------------
DROP TABLE IF EXISTS `VENTA`;
CREATE TABLE `VENTA` (
  `ID_VENTA` int(255) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(255) DEFAULT '0',
  `ID_PRODUCTO` int(255) DEFAULT '0',
  `CANTIDAD_VENTA` int(10) DEFAULT '0',
  `FECHA_VENTA` datetime DEFAULT NULL,
  `PAGADA_VENTA` int(1) DEFAULT '0',
  `ENVIADA_VENTA` int(1) DEFAULT '0',
  `RECIBIDA_VENTA` int(1) DEFAULT '0',
  `ID_MEDIO_PAGO` int(4) DEFAULT '0',
  `ID_TIPO_ENVIO` int(4) DEFAULT '0',
  `ACTIVA_VENTA` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_VENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of VENTA
-- ----------------------------
BEGIN;
INSERT INTO `VENTA` VALUES (1, 3, 4, 1, '2019-11-05 13:25:00', 0, 0, 0, 3, 1, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
