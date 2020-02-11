-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 02:07 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogamedb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_cus_orders` (IN `id` VARCHAR(50))  BEGIN
SELECT * from cus_orders WHERE id= customerID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DISPLAY_ORDERS_TO_ADMIN` ()  BEGIN

SELECT * FROM products_sold;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PhoneNum` char(9) DEFAULT NULL,
  `CARD` bigint(11) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FName`, `LName`, `EMAIL`, `PhoneNum`, `CARD`, `PASSWORD`, `cvv`) VALUES
(3, 'ADMIN', 'DB', 'admin@example.com', '12345', 123456789, '21232f297a57a5a743894a0e4a801fc3', 563),
(4, 'dhanush', 'gc', 'dhanu@gmail.com', '94800', 453726, '202cb962ac59075b964b07152d234b70', 199),
(5, 'tejas', 'j', 'tejas@gmail.com', '99999', 365982562, '5ec829debe54b19a5f78d9a65b900a39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cus_orders`
--

CREATE TABLE `cus_orders` (
  `orderID` int(11) NOT NULL,
  `CustomerID` varchar(50) DEFAULT NULL,
  `DT` datetime DEFAULT NULL,
  `Game_Name` varchar(50) DEFAULT NULL,
  `price` varchar(10) NOT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_orders`
--

INSERT INTO `cus_orders` (`orderID`, `CustomerID`, `DT`, `Game_Name`, `price`, `DistributorID`) VALUES
(634580, 'dhanu@gmail.com', '2019-11-28 09:37:00', 'WrestlingWWE 2K20', '900', 1001),
(634581, 'tejas@gmail.com', '2019-11-28 14:05:39', 'SUNLESS SKIES', '2000', 1000);

--
-- Triggers `cus_orders`
--
DELIMITER $$
CREATE TRIGGER `insert_products_sold` AFTER INSERT ON `cus_orders` FOR EACH ROW INSERT INTO products_sold(orderID,customerID,Game_Name,DistributorID,price,DATE) VALUES(NEW.orderID,NEW.customerID,NEW.Game_Name,NEW.DistributorID,NEW.price,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `DistributorID` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `AccountNum` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`DistributorID`, `address`, `phoneNumber`, `AccountNum`) VALUES
(1000, '192 Red Harring Street South Pike PA, 16226', 5122, 5552134212),
(1001, '142 Oak Tree Avenue Truntum PA, 14212', 5123, 5553264321);

-- --------------------------------------------------------

--
-- Table structure for table `fps`
--

CREATE TABLE `fps` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fps`
--

INSERT INTO `fps` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(300, 'fps1', 'Counter-Strike: Global Offensive', 'FPSIMG1.jpg', 'FREE', 1001),
(301, 'fps2', 'PUBG', 'FPSIMG2.jpg', '2000', 1000),
(302, 'fps3', 'Destiny 2', 'FPSIMG3.jpg', 'FREE', 1000),
(303, 'fps4', 'Call of Duty', 'FPSIMG4.jpg', '1432', 1001),
(304, 'fps6', 'DAYZ', 'FPSIMG6.jpg', 'FREE', 1000),
(305, 'fps7', 'BIOSHOCK', 'FPSIMG7.jpg', 'FREE', 1001),
(306, 'fps8', 'Call of Juarez', 'FPSIMG8.jpg', '1098', 1000),
(307, 'fps5', 'Tom Clancy\'s Rainbow Six', 'FPSIMG5.jpg', '547', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `products_sold`
--

CREATE TABLE `products_sold` (
  `sl.no` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `Game_Name` varchar(50) NOT NULL,
  `DistributorID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_sold`
--

INSERT INTO `products_sold` (`sl.no`, `orderID`, `customerID`, `Game_Name`, `DistributorID`, `price`, `DATE`) VALUES
(3, 634580, 'dhanu@gmail.com', 'WrestlingWWE 2K20', 1001, 900, '2019-11-28 14:07:00'),
(4, 634581, 'tejas@gmail.com', 'SUNLESS SKIES', 1000, 2000, '2019-11-28 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `racing`
--

CREATE TABLE `racing` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racing`
--

INSERT INTO `racing` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(400, 'r1', 'Valentino Rossi', 'RACING1.jpg', 'FREE', 1000),
(401, 'r2', 'DiRT Rally 2.0', 'RACING2.jpg', 'FREE', 1001),
(402, 'r3', 'Grand Theft Auto V', 'RACING3.jpg', '2000', 1000),
(403, 'r4', 'Motorsport Manager', 'RACING4.jpg', 'FREE', 1001),
(404, 'r5', 'Urban Trial Freestyle', 'RACING5.jpg', '900', 1000),
(405, 'r6', 'Road Redemption', 'RACING6.jpg', '1500', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `rpg`
--

CREATE TABLE `rpg` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpg`
--

INSERT INTO `rpg` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(100, 'rpg2', 'A Year Of Rain', 'RPGIMG2.jpg', 'FREE', 1000),
(101, 'rpg3', 'MAD MAX', 'RPGIMG3.jpg', 'FREE', 1001),
(102, 'rpg4', 'Shadow of Mordor', 'RPGIMG4.jpg', '1432', 1001),
(103, 'rpg5', 'SUNLESS SKIES', 'RPGIMG5.jpg', '2000', 1000),
(105, 'rpg6', 'Hand of Fate 2', 'RPGIMG6.jpg', '50', 1001),
(106, 'rpg7', 'The Witcher® 3', 'RPGIMG7.jpg', '1500', 1000),
(107, 'rpg8', 'Gauntlet', 'RPGIMG8.jpg', '1098', 1001),
(108, 'rpg1', 'King\'s League II', 'RPGIMG2.jpg', 'FREE', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(500, 's1', 'PES 2019', 'SPORTSIMG1.jpg', '1432', 1000),
(501, 's2', 'Cricket', 'SPORTSIMG2.jpg', 'FREE', 1000),
(502, 's3', 'Tennis', 'SPORTSIMG3.jpg', 'FREE', 1001),
(503, 's4', 'Hockey', 'SPORTSIMG4.jpg', '563', 1001),
(504, 's5', 'Baseball', 'SPORTSIMG5.jpg', '350', 1001),
(505, 's6', 'Street Basketball', 'SPORTSIMG6.jpg', 'FREE', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `vr`
--

CREATE TABLE `vr` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vr`
--

INSERT INTO `vr` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(203, 'vr1', 'Pistol Whip', 'VRIMG1.jpg', 'FREE', 1000),
(204, 'vr2', 'Stratoscape', 'VRIMG2.jpg', 'FREE', 1000),
(205, 'vr3', 'BRITANNIA VR: OUT OF YOUR MIND', 'VRIMG3.jpg', 'FREE', 1001),
(206, 'vr4', 'Into the Radius', 'VRIMG4.jpg', 'FREE', 1001),
(207, 'vr5', 'Galactic Rangers', 'VRIMG5.jpg', 'FREE', 1000),
(208, 'vr6', 'Final Mission VR', 'VRIMG6.jpg', 'FREE', 1001),
(209, 'vr7', 'Root Beer On', 'VRIMG7.jpg', '563', 1000),
(210, 'vr8', 'Viro Move', 'VRIMG8.jpg', '1753', 1001),
(211, 'vr9', 'Arabian Stones - The VR Sudoku Game', 'VRIMG9.jpg', '1500', 1001),
(212, 'vr10', 'Super Realistic Autocross', 'VRIMG10.jpg', '900', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `wrestling`
--

CREATE TABLE `wrestling` (
  `g_id` int(11) NOT NULL,
  `g_code` varchar(50) DEFAULT NULL,
  `g_name` varchar(50) DEFAULT NULL,
  `g_img` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `DistributorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wrestling`
--

INSERT INTO `wrestling` (`g_id`, `g_code`, `g_name`, `g_img`, `price`, `DistributorID`) VALUES
(603, 'w2', 'WrestlingWWE 2K20', 'WWEIMG2.jpg', '900', 1001),
(604, 'W1', 'Wrestling World', 'WWEIMG1.jpg', 'FREE', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `cus_orders`
--
ALTER TABLE `cus_orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`DistributorID`);

--
-- Indexes for table `fps`
--
ALTER TABLE `fps`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `products_sold`
--
ALTER TABLE `products_sold`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `racing`
--
ALTER TABLE `racing`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD UNIQUE KEY `g_code_2` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `rpg`
--
ALTER TABLE `rpg`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `vr`
--
ALTER TABLE `vr`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- Indexes for table `wrestling`
--
ALTER TABLE `wrestling`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_code` (`g_code`),
  ADD KEY `DistributorID` (`DistributorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cus_orders`
--
ALTER TABLE `cus_orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=634582;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `DistributorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `fps`
--
ALTER TABLE `fps`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `products_sold`
--
ALTER TABLE `products_sold`
  MODIFY `sl.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `racing`
--
ALTER TABLE `racing`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `rpg`
--
ALTER TABLE `rpg`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `vr`
--
ALTER TABLE `vr`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `wrestling`
--
ALTER TABLE `wrestling`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cus_orders`
--
ALTER TABLE `cus_orders`
  ADD CONSTRAINT `cus_orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`EMAIL`),
  ADD CONSTRAINT `cus_orders_ibfk_2` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `fps`
--
ALTER TABLE `fps`
  ADD CONSTRAINT `fps_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `racing`
--
ALTER TABLE `racing`
  ADD CONSTRAINT `racing_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `rpg`
--
ALTER TABLE `rpg`
  ADD CONSTRAINT `rpg_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `vr`
--
ALTER TABLE `vr`
  ADD CONSTRAINT `vr_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);

--
-- Constraints for table `wrestling`
--
ALTER TABLE `wrestling`
  ADD CONSTRAINT `wrestling_ibfk_1` FOREIGN KEY (`DistributorID`) REFERENCES `distributor` (`DistributorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
