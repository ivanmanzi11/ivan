-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 05:01 AM
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
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `username` varchar(255) DEFAULT NULL,
  `businessname` varchar(255) DEFAULT NULL,
  `unit` char(100) NOT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `booking_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`username`, `businessname`, `unit`, `productname`, `booking_time`) VALUES
('johnmanzi', 'Ubumwe', 'Juice', '0000-00-00', '2024-01-12'),
('', '', '', '0000-00-00', '2024-01-12'),
('omalkenny', 'Akagera Hotel', 'room', '0000-00-00', '2024-01-12'),
('Ivan  Manzi', 'Mariott', 'Rooms', '0000-00-00', '2024-01-15'),
('Gahozo Tourism', 'Serena hotel', 'room', '0000-00-00', '2024-01-15'),
('Dusabe family', 'Fatastic', 'tables', '0000-00-00', '2024-01-15'),
('Omal Kenny', '4 points hotel', 'room', '0000-00-00', '2024-01-15'),
('Omal kenny', 'Mariott hotel', 'room', '0000-00-00', '2024-01-15'),
('Omal kenny', 'Radisson Blu hotel', 'room', '0000-00-00', '2024-01-15'),
('Dusabe family', 'Fatastic', 'tables', '2 tables of 5 sits', '2024-01-15 16:42:39'),
('Dusabe family', 'Fatastic', 'tables', '2 tables of 5 sits', '2024-01-15 16:42:42'),
('omalkenny', 'Ubumwe', 'room', '2 rooms', '2024-01-15 16:42:57'),
('', '', '', '', '2024-01-15 16:53:03'),
('', '', '', '', '2024-01-15 16:53:07'),
('', '', '', '', '2024-01-15 16:53:08'),
('Gasuku John', 'Mille Collin', 'room', '3 rooms with 2 beds per each', '2024-01-15 17:10:10'),
('eric', 'Mariott', 'room', 'bggghgjgj', '2024-01-15 17:20:25'),
('johnmanzi', 'Ubumwe', 'room', '2 tables of 5 sits', '2024-01-15 17:29:33'),
('johnmanzi', 'beststar', 'room', '2 bottles', '2024-01-15 17:47:51'),
('irumvag', 'Ubumwe', 'room', '2 rooms with 1 bed per each', '2024-01-18 10:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(20) NOT NULL,
  `register_time` date NOT NULL,
  `userRole` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`username`, `email`, `password`, `register_time`, `userRole`) VALUES
('ivanmanzi', 'ivanmanzi11@gmail.com', '1234', '2024-01-12', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
