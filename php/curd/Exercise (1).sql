-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2021 at 10:46 AM
-- Server version: 5.7.35
-- PHP Version: 7.2.24-0ubuntu0.18.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `make` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `make`) VALUES
(13, 'toyota', '2010'),
(14, 'maruti', '2019'),
(15, 'bmw', '2020'),
(16, 'xdg', '2021'),
(17, 'xdg', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_name` varchar(20) NOT NULL,
  `c_email` varchar(20) NOT NULL,
  `c_desc` varchar(20) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_name`, `c_email`, `c_desc`, `feedback`) VALUES
('gb', 'gghb@gmail.com', 'dxf', 'website'),
('dg', 'ka@gmail.com', 'fdgh', 'website'),
('sadc', 'gh@gmail.com', 'ds', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `designation`, `date`, `created_at`, `status`) VALUES
(1, 'Doe', 'developer', NULL, '2021-10-06 07:39:18', 'active'),
(2, 'Moe', 'designer', NULL, '2021-10-06 07:39:18', 'active'),
(3, 'Dolly', 'seo', NULL, '2021-10-06 07:39:18', 'active'),
(4, 'maya', ' designer', '2021-10-20 13:19:20', '2021-10-06 07:50:13', 'active'),
(6, 'fsndonq', 'dgjbng', NULL, '2021-10-07 07:52:42', 'active'),
(7, 'fsndonq', 'dgjbng', NULL, '2021-10-07 07:52:42', 'active'),
(8, 'fsndonq', 'dgjbng', NULL, '2021-10-07 07:52:43', 'active'),
(9, 'fsndonq', 'dgjbng', NULL, '2021-10-07 07:52:43', 'active'),
(10, 'fsndonq', 'dgjbng', NULL, '2021-10-07 07:52:43', 'active'),
(11, 'maya', 'Html', NULL, '2021-10-07 07:56:48', 'active'),
(12, '', '', NULL, '2021-10-11 06:16:24', 'active'),
(13, '', '', NULL, '2021-10-11 06:46:06', 'active'),
(14, '', '', NULL, '2021-10-11 06:46:24', 'active'),
(15, 'test', 'test', NULL, '2021-10-11 06:46:34', 'active'),
(16, 'yyyy', 'yyyy', NULL, '2021-10-11 07:01:09', 'active'),
(17, 'kk', 'kk', NULL, '2021-10-11 07:01:19', 'active'),
(18, 'kk', 'kk', NULL, '2021-10-11 07:02:09', 'active'),
(19, 'mmm', 'mmm', NULL, '2021-10-11 07:02:26', 'active'),
(20, 'mmm', 'mmm', NULL, '2021-10-11 07:02:27', 'active'),
(21, '', '', NULL, '2021-10-11 07:03:29', 'active'),
(22, '', '', NULL, '2021-10-11 07:03:47', 'active'),
(23, 'mmm', 'mmm', NULL, '2021-10-11 07:03:53', 'active'),
(24, '', '', NULL, '2021-10-11 07:25:28', 'active'),
(25, '', '', NULL, '2021-10-11 07:25:31', 'active'),
(26, 'szfs', 'zsdc', NULL, '2021-10-11 07:25:39', 'active'),
(27, 'szfs', 'zsdc', NULL, '2021-10-11 07:34:58', 'active'),
(28, '', '', NULL, '2021-10-11 07:36:45', 'active'),
(29, '', '', NULL, '2021-10-11 07:36:55', 'active'),
(30, '', '', NULL, '2021-10-11 07:52:10', 'active'),
(31, '', '', NULL, '2021-10-11 07:52:49', 'active'),
(32, '', '', NULL, '2021-10-12 11:12:50', 'active'),
(33, '', '', NULL, '2021-10-12 11:47:22', 'active'),
(34, '', '', NULL, '2021-10-13 04:46:52', 'active'),
(35, '', '', NULL, '2021-10-13 09:40:59', 'active'),
(36, '', '', NULL, '2021-10-13 11:42:19', 'active'),
(37, '', '', NULL, '2021-10-18 06:02:52', 'active'),
(38, '', '', NULL, '2021-10-18 07:58:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE `customer_reg` (
  `c_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpwd` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`c_id`, `fname`, `lname`, `mobile`, `password`, `email`, `cpwd`, `city`, `state`, `country`, `pic`) VALUES
(1, 'qaed', 'aSD', '9876543216', ' 123654', 'rahil@tathyainfotech.com', 'admin123', 'sdfv', 'zxc', 'zc', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `phone`) VALUES
(1, 'hhhhhhhhh', '567382389292'),
(2, 'hhhhhhhhh', '567382389292'),
(3, 'dsg', 'sdc');

-- --------------------------------------------------------

--
-- Table structure for table `dragdrop`
--

