-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 11:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(20) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `bcharge` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `bcharge`, `status`) VALUES
(1, 'saiii', '800', 'active'),
(2, 'om', '900', 'active'),
(3, 'samarth', '1000', 'inactive'),
(4, 'vinod', '900', 'active'),
(5, 'rohit', '400', 'active'),
(6, 'Ratnesh', '400', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `sid` int(20) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `quantity` int(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`sid`, `sname`, `quantity`, `status`) VALUES
(1, 'abc', 1, 'inactive'),
(2, 'xyz', 2, 'inactive'),
(3, 'aa', 2, ''),
(4, 'aab', 2, ''),
(5, 'ee', 1, 'inactive'),
(6, 'fff', 1, 'inactive'),
(7, 'pp', 5, 'inactive'),
(8, 'GEL', 155, 'inactive'),
(9, 'Bharti', 1851, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `trading`
--

CREATE TABLE `trading` (
  `tid` int(20) NOT NULL,
  `cid` int(20) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `sid` int(20) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `buy_bcharge` int(50) NOT NULL,
  `buyqty` int(50) NOT NULL,
  `buyprice` int(50) NOT NULL,
  `buy_total` int(50) NOT NULL,
  `buy_date` bigint(20) NOT NULL,
  `sell_bcharge` int(50) NOT NULL,
  `sell_qty` int(20) NOT NULL,
  `sell_price` int(50) NOT NULL,
  `sell_total` int(50) NOT NULL,
  `sell_date` bigint(20) NOT NULL,
  `final_total` int(50) NOT NULL,
  `dealersell` varchar(50) NOT NULL DEFAULT '0',
  `dealerbuy` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL,
  `tempbuy` varchar(50) NOT NULL DEFAULT '0',
  `tempsell` varchar(50) NOT NULL DEFAULT '0',
  `complete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trading`
--

INSERT INTO `trading` (`tid`, `cid`, `cname`, `sid`, `sname`, `buy_bcharge`, `buyqty`, `buyprice`, `buy_total`, `buy_date`, `sell_bcharge`, `sell_qty`, `sell_price`, `sell_total`, `sell_date`, `final_total`, `dealersell`, `dealerbuy`, `status`, `tempbuy`, `tempsell`, `complete`) VALUES
(41, 5, 'rohit', 9, 'Bharti', 400, 1500, 600, 900000, 1628759291, 200, 1500, 610, 915000, 1628759678, 14400, '0', '0', 'active', '0', '0', 1),
(42, 5, 'rohit', 9, 'Bharti', 400, 351, 600, 210600, 1628759291, 100, 351, 610, 351, 1628759614, 3010, '0', '0', 'active', '0', '0', 1),
(43, 5, 'rohit', 9, 'Bharti', 700, 1500, 580, 870000, 1628761252, 400, 1500, 600, 900000, 1628759729, 28900, '0', '0', 'active', '0', '0', 1),
(44, 5, 'rohit', 9, 'Bharti', 100, 351, 590, 207090, 1628761159, 400, 351, 600, 351, 1628759729, 3010, '0', '0', 'active', '0', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `trading`
--
ALTER TABLE `trading`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trading`
--
ALTER TABLE `trading`
  MODIFY `tid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
