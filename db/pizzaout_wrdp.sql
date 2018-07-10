/*
Navicat MariaDB Data Transfer

Source Server         : MARIA
Source Server Version : 100214
Source Host           : localhost:3307
Source Database       : pizzaout_wrdp

Target Server Type    : MariaDB
Target Server Version : 100214
File Encoding         : 65001

Date: 2018-07-10 20:07:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wp_commentmeta
-- ----------------------------
DROP TABLE IF EXISTS `wp_commentmeta`;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_commentmeta
-- ----------------------------

-- ----------------------------
-- Table structure for wp_comments
-- ----------------------------
DROP TABLE IF EXISTS `wp_comments`;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT 0,
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_comments
-- ----------------------------
INSERT INTO `wp_comments` VALUES ('1', '1', 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2018-07-05 20:01:55', '2018-07-05 20:01:55', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', '0', '1', '', '', '0', '0');

-- ----------------------------
-- Table structure for wp_links
-- ----------------------------
DROP TABLE IF EXISTS `wp_links`;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_links
-- ----------------------------

-- ----------------------------
-- Table structure for wp_options
-- ----------------------------
DROP TABLE IF EXISTS `wp_options`;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=323 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_options
-- ----------------------------
INSERT INTO `wp_options` VALUES ('1', 'siteurl', 'http://localhost/pizzaout', 'yes');
INSERT INTO `wp_options` VALUES ('2', 'home', 'http://localhost/pizzaout', 'yes');
INSERT INTO `wp_options` VALUES ('3', 'blogname', 'Pizza Out', 'yes');
INSERT INTO `wp_options` VALUES ('4', 'blogdescription', 'Fresh. Fast. Tasy', 'yes');
INSERT INTO `wp_options` VALUES ('5', 'users_can_register', '0', 'yes');
INSERT INTO `wp_options` VALUES ('6', 'admin_email', 'barsamms@gmail.com', 'yes');
INSERT INTO `wp_options` VALUES ('7', 'start_of_week', '0', 'yes');
INSERT INTO `wp_options` VALUES ('8', 'use_balanceTags', '0', 'yes');
INSERT INTO `wp_options` VALUES ('9', 'use_smilies', '1', 'yes');
INSERT INTO `wp_options` VALUES ('10', 'require_name_email', '1', 'yes');
INSERT INTO `wp_options` VALUES ('11', 'comments_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('12', 'posts_per_rss', '10', 'yes');
INSERT INTO `wp_options` VALUES ('13', 'rss_use_excerpt', '0', 'yes');
INSERT INTO `wp_options` VALUES ('14', 'mailserver_url', 'mail.example.com', 'yes');
INSERT INTO `wp_options` VALUES ('15', 'mailserver_login', 'login@example.com', 'yes');
INSERT INTO `wp_options` VALUES ('16', 'mailserver_pass', 'password', 'yes');
INSERT INTO `wp_options` VALUES ('17', 'mailserver_port', '110', 'yes');
INSERT INTO `wp_options` VALUES ('18', 'default_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('19', 'default_comment_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('20', 'default_ping_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('21', 'default_pingback_flag', '1', 'yes');
INSERT INTO `wp_options` VALUES ('22', 'posts_per_page', '10', 'yes');
INSERT INTO `wp_options` VALUES ('23', 'date_format', 'F j, Y', 'yes');
INSERT INTO `wp_options` VALUES ('24', 'time_format', 'g:i a', 'yes');
INSERT INTO `wp_options` VALUES ('25', 'links_updated_date_format', 'F j, Y g:i a', 'yes');
INSERT INTO `wp_options` VALUES ('26', 'comment_moderation', '0', 'yes');
INSERT INTO `wp_options` VALUES ('27', 'moderation_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('28', 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes');
INSERT INTO `wp_options` VALUES ('29', 'rewrite_rules', 'a:146:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:32:\"menu/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:42:\"menu/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:62:\"menu/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"menu/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"menu/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:38:\"menu/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:21:\"menu/([^/]+)/embed/?$\";s:41:\"index.php?fdm-menu=$matches[1]&embed=true\";s:25:\"menu/([^/]+)/trackback/?$\";s:35:\"index.php?fdm-menu=$matches[1]&tb=1\";s:33:\"menu/([^/]+)/page/?([0-9]{1,})/?$\";s:48:\"index.php?fdm-menu=$matches[1]&paged=$matches[2]\";s:40:\"menu/([^/]+)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?fdm-menu=$matches[1]&cpage=$matches[2]\";s:29:\"menu/([^/]+)(?:/([0-9]+))?/?$\";s:47:\"index.php?fdm-menu=$matches[1]&page=$matches[2]\";s:21:\"menu/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:31:\"menu/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:51:\"menu/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:46:\"menu/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:46:\"menu/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:27:\"menu/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:57:\"fdm-menu-section/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?fdm-menu-section=$matches[1]&feed=$matches[2]\";s:52:\"fdm-menu-section/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?fdm-menu-section=$matches[1]&feed=$matches[2]\";s:33:\"fdm-menu-section/([^/]+)/embed/?$\";s:49:\"index.php?fdm-menu-section=$matches[1]&embed=true\";s:45:\"fdm-menu-section/([^/]+)/page/?([0-9]{1,})/?$\";s:56:\"index.php?fdm-menu-section=$matches[1]&paged=$matches[2]\";s:27:\"fdm-menu-section/([^/]+)/?$\";s:38:\"index.php?fdm-menu-section=$matches[1]\";s:37:\"menu-item/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:47:\"menu-item/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:67:\"menu-item/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"menu-item/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"menu-item/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:43:\"menu-item/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:26:\"menu-item/([^/]+)/embed/?$\";s:46:\"index.php?fdm-menu-item=$matches[1]&embed=true\";s:30:\"menu-item/([^/]+)/trackback/?$\";s:40:\"index.php?fdm-menu-item=$matches[1]&tb=1\";s:38:\"menu-item/([^/]+)/page/?([0-9]{1,})/?$\";s:53:\"index.php?fdm-menu-item=$matches[1]&paged=$matches[2]\";s:45:\"menu-item/([^/]+)/comment-page-([0-9]{1,})/?$\";s:53:\"index.php?fdm-menu-item=$matches[1]&cpage=$matches[2]\";s:34:\"menu-item/([^/]+)(?:/([0-9]+))?/?$\";s:52:\"index.php?fdm-menu-item=$matches[1]&page=$matches[2]\";s:26:\"menu-item/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:36:\"menu-item/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:56:\"menu-item/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"menu-item/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"menu-item/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:32:\"menu-item/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:39:\"rtb-booking/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:49:\"rtb-booking/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:69:\"rtb-booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:64:\"rtb-booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:64:\"rtb-booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:45:\"rtb-booking/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:28:\"rtb-booking/([^/]+)/embed/?$\";s:44:\"index.php?rtb-booking=$matches[1]&embed=true\";s:32:\"rtb-booking/([^/]+)/trackback/?$\";s:38:\"index.php?rtb-booking=$matches[1]&tb=1\";s:40:\"rtb-booking/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?rtb-booking=$matches[1]&paged=$matches[2]\";s:47:\"rtb-booking/([^/]+)/comment-page-([0-9]{1,})/?$\";s:51:\"index.php?rtb-booking=$matches[1]&cpage=$matches[2]\";s:36:\"rtb-booking/([^/]+)(?:/([0-9]+))?/?$\";s:50:\"index.php?rtb-booking=$matches[1]&page=$matches[2]\";s:28:\"rtb-booking/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:38:\"rtb-booking/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:58:\"rtb-booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:53:\"rtb-booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:53:\"rtb-booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:34:\"rtb-booking/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:39:\"index.php?&page_id=29&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes');
INSERT INTO `wp_options` VALUES ('30', 'hack_file', '0', 'yes');
INSERT INTO `wp_options` VALUES ('31', 'blog_charset', 'UTF-8', 'yes');
INSERT INTO `wp_options` VALUES ('32', 'moderation_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('33', 'active_plugins', 'a:4:{i:0;s:43:\"food-and-drink-menu/food-and-drink-menu.php\";i:1;s:17:\"iframe/iframe.php\";i:2;s:37:\"jft-assitant-plugin/jft-assistant.php\";i:3;s:51:\"restaurant-reservations/restaurant-reservations.php\";}', 'yes');
INSERT INTO `wp_options` VALUES ('34', 'category_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('35', 'ping_sites', 'http://rpc.pingomatic.com/', 'yes');
INSERT INTO `wp_options` VALUES ('36', 'comment_max_links', '2', 'yes');
INSERT INTO `wp_options` VALUES ('37', 'gmt_offset', '3', 'yes');
INSERT INTO `wp_options` VALUES ('38', 'default_email_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('39', 'recently_edited', 'a:2:{i:0;s:60:\"I:\\wamp64\\www\\pizzaout/wp-content/themes/brasserie/style.css\";i:2;s:0:\"\";}', 'no');
INSERT INTO `wp_options` VALUES ('40', 'template', 'brasserie', 'yes');
INSERT INTO `wp_options` VALUES ('41', 'stylesheet', 'brasserie', 'yes');
INSERT INTO `wp_options` VALUES ('42', 'comment_whitelist', '1', 'yes');
INSERT INTO `wp_options` VALUES ('43', 'blacklist_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('44', 'comment_registration', '0', 'yes');
INSERT INTO `wp_options` VALUES ('45', 'html_type', 'text/html', 'yes');
INSERT INTO `wp_options` VALUES ('46', 'use_trackback', '0', 'yes');
INSERT INTO `wp_options` VALUES ('47', 'default_role', 'subscriber', 'yes');
INSERT INTO `wp_options` VALUES ('48', 'db_version', '38590', 'yes');
INSERT INTO `wp_options` VALUES ('49', 'uploads_use_yearmonth_folders', '1', 'yes');
INSERT INTO `wp_options` VALUES ('50', 'upload_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('51', 'blog_public', '1', 'yes');
INSERT INTO `wp_options` VALUES ('52', 'default_link_category', '2', 'yes');
INSERT INTO `wp_options` VALUES ('53', 'show_on_front', 'page', 'yes');
INSERT INTO `wp_options` VALUES ('54', 'tag_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('55', 'show_avatars', '1', 'yes');
INSERT INTO `wp_options` VALUES ('56', 'avatar_rating', 'G', 'yes');
INSERT INTO `wp_options` VALUES ('57', 'upload_url_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('58', 'thumbnail_size_w', '150', 'yes');
INSERT INTO `wp_options` VALUES ('59', 'thumbnail_size_h', '150', 'yes');
INSERT INTO `wp_options` VALUES ('60', 'thumbnail_crop', '1', 'yes');
INSERT INTO `wp_options` VALUES ('61', 'medium_size_w', '300', 'yes');
INSERT INTO `wp_options` VALUES ('62', 'medium_size_h', '300', 'yes');
INSERT INTO `wp_options` VALUES ('63', 'avatar_default', 'mystery', 'yes');
INSERT INTO `wp_options` VALUES ('64', 'large_size_w', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('65', 'large_size_h', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('66', 'image_default_link_type', 'none', 'yes');
INSERT INTO `wp_options` VALUES ('67', 'image_default_size', '', 'yes');
INSERT INTO `wp_options` VALUES ('68', 'image_default_align', '', 'yes');
INSERT INTO `wp_options` VALUES ('69', 'close_comments_for_old_posts', '0', 'yes');
INSERT INTO `wp_options` VALUES ('70', 'close_comments_days_old', '14', 'yes');
INSERT INTO `wp_options` VALUES ('71', 'thread_comments', '1', 'yes');
INSERT INTO `wp_options` VALUES ('72', 'thread_comments_depth', '5', 'yes');
INSERT INTO `wp_options` VALUES ('73', 'page_comments', '0', 'yes');
INSERT INTO `wp_options` VALUES ('74', 'comments_per_page', '50', 'yes');
INSERT INTO `wp_options` VALUES ('75', 'default_comments_page', 'newest', 'yes');
INSERT INTO `wp_options` VALUES ('76', 'comment_order', 'asc', 'yes');
INSERT INTO `wp_options` VALUES ('77', 'sticky_posts', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('78', 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('79', 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('80', 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('81', 'uninstall_plugins', 'a:0:{}', 'no');
INSERT INTO `wp_options` VALUES ('82', 'timezone_string', '', 'yes');
INSERT INTO `wp_options` VALUES ('83', 'page_for_posts', '0', 'yes');
INSERT INTO `wp_options` VALUES ('84', 'page_on_front', '29', 'yes');
INSERT INTO `wp_options` VALUES ('85', 'default_post_format', '0', 'yes');
INSERT INTO `wp_options` VALUES ('86', 'link_manager_enabled', '0', 'yes');
INSERT INTO `wp_options` VALUES ('87', 'finished_splitting_shared_terms', '1', 'yes');
INSERT INTO `wp_options` VALUES ('88', 'site_icon', '10', 'yes');
INSERT INTO `wp_options` VALUES ('89', 'medium_large_size_w', '768', 'yes');
INSERT INTO `wp_options` VALUES ('90', 'medium_large_size_h', '0', 'yes');
INSERT INTO `wp_options` VALUES ('91', 'wp_page_for_privacy_policy', '3', 'yes');
INSERT INTO `wp_options` VALUES ('92', 'initial_db_version', '38590', 'yes');
INSERT INTO `wp_options` VALUES ('93', 'wp_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:15:\"manage_bookings\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:35:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"manage_bookings\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:11:\"team_member\";a:2:{s:4:\"name\";s:11:\"Team Member\";s:12:\"capabilities\";a:3:{s:4:\"read\";b:1;s:10:\"edit_posts\";b:1;s:12:\"delete_posts\";b:0;}}s:19:\"rtb_booking_manager\";a:2:{s:4:\"name\";s:15:\"Booking Manager\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:15:\"manage_bookings\";b:1;}}}', 'yes');
INSERT INTO `wp_options` VALUES ('94', 'fresh_site', '0', 'yes');
INSERT INTO `wp_options` VALUES ('95', 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('96', 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('97', 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('98', 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('99', 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('100', 'sidebars_widgets', 'a:9:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:19:\"woocommerce_sidebar\";a:0:{}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:11:\"left_column\";a:0:{}s:13:\"center_column\";a:0:{}s:12:\"right_column\";a:0:{}s:13:\"array_version\";i:3;}', 'yes');
INSERT INTO `wp_options` VALUES ('101', 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('102', 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('103', 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('104', 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('105', 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('106', 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('107', 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('108', 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('109', 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('110', 'cron', 'a:6:{i:1531213315;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1531252915;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1531252926;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1531253058;a:1:{s:36:\"puc_cron_check_updates-jft-assistant\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1531253909;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes');
INSERT INTO `wp_options` VALUES ('111', 'theme_mods_twentyseventeen', 'a:3:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1530984265;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}s:18:\"nav_menu_locations\";a:1:{s:3:\"top\";i:3;}}', 'yes');
INSERT INTO `wp_options` VALUES ('126', 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:18:\"barsamms@gmail.com\";s:7:\"version\";s:5:\"4.9.7\";s:9:\"timestamp\";i:1530820932;}', 'no');
INSERT INTO `wp_options` VALUES ('125', '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.9.7.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.9.7.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.9.7-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.9.7-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.9.7\";s:7:\"version\";s:5:\"4.9.7\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1531209771;s:15:\"version_checked\";s:5:\"4.9.7\";s:12:\"translations\";a:0:{}}', 'no');
INSERT INTO `wp_options` VALUES ('130', 'recently_activated', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('131', 'can_compress_scripts', '1', 'no');
INSERT INTO `wp_options` VALUES ('318', '_site_transient_timeout_theme_roots', '1531211149', 'no');
INSERT INTO `wp_options` VALUES ('319', '_site_transient_theme_roots', 'a:4:{s:9:\"brasserie\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'no');
INSERT INTO `wp_options` VALUES ('123', '_site_transient_timeout_browser_a54eb83090ed984332f4eca22d3ec5e4', '1531425728', 'no');
INSERT INTO `wp_options` VALUES ('124', '_site_transient_browser_a54eb83090ed984332f4eca22d3ec5e4', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"67.0.3396.99\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no');
INSERT INTO `wp_options` VALUES ('293', '_transient_is_multi_author', '0', 'yes');
INSERT INTO `wp_options` VALUES ('147', 'WPLANG', '', 'yes');
INSERT INTO `wp_options` VALUES ('148', 'new_admin_email', 'barsamms@gmail.com', 'yes');
INSERT INTO `wp_options` VALUES ('157', 'jft_assitant_plugin_install', '1530821058', 'yes');
INSERT INTO `wp_options` VALUES ('158', 'external_updates-jft-assistant', 'O:8:\"stdClass\":5:{s:9:\"lastCheck\";i:1530822453;s:14:\"checkedVersion\";s:5:\"1.0.5\";s:6:\"update\";O:8:\"stdClass\":10:{s:4:\"slug\";s:13:\"jft-assistant\";s:7:\"version\";s:5:\"1.0.5\";s:12:\"download_url\";s:66:\"https://api.github.com/repos/Codeinwp/jft-assistant/zipball/v1.0.5\";s:12:\"translations\";a:0:{}s:2:\"id\";i:0;s:8:\"homepage\";s:41:\"https://github.com/Codeinwp/jft-assistant\";s:6:\"tested\";s:3:\"4.9\";s:14:\"upgrade_notice\";N;s:5:\"icons\";a:0:{}s:8:\"filename\";s:37:\"jft-assitant-plugin/jft-assistant.php\";}s:11:\"updateClass\";s:22:\"Puc_v4p4_Plugin_Update\";s:15:\"updateBaseClass\";s:13:\"Plugin_Update\";}', 'no');
INSERT INTO `wp_options` VALUES ('160', '__jft_assistant_activation', '1530821062', 'yes');
INSERT INTO `wp_options` VALUES ('181', '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1531209350;s:7:\"checked\";a:4:{s:9:\"brasserie\";s:3:\"2.7\";s:13:\"twentyfifteen\";s:3:\"2.0\";s:15:\"twentyseventeen\";s:3:\"1.6\";s:13:\"twentysixteen\";s:3:\"1.5\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no');
INSERT INTO `wp_options` VALUES ('182', 'current_theme', 'Brasserie', 'yes');
INSERT INTO `wp_options` VALUES ('183', 'theme_mods_brasserie', 'a:13:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:3;}s:18:\"custom_css_post_id\";i:-1;s:14:\"brasserie_logo\";s:83:\"http://localhost/pizzaout/wp-content/uploads/2018/07/ic_launcher-e1530821509357.png\";s:16:\"header_textcolor\";s:6:\"dd3333\";s:20:\"brasserie_link_color\";s:7:\"#db8132\";s:24:\"brasserie_h1_font_family\";s:9:\"Noto Sans\";s:19:\"topBarContact_telNo\";s:18:\"Call 2040 / 867484\";s:19:\"topBarContact_email\";s:0:\"\";s:8:\"facebook\";s:40:\"https://www.facebook.com/PizzaOutSomalia\";s:16:\"brasserie_slider\";s:4:\"none\";s:25:\"brasserie_one_logo_upload\";s:63:\"http://localhost/pizzaout/wp-content/uploads/2018/07/pizza5.jpg\";s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1530984229;s:4:\"data\";a:8:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:19:\"woocommerce_sidebar\";a:0:{}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:11:\"left_column\";a:0:{}s:13:\"center_column\";a:0:{}s:12:\"right_column\";a:0:{}}}}', 'yes');
INSERT INTO `wp_options` VALUES ('184', 'theme_switched', '', 'yes');
INSERT INTO `wp_options` VALUES ('291', '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1531209350;s:7:\"checked\";a:8:{s:35:\"advanced-iframe/advanced-iframe.php\";s:5:\"7.5.7\";s:19:\"akismet/akismet.php\";s:5:\"4.0.8\";s:43:\"food-and-drink-menu/food-and-drink-menu.php\";s:5:\"1.5.2\";s:9:\"hello.php\";s:3:\"1.7\";s:17:\"iframe/iframe.php\";s:3:\"4.3\";s:29:\"iframe-popup/iframe-popup.php\";s:3:\"2.4\";s:37:\"jft-assitant-plugin/jft-assistant.php\";s:5:\"1.0.5\";s:51:\"restaurant-reservations/restaurant-reservations.php\";s:5:\"1.7.7\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:7:{s:35:\"advanced-iframe/advanced-iframe.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:29:\"w.org/plugins/advanced-iframe\";s:4:\"slug\";s:15:\"advanced-iframe\";s:6:\"plugin\";s:35:\"advanced-iframe/advanced-iframe.php\";s:11:\"new_version\";s:5:\"7.5.7\";s:3:\"url\";s:46:\"https://wordpress.org/plugins/advanced-iframe/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/advanced-iframe.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:68:\"https://ps.w.org/advanced-iframe/assets/icon-128x128.png?rev=1028488\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:69:\"https://ps.w.org/advanced-iframe/assets/banner-772x250.png?rev=676815\";}s:11:\"banners_rtl\";a:0:{}}s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.0.8\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.0.8.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:43:\"food-and-drink-menu/food-and-drink-menu.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:33:\"w.org/plugins/food-and-drink-menu\";s:4:\"slug\";s:19:\"food-and-drink-menu\";s:6:\"plugin\";s:43:\"food-and-drink-menu/food-and-drink-menu.php\";s:11:\"new_version\";s:5:\"1.5.2\";s:3:\"url\";s:50:\"https://wordpress.org/plugins/food-and-drink-menu/\";s:7:\"package\";s:68:\"https://downloads.wordpress.org/plugin/food-and-drink-menu.1.5.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:71:\"https://ps.w.org/food-and-drink-menu/assets/icon-256x256.png?rev=975734\";s:2:\"1x\";s:71:\"https://ps.w.org/food-and-drink-menu/assets/icon-128x128.png?rev=975734\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:74:\"https://ps.w.org/food-and-drink-menu/assets/banner-1544x500.png?rev=835075\";s:2:\"1x\";s:73:\"https://ps.w.org/food-and-drink-menu/assets/banner-772x250.png?rev=835075\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=969907\";s:2:\"1x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=969907\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:65:\"https://ps.w.org/hello-dolly/assets/banner-772x250.png?rev=478342\";}s:11:\"banners_rtl\";a:0:{}}s:17:\"iframe/iframe.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:20:\"w.org/plugins/iframe\";s:4:\"slug\";s:6:\"iframe\";s:6:\"plugin\";s:17:\"iframe/iframe.php\";s:11:\"new_version\";s:3:\"4.3\";s:3:\"url\";s:37:\"https://wordpress.org/plugins/iframe/\";s:7:\"package\";s:53:\"https://downloads.wordpress.org/plugin/iframe.4.3.zip\";s:5:\"icons\";a:1:{s:7:\"default\";s:57:\"https://s.w.org/plugins/geopattern-icon/iframe_fbfbfb.svg\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:60:\"https://ps.w.org/iframe/assets/banner-772x250.png?rev=606741\";}s:11:\"banners_rtl\";a:0:{}}s:29:\"iframe-popup/iframe-popup.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:26:\"w.org/plugins/iframe-popup\";s:4:\"slug\";s:12:\"iframe-popup\";s:6:\"plugin\";s:29:\"iframe-popup/iframe-popup.php\";s:11:\"new_version\";s:3:\"2.4\";s:3:\"url\";s:43:\"https://wordpress.org/plugins/iframe-popup/\";s:7:\"package\";s:55:\"https://downloads.wordpress.org/plugin/iframe-popup.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:65:\"https://ps.w.org/iframe-popup/assets/icon-256x256.png?rev=1017503\";s:2:\"1x\";s:65:\"https://ps.w.org/iframe-popup/assets/icon-128x128.png?rev=1017503\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/iframe-popup/assets/banner-772x250.png?rev=897029\";}s:11:\"banners_rtl\";a:0:{}}s:51:\"restaurant-reservations/restaurant-reservations.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:37:\"w.org/plugins/restaurant-reservations\";s:4:\"slug\";s:23:\"restaurant-reservations\";s:6:\"plugin\";s:51:\"restaurant-reservations/restaurant-reservations.php\";s:11:\"new_version\";s:5:\"1.7.7\";s:3:\"url\";s:54:\"https://wordpress.org/plugins/restaurant-reservations/\";s:7:\"package\";s:72:\"https://downloads.wordpress.org/plugin/restaurant-reservations.1.7.7.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/restaurant-reservations/assets/icon-256x256.png?rev=975736\";s:2:\"1x\";s:75:\"https://ps.w.org/restaurant-reservations/assets/icon-128x128.png?rev=975736\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/restaurant-reservations/assets/banner-1544x500.png?rev=910307\";s:2:\"1x\";s:77:\"https://ps.w.org/restaurant-reservations/assets/banner-772x250.png?rev=910307\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no');
INSERT INTO `wp_options` VALUES ('191', 'rtb_pending_count', '0', 'yes');
INSERT INTO `wp_options` VALUES ('192', 'widget_rtb_booking_form_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('193', 'widget_fdm_widget_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('194', 'widget_fdm_widget_menu_item', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('258', 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes');
INSERT INTO `wp_options` VALUES ('255', 'theme_mods_twentysixteen', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1530914402;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}', 'yes');

-- ----------------------------
-- Table structure for wp_postmeta
-- ----------------------------
DROP TABLE IF EXISTS `wp_postmeta`;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_postmeta
-- ----------------------------
INSERT INTO `wp_postmeta` VALUES ('1', '2', '_wp_page_template', 'default');
INSERT INTO `wp_postmeta` VALUES ('2', '3', '_wp_page_template', 'default');
INSERT INTO `wp_postmeta` VALUES ('12', '9', '_wp_attached_file', '2018/07/logo_image.png');
INSERT INTO `wp_postmeta` VALUES ('13', '9', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:343;s:6:\"height\";i:343;s:4:\"file\";s:22:\"2018/07/logo_image.png\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"logo_image-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"logo_image-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}i:100;a:4:{s:4:\"file\";s:18:\"logo_image-1x1.png\";s:5:\"width\";i:1;s:6:\"height\";i:1;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('14', '10', '_wp_attached_file', '2018/07/cropped-logo_image.png');
INSERT INTO `wp_postmeta` VALUES ('15', '10', '_wp_attachment_context', 'site-icon');
INSERT INTO `wp_postmeta` VALUES ('16', '10', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:30:\"2018/07/cropped-logo_image.png\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}i:100;a:4:{s:4:\"file\";s:26:\"cropped-logo_image-1x1.png\";s:5:\"width\";i:1;s:6:\"height\";i:1;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"recent\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-512x400.png\";s:5:\"width\";i:512;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-270\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-270x270.png\";s:5:\"width\";i:270;s:6:\"height\";i:270;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-192\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-192x192.png\";s:5:\"width\";i:192;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-180\";a:4:{s:4:\"file\";s:30:\"cropped-logo_image-180x180.png\";s:5:\"width\";i:180;s:6:\"height\";i:180;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"site_icon-32\";a:4:{s:4:\"file\";s:28:\"cropped-logo_image-32x32.png\";s:5:\"width\";i:32;s:6:\"height\";i:32;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('17', '11', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('18', '11', '_wp_trash_meta_time', '1530821365');
INSERT INTO `wp_postmeta` VALUES ('26', '15', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('27', '15', '_wp_trash_meta_time', '1530821433');
INSERT INTO `wp_postmeta` VALUES ('28', '14', '_edit_lock', '1530821388:1');
INSERT INTO `wp_postmeta` VALUES ('29', '14', '_wp_attachment_backup_sizes', 'a:1:{s:9:\"full-orig\";a:3:{s:5:\"width\";i:441;s:6:\"height\";i:156;s:4:\"file\";s:15:\"ic_launcher.png\";}}');
INSERT INTO `wp_postmeta` VALUES ('30', '14', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('31', '16', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('32', '16', '_wp_trash_meta_time', '1530821550');
INSERT INTO `wp_postmeta` VALUES ('33', '17', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('34', '17', '_wp_trash_meta_time', '1530821622');
INSERT INTO `wp_postmeta` VALUES ('35', '18', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('36', '18', '_wp_trash_meta_time', '1530821651');
INSERT INTO `wp_postmeta` VALUES ('37', '19', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('38', '19', '_wp_trash_meta_time', '1530821708');
INSERT INTO `wp_postmeta` VALUES ('39', '20', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('40', '20', '_wp_trash_meta_time', '1530821737');
INSERT INTO `wp_postmeta` VALUES ('41', '21', '_wp_attached_file', '2018/07/pizza5.jpg');
INSERT INTO `wp_postmeta` VALUES ('42', '21', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:500;s:6:\"height\";i:350;s:4:\"file\";s:18:\"2018/07/pizza5.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"pizza5-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:18:\"pizza5-300x210.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:210;s:9:\"mime-type\";s:10:\"image/jpeg\";}i:100;a:4:{s:4:\"file\";s:14:\"pizza5-1x1.jpg\";s:5:\"width\";i:1;s:6:\"height\";i:1;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('21', '13', '_edit_lock', '1530821400:1');
INSERT INTO `wp_postmeta` VALUES ('22', '13', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('23', '13', '_wp_trash_meta_time', '1530821403');
INSERT INTO `wp_postmeta` VALUES ('24', '14', '_wp_attached_file', '2018/07/ic_launcher-e1530821509357.png');
INSERT INTO `wp_postmeta` VALUES ('25', '14', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:200;s:6:\"height\";i:71;s:4:\"file\";s:38:\"2018/07/ic_launcher-e1530821509357.png\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:23:\"ic_launcher-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:23:\"ic_launcher-300x106.png\";s:5:\"width\";i:300;s:6:\"height\";i:106;s:9:\"mime-type\";s:9:\"image/png\";}i:100;a:4:{s:4:\"file\";s:19:\"ic_launcher-3x1.png\";s:5:\"width\";i:3;s:6:\"height\";i:1;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('43', '22', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('44', '22', '_wp_trash_meta_time', '1530821784');
INSERT INTO `wp_postmeta` VALUES ('45', '23', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('46', '23', '_wp_trash_meta_time', '1530821873');
INSERT INTO `wp_postmeta` VALUES ('47', '1', '_edit_lock', '1530821963:1');
INSERT INTO `wp_postmeta` VALUES ('48', '1', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('53', '1', '_thumbnail_id', '21');
INSERT INTO `wp_postmeta` VALUES ('56', '3', '_edit_lock', '1530821970:1');
INSERT INTO `wp_postmeta` VALUES ('57', '3', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('58', '2', '_edit_lock', '1530822014:1');
INSERT INTO `wp_postmeta` VALUES ('59', '2', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('60', '29', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('61', '29', '_edit_lock', '1530984294:1');
INSERT INTO `wp_postmeta` VALUES ('62', '29', '_wp_page_template', 'page-templates/full-width.php');
INSERT INTO `wp_postmeta` VALUES ('64', '37', '_menu_item_type', 'custom');
INSERT INTO `wp_postmeta` VALUES ('65', '37', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('66', '37', '_menu_item_object_id', '37');
INSERT INTO `wp_postmeta` VALUES ('67', '37', '_menu_item_object', 'custom');
INSERT INTO `wp_postmeta` VALUES ('68', '37', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('69', '37', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('70', '37', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('71', '37', '_menu_item_url', 'http://localhost/pizzaout/');
INSERT INTO `wp_postmeta` VALUES ('72', '37', '_menu_item_orphaned', '1530914408');
INSERT INTO `wp_postmeta` VALUES ('73', '38', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('74', '38', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('75', '38', '_menu_item_object_id', '29');
INSERT INTO `wp_postmeta` VALUES ('76', '38', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('77', '38', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('78', '38', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('79', '38', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('80', '38', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('82', '39', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('83', '39', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('84', '39', '_menu_item_object_id', '2');
INSERT INTO `wp_postmeta` VALUES ('85', '39', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('86', '39', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('87', '39', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('88', '39', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('89', '39', '_menu_item_url', '');

-- ----------------------------
-- Table structure for wp_posts
-- ----------------------------
DROP TABLE IF EXISTS `wp_posts`;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_posts
-- ----------------------------
INSERT INTO `wp_posts` VALUES ('1', '1', '2018-07-05 20:01:55', '2018-07-05 20:01:55', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Pizza Out', '', 'draft', 'open', 'open', '', 'hello-world', '', '', '2018-07-05 23:21:40', '2018-07-05 20:21:40', '', '0', 'http://localhost/pizzaout/?p=1', '0', 'post', '', '1');
INSERT INTO `wp_posts` VALUES ('2', '1', '2018-07-05 20:01:55', '2018-07-05 20:01:55', 'Welcome to pizza out', 'Welcome to Pizza out', '', 'publish', 'closed', 'open', '', 'home', '', '', '2018-07-05 23:22:28', '2018-07-05 20:22:28', '', '0', 'http://localhost/pizzaout/?page_id=2', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('27', '1', '2018-07-05 23:21:12', '2018-07-05 20:21:12', 'Welcome to pizza out', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2018-07-05 23:21:12', '2018-07-05 20:21:12', '', '2', 'http://localhost/pizzaout/2018/07/05/2-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('28', '1', '2018-07-05 23:21:28', '2018-07-05 20:21:28', 'Welcome to pizza out', 'Welcome to Pizza out', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2018-07-05 23:21:28', '2018-07-05 20:21:28', '', '2', 'http://localhost/pizzaout/2018/07/05/2-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('29', '1', '2018-07-05 23:23:05', '2018-07-05 20:23:05', '[iframe src=\"http://localhost/pizzaout-api/wpcart\" width=\"100%\" height=\"800\"]', 'Shop', '', 'publish', 'closed', 'closed', '', 'shop', '', '', '2018-07-07 20:24:54', '2018-07-07 17:24:54', '', '0', 'http://localhost/pizzaout/?page_id=29', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('30', '1', '2018-07-05 23:23:05', '2018-07-05 20:23:05', '', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-05 23:23:05', '2018-07-05 20:23:05', '', '29', 'http://localhost/pizzaout/2018/07/05/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('31', '1', '2018-07-05 23:23:12', '2018-07-05 20:23:12', 'Shop for out pizza here', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-autosave-v1', '', '', '2018-07-05 23:23:12', '2018-07-05 20:23:12', '', '29', 'http://localhost/pizzaout/2018/07/05/29-autosave-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('3', '1', '2018-07-05 20:01:55', '2018-07-05 20:01:55', '<h2>Who we are</h2>\r\nOur website address is: http://localhost/pizzaout.\r\n<h2>What personal data we collect and why we collect it</h2>\r\n<h3>Comments</h3>\r\nWhen visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.\r\n\r\nAn anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.\r\n<h3>Media</h3>\r\nIf you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.\r\n<h3>Contact forms</h3>\r\n<h3>Cookies</h3>\r\nIf you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.\r\n\r\nIf you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.\r\n\r\nWhen you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select \"Remember Me\", your login will persist for two weeks. If you log out of your account, the login cookies will be removed.\r\n\r\nIf you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.\r\n<h3>Embedded content from other websites</h3>\r\nArticles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.\r\n\r\nThese websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracing your interaction with the embedded content if you have an account and are logged in to that website.\r\n<h3>Analytics</h3>\r\n<h2>Who we share your data with</h2>\r\n<h2>How long we retain your data</h2>\r\nIf you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.\r\n\r\nFor users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.\r\n<h2>What rights you have over your data</h2>\r\nIf you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.\r\n<h2>Where we send your data</h2>\r\nVisitor comments may be checked through an automated spam detection service.\r\n<h2>Your contact information</h2>\r\n<h2>Additional information</h2>\r\n<h3>How we protect your data</h3>\r\n<h3>What data breach procedures we have in place</h3>\r\n<h3>What third parties we receive data from</h3>\r\n<h3>What automated decision making and/or profiling we do with user data</h3>\r\n<h3>Industry regulatory disclosure requirements</h3>', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2018-07-05 23:20:53', '2018-07-05 20:20:53', '', '0', 'http://localhost/pizzaout/?page_id=3', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('4', '1', '2018-07-05 20:02:08', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-07-05 20:02:08', '0000-00-00 00:00:00', '', '0', 'http://localhost/pizzaout/?p=4', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('9', '1', '2018-07-05 23:09:11', '2018-07-05 20:09:11', '', 'logo_image', '', 'inherit', 'open', 'closed', '', 'logo_image', '', '', '2018-07-05 23:09:11', '2018-07-05 20:09:11', '', '0', 'http://localhost/pizzaout/wp-content/uploads/2018/07/logo_image.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('10', '1', '2018-07-05 23:09:18', '2018-07-05 20:09:18', 'http://localhost/pizzaout/wp-content/uploads/2018/07/cropped-logo_image.png', 'cropped-logo_image.png', '', 'inherit', 'open', 'closed', '', 'cropped-logo_image-png', '', '', '2018-07-05 23:09:18', '2018-07-05 20:09:18', '', '0', 'http://localhost/pizzaout/wp-content/uploads/2018/07/cropped-logo_image.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('11', '1', '2018-07-05 23:09:25', '2018-07-05 20:09:25', '{\n    \"site_icon\": {\n        \"value\": 10,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:09:25\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '19f2f151-3a67-4ba4-aafb-6e00af696c4b', '', '', '2018-07-05 23:09:25', '2018-07-05 20:09:25', '', '0', 'http://localhost/pizzaout/2018/07/05/19f2f151-3a67-4ba4-aafb-6e00af696c4b/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('15', '1', '2018-07-05 23:10:33', '2018-07-05 20:10:33', '{\n    \"brasserie::brasserie_logo\": {\n        \"value\": \"http://localhost/pizzaout/wp-content/uploads/2018/07/ic_launcher.png\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:10:33\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'b944afcf-9a8b-4916-8c26-9d523b0add53', '', '', '2018-07-05 23:10:33', '2018-07-05 20:10:33', '', '0', 'http://localhost/pizzaout/2018/07/05/b944afcf-9a8b-4916-8c26-9d523b0add53/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('13', '1', '2018-07-05 23:10:03', '2018-07-05 20:10:03', '{\n    \"brasserie::brasserie_logo\": {\n        \"value\": \"http://localhost/pizzaout/wp-content/uploads/2018/07/logo.png\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:10:00\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '92b4254c-3345-44ea-83af-9bac0269bc61', '', '', '2018-07-05 23:10:03', '2018-07-05 20:10:03', '', '0', 'http://localhost/pizzaout/?p=13', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('14', '1', '2018-07-05 23:10:24', '2018-07-05 20:10:24', '', 'ic_launcher', '', 'inherit', 'open', 'closed', '', 'ic_launcher', '', '', '2018-07-05 23:12:08', '2018-07-05 20:12:08', '', '0', 'http://localhost/pizzaout/wp-content/uploads/2018/07/ic_launcher.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('16', '1', '2018-07-05 23:12:30', '2018-07-05 20:12:30', '{\n    \"brasserie::brasserie_logo\": {\n        \"value\": \"http://localhost/pizzaout/wp-content/uploads/2018/07/ic_launcher-e1530821509357.png\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:12:30\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'c28ca2fa-4efa-4fe6-81da-9d77d22d955b', '', '', '2018-07-05 23:12:30', '2018-07-05 20:12:30', '', '0', 'http://localhost/pizzaout/2018/07/05/c28ca2fa-4efa-4fe6-81da-9d77d22d955b/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('17', '1', '2018-07-05 23:13:41', '2018-07-05 20:13:41', '{\n    \"brasserie::header_textcolor\": {\n        \"value\": \"#dd3333\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:13:41\"\n    },\n    \"brasserie::brasserie_link_color\": {\n        \"value\": \"#db8132\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:13:41\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '67030741-1b7e-4acb-8f1e-0971604ce52d', '', '', '2018-07-05 23:13:41', '2018-07-05 20:13:41', '', '0', 'http://localhost/pizzaout/2018/07/05/67030741-1b7e-4acb-8f1e-0971604ce52d/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('18', '1', '2018-07-05 23:14:11', '2018-07-05 20:14:11', '{\n    \"brasserie::brasserie_h1_font_family\": {\n        \"value\": \"Noto Sans\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:14:11\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '82e5ef17-4fa6-4bc6-a7c6-5cb5c7ee904d', '', '', '2018-07-05 23:14:11', '2018-07-05 20:14:11', '', '0', 'http://localhost/pizzaout/2018/07/05/82e5ef17-4fa6-4bc6-a7c6-5cb5c7ee904d/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('19', '1', '2018-07-05 23:15:08', '2018-07-05 20:15:08', '{\n    \"brasserie::topBarContact_telNo\": {\n        \"value\": \"Call 2040 / 867484\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:15:08\"\n    },\n    \"brasserie::topBarContact_email\": {\n        \"value\": \"\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:15:08\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'd0251d44-420e-4336-b336-3c2ec2fda8df', '', '', '2018-07-05 23:15:08', '2018-07-05 20:15:08', '', '0', 'http://localhost/pizzaout/2018/07/05/d0251d44-420e-4336-b336-3c2ec2fda8df/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('20', '1', '2018-07-05 23:15:37', '2018-07-05 20:15:37', '{\n    \"brasserie::facebook\": {\n        \"value\": \"https://www.facebook.com/PizzaOutSomalia\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:15:37\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '7f262cdc-57d7-4513-b36b-4c1237050b8a', '', '', '2018-07-05 23:15:37', '2018-07-05 20:15:37', '', '0', 'http://localhost/pizzaout/2018/07/05/7f262cdc-57d7-4513-b36b-4c1237050b8a/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('21', '1', '2018-07-05 23:16:19', '2018-07-05 20:16:19', '', 'pizza5', '', 'inherit', 'open', 'closed', '', 'pizza5', '', '', '2018-07-05 23:16:19', '2018-07-05 20:16:19', '', '0', 'http://localhost/pizzaout/wp-content/uploads/2018/07/pizza5.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('22', '1', '2018-07-05 23:16:24', '2018-07-05 20:16:24', '{\n    \"brasserie::brasserie_slider\": {\n        \"value\": \"none\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:16:24\"\n    },\n    \"brasserie::brasserie_one_logo_upload\": {\n        \"value\": \"http://localhost/pizzaout/wp-content/uploads/2018/07/pizza5.jpg\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:16:24\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '216c485f-04c3-43a2-ac6b-9e2d4441d0be', '', '', '2018-07-05 23:16:24', '2018-07-05 20:16:24', '', '0', 'http://localhost/pizzaout/2018/07/05/216c485f-04c3-43a2-ac6b-9e2d4441d0be/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('23', '1', '2018-07-05 23:17:53', '2018-07-05 20:17:53', '{\n    \"show_on_front\": {\n        \"value\": \"posts\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:17:53\"\n    },\n    \"page_on_front\": {\n        \"value\": \"2\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:17:53\"\n    },\n    \"page_for_posts\": {\n        \"value\": \"2\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-07-05 20:17:53\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4189ba6d-c254-49b9-b9a1-75befc0cb559', '', '', '2018-07-05 23:17:53', '2018-07-05 20:17:53', '', '0', 'http://localhost/pizzaout/2018/07/05/4189ba6d-c254-49b9-b9a1-75befc0cb559/', '0', 'customize_changeset', '', '0');
INSERT INTO `wp_posts` VALUES ('24', '1', '2018-07-05 23:18:29', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-07-05 23:18:29', '0000-00-00 00:00:00', '', '0', 'http://localhost/pizzaout/?post_type=fdm-menu&p=24', '0', 'fdm-menu', '', '0');
INSERT INTO `wp_posts` VALUES ('25', '1', '2018-07-05 23:19:06', '2018-07-05 20:19:06', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Pizza Out', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2018-07-05 23:19:06', '2018-07-05 20:19:06', '', '1', 'http://localhost/pizzaout/2018/07/05/1-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('26', '1', '2018-07-05 23:20:37', '2018-07-05 20:20:37', '<h2>Who we are</h2>\r\nOur website address is: http://localhost/pizzaout.\r\n<h2>What personal data we collect and why we collect it</h2>\r\n<h3>Comments</h3>\r\nWhen visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.\r\n\r\nAn anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.\r\n<h3>Media</h3>\r\nIf you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.\r\n<h3>Contact forms</h3>\r\n<h3>Cookies</h3>\r\nIf you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.\r\n\r\nIf you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.\r\n\r\nWhen you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select \"Remember Me\", your login will persist for two weeks. If you log out of your account, the login cookies will be removed.\r\n\r\nIf you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.\r\n<h3>Embedded content from other websites</h3>\r\nArticles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.\r\n\r\nThese websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracing your interaction with the embedded content if you have an account and are logged in to that website.\r\n<h3>Analytics</h3>\r\n<h2>Who we share your data with</h2>\r\n<h2>How long we retain your data</h2>\r\nIf you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.\r\n\r\nFor users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.\r\n<h2>What rights you have over your data</h2>\r\nIf you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.\r\n<h2>Where we send your data</h2>\r\nVisitor comments may be checked through an automated spam detection service.\r\n<h2>Your contact information</h2>\r\n<h2>Additional information</h2>\r\n<h3>How we protect your data</h3>\r\n<h3>What data breach procedures we have in place</h3>\r\n<h3>What third parties we receive data from</h3>\r\n<h3>What automated decision making and/or profiling we do with user data</h3>\r\n<h3>Industry regulatory disclosure requirements</h3>', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '3-revision-v1', '', '', '2018-07-05 23:20:37', '2018-07-05 20:20:37', '', '3', 'http://localhost/pizzaout/2018/07/05/3-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('32', '1', '2018-07-05 23:23:14', '2018-07-05 20:23:14', 'Shop for out pizza here', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-05 23:23:14', '2018-07-05 20:23:14', '', '29', 'http://localhost/pizzaout/2018/07/05/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('33', '1', '2018-07-05 23:36:25', '2018-07-05 20:36:25', '[iframe src=\"http://www.youtube.com/embed/4qsGTXLnmKs\" width=\"100%\" height=\"500\"]', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-05 23:36:25', '2018-07-05 20:36:25', '', '29', 'http://localhost/pizzaout/2018/07/05/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('34', '1', '2018-07-05 23:36:48', '2018-07-05 20:36:48', '[iframe src=\"http://www.pizzaout.so\" width=\"100%\" height=\"500\"]', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-05 23:36:48', '2018-07-05 20:36:48', '', '29', 'http://localhost/pizzaout/2018/07/05/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('35', '1', '2018-07-06 17:52:34', '2018-07-06 14:52:34', '[iframe src=\"http://localhost/pizzaout-api/\" width=\"100%\" height=\"500\"]', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-06 17:52:34', '2018-07-06 14:52:34', '', '29', 'http://localhost/pizzaout/2018/07/06/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('36', '1', '2018-07-06 21:07:42', '2018-07-06 18:07:42', '[iframe src=\"http://localhost/pizzaout-api/wpcart\" width=\"100%\" height=\"500\"]', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-06 21:07:42', '2018-07-06 18:07:42', '', '29', 'http://localhost/pizzaout/2018/07/06/29-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('37', '1', '2018-07-07 01:00:07', '0000-00-00 00:00:00', '', 'Home', '', 'draft', 'closed', 'closed', '', '', '', '', '2018-07-07 01:00:07', '0000-00-00 00:00:00', '', '0', 'http://localhost/pizzaout/?p=37', '1', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('38', '1', '2018-07-07 01:00:50', '2018-07-06 22:00:50', ' ', '', '', 'publish', 'closed', 'closed', '', '38', '', '', '2018-07-07 01:01:08', '2018-07-06 22:01:08', '', '0', 'http://localhost/pizzaout/?p=38', '1', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('39', '1', '2018-07-07 01:00:50', '2018-07-06 22:00:50', ' ', '', '', 'publish', 'closed', 'closed', '', '39', '', '', '2018-07-07 01:01:08', '2018-07-06 22:01:08', '', '0', 'http://localhost/pizzaout/?p=39', '2', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('40', '1', '2018-07-07 01:01:49', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-07-07 01:01:49', '0000-00-00 00:00:00', '', '0', 'http://localhost/pizzaout/?post_type=fdm-menu&p=40', '0', 'fdm-menu', '', '0');
INSERT INTO `wp_posts` VALUES ('41', '1', '2018-07-07 20:24:54', '2018-07-07 17:24:54', '[iframe src=\"http://localhost/pizzaout-api/wpcart\" width=\"100%\" height=\"800\"]', 'Shop', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2018-07-07 20:24:54', '2018-07-07 17:24:54', '', '29', 'http://localhost/pizzaout/2018/07/07/29-revision-v1/', '0', 'revision', '', '0');

-- ----------------------------
-- Table structure for wp_termmeta
-- ----------------------------
DROP TABLE IF EXISTS `wp_termmeta`;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_termmeta
-- ----------------------------

-- ----------------------------
-- Table structure for wp_terms
-- ----------------------------
DROP TABLE IF EXISTS `wp_terms`;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_terms
-- ----------------------------
INSERT INTO `wp_terms` VALUES ('1', 'Uncategorized', 'uncategorized', '0');
INSERT INTO `wp_terms` VALUES ('2', 'post-format-aside', 'post-format-aside', '0');
INSERT INTO `wp_terms` VALUES ('3', 'Menu 1', 'menu-1', '0');

-- ----------------------------
-- Table structure for wp_term_relationships
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_relationships`;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_term_relationships
-- ----------------------------
INSERT INTO `wp_term_relationships` VALUES ('1', '1', '0');
INSERT INTO `wp_term_relationships` VALUES ('1', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('38', '3', '0');
INSERT INTO `wp_term_relationships` VALUES ('39', '3', '0');

-- ----------------------------
-- Table structure for wp_term_taxonomy
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_taxonomy`;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_term_taxonomy
-- ----------------------------
INSERT INTO `wp_term_taxonomy` VALUES ('1', '1', 'category', '', '0', '0');
INSERT INTO `wp_term_taxonomy` VALUES ('2', '2', 'post_format', '', '0', '0');
INSERT INTO `wp_term_taxonomy` VALUES ('3', '3', 'nav_menu', '', '0', '2');

-- ----------------------------
-- Table structure for wp_usermeta
-- ----------------------------
DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wp_usermeta
-- ----------------------------
INSERT INTO `wp_usermeta` VALUES ('1', '1', 'nickname', 'admin');
INSERT INTO `wp_usermeta` VALUES ('2', '1', 'first_name', '');
INSERT INTO `wp_usermeta` VALUES ('3', '1', 'last_name', '');
INSERT INTO `wp_usermeta` VALUES ('4', '1', 'description', '');
INSERT INTO `wp_usermeta` VALUES ('5', '1', 'rich_editing', 'true');
INSERT INTO `wp_usermeta` VALUES ('6', '1', 'syntax_highlighting', 'true');
INSERT INTO `wp_usermeta` VALUES ('7', '1', 'comment_shortcuts', 'false');
INSERT INTO `wp_usermeta` VALUES ('8', '1', 'admin_color', 'sunrise');
INSERT INTO `wp_usermeta` VALUES ('9', '1', 'use_ssl', '0');
INSERT INTO `wp_usermeta` VALUES ('10', '1', 'show_admin_bar_front', 'true');
INSERT INTO `wp_usermeta` VALUES ('11', '1', 'locale', '');
INSERT INTO `wp_usermeta` VALUES ('12', '1', 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` VALUES ('13', '1', 'wp_user_level', '10');
INSERT INTO `wp_usermeta` VALUES ('14', '1', 'dismissed_wp_pointers', 'wp496_privacy,theme_editor_notice');
INSERT INTO `wp_usermeta` VALUES ('15', '1', 'show_welcome_panel', '1');
INSERT INTO `wp_usermeta` VALUES ('16', '1', 'session_tokens', 'a:1:{s:64:\"6202c05e8e7b3ae95753e548ac30f53c506a69ac4b81d1729d9a9ebbedc4b184\";a:4:{s:10:\"expiration\";i:1531172666;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36\";s:5:\"login\";i:1530999866;}}');
INSERT INTO `wp_usermeta` VALUES ('17', '1', 'wp_dashboard_quick_press_last_post_id', '4');
INSERT INTO `wp_usermeta` VALUES ('18', '1', 'wp_user-settings', 'libraryContent=browse&editor=tinymce');
INSERT INTO `wp_usermeta` VALUES ('19', '1', 'wp_user-settings-time', '1530888767');
INSERT INTO `wp_usermeta` VALUES ('20', '1', 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}');
INSERT INTO `wp_usermeta` VALUES ('21', '1', 'metaboxhidden_nav-menus', 'a:5:{i:0;s:22:\"add-post-type-fdm-menu\";i:1;s:27:\"add-post-type-fdm-menu-item\";i:2;s:12:\"add-post_tag\";i:3;s:15:\"add-post_format\";i:4;s:20:\"add-fdm-menu-section\";}');
INSERT INTO `wp_usermeta` VALUES ('22', '1', 'nav_menu_recently_edited', '3');
INSERT INTO `wp_usermeta` VALUES ('23', '1', 'google_profile', '');
INSERT INTO `wp_usermeta` VALUES ('24', '1', 'twitter_profile', '');
INSERT INTO `wp_usermeta` VALUES ('25', '1', 'instagram_profile', '');
INSERT INTO `wp_usermeta` VALUES ('26', '1', 'facebook_profile', '');
INSERT INTO `wp_usermeta` VALUES ('27', '1', 'linkedin_profile', '');
