-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 10:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `cart_total` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_quantity`, `users_id`, `cart_total`, `date`) VALUES
(270, '1', 1, 1, 3, '0000-00-00'),
(271, '2', 1, 1, 3, '0000-00-00'),
(272, '3', 1, 1, 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `usersID` int(11) NOT NULL,
  `usersName` varchar(255) NOT NULL,
  `usersEmail` varchar(255) NOT NULL,
  `usersUid` varchar(255) NOT NULL,
  `usersPwd` varchar(255) NOT NULL,
  `usersAddress` varchar(255) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`usersID`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersAddress`, `cart_total`) VALUES
(1, 'Jojo', 'jojo@gmail.com', 'StarPlatinum', '$2y$10$/MuHOrMm4WgboZAlvAHSQOR9ZZGyyITCuWd1CY8JtPU2M7FW2dVzW', 'tres reyes bato', 3),
(2, 'John Roger ', 'johnrogerargarin@yahoo.com', 'Joro', '$2y$10$EK2NPyFVDFU2qpUoCe4v8uoNpVT9J8AITuSpl9BFKRwVfhyD6f.Sq', 'tres reyes bato', 20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`, `product_stock`, `product_brand`) VALUES
(1, 'Yellow Diamond', 899, 'image/7.png', 20, 'Yves Saint Laurent'),
(2, 'Pure Poison Dior', 969, 'image/6.png', 20, 'Dior'),
(3, 'Bright Crystal', 1000, 'image/9.png', 20, 'Narciso Rodriguez'),
(4, 'Crystal Nior', 599, 'image/10.png', 3, 'Yves Saint Laurent'),
(5, 'Black Opium', 1599, 'image/14.png', 20, 'Narciso Rodriguez'),
(6, 'Dior Jadore', 1299, 'image/1.png', 20, 'Dior'),
(7, 'Gabbana Light', 2469, 'image/2.png', 20, 'Yves Saint Laurent'),
(8, 'Gucci Bloom', 1200, 'image/3.png', 20, 'Narciso Rodriguez'),
(9, 'Marc Jacobs Daisy', 1599, 'image/4.png', 3, 'Dior'),
(10, 'Calvin Klein Euphoria', 1299, 'image/5.png', 20, 'Dior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO `products` (`product_name`, `product_price`, `product_image`, `product_stock`, `product_brand`, `product_gender`) VALUES
('Posion Dior', 999, 'image/8.png', 20, 'Dior', 'Men'),
('Gucci Flora', 5199, 'image/11.png', 20, 'Narciso Rodriguez', 'Women'), 
('Posion Girl', 6199, 'image/12.png', 20, 'Dior', 'Women'),
 ('Cyrstal', 689, 'image/13.png', 20, 'Yves Saint Laurent', 'Men'), 
 ('Yellow Diamong', 1032, 'image/15.png', 20, 'Yves Saint Laurent', 'Men');