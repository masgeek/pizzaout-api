/*
Navicat MariaDB Data Transfer

Source Server         : MARIA
Source Server Version : 100211
Source Host           : localhost:3306
Source Database       : tsobucok_pizza

Target Server Type    : MariaDB
Target Server Version : 100211
File Encoding         : 65001

Date: 2017-12-31 13:55:27
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
INSERT INTO `city` VALUES ('1', 'MOGADISHU', '2');
INSERT INTO `city` VALUES ('3', 'MOMBASA', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_address
-- ----------------------------
INSERT INTO `customer_address` VALUES ('1', '5', '1', 'KISMAYU');
INSERT INTO `customer_address` VALUES ('2', '10', '1', 'KISMAYU');
INSERT INTO `customer_address` VALUES ('3', '25', '1', 'makka al mukarama road ');
INSERT INTO `customer_address` VALUES ('4', '5', '1', 'Mogadishu');
INSERT INTO `customer_address` VALUES ('5', '10', '2', 'Sammy Address');
INSERT INTO `customer_address` VALUES ('6', '10', '1', 'test me');
INSERT INTO `customer_address` VALUES ('7', '10', '4', 'NHC Nairobi West\n\nlock F3');
INSERT INTO `customer_address` VALUES ('8', '10', '3', 'testing new address addition\n\nthat is multiline too');
INSERT INTO `customer_address` VALUES ('9', '5', '1', 'kilonge street');

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
) ENGINE=InnoDB AUTO_INCREMENT=1191 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_order
-- ----------------------------
INSERT INTO `customer_order` VALUES ('1051', '25', '1', null, null, null, '2017-12-21 13:40:50', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 13:40:50', '2017-12-21 13:40:50');
INSERT INTO `customer_order` VALUES ('1052', '25', '1', null, null, null, '2017-12-21 14:07:43', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 14:07:43', '2017-12-21 14:07:43');
INSERT INTO `customer_order` VALUES ('1053', '25', '1', null, null, null, '2017-12-21 14:10:57', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 14:10:57', '2017-12-21 14:10:57');
INSERT INTO `customer_order` VALUES ('1054', '25', '1', null, null, null, '2017-12-21 14:11:05', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 14:11:05', '2017-12-21 14:11:05');
INSERT INTO `customer_order` VALUES ('1055', '25', '1', null, null, null, '2017-12-21 14:15:30', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 14:15:30', '2017-12-21 14:15:30');
INSERT INTO `customer_order` VALUES ('1056', '25', '1', null, null, null, '2017-12-21 15:17:48', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 15:17:48', '2017-12-21 15:17:48');
INSERT INTO `customer_order` VALUES ('1057', '25', '1', null, null, null, '2017-12-21 15:17:49', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 15:17:49', '2017-12-21 15:17:49');
INSERT INTO `customer_order` VALUES ('1058', '25', '1', null, null, null, '2017-12-21 15:33:19', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 15:33:19', '2017-12-21 15:33:19');
INSERT INTO `customer_order` VALUES ('1059', '25', '1', null, null, null, '2017-12-21 15:34:15', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 15:34:15', '2017-12-21 15:34:15');
INSERT INTO `customer_order` VALUES ('1060', '25', '1', null, null, null, '2017-12-21 15:36:32', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 15:36:32', '2017-12-21 15:36:32');
INSERT INTO `customer_order` VALUES ('1061', '25', '1', null, null, null, '2017-12-21 17:43:36', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 17:43:36', '2017-12-21 17:43:36');
INSERT INTO `customer_order` VALUES ('1062', '25', '1', null, null, null, '2017-12-21 17:46:10', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 17:46:10', '2017-12-21 17:46:10');
INSERT INTO `customer_order` VALUES ('1063', '25', '1', null, null, null, '2017-12-21 18:03:18', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:03:19', '2017-12-21 18:03:19');
INSERT INTO `customer_order` VALUES ('1064', '46', '1', null, null, null, '2017-12-21 18:05:13', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:05:13', '2017-12-21 18:05:13');
INSERT INTO `customer_order` VALUES ('1065', '46', '1', null, null, null, '2017-12-21 18:16:00', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:16:00', '2017-12-21 18:16:00');
INSERT INTO `customer_order` VALUES ('1066', '46', '1', null, null, null, '2017-12-21 18:23:41', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:23:41', '2017-12-21 18:23:41');
INSERT INTO `customer_order` VALUES ('1067', '46', '1', null, null, null, '2017-12-21 18:27:20', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:27:20', '2017-12-21 18:27:20');
INSERT INTO `customer_order` VALUES ('1068', '46', '1', null, null, null, '2017-12-21 18:30:22', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:30:22', '2017-12-21 18:30:22');
INSERT INTO `customer_order` VALUES ('1069', '25', '1', null, null, null, '2017-12-21 18:46:02', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:46:02', '2017-12-21 18:46:02');
INSERT INTO `customer_order` VALUES ('1070', '25', '1', null, null, null, '2017-12-21 18:48:56', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:48:56', '2017-12-21 18:48:56');
INSERT INTO `customer_order` VALUES ('1071', '25', '1', null, null, null, '2017-12-21 18:49:19', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:49:19', '2017-12-21 18:49:19');
INSERT INTO `customer_order` VALUES ('1072', '25', '1', null, null, null, '2017-12-21 18:51:10', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 18:51:10', '2017-12-21 18:51:10');
INSERT INTO `customer_order` VALUES ('1073', '37', '1', null, null, null, '2017-12-21 19:19:39', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 19:19:40', '2017-12-21 19:19:40');
INSERT INTO `customer_order` VALUES ('1074', '25', '1', null, null, null, '2017-12-21 22:41:26', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-21 22:41:26', '2017-12-21 22:41:26');
INSERT INTO `customer_order` VALUES ('1075', '25', '1', null, null, null, '2017-12-22 03:13:59', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 03:13:59', '2017-12-22 03:13:59');
INSERT INTO `customer_order` VALUES ('1076', '25', '1', null, null, null, '2017-12-22 05:39:58', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 05:39:58', '2017-12-22 05:39:58');
INSERT INTO `customer_order` VALUES ('1087', '25', '1', null, null, null, '2017-12-22 08:22:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 08:22:37', '2017-12-22 08:22:37');
INSERT INTO `customer_order` VALUES ('1088', '25', '1', null, null, null, '2017-12-22 08:22:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 08:22:37', '2017-12-22 08:22:37');
INSERT INTO `customer_order` VALUES ('1089', '25', '1', null, null, null, '2017-12-22 09:00:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 09:00:38', '2017-12-22 09:00:38');
INSERT INTO `customer_order` VALUES ('1090', '25', '1', null, null, null, '2017-12-22 09:14:01', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 09:14:02', '2017-12-22 09:14:02');
INSERT INTO `customer_order` VALUES ('1091', '25', '1', null, null, null, '2017-12-22 12:42:47', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 12:42:47', '2017-12-22 12:42:47');
INSERT INTO `customer_order` VALUES ('1092', '25', '1', null, null, null, '2017-12-22 12:42:47', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 12:42:47', '2017-12-22 12:42:47');
INSERT INTO `customer_order` VALUES ('1093', '25', '1', null, null, null, '2017-12-22 14:38:12', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 14:38:12', '2017-12-22 14:38:12');
INSERT INTO `customer_order` VALUES ('1094', '25', '1', null, null, null, '2017-12-22 14:38:12', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 14:38:13', '2017-12-22 14:38:13');
INSERT INTO `customer_order` VALUES ('1095', '25', '1', null, null, null, '2017-12-22 16:13:46', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 16:13:46', '2017-12-22 16:13:46');
INSERT INTO `customer_order` VALUES ('1099', '46', '1', null, null, null, '2017-12-22 16:53:32', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 16:53:32', '2017-12-22 16:53:32');
INSERT INTO `customer_order` VALUES ('1100', '46', '1', null, null, null, '2017-12-22 16:53:32', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 16:53:32', '2017-12-22 16:53:32');
INSERT INTO `customer_order` VALUES ('1102', '5', '1', null, null, null, '2017-12-22 17:33:56', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-22 17:33:56', '2017-12-22 17:33:56');
INSERT INTO `customer_order` VALUES ('1103', '25', '1', null, null, null, '2017-12-23 02:18:54', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-23 02:18:54', '2017-12-23 02:18:54');
INSERT INTO `customer_order` VALUES ('1104', '25', '1', null, null, null, '2017-12-23 02:18:55', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-23 02:18:55', '2017-12-23 02:18:55');
INSERT INTO `customer_order` VALUES ('1105', '48', '1', null, null, null, '2017-12-23 07:10:29', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-23 07:10:29', '2017-12-23 07:10:29');
INSERT INTO `customer_order` VALUES ('1106', '48', '1', null, null, null, '2017-12-23 07:10:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-23 07:10:37', '2017-12-23 07:10:37');
INSERT INTO `customer_order` VALUES ('1107', '25', '1', null, null, null, '2017-12-23 10:58:55', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-23 10:58:55', '2017-12-23 10:58:55');
INSERT INTO `customer_order` VALUES ('1109', '25', '1', null, null, null, '2017-12-24 13:34:40', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 13:34:41', '2017-12-24 13:34:41');
INSERT INTO `customer_order` VALUES ('1110', '25', '1', null, null, null, '2017-12-24 13:36:43', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 13:36:43', '2017-12-24 13:36:43');
INSERT INTO `customer_order` VALUES ('1111', '25', '1', null, null, null, '2017-12-24 13:38:49', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 13:38:49', '2017-12-24 13:38:49');
INSERT INTO `customer_order` VALUES ('1112', '50', '1', null, null, null, '2017-12-24 15:24:36', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 15:24:37', '2017-12-24 15:24:37');
INSERT INTO `customer_order` VALUES ('1113', '25', '1', null, null, null, '2017-12-24 17:25:38', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 17:25:38', '2017-12-24 17:25:38');
INSERT INTO `customer_order` VALUES ('1114', '25', '1', null, null, null, '2017-12-24 19:49:26', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:49:26', '2017-12-24 19:49:26');
INSERT INTO `customer_order` VALUES ('1115', '25', '1', null, null, null, '2017-12-24 19:49:45', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:49:45', '2017-12-24 19:49:45');
INSERT INTO `customer_order` VALUES ('1116', '25', '1', null, null, null, '2017-12-24 19:49:49', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:49:49', '2017-12-24 19:49:49');
INSERT INTO `customer_order` VALUES ('1117', '25', '1', null, null, null, '2017-12-24 19:49:52', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:49:52', '2017-12-24 19:49:52');
INSERT INTO `customer_order` VALUES ('1118', '25', '1', null, null, null, '2017-12-24 19:50:09', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:09', '2017-12-24 19:50:09');
INSERT INTO `customer_order` VALUES ('1119', '25', '1', null, null, null, '2017-12-24 19:50:18', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:18', '2017-12-24 19:50:18');
INSERT INTO `customer_order` VALUES ('1120', '25', '1', null, null, null, '2017-12-24 19:50:20', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:20', '2017-12-24 19:50:20');
INSERT INTO `customer_order` VALUES ('1121', '25', '1', null, null, null, '2017-12-24 19:50:22', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:22', '2017-12-24 19:50:22');
INSERT INTO `customer_order` VALUES ('1122', '25', '1', null, null, null, '2017-12-24 19:50:23', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:23', '2017-12-24 19:50:23');
INSERT INTO `customer_order` VALUES ('1123', '25', '1', null, null, null, '2017-12-24 19:50:46', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-24 19:50:46', '2017-12-24 19:50:46');
INSERT INTO `customer_order` VALUES ('1124', '25', '1', null, null, null, '2017-12-25 07:23:43', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 07:23:43', '2017-12-25 07:23:43');
INSERT INTO `customer_order` VALUES ('1125', '25', '1', null, null, null, '2017-12-25 07:23:49', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 07:23:49', '2017-12-25 07:23:49');
INSERT INTO `customer_order` VALUES ('1126', '25', '1', null, null, null, '2017-12-25 07:24:50', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 07:24:50', '2017-12-25 07:24:50');
INSERT INTO `customer_order` VALUES ('1127', '51', '1', null, null, null, '2017-12-25 10:10:54', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 10:10:54', '2017-12-25 10:10:54');
INSERT INTO `customer_order` VALUES ('1128', '25', '1', null, null, null, '2017-12-25 10:18:52', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 10:18:52', '2017-12-25 10:18:52');
INSERT INTO `customer_order` VALUES ('1130', '46', '1', null, null, null, '2017-12-25 13:26:55', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 13:26:55', '2017-12-25 13:26:55');
INSERT INTO `customer_order` VALUES ('1131', '25', '1', null, null, null, '2017-12-25 15:52:28', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 15:52:28', '2017-12-25 15:52:28');
INSERT INTO `customer_order` VALUES ('1132', '46', '1', null, null, null, '2017-12-25 16:36:56', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-25 16:36:56', '2017-12-25 16:36:56');
INSERT INTO `customer_order` VALUES ('1133', '25', '1', null, null, null, '2017-12-26 02:28:52', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 02:28:53', '2017-12-26 02:28:53');
INSERT INTO `customer_order` VALUES ('1134', '52', '1', null, null, null, '2017-12-26 04:18:09', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 04:18:09', '2017-12-26 04:18:09');
INSERT INTO `customer_order` VALUES ('1135', '47', '1', null, null, null, '2017-12-26 10:39:48', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 10:39:48', '2017-12-26 10:39:48');
INSERT INTO `customer_order` VALUES ('1136', '37', '1', null, null, null, '2017-12-26 10:52:08', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 10:52:08', '2017-12-26 10:52:08');
INSERT INTO `customer_order` VALUES ('1137', '37', '1', null, null, null, '2017-12-26 10:54:25', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 10:54:25', '2017-12-26 10:54:25');
INSERT INTO `customer_order` VALUES ('1138', '37', '1', null, null, null, '2017-12-26 16:51:23', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 16:51:23', '2017-12-26 16:51:23');
INSERT INTO `customer_order` VALUES ('1139', '53', '1', null, null, null, '2017-12-26 16:51:31', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 16:51:31', '2017-12-26 16:51:31');
INSERT INTO `customer_order` VALUES ('1140', '47', '1', null, null, null, '2017-12-26 17:26:05', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 17:26:05', '2017-12-26 17:26:05');
INSERT INTO `customer_order` VALUES ('1141', '29', '1', null, null, null, '2017-12-26 18:15:54', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-26 18:15:54', '2017-12-26 18:15:54');
INSERT INTO `customer_order` VALUES ('1142', '25', '1', null, null, null, '2017-12-27 07:15:10', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 07:15:10', '2017-12-27 07:15:10');
INSERT INTO `customer_order` VALUES ('1143', '54', '1', null, null, null, '2017-12-27 09:16:21', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 09:16:21', '2017-12-27 09:16:21');
INSERT INTO `customer_order` VALUES ('1144', '46', '1', null, null, null, '2017-12-27 11:24:38', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 11:24:38', '2017-12-27 11:24:38');
INSERT INTO `customer_order` VALUES ('1145', '54', '1', null, null, null, '2017-12-27 12:32:23', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 12:32:23', '2017-12-27 12:32:23');
INSERT INTO `customer_order` VALUES ('1146', '54', '1', null, null, null, '2017-12-27 12:32:29', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 12:32:29', '2017-12-27 12:32:29');
INSERT INTO `customer_order` VALUES ('1147', '25', '1', null, null, null, '2017-12-27 16:25:03', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:03', '2017-12-27 16:25:03');
INSERT INTO `customer_order` VALUES ('1148', '25', '1', null, null, null, '2017-12-27 16:25:07', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:07', '2017-12-27 16:25:07');
INSERT INTO `customer_order` VALUES ('1149', '25', '1', null, null, null, '2017-12-27 16:25:11', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:11', '2017-12-27 16:25:11');
INSERT INTO `customer_order` VALUES ('1150', '25', '1', null, null, null, '2017-12-27 16:25:16', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:16', '2017-12-27 16:25:16');
INSERT INTO `customer_order` VALUES ('1151', '25', '1', null, null, null, '2017-12-27 16:25:19', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:19', '2017-12-27 16:25:19');
INSERT INTO `customer_order` VALUES ('1152', '25', '1', null, null, null, '2017-12-27 16:25:21', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:21', '2017-12-27 16:25:21');
INSERT INTO `customer_order` VALUES ('1153', '25', '1', null, null, null, '2017-12-27 16:25:28', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:28', '2017-12-27 16:25:28');
INSERT INTO `customer_order` VALUES ('1154', '25', '1', null, null, null, '2017-12-27 16:25:34', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:34', '2017-12-27 16:25:34');
INSERT INTO `customer_order` VALUES ('1155', '25', '1', null, null, null, '2017-12-27 16:25:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:37', '2017-12-27 16:25:37');
INSERT INTO `customer_order` VALUES ('1156', '25', '1', null, null, null, '2017-12-27 16:25:39', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:39', '2017-12-27 16:25:39');
INSERT INTO `customer_order` VALUES ('1157', '25', '1', null, null, null, '2017-12-27 16:25:40', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:40', '2017-12-27 16:25:40');
INSERT INTO `customer_order` VALUES ('1158', '25', '1', null, null, null, '2017-12-27 16:25:42', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:25:42', '2017-12-27 16:25:42');
INSERT INTO `customer_order` VALUES ('1159', '25', '1', null, null, null, '2017-12-27 16:26:13', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-27 16:26:13', '2017-12-27 16:26:13');
INSERT INTO `customer_order` VALUES ('1160', '25', '1', null, null, null, '2017-12-28 10:41:21', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 10:41:21', '2017-12-28 10:41:21');
INSERT INTO `customer_order` VALUES ('1161', '25', '1', null, null, null, '2017-12-28 10:41:31', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 10:41:31', '2017-12-28 10:41:31');
INSERT INTO `customer_order` VALUES ('1162', '37', '1', null, null, null, '2017-12-28 10:41:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 10:41:37', '2017-12-28 10:41:37');
INSERT INTO `customer_order` VALUES ('1163', '25', '1', null, null, null, '2017-12-28 10:41:38', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 10:41:38', '2017-12-28 10:41:38');
INSERT INTO `customer_order` VALUES ('1166', '25', '1', null, null, null, '2017-12-28 11:55:09', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 11:55:09', '2017-12-28 11:55:09');
INSERT INTO `customer_order` VALUES ('1167', '25', '1', null, null, null, '2017-12-28 11:55:51', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 11:55:51', '2017-12-28 11:55:51');
INSERT INTO `customer_order` VALUES ('1168', '25', '1', null, null, null, '2017-12-28 13:23:22', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 13:23:22', '2017-12-28 13:23:22');
INSERT INTO `customer_order` VALUES ('1169', '25', '1', null, null, null, '2017-12-28 13:23:37', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 13:23:37', '2017-12-28 13:23:37');
INSERT INTO `customer_order` VALUES ('1170', '25', '1', null, null, null, '2017-12-28 15:58:07', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 15:58:07', '2017-12-28 15:58:07');
INSERT INTO `customer_order` VALUES ('1173', '25', '1', null, null, null, '2017-12-28 20:35:56', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-28 20:35:56', '2017-12-28 20:35:56');
INSERT INTO `customer_order` VALUES ('1176', '29', '1', null, null, null, '2017-12-29 10:21:31', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-29 10:21:31', '2017-12-29 10:21:31');
INSERT INTO `customer_order` VALUES ('1177', '5', '1', null, null, null, '2017-12-30 05:30:28', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 05:30:28', '2017-12-30 05:30:28');
INSERT INTO `customer_order` VALUES ('1178', '5', '1', null, null, null, '2017-12-30 05:37:35', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 05:37:35', '2017-12-30 05:37:35');
INSERT INTO `customer_order` VALUES ('1179', '25', '1', null, null, null, '2017-12-30 07:59:41', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 07:59:41', '2017-12-30 07:59:41');
INSERT INTO `customer_order` VALUES ('1180', '25', '3', null, null, null, '2017-12-30 08:35:41', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 08:35:41', '2017-12-30 08:35:41');
INSERT INTO `customer_order` VALUES ('1185', '54', '1', null, null, null, '2017-12-30 11:28:41', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 11:28:41', '2017-12-30 11:28:41');
INSERT INTO `customer_order` VALUES ('1186', '54', '1', null, null, null, '2017-12-30 11:30:17', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 11:30:17', '2017-12-30 11:30:17');
INSERT INTO `customer_order` VALUES ('1189', '5', '9', null, null, null, '2017-12-30 12:28:09', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 12:28:09', '2017-12-30 12:28:09');
INSERT INTO `customer_order` VALUES ('1190', '25', '3', null, null, null, '2017-12-30 17:40:20', 'MOBILE', 'PAYMENT PENDING', null, '2017-12-30 17:40:20', '2017-12-30 17:40:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `customer_order_item` VALUES ('56', '1093', '10', '1', '15', '15', 'N/A', null, '2017-12-22 14:38:12', null);
INSERT INTO `customer_order_item` VALUES ('57', '1095', '9', '1', '13', '13', 'N/A', null, '2017-12-22 16:13:46', null);
INSERT INTO `customer_order_item` VALUES ('58', '1095', '10', '1', '15', '15', 'N/A', null, '2017-12-22 16:13:46', null);
INSERT INTO `customer_order_item` VALUES ('65', '1102', '5', '1', '1', '1', 'N/A', null, '2017-12-22 17:33:56', null);
INSERT INTO `customer_order_item` VALUES ('66', '1102', '5', '1', '1', '1', 'N/A', null, '2017-12-22 17:33:56', null);
INSERT INTO `customer_order_item` VALUES ('67', '1103', '1', '1', '15', '15', 'N/A', null, '2017-12-23 02:18:54', null);
INSERT INTO `customer_order_item` VALUES ('68', '1103', '8', '1', '13', '13', 'N/A', null, '2017-12-23 02:18:54', null);
INSERT INTO `customer_order_item` VALUES ('69', '1104', '1', '1', '15', '15', 'N/A', null, '2017-12-23 02:18:55', null);
INSERT INTO `customer_order_item` VALUES ('70', '1104', '8', '1', '13', '13', 'N/A', null, '2017-12-23 02:18:55', null);
INSERT INTO `customer_order_item` VALUES ('71', '1105', '9', '2', '11', '22', 'N/A', null, '2017-12-23 07:10:29', null);
INSERT INTO `customer_order_item` VALUES ('72', '1105', '9', '2', '11', '22', 'N/A', null, '2017-12-23 07:10:29', null);
INSERT INTO `customer_order_item` VALUES ('73', '1107', '3', '1', '13', '13', 'N/A', null, '2017-12-23 10:58:55', null);
INSERT INTO `customer_order_item` VALUES ('75', '1109', '8', '6', '15', '90', 'N/A', null, '2017-12-24 13:34:40', null);
INSERT INTO `customer_order_item` VALUES ('76', '1110', '19', '1', '1', '1', 'N/A', null, '2017-12-24 13:36:43', null);
INSERT INTO `customer_order_item` VALUES ('77', '1110', '8', '1', '15', '15', 'N/A', null, '2017-12-24 13:36:43', null);
INSERT INTO `customer_order_item` VALUES ('78', '1112', '3', '1', '13', '13', 'N/A', null, '2017-12-24 15:24:36', null);
INSERT INTO `customer_order_item` VALUES ('79', '1113', '8', '1', '15', '15', 'N/A', null, '2017-12-24 17:25:38', null);
INSERT INTO `customer_order_item` VALUES ('80', '1114', '7', '4', '11', '44', 'N/A', null, '2017-12-24 19:49:26', null);
INSERT INTO `customer_order_item` VALUES ('81', '1124', '4', '1', '15', '15', 'N/A', null, '2017-12-25 07:23:43', null);
INSERT INTO `customer_order_item` VALUES ('82', '1127', '4', '1', '15', '15', 'N/A', null, '2017-12-25 10:10:54', null);
INSERT INTO `customer_order_item` VALUES ('83', '1128', '1', '1', '15', '15', 'N/A', null, '2017-12-25 10:18:52', null);
INSERT INTO `customer_order_item` VALUES ('86', '1131', '9', '1', '11', '11', 'N/A', null, '2017-12-25 15:52:28', null);
INSERT INTO `customer_order_item` VALUES ('87', '1133', '8', '1', '15', '15', 'N/A', null, '2017-12-26 02:28:52', null);
INSERT INTO `customer_order_item` VALUES ('88', '1134', '9', '1', '11', '11', 'N/A', null, '2017-12-26 04:18:09', null);
INSERT INTO `customer_order_item` VALUES ('89', '1135', '2', '1', '11', '11', 'N/A', null, '2017-12-26 10:39:48', null);
INSERT INTO `customer_order_item` VALUES ('90', '1136', '8', '1', '15', '15', 'N/A', null, '2017-12-26 10:52:08', null);
INSERT INTO `customer_order_item` VALUES ('91', '1137', '1', '5', '15', '75', 'N/A', null, '2017-12-26 10:54:25', null);
INSERT INTO `customer_order_item` VALUES ('92', '1139', '1', '1', '15', '15', 'N/A', null, '2017-12-26 16:51:31', null);
INSERT INTO `customer_order_item` VALUES ('93', '1141', '9', '1', '11', '11', 'N/A', null, '2017-12-26 18:15:54', null);
INSERT INTO `customer_order_item` VALUES ('94', '1142', '10', '1', '15', '15', 'N/A', null, '2017-12-27 07:15:10', null);
INSERT INTO `customer_order_item` VALUES ('95', '1143', '10', '1', '15', '15', 'N/A', null, '2017-12-27 09:16:21', null);
INSERT INTO `customer_order_item` VALUES ('96', '1159', '1', '1', '15', '15', 'N/A', null, '2017-12-27 16:26:13', null);
INSERT INTO `customer_order_item` VALUES ('97', '1160', '5', '1', '13', '13', 'N/A', null, '2017-12-28 10:41:21', null);
INSERT INTO `customer_order_item` VALUES ('98', '1162', '27', '1', '1', '1', 'N/A', null, '2017-12-28 10:41:37', null);
INSERT INTO `customer_order_item` VALUES ('101', '1166', '5', '1', '13', '13', 'N/A', null, '2017-12-28 11:55:09', null);
INSERT INTO `customer_order_item` VALUES ('102', '1167', '23', '1', '1', '1', 'N/A', null, '2017-12-28 11:55:51', null);
INSERT INTO `customer_order_item` VALUES ('103', '1169', '23', '1', '1', '1', 'N/A', null, '2017-12-28 13:23:37', null);
INSERT INTO `customer_order_item` VALUES ('104', '1170', '4', '1', '15', '15', 'N/A', null, '2017-12-28 15:58:07', null);
INSERT INTO `customer_order_item` VALUES ('107', '1173', '5', '1', '13', '13', 'N/A', null, '2017-12-28 20:35:56', null);
INSERT INTO `customer_order_item` VALUES ('108', '1176', '5', '1', '13', '13', 'N/A', null, '2017-12-29 10:21:31', null);
INSERT INTO `customer_order_item` VALUES ('109', '1177', '27', '1', '1', '1', 'N/A', null, '2017-12-30 05:30:28', null);
INSERT INTO `customer_order_item` VALUES ('110', '1177', '23', '1', '1', '1', 'N/A', null, '2017-12-30 05:30:28', null);
INSERT INTO `customer_order_item` VALUES ('111', '1178', '23', '1', '1', '1', 'N/A', null, '2017-12-30 05:37:35', null);
INSERT INTO `customer_order_item` VALUES ('112', '1179', '8', '1', '15', '15', 'N/A', null, '2017-12-30 07:59:41', null);
INSERT INTO `customer_order_item` VALUES ('113', '1180', '8', '1', '15', '15', 'N/A', null, '2017-12-30 08:35:41', null);
INSERT INTO `customer_order_item` VALUES ('114', '1180', '5', '1', '13', '13', 'N/A', null, '2017-12-30 08:35:41', null);
INSERT INTO `customer_order_item` VALUES ('119', '1186', '8', '1', '15', '15', 'N/A', null, '2017-12-30 11:30:17', null);
INSERT INTO `customer_order_item` VALUES ('122', '1189', '2', '1', '11', '11', 'N/A', null, '2017-12-30 12:28:09', null);
INSERT INTO `customer_order_item` VALUES ('123', '1189', '4', '1', '15', '15', 'N/A', null, '2017-12-30 12:28:09', null);
INSERT INTO `customer_order_item` VALUES ('124', '1189', '1', '1', '15', '15', 'N/A', null, '2017-12-30 12:28:09', null);
INSERT INTO `customer_order_item` VALUES ('125', '1190', '3', '1', '13', '13', 'N/A', null, '2017-12-30 17:40:20', null);

-- ----------------------------
-- Table structure for db_cache
-- ----------------------------
DROP TABLE IF EXISTS `db_cache`;
CREATE TABLE `db_cache` (
  `id` char(128) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_cache
-- ----------------------------
INSERT INTO `db_cache` VALUES ('963454f612a8b5fb4a63ba1e97f028a1', '0', 0x613A323A7B693A303B613A323A7B693A303B613A32333A7B693A303B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A32353A223C636F6E74726F6C6C65723A5C772B3E2F3C69643A5C642B3E223B733A373A227061747465726E223B733A34323A22235E283F503C6134636632363639613E5C772B292F283F503C6162663339363735303E5C642B29242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31373A223C636F6E74726F6C6C65723E2F76696577223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A323A7B733A393A22613463663236363961223B733A31303A22636F6E74726F6C6C6572223B733A393A22616266333936373530223B733A323A226964223B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31393A222F3C636F6E74726F6C6C65723E2F3C69643E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B733A32383A22235E283F503C6134636632363639613E5C772B292F76696577242375223B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A313A7B733A323A226964223B733A383A22235E5C642B242375223B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A313A7B733A31303A22636F6E74726F6C6C6572223B733A31323A223C636F6E74726F6C6C65723E223B7D7D693A313B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A33383A223C636F6E74726F6C6C65723A5C772B3E2F3C616374696F6E3A5C772B3E2F3C69643A5C642B3E223B733A373A227061747465726E223B733A36313A22235E283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B292F283F503C6162663339363735303E5C642B29242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32313A223C636F6E74726F6C6C65723E2F3C616374696F6E3E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A333A7B733A393A22613463663236363961223B733A31303A22636F6E74726F6C6C6572223B733A393A22613437636338633932223B733A363A22616374696F6E223B733A393A22616266333936373530223B733A323A226964223B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32383A222F3C636F6E74726F6C6C65723E2F3C616374696F6E3E2F3C69643E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B733A34323A22235E283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B29242375223B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A313A7B733A323A226964223B733A383A22235E5C642B242375223B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A323A7B733A31303A22636F6E74726F6C6C6572223B733A31323A223C636F6E74726F6C6C65723E223B733A363A22616374696F6E223B733A383A223C616374696F6E3E223B7D7D693A323B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A32393A223C636F6E74726F6C6C65723A5C772B3E2F3C616374696F6E3A5C772B3E223B733A373A227061747465726E223B733A34323A22235E283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B29242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32313A223C636F6E74726F6C6C65723E2F3C616374696F6E3E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A323A7B733A393A22613463663236363961223B733A31303A22636F6E74726F6C6C6572223B733A393A22613437636338633932223B733A363A22616374696F6E223B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32333A222F3C636F6E74726F6C6C65723E2F3C616374696F6E3E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B733A34323A22235E283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B29242375223B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A323A7B733A31303A22636F6E74726F6C6C6572223B733A31323A223C636F6E74726F6C6C65723E223B733A363A22616374696F6E223B733A383A223C616374696F6E3E223B7D7D693A333B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A313A222F223B733A373A227061747465726E223B733A353A22235E242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31303A22736974652F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A303A22223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A343B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A393A226D792D73616C6F6E73223B733A373A227061747465726E223B733A31343A22235E6D792D73616C6F6E73242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31313A2273616C6F6E2F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31313A222F6D792D73616C6F6E732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A353B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A383A226D792D7374616666223B733A373A227061747465726E223B733A31333A22235E6D792D7374616666242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31313A2273746166662F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31303A222F6D792D73746166662F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A363B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31313A226D792D7061796D656E7473223B733A373A227061747465726E223B733A31363A22235E6D792D7061796D656E7473242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31333A227061796D656E742F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31333A222F6D792D7061796D656E74732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A373B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31363A2270656E64696E672D7061796D656E7473223B733A373A227061747465726E223B733A32313A22235E70656E64696E672D7061796D656E7473242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32343A227061796D656E742F70656E64696E672D7061796D656E7473223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31383A222F70656E64696E672D7061796D656E74732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A383B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31353A22636F6E6669726D2D7061796D656E74223B733A373A227061747465726E223B733A32303A22235E636F6E6669726D2D7061796D656E74242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32333A227061796D656E742F636F6E6669726D2D7061796D656E74223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31373A222F636F6E6669726D2D7061796D656E742F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A393B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31383A2266696E616C697A65642D7061796D656E7473223B733A373A227061747465726E223B733A32333A22235E66696E616C697A65642D7061796D656E7473242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32363A227061796D656E742F66696E616C697A65642D7061796D656E7473223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32303A222F66696E616C697A65642D7061796D656E74732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31303B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31313A226D792D626F6F6B696E6773223B733A373A227061747465726E223B733A31363A22235E6D792D626F6F6B696E6773242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31373A227265736572766174696F6E2F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31333A222F6D792D626F6F6B696E67732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31313B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31313A226164642D73657276696365223B733A373A227061747465726E223B733A31363A22235E6164642D73657276696365242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32303A2273616C6F6E73657276696365732F637265617465223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31333A222F6164642D736572766963652F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31323B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31343A2261737369676E2D73657276696365223B733A373A227061747465726E223B733A31393A22235E61737369676E2D73657276696365242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32313A22626F6F6B65642F61737369676E2D73657276696365223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31363A222F61737369676E2D736572766963652F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31333B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31353A22636F6E6669726D2D73657276696365223B733A373A227061747465726E223B733A32303A22235E636F6E6669726D2D73657276696365242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32323A22626F6F6B65642F636F6E6669726D2D73657276696365223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31373A222F636F6E6669726D2D736572766963652F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31343B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31393A22636F6E6669726D2D7265736572766174696F6E223B733A373A227061747465726E223B733A32343A22235E636F6E6669726D2D7265736572766174696F6E242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A33313A227265736572766174696F6E2F636F6E6669726D2D7265736572766174696F6E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32313A222F636F6E6669726D2D7265736572766174696F6E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31353B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31393A2270726F636573732D7265736572766174696F6E223B733A373A227061747465726E223B733A32343A22235E70726F636573732D7265736572766174696F6E242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A33313A227265736572766174696F6E2F70726F636573732D7265736572766174696F6E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32313A222F70726F636573732D7265736572766174696F6E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31363B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A373A22636F6E6669726D223B733A373A227061747465726E223B733A31323A22235E636F6E6669726D242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31393A227265736572766174696F6E2F636F6E6669726D223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A393A222F636F6E6669726D2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31373B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A383A227365727669636573223B733A373A227061747465726E223B733A31333A22235E7365727669636573242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31333A22736572766963652F696E646578223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31303A222F73657276696365732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31383B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31323A226163746976652D7573657273223B733A373A227061747465726E223B733A31373A22235E6163746976652D7573657273242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31373A22757365722F6163746976652D7573657273223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31343A222F6163746976652D75736572732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A31393B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31333A2270656E64696E672D7573657273223B733A373A227061747465726E223B733A31383A22235E70656E64696E672D7573657273242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31383A22757365722F70656E64696E672D7573657273223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31353A222F70656E64696E672D75736572732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A32303B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31353A2273757370656E6465642D7573657273223B733A373A227061747465726E223B733A32303A22235E73757370656E6465642D7573657273242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32303A22757365722F73757370656E6465642D7573657273223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31373A222F73757370656E6465642D75736572732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A32313B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31373A2264656163746976617465642D7573657273223B733A373A227061747465726E223B733A32323A22235E64656163746976617465642D7573657273242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32323A22757365722F64656163746976617465642D7573657273223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31393A222F64656163746976617465642D75736572732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D693A32323B4F3A31353A227969695C7765625C55726C52756C65223A31363A7B733A343A226E616D65223B733A31313A22757365722D737461747573223B733A373A227061747465726E223B733A31363A22235E757365722D737461747573242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A31363A22757365722F757365722D737461747573223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31303A226E6F726D616C697A6572223B4E3B733A31353A22002A00637265617465537461747573223B4E3B733A31353A22002A00706C616365686F6C64657273223B613A303A7B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A31333A222F757365722D7374617475732F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B4E3B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A303A7B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A303A7B7D7D7D693A313B733A33323A226232653031636433643535663537643638626664363364323039373561336535223B7D693A313B4E3B7D);

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
  `ADDRESS` text DEFAULT NULL,
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
  `CITY_ID` bigint(20) DEFAULT NULL,
  `LOCATION_NAME` varchar(255) NOT NULL,
  `ADDRESS` text DEFAULT NULL,
  PRIMARY KEY (`LOCATION_ID`),
  KEY `CITY_ID` (`CITY_ID`),
  CONSTRAINT `location_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`CITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', '1', 'Degmada Boondheere ', null);
INSERT INTO `location` VALUES ('2', '1', 'Degmada C/Casiis', null);
INSERT INTO `location` VALUES ('3', '1', 'Degnada Dayniile', null);
INSERT INTO `location` VALUES ('4', '1', 'Degmada Dharkeynley', null);
INSERT INTO `location` VALUES ('5', '1', 'Degmada Hodan', null);
INSERT INTO `location` VALUES ('6', '1', 'Degmada Howlwadaag', null);
INSERT INTO `location` VALUES ('7', '1', 'Degmada Heliwa', null);
INSERT INTO `location` VALUES ('8', '1', 'Degmada Kaxda', null);
INSERT INTO `location` VALUES ('9', '1', 'Degmada Kaaraan', null);
INSERT INTO `location` VALUES ('10', '1', 'Degmada Shibis  ', null);
INSERT INTO `location` VALUES ('11', '1', 'Degmada Shangaani', null);
INSERT INTO `location` VALUES ('12', '1', 'Degmada Waabari', null);
INSERT INTO `location` VALUES ('13', '1', 'Degmada Wadajir', null);
INSERT INTO `location` VALUES ('14', '1', 'Degmada Warta nabada ', null);
INSERT INTO `location` VALUES ('15', '1', 'Degmada Xamerweyne', null);
INSERT INTO `location` VALUES ('16', '1', 'Degnada Xamerjajab', null);
INSERT INTO `location` VALUES ('17', '1', 'Degmada Yaaqshiid', null);

-- ----------------------------
-- Table structure for menu_category
-- ----------------------------
DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE `menu_category` (
  `MENU_CAT_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `MENU_CAT_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MENU_CAT_IMAGE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE` int(1) NOT NULL DEFAULT 1,
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
INSERT INTO `menu_category` VALUES ('2', 'BURGERS', null, '0', '5');
INSERT INTO `menu_category` VALUES ('3', 'SALADS', null, '0', '3');
INSERT INTO `menu_category` VALUES ('4', 'SWEETS', null, '0', '6');
INSERT INTO `menu_category` VALUES ('5', 'SANDWICH', null, '0', '4');
INSERT INTO `menu_category` VALUES ('6', 'DRINKS', 'drinks.jpg', '1', '2');

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
  `MAX_QTY` int(2) NOT NULL DEFAULT 10 COMMENT 'Show the maximum number of quantities one can select from',
  PRIMARY KEY (`MENU_ITEM_ID`),
  KEY `MENU_CAT_ID` (`MENU_CAT_ID`) USING BTREE,
  CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES ('1', '1', 'MARGHERITA', 'Crushed Tomatoes, Mozzarella, Grana, Basil', 'pizza1.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('2', '1', 'HAWAIIAN', 'pizza topped with tomato sauce, cheese, pineapple, and Canadian bacon or ham. Some versions may include peppers, mushrooms', 'pizza2.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('3', '1', 'CHICKEN TIKKA MASALA', 'cheesy pizza topped with delicious Indian chicken tikka masala', 'pizza3.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('4', '1', 'SUPREME', 'Sausage, pepperoni, mushrooms, olives, peppers, and onion', 'pizza3.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('11', '6', 'FANTA', 'Soft Drink', 'fanta.png', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('12', '6', 'COCA COLA', 'Soft Drink', 'coke.png', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('13', '6', 'SPRITE', 'Soft Drink', 'sprite.jpg', '\0', '\0', '20');

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
  CONSTRAINT `menu_item_type_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_item_type_ibfk_2` FOREIGN KEY (`ITEM_TYPE_SIZE`) REFERENCES `tb_sizes` (`SIZE_TYPE`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
INSERT INTO `menu_item_type` VALUES ('19', '11', '500ML', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('23', '12', '500ML', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('27', '13', '500ML', '1.00', '');

-- ----------------------------
-- Table structure for my_session
-- ----------------------------
DROP TABLE IF EXISTS `my_session`;
CREATE TABLE `my_session` (
  `id` char(60) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob DEFAULT NULL,
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
INSERT INTO `my_session` VALUES ('22otc7jnea23idehgctovhvff4', '1514679292', 0x5F5F666C6173687C613A303A7B7D, '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=latin1;

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
INSERT INTO `order_tracking` VALUES ('186', '1095', null, 'ORDER PENDING', '2017-12-22 16:13:46', '');
INSERT INTO `order_tracking` VALUES ('190', '1099', null, 'ORDER PENDING', '2017-12-22 16:53:32', '');
INSERT INTO `order_tracking` VALUES ('191', '1100', null, 'ORDER PENDING', '2017-12-22 16:53:32', '');
INSERT INTO `order_tracking` VALUES ('193', '1102', null, 'ORDER PENDING', '2017-12-22 17:33:56', '');
INSERT INTO `order_tracking` VALUES ('194', '1103', null, 'ORDER PENDING', '2017-12-23 02:18:54', '');
INSERT INTO `order_tracking` VALUES ('195', '1104', null, 'ORDER PENDING', '2017-12-23 02:18:55', '');
INSERT INTO `order_tracking` VALUES ('196', '1105', null, 'ORDER PENDING', '2017-12-23 07:10:29', '');
INSERT INTO `order_tracking` VALUES ('197', '1106', null, 'ORDER PENDING', '2017-12-23 07:10:37', '');
INSERT INTO `order_tracking` VALUES ('198', '1107', null, 'ORDER PENDING', '2017-12-23 10:58:55', '');
INSERT INTO `order_tracking` VALUES ('200', '1109', null, 'ORDER PENDING', '2017-12-24 13:34:41', '');
INSERT INTO `order_tracking` VALUES ('201', '1110', null, 'ORDER PENDING', '2017-12-24 13:36:43', '');
INSERT INTO `order_tracking` VALUES ('202', '1111', null, 'ORDER PENDING', '2017-12-24 13:38:49', '');
INSERT INTO `order_tracking` VALUES ('203', '1112', null, 'ORDER PENDING', '2017-12-24 15:24:37', '');
INSERT INTO `order_tracking` VALUES ('204', '1113', null, 'ORDER PENDING', '2017-12-24 17:25:38', '');
INSERT INTO `order_tracking` VALUES ('205', '1114', null, 'ORDER PENDING', '2017-12-24 19:49:26', '');
INSERT INTO `order_tracking` VALUES ('206', '1115', null, 'ORDER PENDING', '2017-12-24 19:49:45', '');
INSERT INTO `order_tracking` VALUES ('207', '1116', null, 'ORDER PENDING', '2017-12-24 19:49:49', '');
INSERT INTO `order_tracking` VALUES ('208', '1117', null, 'ORDER PENDING', '2017-12-24 19:49:52', '');
INSERT INTO `order_tracking` VALUES ('209', '1118', null, 'ORDER PENDING', '2017-12-24 19:50:09', '');
INSERT INTO `order_tracking` VALUES ('210', '1119', null, 'ORDER PENDING', '2017-12-24 19:50:18', '');
INSERT INTO `order_tracking` VALUES ('211', '1120', null, 'ORDER PENDING', '2017-12-24 19:50:20', '');
INSERT INTO `order_tracking` VALUES ('212', '1121', null, 'ORDER PENDING', '2017-12-24 19:50:22', '');
INSERT INTO `order_tracking` VALUES ('213', '1122', null, 'ORDER PENDING', '2017-12-24 19:50:23', '');
INSERT INTO `order_tracking` VALUES ('214', '1123', null, 'ORDER PENDING', '2017-12-24 19:50:46', '');
INSERT INTO `order_tracking` VALUES ('215', '1124', null, 'ORDER PENDING', '2017-12-25 07:23:43', '');
INSERT INTO `order_tracking` VALUES ('216', '1125', null, 'ORDER PENDING', '2017-12-25 07:23:49', '');
INSERT INTO `order_tracking` VALUES ('217', '1126', null, 'ORDER PENDING', '2017-12-25 07:24:50', '');
INSERT INTO `order_tracking` VALUES ('218', '1127', null, 'ORDER PENDING', '2017-12-25 10:10:54', '');
INSERT INTO `order_tracking` VALUES ('219', '1128', null, 'ORDER PENDING', '2017-12-25 10:18:52', '');
INSERT INTO `order_tracking` VALUES ('221', '1130', null, 'ORDER PENDING', '2017-12-25 13:26:55', '');
INSERT INTO `order_tracking` VALUES ('222', '1131', null, 'ORDER PENDING', '2017-12-25 15:52:28', '');
INSERT INTO `order_tracking` VALUES ('223', '1132', null, 'ORDER PENDING', '2017-12-25 16:36:56', '');
INSERT INTO `order_tracking` VALUES ('224', '1133', null, 'ORDER PENDING', '2017-12-26 02:28:53', '');
INSERT INTO `order_tracking` VALUES ('225', '1134', null, 'ORDER PENDING', '2017-12-26 04:18:09', '');
INSERT INTO `order_tracking` VALUES ('226', '1135', null, 'ORDER PENDING', '2017-12-26 10:39:48', '');
INSERT INTO `order_tracking` VALUES ('227', '1136', null, 'ORDER PENDING', '2017-12-26 10:52:08', '');
INSERT INTO `order_tracking` VALUES ('228', '1137', null, 'ORDER PENDING', '2017-12-26 10:54:25', '');
INSERT INTO `order_tracking` VALUES ('229', '1138', null, 'ORDER PENDING', '2017-12-26 16:51:23', '');
INSERT INTO `order_tracking` VALUES ('230', '1139', null, 'ORDER PENDING', '2017-12-26 16:51:31', '');
INSERT INTO `order_tracking` VALUES ('231', '1140', null, 'ORDER PENDING', '2017-12-26 17:26:05', '');
INSERT INTO `order_tracking` VALUES ('232', '1141', null, 'ORDER PENDING', '2017-12-26 18:15:54', '');
INSERT INTO `order_tracking` VALUES ('233', '1142', null, 'ORDER PENDING', '2017-12-27 07:15:10', '');
INSERT INTO `order_tracking` VALUES ('234', '1143', null, 'ORDER PENDING', '2017-12-27 09:16:21', '');
INSERT INTO `order_tracking` VALUES ('235', '1144', null, 'ORDER PENDING', '2017-12-27 11:24:38', '');
INSERT INTO `order_tracking` VALUES ('236', '1145', null, 'ORDER PENDING', '2017-12-27 12:32:23', '');
INSERT INTO `order_tracking` VALUES ('237', '1146', null, 'ORDER PENDING', '2017-12-27 12:32:29', '');
INSERT INTO `order_tracking` VALUES ('238', '1147', null, 'ORDER PENDING', '2017-12-27 16:25:03', '');
INSERT INTO `order_tracking` VALUES ('239', '1148', null, 'ORDER PENDING', '2017-12-27 16:25:07', '');
INSERT INTO `order_tracking` VALUES ('240', '1149', null, 'ORDER PENDING', '2017-12-27 16:25:11', '');
INSERT INTO `order_tracking` VALUES ('241', '1150', null, 'ORDER PENDING', '2017-12-27 16:25:16', '');
INSERT INTO `order_tracking` VALUES ('242', '1151', null, 'ORDER PENDING', '2017-12-27 16:25:19', '');
INSERT INTO `order_tracking` VALUES ('243', '1152', null, 'ORDER PENDING', '2017-12-27 16:25:21', '');
INSERT INTO `order_tracking` VALUES ('244', '1153', null, 'ORDER PENDING', '2017-12-27 16:25:28', '');
INSERT INTO `order_tracking` VALUES ('245', '1154', null, 'ORDER PENDING', '2017-12-27 16:25:34', '');
INSERT INTO `order_tracking` VALUES ('246', '1155', null, 'ORDER PENDING', '2017-12-27 16:25:37', '');
INSERT INTO `order_tracking` VALUES ('247', '1156', null, 'ORDER PENDING', '2017-12-27 16:25:39', '');
INSERT INTO `order_tracking` VALUES ('248', '1157', null, 'ORDER PENDING', '2017-12-27 16:25:40', '');
INSERT INTO `order_tracking` VALUES ('249', '1158', null, 'ORDER PENDING', '2017-12-27 16:25:42', '');
INSERT INTO `order_tracking` VALUES ('250', '1159', null, 'ORDER PENDING', '2017-12-27 16:26:13', '');
INSERT INTO `order_tracking` VALUES ('251', '1160', null, 'ORDER PENDING', '2017-12-28 10:41:21', '');
INSERT INTO `order_tracking` VALUES ('252', '1161', null, 'ORDER PENDING', '2017-12-28 10:41:31', '');
INSERT INTO `order_tracking` VALUES ('253', '1162', null, 'ORDER PENDING', '2017-12-28 10:41:37', '');
INSERT INTO `order_tracking` VALUES ('254', '1163', null, 'ORDER PENDING', '2017-12-28 10:41:38', '');
INSERT INTO `order_tracking` VALUES ('257', '1166', null, 'ORDER PENDING', '2017-12-28 11:55:09', '');
INSERT INTO `order_tracking` VALUES ('258', '1167', null, 'ORDER PENDING', '2017-12-28 11:55:51', '');
INSERT INTO `order_tracking` VALUES ('259', '1168', null, 'ORDER PENDING', '2017-12-28 13:23:22', '');
INSERT INTO `order_tracking` VALUES ('260', '1169', null, 'ORDER PENDING', '2017-12-28 13:23:37', '');
INSERT INTO `order_tracking` VALUES ('261', '1170', null, 'ORDER PENDING', '2017-12-28 15:58:07', '');
INSERT INTO `order_tracking` VALUES ('264', '1173', null, 'ORDER PENDING', '2017-12-28 20:35:56', '');
INSERT INTO `order_tracking` VALUES ('267', '1176', null, 'ORDER PENDING', '2017-12-29 10:21:31', '');
INSERT INTO `order_tracking` VALUES ('268', '1177', null, 'ORDER PENDING', '2017-12-30 05:30:28', '');
INSERT INTO `order_tracking` VALUES ('269', '1178', null, 'ORDER PENDING', '2017-12-30 05:37:35', '');
INSERT INTO `order_tracking` VALUES ('270', '1179', null, 'ORDER PENDING', '2017-12-30 07:59:41', '');
INSERT INTO `order_tracking` VALUES ('271', '1180', null, 'ORDER PENDING', '2017-12-30 08:35:41', '');
INSERT INTO `order_tracking` VALUES ('276', '1185', null, 'PAYMENT PENDING', '2017-12-30 11:28:41', '');
INSERT INTO `order_tracking` VALUES ('277', '1186', null, 'PAYMENT PENDING', '2017-12-30 11:30:17', '');
INSERT INTO `order_tracking` VALUES ('280', '1189', null, 'PAYMENT PENDING', '2017-12-30 12:28:09', '');
INSERT INTO `order_tracking` VALUES ('281', '1190', null, 'PAYMENT PENDING', '2017-12-30 17:40:20', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

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
  `NOTES` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CART_TIMESTAMP` bigint(20) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`CART_ITEM_ID`),
  KEY `order_item_ibfk_2` (`ITEM_TYPE_ID`) USING BTREE,
  KEY `USER_ID` (`USER_ID`) USING BTREE,
  CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`ITEM_TYPE_ID`) REFERENCES `menu_item_type` (`ITEM_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_cart_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_cart
-- ----------------------------
INSERT INTO `tb_cart` VALUES ('110', '51', '10', '1', '15', 'LARGE', null, '1514196891', '2017-12-25 10:14:51', '2017-12-25 10:14:51');
INSERT INTO `tb_cart` VALUES ('156', '5', '23', '1', '1', '500ML', null, '1514652051', '2017-12-30 16:40:51', '2017-12-30 16:40:51');
INSERT INTO `tb_cart` VALUES ('157', '5', '19', '1', '1', '500ML', null, '1514652051', '2017-12-30 16:41:00', '2017-12-30 16:41:00');
INSERT INTO `tb_cart` VALUES ('158', '5', '1', '1', '15', 'LARGE', null, '1514652051', '2017-12-30 18:18:10', '2017-12-30 18:18:10');

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
  `SIZE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `SIZE_TYPE` varchar(20) NOT NULL,
  `ACTIVE` bit(1) DEFAULT b'1',
  PRIMARY KEY (`SIZE_ID`),
  UNIQUE KEY `SIZE_NAME` (`SIZE_TYPE`),
  KEY `SIZED_ID` (`SIZE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sizes
-- ----------------------------
INSERT INTO `tb_sizes` VALUES ('1', 'SMALL', '');
INSERT INTO `tb_sizes` VALUES ('2', 'MEDIUM', '');
INSERT INTO `tb_sizes` VALUES ('3', 'LARGE', '');
INSERT INTO `tb_sizes` VALUES ('4', '500ML', '');
INSERT INTO `tb_sizes` VALUES ('5', '1LITRE', '');
INSERT INTO `tb_sizes` VALUES ('6', '1.5LITRE', '');
INSERT INTO `tb_sizes` VALUES ('7', '300ML', '');

-- ----------------------------
-- Table structure for tb_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `STATUS_NAME` varchar(30) NOT NULL,
  `STATUS_DESC` varchar(100) DEFAULT NULL,
  `COLOR` varchar(10) NOT NULL DEFAULT 'GREEN',
  `SCOPE` varchar(10) NOT NULL DEFAULT 'ALL',
  `RANK` int(2) NOT NULL DEFAULT 1,
  `WORKFLOW` int(2) NOT NULL DEFAULT 1,
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

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
INSERT INTO `tb_users` VALUES ('48', 'Aainab', '1', 'Ainab', 'Ahmed Abdi', '615513533', 'axmedcaynab@gmail.com', '1', '0fb641dff5070d488355f89a1ad0fdc8203e0f33', '2017-12-23 06:44:32', '2017-12-23 06:44:32', null);
INSERT INTO `tb_users` VALUES ('49', 'ozgur.catal', '1', 'catal', 'ozgur', '612136659', 'ozgur.catal@hotmail.com', '1', '7a59c162217c6abbe65db58ecdfcb1765780af7b', '2017-12-24 13:08:46', '2017-12-24 13:08:46', null);
INSERT INTO `tb_users` VALUES ('50', 'Rafiki01', '1', 'Rafik', 'Hassan', '618900015', 'hafarah1@gmail.com', '1', 'fa758a0c5aa550ebd7f7a09d2a8c9a335be7dcd0', '2017-12-24 15:22:41', '2017-12-24 15:22:41', null);
INSERT INTO `tb_users` VALUES ('51', 'zuhuur', '1', 'Zahra', 'Zuu', '618812510', 'zahra@sostec.so', '1', '5ddf228c30669af17fb926a7d728c4e9d6c8df27', '2017-12-25 10:09:12', '2017-12-25 10:09:12', null);
INSERT INTO `tb_users` VALUES ('52', 'zahradhaqane', '1', 'Dhaqane', 'Zahra Osman', '615533643', 'zahradhaqane@gmail.com', '1', 'e72fb1b6ffd172fef3a3c97b4555a0669cac4c7e', '2017-12-26 04:15:21', '2017-12-26 04:15:21', null);
INSERT INTO `tb_users` VALUES ('53', 'Aallaa', '1', 'Aallaa', 'habad', '615888129', 'Aallaahabad@gmail.com', '1', '3edacb467448252d0f8f49c732ba00cc438b5895', '2017-12-26 16:49:26', '2017-12-26 16:49:26', null);
INSERT INTO `tb_users` VALUES ('54', 'Badle', '1', 'Maxamuud Xamud', 'Badle', '617641354', 'badle7171@gmail.com', '1', 'c4f7d269ffa6b3c3c77fb0b3d14a3afdd0161182', '2017-12-27 07:41:24', '2017-12-27 07:41:24', null);
INSERT INTO `tb_users` VALUES ('55', 'shiine', '1', 'mohamed', 'ali', '619616338', 'shiine318@hotmail.com', '1', '02ecc6c8afccd0dd029bddc56641cd309a171f3e', '2017-12-28 20:54:38', '2017-12-28 20:54:38', null);

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `vw_orders` AS select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order`.`USER_ID` AS `USER_ID`,`customer_order`.`KITCHEN_ID` AS `KITCHEN_ID`,`customer_order`.`CHEF_ID` AS `CHEF_ID`,`customer_order`.`RIDER_ID` AS `RIDER_ID`,`tb_users`.`MOBILE` AS `MOBILE`,`tb_users`.`SURNAME` AS `SURNAME`,`tb_users`.`OTHER_NAMES` AS `OTHER_NAMES`,`customer_order`.`ORDER_DATE` AS `ORDER_DATE`,`customer_order`.`ORDER_STATUS` AS `ORDER_STATUS`,`payment`.`PAYMENT_AMOUNT` AS `PAYMENT_AMOUNT`,`payment`.`PAYMENT_NUMBER` AS `PAYMENT_NUMBER`,`customer_order`.`NOTES` AS `NOTES`,`customer_address`.`ADDRESS_ID` AS `ADDRESS_ID`,`customer_order`.`PAYMENT_METHOD` AS `PAYMENT_METHOD`,`customer_order`.`CREATED_AT` AS `CREATED_AT`,`customer_order`.`UPDATED_AT` AS `UPDATED_AT`,`payment`.`PAYMENT_DATE` AS `PAYMENT_DATE` from (((`customer_order` join `tb_users` on((`customer_order`.`USER_ID` = `tb_users`.`USER_ID`)) ) join `customer_address` on((`customer_order`.`ADDRESS_ID` = `customer_address`.`ADDRESS_ID`))) join `payment` on((`payment`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) ;
