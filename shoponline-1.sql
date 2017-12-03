-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 11:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoponline`
--
CREATE SCHEMA `clothesShop`;
USE `clothesShop`;
-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(4) UNSIGNED NOT NULL,
  `userName` varchar(30) NOT NULL,
  `passWord` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `is_block` tinyint(1) DEFAULT 0,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `userName`, `passWord`, `email`, `avatar`, `type`, `dateCreated`, `dateUpdated`) VALUES
(1, 'thien', '123123', 'thien@hcmut.edu.vn', 'defaultAvatar.jpg', 'admin', '2017-04-27 15:05:13', '2017-04-27 19:54:38'),
(2, 'Mr A', '123', 'test@gmail.com', 'defaultAvatar.jpg', 'member', '2017-04-27 15:05:13', '2017-04-27 15:25:53'),
(3, 'Miss C', '1234', 'test2@gmail.com', 'xinh1.jpg', 'member', '2017-04-27 19:53:03', '2017-04-27 19:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `idAccount` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idAccount`, `idProduct`, `Quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 3, 5, 1),
(4, 3, 30, 3),
(5, 1, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idAccount` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idAccount`, `idProduct`,`content`) VALUES
(1, 1, 1,'hello'),
(2, 2, 1,'đẹp quá!'),
(3, 3, 1,'đẹp lung linh!đẹp lung linh!đẹp lung linh!đẹp lung linh! :v :V :V ');

-- --------------------------------------------------------


--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `newsPicture` varchar(1000) DEFAULT NULL,
  `idAccount` int(11) NOT NULL,
  `content` varchar(10000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`,`newsPicture`, `idAccount`, `content`) VALUES
(1, 'Xu hướng thời trang nam 2017','carouselPic1.jpg', 1, 'Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa'),
(2, 'Xu hướng thời trang nữ 2017','carouselPic2.jpg', 3, 'Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa'),
(3, 'Xu hướng thời trang nữ 2017','carouselPic3.jpg', 1, 'Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa Thời trang là cuộc sống, hãy mặc đẹp và làm cho cuộc sống trở nên có ý nghĩa');


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL ,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `rating` Float,
  `imageProduct` varchar(10000) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product`(`id`, `Name`, `Price`, `Quantity`, `typeID`, `rating`, `imageProduct`, `dateCreated`) VALUES 
(1,'Áo thun nam Jres', 50000, 20, 1,2.3,'AoThunNam/1.jpg','2017-04-27 15:05:13'),
(2,'Áo thun nam zxcw', 75000, 21, 1,3.1,'AoThunNam/2.jpg','2017-04-24 15:05:13'),
(3,'Áo thun nam cvsac', 175000, 21, 1,4.9,'AoThunNam/3.jpg','2017-04-27 12:05:13' ),
(4,'Áo thun nam amor', 195000, 21,1,1.2,'AoThunNam/4.jpg','2017-04-22 11:05:13'),
(5,'Áo thun nam panda', 192000, 21,1,0,'AoThunNam/5.jpg','2017-03-27 14:05:13'),
(6,'Áo thun nam tiger', 50000, 20,1,0,'AoThunNam/6.jpg' ,'2017-02-24 15:05:13'),
(7,'Áo thun nam csdcs', 75000, 21, 1,1.4,'AoThunNam/7.jpg','2017-04-25 15:05:13'),
(8,'Áo thun nam lala', 175000, 21, 1,4.5,'AoThunNam/8.jpg','2017-03-01 15:05:13'),
(9,'Áo thun nam Jres NEW ', 195000, 21, 1,0.8,'AoThunNam/9.jpg','2017-04-15 15:25:13'),
(10,'Áo thun nam panda eww', 192000, 21, 1,4.4,'AoThunNam/10.jpg','2017-04-01 15:05:13'),
(11,'Áo thun nữ azzzz', 50000, 20, 3,4.3,'AoThunNu/1.jpg','2017-04-27 10:05:13'),
(12,'Áo thun nữ xcxcx', 75000, 21, 3,4.2,'AoThunNu/2.jpg','2017-04-24 15:25:13'),
(13,'Áo thun nữ sklel', 175000, 21, 3,2.3,'AoThunNu/3.jpg','2017-04-14 15:55:13'),
(14,'Áo thun nữ guchi', 195000, 21, 3,2.1,'AoThunNu/4.jpg','2017-01-27 15:05:13'),
(15,'Áo thun nữ girl one', 192000, 21, 3,2.9,'AoThunNu/5.jpg','2017-02-24 15:05:13'),
(16,'Áo thun nữ girl two', 50000, 20, 3,3.4,'AoThunNu/6.jpg','2017-04-23 05:05:13'),
(17,'Áo thun nữ asdasc', 75000, 21, 3,3.9,'AoThunNu/7.jpg','2017-04-27 09:25:13'),
(18,'Áo thun nữ winnerGirl', 175000, 21, 3,4.2,'AoThunNu/8.jpg','2017-02-27 15:05:13'),
(21,'Áo thun nữ super woman', 195000, 21, 3,4.8,'AoThunNu/9.jpg','2017-01-27 15:45:13'),
(22,'Áo thun nữ super woman 2', 192000, 21, 3,2.2,'AoThunNu/10.jpg','2017-04-22 12:05:13'),
(23,'Khăn quàng', 50000, 30, 5,2.0,'PhuKien/1.png','2017-04-27 08:55:13'),
(24,'Đồng hồ', 300000, 3, 5,1.1,'PhuKien/2.png','2017-04-24 15:05:13'),
(25,'Vớ thời trang', 29000, 10, 5,2.6,'PhuKien/3.png','2017-03-22 15:05:13'),
(26,'Túi thời trang nữ aba', 250000, 12, 5,4.9,'PhuKien/4.png','2017-04-22 15:05:13'),
(27,'Dây nịch', 80000, 7, 5,1.1,'PhuKien/5.png','2017-02-27 11:05:13'),
(28,'Nón aladin', 84000, 29, 5,0.6,'PhuKien/6.png','2017-04-21 15:05:13'),
(29,'Giày addias', 550000, 4, 5,5.0,'PhuKien/7.png','2017-03-27 13:05:13'),
(30,'Mắt kiếng RayC', 400000, 13, 5,1.9,'PhuKien/8.png','2017-01-27 15:05:13'),
(31,'Bông tai', 90000, 4, 5,3.5,'PhuKien/9.png','2017-04-22 13:05:13');


-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE `typeproduct` (
  `idType` int(11) NOT NULL,
  `NameType` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`idType`, `NameType`, `Note`) VALUES
(1, 'Áo Nam', NULL),
(2, 'Quần Nam', NULL),
(3, 'Áo Nữ', NULL),
(4, 'Quần Nữ', NULL),
(5, 'Phụ Kiện', NULL),
(6, 'Đồ Đôi', NULL);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
