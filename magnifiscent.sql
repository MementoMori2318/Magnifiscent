-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magnifiscent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdb`
--

DROP TABLE IF EXISTS `cartdb`;
CREATE TABLE `cartdb` (
  `id` int(11) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartdb`
--

INSERT INTO `cartdb` (`id`, `product_id`, `quantity`, `users_id`, `date`) VALUES
(76, '1', 30, 3, '2023-04-23'),
(77, '5', 10, 3, '2023-04-23'),
(78, '4', 5, 3, '2023-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `usersID` int(11) NOT NULL,
  `usersName` varchar(255) NOT NULL,
  `usersEmail` varchar(255) NOT NULL,
  `usersUid` varchar(255) NOT NULL,
  `usersPwd` varchar(255) NOT NULL,
  `usersAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`usersID`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersAddress`) VALUES
(2, 'jr', 'jojo@gmail.com', 'demon', '$2y$10$/fd2OBgRwQsY1QvIDoyWL.9r520xFbjiJN/mtCNkX7p2fWJInwMMe', 'tres reyes bato'),
(3, 'Mario', 'mario@gmail.com', 'SuperMario', '$2y$10$yheSrl9fSe76TKqnIcmgROAo076/s3t/UqywwkPhsVxSXIIoGumya', 'tres reyes bato');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`, `product_stock`) VALUES
(1, 'Yellow Diamond', 899, 'image/7.png', 20),
(2, 'Pure Poison Dior', 969, 'image/6.png', 20),
(3, 'Bright Crystal', 1000, 'image/9.png', 20),
(4, 'Crystal Nior', 599, 'image/10.png', 3),
(5, 'Black Opium', 1599, 'image/14.png', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdb`
--
ALTER TABLE `cartdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`usersID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartdb`
--
ALTER TABLE `cartdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
