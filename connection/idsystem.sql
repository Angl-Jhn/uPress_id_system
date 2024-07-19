-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 01:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `nameExt` varchar(55) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `accountPhoto` text NOT NULL,
  `deletedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `nameExt`, `role`, `createdAt`, `status`, `accountPhoto`, `deletedAt`) VALUES
(1, 'admin', '123456', 'Angelo', '', 'John', '', 'admin', '2024-07-08', 0, 'wallpaperflare.com_wallpaper1720443705.jpg', NULL),
(2, 'adminOp', '$2y$10$SGMoDH5J9Nfb1fUrvhyWyuXtNPMbgrqbTyBgqzdyC0kCoyLimvUlq', 'Ethyl', 'Test', 'Operator', 'SR', 'operator', '2024-07-08', 0, 'wp9369051-your-name-4k-pc-wallpapers1720443865.jpg', NULL),
(3, 'test', '$2y$10$VJX2GdDW2eHQvHpsCLQvcOb6JB45HvkrMV/UmhX/o.abRj3UiPOPe', 'test', '', 'test', '', 'operator', '2024-07-09', 0, 'wp9369051-your-name-4k-pc-wallpapers1720462183.jpg', '2024-07-08 18:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `clientType` varchar(255) NOT NULL,
  `formType` varchar(255) NOT NULL,
  `wmsuEmail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `nameExt` varchar(55) DEFAULT NULL,
  `emergencyFirstName` varchar(255) NOT NULL,
  `emergencyMiddleName` varchar(255) DEFAULT NULL,
  `emergencyLastName` varchar(255) NOT NULL,
  `emergencyNameExt` varchar(55) DEFAULT NULL,
  `emergencyAddress` varchar(255) NOT NULL,
  `emergencyContactNum` int(11) NOT NULL,
  `clientSignature` text DEFAULT NULL,
  `clientPhoto` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `deletedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientType`, `formType`, `wmsuEmail`, `firstName`, `middleName`, `lastName`, `nameExt`, `emergencyFirstName`, `emergencyMiddleName`, `emergencyLastName`, `emergencyNameExt`, `emergencyAddress`, `emergencyContactNum`, `clientSignature`, `clientPhoto`, `status`, `createdAt`, `deletedAt`) VALUES
(1, 'student', 'New', 'qwdq@wmsu.com', 'akdk', 'asfas', 'fasf', 'fasf', 'asfas', 'fasf', 'fassf', 'fasf', 'fasf', 12312, 'wp9109485-programmer-4k-wallpapers1720443928.jpg', 'wp9369051-your-name-4k-pc-wallpapers1720443928.jpg', 0, '2024-07-08', NULL),
(2, 'student', 'New', 'qwdq@wmsu.com', 'akdk', 'asfas', 'fasf', 'fasf', 'asfas', 'fasf', 'fassf', 'fasf', 'fasf', 12312, 'wp9109485-programmer-4k-wallpapers1720443928.jpg', 'wp9369051-your-name-4k-pc-wallpapers1720443928.jpg', 0, '2024-07-08', NULL),
(3, 'employee', 'Replacement', 'klkn@wmsu.com', 'kasslk', 'nlkgdsnlgknlkgn', 'kalsnflk', 'nflsskn', 'fsdfnsln', 'flksn', 'lfn', 'lfm', 'nfm', 2131231, 'wp9369051-your-name-4k-pc-wallpapers1720443970.jpg', 'wallpaperflare.com_wallpaper1720443970.jpg', 0, '2024-07-08', NULL),
(4, 'student', 'New', 'wdnkw@wmsu.com', 'kasdlk', 'ld', 'ndlk', 'ndlk', 'asdsaldnl', 'kdn', 'lsnd', 'sldn', 'sls', 312321, 'wp9369051-your-name-4k-pc-wallpapers1720448349.jpg', 'wp9369051-your-name-4k-pc-wallpapers1720448349.jpg', 0, '2024-07-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `clientIDEmp` int(11) NOT NULL,
  `empNum` int(11) NOT NULL,
  `plantillaPos` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `residentialAddress` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `contactNum` varchar(255) NOT NULL,
  `civilStatus` varchar(255) NOT NULL,
  `bloodType` varchar(255) NOT NULL,
  `hrmoScanned` text DEFAULT NULL,
  `hrmoNew` text DEFAULT NULL,
  `affidavitOfLoss` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `clientIDEmp`, `empNum`, `plantillaPos`, `designation`, `residentialAddress`, `birthDate`, `contactNum`, `civilStatus`, `bloodType`, `hrmoScanned`, `hrmoNew`, `affidavitOfLoss`) VALUES
(1, 3, 123123, 'lfkn', 'sf', 'lkfn', '2656-03-02', '132131', '', '', 'wp9369051-your-name-4k-pc-wallpapers1720443970.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `clientIDStudent` int(11) NOT NULL,
  `studentNum` varchar(255) NOT NULL,
  `collegeProgram` varchar(255) DEFAULT NULL,
  `COR` text DEFAULT NULL,
  `oldIDFront` text DEFAULT NULL,
  `oldIDBack` text DEFAULT NULL,
  `affidavitOfLoss` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `clientIDStudent`, `studentNum`, `collegeProgram`, `COR`, `oldIDFront`, `oldIDBack`, `affidavitOfLoss`) VALUES
(1, 1, '2021212', '', 'wp9369051-your-name-4k-pc-wallpapers1720443928.jpg', '', '', ''),
(2, 2, '2021212', '', 'wp9369051-your-name-4k-pc-wallpapers1720443928.jpg', '', '', ''),
(3, 4, '123131', '', 'wp9369051-your-name-4k-pc-wallpapers1720448349.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `transactType` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientIDEmp` (`clientIDEmp`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOREIGN` (`clientIDStudent`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOREIGN` (`clientID`,`accountID`),
  ADD KEY `accountID` (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`clientIDEmp`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`clientIDStudent`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
