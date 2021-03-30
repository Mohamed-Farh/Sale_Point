-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql5039.site4now.net
-- Generation Time: Mar 28, 2021 at 10:48 AM
-- Server version: 5.6.26-log
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a6ffb8_tasouq`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertising`
--

CREATE TABLE `advertising` (
  `AdvertisingNo` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `Details` varchar(1000) NOT NULL,
  `url` varchar(900) NOT NULL,
  `Enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`AdvertisingNo`, `title`, `Details`, `url`, `Enddate`) VALUES
(1, '', '', 'http://www.ta-souq.com', '2021-12-16'),
(2, '', '', 'http://www.ta-souq.com', '2021-09-23'),
(3, '', '', '', '2032-04-29'),
(4, '', '', '', '2031-03-12'),
(5, '', '', '', '2031-03-01'),
(6, '', '', '', '2031-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentNo` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `NameAr` varchar(100) DEFAULT NULL,
  `details` varchar(550) NOT NULL,
  `detailsar` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentNo`, `Name`, `NameAr`, `details`, `detailsar`) VALUES
(1, 'Cleaning Tools', 'منظفات', 'cleaning tools', 'منظفات'),
(2, 'Baby supplies', 'لوازم بيبي', 'Baby supplies', 'لوازم اطفال'),
(3, 'Make-up supplies', 'ميك اب', 'Make-up supplies', 'لوازم ميكاب'),
(4, 'Home furnishings', 'مفروشات منزلية', 'Home furnishings', 'مفروشات منزلية'),
(5, 'Houseware', 'أدوات منزلية', 'Houseware', 'أدوات منزلية'),
(6, 'Toys', 'العاب أطفال', 'Toys', 'العاب أطفال'),
(7, 'Mobile accessories', 'إكسسورات موبايل', 'Mobile accessories', 'ملحقات الهاتف المحمول');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderNo` int(11) NOT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `eliveryPhone` varchar(11) DEFAULT NULL,
  `Empno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderNo`, `OrderDate`, `Total`, `Status`, `UserID`, `eliveryPhone`, `Empno`) VALUES
(1, '2021-02-11 00:00:00', 15570, 'Pending', 1, NULL, NULL),
(2, '2021-02-13 00:00:00', 1724, 'Pending', 1, NULL, NULL),
(3, '2021-02-13 00:00:00', 2426, 'Pending', 1, NULL, NULL),
(4, '2021-02-13 00:00:00', 830, 'Pending', 1, NULL, NULL),
(5, '2021-02-14 00:00:00', 1112, 'Pending', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertemp`
--

CREATE TABLE `ordertemp` (
  `no` int(11) NOT NULL,
  `itemno` int(11) NOT NULL,
  `itemname` varchar(500) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `Total` double NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductNo` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `NameAr` varchar(100) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `DetailsAr` varchar(255) NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Discount` float(3,2) DEFAULT NULL,
  `Country` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `DepartmentNo` int(11) NOT NULL,
  `Gift` bit(2) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `OrderNo` int(11) NOT NULL,
  `ProductNo` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`OrderNo`, `ProductNo`, `Qty`, `Price`, `Total`) VALUES
(1, 3, 1, '200.00', 200),
(1, 1, 1, '100.00', 100),
(1, 1, 1, '100.00', 100),
(1, 2, 8, '900.00', 7200),
(1, 2, 6, '900.00', 4752),
(1, 2, 2, '792.00', 1584),
(1, 2, 2, '792.00', 1584),
(2, 2, 2, '792.00', 1584),
(2, 1, 1, '90.00', 90),
(3, 2, 3, '792.00', 2376),
(4, 3, 3, '200.00', 600),
(4, 1, 2, '90.00', 180),
(5, 2, 1, '792.00', 792),
(5, 1, 3, '90.00', 270);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `bdate` date DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `phone`, `email`, `bdate`, `address`, `country`, `password`, `type`) VALUES
(1, 'Saber Ahmed Kotep', '01025354   ', 'hemdanko2020@gmail.com', '2021-02-01', '6 octobar', 'EG', '123', 'Sales'),
(3, 'Admin POPO UYUY', 'Admin', 'Admin', '2021-02-08', 'Admin', 'Eg', '125', 'Admin'),
(6, 'UYUYU POPO GFF', '0111111113', 'GG', '2005-02-11', 'alexandria', 'EG', '123', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `viewsales`
--

CREATE TABLE `viewsales` (
  `OrderNo` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `OrderTotal` double DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Price` decimal(7,2) DEFAULT NULL,
  `ProductTotal` double DEFAULT NULL,
  `eliveryPhone` varchar(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductNo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`AdvertisingNo`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentNo`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `OrderUserFK` (`UserID`);

--
-- Indexes for table `ordertemp`
--
ALTER TABLE `ordertemp`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductNo`),
  ADD KEY `ProdutDepartFK` (`DepartmentNo`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD KEY `ProductSalesFK` (`ProductNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertising`
--
ALTER TABLE `advertising`
  MODIFY `AdvertisingNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordertemp`
--
ALTER TABLE `ordertemp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `OrderUserFK` FOREIGN KEY (`UserID`) REFERENCES `users` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `ProdutDepartFK` FOREIGN KEY (`DepartmentNo`) REFERENCES `department` (`DepartmentNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
