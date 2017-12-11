-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2017 at 02:22 AM
-- Server version: 10.0.33-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsobucok_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `CHEF_ID` bigint(20) NOT NULL,
  `CHEF_NAME` varchar(100) NOT NULL,
  `KITCHEN_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`CHEF_ID`, `CHEF_NAME`, `KITCHEN_ID`) VALUES
(4, 'Ahmed Jama', 1),
(5, 'Bashir Munye', 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CITY_ID` bigint(20) NOT NULL,
  `CITY_NAME` varchar(100) NOT NULL,
  `COUNTRY_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CITY_ID`, `CITY_NAME`, `COUNTRY_ID`) VALUES
(1, 'Mogadishu', 2),
(3, 'Mombasa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `COUNRY_ID` bigint(20) NOT NULL,
  `COUNTRY_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`COUNRY_ID`, `COUNTRY_NAME`) VALUES
(1, 'KENYA'),
(2, 'SOMALIA'),
(3, 'SOUTH SUDAN'),
(4, 'ETHIOPIA'),
(5, 'ERITREA');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `ADDRESS_ID` bigint(20) NOT NULL,
  `USER_ID` bigint(20) NOT NULL,
  `LOCATION_ID` bigint(20) DEFAULT NULL,
  `ADDRESS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`ADDRESS_ID`, `USER_ID`, `LOCATION_ID`, `ADDRESS`) VALUES
