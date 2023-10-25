-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 08:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahnfashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'adm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `fname`, `lname`, `email`, `password`, `image`, `type`) VALUES
(1, 'Lahiru', 'Danushka', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'adm');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(11) NOT NULL,
  `brandname` varchar(45) DEFAULT NULL,
  `discription` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`idBrand`, `brandname`, `discription`) VALUES
(1, 'Nike', 'Nike is USA brand'),
(2, 'Puma', 'T Shirt is main'),
(3, 'Tiger', 'Tiger'),
(4, 'Polo', 'Denim'),
(5, 'Lacoste', 'croc'),
(6, 'Reborn', 'Local Brand'),
(7, 'Emerald', 'Local premium');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'cus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `fname`, `lname`, `email`, `password`, `contact`, `address`, `type`) VALUES
(1, 'Lahiru', 'Danushka', 'user@user.user', 'ee11cbb19052e40b07aac0ca060c23ee', '', '', 'cus'),
(5, 'Kasun', 'Weerasekara', 'test@test.test', '098f6bcd4621d373cade4e832627b4f6', '', '', 'cus'),
(6, 'Sandun', 'Silva', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '', '', 'cus'),
(7, 'Asd', 'dddd', 'a@a.com', '0cc175b9c0f1b6a831c399e269772661', 'sssss', 'aaaaaa', 'cus');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imgid` int(11) NOT NULL,
  `path` varchar(950) DEFAULT NULL,
  `Product_idProduct` int(11) NOT NULL,
  `Product_Brand_idBrand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imgid`, `path`, `Product_idProduct`, `Product_Brand_idBrand`) VALUES
(1, 'm1 - Copy (2).jpg', 1, 4),
(2, 'm1 - Copy (3).jpg', 1, 4),
(3, 'm1 - Copy.jpg', 1, 4),
(4, 'm1.jpg', 1, 4),
(5, 'm2 - Copy (2).jpg', 2, 3),
(6, 'm2 - Copy (3).jpg', 2, 3),
(7, 'm2 - Copy.jpg', 2, 3),
(8, 'm2.jpg', 2, 3),
(9, 'm3 - Copy (2).jpg', 3, 4),
(10, 'm3 - Copy (3).jpg', 3, 4),
(11, 'm3 - Copy.jpg', 3, 4),
(12, 'm3.jpg', 3, 4),
(13, 'm4 - Copy (2).jpg', 4, 7),
(14, 'm4 - Copy (3).jpg', 4, 7),
(15, 'm4 - Copy.jpg', 4, 7),
(16, 'm4.jpg', 4, 7),
(17, 'm5 - Copy (2).jpg', 5, 5),
(18, 'm5 - Copy (3).jpg', 5, 5),
(19, 'm5 - Copy.jpg', 5, 5),
(20, 'm5.jpg', 5, 5),
(21, 'm6 - Copy (2).jpg', 6, 7),
(22, 'm6 - Copy (3).jpg', 6, 7),
(23, 'm6 - Copy.jpg', 6, 7),
(24, 'm6.jpg', 6, 7),
(25, 'w1 - Copy (2).jpg', 7, 2),
(26, 'w1 - Copy (3).jpg', 7, 2),
(27, 'w1 - Copy.jpg', 7, 2),
(28, 'w1.jpg', 7, 2),
(29, 'w2 - Copy (2).jpg', 8, 6),
(30, 'w2 - Copy (3).jpg', 8, 6),
(31, 'w2 - Copy.jpg', 8, 6),
(32, 'w2.jpg', 8, 6),
(33, 'w3 - Copy (2).jpg', 9, 1),
(34, 'w3 - Copy (3).jpg', 9, 1),
(35, 'w3 - Copy.jpg', 9, 1),
(36, 'w3.jpg', 9, 1),
(37, 'w4 - Copy (2).jpg', 10, 2),
(38, 'w4 - Copy (3).jpg', 10, 2),
(39, 'w4 - Copy.jpg', 10, 2),
(40, 'w4.jpg', 10, 2),
(41, 'w5 - Copy (2).jpg', 11, 3),
(42, 'w5 - Copy (3).jpg', 11, 3),
(43, 'w5 - Copy.jpg', 11, 3),
(44, 'w5.jpg', 11, 3),
(45, 'w6 - Copy (2).jpg', 12, 5),
(46, 'w6 - Copy (3).jpg', 12, 5),
(47, 'w6 - Copy.jpg', 12, 5),
(48, 'w6.jpg', 12, 5),
(49, 'k1 - Copy (2).jpg', 13, 1),
(50, 'k1 - Copy (3).jpg', 13, 1),
(51, 'k1 - Copy.jpg', 13, 1),
(52, 'k1.jpg', 13, 1),
(53, 'k2 - Copy (2).jpg', 14, 3),
(54, 'k2 - Copy (3).jpg', 14, 3),
(55, 'k2 - Copy.jpg', 14, 3),
(56, 'k2.jpg', 14, 3),
(57, 'k3 - Copy (2).jpg', 15, 1),
(58, 'k3 - Copy (3).jpg', 15, 1),
(59, 'k3 - Copy.jpg', 15, 1),
(60, 'k3.jpg', 15, 1),
(61, 'k4 - Copy (2).jpg', 16, 5),
(62, 'k4 - Copy (3).jpg', 16, 5),
(63, 'k4 - Copy.jpg', 16, 5),
(64, 'k4.jpg', 16, 5),
(65, 'k5 - Copy (2).jpg', 17, 2),
(66, 'k5 - Copy (3).jpg', 17, 2),
(67, 'k5 - Copy.jpg', 17, 2),
(68, 'k5.jpg', 17, 2),
(69, 'k6 - Copy (2).jpg', 18, 1),
(70, 'k6 - Copy (3).jpg', 18, 1),
(71, 'k6 - Copy.jpg', 18, 1),
(72, 'k6.jpg', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `name`, `email`, `msg`, `date`, `status`) VALUES
(3, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:32:18', 3),
(4, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:33:20', 3),
(5, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:33:24', 2),
(6, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:34:22', 0),
(7, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:35:07', 2),
(8, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:35:28', 0),
(9, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:37:49', 0),
(10, 'Kasun Shanaka', 'kasun@gmail.com', 'Hello', '2020-03-20 22:38:31', 0),
(11, 'AAA', 'admin@admin.admin', 'AAA', '2020-03-22 10:20:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` varchar(100) NOT NULL,
  `deladdress` varchar(500) NOT NULL,
  `deladdress2` varchar(250) NOT NULL,
  `town` varchar(100) NOT NULL,
  `zip` int(25) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'In Progress',
  `odate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `deladdress`, `deladdress2`, `town`, `zip`, `contact`, `payment`, `cid`, `status`, `odate`) VALUES
('OD1908TX13401520200524', 'asasd', 'asdad', 'asdad', 2131312, '13241234124', 'Cash On Delivery', 1, 'In Progress', '2020-05-24 11:40:15'),
('OD3673TX18460520200320', 'Negombo Road, Ja-Ela', '', '', 0, '0789985468', 'BT', 1, 'In Progress', '2020-03-20 17:46:05'),
('OD4085TX05240920200322', 'asdasd', 'asd', 'asdasd', 346346, 'sadas', 'Bank Transfer', 1, 'In Progress', '2020-03-22 04:24:09'),
('OD4817TX12333820200320', 'Colombo Road, Kandy', '', '', 0, '0778787878', 'COD', 1, 'Completed', '2020-03-20 16:11:46'),
('OD5014TX08240120200320', 'Ampaa', '', '', 0, '57478646464', 'COD', 1, 'Shipped', '2020-03-20 11:19:20'),
('OD5389TX07053920200320', 'Galle Road,Mount Lavinia', '', '', 0, '454745745754', 'COD', 1, 'Shipped', '2020-03-20 08:09:07'),
('OD5539TX13003920200320', 'Kandy Road, Yakkala', '', '', 0, '213123123', 'BT', 1, 'Cancelled', '2020-03-20 12:01:22'),
('OD5895TX12473220200320', 'Ampaa', '', '', 0, '123123', 'BT', 1, 'Completed', '2020-03-20 16:09:41'),
('OD6567TX12475720200320', 'Colombo Road Peradeniya', '', '', 0, '21313', 'COD', 1, 'Cancelled', '2020-03-20 16:09:21'),
('OD7706TX07043620200320', 'Kandy Road, Yakkala', '', '', 0, '2323232323', 'COD', 1, 'Completed', '2020-03-22 04:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `Brand_idBrand` int(11) NOT NULL,
  `ava` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `title`, `category`, `color`, `description`, `price`, `size`, `Brand_idBrand`, `ava`) VALUES
(1, 'Mens Two Tone Casual Shirt ', 'Gents', 'Blue', '<p>Premium Quality Mens Shirt For Casual Use</p>\r\n\r\n<ul>\r\n	<li><strong><small>90% Pure Cotton</small></strong></li>\r\n	<li><strong><small>High Quality</small></strong></li>\r\n	<li><strong><small>Long Lasting</small></strong></li>\r\n	<li><strong><small>Imported</small></strong></li>\r\n</ul>', '1985.00', '', 4, 0),
(2, 'Gents Casual Check Casual Shirt', 'Gents', 'White', '<p>High Quality Casual Shirt</p>\r\n\r\n<ul>\r\n	<li>Premium Look</li>\r\n	<li>100% Cotton</li>\r\n	<li>Long Lasting</li>\r\n</ul>', '2100.00', '', 3, 0),
(3, 'Mens Polo Cotton T Shirt', 'Gents', 'Brown', '<p>Polo Genuine T Shirts</p>\r\n\r\n<ul>\r\n	<li>100% Pure Cotton</li>\r\n	<li>Light Weight</li>\r\n	<li>Long Lasting</li>\r\n</ul>', '1700.00', '', 4, 0),
(4, 'Gents Party Shirt ', 'Gents', 'Blue', '<p>Emeral Premium Quality Shirts</p>\r\n\r\n<ul>\r\n	<li>Party Wear</li>\r\n	<li>Light Weight</li>\r\n</ul>', '2800.00', '', 7, 0),
(5, 'Gents Casual and Smart Casual Cofee Shirt', 'Gents', 'Brown', '<p>Lacoste Genuine Shirt</p>\r\n\r\n<ul>\r\n	<li>Pure Cotton</li>\r\n	<li>Long Lasting</li>\r\n</ul>', '2100.00', '', 5, 0),
(6, 'Emerald Basic Casual Shirt', 'Gents', 'Pink', '<p>Emerald Basic Shirt</p>\r\n\r\n<ul>\r\n	<li>Good Qualityrrrrr</li>\r\n</ul>', '1000.00', '', 7, 1),
(7, 'Designer Party Frock', 'Ladies', 'Black', '<p>Designer Quality Party Frock</p>\r\n\r\n<ul>\r\n	<li>Suitable For Night Functions</li>\r\n	<li>Light Weight</li>\r\n</ul>', '3400.00', '', 2, 1),
(8, 'Premium Pink Top', 'Ladies', 'Pink', '<p>Premium Quality Top</p>\r\n\r\n<ul>\r\n	<li>Office Wear</li>\r\n</ul>', '1800.00', '', 6, 1),
(9, 'Ladies Winter Top', 'Ladies', 'Pink', '<p>Ladies High Quality Sweater</p>\r\n\r\n<ul>\r\n	<li>Winter Wear</li>\r\n</ul>', '2300.00', '', 1, 1),
(10, 'Ladies Workout Gym Bottom', 'Ladies', 'Purple', '<p>Genuine Puma Sport Wear</p>\r\n\r\n<ul>\r\n	<li>Hight Quality</li>\r\n	<li>International Standard</li>\r\n	<li>Free Size</li>\r\n</ul>', '2990.00', '', 2, 1),
(11, 'Ladies Printed Top', 'Ladies', 'Blue', '<p>Ladies Office Wear</p>\r\n\r\n<ul>\r\n	<li>Premium Quality</li>\r\n	<li>Light Weight</li>\r\n</ul>', '1550.00', '', 3, 1),
(12, 'Ladies Printed Casual Frock', 'Ladies', 'Red', '<p>Ladies Printed Frock</p>\r\n\r\n<ul>\r\n	<li>High Qality</li>\r\n	<li>Premium Look</li>\r\n	<li>Long Lasting</li>\r\n</ul>', '2200.00', '', 5, 1),
(13, 'Little Baby Boy Tuxedo Suit', 'Kids', 'Black', '<p>Baby Boy Tuxedo</p>\r\n\r\n<ul>\r\n	<li>Premium Look</li>\r\n	<li>High Quality Materials</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '6600.00', '', 1, 1),
(14, 'Baby Girl Princess Frock', 'Kids', 'Red', '<p>Party Frock For Baby Girls</p>\r\n\r\n<ul>\r\n	<li>Light Weight</li>\r\n</ul>', '1560.00', '', 3, 1),
(15, 'Kids Boy Italian Tuxedo', 'Kids', 'Grey', '<p>Genuine Italian Product</p>\r\n\r\n<ul>\r\n	<li>High Quality</li>\r\n	<li>Premium Material</li>\r\n</ul>', '2980.00', '', 1, 1),
(16, 'Kids Princess Gown', 'Kids', 'White', '<p>Kids Gown</p>\r\n\r\n<ul>\r\n	<li>High Quality</li>\r\n	<li>Imported Product</li>\r\n</ul>', '1800.00', '', 5, 1),
(17, 'Little Boy Casual Kit Blue', 'Kids', 'Blue', '<p>Little Boy Casul Kit</p>\r\n\r\n<ul>\r\n	<li>High Quality</li>\r\n</ul>', '3250.00', '', 2, 1),
(18, 'Baby Boy Denim Jacket', 'Kids', 'Blue', '<p>Baby Boy Denim Jacket</p>\r\n\r\n<ul>\r\n	<li>High Quality Denim Material</li>\r\n	<li>Long Lasting</li>\r\n</ul>', '1250.00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `cartid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`cartid`, `orderid`, `productid`, `qty`, `amount`, `size`) VALUES
(17, 'OD7706TX07043620200320', 1, 1, '1985', 'lg'),
(18, 'OD5389TX07053920200320', 1, 2, '3970', 'md'),
(19, 'OD5014TX08240120200320', 8, 1, '1800', 'md'),
(20, 'OD5014TX08240120200320', 7, 2, '6800', 'md'),
(21, 'OD4817TX12333820200320', 1, 1, '1985', 'lg'),
(22, 'OD4817TX12333820200320', 1, 2, '3970', 'md'),
(23, 'OD5895TX12473220200320', 2, 1, '2100', 'lg'),
(24, 'OD6567TX12475720200320', 1, 1, '1985', 'md'),
(25, 'OD5539TX13003920200320', 9, 1, '2300', 'md'),
(26, 'OD3673TX18460520200320', 7, 1, '3400', 'md'),
(27, 'OD4085TX05240920200322', 1, 1, '1985', 'md'),
(28, 'OD1908TX13401520200524', 7, 1, '3400', 'md');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imgid`,`Product_idProduct`,`Product_Brand_idBrand`),
  ADD KEY `fk_Image_Product1_idx` (`Product_idProduct`,`Product_Brand_idBrand`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`,`Brand_idBrand`),
  ADD KEY `fk_Product_Brand_idx` (`Brand_idBrand`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`cartid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Product1` FOREIGN KEY (`Product_idProduct`,`Product_Brand_idBrand`) REFERENCES `product` (`idProduct`, `Brand_idBrand`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Brand` FOREIGN KEY (`Brand_idBrand`) REFERENCES `brand` (`idBrand`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
