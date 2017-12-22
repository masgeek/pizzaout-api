/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : tsobucok_pizza

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-22 18:22:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chef
-- ----------------------------
DROP TABLE IF EXISTS `chef`;
CREATE TABLE `chef` (
  `CHEF_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CHEF_NAME` varchar(100) NOT NULL,
  `KITCHEN_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`CHEF_ID`),
  KEY `Kitchen_ID` (`KITCHEN_ID`) USING BTREE,
  CONSTRAINT `chef_ibfk_1` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chef
-- ----------------------------
INSERT INTO `chef` VALUES ('4', 'Ahmed Jama', '1');
INSERT INTO `chef` VALUES ('5', 'Bashir Munye', '2');

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `CITY_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CITY_NAME` varchar(100) NOT NULL,
  `COUNTRY_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`CITY_ID`),
  KEY `Country_ID` (`COUNTRY_ID`) USING BTREE,
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country` (`COUNRY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'Mogadishu', '2');
INSERT INTO `city` VALUES ('3', 'Mombasa', '1');

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `COUNRY_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `COUNTRY_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`COUNRY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'KENYA');
INSERT INTO `country` VALUES ('2', 'SOMALIA');
INSERT INTO `country` VALUES ('3', 'SOUTH SUDAN');
INSERT INTO `country` VALUES ('4', 'ETHIOPIA');
INSERT INTO `country` VALUES ('5', 'ERITREA');

-- ----------------------------
-- Table structure for customer_address
-- ----------------------------
DROP TABLE IF EXISTS `customer_address`;
CREATE TABLE `customer_address` (
  `ADDRESS_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) NOT NULL,
  `LOCATION_ID` bigint(20) DEFAULT NULL,
  `ADDRESS` text NOT NULL,
  PRIMARY KEY (`ADDRESS_ID`),
  KEY `customer_address_ibfk_1` (`USER_ID`) USING BTREE,
  KEY `customer_address_ibfk_2` (`LOCATION_ID`) USING BTREE,
  CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_address_ibfk_2` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_address
-- ----------------------------
INSERT INTO `customer_address` VALUES ('1', '5', '1', 'KISMAYU');
INSERT INTO `customer_address` VALUES ('2', '10', '1', 'KISMAYU');

-- ----------------------------
-- Table structure for customer_order
-- ----------------------------
DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE `customer_order` (
  `ORDER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) NOT NULL,
  `ADDRESS_ID` bigint(20) NOT NULL,
  `KITCHEN_ID` bigint(10) DEFAULT NULL,
  `CHEF_ID` bigint(10) DEFAULT NULL,
  `RIDER_ID` bigint(10) DEFAULT NULL,
  `ORDER_DATE` datetime NOT NULL,
  `PAYMENT_METHOD` varchar(20) NOT NULL,
  `ORDER_STATUS` varchar(30) NOT NULL COMMENT 'Status of the order',
  `NOTES` varchar(255) DEFAULT NULL COMMENT 'Can contain payment text from mobile transactions etc',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `User_ID` (`USER_ID`) USING BTREE,
  KEY `Location_ID` (`ADDRESS_ID`) USING BTREE,
  KEY `customer_order_ibfk_3` (`RIDER_ID`) USING BTREE,
  KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE,
  KEY `ORDER_STATUS` (`ORDER_STATUS`) USING BTREE,
  KEY `CHEF_ID` (`CHEF_ID`) USING BTREE,
  CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `customer_address` (`ADDRESS_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`RIDER_ID`) REFERENCES `riders` (`RIDER_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_4` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_5` FOREIGN KEY (`ORDER_STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_6` FOREIGN KEY (`CHEF_ID`) REFERENCES `chef` (`CHEF_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1095 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_order
-- ----------------------------
INSERT INTO `customer_order` VALUES ('1051', '25', '1', null, null, null, '2017-12-21 13:40:50', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 13:40:50', '2017-12-21 13:40:50');
INSERT INTO `customer_order` VALUES ('1052', '25', '1', null, null, null, '2017-12-21 14:07:43', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 14:07:43', '2017-12-21 14:07:43');
INSERT INTO `customer_order` VALUES ('1053', '25', '1', null, null, null, '2017-12-21 14:10:57', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 14:10:57', '2017-12-21 14:10:57');
INSERT INTO `customer_order` VALUES ('1054', '25', '1', null, null, null, '2017-12-21 14:11:05', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 14:11:05', '2017-12-21 14:11:05');
INSERT INTO `customer_order` VALUES ('1055', '25', '1', null, null, null, '2017-12-21 14:15:30', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 14:15:30', '2017-12-21 14:15:30');
INSERT INTO `customer_order` VALUES ('1056', '25', '1', null, null, null, '2017-12-21 15:17:48', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 15:17:48', '2017-12-21 15:17:48');
INSERT INTO `customer_order` VALUES ('1057', '25', '1', null, null, null, '2017-12-21 15:17:49', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 15:17:49', '2017-12-21 15:17:49');
INSERT INTO `customer_order` VALUES ('1058', '25', '1', null, null, null, '2017-12-21 15:33:19', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 15:33:19', '2017-12-21 15:33:19');
INSERT INTO `customer_order` VALUES ('1059', '25', '1', null, null, null, '2017-12-21 15:34:15', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 15:34:15', '2017-12-21 15:34:15');
INSERT INTO `customer_order` VALUES ('1060', '25', '1', null, null, null, '2017-12-21 15:36:32', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 15:36:32', '2017-12-21 15:36:32');
INSERT INTO `customer_order` VALUES ('1061', '25', '1', null, null, null, '2017-12-21 17:43:36', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 17:43:36', '2017-12-21 17:43:36');
INSERT INTO `customer_order` VALUES ('1062', '25', '1', null, null, null, '2017-12-21 17:46:10', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 17:46:10', '2017-12-21 17:46:10');
INSERT INTO `customer_order` VALUES ('1063', '25', '1', null, null, null, '2017-12-21 18:03:18', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:03:19', '2017-12-21 18:03:19');
INSERT INTO `customer_order` VALUES ('1064', '46', '1', null, null, null, '2017-12-21 18:05:13', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:05:13', '2017-12-21 18:05:13');
INSERT INTO `customer_order` VALUES ('1065', '46', '1', null, null, null, '2017-12-21 18:16:00', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:16:00', '2017-12-21 18:16:00');
INSERT INTO `customer_order` VALUES ('1066', '46', '1', null, null, null, '2017-12-21 18:23:41', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:23:41', '2017-12-21 18:23:41');
INSERT INTO `customer_order` VALUES ('1067', '46', '1', null, null, null, '2017-12-21 18:27:20', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:27:20', '2017-12-21 18:27:20');
INSERT INTO `customer_order` VALUES ('1068', '46', '1', null, null, null, '2017-12-21 18:30:22', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:30:22', '2017-12-21 18:30:22');
INSERT INTO `customer_order` VALUES ('1069', '25', '1', null, null, null, '2017-12-21 18:46:02', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:46:02', '2017-12-21 18:46:02');
INSERT INTO `customer_order` VALUES ('1070', '25', '1', null, null, null, '2017-12-21 18:48:56', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:48:56', '2017-12-21 18:48:56');
INSERT INTO `customer_order` VALUES ('1071', '25', '1', null, null, null, '2017-12-21 18:49:19', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:49:19', '2017-12-21 18:49:19');
INSERT INTO `customer_order` VALUES ('1072', '25', '1', null, null, null, '2017-12-21 18:51:10', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 18:51:10', '2017-12-21 18:51:10');
INSERT INTO `customer_order` VALUES ('1073', '37', '1', null, null, null, '2017-12-21 19:19:39', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 19:19:40', '2017-12-21 19:19:40');
INSERT INTO `customer_order` VALUES ('1074', '25', '1', null, null, null, '2017-12-21 22:41:26', 'MOBILE', 'ORDER PENDING', null, '2017-12-21 22:41:26', '2017-12-21 22:41:26');
INSERT INTO `customer_order` VALUES ('1075', '25', '1', null, null, null, '2017-12-22 03:13:59', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 03:13:59', '2017-12-22 03:13:59');
INSERT INTO `customer_order` VALUES ('1076', '25', '1', null, null, null, '2017-12-22 05:39:58', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 05:39:58', '2017-12-22 05:39:58');
INSERT INTO `customer_order` VALUES ('1087', '25', '1', null, null, null, '2017-12-22 08:22:37', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 08:22:37', '2017-12-22 08:22:37');
INSERT INTO `customer_order` VALUES ('1088', '25', '1', null, null, null, '2017-12-22 08:22:37', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 08:22:37', '2017-12-22 08:22:37');
INSERT INTO `customer_order` VALUES ('1089', '25', '1', null, null, null, '2017-12-22 09:00:37', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 09:00:38', '2017-12-22 09:00:38');
INSERT INTO `customer_order` VALUES ('1090', '25', '1', null, null, null, '2017-12-22 09:14:01', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 09:14:02', '2017-12-22 09:14:02');
INSERT INTO `customer_order` VALUES ('1091', '25', '1', null, null, null, '2017-12-22 12:42:47', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 12:42:47', '2017-12-22 12:42:47');
INSERT INTO `customer_order` VALUES ('1092', '25', '1', null, null, null, '2017-12-22 12:42:47', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 12:42:47', '2017-12-22 12:42:47');
INSERT INTO `customer_order` VALUES ('1093', '25', '1', null, null, null, '2017-12-22 14:38:12', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 14:38:12', '2017-12-22 14:38:12');
INSERT INTO `customer_order` VALUES ('1094', '25', '1', null, null, null, '2017-12-22 14:38:12', 'MOBILE', 'ORDER PENDING', null, '2017-12-22 14:38:13', '2017-12-22 14:38:13');

-- ----------------------------
-- Table structure for customer_order_item
-- ----------------------------
DROP TABLE IF EXISTS `customer_order_item`;
CREATE TABLE `customer_order_item` (
  `ORDER_ITEM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDER_ID` bigint(10) NOT NULL,
  `ITEM_TYPE_ID` bigint(10) NOT NULL,
  `QUANTITY` int(4) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL,
  `SUBTOTAL` decimal(10,0) NOT NULL,
  `OPTIONS` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTES` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ORDER_ITEM_ID`),
  KEY `ORDER_ID` (`ORDER_ID`) USING BTREE,
  KEY `order_item_ibfk_2` (`ITEM_TYPE_ID`) USING BTREE,
  CONSTRAINT `customer_order_item_ibfk_1` FOREIGN KEY (`ITEM_TYPE_ID`) REFERENCES `menu_item_type` (`ITEM_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_order_item_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_order_item
-- ----------------------------
INSERT INTO `customer_order_item` VALUES ('18', '1051', '4', '4', '300', '1200', 'N/A', null, '2017-12-21 13:40:50', null);
INSERT INTO `customer_order_item` VALUES ('19', '1051', '5', '5', '10', '50', 'N/A', null, '2017-12-21 13:40:50', null);
INSERT INTO `customer_order_item` VALUES ('20', '1052', '5', '10', '1', '10', 'N/A', null, '2017-12-21 14:07:43', null);
INSERT INTO `customer_order_item` VALUES ('21', '1053', '4', '5', '1', '5', 'N/A', null, '2017-12-21 14:10:57', null);
INSERT INTO `customer_order_item` VALUES ('22', '1055', '1', '1', '1', '1', 'N/A', null, '2017-12-21 14:15:30', null);
INSERT INTO `customer_order_item` VALUES ('23', '1056', '2', '2', '1', '2', 'N/A', null, '2017-12-21 15:17:48', null);
INSERT INTO `customer_order_item` VALUES ('24', '1056', '2', '2', '1', '2', 'N/A', null, '2017-12-21 15:17:48', null);
INSERT INTO `customer_order_item` VALUES ('25', '1059', '1', '3', '1', '3', 'N/A', null, '2017-12-21 15:34:15', null);
INSERT INTO `customer_order_item` VALUES ('26', '1060', '5', '1', '1', '1', 'N/A', null, '2017-12-21 15:36:32', null);
INSERT INTO `customer_order_item` VALUES ('27', '1062', '3', '2', '1', '2', 'N/A', null, '2017-12-21 17:46:10', null);
INSERT INTO `customer_order_item` VALUES ('28', '1064', '5', '2', '1', '2', 'N/A', null, '2017-12-21 18:05:13', null);
INSERT INTO `customer_order_item` VALUES ('29', '1065', '4', '1', '1', '1', 'N/A', null, '2017-12-21 18:16:00', null);
INSERT INTO `customer_order_item` VALUES ('30', '1066', '1', '1', '1', '1', 'N/A', null, '2017-12-21 18:23:41', null);
INSERT INTO `customer_order_item` VALUES ('31', '1067', '5', '1', '1', '1', 'N/A', null, '2017-12-21 18:27:20', null);
INSERT INTO `customer_order_item` VALUES ('32', '1068', '5', '1', '1', '1', 'N/A', null, '2017-12-21 18:30:22', null);
INSERT INTO `customer_order_item` VALUES ('33', '1070', '4', '10', '1', '10', 'N/A', null, '2017-12-21 18:48:56', null);
INSERT INTO `customer_order_item` VALUES ('34', '1072', '3', '1', '1', '1', 'N/A', null, '2017-12-21 18:51:10', null);
INSERT INTO `customer_order_item` VALUES ('35', '1073', '4', '1', '1', '1', 'N/A', null, '2017-12-21 19:19:39', null);
INSERT INTO `customer_order_item` VALUES ('36', '1074', '5', '1', '1', '1', 'N/A', null, '2017-12-21 22:41:26', null);
INSERT INTO `customer_order_item` VALUES ('37', '1074', '5', '1', '1', '1', 'N/A', null, '2017-12-21 22:41:26', null);
INSERT INTO `customer_order_item` VALUES ('38', '1074', '3', '1', '1', '1', 'N/A', null, '2017-12-21 22:41:26', null);
INSERT INTO `customer_order_item` VALUES ('39', '1074', '1', '1', '1', '1', 'N/A', null, '2017-12-21 22:41:26', null);
INSERT INTO `customer_order_item` VALUES ('40', '1074', '4', '1', '1', '1', 'N/A', null, '2017-12-21 22:41:26', null);
INSERT INTO `customer_order_item` VALUES ('41', '1075', '3', '5', '1', '5', 'N/A', null, '2017-12-22 03:13:59', null);
INSERT INTO `customer_order_item` VALUES ('42', '1076', '5', '1', '1', '1', 'N/A', null, '2017-12-22 05:39:58', null);
INSERT INTO `customer_order_item` VALUES ('43', '1076', '5', '1', '1', '1', 'N/A', null, '2017-12-22 05:39:58', null);
INSERT INTO `customer_order_item` VALUES ('49', '1087', '4', '10', '1', '10', 'N/A', null, '2017-12-22 08:22:37', null);
INSERT INTO `customer_order_item` VALUES ('50', '1089', '10', '20', '1', '20', 'N/A', null, '2017-12-22 09:00:37', null);
INSERT INTO `customer_order_item` VALUES ('51', '1090', '10', '20', '1', '20', 'N/A', null, '2017-12-22 09:14:01', null);
INSERT INTO `customer_order_item` VALUES ('52', '1090', '10', '20', '1', '20', 'N/A', null, '2017-12-22 09:14:01', null);
INSERT INTO `customer_order_item` VALUES ('53', '1090', '9', '20', '1', '20', 'N/A', null, '2017-12-22 09:14:01', null);
INSERT INTO `customer_order_item` VALUES ('54', '1091', '11', '11', '1', '11', 'N/A', null, '2017-12-22 12:42:47', null);
INSERT INTO `customer_order_item` VALUES ('55', '1092', '11', '11', '1', '11', 'N/A', null, '2017-12-22 12:42:47', null);
INSERT INTO `customer_order_item` VALUES ('56', '1093', '10', '1', '15', '15', 'N/A', null, '2017-12-22 14:38:12', null);

-- ----------------------------
-- Table structure for db_cache
-- ----------------------------
DROP TABLE IF EXISTS `db_cache`;
CREATE TABLE `db_cache` (
  `id` char(128) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_cache
-- ----------------------------

-- ----------------------------
-- Table structure for kitchen
-- ----------------------------
DROP TABLE IF EXISTS `kitchen`;
CREATE TABLE `kitchen` (
  `KITCHEN_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `KITCHEN_NAME` varchar(100) NOT NULL,
  `CITY_ID` bigint(20) NOT NULL,
  `OPENING_TIME` time DEFAULT NULL,
  `CLOSING_TIME` time DEFAULT NULL,
  `ADDRESS` text,
  PRIMARY KEY (`KITCHEN_ID`),
  KEY `City_ID` (`CITY_ID`) USING BTREE,
  CONSTRAINT `kitchen_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`CITY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kitchen
-- ----------------------------
INSERT INTO `kitchen` VALUES ('1', 'Mogadishu', '1', '09:56:58', '23:57:03', null);
INSERT INTO `kitchen` VALUES ('2', 'Mombasa', '3', '18:23:43', '18:23:45', null);

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `LOCATION_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `LOCATION_NAME` varchar(255) NOT NULL,
  `ADDRESS` text,
  PRIMARY KEY (`LOCATION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', 'KISMAYU', null);

-- ----------------------------
-- Table structure for menu_category
-- ----------------------------
DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE `menu_category` (
  `MENU_CAT_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `MENU_CAT_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MENU_CAT_IMAGE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE` int(1) NOT NULL DEFAULT '1',
  `RANK` int(2) NOT NULL,
  PRIMARY KEY (`MENU_CAT_ID`),
  UNIQUE KEY `MENU_CAT_ID` (`MENU_CAT_ID`,`RANK`),
  UNIQUE KEY `MENU_CAT_NAME` (`MENU_CAT_NAME`),
  KEY `MENU_CAT_ID_2` (`MENU_CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_category
-- ----------------------------
INSERT INTO `menu_category` VALUES ('1', 'PIZZA', 'pizza.jpg', '1', '1');
INSERT INTO `menu_category` VALUES ('2', 'BURGERS', null, '0', '2');
INSERT INTO `menu_category` VALUES ('3', 'SALADS', null, '0', '3');
INSERT INTO `menu_category` VALUES ('4', 'SWEETS', null, '0', '6');
INSERT INTO `menu_category` VALUES ('5', 'SANDWICH', null, '0', '4');
INSERT INTO `menu_category` VALUES ('6', 'DRINKS', null, '1', '5');

-- ----------------------------
-- Table structure for menu_item
-- ----------------------------
DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE `menu_item` (
  `MENU_ITEM_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `MENU_CAT_ID` bigint(10) NOT NULL,
  `MENU_ITEM_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MENU_ITEM_DESC` text COLLATE utf8_unicode_ci NOT NULL,
  `MENU_ITEM_IMAGE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HOT_DEAL` bit(1) NOT NULL DEFAULT b'0',
  `VEGETARIAN` bit(1) NOT NULL DEFAULT b'0',
  `MAX_QTY` int(2) NOT NULL DEFAULT '10' COMMENT 'Show the maximum number of quantities one can select from',
  PRIMARY KEY (`MENU_ITEM_ID`),
  KEY `MENU_CAT_ID` (`MENU_CAT_ID`) USING BTREE,
  CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_item_ibfk_2` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES ('1', '1', 'Margherita', 'Crushed Tomatoes, Mozzarella, Grana, Basil', 'pizza1.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('2', '1', 'Hawaiian', 'pizza topped with tomato sauce, cheese, pineapple, and Canadian bacon or ham. Some versions may include peppers, mushrooms', 'pizza2.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('3', '1', 'Chicken Tikka Masala', 'cheesy pizza topped with delicious Indian chicken tikka masala', 'pizza3.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('4', '1', 'Supreme', 'Sausage, pepperoni, mushrooms, olives, peppers, and onion', 'pizza3.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('5', '6', 'Water', '', 'drink7.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('7', '6', 'orange juice', 'Freshly squezzed oramge juice', 'drink1.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('8', '6', 'cofee', '', 'drink4.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('9', '6', 'lemon juice', '', 'drink3.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('10', '6', 'tea', '', 'drink5.jpg', '\0', '\0', '10');

-- ----------------------------
-- Table structure for menu_item_type
-- ----------------------------
DROP TABLE IF EXISTS `menu_item_type`;
CREATE TABLE `menu_item_type` (
  `ITEM_TYPE_ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `MENU_ITEM_ID` bigint(11) NOT NULL,
  `ITEM_TYPE_SIZE` varchar(15) DEFAULT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `AVAILABLE` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ITEM_TYPE_ID`),
  KEY `MENU_ITEM_ID` (`MENU_ITEM_ID`) USING BTREE,
  KEY `ITEM_TYPE_SIZE` (`ITEM_TYPE_SIZE`),
  CONSTRAINT `menu_item_type_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON UPDATE CASCADE,
  CONSTRAINT `menu_item_type_ibfk_2` FOREIGN KEY (`ITEM_TYPE_SIZE`) REFERENCES `tb_sizes` (`SIZE_TYPE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_item_type
-- ----------------------------
INSERT INTO `menu_item_type` VALUES ('1', '1', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('2', '1', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('3', '2', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('4', '4', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('5', '3', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('6', '1', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('7', '2', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('8', '2', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('9', '3', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('10', '3', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('11', '4', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('12', '4', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('13', '5', '500ML', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('14', '7', 'SMALL', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('15', '8', 'SMALL', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('16', '9', 'SMALL', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('17', '10', 'SMALL', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('18', '5', '1LITRE', '2.00', '');

-- ----------------------------
-- Table structure for my_session
-- ----------------------------
DROP TABLE IF EXISTS `my_session`;
CREATE TABLE `my_session` (
  `id` char(60) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  `user_id` bigint(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `expire` (`expire`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of my_session
-- ----------------------------

-- ----------------------------
-- Table structure for order_tracking
-- ----------------------------
DROP TABLE IF EXISTS `order_tracking`;
CREATE TABLE `order_tracking` (
  `TRACKING_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `ORDER_ID` bigint(10) NOT NULL,
  `COMMENTS` varchar(255) DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL,
  `TRACKING_DATE` datetime DEFAULT NULL,
  `USER_VISIBLE` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`TRACKING_ID`),
  UNIQUE KEY `ORDER_ID` (`ORDER_ID`,`STATUS`) USING BTREE,
  KEY `STATUS` (`STATUS`) USING BTREE,
  KEY `order_tracking_ibfk_1` (`ORDER_ID`) USING BTREE,
  CONSTRAINT `order_tracking_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_tracking_ibfk_2` FOREIGN KEY (`STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_tracking
-- ----------------------------
INSERT INTO `order_tracking` VALUES ('141', '1051', null, 'ORDER PENDING', '2017-12-21 13:40:50', '');
INSERT INTO `order_tracking` VALUES ('142', '1052', null, 'ORDER PENDING', '2017-12-21 14:07:43', '');
INSERT INTO `order_tracking` VALUES ('143', '1053', null, 'ORDER PENDING', '2017-12-21 14:10:57', '');
INSERT INTO `order_tracking` VALUES ('144', '1054', null, 'ORDER PENDING', '2017-12-21 14:11:05', '');
INSERT INTO `order_tracking` VALUES ('145', '1055', null, 'ORDER PENDING', '2017-12-21 14:15:30', '');
INSERT INTO `order_tracking` VALUES ('146', '1056', null, 'ORDER PENDING', '2017-12-21 15:17:48', '');
INSERT INTO `order_tracking` VALUES ('147', '1057', null, 'ORDER PENDING', '2017-12-21 15:17:49', '');
INSERT INTO `order_tracking` VALUES ('148', '1058', null, 'ORDER PENDING', '2017-12-21 15:33:19', '');
INSERT INTO `order_tracking` VALUES ('149', '1059', null, 'ORDER PENDING', '2017-12-21 15:34:15', '');
INSERT INTO `order_tracking` VALUES ('150', '1060', null, 'ORDER PENDING', '2017-12-21 15:36:32', '');
INSERT INTO `order_tracking` VALUES ('152', '1061', null, 'ORDER PENDING', '2017-12-21 17:43:36', '');
INSERT INTO `order_tracking` VALUES ('153', '1062', null, 'ORDER PENDING', '2017-12-21 17:46:10', '');
INSERT INTO `order_tracking` VALUES ('154', '1063', null, 'ORDER PENDING', '2017-12-21 18:03:19', '');
INSERT INTO `order_tracking` VALUES ('155', '1064', null, 'ORDER PENDING', '2017-12-21 18:05:13', '');
INSERT INTO `order_tracking` VALUES ('156', '1065', null, 'ORDER PENDING', '2017-12-21 18:16:01', '');
INSERT INTO `order_tracking` VALUES ('157', '1066', null, 'ORDER PENDING', '2017-12-21 18:23:41', '');
INSERT INTO `order_tracking` VALUES ('158', '1067', null, 'ORDER PENDING', '2017-12-21 18:27:20', '');
INSERT INTO `order_tracking` VALUES ('159', '1068', null, 'ORDER PENDING', '2017-12-21 18:30:22', '');
INSERT INTO `order_tracking` VALUES ('160', '1069', null, 'ORDER PENDING', '2017-12-21 18:46:02', '');
INSERT INTO `order_tracking` VALUES ('161', '1070', null, 'ORDER PENDING', '2017-12-21 18:48:56', '');
INSERT INTO `order_tracking` VALUES ('162', '1071', null, 'ORDER PENDING', '2017-12-21 18:49:19', '');
INSERT INTO `order_tracking` VALUES ('163', '1072', null, 'ORDER PENDING', '2017-12-21 18:51:10', '');
INSERT INTO `order_tracking` VALUES ('164', '1073', null, 'ORDER PENDING', '2017-12-21 19:19:40', '');
INSERT INTO `order_tracking` VALUES ('165', '1074', null, 'ORDER PENDING', '2017-12-21 22:41:26', '');
INSERT INTO `order_tracking` VALUES ('166', '1075', null, 'ORDER PENDING', '2017-12-22 03:13:59', '');
INSERT INTO `order_tracking` VALUES ('167', '1076', null, 'ORDER PENDING', '2017-12-22 05:39:58', '');
INSERT INTO `order_tracking` VALUES ('178', '1087', null, 'ORDER PENDING', '2017-12-22 08:22:37', '');
INSERT INTO `order_tracking` VALUES ('179', '1088', null, 'ORDER PENDING', '2017-12-22 08:22:37', '');
INSERT INTO `order_tracking` VALUES ('180', '1089', null, 'ORDER PENDING', '2017-12-22 09:00:38', '');
INSERT INTO `order_tracking` VALUES ('181', '1090', null, 'ORDER PENDING', '2017-12-22 09:14:02', '');
INSERT INTO `order_tracking` VALUES ('182', '1091', null, 'ORDER PENDING', '2017-12-22 12:42:47', '');
INSERT INTO `order_tracking` VALUES ('183', '1092', null, 'ORDER PENDING', '2017-12-22 12:42:47', '');
INSERT INTO `order_tracking` VALUES ('184', '1093', null, 'ORDER PENDING', '2017-12-22 14:38:12', '');
INSERT INTO `order_tracking` VALUES ('185', '1094', null, 'ORDER PENDING', '2017-12-22 14:38:13', '');

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `PAYMENT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ORDER_ID` bigint(20) DEFAULT NULL,
  `PAYMENT_CHANNEL` varchar(255) NOT NULL,
  `PAYMENT_AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_REF` varchar(255) NOT NULL,
  `PAYMENT_STATUS` varchar(30) DEFAULT NULL,
  `PAYMENT_DATE` datetime NOT NULL,
  `PAYMENT_NOTES` varchar(255) DEFAULT NULL,
  `PAYMENT_NUMBER` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`PAYMENT_ID`),
  KEY `payment_ibfk_1` (`PAYMENT_STATUS`) USING BTREE,
  KEY `payment_ibfk_2` (`ORDER_ID`) USING BTREE,
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`PAYMENT_STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for riders
-- ----------------------------
DROP TABLE IF EXISTS `riders`;
CREATE TABLE `riders` (
  `RIDER_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(10) DEFAULT NULL,
  `KITCHEN_ID` bigint(10) DEFAULT NULL,
  `RIDER_STATUS` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`RIDER_ID`),
  KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE,
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riders_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riders
-- ----------------------------
INSERT INTO `riders` VALUES ('1', '12', '1', '');
INSERT INTO `riders` VALUES ('2', '12', '2', '');
INSERT INTO `riders` VALUES ('3', '12', '1', '');
INSERT INTO `riders` VALUES ('4', '12', '2', '');

-- ----------------------------
-- Table structure for tb_cart
-- ----------------------------
DROP TABLE IF EXISTS `tb_cart`;
CREATE TABLE `tb_cart` (
  `CART_ITEM_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) NOT NULL,
  `ITEM_TYPE_ID` bigint(10) NOT NULL,
  `QUANTITY` int(4) NOT NULL,
  `ITEM_PRICE` decimal(10,0) NOT NULL,
  `ITEM_TYPE_SIZE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `CART_TIMESTAMP` bigint(20) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`CART_ITEM_ID`),
  KEY `order_item_ibfk_2` (`ITEM_TYPE_ID`) USING BTREE,
  KEY `USER_ID` (`USER_ID`) USING BTREE,
  CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`ITEM_TYPE_ID`) REFERENCES `menu_item_type` (`ITEM_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_cart_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_cart
-- ----------------------------
INSERT INTO `tb_cart` VALUES ('2', '24', '1', '1', '1200', 'LARGE', '1513775598', '2017-12-20 13:13:18', '2017-12-21 07:34:07');
INSERT INTO `tb_cart` VALUES ('5', '24', '4', '1', '300', 'LARGE', '1513775598', '2017-12-21 07:34:13', '2017-12-21 07:34:13');
INSERT INTO `tb_cart` VALUES ('60', '5', '5', '9', '1', 'MEDIUM', '1513931061', '2017-12-22 08:24:21', '2017-12-22 12:19:04');
INSERT INTO `tb_cart` VALUES ('61', '5', '5', '1', '1', 'MEDIUM', '1513931061', '2017-12-22 08:24:28', '2017-12-22 08:24:28');
INSERT INTO `tb_cart` VALUES ('62', '5', '5', '1', '1', 'MEDIUM', '1513931061', '2017-12-22 08:24:28', '2017-12-22 08:24:28');
INSERT INTO `tb_cart` VALUES ('63', '10', '3', '20', '1', 'MEDIUM', '1513931956', '2017-12-22 08:39:16', '2017-12-22 08:39:16');

-- ----------------------------
-- Table structure for tb_favs
-- ----------------------------
DROP TABLE IF EXISTS `tb_favs`;
CREATE TABLE `tb_favs` (
  `FAV_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MENU_ITEM_ID` bigint(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`FAV_ID`),
  KEY `MENU_ITEM_ID` (`MENU_ITEM_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `tb_favs_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_favs_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_favs
-- ----------------------------

-- ----------------------------
-- Table structure for tb_migration
-- ----------------------------
DROP TABLE IF EXISTS `tb_migration`;
CREATE TABLE `tb_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_migration
-- ----------------------------
INSERT INTO `tb_migration` VALUES ('m000000_000000_base', '1510298356');
INSERT INTO `tb_migration` VALUES ('m160516_095943_init', '1510298358');

-- ----------------------------
-- Table structure for tb_sizes
-- ----------------------------
DROP TABLE IF EXISTS `tb_sizes`;
CREATE TABLE `tb_sizes` (
  `SIZED_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `SIZE_TYPE` varchar(20) NOT NULL,
  `ACTIVE` bit(1) DEFAULT b'1',
  PRIMARY KEY (`SIZED_ID`),
  UNIQUE KEY `SIZE_NAME` (`SIZE_TYPE`),
  KEY `SIZED_ID` (`SIZED_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sizes
-- ----------------------------
INSERT INTO `tb_sizes` VALUES ('1', 'SMALL', 1);
INSERT INTO `tb_sizes` VALUES ('2', 'MEDIUM', 1);
INSERT INTO `tb_sizes` VALUES ('3', 'LARGE', 1);
INSERT INTO `tb_sizes` VALUES ('4', '500ML', 1);
INSERT INTO `tb_sizes` VALUES ('5', '1LITRE', 1);

-- ----------------------------
-- Table structure for tb_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `STATUS_NAME` varchar(30) NOT NULL,
  `STATUS_DESC` varchar(100) DEFAULT NULL,
  `COLOR` varchar(10) NOT NULL DEFAULT 'GREEN',
  `SCOPE` varchar(10) NOT NULL DEFAULT 'ALL',
  `RANK` int(2) NOT NULL DEFAULT '1',
  `WORKFLOW` int(2) NOT NULL DEFAULT '1',
  UNIQUE KEY `STATUS_NAME` (`STATUS_NAME`) USING BTREE,
  UNIQUE KEY `RANK` (`RANK`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_status
-- ----------------------------
INSERT INTO `tb_status` VALUES ('AWAITING RIDER', 'Awaiting Rider', 'BROWN', 'INACTIVE', '7', '3');
INSERT INTO `tb_status` VALUES ('CHEF ASSIGNED', 'Assign Chef', 'GREEN', 'INACTIVE', '4', '0');
INSERT INTO `tb_status` VALUES ('KITCHEN ALLOCATED', 'Transfer to Kitchen', 'GREEN', 'OFFICE', '3', '1');
INSERT INTO `tb_status` VALUES ('ORDER CANCELLED', 'Cancel Order', 'RED', 'ALL', '0', '0');
INSERT INTO `tb_status` VALUES ('ORDER CONFIRMED', 'Confirm Order', 'PURPLE', 'OFFICE', '2', '0');
INSERT INTO `tb_status` VALUES ('ORDER DELIVERED', 'Order Delieverd', 'RED', 'RIDER', '10', '0');
INSERT INTO `tb_status` VALUES ('ORDER PENDING', 'Awaiting Processing', '#ff69b4', 'ALL', '1', '0');
INSERT INTO `tb_status` VALUES ('ORDER READY', 'Order Ready', 'GREEN', 'KITCHEN', '6', '2');
INSERT INTO `tb_status` VALUES ('PAYMENT PENDING', 'Payment Not Confirmed', 'GREEN', 'OFFICE', '11', '2');
INSERT INTO `tb_status` VALUES ('RIDER ASSIGNED', 'Assign Rider', 'GREEN', 'INACTIVE', '8', '4');
INSERT INTO `tb_status` VALUES ('RIDER DISPATCHED', 'Assign & Dispatch Rider', 'GREEN', 'KITCHEN', '9', '5');
INSERT INTO `tb_status` VALUES ('UNDER PREPARATION', 'Preparing Order', 'ORANGE', 'KITCHEN', '5', '1');

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `USER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(100) NOT NULL,
  `USER_TYPE` bigint(20) NOT NULL,
  `SURNAME` varchar(100) NOT NULL,
  `OTHER_NAMES` varchar(100) NOT NULL,
  `MOBILE` int(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `LOCATION_ID` bigint(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DATE_REGISTERED` datetime DEFAULT NULL,
  `LAST_UPDATED` datetime DEFAULT NULL,
  `CLIENT_TOKEN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `LOCATION_ID_idx` (`LOCATION_ID`) USING BTREE,
  KEY `USER_TYPE_idx` (`USER_TYPE`) USING BTREE,
  CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  CONSTRAINT `tb_users_ibfk_2` FOREIGN KEY (`USER_TYPE`) REFERENCES `user_type` (`USER_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('5', 'pkyalo', '1', 'kingoo', 'Peter Kyalo', '724802220', 'petchaloo@gmail.com', '1', '834dfae0c40820faccf4f83580be800545dca3c1', null, null, null);
INSERT INTO `tb_users` VALUES ('10', 'fatelord', '1', 'BARASA', 'SAMMY M', '1123', 'barsamms@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-10-09 07:06:51', '2017-10-09 07:06:51', null);
INSERT INTO `tb_users` VALUES ('11', 'admin', '2', 'admin', 'admin', '123', 'admin@slice.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-11-10 13:11:43', '2017-11-10 13:11:49', null);
INSERT INTO `tb_users` VALUES ('12', 'rider', '3', 'Saber', 'Rider', '1123', 'rider@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-10-09 07:06:51', '2017-10-09 07:06:51', '');
INSERT INTO `tb_users` VALUES ('24', 'kyalo', '1', 'kingoo', 'Peter kyalo', '2147483647', 'pkyalo@uonbi.ac.ke', '1', '834dfae0c40820faccf4f83580be800545dca3c1', '2017-12-20 12:38:11', '2017-12-20 12:38:11', null);
INSERT INTO `tb_users` VALUES ('25', 'mohacpr', '1', 'Mohamed', 'Mohamed', '619000333', 'mohacpr@gmail.com', '1', '2d7d1969f957c467cfb161b81ff408af6b94a8ea', '2017-12-20 19:39:38', '2017-12-20 19:39:38', null);
INSERT INTO `tb_users` VALUES ('29', 'Shumac', '1', 'Shumac', 'Shushuu', '2147483647', 'shumac55@gmail.com', '1', '513a7c4018127c653ce3b9037e29bdd9c03e29f7', '2017-12-21 13:50:19', '2017-12-21 13:50:19', null);
INSERT INTO `tb_users` VALUES ('37', 'Aw-ali', '1', 'Kadar', 'Mohamed', '615417477', 'kadarfeyore1@gmail.com', '1', 'ae62e53fb3b2afe899a5dbd09cad2eac8a2487f1', '2017-12-21 15:46:08', '2017-12-21 15:46:08', null);
INSERT INTO `tb_users` VALUES ('44', 'Abdikasim', '1', 'Moalim', 'Ahmed', '617999222', 'abdulkasimmoalim@gmail.com', '1', 'b82886f310d6c223dea476600babca5849670e21', '2017-12-21 17:27:14', '2017-12-21 17:27:14', null);
INSERT INTO `tb_users` VALUES ('45', 'Sandheere', '1', 'Mohamed', 'Sandheere', '2147483647', 'sanka6016@gmail.com', '1', '890940a175fdd194c3f42a27e8ecbfefb983094d', '2017-12-21 17:48:20', '2017-12-21 17:48:20', null);
INSERT INTO `tb_users` VALUES ('46', 'Sandheere10', '1', 'Mohamed', 'Sandheere', '2147483647', 'sanka6015@gmail.com', '1', '8238a351f035bc1f72a1a7cff337221a73dae6f2', '2017-12-21 18:02:10', '2017-12-21 18:02:10', null);
INSERT INTO `tb_users` VALUES ('47', 'Mr. Vision', '1', 'Yasir', 'Baffo', '618309457', 'mr.vision2025@gmail.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-12-21 18:32:22', '2017-12-21 18:32:22', null);

-- ----------------------------
-- Table structure for user_type
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `USER_TYPE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_TYPE_NAME` varchar(255) NOT NULL,
  PRIMARY KEY (`USER_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'CUSTOMER');
INSERT INTO `user_type` VALUES ('2', 'ADMIN');
INSERT INTO `user_type` VALUES ('3', 'RIDER');

-- ----------------------------
-- View structure for vw_orders
-- ----------------------------
DROP VIEW IF EXISTS `vw_orders`;
CREATE VIEW `vw_orders` AS select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order`.`USER_ID` AS `USER_ID`,`customer_order`.`KITCHEN_ID` AS `KITCHEN_ID`,`customer_order`.`CHEF_ID` AS `CHEF_ID`,`customer_order`.`RIDER_ID` AS `RIDER_ID`,`tb_users`.`MOBILE` AS `MOBILE`,`tb_users`.`SURNAME` AS `SURNAME`,`tb_users`.`OTHER_NAMES` AS `OTHER_NAMES`,`customer_order`.`ORDER_DATE` AS `ORDER_DATE`,`customer_order`.`ORDER_STATUS` AS `ORDER_STATUS`,`payment`.`PAYMENT_AMOUNT` AS `PAYMENT_AMOUNT`,`payment`.`PAYMENT_NUMBER` AS `PAYMENT_NUMBER`,`customer_order`.`NOTES` AS `NOTES`,`customer_address`.`ADDRESS_ID` AS `ADDRESS_ID`,`customer_order`.`PAYMENT_METHOD` AS `PAYMENT_METHOD`,`customer_order`.`CREATED_AT` AS `CREATED_AT`,`customer_order`.`UPDATED_AT` AS `UPDATED_AT`,`payment`.`PAYMENT_DATE` AS `PAYMENT_DATE` from (((`customer_order` join `tb_users` on((`customer_order`.`USER_ID` = `tb_users`.`USER_ID`))) join `customer_address` on((`customer_order`.`ADDRESS_ID` = `customer_address`.`ADDRESS_ID`))) join `payment` on((`payment`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) ;
