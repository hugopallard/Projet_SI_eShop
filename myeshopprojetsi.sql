-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2022 at 11:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myeshopprojetsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Name`) VALUES
(1, 'Vin'),
(2, 'Champagnes'),
(3, 'AllProducts');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `QuantityOrdered` int(10) NOT NULL,
  `PriceOfProduct` int(10) NOT NULL,
  `Category_ID` int(10) NOT NULL,
  `SubCategory_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `Product_Name`, `QuantityOrdered`, `PriceOfProduct`, `Category_ID`, `SubCategory_ID`) VALUES
(27, 'Vin de Bordeaux', 1, 23, 1, 1),
(28, 'Vin blanc de l\'est de la France', 3, 17, 1, 2),
(29, 'Vin rosé de Marseille', 7, 11, 1, 3),
(44, 'Vin blanc de l\'est de la France', 2, 17, 1, 2),
(45, 'Vin blanc de l\'est de la France', 2, 17, 1, 2),
(46, 'Vin blanc de l\'est de la France', 3, 17, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `OrderDetail_ID` int(10) NOT NULL,
  `OrderTotalPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SubCategory_ID` int(10) NOT NULL,
  `StockQuantity` int(10) NOT NULL,
  `UnitPrice` int(10) NOT NULL,
  `Description` text NOT NULL,
  `UploadDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `SubCategory_ID`, `StockQuantity`, `UnitPrice`, `Description`, `UploadDate`) VALUES
(1, 'Vin de Bordeaux', 1, 7, 23, 'Un vin de bordeaux très bon', '2022-02-13'),
(2, 'Vin blanc de l\'est de la France', 2, 5, 17, 'Un super vin blanc', '2022-02-10'),
(3, 'Vin rosé de Marseille', 3, 9, 11, 'Un vin rosé de la méditerranée', '2022-02-12'),
(4, 'Vin rouge pas terrible', 1, 11, 16, 'Super', '2022-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) NOT NULL,
  `Category_ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `Category_ID`, `Name`) VALUES
(1, 1, 'Vins rouges'),
(2, 1, 'Vins blancs'),
(3, 1, 'Vins rosés'),
(4, 2, 'Champagnes doux'),
(5, 3, 'AllProducts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `BirthDate` datetime NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `userType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `BirthDate`, `Email`, `Password`, `userType`) VALUES
(1, 'Hugo', 'Pallard', '2022-02-09 20:43:11', 'hugopallard2@yahoo.fr', '123', 'admin'),
(2, 'testUser', 'testUser', '2022-02-01 20:43:24', 'testUser@testUser', 'testUser', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OrderDetail_fk0` (`Category_ID`),
  ADD KEY `OrderDetail_fk1` (`SubCategory_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Orders_fk0` (`User_ID`),
  ADD KEY `Orders_fk1` (`OrderDetail_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Products_fk0` (`SubCategory_ID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SubCategories_fk0` (`Category_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `OrderDetail_fk0` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `OrderDetail_fk1` FOREIGN KEY (`SubCategory_ID`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_fk0` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Orders_fk1` FOREIGN KEY (`OrderDetail_ID`) REFERENCES `orderdetail` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Products_fk0` FOREIGN KEY (`SubCategory_ID`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `SubCategories_fk0` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