CREATE TABLE `dragdrop` (
  `id` int(11) NOT NULL,
  `vObject` varchar(255) NOT NULL,
  `tText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dragdrop`
--

INSERT INTO `dragdrop` (`id`, `vObject`, `tText`) VALUES
(4, 'div5', '\"drag8#image::http://localhost/pc-4/Drag/Images/8-Number-PNG.png\";'),
(5, 'div2', '\"drag2#image::http://localhost/pc-4/Drag/Images/2-Number-PNG.png\";'),
(6, 'div3', '\"drag5#image::http://localhost/pc-4/Drag/Images/5-Number-PNG.png\";'),
(7, 'div8', '\"drag3#image::http://localhost/pc-4/Drag/Images/3-Number-PNG.png\";');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(20) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `emp_email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `emp_gender` varchar(20) NOT NULL,
  `emp_reg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(20) NOT NULL,
  `f_list` int(20) NOT NULL,
  `f_comment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(20) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`) VALUES
(1, 'djij.png'),
(2, 'sdfc.jpg'),
(3, 'rootshome.jpg'),
(4, 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(12, 'kajal', 'rahil@tathyainfotech.com', '5647839210', 'sdfvdf', 'cod', 'Zenfone Max Pro(1), LG v30(1), Samsung A50(1), Nokia 7 Plus(1)', '130000'),
(13, 'kajal', 'rahil@tathyainfotech.com', '4563278198', 'sdff', 'netbanking', 'dfv(1)', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(25) NOT NULL,
  `poll_title` varchar(25) NOT NULL,
  `poll_op` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_1`
--

CREATE TABLE `poll_1` (
  `poll_id` int(20) NOT NULL,
  `poll_title` varchar(20) NOT NULL,
  `poll_op` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_1`
--

INSERT INTO `poll_1` (`poll_id`, `poll_title`, `poll_op`) VALUES
(1, '', ''),
(2, 'enter ypor ans', 'vidhi'),
(3, 'enter ypor ans', 'vidhi'),
(4, 'enter ypor ans', 'rahil'),
(5, 'enter ypor ans', 'dhruv'),
(6, '', ''),
(7, 'enter ypor ans', 'rahil'),
(8, 'enter ypor ans', 'vidhi');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(20) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `product_price` int(200) NOT NULL,
  `p_desc` varchar(50) NOT NULL,
  `p_img` varchar(255) DEFAULT NULL,
  `p_status` varchar(20) DEFAULT NULL,
  `pro_cat_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `product_price`, `p_desc`, `p_img`, `p_status`, `pro_cat_id`) VALUES
(201, 'dcgv', 22000, 'xgv', 'zenfone_m1.jpg', '1', 27),
(202, 'car', 50000, 'xdgv', 'samsung_a50.jpg', '2', 33),
(203, 'bike', 18000, 'xzcv', 'lg_v30.jpg', '1', 37),
(204, 'ipad', 25000, 'zxdfv', 'samsung_a50.jpg', '1', 33),
(205, 'dg', 20000, 'zxdfv', 'one_plus_6.jpg', '2', 30),
(206, 'xdv', 1000, 'xc', 'one_plus_6.jpg', '2', 30),
(207, 'dfv', 12000, 'zscf', 'nokia_7_plus.jpg', '2', 30),
(208, 'sdf111', 8000, 'dfc', 'iphone_x.jpg', '2', 33),
(209, 'dsfv', 6000, 'scc', 'zenfone_m1.jpg', '1', 37),
(210, 'sdf', 6000, 'zscf', 'zenfone_m1.jpg', '1', 37),
(211, 'sdfc', 9000, 'sfc', 'nokia_7_plus.jpg', '2', 37),
(212, 'sfc', 8000, 'sadc', 'nokia_7_plus.jpg', '2', 27),
(213, 'kkkk', 10000, 'zcf', 'iphone_x.jpg', '1', 33);

-- --------------------------------------------------------

--
-- Table structure for table `pro_cat`
--

CREATE TABLE `pro_cat` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `parent_cat_id` varchar(20) NOT NULL,
  `c_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_cat`
--

INSERT INTO `pro_cat` (`c_id`, `c_name`, `parent_cat_id`, `c_status`) VALUES
(1, 'car', '27', '1'),
(24, 'Mobile', '24', '1'),
(27, 'IOS', '30', '1'),
(30, 'Macromax', '37', '1'),
(33, 'iPad', '27', '1'),
(34, 'Projector Mini Phone', '30', '1'),
(37, 'Samsung2', '24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reg`
--
ALTER TABLE `customer_reg`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dragdrop`
--
ALTER TABLE `dragdrop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_1`
--
ALTER TABLE `poll_1`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `pro_cat_id` (`pro_cat_id`);

--
-- Indexes for table `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_reg`
--
ALTER TABLE `customer_reg`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dragdrop`
--
ALTER TABLE `dragdrop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `poll_1`
--
ALTER TABLE `poll_1`
  MODIFY `poll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `pro_cat`
--
ALTER TABLE `pro_cat`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pro_cat_id`) REFERENCES `pro_cat` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
