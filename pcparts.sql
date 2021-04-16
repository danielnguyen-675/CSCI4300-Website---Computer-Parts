-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3555
-- Generation Time: Apr 16, 2021 at 05:46 PM
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
  `customerID` int(11) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `customerID`, `street`, `city`, `state`, `zipcode`, `country`) VALUES
(9, 13, 'asd', 'asd', 'asd', 'asd', 'Afghanistan'),
(12, 16, 'street', 'city', 'state', 'zip', 'Barbados'),
(13, 17, 'street', 'city', 'state', 'zipcode', 'Afghanistan');

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
  `userStatus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `userStatus`) VALUES
(13, 'test', 'test', 'xawowo7081@art2427.com', '$2y$10$hQ8BdwLsZapndtZMDtbmruoE5YEOuB2J1Ju5J0l2jY6k48gLk7zUm', '(123) 123-1234', 1),
(16, 'First', 'Last', 'tamibi9206@tripaco.com', '$2y$10$aljwwf/NSGCeWWxn/bL/LeKVGxPv.BWhlP3u3z8a9bYIdhFH27Hdy', '(123) 123-1234', 1),
(17, 'John', 'Smith', 'vaname1875@zcai55.com', '$2y$10$9Knk2DwNkWVE1q.xz2cy6e2.OsVbXO3aWkMxK0IeQFeSBxREudKfi', '(123) 123-1234', 1);

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
  `orderDetailsID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `prodTotalPrice` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetailsID`, `orderID`, `productQuantity`, `prodTotalPrice`, `productID`) VALUES
(4, 95, 2, 0, 1001),
(5, 95, 1, 0, 1082),
(6, 95, 4, 0, 1121),
(7, 95, 3, 0, 1122),
(8, 96, 3, 0, 1081),
(9, 96, 4, 0, 1121),
(10, 96, 3, 0, 1122),
(11, 97, 9, 0, 1002),
(12, 97, 1, 0, 1081),
(13, 97, 5, 0, 1108),
(14, 98, 3, 0, 1004),
(15, 98, 1, 0, 1121),
(16, 99, 4, 0, 1002),
(17, 100, 1, 0, 1002),
(18, 100, 1, 0, 1121);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `street` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `zipcode` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `phoneNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `street`, `city`, `state`, `zipcode`, `country`, `firstName`, `lastName`, `phoneNumber`) VALUES
(95, 16, 'TESTORDERDETAILS', 'TESTORDERDETAILS', 'TESTORDERDETAILS', 'TESTORDERDETAILS', 'Aruba', '', '', ''),
(96, 16, 'CHANGEDSTREET', 'CHANGEDCITY', 'CHANGEDSTATE', 'CHANGEDZIP', 'Bulgaria', '', '', ''),
(97, 17, 'street123', 'city123', 'state123', 'zipcode123', 'Belize', '', '', ''),
(98, 17, 'street5324', 'city32453324', 'state5324534', 'zipcode35253324', 'Bahrain', '', '', ''),
(99, 17, 'street123', 'city123', 'state123', 'zipcode123', 'Bangladesh', 'Adam', 'Brown', '(333) 333-3333'),
(100, 17, 'street435324', 'city345324', 'state324', 'zipcode3245324', 'Brunei Darussalam', 'Adam', 'Johnson', '(444) 444-4444');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `payInfoID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `cardholderName` varchar(45) NOT NULL,
  `cardNumber` text NOT NULL,
  `expiryDate` date NOT NULL,
  `cvc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`payInfoID`, `customerID`, `cardholderName`, `cardNumber`, `expiryDate`, `cvc`) VALUES
