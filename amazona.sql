-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 10:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazona`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `username` char(100) NOT NULL,
  `businessname` char(100) NOT NULL,
  `unit` char(100) NOT NULL,
  `productname` char(200) NOT NULL,
  `booking_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `firstname` char(100) NOT NULL,
  `secondname` char(100) NOT NULL,
  `businessname` char(100) NOT NULL,
  `description` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(20) NOT NULL,
  `register_time` date NOT NULL,
  `userRole` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`username`, `email`, `password`, `register_time`, `userRole`) VALUES
('', '', '', '2024-01-15', ''),
('Alexis', 'malexis2020@escbyimana.com', '1234', '2024-01-21', 'Agent'),
('bertin', 'berti1@gmail.com1234', '', '2024-01-15', 'admin'),
('irum1232', 'irumacw321let@gmail.com', '123', '2024-01-15', 'customer'),
('irumvag', 'irumvagadanaclet@gmail.com', '123', '2024-01-15', 'admin'),
('irumvag1', 'irumvagada22naclet@gmail.com', '123', '2024-01-15', 'Agent'),
('irumvag12', 'irumvagada2234naclet@gmail.com', '123', '2024-01-15', 'customer'),
('ivanmanzi', 'ivanmanzi11@gmail.com', '1234', '2024-01-21', 'admin'),
('ivanmanzi123', 'ivanmanzi112@gmail.com', '', '2024-01-15', 'admin'),
('johnmanzid', 'irumvagavdanaclet@gmail.com', '123', '2024-01-15', 'admin'),
('omalkenny', 'omal123@gmail.com', '1234', '2024-01-21', 'customer'),
('uwimanao', 'uwimana@gmail.com', '', '2024-01-15', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
