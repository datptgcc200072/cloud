-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 10:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_trannguyetcan`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` varchar(8) NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `catName`) VALUES
('C104', 'Baby Kid'),
('C105', 'Best Kid');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` varchar(100) NOT NULL,
  `OrderDate` date NOT NULL,
  `id` int(3) NOT NULL,
  `Total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `toyID` varchar(100) NOT NULL,
  `OrderID` varchar(100) NOT NULL,
  `Selling_Price` varchar(40) NOT NULL,
  `Quantity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(3) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `StoreID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email`, `fullname`, `gender`, `address`, `password`, `role`, `phone`, `birthday`, `StoreID`) VALUES
(1, 'abc@gmail.com', 'Canthu', '0', 'AG', '123', 'admin', '0726826687', '2023-06-21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `toyID` varchar(100) NOT NULL,
  `StoreID` varchar(11) NOT NULL,
  `StockCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `StoreID` varchar(11) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`StoreID`, `Province`, `District`, `Address`) VALUES
('1', 'An Giang', 'Long Xuyen', '128/ Nguyen Thai Hoc');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supID` varchar(11) NOT NULL,
  `supName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supID`, `supName`, `PhoneNumber`, `Address`) VALUES
('C12a', 'Milk Tea', '98765123415', 'AG');

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `toyID` varchar(100) NOT NULL,
  `toyName` varchar(100) NOT NULL,
  `ToyPrice` varchar(40) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `id` int(3) NOT NULL,
  `Cat_id` varchar(8) NOT NULL,
  `supID` varchar(11) NOT NULL,
  `toyImages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`toyID`, `toyName`, `ToyPrice`, `Description`, `id`, `Cat_id`, `supID`, `toyImages`) VALUES
('C106', 'Magic Mixies Magical Misting Crystal Ball', '$85', 'Magic Mixies Magical Misting Crystal Ball', 1, 'C105', 'C12a', 'Magic-Mixies-Magical-Misting-Crystal-Ball.jpg'),
('C107', 'Crazy Aaron’s Amazing Prediction Thinking Putty', '$17', 'Crazy Aaron’s Amazing Prediction Thinking Putty', 1, 'C104', 'C12a', 'Crazy-Aaron’s-Amazing-Prediction-Thinking-Putty.jpg'),
('C108', 'PopSockets PopPuck', '$20', 'PopSockets PopPuck', 1, 'C104', 'C12a', 'PopSockets-PopPuck.jpg'),
('C109', 'Bluey Ultimate Lights & Sounds Playhouse With Lucky', '$90', 'Bluey Ultimate Lights & Sounds Playhouse With Lucky', 1, 'C105', 'C12a', 'Bluey-Ultimate-Lights-&-Sounds-Playhouse-With-Lucky.jpg'),
('C110', 'Bratz x Cult Gaia Special Edition Designer Cloe Fashion Doll', '$39', 'Bratz x Cult Gaia Special Edition Designer Cloe Fashion Doll', 1, 'C104', 'C12a', 'Bratz-x-Cult-Gaia-Special-Edition-Designer-Cloe-Fashion-Doll.jpg'),
('C112', 'Bratz Minis', '$8', 'Bratz Minis', 1, 'C105', 'C12a', 'Bratz-Minis.jpg'),
('C113', 'LOL Surprise Loves Mini Sweets Surprise-O-Matic Dolls', '$27', 'LOL Surprise Loves Mini Sweets Surprise-O-Matic Dolls', 1, 'C105', 'C12a', 'LOL-Surprise-Loves-Mini-Sweets-Surprise-O-Matic-Dolls.jpg'),
('C117', 'Magic Mixies Magical Misting Crystal Ball', '$85', 'Bluey Ultimate Lights & Sounds Playhouse With Lucky', 1, 'C105', 'C12a', 'CoComelon-Boo-Boo-JJ-12”-Interactive-Light-up-Plush.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `toyID` (`toyID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `StoreID` (`StoreID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD KEY `toyID` (`toyID`),
  ADD KEY `StoreID` (`StoreID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`StoreID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supID`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`toyID`),
  ADD KEY `id` (`id`),
  ADD KEY `Cat_id` (`Cat_id`),
  ADD KEY `supID` (`supID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`toyID`) REFERENCES `toys` (`toyID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`StoreID`) REFERENCES `store` (`StoreID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`toyID`) REFERENCES `toys` (`toyID`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`StoreID`) REFERENCES `store` (`StoreID`);

--
-- Constraints for table `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_1` FOREIGN KEY (`id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `toys_ibfk_2` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`Cat_id`),
  ADD CONSTRAINT `toys_ibfk_3` FOREIGN KEY (`supID`) REFERENCES `supplier` (`supID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SELECT * FROM `toys`
