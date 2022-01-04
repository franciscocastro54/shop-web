-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 08:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `price` varchar(6) NOT NULL,
  `unidad` varchar(6) NOT NULL,
  `dcto` varchar(4) NOT NULL,
  `imgUrl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `title`, `price`, `unidad`, `dcto`, `imgUrl`) VALUES
(1, 'Lechuga', '500', 'unidad', '0', 'https://i.ibb.co/27P4kyD/Green-cabbage-isolated-on-white-background-Green-cabbage-isolated-on-white-background.jpg'),
(2, 'Brocoli', '500', 'unidad', '5', 'https://i.ibb.co/znD0mSv/broccoli.jpg'),
(3, 'Zanahoria', '100', 'unidad', '0', 'https://i.ibb.co/wwCvm1b/carrot.jpg'),
(4, 'Coliflor', '500', 'unidad', '10', 'https://i.ibb.co/QcmMwfC/cauliflower.jpg'),
(5, 'Choclo', '2.000', 'kg', '0', 'https://i.ibb.co/Bt7RJcQ/corn.jpg'),
(6, 'Berenjena', '2.500', 'kg', '10', 'https://i.ibb.co/khrp5bH/eggplant.jpg'),
(7, 'Ajo', '300', 'unidad', '0', 'https://i.ibb.co/4F8gTLP/garlic.jpg'),
(8, 'Pimenton verde', '500', 'unidad', '0', 'https://i.ibb.co/qDdQCXR/green-Pepper.jpg'),
(9, 'Champinones', '9000', 'kg', '25', 'https://i.ibb.co/R0WyTLH/mushroom.png'),
(10, 'Cebolla', '1.200', 'kg', '0', 'https://i.ibb.co/NSLGwfh/onion.jpg'),
(11, 'Papa', '3.500', 'kg', '15', 'https://i.ibb.co/7kdCpxf/potato.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'demo1', 'demo1@gmail.com', 'admin', 'e368b9938746fa090d6afd3628355133'),
(2, 'demo2', 'demo2@gmail.com', 'user', '1066726e7160bd9c987c9968e0cc275a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
