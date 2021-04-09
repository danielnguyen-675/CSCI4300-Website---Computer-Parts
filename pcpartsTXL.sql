-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3555
-- Generation Time: Apr 09, 2021 at 01:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `customerID`, `street`, `city`, `state`, `zipcode`, `country`) VALUES
(2, 6, 'STREET', 'CITY', 'STATE', 'ZIPCODE', 'Afghanistan'),
(3, 7, 'asd', 'asd', 'asd', 'asd', 'Afghanistan');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` longtext NOT NULL,
  `phoneNumber` varchar(45) NOT NULL,
  `userStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `userStatus`) VALUES
(6, 'FIRSTNAME', 'LASTNAME', 'monib53445@684hh.com', '$2y$10$JaTRmkeFbbIasaXPwgjLHO93YZhLxzm6U5jtwpXYNG4qNBlN8OiVa', '(789) 789-7897', 1),
(7, 'test', 'test', 'test@test.com', '$2y$10$0oBuInPFCktu43GB1O2.mONdAIx4lk2suCZ4pBThOAZgSlHRD8w/e', '(123) 123-1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `manufacturerName` varchar(45) NOT NULL,
  `prodName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `prodTotalPrice` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderStatus` varchar(45) NOT NULL,
  `shipmentStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `payInfoID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `cardholderName` varchar(45) NOT NULL,
  `cardNumber` varchar(45) NOT NULL,
  `expiryDate` date NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `prodName` varchar(45) NOT NULL,
  `prodStock` int(11) NOT NULL,
  `prodPrice` float NOT NULL,
  `manufacturerName` varchar(45) NOT NULL,
  `categoryName` varchar(45) NOT NULL,
  `productImage` text NOT NULL,
  `productDescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `prodName`, `prodStock`, `prodPrice`, `manufacturerName`, `categoryName`, `productImage`, `productDescription`) VALUES
(1001, 'AMD Ryzen 7 3700X', 100, 329.99, 'AMD', 'GPU', 'https://c1.neweggimages.com/ProductImageCompressAll300/19-113-567-V11.jpg', '3rd Gen Ryzen\r\nSocket AM4\r\nMax Boost Frequency 4.4 GHz\r\nDDR4 Support\r\nL2 Cache 4MB\r\nL3 Cache 32MB\r\nThermal Design Power 65W\r\nWith Wraith Prism cooler'),
(1002, 'GIGABYTE Geforce RTX 2060 6GB Graphics Card', 500, 896.88, 'Gigabyte', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-932-115-V07.jpg', 'NVIDIA Turing Architechure & Real Time Ray Tracing\r\nWINDFORCE 2X Cooling System with Alternate Spinning Fans\r\nIntuitive Controls with AORUS Engine\r\nCore Clock 1755 MHz\r\n'),
(1003, 'ASUS TUF Gaming GeForce GTX 1650, 4GB', 800, 482.99, 'ASUS ', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-126-445-V01.jpg', '4GB 128-Bit GDDR6\r\nCore Clock 1410 MHz\r\nBoost Clock 1755 MHz (Gaming Mode), 1785 MHz (OC Mode)\r\n1 x DVI-D 1 x HDMI 2.0b 1 x DisplayPort 1.4\r\n896 CUDA Cores\r\nPCI Express 3.0'),
(1004, 'MSI GeForce GTX 1660 6GB', 200, 849.99, 'MSI', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-137-476-V01.jpg', '6GB 192-Bit GDDR6\r\nBoost Clock 1830 MHz\r\n1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1408 CUDA Cores\r\nPCI Express 3.0 x16\r\n'),
(1005, 'MSI GeForce RTX 2060 6GB', 150, 899.99, 'MSI', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-137-379-V22.jpg', '6GB 192-Bit GDDR6\r\nBoost Clock 1830 MHz\r\n1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1920 CUDA Cores\r\nPCI Express 3.0 x16\r\n'),
(1006, ' PowerColor RED DEVIL Radeon RX 580 8GB', 100, 1174.02, 'PowerColor', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-131-712-Z01.jpg', '8GB 256-Bit GDDR5\r\nBoost Clock 1425 MHz\r\n1 x DL-DVI-D 1 x HDMI 3 x DisplayPort\r\n2304 Stream Processors\r\nPCI Express 3.0'),
(1007, ' ASUS CERBERUS -GTX1050TI 4GB ', 500, 339.99, 'ASUS', 'GPU', 'https://c1.neweggimages.com/ProductImage/ADWF_1_201901072049018990.jpg', '4GB GDDR5\r\n'),
(1008, 'MSI GeForce TRIO RTX 2070 8GB x16', 50, 1649.59, 'MSI', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-137-439-V05.jpg', '8GB 256-Bit GDDR6\r\nBoost Clock 1800 MHz\r\n1 x HDMI 2.0b 3 x DisplayPort\r\n2560 CUDA Cores\r\nPCI Express 3.0 x16'),
(1009, 'GIGABYTE AORUS GeForce RTX 2060 8GB', 50, 1795, 'Gigabyte', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-932-172-V09.jpg', 'Powered by GeForce RTX 2060 SUPER\r\nNVIDIA Turing Architechure & Real Time Ray Tracing\r\nAORUS Exclusive Halo Fan RGB\r\nWINDFORCE Stack 3 X 100mm Fan Cooling System\r\nIntuitive Controls with AORUS Engine\r\nCore Clock 1845 MHz\r\n8GB 256-Bit GDDR6\r\n3 x HDMI, 3 x DisplayPort, 1 x USB Type-C\r\nPCI Express 3.0 x16\r\n'),
(1010, 'EVGA GeForce GTX 1060 GAMING 6GB', 150, 924.95, 'EVGA', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-487-260-S99.jpg', '6GB 192-Bit GDDR5\r\nCore Clock 1506 MHz\r\nBoost Clock 1708 MHz\r\n1 x Dual-Link DVI-D 1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1280 CUDA Cores\r\nPCI Express 3.0\r\n'),
(1011, 'XFX THICC II Pro Radeon RX5500 8GB', 175, 1299.97, 'XFX', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-150-840-S01.jpg', '8GB 128-Bit GDDR6\r\nCore Clock 1607 MHz\r\nBoost Clock 1845 MHz\r\n1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1408 Stream Processors\r\nPCI Express 4.0'),
(1012, ' EVGA GeForce GTX 1060 6GB SSC GAMING ACX 3.0', 150, 919, 'EVGA', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-487-275-01.jpg', '6GB 192-Bit GDDR5\r\nCore Clock 1607 MHz\r\nBoost Clock 1835 MHz\r\n1 x Dual-Link DVI-D 1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1280 CUDA Cores\r\nPCI Express 3.0'),
(1013, ' ZOTAC GeForce GTX 1060 AMP, 6GB', 300, 925, 'ZOTAC', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-500-403-S99.jpg', 'New Pascal Architecture\r\n6GB 192-bit GDDR5\r\nVirtual Reality Ready\r\n1 x Dual-link DVI, 3 x DisplayPort (version 1.4), 1 x HDMI\r\nBoost Clock 1771 MHz\r\nExtended warranty included with every graphics card purchase. User registration required on ZOTAC website.\r\n'),
(1014, 'ASUS GeForce RTX 2060 Overclocked 6GB ', 50, 959.99, 'ASUS', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-126-349-V01.jpg', 'Auto-Extreme Technology uses automation to enhance reliability\r\n6GB 192-Bit GDDR6\r\nCore Clock OC Mode: 1395 MHz\r\nGaming Mode (Default): 1365 MHz\r\nBoost Clock OC Mode: 1785 MHz\r\nGaming Mode (Default): 1755 MHz\r\n1 x DVI-D 2 x HDMI 2.0b 1 x DisplayPort 1.4\r\n1920 CUDA Cores\r\nPCI Express 3.0 x16\r\n'),
(1015, 'MSI GeForce GTX 1650 4GB Super Gaming', 300, 699.99, 'MSI', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-137-484-V01.jpg', '4GB 128-Bit GDDR6\r\nBoost Clock 1755 MHz\r\n1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n1280 CUDA Cores\r\nPCI Express 3.0 x16'),
(1016, ' ASUS Phoenix GeForce GTX 1650 4GB', 125, 489, 'ASUS', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-126-449-V06.jpg', '4GB 128-Bit GDDR6\r\nCore Clock 1410 MHz\r\nBoost Clock OC Mode: 1665 MHz\r\nGaming Mode: 1635 MHz\r\n1 x DVI-D 1 x HDMI 2.0b 1 x DisplayPort 1.4\r\n896 CUDA Cores\r\nPCI Express 3.0\r\n'),
(1017, 'MSI GeForce GTX 1060 DirectX 12 GTX 1060 6GB', 300, 699.99, 'MSI', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-127-963-S99.jpg', '6GB 192-Bit GDDR5\r\nCore Clock 1594 MHz (OC Mode)\r\n1569 MHz (Gaming Mode)\r\n1506 MHz (Silent Mode)\r\nBoost Clock 1809 MHz (OC Mode)\r\n1784 MHz (Gaming Mode)\r\n1708 MHz (Silent Mode)\r\n1 x DL-DVI-D 1 x HDMI 2.0 3 x DisplayPort 1.4\r\n1280 CUDA Cores\r\nPCI Express 3.0 x16'),
(1018, ' EVGA GeForce GTX 1070 Ti GAMING 8GB ', 200, 1150, 'EVGA', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-487-390-V01.jpg', '8GB 256-Bit GDDR5\r\nCore Clock 1607+ MHz\r\nBoost Clock 1683+ MHz\r\n1 x DL-DVI-D 1 x HDMI 2.0b 3 x DisplayPort 1.4\r\n2432 CUDA Cores\r\nPCI Express 3.0\r\n'),
(1019, 'Asus ROG Strix ROG-STRIX-RTX2060S 8GB', 50, 1399.99, 'ASUS ', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-126-355-V01.jpg', '8GB 256-Bit GDDR6\r\nBoost Clock OC Mode - 1710 MHz\r\nGaming Mode - 1680 MHz\r\n2 x HDMI 2.0b 2 x DisplayPort 1.4\r\n2176 CUDA Cores\r\nPCI Express 3.0'),
(1020, 'SAPPHIRE NITRO+ Radeon RX 5700 8GB', 20, 2299.99, 'SAPPHIRE', 'GPU', 'https://c1.neweggimages.com/ProductImage/14-202-351-V04.jpg', '8GB 256-Bit GDDR6\r\nCore Clock 1770 MHz\r\nBoost Clock 2010 MHz\r\n2 x HDMI 2 x DisplayPort 1.4\r\n2560 Stream Processors\r\nPCI Express 4.0 x16'),
(1021, 'AMD A10-5700 Trinity Quad-Core 3.4GHz ', 500, 58, 'AMD', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-113-289-02.jpg', '32nm Trinity 65W\r\n4MB L2 Cache\r\nAMD Radeon HD 7660D'),
(1022, ' AMD Ryzen 3 3300X Quad-Core 3.8 GHz ', 200, 177.97, 'AMD', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-113-648-S01.jpg', '3rd Gen Ryzen\r\nSocket AM4\r\nMax Boost Frequency 4.3 GHz\r\nDDR4 Support 3200MHz\r\nCMOS TSMC 7nm FinFET\r\nL2 Cache 2MB\r\nL3 Cache 16MB\r\nThermal Design Power 65W\r\nWith Wraith Stealth cooler\r\nAMD Zen Core Architecture\r\nAMD Ryzen Master Utility\r\nAMD Ryzen VR-Ready Premium'),
(1023, ' Intel Core i7-980X Gulftown 6-Core 3.33GHz', 100, 550.19, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-115-226-03.jpg', '32nm Gulftown 130W\r\n12MB L3 Cache\r\n6 x 256KB L2 Cache'),
(1024, 'Intel Core i3-3220T IvyBridgeDual-Core 2.8GHz', 200, 390, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-116-776-02.jpg', '22nm Ivy Bridge 35W\r\n3MB L3 Cache\r\nIntel HD Graphics 2500'),
(1025, 'Intel Core i5-2450P Quad-Core 3.2GHz', 200, 180.99, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-115-231-02.jpg', '32nm Sandy Bridge\r\n6MB L3 Cache\r\n4 x 256KB L2 Cache'),
(1026, 'Intel Core i7-4790 Haswell Quad-Core 3.6 GHz', 150, 476, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/A1N8_1_201607181110292677.jpg', '22nm Haswell 84W\r\n8MB L3 Cache\r\n4 x 256KB L2 Cache\r\nIntel HD Graphics 4600'),
(1027, 'Intel Pentium G2140 Dual-Core 3.3GHz', 150, 110.19, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-116-963-03.jpg', '22nm Ivy Bridge 55W\r\n3MB L3 Cache\r\nIntel HD Graphics'),
(1028, 'AMD Ryzen 9 3900 12-Core 3.1 GHz Socket', 225, 591, 'AMD', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-113-662-S01.jpg', '7nm 65W\r\n64MB L3 Cache\r\n6MB L2 Cache\r\nTray/OEM'),
(1029, 'Intel Core i5-6600KSkylake Quad-Core 3.5 GHz', 200, 199.29, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/A1N8_1_20170504342593354.jpg', '14nm Skylake 91W\r\n6MB L3 Cache\r\n4 x 256KB L2 Cache\r\nIntel HD Graphics 530'),
(1030, 'Intel OEM Core i5-8600K 6-Core 3.6 GHz', 400, 259.99, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-117-840-S01.jpg', 'OEM Processor\r\nONLY Compatible with Intel 300 Series Motherboard\r\nFor A Great VR Experience\r\nMax Turbo Frequency 4.3 GHz\r\nIntel UHD Graphics 630\r\nUnlocked Processor\r\nDDR4 Support\r\nSocket LGA 1151 (300 Series)\r\nCooler / thermal paste not included'),
(1031, 'Intel Core i7-7700T Quad-Core 2.9 GHz', 150, 390.98, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/A1N8_1_20170504296341316.jpg', '14nm Kaby Lake 35W\r\n8MB L3 Cache\r\n4 x 256KB L2 Cache\r\nTray ONLY\r\n'),
(1032, 'Intel Xeon EM64T 3.4 Single-Core 3.4 GHz', 200, 301, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-117-032-01.jpg', '800MHz FSB\r\n90 nm Irwindale\r\n2MB L2 Cache'),
(1033, 'AMD Phenom II X6 1090T 6-Core 3.2 GHz ', 400, 97, 'AMD', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-103-849-02.jpg', '4000 MHz\r\n45nm Thuban 125W\r\n6MB L3 Cache\r\n6 x 512KB L2 Cache'),
(1034, 'Intel Core 2 QX6700 Quad-Core 2.66 GHz', 50, 870, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-115-011-02.jpg', '1066 MHz FSB\r\n65nm Kentsfield 130W\r\n2 x 4MB L2 Cache'),
(1035, 'Intel Core i7-980 Gulftown 6-Core 3.33 GHz', 20, 1500.19, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-116-402-03.jpg', '32nm Gulftown 130W\r\n12MB L3 Cache\r\n6 x 256KB L2 Cache');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetID` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetID`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'gdfg@sdf', '10d015b0f9a05eb9', '$2y$10$HbtHUSTVqVuASuGlG4geLepjX6E6HHtNtoWdI.OcYFKcMz37KkgDm', '1617965147');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipmentID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `shipmentDate` date NOT NULL,
  `shipmentStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useractivate`
--

CREATE TABLE `useractivate` (
  `userActivateID` int(11) NOT NULL,
  `userActivateEmail` text NOT NULL,
  `userActivateSelector` text NOT NULL,
  `userActivateToken` longtext NOT NULL,
  `userActivateExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useractivate`
--

INSERT INTO `useractivate` (`userActivateID`, `userActivateEmail`, `userActivateSelector`, `userActivateToken`, `userActivateExpires`) VALUES
(3, 'test@test.com', '73594e2ce6e0c8bd', '$2y$10$Lr4MAp8FfAy9mElfFH1WFuK1s4eIf6NWDxpyHGZc4t1ZAW7zprGgK', '1617972276');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `categoryName` (`categoryName`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturerID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `productName` (`prodName`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderStatus`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `orderStatus` (`orderStatus`),
  ADD KEY `shipmentStatus` (`shipmentStatus`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`payInfoID`),
  ADD KEY `userID` (`customerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `prodName` (`prodName`),
  ADD KEY `categoryName` (`categoryName`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetID`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipmentID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `shipmentStatus` (`shipmentID`),
  ADD KEY `shipmentStatus_2` (`shipmentStatus`);

--
-- Indexes for table `useractivate`
--
ALTER TABLE `useractivate`
  ADD PRIMARY KEY (`userActivateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `payInfoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useractivate`
--
ALTER TABLE `useractivate`
  MODIFY `userActivateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`categoryName`) REFERENCES `products` (`categoryName`);

--
-- Constraints for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `manufacturer_ibfk_2` FOREIGN KEY (`prodName`) REFERENCES `products` (`prodName`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`orderStatus`) REFERENCES `orderdetails` (`orderStatus`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`shipmentStatus`) REFERENCES `shipments` (`shipmentStatus`);

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
