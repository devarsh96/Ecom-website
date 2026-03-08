-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 10:37 PM
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
-- Database: `bicycle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE `ordered_product` (
  `ordered_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_product`
--

INSERT INTO `ordered_product` (`ordered_product_id`, `order_id`, `product_id`, `product_name`, `price`) VALUES
(26, 18, 9, 'Red Diamondback Beltline 700c Hybrid Bike', '233'),
(27, 18, 13, 'Diamondback Powerline 27.5', '1169'),
(28, 19, 14, 'Demon Electric Davient E-Bike', '3099'),
(29, 19, 11, 'Diamondback Lachine 2', '407');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `provice` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `phone_num` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `first_name`, `last_name`, `address`, `city`, `provice`, `postal_code`, `phone_num`, `payment_method`, `total_price`, `total_items`) VALUES
(18, 19, 'fis devarsh', 'last dev', '22, Vaibhav Bunglows Part-1', 'Ahmedabad', 'NB', '380061', '6352289890', 'credit_card', 1584, 2),
(19, 19, 'seco fi', ' sec las', '245 Crerar Ave', 'Ottawa', 'ON', 'K1Z7P4', '6352289890', 'c_o_d', 3962, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image_1` varchar(256) NOT NULL,
  `image_2` varchar(256) NOT NULL,
  `image_3` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image_1`, `image_2`, `image_3`, `description`) VALUES
(7, 'Nakamura Women\'s Inspire', 167, 'HomePage/1_1.jpg', 'HomePage/1_2.jpg', 'HomePage/1_3.jpg', '26\" Mountain Bike, 18 Speed, ST Shirtl Frame, V-Brakes, Hardtail'),
(8, 'Diamondback Interurban 700c ', 356, 'HomePage/3_1.jpg', 'HomePage/3_2.jpg', 'HomePage/3_3.jpg', 'Hybrid Bike, Aluminum Frame, V-Brakes, Commuter'),
(9, 'Red Diamondback Beltline 700c Hybrid Bike', 233, 'HomePage/4_1.jpg', 'HomePage/4_2.jpg', 'HomePage/4_3.jpg', '7 Speed, Steel Frame, Rim Brakes, Cruiser'),
(10, 'GT Transeo Sport ', 230, 'HomePage/5_1.jpg', 'HomePage/5_2.jpg', 'HomePage/5_3.jpg', '700c Women\'s Hybrid Bike'),
(11, 'Diamondback Lachine 2', 407, 'HomePage/6_1.jpg', 'HomePage/6_2.jpg', 'HomePage/6_3.jpg', '700c Hybrid Bike, 24 Speed, Aluminum, Mechanical Disc Brakes, Hardtail'),
(12, 'Diamondback Greenway 27.5\"', 437, 'HomePage/7_1.jpg', 'HomePage/7_2.jpg', 'HomePage/7_3.jpg', '8 Speed, Aluminum Frame, Mechanical Disc Brakes, Commuter'),
(13, 'Diamondback Powerline 27.5\"', 1169, 'HomePage/8_1.jpg', 'HomePage/8_2.jpg', 'HomePage/8_3.jpg', 'eBike/Mountain Bike, 10 Speed, Aluminum Frame, Hydraulic Disc Brakes'),
(14, 'Demon Electric Davient E-Bike', 3099, 'HomePage/9_1.jpg', 'HomePage/9_2.jpg', 'HomePage/9_2.jpg', 'Davient. Vintage design, powered by Modern Technology, exceeding expectations by all measures.'),
(15, 'Demon Electric Argo', 1500, 'HomePage/10_1.jpg', 'HomePage/10_2.jpg', 'HomePage/10_3.jpg', 'With its sporty race design, and all terrain durability, Demons “Argo” (named in honour of the CFL Team) has the pep and the endurance needed to handle the toughest streets, and the meanest paths. '),
(16, 'Demon Electric Blacktail', 4199, 'HomePage/12_1.jpg', 'HomePage/12_2.jpg', 'HomePage/12_3.jpg', 'You asked and Demon’s delivered. Introducing “Blacktail”.'),
(17, 'Demon Electric Phantom', 2699, 'HomePage/11_1.jpg', 'HomePage/11_2.jpg', 'HomePage/11_3.jpg', 'A versatile, powerful touring bike that’s made to go the distance. With 48V Lithium Ion Battery, a 350W rear motor, 5 level pedal assist, and an LCD colour display, master those distances and truly go anywhere and go everywhere');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password1`, `phone_number`, `email`) VALUES
(14, 'finalTest', 'finalTest', '131224242424', 'hi@gmail.com'),
(15, 'hiii', '1111111', '23232424', 'hi@gmailcom'),
(16, 'hiiRegiTest', 'hiiRegiTest', '1232398398', 'hiiRegiTest@gmail.com'),
(19, 'devarshPatel', 'devarsh', '20939029090', 'devarshpatelxyz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD PRIMARY KEY (`ordered_product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordered_product`
--
ALTER TABLE `ordered_product`
  MODIFY `ordered_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
