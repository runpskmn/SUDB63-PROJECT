-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 02:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UID` int(11) NOT NULL,
  `Username` char(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `status` char(3) DEFAULT 'CUS',
  `Member_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UID`, `Username`, `Password`, `status`, `Member_id`) VALUES
(1, 'runpskmn', '123456', 'CUS', 000001),
(2, 'admin', 'admin', 'ADM', 000002),
(3, 'Supakarn', '12345', 'CUS', 000003);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Books_id` char(6) NOT NULL,
  `Bookdate` datetime DEFAULT NULL,
  `Check_in` datetime DEFAULT NULL,
  `Check_out` datetime DEFAULT NULL,
  `Deposit` int(4) DEFAULT NULL,
  `UID` int(11) NOT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Books_id`, `Bookdate`, `Check_in`, `Check_out`, `Deposit`, `UID`, `status`) VALUES
('B34704', '2021-04-26 18:18:25', '2021-04-26 00:00:00', '2021-04-30 00:00:00', 1000, 2, 0),
('B35169', '2021-04-26 15:19:55', '2021-04-14 00:00:00', '2021-04-15 00:00:00', 1000, 2, 1),
('B44471', '2021-04-26 18:17:25', '2021-04-26 00:00:00', '2021-04-30 00:00:00', 1000, 2, 0),
('B51920', '2021-04-26 14:56:41', '2021-04-14 00:00:00', '2021-04-15 00:00:00', 1000, 3, 1),
('B63517', '2021-04-26 18:05:45', '2021-04-20 00:00:00', '2021-04-30 00:00:00', 2500, 3, 0),
('B97828', '2021-04-26 18:20:22', '2021-04-26 00:00:00', '2021-04-30 00:00:00', 1000, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books_detail`
--

CREATE TABLE `books_detail` (
  `ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `First_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Age` varchar(10) DEFAULT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Books_id` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_detail`
--

INSERT INTO `books_detail` (`ID`, `First_Name`, `Last_Name`, `Age`, `Sex`, `Books_id`) VALUES
(000001, 'Olivier', 'Carter', 'Adult', 'Male', 'B51920'),
(000002, 'Supakarn', 'Yoojongdee', 'Adult', 'Male', 'B51920'),
(000003, 'aaa', 'aaa', 'Adult', 'Male', 'B97828');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `First_Name` char(50) DEFAULT NULL,
  `Last_Name` char(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_id`, `First_Name`, `Last_Name`, `Email`, `Address`, `tel`) VALUES
(000001, 'Pongsakorn', 'Meenut', 'pongsakorn.meenut@gmail.com', 'Phetchaburi, Thailand', '0912345678'),
(000002, 'Admin', 'Admin', 'admin@gmail.com', 'Admin', '0911111111'),
(000003, 'Supakarn', 'Yoojongdee', 'yoojongdee_s@silpakorn.edu', 'Thailand', '0811215269');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` char(6) NOT NULL,
  `Payment_date` datetime DEFAULT NULL,
  `Vat` float DEFAULT NULL,
  `Bank` char(20) DEFAULT NULL,
  `Books_id` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Payment_date`, `Vat`, `Bank`, `Books_id`) VALUES
('P55081', '2021-04-13 15:21:00', 70, 'KBank', 'B35169'),
('P73617', '2021-04-14 14:58:00', 70, 'BBL', 'B51920');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_id` char(4) NOT NULL,
  `Room_type` char(3) DEFAULT NULL,
  `Room_remark` char(1) DEFAULT NULL,
  `Room_price` float DEFAULT NULL,
  `Books_id` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_id`, `Room_type`, `Room_remark`, `Room_price`, `Books_id`) VALUES
('0001', 'STD', '1', 2000, 'B51920'),
('0002', 'STD', '1', 2000, 'B35169'),
('0003', 'STD', '1', 2000, 'B97828'),
('0004', 'DEL', '1', 5000, 'B63517'),
('0005', 'SUI', '0', 8000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `fk_account` (`Member_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Books_id`),
  ADD KEY `fk_Books` (`UID`);

--
-- Indexes for table `books_detail`
--
ALTER TABLE `books_detail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Books2` (`Books_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_id`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `fk_payment` (`Books_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_id`),
  ADD KEY `fk_Room` (`Books_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_detail`
--
ALTER TABLE `books_detail`
  MODIFY `ID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_Books` FOREIGN KEY (`UID`) REFERENCES `account` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_detail`
--
ALTER TABLE `books_detail`
  ADD CONSTRAINT `fk_Books2` FOREIGN KEY (`Books_id`) REFERENCES `books` (`Books_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`Books_id`) REFERENCES `books` (`Books_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_Room` FOREIGN KEY (`Books_id`) REFERENCES `books` (`Books_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