(1, 5, 1, 'KISMAYU'),
(2, 10, 1, 'kismayu');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `ORDER_ID` bigint(20) NOT NULL,
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
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`ORDER_ID`, `USER_ID`, `ADDRESS_ID`, `KITCHEN_ID`, `CHEF_ID`, `RIDER_ID`, `ORDER_DATE`, `PAYMENT_METHOD`, `ORDER_STATUS`, `NOTES`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1000, 5, 1, 1, 4, 1, '2017-10-15 11:57:51', 'MOBILE', 'ORDER DELIVERED', 'More cheese', '2017-10-15 11:57:40', '2017-10-30 20:52:05'),
(1006, 5, 1, 1, 4, 1, '2017-10-15 11:23:49', 'MOBILE', 'RIDER DISPATCHED', 'EXTRA CHEESE', '2017-10-15 11:23:49', '2017-11-04 20:37:57'),
(1007, 10, 1, 1, 4, NULL, '2017-10-15 11:29:49', 'MOBILE', 'UNDER PREPARATION', 'EXTRA CHEESE', '2017-10-15 11:29:49', '2017-11-09 15:17:20'),
(1008, 10, 1, NULL, NULL, NULL, '2017-10-15 11:31:28', 'MOBILE', 'ORDER CANCELLED', 'EXTRA CHEESE', '2017-10-15 11:31:28', '2017-11-01 03:40:37'),
(1009, 10, 1, 1, 4, NULL, '2017-10-15 11:33:09', 'MOBILE', 'UNDER PREPARATION', 'EXTRA CHEESE', '2017-10-15 11:33:09', '2017-11-04 20:34:44'),
(1010, 10, 1, 1, NULL, 1, '2017-10-15 11:33:28', 'MOBILE', 'RIDER DISPATCHED', 'EXTRA CHEESE', '2017-10-15 11:33:28', '2017-11-04 20:41:00'),
(1012, 10, 1, 1, 4, NULL, '2017-10-15 17:17:23', 'MOBILE', 'UNDER PREPARATION', 'EXTRA CHEESE', '2017-10-15 17:17:23', '2017-11-09 15:17:12'),
(1013, 10, 1, 1, 4, 1, '2017-10-15 17:17:43', 'MOBILE', 'RIDER DISPATCHED', 'EXTRA CHEESE', '2017-10-15 17:17:43', '2017-11-09 15:11:28'),
(1014, 10, 1, 1, 4, NULL, '2017-10-16 01:41:48', 'MOBILE', 'UNDER PREPARATION', 'EXTRA CHEESE', '2017-10-16 01:41:48', '2017-11-04 21:06:27'),
(1015, 10, 1, NULL, NULL, NULL, '2017-10-16 01:42:13', 'MOBILE', 'ORDER CONFIRMED', 'EXTRA CHEESE', '2017-10-16 01:42:13', '2017-11-04 20:17:20'),
(1016, 5, 1, 1, 4, 1, '2017-10-16 01:58:36', 'MOBILE', 'RIDER DISPATCHED', 'EXTRA CHEESE', '2017-10-16 01:58:36', '2017-11-09 15:05:05'),
(1017, 5, 1, 1, 4, 1, '2017-10-16 02:38:13', 'MOBILE', 'RIDER DISPATCHED', 'EXTRA CHEESE', '2017-10-16 02:38:13', '2017-11-06 08:29:12'),
(1018, 5, 1, 1, 4, NULL, '2017-10-16 02:38:14', 'MOBILE', 'ORDER READY', 'EXTRA CHEESE', '2017-10-16 02:38:14', '2017-11-09 15:11:18'),
(1019, 10, 1, NULL, NULL, NULL, '2017-11-09 16:44:15', 'MOBILE', 'ORDER CONFIRMED', 'EXTRA CHEESE', '2017-11-09 16:44:16', '2017-11-09 15:16:50'),
(1020, 5, 1, NULL, NULL, NULL, '2017-11-13 02:18:55', 'MOBILE', 'ORDER PENDING', 'deliver to my house', '2017-11-13 02:18:55', '2017-11-13 02:18:55'),
(1021, 10, 1, NULL, NULL, NULL, '2017-11-15 12:41:06', 'CARD', 'ORDER PENDING', NULL, '2017-11-15 12:41:06', '2017-11-15 12:41:06'),
(1022, 10, 1, NULL, NULL, NULL, '2017-11-15 12:55:46', 'CARD', 'ORDER CONFIRMED', NULL, '2017-11-15 12:55:46', '2017-11-15 13:03:59'),
(1023, 5, 1, NULL, NULL, NULL, '2017-11-15 13:16:35', 'CARD', 'ORDER PENDING', NULL, '2017-11-15 13:16:35', '2017-11-15 13:16:35'),
(1024, 10, 1, NULL, NULL, NULL, '2017-11-18 13:08:28', 'CARD', 'ORDER PENDING', NULL, '2017-11-18 13:08:28', '2017-11-18 13:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_item`
--

CREATE TABLE `customer_order_item` (
  `ORDER_ITEM_ID` int(11) NOT NULL,
  `ORDER_ID` bigint(10) NOT NULL,
  `ITEM_TYPE_ID` bigint(10) NOT NULL,
  `QUANTITY` int(4) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL,
  `SUBTOTAL` decimal(10,0) NOT NULL,
  `OPTIONS` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTES` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order_item`
--

INSERT INTO `customer_order_item` (`ORDER_ITEM_ID`, `ORDER_ID`, `ITEM_TYPE_ID`, `QUANTITY`, `PRICE`, `SUBTOTAL`, `OPTIONS`, `NOTES`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 1000, 1, 2, '500', '1000', '', '', '2017-10-15 11:58:07', '2017-10-15 11:58:09'),
(7, 1006, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 11:23:49', NULL),
(8, 1007, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 11:29:49', NULL),
(9, 1008, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 11:31:28', NULL),
(10, 1009, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 11:33:09', NULL),
(11, 1010, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 11:33:28', NULL),
(13, 1012, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 17:17:23', NULL),
(14, 1013, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-15 17:17:43', NULL),
(15, 1014, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-16 01:41:48', NULL),
(16, 1015, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-16 01:42:13', NULL),
(17, 1016, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-16 01:58:36', NULL),
(18, 1017, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-16 02:38:13', NULL),
(19, 1018, 1, 1, '500', '500', 'N/A', 'Test Order', '2017-10-16 02:38:14', NULL),
(20, 1019, 1, 2, '1200', '1200', 'N/A', 'Test Order', '2017-11-09 16:44:15', NULL),
(21, 1020, 1, 2, '1200', '2400', 'N/A', 'Test Order Here', '2017-11-13 02:18:55', NULL),
(22, 1020, 4, 1, '300', '300', 'N/A', 'Test Order Here', '2017-11-13 02:18:56', NULL),
(23, 1021, 1, 1, '1200', '1200', 'N/A', 'Test Order Here', '2017-11-15 12:41:06', NULL),
(24, 1021, 4, 1, '300', '300', 'N/A', 'Test Order Here', '2017-11-15 12:41:06', NULL),
(25, 1022, 1, 1, '1200', '1200', 'N/A', 'Test Order Here', '2017-11-15 12:55:46', NULL),
(26, 1022, 4, 1, '300', '300', 'N/A', 'Test Order Here', '2017-11-15 12:55:46', NULL),
(27, 1023, 2, 1, '500', '500', 'N/A', 'Test Order Here', '2017-11-15 13:16:35', NULL),
(28, 1024, 1, 1, '1200', '1200', 'N/A', 'Test Order Here', '2017-11-18 13:08:28', NULL),
(29, 1024, 4, 1, '300', '300', 'N/A', 'Test Order Here', '2017-11-18 13:08:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `KITCHEN_ID` bigint(20) NOT NULL,
  `KITCHEN_NAME` varchar(100) NOT NULL,
  `CITY_ID` bigint(20) NOT NULL,
  `OPENING_TIME` time DEFAULT NULL,
  `CLOSING_TIME` time DEFAULT NULL,
  `ADDRESS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`KITCHEN_ID`, `KITCHEN_NAME`, `CITY_ID`, `OPENING_TIME`, `CLOSING_TIME`, `ADDRESS`) VALUES
(1, 'Mogadishu', 1, '09:56:58', '23:57:03', NULL),
(2, 'Mombasa', 3, '18:23:43', '18:23:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` bigint(20) NOT NULL,
  `LOCATION_NAME` varchar(255) NOT NULL,
  `ADDRESS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `LOCATION_NAME`, `ADDRESS`) VALUES
(1, 'kismayu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `MENU_CAT_ID` bigint(10) NOT NULL,
  `MENU_CAT_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MENU_CAT_IMAGE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE` int(1) NOT NULL DEFAULT '1',
  `RANK` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`MENU_CAT_ID`, `MENU_CAT_NAME`, `MENU_CAT_IMAGE`, `ACTIVE`, `RANK`) VALUES
(1, 'PIZZA', 'pizza.jpg', 1, 1),
(2, 'BURGERS', NULL, 0, 2),
(3, 'SALADS', NULL, 0, 3),
(4, 'SWEETS', NULL, 0, 6),
(5, 'SANDWICH', NULL, 0, 4),
(6, 'DRINKS', NULL, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `MENU_ITEM_ID` bigint(10) NOT NULL,
  `MENU_CAT_ID` bigint(10) NOT NULL,
  `MENU_ITEM_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MENU_ITEM_DESC` text COLLATE utf8_unicode_ci NOT NULL,
  `MENU_ITEM_IMAGE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HOT_DEAL` bit(1) NOT NULL DEFAULT b'0',
  `VEGETARIAN` bit(1) NOT NULL DEFAULT b'0',
  `MAX_QTY` int(2) NOT NULL DEFAULT '10' COMMENT 'Show the maximum number of quantities one can select from'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`MENU_ITEM_ID`, `MENU_CAT_ID`, `MENU_ITEM_NAME`, `MENU_ITEM_DESC`, `MENU_ITEM_IMAGE`, `HOT_DEAL`, `VEGETARIAN`, `MAX_QTY`) VALUES
(1, 1, 'Margherita', 'Crushed Tomatoes, Mozzarella, Grana, Basil', '2.jpg', b'0', b'0', 10),
(2, 1, 'Hawaiian', 'pizza topped with tomato sauce, cheese, pineapple, and Canadian bacon or ham. Some versions may include peppers, mushrooms', '2.jpg', b'0', b'0', 10),
(3, 1, 'Chicken Tikka Masala', 'cheesy pizza topped with delicious Indian chicken tikka masala', '2.jpg', b'0', b'0', 10),
(4, 1, 'Supreme', 'Sausage, pepperoni, mushrooms, olives, peppers, and onion', '2.jpg', b'0', b'0', 10);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_type`
--

CREATE TABLE `menu_item_type` (
  `ITEM_TYPE_ID` bigint(11) NOT NULL,
  `MENU_ITEM_ID` bigint(11) NOT NULL,
  `ITEM_TYPE_SIZE` varchar(15) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `AVAILABLE` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item_type`
--

INSERT INTO `menu_item_type` (`ITEM_TYPE_ID`, `MENU_ITEM_ID`, `ITEM_TYPE_SIZE`, `PRICE`, `AVAILABLE`) VALUES
(1, 1, 'LARGE', '1200.00', b'1'),
(2, 1, 'SMALL', '500.00', b'1'),
(3, 2, 'MEDIUM', '700.00', b'1'),
(4, 4, 'LARGE', '300.00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `TRACKING_ID` bigint(10) NOT NULL,
  `ORDER_ID` bigint(10) NOT NULL,
  `COMMENTS` varchar(255) DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL,
  `TRACKING_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`TRACKING_ID`, `ORDER_ID`, `COMMENTS`, `STATUS`, `TRACKING_DATE`) VALUES
(60, 1010, 'werwer', 'ORDER CONFIRMED', '2017-11-04 17:14:45'),
(61, 1016, 'Order confirmed', 'ORDER CONFIRMED', '2017-11-04 17:42:26'),
(62, 1014, 'confiormed', 'ORDER CONFIRMED', '2017-11-04 17:43:55'),
(63, 1012, 'test', 'ORDER PENDING', '2017-11-04 18:45:59'),
(64, 1014, 'Chef assigned', 'CHEF ASSIGNED', '2017-11-04 19:05:51'),
(65, 1016, 'Kitchen transfer', 'KITCHEN ALLOCATED', '2017-11-04 20:16:21'),
(66, 1009, 'Kitchen transfer', 'KITCHEN ALLOCATED', '2017-11-04 20:16:45'),
(67, 1015, 'confirmed', 'ORDER CONFIRMED', '2017-11-04 20:17:20'),
(68, 1012, 'confirm', 'ORDER CONFIRMED', '2017-11-04 20:17:59'),
(69, 1009, 'Assigned cheff', 'CHEF ASSIGNED', '2017-11-04 20:21:30'),
(70, 1009, 'Preparing', 'UNDER PREPARATION', '2017-11-04 20:34:45'),
(71, 1006, 'Ready', 'ORDER READY', '2017-11-04 20:35:04'),
(72, 1006, 'Assigned', 'RIDER ASSIGNED', '2017-11-04 20:37:57'),
(73, 1010, 'Rider assigned', 'RIDER ASSIGNED', '2017-11-04 20:41:00'),
(74, 1014, 'Order being prepared', 'UNDER PREPARATION', '2017-11-04 21:06:27'),
(75, 1017, 'paid', 'ORDER CONFIRMED', '2017-11-06 08:24:48'),
(76, 1017, 'prepare urgently', 'KITCHEN ALLOCATED', '2017-11-06 08:25:39'),
(77, 1017, 'done', 'CHEF ASSIGNED', '2017-11-06 08:27:06'),
(78, 1017, 'done', 'UNDER PREPARATION', '2017-11-06 08:27:29'),
(79, 1017, 'prepared', 'ORDER READY', '2017-11-06 08:28:10'),
(80, 1017, 'Assigned', 'RIDER ASSIGNED', '2017-11-06 08:29:12'),
(81, 1013, 'ghgh', 'ORDER CONFIRMED', '2017-11-07 12:07:19'),
(82, 1013, '6565656', 'KITCHEN ALLOCATED', '2017-11-07 12:09:18'),
(83, 1013, 'bv', 'CHEF ASSIGNED', '2017-11-07 12:10:16'),
(84, 1013, 'hgfhfgh', 'UNDER PREPARATION', '2017-11-07 12:12:02'),
(85, 1013, 'vbcbvb', 'ORDER READY', '2017-11-07 12:12:22'),
(86, 1019, NULL, 'ORDER PENDING', '2017-11-09 16:44:16'),
(87, 1016, 'PREPARING', 'UNDER PREPARATION', '2017-11-09 15:01:20'),
(88, 1016, 'READY', 'ORDER READY', '2017-11-09 15:02:03'),
(89, 1016, 'DISPATCHED', 'RIDER DISPATCHED', '2017-11-09 15:05:05'),
(90, 1018, 'CONFIRMED', 'ORDER CONFIRMED', '2017-11-09 15:05:49'),
(91, 1018, NULL, 'KITCHEN ALLOCATED', '2017-11-09 15:10:51'),
(92, 1018, NULL, 'UNDER PREPARATION', '2017-11-09 15:11:08'),
(93, 1018, NULL, 'ORDER READY', '2017-11-09 15:11:18'),
(94, 1013, NULL, 'RIDER DISPATCHED', '2017-11-09 15:11:29'),
(95, 1019, NULL, 'ORDER CONFIRMED', '2017-11-09 15:16:50'),
(96, 1012, NULL, 'KITCHEN ALLOCATED', '2017-11-09 15:16:58'),
(97, 1012, NULL, 'UNDER PREPARATION', '2017-11-09 15:17:12'),
(98, 1007, NULL, 'UNDER PREPARATION', '2017-11-09 15:17:20'),
(99, 1020, NULL, 'ORDER PENDING', '2017-11-13 02:18:55'),
(100, 1021, NULL, 'ORDER PENDING', '2017-11-15 12:41:06'),
(101, 1022, NULL, 'ORDER PENDING', '2017-11-15 12:55:46'),
(102, 1022, NULL, 'ORDER CONFIRMED', '2017-11-15 12:57:54'),
(103, 1023, NULL, 'ORDER PENDING', '2017-11-15 13:16:35'),
(104, 1024, NULL, 'ORDER PENDING', '2017-11-18 13:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` bigint(20) NOT NULL,
  `ORDER_ID` bigint(20) DEFAULT NULL,
  `PAYMENT_CHANNEL` varchar(255) NOT NULL,
  `PAYMENT_AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_REF` varchar(255) NOT NULL,
  `PAYMENT_STATUS` varchar(30) DEFAULT NULL,
  `PAYMENT_DATE` datetime NOT NULL,
  `PAYMENT_NOTES` varchar(255) DEFAULT NULL,
  `PAYMENT_NUMBER` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `ORDER_ID`, `PAYMENT_CHANNEL`, `PAYMENT_AMOUNT`, `PAYMENT_REF`, `PAYMENT_STATUS`, `PAYMENT_DATE`, `PAYMENT_NOTES`, `PAYMENT_NUMBER`) VALUES
(1, 1000, 'CARD', '0.00', '1000-5A2163A78D0F5', 'ORDER CONFIRMED', '2017-12-01 14:14:03', NULL, 'Unknown'),
(7, 1006, 'MOBILE', '500.00', 'PIZZA_59E38B956E655', 'PAYMENT PENDING', '2017-10-15 11:23:49', 'N/A', NULL),
(8, 1007, 'MOBILE', '500.00', 'PIZZA_59E38CFD0AF07', 'PAYMENT PENDING', '2017-10-15 11:29:49', 'N/A', NULL),
(9, 1008, 'MOBILE', '500.00', 'PIZZA_59E38D6097F05', 'PAYMENT PENDING', '2017-10-15 11:31:28', 'N/A', NULL),
(10, 1009, 'MOBILE', '500.00', 'PIZZA_59E38DC51FC16', 'PAYMENT PENDING', '2017-10-15 11:33:09', 'N/A', NULL),
(11, 1010, 'MOBILE', '500.00', 'PIZZA_59E38DD81BC33', 'PAYMENT PENDING', '2017-10-15 11:33:28', 'N/A', NULL),
(13, 1012, 'MOBILE', '500.00', 'PIZZA_59E3DE739A18C', 'PAYMENT PENDING', '2017-10-15 17:17:23', 'N/A', NULL),
(14, 1013, 'MOBILE', '500.00', 'PIZZA_59E3DE875B6A6', 'PAYMENT PENDING', '2017-10-15 17:17:43', 'N/A', NULL),
(15, 1014, 'MOBILE', '500.00', 'PIZZA_59E454ABEDEBE', 'PAYMENT PENDING', '2017-10-16 01:41:48', 'N/A', NULL),
(16, 1015, 'MOBILE', '500.00', 'PIZZA_59E454C586542', 'PAYMENT PENDING', '2017-10-16 01:42:13', 'N/A', NULL),
(17, 1016, 'MOBILE', '500.00', 'PIZZA_59E4589CC5D00', 'PAYMENT PENDING', '2017-10-16 01:58:36', 'N/A', NULL),
(18, 1017, 'MOBILE', '500.00', 'PIZZA_59E461E565175', 'PAYMENT PENDING', '2017-10-16 02:38:13', 'N/A', NULL),
(19, 1018, 'MOBILE', '500.00', 'PIZZA_59E461E68D452', 'PAYMENT PENDING', '2017-10-16 02:38:14', 'N/A', NULL),
(20, 1019, 'MOBILE', '1200.00', 'PIZZA_5A045BB00A4AA', 'ORDER PENDING', '2017-11-09 16:44:15', 'N/A', NULL),
(21, NULL, 'MOBILE', '2700.00', '5A09011009714', 'PAYMENT PENDING', '2017-11-13 02:18:56', NULL, '0724802220'),
(22, 1022, 'CARD', '1500.00', '1022-5A0C39B8AF328', 'ORDER CONFIRMED', '2017-11-15 13:03:59', '731923364944', 'Mastercard'),
(23, 1023, 'CARD', '500.00', '1023-5A0C3E342DC72', 'ORDER CONFIRMED', '2017-11-15 13:18:59', '732000364946', 'Unknown'),
(24, 1024, 'CARD', '1500.00', '1024-5A1030CD23108', 'ORDER CONFIRMED', '2017-11-21 17:24:28', NULL, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `RIDER_ID` bigint(10) NOT NULL,
  `KITCHEN_ID` bigint(10) DEFAULT NULL,
  `RIDER_NAME` varchar(100) NOT NULL,
  `RIDER_MOBILE` varchar(255) DEFAULT NULL,
  `RIDER_STATUS` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`RIDER_ID`, `KITCHEN_ID`, `RIDER_NAME`, `RIDER_MOBILE`, `RIDER_STATUS`) VALUES
(1, 1, 'Yusuf', '56765', 1),
(2, 2, 'Khaleed', '6786786', 1),
(3, 1, 'Ismael', '34534', 1),
(4, 2, 'Latif', '78958', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `CART_ITEM_ID` bigint(10) NOT NULL,
  `USER_ID` bigint(20) NOT NULL,
  `ITEM_TYPE_ID` bigint(10) NOT NULL,
  `QUANTITY` int(4) NOT NULL,
  `ITEM_PRICE` decimal(10,0) NOT NULL,
  `ITEM_TYPE_SIZE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `CART_TIMESTAMP` bigint(20) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`CART_ITEM_ID`, `USER_ID`, `ITEM_TYPE_ID`, `QUANTITY`, `ITEM_PRICE`, `ITEM_TYPE_SIZE`, `CART_TIMESTAMP`, `CREATED_AT`, `UPDATED_AT`) VALUES
(3, 10, 1, 7, '1200', 'LARGE', 1512726042, '2017-12-08 09:40:46', '2017-12-09 13:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_favs`
--

CREATE TABLE `tb_favs` (
  `FAV_ID` bigint(20) NOT NULL,
  `MENU_ITEM_ID` bigint(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_migration`
--

CREATE TABLE `tb_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_migration`
--

INSERT INTO `tb_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1510298356),
('m160516_095943_init', 1510298358);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `STATUS_NAME` varchar(30) NOT NULL,
  `STATUS_DESC` varchar(100) DEFAULT NULL,
  `COLOR` varchar(10) NOT NULL DEFAULT 'GREEN',
  `SCOPE` varchar(10) NOT NULL DEFAULT 'ALL',
  `RANK` int(2) NOT NULL DEFAULT '1',
  `WORKFLOW` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`STATUS_NAME`, `STATUS_DESC`, `COLOR`, `SCOPE`, `RANK`, `WORKFLOW`) VALUES
('AWAITING RIDER', 'Awaiting Rider', 'BROWN', 'INACTIVE', 7, 3),
('CHEF ASSIGNED', 'Assign Chef', 'GREEN', 'INACTIVE', 4, 0),
('KITCHEN ALLOCATED', 'Transfer to Kitchen', 'GREEN', 'OFFICE', 3, 1),
('ORDER CANCELLED', 'Cancel Order', 'RED', 'ALL', 0, 0),
('ORDER CONFIRMED', 'Confirm Order', 'PURPLE', 'OFFICE', 2, 0),
('ORDER DELIVERED', 'Order Delieverd', 'RED', 'RIDER', 10, 0),
('ORDER PENDING', 'Awaiting Processing', '#ff69b4', 'ALL', 1, 0),
('ORDER READY', 'Order Ready', 'GREEN', 'KITCHEN', 6, 2),
('PAYMENT PENDING', 'Payment Not Confirmed', 'GREEN', 'OFFICE', 11, 2),
('RIDER ASSIGNED', 'Assign Rider', 'GREEN', 'INACTIVE', 8, 4),
('RIDER DISPATCHED', 'Assign & Dispatch Rider', 'GREEN', 'KITCHEN', 9, 5),
('UNDER PREPARATION', 'Preparing Order', 'ORANGE', 'KITCHEN', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `USER_ID` bigint(20) NOT NULL,
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
  `CLIENT_TOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`USER_ID`, `USER_NAME`, `USER_TYPE`, `SURNAME`, `OTHER_NAMES`, `MOBILE`, `EMAIL`, `LOCATION_ID`, `PASSWORD`, `DATE_REGISTERED`, `LAST_UPDATED`, `CLIENT_TOKEN`) VALUES
(5, 'pkyalo', 1, 'kingoo', 'Peter Kyalo', 724802220, 'petchaloo@gmail.com', 1, '834dfae0c40820faccf4f83580be800545dca3c1', NULL, NULL, NULL),
(10, 'fatelord', 1, 'BARASA', '1123', 1123, '1233333DT', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-10-09 07:06:51', '2017-10-09 07:06:51', NULL),
(11, 'admin', 2, 'admin', 'admin', 123, 'admin@slice.com', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2017-11-10 13:11:43', '2017-11-10 13:11:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `USER_TYPE_ID` bigint(20) NOT NULL,
  `USER_TYPE_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`USER_TYPE_ID`, `USER_TYPE_NAME`) VALUES
(1, 'CUSTOMER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orders`
-- (See below for the actual view)
--
CREATE TABLE `vw_orders` (
`ORDER_ID` bigint(20)
,`USER_ID` bigint(20)
,`KITCHEN_ID` bigint(10)
,`CHEF_ID` bigint(10)
,`RIDER_ID` bigint(10)
,`MOBILE` int(20)
,`SURNAME` varchar(100)
,`OTHER_NAMES` varchar(100)
,`ORDER_DATE` datetime
,`ORDER_STATUS` varchar(30)
,`PAYMENT_AMOUNT` decimal(10,2)
,`PAYMENT_NUMBER` varchar(30)
,`NOTES` varchar(255)
,`ADDRESS_ID` bigint(20)
,`PAYMENT_METHOD` varchar(20)
,`CREATED_AT` datetime
,`UPDATED_AT` datetime
,`PAYMENT_DATE` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vw_orders`
--
DROP TABLE IF EXISTS `vw_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`tsobucok`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders`  AS  select `customer_order`.`ORDER_ID` AS `ORDER_ID`,`customer_order`.`USER_ID` AS `USER_ID`,`customer_order`.`KITCHEN_ID` AS `KITCHEN_ID`,`customer_order`.`CHEF_ID` AS `CHEF_ID`,`customer_order`.`RIDER_ID` AS `RIDER_ID`,`tb_users`.`MOBILE` AS `MOBILE`,`tb_users`.`SURNAME` AS `SURNAME`,`tb_users`.`OTHER_NAMES` AS `OTHER_NAMES`,`customer_order`.`ORDER_DATE` AS `ORDER_DATE`,`customer_order`.`ORDER_STATUS` AS `ORDER_STATUS`,`payment`.`PAYMENT_AMOUNT` AS `PAYMENT_AMOUNT`,`payment`.`PAYMENT_NUMBER` AS `PAYMENT_NUMBER`,`customer_order`.`NOTES` AS `NOTES`,`customer_address`.`ADDRESS_ID` AS `ADDRESS_ID`,`customer_order`.`PAYMENT_METHOD` AS `PAYMENT_METHOD`,`customer_order`.`CREATED_AT` AS `CREATED_AT`,`customer_order`.`UPDATED_AT` AS `UPDATED_AT`,`payment`.`PAYMENT_DATE` AS `PAYMENT_DATE` from (((`customer_order` join `tb_users` on((`customer_order`.`USER_ID` = `tb_users`.`USER_ID`))) join `customer_address` on((`customer_order`.`ADDRESS_ID` = `customer_address`.`ADDRESS_ID`))) join `payment` on((`payment`.`ORDER_ID` = `customer_order`.`ORDER_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`CHEF_ID`),
  ADD KEY `Kitchen_ID` (`KITCHEN_ID`) USING BTREE;

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CITY_ID`),
  ADD KEY `Country_ID` (`COUNTRY_ID`) USING BTREE;

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`COUNRY_ID`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`ADDRESS_ID`),
  ADD KEY `customer_address_ibfk_1` (`USER_ID`) USING BTREE,
  ADD KEY `customer_address_ibfk_2` (`LOCATION_ID`) USING BTREE;

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `User_ID` (`USER_ID`) USING BTREE,
  ADD KEY `Location_ID` (`ADDRESS_ID`) USING BTREE,
  ADD KEY `customer_order_ibfk_3` (`RIDER_ID`) USING BTREE,
  ADD KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE,
  ADD KEY `ORDER_STATUS` (`ORDER_STATUS`) USING BTREE,
  ADD KEY `CHEF_ID` (`CHEF_ID`) USING BTREE;

--
-- Indexes for table `customer_order_item`
--
ALTER TABLE `customer_order_item`
  ADD PRIMARY KEY (`ORDER_ITEM_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`) USING BTREE,
  ADD KEY `order_item_ibfk_2` (`ITEM_TYPE_ID`) USING BTREE;

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`KITCHEN_ID`),
  ADD KEY `City_ID` (`CITY_ID`) USING BTREE;

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`MENU_CAT_ID`),
  ADD UNIQUE KEY `MENU_CAT_ID` (`MENU_CAT_ID`,`RANK`),
  ADD UNIQUE KEY `MENU_CAT_NAME` (`MENU_CAT_NAME`),
  ADD KEY `MENU_CAT_ID_2` (`MENU_CAT_ID`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`MENU_ITEM_ID`),
  ADD KEY `MENU_CAT_ID` (`MENU_CAT_ID`) USING BTREE;

--
-- Indexes for table `menu_item_type`
--
ALTER TABLE `menu_item_type`
  ADD PRIMARY KEY (`ITEM_TYPE_ID`),
  ADD KEY `MENU_ITEM_ID` (`MENU_ITEM_ID`) USING BTREE;

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`TRACKING_ID`),
  ADD UNIQUE KEY `ORDER_ID` (`ORDER_ID`,`STATUS`) USING BTREE,
  ADD KEY `STATUS` (`STATUS`) USING BTREE,
  ADD KEY `order_tracking_ibfk_1` (`ORDER_ID`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `payment_ibfk_1` (`PAYMENT_STATUS`) USING BTREE,
  ADD KEY `payment_ibfk_2` (`ORDER_ID`) USING BTREE;

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`RIDER_ID`),
  ADD KEY `KITCHEN_ID` (`KITCHEN_ID`) USING BTREE;

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`CART_ITEM_ID`),
  ADD KEY `order_item_ibfk_2` (`ITEM_TYPE_ID`) USING BTREE,
  ADD KEY `USER_ID` (`USER_ID`) USING BTREE;

--
-- Indexes for table `tb_favs`
--
ALTER TABLE `tb_favs`
  ADD PRIMARY KEY (`FAV_ID`),
  ADD KEY `MENU_ITEM_ID` (`MENU_ITEM_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `tb_migration`
--
ALTER TABLE `tb_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD UNIQUE KEY `STATUS_NAME` (`STATUS_NAME`) USING BTREE,
  ADD UNIQUE KEY `RANK` (`RANK`) USING BTREE;

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `LOCATION_ID_idx` (`LOCATION_ID`) USING BTREE,
  ADD KEY `USER_TYPE_idx` (`USER_TYPE`) USING BTREE;

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`USER_TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `CHEF_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CITY_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `COUNRY_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `ADDRESS_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `ORDER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;
--
-- AUTO_INCREMENT for table `customer_order_item`
--
ALTER TABLE `customer_order_item`
  MODIFY `ORDER_ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `KITCHEN_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `MENU_CAT_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `MENU_ITEM_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_item_type`
--
ALTER TABLE `menu_item_type`
  MODIFY `ITEM_TYPE_ID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `TRACKING_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `RIDER_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `CART_ITEM_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_favs`
--
ALTER TABLE `tb_favs`
  MODIFY `FAV_ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `USER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `USER_TYPE_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chef`
--
ALTER TABLE `chef`
  ADD CONSTRAINT `chef_ibfk_1` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `country` (`COUNRY_ID`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_address_ibfk_2` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `customer_address` (`ADDRESS_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`RIDER_ID`) REFERENCES `riders` (`RIDER_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_4` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_5` FOREIGN KEY (`ORDER_STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_6` FOREIGN KEY (`CHEF_ID`) REFERENCES `chef` (`CHEF_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `customer_order_item`
--
ALTER TABLE `customer_order_item`
  ADD CONSTRAINT `customer_order_item_ibfk_1` FOREIGN KEY (`ITEM_TYPE_ID`) REFERENCES `menu_item_type` (`ITEM_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_item_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD CONSTRAINT `kitchen_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`CITY_ID`);

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_ibfk_2` FOREIGN KEY (`MENU_CAT_ID`) REFERENCES `menu_category` (`MENU_CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_item_type`
--
ALTER TABLE `menu_item_type`
  ADD CONSTRAINT `menu_item_type_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD CONSTRAINT `order_tracking_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tracking_ibfk_2` FOREIGN KEY (`STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`PAYMENT_STATUS`) REFERENCES `tb_status` (`STATUS_NAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `customer_order` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riders`
--
ALTER TABLE `riders`
  ADD CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`KITCHEN_ID`) REFERENCES `kitchen` (`KITCHEN_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`ITEM_TYPE_ID`) REFERENCES `menu_item_type` (`ITEM_TYPE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_cart_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_favs`
--
ALTER TABLE `tb_favs`
  ADD CONSTRAINT `tb_favs_ibfk_1` FOREIGN KEY (`MENU_ITEM_ID`) REFERENCES `menu_item` (`MENU_ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_favs_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tb_users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `tb_users_ibfk_2` FOREIGN KEY (`USER_TYPE`) REFERENCES `user_type` (`USER_TYPE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
