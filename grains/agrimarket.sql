-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2019 at 11:19 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrimarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(256) NOT NULL,
  `admin_email` varchar(256) NOT NULL,
  `admin_contact` varchar(64) NOT NULL,
  `admin_username` varchar(256) NOT NULL,
  `admin_password` varchar(256) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin@agrimarket.com', '9090909090', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(64) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(256) NOT NULL,
  `cate_img` varchar(256) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(12) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(60) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_contact` varchar(250) NOT NULL,
  `cust_addr` varchar(250) NOT NULL,
  `cust_username` varchar(250) NOT NULL,
  `cust_password` varchar(250) NOT NULL,
  `reg_on` datetime NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_addr`, `cust_username`, `cust_password`, `reg_on`) VALUES
(1, 'dsfd', 'info@test.in', '646546', 'fsdfsdf', 'test', 'test', '2019-01-25 16:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(64) NOT NULL AUTO_INCREMENT,
  `cust_id` int(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_cost` varchar(250) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(64) NOT NULL,
  `prod_id` int(64) NOT NULL,
  `prod_quantity` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

DROP TABLE IF EXISTS `order_transaction`;
CREATE TABLE IF NOT EXISTS `order_transaction` (
  `order_id` int(64) NOT NULL,
  `order_status` varchar(256) NOT NULL,
  `payment_status` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(256) NOT NULL,
  `prod_image` varchar(256) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` varchar(64) NOT NULL,
  `prod_stock` int(64) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_image`, `prod_price`, `prod_desc`, `prod_stock`) VALUES
(11, 'bajra', '152.jpg', 997, 'jflfl', 56);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `prod_id` int(64) NOT NULL,
  `cust_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
