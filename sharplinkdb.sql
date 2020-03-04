-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 11:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharplinkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `image`, `pwd`) VALUES
(1, 'sharplinkmpconcept@gmail.com', '', '8d9b8c2ac6c59c0b44f42d832a7ab1e9');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `t_len` decimal(10,0) NOT NULL,
  `t_waist` decimal(10,0) NOT NULL,
  `t_flap` decimal(10,0) NOT NULL,
  `t_lap` decimal(10,0) NOT NULL,
  `t_hip` decimal(10,0) NOT NULL,
  `t_knee` decimal(10,0) NOT NULL,
  `t_feet` decimal(10,0) NOT NULL,
  `s_glen` decimal(10,0) NOT NULL,
  `s_len` decimal(10,0) NOT NULL,
  `s_chest` decimal(10,0) NOT NULL,
  `s_stomach` decimal(10,0) NOT NULL,
  `s_shoulder` decimal(10,0) NOT NULL,
  `s_neck` decimal(10,0) NOT NULL,
  `s_arm` decimal(10,0) NOT NULL,
  `s_wrist` decimal(10,0) NOT NULL,
  `s_sleeve` decimal(10,0) NOT NULL,
  `s_rsleeve` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `name`, `email`, `phone`, `address`, `image`, `pwd`, `t_len`, `t_waist`, `t_flap`, `t_lap`, `t_hip`, `t_knee`, `t_feet`, `s_glen`, `s_len`, `s_chest`, `s_stomach`, `s_shoulder`, `s_neck`, `s_arm`, `s_wrist`, `s_sleeve`, `s_rsleeve`) VALUES
(1, 'Oke Monday', 'mondayoke93@gmail.com', '08068869769', 'Joyi Compound, Thojigbo, Agosasa, Ago-Egu, Ipokia Local Governemnt Area', '08068869769_Passport.jpg', '$2y$10$.73gX2kXTBpeMepLZMSBBuNiP6ZQ.BjWUwtenawCe2UnNXRYL2UUK\r\n', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'Oke Oluwaseun Paul', 'okeoluwaseun79@gmail.com', '07082614612', '11, surulere streret, volks, Ojo, Lagos.', 'Ezekiel.jpg', '$2y$10$EATGZyAvcSPn5ROCpXMJIejkiJWVU7QjZxoNZ1YUdN5L5XOee.bcW', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 'Oke Emmanuel', 'mdconnect@yahoo.com', '08068869769', '2, God Habitation Estate, Ipokia Ogun State', 'Oke Monday.jpg', '$2y$10$1f19tZCn.9uzkK94eL7vdugKXCEd.0y4V9QAw3ea70C1GNT.vh7Du', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cus_id`, `pd_id`, `order_no`, `quantity`, `color`, `date`, `amount`) VALUES
(1, 1, 1, 454544, 1, 'orange', '2020-02-17 09:35:27', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pd_category` varchar(11) NOT NULL,
  `pd_type` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `picture2` varchar(255) NOT NULL,
  `picture3` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `pd_name`, `description`, `pd_category`, `pd_type`, `price`, `picture`, `picture2`, `picture3`, `keywords`) VALUES
