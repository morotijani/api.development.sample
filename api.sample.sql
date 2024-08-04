-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 06:51 PM
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
-- Database: `api.sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_cart_id` varchar(300) NOT NULL,
  `transaction_user_id` varchar(300) NOT NULL,
  `transaction_full_name` varchar(255) NOT NULL,
  `transaction_email` varchar(255) NOT NULL,
  `transaction_street` varchar(255) NOT NULL,
  `transaction_street2` varchar(255) NOT NULL,
  `transaction_company` varchar(255) NOT NULL,
  `transaction_country` varchar(255) NOT NULL,
  `transaction_state` varchar(255) NOT NULL,
  `transaction_city` varchar(255) NOT NULL,
  `transaction_postcode` varchar(50) NOT NULL,
  `transaction_phone` varchar(20) NOT NULL,
  `transaction_sub_total` decimal(10,2) NOT NULL,
  `transaction_tax` decimal(10,2) NOT NULL,
  `transaction_delivery` double(10,2) NOT NULL,
  `transaction_grand_total` decimal(10,2) NOT NULL,
  `transaction_description` text NOT NULL,
  `transaction_order_note` text NOT NULL,
  `transaction_intent` varchar(200) DEFAULT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_txn_date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_shipped_product_date` datetime DEFAULT NULL,
  `transaction_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(300) DEFAULT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(200) NOT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_state` varchar(225) DEFAULT NULL,
  `user_city` varchar(225) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_address2` varchar(255) NOT NULL,
  `user_postcode` varchar(50) NOT NULL,
  `user_company` varchar(255) NOT NULL,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_vericode` varchar(50) NOT NULL,
  `user_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_login` datetime DEFAULT NULL,
  `user_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id` (`transaction_user_id`),
  ADD KEY `transaction_status` (`transaction_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD KEY `user_country` (`user_country`),
  ADD KEY `user_state` (`user_state`),
  ADD KEY `user_trash` (`user_trash`),
  ADD KEY `user_fullname` (`user_fullname`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `user_postcode` (`user_postcode`),
  ADD KEY `user_company` (`user_company`),
  ADD KEY `user_city` (`user_city`) USING BTREE,
  ADD KEY `user_gender` (`user_gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
