-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 03:48 PM
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
('irumvag', 'Ubumwe', 'room', '2 rooms with 1 bed per each', '2024-01-18 10:56:16'),
('3 rooms with 1 bed per each', 'Newvision hotel', 'room', '3 rooms', '2024-01-24 14:08:03'),
('omalkenny', 'Akagera Hotel', 'room', '3 rooms with 2 beds per each', '2024-01-24 14:09:13'),
('omalkenny', 'Musanze Gorilla hotel', 'room', '10 rooms with 2 beds per each', '2024-01-24 14:41:02'),
('johnmanzi', 'Akagera Hotel', 'Room', '3 rooms with 2 beds per each', '2024-01-24 16:26:02'),
('omalkenny', 'Newvision hotel', 'room', '3 rooms with 2 beds per each', '2024-01-24 16:26:47');

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

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`firstname`, `secondname`, `businessname`, `description`) VALUES
('Ivan', 'Manzi', 'Ubumwe', 'Newvision hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations to a'),
('John', 'Kanzi', 'Akagera Hotel', 'Akagera hotel is a business located in Kayonza district in dusenyi sector. This hotel receives more than 50 clients per day and now we are requesting it to be uploaded to LocalView Reservations to all'),
('Dusabe', 'Fasta', 'Dusabe Hotel', 'Dusabe hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 20 clients per day and now we are requesting it to be uploaded to LocalView Reservations to allo'),
('Ikirezi', 'Vanessa', 'Ikirezi hotel', 'Ikirezi hotel is a business located in Huye district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations to allow'),
('Angelique', 'UMUMARARUNGU', 'Umumararungu hotel', 'Umumararungu hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations t'),
('Beza', 'Kevi', 'Newtimes hotel', 'Newtimes hotel hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations'),
('Byiringiro', 'Boy', 'Byirigiro hotel', 'Byirigiro hotel is a business located in Kicukiro district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations to'),
('Mugabo', 'Clement', 'Mugabo hotel', 'Mugabo hotel hotel is a business located in Kamonyi district in Kamonyi sector. This hotel receives more than 90 clients per day and now we are requesting it to be uploaded to LocalView Reservations t'),
('Dodo', 'Mwiza', 'Dodo grand hotel', 'Dodo grand hotel is a business located in Rubavu district in Kumazi sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations to al'),
('Spencer', 'Bwiza', 'Spenser motel', 'Spenser  hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservations to al'),
('Alex', 'Kanzi', 'Mariott Gisenyi', 'Mariott Gisenyi  hotel is a business located in Gasabo district in kinyinya sector. This hotel receives more than 30 clients per day and now we are requesting it to be uploaded to LocalView Reservatio');

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
('boy', 'boy121@gmail.com', '1234', '2024-01-22', 'Agent'),
('bruce', 'bruce121@gmail.com', '1234', '2024-01-22', 'customer'),
('David', 'davis1@gmail.com', '1234', '2024-01-22', 'customer'),
('dufite', 'dufite121@gmail.com', '1234433', '2024-01-22', 'Agent'),
('dufiteer', 'malexis2020@escbyimana.com', '1234433', '2024-01-22', 'Agent'),
('eloi', 'eloi121@gmail.com', '12344', '2024-01-22', 'Agent'),
('fabruce', 'fab11@gmail.com', '1234', '2024-01-22', 'customer'),
('fisi', 'fisi121@gmail.com', '12344', '2024-01-22', 'Agent'),
('gabon', 'gabon121@gmail.com', '12344', '2024-01-22', 'Agent'),
('gaza', 'gaza121@gmail.com', '12344', '2024-01-22', 'Agent'),
('irum1232', 'irumacw321let@gmail.com', '123', '2024-01-15', 'customer'),
('irumvag', 'irumvagadanaclet@gmail.com', '123', '2024-01-15', 'admin'),
('irumvag1', 'irumvagada22naclet@gmail.com', '123', '2024-01-15', 'Agent'),
('irumvag12', 'irumvagada2234naclet@gmail.com', '123', '2024-01-15', 'customer'),
('ivanmanzi', 'ivanmanzi11@gmail.com', '1234', '2024-01-21', 'admin'),
('ivanmanzi123', 'ivanmanzi112@gmail.com', '', '2024-01-15', 'admin'),
('james', 'james121@gmail.com', '1234', '2024-01-22', 'Agent'),
('john', 'john11@gmail.com', '1234', '2024-01-22', 'customer'),
('johnmanzid', 'irumvagavdanaclet@gmail.com', '123', '2024-01-15', 'admin'),
('kagabon', 'kagabon121@gmail.com', '12344', '2024-01-22', 'Agent'),
('keza', 'keza121@gmail.com', '1234', '2024-01-22', 'customer'),
('muhwe', 'muhwe121@gmail.com', '1234', '2024-01-22', 'customer'),
('omalkenny', 'omal123@gmail.com', '1234', '2024-01-21', 'customer'),
('paul', 'paul121@gmail.com', '1234', '2024-01-22', 'customer'),
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