(4, 'Native wears', '', 'men', 'Native', 6000, 'IMG-20200207-WA0019.jpg', '', '', 'native, ankara, ankara wears'),
(5, 'Native wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0020.jpg', '', '', 'native, ankara, ankara wears'),
(6, 'Native wears', '', 'men', 'Native', 3000, 'IMG-20200207-WA0021.jpg', '', '', 'ankara, native, native wears, ankara wears'),
(7, 'Senator Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0022.jpg', '', '', 'senator, senator wears, latest wears, designers'),
(8, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0023.jpg', '', '', 'senator, senator wears, designer, designer wears, fine wears.'),
(9, 'Senator Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0024.jpg', '', '', 'senator, senator wears, designer, designer wears, fine wears.'),
(10, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0025.jpg', '', '', 'senator, senators, designers, senator wears, designer wears.'),
(11, 'Senator Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0026.jpg', '', '', 'senator, senators, designers, senator wears, designer wears.'),
(12, 'Native Wears', '', 'men', 'Native', 8000, 'IMG-20200207-WA0027.jpg', '', '', 'Native Wears, native, ankara, ankara wears, ankara wear.'),
(13, 'Senator Wears', '', 'men', 'Senator', 7000, 'IMG-20200207-WA0028.jpg', '', '', 'senator, senators, senator wears, designer, designers.'),
(14, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0029.jpg', '', '', 'Native wears, native, ankara, ankara wears'),
(15, 'Suits', 'The latest suit design with quality material. It is light weighted and affordable.', 'men', 'Suit', 14000, 'IMG-20200207-WA0030.jpg', '', '', 'designer suits, suits, jacket, jackets, coats.'),
(16, 'Senators Wears', '', 'men', 'Senator', 7000, 'IMG-20200207-WA0031.jpg', '', '', 'senator, senator wears, designers, latest trend'),
(17, 'Native wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0032.jpg', '', '', 'native, native wears, ankara wears, ankara'),
(18, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0033.jpg', '', '', 'native,  native wears, ankara, ankara wears'),
(19, 'Senator Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0034.jpg', '', '', 'senator, senator wears, designer, designers, designer wears.'),
(20, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0035.jpg', '', '', 'senator, senator wears, latest design, designer wears'),
(21, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0036.jpg', '', '', 'native, native wears, ankara, ankara wears'),
(22, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0037.jpg', '', '', 'native, native wears, ankara, ankara suits'),
(23, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0038.jpg', '', '', 'native, native wears, ankara, ankara suits'),
(24, 'Native Wears', '', 'men', 'Native', 3000, 'IMG-20200207-WA0039.jpg', '', '', 'native, native wears, ankara, ankara wears, ankara wear.'),
(25, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0040.jpg', '', '', 'native, native wears, ankara, ankara wears, ankara wear.'),
(26, 'Suit', '', 'men', 'Suit', 15000, 'IMG-20200207-WA0041.jpg', '', '', 'suit, suits, mens suit, designer suit,blazers'),
(27, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0042.jpg', '', '', 'senator, senator wears, designer wears, trending wears'),
(28, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0043.jpg', '', '', 'native, native wears, ankara, ankara wears'),
(29, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0044.jpg', '', '', 'ankara, native wears, native, ankara wears'),
(30, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0045.jpg', '', '', 'ankara, native wears, native, ankara wears'),
(31, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0046.jpg', '', '', 'senator, senator wears, designer wears'),
(32, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0047.jpg', '', '', 'native, ankara, native wears, ankara wears'),
(33, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0048.jpg', '', '', 'native, ankara, native wears, ankara wears'),
(34, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0049.jpg', '', '', 'native, ankara, native wears, ankara wears'),
(35, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0050.jpg', '', '', 'senator, senator wears, men, designer'),
(36, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0051.jpg', '', '', 'native, ankara, ankara wears, native wears'),
(37, 'Native Wears', '', 'men', 'Native', 4000, 'IMG-20200207-WA0052.jpg', '', '', 'native, ankara, native wears, cultural'),
(38, 'Native Wears', '', 'men', 'Senator', 5000, 'IMG-20200207-WA0053.jpg', '', '', 'native, ankara, native wears, cultural'),
(39, 'Suits', '', 'men', 'Suit', 15000, 'IMG-20200207-WA0054.jpg', '', '', 'suits, suit, blazers, coat'),
(40, 'Native Wears', '', 'men', 'Native', 5000, 'IMG-20200207-WA0055.jpg', '', '', 'native, ankara, native wears, ankara wears'),
(41, 'Suits', '', 'men', 'Suit', 15000, 'IMG-20200207-WA0056.jpg', '', '', 'suit, suits, designer, blazers'),
(42, 'Suits', '', 'men', 'Suit', 20000, 'IMG-20200207-WA0057.jpg', '', '', 'suit, suits, native suit, designers, blazers'),
(43, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0058.jpg', '', '', 'senator, senator wears, designer, latest'),
(44, 'Suits', '', 'men', 'Suit', 20000, 'IMG-20200207-WA0059.jpg', '', '', 'suits, suit, men\'s suit, blazers'),
(45, 'Senators Wears', '', 'men', 'Senator', 8000, 'IMG-20200207-WA0060b.jpg', '', '', 'senator, senator wears, designer wears');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
