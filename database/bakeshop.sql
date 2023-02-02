-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 10:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `autocode`
--

CREATE TABLE `autocode` (
  `auto_id` int(11) NOT NULL,
  `start` int(11) NOT NULL DEFAULT 0,
  `end` int(11) NOT NULL DEFAULT 0,
  `increment` int(11) NOT NULL DEFAULT 0,
  `description` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autocode`
--

INSERT INTO `autocode` (`auto_id`, `start`, `end`, `increment`, `description`) VALUES
(1, 100, 32, 1, 'order_code'),
(2, 3102, 3, 1, 'trans_code');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'Cakes'),
(2, 'Bread'),
(13, 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `contact`, `address`, `date_created`) VALUES
(1, 'John Cenas', '093948388385', 'Sipalay City', '2021-10-30'),
(2, 'Henry', '093888483877', 'China sea', '2022-01-21'),
(5, 'Ryan Psy', '093848838843', 'Sipalay City', '2021-03-19'),
(6, 'Mark Daniel', '029938488288', 'Kabankalan City', '2022-04-20'),
(7, 'Anevie ', '093848483884', 'Binalbagan', '2021-02-06'),
(8, 'James Harden', '0993984833', 'Sipalay City', '2021-08-23'),
(9, 'Layla', '093848833443', 'Bago City', '2022-10-11'),
(10, 'Alex Dixon', '093848838483', 'Cebu City', '2022-10-11'),
(11, 'Mathew Wright', '09388388388', 'Himamaylan City', '2022-10-11'),
(12, 'Judy Ann Santos', '0394993948', 'Cavite', '2022-10-11'),
(13, 'Lebron James', '00993949838', 'USA', '2022-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `prod_id` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`cart_id`, `customer_id`, `prod_id`, `qty`, `status`) VALUES
(15, 1, 9, '5', '1'),
(16, 1, 3, '1', '1'),
(17, 2, 3, '2', '1'),
(18, 2, 1, '2', '1'),
(19, 2, 9, '4', '1'),
(20, 1, 2, '2', '1'),
(21, 2, 3, '1', '1'),
(26, 1, 2, '1', '1'),
(27, 2, 1, '2', '1'),
(28, 1, 1, '3', '1'),
(29, 1, 9, '1', '1'),
(30, 1, 9, '1', '1'),
(31, 2, 1, '1', '1'),
(32, 7, 1, '1', '1'),
(33, 7, 2, '1', '1'),
(34, 7, 3, '1', '1'),
(35, 7, 9, '3', '1'),
(36, 7, 9, '11', '1'),
(37, 8, 3, '1', '1'),
(38, 8, 9, '1', '1'),
(39, 2, 2, '2', '1'),
(40, 2, 3, '1', '1'),
(41, 2, 9, '1', '1'),
(42, 7, 3, '5', '1'),
(44, 1, 2, '1', '1'),
(45, 7, 3, '1', '1'),
(46, 7, 2, '2', '1'),
(47, 13, 3, '1', '1'),
(49, 2, 3, '1', '1'),
(50, 2, 1, '2', '1'),
(51, 13, 9, '3', '1'),
(52, 13, 2, '1', '1'),
(53, 1, 3, '1', '1'),
(54, 1, 2, '2', '1'),
(55, 7, 3, '1', '1'),
(56, 1, 2, '5', '1'),
(57, 12, 1, '10', '1'),
(58, 12, 3, '2', '1'),
(59, 9, 9, '5', '1'),
(60, 9, 1, '2', '1'),
(61, 9, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `order_code` varchar(50) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `order_total` varchar(50) NOT NULL DEFAULT '0',
  `cash` varchar(50) NOT NULL DEFAULT '0',
  `exchange` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_code`, `order_date`, `order_total`, `cash`, `exchange`, `status`) VALUES