(32, 16, 'TESTING555', '$2y$10$3xq6jwXFEV3drCXkqZA.9euGs13L5u1pdkyVa4jp6Cnrrmjub.6KW', '2021-04-30', '$2y$10$h8ttIcN2Ecyp483i4H46I.DDrdgm3TePO589A.TTDf/NpsHRvxyjG'),
(33, 16, 'TESTING555', '$2y$10$3xq6jwXFEV3drCXkqZA.9euGs13L5u1pdkyVa4jp6Cnrrmjub.6KW', '2021-04-30', '$2y$10$h8ttIcN2Ecyp483i4H46I.DDrdgm3TePO589A.TTDf/NpsHRvxyjG'),
(34, 16, 'TESTING555', '$2y$10$3xq6jwXFEV3drCXkqZA.9euGs13L5u1pdkyVa4jp6Cnrrmjub.6KW', '2021-04-30', '$2y$10$h8ttIcN2Ecyp483i4H46I.DDrdgm3TePO589A.TTDf/NpsHRvxyjG'),
(35, 16, 'TESTING555', '$2y$10$3xq6jwXFEV3drCXkqZA.9euGs13L5u1pdkyVa4jp6Cnrrmjub.6KW', '2021-04-30', '$2y$10$h8ttIcN2Ecyp483i4H46I.DDrdgm3TePO589A.TTDf/NpsHRvxyjG'),
(36, 17, 'ASDASDSA', '$2y$10$NZ0rz4k7BuEYhl3Nym7L/eQwWT12An27sqznCkjAJfRKaThCS/BV2', '2021-04-15', '$2y$10$mjRYTr3g6UuuwK0UYSAwPu0iwohslUh9ZN9p567gf4BFTaxdMvv4u'),
(37, 17, 'ASDASDSA', '$2y$10$NZ0rz4k7BuEYhl3Nym7L/eQwWT12An27sqznCkjAJfRKaThCS/BV2', '2021-04-15', '$2y$10$mjRYTr3g6UuuwK0UYSAwPu0iwohslUh9ZN9p567gf4BFTaxdMvv4u'),
(38, 17, 'ASDASDSA', '$2y$10$NZ0rz4k7BuEYhl3Nym7L/eQwWT12An27sqznCkjAJfRKaThCS/BV2', '2021-04-15', '$2y$10$mjRYTr3g6UuuwK0UYSAwPu0iwohslUh9ZN9p567gf4BFTaxdMvv4u'),
(39, 17, 'ASDASDSA', '$2y$10$NZ0rz4k7BuEYhl3Nym7L/eQwWT12An27sqznCkjAJfRKaThCS/BV2', '2021-04-15', '$2y$10$mjRYTr3g6UuuwK0UYSAwPu0iwohslUh9ZN9p567gf4BFTaxdMvv4u');

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
(1001, 'AMD Ryzen 7 3700X', 100, 329.99, 'AMD', 'CPU', 'https://c1.neweggimages.com/ProductImageCompressAll300/19-113-567-V11.jpg', '3rd Gen Ryzen\r\nSocket AM4\r\nMax Boost Frequency 4.4 GHz\r\nDDR4 Support\r\nL2 Cache 4MB\r\nL3 Cache 32MB\r\nThermal Design Power 65W\r\nWith Wraith Prism cooler'),
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
(1035, 'Intel Core i7-980 Gulftown 6-Core 3.33 GHz', 20, 1500.19, 'Intel', 'CPU', 'https://c1.neweggimages.com/ProductImage/19-116-402-03.jpg', '32nm Gulftown 130W\r\n12MB L3 Cache\r\n6 x 256KB L2 Cache'),
(1036, 'Microsoft Wireless Sculpt Ergonomic Desktop', 100, 117, 'Microsoft', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/23-109-349-03.jpg', '104 Normal Keys\r\nUSB RF Wireless\r\nMicrosoft\r\nBlack'),
(1037, 'Razer Chroma Keyboard, DeathAdder Mouse', 100, 148, 'Razer', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A6ZPS200615J3n16.jpg', 'Razer Cynosa Chroma Gaming Keyboard: Individually Backlit RGB Keys - Spill-Resistant Design - Programmable Macro Functionality - Quiet & Cushioned\r\nRazer DeathAdder Essential Gaming Mouse: 6400 DPI Optical Sensor - 5 Programmable Buttons\r\nRazer Goliathus Speed Cosmic (Medium) Gaming Mouse Pad: Smooth Gaming Mat - Anti-Slip Rubber Base - Portable Cloth Design - Anti-Fraying Stitched Frame'),
(1038, 'CORN GLK 350 Keyboard And 1800DPI Mouse', 250, 44.99, 'CORN', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A4RES200618RUaqw.jpg', '1800 DPI Mouse\r\nSpill-resistant design\r\nSilent Typing\r\nErgonomic Design\r\nCool Orange Backlit\r\nConvenient USB Chargeable Keyboard\r\nUltra-thin Panel\r\nAuto -sleep and Power-saving( Last for 3 Months after Fully Charged--Lab Data)\r\nPlug and Use, No Driver Needed'),
(1039, 'Apple Wireless Keyboard And Mouse Combo', 500, 49.99, 'Apple', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/AKJ7S200528aY76c.jpg', 'Keyboard Type: Wireless Connection\r\nOptical Resolution: 1200 DPI\r\nItem Type: Slim, Wireless, Full Size with Keypad\r\nMouse Type: Wireless Connection\r\nWireless Specification: 2.4GHz\r\nInterface Port: USB\r\nMultimedia Function Keys: Yes\r\nWaterproof: Yes\r\nWorking Distance: 10m'),
(1040, 'MEETION C510 Keyboard and Mouse ', 300, 21.99, 'MEETION', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/AFJZS201105QGEKh.jpg', '104 Normal Keys\r\nUSB Wired\r\nMeetion\r\nBlack'),
(1041, 'Logitech Wireless Combo MK260 920-002950', 300, 39.99, 'Logitech', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/23-126-197-06.jpg', '8 Hot Keys\r\nUSB RF Wireless\r\nSleek All-in-one Setup'),
(1042, 'HP CS10 Ergonomic Design', 400, 51.99, 'HP', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A4RE_132010698233293560k0ggq4OIYm.jpg', '1200 DPI Mouse\r\nErgonomic Design\r\n2.4GHz Stable Wireless Connectivity\r\nWaterdrop-shape Keycaps\r\nPlug and Use, No Driver Needed\r\nSilent Typing\r\nPower-saving and Auto-sleep Function\r\nWide Compatability-Support Window 98/ME/NT/XP/Vista/7/8/10'),
(1043, 'Logitech MK520 ', 500, 64, 'Logitech', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A73M_132123196405574162bR3FwANTet.jpg', 'Logitech Incurve keys\r\nHand-friendly full size mouse\r\nFull-size layout keyboard\r\nLogitech Unifying receiver'),
(1044, 'Microsoft Desktop 3050 PP3-00001', 500, 49.95, 'Microsoft', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/23-109-384-01.jpg', 'Office Products\r\nMicrosoft\r\nBlack'),
(1045, 'APEVIA KI-COMBO-BL Blue & Black', 700, 14.95, 'APEVIA', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/23-165-015-07.jpg', '104 Normal Keys\r\n22 Function Keys\r\nPS/2\r\nAPEVIA\r\nBlue & Black'),
(1046, 'Dell KM636 Keyboard and Mouse', 500, 54, 'Dell', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/V1BH_1_20190123336970324.jpg', 'Contemporary Design\r\n. -Designed For Sheer Comfort\r\nLong, Efficient Battery Life\r\nUSB Wireless Receiver\r\nInterface: 2.4 GHz\r\nHot Keys Function:\r\n. -Mute\r\n. -Play / Pause'),
(1047, 'Perixx 11578 Mechanical Keyboard and Mouse', 250, 119.99, 'Perixx', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A2J2_1318045655094517495JBCMovTa7.jpg', 'The glossy surface offers smooth movement, perfect for fast moving and multiple screens control work\r\n9 advanced function keys with multimedia and keyboard lock function\r\nEasy to removed and clean the trackball by taping it from the bottom hole of the keyboard\r\nSystem requirements: Windows 7, 8, 10; wired USB connection\r\nMechanical keyboard with built-in 2.17 Inch (55mm) large trackball and tilting scroll wheel; Easily adjust the sensitivity of the trackball movement by FN+F9\r\nBacklit version: PERIBOARD-322 (NE#9SIA2J27N12715); Non-backlit version: ERIBOARD-522 (NE#9SIA2J27N13234)'),
(1048, 'FirstPower Gaming RGB Keyboard and Mouse', 500, 19.99, 'FirstPower', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/AP4DS200630KFXzJ.jpg', 'keyboard: Suspension style key caps, waterproof and dustproof, and easy to take down to clean thoroughly for longer work time.\r\nAmphitheatre style and Curve key design provides super cool mechanical feeling.\r\nThe transmission line is equipped with anti-interference magnet ring for better operation.\r\nRainbow Color Backlight effects: bringing cool gaming experience\r\nMouse: DPI adjustment provides 800/1200/1600 gear shift control for different games.\r\nThe smooth 3D roller with anti-skid scale grain ensures you to operate comfortably.\r\nThe buttons structure adopt precursor type streamline design provides excellent click sense.'),
(1049, 'Logitech MK550 Wireless Keyboard and Mouse', 250, 84.99, 'Logitech', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/AKN5_132187847768382335fG89fRd7Qt.jpg', 'New Logitech MK550 Wireless Keyboard and Mouse Combo\r\nErgonomic Wave Design\r\nLong Battery Life\r\nlower wrist fatigue\r\nThree options for leg height\r\nUnifying receiver\r\n'),
(1050, 'Dell Premier Wireless Keyboard and Mouse', 100, 107.36, 'Dell', 'Keyboard and Mouse', 'https://c1.neweggimages.com/ProductImage/A1K6_132062683287640999XYfejeAvxV.jpg', 'Keyboard & Mouse Set\r\nWireless Connectivity Technology\r\nLaser Movement Detection\r\nNumber of Total Buttons: 3\r\nMovement Resolution: 1600 dpi'),
(1051, 'CORSAIR Vengeance LPX 16GB ', 100, 188.99, 'CORSAIR', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-236-563-V01.jpg', 'DDR4 3600 (PC4 28800)\r\nTiming 14-16-16-36\r\nCAS Latency 14\r\nVoltage 1.45V\r\nAMD Ryzen Ready\r\nCompatible with AMD Ryzen Series CPU'),
(1052, ' Transcend 2GB 240-Pin SDRAM DDR2 667', 400, 47.11, 'Transcend', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-208-348-04.jpg', 'DDR2 667 (PC2 5300)\r\nTiming 5-5-5\r\nCAS Latency 5\r\nVoltage 1.80V'),
(1053, ' CORSAIR DOMINATOR PLATINUM 16GB DDR4', 200, 154.99, 'CORSAIR', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-236-494-01.jpg', 'DDR4 3200 (PC4 25600)\r\nTiming 16-18-18-36\r\nCAS Latency 16\r\nVoltage 1.35V\r\nAMD Ryzen Ready\r\nCompatible with AMD Ryzen Series CPU'),
(1054, 'Kingston 12GB (3 x 4GB) 240-Pin DDR3 ', 150, 248.98, 'Kingston', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-134-929-03.jpg', 'DDR3 1066 (PC3 8500)\r\nCAS Latency 7\r\nVoltage 1.50V'),
(1055, 'CORSAIR Vengeance RGB Pro 32GB DDR4', 125, 194.99, 'CORSAIR', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-236-699-V01.jpg', 'DDR4 3200 (PC4 25600)\r\nTiming 16-20-20-38\r\nCAS Latency 16\r\nVoltage 1.35V'),
(1056, 'G.SKILL Trident Z Royal Series 128GB 288-Pin', 50, 829.99, 'G.SKILL', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-232-998-V02.jpg', 'DDR4 3600 (PC4 28800)\r\nTiming 18-22-22-42\r\nCAS Latency 18\r\nVoltage 1.35V'),
(1057, 'HyperX FURY 8GB 288-Pin DDR4 SDRAM', 300, 64.03, 'HyperX', 'RAM', 'https://c1.neweggimages.com/ProductImage/A4YUS200825fpw4r.jpg', 'DDR4 3200 (PC4 25600)\r\nTiming 16-18-18\r\nCAS Latency 16\r\nVoltage 1.35V\r\n'),
(1058, 'Crucial 16GB 288-Pin DDR4 SDRAM', 300, 79.86, 'Crucial', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-156-104-01.jpg', 'DDR4 2133 (PC4 17000)\r\nCAS Latency 15\r\nVoltage 1.20V\r\n'),
(1059, 'G.SKILL Trident Z Royal 64GB 288-Pin DDR4', 75, 459.99, 'G.SKILL', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-374-051-V02.jpg', 'DDR4 4000 (PC4 32000)\r\nTiming 18-22-22-42\r\nCAS Latency 18\r\nVoltage 1.40V'),
(1060, 'XPG SPECTRIX D60G RGB16GB DDR4', 350, 153.43, 'XPG', 'RAM', 'https://c1.neweggimages.com/ProductImage/1B4-010T-00145-S07.jpg', 'DDR4 3200 (PC4 25600)\r\nTiming 16-20-20\r\nVoltage 1.35V\r\n'),
(1061, 'PNY Anarchy 16GB 288-Pin DDR4 SDRAM', 350, 157.16, 'PNY', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-178-874-02.jpg', 'DDR4 2400 (PC4 19200)\r\nTiming 15-15-15\r\nCAS Latency 15\r\nVoltage 1.20V\r\n'),
(1062, 'Team Elite 16GB DDR4 2400 (PC4 19200)', 400, 115, 'TEAMGROUP', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-313-810-S01.jpg', 'DDR4 2400 (PC4 19200)\r\nTiming 16-16-16-39\r\nCAS Latency 16\r\nVoltage 1.20V'),
(1063, 'GeIL EVO SPEAR Phantom Gaming Edition 16GB', 475, 82.99, 'GeIL', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-158-821-V01.jpg', 'DDR4 3000 (PC4 24000)\r\nTiming 16-18-18-36\r\nCAS Latency 16\r\nVoltage 1.35V'),
(1064, 'G.SKILL Ripjaws V Series 32GB 288-Pin DDR4', 225, 352.23, 'G.SKILL', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-374-090-V01.jpg', 'DDR4 3600 (PC4 28800)\r\nTiming 14-15-15-35\r\nCAS Latency 14\r\nVoltage 1.45V'),
(1065, 'CORSAIR Dominator Platinum RGB 16GB DDR4 3000', 250, 144.99, 'CORSAIR', 'RAM', 'https://c1.neweggimages.com/ProductImage/20-236-503-01.jpg', 'DDR4 3000 (PC4 24000)\r\nTiming 15-17-17-35\r\nCAS Latency 15\r\nVoltage 1.35V\r\nPremium RGB RAM'),
(1066, 'Thermaltake TR2 W0070 430W Power Supply', 500, 99.9, 'Thermaltake', 'Power Supply', 'https://c1.neweggimages.com/ProductImageCompressAll300/17-153-023-58.jpg?ex=2', 'ATX 12V 2.2\r\n115 - 230 VAC 50 - 60 Hz\r\n+3.3V@20A, +5V@24A, +12V1@14A, +12V2@15A, -12V@0.3A, +5VSB@2A'),
(1067, 'RAIDMAX HYBRID 2 RX-530SS 530W Power Supply', 500, 54.98, 'RAIDMAX', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-152-028-35.jpg', 'ATX 12V v2.3/EPS 12V\r\nModular\r\n80 PLUS BRONZE Certified\r\n115 / 230 V, 47 - 63 Hz\r\n+3.3V@20A, +5V@20A, +12V@38A, -12V@0.4A ,5VSB@2.5A\r\nActive PFC'),
(1068, 'Seasonic FOCUS GX-750, 750W Power Supply', 300, 129.99, 'Seasonic', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-151-187-V15.jpg', 'COMPACT SIZE: 140 MM deep fits ALL ATX systems.\r\nFULL MODULAR: Use only the cables you need to reduce clutter to maximize airflow for a better ventilated system.\r\n80 PLUS GOLD: Less energy gets wasted during power conversion; Cut down your electricity usage and be Eco-Friendly.\r\nPREMIUM HYBRID FAN CONTROL: Unsurpassed silent performance in Fanless Mode. The fan control button at the back of the power supply allows users to customize cooling needs by selecting between Seasonic S2FC (fan control without Fanless Mode) and S3FC (fan control including Fanless Mode).\r\n10 YEAR WORRY-FREE WARRANTY: Our commitment to superior quality.\r\n'),
(1069, 'EVGA 500 W1 80+ Power Supply', 500, 54.99, 'EVGA', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-438-016-17.jpg', 'ATX12V / EPS12V\r\n80 PLUS Certified\r\nUp to 40A +12V\r\nActive PFC\r\nIntel Haswell Compatible'),
(1070, 'Seasonic FOCUS GX-850, 850W Power Supply', 250, 149.99, 'Seasonic', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-151-188-V15.jpg', 'COMPACT SIZE: 140 MM deep fits ALL ATX systems.\r\nFULL MODULAR: Use only the cables you need to reduce clutter to maximize airflow for a better ventilated system.\r\n80 PLUS GOLD: Less energy gets wasted during power conversion; Cut down your electricity usage and be Eco-Friendly.\r\nPREMIUM HYBRID FAN CONTROL: Unsurpassed silent performance in Fanless Mode. The fan control button at the back of the power supply allows users to customize cooling needs by selecting between Seasonic S2FC (fan control without Fanless Mode) and S3FC (fan control including Fanless Mode).\r\n10 YEAR WORRY-FREE WARRANTY: Our commitment to superior quality.'),
(1071, 'CORSAIR CX-M Series CX750M 750W', 300, 104.99, 'CORSAIR', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-139-051-10.jpg', 'ATX12V v2.3\r\nSemi-modular\r\n80 PLUS BRONZE Certified\r\n100 - 240 V 47 - 63 Hz\r\n+3.3V@25A, +5V@25A, +12V@62A, -12V@0.8A, +5VSB@3A\r\nATX12V & EPS12V Power Supply\r\nErP Lot 6 80 Plus Bronze\r\n4th generation Intel Core processor Ready'),
(1072, 'SILVERSTONE ST1500 1500W ATX 12V Power Supply', 100, 665.99, 'SILVERSTONE', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-256-054-10.jpg', 'ATX 12V 2.3 & EPS 12V\r\nFull Modular\r\n80 PLUS SILVER Certified\r\n90 - 264 V 47 - 63 Hz\r\n+3.3V@40A, +5V@40A, +12V1@25A, +12V2@25A, +12V3@25A, +12V4@25A, +12V5@25A, +12V6@25A, +12V7@25A'),
(1073, 'EVGA SuperNOVA 1000 G5 Power Supply', 225, 308.09, 'EVGA', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-438-160-Z01.jpg', '80 PLUS Gold certified, with 91% efficiency or higher under typical loads\r\nFully Modular to reduce clutter and improve airflow\r\n100% Japanese Capacitors, Active Clamp +DC-DC Converter design to improve 3.3V. / 5V. Stability\r\nFluid Dynamic Bearing Fan and EVGA ECO Mode for ultra-quiet operation and increased lifespan'),
(1074, 'Seasonic PRIME TX-850 850W Power Supply', 300, 249.99, 'Seasonic', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-151-196-S09.jpg', 'MICRO TOLERANCE LOAD REGULATION (under 0.5 %): This impressive electrical performance and stability makes this power supply an ideal choice for high-performance systems.\r\nFULL MODULAR - Use only the cables you need to reduce clutter and improve airflow for a better ventilated system.\r\n80 PLUS TITANIUM - Less energy gets wasted during power conversion; Cut down your electricity usage and be Eco-Friendly.\r\nPREMIUM HYBRID FAN CONTROL: Unsurpassed silent performance in Fanless Mode. The fan control button at the back of the power supply allows users to customize cooling needs by selecting between Seasonic S2FC (fan control without Fanless Mode) and S3FC (fan control including Fanless Mode).'),
(1075, 'CORSAIR SF750 750W Power Supply', 250, 234.99, 'CORSAIR', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-139-080-Z01.jpg', 'SFX\r\nFull Modular\r\n80 PLUS PLATINUM Certified\r\n100 - 240 V 47 - 63 Hz'),
(1076, 'Rosewill PHOTON Series 650W Power Supply', 400, 134.99, 'Rosewill', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-182-322-V10.jpg', '650 Watt Power Supply\r\nATX 12V v2.31 / EPS12V v2.92\r\n100 -240VAC, 50 / 60 Hz\r\n80 PLUS GOLD Certified\r\nFull Modular PSU Design\r\nSilent 135mm Fan with Auto Fan Speed Control\r\nSLI & CrossFire-Ready'),
(1077, 'Thermaltake Toughpower 850W Power Supply ', 450, 149.99, 'Thermaltake', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-153-311-Z01.jpg', 'Intel ATX 12V 2.4 & SSI EPS 12V 2.92\r\nFull Modular\r\n80 PLUS GOLD Certified\r\n100 - 240 V 50 - 60 Hz\r\n'),
(1078, 'Seasonic PRIME TX-750, 750W Power Supply', 300, 199.99, 'Seasonic', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-151-197-S11.jpg', 'MICRO TOLERANCE LOAD REGULATION (under 0.5 %): This impressive electrical performance and stability makes this power supply an ideal choice for high-performance systems.\r\nFULL MODULAR - Use only the cables you need to reduce clutter and improve airflow for a better ventilated system.\r\n80 PLUS TITANIUM - Less energy gets wasted during power conversion; Cut down your electricity usage and be Eco-Friendly.\r\nPREMIUM HYBRID FAN CONTROL: Unsurpassed silent performance in Fanless Mode. The fan control button at the back of the power supply allows users to customize cooling needs by selecting between Seasonic S2FC (fan control without Fanless Mode) and S3FC (fan control including Fanless Mode).'),
(1079, 'EVGA 550 B5, 80 Plus BRONZE 550W Power Supply', 400, 82.99, 'EVGA', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-438-167-S09.jpg', 'ATX12V / EPS12V\r\nFull Modular\r\n80 PLUS BRONZE Certified\r\n100 - 240 V 50/60 Hz'),
(1080, 'Seasonic FOCUS SGX-650, 650W Power Supply', 400, 135.99, 'Seasonic', 'Power Supply', 'https://c1.neweggimages.com/ProductImage/17-151-224-V22.jpg', 'COMPACT SIZE: 125 mm (L) x 125 mm (W) x 63.5 mm (H).\r\nFULL MODULAR: Use only the cables you need to reduce clutter to maximize airflow for a better ventilated system.\r\n80 PLUS GOLD: Less energy gets wasted during power conversion; Cut down your electricity usage and be Eco-Friendly.\r\nPREMIUM HYBRID FAN CONTROL: Unsurpassed silent performance in Fanless Mode. Functions in three operational stages: Fanless Mode, Silent Mode, and Cooling Mode.'),
(1081, 'WD Blue 3D NAND 2TB Internal SSD', 300, 189.99, 'Western Digital', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-250-089-V02.jpg', 'Award Winning WD Blue 3D NAND SATA SSD.\r\nCapacities up to 4TB with enhanced reliability.\r\nAn active power draw up to 25% lower than previous generations of WD Blue SSD.\r\nSequential read speeds up to 560 MB/s and sequential write speeds up to 530 MB/s.\r\nAn industry-leading 1.75M hours mean time to failure (MTTF) and up to 500 terabytes written (TBW) for enhanced reliability.'),
(1082, 'SAMSUNG 860 EVO Series 2.5\" 1TB SATA SSD', 400, 109.99, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-673-V01.jpg', '2.5\"\r\n1TB\r\nSATA III'),
(1083, 'Crucial M4 2.5\" 128GB SATA III SSD', 450, 156.5, 'Crucial', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-148-442-12.jpg', '2.5\"\r\n128GB\r\nSATA III\r\n'),
(1084, 'SAMSUNG 850 EVO 2.5\" 4TB SATA III 3D SSD', 100, 1188, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-566-12.jpg', 'Innovation V-NAND Technology\r\nIncredible Read/Write Performance\r\nEnhanced Endurance and Reliability\r\n2.5\" Form Factor Ideal for most current Laptops and Desktop PCs'),
(1085, 'SAMSUNG 840 EVO 2.5\" 500GB SATA III SSD', 250, 349.99, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-249-11.jpg', '2.5\"\r\n500GB\r\nSATA III\r\n'),
(1086, 'SAMSUNG 840 Pro Series 2.5\" 128GB SSD', 500, 199.95, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-192-11.jpg', '2.5\"\r\n128GB\r\nSATA III\r\n'),
(1087, 'Western Digital BLACK SN750 NVMe M.2 2280 4TB', 125, 799.99, 'Western Digital', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-250-180-01.jpg', 'Read speeds up to 3,400 MB/s for improved load times.\r\nAvailable in capacities ranging from 250GB to 4TB.\r\nSleek design to customize and intensify your gaming rig while helping to maintain peak performance.'),
(1088, 'Kingston SSDNow V300 Series 2.5\" 240GB SSD', 450, 124.75, 'Kingston', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-721-108-02.jpg', '2.5\"\r\n240GB\r\nSATA III\r\n'),
(1089, 'Intel 660p Series M.2 2280 1TB PCIe SSD', 450, 109.99, 'Intel', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-167-462-V01.jpg', 'Form Factor: M.2 22 x 80mm\r\nInterface: PCI Express NVMe 3.0 x4\r\nPerformance: Sequential Read (up to) 1800 MB/s, Random Read (8GB Span): Up to 150,000 IOPS. Sequential Write (up to) 1800 MB/s, Random Write (8GB Span): Up to 220,000 IOPS'),
(1090, 'HyperX 3K 120GB SATA III MLC Internal SSD', 375, 149.99, 'HyperX', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-239-045-02.jpg', '2.5\"\r\n120GB\r\nSATA III\r\n'),
(1091, 'SAMSUNG 970 EVO M.2 2280 2TB SSD', 150, 888, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-692-V21.jpg', 'M.2 2280\r\n2TB\r\nPCIe Gen3. X4, NVMe 1.3'),
(1092, 'Crucial MX500 1TB 3D NAND SATA SSD', 250, 104.99, 'Crucial', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-156-174-V09.jpg', 'Sequential reads/writes up to 560/510 MB/s and random reads/writes up to 95k/90k on all file types\r\nAccelerated by Micron 3D NAND technology\r\nIntegrated Power Loss Immunity preserves all your saved work'),
(1093, 'SAMSUNG 860 Pro Series 512GB SATA III SSD', 425, 99.99, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-684-V21.jpg', '2.5\"\r\n512GB\r\nSATA III'),
(1094, 'Seagate Storage Xbox Series X 1TB SSD NVME', 250, 219.99, 'Seagate', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-248-142-04.jpg', 'SEAMLESS GAMEPLAY Designed in partnership with Xbox to seamlessly play Xbox Series X|S games from the internal SSD or the expansion card without sacrificing graphics, latency, load times, or framerates\r\nHIGH CAPACITY 1TB of storage increases the overall capacity of the Xbox Series X|S - collect thousands of games across four generations of Xbox without sacrificing performance\r\nEXCLUSIVE TO XBOX The only available expansion card that replicates the Xbox Velocity Architecture - providing faster load times, richer environments, and more immersive gameplay'),
(1095, 'Crucial X6 4TB Portable SSD USB 3.2', 200, 489.99, 'Crucial', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-156-278-V07.jpg', 'HUGE CAPACITY: Up to 4TB, storage capacity - enough for up to 20,000 photos, 100 hours of video, 6,000 songs, or 400GB of documents with room to spare\r\nFAST: Read speeds up to 800MB/s - that\'s 5.6x faster than most hard drives\r\nTINY, LIGHTWEIGHT: Fits between your fingertips and weighs less than your car keys\r\nBROAD COMPATIBILITY: Works with PC, Mac, Android, iPad Pro8 (PS4, XBOX One, and USB-A computer require USB-A adapter, available separately)\r\n'),
(1096, 'SAMSUNG T7 Portable SSD 1TB 1050 MB/s', 425, 149.99, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-761-V01.jpg', 'TRANSFER IN A FLASH: Transfers files nearly 9.5x faster than external hard disk drive (HDD). Reads up to 1,050 MB/s / Writes up to 1,000 MB/s on USB 3.2 gen 2 supported devices*.'),
(1097, 'SanDisk 1TB Extreme PRO Portable External SSD', 200, 179.99, 'SanDisk', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-173-412-V01.jpg', 'Save time moving and editing your files with our lightning-fast, in-house NVMe technology that dramatically increases transfer speeds to up to 1050 MB/s.\r\nRuggedized design with a forged aluminum body protects the SSD core and dissipates heat. Plus, a durable silicon rubber coating delivers higher impact resistance with its IP55 rating for water and dust resistance.'),
(1098, 'Seagate Expansion SSD 1TB USB 3.0', 250, 129.99, 'Seagate', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-248-097-V03.jpg', 'Super compact, light, and small enough to fit in your front pocket without weighing it down\r\nEasily drag and drop photos and videos to your drive. Even stream videos straight from the drive\r\nTake advantage of SSD durability and transfer speeds up to 400 MB/s'),
(1099, 'SAMSUNG T7 Portable SSD 1TB Blue', 400, 149.99, 'Samsung', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-147-764-V01.jpg', 'TRANSFER IN A FLASH: Transfers files nearly 9.5x faster than external hard disk drive (HDD). Reads up to 1,050 MB/s / Writes up to 1,000 MB/s on USB 3.2 gen 2 supported devices*.'),
(1100, 'Crucial X8 2TB Portable SSD USB 3.2', 400, 219.99, 'Crucial', 'Storage', 'https://c1.neweggimages.com/ProductImage/20-156-270-S05.jpg', 'Incredible performance with read speeds up to 1050 MB/s\r\nWorks with Windows, Mac, iPad Pro, Chromebook, Android, Linux, PS4, and Xbox One with USB-C 3.1 Gen2 and USB-A connectors\r\nDurable design featuring an anodized aluminum core, drop proof up to 7.5 feet, extreme-temperature, shock and vibration proof\r\nBacked by Micron, one of the largest manufacturers of flash storage in the world'),
(1101, 'Acer Nitro VG280K bmiipx 28\" Gaming Monitor', 300, 299.99, 'Acer', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-011-381-V02.jpg', '28\" IPS panel with 3840 x 2160 UHD resolution\r\nAMD FreeSync Technology\r\nPorts: 1 x Display Port and 2 x HDMI 2.0\r\nResponse Time: 1ms VRB\r\n90% DCI-P3 Color Space\r\nHDMIx2, DisplayPort, Speaker\r\nHDR10 support'),
(1102, 'ASUS TUF Gaming VG24VQ 24\" Full HD Curved', 300, 179.99, 'ASUS', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-281-027-S01.jpg', '1920 x 1080 Full HD Resolution\r\n1ms MPRT Response Time\r\n144Hz Refresh Rate\r\n2 x HDMI (1.4), DisplayPort (1.2) Video Inputs\r\nBuilt-in 2 Watt Stereo RMS Speakers\r\nAMD FreeSync Technology\r\nASUS Shadow Boost: Technology clarifies dark areas of the game without overexposing brighter areas\r\nAsus Eye Care with Ultra Low-Blue Light and Flicker-Free Technology\r\nSwivel, Pivot, Tile, Height Adjustable\r\nVESA Mount Compatible\r\n'),
(1103, 'Pixio PX277 Prime 27 inch 165Hz Monitor', 200, 329.99, 'Pixio', 'Monitors', 'https://c1.neweggimages.com/ProductImage/0JC-0081-00003-V01.jpg', '27 inch Flat Gaming Monitor\r\n2560 x 1440p WQHD 2K Resolution\r\n165Hz Refresh Rate (DP 1.2 - 165Hz, HDMI1 2.0 - 144Hz, HDMI2 1.4 - 144Hz)\r\nAMD Radeon FreeSync Premium Technology (Range 48-165Hz) & G-Sync Compatible\r\nIPS Panel w/ 111% sRGB\r\n1ms (MPRT) Response Time\r\nHDR Ready w/ 350nit Brightness\r\n100x100mm VESA Compatible\r\nXbox: 1440p, 120Hz, VRR'),
(1104, 'GIGABYTE G27Q 27\" Gaming Monitor', 300, 309.99, 'Gigabyte', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-012-015-01.jpg', '27\" 2560 x 1440 IPS Display\r\n144Hz Refresh Rate, 1ms (MPRT) Response Time\r\nSmooth Gameplay with AMD FreeSync Premium\r\nStudio Grade VESA Display HDR400 and 92% DCI-P3 (120% sRGB) Color Gamut\r\nGIGABYTE Classic Tactical Features with OSD Sidekick'),
(1105, 'MSI Optix MAG27CQ 27\" Gaming Monitor', 300, 299.99, 'MSI', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-475-009-V31.jpg', '2560 x 1440 WQHD 2K Resolution\r\n144Hz Refresh Rate\r\n1ms (MPRT) Response Time\r\nDisplayPort (1.2), HDMI (2.0), DVI Video Inputs\r\n3000:1 Contrast Ratio'),
(1106, 'AORUS FI27Q-X 27\" 240Hz 1440P Monitor', 100, 699.99, 'AORUS', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-012-032-V01.jpg', '27\" 2560 x 1440 Super Speed IPS Display, NVIDIA G-SYNC Compatible\r\n240Hz Refresh Rate\r\n0.3 ms Response Time (MPRT) / 1ms GTG (Grey to Grey)\r\nHigh Bit Rate 3 support (HBR3)\r\n142% sRGB / 93% DCI-P3 and VESA Display HDR400\r\nWorld\'s First Tactical Display with Active Noise Cancelling (ANC 2.0)'),
(1107, 'ASUS ProArt Display 24\" Monitor ', 250, 239.99, 'ASUS', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-281-102-S11.jpg', '23.8-inch Full HD (1920 x 1080) LED backlight display with IPS 178° wide viewing angle panel\r\nInternational color standard 100% sRGB and 100% Rec. 709 wide color gamut\r\nCalman Verified with factory calibrated for excellent Delta E < 2 color accuracy\r\n75Hz'),
(1108, 'LG UltraGear 27GN75B-B 27\"', 400, 329.99, 'LG', 'Monitors', 'https://c1.neweggimages.com/ProductImage/AMF7D2009159W3NL.jpg', '27\" FHD (1920 x 1080) IPS Display\r\nIPS 1ms Response Time\r\nRADEON FreeSync\r\nNVIDIA G-SYNC Compatible\r\n240Hz Refresh Rate\r\nHDR10\r\n3-Side Virtually Borderless Design'),
(1109, 'Westinghouse WC34DX9019 34\" Curved', 250, 309.99, 'Westinghouse', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-569-007-V03.jpg', '3440 x 1440 UWQHD 2K Resolution\r\n100Hz Refresh Rate\r\n2 x HDMI, DisplayPort Video Inputs\r\n2 x USB 3.0 Type A, 1 x USB 3.0 Type B Ports\r\nAMD FreeSync Technology\r\n16.7 Million Color Support\r\n3000:1 Static Contrast Ratio\r\nFlicker Free Technology\r\nEye Care Technology'),
(1110, 'Aopen 24HC1QR Pbidpx 24\"', 225, 179.99, 'Aopen', 'Monitors', 'https://c1.neweggimages.com/ProductImage/0JC-000P-007S4-V01.jpg', '23.6\" VA 1800R Curved Panel with 1920 x 1080 Full HD Resolution\r\nAMD Radeon FreeSync Technology\r\n144Hz Refresh Rate\r\nDVI, HDMI, DisplayPort\r\nLow Blue Light & Flicker-less Technology'),
(1111, 'Acer ET322QK wmiipx 32\" Monitor', 250, 279.99, 'Acer', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-011-158-V07.jpg', '3840 x 2160 Ultra HD 4K Resolution @ 60Hz\r\n2 x HDMI (2.0), DisplayPort (1.2) Video Inputs\r\nAMD FreeSync reduce tearing and stuttering from graphics card\r\n100% sRGB Color Gamut\r\nPicture-in-Picture, Picture-by-Picture\r\nBuilt-in 2 Watt Speakers\r\n'),
(1112, 'LG ULTRAGEAR 32GK65B-B 32\" 144HZ', 200, 324.99, 'LG', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-025-965-S01.jpg', '2560 x 1440 Quad HD 2K Resolution\r\n1ms with Motion Blur Reduction\r\n144Hz Refresh Rate\r\n2 HDMI, DisplayPort (1.2) Video Inputs\r\nRadeon FreeSync Technology\r\nNVIDIA G-SYNC Compatible'),
(1113, 'LG UltraGear 38GL950G-B 38\"', 50, 1799.99, 'LG', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-025-974-V01.jpg', '3840 x 1600 WQHD+ 2K Resolution\r\n1ms Response Time\r\n144Hz (GTG), 175Hz (OC) Refresh Rate\r\nHDMI, DisplayPort Video Input\r\nNVIDIA G-SYNC Technology\r\nFlicker Safe Technology\r\nTilt, Height Adjustable\r\n'),
(1114, 'SAMSUNG S22E450D 22\" Monitor', 400, 109.99, 'Samsung', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-022-315-09.jpg', '1920 x 1080 Full HD Resolution @ 60Hz\r\nVGA, DVI, DisplayPort Video Inputs\r\nMega Dynamic Contrast Ratio\r\nHeight, Pivot, Swivel, Tilt Adjustable\r\n'),
(1115, 'BenQ Zowie XL2740 27\" Full HD Gaming Monitor', 200, 549, 'BenQ', 'Monitors', 'https://c1.neweggimages.com/ProductImage/0EP-004Z-00003-V13.jpg', 'G-Sync Compatible & FreeSync eSports Monitor\\r\\n1920 x 1080 1ms (GTG)\\r\\nDCR 12,000,000:1 (1,000:1)\\r\\nDVI-DL, 2 x HDMI, DP 1.2 Headphone & Mic Jack\\r\\n100 x 100mm VESA Mounting\\r\\nPivot Swivel Tilt Height Adjustable Stand'),
(1116, 'LG 29BN650-B 29\" 21:9 UltraWide', 300, 219.99, 'LG', 'Monitors', 'https://c1.neweggimages.com/ProductImage/1B4-008M-001X5-S01.jpg', '2560 x 1080 75 Hz\r\nHDMI DisplayPort\r\n1,000:1\r\n16.7 Million\r\nHeight: 150mm\r\nTilt: -5° to 35°\r\n'),
(1117, 'LG UltraWide 49WL95C-WE 49\"', 75, 1499.99, 'LG', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-026-095-S05.jpg', '5120 x 1440 60 Hz\r\nHDMI DisplayPort USB 3.0\r\n1,000:1'),
(1118, 'Lenovo ThinkVision P24h-20 23.8\"', 300, 232.99, 'Lenovo', 'Monitors', 'https://c1.neweggimages.com/ProductImage/A6ZPD2005063XUDC.jpg', '23.8\" QHD (2560 x 1440) 3-side Near-edgeless display\r\nFactory calibrated color accuracy with multiple color gamut\r\nUSB Type-C, HDMI, DP, USB hub and daisy chain\r\nErgonomic and sapace-saving design & UE\r\nIPS Panel\r\n'),
(1119, 'ASUS VL249HE 24\" ', 100, 119.99, 'ASUS', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-281-091-S01.jpg', '23.8-inch Full HD monitor with IPS technology with stunningly wide 178° viewing angles\r\nUp to 75Hz refresh rate with Adaptive-Sync/FreeSync technology to eliminate screen tearing and choppy frame rates for fast and smooth gaming\r\nASUS-exclusive GamePlus with crosshair, timer, FPS counter, display alignment functions'),
(1120, 'SAMSUNG M5 Series 27M50A 27\"', 300, 229.99, 'Samsung', 'Monitors', 'https://c1.neweggimages.com/ProductImage/24-022-917-S01.jpg', '1920 x 1080 60 Hz\r\nHDMI USB 2.0\r\n3000:1\r\n16.7 Million\r\nTilt VESA Compatibility - Mountable\r\n19.93\" x 24.21\" x 7.62\" w/ stand\r\n'),
(1121, 'Corsair HS70 PRO WIRELESS USB', 300, 99.99, 'CORSAIR', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/26-816-147-V01.jpg', 'Crafted for Comfort: Adjustable ear cups fitted with plush memory foam provide exceptional comfort for hours of gameplay.\r\nSuperb Sound Quality: High-quality, custom-tuned 50mm neodymium audio drivers deliver the range to hear everything you need to on the battlefield.'),
(1122, 'Logitech Logitech G332 Stereo Gaming Headset', 500, 39.99, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/26-197-331-Z01.jpg', '3.5mm Connector\r\nLarge 50mm Drivers\r\n6mm Boom Mic\r\nMulti-Platform Compatibility\r\nConnects to PC, mobile, and game consoles, including Playstation 4and Xbox One via a 3.5mm input'),
(1123, 'CORSAIR VIRTUOSO RGB WIRELESS', 300, 245.99, 'CORSAIR', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/26-816-139-S15.jpg', '20Hz-40KHz\r\nUSB Type A Connector\r\n1.80m (USB Cable) / 1.50m (3.5mm Cable) Cord Length'),
(1124, 'Razer BlackShark V2 - Wired Gaming Headset', 300, 99.99, 'Razer', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/A4RES200803XqsXY.jpg', 'Razer™ Triforce Titanium 50 mm Drivers\r\nRazer™ HyperClear Cardioid Mic With USB Sound Card\r\nFlowKnit Memory Foam Ear Cushions\r\nADVANCED PASSIVE NOISE CANCELLATION'),
(1125, 'HyperX CLOUD FLIGHT S USB Connector', 400, 154.98, 'HyperX', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/AATCS2007083hYDI.jpg', '100Hz-20KHz\r\nUSB Connector\r\nUSB charge cable (1m) Cord Length'),
(1126, 'Razer NARI Wireless USB Transceiver', 250, 159.99, 'Razer', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/26-153-278-S01.jpg', '20Hz-20KHz\r\nWireless USB Transceiver / 3.5mm analog Connector'),
(1127, 'Corsair VIRTUOSO RGB Wireless', 300, 213.7, 'CORSAIR', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/V1DSD200618AEZJN.jpg', 'SLIPSTREAM WIRELESS\r\nHyper-fast wireless connection with up to 60ft of range, using Intelligent Frequency Shift (IFS) to ensure the strongest signal.\r\nUSB WIRED\r\nHigh-fidelity, 24bit/96kHz audio for the ultimate listening experience with compatible recordings.\r\n3.5MM WIRED\r\nUniversal connection for listening to a wide variety of devices, from DACs and audio players to consoles and mobile devices.\r\n\r\n'),
(1128, 'HyperX Cloud Flight S Wireless Gaming Headset', 200, 323.9, 'HyperX', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/A4RED201105CEOCQ.jpg', 'Gaming-grade 2.4GHz wireless connectivity\r\nLong lasting battery life - up to 30 hours\r\nQi Certified for wireless charging\r\nHyperX custom-tuned 7.1 surround sound\r\nGame and chat audio balance\r\nSignature HyperX comfort and durability\r\nDetachable microphone with LED mute indicator'),
(1129, 'Logitech G430 Gaming Headset', 300, 200, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/26-104-847-19.jpg', 'DTS Headphone: X and Dolby 7. 1 surround Sound: experience an immersive 360-degree sound field that lets you hear what you can\'t see\r\nBuilt for comfort: lightweight design and soft sport cloth ear cups with 90-degree swivel for maximum comfort and a personalized fit\r\nFolding, noise-cancelling boom mic: reduces background noise for clear voice pick up and rotates up and out of the way'),
(1130, 'Razer Kraken Gaming Headset 2019', 200, 122.66, 'Razer', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/AKVH_1_201912071020072566.jpg', 'Sound Built for Immersive Gaming: Outfitted with custom tuned 50 mm drivers\r\nAll Day Comfort: Oval, cooling gel infused cushions with indents for glasses prevent overheating and pressure build up\r\nRetractable Noise Cancelling Microphone: An improved cardioid mic reduces background and ambient noises for crystal clear communication'),
(1131, 'Sound BlasterX Katana Multi-channel Soundbar', 250, 237.34, 'Creative', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/1B4-00BN-00012-Z13.jpg', 'UNDER-MONITOR AUDIO SYSTEM - Perfect for your PC Gaming setup, the Katana fits right under your wide screen unobtrusively, featuring the programmable Aurora Reactive lighting system with 16.8 million colors\r\n5-DRIVER DESIGN & TRI-AMPLIFICATION SYSTEM - 2 up-firing midbass driver, 2 high-excursion tweeters, 1 long-throw subwoofer in a dedicated external subwoofer unit - each individually driven by DSPs ; Total output of 75RMS/150 Peak Power'),
(1132, 'Cyber Acoustics CA-3602 30 Watts', 300, 51.99, 'Cyber Acoustics', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/36-150-086-02.jpg', '30 Watts\r\nmp3 cradle included\r\nConvenient desktop controls\r\n'),
(1133, 'Logitech Z337 Bold Sound Bluetooth Speaker', 400, 79.99, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/0S6-003U-00067-Z01.jpg', 'WIRELESS AUDIO VIA BLUETOOTH: Stream audio wirelessly from any Bluetooth device by connecting your computer, smartphone or tablet via the pairing button conveniently located on the control pod\r\nBOLD SOUND: 80 Watts Peak/40 Watts RMS power delivers maximum loudness via two satellite speakers and a large subwoofer. Enjoy rich, clear, bold sound'),
(1134, 'Logitech - Z407 2.1 Bluetooth Speaker System', 250, 120, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/AKVHD210103B39QL.jpg', 'Sleek appearance Dual-position oval-shaped satellite speakers can be laid vertically or horizontally.\r\nFull range drivers Designed to move sound throughout the entire room. Enjoy a powerful, room-filling audio experience in any room.\r\nCompatible with most Bluetooth-enabled smartphones, computers, and tablets Perfect for a variety of audio sources.'),
(1135, 'Kanto YU2 100W Powered Speakers', 175, 259.99, 'Kanto', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/A4F7S201009EUEzv.jpg', '3\" drivers and 3/4” silk dome tweeters provide detailed mid-range and crisp highs\r\nBuilt-in soundcard lets you listen to high-quality audio via your computer’s USB port\r\nIncludes AUX input and SUB OUT'),
(1136, 'Kanto YU2 Powered Desktop Speakers - Pair', 225, 239.99, 'Kanto', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/AMF7_1_202003201679486678.jpg', '3\" drivers and 3/4” silk dome tweeters provide detailed mid-range and crisp highs\r\nBuilt-in soundcard lets you listen to high-quality audio via your computer’s USB port\r\nIncludes AUX input and SUB OU'),
(1137, 'HP DHE-6000 Eagle Eyes RGB Backlit', 300, 34.99, 'HP', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/A4RES200904bTWyQ.jpg', 'Mini and Portable Speaker\r\nEagle Eyes RGB Backlit\r\nStereo Sound Effect\r\nUSB Power Supply and 3.5mm Audio Cable\r\nWide Compatability\r\nLine Control-Volume Adjustment'),
(1138, 'Cyber Acoustics CA-3090 Speaker System', 400, 32.49, 'Cyber Acoustics', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/36-150-020-01.jpg', '9 Watts total RMS'),
(1139, 'Logitech G560 LIGHTSYNC PC Gaming Speakers', 250, 253.34, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/A73M_131901948262409080pivVHKCYeU.jpg', 'Built-in LIGHTSYNC RGB lighting blasts game driven lighting colors and effects activated by the audio in many popular games\r\nExplosive 240 Watts Peak power and unique driver design deliver a huge soundscape for a heightened gaming experience'),
(1140, 'Logitech Z506 75 watts RMS 5.1 Surround Sound', 175, 289.99, 'Logitech', 'Headsets and Speakers', 'https://c1.neweggimages.com/ProductImage/36-121-044-10.jpg', '5.1 Speaker System with 75 watts RMS\r\nSurround sound with 3D Stereo\r\nPorted, down firing subwoofer\r\nMultiple inputs');

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
  ADD PRIMARY KEY (`orderDetailsID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

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
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `payInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1141;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useractivate`
--
ALTER TABLE `useractivate`
  MODIFY `userActivateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

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
