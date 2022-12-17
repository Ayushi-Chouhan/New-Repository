-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2022 at 07:14 PM
-- Server version: 10.3.20-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `user_id` varchar(40) NOT NULL,
  `prod_id` varchar(40) NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `prod_qty` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `charge_tax` int(100) NOT NULL,
  `net_price` int(100) NOT NULL,
  `transaction_det` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`user_id`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `total_price`, `charge_tax`, `net_price`, `transaction_det`) VALUES
('ayushi', 'p05', 'Headphone', 999, 1, 999, 100, 1099, '2022-03-27 09:56:11'),
('ayushi', 'p01', 'LG265', 18799, 1, 18799, 1880, 20679, '2022-03-27 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(40) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `order_price` int(11) NOT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `order_date`, `user_id`, `address`, `contact_no`, `order_price`) VALUES
(1, '2020-08-08 00:19:16', 'ayushi@123', '2-Ashok', '987653849', 20679),
(2, '2020-08-09 23:16:55', 'ayushi@123', '2-Ashok', '987653849', 20679),
(3, '2020-08-09 23:22:24', 'ayushi@123', '2-Ashok', '987653849', 20679),
(4, '2020-09-13 02:31:37', 'ayushi', '2-Ashok', '987653849', 20679);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(20) NOT NULL,
  `prod_name` varchar(60) NOT NULL,
  `prod_qty` int(10) NOT NULL,
  `prod_price` int(20) NOT NULL,
  `charge_tax` int(20) NOT NULL,
  `net_price` int(20) NOT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_no`, `prod_id`, `prod_name`, `prod_qty`, `prod_price`, `charge_tax`, `net_price`) VALUES
(1, 'p01', 'LG265', 1, 18799, 1880, 20679),
(2, 'p01', 'LG265', 1, 18799, 1880, 20679),
(4, 'p01', 'LG265', 1, 18799, 1880, 20679);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` varchar(20) NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `prod_cat` varchar(30) NOT NULL,
  `prod_brand` varchar(20) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_price` int(20) NOT NULL,
  `prod_qty` int(100) NOT NULL,
  `prod_img` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_cat`, `prod_brand`, `prod_desc`, `prod_price`, `prod_qty`, `prod_img`) VALUES
('p01', 'LG265', 'Washing Machine', 'LG', '5 star digital', 18799, 100, 'p01.jpeg'),
('p02', 'whirl2', 'Washing Machine', 'LG', '6.5 kg top loaded automatic', 14900, 25, 'p02.jpeg'),
('p03', 'Motorola  Moto G 5G Plus', 'phone', 'Motorola', '6.70inch display,5000mAh battery capacity, Qualcomm Snapdragon 765 processor', 15000, 70, 'p03.jpg'),
('p04', 'OnePlus8', 'phone', 'OnePlus', 'Glacier green(6GB RAM+128GB storage)', 41900, 100, 'p04.jpg'),
('p05', 'Headphone S460', 'headphones', 'Roccia Indiano', 'White Bluebooth headphones', 999, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

DROP TABLE IF EXISTS `pwd_reset`;
CREATE TABLE IF NOT EXISTS `pwd_reset` (
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwd_reset`
--

INSERT INTO `pwd_reset` (`email`, `token`) VALUES
('a@gmail.com', 'b10c8182c177a8dd85334edcb400f97dd884961de5f299d3a9e14d60997a6ec419a3f337376e483910ca38b18e3b83080c1c'),
('ayushichouhan260@gmail.com', '1fcff4d3fb21d67c8cbe4ba4ef8a2e69647a62ce29367e14c7498a42513a07b010eb2c839405be8a83efb318f84dcf3eb38d');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `gender`, `Address`, `DOB`, `contactno`) VALUES
('ayushi', 'ayushi', '111', 'ayushichouhan260@gmail.com', 'costumer', 'F', '2-Ashok', '26-05-2001', '987653849'),
('ayushi', 'Ayushi Chouhan', '123', 'ayushi@gmail.com', 'student', 'female', 'abs', '24-3-1-2001', '23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
