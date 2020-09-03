-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 04:06 PM
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
-- Database: `product_filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_ram` varchar(50) NOT NULL,
  `product_storage` varchar(50) NOT NULL,
  `product_camera` varchar(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active, 1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_ram`, `product_storage`, `product_camera`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 'Honor 10 Lite(Sapphire Blue, 64 GB)', 'Honor', '14499.00', '4', '64', '13', 'phone1.jpg', 12, '1'),
(2, 'Infinix Hot S3 (Sandstone Black, 32 GB)', 'Infinix', '8999.00', '3', '32', '13', 'phone2.jpg', 14, '1'),
(3, 'VIVO V9 Youth(Gold 32 GB) (4 VIVO GB RAM)', 'VIVO', '16990.00', '4', '32', '16', 'phone2.jpg', 10, '1'),
(4, 'Moto E4 Plus (Fine Gold, 32 GB) (3 GB RAM)', 'Moto', '11499.00', '3', '32', '8', 'phone1.jpg', 10, '1'),
(5, 'Lenovo K8 Plus (Venom Black, 32 GB) (3 GB RAM)', 'Lenovo', '9999.00', '3', '32', '13', 'phone1.jpg', 11, '1'),
(6, 'Samsung Galaxy on Nxt (Gold, 16 GB Samsung) (3 GB RAM)', 'Samsung', '10990.00', '3', '16', '13', 'phone3.jpg', 12, '1'),
(7, 'Moto C Plus (Pearl White, 16 GB Moto) (2 GB RAM)', 'Moto', '7799.00', '2', '16', '8', 'phone3.jpg', 10, '1'),
(8, 'Panasonic P77 (White 16 GB) Panasonic (1 GB RAM)', 'Panasonic', '5999.00', '1', '16', '8', 'phone1.jpg', 11, '1'),
(9, 'OPPO F5 (Black 64 GB) (6 GB OPPO RAM)', 'OPPO', '19990.00', '6', '64', '16', 'phone3.jpg', 23, '1'),
(10, 'Honor 7A (Gold, 32 GB) (3 GB Honor RAM)', 'Honor', '8999.00', '3', '32', '13', 'phone1.jpg', 11, '1'),
(11, 'Asus ZenFone 5Z (Midnight Blue, 64 GB) (6 GB ASUS RAM)', 'Asus', '29999.00', '6', '128', '12', 'phone2.jpg', 15, '1'),
(12, 'Redmi 5A (Gold, 32 GB) (3 GB MI RAM)', 'Redmi', '5999.00', '3', '32', '13', 'phone3.jpg', 16, '1'),
(13, 'Intex Indie 5 (Black, 16 GB) Intex (2 GB RAM)', 'Intex', '4999.00', '2', '16', '8', 'phone1.jpg', 23, '1'),
(14, 'Google Pixel 2 XL (18:9 Display, Google 64 GB) White', 'Google', '61990.00', '4', '64', '12', 'phone2.jpg', 10, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
