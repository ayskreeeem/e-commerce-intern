-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 11:48 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'fhbintern', '$2y$10$6OGylfvA5tOTsetJTN5cFeldBpbWTc.jk9y/uOwf36Cy5J/OuzOim'),
(2, 'fhbintern1', '$2y$10$Zy0d.yzgYqRUkyTrQV5hNe8Ko6uuY3xQhW0I8B3bQM/9ywLDQD9KG');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `quantity`, `user_id`, `ip_address`) VALUES
(95, 11, 1, 6, ''),
(96, 9, 1, 6, ''),
(129, 9, 1, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(25) NOT NULL,
  `category_title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Pork'),
(7, 'Strawberry'),
(8, 'Chocolate'),
(9, 'Seafood'),
(10, 'Chicken');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Danica Catapang', 'itsmeakechel@gmail.com', 'Hello', 'Hello world\r\n'),
(2, 'Danica Catapang', 'test@iskolarngbayan.pup.edu.ph', 'Hello', 'asdasa');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`user_id`, `order_id`, `item_id`, `product_id`, `quantity`, `status`) VALUES
(11, 0, 39, 14, 1, ''),
(11, 0, 40, 13, 1, ''),
(11, 0, 41, 0, 0, ''),
(11, 0, 42, 9, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL DEFAULT '2023',
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(25) NOT NULL,
  `amount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `items`, `invoice`, `date`, `status`, `amount`) VALUES
(1, 0, 0, '2023', '2023-04-13 16:14:22', '', ''),
(2, 11, 2, '83934', '2023-04-13 16:14:42', 'Pending', '0'),
(3, 11, 2, '22718', '2023-04-13 16:31:04', 'Pending', '0'),
(4, 11, 2, '31835', '2023-04-13 16:35:05', 'Pending', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(250) DEFAULT NULL,
  `product_description` varchar(250) DEFAULT NULL,
  `product_keyword` varchar(250) DEFAULT NULL,
  `product_price` bigint(250) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `product_price`, `product_image`, `category_id`, `date`) VALUES
(9, 'Chocolate', 'asd', 'chocolate', 250, 'meat.jpg', 8, '2023-03-27 05:54:11'),
(11, 'Meat 1', 'asdadkohkwejedisefhesygcrnwaygexnyuagxwnegsduygfysegywgfywgeygrwygruwygrygewurygewygrweugrewuygrw', NULL, 350, 'products4.jpg', 2, '2023-04-05 05:11:54'),
(12, 'Seafood', 'Ajasdjawheiuqhiuhqwuehqwuheqwiheqwiuh', NULL, 255, 'products1.jpg', 9, '2023-04-05 05:13:45'),
(13, 'Mango', 'djquqwmxmaiousfkjsdhfsddgfyuegryweruwgyrewygruwyg', NULL, 235, 'products3.jpg', 7, '2023-04-05 05:14:53'),
(14, 'Jollibee', 'asdwjuqxhuidhsaiduxhuqwiuqwhihwqiuhdqwdsd', NULL, 150, 'products2.jpg', 10, '2023-04-05 05:15:31'),
(15, 'asdasd', 'asdasdasd', NULL, 250, 'Logo.jpg', 8, '2023-04-05 06:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_province` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_zip` int(100) DEFAULT NULL,
  `user_mobile` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `fname`, `lname`, `email`, `password`, `user_ip`, `user_address`, `user_province`, `user_city`, `user_zip`, `user_mobile`) VALUES
(6, 'Danica', 'Catapang', 'itsmeakechel@gmail.com', '$2y$10$wtZybHMC8G.SRokHuXFiOu.NiidE76U9O2EZZHHz9I9dYuN81lKfC', '::1', '#0156 Purok 1 brgy. turbina', 'Laguna', 'Calamba', 4027, 9557105569),
(10, 'Ariso', 'Levi', 'arisolevi@gmail.com', '$2y$10$2mOfmNlOuEAUc4qyh2LdD.GZJFLz4v57p8MbFN0sV5PEdwr5PjlSq', '::1', '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9557105569),
(11, 'Ariso', 'Ariso', 'ariso@gmail.com', '$2y$10$v80quGCrzSrsgeVrV9MMq.y6J6R7mU7E5gjAFhQUDsrNCqhQh7qkC', '::1', '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9557105569);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
