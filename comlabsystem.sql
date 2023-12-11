-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 09:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comlabsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemNum` int(50) NOT NULL,
  `SerialNum` varchar(50) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Classification` varchar(50) NOT NULL,
  `Availability` varchar(50) NOT NULL,
  `UserID` int(50) DEFAULT NULL,
  `NameOfUser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNum`, `SerialNum`, `ItemName`, `Classification`, `Availability`, `UserID`, `NameOfUser`) VALUES
(7, 'ABC12345XYZ', 'COMLAB-1', 'LAPTOP', 'YES', NULL, ''),
(8, 'QWERTY7890UI', 'COMLAB-2', 'LAPTOP', 'YES', NULL, ''),
(9, '4567JKLOPQ', 'COMLAB-3', 'LAPTOP', 'YES', NULL, ''),
(10, 'MNO98765PQR', 'COMLAB-4', 'LAPTOP', 'YES', NULL, ''),
(11, 'ZXCV1234ASD', 'COMLAB-5', 'LAPTOP', 'YES', NULL, ''),
(12, 'YUI890GHJKL', 'COMLAB-6', 'LAPTOP', 'YES', NULL, ''),
(13, '12345VBNMQW', 'COMLAB-7', 'LAPTOP', 'YES', NULL, ''),
(14, 'PLM67890XSW', 'COMLAB-8', 'LAPTOP', 'YES', NULL, ''),
(15, 'RTY123UIOVB', 'COMLAB-9', 'LAPTOP', 'YES', NULL, ''),
(16, 'ZXC6789KJH', 'COMLAB-10', 'LAPTOP', 'YES', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `UserClassification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserID`, `Username`, `Password`, `Fname`, `Lname`, `UserClassification`) VALUES
(1, 'Admin', '12345', 'Cydrick', 'Aves', 'Administrator'),
(7, 'Faculty1', '123456', 'Veldin', 'Talorete', ' Faculty'),
(8, 'Faculty2', '123456', 'Javer', 'Borngo', ' Faculty'),
(9, 'Faculty3', '123456', 'John Doe', 'Majorenos', ' Faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemNum`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemNum` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `login` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
