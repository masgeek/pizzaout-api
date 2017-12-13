/*
Navicat MySQL Data Transfer

Source Server         : D_MYSQL Local
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : tsobucok_pizza

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-13 16:08:46
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
INSERT INTO `customer_address` VALUES ('2', '10', '1', 'kismayu');

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
) ENGINE=InnoDB AUTO_INCREMENT=1032 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_order
-- ----------------------------
INSERT INTO `customer_order` VALUES ('1031', '10', '1', null, null, null, '2017-12-13 12:37:05', 'VISA', 'ORDER CONFIRMED', null, '2017-12-13 12:37:05', '2017-12-13 12:37:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_order_item
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
INSERT INTO `location` VALUES ('1', 'kismayu', null);

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
INSERT INTO `menu_category` VALUES ('6', 'DRINKS', null, '0', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES ('1', '1', 'Margherita', 'Crushed Tomatoes, Mozzarella, Grana, Basil', '1.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('2', '1', 'Hawaiian', 'pizza topped with tomato sauce, cheese, pineapple, and Canadian bacon or ham. Some versions may include peppers, mushrooms', '3.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('3', '1', 'Chicken Tikka Masala', 'cheesy pizza topped with delicious Indian chicken tikka masala', '4.jpg', '\0', '\0', '10');
INSERT INTO `menu_item` VALUES ('4', '1', 'Supreme', 'Sausage, pepperoni, mushrooms, olives, peppers, and onion', '5.jpg', '\0', '\0', '10');

-- ----------------------------
-- Table structure for menu_item_type
-- ----------------------------
DROP TABLE IF EXISTS `menu_item_type`;
CREATE TABLE `menu_item_type` (
  `ITEM_TYPE_ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `MENU_ITEM_ID` bigint(11) NOT NULL,
  `ITEM_TYPE_SIZE` varchar(15) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `AVAILABLE` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ITEM_TYPE_ID`),
  KEY `MENU_ITEM_ID` (`MENU_ITEM_ID`) USING BTREE,
  CONSTRAINT `menu_item_type_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_item_type
-- ----------------------------
INSERT INTO `menu_item_type` VALUES ('1', '1', 'LARGE', '1200.00', '');
INSERT INTO `menu_item_type` VALUES ('2', '1', 'SMALL', '500.00', '');
INSERT INTO `menu_item_type` VALUES ('3', '2', 'MEDIUM', '700.00', '');
INSERT INTO `menu_item_type` VALUES ('4', '4', 'LARGE', '300.00', '');
INSERT INTO `menu_item_type` VALUES ('5', '3', 'MEDIUM', '350.00', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_tracking
-- ----------------------------
INSERT INTO `order_tracking` VALUES ('113', '1031', null, 'ORDER CONFIRMED', '2017-12-13 12:37:05', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('30', '1031', 'VISA', '700.00', '1513168290', 'ORDER CONFIRMED', '2017-12-13 12:37:05', 'd8074d25-7ea4-0f23-5f6e-faf5b561a632', 'VISA');

-- ----------------------------
-- Table structure for riders
-- ----------------------------
DROP TABLE IF EXISTS `riders`;
CREATE TABLE `riders` (
  `RIDER_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `KITCHEN_ID` bigint(10) DEFAULT NULL,
  `RIDER_NAME` varchar(100) NOT NULL,
  `RIDER_MOBILE` varchar(255) DEFAULT NULL,
  `RIDER_STATUS` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`RIDER_ID`),
  KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE,
  CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riders
-- ----------------------------
INSERT INTO `riders` VALUES ('1', '1', 'Yusuf', '56765', '');
INSERT INTO `riders` VALUES ('2', '2', 'Khaleed', '6786786', '');
INSERT INTO `riders` VALUES ('3', '1', 'Ismael', '34534', '');
INSERT INTO `riders` VALUES ('4', '2', 'Latif', '78958', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_cart
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('5', 'pkyalo', '1', 'kingoo', 'Peter Kyalo', '724802220', 'petchaloo@gmail.com', '1', '834dfae0c40820faccf4f83580be800545dca3c1', null, null, null);
INSERT INTO `tb_users` VALUES ('10', 'fatelord', '1', 'BARASA', 'SAMMY M', '1123', 'barsamms@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-10-09 07:06:51', '2017-10-09 07:06:51', null);
INSERT INTO `tb_users` VALUES ('11', 'admin', '2', 'admin', 'admin', '123', 'admin@slice.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-11-10 13:11:43', '2017-11-10 13:11:49', null);

-- ----------------------------
-- Table structure for user_type
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `USER_TYPE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_TYPE_NAME` varchar(255) NOT NULL,
  PRIMARY KEY (`USER_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'CUSTOMER');
INSERT INTO `user_type` VALUES ('2', 'ADMIN');

-- ----------------------------
-- View structure for vw_orders
-- ----------------------------
DROP VIEW IF EXISTS `vw_orders`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders` AS select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order`.`USER_ID` AS `USER_ID`,`customer_order`.`KITCHEN_ID` AS `KITCHEN_ID`,`customer_order`.`CHEF_ID` AS `CHEF_ID`,`customer_order`.`RIDER_ID` AS `RIDER_ID`,`tb_users`.`MOBILE` AS `MOBILE`,`tb_users`.`SURNAME` AS `SURNAME`,`tb_users`.`OTHER_NAMES` AS `OTHER_NAMES`,`customer_order`.`ORDER_DATE` AS `ORDER_DATE`,`customer_order`.`ORDER_STATUS` AS `ORDER_STATUS`,`payment`.`PAYMENT_AMOUNT` AS `PAYMENT_AMOUNT`,`payment`.`PAYMENT_NUMBER` AS `PAYMENT_NUMBER`,`customer_order`.`NOTES` AS `NOTES`,`customer_address`.`ADDRESS_ID` AS `ADDRESS_ID`,`customer_order`.`PAYMENT_METHOD` AS `PAYMENT_METHOD`,`customer_order`.`CREATED_AT` AS `CREATED_AT`,`customer_order`.`UPDATED_AT` AS `UPDATED_AT`,`payment`.`PAYMENT_DATE` AS `PAYMENT_DATE` from (((`customer_order` join `tb_users` on((`customer_order`.`USER_ID` = `tb_users`.`USER_ID`))) join `customer_address` on((`customer_order`.`ADDRESS_ID` = `customer_address`.`ADDRESS_ID`))) join `payment` on((`payment`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) ;
