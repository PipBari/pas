-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 06:45 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_pgtomy`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `sku` text NOT NULL,
  `productname` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `sku`, `productname`, `price`, `storeid`) VALUES
(5, '111', 'Дверь 1', 10000.00, 2),
(6, '222', 'Стол 1', 13000.00, 12),
(7, '333', 'Стул 1', 6000.00, 13),
(8, '111', 'Дверь1', 10000.00, 12),
(9, '111', 'Дверь 1', 10000.00, 13),
(10, '222', 'Стол 1', 13000.00, 2),
(11, '222', 'Стол 1', 13000.00, 13),
(12, '333', 'Стул 1', 6000.00, 12),
(13, '333', 'Стул 1', 6000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleid` int(11) NOT NULL,
  `product` text NOT NULL,
  `seller` text NOT NULL,
  `store` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `saledate` date NOT NULL,
  `s_price` int(11) NOT NULL,
  `p_sku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleid`, `product`, `seller`, `store`, `quantity`, `saledate`, `s_price`, `p_sku`) VALUES
(10, 'Дверь 1', 'Волк К.К.', 'Troya', 2, '2022-12-01', 10000, 111),
(11, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 6, '2022-12-01', 10000, 111),
(12, 'Дверь 1', 'Романов Г.Т.', 'Portal', 1, '2022-12-01', 10000, 111),
(13, 'Стол 1', 'Волк К.К.', 'Troya', 8, '2022-12-01', 13000, 222),
(14, 'Стол 1', 'Игнатюк О.М.', 'Geona', 4, '2022-12-01', 13000, 222),
(15, 'Стол 1', 'Романов Г.Т.', 'Portal', 9, '2022-12-01', 13000, 222),
(16, 'Стул 1', 'Волк К.К.', 'Troya', 1, '2022-12-01', 10000, 333),
(17, 'Стул 1', 'Игнатюк О.М.', 'Geona', 7, '2022-12-01', 10000, 333),
(18, 'Стул 1', 'Романов Г.Т.', 'Portal', 10, '2022-12-01', 10000, 333),
(19, 'Дверь 1', 'Волк К.К.', 'Troya', 1, '2022-12-02', 10000, 111),
(20, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 5, '2022-12-02', 10000, 111),
(21, 'Дверь 1', 'Романов Г.Т.', 'Portal', 4, '2022-12-02', 10000, 111),
(22, 'Стол 1', 'Волк К.К.', 'Troya', 2, '2022-12-02', 13000, 222),
(23, 'Стол 1', 'Игнатюк О.М.', 'Geona', 9, '2022-12-02', 13000, 222),
(24, 'Стол 1', 'Романов Г.Т.', 'Portal', 7, '2022-12-02', 13000, 222),
(25, 'Стул 1', 'Волк К.К.', 'Troya', 9, '2022-12-02', 10000, 333),
(26, 'Стул 1', 'Игнатюк О.М.', 'Geona', 5, '2022-12-02', 10000, 333),
(27, 'Стул 1', 'Романов Г.Т.', 'Portal', 6, '2022-12-02', 10000, 333),
(28, 'Дверь 1', 'Волк К.К.', 'Troya', 6, '2022-12-03', 10000, 111),
(29, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 9, '2022-12-03', 10000, 111),
(30, 'Дверь 1', 'Романов Г.Т.', 'Portal', 9, '2022-12-03', 10000, 111),
(31, 'Стол 1', 'Волк К.К.', 'Troya', 5, '2022-12-03', 13000, 222),
(32, 'Стол 1', 'Игнатюк О.М.', 'Geona', 9, '2022-12-03', 13000, 222),
(33, 'Стол 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-03', 13000, 222),
(34, 'Стул 1', 'Волк К.К.', 'Troya', 3, '2022-12-03', 10000, 333),
(35, 'Стул 1', 'Игнатюк О.М.', 'Geona', 2, '2022-12-03', 10000, 333),
(36, 'Стул 1', 'Романов Г.Т.', 'Portal', 10, '2022-12-03', 10000, 333),
(37, 'Дверь 1', 'Волк К.К.', 'Troya', 3, '2022-12-04', 10000, 111),
(38, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 4, '2022-12-04', 10000, 111),
(39, 'Дверь 1', 'Романов Г.Т.', 'Portal', 2, '2022-12-04', 10000, 111),
(40, 'Стол 1', 'Волк К.К.', 'Troya', 5, '2022-12-04', 13000, 222),
(41, 'Стол 1', 'Игнатюк О.М.', 'Geona', 1, '2022-12-04', 13000, 222),
(42, 'Стол 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-04', 13000, 222),
(43, 'Стул 1', 'Волк К.К.', 'Troya', 6, '2022-12-04', 10000, 333),
(44, 'Стул 1', 'Игнатюк О.М.', 'Geona', 6, '2022-12-04', 10000, 333),
(45, 'Стул 1', 'Романов Г.Т.', 'Portal', 3, '2022-12-04', 10000, 333),
(64, 'Дверь 1', 'Волк К.К.', 'Troya', 9, '2022-12-09', 10000, 111),
(65, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 7, '2022-12-09', 10000, 111),
(66, 'Дверь 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-09', 10000, 111),
(67, 'Стол 1', 'Волк К.К.', 'Troya', 10, '2022-12-09', 13000, 222),
(68, 'Стол 1', 'Игнатюк О.М.', 'Geona', 2, '2022-12-09', 13000, 222),
(69, 'Стол 1', 'Романов Г.Т.', 'Portal', 3, '2022-12-09', 13000, 222),
(70, 'Стул 1', 'Волк К.К.', 'Troya', 5, '2022-12-09', 10000, 333),
(71, 'Стул 1', 'Игнатюк О.М.', 'Geona', 9, '2022-12-09', 10000, 333),
(72, 'Стул 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-09', 10000, 333),
(82, 'Дверь 1', 'Волк К.К.', 'Troya', 4, '2022-12-05', 10000, 111),
(83, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 8, '2022-12-05', 10000, 111),
(84, 'Дверь 1', 'Романов Г.Т.', 'Portal', 9, '2022-12-05', 10000, 111),
(85, 'Стол 1', 'Волк К.К.', 'Troya', 9, '2022-12-05', 13000, 222),
(86, 'Стол 1', 'Игнатюк О.М.', 'Geona', 6, '2022-12-05', 13000, 222),
(87, 'Стол 1', 'Романов Г.Т.', 'Portal', 2, '2022-12-05', 13000, 222),
(88, 'Стул 1', 'Волк К.К.', 'Troya', 2, '2022-12-05', 10000, 333),
(89, 'Стул 1', 'Игнатюк О.М.', 'Geona', 3, '2022-12-05', 10000, 333),
(90, 'Стул 1', 'Романов Г.Т.', 'Portal', 1, '2022-12-05', 10000, 333),
(91, 'Дверь 1', 'Волк К.К.', 'Troya', 5, '2022-12-05', 10000, 111),
(92, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 1, '2022-12-05', 10000, 111),
(93, 'Дверь 1', 'Романов Г.Т.', 'Portal', 6, '2022-12-05', 10000, 111),
(94, 'Стол 1', 'Волк К.К.', 'Troya', 9, '2022-12-05', 13000, 222),
(95, 'Стол 1', 'Игнатюк О.М.', 'Geona', 7, '2022-12-05', 13000, 222),
(96, 'Стол 1', 'Романов Г.Т.', 'Portal', 9, '2022-12-05', 13000, 222),
(97, 'Стул 1', 'Волк К.К.', 'Troya', 10, '2022-12-05', 10000, 333),
(98, 'Стул 1', 'Игнатюк О.М.', 'Geona', 4, '2022-12-05', 10000, 333),
(99, 'Стул 1', 'Романов Г.Т.', 'Portal', 10, '2022-12-05', 10000, 333),
(100, 'Дверь 1', 'Волк К.К.', 'Troya', 6, '2022-12-08', 10000, 111),
(101, 'Дверь 1', 'Игнатюк О.М.', 'Geona', 1, '2022-12-08', 10000, 111),
(102, 'Дверь 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-08', 10000, 111),
(103, 'Стол 1', 'Волк К.К.', 'Troya', 5, '2022-12-08', 13000, 222),
(104, 'Стол 1', 'Игнатюк О.М.', 'Geona', 10, '2022-12-08', 13000, 222),
(105, 'Стол 1', 'Романов Г.Т.', 'Portal', 3, '2022-12-08', 13000, 222),
(106, 'Стул 1', 'Волк К.К.', 'Troya', 7, '2022-12-08', 10000, 333),
(107, 'Стул 1', 'Игнатюк О.М.', 'Geona', 4, '2022-12-08', 10000, 333),
(108, 'Стул 1', 'Романов Г.Т.', 'Portal', 8, '2022-12-08', 10000, 333);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sellerid` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `phonenumber` text NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellerid`, `fullname`, `phonenumber`, `storeid`) VALUES
(2, 'Волк К.К.', '333', 2),
(5, 'Игнатюк О.М.', '23123', 12),
(6, 'Романов Г.Т.', '321312', 13);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeid` int(11) NOT NULL,
  `storename` text NOT NULL,
  `adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeid`, `storename`, `adress`) VALUES
(2, 'Troya', 'Дом 7 улица неважно'),
(11, 'Lion', 'Пушкина 3'),
(12, 'Geona', 'ул. Ленина д.16к4'),
(13, 'Portal', 'ул. Седьмая д.12'),
(15, 'hjgdjhgf', 'kjhgf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `storeid` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `password`, `login`, `storeid`) VALUES
(1, 1, 'admin', 'admin', NULL),
(4, 0, 'usertroya1', 'usertroya', 2),
(5, 0, 'usergeona2', 'usergeona', 12),
(6, 0, 'userportal3', 'userportal', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `storeid` (`storeid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sellerid`),
  ADD KEY `storeid` (`storeid`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `storeid` (`storeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sellerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`storeid`) REFERENCES `stores` (`storeid`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `stores` (`storeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `stores` (`storeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
