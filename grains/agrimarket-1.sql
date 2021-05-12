-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 02:25 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

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

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(256) NOT NULL,
  `admin_email` varchar(256) NOT NULL,
  `admin_contact` varchar(64) NOT NULL,
  `admin_username` varchar(256) NOT NULL,
  `admin_password` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin@agrimarket.com', '9090909090', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(64) NOT NULL,
  `cate_name` varchar(256) NOT NULL,
  `cate_img` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_img`) VALUES
(19, 'wheat', 'uploadscat/wheat1.jpg'),
(21, 'bajra', 'uploadscat/bajara.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(12) NOT NULL,
  `cust_name` varchar(60) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_contact` varchar(250) NOT NULL,
  `cust_addr` varchar(250) NOT NULL,
  `cust_username` varchar(250) NOT NULL,
  `cust_password` varchar(250) NOT NULL,
  `reg_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_addr`, `cust_username`, `cust_password`, `reg_on`) VALUES
(5, 'rk', 'rk@13.gmil.com', '7038977239', 'pune', 'rk', 'rk', '2020-03-02 16:04:42'),
(3, 'gjg', 'rk@gmail.com', '67788908643', 'vvjgfhfu', 'test', 'test', '2020-02-28 19:49:35'),
(6, 'sheetal', 'rk@gmail.com', '5675765343', 'pune', 'mk', 'mk', '2020-03-03 12:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(64) NOT NULL,
  `cust_id` int(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_cost` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `cust_id` int(10) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_payment_method` varchar(11) COLLATE utf8_bin NOT NULL,
  `shipping_address` varchar(11) COLLATE utf8_bin NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(11) COLLATE utf8_bin NOT NULL,
  `order_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`cust_id`, `order_total`, `order_payment_method`, `shipping_address`, `order_date`, `order_status`, `order_id`) VALUES
(6, 56, 'cod', 'kkkkkk', '2020-03-03', 'In Progress', 1),
(3, 56, 'cod', 'pune', '2020-03-03', 'In Progress', 2),
(3, 56, 'cod', 'jkhg', '2020-03-03', 'In Progress', 3),
(3, 56, 'cod', 'nagpur', '2020-03-03', 'In Progress', 4),
(5, 101, 'cod', 'pune', '2020-03-04', 'In Progress', 5),
(5, 45, 'cod', 'mumbai', '2020-03-04', 'In Progress', 6),
(5, 78, 'cod', 'pune', '2020-03-04', 'In Progress', 7),
(5, 45, 'cod', 'pune', '2020-03-04', 'In Progress', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(64) NOT NULL,
  `prod_id` int(64) NOT NULL,
  `prod_quantity` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `prod_id`, `prod_quantity`) VALUES
(0, 15, 2),
(0, 15, 2),
(0, 15, 1),
(0, 15, 1),
(2, 15, 1),
(3, 15, 1),
(4, 15, 1),
(5, 15, 1),
(5, 16, 1),
(6, 16, 1),
(7, 14, 1),
(8, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `order_id` int(64) NOT NULL,
  `order_status` varchar(256) NOT NULL,
  `payment_status` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(256) NOT NULL,
  `prod_image` varchar(256) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` varchar(64) NOT NULL,
  `quantity` int(64) NOT NULL,
  `prod_stock` int(64) NOT NULL,
  `cate_id` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_image`, `prod_price`, `prod_desc`, `quantity`, `prod_stock`, `cate_id`) VALUES
(16, 'bajra', 'uploads/bajara.jpg', 45, 'nice', 0, 16, 21);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `prod_id` int(64) NOT NULL,
  `cust_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `cust_id_2` (`cust_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
