-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `favourite`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `picture`) VALUES
(1, 'pineapple', 10, 500, 'sjgejge.jpg'),
(2, 'mango', 50, 1000, 'ginger.jpg'),
(3, 'baoba', 50, 500, '660982bf5c672-'),
(4, 'gug79', 2, 4567, '660db548caafa-');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `review` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `agent`, `review`) VALUES
(1, 'Melanie', 'good products'),
(2, 'godwin', 'excellent'),
(3, 'agodwin', 'jkcakds'),
(4, 'agodwin', 'ahufodfuowfsou');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `agent`, `date`, `product`, `price`, `quantity`) VALUES
(6, 'Godwin', '0000-00-00', 'PINEAPPLE JUICE', 0, 1000),
(7, 'Godwin', '0000-00-00', 'COCKTAIL JUICE', 1000, 2),
(8, 'Godwin', '0000-00-00', 'PINEAPPLE JUICE', 0, 1000),
(9, 'Godwin', '0000-00-00', 'COCKTAIL JUICE', 1000, 2),
(10, 'Godwin', '0000-00-00', 'PINEAPPLE GINGER JUICE', 500, 1000),
(11, 'Godwin', '0000-00-00', 'CARROT JUICE', 1000, 1000),
(12, 'Godwin', '0000-00-00', 'PINEAPPLE GINGER JUICE', 500, 1),
(13, 'Godwin', '0000-00-00', 'COCKTAIL JUICE', 1000, 3),
(14, 'Godwin', '0000-00-00', 'PINEAPPLE JUICE', 500, 5),
(15, 'mimi', '0000-00-00', 'PINEAPPLE JUICE', 500, 12),
(16, 'caroline', '0000-00-00', 'COCKTAIL JUICE', 500, 15),
(17, 'caroline', '0000-00-00', 'PINEAPPLE GINGER JUICE', 500, 2),
(18, 'caroline', '0000-00-00', 'CARROT JUICE', 500, 10),
(19, 'caroline', '0000-00-00', 'PINEAPPLE JUICE', 500, 10),
(20, 'jessica', '0000-00-00', 'GINGER JUICE', 100, 90),
(21, 'jessica', '0000-00-00', 'PINEAPPLE JUICE', 500, 3),
(22, 'agodwin', '0000-00-00', 'PINEAPPLE JUICE', 200, 12),
(23, 'agodwin', '0000-00-00', 'CARROT JUICE', 200, 1000),
(24, 'agodwin', '0000-00-00', 'PINEAPPLE JUICE', 500, 5),
(25, 'agodwin', '0000-00-00', 'COCKTAIL JUICE', 500, 5),
(26, 'agodwin', '0000-00-00', '', 1, 560),
(27, 'agodwin', '0000-00-00', 'PINEAPPLE JUICE', 200, 12),
(28, 'agodwin', '0000-00-00', '', 200, 15),
(29, 'agodwin', '0000-00-00', '', 200, 12),
(30, 'agodwin', '0000-00-00', 'PINEAPPLE JUICE', 200, 12),
(31, 'agodwin', '0000-00-00', 'COCKTAIL JUICE', 123, 15),
(32, 'agodwin', '0000-00-00', '', 200, 15),
(33, 'agodwin', '0000-00-00', '', 200, 12),
(34, 'agodwin', '0000-00-00', 'GINGER JUICE', 200, 12),
(35, 'agodwin', '0000-00-00', 'GINGER JUICE', 200, 12),
(36, 'agodwin', '2', 'GINGER JUICE', 200, 90),
(37, 'agodwin', '2', 'COCKTAIL JUICE', 200, 2),
(38, 'agodwin', '2', 'PINEAPPLE JUICE', 500, 5),
(39, 'agodwin', '0', 'COCKTAIL JUICE', 500, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date_employed` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `salary` int(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `position`, `address`, `date_employed`, `username`, `password`, `phoneNumber`, `salary`, `picture`) VALUES
(9, 'awah', 'staff', 'logpom', '2024-03-07', 'agodwin', 'speakers', '345678', 6601081, '23456789'),
(10, 'melanie', 'manager', 'buea', '2024-03-06', 'mimi', 'speakers', '567890', 2147483647, '567890'),
(11, 'defense', 'staff', 'buea', '2024-03-14', 'defense1', 'defense', '3456789', 660000000, '346789');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `product`, `address`, `phone`, `email`, `picture`) VALUES
(4, 'mango', 'mango', 'buea', '134', 'ertyui@gmail.com', '66010f981035a-Mangos_-_single_and_halved.jpg'),
(5, 'pear', 'pineapple', 'buea', '45678', 'sdfgh@pear.com', '660110163f7de-കൈതച്ചക്ക.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