(5, 1, '698', '2022-09-18 20:57:12', '1320', '1400', '80', '1'),
(6, 2, '68', '2022-09-18 21:59:07', '1300', '1300', '0', '1'),
(7, 1, '101', '2022-09-18 22:27:37', '120', '120', '0', '1'),
(8, 2, '102', '2022-09-18 22:33:29', '400', '500', '100', '1'),
(9, 7, '103', '2022-09-26 22:17:43', '2221', '2300', '79', '0'),
(10, 8, '107', '2022-10-10 14:37:35', '900', '1000', '100', '0'),
(11, 2, '109', '2022-10-10 20:46:18', '1140', '1150', '10', '0'),
(12, 7, '112', '2022-10-10 22:08:26', '6900', '7000', '100', '0'),
(14, 1, '115', '2022-10-11 09:31:28', '120', '120', '0', '1'),
(15, 7, '116', '2022-10-16 20:55:33', '740', '800', '60', '0'),
(16, 13, '118', '2022-10-16 21:15:53', '500', '500', '0', '0'),
(17, 2, '119', '2022-10-19 20:31:13', '1302', '1500', '198', '0'),
(18, 13, '121', '2022-10-19 20:31:58', '1320', '1500', '180', '0'),
(19, 1, '123', '2022-10-19 22:02:02', '740', '800', '60', '0'),
(20, 7, '125', '2022-10-19 22:21:47', '500', '500', '0', '0'),
(21, 1, '126', '2022-10-19 22:22:57', '600', '1000', '400', '0'),
(22, 12, '127', '2022-10-19 22:25:47', '5010', '5010', '0', '0'),
(23, 9, '129', '2022-10-19 22:27:04', '2802', '3000', '198', '0'),
(24, 9, '131', '2022-10-20 00:08:08', '401', '401', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `prod_id` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `prod_id`, `qty`) VALUES
(17, 5, 1, '3'),
(18, 5, 9, '1'),
(19, 6, 1, '2'),
(20, 6, 3, '1'),
(21, 7, 9, '1'),
(22, 8, 1, '1'),
(23, 9, 1, '1'),
(24, 9, 2, '1'),
(25, 9, 3, '1'),
(26, 9, 9, '3'),
(27, 10, 3, '1'),
(28, 10, 9, '1'),
(29, 11, 2, '2'),
(30, 11, 3, '1'),
(31, 11, 9, '1'),
(32, 12, 3, '5'),
(33, 12, 9, '11'),
(35, 14, 2, '1'),
(36, 15, 2, '2'),
(37, 15, 3, '1'),
(38, 16, 3, '1'),
(39, 17, 1, '2'),
(40, 17, 3, '1'),
(41, 18, 2, '1'),
(42, 18, 9, '3'),
(43, 19, 2, '2'),
(44, 19, 3, '1'),
(45, 20, 3, '1'),
(46, 21, 2, '5'),
(47, 22, 1, '10'),
(48, 22, 3, '2'),
(49, 23, 1, '2'),
(50, 23, 9, '5'),
(51, 24, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL DEFAULT '0',
  `prod_price` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  `prod_desc` varchar(50) NOT NULL DEFAULT '0',
  `cat_id` varchar(50) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `avatar`, `prod_desc`, `cat_id`, `status`) VALUES
(1, 'Red Ribbon Chocolates Cakes', '401', '1663601880_pp.jpg', 'N/A\r\n', '1', 1),
(2, 'American Special Loaf Bread', '120', '1663599000_Planet9_Wallpaper_5000x2813.jpg', 'N/A', '2', 1),
(3, 'Dark Chocolate Cakes', '500', '1663601580_Acer_Wallpaper_02_5000x2813.jpg', 'N/A', '1', 1),
(9, 'Dark Caramel Cakes', '400', '1663601520_Acer_Wallpaper_01_5000x2814.jpg', 'N/A', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `set_code` varchar(50) NOT NULL DEFAULT '0',
  `access` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `set_code`, `access`, `status`) VALUES
(1, 'eb0a191797624dd3a48fa681d3061212', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL DEFAULT '0',
  `lname` varchar(50) NOT NULL DEFAULT '0',
  `uname` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  `job` varchar(50) NOT NULL DEFAULT '0',
  `special_code` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `uname`, `password`, `type`, `avatar`, `job`, `special_code`) VALUES
(1, 'Ryan', 'Wong', 'admin@yahoo.com', '0192023a7bbd73250516f069df18b500', '1', '1664806140_pp.jpg', 'Admin', 'eb0a191797624dd3a48fa681d3061212'),
(4, 'Anevie', 'Dapugo', 'anevie@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2', '1664808360_wall.jpg', 'Staff', '0'),
(5, 'Adams', 'Patricio', 'adams@yahoo.com', '0192023a7bbd73250516f069df18b500', '2', '1664806980_received_516907356847842.jpeg', 'Staff', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autocode`
--
ALTER TABLE `autocode`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autocode`
--
ALTER TABLE `autocode`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
