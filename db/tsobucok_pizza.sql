/*
Navicat MySQL Data Transfer

Source Server         : D_MYSQL Local
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : tsobucok_pizza

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-26 12:22:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for api_token
-- ----------------------------
DROP TABLE IF EXISTS `api_token`;
CREATE TABLE `api_token` (
  `TOKEN_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) DEFAULT NULL,
  `API_TOKEN` varchar(255) DEFAULT NULL,
  `DATE_CREATED` datetime DEFAULT NULL,
  `EXPIRY_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`TOKEN_ID`),
  KEY `DATE_CREATED` (`DATE_CREATED`,`EXPIRY_DATE`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `api_token_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_token
-- ----------------------------
INSERT INTO `api_token` VALUES ('1', '10', 'mekmxPsfPLfic0rMyUK7BKtjaj21VHoO', '2018-01-13 11:33:36', '2018-01-13 11:33:36');
INSERT INTO `api_token` VALUES ('2', '5', 'AswKCdHzmC_Qt3OSva_Q-AbrHTYDuvrn', '2018-01-21 18:37:53', '2018-01-21 18:37:53');
INSERT INTO `api_token` VALUES ('3', '57', 'a0nKvn3_l_opCOYxgNmLWNEK4z7tsuQJ', '2018-01-11 06:38:41', '2018-01-11 06:38:42');
INSERT INTO `api_token` VALUES ('4', '25', 'M0r3dWSsSK-Kxlbonup0zSJllCoNNEmr', '2018-01-20 00:17:45', '2018-01-20 00:17:45');
INSERT INTO `api_token` VALUES ('5', '58', 'tISoX9J_nQjrV1FoC0qAlxQH6WR2h27I', '2018-01-14 14:44:41', '2018-01-14 14:44:41');
INSERT INTO `api_token` VALUES ('6', '56', '2kIh98vJNf_WbmKpTJvxww8oI2CafzFt', '2018-01-24 19:58:08', '2018-01-24 19:58:08');
INSERT INTO `api_token` VALUES ('7', '49', 'SZCAoVkkkJHIj_T71eTbZcAmGwUVyHLJ', '2018-01-25 19:24:04', '2018-01-25 19:24:04');
INSERT INTO `api_token` VALUES ('8', '60', 'zYt574rj01G2Uzvr3zdt29yGsjznRG1o', '2018-01-15 09:49:05', '2018-01-15 09:49:05');
INSERT INTO `api_token` VALUES ('9', '59', 'Juzf-7UJte0j6U8VffVvrJD744T0RJu3', '2018-01-15 09:50:43', '2018-01-15 09:50:43');
INSERT INTO `api_token` VALUES ('10', '61', 'OcOHZl0kwkP02pZqZhhJ7XBKzNiDfpoH', '2018-01-15 15:28:18', '2018-01-15 15:28:18');
INSERT INTO `api_token` VALUES ('11', '63', 'CFtLREcAjXxCDRVixDz13Zbwh7LLvHi3', '2018-01-15 18:01:53', '2018-01-15 18:01:53');
INSERT INTO `api_token` VALUES ('12', '64', 'C7mDtH8rZG496xYG1W87YnsL84yDyJGM', '2018-01-19 20:18:27', '2018-01-19 20:18:28');
INSERT INTO `api_token` VALUES ('13', '65', 'rSXTfj4KqRJoBFsupu1Mf2pJM7R0QmMj', '2018-01-21 13:13:47', '2018-01-21 13:13:47');
INSERT INTO `api_token` VALUES ('14', '70', 'Fq7I2--knQefmu0es5TdleLzhMz7WXUQ', '2018-01-17 15:37:50', '2018-01-17 15:37:50');
INSERT INTO `api_token` VALUES ('15', '71', 'WnCmThCpHdl4dUt_-neGYyl-g42YuY7v', '2018-01-17 16:14:13', '2018-01-17 16:14:13');
INSERT INTO `api_token` VALUES ('16', '72', '6ZU6g3pfAag5va4X16oX4RRN5TxWK72-', '2018-01-17 16:21:41', '2018-01-17 16:21:41');
INSERT INTO `api_token` VALUES ('17', '73', 'oMm-coF1BC9ZfGG_GDyZP3vZPEut2Y0G', '2018-01-17 18:43:29', '2018-01-17 18:43:29');
INSERT INTO `api_token` VALUES ('18', '74', 'BHOfOB7Tui6hL7dz4uNclP7PD95Z4Smn', '2018-01-17 18:56:08', '2018-01-17 18:56:08');
INSERT INTO `api_token` VALUES ('19', '75', 'rxk9FrtU5qdBzCqcIgSDXvOdRxtYFG0I', '2018-01-17 19:05:16', '2018-01-17 19:05:16');
INSERT INTO `api_token` VALUES ('20', '76', 'Q6iPgB5vDz0vUo5dYSRSRDNa-89zgHsr', '2018-01-17 19:11:57', '2018-01-17 19:11:57');
INSERT INTO `api_token` VALUES ('21', '77', 'sBT_ZfCtO3iHieynGuTeYfsTVg0c1Fwf', '2018-01-17 19:52:14', '2018-01-17 19:52:14');
INSERT INTO `api_token` VALUES ('22', '78', '7PM4T3d4OUsyP0mD6GmjpsCioysoYtGr', '2018-01-18 09:25:19', '2018-01-18 09:25:20');
INSERT INTO `api_token` VALUES ('23', '80', '4Di7e_UAZpS9nESK8Vpfa5rgB-4G1FV-', '2018-01-18 10:03:56', '2018-01-18 10:03:56');
INSERT INTO `api_token` VALUES ('24', '82', '4t8QMdlicwipAGpbZbBoQzaUmHDX6sm5', '2018-01-18 11:42:04', '2018-01-18 11:42:04');
INSERT INTO `api_token` VALUES ('25', '83', 'bphUAFycQR_JWO_fppizj-Y4sj3T6ldn', '2018-01-18 13:37:45', '2018-01-18 13:37:45');
INSERT INTO `api_token` VALUES ('26', '84', 'xBMpujFyYsuy4RXQxPBarvI-OgxfPBMe', '2018-01-18 16:49:41', '2018-01-18 16:49:41');
INSERT INTO `api_token` VALUES ('27', '85', 'ziNwfp5ACCZzmyiRxNxvwnXhbylTQWVE', '2018-01-18 17:16:32', '2018-01-18 17:16:32');
INSERT INTO `api_token` VALUES ('28', '11', 'ItgeZH8vwEmUor5bxYFTVU1Pwvk5UwXT', '2018-01-20 00:17:16', '2018-01-20 00:17:16');
INSERT INTO `api_token` VALUES ('29', '86', 'XRA-fHifB40AK3gHMXhYiE5BvyMYrmNN', '2018-01-18 20:14:11', '2018-01-18 20:14:11');
INSERT INTO `api_token` VALUES ('30', '87', 'a-ZN13abI7qD2BEtr-7krTU3LCh9wFgP', '2018-01-18 22:52:00', '2018-01-18 22:52:00');
INSERT INTO `api_token` VALUES ('31', '88', 'EC7kJCaN5zjoawCrEDkaDyF8gkYoWnnA', '2018-01-20 18:46:27', '2018-01-20 18:46:27');
INSERT INTO `api_token` VALUES ('32', '89', 'a82lbSI-aALJFAlMgPUnjOwXF406nhEx', '2018-01-22 22:56:12', '2018-01-22 22:56:12');
INSERT INTO `api_token` VALUES ('33', '90', 'qmKO3I9K-URSJde4YNDZya-TJ5zxcoJl', '2018-01-20 20:45:03', '2018-01-20 20:45:03');
INSERT INTO `api_token` VALUES ('34', '91', 'E8fwLWcFNdbTD99OTpHnuziNa83ezK1W', '2018-01-21 06:26:18', '2018-01-21 06:26:18');
INSERT INTO `api_token` VALUES ('35', '92', 'by8EsnvuJlOvvnf8WfnjV8wpkyWu9qiT', '2018-01-21 15:06:23', '2018-01-21 15:06:23');
INSERT INTO `api_token` VALUES ('36', '93', 'yKU_NPMsAOeYtN39J2K8nw5IPeyK4PYo', '2018-01-21 21:57:53', '2018-01-21 21:57:53');
INSERT INTO `api_token` VALUES ('37', '94', 'vrI52TcK2CrJnIHpzJ9BApAsWnW7U1nM', '2018-01-21 22:08:00', '2018-01-21 22:08:00');
INSERT INTO `api_token` VALUES ('38', '95', 'CsPBW_Ql2TEiLh5XHr6Yy4HJFYjXas9q', '2018-01-21 22:26:11', '2018-01-21 22:26:11');
INSERT INTO `api_token` VALUES ('39', '96', 'sobdmgPs9Egc_JJ-gLZKPI9ArgRpTbEl', '2018-01-21 22:45:38', '2018-01-21 22:45:38');
INSERT INTO `api_token` VALUES ('40', '97', '3qdL1c6RsyFC0WA4qfTqQGiXj9tVRAVe', '2018-01-25 11:13:20', '2018-01-25 11:13:20');
INSERT INTO `api_token` VALUES ('41', '98', '6Djzx1lDQPwFEU8VAtz5K1-pBMTAZzwo', '2018-01-22 14:58:21', '2018-01-22 14:58:21');
INSERT INTO `api_token` VALUES ('42', '99', 'kQYlWcjmNoQFB4Nqe__B2flqo-ophg9S', '2018-01-22 17:59:37', '2018-01-22 17:59:37');
INSERT INTO `api_token` VALUES ('43', '100', 'BY2XkHrN5vbNaoCczX6_9s-8EZmnC94m', '2018-01-22 18:13:53', '2018-01-22 18:13:53');
INSERT INTO `api_token` VALUES ('44', '101', 'KFsLNShsRS4rpU9zBUcoU7_xQLQ_C-81', '2018-01-22 18:14:20', '2018-01-22 18:14:20');
INSERT INTO `api_token` VALUES ('45', '102', 'P9wUlwQ_L34eo8CeVz6PdKzkAq1GRscM', '2018-01-22 18:14:34', '2018-01-22 18:14:34');
INSERT INTO `api_token` VALUES ('46', '105', 'Px7yYK9g2m73DvCFIBgeqWPY4sWheM-y', '2018-01-22 18:33:06', '2018-01-22 18:33:06');
INSERT INTO `api_token` VALUES ('47', '106', 'LmrjD_piGbiyKsuYLNIcs1u2bMdS5VkI', '2018-01-22 18:39:41', '2018-01-22 18:39:41');
INSERT INTO `api_token` VALUES ('48', '108', 'pIYH3LkR4jPHq7Vih5OQ_-HQ3TIH-_Qq', '2018-01-22 18:55:25', '2018-01-22 18:55:25');
INSERT INTO `api_token` VALUES ('49', '109', 'h1XIzMnARVQleaA1plxnn5tYI3yAmssh', '2018-01-22 19:03:39', '2018-01-22 19:03:39');
INSERT INTO `api_token` VALUES ('50', '110', 'ei2cUMbeVlmRhUXcKL_ohaH774XBkqb2', '2018-01-22 19:35:34', '2018-01-22 19:35:34');
INSERT INTO `api_token` VALUES ('51', '113', '145Y10Je_TI12-sVyNYm2Qn--GVUrjcd', '2018-01-22 19:59:58', '2018-01-22 19:59:58');
INSERT INTO `api_token` VALUES ('52', '115', 'dO9J46R1pzpy64NI26d_-UUjHfjH83su', '2018-01-22 21:36:54', '2018-01-22 21:36:54');
INSERT INTO `api_token` VALUES ('53', '116', 'AJB2ZIazn6AUvJ8utoN1_xUBS62Ddc1o', '2018-01-22 21:54:33', '2018-01-22 21:54:33');
INSERT INTO `api_token` VALUES ('54', '117', 'cgGMbeOnH5DS1hcuIBwsWRR7i4Tjddbq', '2018-01-22 22:17:03', '2018-01-22 22:17:03');
INSERT INTO `api_token` VALUES ('55', '118', 'j54Bihz6imUF2RxznyxhlpTX_ip72ica', '2018-01-22 22:28:11', '2018-01-22 22:28:12');
INSERT INTO `api_token` VALUES ('56', '119', 'xTmew8bJmeGEGmu77GD_pW2zVFvUYyXi', '2018-01-22 22:59:14', '2018-01-22 22:59:14');
INSERT INTO `api_token` VALUES ('57', '120', 'f2_sdE1NMkOjZeGlv8-CCh2rrxRgtbnt', '2018-01-22 23:50:34', '2018-01-22 23:50:34');
INSERT INTO `api_token` VALUES ('58', '121', 'xFEDWrdG8_TLOD4GSoscKEPWu_I6eMcX', '2018-01-23 08:52:32', '2018-01-23 08:52:32');
INSERT INTO `api_token` VALUES ('59', '122', '_zRI2RUC0Xcqsh1bAK8Q8XHZFCkfZOwg', '2018-01-23 08:58:16', '2018-01-23 08:58:16');
INSERT INTO `api_token` VALUES ('60', '123', 'Fs8LDmkrUTUucCaFBC5829TNl4nCZhAE', '2018-01-23 10:40:43', '2018-01-23 10:40:44');
INSERT INTO `api_token` VALUES ('61', '124', '54tciXLTbk2salWT2ZDBpq6a0ZVS4nOd', '2018-01-23 11:25:22', '2018-01-23 11:25:22');
INSERT INTO `api_token` VALUES ('62', '125', 'VJuNwuGOH-UlHQ7NAJ9rbBWc9wy1G3YP', '2018-01-23 11:46:11', '2018-01-23 11:46:11');
INSERT INTO `api_token` VALUES ('63', '126', 'YoWYJwy6Ny4UkN8rE3Lx5fLb2Z7MxEMM', '2018-01-23 12:34:07', '2018-01-23 12:34:07');
INSERT INTO `api_token` VALUES ('64', '127', 'brVsNoL8m_N47r8Nk1kqHDJZsgqRGFHm', '2018-01-23 13:50:33', '2018-01-23 13:50:34');
INSERT INTO `api_token` VALUES ('65', '128', 'DX2gj9TZrETKnLZfK2nnHpN3U_ZlRdLm', '2018-01-23 14:26:03', '2018-01-23 14:26:03');
INSERT INTO `api_token` VALUES ('66', '129', 'LrKs1HQXRItJYG143vltKuXILfmDTyUH', '2018-01-23 15:20:55', '2018-01-23 15:20:55');
INSERT INTO `api_token` VALUES ('67', '130', 'O348jBSE7wcAKgehFluL5jN0iIYwuT_J', '2018-01-23 15:57:42', '2018-01-23 15:57:42');
INSERT INTO `api_token` VALUES ('68', '131', 'knzx66o7SiXiA94f96ig-u76o4urh5zh', '2018-01-23 16:50:45', '2018-01-23 16:50:45');
INSERT INTO `api_token` VALUES ('69', '133', 'HD8d9k8TAFrgD3QAkNW_4ogocgsNHqzL', '2018-01-23 18:51:53', '2018-01-23 18:51:53');
INSERT INTO `api_token` VALUES ('70', '134', 'dEZATPqXtKKCS3iypfuXTkMqmyv9kF4I', '2018-01-23 16:41:29', '2018-01-23 16:41:29');
INSERT INTO `api_token` VALUES ('71', '135', 'tUtlFbeEWehJi0p7XbJNAKiGdD7ru9EC', '2018-01-23 20:42:21', '2018-01-23 20:42:21');
INSERT INTO `api_token` VALUES ('72', '137', '-lKNuV5nDedjA3Q7mcDcod8l1UMZBqA0', '2018-01-23 21:12:51', '2018-01-23 21:12:51');
INSERT INTO `api_token` VALUES ('73', '139', 'z7vSU1B5ylTngKa4nJEpYAdl9IWuI5o_', '2018-01-23 22:06:00', '2018-01-23 22:06:00');
INSERT INTO `api_token` VALUES ('74', '140', 'TC_ZHkChsZv_3ZyN3GDxen34XCwM6L6j', '2018-01-23 22:12:18', '2018-01-23 22:12:18');
INSERT INTO `api_token` VALUES ('75', '141', 'z9f7hrEffxhkLbz3xf4Ami0F6xw9ccoF', '2018-01-23 23:45:48', '2018-01-23 23:45:48');
INSERT INTO `api_token` VALUES ('76', '142', 'xn5HEPEZs1jNyK73NHbyCgve_5_-yAuQ', '2018-01-24 01:12:14', '2018-01-24 01:12:14');
INSERT INTO `api_token` VALUES ('77', '143', 'yOVRr86CO2j5BjZDYNi7o-ORSwh-RLoY', '2018-01-24 02:47:24', '2018-01-24 02:47:24');
INSERT INTO `api_token` VALUES ('78', '138', 'Yc50nS7PMKg_DxGLcvCrr1bm13mOMwCY', '2018-01-24 10:32:17', '2018-01-24 10:32:17');
INSERT INTO `api_token` VALUES ('80', '147', 'Vxwk0mB9xuCeXPRxE5iTu6TT_yv4dMUa', '2018-01-24 16:48:11', '2018-01-24 16:48:11');
INSERT INTO `api_token` VALUES ('81', '148', '0r3c2ipD_XxjD-DlzUXzJSD_-Qktmjgi', '2018-01-24 16:59:59', '2018-01-24 16:59:59');
INSERT INTO `api_token` VALUES ('82', '149', 'KVpKfkZ-iuQ8_DcIzA1LO7oYoK_mL_oC', '2018-01-24 17:17:23', '2018-01-24 17:17:23');
INSERT INTO `api_token` VALUES ('83', '150', 'm6Kvuoup9_6aYAy0NVlNatnQNmvnraVy', '2018-01-24 17:48:04', '2018-01-24 17:48:04');
INSERT INTO `api_token` VALUES ('84', '151', '2oBYLA2qq-RZ_0QIEDloEXAPIm1hSPoJ', '2018-01-24 18:11:15', '2018-01-24 18:11:15');
INSERT INTO `api_token` VALUES ('85', '153', 'X_7Gd6ryMnUpMjq1fcorrjtTKcWh1Qj0', '2018-01-24 18:28:44', '2018-01-24 18:28:44');
INSERT INTO `api_token` VALUES ('86', '154', 'zxlgeGudlJTFDSBSRPe0xLm4K2ZcNkFa', '2018-01-25 23:16:45', '2018-01-25 23:16:45');
INSERT INTO `api_token` VALUES ('87', '155', 'iKorWN-_m1yqZMFVXTEmYYRBmTiFpgB4', '2018-01-24 20:54:34', '2018-01-24 20:54:34');
INSERT INTO `api_token` VALUES ('88', '156', '17LY_MCmGZ2FlqGTASFczpxJ4_5G-Nan', '2018-01-24 20:53:36', '2018-01-24 20:53:36');
INSERT INTO `api_token` VALUES ('89', '157', 'AwQFKrideIGxYtdmDaYUcnDBh3Ih_mmm', '2018-01-25 01:32:20', '2018-01-25 01:32:20');
INSERT INTO `api_token` VALUES ('90', '158', 'xtQSTDyoud-4EPuqEt3BzhU0W0GJj7BN', '2018-01-25 11:23:22', '2018-01-25 11:23:22');
INSERT INTO `api_token` VALUES ('91', '159', 'YZpnc1UE1iVynVSunwc6ZL8QoQjst2s9', '2018-01-25 11:35:30', '2018-01-25 11:35:30');
INSERT INTO `api_token` VALUES ('92', '160', '7stj-YLJs6503h3Zao2UWPmv9Uo5N1s3', '2018-01-25 12:04:33', '2018-01-25 12:04:33');
INSERT INTO `api_token` VALUES ('93', '163', 'JWlqDWfs0oO1hgZPkLwZaRnxOzGE5J2s', '2018-01-25 16:34:32', '2018-01-25 16:34:32');
INSERT INTO `api_token` VALUES ('94', '165', 'zZl2lxCWBhK-XrEQySG3nNwUvy7vxysA', '2018-01-25 17:19:52', '2018-01-25 17:19:52');
INSERT INTO `api_token` VALUES ('95', '166', 'MmxCFA8-9AE5Oi7LmV1qAsdsc4JahwMk', '2018-01-25 23:17:27', '2018-01-25 23:17:27');
INSERT INTO `api_token` VALUES ('96', '167', 'tfjepPmOAgGal90PnZBxtpYK5-q_5uyS', '2018-01-25 23:49:11', '2018-01-25 23:49:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chef
-- ----------------------------
INSERT INTO `chef` VALUES ('4', 'FAYSAL', '1');

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
-- Table structure for customer_order
-- ----------------------------
DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE `customer_order` (
  `ORDER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) NOT NULL,
  `LOCATION_ID` bigint(20) NOT NULL,
  `KITCHEN_ID` bigint(10) DEFAULT NULL,
  `CHEF_ID` bigint(10) DEFAULT NULL,
  `RIDER_ID` bigint(10) DEFAULT NULL,
  `ORDER_DATE` datetime NOT NULL,
  `PAYMENT_METHOD` varchar(20) NOT NULL,
  `ORDER_STATUS` varchar(30) NOT NULL COMMENT 'Status of the order',
  `ORDER_TIME` varchar(20) DEFAULT NULL,
  `NOTES` varchar(255) DEFAULT NULL COMMENT 'Can contain payment text from mobile transactions etc',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `User_ID` (`USER_ID`) USING BTREE,
  KEY `Location_ID` (`LOCATION_ID`) USING BTREE,
  KEY `customer_order_ibfk_3` (`RIDER_ID`) USING BTREE,
  KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE,
  KEY `ORDER_STATUS` (`ORDER_STATUS`) USING BTREE,
  KEY `CHEF_ID` (`CHEF_ID`) USING BTREE,
  CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`RIDER_ID`) REFERENCES `riders` (`RIDER_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_4` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_5` FOREIGN KEY (`ORDER_STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_6` FOREIGN KEY (`CHEF_ID`) REFERENCES `chef` (`CHEF_ID`) ON UPDATE CASCADE,
  CONSTRAINT `customer_order_ibfk_7` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1107 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_order
-- ----------------------------
INSERT INTO `customer_order` VALUES ('1000', '65', '14', '1', '4', null, '2018-01-17 13:23:08', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-17 13:23:08', '2018-01-22 17:47:47');
INSERT INTO `customer_order` VALUES ('1001', '25', '3', '1', '4', '5', '2018-01-17 13:25:08', 'MOBILE', 'ORDER READY', null, null, '2018-01-17 13:25:08', '2018-01-18 13:31:38');
INSERT INTO `customer_order` VALUES ('1002', '25', '2', '1', '4', '5', '2018-01-17 14:22:09', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 14:22:09', '2018-01-17 14:39:10');
INSERT INTO `customer_order` VALUES ('1003', '25', '1', '1', '4', null, '2018-01-17 14:44:26', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-17 14:44:26', '2018-01-22 17:49:27');
INSERT INTO `customer_order` VALUES ('1004', '70', '5', '1', '4', null, '2018-01-17 15:39:20', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-17 15:39:20', '2018-01-22 17:50:14');
INSERT INTO `customer_order` VALUES ('1005', '63', '5', '1', '4', '5', '2018-01-17 15:47:14', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 15:47:15', '2018-01-17 18:34:42');
INSERT INTO `customer_order` VALUES ('1006', '71', '6', '1', '4', null, '2018-01-17 16:15:23', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-17 16:15:23', '2018-01-22 17:50:38');
INSERT INTO `customer_order` VALUES ('1007', '25', '15', '1', '4', '6', '2018-01-17 16:19:45', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 16:19:45', '2018-01-17 16:54:10');
INSERT INTO `customer_order` VALUES ('1008', '72', '6', '1', '4', '5', '2018-01-17 16:25:03', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 16:25:03', '2018-01-17 16:56:31');
INSERT INTO `customer_order` VALUES ('1009', '53', '13', '1', '4', '5', '2018-01-17 17:48:31', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 17:48:31', '2018-01-17 18:34:29');
INSERT INTO `customer_order` VALUES ('1010', '49', '2', '1', '4', '6', '2018-01-17 18:44:37', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-17 18:44:38', '2018-01-17 18:47:33');
INSERT INTO `customer_order` VALUES ('1011', '80', '5', '1', '4', null, '2018-01-18 10:05:57', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 10:05:58', '2018-01-22 17:51:00');
INSERT INTO `customer_order` VALUES ('1012', '83', '12', '1', '4', null, '2018-01-18 13:40:26', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 13:40:26', '2018-01-22 17:51:59');
INSERT INTO `customer_order` VALUES ('1013', '60', '5', '1', '4', null, '2018-01-18 14:20:10', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 14:20:10', '2018-01-22 17:52:52');
INSERT INTO `customer_order` VALUES ('1014', '82', '5', '1', '4', '6', '2018-01-18 16:49:07', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-18 16:49:07', '2018-01-18 18:26:29');
INSERT INTO `customer_order` VALUES ('1015', '84', '3', '1', '4', null, '2018-01-18 16:53:56', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 16:53:56', '2018-01-22 17:53:45');
INSERT INTO `customer_order` VALUES ('1016', '29', '6', '1', '4', null, '2018-01-18 17:05:49', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 17:05:49', '2018-01-20 16:08:57');
INSERT INTO `customer_order` VALUES ('1017', '85', '5', '1', '4', null, '2018-01-18 17:17:33', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 17:17:33', '2018-01-22 17:54:08');
INSERT INTO `customer_order` VALUES ('1018', '25', '2', '1', '4', null, '2018-01-18 20:01:28', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 20:01:28', '2018-01-22 17:53:23');
INSERT INTO `customer_order` VALUES ('1019', '86', '12', '1', '4', null, '2018-01-18 20:17:23', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-18 20:17:23', '2018-01-20 16:03:22');
INSERT INTO `customer_order` VALUES ('1020', '25', '15', '1', '4', null, '2018-01-19 14:25:35', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-19 14:25:36', '2018-01-20 15:23:32');
INSERT INTO `customer_order` VALUES ('1021', '82', '5', '1', '4', null, '2018-01-19 18:51:13', 'MOBILE', 'ORDER CONFIRMED', null, null, '2018-01-19 18:51:14', '2018-01-25 17:09:00');
INSERT INTO `customer_order` VALUES ('1022', '25', '1', '1', '4', null, '2018-01-19 22:14:14', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-19 22:14:15', '2018-01-22 17:52:31');
INSERT INTO `customer_order` VALUES ('1023', '80', '5', '1', '4', null, '2018-01-19 23:07:03', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-19 23:07:04', '2018-01-22 17:51:34');
INSERT INTO `customer_order` VALUES ('1024', '57', '12', '1', '4', null, '2018-01-20 11:50:00', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-20 11:50:00', '2018-01-22 17:48:13');
INSERT INTO `customer_order` VALUES ('1025', '57', '12', '1', '4', null, '2018-01-20 11:57:57', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-20 11:57:57', '2018-01-20 12:00:59');
INSERT INTO `customer_order` VALUES ('1026', '57', '12', '1', '4', '6', '2018-01-20 12:11:09', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 12:11:09', '2018-01-20 16:56:50');
INSERT INTO `customer_order` VALUES ('1027', '25', '2', '1', '4', null, '2018-01-20 15:59:10', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-20 15:59:11', '2018-01-20 16:05:18');
INSERT INTO `customer_order` VALUES ('1028', '84', '16', '1', '4', '6', '2018-01-20 16:20:16', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 16:20:17', '2018-01-20 19:06:51');
INSERT INTO `customer_order` VALUES ('1029', '29', '12', '1', '4', '6', '2018-01-20 16:50:24', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 16:50:24', '2018-01-20 17:11:48');
INSERT INTO `customer_order` VALUES ('1030', '72', '6', '1', '4', null, '2018-01-20 18:40:39', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-20 18:40:39', '2018-01-22 17:47:09');
INSERT INTO `customer_order` VALUES ('1031', '72', '6', '1', '4', '6', '2018-01-20 18:41:57', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 18:41:57', '2018-01-20 19:04:21');
INSERT INTO `customer_order` VALUES ('1032', '88', '6', '1', '4', null, '2018-01-20 18:48:49', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-20 18:48:49', '2018-01-21 15:55:41');
INSERT INTO `customer_order` VALUES ('1033', '83', '6', '1', null, '6', '2018-01-20 19:58:46', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 19:58:46', '2018-01-20 20:26:38');
INSERT INTO `customer_order` VALUES ('1034', '84', '16', '1', '4', '5', '2018-01-20 20:13:26', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-20 20:13:27', '2018-01-20 20:26:59');
INSERT INTO `customer_order` VALUES ('1035', '71', '6', '1', '4', '6', '2018-01-21 13:03:13', 'MOBILE', 'RIDER DISPATCHED', null, null, '2018-01-21 13:03:13', '2018-01-21 16:13:52');
INSERT INTO `customer_order` VALUES ('1036', '94', '5', '1', '4', null, '2018-01-21 22:09:56', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-21 22:09:56', '2018-01-22 17:45:12');
INSERT INTO `customer_order` VALUES ('1037', '84', '16', '1', '4', null, '2018-01-22 12:24:53', 'MOBILE', 'CHEF ASSIGNED', null, null, '2018-01-22 12:24:53', '2018-01-22 17:46:47');
INSERT INTO `customer_order` VALUES ('1039', '98', '12', '1', '4', null, '2018-01-22 14:59:38', 'MOBILE', 'CHEF ASSIGNED', '15:00', null, '2018-01-22 14:59:39', '2018-01-22 17:46:22');
INSERT INTO `customer_order` VALUES ('1040', '99', '16', '1', '4', null, '2018-01-22 18:03:14', 'MOBILE', 'CHEF ASSIGNED', '19:00', null, '2018-01-22 18:03:14', '2018-01-22 19:33:32');
INSERT INTO `customer_order` VALUES ('1041', '100', '13', '1', '4', '5', '2018-01-22 18:19:04', 'MOBILE', 'RIDER DISPATCHED', '19:00', null, '2018-01-22 18:19:04', '2018-01-22 19:09:59');
INSERT INTO `customer_order` VALUES ('1042', '99', '16', '1', '4', '5', '2018-01-22 18:36:53', 'MOBILE', 'RIDER DISPATCHED', '19:00', null, '2018-01-22 18:36:53', '2018-01-22 19:09:15');
INSERT INTO `customer_order` VALUES ('1043', '108', '14', '1', '4', '6', '2018-01-22 19:06:56', 'MOBILE', 'RIDER DISPATCHED', '07:00', null, '2018-01-22 19:06:56', '2018-01-25 20:28:48');
INSERT INTO `customer_order` VALUES ('1044', '109', '16', '1', '4', '5', '2018-01-22 19:10:40', 'MOBILE', 'RIDER DISPATCHED', '20:00', null, '2018-01-22 19:10:41', '2018-01-22 20:39:41');
INSERT INTO `customer_order` VALUES ('1045', '110', '5', '1', '4', null, '2018-01-22 19:41:18', 'MOBILE', 'CHEF ASSIGNED', '00:00', null, '2018-01-22 19:41:18', '2018-01-23 18:35:15');
INSERT INTO `customer_order` VALUES ('1047', '64', '14', '1', null, '5', '2018-01-22 21:09:29', 'MOBILE', 'RIDER DISPATCHED', '01:00', null, '2018-01-22 21:09:30', '2018-01-22 21:41:10');
INSERT INTO `customer_order` VALUES ('1048', '64', '4', '1', '4', '7', '2018-01-22 21:19:58', 'MOBILE', 'RIDER DISPATCHED', '03:00', null, '2018-01-22 21:19:58', '2018-01-25 20:31:17');
INSERT INTO `customer_order` VALUES ('1049', '64', '5', '1', '4', '5', '2018-01-22 21:28:19', 'MOBILE', 'RIDER DISPATCHED', '01:00', null, '2018-01-22 21:28:20', '2018-01-22 21:37:24');
INSERT INTO `customer_order` VALUES ('1050', '122', '4', '1', '4', null, '2018-01-23 09:01:01', 'MOBILE', 'CHEF ASSIGNED', '07:00', null, '2018-01-23 09:01:03', '2018-01-23 18:37:09');
INSERT INTO `customer_order` VALUES ('1051', '124', '5', '1', '4', null, '2018-01-23 11:28:26', 'MOBILE', 'CHEF ASSIGNED', '03:00', null, '2018-01-23 11:28:26', '2018-01-23 18:37:32');
INSERT INTO `customer_order` VALUES ('1052', '125', '11', '1', '4', null, '2018-01-23 11:49:08', 'MOBILE', 'CHEF ASSIGNED', '21:00', null, '2018-01-23 11:49:08', '2018-01-23 18:37:52');
INSERT INTO `customer_order` VALUES ('1053', '29', '5', '1', '4', '5', '2018-01-23 15:52:53', 'MOBILE', 'RIDER DISPATCHED', '04:00', null, '2018-01-23 15:52:54', '2018-01-23 16:21:36');
INSERT INTO `customer_order` VALUES ('1055', '113', '16', '1', '4', null, '2018-01-23 16:44:17', 'MOBILE', 'CHEF ASSIGNED', '17:00', null, '2018-01-23 16:44:17', '2018-01-23 18:38:47');
INSERT INTO `customer_order` VALUES ('1056', '131', '16', '1', '4', '5', '2018-01-23 16:54:11', 'MOBILE', 'RIDER DISPATCHED', '17:00', null, '2018-01-23 16:54:11', '2018-01-23 17:27:22');
INSERT INTO `customer_order` VALUES ('1058', '124', '5', '1', '4', '7', '2018-01-23 17:47:06', 'MOBILE', 'RIDER DISPATCHED', '07:00', null, '2018-01-23 17:47:06', '2018-01-23 18:02:01');
INSERT INTO `customer_order` VALUES ('1060', '25', '4', '1', '4', null, '2018-01-23 16:36:38', 'MOBILE', 'CHEF ASSIGNED', '08:00', null, '2018-01-23 16:36:38', '2018-01-23 16:37:14');
INSERT INTO `customer_order` VALUES ('1061', '64', '2', '1', '4', null, '2018-01-24 13:06:23', 'MOBILE', 'CHEF ASSIGNED', '03:00', null, '2018-01-24 13:06:23', '2018-01-24 13:08:09');
INSERT INTO `customer_order` VALUES ('1062', '64', '2', '1', '4', null, '2018-01-24 13:06:56', 'MOBILE', 'CHEF ASSIGNED', '01:00', null, '2018-01-24 13:06:56', '2018-01-24 13:08:37');
INSERT INTO `customer_order` VALUES ('1063', '29', '6', '1', '4', '7', '2018-01-24 16:30:59', 'MOBILE', 'RIDER DISPATCHED', '05:00', null, '2018-01-24 16:31:00', '2018-01-24 17:10:15');
INSERT INTO `customer_order` VALUES ('1064', '147', '6', '1', '4', null, '2018-01-24 16:48:45', 'MOBILE', 'CHEF ASSIGNED', '07:00', null, '2018-01-24 16:48:45', '2018-01-24 18:10:33');
INSERT INTO `customer_order` VALUES ('1065', '150', '12', '1', '4', '5', '2018-01-24 17:51:32', 'MOBILE', 'RIDER DISPATCHED', '20:00', null, '2018-01-24 17:51:32', '2018-01-24 18:18:00');
INSERT INTO `customer_order` VALUES ('1066', '64', '6', '1', '4', '7', '2018-01-24 18:05:47', 'MOBILE', 'RIDER DISPATCHED', '18:00', null, '2018-01-24 18:05:47', '2018-01-24 18:36:24');
INSERT INTO `customer_order` VALUES ('1067', '151', '6', '1', '4', null, '2018-01-24 18:12:28', 'MOBILE', 'CHEF ASSIGNED', '07:00', null, '2018-01-24 18:12:28', '2018-01-24 19:22:50');
INSERT INTO `customer_order` VALUES ('1068', '29', '6', '1', '4', '5', '2018-01-24 18:21:59', 'MOBILE', 'RIDER DISPATCHED', '06:00', null, '2018-01-24 18:21:59', '2018-01-24 19:21:12');
INSERT INTO `customer_order` VALUES ('1069', '139', '15', '1', '4', '5', '2018-01-24 19:04:02', 'MOBILE', 'RIDER DISPATCHED', '10:00', null, '2018-01-24 19:04:02', '2018-01-24 19:22:08');
INSERT INTO `customer_order` VALUES ('1071', '64', '16', null, null, null, '2018-01-24 20:15:51', 'MOBILE', 'ORDER CANCELLED', '08:00', null, '2018-01-24 20:15:51', '2018-01-25 20:54:28');
INSERT INTO `customer_order` VALUES ('1072', '64', '16', '1', '4', '7', '2018-01-24 20:16:27', 'MOBILE', 'RIDER DISPATCHED', '08:00', null, '2018-01-24 20:16:27', '2018-01-24 22:06:58');
INSERT INTO `customer_order` VALUES ('1073', '155', '1', '1', '4', '7', '2018-01-24 20:43:57', 'MOBILE', 'RIDER DISPATCHED', '21:00', null, '2018-01-24 20:43:58', '2018-01-24 22:06:41');
INSERT INTO `customer_order` VALUES ('1074', '155', '6', '1', '4', '7', '2018-01-24 21:02:02', 'MOBILE', 'RIDER DISPATCHED', '21:00', null, '2018-01-24 21:02:02', '2018-01-24 22:06:18');
INSERT INTO `customer_order` VALUES ('1075', '64', '6', '1', '4', '7', '2018-01-24 21:23:27', 'MOBILE', 'RIDER DISPATCHED', '21:00', null, '2018-01-24 21:23:27', '2018-01-24 22:05:57');
INSERT INTO `customer_order` VALUES ('1076', '64', '4', '1', '4', '7', '2018-01-24 21:34:52', 'MOBILE', 'RIDER DISPATCHED', '21:00', null, '2018-01-24 21:34:52', '2018-01-24 22:05:43');
INSERT INTO `customer_order` VALUES ('1077', '64', '16', '1', '4', '7', '2018-01-24 21:49:09', 'MOBILE', 'RIDER DISPATCHED', '21:00', null, '2018-01-24 21:49:09', '2018-01-24 22:05:24');
INSERT INTO `customer_order` VALUES ('1078', '157', '12', null, null, null, '2018-01-25 01:36:31', 'MOBILE', 'PAYMENT PENDING', '04:00', null, '2018-01-25 01:36:31', '2018-01-25 14:33:44');
INSERT INTO `customer_order` VALUES ('1079', '29', '5', '1', '4', null, '2018-01-25 14:37:01', 'MOBILE', 'PAYMENT PENDING', '06:00', null, '2018-01-25 14:37:01', '2018-01-25 16:47:12');
INSERT INTO `customer_order` VALUES ('1080', '157', '13', '1', '4', null, '2018-01-25 15:03:41', 'MOBILE', 'PAYMENT PENDING', '03:00', null, '2018-01-25 15:03:41', '2018-01-25 16:41:33');
INSERT INTO `customer_order` VALUES ('1081', '64', '5', null, null, null, '2018-01-25 16:37:58', 'MOBILE', 'PAYMENT PENDING', '04:00', null, '2018-01-25 16:37:58', '2018-01-25 20:15:55');
INSERT INTO `customer_order` VALUES ('1082', '64', '5', '1', '4', null, '2018-01-25 16:40:25', 'MOBILE', 'PAYMENT PENDING', '04:00', null, '2018-01-25 16:40:25', '2018-01-25 16:40:44');
INSERT INTO `customer_order` VALUES ('1083', '64', '5', '1', '4', null, '2018-01-25 16:43:23', 'MOBILE', 'PAYMENT PENDING', '05:00', null, '2018-01-25 16:43:24', '2018-01-25 16:44:25');
INSERT INTO `customer_order` VALUES ('1084', '64', '5', '1', '4', null, '2018-01-25 16:46:13', 'MOBILE', 'PAYMENT PENDING', '06:00', null, '2018-01-25 16:46:13', '2018-01-25 16:46:34');
INSERT INTO `customer_order` VALUES ('1085', '64', '5', '1', '4', null, '2018-01-25 16:53:31', 'MOBILE', 'PAYMENT PENDING', '05:00', null, '2018-01-25 16:53:31', '2018-01-25 16:53:54');
INSERT INTO `customer_order` VALUES ('1086', '64', '5', '1', '4', null, '2018-01-25 16:56:26', 'MOBILE', 'ORDER CONFIRMED', '05:00', null, '2018-01-25 16:56:26', '2018-01-25 20:52:06');
INSERT INTO `customer_order` VALUES ('1088', '25', '4', '1', '4', '5', '2018-01-25 17:05:40', 'MOBILE', 'RIDER DISPATCHED', '04:00', null, '2018-01-25 17:05:40', '2018-01-25 20:38:49');
INSERT INTO `customer_order` VALUES ('1089', '25', '2', '1', '4', null, '2018-01-25 17:09:58', 'MOBILE', 'ORDER CANCELLED', '07:00', null, '2018-01-25 17:09:58', '2018-01-25 18:44:37');
INSERT INTO `customer_order` VALUES ('1090', '65', '5', '1', '4', null, '2018-01-25 17:14:10', 'MOBILE', 'CHEF ASSIGNED', '08:00', null, '2018-01-25 17:14:11', '2018-01-25 18:57:09');
INSERT INTO `customer_order` VALUES ('1091', '64', '5', '1', '4', null, '2018-01-25 17:15:30', 'MOBILE', 'ORDER CANCELLED', '04:00', null, '2018-01-25 17:15:30', '2018-01-25 18:43:51');
INSERT INTO `customer_order` VALUES ('1092', '165', '16', '1', '4', null, '2018-01-25 17:20:50', 'MOBILE', 'ORDER CANCELLED', '05:00', null, '2018-01-25 17:20:50', '2018-01-25 18:43:36');
INSERT INTO `customer_order` VALUES ('1093', '165', '16', '1', '4', null, '2018-01-25 17:22:21', 'MOBILE', 'ORDER CANCELLED', '07:00', null, '2018-01-25 17:22:21', '2018-01-25 18:43:20');
INSERT INTO `customer_order` VALUES ('1094', '64', '16', '1', '4', null, '2018-01-25 17:26:36', 'MOBILE', 'ORDER CANCELLED', '06:00', null, '2018-01-25 17:26:36', '2018-01-25 18:42:56');
INSERT INTO `customer_order` VALUES ('1096', '64', '5', '1', '4', null, '2018-01-25 18:21:59', 'MOBILE', 'ORDER CONFIRMED', '05:00', null, '2018-01-25 18:21:59', '2018-01-25 18:22:24');
INSERT INTO `customer_order` VALUES ('1098', '64', '16', '1', '4', '7', '2018-01-25 18:26:59', 'MOBILE', 'RIDER DISPATCHED', '05:00', null, '2018-01-25 18:26:59', '2018-01-25 20:29:23');
INSERT INTO `customer_order` VALUES ('1101', '84', '16', '1', '4', null, '2018-01-25 19:23:46', 'MOBILE', 'ORDER CANCELLED', '20:00', null, '2018-01-25 19:23:46', '2018-01-25 20:20:47');
INSERT INTO `customer_order` VALUES ('1102', '84', '6', '1', '4', null, '2018-01-25 19:25:53', 'MOBILE', 'ORDER CANCELLED', '20:00', null, '2018-01-25 19:25:53', '2018-01-25 20:20:34');
INSERT INTO `customer_order` VALUES ('1103', '64', '16', '1', null, null, '2018-01-25 19:27:11', 'MOBILE', 'ORDER CANCELLED', '05:00', null, '2018-01-25 19:27:11', '2018-01-25 20:20:15');
INSERT INTO `customer_order` VALUES ('1104', '25', '1', '1', '4', null, '2018-01-25 20:45:27', 'MOBILE', 'ORDER CANCELLED', '11:00', null, '2018-01-25 20:45:27', '2018-01-25 20:46:35');
INSERT INTO `customer_order` VALUES ('1105', '64', '4', '1', '4', null, '2018-01-25 20:48:38', 'MOBILE', 'ORDER CONFIRMED', '05:00', null, '2018-01-25 20:48:38', '2018-01-25 20:49:10');
INSERT INTO `customer_order` VALUES ('1106', '166', '12', null, null, null, '2018-01-25 23:22:39', 'MOBILE', 'PAYMENT PENDING', '01:00', null, '2018-01-25 23:22:39', '2018-01-25 23:22:39');

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
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer_order_item
-- ----------------------------
INSERT INTO `customer_order_item` VALUES ('221', '1000', '37', '1', '11', '11', 'N/A', null, '2018-01-17 13:23:08', null);
INSERT INTO `customer_order_item` VALUES ('222', '1000', '3', '1', '13', '13', 'N/A', null, '2018-01-17 13:23:08', null);
INSERT INTO `customer_order_item` VALUES ('223', '1000', '3', '1', '13', '13', 'N/A', null, '2018-01-17 13:23:08', null);
INSERT INTO `customer_order_item` VALUES ('224', '1000', '27', '1', '1', '1', 'N/A', null, '2018-01-17 13:23:08', null);
INSERT INTO `customer_order_item` VALUES ('225', '1001', '23', '1', '1', '1', 'N/A', null, '2018-01-17 13:25:08', null);
INSERT INTO `customer_order_item` VALUES ('226', '1002', '3', '1', '13', '13', 'N/A', null, '2018-01-17 14:22:09', null);
INSERT INTO `customer_order_item` VALUES ('227', '1003', '23', '1', '1', '1', 'N/A', null, '2018-01-17 14:44:26', null);
INSERT INTO `customer_order_item` VALUES ('228', '1004', '5', '1', '13', '13', 'N/A', null, '2018-01-17 15:39:20', null);
INSERT INTO `customer_order_item` VALUES ('229', '1005', '38', '1', '13', '13', 'N/A', null, '2018-01-17 15:47:14', null);
INSERT INTO `customer_order_item` VALUES ('230', '1006', '36', '1', '13', '13', 'N/A', null, '2018-01-17 16:15:23', null);
INSERT INTO `customer_order_item` VALUES ('231', '1007', '10', '1', '15', '15', 'N/A', null, '2018-01-17 16:19:45', null);
INSERT INTO `customer_order_item` VALUES ('232', '1008', '7', '1', '11', '11', 'N/A', null, '2018-01-17 16:25:03', null);
INSERT INTO `customer_order_item` VALUES ('233', '1009', '10', '1', '15', '15', 'N/A', null, '2018-01-17 17:48:31', null);
INSERT INTO `customer_order_item` VALUES ('234', '1010', '4', '1', '15', '15', 'N/A', null, '2018-01-17 18:44:38', null);
INSERT INTO `customer_order_item` VALUES ('235', '1011', '1', '1', '15', '15', 'N/A', null, '2018-01-18 10:05:57', null);
INSERT INTO `customer_order_item` VALUES ('236', '1012', '37', '1', '11', '11', 'N/A', null, '2018-01-18 13:40:26', null);
INSERT INTO `customer_order_item` VALUES ('237', '1012', '27', '1', '1', '1', 'N/A', null, '2018-01-18 13:40:26', null);
INSERT INTO `customer_order_item` VALUES ('238', '1013', '9', '2', '11', '22', 'N/A', null, '2018-01-18 14:20:10', null);
INSERT INTO `customer_order_item` VALUES ('239', '1013', '5', '1', '13', '13', 'N/A', null, '2018-01-18 14:20:10', null);
INSERT INTO `customer_order_item` VALUES ('240', '1014', '3', '1', '13', '13', 'N/A', null, '2018-01-18 16:49:07', null);
INSERT INTO `customer_order_item` VALUES ('241', '1015', '3', '1', '13', '13', 'N/A', null, '2018-01-18 16:53:56', null);
INSERT INTO `customer_order_item` VALUES ('242', '1016', '3', '1', '13', '13', 'N/A', null, '2018-01-18 17:05:49', null);
INSERT INTO `customer_order_item` VALUES ('243', '1016', '5', '1', '13', '13', 'N/A', null, '2018-01-18 17:05:49', null);
INSERT INTO `customer_order_item` VALUES ('244', '1017', '39', '1', '15', '15', 'N/A', null, '2018-01-18 17:17:33', null);
INSERT INTO `customer_order_item` VALUES ('245', '1018', '3', '1', '13', '13', 'N/A', null, '2018-01-18 20:01:28', null);
INSERT INTO `customer_order_item` VALUES ('246', '1019', '5', '1', '13', '13', 'N/A', null, '2018-01-18 20:17:23', null);
INSERT INTO `customer_order_item` VALUES ('247', '1019', '33', '1', '11', '11', 'N/A', null, '2018-01-18 20:17:23', null);
INSERT INTO `customer_order_item` VALUES ('248', '1020', '3', '4', '13', '52', 'N/A', null, '2018-01-19 14:25:36', null);
INSERT INTO `customer_order_item` VALUES ('249', '1021', '4', '2', '15', '30', 'N/A', null, '2018-01-19 18:51:14', null);
INSERT INTO `customer_order_item` VALUES ('250', '1022', '35', '1', '15', '15', 'N/A', null, '2018-01-19 22:14:14', null);
INSERT INTO `customer_order_item` VALUES ('251', '1023', '40', '1', '11', '11', 'N/A', null, '2018-01-19 23:07:04', null);
INSERT INTO `customer_order_item` VALUES ('252', '1023', '5', '1', '13', '13', 'N/A', null, '2018-01-19 23:07:04', null);
INSERT INTO `customer_order_item` VALUES ('253', '1023', '10', '1', '15', '15', 'N/A', null, '2018-01-19 23:07:04', null);
INSERT INTO `customer_order_item` VALUES ('254', '1024', '3', '1', '13', '13', 'N/A', null, '2018-01-20 11:50:00', null);
INSERT INTO `customer_order_item` VALUES ('255', '1024', '4', '1', '15', '15', 'N/A', null, '2018-01-20 11:50:00', null);
INSERT INTO `customer_order_item` VALUES ('256', '1025', '19', '1', '1', '1', 'N/A', null, '2018-01-20 11:57:57', null);
INSERT INTO `customer_order_item` VALUES ('257', '1025', '8', '1', '15', '15', 'N/A', null, '2018-01-20 11:57:57', null);
INSERT INTO `customer_order_item` VALUES ('258', '1026', '8', '1', '15', '15', 'N/A', null, '2018-01-20 12:11:09', null);
INSERT INTO `customer_order_item` VALUES ('259', '1026', '19', '1', '1', '1', 'N/A', null, '2018-01-20 12:11:09', null);
INSERT INTO `customer_order_item` VALUES ('260', '1027', '3', '1', '13', '13', 'N/A', null, '2018-01-20 15:59:11', null);
INSERT INTO `customer_order_item` VALUES ('261', '1027', '7', '1', '11', '11', 'N/A', null, '2018-01-20 15:59:11', null);
INSERT INTO `customer_order_item` VALUES ('262', '1028', '43', '1', '11', '11', 'N/A', null, '2018-01-20 16:20:17', null);
INSERT INTO `customer_order_item` VALUES ('263', '1029', '8', '1', '15', '15', 'N/A', null, '2018-01-20 16:50:24', null);
INSERT INTO `customer_order_item` VALUES ('264', '1030', '44', '1', '13', '13', 'N/A', null, '2018-01-20 18:40:39', null);
INSERT INTO `customer_order_item` VALUES ('265', '1030', '4', '1', '15', '15', 'N/A', null, '2018-01-20 18:40:39', null);
INSERT INTO `customer_order_item` VALUES ('266', '1031', '44', '1', '13', '13', 'N/A', null, '2018-01-20 18:41:57', null);
INSERT INTO `customer_order_item` VALUES ('267', '1032', '44', '1', '13', '13', 'N/A', null, '2018-01-20 18:48:49', null);
INSERT INTO `customer_order_item` VALUES ('268', '1033', '39', '1', '15', '15', 'N/A', null, '2018-01-20 19:58:46', null);
INSERT INTO `customer_order_item` VALUES ('269', '1033', '23', '2', '1', '2', 'N/A', null, '2018-01-20 19:58:46', null);
INSERT INTO `customer_order_item` VALUES ('270', '1034', '44', '2', '13', '26', 'N/A', null, '2018-01-20 20:13:27', null);
INSERT INTO `customer_order_item` VALUES ('271', '1035', '38', '1', '13', '13', 'N/A', null, '2018-01-21 13:03:13', null);
INSERT INTO `customer_order_item` VALUES ('272', '1036', '7', '1', '11', '11', 'N/A', null, '2018-01-21 22:09:56', null);
INSERT INTO `customer_order_item` VALUES ('273', '1037', '4', '1', '15', '15', 'N/A', null, '2018-01-22 12:24:53', null);
INSERT INTO `customer_order_item` VALUES ('276', '1039', '19', '1', '1', '1', 'N/A', null, '2018-01-22 14:59:38', null);
INSERT INTO `customer_order_item` VALUES ('277', '1040', '6', '1', '13', '13', 'N/A', null, '2018-01-22 18:03:14', null);
INSERT INTO `customer_order_item` VALUES ('278', '1041', '10', '1', '15', '15', 'N/A', null, '2018-01-22 18:19:04', null);
INSERT INTO `customer_order_item` VALUES ('279', '1042', '1', '1', '15', '15', 'N/A', null, '2018-01-22 18:36:53', null);
INSERT INTO `customer_order_item` VALUES ('280', '1043', '10', '1', '15', '15', 'N/A', null, '2018-01-22 19:06:56', null);
INSERT INTO `customer_order_item` VALUES ('281', '1044', '39', '1', '15', '15', 'N/A', null, '2018-01-22 19:10:40', null);
INSERT INTO `customer_order_item` VALUES ('282', '1045', '2', '1', '11', '11', 'N/A', null, '2018-01-22 19:41:18', null);
INSERT INTO `customer_order_item` VALUES ('284', '1047', '10', '1', '15', '15', 'N/A', null, '2018-01-22 21:09:30', null);
INSERT INTO `customer_order_item` VALUES ('285', '1048', '10', '1', '15', '15', 'N/A', null, '2018-01-22 21:19:58', null);
INSERT INTO `customer_order_item` VALUES ('286', '1049', '8', '1', '15', '15', 'N/A', null, '2018-01-22 21:28:20', null);
INSERT INTO `customer_order_item` VALUES ('287', '1050', '10', '1', '15', '15', 'N/A', null, '2018-01-23 09:01:03', null);
INSERT INTO `customer_order_item` VALUES ('288', '1051', '44', '1', '13', '13', 'N/A', null, '2018-01-23 11:28:26', null);
INSERT INTO `customer_order_item` VALUES ('289', '1052', '5', '1', '13', '13', 'N/A', null, '2018-01-23 11:49:08', null);
INSERT INTO `customer_order_item` VALUES ('290', '1052', '3', '1', '13', '13', 'N/A', null, '2018-01-23 11:49:08', null);
INSERT INTO `customer_order_item` VALUES ('291', '1053', '3', '1', '13', '13', 'N/A', null, '2018-01-23 15:52:53', null);
INSERT INTO `customer_order_item` VALUES ('293', '1055', '4', '1', '15', '15', 'N/A', null, '2018-01-23 16:44:17', null);
INSERT INTO `customer_order_item` VALUES ('294', '1056', '4', '1', '15', '15', 'N/A', null, '2018-01-23 16:54:11', null);
INSERT INTO `customer_order_item` VALUES ('296', '1058', '5', '1', '13', '13', 'N/A', null, '2018-01-23 17:47:06', null);
INSERT INTO `customer_order_item` VALUES ('298', '1060', '23', '1', '1', '1', 'N/A', null, '2018-01-23 16:36:38', null);
INSERT INTO `customer_order_item` VALUES ('299', '1061', '5', '1', '13', '13', 'N/A', null, '2018-01-24 13:06:23', null);
INSERT INTO `customer_order_item` VALUES ('300', '1062', '23', '1', '1', '1', 'N/A', null, '2018-01-24 13:06:56', null);
INSERT INTO `customer_order_item` VALUES ('301', '1063', '6', '1', '13', '13', 'N/A', null, '2018-01-24 16:30:59', null);
INSERT INTO `customer_order_item` VALUES ('302', '1064', '3', '1', '13', '13', 'N/A', null, '2018-01-24 16:48:45', null);
INSERT INTO `customer_order_item` VALUES ('303', '1065', '39', '1', '15', '15', 'N/A', null, '2018-01-24 17:51:32', null);
INSERT INTO `customer_order_item` VALUES ('304', '1066', '8', '1', '15', '15', 'N/A', null, '2018-01-24 18:05:47', null);
INSERT INTO `customer_order_item` VALUES ('305', '1067', '9', '1', '11', '11', 'N/A', null, '2018-01-24 18:12:28', null);
INSERT INTO `customer_order_item` VALUES ('306', '1068', '38', '1', '13', '13', 'N/A', null, '2018-01-24 18:21:59', null);
INSERT INTO `customer_order_item` VALUES ('307', '1069', '9', '1', '11', '11', 'N/A', null, '2018-01-24 19:04:02', null);
INSERT INTO `customer_order_item` VALUES ('309', '1071', '10', '1', '15', '15', 'N/A', null, '2018-01-24 20:15:51', null);
INSERT INTO `customer_order_item` VALUES ('310', '1072', '10', '1', '15', '15', 'N/A', null, '2018-01-24 20:16:27', null);
INSERT INTO `customer_order_item` VALUES ('311', '1073', '8', '1', '15', '15', 'N/A', null, '2018-01-24 20:43:57', null);
INSERT INTO `customer_order_item` VALUES ('312', '1074', '4', '1', '15', '15', 'N/A', null, '2018-01-24 21:02:02', null);
INSERT INTO `customer_order_item` VALUES ('313', '1075', '33', '1', '11', '11', 'N/A', null, '2018-01-24 21:23:27', null);
INSERT INTO `customer_order_item` VALUES ('314', '1076', '9', '1', '11', '11', 'N/A', null, '2018-01-24 21:34:52', null);
INSERT INTO `customer_order_item` VALUES ('315', '1077', '3', '1', '13', '13', 'N/A', null, '2018-01-24 21:49:09', null);
INSERT INTO `customer_order_item` VALUES ('316', '1078', '43', '1', '11', '11', 'N/A', null, '2018-01-25 01:36:31', null);
INSERT INTO `customer_order_item` VALUES ('317', '1079', '8', '1', '15', '15', 'N/A', null, '2018-01-25 14:37:01', null);
INSERT INTO `customer_order_item` VALUES ('318', '1080', '7', '1', '11', '11', 'N/A', null, '2018-01-25 15:03:41', null);
INSERT INTO `customer_order_item` VALUES ('319', '1081', '10', '1', '15', '15', 'N/A', null, '2018-01-25 16:37:58', null);
INSERT INTO `customer_order_item` VALUES ('320', '1082', '10', '1', '15', '15', 'N/A', null, '2018-01-25 16:40:25', null);
INSERT INTO `customer_order_item` VALUES ('321', '1083', '10', '1', '15', '15', 'N/A', null, '2018-01-25 16:43:23', null);
INSERT INTO `customer_order_item` VALUES ('322', '1085', '10', '1', '15', '15', 'N/A', null, '2018-01-25 16:53:31', null);
INSERT INTO `customer_order_item` VALUES ('323', '1086', '10', '1', '15', '15', 'N/A', null, '2018-01-25 16:56:26', null);
INSERT INTO `customer_order_item` VALUES ('324', '1088', '5', '1', '13', '13', 'N/A', null, '2018-01-25 17:05:40', null);
INSERT INTO `customer_order_item` VALUES ('325', '1088', '5', '1', '13', '13', 'N/A', null, '2018-01-25 17:05:40', null);
INSERT INTO `customer_order_item` VALUES ('326', '1090', '23', '1', '1', '1', 'N/A', null, '2018-01-25 17:14:10', null);
INSERT INTO `customer_order_item` VALUES ('327', '1090', '19', '1', '1', '1', 'N/A', null, '2018-01-25 17:14:10', null);
INSERT INTO `customer_order_item` VALUES ('328', '1090', '27', '1', '1', '1', 'N/A', null, '2018-01-25 17:14:10', null);
INSERT INTO `customer_order_item` VALUES ('329', '1090', '3', '1', '13', '13', 'N/A', null, '2018-01-25 17:14:10', null);
INSERT INTO `customer_order_item` VALUES ('330', '1091', '10', '1', '15', '15', 'N/A', null, '2018-01-25 17:15:30', null);
INSERT INTO `customer_order_item` VALUES ('331', '1092', '10', '1', '15', '15', 'N/A', null, '2018-01-25 17:20:50', null);
INSERT INTO `customer_order_item` VALUES ('332', '1094', '31', '1', '1', '1', 'N/A', null, '2018-01-25 17:26:36', null);
INSERT INTO `customer_order_item` VALUES ('333', '1096', '5', '1', '13', '13', 'N/A', null, '2018-01-25 18:21:59', null);
INSERT INTO `customer_order_item` VALUES ('334', '1098', '10', '1', '15', '15', 'N/A', null, '2018-01-25 18:26:59', null);
INSERT INTO `customer_order_item` VALUES ('336', '1101', '19', '5', '1', '5', 'N/A', null, '2018-01-25 19:23:46', null);
INSERT INTO `customer_order_item` VALUES ('337', '1102', '5', '1', '13', '13', 'N/A', null, '2018-01-25 19:25:53', null);
INSERT INTO `customer_order_item` VALUES ('338', '1103', '5', '1', '13', '13', 'N/A', null, '2018-01-25 19:27:11', null);
INSERT INTO `customer_order_item` VALUES ('339', '1104', '5', '1', '13', '13', 'N/A', null, '2018-01-25 20:45:27', null);
INSERT INTO `customer_order_item` VALUES ('340', '1105', '5', '1', '13', '13', 'N/A', null, '2018-01-25 20:48:38', null);

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
  `ADDRESS` text,
  PRIMARY KEY (`KITCHEN_ID`),
  KEY `City_ID` (`CITY_ID`) USING BTREE,
  CONSTRAINT `kitchen_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`CITY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kitchen
-- ----------------------------
INSERT INTO `kitchen` VALUES ('1', 'MOGADISHU', '1', '09:56:58', '23:57:03', null);

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `LOCATION_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CITY_ID` bigint(20) DEFAULT NULL,
  `LOCATION_NAME` varchar(255) NOT NULL,
  `ADDRESS` text,
  `ACTIVE` bit(1) DEFAULT b'0',
  PRIMARY KEY (`LOCATION_ID`),
  KEY `CITY_ID` (`CITY_ID`),
  CONSTRAINT `location_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`CITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', '1', 'Degmada Boondheere ', 'Mogadishu', '');
INSERT INTO `location` VALUES ('2', '1', 'Degmada C/Casiis', 'Mogadishu', '');
INSERT INTO `location` VALUES ('3', '1', 'Degnada Dayniile', 'Mogadishu', '\0');
INSERT INTO `location` VALUES ('4', '1', 'Degmada Dharkeynley', 'Mogadishu', '');
INSERT INTO `location` VALUES ('5', '1', 'Degmada Hodan', 'Mogadishu', '');
INSERT INTO `location` VALUES ('6', '1', 'Degmada Howlwadaag', 'Mogadishu', '');
INSERT INTO `location` VALUES ('7', '1', 'Degmada Heliwa', 'Mogadishu', '');
INSERT INTO `location` VALUES ('8', '1', 'Degmada Kaxda', 'Mogadishu', '\0');
INSERT INTO `location` VALUES ('9', '1', 'Degmada Kaaraan', 'Mogadishu', '');
INSERT INTO `location` VALUES ('10', '1', 'Degmada Shibis  ', 'Mogadishu', '');
INSERT INTO `location` VALUES ('11', '1', 'Degmada Shangaani', 'Mogadishu', '');
INSERT INTO `location` VALUES ('12', '1', 'Degmada Waabari', 'Mogadishu', '');
INSERT INTO `location` VALUES ('13', '1', 'Degmada Wadajir', 'Mogadishu', '');
INSERT INTO `location` VALUES ('14', '1', 'Degmada Warta Nabadda ', 'Mogadishu', '');
INSERT INTO `location` VALUES ('15', '1', 'Degmada Xamerweyne', 'Mogadishu', '');
INSERT INTO `location` VALUES ('16', '1', 'Degmada Xamarjajab', 'Mogadishu', '');
INSERT INTO `location` VALUES ('17', '1', 'Degmada Yaaqshiid', 'Mogadishu', '\0');

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
  `MAX_QTY` int(2) NOT NULL DEFAULT '10' COMMENT 'Show the maximum number of quantities one can select from',
  PRIMARY KEY (`MENU_ITEM_ID`),
  KEY `MENU_CAT_ID` (`MENU_CAT_ID`) USING BTREE,
  CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES ('1', '1', 'MARGHERITA', 'Tomatos\r\nOnion\r\nMozzarella Cheese\r\nSpecial Pizza out Sauce', 'pizza1.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('2', '1', 'HAWAIIAN', 'Salami\r\nTomato Sauce\r\nGreen pepper\r\nPineapple\r\nMozzarella Cheese\r\nMushroom\r\nSpecial Pizza out Sauce', 'pizza2.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('3', '1', 'CHICKEN TIKKA MASALA', 'Chicken meat with curry sauce\r\nTomato\r\nGreen pepper\r\nSweet corn\r\nOlive\r\nMozzarella Cheese\r\nMushroom\r\nRed pepper\r\nSpecial Pizza out  Sauce', 'pizza3.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('4', '1', 'SUPREME', 'Salami\r\nTomatoes\r\nGreen pepper\r\nRed pepper\r\nSweet Corn\r\nOlive\r\nMozzarella Cheese\r\nMushrooms\r\nSpecial Pizza out Sauce', 'pizza8.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('11', '6', 'FANTA', 'Soft Drink', '15161047325a5dec1c2d24f2.23031655.jpg', '', '\0', '20');
INSERT INTO `menu_item` VALUES ('12', '6', 'COCA COLA', 'Soft Drink', '15161049235a5decdb70c2e8.07438440.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('13', '6', 'SPRITE', 'Soft Drink', 'sprite.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('14', '6', 'DASANI', 'Mineral water', '15161053435a5dee7f23af36.47159285.jpg', '\0', '\0', '20');
INSERT INTO `menu_item` VALUES ('16', '1', 'TUNA PIZZA', 'Tuna fish\r\nGreen pepper\r\nSweet corn\r\nMozzarella cheese\r\nSpecial Pizza out Souce', '15161043705a5deab26d2118.51038676.jpg', '', '\0', '20');
INSERT INTO `menu_item` VALUES ('17', '1', 'PIZZA GEEL', 'Camel Meat\r\nOnion\r\nGreen pepper\r\nRed pepper\r\nMozzarella Cheese\r\nSpecial Pizza out  Sauce', '15165025105a63fdeeb95ef6.05377409.jpg', '', '\0', '20');
INSERT INTO `menu_item` VALUES ('18', '1', 'INDIAN PIZZA (Very Spicy)', 'Hot pepper\r\nCurry\r\nSweet Corn\r\nMozzarella Cheese\r\nGreen Pepper\r\nRed pepper\r\nSpecial Pizza out  Sauce\r\nGinger', '15161046125a5deba452f3c5.77619894.png', '', '', '20');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
INSERT INTO `menu_item_type` VALUES ('31', '14', '500ML', '1.00', '');
INSERT INTO `menu_item_type` VALUES ('33', '16', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('34', '1', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('35', '16', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('36', '16', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('37', '17', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('38', '17', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('39', '17', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('40', '18', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('41', '18', 'MEDIUM', '13.00', '');
INSERT INTO `menu_item_type` VALUES ('42', '18', 'LARGE', '15.00', '');
INSERT INTO `menu_item_type` VALUES ('43', '4', 'SMALL', '11.00', '');
INSERT INTO `menu_item_type` VALUES ('44', '4', 'MEDIUM', '13.00', '');

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
INSERT INTO `my_session` VALUES ('2698eba6322b930a6132f1e5ee51fd99', '1516946562', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('2c241edc4367e145075187e6fac76908', '1516949030', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('359caed1219e7c67fad5e124d49eeafb', '1516948309', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('3dcef3caed1e1a27fa57572ecf3895c9', '1516947589', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('53368ce60b1e57fa4380b13c30baa9aa', '1516948669', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('53d4cbde7993c9460e5ade09556857c1', '1516949749', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('5de2cbda480cba8a1dd3095f79d74a17', '1516945597', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('882a49103643c75b0b2959dba517b544', '1516947949', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('91b453b586bf56d3c86313596ccc2888', '1516949868', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('a5e4917f33ba015938efa8f797856d11', '1516945353', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('b7ac770c1211c9daa90cc70aee32c4f5', '1516947229', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('bd80be8e20d238fdd00fcaf8912658f2', '1516949389', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('c9654295efd5bea2beab479ca01177aa', '1516945959', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('d3efb5165be5ac3113dccc942ddbe208', '1516946869', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');
INSERT INTO `my_session` VALUES ('e3665f6e84433c16df0dc47b284644d3', '1516946203', 0x5F5F666C6173687C613A303A7B7D, '0', 'guest');

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
) ENGINE=InnoDB AUTO_INCREMENT=759 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_tracking
-- ----------------------------
INSERT INTO `order_tracking` VALUES ('457', '1000', null, 'PAYMENT PENDING', '2018-01-17 13:23:08', '');
INSERT INTO `order_tracking` VALUES ('458', '1001', null, 'PAYMENT PENDING', '2018-01-17 13:25:08', '');
INSERT INTO `order_tracking` VALUES ('459', '1002', null, 'PAYMENT PENDING', '2018-01-17 14:22:10', '');
INSERT INTO `order_tracking` VALUES ('460', '1002', null, 'CHEF ASSIGNED', '2018-01-17 14:23:34', '');
INSERT INTO `order_tracking` VALUES ('461', '1001', null, 'CHEF ASSIGNED', '2018-01-17 14:38:05', '');
INSERT INTO `order_tracking` VALUES ('462', '1002', null, 'ORDER READY', '2018-01-17 14:38:55', '');
INSERT INTO `order_tracking` VALUES ('463', '1002', null, 'RIDER DISPATCHED', '2018-01-17 14:39:10', '');
INSERT INTO `order_tracking` VALUES ('464', '1003', null, 'PAYMENT PENDING', '2018-01-17 14:44:26', '');
INSERT INTO `order_tracking` VALUES ('465', '1004', null, 'PAYMENT PENDING', '2018-01-17 15:39:20', '');
INSERT INTO `order_tracking` VALUES ('466', '1005', null, 'PAYMENT PENDING', '2018-01-17 15:47:15', '');
INSERT INTO `order_tracking` VALUES ('467', '1006', null, 'PAYMENT PENDING', '2018-01-17 16:15:23', '');
INSERT INTO `order_tracking` VALUES ('468', '1007', null, 'PAYMENT PENDING', '2018-01-17 16:19:45', '');
INSERT INTO `order_tracking` VALUES ('469', '1007', null, 'CHEF ASSIGNED', '2018-01-17 16:22:53', '');
INSERT INTO `order_tracking` VALUES ('470', '1008', null, 'PAYMENT PENDING', '2018-01-17 16:25:04', '');
INSERT INTO `order_tracking` VALUES ('471', '1005', null, 'CHEF ASSIGNED', '2018-01-17 16:36:25', '');
INSERT INTO `order_tracking` VALUES ('472', '1008', null, 'CHEF ASSIGNED', '2018-01-17 16:37:26', '');
INSERT INTO `order_tracking` VALUES ('473', '1007', null, 'ORDER READY', '2018-01-17 16:52:40', '');
INSERT INTO `order_tracking` VALUES ('474', '1007', null, 'RIDER DISPATCHED', '2018-01-17 16:54:10', '');
INSERT INTO `order_tracking` VALUES ('475', '1008', null, 'ORDER READY', '2018-01-17 16:56:09', '');
INSERT INTO `order_tracking` VALUES ('476', '1008', null, 'RIDER DISPATCHED', '2018-01-17 16:56:31', '');
INSERT INTO `order_tracking` VALUES ('477', '1009', null, 'PAYMENT PENDING', '2018-01-17 17:48:31', '');
INSERT INTO `order_tracking` VALUES ('478', '1009', null, 'CHEF ASSIGNED', '2018-01-17 18:00:28', '');
INSERT INTO `order_tracking` VALUES ('479', '1005', null, 'ORDER READY', '2018-01-17 18:33:15', '');
INSERT INTO `order_tracking` VALUES ('480', '1009', null, 'ORDER READY', '2018-01-17 18:33:32', '');
INSERT INTO `order_tracking` VALUES ('481', '1009', null, 'RIDER DISPATCHED', '2018-01-17 18:34:29', '');
INSERT INTO `order_tracking` VALUES ('482', '1005', null, 'RIDER DISPATCHED', '2018-01-17 18:34:42', '');
INSERT INTO `order_tracking` VALUES ('483', '1010', null, 'PAYMENT PENDING', '2018-01-17 18:44:38', '');
INSERT INTO `order_tracking` VALUES ('484', '1010', null, 'CHEF ASSIGNED', '2018-01-17 18:45:21', '');
INSERT INTO `order_tracking` VALUES ('485', '1010', null, 'ORDER READY', '2018-01-17 18:47:13', '');
INSERT INTO `order_tracking` VALUES ('486', '1010', null, 'RIDER DISPATCHED', '2018-01-17 18:47:33', '');
INSERT INTO `order_tracking` VALUES ('487', '1011', null, 'PAYMENT PENDING', '2018-01-18 10:05:58', '');
INSERT INTO `order_tracking` VALUES ('488', '1001', null, 'ORDER READY', '2018-01-18 13:31:38', '');
INSERT INTO `order_tracking` VALUES ('489', '1012', null, 'PAYMENT PENDING', '2018-01-18 13:40:26', '');
INSERT INTO `order_tracking` VALUES ('490', '1013', null, 'PAYMENT PENDING', '2018-01-18 14:20:10', '');
INSERT INTO `order_tracking` VALUES ('491', '1014', null, 'PAYMENT PENDING', '2018-01-18 16:49:08', '');
INSERT INTO `order_tracking` VALUES ('492', '1015', null, 'PAYMENT PENDING', '2018-01-18 16:53:56', '');
INSERT INTO `order_tracking` VALUES ('493', '1014', null, 'CHEF ASSIGNED', '2018-01-18 16:58:05', '');
INSERT INTO `order_tracking` VALUES ('494', '1016', null, 'PAYMENT PENDING', '2018-01-18 17:05:49', '');
INSERT INTO `order_tracking` VALUES ('495', '1017', null, 'PAYMENT PENDING', '2018-01-18 17:17:33', '');
INSERT INTO `order_tracking` VALUES ('496', '1014', null, 'ORDER READY', '2018-01-18 18:25:49', '');
INSERT INTO `order_tracking` VALUES ('497', '1014', null, 'RIDER DISPATCHED', '2018-01-18 18:26:29', '');
INSERT INTO `order_tracking` VALUES ('498', '1018', null, 'PAYMENT PENDING', '2018-01-18 20:01:28', '');
INSERT INTO `order_tracking` VALUES ('499', '1019', null, 'PAYMENT PENDING', '2018-01-18 20:17:23', '');
INSERT INTO `order_tracking` VALUES ('500', '1020', null, 'PAYMENT PENDING', '2018-01-19 14:25:36', '');
INSERT INTO `order_tracking` VALUES ('501', '1021', null, 'PAYMENT PENDING', '2018-01-19 18:51:14', '');
INSERT INTO `order_tracking` VALUES ('502', '1022', null, 'PAYMENT PENDING', '2018-01-19 22:14:15', '');
INSERT INTO `order_tracking` VALUES ('503', '1023', null, 'PAYMENT PENDING', '2018-01-19 23:07:04', '');
INSERT INTO `order_tracking` VALUES ('504', '1024', null, 'PAYMENT PENDING', '2018-01-20 11:50:01', '');
INSERT INTO `order_tracking` VALUES ('505', '1025', null, 'PAYMENT PENDING', '2018-01-20 11:57:57', '');
INSERT INTO `order_tracking` VALUES ('506', '1025', null, 'CHEF ASSIGNED', '2018-01-20 12:00:59', '');
INSERT INTO `order_tracking` VALUES ('507', '1026', null, 'PAYMENT PENDING', '2018-01-20 12:11:09', '');
INSERT INTO `order_tracking` VALUES ('508', '1020', null, 'CHEF ASSIGNED', '2018-01-20 15:23:32', '');
INSERT INTO `order_tracking` VALUES ('509', '1027', null, 'PAYMENT PENDING', '2018-01-20 15:59:11', '');
INSERT INTO `order_tracking` VALUES ('510', '1019', null, 'CHEF ASSIGNED', '2018-01-20 16:03:22', '');
INSERT INTO `order_tracking` VALUES ('511', '1027', null, 'CHEF ASSIGNED', '2018-01-20 16:05:18', '');
INSERT INTO `order_tracking` VALUES ('512', '1016', null, 'CHEF ASSIGNED', '2018-01-20 16:08:57', '');
INSERT INTO `order_tracking` VALUES ('513', '1028', null, 'PAYMENT PENDING', '2018-01-20 16:20:17', '');
INSERT INTO `order_tracking` VALUES ('514', '1028', null, 'CHEF ASSIGNED', '2018-01-20 16:28:36', '');
INSERT INTO `order_tracking` VALUES ('515', '1026', null, 'CHEF ASSIGNED', '2018-01-20 16:36:21', '');
INSERT INTO `order_tracking` VALUES ('516', '1029', null, 'PAYMENT PENDING', '2018-01-20 16:50:24', '');
INSERT INTO `order_tracking` VALUES ('517', '1029', null, 'CHEF ASSIGNED', '2018-01-20 16:53:08', '');
INSERT INTO `order_tracking` VALUES ('518', '1026', null, 'ORDER READY', '2018-01-20 16:56:25', '');
INSERT INTO `order_tracking` VALUES ('519', '1026', null, 'RIDER DISPATCHED', '2018-01-20 16:56:50', '');
INSERT INTO `order_tracking` VALUES ('520', '1029', null, 'ORDER READY', '2018-01-20 17:11:33', '');
INSERT INTO `order_tracking` VALUES ('521', '1029', null, 'RIDER DISPATCHED', '2018-01-20 17:11:48', '');
INSERT INTO `order_tracking` VALUES ('522', '1030', null, 'PAYMENT PENDING', '2018-01-20 18:40:39', '');
INSERT INTO `order_tracking` VALUES ('523', '1031', null, 'PAYMENT PENDING', '2018-01-20 18:41:57', '');
INSERT INTO `order_tracking` VALUES ('524', '1031', null, 'CHEF ASSIGNED', '2018-01-20 18:48:01', '');
INSERT INTO `order_tracking` VALUES ('525', '1032', null, 'PAYMENT PENDING', '2018-01-20 18:48:49', '');
INSERT INTO `order_tracking` VALUES ('526', '1031', null, 'ORDER READY', '2018-01-20 19:03:54', '');
INSERT INTO `order_tracking` VALUES ('527', '1031', null, 'RIDER DISPATCHED', '2018-01-20 19:04:21', '');
INSERT INTO `order_tracking` VALUES ('528', '1028', null, 'ORDER READY', '2018-01-20 19:06:27', '');
INSERT INTO `order_tracking` VALUES ('529', '1028', null, 'RIDER DISPATCHED', '2018-01-20 19:06:51', '');
INSERT INTO `order_tracking` VALUES ('530', '1033', null, 'PAYMENT PENDING', '2018-01-20 19:58:46', '');
INSERT INTO `order_tracking` VALUES ('531', '1033', null, 'CHEF ASSIGNED', '2018-01-20 20:04:12', '');
INSERT INTO `order_tracking` VALUES ('532', '1034', null, 'PAYMENT PENDING', '2018-01-20 20:13:27', '');
INSERT INTO `order_tracking` VALUES ('533', '1034', null, 'CHEF ASSIGNED', '2018-01-20 20:17:45', '');
INSERT INTO `order_tracking` VALUES ('534', '1033', null, 'ORDER READY', '2018-01-20 20:25:41', '');
INSERT INTO `order_tracking` VALUES ('535', '1034', null, 'ORDER READY', '2018-01-20 20:25:58', '');
INSERT INTO `order_tracking` VALUES ('536', '1033', null, 'RIDER DISPATCHED', '2018-01-20 20:26:38', '');
INSERT INTO `order_tracking` VALUES ('537', '1034', null, 'RIDER DISPATCHED', '2018-01-20 20:26:59', '');
INSERT INTO `order_tracking` VALUES ('538', '1035', null, 'PAYMENT PENDING', '2018-01-21 13:03:13', '');
INSERT INTO `order_tracking` VALUES ('539', '1035', null, 'CHEF ASSIGNED', '2018-01-21 14:56:49', '');
INSERT INTO `order_tracking` VALUES ('540', '1032', null, 'CHEF ASSIGNED', '2018-01-21 15:55:41', '');
INSERT INTO `order_tracking` VALUES ('541', '1035', null, 'ORDER READY', '2018-01-21 16:12:43', '');
INSERT INTO `order_tracking` VALUES ('542', '1035', null, 'RIDER DISPATCHED', '2018-01-21 16:13:52', '');
INSERT INTO `order_tracking` VALUES ('543', '1036', null, 'PAYMENT PENDING', '2018-01-21 22:09:56', '');
INSERT INTO `order_tracking` VALUES ('544', '1037', null, 'PAYMENT PENDING', '2018-01-22 12:24:54', '');
INSERT INTO `order_tracking` VALUES ('546', '1039', null, 'PAYMENT PENDING', '2018-01-22 14:59:39', '');
INSERT INTO `order_tracking` VALUES ('547', '1036', null, 'CHEF ASSIGNED', '2018-01-22 17:45:12', '');
INSERT INTO `order_tracking` VALUES ('549', '1039', null, 'CHEF ASSIGNED', '2018-01-22 17:46:22', '');
INSERT INTO `order_tracking` VALUES ('550', '1037', null, 'CHEF ASSIGNED', '2018-01-22 17:46:47', '');
INSERT INTO `order_tracking` VALUES ('551', '1030', null, 'CHEF ASSIGNED', '2018-01-22 17:47:10', '');
INSERT INTO `order_tracking` VALUES ('552', '1000', null, 'CHEF ASSIGNED', '2018-01-22 17:47:47', '');
INSERT INTO `order_tracking` VALUES ('553', '1024', null, 'CHEF ASSIGNED', '2018-01-22 17:48:13', '');
INSERT INTO `order_tracking` VALUES ('554', '1003', null, 'CHEF ASSIGNED', '2018-01-22 17:49:27', '');
INSERT INTO `order_tracking` VALUES ('555', '1004', null, 'CHEF ASSIGNED', '2018-01-22 17:50:14', '');
INSERT INTO `order_tracking` VALUES ('556', '1006', null, 'CHEF ASSIGNED', '2018-01-22 17:50:38', '');
INSERT INTO `order_tracking` VALUES ('557', '1011', null, 'CHEF ASSIGNED', '2018-01-22 17:51:00', '');
INSERT INTO `order_tracking` VALUES ('558', '1023', null, 'CHEF ASSIGNED', '2018-01-22 17:51:34', '');
INSERT INTO `order_tracking` VALUES ('559', '1012', null, 'CHEF ASSIGNED', '2018-01-22 17:51:59', '');
INSERT INTO `order_tracking` VALUES ('560', '1022', null, 'CHEF ASSIGNED', '2018-01-22 17:52:31', '');
INSERT INTO `order_tracking` VALUES ('561', '1013', null, 'CHEF ASSIGNED', '2018-01-22 17:52:52', '');
INSERT INTO `order_tracking` VALUES ('562', '1018', null, 'CHEF ASSIGNED', '2018-01-22 17:53:23', '');
INSERT INTO `order_tracking` VALUES ('563', '1015', null, 'CHEF ASSIGNED', '2018-01-22 17:53:45', '');
INSERT INTO `order_tracking` VALUES ('564', '1017', null, 'CHEF ASSIGNED', '2018-01-22 17:54:08', '');
INSERT INTO `order_tracking` VALUES ('565', '1040', null, 'PAYMENT PENDING', '2018-01-22 18:03:14', '');
INSERT INTO `order_tracking` VALUES ('566', '1041', null, 'PAYMENT PENDING', '2018-01-22 18:19:04', '');
INSERT INTO `order_tracking` VALUES ('567', '1041', null, 'CHEF ASSIGNED', '2018-01-22 18:35:50', '');
INSERT INTO `order_tracking` VALUES ('568', '1042', null, 'PAYMENT PENDING', '2018-01-22 18:36:53', '');
INSERT INTO `order_tracking` VALUES ('569', '1042', null, 'CHEF ASSIGNED', '2018-01-22 18:44:33', '');
INSERT INTO `order_tracking` VALUES ('570', '1043', null, 'PAYMENT PENDING', '2018-01-22 19:06:56', '');
INSERT INTO `order_tracking` VALUES ('571', '1042', null, 'ORDER READY', '2018-01-22 19:08:28', '');
INSERT INTO `order_tracking` VALUES ('572', '1041', null, 'ORDER READY', '2018-01-22 19:08:56', '');
INSERT INTO `order_tracking` VALUES ('573', '1042', null, 'RIDER DISPATCHED', '2018-01-22 19:09:15', '');
INSERT INTO `order_tracking` VALUES ('574', '1041', null, 'RIDER DISPATCHED', '2018-01-22 19:09:57', '');
INSERT INTO `order_tracking` VALUES ('575', '1044', null, 'PAYMENT PENDING', '2018-01-22 19:10:41', '');
INSERT INTO `order_tracking` VALUES ('576', '1044', null, 'CHEF ASSIGNED', '2018-01-22 19:28:15', '');
INSERT INTO `order_tracking` VALUES ('577', '1043', null, 'CHEF ASSIGNED', '2018-01-22 19:29:37', '');
INSERT INTO `order_tracking` VALUES ('578', '1040', null, 'CHEF ASSIGNED', '2018-01-22 19:33:32', '');
INSERT INTO `order_tracking` VALUES ('579', '1045', null, 'PAYMENT PENDING', '2018-01-22 19:41:18', '');
INSERT INTO `order_tracking` VALUES ('580', '1044', null, 'ORDER READY', '2018-01-22 20:39:17', '');
INSERT INTO `order_tracking` VALUES ('581', '1044', null, 'RIDER DISPATCHED', '2018-01-22 20:39:41', '');
INSERT INTO `order_tracking` VALUES ('582', '1043', null, 'ORDER READY', '2018-01-22 20:40:29', '');
INSERT INTO `order_tracking` VALUES ('584', '1047', null, 'PAYMENT PENDING', '2018-01-22 21:09:30', '');
INSERT INTO `order_tracking` VALUES ('585', '1047', null, 'CHEF ASSIGNED', '2018-01-22 21:11:04', '');
INSERT INTO `order_tracking` VALUES ('586', '1048', null, 'PAYMENT PENDING', '2018-01-22 21:19:58', '');
INSERT INTO `order_tracking` VALUES ('587', '1048', null, 'CHEF ASSIGNED', '2018-01-22 21:20:44', '');
INSERT INTO `order_tracking` VALUES ('588', '1049', null, 'PAYMENT PENDING', '2018-01-22 21:28:20', '');
INSERT INTO `order_tracking` VALUES ('589', '1049', null, 'CHEF ASSIGNED', '2018-01-22 21:30:05', '');
INSERT INTO `order_tracking` VALUES ('590', '1049', null, 'ORDER READY', '2018-01-22 21:36:19', '');
INSERT INTO `order_tracking` VALUES ('591', '1047', null, 'ORDER READY', '2018-01-22 21:36:36', '');
INSERT INTO `order_tracking` VALUES ('592', '1049', null, 'RIDER DISPATCHED', '2018-01-22 21:37:24', '');
INSERT INTO `order_tracking` VALUES ('593', '1047', null, 'RIDER DISPATCHED', '2018-01-22 21:41:10', '');
INSERT INTO `order_tracking` VALUES ('594', '1050', null, 'PAYMENT PENDING', '2018-01-23 09:01:04', '');
INSERT INTO `order_tracking` VALUES ('595', '1051', null, 'PAYMENT PENDING', '2018-01-23 11:28:26', '');
INSERT INTO `order_tracking` VALUES ('596', '1052', null, 'PAYMENT PENDING', '2018-01-23 11:49:08', '');
INSERT INTO `order_tracking` VALUES ('597', '1053', null, 'PAYMENT PENDING', '2018-01-23 15:52:54', '');
INSERT INTO `order_tracking` VALUES ('598', '1053', null, 'CHEF ASSIGNED', '2018-01-23 15:57:08', '');
INSERT INTO `order_tracking` VALUES ('599', '1053', null, 'ORDER READY', '2018-01-23 16:21:21', '');
INSERT INTO `order_tracking` VALUES ('600', '1053', null, 'RIDER DISPATCHED', '2018-01-23 16:21:36', '');
INSERT INTO `order_tracking` VALUES ('602', '1055', null, 'PAYMENT PENDING', '2018-01-23 16:44:17', '');
INSERT INTO `order_tracking` VALUES ('603', '1056', null, 'PAYMENT PENDING', '2018-01-23 16:54:11', '');
INSERT INTO `order_tracking` VALUES ('605', '1056', null, 'CHEF ASSIGNED', '2018-01-23 17:23:23', '');
INSERT INTO `order_tracking` VALUES ('606', '1056', null, 'ORDER READY', '2018-01-23 17:25:41', '');
INSERT INTO `order_tracking` VALUES ('607', '1056', null, 'RIDER DISPATCHED', '2018-01-23 17:27:22', '');
INSERT INTO `order_tracking` VALUES ('608', '1058', null, 'PAYMENT PENDING', '2018-01-23 17:47:06', '');
INSERT INTO `order_tracking` VALUES ('609', '1058', null, 'CHEF ASSIGNED', '2018-01-23 17:51:58', '');
INSERT INTO `order_tracking` VALUES ('610', '1058', null, 'ORDER READY', '2018-01-23 18:01:21', '');
INSERT INTO `order_tracking` VALUES ('611', '1058', null, 'RIDER DISPATCHED', '2018-01-23 18:02:01', '');
INSERT INTO `order_tracking` VALUES ('612', '1045', null, 'CHEF ASSIGNED', '2018-01-23 18:35:15', '');
INSERT INTO `order_tracking` VALUES ('615', '1050', null, 'CHEF ASSIGNED', '2018-01-23 18:37:09', '');
INSERT INTO `order_tracking` VALUES ('616', '1051', null, 'CHEF ASSIGNED', '2018-01-23 18:37:32', '');
INSERT INTO `order_tracking` VALUES ('617', '1052', null, 'CHEF ASSIGNED', '2018-01-23 18:37:52', '');
INSERT INTO `order_tracking` VALUES ('619', '1055', null, 'CHEF ASSIGNED', '2018-01-23 18:38:47', '');
INSERT INTO `order_tracking` VALUES ('621', '1060', null, 'PAYMENT PENDING', '2018-01-23 16:36:38', '');
INSERT INTO `order_tracking` VALUES ('622', '1060', null, 'CHEF ASSIGNED', '2018-01-23 16:37:14', '');
INSERT INTO `order_tracking` VALUES ('623', '1061', null, 'PAYMENT PENDING', '2018-01-24 13:06:23', '');
INSERT INTO `order_tracking` VALUES ('624', '1062', null, 'PAYMENT PENDING', '2018-01-24 13:06:56', '');
INSERT INTO `order_tracking` VALUES ('625', '1061', null, 'CHEF ASSIGNED', '2018-01-24 13:08:09', '');
INSERT INTO `order_tracking` VALUES ('626', '1062', null, 'CHEF ASSIGNED', '2018-01-24 13:08:37', '');
INSERT INTO `order_tracking` VALUES ('627', '1063', null, 'PAYMENT PENDING', '2018-01-24 16:31:00', '');
INSERT INTO `order_tracking` VALUES ('628', '1063', null, 'CHEF ASSIGNED', '2018-01-24 16:47:06', '');
INSERT INTO `order_tracking` VALUES ('629', '1064', null, 'PAYMENT PENDING', '2018-01-24 16:48:45', '');
INSERT INTO `order_tracking` VALUES ('630', '1063', null, 'ORDER READY', '2018-01-24 17:09:58', '');
INSERT INTO `order_tracking` VALUES ('631', '1063', null, 'RIDER DISPATCHED', '2018-01-24 17:10:15', '');
INSERT INTO `order_tracking` VALUES ('632', '1065', null, 'PAYMENT PENDING', '2018-01-24 17:51:32', '');
INSERT INTO `order_tracking` VALUES ('633', '1065', null, 'CHEF ASSIGNED', '2018-01-24 17:56:24', '');
INSERT INTO `order_tracking` VALUES ('634', '1066', null, 'PAYMENT PENDING', '2018-01-24 18:05:48', '');
INSERT INTO `order_tracking` VALUES ('635', '1066', null, 'CHEF ASSIGNED', '2018-01-24 18:09:45', '');
INSERT INTO `order_tracking` VALUES ('636', '1064', null, 'CHEF ASSIGNED', '2018-01-24 18:10:33', '');
INSERT INTO `order_tracking` VALUES ('637', '1067', null, 'PAYMENT PENDING', '2018-01-24 18:12:28', '');
INSERT INTO `order_tracking` VALUES ('638', '1065', null, 'ORDER READY', '2018-01-24 18:17:41', '');
INSERT INTO `order_tracking` VALUES ('639', '1065', null, 'RIDER DISPATCHED', '2018-01-24 18:18:00', '');
INSERT INTO `order_tracking` VALUES ('640', '1068', null, 'PAYMENT PENDING', '2018-01-24 18:21:59', '');
INSERT INTO `order_tracking` VALUES ('641', '1068', null, 'CHEF ASSIGNED', '2018-01-24 18:25:12', '');
INSERT INTO `order_tracking` VALUES ('642', '1066', null, 'ORDER READY', '2018-01-24 18:36:01', '');
INSERT INTO `order_tracking` VALUES ('643', '1066', null, 'RIDER DISPATCHED', '2018-01-24 18:36:24', '');
INSERT INTO `order_tracking` VALUES ('644', '1069', null, 'PAYMENT PENDING', '2018-01-24 19:04:02', '');
INSERT INTO `order_tracking` VALUES ('645', '1069', null, 'CHEF ASSIGNED', '2018-01-24 19:09:27', '');
INSERT INTO `order_tracking` VALUES ('646', '1068', null, 'ORDER READY', '2018-01-24 19:20:47', '');
INSERT INTO `order_tracking` VALUES ('647', '1068', null, 'RIDER DISPATCHED', '2018-01-24 19:21:12', '');
INSERT INTO `order_tracking` VALUES ('648', '1069', null, 'ORDER READY', '2018-01-24 19:21:38', '');
INSERT INTO `order_tracking` VALUES ('649', '1069', null, 'RIDER DISPATCHED', '2018-01-24 19:22:08', '');
INSERT INTO `order_tracking` VALUES ('650', '1067', null, 'CHEF ASSIGNED', '2018-01-24 19:22:50', '');
INSERT INTO `order_tracking` VALUES ('653', '1071', null, 'PAYMENT PENDING', '2018-01-24 20:15:51', '');
INSERT INTO `order_tracking` VALUES ('654', '1072', null, 'PAYMENT PENDING', '2018-01-24 20:16:27', '');
INSERT INTO `order_tracking` VALUES ('655', '1072', null, 'CHEF ASSIGNED', '2018-01-24 20:17:37', '');
INSERT INTO `order_tracking` VALUES ('656', '1073', null, 'PAYMENT PENDING', '2018-01-24 20:43:58', '');
INSERT INTO `order_tracking` VALUES ('657', '1073', null, 'CHEF ASSIGNED', '2018-01-24 20:49:36', '');
INSERT INTO `order_tracking` VALUES ('658', '1074', null, 'PAYMENT PENDING', '2018-01-24 21:02:02', '');
INSERT INTO `order_tracking` VALUES ('659', '1074', null, 'CHEF ASSIGNED', '2018-01-24 21:08:06', '');
INSERT INTO `order_tracking` VALUES ('660', '1071', null, 'CHEF ASSIGNED', '2018-01-24 21:14:29', '');
INSERT INTO `order_tracking` VALUES ('661', '1075', null, 'PAYMENT PENDING', '2018-01-24 21:23:27', '');
INSERT INTO `order_tracking` VALUES ('662', '1075', null, 'CHEF ASSIGNED', '2018-01-24 21:24:28', '');
INSERT INTO `order_tracking` VALUES ('663', '1076', null, 'PAYMENT PENDING', '2018-01-24 21:34:52', '');
INSERT INTO `order_tracking` VALUES ('664', '1076', null, 'CHEF ASSIGNED', '2018-01-24 21:35:55', '');
INSERT INTO `order_tracking` VALUES ('665', '1077', null, 'PAYMENT PENDING', '2018-01-24 21:49:09', '');
INSERT INTO `order_tracking` VALUES ('666', '1077', null, 'CHEF ASSIGNED', '2018-01-24 21:50:20', '');
INSERT INTO `order_tracking` VALUES ('667', '1077', null, 'ORDER READY', '2018-01-24 22:02:13', '');
INSERT INTO `order_tracking` VALUES ('668', '1076', null, 'ORDER READY', '2018-01-24 22:02:49', '');
INSERT INTO `order_tracking` VALUES ('669', '1075', null, 'ORDER READY', '2018-01-24 22:03:03', '');
INSERT INTO `order_tracking` VALUES ('670', '1074', null, 'ORDER READY', '2018-01-24 22:03:30', '');
INSERT INTO `order_tracking` VALUES ('671', '1073', null, 'ORDER READY', '2018-01-24 22:03:43', '');
INSERT INTO `order_tracking` VALUES ('672', '1072', null, 'ORDER READY', '2018-01-24 22:04:22', '');
INSERT INTO `order_tracking` VALUES ('673', '1071', null, 'ORDER READY', '2018-01-24 22:04:43', '');
INSERT INTO `order_tracking` VALUES ('674', '1077', null, 'RIDER DISPATCHED', '2018-01-24 22:05:21', '');
INSERT INTO `order_tracking` VALUES ('675', '1076', null, 'RIDER DISPATCHED', '2018-01-24 22:05:43', '');
INSERT INTO `order_tracking` VALUES ('676', '1075', null, 'RIDER DISPATCHED', '2018-01-24 22:05:57', '');
INSERT INTO `order_tracking` VALUES ('677', '1074', null, 'RIDER DISPATCHED', '2018-01-24 22:06:18', '');
INSERT INTO `order_tracking` VALUES ('678', '1073', null, 'RIDER DISPATCHED', '2018-01-24 22:06:41', '');
INSERT INTO `order_tracking` VALUES ('679', '1072', null, 'RIDER DISPATCHED', '2018-01-24 22:06:58', '');
INSERT INTO `order_tracking` VALUES ('680', '1078', null, 'PAYMENT PENDING', '2018-01-25 01:36:31', '');
INSERT INTO `order_tracking` VALUES ('681', '1078', null, 'ORDER CANCELLED', '2018-01-25 14:33:44', '');
INSERT INTO `order_tracking` VALUES ('682', '1079', null, 'PAYMENT PENDING', '2018-01-25 14:37:01', '');
INSERT INTO `order_tracking` VALUES ('683', '1080', null, 'PAYMENT PENDING', '2018-01-25 15:03:41', '');
INSERT INTO `order_tracking` VALUES ('684', '1081', null, 'PAYMENT PENDING', '2018-01-25 16:37:58', '');
INSERT INTO `order_tracking` VALUES ('685', '1081', null, 'ORDER CANCELLED', '2018-01-25 16:38:37', '');
INSERT INTO `order_tracking` VALUES ('686', '1082', null, 'PAYMENT PENDING', '2018-01-25 16:40:25', '');
INSERT INTO `order_tracking` VALUES ('687', '1082', null, 'ORDER CANCELLED', '2018-01-25 16:40:44', '');
INSERT INTO `order_tracking` VALUES ('688', '1080', null, 'ORDER CANCELLED', '2018-01-25 16:41:33', '');
INSERT INTO `order_tracking` VALUES ('689', '1083', null, 'PAYMENT PENDING', '2018-01-25 16:43:24', '');
INSERT INTO `order_tracking` VALUES ('690', '1083', null, 'ORDER CANCELLED', '2018-01-25 16:44:25', '');
INSERT INTO `order_tracking` VALUES ('691', '1084', null, 'PAYMENT PENDING', '2018-01-25 16:46:13', '');
INSERT INTO `order_tracking` VALUES ('692', '1084', null, 'ORDER CANCELLED', '2018-01-25 16:46:34', '');
INSERT INTO `order_tracking` VALUES ('693', '1079', null, 'ORDER CANCELLED', '2018-01-25 16:47:12', '');
INSERT INTO `order_tracking` VALUES ('694', '1085', null, 'PAYMENT PENDING', '2018-01-25 16:53:31', '');
INSERT INTO `order_tracking` VALUES ('695', '1085', null, 'ORDER CANCELLED', '2018-01-25 16:53:54', '');
INSERT INTO `order_tracking` VALUES ('696', '1086', null, 'PAYMENT PENDING', '2018-01-25 16:56:26', '');
INSERT INTO `order_tracking` VALUES ('697', '1086', null, 'ORDER CANCELLED', '2018-01-25 16:57:08', '');
INSERT INTO `order_tracking` VALUES ('700', '1088', null, 'PAYMENT PENDING', '2018-01-25 17:05:40', '');
INSERT INTO `order_tracking` VALUES ('701', '1088', null, 'ORDER CANCELLED', '2018-01-25 17:06:11', '');
INSERT INTO `order_tracking` VALUES ('725', '1094', null, 'ORDER CANCELLED', '2018-01-25 18:42:56', '');
INSERT INTO `order_tracking` VALUES ('726', '1093', null, 'ORDER CANCELLED', '2018-01-25 18:43:20', '');
INSERT INTO `order_tracking` VALUES ('727', '1092', null, 'ORDER CANCELLED', '2018-01-25 18:43:36', '');
INSERT INTO `order_tracking` VALUES ('728', '1091', null, 'ORDER CANCELLED', '2018-01-25 18:43:51', '');
INSERT INTO `order_tracking` VALUES ('729', '1090', null, 'ORDER CANCELLED', '2018-01-25 18:44:20', '');
INSERT INTO `order_tracking` VALUES ('730', '1089', null, 'ORDER CANCELLED', '2018-01-25 18:44:37', '');
INSERT INTO `order_tracking` VALUES ('731', '1088', null, 'ORDER CONFIRMED', '2018-01-25 18:44:58', '');
INSERT INTO `order_tracking` VALUES ('734', '1090', null, 'ORDER CONFIRMED', '2018-01-25 18:57:09', '');
INSERT INTO `order_tracking` VALUES ('735', '1101', null, 'PAYMENT PENDING', '2018-01-25 19:23:46', '');
INSERT INTO `order_tracking` VALUES ('736', '1102', null, 'PAYMENT PENDING', '2018-01-25 19:25:53', '');
INSERT INTO `order_tracking` VALUES ('737', '1103', null, 'PAYMENT PENDING', '2018-01-25 19:27:11', '');
INSERT INTO `order_tracking` VALUES ('738', '1081', null, 'ORDER CONFIRMED', '2018-01-25 20:15:55', '');
INSERT INTO `order_tracking` VALUES ('739', '1103', null, 'ORDER CANCELLED', '2018-01-25 20:20:15', '');
INSERT INTO `order_tracking` VALUES ('740', '1102', null, 'ORDER CANCELLED', '2018-01-25 20:20:34', '');
INSERT INTO `order_tracking` VALUES ('741', '1101', null, 'ORDER CANCELLED', '2018-01-25 20:20:47', '');
INSERT INTO `order_tracking` VALUES ('742', '1043', null, 'ORDER CONFIRMED', '2018-01-25 20:27:03', '');
INSERT INTO `order_tracking` VALUES ('743', '1043', null, 'RIDER DISPATCHED', '2018-01-25 20:28:48', '');
INSERT INTO `order_tracking` VALUES ('744', '1098', null, 'ORDER READY', '2018-01-25 20:29:07', '');
INSERT INTO `order_tracking` VALUES ('745', '1098', null, 'RIDER DISPATCHED', '2018-01-25 20:29:23', '');
INSERT INTO `order_tracking` VALUES ('746', '1048', null, 'ORDER READY', '2018-01-25 20:31:05', '');
INSERT INTO `order_tracking` VALUES ('747', '1048', null, 'RIDER DISPATCHED', '2018-01-25 20:31:17', '');
INSERT INTO `order_tracking` VALUES ('748', '1088', null, 'ORDER READY', '2018-01-25 20:38:25', '');
INSERT INTO `order_tracking` VALUES ('749', '1088', null, 'RIDER DISPATCHED', '2018-01-25 20:38:49', '');
INSERT INTO `order_tracking` VALUES ('751', '1104', null, 'PAYMENT PENDING', '2018-01-25 20:45:27', '');
INSERT INTO `order_tracking` VALUES ('752', '1104', null, 'ORDER CONFIRMED', '2018-01-25 20:46:00', '');
INSERT INTO `order_tracking` VALUES ('753', '1104', null, 'ORDER CANCELLED', '2018-01-25 20:46:35', '');
INSERT INTO `order_tracking` VALUES ('754', '1105', null, 'PAYMENT PENDING', '2018-01-25 20:48:38', '');
INSERT INTO `order_tracking` VALUES ('755', '1105', null, 'ORDER CONFIRMED', '2018-01-25 20:49:11', '');
INSERT INTO `order_tracking` VALUES ('756', '1086', null, 'ORDER CONFIRMED', '2018-01-25 20:52:06', '');
INSERT INTO `order_tracking` VALUES ('757', '1071', null, 'ORDER CANCELLED', '2018-01-25 20:54:28', '');
INSERT INTO `order_tracking` VALUES ('758', '1106', null, 'PAYMENT PENDING', '2018-01-25 23:22:39', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riders
-- ----------------------------
INSERT INTO `riders` VALUES ('5', '62', '1', '');
INSERT INTO `riders` VALUES ('6', '66', '1', '');
INSERT INTO `riders` VALUES ('7', '132', '1', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=471 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_cart
-- ----------------------------
INSERT INTO `tb_cart` VALUES ('239', '58', '4', '2', '15', 'LARGE', null, '1515946110', '2018-01-14 19:08:30', '2018-01-14 19:08:30');
INSERT INTO `tb_cart` VALUES ('284', '70', '19', '1', '1', '500ML', null, '1516209474', '2018-01-17 20:17:54', '2018-01-17 20:17:54');
INSERT INTO `tb_cart` VALUES ('318', '57', '3', '1', '13', 'MEDIUM', null, '1516439634', '2018-01-20 12:13:54', '2018-01-20 12:13:54');
INSERT INTO `tb_cart` VALUES ('363', '72', '33', '1', '11', 'SMALL', null, '1516645395', '2018-01-22 21:23:13', '2018-01-22 21:23:15');
INSERT INTO `tb_cart` VALUES ('364', '72', '2', '1', '11', 'SMALL', null, '1516645395', '2018-01-22 21:23:29', '2018-01-22 21:23:29');
INSERT INTO `tb_cart` VALUES ('365', '72', '23', '1', '1', '500ML', null, '1516645395', '2018-01-22 21:23:48', '2018-01-22 21:23:48');
INSERT INTO `tb_cart` VALUES ('369', '118', '3', '1', '13', 'MEDIUM', null, '1516649358', '2018-01-22 22:29:18', '2018-01-22 22:29:18');
INSERT INTO `tb_cart` VALUES ('370', '119', '43', '1', '11', 'SMALL', null, '1516651223', '2018-01-22 23:00:20', '2018-01-22 23:00:23');
INSERT INTO `tb_cart` VALUES ('374', '99', '1', '1', '15', 'LARGE', null, '1516696395', '2018-01-23 11:33:15', '2018-01-23 11:33:15');
INSERT INTO `tb_cart` VALUES ('377', '126', '4', '1', '15', 'LARGE', null, '1516700085', '2018-01-23 12:34:45', '2018-01-23 12:34:45');
INSERT INTO `tb_cart` VALUES ('378', '128', '5', '1', '13', 'MEDIUM', null, '1516706837', '2018-01-23 14:27:17', '2018-01-23 14:27:17');
INSERT INTO `tb_cart` VALUES ('379', '128', '9', '1', '11', 'SMALL', null, '1516706837', '2018-01-23 14:28:56', '2018-01-23 21:00:56');
INSERT INTO `tb_cart` VALUES ('380', '125', '9', '1', '11', 'SMALL', null, '1516709030', '2018-01-23 15:03:50', '2018-01-23 15:03:50');
INSERT INTO `tb_cart` VALUES ('387', '131', '40', '1', '11', 'SMALL', null, '1516717575', '2018-01-23 17:26:15', '2018-01-23 17:26:15');
INSERT INTO `tb_cart` VALUES ('393', '141', '35', '1', '15', 'LARGE', null, '1516740513', '2018-01-23 23:48:33', '2018-01-23 23:48:33');
INSERT INTO `tb_cart` VALUES ('394', '142', '3', '1', '13', 'MEDIUM', null, '1516745550', '2018-01-24 01:12:30', '2018-01-24 01:12:30');
INSERT INTO `tb_cart` VALUES ('401', '130', '38', '1', '13', 'MEDIUM', null, '1516796452', '2018-01-24 15:20:52', '2018-01-24 15:20:52');
INSERT INTO `tb_cart` VALUES ('408', '137', '37', '1', '11', 'SMALL', null, '1516806553', '2018-01-24 18:09:13', '2018-01-24 18:09:34');
INSERT INTO `tb_cart` VALUES ('414', '63', '5', '1', '13', 'MEDIUM', null, '1516810320', '2018-01-24 19:12:00', '2018-01-24 19:40:58');
INSERT INTO `tb_cart` VALUES ('416', '63', '33', '1', '11', 'SMALL', null, '1516810320', '2018-01-24 19:40:40', '2018-01-24 19:40:40');
INSERT INTO `tb_cart` VALUES ('446', '65', '3', '1', '13', 'MEDIUM', null, '1516890462', '2018-01-25 17:27:42', '2018-01-25 17:29:24');
INSERT INTO `tb_cart` VALUES ('453', '49', '19', '5', '1', '500ML', null, '1516897504', '2018-01-25 19:25:04', '2018-01-25 19:25:04');
INSERT INTO `tb_cart` VALUES ('457', '58', '39', '1', '15', 'LARGE', null, '1515946110', '2018-01-25 19:29:36', '2018-01-25 19:29:36');
INSERT INTO `tb_cart` VALUES ('459', '25', '5', '1', '13', 'MEDIUM', null, '1516902333', '2018-01-25 20:45:33', '2018-01-25 20:45:33');
INSERT INTO `tb_cart` VALUES ('470', '165', '40', '1', '11', 'SMALL', null, '1516946977', '2018-01-26 09:09:37', '2018-01-26 09:09:37');

-- ----------------------------
-- Table structure for tb_delivery_time
-- ----------------------------
DROP TABLE IF EXISTS `tb_delivery_time`;
CREATE TABLE `tb_delivery_time` (
  `TIME_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `DELIVERY_TIME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TIME_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_delivery_time
-- ----------------------------
INSERT INTO `tb_delivery_time` VALUES ('1', '00:00');
INSERT INTO `tb_delivery_time` VALUES ('2', '01:00');
INSERT INTO `tb_delivery_time` VALUES ('3', '03:00');
INSERT INTO `tb_delivery_time` VALUES ('4', '04:00');
INSERT INTO `tb_delivery_time` VALUES ('5', '05:00');
INSERT INTO `tb_delivery_time` VALUES ('6', '06:00');
INSERT INTO `tb_delivery_time` VALUES ('7', '07:00');
INSERT INTO `tb_delivery_time` VALUES ('8', '08:00');
INSERT INTO `tb_delivery_time` VALUES ('9', '09:00');
INSERT INTO `tb_delivery_time` VALUES ('10', '10:00');
INSERT INTO `tb_delivery_time` VALUES ('11', '11:00');
INSERT INTO `tb_delivery_time` VALUES ('12', '12:00');
INSERT INTO `tb_delivery_time` VALUES ('13', '13:00');
INSERT INTO `tb_delivery_time` VALUES ('14', '14:00');
INSERT INTO `tb_delivery_time` VALUES ('15', '15:00');
INSERT INTO `tb_delivery_time` VALUES ('16', '16:00');
INSERT INTO `tb_delivery_time` VALUES ('17', '17:00');
INSERT INTO `tb_delivery_time` VALUES ('18', '18:00');
INSERT INTO `tb_delivery_time` VALUES ('19', '19:00');
INSERT INTO `tb_delivery_time` VALUES ('20', '20:00');
INSERT INTO `tb_delivery_time` VALUES ('21', '21:00');
INSERT INTO `tb_delivery_time` VALUES ('22', '22:00');
INSERT INTO `tb_delivery_time` VALUES ('23', '23:00');

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
INSERT INTO `tb_status` VALUES ('KITCHEN ALLOCATED', 'Transfer to Kitchen', 'GREEN', 'INACTIVE', '3', '1');
INSERT INTO `tb_status` VALUES ('ORDER CANCELLED', 'Cancel Order', 'RED', 'ALL', '0', '0');
INSERT INTO `tb_status` VALUES ('ORDER CONFIRMED', 'Confirm Order', 'PURPLE', 'OFFICE', '2', '0');
INSERT INTO `tb_status` VALUES ('ORDER DELIVERED', 'Order Delieverd', 'RED', 'RIDER', '10', '0');
INSERT INTO `tb_status` VALUES ('ORDER NOT DELIVERED', 'Order Not Delivered', 'RED', 'RIDER', '12', '0');
INSERT INTO `tb_status` VALUES ('ORDER PENDING', 'Awaiting Processing', '#ff69b4', 'ALL', '1', '0');
INSERT INTO `tb_status` VALUES ('ORDER READY', 'Order Ready', '#f1c232', 'KITCHEN', '6', '2');
INSERT INTO `tb_status` VALUES ('PAYMENT PENDING', 'Payment Not Confirmed', 'GREEN', 'INACTIVE', '11', '2');
INSERT INTO `tb_status` VALUES ('RIDER ASSIGNED', 'Assign Rider', 'GREEN', 'INACTIVE', '8', '4');
INSERT INTO `tb_status` VALUES ('RIDER DISPATCHED', 'Assign & Dispatch Rider', 'GREEN', 'KITCHEN', '9', '5');
INSERT INTO `tb_status` VALUES ('UNDER PREPARATION', 'Preparing Order', 'ORANGE', 'INACTIVE', '5', '1');

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
  `MOBILE` varchar(25) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `LOCATION_ID` bigint(20) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DATE_REGISTERED` datetime DEFAULT NULL,
  `LAST_UPDATED` datetime DEFAULT NULL,
  `CLIENT_TOKEN` varchar(255) DEFAULT NULL,
  `RESET_TOKEN` varchar(100) NOT NULL,
  `USER_STATUS` bit(1) DEFAULT b'1' COMMENT 'Indicate if user is active or not',
  `TOKEN_EXPPIRY` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_NAME` (`USER_NAME`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  KEY `LOCATION_ID_idx` (`LOCATION_ID`) USING BTREE,
  KEY `USER_TYPE_idx` (`USER_TYPE`) USING BTREE,
  KEY `DATE_REGISTERED` (`DATE_REGISTERED`),
  CONSTRAINT `tb_users_ibfk_2` FOREIGN KEY (`USER_TYPE`) REFERENCES `user_type` (`USER_TYPE_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('5', 'pkyalo', '1', 'KINGOO', 'PETER KYALO', '724802220', 'petchaloo@gmail.com', '1', '834dfae0c40820faccf4f83580be800545dca3c1', '2017-10-09 07:06:51', '2017-10-09 07:06:51', null, '', '', null);
INSERT INTO `tb_users` VALUES ('10', 'fatelord', '1', 'BARASA', 'SAMMY M', '1123', 'barsamms@gmail.com', '1', '63aaa47cb0b76f0b157c40cdba9bf78653a7af37', '2017-10-09 07:06:51', '2018-01-17 22:46:48', null, 'NWbg0nncB5pwiR-77U-ydL8a9LKhsGjZ', '', null);
INSERT INTO `tb_users` VALUES ('11', 'admin', '2', 'ADMIN', 'ADMIN', '123', 'admin@pizzaout.so', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-11-10 13:11:43', '2017-11-10 13:11:49', null, '', '', null);
INSERT INTO `tb_users` VALUES ('24', 'kyalo', '1', 'KINGOO', 'PETER KYALO', '2147483647', 'pkyalo@uonbi.ac.ke', '1', '834dfae0c40820faccf4f83580be800545dca3c1', '2017-12-20 12:38:11', '2017-12-20 12:38:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('25', 'mohacpr', '1', 'MOHAMED', 'MOHAMED', '619000333', 'mohacpr@gmail.com', '1', '2d7d1969f957c467cfb161b81ff408af6b94a8ea', '2017-12-20 19:39:38', '2017-12-20 19:39:38', null, '', '', null);
INSERT INTO `tb_users` VALUES ('29', 'shumac', '1', 'SHUMAC', 'SHUSHUU', '2147483647', 'shumac55@gmail.com', '1', '513a7c4018127c653ce3b9037e29bdd9c03e29f7', '2017-12-21 13:50:19', '2017-12-21 13:50:19', null, '', '', null);
INSERT INTO `tb_users` VALUES ('44', 'abdikasim', '1', 'MOALIM', 'AHMED', '617999222', 'abdulkasimmoalim@gmail.com', '1', 'b82886f310d6c223dea476600babca5849670e21', '2017-12-21 17:27:14', '2017-12-21 17:27:14', null, '', '', null);
INSERT INTO `tb_users` VALUES ('45', 'sandheere', '1', 'MOHAMED', 'SANDHEERE', '2147483647', 'sanka6016@gmail.com', '1', '890940a175fdd194c3f42a27e8ecbfefb983094d', '2017-12-21 17:48:20', '2017-12-21 17:48:20', null, '', '', null);
INSERT INTO `tb_users` VALUES ('46', 'sandheere10', '1', 'MOHAMED', 'SANDHEERE', '2147483647', 'sanka6015@gmail.com', '1', '8238a351f035bc1f72a1a7cff337221a73dae6f2', '2017-12-21 18:02:10', '2017-12-21 18:02:10', null, '', '', null);
INSERT INTO `tb_users` VALUES ('47', 'mr. vision', '1', 'YASIR', 'BAFFO', '618309457', 'mr.vision2025@gmail.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-12-21 18:32:22', '2017-12-21 18:32:22', null, '', '', null);
INSERT INTO `tb_users` VALUES ('48', 'aainab', '1', 'AINAB', 'AHMED ABDI', '615513533', 'axmedcaynab@gmail.com', '1', '0fb641dff5070d488355f89a1ad0fdc8203e0f33', '2017-12-23 06:44:32', '2017-12-23 06:44:32', null, '', '', null);
INSERT INTO `tb_users` VALUES ('49', 'ozgur.catal', '1', 'CATAL', 'OZGUR', '612136659', 'ozgur.catal@hotmail.com', '1', '7a59c162217c6abbe65db58ecdfcb1765780af7b', '2017-12-24 13:08:46', '2017-12-24 13:08:46', null, '', '', null);
INSERT INTO `tb_users` VALUES ('51', 'zuhuur', '1', 'ZAHRA', 'ZUU', '618812510', 'zahra@sostec.so', '1', '5ddf228c30669af17fb926a7d728c4e9d6c8df27', '2017-12-25 10:09:12', '2017-12-25 10:09:12', null, '', '', null);
INSERT INTO `tb_users` VALUES ('52', 'zahradhaqane', '1', 'DHAQANE', 'ZAHRA OSMAN', '615533643', 'zahradhaqane@gmail.com', '1', 'e72fb1b6ffd172fef3a3c97b4555a0669cac4c7e', '2017-12-26 04:15:21', '2017-12-26 04:15:21', null, '', '', null);
INSERT INTO `tb_users` VALUES ('53', 'aallaa', '1', 'AALLAA', 'HABAD', '615888129', 'Aallaahabad@gmail.com', '1', '3edacb467448252d0f8f49c732ba00cc438b5895', '2017-12-26 16:49:26', '2017-12-26 16:49:26', null, '', '', null);
INSERT INTO `tb_users` VALUES ('54', 'badle', '1', 'MAXAMUUD XAMUD', 'BADLE', '617641354', 'badle7171@gmail.com', '1', 'c4f7d269ffa6b3c3c77fb0b3d14a3afdd0161182', '2017-12-27 07:41:24', '2017-12-27 07:41:24', null, '', '', null);
INSERT INTO `tb_users` VALUES ('55', 'shiine', '1', 'MOHAMED', 'ALI', '619616338', 'shiine318@hotmail.com', '1', '02ecc6c8afccd0dd029bddc56641cd309a171f3e', '2017-12-28 20:54:38', '2017-12-28 20:54:38', null, '', '', null);
INSERT INTO `tb_users` VALUES ('56', 'arafat', '1', 'ARAFAT', 'ABDULLAHI', '615518583', 'arafat.abdulahi@gmail.com', '1', '866e7caa1629cd75acb8af543d55cc3985c47212', '2018-01-01 19:14:05', '2018-01-01 19:14:05', null, '', '', null);
INSERT INTO `tb_users` VALUES ('57', 'Izabella', '1', 'Faiza Abdullahi', 'izabella', '00252615429642', 'faizaabdullahi114@gmail.com', '1', 'eb131bc0d99b318156189f73024ce1cb29727f72', '2018-01-11 06:38:20', '2018-01-11 06:38:20', null, '', '', null);
INSERT INTO `tb_users` VALUES ('58', 'Abdirizak', '1', 'war', 'war', '0611111553', 'mogastars@gmail.com', '1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2018-01-14 14:44:35', '2018-01-14 14:44:35', null, '', '', null);
INSERT INTO `tb_users` VALUES ('59', 'mohamed', '1', 'kaabe', 'kabogeed', '0619420000', 'mohamedkabbe@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-01-15 09:48:31', '2018-01-15 09:48:31', null, '', '', null);
INSERT INTO `tb_users` VALUES ('60', 'cabdalla', '1', 'Mohamed', 'cabdalla Mohamed Muhumed', '0615577730', 'cabdallamm2@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-01-15 09:48:46', '2018-01-15 09:48:46', null, '', '', null);
INSERT INTO `tb_users` VALUES ('61', 'Abdisahal', '1', 'dalqaf', 'Mohamed', '0616011111', 'dalqaf@gmail.com', '1', '05f6b89efae9c8e1a7132259e9dae394b3366053', '2018-01-15 15:28:12', '2018-01-15 15:28:12', null, '', '', null);
INSERT INTO `tb_users` VALUES ('62', 'Mohamed2', '3', 'Abuukar', 'Muuse', '061 5270306', 'Hassan@mail.com', null, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2018-01-15 16:28:03', '2018-01-15 16:28:03', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('63', 'shiine1', '1', 'nur', 'shiine', '00252619616338', 'shiine318@gmail.com', '1', 'b7ca21bfc9c98a088aae487a68a154328b61c350', '2018-01-15 18:01:36', '2018-01-15 18:01:36', null, '', '', null);
INSERT INTO `tb_users` VALUES ('64', 'abdikarim', '2', 'warsame', 'Mohamed', '0615351399', 'rujaal.1231@gmail.com', '1', 'b5a3ed2393883f8f897d3690af119959ee4f7498', '2018-01-16 10:19:47', '2018-01-16 12:00:33', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('65', 'fardawsa', '2', 'hussein', 'ahmed', '0619991194', 'fardus94@gmail.com', '1', '2601edae909efe4354c80d523328d884642d9964', '2018-01-16 10:22:13', '2018-01-16 11:58:47', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('66', 'Muriidi', '3', 'Aweys', 'Abdikader', '061 5886150', 'info@pizzaout.so', null, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-01-16 11:26:49', '2018-01-16 11:26:49', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('69', 'abdirahim', '1', 'Yusuf', 'Abdulle', '0615537810', 'abdirahim116@gmail.com', null, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2018-01-17 15:34:06', '2018-01-17 19:59:11', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('70', 'samaati', '1', 'nor', 'Tbrk', '0615914848', 'samaati@hot.comail.com', '1', 'd5eee1a425da58faa5d71df0adc1cb35ade0a69b', '2018-01-17 15:35:24', '2018-01-17 15:35:24', null, '', '', null);
INSERT INTO `tb_users` VALUES ('71', 'Iftin', '1', 'Iftinka', 'iftin', '0618002902', 'iftin1100@gmail.com', '1', '7c222fb2927d828af22f592134e8932480637c0d', '2018-01-17 16:13:59', '2018-01-17 16:13:59', null, '', '', null);
INSERT INTO `tb_users` VALUES ('72', 'Ahmed', '1', 'siyaad', 'Gurey', '0615708932', 'drahmednuur123@gmial.com', '1', 'c522a8cc50a849bcf3a418210c7a4786075d12aa', '2018-01-17 16:21:19', '2018-01-17 16:21:19', null, '', '', null);
INSERT INTO `tb_users` VALUES ('73', 'abokor', '1', 'jama', 'look behind you', '0618396711', 'abkijaa@gmail.com', '1', '06828338d7ed45e394aaee7bc4340871a89d65a7', '2018-01-17 18:43:03', '2018-01-17 18:43:03', null, '', '', null);
INSERT INTO `tb_users` VALUES ('74', 'petero', '1', 'Khalid', 'Peter', '084', 'pkyalo@topsoftchoice.com', '1', '834dfae0c40820faccf4f83580be800545dca3c1', '2018-01-17 18:54:56', '2018-01-17 18:54:56', null, '', '', null);
INSERT INTO `tb_users` VALUES ('75', 'Dhore01', '1', 'Cali', 'Xaashi', '0615520733', 'dhore01@gmail.com', '1', 'afca926ff7d5fa13958a33ad7235a28bdc923491', '2018-01-17 19:04:48', '2018-01-17 19:04:48', null, '', '', null);
INSERT INTO `tb_users` VALUES ('76', 'doonte', '1', 'keenhee', 'sami', '0682278971', 'ihack6822@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-01-17 19:11:06', '2018-01-17 19:11:06', null, '', '', null);
INSERT INTO `tb_users` VALUES ('77', 'maabdi', '1', 'Abdi', 'Mohamed', '0618900039', 'maabdi@outlook.com', '1', '25b0d57e46e4142f01bda707648c46a9de762c62', '2018-01-17 19:51:44', '2018-01-17 19:51:44', null, '', '', null);
INSERT INTO `tb_users` VALUES ('78', 'muktar', '1', 'muktar', 'Mohamed', '+25215514164', 'bashaar2200@gmail.comv', '1', '5e70acbf3b135175635ff38fa1f6ee04107f05b8', '2018-01-18 09:25:11', '2018-01-18 09:25:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('80', 'eng yaasin', '1', 'hassan', 'hilowle', '0615444935', 'hilowle90@hotmail.co.uk', '1', 'd9a223a79fab13c9c3b5635a2df5a155df547a30', '2018-01-18 10:03:42', '2018-01-18 10:03:42', null, '', '', null);
INSERT INTO `tb_users` VALUES ('82', 'Warsame', '1', 'War', 'War', '0615547113', 'mugastarss@gmail.com', '1', '8351f8c13b71fb47bc316689fdfb8a10ee5ad472', '2018-01-18 11:41:41', '2018-01-18 11:41:41', null, '', '', null);
INSERT INTO `tb_users` VALUES ('83', 'Fatima', '1', 'Ali', 'AY FAY', '+252615787267', 'fatumairon@gmail.com', '1', 'e8ae314f46c29cea0cd7e9fc20e4a49d4726bf18', '2018-01-18 13:37:24', '2018-01-18 13:37:24', null, '', '', null);
INSERT INTO `tb_users` VALUES ('84', 'ali', '1', 'cersen', 'ali', '612344105', 'alicemcersen@hotmail.com', '1', '22f09f3b18884516f17268b8adf5390d319b9fbc', '2018-01-18 16:49:24', '2018-01-18 16:49:24', null, '', '', null);
INSERT INTO `tb_users` VALUES ('85', 'Amina', '1', 'Zahra', 'aminazahra', '0617317931', 'asmaxasnibrahim@gmail.com', '1', '7c222fb2927d828af22f592134e8932480637c0d', '2018-01-18 17:16:15', '2018-01-18 17:16:15', null, '', '', null);
INSERT INTO `tb_users` VALUES ('86', 'Abdalla', '1', 'Abdisalam', 'abdoo', '0619779441', 'abdallaahmednur@gmail.com', '1', 'b04580ec84ea4444072d8baa54987bae91481b6c', '2018-01-18 20:13:19', '2018-01-18 20:13:19', null, '', '', null);
INSERT INTO `tb_users` VALUES ('87', 'Maslah', '1', 'Maslah', 'Abdinasir', '0616310952', 'maslah99@live.com', '1', '3aa1cf95ddbc91842141a38cb4c2bf49b3eb3698', '2018-01-18 22:51:37', '2018-01-18 22:51:37', null, '', '', null);
INSERT INTO `tb_users` VALUES ('88', 'bashir wadani', '1', 'oyow', 'wadani', '+252615772070', 'Oyoow2@gmail.com', '1', '68cef60b43b6715df8b9ea999618c93f1f7b10bb', '2018-01-20 18:45:35', '2018-01-20 18:45:35', null, '', '', null);
INSERT INTO `tb_users` VALUES ('89', 'kizilay', '1', 'Fatih', 'Tongur', '+252616785462', 'fatih.tongur@kizilay.org.tr', '1', 'cf217d30e8b6734c61d5367049dec6207e80018e', '2018-01-20 20:04:31', '2018-01-20 20:04:31', null, '', '', null);
INSERT INTO `tb_users` VALUES ('90', 'sefa', '1', 'inal', 'sonsuz', '682221769', 'sefainal@hotmail.com', '1', '4e2c1f1190bc18b30d5a38b635b8b362b6e8fd4c', '2018-01-20 20:41:38', '2018-01-20 20:41:38', null, '', '', null);
INSERT INTO `tb_users` VALUES ('91', 'ian', '1', 'iman', 'Kelvin', '+254710996329', '25045k99@gmail.com', '1', '820b4090fc1b199f710997c54b101226cc7d6d2f', '2018-01-21 06:26:09', '2018-01-21 06:26:09', null, '', '', null);
INSERT INTO `tb_users` VALUES ('92', 'Winnie', '1', 'Mburu', 'Njeri', '+254707032500', 'wmburu11@gmail.com', '1', 'a623fb28a70df45047d030a58efdc56e97530434', '2018-01-21 15:05:45', '2018-01-21 15:05:45', null, '', '', null);
INSERT INTO `tb_users` VALUES ('93', 'Khadar mohamed', '1', 'Farah', 'Biciid', '0618836001', 'khadarbiciid@gmail.com', '1', 'd5e7cc58d0e593096e793344853a73bae53fb4f7', '2018-01-21 21:57:25', '2018-01-21 21:57:25', null, '', '', null);
INSERT INTO `tb_users` VALUES ('94', 'jaamac', '1', 'Jaamac', 'Faarax', '0682343002', 'jaamac@faarax.com', '1', '99442d9c8b5fc2b1543077bcc3c4b735fe6a20f7', '2018-01-21 22:07:55', '2018-01-21 22:07:55', null, '', '', null);
INSERT INTO `tb_users` VALUES ('95', 'Hamza', '1', 'tall', 'abdi', '+252618672777', 'hamzaaar@Gmail.com', '1', '7eb4fd05e51d34d103778f17416cecd163304f82', '2018-01-21 22:25:36', '2018-01-21 22:25:36', null, '', '', null);
INSERT INTO `tb_users` VALUES ('96', 'alx.suleimani', '1', 'suleiman', 'abdirahman', '0615603399', 'sabdirahman5@gmail.com', '1', 'f86ed0e005a61c2244aa5ff17a53d38c091144a5', '2018-01-21 22:45:25', '2018-01-21 22:45:25', null, '', '', null);
INSERT INTO `tb_users` VALUES ('97', 'Omar', '1', 'Hashi', 'Hassan', '+252618278435', 'engroshid2016@gmail.com', '1', '20cb09c4b80dbb1dba07db89b76dc1ad597a2d08', '2018-01-22 09:11:54', '2018-01-22 09:11:54', null, '', '', null);
INSERT INTO `tb_users` VALUES ('98', 'mahamed', '1', 'abdulaahi', 'abdi', '0617468096', 'Dalsoor738@gmail.com', '1', '04207e9cbe9ca71652e63c4c790702e753a90e69', '2018-01-22 14:57:40', '2018-01-22 14:57:40', null, '', '', null);
INSERT INTO `tb_users` VALUES ('99', 'mohamed ahmed', '1', 'nor', 'lab', '615872094', 'dremadman@gmail.com', '1', '894f1457c02eb005942aa2a96d5ae72eed1485ed', '2018-01-22 17:59:31', '2018-01-22 17:59:31', null, '', '', null);
INSERT INTO `tb_users` VALUES ('100', 'Hassan', '1', 'Awil', 'Osman', '612549767', 'kuusowcawil@gmail.com', '1', '178cb4861e8ca3efcb93fb48d63158f96f5fff53', '2018-01-22 18:13:39', '2018-01-22 18:13:39', null, '', '', null);
INSERT INTO `tb_users` VALUES ('101', 'omar12', '1', 'omar', 'mohamed osman', '0618080310', 'cumar251371@gmail.com', '1', '8c448fd9566e2aac993da90900c7b5560c188e9f', '2018-01-22 18:14:08', '2018-01-22 18:14:08', null, '', '', null);
INSERT INTO `tb_users` VALUES ('102', 'Otaanga', '1', 'yare', 'Moha', '0618709537', 'otaange@gmail.com', '1', '23aec7f1fc1c47d1c1aa9ebdde3a1f8736fe9057', '2018-01-22 18:14:30', '2018-01-22 18:14:30', null, '', '', null);
INSERT INTO `tb_users` VALUES ('103', 'liibaan', '1', 'haji barbe', 'baarbe', '+252615620013', 'faasim10@hotmail.com', '1', 'cf29270a8585e76f207248452f6c89225c91ad61', '2018-01-22 18:29:01', '2018-01-22 18:29:01', null, '', '', null);
INSERT INTO `tb_users` VALUES ('104', 'baarbe140', '1', 'baarbe', 'baarbe yare', '+252615620013', 'lii4me@hotmail.com', '1', '1b294552c42134bc3c00ee5b4bd95a44625d8285', '2018-01-22 18:30:40', '2018-01-22 18:31:27', null, '8o_i08Qd3UvNck_C3flT_i6dGrpyWXh7', '', null);
INSERT INTO `tb_users` VALUES ('105', 'baarbe10', '1', 'baarbe', 'baarbeyare', '+252615620013', 'nadar20009@hotmail.com', '1', 'cf29270a8585e76f207248452f6c89225c91ad61', '2018-01-22 18:32:56', '2018-01-22 18:32:56', null, '', '', null);
INSERT INTO `tb_users` VALUES ('106', 'ruun', '1', 'sidow', 'ahlam', '0617338560', 'runsidow@gmail.com', '1', '49616d8758593687c0745053fd272fbb73148640', '2018-01-22 18:39:07', '2018-01-22 18:39:07', null, '', '', null);
INSERT INTO `tb_users` VALUES ('107', 'kuniil', '1', 'kuniil', 'ismail', '0615202130', 'kunaakcc@gmail.com', '1', '323e569a5c7088b571893664a92ee23937fedb09', '2018-01-22 18:52:36', '2018-01-22 18:52:36', null, '', '', null);
INSERT INTO `tb_users` VALUES ('108', 'ismail', '1', 'omar', 'kuncil', '0615202130', 'ismailomarallas@gmail.com', '1', 'b4a452d4120d9ba11adf77e8203bafaa6e25c716', '2018-01-22 18:54:44', '2018-01-22 18:54:44', null, '', '', null);
INSERT INTO `tb_users` VALUES ('109', 'Maxamed', '1', 'Abdullahi', 'Dhugad', '+252616551817', 'maxamedyare4y@hotmail.com', '1', '96f9e79e9aae29e2c3c01cb9dd939f87e012ad74', '2018-01-22 19:02:27', '2018-01-22 19:02:27', null, '', '', null);
INSERT INTO `tb_users` VALUES ('110', 'jawidagan', '1', 'jàwidagan', 'joker', '00252616572598', 'xarbiye2@hotmail.com', '1', '7c222fb2927d828af22f592134e8932480637c0d', '2018-01-22 19:35:11', '2018-01-22 19:35:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('111', 'shadia', '1', 'shadia', 'sadia', '00252615114737', 'shadiavip@gmail.com', '1', '2562ec43ac7753dbdc964f63fbe53c73f518800b', '2018-01-22 19:48:22', '2018-01-22 19:49:28', null, 'jSBCz-Jl_zR139kJLx7CwQoeuKyRn4nh', '', null);
INSERT INTO `tb_users` VALUES ('112', 'Abbas', '1', 'Ali', 'Smart', '0618000007', 'smarta4@gmail.com', '1', '243041359a85fcb6fb3043abef8d7a564fe9de44', '2018-01-22 19:48:22', '2018-01-22 19:48:22', null, '', '', null);
INSERT INTO `tb_users` VALUES ('113', 'emre', '1', 'citil', 'yardimeli', '0617212705', 'emre.citil.tek@hotmail.com', '1', 'be5a0d09a46871674fa5795b2435fc540e3d8785', '2018-01-22 19:59:18', '2018-01-22 19:59:18', null, '', '', null);
INSERT INTO `tb_users` VALUES ('114', 'Abdifatah', '1', 'Ali', 'mohamud', '06199961111', 'dhubane231@gmail.com', '1', 'ce872f15437af3619fabe46ce16ea3647a86f85f', '2018-01-22 20:21:45', '2018-01-22 20:21:45', null, '', '', null);
INSERT INTO `tb_users` VALUES ('115', 'Halima', '1', 'Abdiaziz', 'Hassan', '+252619111127', 'fowsiya911@gmail.com', '1', '0b6f3ad2947637742a490cde14db4b5f60cf78ea', '2018-01-22 21:36:19', '2018-01-22 21:36:19', null, '', '', null);
INSERT INTO `tb_users` VALUES ('116', 'aminmacruf', '1', 'Maruf', 'Amin', '00252615588663', 'aminmacruf@gmail.com', '1', 'd8d442e65b74a008aa7a9fe74db6c0e390ffb83a', '2018-01-22 21:54:17', '2018-01-22 21:54:17', null, '', '', null);
INSERT INTO `tb_users` VALUES ('117', 'Mohamed Tahliil', '1', 'mt.baashi@gmail.com', 'Timowayne', '0617218062', 'mt.baashi@gmail.com', '1', 'b78ec509c0b80e421889a33d64a77818323de6e8', '2018-01-22 22:16:58', '2018-01-22 22:16:58', null, '', '', null);
INSERT INTO `tb_users` VALUES ('118', 'Samia mahmet', '1', 'Samia', 'mahamed', '0615006078', 'Saamka9@Gmail.com', '1', 'c795c257d772027720da1dafc79b8e35de94754e', '2018-01-22 22:27:51', '2018-01-22 22:27:51', null, '', '', null);
INSERT INTO `tb_users` VALUES ('119', 'cnwaraabe', '1', 'Mohamed', 'Abdinasir', '00252619118532', 'cnwaraabe@hotmail.com', '1', '43b75c7528c65936e57f87c9a277cedf48f0c9eb', '2018-01-22 22:59:07', '2018-01-22 22:59:07', null, '', '', null);
INSERT INTO `tb_users` VALUES ('120', 'Abdi', '1', 'Mubarak', 'Crouch', '615522242', 'buurukurr@gmail.com', '1', 'c62e7a059cfbf34cfbbfc84dcedee145b08b8fbd', '2018-01-22 23:50:15', '2018-01-22 23:50:15', null, '', '', null);
INSERT INTO `tb_users` VALUES ('121', 'ayanle', '1', 'jamow', 'style', '612105343', 'ayanlestyle@gmail.com', '1', 'd0525c6b7f0788a77a212cbcd9991e8a03f1f56b', '2018-01-23 08:52:17', '2018-01-23 08:52:17', null, '', '', null);
INSERT INTO `tb_users` VALUES ('122', 'Aisha', '1', 'Abdukadir', 'Hersi', '0615892895', 'aisha132011@gmail.com', '1', '646e44a7047c99d21d65c96ea1d147fda773bb97', '2018-01-23 08:58:10', '2018-01-23 08:58:10', null, '', '', null);
INSERT INTO `tb_users` VALUES ('123', 'yuzzefislaam', '1', 'xaaji cali', 'yusuf', '+252615195135', 'yuusufkashka@gmail.com', '1', 'd2d4d1fd1b4710c840395da6aad9a06f28ff7529', '2018-01-23 10:40:04', '2018-01-23 10:40:04', null, '', '', null);
INSERT INTO `tb_users` VALUES ('124', 'Muniira', '1', 'Elmi', 'Cawil', '0616118730', 'muniirocawil@hotmail.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-01-23 11:24:41', '2018-01-23 11:24:41', null, '', '', null);
INSERT INTO `tb_users` VALUES ('125', 'Aliyow', '1', 'Abdi', 'dhoof', '+252615408318', 'calinuurgm@gmail.com', '1', '8cb2237d0679ca88db6464eac60da96345513964', '2018-01-23 11:45:53', '2018-01-23 11:45:53', null, '', '', null);
INSERT INTO `tb_users` VALUES ('126', 'Kevin', '1', 'Kevin', 'Marokko', '0720215945', 'kevinmarokko@ymail.com', '1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2018-01-23 12:34:04', '2018-01-23 12:34:04', null, '', '', null);
INSERT INTO `tb_users` VALUES ('127', 'Hagi', '1', 'Amin', 'Hagi Amin', '615037070', 'siramiin@gmail.com', '1', '645f5966fbfc036627e9556ea09e8bc8388262ec', '2018-01-23 13:50:15', '2018-01-23 13:50:15', null, '', '', null);
INSERT INTO `tb_users` VALUES ('128', 'iqlaasmoha11', '1', 'dheemaluul', 'iqlaas', '0618119191', 'iqlaasmoha11@gmail.com', '1', '7c84fad8203e16af22aecd0b5fd8845ed00c9b51', '2018-01-23 14:25:11', '2018-01-23 14:25:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('129', 'abdiwali', '1', 'Hassan', 'Faroole', '004745667665', 'akraamzizo@yahoo.no', '1', '345d13d7c64c9c2401d18cf19a7eb1c1bed537ca', '2018-01-23 15:20:28', '2018-01-23 15:20:28', null, '', '', null);
INSERT INTO `tb_users` VALUES ('130', 'mudu', '1', 'Mohamud', 'Ismail', '+252619698596', 'mohamud.merit@gmail.com', '1', 'ced239067f20b6d83f5804ce05c23b68c2291fbe', '2018-01-23 15:57:29', '2018-01-23 15:57:29', null, '', '', null);
INSERT INTO `tb_users` VALUES ('131', 'mohamed yakub', '1', 'yardimeli', 'yakub', '00252617005988', 'mohamedyardim@gmail.com', '1', '9118c2aaa316da6f0f1e20a8a183a16c50ab9214', '2018-01-23 16:50:06', '2018-01-23 16:50:06', null, '', '', null);
INSERT INTO `tb_users` VALUES ('132', 'Abdirahmaan', '3', 'mohamuud', 'Duaale', '061 5548417', 'abc', null, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-01-23 17:58:00', '2018-01-23 17:58:00', null, 'NONE', '', null);
INSERT INTO `tb_users` VALUES ('133', 'abshir', '1', 'Abshir10', 'Mo\'alim', '0617050869', 'Cagtaxaaji10@gmail.com', '1', '138423ac94fdd69a8c31f63939666a3bc8c3c74c', '2018-01-23 18:51:30', '2018-01-23 18:51:30', null, '', '', null);
INSERT INTO `tb_users` VALUES ('134', 'Amina Zahra', '1', 'Arale', 'N/A', '0615565518', 'dalbiloa@gmail.com', '1', '2e342f6954a48fda0ef5966f3467f55c15f05282', '2018-01-23 16:40:37', '2018-01-23 16:40:37', null, '', '', null);
INSERT INTO `tb_users` VALUES ('135', 'yuusuf', '1', 'yusuf deeko', 'cabdullahi', '615177819', 'yusufcabdulahi@gmail.com', '1', '26f601a30cfc7b69f0f0a7c77811ba0cdd48b075', '2018-01-23 20:41:35', '2018-01-23 20:41:35', null, '', '', null);
INSERT INTO `tb_users` VALUES ('136', 'salad', '1', 'Ibrahim', 'Taruri', '615911131', 'Saladibrahim@gmail.com', '1', '67f325ea93239ab4cf1f3c023372081d9369521d', '2018-01-23 20:43:11', '2018-01-23 20:43:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('137', 'khadija', '1', 'abdullahi', 'jii', '0615841565', 'drskhadija@gmail.com', '1', 'd6fb70f8a9ab2f43ed54a636fb3b31484fde59b4', '2018-01-23 21:12:32', '2018-01-23 21:12:32', null, '', '', null);
INSERT INTO `tb_users` VALUES ('138', 'hmtha othman', '1', 'hmtha othman', 'hmtha', '0618373021', 'xmthaothman92@gmail.com', '1', '14ee89653384cc020134342d0058220684297263', '2018-01-23 21:29:05', '2018-01-23 21:29:05', null, '', '', null);
INSERT INTO `tb_users` VALUES ('139', 'axmedciise12', '1', 'Ahmed', 'Isse', '615583399', 'axmedciise12@gmail.com', '1', '9f8317377294312f543a0d7264cf7dfad1110d3f', '2018-01-23 22:05:44', '2018-01-23 22:05:44', null, '', '', null);
INSERT INTO `tb_users` VALUES ('140', 'shiidka', '1', 'yare', 'ismaciil', '0619050000', 'otaange@hotmail.com', '1', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', '2018-01-23 22:11:22', '2018-01-23 22:11:22', null, '', '', null);
INSERT INTO `tb_users` VALUES ('141', 'nasteha', '1', 'abdi', 'warsame', '252615172218', 'badriyo110@hotmail.com', '1', '00427fa5df615e871c793ff907236f41d9520f21', '2018-01-23 23:45:30', '2018-01-23 23:45:30', null, '', '', null);
INSERT INTO `tb_users` VALUES ('142', 'salmanshurie', '1', 'salman', 'bashi', '0046700158885', 'iamsaleban@gmail.com', '1', '32a3e0a0b025bca99f691223cade905969cc323b', '2018-01-24 01:11:54', '2018-01-24 01:11:54', null, '', '', null);
INSERT INTO `tb_users` VALUES ('143', 'badee007', '1', 'Dipeolu', 'Charles', '4044543637', 'baydee007@gmail.com', '1', 'd54d9ef475022a4703910a234327b7d49525614d', '2018-01-24 02:46:39', '2018-01-24 02:46:39', null, '', '', null);
INSERT INTO `tb_users` VALUES ('144', 'hmtha yazin', '1', 'hmtha yazin', 'hmtha', '0618373021', 'hana_caday1@hotmail.com', '1', 'c27b6731687641bc44003224ea20b1e9647614c8', '2018-01-24 10:31:11', '2018-01-24 10:31:11', null, '', '', null);
INSERT INTO `tb_users` VALUES ('145', 'hamse', '1', 'hamse', 'mahamed', '619339235', 'hamse8889@gmail.com', '1', '717d8d71766b2dc8682457e7cf5d40db0b0cb08a', '2018-01-24 14:16:09', '2018-01-24 14:16:09', null, '', '', null);
INSERT INTO `tb_users` VALUES ('147', 'ramla', '1', 'mire', 'ramla', '0615545113', 'ramlamire1@gmail.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-01-24 16:48:01', '2018-01-24 16:48:01', null, '', '', null);
INSERT INTO `tb_users` VALUES ('148', 'abdiwahab', '1', 'hababa', 'botaan', '0617366060', 'abdulwahaab101@gmail.com', '1', 'ef1797609f3d457493bb86dd6a96d5eb81a7bf84', '2018-01-24 16:58:43', '2018-01-24 16:58:43', null, '', '', null);
INSERT INTO `tb_users` VALUES ('149', 'mohamsic', '1', 'idiris', 'arale', '615030692', 'araale4me@gmail.com', '1', '3d2547fddb822df5cd4c87ae722ff6d18abe99f6', '2018-01-24 17:16:07', '2018-01-24 17:16:07', null, '', '', null);
INSERT INTO `tb_users` VALUES ('150', 'salbayare', '1', 'Bashir', 'Abikar Hussein', '+252615472121', 'salbatoyo@gmail.com', '1', '0fe33d993fa545854b2148e2a5d316330dfd7c04', '2018-01-24 17:47:53', '2018-01-24 17:47:53', null, '', '', null);
INSERT INTO `tb_users` VALUES ('151', 'abukar', '1', 'saahil', 'muriidi', '0615700044', 'muriidi98@hotmail.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-01-24 18:10:56', '2018-01-24 18:10:56', null, '', '', null);
INSERT INTO `tb_users` VALUES ('152', 'Muna', '1', 'Osman', 'Hussein', '618931493', 'munaazi.qaali@gmai.com', '1', 'e5846216b405501a1d543b1a26869d1c82548967', '2018-01-24 18:11:47', '2018-01-24 18:11:47', null, '', '', null);
INSERT INTO `tb_users` VALUES ('153', 'Abdullahi', '1', 'Abdullahi Sorrey', 'Abdullahi Sorrey', '0618552121', 'soorey55@gmail.com', '1', 'b4b5601ec11c12fe7620cf80e8b02180b530d931', '2018-01-24 18:28:27', '2018-01-24 18:28:27', null, '', '', null);
INSERT INTO `tb_users` VALUES ('154', 'Nimonita', '1', 'abdina', 'abdi', '0612741613', 'nimonita7@gmail.com', '1', '7a5ee08eaa2e130f519baa71dc65a7296900b57b', '2018-01-24 20:37:35', '2018-01-24 20:37:35', null, '', '', null);
INSERT INTO `tb_users` VALUES ('155', 'MoAli', '1', 'Abdulle', 'Ali', '0615821009', 'mo.aliabdulle@gmail.com', '1', '079f980e8793c97f25b8a6824eed3b4dd0a0ad22', '2018-01-24 20:40:26', '2018-01-24 20:40:26', null, '', '', null);
INSERT INTO `tb_users` VALUES ('156', 'yasin', '1', 'Hassan', 'Yusuf', '615526166', 'yaasiin28@hotmail.com', '1', '850f57b67dcae835f9003cac412df0687ea02b1d', '2018-01-24 20:53:28', '2018-01-24 20:53:28', null, '', '', null);
INSERT INTO `tb_users` VALUES ('157', 'xarbicade11', '1', 'ahmed', 'Abdulkadir', '+252615336770', 'xarbicade11@gmail.com', '1', '2ba294b4bab1a8d261474796a61e9b796a210d17', '2018-01-25 01:32:08', '2018-01-25 01:32:08', null, '', '', null);
INSERT INTO `tb_users` VALUES ('158', 'Sowda', '1', 'Hassan', 'Osoble', '00252615223223', 'Sowdastar99@gmail.com', '1', 'c42eacbf1cc33383db609093eceddcd1a6a21ed2', '2018-01-25 11:23:07', '2018-01-25 11:23:07', null, '', '', null);
INSERT INTO `tb_users` VALUES ('159', 'munaazi', '1', 'osman', 'qaali', '618931493', 'munaazi.osman@gmail.com', '1', 'f6d842cc817d70dfb9e98a8a3b07c81ba919d40d', '2018-01-25 11:34:45', '2018-01-25 11:34:45', null, '', '', null);
INSERT INTO `tb_users` VALUES ('160', 'muminmayow', '1', 'Mayow', 'Mumin', '0615345456', 'mmmayow@gmail.com', '1', '0cee66b1b981325d6746b6ff78f74e44a26fd8e4', '2018-01-25 12:04:30', '2018-01-25 12:04:30', null, '', '', null);
INSERT INTO `tb_users` VALUES ('161', 'abdulahi', '1', 'abdiqadir', 'giraa', '0615897272', 'giraa.1234@gmail.com', '1', '5b437c6d8f5e3f236062a6c2f8163cc6c25d5847', '2018-01-25 12:18:01', '2018-01-25 12:18:01', null, '', '', null);
INSERT INTO `tb_users` VALUES ('162', 'Cumar', '1', 'Ahmed', 'Leyte', '0615456985', 'leeyte11@hotmail.com', '1', '29b7f7f4a7601f5e22d03997639253e625a5fa53', '2018-01-25 13:20:45', '2018-01-25 13:20:45', null, '', '', null);
INSERT INTO `tb_users` VALUES ('163', 'Sanka', '1', 'Mohamed', 'Ahmed', '616337577', 'sanka1430@gmail.com', '1', 'd8234363dd0bd73fa36b4f3f5afc2c9e7492b322', '2018-01-25 16:34:10', '2018-01-25 16:34:10', null, '', '', null);
INSERT INTO `tb_users` VALUES ('164', 'cusman', '1', 'maxamed', 'cabdi', '0615554301', 'cusmaanmaamow1@gmail.com', '1', '6900c0a3aaf36b4543ddf002dbdbbdd7496daea5', '2018-01-25 17:09:12', '2018-01-25 17:09:12', null, '', '', null);
INSERT INTO `tb_users` VALUES ('165', 'cosman', '1', 'maxamed', 'cabdu', '0615554301', 'cusmanmamow1@gmail.com', '1', '6900c0a3aaf36b4543ddf002dbdbbdd7496daea5', '2018-01-25 17:18:50', '2018-01-25 17:18:50', null, '', '', null);
INSERT INTO `tb_users` VALUES ('166', 'eng shuuriye', '1', 'Abdikarin', 'Ahmed shurie', '+252615927185', 'aamaac@gmail.com', '1', '7c222fb2927d828af22f592134e8932480637c0d', '2018-01-25 23:17:24', '2018-01-25 23:17:24', null, '', '', null);
INSERT INTO `tb_users` VALUES ('167', 'rage', '1', 'Rage', 'Adam', '00252615537321', 'raage09@gmail.com', '1', '5526f4caffd0ff2374ed5f59108d13a628abf894', '2018-01-25 23:48:54', '2018-01-25 23:48:54', null, '', '', null);

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
CREATE VIEW `vw_orders` AS select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order`.`USER_ID` AS `USER_ID`,`customer_order`.`KITCHEN_ID` AS `KITCHEN_ID`,`customer_order`.`CHEF_ID` AS `CHEF_ID`,`customer_order`.`RIDER_ID` AS `RIDER_ID`,`tb_users`.`MOBILE` AS `MOBILE`,`tb_users`.`SURNAME` AS `SURNAME`,`tb_users`.`OTHER_NAMES` AS `OTHER_NAMES`,`customer_order`.`ORDER_DATE` AS `ORDER_DATE`,`customer_order`.`ORDER_STATUS` AS `ORDER_STATUS`,`payment`.`PAYMENT_AMOUNT` AS `PAYMENT_AMOUNT`,`payment`.`PAYMENT_NUMBER` AS `PAYMENT_NUMBER`,`customer_order`.`NOTES` AS `NOTES`,`customer_order`.`PAYMENT_METHOD` AS `PAYMENT_METHOD`,`customer_order`.`CREATED_AT` AS `CREATED_AT`,`customer_order`.`UPDATED_AT` AS `UPDATED_AT`,`payment`.`PAYMENT_DATE` AS `PAYMENT_DATE`,`location`.`LOCATION_ID` AS `LOCATION_ID`,`location`.`LOCATION_NAME` AS `LOCATION_NAME`,`location`.`ADDRESS` AS `ADDRESS`,`city`.`CITY_NAME` AS `CITY_NAME`,`city`.`CITY_ID` AS `CITY_ID`,`country`.`COUNRY_ID` AS `COUNRY_ID`,`country`.`COUNTRY_NAME` AS `COUNTRY_NAME`,`customer_order`.`ORDER_TIME` AS `ORDER_TIME` from (((((`customer_order` join `tb_users` on((`customer_order`.`USER_ID` = `tb_users`.`USER_ID`))) left join `payment` on((`payment`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) join `location` on((`customer_order`.`LOCATION_ID` = `location`.`LOCATION_ID`))) join `city` on((`location`.`CITY_ID` = `city`.`CITY_ID`))) join `country` on((`city`.`COUNTRY_ID` = `country`.`COUNRY_ID`))) ;

-- ----------------------------
-- View structure for vw_order_items
-- ----------------------------
DROP VIEW IF EXISTS `vw_order_items`;
CREATE VIEW `vw_order_items` AS select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order_item`.`QUANTITY` AS `QUANTITY`,`customer_order_item`.`PRICE` AS `PRICE`,`customer_order_item`.`SUBTOTAL` AS `SUBTOTAL`,`menu_item_type`.`ITEM_TYPE_SIZE` AS `ITEM_TYPE_SIZE`,`menu_item`.`MENU_ITEM_NAME` AS `MENU_ITEM_NAME`,`menu_category`.`MENU_CAT_NAME` AS `MENU_CAT_NAME`,`menu_category`.`MENU_CAT_IMAGE` AS `MENU_CAT_IMAGE`,`menu_item`.`MENU_ITEM_IMAGE` AS `MENU_ITEM_IMAGE`,`customer_order`.`USER_ID` AS `USER_ID` from ((((`customer_order` join `customer_order_item` on((`customer_order_item`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) join `menu_item_type` on((`customer_order_item`.`ITEM_TYPE_ID` = `menu_item_type`.`ITEM_TYPE_ID`))) join `menu_item` on((`menu_item_type`.`MENU_ITEM_ID` = `menu_item`.`MENU_ITEM_ID`))) join `menu_category` on((`menu_item`.`MENU_CAT_ID` = `menu_category`.`MENU_CAT_ID`))) ;
