-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 08:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

CREATE TABLE `accident` (
  `report_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `accident`
--

INSERT INTO `accident` (`report_number`, `date`, `location`) VALUES
(1, '2018-10-06', 'Main Street'),
(2, '2017-02-14', 'Valentine Street'),
(3, '2017-04-20', 'Dank Street'),
(4, '1989-12-31', 'Christ Street'),
(5, '1989-03-17', 'Patrick Street'),
(6, '1989-12-02', 'Hanukkah Street'),
(7, '1989-01-06', 'Kony Street');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_license` text NOT NULL,
  `model` text NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_license`, `model`, `year`) VALUES
('H123-ABC', 'Hummer', 2006),
('M123-ABC', 'Mazda', 2008),
('L123-ABC', 'Lamborghini', 2012),
('N123-ABC', 'Nissan', 2005),
('C123-ABC', 'Corvette', 2016),
('F123-ABC', 'Ferrari', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `driver_id` text NOT NULL,
  `car_license` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`driver_id`, `car_license`) VALUES
('J123', 'H123-ABC'),
('B123', 'M123-ABC'),
('J321', 'L123-ABC'),
('A123', 'N123-ABC'),
('B321', 'C123-ABC'),
('C123', 'F123-ABC');

-- --------------------------------------------------------

--
-- Table structure for table `participated`
--

CREATE TABLE `participated` (
  `driver_id` text NOT NULL,
  `car_license` text NOT NULL,
  `report_number` int(11) NOT NULL,
  `damage_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `participated`
--

INSERT INTO `participated` (`driver_id`, `car_license`, `report_number`, `damage_amount`) VALUES
('J123', 'H123-ABC', 1, 5000),
('A123', 'N123-ABC', 1, 5000),
('B123', 'M123-ABC', 2, 7500),
('B321', 'C123-ABC', 2, 7500),
('J321', 'L123-ABC', 3, 10000),
('C123', 'F123-ABC', 3, 10000),
('J123', 'H123-ABC', 4, 6000),
('B123', 'M123-ABC', 4, 6000),
('J321', 'L123-ABC', 4, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `driver_id` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`driver_id`, `name`, `address`) VALUES
('J123', 'Jafet', '123 Main Street'),
('B123', 'Bryan', '321 Main Street'),
('J321', 'Jerry', '456 Main Street'),
('A123', 'Adam', '654 Main Street'),
('B321', 'Ben', '789 Main Street'),
('C123', 'Charlie', '987 Main Street');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;